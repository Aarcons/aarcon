<?php 
session_start();
// $start_time = microtime(true);
require 'cand-dashboardprcs.php';
//var_dump($_SESSION);

require 'chk_noti.php';
   $name = $_SESSION['name']; 
   $email = $_SESSION['email'];
   $sqlreg = "SELECT * FROM jobskrreg WHERE email = '$email' AND paid_date != ' ' ";
   $resreg = $connection->query($sqlreg);
   $rowreg = $resreg->fetch_assoc();
   // $date = DateTime::createFromFormat ("Y/m/d H:i:s", $rowreg['paid_date'] );
   $date = $rowreg['paid_date'];
   // // echo $currentDate = date("Y-m-d",$date);
   // echo $actdate = date('l dS \o\f F Y', strtotime($date));
   // // echo $expirydate = date("m/d/Y", strtotime($actdate)) . (" +1 year");
   // // //echo $expirydate1 = $expirydate->format("d/m/Y");
   // // $date1 = strtr($expirydate, '/', '-');
   // // echo date('Y/d/m', strtotime($date1));
   // $dateOneYearAdded = strtotime(date("d/m/Y", strtotime($date)) . " +1 year");
   // echo "Date After adding one year: ".date('l dS \o\f F Y', $dateOneYearAdded)."<br>";
   $actdate = date("d/m/Y", strtotime(date("Y-m-d", strtotime($date))));
   $expirydate = date("d/m/Y", strtotime(date("Y-m-d", strtotime($date)) . " + 365 day"));

   $mobile = $rowreg['mobile'];
   $conemail = $row['con_email'];
   $conmobile = $row['con_mobile'];
   $profile = $row['profile_photo'];
    if (!isset($_SESSION['cand'])) {
        header("Location: job-portal-login.php");
    }
    if (isset($_POST['jblgbtn'])) {
        session_unset();
        session_destroy();
        header("Location: index.php");
    }
    
    require 'progressbar.php';
    $dgender =  $row['gender'];
    $sql2 = "SELECT distinct(Gender) FROM select_input WHERE Gender != ' ' ";
    $result1 = $connection->query($sql2);
    $row1 = $result1->fetch_assoc();

    $dmstatus = $row['marital'];
    $sql3 = "SELECT distinct(Mstatus) FROM select_input WHERE Mstatus != ' ' ";
    $result2 = $connection->query($sql3);
    

    $dstate = $row['state'];
    $sql4 = "SELECT distinct(state) FROM select_input WHERE state != ' ' ";
    $result3 = $connection->query($sql4);
    
    $dhigher_sub =  $row2['higher_sub'];
    $sql5 = "SELECT distinct(higher_sub) FROM select_input WHERE higher_sub != ' ' ";
    $result4 = $connection->query($sql5);

    $dgrad_sub = $row2['grad_sub'];
    $sql6 = "SELECT distinct(grad_sub) FROM select_input WHERE grad_sub != ' ' ";
    $result5 = $connection->query($sql6);

    $dpg_sub = $row2['pg_sub'];
    $sql7 = "SELECT distinct(pg_sub) FROM select_input WHERE pg_sub != ' ' ";
    $result6 = $connection->query($sql7);
    

 ?>
<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard New</title>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="lib/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="lib/jquery-ui-all/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="lib/bootstrap-tokenfield/dist/css/bootstrap-tokenfield.min.css">
    <link rel="icon" type="image/png" href="images/acs-a3.png">
    <script src="lib/jquery-3.4.1/jquery-3.4.1.min.js"></script>
    <script src="lib/waypoints-master/lib/jquery.waypoints.min.js"></script>
    <script src="lib/jquery-ui-all/jquery-ui.min.js"></script>
    <script src="lib/bootstrap-tokenfield/dist/bootstrap-tokenfield.min.js"></script>
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
                    <h3 class="mt-4 name"><?php echo $name;  ?></h3>
                    <h4 class="text-left">Profile Activation Date: <?php echo $actdate; ?></h4>
                    <h4 class="text-left">Profile Expiration Date: <?php echo $expirydate; ?></h4>
                    <p>User Id : <?php echo $email;  ?></p>
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
                                <div id="collapseOne" class="panel panel-link" role="tabpanel" aria-labelledby="headingOne">
                                    <a href="#basic-info-sec" class="hvr-float">Basic Information</a><br>
                                    <a href="#cont-info" class="hvr-float">Contact Information</a><br>
                                    <a href="#edu-4" class="hvr-float">Educational Qualification</a><br>
                                    <a href="#oth-qual-sec" class="hvr-float">Other Qualification</a><br>
                                    <a href="#keyskills-sec" class="hvr-float">Key Skills</a><br>
                                    <a href="#tot-exp-sec" class="hvr-float">Total Experience</a><br>
                                    <a href="#prof-summary-sec" class="hvr-float">Profile Summary</a><br>
                                    <a href="#des-car-prof-sec" class="hvr-float">Desired Career Profile</a>
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
                    <div class="container-fluid pl-lg-0 pl-xl-3 pr-lg-0 pr-xl-3 form-container-fluid">
                        <div class="col-12 pl-lg-0 pl-xl-3 pr-lg-0 pr-xl-3 form-col-12">
                            <div class="candidate-info">
                                <section id="basic-info-sec">
                                    <div class="basic-info">
                                        <h4>Basic Information</h4>
                                        <form method="post">
                                            <div class="form-group row">
                                                <label for="First Name" class="col-md-2 pl-lg-3 pl-md-0">Name *</label>
                                                <input type="text" name="FirstName" id="FirstName" class="col-md-3 mr-lg-4 mr-md-3 form-control" placeholder="First Name" required value="<?php echo $sfirstname; ?>">
                                                <input type="text" name="MiddleName" id="MiddleName" class="col-md-3 mr-lg-4 mr-md-3 form-control" placeholder="Middle Name" value="<?php echo $smiddlename; ?>">
                                                <input type="text" name="LastName" id="LastName" class="col-md-3 form-control" placeholder="Last Name" required value="<?php echo $slastname; ?>">
                                            </div>
                                            <div class="form-group row">
                                                <label for="DOB" class="col-md-2 pl-lg-3 pl-md-0">Date of Birth *</label>
                                                <input type="tel" name="DOB" id="txtDate" class="col-md-2 form-control" placeholder="DD/MM/YYYY" required pattern="^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d$" value="<?php echo $sdob; ?>">
                                                <label for="gender" class="col-md-1 pl-md-1 pl-lg-3 mr-md-3 mr-lg-4">Gender*</label>
                                                <select class="form-control col-md-2 mr-md-3 mr-lg-4" name="gender" required>
                                                    <option value='' disabled selected>Please Select Marital Status</option>;
                                                        <?php
                                                            foreach ($result1 as $row1) {
                                                            $item = $row1['Gender'];
                                                            if ($item == $dgender) {
                                                                $s = "selected";
                                                            }
                                                            else
                                                            {   
                                                                $s="";

                                                            }
                                                            echo "<option value='$item' $s>$item</option>"; 
                                                            }
                                                                
                                                        ?>
                                                </select>
                                                <label class="col-md-2 pl-md-1 pl-lg-3">Marital Status *</label>
                                                <select class="form-control col-md-2" required name="mstatus">
                                                    <option value='' disabled selected>Please Select Value</option>;
                                                        <?php
                                                            foreach ($result2 as $row2) {
                                                            $item = $row2['Mstatus'];
                                                            if ($item == $dmstatus) {
                                                                $s = "selected";
                                                            }
                                                            else
                                                            {   
                                                                $s="";

                                                            }
                                                            echo "<option value='$item' $s>$item</option>"; 
                                                            }
                                                                
                                                        ?>
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label for="add1" class="col-md-2 pl-lg-3 pl-md-0">Address *</label>
                                                <input type="text" name="add1" id="add1" class="col-md-4 form-control" required value="<?php echo $saddress1; ?>">
                                                <label for="add2" class="col-md-1 col-lg-1 mr-lg-5 mr-md-4 pl-md-1 pl-lg-3">Landmark</label>
                                                <input type="text" name="add2" id="add2" class="col-md-4 ml-md-2 ml-lg-0 col-lg-4 form-control" value="<?php echo $saddress2; ?>">
                                            </div>
                                            <div class="form-group row">
                                                <label for="state" class="col-md-2 pl-lg-3 pl-md-0">State *</label>
                                                <select id="state" class="form-control col-lg-4 col-md-4 State" name="state"  required>
                                                    <option value='' disabled selected>Please Select State</option>;
                                                        <?php
                                                            foreach ($result3 as $row3) {
                                                            $item = $row3['state'];
                                                            if ($item == $dstate) {
                                                                $s = "selected";
                                                            }
                                                            else
                                                            {   
                                                                $s="";

                                                            }
                                                            echo "<option value='$item' $s>$item</option>"; 
                                                            }
                                                                
                                                        ?>
                                                </select>
                                                <label for="district" class="col-md-1 mr-md-4 col-lg-1 mr-lg-5">District*</label>
                                                <select class="form-control col-md-4 ml-md-2 ml-lg-0 col-lg-4 SelectDistrict" name="district" required>
                                                   

                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label for="city" class="col-md-2 pl-lg-3 pl-md-0">City/Village *</label>
                                                <input type="text" name="city" id="city" class="form-control col-md-4" placeholder="City/Village" value="<?php echo $scity; ?>" required>
                                                <label for="pincode" class="col-md-1 mr-md-4 mr-lg-5">Pincode*</label>
                                                <input type="text" name="pin" id="pincode" class="col-md-4 ml-md-2 ml-lg-0 col-lg-4 form-control" required value="<?php echo $spin; ?>">
                                            </div>
                                            <div class="float-btn clearfix">
                                                <div class="row btnrow ">
                                                <!--<div class="addrow row">-->
                                                <!--    <div class="icon">-->
                                                <!--        <i class="fas fa-plus"></i>-->
                                                <!--    </div>-->
                                                <!--    <button type="submit" class="btn">Add/Edit</button>-->
                                                <!--</div>-->
                                                <div class="updaterow row">
                                                    <div class="icon-update">
                                                        <i class="fas fa-pen"></i>
                                                    </div>
                                                    <button type="submit" name="submit_bi"  class="btn updbtn">Update</button>
                                                </div>
                                                </div>
                                            </div>
                                        </form>    
                                    </div>
                                    
                                </section>
                                <section id="cont-info">
                                    <div class="contact-info">
                                            <h4>Contact Information</h4>
                                            <h5>Please verify the details given below.</h5>

                                        <form method="post">
                                            <div class="form-group row">
                                                <label for="email id" class="col-md-2 pl-lg-3 pl-md-0 pr-md-0 pr-lg-3">Email Id *</label>
                                                <input type="email" name="emailid" id="emailid" class="form-control mr-lg-2 col-md-3 mr-md-2 col-lg-4" placeholder="Email Id" required value="<?php echo $conemail; ?>">
                                                <button type="submit" id="sendotp" class="btn otpbtn mr-md-1 mr-lg-2" name="sendotp">Verify Email</button>
                                                <label for="info" class=" text-danger">Click to send OTP on email</label>
                                            </div>
                                            <?php echo $msg;  ?>

                                         
                                        </form>

                                        <div class="modal fade" id="VerifyOTP" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                              <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title w-100 text-center mb-0" id="exampleModalCenterTitle">Verify OTP</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <form method="post">
                                                       <!--  <div class="text-success text-center">
                                                            
                                                            <?php echo $response; ?>
                                                        </div> -->
                                                        <div class="form-group row modal-otp">
                                                            <label class="col-3">Enter OTP</label>
                                                            <input type="text" class="form-control col-4" name="otp">
                                                            <input type="submit" name="checkotp" class="btn ml-2 col-2">
                                                        </div>
                                                        
                                                    </form>
                                                    <?php echo $alert; ?>
                                                  </div>
                                                  <div class="modal-footer">

                                                    <button type="button" class="btn" data-dismiss="modal">Close</button>
                                                    
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

                                        <form method="post">
                                            <div class="form-group row">
                                                <label for="Mobile no." class="col-md-2 pl-lg-3 pl-md-0 pr-md-0 pr-lg-3">Mobile No. *</label>
                                                <input type="tel" placeholder="Enter Mobile Number" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" class="form-control mr-lg-2 mr-md-2 col-md-3 col-lg-4" name="mobileno" id="mobileno." required value="<?php echo $conmobile; ?>">
                                                <button type="submit" class="btn mr-lg-2 mr-md-1 otpbtn" name="otpmobile">Verify Mobile</button>
                                                <label for="infomobile" class="text-danger">Click to send OTP on mobile</label>
                                            </div>
                                            <div class="container-fluid " style="display: none;">
                                                <div class="col-4 mx-auto">
                                                   <div class="form-group row">
                                                    <input type="text" name="otpmob" id="enterotpemail" placeholder="Enter OTP" class="form-control col-8">
                                                    <button type="submit" class="btn subbtn ml-2 col-3" name="otpemailsubmit ">Ok</button>
                                                    </div>
                                                </div>                                        
                                            </div>
                                        </form>
                                        <div class="modal fade" id="VerifymbOTP" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                              <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Verify OTP</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <form method="post">
                                                        <!-- <div class="text-success text-center">
                                                            
                                                            <?php echo $response; ?>
                                                        </div> -->
                                                        <div class="form-group row">
                                                            <label class="col-3">Enter OTP</label>
                                                            <input type="text" class="form-control col-4" name="mobileotp">
                                                            <input type="submit" name="checkmobileotp" class="btn col-2 ml-2"> 
                                                        </div>
                                                           
                                                    </form>
                                                    <?php echo $alert; ?>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                    </div>
                                </section>
                                <section id="edu-4">
                                    <div class="edu-qual" id="eduqual2" >
                                        <h4 >Educational Qualification</h4>
                                        <form method="post">
                                            <div class="form-group row">
                                                <label for="matric" class="col-md-2 pl-lg-3 pl-md-0">HSC (10<sup>th</sup>) *</label>
                                                <input type="text" name="hsc_passyear" id="passyearmat" class="mr-lg-3 ml-md-3 mr-md-1 col-md-2 col-lg-2 ml-lg-0 form-control " placeholder="Passing Year" pattern="^(19|20)\d{2}$" required value="<?php echo $hsc_passyear ?>">
                                                <input type="text" name="hsc_percent" id="percentagemat" class="col-md-2 form-control mr-md-1 mr-lg-3" placeholder="Percentage" pattern="(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)" required value="<?php echo $hsc_percent ?>">
                                                <input type="text" name="hsc_sch" id="sch-namemat" class="col-md-5 matsch form-control" placeholder="School Name/Board" pattern="^[a-zA-Z ]*$" required value="<?php echo $hsc_sch ?>">
                                            </div>
                                            <div class="form-group row">
                                                <label for="ssc" class="col-md-2 pl-lg-3 pl-md-0">SSC (12<sup>th</sup>)</label>
                                                <select class="form-control mr-lg-3 ml-md-3 mr-md-1 col-md-2 col-lg-2 ml-lg-0" name="higher_sub">
                                                    <option value='' disabled selected>Please Select Subject</option>;
                                                        <?php
                                                            foreach ($result4 as $row4) {
                                                            $item = $row4['higher_sub'];
                                                            if ($item == $dhigher_sub) {
                                                                $s = "selected";
                                                            }
                                                            else
                                                            {   
                                                                $s="";

                                                            }
                                                            echo "<option value='$item' $s>$item</option>"; 
                                                            }
                                                                
                                                        ?>
                                                </select>
                                                
                                                <input type="text" name="higher_passyear" id="passyearssc" class="col-md-2 form-control mr-md-1 mr-lg-3" placeholder="Passing Year" pattern="^(19|20)\d{2}$" value="<?php echo $higher_passyear;  ?>">
                                                <input type="text" name="higher_percent" id="percentagessc" class="col-md-2 form-control mr-md-1 mr-lg-3" placeholder="Percentage" pattern="(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)" value="<?php echo $higher_percent;  ?>" >
                                                <input type="text" name="higher_sch" id="sch-namessc" class="col-md-3 form-control" placeholder="School Name" pattern="^[a-zA-Z ]*$" value="<?php echo $higher_sch;  ?>">
                                            </div>
                                            <div class="form-group row">
                                                <label for="gradt" class="col-md-2 pl-lg-3 pl-md-0">Graduation</label>
                                                <select class="form-control mr-lg-3 ml-md-3 mr-md-1 col-md-2 col-lg-2 ml-lg-0" name="grad_sub">
                                                    <option value="" disabled selected>Course Name</option>
                                                    <?php
                                                            foreach ($result5 as $row5) {
                                                            $item = $row5['grad_sub'];
                                                            if ($item == $dgrad_sub) {
                                                                $s = "selected";
                                                            }
                                                            else
                                                            {   
                                                                $s="";

                                                            }
                                                            echo "<option value='$item' $s>$item</option>"; 
                                                            }
                                                                
                                                        ?>
                                                </select>
                                                <input type="text" name="grad_passyear" id="passyeargrad" class="col-md-2 form-control mr-md-1 mr-lg-3" placeholder="Passing Year" pattern="^(19|20)\d{2}$"  value="<?php echo $grad_passyear;  ?>">
                                                <input type="text" name="grad_percent" id="percentagegrad" class="col-md-2 form-control mr-md-1 mr-lg-3" placeholder="Percentage" pattern="(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)" value="<?php echo $grad_percent;  ?>" >
                                                <input type="text" name="grad_univ" id="univ-namegrad" class="col-md-3 form-control" placeholder="University Name" pattern="^[a-zA-Z ]*$" value="<?php echo $grad_univ;  ?>" >
                                            </div>
                                            <div class="form-group  row">
                                                <label for="postg" class="col-md-2 pl-lg-3 pl-md-0">Post Graduation</label>
                                                <select class="form-control mr-lg-3 ml-md-3 mr-md-1 col-md-2 col-lg-2 ml-lg-0" name="pg_sub">
                                                    <option value="" disabled selected>Course Name</option>
                                                    <?php
                                                            foreach ($result6 as $row6) {
                                                            $item = $row6['pg_sub'];
                                                            if ($item == $dpg_sub) {
                                                                $s = "selected";
                                                            }
                                                            else
                                                            {   
                                                                $s="";

                                                            }
                                                            echo "<option value='$item' $s>$item</option>"; 
                                                            }
                                                                
                                                        ?>
                                                </select>
                                                <input type="text" name="pg_passyear" id="passyearpostg" class="col-md-2 form-control  mr-md-1 mr-lg-3" placeholder="Passing Year" pattern="^(19|20)\d{2}$" value="<?php echo $pg_passyear;  ?>" >
                                                <input type="text" name="pg_percent" id="percentagepostg" class="col-md-2 form-control mr-md-1 mr-lg-3" placeholder="Percentage" pattern="(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)" value="<?php echo $pg_percent;  ?>" >
                                                <input type="text" name="pg_univ" id="univ-namepostg" class="col-md-3 form-control" placeholder="University Name" pattern="^[a-zA-Z ]*$" value="<?php echo $pg_univ;  ?>">
                                            </div>
                                            <div class="form-group  row">
                                                <label for="gradt" class="col-md-2 pl-lg-3 pl-md-0">Other Qual.</label>
                                                <input type="text" name="other_sub" class="form-control mr-lg-3 ml-md-3 mr-md-1 col-md-2 col-lg-2 ml-lg-0" placeholder="Degree Name" value="<?php echo $other_sub;  ?>">
                                                <input type="text" name="other_passyear" id="passyearothqual" class="col-md-2 form-control mr-md-1 mr-lg-3" placeholder="Passing Year" pattern="^(19|20)\d{2}$" value="<?php echo $other_passyear;  ?>">
                                                <input type="text" name="other_percent" id="percentageothqual" class="col-md-2 form-control mr-md-1 mr-lg-3" placeholder="Percentage" pattern="(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)" value="<?php echo $other_percent;  ?>" >
                                                <input type="text" name="other_univ" id="univ-nameothqual" class="col-md-3 form-control" placeholder="University Name" pattern="^[a-zA-Z ]*$" value="<?php echo $other_univ;  ?>">
                                            </div>
                                            <div class="float-btn clearfix">
                                                <div class="row btnrow ">
                                                <!--<div class="addrow row">-->
                                                <!--    <div class="icon">-->
                                                <!--        <i class="fas fa-plus"></i>-->
                                                <!--    </div>-->
                                                <!--    <button type="submit" name="eduadd"class="btn">Add/Edit</button>-->
                                                <!--</div>-->
                                                <div class="updaterow row">
                                                    <div class="icon-update">
                                                        <i class="fas fa-pen"></i>
                                                    </div>
                                                    <button type="submit" name="eduupdate" class="btn updbtn">Update</button>
                                                </div>

                                                </div>
                                            </div>
                                            <?php echo "$msgedqual";  ?>
                                            <?php echo "$ermsgeduqual";  ?>
                                        </form>
                                    </div>
                                </section>
                                <?php
                                $sqlocer = "SELECT * FROM oqal_can WHERE user_id = '$semail'";
                                $resultocer = $connection->query($sqlocer);
                                $i = 0;
                                
                                ?>
                                
                                    
                                
                                <section id="oth-qual-sec">
                                    <div class="oth-qual">
                                        <h4>Other Certification</h4>
                                         <?php if (mysqli_num_rows($resultocer)>0): ?>
                                            
                                        
                                        <form method="post" name="add_name" id="add_name">
                                          
                                            
                                            <div class="form-row col-md-12 pl-0 pr-0 ml-0 mr-0 serv-sidecert" id="dynamic_field">
                                                <?php while ( $rowocer = $resultocer->fetch_assoc()):?> 
                                                 
                                                  
                                                
                                                <div class="form-group pl-0 pr-0 ml-0 mr-0 col-md-12 row" id='<?php echo "row" . $i; ?>'>
                                                    
                                                    <label for="oth-qual1" class="col-md-2 pl-lg-3 pl-md-0">Certification</label>
                                                    <input type="text" name="cersub[]" class="form-control mr-md-1 mr-lg-2  col-md-2 col-lg-2" placeholder="Certificate *" value="<?php echo $rowocer['quali'] ?>" required>
                                                    
                                                    <input type="text" name="cerpyearc1[]" id="passyearc1" class="col-md-2 mr-md-1 mr-lg-2 form-control  col-lg-2 " placeholder="Passing Year *" pattern="^(19|20)\d{2}$" value="<?php echo $rowocer['year'] ?>" required>

                                                    <input type="text" name="cerptgc1[]" id="percentagec1" class="col-md-2 mr-md-1 mr-lg-2 col-lg-2 form-control " placeholder="Percentage *" pattern="(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)" value="<?php echo $rowocer['percentage'] ?>" required>
                                                    <input type="text" name="cerunamec1[]" id="univ-namec1" class="col-md-3 mr-md-1 mr-lg-2 col-lg-3 form-control" placeholder="University Name" pattern="^[a-zA-Z ]*$"  value="<?php echo $rowocer['univ'] ?>">
                                                   
                                                    <!-- <button type="submit" name="remove" id="<?php echo $i ?>" class=" expdnmbtnrem btn_remove mt-3 mt-md-0 ml-md-2"><i class="fas fa-times"></i></button> -->
                                                    <!-- <input type="hidden" name="delid" > -->
                                                    <!-- <?php $_SESSION['delid'] = $rowocer['id']; ?> -->
                                                    <!-- <input type="submit" name="delete" value="X"> -->
                                                   
                                                    <a href="cand-dashboard.php?delete=<?php echo md5($rowocer['id']); ?>"><i class="fas fa-times text-danger serv-sidecert-rem"></i></a>

                                                </div>
                                                
                                               <?php endwhile ?> 
                                            </div>  
                                            <button type="button" name="add" id="add" class="cerdnmbtn serv-sidecert-add mt-1 ml-1 ml-md-0 mt-md-0 "><i class="fas fa-plus"></i></button> 
                                           
                                            <div class="float-btn clearfix">
                                                <div class="row btnrow ">
                                                <!-- <div class="addrow row">
                                                    <div class="icon">
                                                        <i class="fas fa-plus"></i>
                                                    </div>
                                                    
                                                </div> -->
                                                <div class="updaterow row">
                                                    <div class="icon-update">
                                                        <i class="fas fa-pen"></i>
                                                    </div>
                                                    <button type="submit" id="submitCer" class="btn updbtn">Update</button>
                                                </div>
                                                </div>
                                            </div>
                                            
                                        </form>
                                        <?php else: ?>
                                            <form method="post" name="add_name" id="add_name">
                                            <div class="form-row col-md-12 pl-0 pr-0 ml-0 mr-0" id="dynamic_field">
                                                <div class="form-group pl-0 pr-0 ml-0 mr-0 col-md-12 row">
                                                    <label for="oth-qual1" class="col-md-2 pl-lg-3 pl-md-0">Certification</label>
                                                    <input type="text" name="cersub[]" class="form-control mr-md-1 mr-lg-2  col-md-2 col-lg-2" placeholder="Certificate *" required>
                                                    
                                                    <input type="text" name="cerpyearc1[]" id="passyearc1" class="col-md-2 mr-md-1 mr-lg-2 form-control  col-lg-2 " placeholder="Passing Year *" pattern="^(19|20)\d{2}$" required>

                                                    <input type="text" name="cerptgc1[]" id="percentagec1" class="col-md-2 mr-md-1 mr-lg-2 col-lg-2 form-control " placeholder="Percentage *" pattern="(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)" required>
                                                    <input type="text" name="cerunamec1[]" id="univ-namec1" class="col-md-3 mr-md-1 mr-lg-2 col-lg-3 form-control" placeholder="University Name" pattern="^[a-zA-Z ]*$" >
                                                    <button type="button" name="add" id="add" class="cerdnmbtn mt-1 ml-1 ml-md-0 mt-md-0 "><i class="fas fa-plus"></i></button>
                                                </div>
                                            </div>  
                                            <div class="float-btn clearfix">
                                                <div class="row btnrow ">
                                                <!--<div class="addrow row">-->
                                                <!--    <div class="icon">-->
                                                <!--        <i class="fas fa-plus"></i>-->
                                                <!--    </div>-->
                                                <!--    <button type="submit" class="btn">Add/Edit</button>-->
                                                <!--</div>-->
                                                <div class="updaterow row">
                                                    <div class="icon-update">
                                                        <i class="fas fa-pen"></i>
                                                    </div>
                                                    <button type="submit" id="submitCer" class="btn updbtn">Update</button>
                                                </div>
                                                </div>
                                            </div>
                                        </form>
                                        <?php endif ?>
                                    </div>
                                </section>
                                <section id="keyskills-sec">
                                    <div class="keyskills">
                                        <h4>Key Skills</h4>
                                        <h5>Select at least one skill from the given options.</h5>
                                        <form method="post" >
                                            <div class="form-group row">
                                                <label class="col-md-2 ">Keyskills *</label>
                                                
                                                    <input type="text" id="search_data" placeholder="" autocomplete="off" class="form-control input-lg col-md-8" value="<?php echo $upskills; ?>" name="search"/ required>                        
                                                <div class="col-md-2"><?php echo $skillmsg;  ?>
                                                    
                                                </div>
                                            </div>
                                            <div class="float-btn clearfix">
                                                <div class="row btnrow">
                                                    <div class="updaterow row">
                                                        <div class="icon-update">
                                                            <i class="fas fa-pen"></i>
                                                        </div>
                                                        <button type="submit" class="btn updbtn" name = "keyskills" id="search">Update</button>
                                                    </div>        
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </section>
                                <?php
                                $sqlexpr = "SELECT * FROM can_exp WHERE user_id = '$semail'";
                                $resultexper = $connection->query($sqlexpr);
                                $i = 0;
                                
                                ?>
                                <section id="tot-exp-sec">
                                    <div class="tot-exp">
                                        <h4>Total Experience</h4>
                                        <form method="post" name="add_name2" id="add_name2" class="serv-sideexp">
                                            <?php if (mysqli_num_rows($resultexper)>0): ?>
                                          <div class="form-row pl-0 pr-0 col-md-12 " id="dynamic_field2">
                                            <?php while ( $rowexper = $resultexper->fetch_assoc()):?>
                                                
                                              <div class="form-group col-md-12 row ">
                                                  <label for="exp1" class="col-md-2 pl-lg-3 pl-md-0 ">Experience *</label>
                                                  <select class="form-control col-md-3 mr-md-2 mr-lg-3" name="exp[]" required id="expsel" onchange = "changedis(this)">
                                                    <?php 
                                                    if ($rowexper['exp'] == 0) {
                                                        echo '<option value="" disabled >Select Experience</option>
                                                      <option value="0" selected>Fresher</option>
                                                      <option value="0.5">6 Months</option>
                                                      <option value="1">1 Year</option>
                                                      <option value="2">2 Years</option>
                                                      <option value="3">3 Years</option>
                                                      <option value="4">4 Years</option>
                                                      <option value="5">5 Years</option>
                                                      <option value="6">6 Years</option>
                                                      <option value="7">7 Years</option>
                                                      <option value="8">8 Years</option>
                                                      <option value="9">9 Years</option>
                                                      <option value="10">10 Years</option>
                                                      <option value="11">10+ Years</option>';
                                                    }
                                                    else if ($rowexper['exp'] == 0.5) {
                                                        echo '<option value="" disabled >Select Experience</option>
                                                      <option value="0" >Fresher</option>
                                                      <option value="0.5" selected>6 Months</option>
                                                      <option value="1">1 Year</option>
                                                      <option value="2">2 Years</option>
                                                      <option value="3">3 Years</option>
                                                      <option value="4">4 Years</option>
                                                      <option value="5">5 Years</option>
                                                      <option value="6">6 Years</option>
                                                      <option value="7">7 Years</option>
                                                      <option value="8">8 Years</option>
                                                      <option value="9">9 Years</option>
                                                      <option value="10">10 Years</option>
                                                      <option value="11">10+ Years</option>';
                                                    }
                                                    else if ($rowexper['exp'] == 1) {
                                                        echo '<option value="" disabled >Select Experience</option>
                                                      <option value="0" >Fresher</option>
                                                      <option value="0.5" >6 Months</option>
                                                      <option value="1" selected>1 Year</option>
                                                      <option value="2">2 Years</option>
                                                      <option value="3">3 Years</option>
                                                      <option value="4">4 Years</option>
                                                      <option value="5">5 Years</option>
                                                      <option value="6">6 Years</option>
                                                      <option value="7">7 Years</option>
                                                      <option value="8">8 Years</option>
                                                      <option value="9">9 Years</option>
                                                      <option value="10">10 Years</option>
                                                      <option value="11">10+ Years</option>';
                                                    }
                                                    else if ($rowexper['exp'] == 2) {
                                                        echo '<option value="" disabled >Select Experience</option>
                                                      <option value="0" >Fresher</option>
                                                      <option value="0.5" >6 Months</option>
                                                      <option value="1" >1 Year</option>
                                                      <option value="2" selected>2 Years</option>
                                                      <option value="3">3 Years</option>
                                                      <option value="4">4 Years</option>
                                                      <option value="5">5 Years</option>
                                                      <option value="6">6 Years</option>
                                                      <option value="7">7 Years</option>
                                                      <option value="8">8 Years</option>
                                                      <option value="9">9 Years</option>
                                                      <option value="10">10 Years</option>
                                                      <option value="11">10+ Years</option>';
                                                    }
                                                    else if ($rowexper['exp'] == 3) {
                                                        echo '<option value="" disabled >Select Experience</option>
                                                      <option value="0" >Fresher</option>
                                                      <option value="0.5" >6 Months</option>
                                                      <option value="1" >1 Year</option>
                                                      <option value="2" >2 Years</option>
                                                      <option value="3" selected>3 Years</option>
                                                      <option value="4">4 Years</option>
                                                      <option value="5">5 Years</option>
                                                      <option value="6">6 Years</option>
                                                      <option value="7">7 Years</option>
                                                      <option value="8">8 Years</option>
                                                      <option value="9">9 Years</option>
                                                      <option value="10">10 Years</option>
                                                      <option value="11">10+ Years</option>';
                                                    }
                                                    else if ($rowexper['exp'] == 4) {
                                                        echo '<option value="" disabled >Select Experience</option>
                                                      <option value="0" >Fresher</option>
                                                      <option value="0.5" >6 Months</option>
                                                      <option value="1" >1 Year</option>
                                                      <option value="2" >2 Years</option>
                                                      <option value="3" >3 Years</option>
                                                      <option value="4" selected>4 Years</option>
                                                      <option value="5">5 Years</option>
                                                      <option value="6">6 Years</option>
                                                      <option value="7">7 Years</option>
                                                      <option value="8">8 Years</option>
                                                      <option value="9">9 Years</option>
                                                      <option value="10">10 Years</option>
                                                      <option value="11">10+ Years</option>';
                                                    }
                                                    else if ($rowexper['exp'] == 5) {
                                                        echo '<option value="" disabled >Select Experience</option>
                                                      <option value="0" >Fresher</option>
                                                      <option value="0.5" >6 Months</option>
                                                      <option value="1" >1 Year</option>
                                                      <option value="2" >2 Years</option>
                                                      <option value="3" >3 Years</option>
                                                      <option value="4" >4 Years</option>
                                                      <option value="5" selected>5 Years</option>
                                                      <option value="6">6 Years</option>
                                                      <option value="7">7 Years</option>
                                                      <option value="8">8 Years</option>
                                                      <option value="9">9 Years</option>
                                                      <option value="10">10 Years</option>
                                                      <option value="11">10+ Years</option>';
                                                    }
                                                    else if ($rowexper['exp'] == 6) {
                                                        echo '<option value="" disabled >Select Experience</option>
                                                      <option value="0" >Fresher</option>
                                                      <option value="0.5" >6 Months</option>
                                                      <option value="1" >1 Year</option>
                                                      <option value="2" >2 Years</option>
                                                      <option value="3" >3 Years</option>
                                                      <option value="4" >4 Years</option>
                                                      <option value="5" >5 Years</option>
                                                      <option value="6" selected>6 Years</option>
                                                      <option value="7">7 Years</option>
                                                      <option value="8">8 Years</option>
                                                      <option value="9">9 Years</option>
                                                      <option value="10">10 Years</option>
                                                      <option value="11">10+ Years</option>';
                                                    }
                                                    else if ($rowexper['exp'] == 7) {
                                                        echo '<option value="" disabled >Select Experience</option>
                                                      <option value="0" >Fresher</option>
                                                      <option value="0.5" >6 Months</option>
                                                      <option value="1" >1 Year</option>
                                                      <option value="2" >2 Years</option>
                                                      <option value="3" >3 Years</option>
                                                      <option value="4" >4 Years</option>
                                                      <option value="5" >5 Years</option>
                                                      <option value="6" >6 Years</option>
                                                      <option value="7" selected>7 Years</option>
                                                      <option value="8">8 Years</option>
                                                      <option value="9">9 Years</option>
                                                      <option value="10">10 Years</option>
                                                      <option value="11">10+ Years</option>';
                                                    }
                                                    else if ($rowexper['exp'] == 8) {
                                                        echo '<option value="" disabled >Select Experience</option>
                                                    

                                                    <option value="0" >Fresher</option>
                                                      <option value="0.5" >6 Months</option>
                                                      <option value="1" >1 Year</option>
                                                      <option value="2" >2 Years</option>
                                                      <option value="3" >3 Years</option>
                                                      <option value="4" >4 Years</option>
                                                      <option value="5" >5 Years</option>
                                                      <option value="6" >6 Years</option>
                                                      <option value="7" >7 Years</option>
                                                      <option value="8" selected>8 Years</option>
                                                      <option value="9">9 Years</option>
                                                      <option value="10">10 Years</option>
                                                      <option value="11">10+ Years</option>';
                                                    }
                                                    else if ($rowexper['exp'] == 9) {
                                                        echo '<option value="" disabled >Select Experience</option>
                                                      <option value="0" >Fresher</option>
                                                      <option value="0.5" >6 Months</option>
                                                      <option value="1" >1 Year</option>
                                                      <option value="2" >2 Years</option>
                                                      <option value="3" >3 Years</option>
                                                      <option value="4" >4 Years</option>
                                                      <option value="5" >5 Years</option>
                                                      <option value="6" >6 Years</option>
                                                      <option value="7" >7 Years</option>
                                                      <option value="8" >8 Years</option>
                                                      <option value="9" selected>9 Years</option>
                                                      <option value="10">10 Years</option>
                                                      <option value="11">10+ Years</option>';
                                                    }
                                                    else if ($rowexper['exp'] == 10) {
                                                        echo '<option value="" disabled >Select Experience</option>
                                                      <option value="0" >Fresher</option>
                                                      <option value="0.5" >6 Months</option>
                                                      <option value="1" >1 Year</option>
                                                      <option value="2" >2 Years</option>
                                                      <option value="3" >3 Years</option>
                                                      <option value="4" >4 Years</option>
                                                      <option value="5" >5 Years</option>
                                                      <option value="6" >6 Years</option>
                                                      <option value="7" >7 Years</option>
                                                      <option value="8" >8 Years</option>
                                                      <option value="9" >9 Years</option>
                                                      <option value="10" selected>10 Years</option>
                                                      <option value="11">10+ Years</option>';
                                                    }
                                                    else if ($rowexper['exp'] == 11) {
                                                        echo '<option value="" disabled >Select Experience</option>
                                                      <option value="0" >Fresher</option>
                                                      <option value="0.5" >6 Months</option>
                                                      <option value="1" >1 Year</option>
                                                      <option value="2" >2 Years</option>
                                                      <option value="3" >3 Years</option>
                                                      <option value="4" >4 Years</option>
                                                      <option value="5" >5 Years</option>
                                                      <option value="6" >6 Years</option>
                                                      <option value="7" >7 Years</option>
                                                      <option value="8" >8 Years</option>
                                                      <option value="9" >9 Years</option>
                                                      <option value="10" >10 Years</option>
                                                      <option value="11" selected>10+ Years</option>';
                                                    }
                                                    else {
                                                        echo '<option value="" disabled selected >Select Experience</option>
                                                      <option value="0" >Fresher</option>
                                                      <option value="0.5" >6 Months</option>
                                                      <option value="1" >1 Year</option>
                                                      <option value="2" >2 Years</option>
                                                      <option value="3" >3 Years</option>
                                                      <option value="4" >4 Years</option>
                                                      <option value="5" >5 Years</option>
                                                      <option value="6" >6 Years</option>
                                                      <option value="7" >7 Years</option>
                                                      <option value="8" >8 Years</option>
                                                      <option value="9" >9 Years</option>
                                                      <option value="10" >10 Years</option>
                                                      <option value="11" >10+ Years</option>';
                                                    }
                                                    ?>
                                                     <!--  <option value="" disabled >Select Experience</option>
                                                      <option value="0">Fresher</option>
                                                      <option value="0.5">6 Months</option>
                                                      <option value="1">1 Year</option>
                                                      <option value="2">2 Years</option>
                                                      <option value="3">3 Years</option>
                                                      <option value="4">4 Years</option>
                                                      <option value="5">5 Years</option>
                                                      <option value="6">6 Years</option>
                                                      <option value="7">7 Years</option>
                                                      <option value="8">8 Years</option>
                                                      <option value="9">9 Years</option>
                                                      <option value="10">10 Years</option>
                                                      <option value="11">10+ Years</option> -->
                                                  </select>
                                                  <input type="text" name="positionc1[]" id="positionc1" class="form-control col-md-3 mr-md-2 mr-lg-3" placeholder="Position" value="<?php echo $rowexper['pos']; ?>">
                                                  <input type="text" name="compnamec2[]" id="compnamec2" class="form-control col-md-3" placeholder="Company Name" value="<?php echo $rowexper['comp']; ?>">
                                                  <!-- <button type="button" name="addexp" id="addexp" class="expdnmbtn ml-md-2 mt-3 mt-md-0"><i class="fas fa-plus"></i></button> -->
                                                  <a href="cand-dashboard.php?d1=<?php echo md5($rowexper['id']); ?>" class="serv-sideexp-rem"><i class="fas fa-times text-danger serv-sidecert-rem"></i></a>
                                              </div> 
                                          <?php endwhile ?>
                                          </div>  
                                            <button type="button" name="addexp" id="addexp" class="serv-sideexp-add expdnmbtn ml-md-2 mt-3 mt-md-0"><i class="fas fa-plus"></i></button>
                                            <div class="float-btn clearfix">
                                                <div class="row btnrow ">
                                                <div class="updaterow row">
                                                    <div class="icon-update">
                                                        <i class="fas fa-pen"></i>
                                                    </div>
                                                    <button type="submit" class="btn updbtn" id="expupdt" >Update</button>
                                                </div>
                                                </div>
                                            </div>
                                        </form>
                                        <?php else: ?>
                                          <form method="post" name="add_name2" id="add_name2">
                                          <div class="form-row pl-0 pr-0 col-md-12" id="dynamic_field2">
                                              <div class="form-group col-md-12 row">
                                                  <label for="exp1" class="col-md-2 pl-lg-3 pl-md-0">Experience*</label>
                                                  <select class="form-control col-md-3 mr-md-2 mr-lg-3" name="exp[]" id="expsel" onchange = "changedis(this)" required>
                                                      <option value="" disabled selected>Select Experience</option>
                                                      <option value="0">Fresher</option>
                                                      <option value="0.5">6 Months</option>
                                                      <option value="1">1 Year</option>
                                                      <option value="2">2 Years</option>
                                                      <option value="3">3 Years</option>
                                                      <option value="4">4 Years</option>
                                                      <option value="5">5 Years</option>
                                                      <option value="6">6 Years</option>
                                                      <option value="7">7 Years</option>
                                                      <option value="8">8 Years</option>
                                                      <option value="9">9 Years</option>
                                                      <option value="10">10 Years</option>
                                                      <option value="11">10+ Years</option>
                                                  </select>
                                                  <input type="text" name="positionc1[]" id="positionc1" class="form-control col-md-3 mr-md-2 mr-lg-3" placeholder="Position">
                                                  <input type="text" name="compnamec2[]" id="compnamec2" class="form-control col-md-3" placeholder="Company Name">
                                                  <button type="button" name="addexp" id="addexp" class="expdnmbtn ml-md-2 mt-3 mt-md-0"><i class="fas fa-plus"></i></button>
                                              </div> 
                                          </div>  
                                            
                                            <div class="float-btn clearfix">
                                                <div class="row btnrow ">
                                                <div class="updaterow row">
                                                    <div class="icon-update">
                                                        <i class="fas fa-pen"></i>
                                                    </div>
                                                    <button type="submit" class="btn updbtn" id="expupdt" >Update</button>
                                                </div>
                                                </div>
                                            </div>
                                        </form>  





                                            
                                       <?php endif ?> 
                                    </div>
                                </section>
                                <section id="prof-summary-sec">
                                    <div class="prof-summary">
                                        <h4>Profile Summary</h4>
                                        <form method="post">
                                            <textarea class="form-control mb-3 col-md-12" cols="25" rows="5" placeholder="Please Write a Brief Description about yourself" name="summary" value="<?php echo $upsummary; ?>" required><?php echo $upsummary; ?></textarea>
                                            <div class="float-btn clearfix">
                                                <div class="row btnrow ">
                                                <!--<div class="addrow row">-->
                                                <!--    <div class="icon">-->
                                                <!--        <i class="fas fa-plus"></i>-->
                                                <!--    </div>-->
                                                <!--    <button type="submit"  class="btn">Add/Edit</button>-->
                                                <!--</div>-->
                                                <div class="updaterow row">
                                                    <div class="icon-update">
                                                        <i class="fas fa-pen"></i>
                                                    </div>
                                                    <button type="submit" name="profile" class="btn updbtn">Update</button>
                                                </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div><?php echo $profilemsg; ?></div>
                                    </div>   
                                </section>
                                <?php $sqldes = "SELECT * FROM des_profile WHERE user_id = '$semail'"; 
                                $resultdes = $connection->query($sqldes);
                                $rowdes = $resultdes->fetch_assoc();
                                
                                ?>
                                
                                       
                                
                                 
                                <section id="des-car-prof-sec">
                                    <div class="des-car-prof">
                                        <h4>Desired Career Profile</h4>
                                        <h5>Please fill your desired career profile.</h5>
                                        <form method="post">
                                            

                                            <div class="form-group row descarproflrow">

                                                <select name="industry" class="col-md-3 ml-md-5 mr-md-2 ml-lg-5 mr-lg-5 form-control" required>
                                                    <?php
                                                    if ($rowdes['industry'] == 'accounting/finance') {
                                                        echo '<option value="" disabled >Select Industry *</option>
                                                    <option value="accounting/finance" selected>Accounting/Finance</option>
                                                    <option value="advertising/pr/mr/events">Advertising/PR/MR/Events</option>
                                                    <option value="agriculture/dairy">Agriculture/Dairy</option>
                                                    <option value="animation">Animation</option>';
                                                    }
                                                    else if ($rowdes['industry'] == 'advertising/pr/mr/events') {
                                                        echo '<option value="" disabled >Select Industry *</option>
                                                    <option value="accounting/finance" >Accounting/Finance</option>
                                                    <option value="advertising/pr/mr/events" selected>Advertising/PR/MR/Events</option>
                                                    <option value="agriculture/dairy">Agriculture/Dairy</option>
                                                    <option value="animation">Animation</option>';
                                                    }
                                                    else if ($rowdes['industry'] == 'agriculture/dairy') {
                                                        echo '<option value="" disabled >Select Industry *</option>
                                                    <option value="accounting/finance" >Accounting/Finance</option>
                                                    <option value="advertising/pr/mr/events" >Advertising/PR/MR/Events</option>
                                                    <option value="agriculture/dairy" selected>Agriculture/Dairy</option>
                                                    <option value="animation">Animation</option>';
                                                    }
                                                    else if ($rowdes['industry'] == 'animation') {
                                                        echo '<option value="" disabled >Select Industry *</option>
                                                    <option value="accounting/finance" >Accounting/Finance</option>
                                                    <option value="advertising/pr/mr/events" >Advertising/PR/MR/Events</option>
                                                    <option value="agriculture/dairy" >Agriculture/Dairy</option>
                                                    <option value="animation" selected>Animation</option>';
                                                    }
                                                    else
                                                    {
                                                         echo '<option value="" disabled selected >Select Industry *</option>
                                                    <option value="accounting/finance" >Accounting/Finance</option>
                                                    <option value="advertising/pr/mr/events" >Advertising/PR/MR/Events</option>
                                                    <option value="agriculture/dairy" >Agriculture/Dairy</option>
                                                    <option value="animation" >Animation</option>';
                                                    }   
                                                    ?>
                                                </select>
                                                <?php
                                                if (mysqli_num_rows($resultdes)>0) {
                                                    
                                                    $dessal = $rowdes['salary'];
                                                    $desloc = $rowdes['location'];
                                                }
                                                else
                                                {
                                                    
                                                    $dessal = "";
                                                    $desloc = "";
                                                } 
                                                ?>
                                                <input type="text" name="salary" id="expcsal" class="form-control col-md-3  mr-md-2 mr-lg-5" placeholder="Expected Salary (In Rs) *" value="<?php echo $dessal; ?>" required>
                                                <input type="text" name="location" id="descloc" class="form-control col-md-3"  placeholder="Desired Location *" value="<?php echo $desloc; ?>" required>
                                            </div>
                                            <div class="float-btn clearfix">
                                                <div class="row btnrow ">
                                                <!--<div class="addrow row">-->
                                                <!--    <div class="icon">-->
                                                <!--        <i class="fas fa-plus"></i>-->
                                                <!--    </div>-->
                                                <!--    <button type="submit" class="btn">Add/Edit</button>-->
                                                <!--</div>-->
                                                <div class="updaterow row">
                                                    <div class="icon-update">
                                                        <i class="fas fa-pen"></i>
                                                    </div>
                                                    <button type="submit" name="desired" class="btn updbtn">Update</button>
                                                </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div><?php echo $promsg; ?></div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include 'job-portal-dash-footer.php' ?>

    <script type="text/javascript">
 
    $('.State').change(function(){
    var State=$('.State').val();
    $.ajax({url:"some.php?State="+State,cache:false,success:function(result){
        $(".SelectDistrict").html(result);
    }});
    }).change();
  
    </script>
    <script type="text/javascript">
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>
    <script src="lib/popperjs-1.16.0/javascript/popper.min.js"></script>
    <script src="lib/bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var i=1;
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<div class="form-row col-md-12" id="row'+i+'"><div class="form-group pl-0 pr-0 col-md-12 row"><label for="oth-qual1" class="col-md-2 pl-lg-3 pl-md-0">Certification</label><input type="text" name="cersub[]" class="form-control mr-md-1 mr-lg-2 ml-md-1 col-md-2 col-lg-2" placeholder="Certificate"><input type="text" name="cerpyearc1[]" id="passyearc1" class="col-md-2 mr-md-1 mr-lg-2 col-lg-2 form-control" placeholder="Passing Year" ><input type="text" name="cerptgc1[]" id="percentagec1" class="col-md-2 mr-md-1 mr-lg-2 col-lg-2 form-control"placeholder="Percentage" pattern="(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)" ><input type="text" name="cerunamec1[]" id="univ-namec1" class="col-md-3 ml-md-1 mr-md-1 mr-lg-2 col-lg-3 form-control"placeholder="University Name" pattern="^[a-zA-Z ]*$" ><button type="button" name="remove" id="'+i+'" class="mt-1 ml-1 ml-md-0 mt-md-0 cerdnmbtnrem btn_remove"><i class="fas fa-times"></i></button></div></div>');
            });

            $(document).on('click', '.btn_remove', function(){
                var button_id = $(this).attr("id"); 
                $('#row'+button_id+'').remove();
            });

            $('#submitCer').click(function(){      
                $.ajax({
                    url:"cand-dashboardprcs1.php",
                    method:"POST",
                    data:$('#add_name').serialize(),
                    success:function(data)
                    {
                        alert(data);
                        $('#add_name')[0].reset();
                    }
                });
            });

                $('#search_data').tokenfield({
                autocomplete :{
                    source: function(request, response)
                    {
                        jQuery.get('fetch.php', {
                            query : request.term
                        }, function(data){
                            data = JSON.parse(data);
                            response(data);
                        });
                    },
                    delay: 100
                }
            });
            var j=1;
            $('#addexp').click(function(){
                j++;
                $('#dynamic_field2').append('<div class="form-row col-md-12" id="row'+j+'"><div class="form-group pl-0 pr-0 col-md-12 row"><label for="exp1" class="col-md-2 pl-lg-3 pl-md-1 ml-lg-1">Experience</label><select class="form-control col-md-3 ml-md-1 ml-lg-0 mr-md-2 mr-lg-3" name= "exp[]"><option value="" disabled selected>Select Experience</option><option value="0.5">6 Months</option><option value="1">1 Year</option><option value="2">2 Years</option><option value="3">3 Years</option><option value="4">4 Years</option><option value="5">5 Years</option><option value="6">6 Years</option><option value="7">7 Years</option><option value="8">8 Years</option><option value="9">9 Years</option><option value="10">10 Years</option><option value="11">10+ Years</option></select><input type="text" name="positionc1[]" id="positionc1" class="form-control col-md-3 mr-md-2 mr-lg-3 ml-lg-0 " placeholder="Position"><input type="text" name="compnamec2[]" id="compnamec2" class="form-control ml-lg-0 col-md-3" placeholder="Company Name"><button type="button" name="remove" id="'+j+'" class=" expdnmbtnrem btn_remove1 mt-3 mt-md-0 ml-md-2"><i class="fas fa-times"></i></button></div>');
            });

            $(document).on('click', '.btn_remove1', function(){
                var button_id = $(this).attr("id"); 
                $('#row'+button_id+'').remove();

            });

            $('#expupdt').click(function(){      
                $.ajax({
                    url:"cand-dashboardprcs2.php",
                    method:"POST",
                    data:$('#add_name2').serialize(),
                    success:function(data)
                    {
                        alert(data);
                        $('#add_name2')[0].reset();
                    }
                });
            });
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
              });
            })






        })
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
    // function counthide(){
    //     document.getElementById("hidecount").style.display="none";
    // }
        
    </script>
    <script type="text/javascript">
        function changedis(expsel) {
        var selectedValue = expsel.options[expsel.selectedIndex].value;
        var compname = document.getElementById("compnamec2");
        compname.disabled = selectedValue == 0 ? true : false;
        var position = document.getElementById("positionc1");
        position.disabled = selectedValue == 0 ? true : false;
        var expadd = document.getElementById("addexp");
        expadd.disabled = selectedValue == 0 ? true : false;
        }
        $(function() {
        $("#txtDate").datepicker({ dateFormat: 'dd/mm/yy' });
        });
    </script>
    
    <?php echo $keepOpen; 

    // $end_time= microtime(true);
    // $diff = $end_time - $start_time;
    // $ActualqueryTime = number_format($diff, 10);
    // echo "MYSQL query took " . $ActualqueryTime . " seconds.";
    ?>
  </body>
 <!--    <?php
    $resultocer -> free_result();

    $connection -> close();
    ?> -->
</html>
