@extends('layouts.main')
@section('content')

  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

   
<div class="content-body">
    <h2> Working Hours </h2>
	<div class="col-md-12">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">View Working Hours</h3>
			</div>
			<div class="card-body">
			<form method="GET" >
				<!-- ///@method('PATCH') -->
				@csrf
				<div class="row">
				  <div class="col-sm-6">
		      	<div class="form-group">
		  	      <label>Date: </label>
		    			<input name="ddate" type="date" value="{{$timetable->ddate}}" class="form-control"  data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask>
						</div>
				  </div>
				        
			    <div class="col-sm-6">
			    	<div class="form-group">
					  	<label>Module: </label>
					  	<input name="tot_hours" type="text" class="form-control" value="{{ $module->mod_code }} - {{ $module->mod_name }}" readonly="true">
						</div>
				  </div>    
				</div>

				<div class="row">
					<div class="col-sm-6">
			    	<div class="form-group">
					  	<label>Category: </label>
					  	<input name="category" type="text" class="form-control" value="{{$timetable->category}}" readonly="true">
						</div>
			    </div>
			    <div class="col-sm-6">
            <div class="form-group">
              <label>Total Teaching Hours: </label>
              <input name="tot_hours" type="text" class="form-control" value="{{$timetable->tot_hours}}" readonly="true">
            </div>
          </div>
				</div>

				<div class="row">
					<div class="col-sm-6">						
    				<label>Remarks:</label>
            <textarea class="form-control" rows="3" name="remarks" readonly="true">{{$timetable->remarks}}</textarea>          
    			</div>
				</div>

				<br>

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
