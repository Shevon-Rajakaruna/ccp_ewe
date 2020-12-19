<!doctype html>

    <html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>BigStore: Shopping Invoice</title>
    </head>
    <body>

 
  <style type="text/css">
  
  img {
    padding-top: 10px;
    width: 200px;
    height: 200px;
  }

</style>


  <div class="row" style="background-image: url('/Images/bg.jpg'); height: 300px;">
    
    <div class="col-md-6">
      <div class="profile-sidebar" style="padding-left: 25px;">
        <div id="yourContainer" style="height: 200px; width: 130px;">
        @if($model->image)
          <img src="{{ asset('storage/' . $model->image) }}" alt="" class="img-fluid mb-1">
        @else if
          <img src="/Images/profile_img.jpg" alt="Paris">
        @endif
      </div>

        <div class="profile-user-title">
          <div style="font-size:20px; color: white" class="profile-user-name">
            <b> {{ Auth::user()->name }} </b>
          </div>

          <div style="font-size:15px; color: white" class="profile-user-job">
           <b> {{ App\Designation::select('desp')->Where('user_level', Auth::user()->user_type)->value('desp') }}</b>
          </div>     
        </div>            
      </div>
    </div>
    <div class="col-md-6">
      <h1 style="font-weight: bold;">Curriculum Vitae</h1>
      <div style="font-size:30px; color: white" class="profile-user-name">
        <b> {{ Auth::user()->name }} </b>
      </div>
    </div>
  </div>
  
  <br><br>   
          
  <h3 style="font-size:20px; color: blue; font-weight: bold; font-size: 150%;" class="card-title">Personal Information </h3>
  <br>
  <br>
<div style="background-color: lightblue;">
  <div class="row" style="padding-left: 20px;">
    <label>Full Name:  </label> 
    <p style="padding-left: 10px;"> {{ $model->full_name}}</p>    
  </div>

  <div class="row" style="padding-left: 20px;">
    <label>Date of Birth</label>
    <p style="padding-left: 52px;">:</p>
    <p style="padding-left: 10px;"> {{ $model->dob}}</p>
  </div>

  <div class="row" style="padding-left: 20px;">
    <label>Gender</label>
    <p style="padding-left: 90px;">:</p>
    @if($model->gender == 'M')
    <p style="padding-left: 10px;"> Male</p>
    @else if($model->gender == 'F')
    <p style="padding-left: 10px;"> Female</p>
    @endif  
  </div>         

  <div class="row" style="padding-left: 20px;">
    <label>Email Address: </label>
    <p style="padding-left: 10px;"> {{$model->email}} </p>           
  </div>
    
  <div class="row" style="padding-left: 20px;">
    <label>Contact Number: </label>
    <p style="padding-left: 10px;"> {{$model->contact}} </p>
  </div>

  <div class="row" style="padding-left: 20px;">
    <label>Residential Address: </label>
    <p style="padding-left: 10px;"> {{$model->resident_address}} </p>
  </div>

  <div class="row" style="padding-left: 20px;">
    <label>Workplace Address: </label>
    <p style="padding-left: 10px;"> {{$model->workplace_address}} </p>
  </div>          
</div>
          <br> <br> <br>
<div class="row">
<div class="col-md-6">
    <h3 style="font-size:20px; color: blue; font-weight: bold; font-size: 150%;">Educational Qualifications </h3>
    <!-- <hr style="background-color:black;"> -->
    <hr style="height:10px;color:gray;background-color:gray">
    <br>

  <!--   <div class="table-responsive">
    <table class="table table-striped">
      <tbody>  
      @foreach($education as $edu)  
        <tr border="none">  
          <td>{{$edu->institute}}</td>  
          <td>{{$edu->degree}}</td>  
          <td>{{$edu->field}}</td>
          <td>{{$edu->start_date}}</td>  
          <td>{{$edu->end_date}}</td> 
        </tr>  
      @endforeach  
      </tbody>  
    </table>
    </div> -->
    @foreach($education as $edu) 
    <div>
        <div class="row">
          <p style="padding-left: 10px; font-weight: bold;">{{$edu->institute}}</p>
         </div>
         <div class="row">
          <p style="padding-left: 10px">{{$edu->degree}} -</p> 
             
             
          <p style="padding-left: 10px">{{$edu->field}}</p>
        </div>
        <div class="row">
          <p style="padding-left: 10px">{{$edu->start_date}} -</p>  
          <p style="padding-left: 10px">{{$edu->end_date}}</p> 
        </div>
         </div>
         <br>
      @endforeach
    </div>

    <br>

<div class="col-md-6">
  @if($skil)
      <h3 style="font-size:20px; color: blue; font-weight: bold; font-size: 150%;">Skills and Endorsements </h3>
        <hr style="height:10px;color:gray;background-color:gray">
      <br>

      
        @foreach($skil as $s)  
        <div>
           <div class="row">
            <p style="padding-left: 10px; font-weight: bold;">{{$s->skills}}</p> 
          </div>
            <div class="row"> 
            <p style="padding-left: 10px">{{$s->desp}}</p>
          </div>
            <div class="row">  
            <p style="padding-left: 10px; font-weight: bold;">{{$s->endorsements}}</p>
          </div>
            </div>
            <br>
        @endforeach  
          </div> 
      
  @endif
  <br>
</div>



<div class="row">
 <div class="col-md-6">
  @if($work)
      <h3 style="font-size:20px; color: blue; font-weight: bold; font-size: 150%;">Working Experience </h3>
        <hr style="height:10px;color:gray;background-color:gray">
      <br>

       
        @foreach($work as $exp)  
            <div>
              <div class="row">
            <p style="padding-left: 10px; font-weight: bold;">{{$exp->organization}}</p> 
            </div>
            <div class="row"> 
            <p style="padding-left: 10px">{{$exp->designation}}</p> 
          </div>
            <div class="row"> 
            <p style="padding-left: 10px">{{$exp->department}}</p> 
          </div>
          <div class="row">
            <p style="padding-left: 10px">{{$exp->start_date}} -</p>
            <p style="padding-left: 10px">{{$exp->years}}</p> 
          </div>
          <div class="row">
            <p style="padding-left: 10px">{{$exp->remarks}}</p> 
          </div>
            </div>
           <br>
        @endforeach  
       
      </div>
  @endif

    <div class="col-md-6">
  @if($accomp)
      <h3 style="font-size:20px; color: blue; font-weight: bold; font-size: 150%;">Accomplishments </h3>
        <hr style="height:10px;color:gray;background-color:gray">
      <br>

         
        @foreach($accomp as $acc)  
           <div>
             <div class="row">
            <p style="padding-left: 10px">{{$acc->title}}</p> 
            </div>
             <div class="row"> 
            <p style="padding-left: 10px">{{$acc->desp}}</p>
          </div>
          </div>
          <br>
        @endforeach  
        </div>
    
  @endif
  <br>
</div>

<div class="row">
  <div class="col-md-6">
@if($projcts)
<h3 style="font-size:20px; color: blue; font-weight: bold; font-size: 150%;">Projects </h3>
        <hr style="height:10px;color:gray;background-color:gray">
      <br>

       @foreach($projcts as $pro)
      <div>
        <div class="row">
          <p style="padding-left: 10px; font-weight: bold;">{{$pro->topic}}</p> 
        </div>
         <div class="row"> 
          <p style="padding-left: 10px; ">{{$pro->description}}</p> 
         </div>
          <div class="row"> 
            <p style="padding-left: 10px; ">{{$pro->project_type}} -</p> 
             <p style="padding-left: 10px; ">{{$pro->estimate_time}} -</p> 
          </div>
          <div class="row">
              <p style="padding-left: 10px; ">{{ $pro->mod_code }} - {{ $pro->mod_name }} -</p> 
              <p style="padding-left: 10px; ">{{ $pro->batch}}</p> 
          </div>
           <div class="row"> 
            <p style="padding-left: 10px; ">{{$pro->started_date}} -</p> 
            <p style="padding-left: 10px; ">{{$pro->completed_date}}</p>
           </div>
           
      </div>
      <br>
      @endforeach
    </div>
      @endif

      <div class="col-md-6">
      @if($researchs)
    <h3 style="font-size:20px; color: blue; font-weight: bold; font-size: 150%;">Researches </h3>
        <hr style="height:10px;color:gray;background-color:gray">
      <br>

        @foreach($researchs as $res)  
      <div>
        <div class="row">
          <p style="padding-left: 10px; font-weight: bold;">{{$res->name}}</p> 
        </div>
         <div class="row"> 
          <p style="padding-left: 10px; ">{{$res->description}}</p> 
         </div>
           <div class="row"> 
            <p style="padding-left: 10px; ">{{$res->start_date}} -</p> 
            <p style="padding-left: 10px; ">{{$res->complete_date}}</p>
           </div>
           
      </div>
      <br>
      @endforeach
      </div>
      @endif
    </div>

        @if($pubs)
    <h3 style="font-size:20px; color: blue; font-weight: bold; font-size: 150%;">Publications </h3>
        <hr style="height:10px;color:gray;background-color:gray">
      <br>

       @foreach($pubs as $pub)  
      <div>
        <div class="row">
          <p style="padding-left: 10px; font-weight: bold;">{{$pub->name}}</p> 
          <p style="padding-left: 10px; font-weight: bold ;">{{$pub->pub_version}}</p>
        </div>
          <div class="row"> 
            <p style="padding-left: 10px; ;">{{$pub->publication_type}} </p> 
             
          </div>
           <div class="row"> 
            <p style="padding-left: 10px; ;">{{$pub->pub_date}} </p> 
            
           </div>
           
      </div>
      <br>
      @endforeach

      @endif

   </body>
    </html>