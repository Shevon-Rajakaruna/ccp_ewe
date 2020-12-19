@extends('layouts.main')
@section('content')

  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<div class="content-body">
    <h2> Departments </h2> 
	<div class="col-md-12">
		<div class="card card-info">
			<div class="card-header" style="background-color: #6500F9 !important;">
				<h3 class="card-title">Add Departments</h3>
			</div>
			<div class="card-body">
			<form role="form" method="post" action="{{ route('department.store') }}">
				@csrf
				<div class="row">
				    <div class="col-sm-6">
				      	<div class="form-group">
				  	       	<label>Department Name: </label>
				    		<input type="text" name="desp" class="form-control" placeholder="Department Name Here">
						</div>
				    </div>
				       
				    <div class="col-sm-6">
				    	<div class="form-group">
						  	<label>Faculty: </label>
						  	<select name="faculty" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
							    <option data-select2-id="3">Select a Faculty...</option>
							    @foreach ($faculty as $fac)
                      <option value="{{ $fac->id }}">{{ $fac->name }}</option>
                  @endforeach
						  	</select>
						</div>			     
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
</style>

@endsection


