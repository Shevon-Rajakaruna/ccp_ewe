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
        <h3 class="card-title">Add Modules</h3>
      </div>

      <div class="card-body">
        <form role="form" method="post" action="{{ route('module.update',$module->id) }}">
          @csrf

          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
      
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label>Module Code</label>
                <input type="text" name="mod_code" class="form-control" value="{{$module->mod_code}}">
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label>Module Name</label>
                <input type="text" name="mod_name" class="form-control" value="{{$module->mod_name}}">
              </div>
            </div>
            
            <div class="col-sm-4">
              <div class="form-group">
                <label>Department: </label>
                <select name="department" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                  <option data-select2-id="3">{{ $module->department }}</option>
                  @foreach ($deps as $dep)
                      <option value="{{ $dep->id }}">{{ $dep->desp }}</option>
                  @endforeach
                </select>
              </div>           
            </div>
          </div> 

          <div class="row">                 
             <div class="col-sm-6">
              <div class="form-group">
                <label>Year</label>
                <input type="text" name="year" class="form-control" value="{{$module->year}}">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Select Semester</label>
                <select name="semester" class="form-control">
                  <option>{{ $module->semester }}</option>
                  <option>01</option>
                  <option>02</option>
                </select>
              </div>
            </div>
          </div> 

          <div class="row">     
            <div class="col-sm-3">
              <div class="form-group">
                <label>Lecture Hours</label>
                <input type="text" name="lec_hours" class="form-control" value="{{$module->lec_hours}}">
              </div>
            </div>

            <div class="col-sm-3">
              <div class="form-group">
                <label>Tutorial Hours</label>
                <input type="text" name="tute_hours" class="form-control" value="{{$module->tute_hours}}">
              </div>
            </div>
                    
             <div class="col-sm-3">
              <div class="form-group">
                <label>Laboratory Hours</label>
                <input type="text" name="lab_hours" class="form-control" value="{{$module->lab_hours}}">
              </div>
            </div>

            <div class="col-sm-3">
              <div class="form-group">
                <label>Select Maximum No. of Lecturers</label>
                <select name="max_lec" class="form-control">
                  <option>{{$module->max_lec}}</option>
                  <option>01</option>
                  <option>02</option>
                  <option>03</option>
                  <option>04</option>
                </select>
              </div>
            </div>

          </div> 
 
          <div class="row">
            <div class="col-sm-2">
              <td><button type="submit" class="btn btn-block btn-success btn-sm">Update</button></td>
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