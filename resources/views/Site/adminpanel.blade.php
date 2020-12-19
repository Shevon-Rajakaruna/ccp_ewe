@extends('layouts.main')
@section('content')

<style type="text/css">
h1 {
  /*color: #007bff;*/
  text-align: center
}
</style>

<section class="content">

  <h1>Admin Panel</h1>
  <br>

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
          <div class="inner">
            <h4>Log Report</h4>
            <br>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="{{ url('/site/log') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      
      <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
          <div class="inner">

            <h4>Users Report</h4>
            <br>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="{{ url('/site/users') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
          <div class="inner">

            <h4>Faculties & Departments</h4>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="{{ url('/faculty/adminindex') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
          <div class="inner">

            <h4>Modules</h4>
            <br>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="{{ url('/module/adminindex') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
    
  </div>


  <div class="card">
    <div class="card-header border-transparent">
      <h3 class="card-title">Performance</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Name</th>
            <th>Designation</th>
            <th>Module</th>
            <th>Category</th>
            <th>Working Hours</th>
          </tr>
          </thead>
          <tbody>
          @foreach($data as $da)
          <tr>
            <td>{{ $da->full_name }}</td>
            <td>{{ $da->desig }}</td>
            <td>{{ $da->mod_code }} - {{ $da->mod_name }}</td>
            <td>{{ $da->category }}</td>
            <td>{{ $da->hours }}</td>
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
    
    <!-- <div class="card-footer clearfix">
      <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
      <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
    </div> -->
  </div>
</section>




@endsection