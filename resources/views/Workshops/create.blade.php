@extends('layouts.main')
@section('content') 

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>  

<script type="text/javascript">
	$(function () {
	   //Timepicker
	    $('#timepicker').datetimepicker({
	      format: 'LT'
	    }) 
	})
</script>

<div class="content-body">
    <h2> Workshops and Conferences </h2> 
	<div class="col-md-12"> 
		<div class="card card-info">
			<div class="card-header" style="background-color: #66bb6a !important;">
				<h3 class="card-title">Attended Workshops and Conferences </h3>
			</div>
			<div class="card-body">
			<form role="form" method="post" action="{{ route('workshops.store') }}">
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
			    <div class="col-sm-4">
			      <div class="form-group">
			  	   	<label> Name of the Event </label>
      				<input class="form-control form-control-sm" type="text" name="event_name" placeholder="Ex: Code Fest">
						</div>
			    </div>
			       
			    <div class="col-sm-4">
			    	<div class="form-group">
					  	<label> Workshop /Conference </label>
		          <select class="form-control form-control-sm select2" name="workshop" style="width: 100%;">
		            <option selected="selected">Please select</option>
		            <option>Workshop</option>
		            <option>Conference</option>
		          </select>
						</div>			     
			    </div>

			    <div class="col-sm-4">
			    	<label> Venue </label>
      			<input class="form-control form-control-sm" type="text" name="venue" placeholder="Ex: Auditorium">
			    </div>    
				</div>

				<div class="row">
			    <div class="col-sm-6">
			    	<label>Event Date</label>
      			<input type="date" class="form-control" name="event_date" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask>
			    </div>

			    <div class="col-sm-6">
			    	<label>Event time:</label>
		        <div class="input-group date"  id="timepicker" data-target-input="nearest">
		          <input type="text" class="form-control datetimepicker-input" name="event_time" data-target="#timepicker"/>
		            <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
		               <div class="input-group-text"><i class="far fa-clock"></i></div>
		            </div>
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


