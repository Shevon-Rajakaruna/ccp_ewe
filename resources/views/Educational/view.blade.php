@extends('layouts.main')
@section('content')

  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<div class="container-fluid">
    <div class="card card-info">
    <div class="card-header">
      <h3 style="font-size:20px" class="card-title">View Educational Qualifications</h3>
    </div>
    <div class="card-body">
    <form role="form" method="get">
      @csrf
      <div class="row">
          <div class="col-sm-12">
              <div class="form-group">
                  <label> Institute </label>
                <input class="form-control" type="text" name="institute" value="{{$education->institute}}" readonly="true">
          </div>
          </div>
             
         </div>
         <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label> Degree </label>
                <input class="form-control" type="text" name="degree" value="{{$education->degree}}" readonly="true">
          </div>           
          </div>    
      </div>

      <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label> Field of Study </label>
                <input class="form-control form-control-sm" type="text" name="field" value="{{$education->field}}" readonly="true">
          </div>           
          </div>    
      </div>

      <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Start Date</label>                
                <input class="form-control" type="text" name="start_date" value="{{$education->start_date}}" readonly="true">
              </div>

            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>End Date </label>
                <input class="form-control" type="text" name="end_date" value="{{$education->end_date}}" readonly="true">
              </div>

            </div>
          </div>

      <br>

    </form>
    </div>
      
  </div>
</div>



@endsection


