@extends('layouts.main')
@section('content')

<div class="wrapper"> 

  <h2>Events view</h2>
  <form action="{{ route('events.create')}}" method="GET">  
    @csrf
    <button class="btn btn-info" style="background-color: #ffc107 !important;" type="submit">Create New Record</button>  
  </form>
  <br>

  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table class="table table-striped">  
            <thead>  
              <tr>   
                <th>Event Name </th>  
                <th>Description </th>  
                <th>Organizer </th>
                <th>Date </th> 
                <th>Time </th>
                <th>Actions </th>
              </tr>  
            </thead>  
            <tbody>  
            @foreach($events as $eve)  
              <tr border="none">  
                <td>{{$eve->ename}}</td>  
                <td>{{$eve->edesp}}</td>  
                <td>{{$eve->organizer}}</td>
                <td>{{$eve->edate}}</td>  
                <td>{{$eve->etime}}</td>  

                <td> 
                  <div class="btn-group"> 
                    <form action="{{ route('events.view', $eve->id)}}" method="GET">  
                      @csrf
                      <button class="btn btn-success" type="submit" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></button>
                    </form>
                    
                    <form action="{{ route('events.edit', [$eve->id])}}" method="GET">  
                      @csrf
                      <button class="btn btn-info" type="submit" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></button>
                    </form>
                   
                    <form action="{{ route('events.delete', $eve->id)}}" method="post">  
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