@extends('layouts.main')
@section('content')

  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<div class="content-body">
    <h2> Faculties </h2> 
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header" style="background-color: #6500F9 !important;">
        <h3 class="card-title">View Faculty</h3>
      </div>
      <div class="card-body">
      <form role="form" method="post" action="{{ route('department.store') }}">
        @csrf
        <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                  <label>Faculty Name: </label>
                  <input type="text" name="name" class="form-control" value="{{$faculty->name}}" readonly="true">
              </div>
            </div>
                
            <div class="col-sm-6">
              <div class="form-group">
                <label>Faculty Description: </label>
                <textarea class="form-control" name="desp" rows="3" readonly="true">{{$faculty->desp}}</textarea>
              </div>           
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


