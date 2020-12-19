<?php

namespace App\Http\Controllers;

use App\Workshops;
use App\SystemLog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPJasperXML;
use Response;
use DB;

class WorkshopsController extends Controller
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
        $workshps = Workshops::where('userid', Auth::user()->user_code)->get();

        return view('Workshops.index', compact('workshps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Workshops.create');
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
            'workshop'=>'required',  
            'event_name'=>'required|string',
            'venue'=>'required|string',
            'event_date' => 'required',
            'event_time'=>'required',              
        ],[
            'workshop.required'=>'Please Select Workshop / Conference.',  
            'event_name.required'=>'Event Name is required.',
            'venue.required'=>'Venue is required.',  
            'event_date.required'=>'Please Select the Event Date.',
            'event_time.required'=>'Please Select the Event Time.',  
        ]);  
  
        $model = new Workshops;  
        $model->workshop =  $request->get('workshop');  
        $model->event_name = $request->get('event_name');
        $model->venue = $request->get('venue');
        $model->event_date = $request->get('event_date');
        $model->event_time = $request->get('event_time');        
        $model->userid = Auth::user()->user_code;
          
        $model->save();

        $log = SystemLog::logRep('Workshops', 'C', 'Creating Workshops By - '. Auth::user()->name);

        return redirect()->route('workshops.index')
                        ->with('success','Faculty created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Workshops  $workshops
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model= Workshops::find($id);  
        return view('Workshops.view', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Workshops  $workshops
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model= Workshops::find($id);  
        return view('Workshops.update', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Workshops  $workshops
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([  
            'workshop'=>'required',  
            'event_name'=>'required|string',
            'venue'=>'required|string',
            'event_date' => 'required',
            'event_time'=>'required',              
        ],[
            'workshop.required'=>'Please Select Workshop / Conference.',  
            'event_name.required'=>'Event Name is required.',
            'venue.required'=>'Venue is required.',  
            'event_date.required'=>'Please Select the Event Date.',
            'event_time.required'=>'Please Select the Event Time.',  
        ]);    
  
        $model = Workshops::find($id);  
        $model->workshop =  $request->get('workshop');  
        $model->event_name = $request->get('event_name');
        $model->venue = $request->get('venue');
        $model->event_date = $request->get('event_date');
        $model->event_time = $request->get('event_time'); 

        $model->save();

        $log = SystemLog::logRep('Workshops', 'E', 'Update Workshops ID - '. $model->id . ', By - '. Auth::user()->name);

        return redirect()->route('workshops.index')
                        ->with('success','Faculty created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Workshops  $workshops
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Workshops::find($id);  

        $log = new SystemLog;
        $log->user_id = Auth::user()->user_code;
        $log->section = 'Workshops';
        $log->category = 'D';
        $log->remark = 'Delete Workshops - '. $model->id;
        $log->save();

        $model->delete();

        $workshps = Workshops::where('userid', Auth::user()->user_code)->get();

        return view('Workshops.index', compact('workshps'));
    }

    public function print()
    {
        $server = "localhost";
        $user = "root";
        $pass ="";
        $db = "ccp_ewe";
        $sql = "select * from workshops where userid = '" . Auth::user()->user_code."'";

        $PHPJasperXML = new PHPJasperXML();
        // $PHPJasperXML->debugsql=true;
        // $PHPJasperXML->arrayParameter=array("parameter1"=>1);

        $PHPJasperXML->load_xml_file("http://localhost/CCP2/ccp_ewe/reports/repWorkshop.jrxml"); 
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

        $workshps = DB::table('workshops')
            ->join('personal_info', 'workshops.userid', '=', 'personal_info.userid')
            ->select('workshops.*','personal_info.full_name')
            ->get();

        return view('Workshops.adminIndex', compact('workshps', 'users'));
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

        $workshps = DB::table('workshops')
            ->join('personal_info', 'workshops.userid', '=', 'personal_info.userid')
            ->where('workshops.userid', 'like', '%' .$search. '%')
            ->select('workshops.*', 'personal_info.full_name')
            ->get();

        return view('Workshops.adminIndex', ['workshps' => $workshps, 'users' => $users]);
      }
    }
}
