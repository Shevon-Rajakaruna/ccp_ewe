@extends('layouts.main')
@section('content')
<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Content-Type: application/xml; charset=utf-8");
?>
  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <section class="content">
     <h1>All Modules</h1>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">

                <div class="col-sm-6">
                  <form action="/module/search" method="get"> 
                    <div class="input-group">
                      <input type="search" name="srch" class="form-control">
                      <span class="input-group-prepend">
                        <button type="submit" class="btn btn-primary">Search</button>
                      </span>
                    </div>

                  </form>
                </div>
                              
                <div class="table-responsive">
                  <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Module Code </th>  
                          <th>Module Name </th>  
                          <th>Department </th>  
                          <th>Year </th>
                          <th>Semester</th>
                          <th>Lecture Hours</th>
                          <th>Tutorial Hours</th>
                          <th>Lab Hours</th>
                          <th>Maximum Lecturers</th>
                          <th style="text-align: center;">Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($modules as $mod)  
                        <tr border="none">
                          <td>{{$mod->mod_code}}</td>  
                          <td>{{$mod->mod_name}}</td>  
                          <td>{{$mod->desp}}</td>  
                          <td>{{$mod->year}}</td>
                          <td>{{$mod->semester}}</td>  
                          <td>{{$mod->lec_hours}}</td>  
                          <td>{{$mod->tute_hours}}</td>  
                          <td>{{$mod->lab_hours}}</td>
                          <td>{{$mod->max_lec}}</td>  
                          <td>
                            <div class="btn-group">
                            <form action="{{ route('module.view', $mod->id)}}" method="GET">  
                              @csrf
                              <button class="btn btn-primary" type="submit">View</button>  
                            </form>
                          
                            <form action="{{ route('module.edit', [$mod->id])}}" method="GET">  
                              @csrf
                              <button class="btn btn-success" type="submit">Edit</button>  
                            </form>
                            
                            <!-- <form action="{{ route('module.delete', $mod->id)}}" method="post">  
                              @csrf
                              <button class="btn btn-danger" type="submit">Delete</button>  
                            </form> -->

                            <form action="{{ route('module.print_report', $mod->id)}}" method="GET">  
                              @csrf
                              <button class="btn btn-info" type="submit">Print</button>  
                            </form>
                            </div>
                          </td>  
                  
                        </tr>  
                        @endforeach
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </section>

    <style type="text/css">
h1 {
  color: #ffffff;
  background-color: #6500F9;
}
</style>

@endsection