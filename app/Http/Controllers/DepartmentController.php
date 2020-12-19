<?php 

namespace App\Http\Controllers;

use App\Departments;
use App\Faculty;
use App\Module;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class DepartmentController extends Controller
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
        if(User::checkAdmin())
        {
            $deps = Departments::all();
            return view('Department.index', compact('deps'));
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
            $faculty = Faculty::all();  

            return view('Department.create', compact('faculty'));
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
            'desp'=>'required|string|max:100',  
            'faculty'=>'required|integer',
        ],[
            'faculty.required'=>'Faculty is required.',
            'faculty.integer'=>'Select a Faculty.',  
            'desp.required'=>'Description is required.',
            'desp.max'=>'Description may not be greater than 100 characters.',
        ]); 
  
        $dep = new Departments;  
        $dep->desp =  $request->get('desp');  
        $dep->faculty = $request->get('faculty');  

        $dep->save();

        return redirect()->route('department.index', compact('dep'))
                        ->with('success','Department created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(User::checkAdmin())
        {
            $dep= Departments::find($id);  
            return view('Department.view', compact('dep'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(User::checkAdmin())
        {
            $faculty = Faculty::all();
            $dep= Departments::find($id);  
            return view('Department.update', compact('dep','faculty'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([  
            'desp'=>'required|string|max:100',  
            'faculty'=>'required|integer',
        ],[
            'faculty.required'=>'Faculty is required.',
            'faculty.integer'=>'Select a Faculty.',  
            'desp.required'=>'Description is required.',
            'desp.max'=>'Description may not be greater than 100 characters.',
        ]);  
  
        $dep = Departments::find($id);  
        $dep->desp =  $request->get('desp');  
        $dep->faculty = $request->get('faculty');  

        $dep->save();

        return redirect()->route('department.index')
                        ->with('success','Department created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dep = Departments::find($id);  
        $dep->delete();

        $deps = Module::all();
        return redirect()->route('department.index', compact('deps')); 
        //view('Department.index', compact('deps'));
    }

    public function userView()
    {
        $facultis = Faculty::all();  
        return view('Department.user_view', compact('facultis'));
    }

    public function getDepartments(Request $request)
    {
        $data = Departments::where('faculty',$request->faculty_id)->get();
        return response()->json($data);
    }
}
 