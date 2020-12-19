@extends('layouts.main')
@section('content')

 
  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <h2> User Biograghy : {{ $model->userid }} - {{ $model->name }}</h2>
  <br>
  <div class="row" style="background-image: url('/Images/bg.jpg'); height: 300px;">
    
    <div class="col-md-12">
      <div class="profile-sidebar" style="padding-left: 25px;">
        @if($model->image)
          <img src="{{ asset('storage/' . $model->image) }}" alt="" class="img-fluid mb-1">
        @else if
          <img src="/Images/profile_img.jpg" alt="Paris">
        @endif

        <div class="profile-user-title">
          <div style="font-size:20px; color: white" class="profile-user-name">
            <b> {{ $model->name }} </b>
          </div>

          <div style="font-size:15px; color: white" class="profile-user-job">
           <b> {{ $model->desig }}</b>
          </div>
      
        </div>            
      </div>
    </div>
  </div>
  
  <br><br>   
          
  <div class="card card-warning">
    <div class="card-header">
      <h3 style="font-size:20px" class="card-title">Personal Information </h3>
    </div>

    <div class="card-body">
      <form role="form">
        <div class="row">
          <div class="col-sm-4">
            <label>Employee Code</label>              
              <input type="text" name="userid" value="{{$model->userid}}" class="form-control" readonly="true">
          </div>
          <br>
          <div class="col-sm-8">
            <div class="form-group">
              <label>Full Name</label>              
              <input type="text" name="full_name" value="{{$model->full_name}}" class="form-control" readonly="true">
            </div>
          </div>    
        </div>
        <div class="row">
          <div class="col-sm-4">
            <label>Date of Birth</label>
            <input type="date" name="dob" value="{{$model->dob}}" class="form-control"  data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask readonly="true">            
          </div>

          <div class="col-sm-4">
            <label>Gender</label>
            @if($model->gender == 'M')
              <input type="text" name="gender" class="form-control" value="Male" readonly="true">
            @else if($model->gender == 'F')
              <input type="text" name="gender" class="form-control" value="Female" readonly="true">
            @endif           
          </div>

          <div class="col-sm-4">
            <label>NIC</label>
            <input type="text" name="nic" class="form-control" value="{{$model->nic}}" readonly="true">
          </div>
        </div>
        <br>

        <div class="row">
          <div class="col-sm-4">
            <label>Email Address</label>
            <input type="text" name="email" class="form-control" value="{{$model->email}}" readonly="true">           
          </div>
          
          <div class="col-sm-4">
            <label>Contact Number</label>
            <input type="text" name="contact" class="form-control" value="{{$model->contact}}" readonly="true">
          </div>
        </div>
        <br>

        <div class="row">
          <div class="col-sm-6">
            <label>Residential Address</label>
            <textarea class="form-control" rows="3" name="resident_address" readonly="true">{{$model->resident_address}}</textarea>
          </div>

          <div class="col-sm-6">
            <label>Workplace Address</label>
            <textarea class="form-control" rows="3" name="workplace_address" readonly="true">{{$model->workplace_address}}</textarea>
          </div>          
        </div>

          <br> <br> <br>
      </form>
    </div>
  </div>

  <div class="card card-warning">
    <div class="card-header">
      <h3 style="font-size:20px" class="card-title">Educational Qualifications </h3>
    </div>
    <div class="card-body">
      <div class="table-responsive">
      <table class="table table-striped">  
        <thead>  
          <tr>   
            <th>Institute </th>  
            <th>Degree </th>
            <th>Field </th>
            <th>start_date</th>
            <th>end_date</th>
          </tr>  
        </thead>  
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
      </div>
    </div>
  </div>

  @if($skil)
  <div class="card card-warning">
    <div class="card-header">
      <h3 style="font-size:20px" class="card-title">Skills and Endorsements </h3>
    </div>

    <div class="card-body">
      <div class="table-responsive">
      <table class="table table-striped">  
        <thead>  
          <tr>   
            <th>Skills </th>  
            <th>Description </th>  
            <th>Endorsements </th>
          </tr>  
        </thead>  
        <tbody>  
        @foreach($skil as $s)  
          <tr border="none">  
            <td>{{$s->skills}}</td>  
            <td>{{$s->desp}}</td>  
            <td>{{$s->endorsements}}</td>
          </tr>  
        @endforeach  
        </tbody>  
      </table>
      </div>
    </div>
  </div>
  @endif

  @if($accomp)
  <div class="card card-warning">
    <div class="card-header">
      <h3 style="font-size:20px" class="card-title">Accomplishments </h3>
    </div>

    <div class="card-body">
      <div class="table-responsive">
      <table class="table table-striped">  
        <thead>  
          <tr>    
            <th>Title </th>  
            <th>Description </th>
          </tr>  
        </thead>  
        <tbody>  
        @foreach($accomp as $acc)  
          <tr border="none">  
            <td>{{$acc->title}}</td>  
            <td>{{$acc->desp}}</td>  
          </tr>  
        @endforeach  
        </tbody>  
      </table>
      </div> 
    </div>
  </div>
  @endif

  @if($work)
  <div class="card card-warning">
    <div class="card-header">
      <h3 style="font-size:20px" class="card-title" style="relative">Working Experience </h3>
    </div>

    <div class="card-body">
      <div class="table-responsive">
      <table class="table table-striped">  
        <thead>  
          <tr>   
            <th>Organization </th>  
            <th>Designation </th>  
            <th>Department </th> 
            <th>Start Date</th>
            <th>End Date </th> 
            <th>Remarks</th>
          </tr>  
        </thead>  
        <tbody>  
        @foreach($work as $exp)  
          <tr border="none">  
            <td>{{$exp->organization}}</td>  
            <td>{{$exp->designation}}</td>  
            <td>{{$exp->department}}</td> 
            <td>{{$exp->start_date}}</td>
            <td>{{$exp->years}}</td> 
            <td>{{$exp->remarks}}</td> 
          </tr>  
        @endforeach  
        </tbody>  
      </table>
      </div>
    </div>
  </div>
  @endif

<style type="text/css">
  
  img {
    padding-top: 10px;
    width: 200px;
    height: 200px;
  }

  h2 {
  color: #000000;
  text-align: center;
  text-transform: uppercase;
  text-shadow: 2px 2px #d8c2c2;
}

</style>

@endsection
