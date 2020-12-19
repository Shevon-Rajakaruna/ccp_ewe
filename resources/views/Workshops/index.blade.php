@extends('layouts.main')
@section('content')

<div class="wrapper"> 

  <h2>Attended Workshops and Conferences</h2>
  <div class="row">
    <div class="col-sm-2">
      <form action="{{ route('workshops.create')}}" method="GET">  
      @csrf
      <button class="btn btn-info" style="background-color: #07ab85 !important;" type="submit">Create New Record</button>  
    </form>
    </div>

    <div class="col-sm-1">
      <form action="{{ route('workshops.print')}}" method="GET">  
        @csrf
        <button class="btn btn-info" style="background-color: #07ab85 !important;" type="submit">Print</button>  
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
                <th>Workshop </th>  
                <th>Event_name </th>  
                <th>Venue </th> 
                <th>Event date</th>
                <th>Event time </th>
                <th>Actions </th>
              </tr>  
            </thead>  
            <tbody>  
            @foreach($workshps as $work)  
              <tr border="none">  
                <td>{{$work->workshop}}</td>  
                <td>{{$work->event_name}}</td>  
                <td>{{$work->venue}}</td> 
                <td>{{$work->event_date}}</td>
                <td>{{$work->event_time}}</td> 

                <td>
                  <div class="btn-group">
                    <form action="{{ route('workshops.view', $work->id)}}" method="GET">  
                      @csrf
                      <button class="btn btn-primary" type="submit" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></button>
                    </form>
                    
                    <form action="{{ route('workshops.edit', [$work->id])}}" method="GET">  
                      @csrf
                      <button class="btn btn-success" type="submit" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></button>
                    </form>
                    
                    <form action="{{ route('workshops.delete', $work->id)}}" method="post">  
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
  background-color: #07ab85;
  border-radius: 25px;
}
</style>
@endsection  