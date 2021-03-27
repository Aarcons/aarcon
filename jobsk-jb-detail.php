<?php  
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['paid'] != "Paid") {
    header("Location: job-portal-login.php");
}

if (isset($_POST['jblgbtn'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
}
require 'cand-dashboardprcs.php';
$profile = $row['profile_photo'];
if (!empty($_GET)) {
    $job_id = $_GET['id'];
}
require 'connection.php';
$sql = "SELECT * FROM post_job WHERE job_id = '$job_id'";
$result = $connection->query($sql);
$row = $result->fetch_assoc();
require 'progressbar.php';
$sqlreg = "SELECT * FROM jobskrreg WHERE email = '$semail'";
$resultreg = $connection->query($sqlreg);
$rowreg = $resultreg->fetch_assoc();
$msger = "";

$name = $_SESSION['name']; 
$date = $rowreg['paid_date'];
$actdate = date("d/m/Y", strtotime(date("Y-m-d", strtotime($date))));
$expirydate = date("d/m/Y", strtotime(date("Y-m-d", strtotime($date)) . " + 365 day"));
?>
<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Details</title>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="lib/fontawesome/css/all.min.css">
    <link rel="icon" type="image/png" href="images/acs-a3.png">
    <link rel="stylesheet" type="text/css" href="css/hover.css">
    <script src="lib/jquery-3.4.1/jquery-3.4.1.min.js"></script>
    <script src="lib/waypoints-master/lib/jquery.waypoints.min.js"></script>
    <script src="js/croppie.js"></script>
    <link rel="stylesheet" href="css/croppie.css" />
    <link rel="stylesheet" type="text/css" href="css/main.min.css">
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
                        <?php if ($profile != ""  ) {
                            echo "<img src = '$profile' class='img-thumbnail img-thumbnailwb'>";
                        }
                        else
                        {
                            //echo "<img src = 'images/avatar3.png'>";
                            echo "<div class = 'avatar-img'></div>";
                        }
                        ?>                             
                    </div>
                    <div class="upload-div upload-divwb">
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
                    <h3 class="mt-4"><?php echo $name; ?></h3>
                    <h4 class="text-left">Profile Activation Date: <?php echo $actdate; ?></h4>
                    <h4 class="text-left">Profile Expiration Date: <?php echo $expirydate; ?></h4>
                    <p>User Id : <?php echo $semail; ?></p>
                </div>
                <div class="col-md-7 pt-md-5 prof-detail">
                    <h4 class="text-center">Your Profile Completion</h4>
                    <div class="progress" >
                       <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $profile_per; ?>" aria-valuemin="0" aria-valuemax="100">
                           <?php echo $profile_per; ?>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 mt-5">
                    <div class="dash-menu sticky-top">
                        <div id="accordion" role="tablist" aria-multiselectable="true" class="">
                            <div class="panel panel-default">
                                <div class="panel-heading menu-link" role="tab" id="headingOne">
                                    <h4 class="panel-title cand-tab">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <a href="cand-dashboard.php">Candidate Profile</a>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel collapse in panel-link" role="tabpanel" aria-labelledby="headingOne">
                                    <a href="#basic-info-sec" class="hvr-float ">Basic Information</a><br>
                                    <a href="#cont-info" class="hvr-float ">Contact Information</a><br>
                                    <a href="#edu-4" class="hvr-float ">Educational Qualification</a><br>
                                    <a href="#oth-qual-sec" class="hvr-float">Other Qualification</a><br>
                                    <a href="#keyskills-sec" class="hvr-float ">Key Skills</a><br>
                                    <a href="#tot-exp-sec" class="hvr-float ">Total Experience</a><br>
                                    <a href="#prof-summary-sec" class="hvr-float ">Profile Summary</a><br>
                                    <a href="#des-car-prof-sec" class="hvr-float ">Desired Career Profile</a><br>
                                </div>
                            </div>
                        </div>
                        <div class="job-alerts menu-link">
                            <h4 class="panel-title">
                                <a href="create-job-alert.php"> Create a Job Alert</a>
                            </h4>
                        </div>
                        <div class="recommended-jobs menu-link">
                            <h4 class="panel-title">
                                <a href="cand-rec-jobs.php">Recommended Jobs</a>
                            </h4>
                        </div>
                        <div class="upload-documents menu-link">
                            <h4 class="panel-title">
                                <a href="jobsk-upload-doc.php">Upload Documents</a>
                            </h4>
                        </div>
                        <div class="Account-Settings menu-link">
                            <h4 class="panel-title">
                                <a href="jobsk-accset.php">Reset Password</a>
                            </h4>
                        </div>
                        <div class="Logout menu-link">
                            <h4 class="panel-title">
                                <form method="post"><button class="lgbtn" name="jblgbtn" type="submit">Logout</button></form>
                            </h4>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-9 main-col-form mt-4">
                    <div class="container-fluid form-container-fluid">
                        <div class="col-12 form-col-12">
                            
                            <div class="container-fluid jb-detail-con">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h3 class="main-head"><b><?php echo $row['position']; ?></b></h3>
                                        <div class="row mt-3 icon-row">
                                            <div class="col-md-4 pr-0 ">
                                                <div class="row">
                                                    <i class="fas mr-2 fa-map-marker-alt"></i>
                                                    <h5><?php echo $row['location']; ?></h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4 ml-md-3 ml-lg-0">
                                                <div class="row">
                                                    <i class="far mr-2 fa-money-bill-alt"></i>
                                                    <h5><?php echo $row['salary']; ?> p.m</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <i class="fas mr-2 fa-hourglass-half"></i>
                                                    <h6><?php echo $row['last_date']; ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 logo-col">
                                        <img src="images/wipro-logo.jpg" style="height: 100%; width: 70%;">
                                    </div>
                                </div>
                                
                                <div class="jb-des">
                                    <h4 class="mt-3">Job Description</h4>
                                    <p><?php echo $row['job_desc']; ?></p>
                                </div>
                                <div class="howapply">
                                    <h4>How to Apply</h4>
                                    <p><?php echo $row['how_to']; ?></p>
                                </div>
                                <div class="res-bity">
                                    <h4>Key Responsibilities</h4>
                                    <p><?php echo $row['resp']; ?></p>
                                </div>
                                <div class="jb-req">
                                    <h4>Job Requirement</h4>
                                    <h5><b>Skills</b></h5>
                                    <ul>
                                        <li><?php echo $row['skills']; ?></li>
                                    </ul>
                                    <h5><b>Experience</b></h5>
                                    <p><?php echo $row['exp'] . " Year"; ?></p>
                                    <h5><b>Educational Qualification</b></h5>
                                    <ul>
                                        <li><?php echo $row['qual']; ?></li>
                                    </ul>
                                    <h5><b>Job Role</b></h5>
                                    <p><?php echo $row['role']; ?></p>
                                    <h4><b>Vacant Posts</b></h4>
                                    <p><?php echo $row['vacant_post']; ?></p>
                                </div>
                                <button type="submit" name="jbdetbtn" class="btn" id="applybtn" value="not applied" onclick="confirm()">Apply for this Job</button>
                            </div>
                            <!-- <div class="container-fluid mt-3 abt-det-con">
                                <div class="abt-comp">
                                    <h3>About Company</h3>
                                    <h4 class="mb-3">Company Name</h4>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="images/about-us-jbdet2.svg" style="width: 100%; height: 100%;">
                                        </div>
                                        <div class="col-md-8 mt-3 mt-md-0">
                                            <h5>Address</h5>
                                            <p>Plot No. 55,  Apt No. 20</p>
                                            <p>Near Fuwwarra Chowk, Tagore Marg</p>
                                            <p>Neemuch (M.P)</p>
                                            <p>Pin: 458441</p>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
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
        $(document).ready(function(){
        function load_unseen_notification(view = '')
             {
              $.ajax({
               url:"fetch1.php",
               method:"POST",
               data:{view:view},
               dataType:"json",
               success:function(data)
               {
                $('#not-bell').html(data.notification);
                if(data.unseen_notification > 0)
                {
                 $('.count').html(data.unseen_notification);
                }
               }
              });
             }
             
             load_unseen_notification();
             
             $('#comment_form').on('submit', function(event){
              event.preventDefault();
              if($('#subject').val() != '' && $('#comment').val() != '')
              {
               var form_data = $(this).serialize();
               $.ajax({
                url:"insert.php",
                method:"POST",
                data:form_data,
                success:function(data)
                {
                 $('#comment_form')[0].reset();
                 load_unseen_notification();
                }
               });
              }
              else
              {
               alert("Both Fields are Required");
              }
             });
             
             $(document).on('click', '.dropdown-toggle', function(){
              $('.count').html('');
              load_unseen_notification('yes');
             });
             
             setInterval(function(){ 
              load_unseen_notification();; 
             }, 5000);
             $image_crop = $('#image_demo').croppie({
            enableExif: true,
            viewport: {
              width:200,
              height:200,
              type:'circle' //square
            },
            boundary:{
              width:300,
              height:300
            }
          });

          $('#img-upl').on('change', function(){
            var reader = new FileReader();
            reader.onload = function (event) {
              $image_crop.croppie('bind', {
                url: event.target.result
              }).then(function(){
                console.log('jQuery bind complete');
              });
            }
            reader.readAsDataURL(this.files[0]);
            $('#uploadimageModal').modal('show');
          });

          $('.crop_image').click(function(event){
            $image_crop.croppie('result', {
              type: 'canvas',
              size: 'viewport'
            }).then(function(response){
              $.ajax({
                url:"upload_profilepic.php",
                type: "POST",
                data:{"image": response},
                success:function(data)
                {
                  $('#uploadimageModal').modal('hide');
                  $('#uploaded_image').html(data);
                }
              })
          });
             });
            var delay = 700;
            $(".progress-bar").each(function(i){
                $(this).delay( delay*i ).animate( { width: $(this).attr('aria-valuenow') + '%' }, delay );

                $(this).prop('Counter',0).animate({
                    Counter: $(this).text()
                }, {
                    duration: delay,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now)+'%');
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        function confirm(){
            var appbtn = document.getElementById("applybtn")
            // appbtn.value = 'not applied';
            // appbtn.innerHTML = 'Applied Successfully';
            if (appbtn.value) {
                appbtn.value = 'applied';
                appbtn.innerHTML = 'Applied Successfully';
                // appbtn.value = 'applied';
                document.getElementById("applybtn").style.backgroundColor = "#28a745";
            }
            else{
                appbtn.value = 'not applied';
                appbtn.innerHTML = 'Apply for this job';
            }
            
        }
    </script>
  </body>
</html>