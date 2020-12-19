<?php

namespace App\Http\Controllers;

use App\Educational;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EducationalController extends Controller
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
        $education = Educational::all();
        return view('Educational.index', compact('education'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Educational.create');
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
            'institute'=>'required|string',  
            'degree'=>'required|string',
            'field'=>'required|string',
            'start_date' => 'required',
            'end_date'=>'required',
              
        ],[
            'institute.required'=>'Institute Name is required.',  
            'degree.required'=>'Degree is required.',
            'field.required'=>'Field of Study is required.',  
            'start_date.required'=>'Please Select Start Date.',
            'end_date.required'=>'Please Select End Date.',
        ]);  
  
        $education = new Educational;  
        $education->institute =  $request->get('institute');  
        $education->degree = $request->get('degree');
        $education->field = $request->get('field');
        $education->start_date = $request->get('start_date');
        $education->end_date = $request->get('end_date');
        $education->userid = Auth::user()->user_code;
          

        $education->save();

        return redirect()->route('educational.index')
                        ->with('success','Faculty created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Educational  $educational
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $education= Educational::find($id);  
        return view('Educational.view', compact('education'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Educational  $educational
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $education= Educational::find($id);  
        return view('Educational.update', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Educational  $educational
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([  
            'institute'=>'required|string',  
            'degree'=>'required|string',
            'field'=>'required|string',
            'start_date' => 'required',
            'end_date'=>'required',
              
        ],[
            'institute.required'=>'Institute Name is required.',  
            'degree.required'=>'Degree is required.',
            'field.required'=>'Field of Study is required.',  
            'start_date.required'=>'Please Select Start Date.',
            'end_date.required'=>'Please Select End Date.',
        ]);  
  
        $education = Educational::find($id);  
        $education->institute =  $request->get('institute');  
        $education->degree = $request->get('degree');
        $education->field = $request->get('field');
        $education->start_date = $request->get('start_date');
        $education->end_date = $request->get('end_date');  

        $education->save();

        return redirect()->route('educational.index')
                        ->with('success','Faculty created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Educational  $educational
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $education = Educational::find($id);  
        $education->delete();

        $education = Educational::all();
        return view('Educational.index', compact('education'));
    }
}
