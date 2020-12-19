<?php

namespace App\Http\Controllers;

use App\SystemLog; 
use App\User;
use App\Projects;
use App\Publications;
use App\Research;
use App\Workshops;
use App\TotalWorkingHours;
use App\EvaluateWorkingHours;
use App\Designation;
use App\Personal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DataTables;


class SiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $project_count = Projects::getProjectCount();
        $pub_count = Publications::getPubCount();
        $reserch_count = Research::getResearchCount();
        $workshop_count = Workshops::getWorkshopsCount();

        $loguser = Personal::where('userid', Auth::user()->user_code)
            ->select('userid')
            ->first();


        if($loguser != null){
            if(Auth::user()->user_type == 7){
                $user_dep = DB::table('personal_info')
                ->where('userid', Auth::user()->user_code)
                ->pluck('department')
                ->first();

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
        }
        else{
            $users = DB::table('personal_info')
            ->select('personal_info.userid','personal_info.full_name')
            ->get();
        }

        return view('Site.index', compact('project_count','pub_count','reserch_count', 'workshop_count', 'users'));
    }
 
    public function adminPanel(){

        if(Auth::user()->user_type == 0 || Auth::user()->user_type == 7 || Auth::user()->user_type == 8 || Auth::user()->user_type == 9)
        {

            if(Auth::user()->user_type == 7){
                $user_dep = DB::table('personal_info')
                ->where('userid', Auth::user()->user_code)
                ->pluck('department')
                ->first();

                if($user_dep == null){
                    abort(403, 'Please provide the personal information first.');
                }

                $data = DB::table('timetable')
                ->join('modules', 'timetable.module', '=', 'modules.id')
                ->join('personal_info', 'timetable.userid', '=', 'personal_info.userid')
                ->join('users', 'timetable.userid', '=', 'users.user_code')
                ->join('designations', 'users.user_type', '=', 'designations.user_level')
                ->where('personal_info.department', $user_dep)
                ->select('personal_info.full_name', 'designations.desp as desig','modules.mod_code', 'modules.mod_name','timetable.category', 'timetable.tot_hours as hours')
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

                $data = DB::table('timetable')
                ->join('modules', 'timetable.module', '=', 'modules.id')
                ->join('personal_info', 'timetable.userid', '=', 'personal_info.userid')
                ->join('users', 'timetable.userid', '=', 'users.user_code')
                ->join('designations', 'users.user_type', '=', 'designations.user_level')
                ->where('personal_info.faculty', $user_fac)
                ->select('personal_info.full_name', 'designations.desp as desig','modules.mod_code', 'modules.mod_name','timetable.category', 'timetable.tot_hours as hours')
                ->get();
            }
            
            else{
                $data = DB::table('timetable')
                ->join('modules', 'timetable.module', '=', 'modules.id')
                ->join('personal_info', 'timetable.userid', '=', 'personal_info.userid')
                ->join('users', 'timetable.userid', '=', 'users.user_code')
                ->join('designations', 'users.user_type', '=', 'designations.user_level')
                ->select('personal_info.full_name', 'designations.desp as desig','modules.mod_code', 'modules.mod_name','timetable.category', 'timetable.tot_hours as hours')
                ->get();
            }
        
            

            return view('Site.adminpanel', compact('data'));
        }
        else{
            abort(403, 'Unauthorized action.');
        }
    }

    public function logReport()
    {
        if(Auth::user()->user_type == 0 || Auth::user()->user_type == 7 || Auth::user()->user_type == 8 || Auth::user()->user_type == 9)
        {
            $logs = DB::select('SELECT system_log.*, users.name FROM system_log INNER JOIN users ON system_log.user_id = users.user_code');

            return view('Site.logview', compact('logs'));
        }
        else{
            abort(403, 'Unauthorized action.');
        }
    }

    public function login(){
        return view('Site.login'); 
    }

    public function signup(){
        return view('Site.signup');
    }

    // public function welcome(){
    //     return view('Site.welcome');
    // }

    public function userReport()
    {
        if(Auth::user()->user_type == 0 || Auth::user()->user_type == 7 || Auth::user()->user_type == 8 || Auth::user()->user_type == 9)
        {
            $users = DB::select('SELECT users.*, designations.desp FROM users INNER JOIN designations ON users.user_type = designations.user_level');

            $desig = Designation::all();

            return view('Site.users_index', compact('users','desig'));
        }
        else{
            abort(403, 'Unauthorized action.');
        }
    }

    public function editUser($id)
    {
        if(Auth::user()->user_type == 0 || Auth::user()->user_type == 7 || Auth::user()->user_type == 8 || Auth::user()->user_type == 9)
        {

            $users = DB::table('users')
                ->join('designations', 'users.user_type', '=', 'designations.user_level')
                ->where('users.id', $id)
                ->select('users.*', 'designations.desp as desig', 'designations.user_level')
                ->first();

            $desig = Designation::all();

            return view('Site.user_update', compact('users','desig'));
        }
        else{
            abort(403, 'Unauthorized action.');
        }
    }

    public function userUpdate(Request $request, $id)
    {
        $request->validate([  
            'name' => ['required', 'string', 'max:255'],
            'user_type' => ['required','integer'],
        ],[
            'user_type.integer'=>'Select the Designation.',  
        ]);
  
        $model = User::find($id);  
        $model->name =  $request->get('name');  
        $model->user_type = $request->get('user_type');

        $model->save();

        return redirect()->route('site.users')
                        ->with('success','successfully.');
    }

    public function faceDetect(){
        return view('Site.face_detect');
    }

    public function reportIndex(){
        if(Auth::user()->user_type == 0 || Auth::user()->user_type == 7 || Auth::user()->user_type == 8 || Auth::user()->user_type == 9)
        {
            return view('Site.report_index');
        }
        else{
            abort(403, 'Unauthorized action.');
        }        
    }
}

?>