<?php

namespace App\Http\Controllers;

use App\Projects;
use App\Module;
use App\SystemLog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use PDF;
use PHPJasperXML;
use Response;

class ProjectsController extends Controller
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
        $projcts = DB::table('projects')
            ->join('modules', 'projects.module', '=', 'modules.id')
            ->where('projects.userid', Auth::user()->user_code)
            ->select('projects.*', 'modules.mod_code', 'modules.mod_name')
            ->get();

        return view('Projects.index', compact('projcts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = Module::all();

        return view('Projects.create', compact('modules'));
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
            'topic'=>'required',  
            'project_type'=>'required',  
            'started_date'=>'required',
            'completed_date'=>'required',  
            'module'=>'required',
            'batch'=>'required',
        ],[
            'topic.required'=>'Project Name is Required!',  
            'project_type.required'=>'Project Status is Required!',  
            'started_date.required'=>'Started Date is Required!',  
            'completed_date.required'=>'Completed Date is Required!',  
            'module.required'=>'Module is Required!',
            'batch.required'=>'Batch is Required!'
        ]);
  
        $model = new Projects;  
        $model->topic =  $request->get('topic');  
        $model->description = $request->get('description');
        $model->project_type = $request->get('project_type');
        $model->started_date = $request->get('started_date');
        $model->completed_date = $request->get('completed_date');
        $model->module = $request->get('module');
        $model->estimate_time = $request->get('estimate_time');
        $model->batch = $request->get('batch');
        $model->userid = Auth::user()->user_code;
          
        $model->save();
        $log = SystemLog::logRep('Projects', 'C', 'Creating a Project By - '. Auth::user()->name);

        return redirect()->route('project.index')
                        ->with('success','Faculty created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model= Projects::find($id);  
        return view('Projects.view', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model= Projects::find($id);
        $modules = Module::all();

        return view('Projects.update', compact('model', 'modules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([  
            'topic'=>'required',  
            'project_type'=>'required',  
            'started_date'=>'required',
            'completed_date'=>'required',  
            'module'=>'required',
            'batch'=>'required',
        ],[
            'topic.required'=>'Project Name is Required!',  
            'project_type.required'=>'Project Status is Required!',  
            'started_date.required'=>'Started Date is Required!',  
            'completed_date.required'=>'Completed Date is Required!',  
            'module.required'=>'Module is Required!',
            'batch.required'=>'Batch is Required!'
        ]);  
  
        $model = Projects::find($id);  
        $model->topic =  $request->get('topic');  
        $model->description = $request->get('description');
        $model->project_type = $request->get('project_type');
        $model->started_date = $request->get('started_date');
        $model->completed_date = $request->get('completed_date');
        $model->module = $request->get('module');
        $model->estimate_time = $request->get('estimate_time');
        $model->batch = $request->get('batch');

        $model->save();

        $log = SystemLog::logRep('Projects', 'E', 'Update Projects ID - '. $model->id . ', By - '. Auth::user()->name);

        return redirect()->route('project.index')
                        ->with('success','Faculty created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Projects::find($id);

        $log = SystemLog::logRep('Projects', 'D', 'Delete Project ID - '. $id . ', By - '. Auth::user()->name);

        $model->delete();

        $projcts = DB::table('projects')
            ->join('modules', 'projects.module', '=', 'modules.id')
            ->where('projects.userid', Auth::user()->user_code)
            ->select('projects.*', 'modules.mod_code', 'modules.mod_name')
            ->get();

        return redirect()->route('project.index', compact('projcts'));
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

          $sql = "select * from projects where userid = '" . Auth::user()->user_code."' and started_date between '" . $start ."' and '" . $end ."'";
        }
        else{
          $sql = "select * from projects where userid = '" . Auth::user()->user_code."'";
        }
        

        $PHPJasperXML = new PHPJasperXML();
        // $PHPJasperXML->debugsql=true;
        // $PHPJasperXML->arrayParameter=array("parameter1"=>1);

        $PHPJasperXML->load_xml_file("http://localhost/CCP2/ccp_ewe/reports/reportProject.jrxml"); 
        $PHPJasperXML->sql = $sql;      
        $PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
        $PHPJasperXML->outpage("I");
    }

    public function fetch_data(Request $request)
    {
      if($request->ajax())
      {
        if($request->from_date != '' && $request->to_date != '')
        {
          $data = DB::table('projects')
          ->join('modules', 'projects.module', '=', 'modules.id')
          ->where('projects.userid', Auth::user()->user_code)        
          ->whereBetween('started_date', array($request->from_date, $request->to_date))
          ->select('projects.*', 'modules.mod_code', 'modules.mod_name')
          ->get();
        }
        else
        {
         $data = DB::table('projects')->orderBy('date', 'desc')->get();
        }
        echo json_encode($data);
      }
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

        $projcts = DB::table('projects')
            ->join('modules', 'projects.module', '=', 'modules.id')
            ->join('personal_info', 'projects.userid', '=', 'personal_info.userid')
            // ->where('projects.userid', Auth::user()->user_code)
            ->select('projects.*', 'modules.mod_code', 'modules.mod_name','personal_info.full_name')
            ->get();

        return view('Projects.admin_index', compact('projcts', 'users'));
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

        $projcts = DB::table('projects')
            ->join('modules', 'projects.module', '=', 'modules.id')
            ->join('personal_info', 'projects.userid', '=', 'personal_info.userid')
            ->where('projects.userid', 'like', '%' .$search. '%')
            ->select('projects.*', 'modules.mod_code', 'modules.mod_name','personal_info.full_name')
            ->get();

        return view('Projects.admin_index', ['projcts' => $projcts, 'users' => $users]);
      }
    }
}

