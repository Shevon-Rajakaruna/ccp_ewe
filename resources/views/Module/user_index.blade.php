@extends('layouts.main')
@section('content')
  
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="/almasaeed2010/adminlte/plugins/jquery/jquery.min.js"></script>

  <section class="content">
     <h1>All Modules</h1>

          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Department: </label>
                      <select id="department" name="department" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        <option data-select2-id="3">Select a Department ...</option>
                        @foreach ($deps as $dep)
                          <option value="{{ $dep->id }}">{{ $dep->desp }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <br>

                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title">
                          <h3>Modules</h3>
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
    </section>

<script type="text/javascript">
$(document).ready(function(){
 $('#department').on("change",function(){
  var token = '{{ csrf_token() }}';
  var did = $(this).val();
  var op ="";
  console.log(did);

  $.ajax({
    type:'post',
    url: '/getmodules',
    data:{
       '_token':token,

       'dep_id': did
    },
        success: function(data){
        op+='<table id="example2" class="table table-bordered table-hover">';
        op+='<thead><tr><th>No.</th><th>Module Code</th><th>Module Name</th><th>Year</th><th>Semester</th><th>Lecture Hours</th><th>Tutorial Hours</th><th>Lab Hours</th><th>Maximum Lecturers</th></tr></thead>';
        for(var i=0;i<data.length;i++){
          op+='<tbody><tr>';
          op+='<td>'+ i +'</td>';
          op+='<td>'+data[i].mod_code+'</td>';
          op+='<td>'+data[i].mod_name+'</td>';
          op+='<td>'+data[i].year+'</td>';
          op+='<td>'+data[i].semester+'</td>';
          op+='<td>'+data[i].lec_hours+'</td>';
          op+='<td>'+data[i].tute_hours+'</td>';
          op+='<td>'+data[i].lab_hours+'</td>';
          op+='<td>'+data[i].max_lec+'</td>';
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