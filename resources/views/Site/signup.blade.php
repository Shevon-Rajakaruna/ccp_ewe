<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sign Up</title>

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
  </style>

</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <h1>CCP University</h1>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg" style="font-size: 25px;font-family: Bahnschrift;"><b>Sign Up</b></p>

      <form action="../../login" method="get">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Employee ID">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <select id = "usertype"  class="form-control">
            <option value="user">Choose the user type</option>
            <option value="general">Lecturer</option>
            <option value="admin">Assistant Lecturer</option>
            <option value="admin">Senior Lecturer</option>
            <option value="admin">Head of Department</option>
            <option value="admin">Dean</option>
            <option value="admin">Vice Chancellor</option>
          </select>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Confirm password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        
      </div>

      <a href="{{ url('/login') }}" class="text-center"><b>I already have an account</b></a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>

<script src="/almasaeed2010/adminlte/plugins/jquery/jquery.min.js"></script>
<script src="/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/almasaeed2010/adminlte/dist/js/adminlte.min.js"></script>
</body>
</html>
