<?php 

namespace App\Http\Controllers;

use App\Personal;
use App\Educational;
use App\Skills;
use App\Accomplishments; 
use App\WorkingExperience;
use App\Departments;
use App\Faculty;
use App\Publications;
use App\Research;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPJasperXML;
use Response;
use DB;

class PersonalController extends Controller
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
        $personls = Personal::all();
        return view('Personal.index', compact('personls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $loguser = Personal::where('userid', Auth::user()->user_code)
            ->select('userid')
            ->first();

      if ($loguser != null) { 
        abort(403, 'You have already provided your personal information.');
      }
        $ucode = Auth::user()->user_code;
        $email = Auth::user()->email;
        $deps = Departments::all();
        $faculties = Faculty::all();
        return view('Personal.create', compact('ucode', 'email','deps' ,'faculties'));
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
            'full_name'=>'required|string',  
            'nic'=>'required|string',
            'dob'=>'required|date',
            'contact' => 'required|regex:/(0)[0-9]{9}/',
            'resident_address'=>'required|string',
            'workplace_address'=>'required|string',
            'gender'=>'required',
            'faculty'=>'required',
            'department'=>'required',  
        ],[
            'full_name.required'=>'Full Name is required.',  
            'nic.required'=>'NIC is required.',
            'dob.required'=>'Date Of Birth is required.',  
            'contact.required'=>'Contact Number is required.',
            'resident_address.required'=>' Residential Address is required.',  
            'workplace_address.required'=>'Workplace Address is required.',
            'gender.required'=>'Please Select the Gender.',
            'faculty.required'=>'Please Select the Faculty.',
            'department.required'=>'Please Select the Department.',

        ]);  
  
        $model = new Personal;  
        $model->full_name =  $request->get('full_name');  
        $model->resident_address = $request->get('resident_address');
        $model->workplace_address = $request->get('workplace_address');
        $model->nic = $request->get('nic');
        $model->gender = $request->get('gender');
        $model->dob = $request->get('dob');
        $model->email = $request->get('email');
        $model->contact = $request->get('contact');
        $model->faculty = $request->get('faculty');
        $model->department = $request->get('department');
        $model->userid = Auth::user()->user_code;

        if (request()->hasFile('image')) {
            $request->validate([              
                'image' => 'file|image|mimes:jpeg,jpg|dimensions:max_width=250,max_height=250|max:6000',
            ]);

            $model->image = request()->image->store('profile_images','public');
        }
          
        $model->save();

        return redirect()->route('personal.view')
                        ->with('success','Faculty created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user()->user_code;

        $model= Personal::where('userid', $user)->first();
        $education= Educational::where('userid', $user)->get();
        $skil= Skills::where('userid', $user)->get();
        $accomp= Accomplishments::where('userid', $user)->get();
        $work= WorkingExperience::where('userid', $user)->get();

        return view('Personal.view', compact('model', 'education', 'skil', 'accomp', 'work'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model= Personal::find($id);
        $deps = Departments::all();
        $faculties = Faculty::all();  
        return view('Personal.update', compact('model','deps','faculties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([  
            'full_name'=>'required|string',  
            'nic'=>'required|string',
            'dob'=>'required|date',
            'contact' => 'required|regex:/(0)[0-9]{9}/',
            'resident_address'=>'required|string',
            'workplace_address'=>'required|string',
            'gender'=>'required',
            'faculty'=>'required',
            'department'=>'required',  
        ],[
            'full_name.required'=>'Full Name is required.',  
            'nic.required'=>'NIC is required.',
            'dob.required'=>'Date Of Birth is required.',  
            'contact.required'=>'Contact Number is required.',
            'resident_address.required'=>' Residential Address is required.',  
            'workplace_address.required'=>'Workplace Address is required.',
            'gender.required'=>'Please Select the Gender.',
            'faculty.required'=>'Please Select the Faculty.',
            'department.required'=>'Please Select the Department.',
        ]);  
  
        $model = Personal::find($id);  
        $model->full_name =  $request->get('full_name');  
        $model->resident_address = $request->get('resident_address');
        $model->workplace_address = $request->get('workplace_address');
        $model->nic = $request->get('nic');
        $model->gender = $request->get('gender');
        $model->dob = $request->get('dob');
        $model->email = $request->get('email');
        $model->contact = $request->get('contact');
        $model->faculty = $request->get('faculty');
        $model->department = $request->get('department');

        if (request()->hasFile('image')) {
            $request->validate([              
                'image' => 'file|image|max:6000',
            ]);

            $model->image = request()->image->store('profile_images','public');
        }
        
        $model->save();

        return redirect()->route('personal.index')
                        ->with('success','Faculty created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Personal::find($id);  
        $model->delete();

        $personls = Personal::all();
        return view('Personal.index', compact('personls'));
    }

    public function adminSearch(Request $request)
    {
      if(User::checkAdmin())
      {
        $search = $request->get('user');

        $model= DB::table('personal_info')
                ->join('users', 'personal_info.userid', '=', 'users.user_code')
                ->join('designations', 'users.user_type', '=', 'designations.user_level')
                ->where('personal_info.userid', $search)
                ->select('personal_info.*','users.name', 'designations.desp as desig')
                ->first();

        $education= Educational::where('userid', $search)->get();
        $skil= Skills::where('userid', $search)->get();
        $accomp= Accomplishments::where('userid', $search)->get();
        $work= WorkingExperience::where('userid', $search)->get();


        return view('Personal.adminview', compact('model', 'education', 'skil', 'accomp', 'work'));
      }
    }

    public function printPdf()
    {
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($this->printReport());
      // $pdf->loadView('Personal.cv_old');
      $pdf->setPaper('A4', 'portrait');


      return $pdf->stream();
    }

    public function printReport()
    {
      $user = Auth::user()->user_code;
      $usename = Auth::user()->name;

      $model= Personal::where('userid', $user)->first();
      $education= Educational::where('userid', $user)->get();
      $skil= Skills::where('userid', $user)->get();
      $accomp= Accomplishments::where('userid', $user)->get();
      $work= WorkingExperience::where('userid', $user)->get();

      $projcts = DB::table('projects')
          ->join('modules', 'projects.module', '=', 'modules.id')
          ->where('projects.userid', Auth::user()->user_code)
          ->select('projects.*', 'modules.mod_code', 'modules.mod_name')
          ->get();

       $researchs = Research::where('userid', $user)->get();
       

      $pubs = Publications::where('userid', $user)->get();

        $output = '

<!DOCTYPE html>
<html>
<head>
<style type="text/css">
  img {
    padding-top: 10px;
    width: 200px;
    height: 200px;
  }
  .list {
     list-style-type: initial;
     display:list-item; 
     }

</style>
</head>
<body>
  
  <div class="row">
    <div class="col-md-6" style="float: left;">
      <div class="profile-sidebar" style="padding-left: 25px;">
        <div id="yourContainer" style="height: 200px; width: 130px;">
          <img src="' . url("http://localhost/CCP2/ccp_ewe/storage/app/public/" . $model->image) . '" alt="" class="img-fluid mb-1">
        </div>           
      </div>
    </div>
    <div class="col-md-6" style="float: right;">
      <h1 style="font-weight: bold;">Curriculum Vitae</h1>
      <div style="font-size:25px;" class="profile-user-name">
        <b> '. $usename . ' </b>
      </div>
    </div>
  </div>
  
  <br><br><br>  
          
  <h3 style="font-size:20px; color: blue; font-weight: bold; font-size: 150%; padding-top:200px;" class="card-title">Personal Information </h3>
  <hr style="height:10px;color:gray;background-color:gray">

  <div style="background-color: lightblue;">
    <div class="row" style="padding-left: 20px; padding-top: 10px;">
      <label>Full Name: '. $model->full_name.' </label> 
      <p></p>    
    </div>

    <div class="row" style="padding-left: 20px;">
      <label>Date of Birth: '. $model->dob.'</label>
      <p> </p>
    </div>        

    <div class="row" style="padding-left: 20px;">
      <label>Email Address: '.$model->email.'</label> 
      <p> </p>         
    </div>
      
    <div class="row" style="padding-left: 20px;">
      <label>Contact Number: '.$model->contact.'</label>
      <p> </p>
    </div>

    <div class="row" style="padding-left: 20px;">
      <label>Residential Address: '.$model->resident_address.'</label>
      <p> </p>
    </div>

    <div class="row" style="padding-left: 20px;">
      <label>Workplace Address: '.$model->workplace_address.'</label>
      <p> </p>
    </div>          
  </div>
  <br>


    <div class="col-md-6">
      <h3 style="font-size:20px; color: blue; font-weight: bold; font-size: 150%;">Educational Qualifications </h3>
      <hr style="height:10px;color:gray;background-color:gray">
      <br>';

    foreach($education as $edu) {
    $output .='<div>
        
      <div>
        <p class="list" style="padding-left: 10px; font-weight: bold;">' .$edu->degree . ' ( ' .$edu->start_date . ' - ' .$edu->end_date . '): '.$edu->field . '</p> 
      
        <p style="padding-left: 10px;"> From ' .$edu->institute. '</p>
      </div>';
    }
    $output .= '</div>

    <br>

    <div class="col-md-6">
      <h3 style="font-size:20px; color: blue; font-weight: bold; font-size: 150%;">Skills and Endorsements </h3>
        <hr style="height:10px;color:gray;background-color:gray">
      <br>';

      
    foreach($skil as $s) { 
    $output .= '<div>
      <div class="row">
        <p class="list" style="padding-left: 10px; font-weight: bold;">'.$s->skills.': '.$s->desp.'</p>

        <p style="padding-left: 10px;">'.$s->endorsements.'</p>
      </div>
    </div>
            <br>';
    }  
    $output .='</div> 
    <br>

    <div class="col-md-6">
      <h3 style="font-size:20px; color: blue; font-weight: bold; font-size: 150%;">Working Experience </h3>
        <hr style="height:10px;color:gray;background-color:gray">
      <br>';
       
    foreach($work as $exp){
    $output .='<div>
        <p class="list" style="padding-left: 10px; font-weight: bold;" >'.$exp->designation.' in '.$exp->department.': </p>
        <p style="padding-left: 10px; ">'.$exp->organization.' ('.$exp->start_date.' - '.$exp->years.')</p>        
      </div>';
    }  
       
    $output .='</div>

    <div class="col-md-6">
      <h3 style="font-size:20px; color: blue; font-weight: bold; font-size: 150%;">Accomplishments </h3>
        <hr style="height:10px;color:gray;background-color:gray">
      <br>';

    foreach($accomp as $acc){
    $output .='<div>
        <p class="list" style="padding-left: 10px;></p>
        <p style="padding-left: 10px; font-weight: bold; display: inline">'.$acc->title.': </p>
        <p style="padding-left: 10px; display: inline">'.$acc->desp.'</p>
        <p></p>
         
      </div>';
    }  
    $output .='</div>
    <br>

    <div class="col-md-6">
      <h3 style="font-size:20px; color: blue; font-weight: bold; font-size: 150%;">Projects </h3>
      <hr style="height:10px;color:gray;background-color:gray">
      <br>';

    foreach($projcts as $pro){
    $output .='<div>
      <div class="row">
        <p class="list" style="padding-left: 10px;></p>
        <p class="list" style="padding-left: 10px; font-weight: bold; display: inline">'.$pro->topic.': </p> 
 
        <p style="padding-left: 10px; display: inline">'.$pro->description.' </p> 

        <p style="padding-left: 10px; display: inline"> ('.$pro->started_date.' - '.$pro->completed_date.') </p>
      </div>
    </div>
    <br>';
    }
    $output .='</div>

      <div class="col-md-6">

    <h3 style="font-size:20px; color: blue; font-weight: bold; font-size: 150%;">Researches </h3>
        <hr style="height:10px;color:gray;background-color:gray">
      <br>';

      foreach($researchs as $res) { 
      $output .='<div>
        <div class="row">
          <p class="list" style="padding-left: 10px;></p>
          <p class="list" style="padding-left: 10px; font-weight: bold; display: inline">'.$res->name.': </p> 
 
          <p style="padding-left: 10px; display: inline">'.$res->description.' </p> 

          <p style="padding-left: 10px; display: inline"> ('.$res->start_date.' - '.$res->complete_date.') </p>
        </div>  
      </div>
      <br>';
      }
      $output .='</div>


    <h3 style="font-size:20px; color: blue; font-weight: bold; font-size: 150%;">Publications </h3>
        <hr style="height:10px;color:gray;background-color:gray">
      <br>';

      foreach($pubs as $pub) {
      $output .='<div>
        <div class="row">
          <p class="list" style="padding-left: 10px;></p>
          <p class="list" style="padding-left: 10px; font-weight: bold; display: inline">'.$pub->name.' </p> 
 
          <p style="padding-left: 2px; display: inline">('.$pub->pub_version.' Edition): </p> 

          <p style="display: inline"> '.$pub->pub_description.' </p>

          <p style="display: inline"> ('.$pub->pub_date.')</p> 
        </div>
      </div>
      <br>
      </body>
</html>';
      }

        return $output;
    }
}
