@extends('layouts.main')
@section('content')

  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<div class="content-body">
  <h2> Projects </h2> 
	<div class="col-md-12">
		<div class="card card-info">
			<div class="card-header" style="background-color: #6500F9 !important;">
				<h3 class="card-title">Add Project Details</h3>
			</div>
			<div class="card-body">
				<form role="form" method="post" action="{{ route('project.store') }}">
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
					  <div class="col-sm-6">
					    <div class="form-group">
			  	      <label>Project Name </label>
                <input type="text" name="topic" class="form-control" placeholder="Project name here">
							</div>
					  </div>
					       
				    <div class="col-sm-6">
				    	<div class="form-group">
						  	<label>Project Description:</label>
	              <textarea name="description" class="form-control" rows="3" placeholder="About the Project"></textarea>
							</div>			     
				    </div>    
					</div>

					<div class="row">
					  <div class="col-sm-6">
					    <div class="form-group">
			  	      <label>Project Status</label>
             		<select class="form-control" name="project_type">
                 	  <option>Select Project Status</option>
                    <option>Ongoing</option>
                    <option>Completed</option>
                </select>
							</div>
					  </div>
					       
				    <div class="col-sm-6">
				    	<div class="form-group">
						  	<label>Module: </label>
						  	<select name="module" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
							    <option data-select2-id="3">Select a Module</option>
							    @foreach ($modules as $module)
                    <option value="{{ $module->id }}">{{ $module->mod_code }} - {{ $module->mod_name }}</option>
                  @endforeach
						  	</select>
							</div>			     
				    </div>    
					</div>

					<div class="row">
					  <div class="col-sm-6">
					    <div class="form-group">
			  	      <label>Started Date</label>
								<input type="date" name="started_date" class="form-control"  data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask>
							</div>
					  </div>
					       
				    <div class="col-sm-6">
				    	<div class="form-group">
						  	<label>Batch (Year / Semester) </label>
                <select class="form-control" name="batch">
                  <option>Select the Batch</option>
                  <option>Year 1 Semester 1</option>
                  <option>Year 1 Semester 2</option>
                  <option>Year 2 Semester 1</option>
                  <option>Year 2 Semester 2</option>
                  <option>Year 3 Semester 1</option>
                  <option>Year 3 Semester 2</option>
                  <option>Year 4 Semester 1</option>
                  <option>Year 4 Semester 2</option>
                </select>
							</div>			     
				    </div>    
					</div>

					<div class="row">
					  <div class="col-sm-6">
					    <div class="form-group">
			  	      <label>Completed Date</label>
								<input type="date" name="completed_date" class="form-control"  data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask>
							</div>
					  </div>
					       
				    <div class="col-sm-6">
				    	<div class="form-group">
						  	<label>Estimated Time Period</label>
                <select class="form-control" name="estimate_time">
                  <option>Select Time Period</option>
                  <option>4 weeks</option>
                  <option>6 weeks</option>
                  <option>8 weeks</option>
                  <option>10 weeks</option>
                  <option>12 weeks</option>
                  <option>20 weeks</option>
                </select>
							</div>			     
				    </div>    
					</div>

					<br>

					<div class="row">
						<div class="col-sm-2">
		    			<button type="submit" class="btn btn-block btn-success btn-sm">Submit</button>
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


