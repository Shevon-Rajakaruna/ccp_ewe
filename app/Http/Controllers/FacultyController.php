<?php
 
namespace App\Http\Controllers;

use App\Faculty;
use App\Departments;
use App\Module;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use DB;

class FacultyController extends Controller
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
            $faculty = Faculty::all();
            return view('Faculty.index', compact('faculty'));
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
            return view('Faculty.create');
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
            'name'=>'required', 
        ]);  
  
        $faculty = new Faculty;  
        $faculty->name =  $request->get('name');  
        $faculty->desp = $request->get('desp');  

        $faculty->save();

        return redirect()->route('faculty.index')
                        ->with('success','Faculty created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(User::checkAdmin())
        {
            $faculty= Faculty::find($id);  
            return view('Faculty.view', compact('faculty'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(User::checkAdmin())
        {
            $faculty= Faculty::find($id);  
            return view('Faculty.update', compact('faculty'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([  
            'name'=>'required', 
        ]);  
  
        $faculty = Faculty::find($id);  
        $faculty->name =  $request->get('name');  
        $faculty->desp = $request->get('desp');  

        $faculty->save();

        return redirect()->route('faculty.index')
                        ->with('success','Faculty created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::checkAdmin())
        {
            $faculty = Faculty::find($id);  
            $faculty->delete();

            $faculties = Module::all();
            return view('Faculty.index', compact('faculties'));
        }
    }

    public function adminIndex()
    {
        if(User::checkAdmin())
        {
            $faculty = Faculty::all();
            $departments = DB::table('departments')
                ->join('faculty', 'departments.faculty', '=', 'faculty.id')            
                ->select('departments.*', 'faculty.name')
                ->get();


            return view('Faculty.adminFaculty', compact('faculty','departments'));
        }
    }
}
