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
  background-color: #ffb342;
  border-radius: 25px;
}
</style>

<div class="wrapper"> 

  <h2>Researches Admin view</h2>

  <div class="row">
    <div class="col-sm-8"></div>
    <div class="col-sm-4">
      <form action="/admsearch" method="get"> 
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
                <th>Research Name </th>  
                <th>Description </th>  
                <th>Status </th>
                <th>Module </th>
                <th>Start Date </th>
                <th>Completed Date </th> 
                <th>Batch </th>
                <th>Estimate Time</th>
              </tr>  
            </thead>  
            <tbody>  
            @foreach($researchs as $res)  
              <tr border="none">
                <td>{{$res->full_name}}</td>  
                <td>{{$res->name}}</td>  
                <td>{{$res->description}}</td>  
                <td>{{$res->status}}</td>
                <td>{{ $res->mod_code }} - {{ $res->mod_name }}</td>  
                <td>{{$res->start_date}}</td>  
                <td>{{$res->complete_date}}</td>
                <td>{{$res->groupID}}</td>  
                <td>{{$res->estimate_time}}</td>
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
  javascript:history.go(-1)
 });


});
</script>

@endsection  