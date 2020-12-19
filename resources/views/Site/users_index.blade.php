@extends('layouts.main')
@section('content')

  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<div class="wrapper">

  <h1 style="text-align: center">Users Report</h1>

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
                  <th>User type</th>
                  <th>Email</th>
                  <th>Created at</th>
                  <th>Updated at</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>  
                @foreach($users as $usr)  
                  <tr border="none">  
                    <td>{{$usr->user_code}}</td>  
                    <td>{{$usr->name}}</td>  
                    <td>{{$usr->desp}}</td>  
                    <td>{{$usr->email}}</td> 
                    <td>{{$usr->created_at}}</td>  
                    <td>{{$usr->updated_at}}</td>
                    <td>
                      <form action="{{ route('site.edit', [$usr->id])}}" method="GET">  
                        @csrf
                        <button class="btn btn-success" type="submit" title="Edit"><i class="fas fa-edit"></i></button>
                      </form>
                    </td>          
                  </tr>  
                @endforeach  
                </tbody>

                <tfoot>
                <tr>
                  <th>User code</th>
                  <th>User Name</th>
                  <th>User type</th>
                  <th>Email</th>
                  <th>Created at</th>
                  <th>Updated at</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
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
    // $("#example1").DataTable({
    //   "responsive": true,
    //   "autoWidth": false,
    // });
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