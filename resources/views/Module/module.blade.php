@extends('layouts.main')
@section('content')
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fullcalendar/main.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fullcalendar-daygrid/main.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fullcalendar-timegrid/main.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fullcalendar-bootstrap/main.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <section class="content">
     <h1>Modules</h1>

     <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4>Select Faculty and Department</h4>
                                <div class="dropdown-size">
                                    <!-- Large button groups (default and split) -->
                                    <div class="btn-group mb-1">
                                        <button class="btn btn-primary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select Faculty
                                        <div class="dropdown-menu"><a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                    <div class="btn-group mb-1">
                                        <button class="btn btn-primary btn-lg" type="button">Select Department</button>
                                        <button type="button" class="btn btn-lg btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu"><a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4>Module</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Module Number</th>
                                                <th>Module Name</th>
                                                <th>Module Hours</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>1</th>
                                                <td>Module 1</td>
                                                <td><span class="badge badge-primary px-2">50</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>2</th>
                                                <td>Module 2</td>
                                                <td><span class="badge badge-primary px-2">50</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>3</th>
                                                <td>Module 3</td>
                                               <td><span class="badge badge-primary px-2">50</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
    </section>

@endsection