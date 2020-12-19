@extends('layouts.main')
@section('content')

  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<div class="container-fluid">
    <div class="card card-info">
    <div class="card-header">
      <h3 style="font-size:20px" class="card-title">Update Accomplishments</h3>
    </div>
    <div class="card-body">
    <form role="form" method="get">
      @csrf
      <div class="row">
          <div class="col-sm-8">
              <div class="form-group">
                  <label> Title </label>
                <input class="form-control" type="text" name="title" value="{{$accomp->title}}" readonly="true">
          </div>
          </div>
      </div>

      <div class="row">     
          <div class="col-sm-8">
            <div class="form-group">
              <label> Description </label>
                <textarea class="form-control" rows="3" name="desp" readonly="true">{{$accomp->desp}}</textarea>
          </div>           
          </div>    
      </div>

      <br>

    </form>
    </div>
  </div>
</div>

@endsection


