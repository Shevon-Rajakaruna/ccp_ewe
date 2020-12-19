@extends('layouts.main')
@section('content')
  
  <section class="content">
    <div class="container-fluid">
      <h1 style="text-align: center">Administrative Reports</h1><br>
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <a href="{{ url('/timetable/working') }}" class="small-box-footer">
                  <span class="info-box-text">Employee Working Hours</span>
                  <span class="info-box-text">Report</span>
                </a>
                <!-- <span class="info-box-text">CPU Traffic</span>
                <span class="info-box-number">
                  10
                  <small>%</small>
                </span> -->
              </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

            <div class="info-box-content">
                <a href="{{ url('/timetable/evaluation') }}" class="small-box-footer">
                  <span class="info-box-text">Working Hours</span>
                  <span class="info-box-text">Evaluation Report</span>
                </a>
                <!-- <span class="info-box-text">CPU Traffic</span>
                <span class="info-box-number">
                  10
                  <small>%</small>
                </span> -->
              </div>
          </div>
        </div>

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <a href="{{ url('/project/adminindex') }}" class="small-box-footer">
                <span class="info-box-text">All Projects</span>
                <span class="info-box-text">User wise</span>
              </a>
            </div>
          </div>
        </div>


        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <a href="{{ url('/res/adminindex') }}" class="small-box-footer">
                <span class="info-box-text">All Researches</span>
                <span class="info-box-text">User wise</span>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <a href="{{ url('/publication/adminindex') }}" class="small-box-footer">
                  <span class="info-box-text">All publications</span>
                  <span class="info-box-text">User wise</span>
                </a>
                <!-- <span class="info-box-text">CPU Traffic</span>
                <span class="info-box-number">
                  10
                  <small>%</small>
                </span> -->
              </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

            <div class="info-box-content">
                <a href="{{ url('/workshops/adminindex') }}" class="small-box-footer">
                  <span class="info-box-text">All Workshops</span>
                  <span class="info-box-text">User wise</span>
                </a>
              </div>
          </div>
        </div>

        <!-- fix for small devices only -->
        <!-- <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <a href="{{ url('/project/adminindex') }}" class="small-box-footer">
                <span class="info-box-text">All Projects</span>
                <span class="info-box-text">User wise</span>
              </a>
            </div>
          </div>
        </div>


        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <a href="{{ url('/res/adminindex') }}" class="small-box-footer">
                <span class="info-box-text">All Researches</span>
                <span class="info-box-text">User wise</span>
              </a>
            </div>
          </div>
        </div> -->
      </div>      
    </div>
  </section>

@endsection