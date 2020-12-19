@extends('layouts.main')
@section('content')

<div class="table-responsive">
<table class="table table-striped">  
  <thead>  
    <tr>   
      <th>ID </th>  
      <th>Description </th>  
      <th>Faculty </th> 
    </tr>  
  </thead>  
<tbody>  
@foreach($deps as $dep)  
        <tr border="none">  
          <td>{{$dep->id}}</td>  
          <td>{{$dep->desp}}</td>  
          <td>{{$dep->faculty}}</td>  
  
          <td>  
            <form action="{{ route('department.view', $dep->id)}}" method="GET">  
              @csrf
              <button class="btn btn-primary" type="submit">View</button>  
            </form>
          </td>  
          <td>  
            <form action="{{ route('department.edit', [$dep->id])}}" method="GET">  
              @csrf
              <button class="btn btn-success" type="submit">Edit</button>  
            </form>
          </td>
          <td>  
            <form action="{{ route('department.delete', $dep->id)}}" method="post">  
              @csrf
              <button class="btn btn-danger" type="submit">Delete</button>  
            </form>
          </td> 
  
        </tr>  
@endforeach  
</tbody>  
</table>
</div>  
@endsection  