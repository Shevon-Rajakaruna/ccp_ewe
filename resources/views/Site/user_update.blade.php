@extends('layouts.main')
@section('content')

  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<div class="content-body">
    <h2> Users </h2> 
	<div class="col-md-12">
		<div class="card card-info">
			<div class="card-header" style="background-color: #6500F9 !important;">
				<h3 class="card-title">Update User Details</h3>
			</div>
			<div class="card-body">
			<form role="form" method="post" action="{{ route('site.update',$users->id) }}">
				@csrf
				<div class="row">
				  <div class="col-sm-4">
	          <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('User Code') }}</label>

            <input id="user_code" type="text" class="form-control" name="user_code" value="{{$users->user_code}}" readonly="true">
	      	</div>

	      	<div class="col-sm-4">
	          <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Name') }}</label>
	          
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$users->name}}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror	          
	      	</div>

	      	<div class="col-sm-4">
	          <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Designation') }}</label>
	          
            <select name="user_type" class="form-control select2 select2-hidden-accessible @error('user_type') is-invalid @enderror" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                <option value="{{ $users->user_level }}">{{ $users->desig }}</option>
                @foreach ($desig as $des)
                    <option value="{{ $des->user_level }}">{{ $des->desp }}</option>
                @endforeach
            </select>

            @error('user_type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
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


