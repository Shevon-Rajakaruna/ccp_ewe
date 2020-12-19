<?php

namespace App\Http\Controllers;

use App\Events;
use App\SystemLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventsController extends Controller
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
        $events = Events::where('userid', Auth::user()->user_code)->get();
        return view('Events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function create()
    {
        return view('Events.create');
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
            'ename'=>'required|string',  
            'edesp'=>'string|max:1800',  
            'organizer'=>'required|string',  
            'edate'=>'required|date',
            'etime'=>'required',
        ],[
            // 'ddate.required'=>'Date is required.',  
            // 'module.required'=>'Module is required.',
            // 'module.integer'=>'Select a Module.',  
            // 'category.required'=>'Category is required.',
            // 'category.min'=>'Select a Category.',  
            // 'tot_hours.required'=>'Total Hours is required.',
            // 'tot_hours.between'=>'Total Hours must be greater than 0.'
        ]);    
  
        $event = new Events;  
        $event->ename =  $request->get('ename');  
        $event->edesp = $request->get('edesp');
        $event->organizer = $request->get('organizer');
        $event->edate = $request->get('edate');
        $event->etime = $request->get('etime');
        $event->userid = Auth::user()->user_code;          

        $event->save();

        $log = SystemLog::logRep('Events', 'C', 'Creating a Event By - '. Auth::user()->name);

        return redirect()->route('events.index')
                        ->with('success','Faculty created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event= Events::find($id);  
        return view('Events.view', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event= Events::find($id);  
        return view('Events.update', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([  
            'ename'=>'required|string',  
            'edesp'=>'string|max:1800',  
            'organizer'=>'required|string',  
            'edate'=>'required|date',
            'etime'=>'required',
        ]); 
  
        $event = Events::find($id);  
        $event->ename =  $request->get('ename');  
        $event->edesp = $request->get('edesp');
        $event->organizer = $request->get('organizer');
        $event->edate = $request->get('edate');
        $event->etime = $request->get('etime'); 

        $event->save();

        $log = SystemLog::logRep('Events', 'E', 'Update Event ID - '. $event->id . ', By - '. Auth::user()->name);

        return redirect()->route('events.index')
                        ->with('success','Faculty created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Events::find($id); 

        $log = SystemLog::logRep('Events', 'D', 'Delete Event ID - '. $id . ', By - '. Auth::user()->name);

        $event->delete();

        $events = Events::where('userid', Auth::user()->user_code)->get();
        return view('Events.index', compact('events'));
    }

    public function calendarIndex()
    {
        $events = Events::where('userid', Auth::user()->user_code)->get();
        return view('Events.viewc', compact('events'));
    }
}
