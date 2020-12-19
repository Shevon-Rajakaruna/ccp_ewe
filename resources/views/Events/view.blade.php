@extends('layouts.main')
@section('content')

  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<div class="content-body">
    <h2> Events </h2> 
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header" style="background-color: #ffc107 !important;">
        <h3 class="card-title">View Events</h3>
      </div>
      <div class="card-body">
      <form role="form" method="get">
        @csrf
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label>Event Name:</label>
              <input type="text" class="form-control" name="ename" value="{{$event->ename}}" readonly="true">
            </div>
          </div>
               
          <div class="col-sm-6">
            <div class="form-group">
              <label>Event Description:</label>
              <textarea class="form-control" rows="3" name="edesp" readonly="true">{{$event->edesp}}</textarea>
            </div>           
          </div>    
        </div>

        <div class="row">
          <div class="col-sm-6">
            <label>Event Organizer:</label>
            <input type="text" class="form-control" name="organizer" value="{{$event->organizer}}" readonly="true">
          </div>

          <div class="col-sm-6">
            <label>Event Date</label>
            <input type="date" name="edate" class="form-control"  data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" value="{{$event->edate}}" readonly="true">
          </div>
        </div>
        <br>

        <div class="row"> 
          <div class="col-sm-6">
            <label>Event time:</label>
            <input class="timepicker form-control" type="text" name="etime" value="{{$event->etime}}" readonly="true">
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


