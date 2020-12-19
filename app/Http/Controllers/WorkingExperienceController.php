<?php

namespace App\Http\Controllers;

use App\WorkingExperience;
use App\SystemLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkingExperienceController extends Controller
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
        $exps = WorkingExperience::all();
        return view('WorkingExp.index', compact('exps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('WorkingExp.create');
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
            'organization'=>'required|string',  
            'designation'=>'required|string',
            'department'=>'required|string',
            'start_date' => 'required',
            'years'=>'required',              
        ],[
            'organization.required'=>'Organization Name is required.',  
            'designation.required'=>'Designation is required.',
            'department.required'=>'Department is required.',  
            'start_date.required'=>'Please Select Start Date.',
            'years.required'=>'Please Select End Date.',
        ]);  
  
        $model = new WorkingExperience;  
        $model->organization =  $request->get('organization');  
        $model->designation = $request->get('designation');
        $model->department = $request->get('department');
        $model->start_date = $request->get('start_date');
        $model->years = $request->get('years');
        $model->remarks = $request->get('remarks');        
        $model->userid = Auth::user()->user_code;
          
        $model->save();

        $log = new SystemLog;
        $log->user_id = Auth::user()->user_code;
        $log->section = 'Working Experience';
        $log->category = 'C';
        $log->remark = 'Creating Working Experience';
        $log->save();

        return redirect()->route('experience.index')
                        ->with('success','Faculty created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WorkingExperience  $workingExperience
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model= WorkingExperience::find($id);  
        return view('WorkingExp.view', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WorkingExperience  $workingExperience
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model= WorkingExperience::find($id);  
        return view('WorkingExp.update', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WorkingExperience  $workingExperience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([  
            'organization'=>'required|string',  
            'designation'=>'required|string',
            'department'=>'required|string',
            'start_date' => 'required',
            'years'=>'required',              
        ],[
            'organization.required'=>'Organization Name is required.',  
            'designation.required'=>'Designation is required.',
            'department.required'=>'Department is required.',  
            'start_date.required'=>'Please Select Start Date.',
            'years.required'=>'Please Select End Date.',
        ]);  
  
        $model = WorkingExperience::find($id);  
        $model->organization =  $request->get('organization');  
        $model->designation = $request->get('designation');
        $model->department = $request->get('department');
        $model->start_date = $request->get('start_date');
        $model->years = $request->get('years');
        $model->remarks = $request->get('remarks');

        $model->save();

        $log = new SystemLog;
        $log->user_id = Auth::user()->user_code;
        $log->section = 'Working Experience';
        $log->category = 'E';
        $log->remark = 'Update Working Experience - '. $model->id;
        $log->save();

        return redirect()->route('experience.index')
                        ->with('success','Faculty created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WorkingExperience  $workingExperience
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = WorkingExperience::find($id);

        $log = new SystemLog;
        $log->user_id = Auth::user()->user_code;
        $log->section = 'Working Experience';
        $log->category = 'D';
        $log->remark = 'Delete Working Experience - '. $model->id;
        $log->save();

        $model->delete();

        $exps = WorkingExperience::all();
        return redirect()->route('experience.index', compact('exps'));
    }
}
