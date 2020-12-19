@extends('layouts.main')
@section('content')


<div class="wrapper">
  <h2>Publications view</h2>
  
  <div class="row">
    <div class="col-sm-2">
      <form action="{{ route('publication.create')}}" method="GET">  
        @csrf
        <button class="btn btn-info" style="background-color: #66bb6a !important;" type="submit">Create New Record</button>  
      </form>
    </div>

    <div class="col-sm-1">
      <form action="{{ route('publication.print')}}" method="GET">  
        @csrf
        <button class="btn btn-info" style="background-color: #66bb6a !important;" type="submit">Print</button>  
      </form>
    </div>

    <div class="col-sm-3">
    </div>

    <div class="col-sm-6">
      <form action="/search" method="get"> 
        <div class="input-group">
          <input type="search" name="srch" class="form-control">
          <span class="input-group-prepend">
            <button type="submit" class="btn btn-primary">Search</button>
          </span>
        </div>
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
                <th>Name </th> 
                <th>Description </th>  
                <th>Type </th>  
                <th>Version </th> 
                <th>Date</th>
                <th>Actions </th>
              </tr>  
            </thead>  
            <tbody>  
            @foreach($pubs as $pub)  
              <tr border="none">  
                <td>{{$pub->name}}</td> 
                <td>{{$pub->pub_description}}</td> 
                <td>{{$pub->publication_type}}</td>  
                <td>{{$pub->pub_version}}</td> 
                <td>{{$pub->pub_date}}</td> 
        
                <td>
                  <div class="btn-group"> 
                    <form action="{{ route('publication.view', $pub->id)}}" method="GET">  
                      @csrf
                      <button class="btn btn-primary" type="submit" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></button>
                    </form>
                    
                    <form action="{{ route('publication.edit', [$pub->id])}}" method="GET">  
                      @csrf
                      <button class="btn btn-success" type="submit" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></button>
                    </form>
                   
                    <form action="{{ route('publication.delete', $pub->id)}}" method="post">  
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
  background-color: #66bb6a;
  border-radius: 25px;
}
</style>
@endsection  