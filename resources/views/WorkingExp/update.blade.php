@extends('layouts.main')
@section('content')

  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<div class="content-body">
    <h2> Working Experience </h2> 
	<div class="col-md-12">
		<div class="card card-info">
			<div class="card-header" style="background-color: #66bb6a !important;">
				<h3 class="card-title">Edit Your Working Experience</h3>
			</div>
			<div class="card-body">
			<form role="form" method="post" action="{{ route('experience.update',$model->id) }}">
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
			      <label> Name of the Organization </label>
      			<input class="form-control" type="text" name="organization" value="{{$model->organization}}">
			    </div>
			       
			    <div class="col-sm-6">
			    	<label> Designation </label>
      			<input class="form-control" type="text" name="designation" value="{{$model->designation}}">			     
			    </div>    
				</div>

				<div class="row">
					<div class="col-sm-4">
			    	<label> Department </label>
      			<input class="form-control" type="text" name="department" value="{{$model->department}}">
			    </div>

			    <div class="col-sm-4">
			    	<label>Start Date</label>
	          <select class="form-control select2" name="start_date" style="width: 100%;">
	            <option selected="selected">{{$model->start_date}}</option>
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

			    <div class="col-sm-4">
			    	<label>End Date (or expected) </label>
	          <select class="form-control select2" name="years" style="width: 100%;">
	            <option selected="selected">{{$model->years}}</option>
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
				<br>

				<div class="row">
					<div class="col-sm-6">
						<label> Remarks </label>
      			<textarea class="form-control" rows="3" name="remarks" placeholder="About the Research">{{$model->remarks}}</textarea>
					</div>
				</div>
				<br>

				<div class="row">
					<div class="col-sm-2">
				    <button type="submit" class="btn btn-block btn-success btn-sm">Update</button>
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


