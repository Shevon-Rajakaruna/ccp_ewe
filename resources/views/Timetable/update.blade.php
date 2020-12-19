@extends('layouts.main')
@section('content')

  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

	<script type="text/javascript">

		$(document).ready(function(){
			$('#dropdown').change(function() {
		    if( $(this).val() == "Other") {
		        $('.remark').show();
		    } else {       
		        $('.remark').hide();
		    }
			});
		});

	</script>
   
<div class="content-body">
    <h2> Working Hours </h2>
	<div class="col-md-12">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Update Working Hours</h3>
			</div>
			<div class="card-body">
			<form method="post" action="{{ route('timetable.update',$timetable->id) }}">
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
					  	<select name="module" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
					    <option value="{{ $timetable->module }}">Select a Module ...</option>
					    @foreach ($modules as $module)
                <option value="{{ $module->id }}">{{ $module->mod_code }} - {{ $module->mod_name }}</option>
              @endforeach
					  	</select>
						</div>			     
			    </div>    
				</div>

				<div class="row">
					<div class="col-sm-4">
				    <div class="form-group">
					  	<label>Category: </label>
					  	<select name="category" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
						    <option data-select2-id="3">{{$timetable->category}}</option>
						    <option value="Lecture">Lecture</option>
						    <option value="Tutorial">Tutorial</option>
						    <option value="Lab Session">Lab Session</option>
						    <option value="Other">Other</option>
					  	</select>
						</div>
				  </div>
				  
				  <div class="col-sm-4">
		        <div class="form-group">
		          <label>Total Teaching Hours: </label>
		          <input name="tot_hours" type="text" class="form-control" placeholder="Total Hours" value="{{$timetable->tot_hours}}">
		        </div>
			    </div>
				</div>

				<div class="remark" style="display: none;">
				<div class="row">
					<div class="col-sm-6">						
    				<label>Remarks:</label>
            <textarea class="form-control" rows="3" name="remarks">{{$timetable->remarks}}</textarea>          
    			</div>
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
