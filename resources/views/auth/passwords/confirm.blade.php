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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-20">
                <div class="card">
                    <div class="card-header">{{ __('Confirm Password') }}</div>

                    <div class="card-body">
                        {{ __('Please confirm your password before continuing.') }}

                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Confirm Password') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/almasaeed2010/adminlte/plugins/jquery/jquery.min.js"></script>
<script src="/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/almasaeed2010/adminlte/dist/js/adminlte.min.js"></script>

</body>
</html>