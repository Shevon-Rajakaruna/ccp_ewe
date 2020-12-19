@extends('layouts.main')
@section('content')

<script src="/almasaeed2010/adminlte/plugins/jquery/jquery.min.js"></script>

<style type="text/css">
h2 {
  color: #000000;
  text-align: center;
  text-transform: uppercase;
  font-weight: bold;
  font-style: oblique;
  text-shadow: 2px 2px #d8c2c2;
  background-color: #07ab85;
  border-radius: 25px;
}
</style>

<div class="wrapper"> 

  <h2>ALl Workshops & Conferences Admin View</h2>
  
  <div class="row">
    <div class="col-sm-8"></div>
    <div class="col-sm-4">
      <form action="/adminSearch" method="get"> 
        <div class="input-group">
          <select name="srch" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
            <option data-select2-id="3">Select a User ...</option>
            @foreach ($users as $user)
              <option value="{{ $user->userid }}">{{ $user->userid }} - {{ $user->full_name }}</option>
            @endforeach
          </select>

          <span class="input-group-prepend">
            <button type="submit" class="btn btn-primary">Search</button>
            <button type="button" name="refresh" id="refresh" class="btn btn-warning btn-sm">Go Back</button>
          </span>
        </div>
      </form>
    </div>
  </div>

  <br>

  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table class="table table-striped">  
            <thead>  
              <tr>
                <th>Name</th> 
                <th>Workshop </th>  
                <th>Event_name </th>  
                <th>Venue </th> 
                <th>Event date</th>
                <th>Event time </th>
              </tr>  
            </thead>  
            <tbody>  
            @foreach($workshps as $work)  
              <tr border="none">  
                <td>{{$work->full_name}}</td>
                <td>{{$work->workshop}}</td>  
                <td>{{$work->event_name}}</td>  
                <td>{{$work->venue}}</td> 
                <td>{{$work->event_date}}</td>
                <td>{{$work->event_time}}</td> 
              </tr>  
            @endforeach  
            </tbody>  
          </table>
        </div>
      </div>
    </div>
  </section>
</div>

<script>

$(document).ready(function(){

 $('#refresh').click(function(){
  // location.reload();
  javascript:history.go(-1)
 });
});

</script>

@endsection  