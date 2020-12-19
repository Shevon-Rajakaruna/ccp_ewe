@extends('layouts.main')
@section('content')

  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<div class="content-body">
    <h2> Publications </h2> 
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header" style="background-color: #66bb6a !important;">
        <h3 class="card-title">View Publication Details</h3>
      </div>
      <div class="card-body">
      <form role="form" method="GET">
        @csrf
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label>Publication Name / Title </label>
              <input type="text" name="name" class="form-control" value="{{$model->name}}" readonly="true">
            </div>
          </div>
             
          <div class="col-sm-6">
            <div class="form-group">
              <label>Publication Description:</label>
              <textarea class="form-control" rows="3" readonly="true"> {{$model->pub_description}}</textarea>
            </div>           
          </div>    
        </div>

        <div class="row">
          <div class="col-sm-4">
            <label>Publication Type</label>
            <select class="form-control" name="publication_type">
              <option>{{$model->publication_type}}</option>
              <option>Self Publication</option>
              <option>Publications with a Staff of Writers</option>
              <option>Magazines</option>
              <option>Scholarly Journals</option>
              <option>Books</option>
              <option>Newspaper Articles</option>
              <option>Conference Papers</option>
              <option>Theses</option>
              <option>Other</option>
            </select>
          </div>

          <div class="col-sm-4">
            <label>Publication Edition</label>
            <select class="form-control" name="pub_version">
              <option>{{$model->pub_version}}</option>
              <option>First</option>
              <option>Second</option>
              <option>Third</option>
              <option>Fourth</option>
              <option>Fifth</option>
            </select>
          </div>

          <div class="col-sm-4">
            <label>Published Date</label>
            <input type="date" class="form-control" name="pub_date" value="{{$model->pub_date}}" readonly="true" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask>
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


