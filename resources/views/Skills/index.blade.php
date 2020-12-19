@extends('layouts.main')
@section('content')

<div class="table-responsive">
<table class="table table-striped">  
  <thead>  
    <tr>   
      <th>Skills </th>  
      <th>Description </th>  
      <th>Endorsements </th> 
    </tr>  
  </thead>  
  <tbody>  
  @foreach($skills as $s)  
    <tr border="none">  
      <td>{{$s->skills}}</td>  
      <td>{{$s->desp}}</td>  
      <td>{{$s->endorsements}}</td>  

      <td>  
        <form action="{{ route('skill.view', $s->id)}}" method="GET">  
          @csrf
          <button class="btn btn-primary" type="submit">View</button>  
        </form>
      </td>  
      <td>  
        <form action="{{ route('skill.edit', [$s->id])}}" method="GET">  
          @csrf
          <button class="btn btn-success" type="submit">Edit</button>  
        </form>
      </td>
      <td>  
        <form action="{{ route('skill.delete', $s->id)}}" method="post">  
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