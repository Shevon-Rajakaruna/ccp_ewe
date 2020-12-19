@extends('layouts.main')
@section('content') 
 
<link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="/almasaeed2010/adminlte/plugins/jquery/jquery.min.js"></script>


<div class="content-body">
  <h2> Personal Info </h2> 
	<div class="col-md-12">
		<div class="card card-info">
			<div class="card-header" style="background-color: #6500F9 !important;">
				<h3 class="card-title">Add Personal Info</h3>
			</div>
			<div class="card-body">
			<form method="post" action="{{ route('personal.store') }}" enctype="multipart/form-data">
				@csrf

				@if ($errors->any())
				  <div class="alert alert-danger">
			      <ul>
		          @foreach ($errors->all() as $error)
		              <li>{{ $error }}</li>
		          @endforeach
			      </ul>
				  </div>
				@endif
				
				<div class="row">
					<div class="col-sm-3">
						<label>Employee Code</label>              
				    	<input type="text" name="userid" class="form-control" value="{{$ucode}}" readonly="true">
					</div>

				   <div class="col-sm-4">
				      <div class="form-group">
				  	      <label>Full Name</label>              
				    		<input type="text" name="full_name" class="form-control" placeholder="Enter the full name">
						</div>
				   </div>
				       
			    <div class="col-sm-5">
			    	<div class="form-group">
			    		<!-- <div class="callout callout-info">
                <p style="font-size: 16px;">Image must be in size: 160 x 160.</p>
                <p style="font-size: 16px;">Must be jpg/jpeg file.</p>
              </div> -->

					  	<label>Profile Image</label>
	            <br>
	            <input type="file" name="image" id="image">
						</div>			     
				  </div>    
				</div>
				<br>

				<div class="row">
					<div class="col-sm-4">
						<label>Date of Birth</label>
            <input type="date" name="dob" class="form-control"  data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask>						
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
            <input type="text" name="nic" class="form-control" placeholder="Enter the NIC Number" >
					</div>
				</div>
				<br>

				<div class="row">
					<div class="col-sm-3">
						<label>Email Address</label>
        		<input type="text" name="email" class="form-control" value="{{$email}}" readonly="true">						
					</div>
					
					<div class="col-sm-3">
						<label>Contact Number</label>
        		<input type="text" name="contact" class="form-control" placeholder="Enter the contact number">
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
				<br>

				<div class="row">
					<div class="col-sm-6">
						<label>Residential Address</label>
        		<textarea class="form-control" rows="3" name="resident_address" placeholder="Residential Address"></textarea>
					</div>

					<div class="col-sm-6">
						<label>Workplace Address</label>
        		<textarea class="form-control" rows="3" name="workplace_address" placeholder="Workplace Address"></textarea>
					</div>					
				</div>

				<br>

				<div class="row">
					<div class="col-sm-2">
				    	<td><button type="submit" class="btn btn-block btn-success btn-sm">Submit</button></td>
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

.list {
     list-style-type: initial;
     display:list-item; 
     }

</style>

<script type="text/javascript">
$(document).ready(function(){
      $(document).Toasts('create', {
        class: 'bg-warning', 
        title: 'Image Upload',
        // subtitle: 'Subtitle',
        body: '<p class="list">Image must be in size: 160 x 160.</p><p class="list">Must be jpg/jpeg file.</p><p class="list">Must be less than 6MB</p>'
      })
    });
</script>

@endsection


