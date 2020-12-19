
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  
  <style>
    .booth {
      width: 400px;
      background-color: #ccc;
      border: 10px solid #ddd;
      margin: 0 auto;
    }

    .booth-button{
      display: block;
      margin: 10px 0;
      padding: 10px 20px;
      background-color: cornflowerblue;
      color: #fff;
      text-align: center;
      text-transform: none; 
    }
    #canvas {
      display: none;
    }
  </style>

  <!-- <script>
    'use strict';

        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const snap = document.getElementById('snap');
        const errorMsgElement = document.getElementById('span#ErrorMsg');

        const constraints = {
          audio: false,
          video:{
            width: 1280, height: 720
          } 
        };

        async function init(){
          try{
            const stream = await navigator.mediaDevices.getUserMedia(constraints);
            handleSuccess(stream);
          }
          catch(e){
            // errorMsgElement.innerHTML = `navigator.getUserMedia.error:${e.toString()}`;
          }
        }

        function handleSuccess(stream){
          window.stream = stream;
          video.srcObject = stream;
        }

        init();

        // var context = canvas.getContext('2d');
        // snap.addEventListener("click", function(){
        //   context.drawImage(video, 0, 0, 640, 480);
        // });


  </script> -->

  
  <div class="booth">
    <video id="video" width="400" height="300" autoplay></video>
    <button id="capture" class="booth-button">Capture</button>

    <canvas id="canvas" width="400" height="300"></canvas>
    <img id="photo" src="/Images/bg.jpg" width="400" height="300">
  </div>


<script type="text/javascript">
(function(){
  var video = document.getElementById('video'),
      canvas = document.getElementById('canvas'),
      context = canvas.getContext('2d'),
      photo = document.getElementById('photo'),
      vendorUrl = window.URL || window.webkitURL;
  navigator.getMedia = navigator.getUserMedia ||
                        navigator.webkitGetUserMedia ||
                        navigator.mozGetUserMedia ||
                        navigator.msGetUserMedia;
  navigator.getMedia({
    video: true,
    audio: false
  }, function(stream){
    window.stream = stream;
    video.srcObject = stream;
    // video.src =stream;
    video.play();
  }, function(error){

  });

  document.getElementById('capture').addEventListener("click", function(){
    context.drawImage(video, 0, 0, 400, 300);
    photo.setAttribute('src', canvas.toDataURL('image/jpg'))
  });
  
})();

</script>