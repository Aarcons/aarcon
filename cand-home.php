<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Candidate Home</title>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="lib/fontawesome/css/all.min.css">
    <link rel="icon" type="image/png" href="images/acs-a3.png">
    <link rel="stylesheet" type="text/css" href="css/hover.css">
    <script src="lib/jquery-3.4.1/jquery-3.4.1.min.js"></script>
    <script src="lib/waypoints-master/lib/jquery.waypoints.min.js"></script>
    <script src="js/croppie.js"></script>
    <link rel="stylesheet" href="css/croppie.css" />
    <link rel="stylesheet" type="text/css" href="css/main.min.css">
    <style type="text/css">
        body{
            background-image: none;
            background-color: #f5f5f5;
        }
    </style>    
  </head>
  <body>
    <?php include 'job-portal-cand-nav.php' ?>
    <section id="welcome-section">
        <div class="container-fluid welcome-container">
            <div class="row">
                <div class="welcome-overlay">
                    
                </div>
                <div class="col-md-2 pt-5 b img-col"> 
                    <div class="img-div text-center" id="uploaded_image">
                        <div class="avatar-img">
                            
                        </div>                            
                    </div>
                    <div class="upload-div">
                        <label for="img-upl"><span><i class="fas fa-camera"></i></span></label>
                        <input type="file" name="img-upl" id="img-upl">
                    </div> 


                    <div id="uploadimageModal" class="modal" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100">Crop & Upload Image</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                        <div class="col-md-12 imgmodal-img">
                                              <div id="image_demo" style="width:350px; margin-top:30px"></div>
                                        </div>
                                        
                                </div>
                                <div class="modal-footer">
                                    <div class="imgmodal-upbtn" >
                                        <button class="btn btn-success crop_image">Upload Image</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pt-5 name-section">
                    <h3 class="mt-4">Name</h3>
                    <h4 class="text-left">Profile Activation Date: 08/01/2020</h4>
                    <h4 class="text-left">Profile Expiration Date: 08/01/2021</h4>
                    <p>User Id : emailid</p>
                </div>
                <div class="col-md-7 pt-5 prof-detail">
                    <h4 class="text-center">Your Profile Completion</h4>
                    <div class="progress" >
                       <div class="progress-bar">
                           20%
                       </div>
                    </div>
                    <h5>Steps to complete your profile.</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <ul>
                                <li>
                                    <i class="fas fa-envelope"></i>
                                    <a href="#">Verify Email Id - 10%</a>
                                </li>
                                <li>
                                    <i class="fas fa-mobile-alt"></i>
                                    <a href="#">Verify Mobile No. - 10%</a>
                                </li>
                                <li>
                                    <i class="fas fa-info-circle"></i>
                                    <a href="#">Basic Information - 20%</a>
                                </li>
                                <li>
                                    <i class="fas fa-university"></i>
                                    <a href="#">Educational Qualification - 20%</a>
                                </li>
                                <li>
                                    <i class="fas fa-user-tag"></i>
                                    <a href="#">Other Qualification - 5%</a>
                                </li>
                            </ul>   
                        </div>
                        <div class="col-md-6">
                            <ul>
                                <li>
                                    <i class="fas fa-users-cog"></i>
                                    <a href="#">Key Skills - 10%</a>
                                </li>
                                <li>
                                    <i class="fas fa-user-secret"></i>
                                    <a href="#">Total Experience - 10%</a>
                                </li>
                                <li>
                                    <i class="fas fa-clipboard"></i>
                                    <a href="#">Profile Summary - 5%</a>
                                </li>
                                <li>
                                    <i class="fas fa-user-tie"></i>
                                    <a href="#">Desired Career Profile - 10%</a>
                                </li>
                            </ul>    
                        </div>         
                    </div> 
                </div>
            </div>
        </div>
    </section>
    <section id="dash-container">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-4 mt-4 mt-md-0">
                    <div class="cdh-bgdiv text-center">
                        <img src="images/cand-profile.png">
                        <h3 class="mt-3 ic-text pb-2"><a href="#">Candidate Profile</a></h3>
                        <h4 class="info-text">Fill all the required details in your profile for getting the best matched jobs for yourself according to your qualification.</h4>
                    </div>
                </div>
                <div class="col-md-4 mt-4 mt-md-0">
                    <div class="cdh-bgdiv text-center">
                        <img src="images/cand-alert.png">
                        <h3 class="mt-3 ic-text pb-2"><a href="#">Create a Job Alert</a></h3>
                        <h4 class="info-text">To create a job alert just fill the basic profile details and create a job alert according to your profile.</h4>
                    </div>
                </div>
                <div class="col-md-4 mt-4 mt-md-0">
                    <div class="cdh-bgdiv text-center">
                        <img src="images/recommended-jobs2.png">
                        <h3 class="mt-3 ic-text pb-2"><a href="#">Recommended Jobs</a></h3>
                        <h4 class="info-text">You will find the recommended jobs according to your basic profile, education and experience details.</h4>
                    </div>
                </div>
            </div>
            <div class="row mt-md-4">
                <div class="col-md-4 mt-4 mt-md-0">
                    <div class="cdh-bgdiv text-center second-row">
                        <img src="images/upload-doc2.png">
                        <h3 class="mt-3 ic-text pb-2"><a href="#">Upload Documents</a></h3>
                        <h4 class="info-text">Upload the required documents to increase your chances of getting the job that you desire.</h4>
                    </div>
                </div>
                <div class="col-md-4 mt-4 mt-md-0">
                    <div class="cdh-bgdiv text-center second-row">
                        <img src="images/undraw-account.png">
                        <h3 class="mt-3 ic-text pb-2"><a href="#">Account Settings</a></h3>
                        <h4 class="info-text">Change your account settings in this section if you want to change your password and user id.</h4>
                    </div>
                </div>
                <div class="col-md-4 mt-4 mt-md-0">
                    <div class="cdh-bgdiv text-center cd-lgdiv">
                        <img src="images/undraw-logout.png" class="lgimg">
                        <img src="images/bye-logout.png" class="bye-img">
                        <div>
                            <button type="submit" class="btn cdhome-lgbtn" onmouseover="imgchange()" onmouseout="imgnormal()">Logout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include 'job-portal-dash-footer.php' ?>
    <script src="lib/popperjs-1.16.0/javascript/popper.min.js"></script>
    <script src="lib/bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function imgchange(){
            $(".bye-img").css("display", "initial");
            $(".bye-img").css("height", "52%");
            $(".bye-img").css("width", "34%");
            $(".bye-img").css("margin-top", "34px");
            $(".cdhome-lgbtn").css("margin-top", "20px");
            $(".lgimg").css("display", "none");
        }
        function imgnormal(){
            $(".bye-img").css("display", "none");
            $(".lgimg").css("display", "initial");
            $(".cdhome-lgbtn").css("margin-top", "0px");
        }
    </script>
  </body>
</html>