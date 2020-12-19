@extends('layouts.main')
@section('content')

  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<div class="content-body">
    <h2> Workshops </h2> 
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header" style="background-color: #66bb6a !important;">
        <h3 class="card-title">Attended Workshops and Conferences </h3>
      </div>
      <div class="card-body">
      <form role="form" method="GET">
        @csrf
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label> Name of the Event </label>
              <input class="form-control form-control-sm" type="text" name="event_name" value="{{$model->event_name}}">
            </div>
          </div>
             
          <div class="col-sm-4">
            <div class="form-group">
              <label> Workshop /Conference </label>
              <select class="form-control form-control-sm select2" name="workshop" style="width: 100%;">
                <option selected="selected">{{$model->workshop}}</option>
                <option>Workshop</option>
                <option>Conference</option>
              </select>
            </div>           
          </div>

          <div class="col-sm-4">
            <label> Venue </label>
            <input class="form-control form-control-sm" type="text" name="venue" value="{{$model->venue}}">
          </div>    
        </div>

        <div class="row">
          <div class="col-sm-6">
            <label>Event Date</label>
            <input type="date" class="form-control" name="event_date" value="{{$model->event_date}}" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask>
          </div>

          <div class="col-sm-6">
            <label>Event time:</label>
            <div class="input-group date" name="event_time" id="timepicker" data-target-input="nearest">
              <input type="text" class="form-control datetimepicker-input" name="event_time" value="{{$model->event_time}}" data-target="#timepicker"/>
                <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                   <div class="input-group-text"><i class="far fa-clock"></i></div>
                </div>
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


