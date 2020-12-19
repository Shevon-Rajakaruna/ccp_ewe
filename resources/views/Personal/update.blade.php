@extends('layouts.main')
@section('content')

  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<div class="content-body">
    <h2> Personal Info </h2> 
	<div class="col-md-12">
		<div class="card card-info">
			<div class="card-header" style="background-color: #6500F9 !important;">
				<h3 class="card-title">Edit Personal Info</h3>
			</div>
			<div class="card-body">
			<form method="post" action="{{ route('personal.update',$model->id) }}" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-sm-4">
						<label>Employee Code</label>              
				    	<input type="text" name="userid" value="{{$model->userid}}" class="form-control" readonly="true">
					</div>

				   <div class="col-sm-4">
				      <div class="form-group">
				  	      <label>Full Name</label>              
				    		<input type="text" name="full_name" value="{{$model->full_name}}" class="form-control" placeholder="Enter the full name">
						</div>
				   </div>
				       
				  <div class="col-sm-4">
				    <div class="form-group">
					  	<label>Profile Image</label>
	            <br>
	            <input type="file" name="image" id="image">
	            <br><br>

	            @if($model->image)
	            <img src="{{ asset('storage/' . $model->image) }}" alt="" class="img-fluid mb-1" style="height: 200px;">
	            @endif
						</div>			     
				  </div>    
				</div>
				<div class="row">
					<div class="col-sm-4">
						<label>Date of Birth</label>
                	<input type="date" name="dob" value="{{$model->dob}}" class="form-control"  data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask>						
					</div>

					<div class="col-sm-4">
						<label>Gender</label>
		            <div class="form-check">              
			            <input type="radio" id="male" name="gender" value="M">
			            <label for="male">Male</label> <br>
			            <input type="radio" id="female" name="gender" value="F">
		            	<label for="female">Female</label><br> 
		            </div>						
					</div>

					<div class="col-sm-4">
						<label>NIC</label>
              		<input type="text" name="nic" class="form-control" value="{{$model->nic}}">
					</div>
				</div>

				<div class="row">
					<div class="col-sm-3">
						<label>Email Address</label>
              		<input type="text" name="email" class="form-control" value="{{$model->email}}" readonly="true">						
					</div>
					
					<div class="col-sm-3">
						<label>Contact Number</label>
              		<input type="text" name="contact" class="form-control" value="{{$model->contact}}">
					</div>

					<div class="col-sm-3">
						<div class="form-group">
					  	<label>Faculty: </label>
					  	<select name="faculty" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
						    <option data-select2-id="3">Select a Faculty ...</option>
						    @foreach ($faculties as $fac)
                  <option value="{{ $fac->id }}">{{ $fac->name }}</option>
                @endforeach
					  	</select>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="form-group">
					  	<label>Department: </label>
					  	<select name="department" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
						    <option data-select2-id="3">Select a Department ...</option>
						    @foreach ($deps as $dep)
                  <option value="{{ $dep->id }}">{{ $dep->desp }}</option>
                @endforeach
					  	</select>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						<label>Residential Address</label>
              		<textarea class="form-control" rows="3" name="resident_address" placeholder="Residential Address">{{$model->resident_address}}</textarea>
					</div>

					<div class="col-sm-6">
						<label>Workplace Address</label>
              		<textarea class="form-control" rows="3" name="workplace_address" placeholder="Workplace Address">{{$model->workplace_address}}</textarea>
					</div>					
				</div>

				<br>

				<div class="row">
					<div class="col-sm-2">
				    	<td><button type="submit" class="btn btn-block btn-success btn-sm">Update</button></td>
               </div>
           	</div>

			</form>
		    </div>
	    </div>
	</div>
</div>


<style type="text/css">
h2 {
  color: #000000;
  text-align: center;
  text-transform: uppercase;
  text-shadow: 2px 2px #d8c2c2;
}
</style>

@endsection


