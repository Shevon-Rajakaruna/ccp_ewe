@extends('layouts.main')
@section('content')

<div class="table-responsive">
<table class="table table-striped">  
  <thead>  
    <tr>   
      <th>ID </th>  
      <th>Name </th>  
      <th>Description </th> 
    </tr>  
  </thead>  
<tbody>  
@foreach($faculty as $fac)  
        <tr border="none">  
          <td>{{$fac->id}}</td>  
          <td>{{$fac->name}}</td>  
          <td>{{$fac->desp}}</td>  
  
          <td >  
            <form action="{{ route('faculty.delete', $fac->id)}}" method="post">  
              @csrf  
             <!-- // @method('DELETE')  -->
              <button class="btn btn-danger" type="submit">Delete</button>  
            </form>
          </td>  
          <td >  
            <form action="{{ route('faculty.edit', [$fac->id])}}" method="GET">  
              @csrf  
               
              <button class="btn btn-success" type="submit">Edit</button>  
            </form>
          </td>  
  
        </tr>  
@endforeach  
</tbody>  
</table>
</div>  
@endsection  