@extends('layouts.main')
@section('content')

<div class="table-responsive">
<table class="table table-striped">  
  <thead>  
    <tr>   
      <th>Organization </th>  
      <th>Designation </th>  
      <th>Department </th> 
      <th>Start Date</th>
      <th>End Date </th> 
      <th>Remarks</th>
    </tr>  
  </thead>  
  <tbody>  
  @foreach($exps as $exp)  
    <tr border="none">  
      <td>{{$exp->organization}}</td>  
      <td>{{$exp->designation}}</td>  
      <td>{{$exp->department}}</td> 
      <td>{{$exp->start_date}}</td>
      <td>{{$exp->years}}</td> 
      <td>{{$exp->remarks}}</td> 

      <td>  
        <form action="{{ route('experience.view', $exp->id)}}" method="GET">  
          @csrf
          <button class="btn btn-primary" type="submit">View</button>  
        </form>
      </td>  
      <td>  
        <form action="{{ route('experience.edit', [$exp->id])}}" method="GET">  
          @csrf
          <button class="btn btn-success" type="submit">Edit</button>  
        </form>
      </td>
      <td>  
        <form action="{{ route('experience.delete', $exp->id)}}" method="post">  
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