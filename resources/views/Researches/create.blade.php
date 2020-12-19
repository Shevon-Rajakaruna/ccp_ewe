@extends('layouts.main')
@section('content') 

  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<div class="content-body">
    <h2> Researches </h2> 
	<div class="col-md-12">
		<div class="card card-info">
			<div class="card-header" style="background-color: #ffb342 !important;">
				<h3 class="card-title">Add Research Details</h3>
			</div>
			<div class="card-body">
			<form role="form" method="post" action="{{ route('research.store') }}">
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
				  	<label>Research Name </label>
            <input type="text" name="name" class="form-control" placeholder="Reserach name here">
    			</div>

    			<div class="col-sm-6">
    				<label>Research Description:</label>
            <textarea class="form-control" rows="3" name="description" placeholder="About the Research"></textarea>
    			</div>
				</div>
        <br>

				<div class="row">
				  <div class="col-sm-6">
				  	<label>Research Status</label>
            <select class="form-control" name="status">
              <option>Select Research Status</option>
              <option>Charter Submission</option>
              <option>Project Proposal Presentation</option>
              <option>SRS</option>
              <option>Progress Presentation 1</option>
              <option>Progress Presentation 2</option>
              <option>Final Presentation and Viva</option>
              <option>Final Report (Soft Bound)</option>
              <option>Final Submission</option>
              <option>Final Report (Hard Bound)</option>
              <option>Completed</option>
            </select>
    			</div>

    			<div class="col-sm-6">
    				<label>Module: </label>
				  	<select name="module" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
					    <option data-select2-id="3">Select a Module</option>
					    @foreach ($modules as $module)
                <option value="{{ $module->id }}">{{ $module->mod_code }} - {{ $module->mod_name }}</option>
              @endforeach
				  	</select>
    			</div>
				</div>
        <br>

				<div class="row">
					<div class="col-sm-6">
						<label>Started Date</label>
            <input type="date" class="form-control" name="start_date" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask>
					</div>
					<div class="col-sm-6">
            <label>Group ID</label>
            <input type="text" name="groupID" class="form-control" placeholder="Group ID/Name here">
          </div>
				</div>
        <br>

				<div class="row">
					<div class="col-sm-6">
						<label>Completed Date</label>
            <input type="date" class="form-control" name="complete_date" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask>
					</div>
					<div class="col-sm-6">
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


