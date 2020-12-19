<?php

namespace App\Http\Controllers;

use App\Publications;
use App\SystemLog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPJasperXML;
use Response;

class PublicationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pubs = Publications::where('userid', Auth::user()->user_code)->get();

        return view('Publications.index', compact('pubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Publications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([  
            'name'=>'required',  
            'publication_type'=>'required',  
            'pub_date'=>'required', 
            'pub_version'=>'required',
        ],[
            'name.required'=>'Publication Name is Required!',  
            'publication_type.required'=>'Publication Type is Required!',  
            'pub_date.required'=>'Published Date is Required!',    
            'pub_version.required'=>'Publication Edition is Required!', 
        ]);  
  
        $model = new Publications;  
        $model->name =  $request->get('name');
        $model->pub_description =  $request->get('pub_description');
        $model->publication_type = $request->get('publication_type');
        $model->pub_date = $request->get('pub_date');
        $model->pub_version = $request->get('pub_version');
        $model->userid = Auth::user()->user_code;
          
        $model->save();

        $log = SystemLog::logRep('Publications', 'C', 'Creating a Publication By - '. Auth::user()->name);

        return redirect()->route('publication.index')
                        ->with('success','Faculty created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Publications  $publications
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model= Publications::find($id);  
        return view('Publications.view', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Publications  $publications
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model= Publications::find($id);  
        return view('Publications.update', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Publications  $publications
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([  
            'name'=>'required',  
            'publication_type'=>'required',  
            'pub_date'=>'required', 
            'pub_version'=>'required',
        ],[
            'name.required'=>'Publication Name is Required!',  
            'publication_type.required'=>'Publication Type is Required!',  
            'pub_date.required'=>'Published Date is Required!',    
            'pub_version.required'=>'Publication Edition is Required!', 
        ]);  
  
        $model = Publications::find($id);  
        $model->name =  $request->get('name');
        $model->pub_description =  $request->get('pub_description');
        $model->publication_type = $request->get('publication_type');
        $model->pub_date = $request->get('pub_date');
        $model->pub_version = $request->get('pub_version');

        $model->save();

        $log = SystemLog::logRep('Publications', 'E', 'Update Publication ID - '. $model->id . ', By - '. Auth::user()->name);

        return redirect()->route('publication.index')
                        ->with('success','Faculty created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Publications  $publications
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Publications::find($id);

        $log = SystemLog::logRep('Publications', 'D', 'Delete Publication ID - '. $id . ', By - '. Auth::user()->name);

        $model->delete();

        $pubs = Publications::where('userid', Auth::user()->user_code)->get();

        return redirect()->route('publication.index', compact('pubs'));
    }

    public function search(Request $request)
    {
        $search = $request->get('srch');
        $pubs = DB::table('publications')
        ->where('name', 'like', '%' .$search. '%')
        ->paginate(10);

        return view('Publications.index', ['pubs' => $pubs]);
    }

    public function printPdf()
    {
        $server = "localhost";
        $user = "root";
        $pass ="";
        $db = "ccp_ewe";
        $sql = "select * from publications where userid = '" . Auth::user()->user_code."'";

        $PHPJasperXML = new PHPJasperXML();
        // $PHPJasperXML->debugsql=true;
        // $PHPJasperXML->arrayParameter=array("parameter1"=>1);

        $PHPJasperXML->load_xml_file("http://localhost/CCP2/ccp_ewe/reports/reportPublications.jrxml"); 
        $PHPJasperXML->sql = $sql;      
        $PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
        $PHPJasperXML->outpage("I");
    }

    public function adminAllView()
    {
      if(User::checkAdmin())
      {
        if(Auth::user()->user_type == 7){
            $user_dep = DB::table('personal_info')
            ->where('userid', Auth::user()->user_code)
            ->pluck('department')
            ->first();

            if($user_dep == null){
                abort(403, 'Please provide the personal information first.');
            }

            $users = DB::table('personal_info')
            ->where('personal_info.department', $user_dep)
            ->select('personal_info.userid','personal_info.full_name')
            ->get();
        }

        else if(Auth::user()->user_type == 8){
            $user_fac = DB::table('personal_info')
            ->where('userid', Auth::user()->user_code)
            ->pluck('faculty')
            ->first();

            if($user_fac == null){
                abort(403, 'Please provide the personal information first.');
            }

            $users = DB::table('personal_info')
            ->where('personal_info.faculty', $user_fac)
            ->select('personal_info.userid','personal_info.full_name')
            ->get();
        }
        
        else{
            $users = DB::table('personal_info')
            ->select('personal_info.userid','personal_info.full_name')
            ->get();
        }

        $pubs = DB::table('publications')
            ->join('personal_info', 'publications.userid', '=', 'personal_info.userid')
            ->select('publications.*', 'personal_info.full_name')
            ->get();

        return view('Publications.adminindex', compact('pubs', 'users'));
      }
    }

    public function adminSearch(Request $request)
    {
      if(User::checkAdmin())
      {
        $search = $request->get('srch');

        if(Auth::user()->user_type == 7){
            $user_dep = DB::table('personal_info')
            ->where('userid', Auth::user()->user_code)
            ->pluck('department')
            ->first();

            if($user_dep == null){
                abort(403, 'Please provide the personal information first.');
            }

            $users = DB::table('personal_info')
            ->where('personal_info.department', $user_dep)
            ->select('personal_info.userid','personal_info.full_name')
            ->get();
        }

        else if(Auth::user()->user_type == 8){
            $user_fac = DB::table('personal_info')
            ->where('userid', Auth::user()->user_code)
            ->pluck('faculty')
            ->first();

            if($user_fac == null){
                abort(403, 'Please provide the personal information first.');
            }

            $users = DB::table('personal_info')
            ->where('personal_info.faculty', $user_fac)
            ->select('personal_info.userid','personal_info.full_name')
            ->get();
        }
        
        else{
            $users = DB::table('personal_info')
            ->select('personal_info.userid','personal_info.full_name')
            ->get();
        }

        $pubs = DB::table('publications')
            ->join('personal_info', 'publications.userid', '=', 'personal_info.userid')
            ->where('publications.userid', 'like', '%' .$search. '%')
            ->select('publications.*', 'personal_info.full_name')
            ->get();

        return view('Publications.adminindex', ['pubs' => $pubs, 'users' => $users]);
      }
    }    
}
