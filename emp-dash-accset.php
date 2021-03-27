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
    <title>Reset Password</title>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="lib/fontawesome/css/all.min.css">
    <link rel="icon" type="image/png" href="images/acs-a3.png">
    <link rel="stylesheet" type="text/css" href="css/hover.css">
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
                    <h3 class="mt-md-5"></h3>
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
                        <div class="reset-password menu-link">
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
                            <div class="container-fluid" id="accset">
                                <div class="row">
                                    <div class="col-12 accset-col12">
                                        <div class="pass-div mt-4">
                                            <h4 class="text-center mb-4">Reset Password</h4>
                                            <form method="post">
                                                <div class="form-group row">
                                                    <label for="olpass" class="ml-md-4 ml-lg-5 col-md-4 col-lg-3">Old Password</label>
                                                    <div class="input-group col-md-5 pl-0 pr-0">
                                                        <div class="input-group append" >
                                                            <input type="password" name="olpass" class="form-control" id="olpassemp" required>
                                                            <a href="#" onclick="showemp2Function()"><i class="form-control fas fa-eye" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="newpass" class="ml-md-4 ml-lg-5 col-md-4 col-lg-3">New Password</label>
                                                    <div class="input-group col-md-5 pl-0 pr-0">
                                                        <div class="input-group append">
                                                            <input type="password" name="newpass" class="form-control" id="newpassemprs" required oninvalid="this.setCustomValidity('Password must be 4-8 character long, atleast 1 number required')" oninput="this.setCustomValidity('')" pattern="^(?=.*\d).{4,8}$">
                                                            <a href="#" onclick="showemp3Function()"><i class="form-control fas fa-eye"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="conpassrs" class="ml-md-4 ml-lg-5 col-md-4 col-lg-3">Confirm Password</label>
                                                    <div class="input-group col-md-5 pl-0 pr-0">
                                                        <div class="input-group append">
                                                            <input type="password" name="conpassrs" class="form-control" id="conpassemprs" required>
                                                            <a href="#" onclick="showemp4Function()"><i class="form-control fas fa-eye"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accbtnrow clearfix">
                                                    <div class="form-group row accbtnrow2">
                                                        <button type="submit" name="rspassbtn" class="btn">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div> 
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
      function showemp2Function(){
        var showemp2 = document.getElementById("olpassemp");
         event.preventDefault();
        if (showemp2.type === "password") {
            showemp2.type = "text";
        } 
        else {
            showemp2.type = "password";
        }
      }
      function showemp3Function(){
        var showemp3 = document.getElementById("newpassemprs");
        event.preventDefault();
        if (showemp3.type === "password") {
            showemp3.type = "text";
        } 
        else {
            showemp3.type = "password";
        }
      }
       function showemp4Function(){
        var showemp4 = document.getElementById("conpassemprs");
        event.preventDefault();
        if (showemp4.type === "password") {
            showemp4.type = "text";
        } 
        else {
            showemp4.type = "password";
        }
      }
        var passwordrsemp = document.getElementById("newpassemprs")
        , confirm_passwordrsemp = document.getElementById("conpassemprs");
        function validatePasswordemprs(){
          if(passwordrsemp.value != confirm_passwordrsemp.value){
            confirm_passwordrsemp.setCustomValidity("Passwords Don't Match");
          } else {
            confirm_passwordrsemp.setCustomValidity('');
          }
        }
        passwordrsemp.onchange = validatePasswordemprs;
        confirm_passwordrsemp.onkeyup = validatePasswordemprs;
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