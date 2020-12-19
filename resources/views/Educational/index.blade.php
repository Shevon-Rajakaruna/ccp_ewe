@extends('layouts.main')
@section('content')

<div class="table-responsive">
<table class="table table-striped">  
  <thead>  
    <tr>   
      <th>Institute </th>  
      <th>Degree </th>
      <th>Field </th>
      <th>start_date</th>
      <th>end_date</th>  
    </tr>  
  </thead>  
  <tbody>  
  @foreach($education as $edu)  
    <tr border="none">  
      <td>{{$edu->institute}}</td>  
      <td>{{$edu->degree}}</td>  
      <td>{{$edu->field}}</td>
      <td>{{$edu->start_date}}</td>  
      <td>{{$edu->end_date}}</td>  

      <td>  
        <form action="{{ route('educational.view', $edu->id)}}" method="GET">  
          @csrf
          <button class="btn btn-primary" type="submit">View</button>  
        </form>
      </td>  
      <td>  
        <form action="{{ route('educational.edit', [$edu->id])}}" method="GET">  
          @csrf
          <button class="btn btn-success" type="submit">Edit</button>  
        </form>
      </td>
      <td>  
        <form action="{{ route('educational.delete', $edu->id)}}" method="post">  
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