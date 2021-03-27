<?php  
session_start();
if (!isset($_SESSION['inst'])) {
    header("Location: job-portal-login.php");
}
if (isset($_POST['palgbtn'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
}
require 'inst-prcs.php';
$rowsel = $resultsel->fetch_assoc();
$logo = $rowsel['logo'];

?>
<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Institute Partner Dashboard</title>
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
                    <h3 class="mt-5">Hello, <?php echo $rowsel['ins_name']; ?></h3>
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
                        <input type="file" name="prof-pupl" id="img-upl">
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
                    <h4 class="mt-md-5">User Id : <?php echo $rowsel['ins_id']; ?></h4>
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
                                           <a href="inst-dash.php">Partner Profile</a>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="req-camdrive menu-link">
                            <h4 class="panel-title">
                                <a href="inst-req-campdrive.php">Request Campus Drive</a>
                            </h4>
                        </div>
                        <div class="req-status menu-link">
                            <h4 class="panel-title">
                                <a href="inst-view-req.php">View Request Status</a>
                            </h4>
                        </div>
                        <div class="Account-Settings menu-link">
                            <h4 class="panel-title">
                                <a href="inst-accset.php">Reset Password</a>
                            </h4>
                        </div>
                        <div class="Logout menu-link">
                            <h4 class="panel-title">
                                <form method="post"><button class="lgbtn" name="palgbtn" type="submit">Logout</button></form>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 main-col-form mt-4">
                    <div class="container-fluid form-container-fluid">
                        <div class="col-12 form-col-12">
                            <div class="container-fluid pl-0 pr-0 pa-con">
                                <div class="pa-basinfo">
                                    <h3 class="text-center mb-5"><b>Basic Information</b></h3>
                                    <form method="post">
                                        <div class="form-row">
                                            <div class="form-group ml-md-5 col-md-5">
                                                <label for="paponame" id="paponame">Placement Officer Name *</label>
                                                <input type="text" name="name" value="<?php echo $rowsel['p_name']; ?>" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="papono" id="papono">Placement Officer Mobile No. *</label>
                                                <input type="tel" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" name="mobile" value="<?php echo $rowsel['p_mobile']; ?>" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group ml-md-5 col-md-3">
                                                <label for="papouniv" id="papouniv">University Name *</label>
                                                <input type="text" name="univ" class="form-control" value="<?php echo $rowsel['univ']; ?>"  required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="papodes" id="papodes">Designation *</label>
                                                <input type="text" name="designation" class="form-control"  value="<?php echo $rowsel['p_design']; ?>" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="papoemail" id="papoemail">Official Email *</label>
                                                <input type="email" name="of_email"  value="<?php echo $rowsel['of_email']; ?>" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group ml-md-5 col-md-5">
                                                <label for="papoiname" id="papoiname">Institute Name *</label>
                                                <input type="text" name="ins_name" class="form-control"  value="<?php echo $rowsel['ins_name']; ?>"required>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="papoiadd" id="papoiadd">Institute Address *</label>
                                                <input type="text" name="ins_add" class="form-control"  value="<?php echo $rowsel['ins_add']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group ml-md-5 col-md-5">
                                                <label for="papomname" id="papomname">Managing Director's Name *</label>
                                                <input type="text" name="md_name" class="form-control"  value="<?php echo $rowsel['md_name']; ?>"required>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="papomno" id="papomno">Managing Director's Mobile No. *</label>
                                                <input type="tel" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" name="md_mobile" class="form-control" value="<?php echo $rowsel['md_mobile']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group ml-md-5 col-md-5">
                                                <label for="papomemail" id="papomemail">Managing Director's Email *</label>
                                                <input type="email" name="md_email" class="form-control"  value="<?php echo $rowsel['md_email']; ?>"required>
                                            </div>
                                        </div>
                                        <div class="pa-btndiv clearfix">
                                            <button type="submit" name="inst_profile" class="btn paprobtn">Update</button>
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
                url:"upload-inst-logo.php",
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
    <script src="lib/popperjs-1.16.0/javascript/popper.min.js"></script>
    <script src="lib/bootstrap-4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>