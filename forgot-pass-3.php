<!doctype html>
<html lang="en" style="height: 100%;">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="lib/bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="images/acs-a3.png">
    <link rel="stylesheet" type="text/css" href="lib/fontawesome/css/all.min.css">
    <script src="lib/jquery-3.4.1/jquery-3.4.1.min.js"></script>
    <script src="lib/waypoints-master/lib/jquery.waypoints.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/main.min.css">
    <title>Forgot Password</title>
    <style type="text/css">
      body{
        background-image: url(./images/login-trial4.png);
        background-repeat: no-repeat;
        background-size: cover;
      }
    </style>
  </head>
  <body style="height: 100%;">
    <section class="h-100">
      <div class="container-fluid h-100 d-md-flex justify-content-center">
        <div class="row h-100 align-items-center">
          <div class="login-container">
            <div class="sublogin-container" style=" ">
              <div class="logo-container d-flex justify-content-center mt-5">
                  <img src="images/acs-a3.png">
                </div>
              <div class="col-12 emcon emconfp3 mt-5">
                <div class="pass-details">
                  <h4 class="text-center mb-4">Reset Password!</h4>
                  <form method="post">
                    <div class="form-group">
                      <div class="input-group ">
                        <div class="input-group append">
                          <div class="lock">
                            <i class="fas fa-user-lock form-control"></i>
                          </div>
                          <input type="password" name="newpass" placeholder="New Password" class="form-control" id="newpassfg" required>
                          <div class="eye">
                            <a href="#" class="passeye" onclick="shfun()"><i class="fas fa-eye  form-control"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="input-group ">
                        <div class="input-group append">
                          <div class="lock">
                            <i class="fas fa-user-lock form-control"></i>      
                          </div>
                          <input type="password" name="conpassfg" placeholder="Confirm Password" class="form-control conpass" id="conpassfg" required>
                          <div class="eye">
                            <a href="#" class="passeye" onclick="sh2fun()"><i class="fas fa-eye form-control"></i></a>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </form>
                  <div class="btndiv">
                    <button type="submit" class="btn fgotpbtn1 ">Reset Password</button>
                  </div>
                  <a href="#">Back</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script src="lib/popperjs-1.16.0/javascript/popper.min.js"></script>
    <script src="lib/bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      function shfun(){
        var sh = document.getElementById("newpassfg")
        event.preventDefault();
        if (sh.type === "password") {
            sh.type = "text";
        } 
        else {
            sh.type = "password";
        }
      }
      function sh2fun(){
        var sh2 = document.getElementById("conpassfg")
        event.preventDefault();
        if (sh2.type === "password") {
            sh2.type = "text";
        } 
        else {
            sh2.type = "password";
        }
      }
    </script>
  </body>
</html>