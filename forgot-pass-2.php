<!Doctype html>
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
              <div class="col-12 emcon mt-5">
                <div class="pass-details">
                  <h4 class="text-center">Hi, Name!</h4>
                  <h5 class="text-center">Your contact email is sg****@gmail.com <br> Please press the below button to send OTP on <br> this email to reset your password.</h5>
                  <div class="btndiv">
                    <button type="submit" class="btn fgotpbtn1 mt-3" data-toggle="modal" data-target="#fgotp">Send OTP</button>
                  </div>
                  <a href="#">Back</a>
                </div>
              </div>
            </div>
            <div class="modal fade fgotp-modal" id="fgotp">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-center w-100">Please Enter OTP</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>  
                        </div>
                        <div class="modal-body">
                            <form method="post">
                              <div class="form-group">
                                <input type="text" name="fgotpin" placeholder="Enter OTP" class="form-control col-6 mx-auto" required>
                              </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn fgotpbtn">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
    <script src="lib/popperjs-1.16.0/javascript/popper.min.js"></script>
    <script src="lib/bootstrap-4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>