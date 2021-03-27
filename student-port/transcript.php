<!Doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Transcript</title>
        <link rel="stylesheet" type="text/css" href="../css/social-share.css">
        <link rel="stylesheet" type="text/css" href="../css/hover.css">
        <link rel="stylesheet" type="text/css" href="../lib/bootstrap-4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../lib/fontawesome/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="../lib/jquery-ui-all/jquery-ui.min.css">
        <link rel="icon" type="image/png" href="../images/acs-a3.png">
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
                        <h3 class="text-center pt-3"><b>Transcript</b></h3>
                        <form method="post">
                            <h4 class="text-center mt-3 mb-3">Basic Details</h4>
                            <div class="form-group row d-flex justify-content-center pl-3 pr-3 pl-md-0 pr-md-0">
                                <label class="col-md-2 pl-0 pl-md-3" for="fname-trans">First Name *</label>
                                <input type="text" name="fname-trans" id="fname-trans" class=" col-md-3 form-control" required>
                                <label class="col-md-2 pt-2 pt-md-0 pl-0 pl-md-3" for="lname-trans">Last Name *</label>
                                <input type="text" name="lname-trans" id="lname-trans" class="col-md-3 form-control" required>
                            </div>
                            <div class="form-group row d-flex justify-content-center pl-3 pr-3 pl-md-0 pr-md-0">
                                <label class="col-md-2 pl-0 pl-md-3" for="dob-trans">Date of Birth *</label>
                                <input type="text" name="dob-trans" id="dob-trans" class="col-md-3 form-control" pattern="^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d$" required>
                                <label class="col-md-2 pt-3 pt-md-0 pl-0 pl-md-3" for="mob-trans">Mobile No. *</label>
                                <input type="text" name="mob-trans" id="mob-trans" class="col-md-3 form-control" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" required>
                            </div>
                            <div class="form-group row d-flex justify-content-center pl-3 pr-3 pl-md-0 pr-md-0">
                                <label class="col-md-2 pl-0 pl-md-3" for="cat-trans">Category *</label>
                                <select class="col-md-3 form-control" name="cat-trans" required>
                                    <option disabled selected value="">Select Cast</option>
                                    <option value="obc">OBC</option>
                                    <option value="sc">SC</option>
                                    <option value="st">ST</option>
                                    <option value="gen">GEN</option>
                                </select>
                                <label class="col-md-2 pt-3 pt-md-0 pl-0 pl-md-3" for="add-trans">Address *</label>    
                                <input type="text" name="add-trans" id="add-trans" class="col-md-3 form-control" required>
                            </div>
                            <h4 class="text-center mb-3">Transcript Details</h4>
                            <div class="form-group row d-flex justify-content-center pl-3 pr-3 pl-md-0 pr-md-0">
                                <label class="col-md-3 pl-0 pl-md-3" for="mark-trans">All Marksheet *</label>
                                <div class="custom-file col-md-4 overflow-hidden">
                                    <input type="file" name="mark-trans" class="custom-file-input" id="mark-trans" required>
                                    <label class="custom-file-label" for="mark-trans">Choose File</label>
                                </div>
                                <label class="col-md-3 pl-0 pl-md-3 text-danger">PDF (Max Size 200 KB)</label>
                            </div>
                            <div class="btn-div-enq pb-5 pt-3 d-flex justify-content-center">
                                <button type="submit" class="btn sb-btn" name="sb-trans">Submit</button>
                                <button type="reset" class="btn rs-btn ml-3" name="rs-trans">Reset</button>
                            </div>
                        </form>
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
            $("#dob-trans").datepicker({ dateFormat: 'dd/mm/yy' });
            });
        </script>
    </body>
</html>