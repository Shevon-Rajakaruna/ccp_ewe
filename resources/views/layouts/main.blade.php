 
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>CCP University</title>
  
  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/summernote/summernote-bs4.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <nav class="main-header navbar navbar-expand navbar-dark navbar-info">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/index') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
    
    <!-- search -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      @if(Auth::user()->user_type == 0 || Auth::user()->user_type == 7 || Auth::user()->user_type == 8 || Auth::user()->user_type == 9)
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ url('/site/adminpanel') }}" class="nav-link">Admin Panel</a>
        </li>

      @endif
        
        

      <!-- Notifications Dropdown Menu -->
      @guest
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
          @endif
      @else
     
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                
                <img src="{{ asset('storage/' . App\Personal::select('image')->Where('userid', Auth::user()->user_code)->value('image')) }}" alt="" class="img-circle elevation-2" style="height: 25px !important; width: 25px !important;">
                <span class="caret"> {{ Auth::user()->name }} </span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          </li>
      @endguest
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/index') }}" class="brand-link">
      <img src="/Images/logo.jpg" alt="CCP" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">CCP University</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Biography
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/personal/create') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Personal Info</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/educational/create') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Educational Qualifications</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/experience/create') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Working Experiences</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/skill/create') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Skills</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/accomplish/create') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Accomplishments</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/personal/view') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Biography</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Projects
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/project/create') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Projects</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/project/index') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Projects</p>
                </a>
              </li>
            </ul>
          </li>

           <li class="nav-item has-treeview">
            <a class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Researches
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/research/create') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Researches</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/research/index') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Researches</p>
                </a>
              </li>
            </ul>
          </li>

           <li class="nav-item has-treeview">
            <a class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Publications
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/publication/create') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Publications</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/publication/index') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Publications</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Workshops & Conferences
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/workshops/create') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Workshops & Conferences</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/workshops/index') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Workshops & Conferences</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Working Hours
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/timetable/create') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Working Hours</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('/timetable/index') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Working Hours</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Academic Events
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/events/create') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Academic Events</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/events/index') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Academic Events</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- / -->
          <li class="nav-item has-treeview">
            <a class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Faculty & Department
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

            @if(Auth::user()->user_type == 0 || Auth::user()->user_type == 7 || Auth::user()->user_type == 8 || Auth::user()->user_type == 9)
              <li class="nav-item">
                <a href="{{ url('/faculty/create') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Faculties</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('/department/create') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Departments</p>
                </a>
              </li>
            @endif

              <li class="nav-item">
                <a href="{{ url('/department/userview') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Faculties & Departments</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Modules
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

            @if(Auth::user()->user_type == 0 || Auth::user()->user_type == 7 || Auth::user()->user_type == 8 || Auth::user()->user_type == 9)
              <li class="nav-item">
                <a href="{{ url('/module/create') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Modules</p>
                </a>
              </li>
            @endif
            
              <li class="nav-item">
                <a href="{{ url('/module/userindex') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Modules</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
            <h6 class="m-0 text-dark">Dashboard</h6>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @yield('content')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.4
    </div>
  </footer> -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/almasaeed2010/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/almasaeed2010/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/almasaeed2010/adminlte/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/almasaeed2010/adminlte/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/almasaeed2010/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/almasaeed2010/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/almasaeed2010/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/almasaeed2010/adminlte/plugins/moment/moment.min.js"></script>
<script src="/almasaeed2010/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/almasaeed2010/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/almasaeed2010/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/almasaeed2010/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/almasaeed2010/adminlte/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/almasaeed2010/adminlte/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/almasaeed2010/adminlte/dist/js/demo.js"></script>
</body>
</html>
