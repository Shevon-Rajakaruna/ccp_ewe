@extends('layouts.main')
@section('content')

  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- <link rel="stylesheet" href="hlogps://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <!-- <link href="hlogps://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
  <script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
  

<div class="wrapper">

  <h1 style="text-align: center">System Log Reports</h1>

    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>User code</th>
                  <th>User Name</th>
                  <th>Date & Time</th>
                  <th>Section</th>
                  <th>Category</th>
                  <th>Remark</th>
                </tr>
                </thead>
                <tbody>  
                @foreach($logs as $log)  
                  <tr border="none">  
                    <td>{{$log->user_id}}</td>
                    <td>{{$log->name}}</td>
                    <td>{{$log->created_date}}</td> 
                    <td>{{$log->section}}</td>  
                    <td>{{$log->category}}</td>  
                    <td>{{$log->remark}}</td>           
                  </tr>  
                @endforeach  
                </tbody>

                <tfoot>
                <tr>
                  <th>User Code</th>
                  <th>User Name</th>
                  <th>Date & Time</th>
                  <th>Section</th>
                  <th>Category</th>
                  <th>Remark</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </section>

</div>

<script src="/almasaeed2010/adminlte/plugins/jquery/jquery.min.js"></script>
<script src="/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/almasaeed2010/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/almasaeed2010/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/almasaeed2010/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/almasaeed2010/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/almasaeed2010/adminlte/dist/js/adminlte.min.js"></script>
<script src="/almasaeed2010/adminlte/dist/js/demo.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


@endsection