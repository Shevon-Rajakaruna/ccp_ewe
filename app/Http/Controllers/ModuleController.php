<?php

namespace App\Http\Controllers;

use App\Module;
use App\Departments;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Response;
use PHPJasperXML;

class ModuleController extends Controller
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
    // admin index view
    public function index() 
    {
        if(User::checkAdmin()) 
        {
            $modules = DB::table('modules')
                ->join('departments', 'modules.department', '=', 'departments.id')
                ->select('modules.*', 'departments.desp')
                ->get();

            return view('Module.index', compact('modules'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(User::checkAdmin()) 
        {
            $deps = Departments::all();  

            return view('Module.create', compact('deps'));
        }
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
            'mod_code'=>'required|string|max:100',  
            'mod_name'=>'required|string|max:100',
            'department'=>'required|integer',  
            'year'=>'required|integer',
            'semester'=>'required|integer',  
            'lec_hours'=>'required|integer',
            'lab_hours'=>'required|integer',  
            'tute_hours'=>'required|integer',
            'max_lec'=>'required|integer',
            

        ],[
            'mod_code.required'=>'Faculty is required.',
            'mod_code.max'=>'Module Code may not be greater than 10 character.',

            'mod_name.required'=>'Description is required.',
            'mod_name.max'=>'Module Name may not be greater than 100 characters.',

            'department.required'=>'Faculty is required.',
            'department.integer'=>'Select a Department.',
              
            'year.required'=>'Description is required.',
            'year.integer'=>'Select a Year.',

            'semester.required'=>'Faculty is required.',
            'semester.integer'=>'Select a Semester.',
              
            'lec_hours.required'=>'Description is required.',
            'lec_hours.integer'=>'Select Lecture Hours.',

            'lab_hours.required'=>'Faculty is required.',
            'lab_hours.integer'=>'Select Labratory Hours.',
              
            'tute_hours.required'=>'Description is required.',
            'tute_hours.integer'=>'Select Tutorial Hours.',
              
            'max_lec.required'=>'Description is required.',
            'max_lec.integer'=>'Select Maximum Number of Lecturers .',
        ]);
  
        $module = new Module;  
        $module->mod_code =  $request->get('mod_code');  
        $module->mod_name = $request->get('mod_name');  
        $module->department = $request->get('department');  
        $module->year = $request->get('year');
        $module->semester =  $request->get('semester');  
        $module->lec_hours = $request->get('lec_hours');  
        $module->tute_hours = $request->get('tute_hours');  
        $module->lab_hours = $request->get('lab_hours');
        $module->max_lec = $request->get('max_lec');

        $module->save();

        return redirect()->route('module.adminindex')
                        ->with('success','Module created successfully.'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(User::checkAdmin()) 
        {
            $module= Module::find($id);  
            return view('Module.view', compact('module'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(User::checkAdmin()) 
        {
            $deps = Departments::all();
            $module= Module::find($id);  
            return view('Module.update', compact('module', 'deps'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([  
            'mod_code'=>'required|string|max:100',  
            'mod_name'=>'required|string|max:100',
            'department'=>'required|integer',  
            'year'=>'required|integer',
            'semester'=>'required|integer',  
            'lec_hours'=>'required|integer',
            'lab_hours'=>'required|integer',  
            'tute_hours'=>'required|integer',
            'max_lec'=>'required|integer',
        ],[
            'mod_code.required'=>'Faculty is required.',
            'mod_code.max'=>'Module Code may not be greater than 10 character.',

            'mod_name.required'=>'Description is required.',
            'mod_name.max'=>'Module Name may not be greater than 100 characters.',

            'department.required'=>'Faculty is required.',
            'department.integer'=>'Select a Department.',
              
            'year.required'=>'Description is required.',
            'year.integer'=>'Select a Year.',

            'semester.required'=>'Faculty is required.',
            'semester.integer'=>'Select a Semester.',
              
            'lec_hours.required'=>'Description is required.',
            'lec_hours.integer'=>'Select Lecture Hours.',

            'lab_hours.required'=>'Faculty is required.',
            'lab_hours.integer'=>'Select Labratory Hours.',
              
            'tute_hours.required'=>'Description is required.',
            'tute_hours.integer'=>'Select Tutorial Hours.',
              
            'max_lec.required'=>'Description is required.',
            'max_lec.integer'=>'Select Maximum Number of Lecturers .',
        ]); 
  
        $module = Module::find($id);  
        $module->mod_code =  $request->get('mod_code');  
        $module->mod_name = $request->get('mod_name');  
        $module->department = $request->get('department');  
        $module->year = $request->get('year');
        $module->semester =  $request->get('semester');  
        $module->lec_hours = $request->get('lec_hours');  
        $module->tute_hours = $request->get('tute_hours');  
        $module->lab_hours = $request->get('lab_hours');
        $module->max_lec = $request->get('max_lec');

        $module->save();

        return redirect()->route('module.adminindex')
                        ->with('success','Module updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = Module::find($id);  
        $module->delete();

        $modules = DB::table('modules')
            ->join('departments', 'modules.department', '=', 'departments.id')
            ->select('modules.*', 'departments.desp')
            ->get();

        return redirect()->route('module.adminindex', compact('modules'));
    }

    public function userIndex(){

        $deps = Departments::all();

        return view('Module.user_index', compact('deps'));
    }

    public function getModules(Request $request)
    {
        $data = Module::where('department',$request->dep_id)->get();

        return response()->json($data);
    }

    public function search(Request $request)
    {
        $search = $request->get('srch');
        $modules = DB::table('modules')
        ->join('departments', 'modules.department', '=', 'departments.id')
        ->where('mod_name', 'like', '%' .$search. '%')
        ->select('modules.*', 'departments.desp')
        ->paginate(5);
        return view('Module.index', ['modules' => $modules]);
    }

    public function printModuleReport($mod_code)
    {
        $server = "localhost";
        $user = "root";
        $pass ="";
        $db = "ccp_ewe";
        $sql = "select modules.*,departments.desp as dep, timetable.module, timetable.category, personal_info.full_name from timetable, modules, personal_info, departments where modules.id = timetable.module and timetable.userid = personal_info.userid and modules.department = departments.id and modules.id = " .$mod_code."";

        $PHPJasperXML = new PHPJasperXML();
        // $PHPJasperXML->debugsql=true;
        // $PHPJasperXML->arrayParameter=array("parameter1"=>1);

        $PHPJasperXML->load_xml_file("http://localhost/CCP2/ccp_ewe/reports/Modulereport1.jrxml"); 
        $PHPJasperXML->sql = $sql;      
        $PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
        $PHPJasperXML->outpage("I");
    }

}
