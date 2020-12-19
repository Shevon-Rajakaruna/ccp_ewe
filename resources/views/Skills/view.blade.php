@extends('layouts.main')
@section('content')

  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<div class="content-body">
    <h2> Skills </h2> 
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header" style="background-color: #6500F9 !important;">
        <h3 class="card-title">View Skills and Endorsements</h3>
      </div>
      <div class="card-body">
      <form role="form" method="get">
        @csrf
        <div class="row">
          <div class="col-sm-12">
            <label> Add Skills </label>
            <input class="form-control" type="text" name="skills" value="{{$model->skills}}" readonly="true">
          </div>
        </div>
        <br>

        <div class="row">       
          <div class="col-sm-12">
            <label> Description </label>
            <textarea class="form-control" rows="3" name="desp" readonly="true">{{$model->desp}}</textarea>
          </div>    
        </div>
        <br>

        <div class="row">       
          <div class="col-sm-12">
            <label> Endorsements </label>
            <textarea class="form-control" rows="3" name="endorsements" readonly="true">{{$model->endorsements}}</textarea>
          </div>    
        </div>

        <br>
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


