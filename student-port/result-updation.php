<?php
require 'student-prcs.php';


?>
<!Doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Result Updation</title>
        <link rel="stylesheet" type="text/css" href="../css/social-share.css">
        <link rel="stylesheet" type="text/css" href="../css/hover.css">
        <link rel="stylesheet" type="text/css" href="../lib/bootstrap-4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../lib/fontawesome/css/all.min.css">
        <link rel="icon" type="image/png" href="../images/acs-a3.png">
        <link rel="stylesheet" type="text/css" href="../lib/jquery-ui-all/jquery-ui.min.css">
        <link rel="stylesheet" type="text/css" href="../lib/animate-master/animate.min.css">
        <script src="../lib/jquery-3.4.1/jquery-3.4.1.min.js"></script>
        <script src="../lib/waypoints-master/lib/jquery.waypoints.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/main.min.css">
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
                background-image: none!important;
                background-repeat: none!important;
                background-color: #f8f9fa!important;
            }
        </style>
        </head>
    <body>
        <section>
            <?php include '../flex-strip.php' ?>
            <?php include '../new-nav-diff-fold.php' ?>
        </section>
        <section id="stenq-form" class="mt-5">
            <div class="container" id="enq-maincont">
                <div class="row">
                    <div class="form-cont-enq col-12">
                        <h3 class="text-center pt-3"><b>Result Updation</b></h3>
                        <form method="post" enctype="multipart/form-data">
                            <h4 class="text-center mt-3 mb-3">Basic Details</h4>
                            <div class="form-group row d-flex justify-content-center pl-3 pr-3 pl-md-0 pr-md-0">
                                <label class="col-md-2 pl-0 pl-md-3" for="fname-resupd">First Name *</label>
                                <input type="text" name="fname-resupd" id="fname-resupd" class=" col-md-3 form-control" required>
                                <label class="col-md-2 pt-2 pt-md-0 pl-0 pl-md-3" for="lname-resupd">Last Name *</label>
                                <input type="text" name="lname-resupd" id="lname-resupd" class="col-md-3 form-control" required>
                            </div>
                            <div class="form-group row d-flex justify-content-center pl-3 pr-3 pl-md-0 pr-md-0">
                                <label class="col-md-2 pl-0 pl-md-3" for="dob-resupd">Date of Birth *</label>
                                <input type="text" name="dob-resupd" id="dob-resupd" class="col-md-3 form-control" pattern="^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d$" required>
                                <label class="col-md-2 pt-3 pt-md-0 pl-0 pl-md-3" for="mob-resupd">Mobile No. *</label>
                                <input type="text" name="mob-resupd" id="mob-resupd" class="col-md-3 form-control" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" required>
                            </div>
                            <div class="form-group row d-flex justify-content-center pl-3 pr-3 pl-md-0 pr-md-0">
                                <label class="col-md-2 pl-0 pl-md-3" for="cat-resupd">Category *</label>
                                <select class="col-md-3 form-control" name="cat-resupd" required>
                                    <option disabled selected value="">Select Cast</option>
                                    <option value="obc">OBC</option>
                                    <option value="sc">SC</option>
                                    <option value="st">ST</option>
                                    <option value="gen">GEN</option>
                                </select>
                                <label class="col-md-2 pt-3 pt-md-0 pl-0 pl-md-3" for="add-resupd">Address *</label>    
                                <input type="text" name="add-resupd" id="add-resupd" class="col-md-3 form-control" required>
                            </div>
                            <h4 class="text-center mb-3">Result Updation Details</h4>
                            <div class="form-group row d-flex justify-content-center pl-3 pr-3 pl-md-0 pr-md-0">
                                <label class="col-md-3 pl-0 pl-md-3" for="mark-resupd">Upload All Marksheets *</label>
                                <div class="custom-file col-md-4 overflow-hidden">
                                    <input type="file" name="mark-resupd" class="custom-file-input" id="mark-resupd" required>
                                    <label class="custom-file-label" for="mark-resupd">Choose File</label>
                                </div>
                                <label class="col-md-3 pl-0 pl-md-3 text-danger">PDF (Max Size 200 KB)</label>
                            </div>
                            <div class="btn-div-enq pb-5 pt-3 d-flex justify-content-center">
                                <button type="submit" class="btn sb-btn" name="sb-resupd">Submit</button>
                                <button type="reset" class="btn rs-btn ml-3" name="rs-resupd">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title w-100 text-center mb-0" id="exampleModalCenterTitle"><?php echo $modaltitle; ?></h5>
                    <button type="button" class="close modal-clbtn" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <h4 class="text-center"><?php echo $msg; ?></h4>
                  </div>
                  <div class="modal-footer d-flex justify-content-center">
                    <a href="<?php echo $location; ?>" class="btn btn-primary" <?php echo $data; ?>>Close</a>
                  </div>
                </div>
              </div>
            </div>
        </section>            
        <?php include '../big-footer-diff-fold.php' ?>
        <script src="../lib/popperjs-1.16.0/javascript/popper.min.js"></script>
        <script src="../lib/bootstrap-4.4.1/js/bootstrap.min.js"></script>
        <script src="../lib/jquery-ui-all/jquery-ui.min.js"></script>
        <script type="text/javascript">
            $(document).on('change', '.custom-file-input', function (event) {
            $(this).next('.custom-file-label').html(event.target.files[0].name);
            })
            $(function() {
            $("#dob-resupd").datepicker({ dateFormat: 'dd/mm/yy' });
            });
        </script>
    </body>
</html>
<?php
if ($response == 1) {
    echo "<script> $('#success').modal('show'); </script>";
}
?>