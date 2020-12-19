@extends('layouts.main')
@section('content')

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="/almasaeed2010/adminlte/plugins/jquery/jquery.min.js"></script>

  <section class="content">
    <div class="content-body">
    <h1>Faculties and Departments</h1>
    <br>
      <div class="col-md-12">
        <div class="card card-info">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Faculty: </label>
                  <select id="module" name="module" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option data-select2-id="3">Select a Faculty ...</option>
                    @foreach ($facultis as $fac)
                      <option value="{{ $fac->id }}">{{ $fac->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title">
                      <h3>Departments</h3>
                    </div>
                    <div class="table-responsive">
                      <div id="tableview"></div> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> 
    </div>
  </section>

<script type="text/javascript">
$(document).ready(function(){
 $('#module').on("change",function(){
  var token = '{{ csrf_token() }}';
  var fid = $(this).val();
  var op ="";
  console.log(fid);
  $.ajax({
    type:'post',
    url: '/getdepartments',
    data:{
       '_token':token,

       'faculty_id': fid
    },
        success: function(data){
        op+='<table id="example2" class="table table-bordered table-hover">';
        op+='<thead><tr><th>No.</th><th>Department</th></tr></thead>';
        for(var i=0;i<data.length;i++){
          op+='<tbody><tr>';
          op+='<td>'+ i +'</td>';
          op+='<td>'+data[i].desp+'</td>';
          op+='</tr></tbody>';
        }
         op+='</table>';
         $('#tableview').html(op);
       },
        error: function(){
          console.log("Error Occurred");
        }
    });

  });
});

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

<style type="text/css">
h1 {
  color: #000000;
  text-align: center;
  text-transform: uppercase;
  text-shadow: 2px 2px #d8c2c2;
}
</style>

@endsection