@extends('layouts.main')
@section('content')

  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<div class="container-fluid">
    <div class="card card-info">
		<div class="card-header">
			<h3 style="font-size:20px" class="card-title">Add Your Educational Qualifications</h3>
		</div>
		<div class="card-body">
		<form role="form" method="post" action="{{ route('educational.store') }}">
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
			    <div class="col-sm-12">
			      	<div class="form-group">
			  	       	<label> Institute </label>
        				<input class="form-control" type="text" name="institute" placeholder="Ex: Sri Lanka Institute of Information Technology">
					</div>
			    </div>
			       
	       </div>
	       <div class="row">
			    <div class="col-sm-12">
			    	<div class="form-group">
					  	<label> Degree </label>
        				<input class="form-control" type="text" name="degree" placeholder="Ex: Bachelor Of Computing">
					</div>			     
			    </div>    
			</div>

			<div class="row">
			    <div class="col-sm-12">
			    	<div class="form-group">
					  	<label> Field of Study </label>
        				<input class="form-control form-control-sm" type="text" name="field" placeholder="Ex: Information Technology">
					</div>			     
			    </div>    
			</div>

			<div class="row">
	          <div class="col-md-6">
	            <div class="form-group">
	              <label>Start Date</label>
	              <select class="form-control select2" name="start_date" style="width: 100%;">
	                <option selected="selected">Please select a year</option>
	                <option>1999</option>
	                <option>2000</option>
	                <option>2001</option>
	                <option>2002</option>
	                <option>2003</option>
	                <option>2004</option>
	                <option>2005</option>
	                <option>2006</option>
	                <option>2007</option>
	                <option>2008</option>
	                <option>2009</option>
	                <option>2010</option>
	                <option>2011</option>
	                <option>2012</option>
	                <option>2013</option>
	                <option>2014</option>
	                <option>2015</option>
	                <option>2016</option>
	                <option>2017</option>
	                <option>2018</option>
	                <option>2019</option>
	                <option>2020</option>


	              </select>
	            </div>

	          </div>

	          <div class="col-md-6">
	            <div class="form-group">
	              <label>End Date </label>
	              <select class="form-control select2" name="end_date" style="width: 100%;">
	                <option selected="selected">Please select a year</option>
	                <option>2030</option>
	                <option>2029</option>
	                <option>2028</option>
	                <option>2027</option>
	                <option>2026</option>
	                <option>2025</option>
	                <option>2024</option>
	                <option>2023</option>
	                <option>2022</option>
	                <option>2021</option>
	                <option>2020</option>
	                <option>2019</option>
	                <option>2018</option>
	                <option>2017</option>
	                <option>2016</option>
	                <option>2015</option>
	                <option>2014</option>
	                <option>2013</option>
	                <option>2012</option>
	                <option>2011</option>
	                <option>2010</option>
	                <option>2009</option>
	                <option>2008</option>
	                <option>2007</option>
	                <option>2006</option>
	                <option>2005</option>
	                <option>2004</option>
	                <option>2003</option>
	                <option>2002</option>
	                <option>2001</option>
	                <option>2000</option>
	                <option>1999</option>

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



@endsection


