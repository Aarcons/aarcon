<?php 
session_start();
if (!isset($_SESSION['comp'])) {
    header("Location: job-portal-login.php");
}
if (isset($_POST['emplgbtn'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
}
require 'connection.php';

$comp_id = $_SESSION['comp'];
$sqljb = "SELECT * FROM post_job WHERE comp_id ='$comp_id' ORDER BY job_id DESC";
$resultjb = $connection->query($sqljb);
$sqllogo = "SELECT * FROM comp_profile WHERE comp_id = '$comp_id'";
$reslogo = $connection->query($sqllogo);
$rowlogo = $reslogo->fetch_assoc();
$logo = $rowlogo['logo'];
$companyname = $rowlogo['name'];
?>
<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Jobs</title>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="lib/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/hover.css">
    <link rel="icon" type="image/png" href="images/acs-a3.png">
    <script src="lib/jquery-3.4.1/jquery-3.4.1.min.js"></script>
    <script src="lib/waypoints-master/lib/jquery.waypoints.min.js"></script>
    <script src="js/croppie.js"></script>
    <link rel="stylesheet" href="css/croppie.css">
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
    <?php include 'job-portal-dash-nav.php' ?>
    <section id="welcome-section">
        <div class="container-fluid welcome-container">
            <div class="row d-flex justify-content-center">
                <div class="welcome-overlay">
                    
                </div>
                <div class="col-md-4 pt-lg-5 align-items-center order-2 order-md-1">
                    <h3 class="mt-5">Hello, <?php echo $companyname; ?></h3>
                    <h4>Welcome to Aarcons</h4>
                    <h5>Hope you are having a good day.</h5>
                </div>
                <div class="col-md-2 d-flex d-md-block justify-content-center justify-content-md-start pt-3 pt-lg-5 img-col order-1 order-md-2"> 
                    <div class="img-div text-center" id="uploaded_image">
                        <?php if ($logo != ""  ) {
                            echo "<img src = '$logo' class='img-thumbnail'>";
                        }
                        else
                        {
                            echo "<div class = 'avatar-img'></div>";
                        }
                        ?>                             
                    </div>
                    <div class="upload-div upload-new-div">
                        <label for="img-upl"><span><i class="fas fa-camera"></i></span></label>
                        <input type="file" name="img-upl" id="img-upl">
                    </div> 
                    <div id="uploadimageModal" class="modal" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 ">Crop & Upload Image</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body modal-body-msg ">
                                        <div class="col-md-12 imgmodal-img d-flex justify-content-center">
                                              <div id="image_demo" style="width:350px; margin-top:30px"></div>
                                        </div>      

                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <div class="imgmodal-upbtn" >
                                        <button class="btn btn-success crop_image">Upload Image</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pt-lg-5 pl-md-5 order-3 name-section align-items-center">
                    <h4 class="mt-md-5">User Id : <?php echo $comp_id; ?></h4>
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
                                           <a href="emp-dashboard.php">Company Profile</a>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel collapse in panel-link" role="tabpanel" aria-labelledby="headingOne">
                                    <a href="#bas-info-emp-sec" class="hvr-float ">Basic Information</a><br>
                                    <a href="#cont-info-emp-sec" class="hvr-float ">Contact Information</a><br>
                                </div>
                            </div>
                        </div>
                        <div class="post-jobs menu-link">
                            <h4 class="panel-title">
                                <a href="employer-dash-post-job.php">Post a Job</a>
                            </h4>
                        </div>
                        <div class="manage-jobs menu-link">
                            <h4 class="panel-title">
                                <a href="emp-dash-mngjobs.php">Manage Jobs</a>
                            </h4>
                        </div>
                        <div class="Account-Settings menu-link">
                            <h4 class="panel-title">
                                <a href="emp-dash-accset.php">Reset Password</a>
                            </h4>
                        </div>
                        <div class="Logout menu-link">
                            <h4 class="panel-title">
                                <form method="post"><button class="lgbtn" name="emplgbtn" type="submit">Logout</button></form>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 main-col-form mt-4">
                    <div class="container-fluid form-container-fluid">
                        <div class="col-12 form-col-12">
                            <div class="container-fluid pl-0 pr-0 " id="mngjobs">
                                <div class="mgjobs-con">
                                    <div class="row head-row">
                                        <h5 class="col-md-5 ml-2 pl-md-0 pl-md-3 ml-md-0">Job Title</h5>
                                        <h5 class="col-md-2 ml-2 ml-md-0">Date Posted</h5>
                                        <h5 class="col-md-2 ml-2 ml-md-0">Last Date</h5>
                                        <h5 class="col-md-3 ml-2 ml-md-0 text-center">View</h5>
                                    </div>
                                    <?php if (mysqli_num_rows($resultjb)>0): ?>
                                        
                                    <?php while ($rowjb = $resultjb->fetch_assoc()): ?>
                                    <div class="row jb-row">
                                        <div class="jb-details pl-md-0 pl-lg-3 col-md-5">
                                            <h5 class="ml-2 ml-md-0"><?php echo $rowjb['position'] ?></h5>
                                            <div class="row">
                                                <div class="col-md-4 col-lg-6 col-xl-4">
                                                    <div class="row pl-3 pl-lg-0">
                                                        <i class="fas ml-2 ml-md-3 ml-lg-3 mr-2 fa-map-marker-alt"></i>
                                                        <p class="ml-2 ml-md-0"><?php echo $rowjb['location'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row pl-3 pl-lg-0">
                                                        <i class="far ml-2 ml-md-3 ml-lg-3 mr-2 fa-money-bill-alt"></i>
                                                        <p class="ml-2 ml-md-0"><?php echo $rowjb['salary'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="col-md-2 ml-2 ml-md-0"><?php echo date("d/m/Y", strtotime(date("Y-m-d", strtotime($rowjb['post_date'])))); ?></h5>
                                        <h5 class="col-md-2 ml-2 ml-md-0"><?php echo $rowjb['last_date'] ?></h5>
                                        <div class="row icon-row d-flex justify-content-md-center ml-2 ml-md-0 col-md-3">
                                            <a href="#"><i class="fas ml-1 ml-lg-0 fa-eye" data-toggle="modal" data-target="#modal-vw<?php echo $rowjb['job_id']; ?>"></i></a>
                                            <a href="#"><i class="fas ml-1 ml-lg-2 fa-pencil-alt" data-toggle="modal" data-target="#modal-vwmodal<?php echo $rowjb['job_id']; ?>"></i></a>
                                            <!-- <a href="#"><i class="fas ml-2 mt-lg-2 mt-xl-0 fa-trash-alt"></i></a> -->
                                            <form method="post">
                                                <input type="hidden" name="job_id" value="<?php echo $rowjb['job_id']; ?>">
                                                <button type="submit" name= "deljob" class="btn p-0 trash-btn"><a href="javascript:void(0)"><i class="fas ml-2 mt-lg-0 mt-xl-0 fa-trash-alt"></i></a></button>
                                            </form>
                                        </div> 
                                        <div class="modal fade" id="modal-vw<?php echo $rowjb['job_id']; ?>">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title text-center w-100">Job Details</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                <span class="sr-only">Close</span>
                                            </button>
                                            
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h5>Position</h5>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $rowjb['position']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h5>Location</h5>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $rowjb['location']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h5>Salary</h5>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $rowjb['salary']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h5>Last Date</h5>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $rowjb['last_date']; ?></p>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h5>Skills</h5>
                                                </div>
                                                <div class="col-md-8">
                                                    <?php echo $rowjb['skills']; ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h5>Experience</h5>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $rowjb['exp']; ?> Year</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h5>Educational Qualification</h5>
                                                </div>
                                                <div class="col-md-8">
                                                    <?php echo $rowjb['qual']; ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h5>Job Description</h5>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $rowjb['job_desc']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h5>How to Apply</h5>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $rowjb['how_to']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h5>Key Responsibilities</h5>
                                                </div>
                                                <div class="col-md-8">
                                                    <p><?php echo $rowjb['resp']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    </div>
                                    <div class="modal fade" id="modal-vwmodal<?php echo $rowjb['job_id']; ?>">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title text-center w-100">Job Details</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                <span class="sr-only">Close</span>
                                            </button>
                                            
                                        </div>
                                        <div class="modal-body">
                                            <form method="post">
                                                <input type="hidden" name="job_id" value="<?php echo $rowjb['job_id']; ?>">
                                                <div class="form-row">
                                                    <div class="form-group ml-md-5 col-md-5">
                                                        <label for="pospjm" id="pospjm">Position *</label>
                                                        <input type="text" name="position" class="form-control" required placeholder="eg. Branch Manager" value="<?php echo $rowjb['position']; ?>">
                                                    </div>
                                                    <div class="form-group col-md-5">
                                                        <label for="locpjm" id="locpjm">Location *</label>
                                                        <input type="text" name="location" class="form-control" required placeholder="eg. Indore" value="<?php echo $rowjb['location']; ?>">
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group ml-md-5 col-md-5">
                                                        <label for="salpjm" id="salpjm">Salary (Rs per month) *</label>
                                                        <input type="text" name="salary" class="form-control" required placeholder="eg. 50,000" value="<?php echo $rowjb['salary']; ?>">
                                                    </div>
                                                    <div class="form-group col-md-5">
                                                        <label for="ldpjm" id="ldpjm">Last Date *</label>
                                                        <input type="tel" id="datepicker" name="lastdate"  class="form-control" required placeholder="eg. 25/05/2020" pattern="^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d$" value="<?php echo $rowjb['last_date']; ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-row">
                                                    <div class="form-group ml-md-5 col-md-5">
                                                        <label for="expidm" id="expidm">Experience *</label>
                                                        <select class="form-control" name="exp" required>
                                                            <?php 
                                                            if ($rowjb['position'] == 0){
                                                                echo '<option disabled value="">Select Experience</option>
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
                                                            else if ($rowjb['position'] == 0.5){
                                                                echo '<option disabled value="">Select Experience</option>
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
                                                            else if ($rowjb['position'] == 1){
                                                                echo '<option disabled value="">Select Experience</option>
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
                                                            else if ($rowjb['position'] == 2){
                                                                echo '<option disabled value="">Select Experience</option>
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
                                                            else if ($rowjb['position'] == 3){
                                                                echo '<option disabled value="">Select Experience</option>
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
                                                            else if ($rowjb['position'] == 4){
                                                                echo '<option disabled value="">Select Experience</option>
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
                                                            else if ($rowjb['position'] == 5){
                                                                echo '<option disabled value="">Select Experience</option>
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
                                                            else if ($rowjb['position'] == 6){
                                                                echo '<option disabled value="">Select Experience</option>
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
                                                            else if ($rowjb['position'] == 7){
                                                                echo '<option disabled value="">Select Experience</option>
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
                                                            else if ($rowjb['position'] == 8){
                                                                echo '<option disabled value="">Select Experience</option>
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
                                                            else if ($rowjb['position'] == 9){
                                                                echo '<option disabled value="">Select Experience</option>
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
                                                            else if ($rowjb['position'] == 10){
                                                                echo '<option disabled value="">Select Experience</option>
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
                                                            else if ($rowjb['position'] == 11){
                                                                echo '<option disabled value="">Select Experience</option>
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
                                                            <option value="10">10 Years</option>
                                                            <option value="11" selected>10+ Years</option>';
                                                            }
                                                            else if ($rowjb['position'] == 11){
                                                                echo '<option disabled value="">Select Experience</option>
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
                                                            <option value="10">10 Years</option>
                                                            <option value="11" selected>10+ Years</option>';
                                                            }
                                                            else
                                                            {
                                                                echo '<option disabled selected value="">Select Experience</option>
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
                                                            <option value="11">10+ Years</option>';
                                                            }

                                                            ?>
                                                            
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-5">
                                                        <label for="skpjm" id="skpjm">Skills(Tags) *</label>
                                                        <input type="text" name="skills" class="form-control" required placeholder="Driving, Web Designing etc." value="<?php echo $rowjb['last_date']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group ml-md-5 col-md-5">
                                                        <label for="edupjm" id="edupjm">Educational Qualification *</label>
                                                        <select class="form-control" name="qual" required>
                                                            <?php
                                                            if ($rowjb['qual'] == "10th") {
                                                                echo '<option disabled value="">Select Educational Qualification</option>
                                                            <option value="10th" selected>10th</option>
                                                            <option value="12th">12th</option>
                                                            <option value="Graduate">Graduate</option>
                                                            <option value="Post Graduate">Post Graduate</option>';
                                                            }
                                                            else if ($rowjb['qual'] == "12th") {
                                                                echo '<option disabled value="">Select Educational Qualification</option>
                                                            <option value="10th" >10th</option>
                                                            <option value="12th" selected>12th</option>
                                                            <option value="Graduate">Graduate</option>
                                                            <option value="Post Graduate">Post Graduate</option>';
                                                            }
                                                            else if ($rowjb['qual'] == "Graduate") {
                                                                echo '<option disabled value="">Select Educational Qualification</option>
                                                            <option value="10th" >10th</option>
                                                            <option value="12th" >12th</option>
                                                            <option value="Graduate" selected>Graduate</option>
                                                            <option value="Post Graduate">Post Graduate</option>';
                                                            }
                                                            else if ($rowjb['qual'] == "Post Graduate") {
                                                                echo '<option disabled value="">Select Educational Qualification</option>
                                                            <option value="10th" >10th</option>
                                                            <option value="12th" >12th</option>
                                                            <option value="Graduate" >Graduate</option>
                                                            <option value="Post Graduate" selected>Post Graduate</option>';
                                                            }
                                                            else
                                                            {
                                                                echo '<option disabled selected value="0">Select Educational Qualification</option>
                                                            <option value="10th" >10th</option>
                                                            <option value="12th" >12th</option>
                                                            <option value="Graduate" >Graduate</option>
                                                            <option value="Post Graduate" >Post Graduate</option>';
                                                            }
                                                            ?>
                                                            
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-5">
                                                        <label for="jbrpjm" id="jbrpjm">Job Role *</label>
                                                        <input type="text" name="role" class="form-control" required placeholder="Manager" value="<?php echo $rowjb['role'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group ml-md-5 col-md-5">
                                                        <label for="cpnameempm" id="cpnameempm">Contact Person Name *</label>
                                                        <input type="text" name="personname" class="form-control" required placeholder="Ram Kumar" value="<?php echo $rowjb['con_name'];?>">
                                                    </div>
                                                    <div class="form-group col-md-5">
                                                        <label for="cpnoempm" id="cpnoempm">Contact Person No. *</label>
                                                        <input type="text" name="personmobile" class="form-control" pattern="((\+*)((0[ -]+)*|(91 )*)(\d{12}+|\d{10}+))|\d{5}([- ]*)\d{6}" required value="<?php echo $rowjb['con_num'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group ml-md-5 col-md-5">
                                                        <label for="cpemailempm" id="cpemailempm">Contact Person Email Id *</label>
                                                        <input type="text" name="personemail" class="form-control" required value="<?php echo $rowjb['con_email'];?>">
                                                    </div>
                                                    <div class="form-group col-md-5">
                                                        <label for="cpvpempm" id="cpvpempm">No. of Vacant Posts *</label>
                                                        <input type="text" name="vacantpost" class="form-control" required value="<?php echo $rowjb['vacant_post'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group ml-md-5 col-md-10">
                                                        <label>Job Description *</label>
                                                        <textarea cols="25" rows="3" name="jobdescr" class="form-control" required placeholder="Please Enter a Brief Job Description" ><?php echo $rowjb['job_desc'];?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group ml-md-5 col-md-10">
                                                        <label>How to Apply *</label>
                                                        <textarea cols="25" rows="3" name="howto" class="form-control" required placeholder="Please enter the whole process of how the jobseeker can apply for this job."><?php echo $rowjb['how_to'];?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group ml-md-5 col-md-10">
                                                        <label>Key Responsibilities *</label>
                                                        <textarea cols="25" rows="3" name="resp" class="form-control" required placeholder="Please enter all the key responsibilities of the person applying for this position."><?php echo $rowjb['resp'];?></textarea>
                                                    </div>
                                                </div>
                                                

                                                <div class="modal-footer">
                                                    <button class="btn upld-btn" type="submit" name="updatejob">Update</button>
                                            </form>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                    <?php endwhile ?>
                                    <?php else: ?>
                                        <div>No Records to display</div>
                                    <?php endif ?>
                        <div class="modal" role="dialog" id="successmsg">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title text-center w-100">Success</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body modal-body-msg">
                                <h4 class="text-center">Job Updated</h4>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal" role="dialog" id="delmsg">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title text-center w-100">Success</h5>
                                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button> -->
                                <a href="emp-dash-mngjobs.php"><span aria-hidden="true">&times;</span></a>
                              </div>
                              <div class="modal-body modal-body-msg">
                                <h4 class="text-center">Job Deleted</h4>
                              </div>
                              <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                <a href="emp-dash-mngjobs.php">Close</a>
                              </div>
                            </div>
                          </div>
                        </div>


                                    <div class="nav-arrow">
                                        <a href="#"><i class="fas fa-arrow-circle-left"></i></a>
                                        <a href="#"><i class="fas ml-2 fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
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
                url:"upload_companylogo.php",
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

    });
        if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href );
        }
    </script>
  </body>
</html>
<?php   
    require 'mngjobprcs.php';
?>