@extends('layouts.main')
@section('content')

<div class="table-responsive">
<table class="table table-striped">  
  <thead>  
    <tr>   
      <th>User code </th>  
      <th>Full Name </th>  
      <th>Date of birth </th>
      <th>NIC</th>
      <th>Gender</th>
      <th>Email</th>
      <th>Contact</th>
      <th>Resident Address</th>
      <th>Workplace Address</th>
    </tr>  
  </thead>  
  <tbody>  
  @foreach($personls as $prsnl)  
    <tr border="none">  
      <td>{{$prsnl->userid}}</td>  
      <td>{{$prsnl->full_name}}</td>        
      <td>{{$prsnl->dob}}</td>
      <td>{{$prsnl->nic}}</td>
      <td>{{$prsnl->gender}}</td>
      <td>{{$prsnl->email}}</td>  
      <td>{{$prsnl->contact}}</td>
      <td>{{$prsnl->resident_address}}</td>
      <td>{{$prsnl->workplace_address}}</td>

      <td>  
        <form action="{{ route('personal.view', $prsnl->id)}}" method="GET">  
          @csrf
          <button class="btn btn-primary" type="submit">View</button>  
        </form>
      </td>  
      <td>  
        <form action="{{ route('personal.edit', [$prsnl->id])}}" method="GET">  
          @csrf
          <button class="btn btn-success" type="submit">Edit</button>  
        </form>
      </td>
      <td>  
        <form action="{{ route('personal.delete', $prsnl->id)}}" method="post">  
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