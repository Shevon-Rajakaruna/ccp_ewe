<?php 

namespace App\Http\Controllers;

use App\Research;
use App\Module;
use App\SystemLog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPJasperXML;
use Response;

class ResearchController extends Controller
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
        $researchs = DB::table('research')
            ->join('modules', 'research.module', '=', 'modules.id')
            ->where('research.userid', Auth::user()->user_code)
            ->select('research.*', 'modules.mod_code', 'modules.mod_name')
            ->get();

        return view('Researches.index', compact('researchs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = Module::all();

        return view('Researches.create', compact('modules'));
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
            'status'=>'required',  
            'module'=>'required',
            'start_date'=>'required',
            'complete_date'=>'required',  
            'groupID'=>'required',
        ],[
            'name.required'=>'Research Name is Required!',  
            'status.required'=>'Research Status is Required!',  
            'module.required'=>'Module is Required!',  
            'start_date.required'=>'Completed Date is Required!', 
            'complete_date.required'=>'Completed Date is Required!',  
            'groupID.required'=>'Group ID is Required!'
        ]);   
  
        $model = new Research;  
        $model->name =  $request->get('name');  
        $model->description = $request->get('description');
        $model->status = $request->get('status');
        $model->module = $request->get('module');
        $model->start_date = $request->get('start_date');
        $model->complete_date = $request->get('complete_date');
        $model->groupID = $request->get('groupID');
        $model->estimate_time = $request->get('estimate_time');
        $model->userid = Auth::user()->user_code;
          
        $model->save();

        $log = SystemLog::logRep('Research', 'C', 'Creating Researches By - '. Auth::user()->name);

        return redirect()->route('research.index')
                        ->with('success','Faculty created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model= Research::find($id);  
        return view('Researches.view', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modules = Module::all();
        $model= Research::find($id); 

        return view('Researches.update', compact('model', 'modules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([  
        //     'name'=>'required', 
        // ]);  
  
        $model = Research::find($id);  
        $model->name =  $request->get('name');  
        $model->description = $request->get('description');
        $model->status = $request->get('status');
        $model->module = $request->get('module');
        $model->start_date = $request->get('start_date');
        $model->complete_date = $request->get('complete_date');
        $model->groupID = $request->get('groupID');
        $model->estimate_time = $request->get('estimate_time');

        $model->save();

        $log = SystemLog::logRep('Research', 'E', 'Update Research ID - '. $model->id . ', By - '. Auth::user()->name);

        return redirect()->route('research.index')
                        ->with('success','Faculty created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Research  $research
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Research::find($id);

        $log = SystemLog::logRep('Research', 'D', 'Delete Research ID - '. $id . ', By - '. Auth::user()->name);

        $model->delete();

        $researchs = DB::table('research')
            ->join('modules', 'research.module', '=', 'modules.id')
            ->where('research.userid', Auth::user()->user_code)
            ->select('research.*', 'modules.mod_code', 'modules.mod_name')
            ->get();

        return redirect()->route('research.index', compact('researchs'));
    }

    public function search_data(Request $request)
    {
      if($request->ajax())
      {
        if($request->from_date != '' && $request->to_date != '')
        {
          $data = DB::table('research')
          ->join('modules', 'research.module', '=', 'modules.id')
          ->where('research.userid', Auth::user()->user_code)        
          ->whereBetween('start_date', array($request->from_date, $request->to_date))
          ->select('research.*', 'modules.mod_code', 'modules.mod_name')
          ->get();
        }
        else
        {
          $data = DB::table('research')
            ->join('modules', 'research.module', '=', 'modules.id')
            ->where('research.userid', Auth::user()->user_code)
            ->select('research.*', 'modules.mod_code', 'modules.mod_name')
            ->get();
        }
        echo json_encode($data);
      }
    }

    public function printPdf($startdate)
    {
        $server = "localhost";
        $user = "root";
        $pass ="";
        $db = "ccp_ewe";
        

        if ($startdate != 'null') {

          $start = substr($startdate,0,10);
          $end = substr($startdate,10,20);

          $sql = "select * from research where userid = '" . Auth::user()->user_code."' and start_date between '" . $start ."' and '" . $end ."'";
        }
        else{
          $sql = "select * from research where userid = '" . Auth::user()->user_code."'";
        }

        $PHPJasperXML = new PHPJasperXML();
        // $PHPJasperXML->debugsql=true;
        // $PHPJasperXML->arrayParameter=array("parameter1"=>1);

        $PHPJasperXML->load_xml_file("http://localhost/CCP2/ccp_ewe/reports/reportResearch.jrxml"); 
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

        $researchs = DB::table('research')
            ->join('modules', 'research.module', '=', 'modules.id')
            ->join('personal_info', 'research.userid', '=', 'personal_info.userid')
            ->select('research.*', 'modules.mod_code', 'modules.mod_name','personal_info.full_name')
            ->get();

        return view('Researches.ad_index', compact('researchs', 'users'));
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

        $researchs = DB::table('research')
            ->join('modules', 'research.module', '=', 'modules.id')
            ->join('personal_info', 'research.userid', '=', 'personal_info.userid')
            ->where('research.userid', 'like', '%' .$search. '%')
            ->select('research.*', 'modules.mod_code', 'modules.mod_name','personal_info.full_name')
            ->get();

        return view('Researches.ad_index', ['researchs' => $researchs, 'users' => $users]);
      }
    }
}
