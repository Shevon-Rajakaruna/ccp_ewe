<?php 

namespace App\Http\Controllers;

use App\Timetable;
use App\Module;
use App\SystemLog;
use App\TotalWorkingHours;
use App\EvaluateWorkingHours;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use DataTables;
use PDF;
use PHPJasperXML;
use Response;

class TimetableController extends Controller
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
    	$timetable = DB::table('timetable')
            ->join('modules', 'timetable.module', '=', 'modules.id')
            ->where('timetable.userid', Auth::user()->user_code)
            ->select('timetable.*', 'modules.mod_code', 'modules.mod_name')
            ->get();

        return view('Timetable.index', compact('timetable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = Module::all();

        return view('Timetable.create', compact('modules'));
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
            'ddate'=>'required',  
            'module'=>'required|integer',  
            'category'=>'required|string|min:4',  
            'tot_hours'=>'required|integer|between:1,200',
        ],[
            'ddate.required'=>'Date is required.',  
            'module.required'=>'Module is required.',
            'module.integer'=>'Select a Module.',  
            'category.required'=>'Category is required.',
            'category.min'=>'Select a Category.',  
            'tot_hours.required'=>'Total Hours is required.',
            'tot_hours.between'=>'Total Hours must be greater than 0.'
        ]);  

        $tt = new Timetable;
        $tt->ddate =  $request->get('ddate');  
        $tt->module = $request->get('module');  
        $tt->category = $request->get('category');  
        $tt->tot_hours = $request->get('tot_hours');
        $tt->remarks = $request->get('remarks');
        $tt->userid = Auth::user()->user_code;


        $module = Module::where('id' , $tt->module)->first();

        $times = Timetable::where('module' , $tt->module)
                        ->where('category' , $tt->category)->get();

        if($times->isEmpty()){

            switch ($tt->category) {
                case 'Lecture':
                    if ($tt->tot_hours > $module->lec_hours) {
                        abort(503, 'Total Hours('.$tt->tot_hours.') exceeds the module lecture hours('.$module->lec_hours.')!');
                    }
                    break;

                case 'Tutorial':
                    if ($tt->tot_hours > $module->tute_hours) {
                        abort(503, 'Total Hours('.$tt->tot_hours.') exceeds the module tutorial hours('.$module->tute_hours.')!');
                    }
                    break;

                case 'Lab Session':
                    if ($tt->tot_hours > $module->lab_hours) {
                        abort(503, 'Total Hours('.$tt->tot_hours.') exceeds the module lab hours('.$module->lab_hours.')!');
                    }
                    break;
                
                // default:
                //     # code...
                //     break;
            }
        }
        else{
            $hours = $tt->tot_hours;

            foreach ($times as $time) {
                $hours += $time->tot_hours;
            }

            //$hour = $hours + $tt->tot_hours;

            switch ($tt->category) {
                case 'Lecture':
                    if ($hours > $module->lec_hours) {
                        abort(503, 'Total Hours exceeds the module lecture hours('.$module->lec_hours.')!');
                    }
                    break;

                case 'Tutorial':
                    if ($hours > $module->tute_hours) {
                        abort(503, 'Total Hours exceeds the module tutorial hours('.$module->tute_hours.')!');
                    }
                    break;

                case 'Lab Session':
                    if ($hours > $module->lab_hours) {
                        abort(503, 'Total Hours exceeds the module lab hours('.$module->lab_hours.')!');
                    }
                    break;
                
                // default:
                //     # code...
                //     break;
            }
        }

        $tt->save();

        $log = SystemLog::logRep('Timetable', 'C', 'Creating Timetable By - '. Auth::user()->name);

        return redirect()->route('timetable.index')
                        ->with('success','Product created successfully.');  
          
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $timetable= Timetable::find($id);

        $module = Module::where('id', $timetable->module)->first();

        return view('Timetable.view', compact('timetable','module'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $timetable= Timetable::find($id);
        $modules = Module::all();

        return view('Timetable.update', compact('timetable', 'modules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([  
            'ddate'=>'required',  
            'module'=>'required|integer',  
            'category'=>'required|string|min:4',  
            'tot_hours'=>'required|integer|between:1,200',
        ],[
            'ddate.required'=>'Date is required.',  
            'module.required'=>'Module is required.',
            'module.integer'=>'Select a Module.',  
            'category.required'=>'Category is required.',
            'category.min'=>'Select a Category.',  
            'tot_hours.required'=>'Total Hours is required.',
            'tot_hours.between'=>'Total Hours must be greater than 0.'
        ]);    
  
        $tt = Timetable::find($id);  
        $tt->ddate =  $request->get('ddate');  
        $tt->module = $request->get('module');  
        $tt->category = $request->get('category');  
        $tt->tot_hours = $request->get('tot_hours');
        $tt->remarks = $request->get('remarks');

        $module = Module::where('id' , $tt->module)->first();

        $times = Timetable::where('module' , $tt->module)
                        ->where('category' , $tt->category)->get();

        if($times->isEmpty()){

            switch ($tt->category) {
                case 'Lecture':
                    if ($tt->tot_hours > $module->lec_hours) {
                        abort(503, 'Total Hours('.$tt->tot_hours.') exceeds the module lecture hours('.$module->lec_hours.')!');
                    }
                    break;

                case 'Tutorial':
                    if ($tt->tot_hours > $module->tute_hours) {
                        abort(503, 'Total Hours('.$tt->tot_hours.') exceeds the module tutorial hours('.$module->tute_hours.')!');
                    }
                    break;

                case 'Lab Session':
                    if ($tt->tot_hours > $module->lab_hours) {
                        abort(503, 'Total Hours('.$tt->tot_hours.') exceeds the module lab hours('.$module->lab_hours.')!');
                    }
                    break;
                
                // default:
                //     # code...
                //     break;
            }
        }
        else{
            $hours = $tt->tot_hours;

            foreach ($times as $time) {
                $hours += $time->tot_hours;
            }

            //$hour = $hours + $tt->tot_hours;

            switch ($tt->category) {
                case 'Lecture':
                    if ($hours > $module->lec_hours) {
                        abort(503, 'Total Hours exceeds the module lecture hours('.$module->lec_hours.')!');
                    }
                    break;

                case 'Tutorial':
                    if ($hours > $module->tute_hours) {
                        abort(503, 'Total Hours exceeds the module tutorial hours('.$module->tute_hours.')!');
                    }
                    break;

                case 'Lab Session':
                    if ($hours > $module->lab_hours) {
                        abort(503, 'Total Hours exceeds the module lab hours('.$module->lab_hours.')!');
                    }
                    break;
                
                // default:
                //     # code...
                //     break;
            }
        }

        $tt->save();
        $log = SystemLog::logRep('Timetable', 'E', 'Update timetable ID - '. $tt->id . ', By - '. Auth::user()->name);

        return redirect()->route('timetable.index')
                        ->with('success','Product created successfully.');
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tt=Timetable::find($id);

        $log = SystemLog::logRep('Timetable', 'D', 'Delete timetable ID - '. $id . ', By - '. Auth::user()->name);

        $tt->delete();

        $timetable = DB::table('timetable')
            ->join('modules', 'timetable.module', '=', 'modules.id')
            ->where('timetable.userid', Auth::user()->user_code)
            ->select('timetable.*', 'modules.mod_code', 'modules.mod_name')
            ->get();
        return view('Timetable.index', compact('timetable'));
    }

    public function totalWorkingReport()
    {
        if(Auth::user()->user_type == 7){
            $user_dep = DB::table('personal_info')
            ->where('userid', Auth::user()->user_code)
            ->pluck('department')
            ->first();

            if($user_dep == null){
                abort(403, 'Please provide the personal information first.');
            }

            $totals = DB::table('totalworkinghours')
            ->join('personal_info', 'totalworkinghours.userid', '=', 'personal_info.userid')
            ->where('personal_info.department', $user_dep)
            ->select('totalworkinghours.*')
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

            $totals = DB::table('totalworkinghours')
            ->join('personal_info', 'totalworkinghours.userid', '=', 'personal_info.userid')
            ->where('personal_info.faculty', $user_fac)
            ->select('totalworkinghours.*')
            ->get();
        }
        
        else{
            $totals = TotalWorkingHours::all();
        }

        return view('Timetable.totalworking', compact('totals'));
    }

    public function workingEvaluateReport()
    {
        if(Auth::user()->user_type == 7){
            $user_dep = DB::table('personal_info')
            ->where('userid', Auth::user()->user_code)
            ->pluck('department')
            ->first();

            if($user_dep == null){
                abort(403, 'Please provide the personal information first.');
            }

            $totals = DB::table('evaluateworkinghours')
            ->join('personal_info', 'evaluateworkinghours.userid', '=', 'personal_info.userid')
            ->where('personal_info.department', $user_dep)
            ->select('evaluateworkinghours.*')
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

            $totals = DB::table('evaluateworkinghours')
            ->join('personal_info', 'evaluateworkinghours.userid', '=', 'personal_info.userid')
            ->where('personal_info.faculty', $user_fac)
            ->select('evaluateworkinghours.*')
            ->get();
        }

        else{
            $totals = evaluateworkinghours::all();
        }

        return view('Timetable.workingevaluate', compact('totals'));
    }

    public function printWorkingHours()
    {
        $server = "localhost";
        $user = "root";
        $pass ="";
        $db = "ccp_ewe";
        $sql = "select timetable.*, modules.mod_code, modules.mod_name from timetable,modules where timetable.module = modules.id and timetable.userid = '" . Auth::user()->user_code."'";

        $PHPJasperXML = new PHPJasperXML();
        // $PHPJasperXML->debugsql=true;
        // $PHPJasperXML->arrayParameter=array("parameter1"=>1);

        $PHPJasperXML->load_xml_file("http://localhost/CCP2/ccp_ewe/reports/Working_hours.jrxml"); 
        $PHPJasperXML->sql = $sql;      
        $PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
        $PHPJasperXML->outpage("I");
    }

    public function printTotalWorkings()
    {
        // include_once('/vendor/simitgroup/phpjasperxml/tcpdf/tcpdf.php');
        // include_once("/vendor/simitgroup/phpjasperxml/PHPJasperXML.inc.php");

        if(Auth::user()->user_type == 7){
            $user_dep = DB::table('personal_info')
            ->where('userid', Auth::user()->user_code)
            ->pluck('department')
            ->first();

            if($user_dep == null){
                abort(403, 'Please provide the personal information first.');
            }

            $sql = "select totalworkinghours.* from totalworkinghours, personal_info where totalworkinghours.userid = personal_info.userid and personal_info.department = " .$user_dep;
        }

        else if(Auth::user()->user_type == 8){
            $user_fac = DB::table('personal_info')
            ->where('userid', Auth::user()->user_code)
            ->pluck('faculty')
            ->first();

            if($user_fac == null){
                abort(403, 'Please provide the personal information first.');
            }

            $sql = "select totalworkinghours.* from totalworkinghours, personal_info where totalworkinghours.userid = personal_info.userid and personal_info.faculty = " .$user_fac;
        }
        
        else{
            $sql = "select * from totalworkinghours";
        }

        $server = "localhost";
        $user = "root";
        $pass ="";
        $db = "ccp_ewe";

        $PHPJasperXML = new PHPJasperXML();
        // $PHPJasperXML->debugsql=true;
        // $PHPJasperXML->arrayParameter=array("parameter1"=>1);

        $PHPJasperXML->load_xml_file("http://localhost/CCP2/ccp_ewe/reports/TotalWorkingHours.jrxml"); 
        $PHPJasperXML->sql = $sql;      
        $PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
        $PHPJasperXML->outpage("I");
    }

    public function printEvalWorkings()
    {
        // include_once('/vendor/simitgroup/phpjasperxml/tcpdf/tcpdf.php');
        // include_once("/vendor/simitgroup/phpjasperxml/PHPJasperXML.inc.php");

        if(Auth::user()->user_type == 7){
            $user_dep = DB::table('personal_info')
            ->where('userid', Auth::user()->user_code)
            ->pluck('department')
            ->first();

            if($user_dep == null){
                abort(403, 'Please provide the personal information first.');
            }

            $sql = "select evaluateworkinghours.* from evaluateworkinghours, personal_info where evaluateworkinghours.userid = personal_info.userid and personal_info.department = " .$user_dep;
        }

        else if(Auth::user()->user_type == 8){
            $user_fac = DB::table('personal_info')
            ->where('userid', Auth::user()->user_code)
            ->pluck('faculty')
            ->first();

            if($user_fac == null){
                abort(403, 'Please provide the personal information first.');
            }

            $sql = "select evaluateworkinghours.* from evaluateworkinghours, personal_info where evaluateworkinghours.userid = personal_info.userid and personal_info.faculty = " .$user_fac;
        }
        
        else{
            $sql = "select * from evaluateworkinghours";
        }

        $server = "localhost";
        $user = "root";
        $pass ="";
        $db = "ccp_ewe";

        $PHPJasperXML = new PHPJasperXML();
        // $PHPJasperXML->debugsql=true;
        // $PHPJasperXML->arrayParameter=array("parameter1"=>1);

        $PHPJasperXML->load_xml_file("http://localhost/CCP2/ccp_ewe/reports/EvaluateWorkingHours.jrxml"); 
        $PHPJasperXML->sql = $sql;      
        $PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
        $PHPJasperXML->outpage("I");
    }

    
    // public function printReport()
    // {
    //     $timetable = DB::table('timetable')
    //         ->join('modules', 'timetable.module', '=', 'modules.id')
    //         ->where('timetable.userid', Auth::user()->user_code)
    //         ->select('timetable.*', 'modules.mod_code', 'modules.mod_name')
    //         ->get();

    //     $output = '
    //         <title> Timetable View </title
    //             <style type="text/css">
    //             h2 {
    //               color: #000000;
    //               text-align: center;
    //               text-transform: uppercase;
    //               font-weight: bold;
    //               font-style: oblique;
    //               text-shadow: 2px 2px #d8c2c2;
    //             }
    //             </style>

    //             <h2>Timetable view</h2>
    //             <br>

    //             <table class="table table-striped">  
    //                 <thead>  
    //                   <tr>  
    //                     <th style="border: 1px solid; padding: 12px; width: 100px;">Date </th>  
    //                     <th style="border: 1px solid; padding: 12px; width: 300px;">Module </th>  
    //                     <th style="border: 1px solid; padding: 12px; width: 100px;">Category </th>  
    //                     <th style="border: 1px solid; padding: 12px; width: 50px;">Total Hours </th>              
    //                   </tr>  
    //                 </thead>  
    //                 <tbody>'; 
    //         foreach($timetable as $tt)
    //         { 
    //             $output .='<tr border="none"> 
    //                         <td style="border: 1px solid; padding: 12px;">' .$tt->ddate .'</td>  
    //                         <td style="border: 1px solid; padding: 12px;">' . $tt->mod_code .' - '. $tt->mod_name .'</td>  
    //                         <td style="border: 1px solid; padding: 12px;">' .$tt->category.'</td>  
    //                         <td style="border: 1px solid; padding: 12px;">' .$tt->tot_hours.'</td>
    //                       </tr>';
    //         }

    //         $output .='
    //                 </tbody>  
    //             </table>';

    //     return $output;
    // }
}


