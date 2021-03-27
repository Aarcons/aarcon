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
require 'postjobprcs.php';
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
    <title>Post Job</title>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="lib/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/hover.css">
    <link rel="icon" type="image/png" href="images/acs-a3.png">
    <link rel="stylesheet" type="text/css" href="lib/jquery-ui-all/jquery-ui.min.css">
    <script src="lib/jquery-3.4.1/jquery-3.4.1.min.js"></script>
    <script src="lib/waypoints-master/lib/jquery.waypoints.min.js"></script>
    <script src="js/croppie.js"></script>
    <link rel="stylesheet" href="css/croppie.css" />
    <script src="lib/jquery-ui-all/jquery-ui.min.js"></script>
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
                            <div class="container-fluid emp-pj-con">
                                <div class="post-job">
                                    <h3 class="text-center mb-5"><b>Post a Job</b></h3>
                                    <form method="post">
                                        <div class="form-row">
                                            <div class="form-group ml-md-5 col-md-5">
                                                <label for="pospj" id="pospj">Position *</label>
                                                <input type="text" name="pospj" class="form-control" required placeholder="eg. Branch Manager">
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="locpj" id="locpj">Location *</label>
                                                <input type="text" name="locpj" class="form-control" required placeholder="eg. Indore">
                                            </div>
                                            
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group ml-md-5 col-md-5">
                                                <label for="salpj" id="salpj">Salary (Rs per month) *</label>
                                                <input type="text" name="salpj" class="form-control" required placeholder="eg. 50,000">
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="ldpj" id="ldpj">Last Date *</label>
                                                <input type="text" id="txtDate" name="ldpj"  class="form-control date" required placeholder="eg. 25/05/2020" pattern="^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d$" >
                                            </div>
                                        </div>
                                        
                                        <div class="form-row">
                                            <div class="form-group ml-md-5 col-md-5">
                                                <label for="expid" id="expid">Experience *</label>
                                                <select class="form-control" name="exp" required>
                                                    <option disabled selected value="">Select Experience</option>
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
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="skpj" id="skpj">Skills(Tags) *</label>
                                                <input type="text" name="skpj" class="form-control" required placeholder="Driving, Web Designing etc.">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group ml-md-5 col-md-5">
                                                <label for="edupj" id="edupj">Educational Qualification *</label>
                                                <select class="form-control" name="qual" required>
                                                    <option disabled selected value="">Select Educational Qualification</option>
                                                    <option value="10th">10th</option>
                                                    <option value="12th">12th</option>
                                                    <option value="Graduate">Graduate</option>
                                                    <option value="Post Graduate">Post Graduate</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="jbrpj" id="jbrpj">Job Role *</label>
                                                <input type="text" name="jbrpj" class="form-control" required placeholder="Manager">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group ml-md-5 col-md-5">
                                                <label for="cpnameemp" id="cpnameemp">Contact Person Name *</label>
                                                <input type="text" name="cpname" class="form-control" required placeholder="Ram Kumar">
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="cpnoemp" id="cpnoemp">Contact Person No. *</label>
                                                <input type="tel" name="cpnum" class="form-control" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" required>
                                                
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group ml-md-5 col-md-5">
                                                <label for="cpemailemp" id="cpemailemp">Contact Person Email Id *</label>
                                                <input type="text" name="cpemail" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="cpvpemp" id="cpvpemp">No. of Vacant Posts *</label>
                                                <input type="text" name="vacant" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group ml-md-5 col-md-10">
                                                <label>Job Description *</label>
                                                <textarea cols="25" rows="3" name="job_desc" class="form-control" required placeholder="Please Enter a Brief Job Description"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group ml-md-5 col-md-10">
                                                <label>How to Apply *</label>
                                                <textarea cols="25" rows="3" name="how_to" class="form-control" required placeholder="Please enter the whole process of how the jobseeker can apply for this job."></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group ml-md-5 col-md-10">
                                                <label>Key Responsibilities *</label>
                                                <textarea cols="25" rows="3" name="respo" class="form-control" required placeholder="Please enter all the key responsibilities of the person applying for this position."></textarea>
                                            </div>
                                        </div>
                                        <div class="btndivpost clearfix">
                                            <button class="btn" type="submit" name="pjbtn">Post Job</button>
                                        </div>
                                    </form>
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
        $(function() {
        $("#txtDate").datepicker({ dateFormat: 'dd/mm/yy', minDate: 0 });
        });

    </script>
  </body>
</html>