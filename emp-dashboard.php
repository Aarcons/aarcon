<?php  
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['comp'])) {
    header("Location: job-portal-login.php");
}
if (isset($_POST['emplgbtn'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
}
$comname = "";
$comemail = "";
$commd = "";
$commdemail = "";
$comweb = "";
$comindustry = "";
$comdesc = "";
$repname = "";
$repmob = "";
$comaddress = "";
$compcity = "";
$compdis = "";
$compstate = "";
$comppin = "";
require 'emp_prcs.php';
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
    <title>Employer Dashboard</title>
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
                                <div id="collapseOne" class="panel panel-link" role="tabpanel" aria-labelledby="headingOne">
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
                                <form method="post">
                                <button class="lgbtn" name="emplgbtn" type="submit">Logout</button>
                                </form>
                            </h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-9 main-col-form mt-4">
                    <div class="container-fluid form-container-fluid">
                        <div class="col-12 form-col-12">
                            <div class="container-fluid emp-pro-con">
                                <section id="bas-info-emp-sec">
                                    <div class="bas-info-emp">
                                    <h3 class="text-center mb-5"><b>Basic Information</b></h3>
                                    <form method="post">
                                        <div class="form-row">
                                            <div class="form-group ml-md-5 col-md-5">
                                                <label for="comp-name" id="comp-name">Company Name *</label>
                                                <input type="text" name="comp-name" class="form-control" value="<?php echo $comname; ?>" required>
                                                
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="off-email-emp" id="off-email-emp">Official Email *</label>
                                                <input type="email" name="off-email-emp" class="form-control" value="<?php echo $comemail; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group ml-md-5 col-md-5">
                                                <label for="md-name" id="md-name">Managing Director Name *</label>
                                                <input type="text" name="md-name" class="form-control" value="<?php echo $commd; ?>" required>
                                                
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="md-email-emp" id="md-email-emp">Managing Director Email *</label>
                                                <input type="email" name="md-email-emp" class="form-control" value="<?php echo $commdemail; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group ml-md-5 col-md-3">
                                                <label for="md-no" id="md-no">Mng. Dir. No. *</label>
                                                <input type="tel" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" name="md-no" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="website-emp" id="website-emp">Website</label>
                                                <input type="text" name="website-emp" class="form-control" value="<?php echo $comweb; ?>">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="ind-emp" id="ind-emp">Industry *</label>
                                                <select class="form-control" name="industry" required>
                                                    <?php 
                                                    if ($comindustry == 'accounting/finance'){
                                                        echo '<option value="" disabled >Select Industry</option>
                                                    <option value="accounting/finance" selected>Accounting/Finance</option>
                                                    <option value="advertising/pr/mr/events">Advertising/PR/MR/Events</option>
                                                    <option value="agriculture/dairy">Agriculture/Dairy</option>
                                                    <option value="animation">Animation</option>';
                                                    }
                                                    else if ($comindustry == 'advertising/pr/mr/events'){
                                                        echo '<option value="" disabled >Select Industry</option>
                                                    <option value="accounting/finance" >Accounting/Finance</option>
                                                    <option value="advertising/pr/mr/events" selected>Advertising/PR/MR/


                                                    </option>
                                                    <option value="agriculture/dairy">Agriculture/Dairy</option>
                                                    <option value="animation">Animation</option>';
                                                    }
                                                    else if ($comindustry == 'agriculture/dairy'){
                                                        echo '<option value="" disabled >Select Industry</option>
                                                    <option value="accounting/finance" >Accounting/Finance</option>
                                                    <option value="advertising/pr/mr/events" >Advertising/PR/MR/


                                                    </option>
                                                    <option value="agriculture/dairy" selected>Agriculture/Dairy</option>
                                                    <option value="animation">Animation</option>';
                                                    }
                                                    else if ($comindustry == 'animation'){
                                                        echo '<option value="" disabled >Select Industry</option>
                                                    <option value="accounting/finance" >Accounting/Finance</option>
                                                    <option value="advertising/pr/mr/events" >Advertising/PR/MR/


                                                    </option>
                                                    <option value="agriculture/dairy" >Agriculture/Dairy</option>
                                                    <option value="animation" selected>Animation</option>';
                                                    }
                                                    else
                                                    {
                                                    echo '<option value="" disabled selected>Select Industry</option>
                                                    <option value="accounting/finance" >Accounting/Finance</option>
                                                    <option value="advertising/pr/mr/events" >Advertising/PR/MR/


                                                    </option>
                                                    <option value="agriculture/dairy" >Agriculture/Dairy</option>
                                                    <option value="animation" >Animation</option>';
                                                    }
                                                    ?>   
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <?php if ($comdesc==""): ?>
                                            <div class="form-group ml-md-5 col-md-10">
                                                <label for="des-emp" id="des-emp">Description</label>
                                                <textarea rows="3" cols="25" name="comp-desc" class="form-control" placeholder="Enter your profile description"></textarea>
                                            </div>
                                            <?php else: ?>
                                            <div class="form-group ml-md-5 col-md-10">
                                                <label for="des-emp" id="des-emp">Description</label>
                                                <textarea rows="3" cols="25" name="comp-desc" class="form-control" value="<?php echo $comdesc; ?>"><?php echo $comdesc; ?></textarea>
                                            </div>    
                                            <?php endif ?>
                                            
                                        </div>
                                        <div class="btndiv clearfix">
                                            <button type="submit" name="comp-basic" class="btn" >Update</button>
                                        </div>
                                    </form>
                                </div>
                                </section>
                                <section id="cont-info-emp-sec">
                                    <div class="cont-info-emp mt-5">
                                    <h3 class="text-center mb-5"><b>Contact Information</b></h3>
                                    <form method="post">
                                        <div class="form-row">
                                            <div class="form-group ml-md-5 col-md-5">
                                                <label for="rep-name-emp" id="rep-name-emp">Representative Name *</label>
                                                <input type="text" name="rep-name-emp" class="form-control" value="<?php echo $repname; ?>" required>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="rep-mob-emp" id="rep-mob-emp">Representative Mobile No. *</label>
                                                <input type="tel" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" name="rep-mob-emp" class="form-control" value="<?php echo $repmob; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group ml-md-5 col-md-5">
                                                <label for="addemp" id="addemp">Address *</label>
                                                <input type="text" name="addemp" class="form-control"  value="<?php echo $comaddress; ?>" required>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="land-emp" id="land-emp">Landmark *</label>
                                                <input type="text" name="land-emp" class="form-control"  value="<?php echo $comaddress; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group ml-md-5 col-md-5">
                                                <label for="city-emp" id="city-emp">City *</label>
                                                <input type="text" name="city-emp" class="form-control"  value="<?php echo $compcity; ?>" required>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="dist-emp" id="dist-emp">District *</label>
                                                <input type="text" name="dist-emp" class="form-control" value="<?php echo $compdis; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group ml-md-5 col-md-5">
                                                <label for="state-emp" id="state-emp">State *</label>
                                                <select class="form-control" name="state" required>
                                                    <?php 
                                                    if ($compstate == "Madhya Pradesh") {
                                                        echo '<option disabled >Select State</option>
                                                        <option value="Madhya Pradesh" selected>Madhya Pradesh</option>
                                                        <option value="Rajasthan">Rajasthan</option>';
                                                    }
                                                    else if ($compstate == "Rajasthan") {
                                                        echo '<option disabled >Select State</option>
                                                        <option value="Madhya Pradesh" >Madhya Pradesh</option>
                                                        <option value="Rajasthan" selected>Rajasthan</option>';
                                                    }
                                                    else 
                                                    {
                                                        echo '<option disabled selected>Select State</option>
                                                        <option value="Madhya Pradesh" >Madhya Pradesh</option>
                                                        <option value="Rajasthan" >Rajasthan</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="pincode-emp" id="pincode-emp">Pin Code *</label>
                                                <input type="text" name="pincode-emp" class="form-control" value="<?php echo $comppin; ?>" required>
                                            </div>
                                        </div>
                                        <div class="btndiv clearfix">
                                            <button type="submit" name="con-info-btn" class="btn">Update</button>
                                        </div>
                                    </form>
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
    </script>
  </body>
</html>
