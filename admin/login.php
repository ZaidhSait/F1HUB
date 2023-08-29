<?php require_once('../config.php') ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<style>
  
.hide{
   display:none;}

.VideoContainer{
    cursor: default;
    position: fixed;
   top: 0; 
   right: 0; 
   bottom: 0; 
   left: 0;
   width: 100%;
   height: 100%;
   
   object-fit: cover;
}
.VideoContainer >.video{
  
  position: absolute;
   top: 0;
   left: 0;
   width: 100%;
   height: 100%;
   cursor:pointer;
}
@media (min-aspect-ratio: 16/9) {
    .VideoContainer >  .video{ 
       height: 300%; 
       top: -100%; 
    }
}

@media (max-aspect-ratio: 16/9) {
    .VideoContainer > .video{ 
       width: 300%; 
       left: -100%; 
    }
}
.login-box{
  margin: auto auto;
    
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 1000px;;
}

</style>
<script>
      //script to play background video on loop
      window.onload = function () {
  document.getElementById("video1").addEventListener("ended", function () {
  document.getElementById("video2").play();
  document.getElementById("video2").classList.remove("hide");
  document.getElementById("video1").classList.add("hide")

});
  document.getElementById("video2").addEventListener("ended", function () {
  document.getElementById("video3").play();
  document.getElementById("video3").classList.remove("hide");
  document.getElementById("video2").classList.add("hide")

});
document.getElementById("video3").addEventListener("ended", function () {
  document.getElementById("video1").play();
  document.getElementById("video1").classList.remove("hide");
  document.getElementById("video3").classList.add("hide")

});

  }

    
</script>
 <?php require_once('inc/header.php') ?>
<body class="hold-transition login-page  dark-mode">
<div class="videoContainer">
          <video id="video1" class="video" autoplay muted>
            <source src="http://localhost/Aqua/Vid/clownfish.mp4" type="video/mp4">
          </video>

          <video id="video2" class="video hide" muted>
            <source src="http://localhost/Aqua/Vid/butterflyfish.mp4" type="video/mp4">
          </video>
          <video id="video3" class="video hide" muted>
            <source src="http://localhost/Aqua/Vid/redjellyfish.mp4" type="video/mp4">
          </video>
</div>

  <script>
    start_loader()
  </script>
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="./" class="h1"><b>Login</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form id="login-frm" action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <a href="forgot_password.php">Forgot Password?</a>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->

      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> -->
      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script>
  $(document).ready(function(){
    end_loader();
  })
</script>
</body>
</html>