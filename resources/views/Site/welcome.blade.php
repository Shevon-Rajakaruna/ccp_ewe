<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Welcome | CCP University</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="/almasaeed2010/adminlte/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style>
    /*body {
      background-image: url('/Images/i8.jpg') !important;
      width:100%;
      height: 100vh;
    }*/
    .title{
      position: absolute;
      top: 25%;
      left: 50%;
      width: 1300px;
      height: 300px;
      transform: translate(-50%,4%);
    }

    .title h1{
      font-family: "Lucida Handwriting";
      color: white;
      font-size: 45px;
      text-align: center;
    }
    .title h3{
      font-family: "Lucida Handwriting";
      color: white;
      font-size: 16px;
      text-align: center;
    }
    .button{
      position: absolute;
      top: 60%;
      left: 50%;
      transform: translate(-50%,-40%);
    }
    .btn{
      border: 1px solid #fff;
      padding: 10px 30px;
      color: #fff;
      font-weight: bold;
      text-decoration: none;
      transition: 0.6s ease;
    }

    .btn:hover{
      background-color: #fff;
      color:#000;
    }

  </style>

  <body>
      <div class="title" style="background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));">
        <br>
        <h1>Welcome to CCP University</h1>
        <br>
        <h3>“University can teach you skill and give you opportunity, but it can't </h3><h3> teach you sense, nor give you understanding. Sense and understanding are produced within one's soul.”</h3>
        <h3>― C. JoyBell C.</h3>
      </div>

      <div class="button">
        <br><br>
        <a href="{{ url('/login') }}" class = "btn"> Login</a>&nbsp;&nbsp;
        <a href="{{ url('/register') }}" class = "btn"> Sign Up</a>
      </div>
  </body>

<script src="/Images/slides/css/easy_background.js"></script>

<script>
  easy_background("body",
    {
      slide: ["/Images/slides/776489.jpg", "/Images/slides/garden_trees_lawn.jpg", "/Images/slides/2151061.jpg", "/Images/slides/strahov_monastery.jpg"],

      delay: [3000, 3000, 3000, 3000]
    }
  );
</script>