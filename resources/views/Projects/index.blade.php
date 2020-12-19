@extends('layouts.main')
@section('content')

<script src="/almasaeed2010/adminlte/plugins/jquery/jquery.min.js"></script>

<style type="text/css">
h2 {
  color: #000000;
  text-align: center;
  text-transform: uppercase;
  font-weight: bold;
  font-style: oblique;
  text-shadow: 2px 2px #d8c2c2;
  background-color: #6610f2;
  border-radius: 25px;
}
</style>

<div class="wrapper"> 

  <h2>Projects view</h2>
  
  <div class="row">
    <div class="col-sm-2">
      <form action="{{ route('project.create')}}" method="GET">  
        @csrf
        <button class="btn btn-info" style="background-color: #6500F9 !important;" type="submit">Create New Record</button>  
      </form>
    </div>

    <div class="col-sm-1">
      <button class="btn btn-info" id="print" name="print" style="background-color: #6500F9 !important;" type="button">Print</button>
    </div>

    <div class="col-md-5">
      <!-- Total Records - <b><span id="total_records"></span></b> -->
    </div>
    <div class="col-md-2">
     <div class="input-group">
         <input type="text" name="daterange" />
     </div>
    </div>
    <div class="col-md-2">
     <button type="button" name="filter" id="filter" class="btn btn-info btn-sm">Filter</button>
     <button type="button" name="refresh" id="refresh" class="btn btn-warning btn-sm">Refresh</button>
    </div>
  </div>
  <br>

  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table class="table table-striped">   
            <thead>  
              <tr>   
                <th>Topic </th>  
                <th>Description </th>  
                <th>Type </th>
                <th>Start date </th>  
                <th>Completed date </th>  
                <th>Module </th>
                <th>Estimate Time </th>  
                <th>Batch </th> 
                <th>Actions </th>
              </tr>  
            </thead>  
            <tbody>  
            @foreach($projcts as $pro)  
              <tr border="none">  
                <td>{{$pro->topic}}</td>  
                <td>{{$pro->description}}</td>  
                <td>{{$pro->project_type}}</td>
                <td>{{$pro->started_date}}</td>  
                <td>{{$pro->completed_date}}</td>  
                <td>{{ $pro->mod_code }} - {{ $pro->mod_name }}</td>
                <td>{{$pro->estimate_time}}</td>  
                <td>{{$pro->batch}}</td>  
        
                <td>
                  <div class="btn-group">
                    <form action="{{ route('project.view', $pro->id)}}" method="GET">  
                      @csrf
                      <button class="btn btn-primary" type="submit" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></button>
                    </form>
                    
                    <form action="{{ route('project.edit', [$pro->id])}}" method="GET">  
                      @csrf
                      <button class="btn btn-success" type="submit" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></button>
                    </form>
                    
                    <form action="{{ route('project.delete', $pro->id)}}" method="post">  
                      @csrf
                      <button class="btn btn-danger" type="submit" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></button>
                    </form>
                  </div>
                </td> 
        
              </tr>  
            @endforeach  
            </tbody>  
          </table>
          {{ csrf_field() }}
        </div>
      </div>
    </div>
  </section>
</div>


<script>

$(document).ready(function(){

 var from_date = new Date();
 var to_date = new Date();
 var clicked = 0;

 $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    from_date = start.format('YYYY-MM-DD');
    to_date = end.format('YYYY-MM-DD');
  });

 var _token = $('input[name="_token"]').val();

 $('#filter').click(function(){
  // var from_date = $('#from_date').val();
  // var to_date = $('#to_date').val();

  if(from_date != '' &&  to_date != '')
  {

    $.ajax({
     url:"{{ route('daterange.fetch_data') }}",
     method:"POST",
     data:{from_date:from_date, to_date:to_date, _token:_token},
     dataType:"json",
     success:function(data)
     {
      var output = '';
      $('#total_records').text(data.length);
      for(var count = 0; count < data.length; count++)
      {
        output += '<tr>';
        output += '<td>' + data[count].topic + '</td>';
        output += '<td>' + data[count].description + '</td>';
        output += '<td>' + data[count].project_type + '</td>';
        output += '<td>' + data[count].started_date + '</td>';
        output += '<td>' + data[count].completed_date + '</td>';
        output += '<td>' + data[count].mod_code +'-'+ data[count].mod_name + '</td>';
        output += '<td>' + data[count].estimate_time + '</td>';
        output += '<td>' + data[count].batch + '</td>';

        var urlv = "{{ route('project.view', '') }}"+"/"+data[count].id;
        var urle = "{{ route('project.edit', ':id') }}"+"/"+data[count].id;
        var urld = "{{ route('project.delete', ':id') }}"+"/"+data[count].id;

        output += '<td><div class="btn-group"><form action="' + urlv + '" method="GET">@csrf<button class="btn btn-primary" type="submit" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></button></form><form action="' + urle + '" method="GET">@csrf<button class="btn btn-success" type="submit" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></button></form><form action="' + urld + '" method="post">@csrf<button class="btn btn-danger" type="submit" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></button></form></div></td></tr>';
      }
      $('tbody').html(output);
      clicked = 1;
     }
    });
  }
  else
  {
   alert('Both Date is required');
  }
 });

 $('#refresh').click(function(){
  $('#from_date').val('');
  $('#to_date').val('');
  location.reload();
 });

$('#print').click(function(){
  // alert('hiii');
  if(clicked == 1){
    window.location = "/project/print/" + from_date + to_date;
  }
  else{
    var ddate = 'null';

    window.location = "/project/print/" + ddate;
  }
  

});


});
</script>
@endsection  