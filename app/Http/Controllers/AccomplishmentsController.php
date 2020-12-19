<?php

namespace App\Http\Controllers;

use App\Accomplishments;
use App\SystemLog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccomplishmentsController extends Controller
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
        $accomps = Accomplishments::all();
        return view('Accomplishments.index', compact('accomps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Accomplishments.create'); 
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
            'title'=>'required|string|max:200',
            'desp' => 'required|string|max:1000' 
        ],[
            'title.required'=>'Title is required.',  
            'title.max'=>'Title may not be greater than 200 characters.',  
            'desp.required'=>'Description is required.',
            'desp.max'=>'Description may not be greater than 1000 characters.'
        ]);    
  
        $acc = new Accomplishments;  
        $acc->desp =  $request->get('desp');  
        $acc->title = $request->get('title');
        $acc->userid = Auth::user()->user_code;  

        $acc->save();
        $log = SystemLog::logRep('Accomplishments', 'C', 'Creating a Accomplishment By - '. Auth::user()->name);

        return redirect()->route('personal.view')
                        ->with('success','Accomplishments created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Accomplishments  $accomplishments
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $accomp = Accomplishments::find($id);

        return view('Accomplishments.view', compact('accomp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Accomplishments  $accomplishments
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $accomp = Accomplishments::find($id);

        return view('Accomplishments.update', compact('accomp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accomplishments  $accomplishments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([  
            'title'=>'required|string|max:200',
            'desp' => 'required|string|max:1000' 
        ],[
            'title.required'=>'Title is required.',  
            'title.max'=>'Title may not be greater than 200 characters.',  
            'desp.required'=>'Description is required.',
            'desp.max'=>'Description may not be greater than 1000 characters.'
        ]); 

        $acc = Accomplishments::find($id);  
        $acc->desp =  $request->get('desp');  
        $acc->title = $request->get('title');  

        $acc->save();
        $log = SystemLog::logRep('Accomplishments', 'E', 'Update Accomplishment ID - '. $acc->id . ', By - '. Auth::user()->name);

        return redirect()->route('personal.view')
                        ->with('success','Accomplishments updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Accomplishments  $accomplishments
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accomp = Accomplishments::find($id);  
        $accomp->delete();
        $log = SystemLog::logRep('Accomplishments', 'D', 'Delete Accomplishment ID - '. $id . ', By - '. Auth::user()->name);

        return redirect()->route('personal.view');
    }
}
