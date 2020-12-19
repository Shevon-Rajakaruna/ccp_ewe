@extends('layouts.main')
@section('content')

  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
  

<div class="wrapper">

  <h1 style="text-align: center">Total Working Hours Report</h1>

  <div class="row">
    <div class="col-sm-2">
      <form action="{{ route('timetable.print_totwork')}}" method="GET">  
        @csrf
        <button class="btn btn-info" type="submit">Print</button>  
      </form>
    </div>
  </div>
  <br>

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
                  <th>Full Name</th>
                  <th>Designation</th>
                  <th>Working Hours</th>
                </tr>
                </thead>
                <tbody>  
                @foreach($totals as $tot)  
                  <tr border="none">  
                    <td>{{$tot->userid}}</td>
                    <td>{{$tot->full_name}}</td>  
                    <td>{{$tot->desig}}</td>
                    <td>{{$tot->Total}}</td>
                  </tr>  
                @endforeach  
                </tbody>

                <tfoot>
                <tr>
                  <th>User code</th>
                  <th>Full Name</th>
                  <th>Designation</th>
                  <th>Working Hours</th>
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