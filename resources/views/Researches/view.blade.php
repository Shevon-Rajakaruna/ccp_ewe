@extends('layouts.main')
@section('content')

  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<div class="content-body">
    <h2> Researches </h2> 
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header" style="background-color: #ffb342 !important;">
        <h3 class="card-title">View Research Details</h3>
      </div>
      <div class="card-body">
      <form role="form" method="get">
        @csrf
        <div class="row">
          <div class="col-sm-6">
            <label>Research Name </label>
            <input type="text" name="name" class="form-control" value="{{$model->name}}" readonly="true">
          </div>

          <div class="col-sm-6">
            <label>Research Description:</label>
            <textarea class="form-control" rows="3" name="description" readonly="true">{{$model->description}}</textarea>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <label>Research Status</label>
            <input type="text" name="status" class="form-control" value="{{$model->status}}" readonly="true">
          </div>

          <div class="col-sm-6">
            <label>Module: </label>
            <select name="module" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
              <option data-select2-id="3">{{$model->module}}</option>

            </select>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <label>Started Date</label>
            <input type="date" class="form-control" name="start_date" value="{{ $model->start_date }}" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask readonly>
          </div>
          <div class="col-sm-6">
            <label>Group ID</label>
            <input type="text" name="groupID" class="form-control" value="{{ $model->groupID }}" readonly>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <label>Completed Date</label>
            <input type="date" class="form-control" name="complete_date" value="{{ $model->complete_date }}" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask disabled="true">
          </div>
          <div class="col-sm-6">
            <label>Estimated Time Period</label>
            <select class="form-control" name="estimate_time" disabled="true">
              <option>{{$model->estimate_time}}</option>
              <option>4 weeks</option>
              <option>6 weeks</option>
              <option>8 weeks</option>
              <option>10 weeks</option>
              <option>12 weeks</option>
              <option>20 weeks</option>
            </select>
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


