<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style>
    body {
      background-image: url('/Images/i2.jpg') !important;
      width:100%;
      height: 100vh;
    }

    h1 {
      font-family: Gill Sans, serif;
      font-size: 35px;
    }

    p{
      color: black;
    }
    label{
      color: black;
    }
    .card{
      border-radius:15px;  
      background: rgb(255,255,255,0.5);
    }

    .card-body{
      border-radius:15px;
      background: rgb(255,255,255,0.5);
    }

    .input-group{
      border: 1px solid grey;
      border-radius:5px;
    }
    [class*=icheck-]>input:first-child+label::before{
      border: 1px solid black;
    }

</style>

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <h1>CCP University</h1>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg" style="font-size: 25px;font-family: Bahnschrift;"><b>Login</b></p>

      <form action="../index" method="get">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
        </div>
          <!-- /.col -->
          <div class="col-12">
            <br>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
      </form>
      <br>
      <div class="social-auth-links text-center mb-3">
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html"><b>I forgot my password</b></a>
      </p>
      <p class="mb-0">
        <a href="{{ url('/signup') }}" class="text-center"><b>Register as a staff member</b></a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

<script src="/almasaeed2010/adminlte/plugins/jquery/jquery.min.js"></script>
<script src="/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/almasaeed2010/adminlte/dist/js/adminlte.min.js"></script>

</body>
</html>
