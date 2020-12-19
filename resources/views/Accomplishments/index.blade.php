@extends('layouts.main')
@section('content')

<div class="table-responsive">
<table class="table table-striped">  
  <thead>  
    <tr>    
      <th>Title </th>  
      <th>Description </th> 
    </tr>  
  </thead>  
  <tbody>  
  @foreach($accomps as $acc)  
    <tr border="none">  
      <td>{{$acc->title}}</td>  
      <td>{{$acc->desp}}</td>  

      <td>  
        <form action="{{ route('accomplish.view', $acc->id)}}" method="GET">  
          @csrf
          <button class="btn btn-primary" type="submit">View</button>  
        </form>
      </td>  
      <td>  
        <form action="{{ route('accomplish.edit', [$acc->id])}}" method="GET">  
          @csrf
          <button class="btn btn-success" type="submit">Edit</button>  
        </form>
      </td>
      <td>  
        <form action="{{ route('accomplish.delete', $acc->id)}}" method="post">  
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