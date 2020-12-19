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
  background-color: #6610f2;
  border-radius: 25px;
}
</style>

<div class="wrapper"> 
<section class="content">
  <h2>Projects Admin View</h2>
  
  <div class="row">
    <div class="col-sm-8"></div>
    <div class="col-sm-4">
      <form action="/adsearch" method="get"> 
        <div class="input-group">
          <select name="srch" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
            <option data-select2-id="3">Select a User ...</option>
            @foreach ($users as $user)
              <option value="{{ $user->userid }}">{{ $user->userid }} - {{ $user->full_name }}</option>
            @endforeach
          </select>

          <!-- <input type="search" name="srch" class="form-control"> -->
          <span class="input-group-prepend">
            <button type="submit" class="btn btn-primary">Search</button>
            <button type="button" name="refresh" id="refresh" class="btn btn-warning btn-sm">Go Back</button>
          </span>
        </div>
      </form>
    </div>
  </div>
  <br>

  
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table class="table table-striped">   
            <thead>  
              <tr>
                <th>Name </th>
                <th>Topic </th>  
                <th>Description </th>  
                <th>Type </th>
                <th>Start date </th>  
                <th>Completed date </th>  
                <th>Module </th>
                <th>Estimate Time </th>  
                <th>Batch </th> 
              </tr>  
            </thead>  
            <tbody>  
            @foreach($projcts as $pro)  
              <tr border="none">
                <td>{{$pro->full_name}}</td>
                <td>{{$pro->topic}}</td>  
                <td>{{$pro->description}}</td>  
                <td>{{$pro->project_type}}</td>
                <td>{{$pro->started_date}}</td>  
                <td>{{$pro->completed_date}}</td>  
                <td>{{ $pro->mod_code }} - {{ $pro->mod_name }}</td>
                <td>{{$pro->estimate_time}}</td>  
                <td>{{$pro->batch}}</td>
        
              </tr>  
            @endforeach  
            </tbody>  
          </table>
          {{ csrf_field() }}
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