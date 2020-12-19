@extends('layouts.main')
@section('content')

<div class="wrapper"> 

  <h2>All Working Hours </h2>
  <div class="row">
    <div class="col-sm-2">
      <form action="{{ route('timetable.create')}}" method="GET">  
        @csrf
        <button class="btn btn-info" type="submit">Create New Record</button>  
      </form>
    </div>

    <div class="col-sm-1">
      <form action="{{ route('timetable.print_work')}}" method="GET">  
        @csrf
        <button class="btn btn-info" type="submit">Print</button>  
      </form>
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
                <th style="text-align: center;" width="20%">Date </th>  
                <th style="text-align: center;" width="20%">Module </th>  
                <th style="text-align: center;" width="20%">Category </th>  
                <th style="text-align: center;" width="20%">Total Hours </th>
                <th style="text-align: center;" width="20%">Actions </th>              
              </tr>  
            </thead>  
            <tbody>  
            @foreach($timetable as $tt)  
              <tr border="none"> 
                <td>{{$tt->ddate}}</td>  
                <td>{{ $tt->mod_code }} - {{ $tt->mod_name }}</td>  
                <td>{{$tt->category}}</td>  
                <td>{{$tt->tot_hours}}</td>

                <td>
                  <div class="btn-group"> 
                    <form action="{{ route('timetable.view', $tt->id)}}" method="GET">  
                      @csrf
                      <button class="btn btn-primary" type="submit" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></button>  
                    </form>
                    
                    <form action="{{ route('timetable.edit', [$tt->id])}}" method="GET">  
                      @csrf                     
                      <button class="btn btn-success" type="submit" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></button>  
                    </form>
                    
                    <form action="{{ route('timetable.delete', $tt->id)}}" method="post">  
                      @csrf
                      <button class="btn btn-danger" type="submit" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></button>  
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
    </section>
</div>

<style type="text/css">
h2 {
  color: #000000;
  text-align: center;
  text-transform: uppercase;
  font-weight: bold;
  font-style: oblique;
  text-shadow: 2px 2px #d8c2c2;
}
</style>

@endsection  