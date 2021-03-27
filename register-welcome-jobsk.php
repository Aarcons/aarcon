<?php
require 'jobskrregprcs.php';
$user = $_SESSION['user'];
if (empty($_SESSION['user'])) {
  header("Location:register.php");
}
else
{
  session_unset();
  session_destroy();
}
?>
<!Doctype html>
<html lang="en" style="height: 100%;" class="reg-html">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Welcome</title>
    <link rel="stylesheet" type="text/css" href="css/hover.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="icon" type="image/png" href="images/acs-a3.png">
    <link rel="stylesheet" type="text/css" href="lib/bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="lib/fontawesome/css/all.min.css">
    <script src="lib/jquery-3.4.1/jquery-3.4.1.min.js"></script>
    <script src="lib/waypoints-master/lib/jquery.waypoints.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/main.min.css">
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
        }
        h4{
            font-size: 95%;
        }
        h3{
            font-size: 120%;
        }
        p{
            font-size: 75%;
        }
        @media screen and (min-width: 1020px){
            h4{
                font-size: 130%;
            }
            h3{
                font-size: 155%;
            }
            p{
                font-size: 107%;
            }
            h5{
                font-size: 112%;
            }
        }
        @media screen and (min-width: 1050px){
            h4{
                font-size: 120%;
            }
            h3{
                font-size: 180%;
            }
            p{
                font-size: 90%;
            }
            h5{
                font-size: 90%;
            }
        }
    </style>
    </head>
  <body class="reg-body" style="height: 100%;">
    <div style="height: 93.5%;" class="main-div">

        <div class="container-fluid" id="welcome-mes-con2" style="height: 60%;">
            <div class="row row-matter" style="height: 100%;">
                <div class="col-md-4 mt-2 mt-md-5 col-4-message" style="height: 100%;">
                    <div class="col-12 message-col">
                        <div class="message-bg hvr-float">
                            <img src="images/congratulations.svg">
                            <h3 class="title-color pt-3">Congratulations,</h3>
                            <h4>You are now a registered member.</h4>
                            <h5>You can now avail all of these amazing member only benefits.</h5>
                            <p class="text-primary"><b>User Id: <?php echo $user; ?></b></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8" style="height: 100%;">
                    <div class="row">
                        <div class="col-12 col-div mt-3 mt-md-5 col-md-6">
                            <div class="ben-div hvr-float">
                                <div class="row">
                                    <div class="col-5">
                                        <img src="images/browse-jobs-new3.svg">
                                    </div>
                                    <div class="pl-4 col-7">
                                        <h4 class="title-color">Browse from Thousands of Jobs</h4>
                                        <p>Browse desired jobs from thousands of jobs just by filling necessary details.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-div mt-3 mt-md-5 col-12">
                            <div class="ben-div hvr-float">
                                <div class="row">
                                    <div class="col-5">
                                        <img src="images/job-interview.svg">
                                    </div>
                                    <div class="pl-4 col-7">
                                        <h4 class="title-color">Get notified for interview</h4>
                                        <p>Just fill the necessary details and get personalized notification.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-div mt-3 mt-md-3 col-md-6">
                            <div class="ben-div hvr-float">
                                <div class="row">
                                    <div class="col-5">
                                        <img src="images/alert-inbox.svg">
                                    </div>
                                    <div class="pl-4 col-7">
                                        <h4 class="title-color">Get alerts directly to your inbox</h4>
                                        <p>After creating a job alert from your dashboard. </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-div mt-3 mt-md-3 col-12">
                            <div class="ben-div hvr-float">
                                <div class="row">
                                    <div class="col-5">
                                        <img src="images/job-email.svg">
                                    </div>
                                    <div class="pl-4 col-7">
                                        <h4 class="title-color">Get job alerts on your email</h4>
                                        <p>Get notification alerts directly on your email.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-4 " style="height: 100%;">
                    <div class="row">
                        
                    </div>
                </div> -->
             </div>
        </div>
        <div class="row btnrow pt-4 pt-md-3 pb-3 pb-md-0" style="height: 6%;">
            <button type="submit" class="btn lgwel" name="lgwel" onclick="window.location.href = 'job-portal-login.php'">Login</button>
            <button type="submit" class="btn" name="jobhomewel" onclick="window.location.href = 'job-portal-home.php'">Job Home</button>
        </div>
        <div style="height: 25%;">
            <div class="container-fluid pt-3 company-carousel">
                <h2 class="text-center pt-5 pb-3">Our Partners</h2>
                <div class="owl-carousel pt-3 owl-theme">
                    <div class="item">
                        <img src="images/hdfc-bank.png">
                    </div>
                    <div class="item">
                        <img src="images/reinforce-software.png">
                    </div>
                    <div class="item big-logo">
                        <img src="images/shree-oswal.png">
                    </div>
                    <div class="item">
                        <img src="images/star-health-insurance.png">
                    </div>
                    <div class="item">
                        <img src="images/synnova-gears.png">
                    </div>
                    <div class="item big-logo">
                        <img src="images/tata-motors.png">
                    </div>
                    <div class="item big-logo">
                        <img src="images/wipro.png">
                    </div>
                    <div class="item">
                        <img src="images/avic-marketing.png">
                    </div>
                    <div class="item">
                        <img src="images/axis-bank.png">
                    </div>
                    <div class="item">
                        <img src="images/byjus.png">
                    </div>
                    <div class="item">
                        <img src="images/centrum.png">
                    </div>
                    <div class="item">
                        <img src="images/ctv.png">
                    </div>
                    <div class="item big-logo">
                        <img src="images/dhirendra-international.png">
                    </div>
                    <div class="item">
                        <img src="images/dmart.png">
                    </div>
                    <div class="item">
                        <img src="images/green-power.png">
                    </div>
                    <div class="item">
                        <img src="images/gruh-finance.png">
                    </div>
                    <!-- <div class="item">
                        <img src="images/dmart.png">
                    </div> -->
                </div>
                
            </div>
        </div>
        
    </div>
    <div class="footer" style="border-top: 0.1px solid #fff;">
    &copy This Website is Copyrighted to <b>AARAMBH Pvt. Ltd.</b><br>Designed and Developed By <a href="#">Imran H. Tanwar</a> (All Rights Reserved)
    </div>
    <script src="lib/popperjs-1.16.0/javascript/popper.min.js"></script>
    <script src="lib/bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script type="text/javascript">
        var owl = $('.owl-carousel');
        owl.owlCarousel({
        items:8,
        loop:true,
        margin:0,
        autoplay:true,
        autoplayTimeout:1500,
        autoplayHoverPause:true,
        responsiveClass: true,
                responsive:{
                    0:{
                        items: 1,
                        dots: false
                    },
                    600:{
                        items: 2,
                        dots: false
                    },
                    1200:{
                        items: 5
                    }
                }
        
        });
      
        $(document).ready(function() {
              owl.trigger('play.owl.autoplay',[4000])
          })
    </script>
  </body>
</html>