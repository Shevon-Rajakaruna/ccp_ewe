@extends('layouts.main')
@section('content')
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h4>User Biography</h4>

            <p></p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ url('/personal/view') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      
      <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
          <div class="inner">
            <h4>Working Hours</h4>

            <p></p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="{{ url('/timetable/index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <!-- <div class="col-lg-3 col-6">
        
        <div class="small-box bg-warning">
          <div class="inner">
            <h4>Student Evaluation</h4>

            <p></p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div> -->
      <!-- ./col -->
    @if(Auth::user()->user_type == 0 || Auth::user()->user_type == 7 || Auth::user()->user_type == 8 || Auth::user()->user_type == 9)
      <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
          <div class="inner">

            <h4>Reports</h4>
            <p></p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="{{ url('/site/reports') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
          <div class="inner">

            <h4>View All Biographies</h4>
            <form action="/personal/admin_search" method="get"> 
              <div class="input-group">
                <select name="user" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                  <option data-select2-id="3">Select a User ...</option>
                  @foreach ($users as $user)
                    <option value="{{ $user->userid }}">{{ $user->userid }} - {{ $user->full_name }}</option>
                  @endforeach
                </select>

                <span class="input-group-prepend">
                  <button type="submit" class="btn btn-primary">Search</button>
                </span>
              </div>
            </form>

          </div>
        </div>
      </div>
    @endif
    </div>    
  </div>

  <div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

        <a href="{{ url('/project/index') }}">
          <div class="info-box-content">
            <span class="info-box-text" style="color: black;">Projects</span>
            <span class="info-box-number" style="color: black;">{{$project_count->count}}</span>
          </div>
        </a>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

        <a href="{{ url('/research/index') }}">
          <div class="info-box-content">
            <span class="info-box-text" style="color: black;">Researches</span>
            <span class="info-box-number" style="color: black;">{{$reserch_count->count}}</span>
          </div>
        </a>
      </div>
    </div>

    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

        <a href="{{ url('/publication/index') }}">
          <div class="info-box-content">
            <span class="info-box-text" style="color: black;">Publications</span>
            <span class="info-box-number" style="color: black;">{{$pub_count->count}}</span>
          </div>
        </a>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

        <a href="{{ url('/workshops/index') }}">
          <div class="info-box-content">
            <span class="info-box-text" style="color: black;">Workshops/Conferences</span>
            <span class="info-box-number" style="color: black;">{{$workshop_count->count}}</span>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>

@endsection