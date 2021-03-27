<?php 
if (isset($_SESSION)) {
  session_unset();
  session_destroy();
}
require 'jobskrloginprcs.php';
if (!isset($_SESSION)) {
  session_start();
}
?>
<!Doctype html>
<html lang="en" style="height: 100%;">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="lib/bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="lib/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="lib/animate-master/animate.min.css">
    <link rel="icon" type="image/png" href="images/acs-a3.png">
    <script src="lib/jquery-3.4.1/jquery-3.4.1.min.js"></script>
    <script src="lib/waypoints-master/lib/jquery.waypoints.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/main.min.css">
    <title>Job Portal Login Page</title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-0PWJWQKF7C"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-0PWJWQKF7C');
</script>
    <style type="text/css">
      body{
        background-image: url(./images/login-trial4.png);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom;
      }
    </style>
  </head>
  <body style="height: 100%;">
    <section class="h-100">
      <div class="container h-100 d-md-flex justify-content-center"> 
        <div class="row h-100 align-items-center">
          <!-- <div class="login-container-main"> -->
            <div class="login-container">
              <div class="sublogin-container">
                <div class="logo-container d-flex justify-content-center mt-5">
                    <img src="images/acs-a3.png">
                  </div>
                <div class="tab-content-container mt-4">
                  <ul class="nav nav-tabs d-inline-flex justify-content-center">
                    <li class="nav-item">
                      <a href="#jobseeker" class="nav-link active" data-toggle="tab">Jobseeker</a>
                    </li>
                    <li class="nav-item">
                      <a href="#employer" class="nav-link" data-toggle="tab">Employer</a>
                    </li>
                    <li class="nav-item">
                      <a href="#placement-associate" class="nav-link" data-toggle="tab">Institute Partner</a>
                    </li>
                  </ul>
                  <div class="tab-content pl-md-5 pr-md-5">
                    <div id="jobseeker" class="container tab-pane active">
                      <form method="post">
                        <div class="form-group">
                          <input type="email" class="form-control" name="jobseeker-email" id="jobseeker-email" placeholder="Email Id"required>
                          <i class="fas fa-user"></i>
                        </div>
                        <div class="form-group">
                          <input type="password" class="form-control" name="jobseeker-password" id="jobseeker-password" placeholder ="Password" required>
                          <i class="fas fa-user-lock"></i>
                        </div>
                        <div class="text-center btn-grid">
                          <button type="submit" name="jobsk_lg" class="btn btn-primary w-100">Login</button>
                          <a href="forgot-pass.php" class="forget-password mt-2">Forgot Password</a>
                          <a href="register.php" class="forget-password mt-2">Sign Up</a>
                        </div>
                      </form>
                      <div class="error-message"><?php echo $status; ?></div>
                    </div>
                    <div id="employer" class="container tab-pane">
                      <form id="comp_login" method="post">
                        <div class="form-group">
                          <input type="email" class="form-control" name="employer-email" id="employer-email" placeholder="Email Id" required>
                          <i class="fas fa-user"></i>
                        </div>
                        <div class="form-group">
                          <input type="password" class="form-control" name="employer-password" id="employer-password" placeholder="Password" required>
                          <i class="fas fa-user-lock"></i>
                        </div>
                        <div class="text-center btn-grid">
                          <button type="submit" name="empl_lg" class="btn btn-primary w-100">Login</button>
                          <a href="forgot-pass.php" class="forget-password mt-2">Forgot Password</a>
                          <a href="register.php" class="forget-password mt-2">Sign Up</a>
                        </div>
                      </form>
                      <div id="result" class="error-message"><?php echo $status; ?></div>
                    </div>
                    <div id="placement-associate" class="container tab-pane">
                      <form id="inst-login" method="post">
                        <div class="form-group">
                          <input type="email" class="form-control" name="placement-associate-email" id="placement-associate-email" placeholder="Email Id" required>
                          <i class="fas fa-user"></i>
                        </div>
                        <div class="form-group">
                          <input type="password" class="form-control" name="placement-associate-password" id="placement-associate-password" placeholder="Password" required>
                          <i class="fas fa-user-lock"></i>
                        </div>
                        <div class="text-center btn-grid">
                          <button type="submit" name="plas_lg" class="btn btn-primary w-100">Login</button>
                          <a href="forgot-pass.php" class="forget-password mt-2">Forgot Password</a>
                          <a href="register.php" class="forget-password mt-2">Sign Up</a>
                        </div>
                      </form>
                      <div id="resp" class="error-message"><?php echo $status; ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <!-- </div> -->
        </div>
      </div>
    </section>
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
    <script src="lib/popperjs-1.16.0/javascript/popper.min.js"></script>
    <script src="lib/bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
      jQuery('#comp_login').on('submit', function (e) {
        if (document.getElementById("comp_login").checkValidity()) {
            e.preventDefault();
            jQuery.ajax({
                url: 'newloginprcs.php',
                method: 'POST',
                data: jQuery('#comp_login').serialize(),
                success: function (response) {
                    $("#result").html(response);
                    $('#comp_login')[0].reset();

                  }
              })
          }
          return true;
      });
      jQuery('#inst-login').on('submit', function (e) {
        if (document.getElementById("inst-login").checkValidity()) {
            e.preventDefault();
            jQuery.ajax({
                url: 'newloginprcs.php',
                method: 'POST',
                data: jQuery('#inst-login').serialize(),
                success: function (response) {
                    $("#resp").html(response);
                    $('#inst-login')[0].reset();

                  }
              })
          }
          return true;
      });
    });
    // $(function() {
    // var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    // var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
    // $("html, body").css({"width":w,"height":h});
    // });
    </script>
  </body>
</html>