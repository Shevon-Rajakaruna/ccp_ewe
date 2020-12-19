<?php

namespace App\Http\Controllers;

use App\Skills;
use App\SystemLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillsController extends Controller
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
        $skills = Skills::all();
        return view('Skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Skills.create');
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
            'skills'=>'required|string',  
        ],[
            'skills.required'=>' Skills are required.',
        ]);   
  
        $model = new Skills;  
        $model->skills =  $request->get('skills');  
        $model->desp = $request->get('desp');
        $model->endorsements = $request->get('endorsements');        
        $model->userid = Auth::user()->user_code;
          
        $model->save();

        $log = new SystemLog;
        $log->user_id = Auth::user()->user_code;
        $log->section = 'Skills';
        $log->category = 'C';
        $log->remark = 'Creating Skills';
        $log->save();

        return redirect()->route('skill.index')
                        ->with('success','Faculty created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model= Skills::find($id);  
        return view('Skills.view', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model= Skills::find($id);  
        return view('Skills.update', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([  
            'skills'=>'required|string',  
        ],[
            'skills.required'=>' Skills are required.',
        ]);  
  
        $model = Skills::find($id);  
        $model->skills =  $request->get('skills');  
        $model->desp = $request->get('desp');
        $model->endorsements = $request->get('endorsements');

        $model->save();

        $log = new SystemLog;
        $log->user_id = Auth::user()->user_code;
        $log->section = 'Skills';
        $log->category = 'E';
        $log->remark = 'Update Skills - '. $model->id . ' - '. $model->skills;
        $log->save();

        return redirect()->route('skill.index')
                        ->with('success','Faculty created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Skills::find($id); 

        $log = new SystemLog;
        $log->user_id = Auth::user()->user_code;
        $log->section = 'Skills';
        $log->category = 'D';
        $log->remark = 'Delete Skills - '. $model->id . ' - '. $model->skills;
        $log->save();
         
        $model->delete();

        $skills = Skills::all();
        return redirect()->route('skill.index', compact('skills'));
    }
}
