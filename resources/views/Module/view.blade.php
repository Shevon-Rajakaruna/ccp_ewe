@extends('layouts.main')
@section('content')
  
  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<div class="content-body">
  <h2> Modules </h2> 
  <div class="col-md-12">
    <div class="card card">
      <div class="card-header" style="background-color: #6500F9 !important;">
        <h3 class="card-title">View Modules</h3>
      </div>

      <div class="card-body">
        <form role="form" method="get">
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label>Module Code</label>
                <input type="text" name="mod_code" class="form-control" value="{{$module->mod_code}}" readonly="true">
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label>Module Name</label>
                <input type="text" name="mod_name" class="form-control" value="{{$module->mod_name}}" readonly="true">
              </div>
            </div>
            
            <div class="col-sm-4">
              <div class="form-group">
                <label>Department: </label>
                <input type="text" name="department" class="form-control" value="{{$module->department}}" readonly="true">
              </div>           
            </div>
          </div> 

          <div class="row">                 
            <div class="col-sm-6">
              <div class="form-group">
                <label>Year</label>
                <input type="text" name="lec_hours" class="form-control" value="{{$module->year}}" readonly="true">                
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Semester</label>
                <input type="text" name="lec_hours" class="form-control" value="{{$module->semester}}" readonly="true">                
              </div>
            </div>
          </div> 

          <div class="row">     
            <div class="col-sm-3">
              <div class="form-group">
                <label>Lecture Hours</label>
                <input type="text" name="lec_hours" class="form-control" value="{{$module->lec_hours}}" readonly="true">
              </div>
            </div>

            <div class="col-sm-3">
              <div class="form-group">
                <label>Tutorial Hours</label>
                <input type="text" name="tute_hours" class="form-control" value="{{$module->tute_hours}}" readonly="true">
              </div>
            </div>
                    
             <div class="col-sm-3">
              <div class="form-group">
                <label>Laboratory Hours</label>
                <input type="text" name="lab_hours" class="form-control" value="{{$module->lab_hours}}" readonly="true">
              </div>
            </div>

            <div class="col-sm-3">
              <div class="form-group">
                <label>Maximum No. of Lecturers</label>
                <input type="text" name="max_lec" class="form-control" value="{{$module->max_lec}}" readonly="true">
              </div>
            </div>
          </div> 
          
        </form>
      </div>   
    </div>
  </div>
</div>
        

<style type="text/css">
h2 {
  color: #000000;
  text-align: center;
  text-transform: uppercase;
  text-shadow: 2px 2px #d8c2c2;
}
</style>
            
@endsection