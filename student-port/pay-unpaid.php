<?php
require 'student_paymentprcs.php';
?>
<!Doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pay Unpaid</title>
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
        <section id="chk-status">
            <div class="container mt-5">
                <div class="row ">
                    <div class="form-cont col-12 p-3 ">
                        <form method="post">
                            <h4 class="chk-head p-2 mt-3 mb-5 text-center">Pay Unpaid</h4>
                            <div class="row d-flex justify-content-center">
                                <div class="form-group col-md-5 ">
                                    <label class="" for="tno-pu">Ticket Number *</label>
                                    <input type="text" name="tno-pu" id="tno-pu" class=" form-control" required>
                                </div>
                                <div class="form-group col-md-5 ">
                                    <label class="" for="dob-pu">Date of Birth *</label>
                                    <input type="text" name="dob-pu" id="dob-pu" pattern="^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d$" class=" form-control" required>
                                </div>
                            </div>
                            <div class="btn-div mt-3 mb-3 d-flex justify-content-center">
                                <button type="submit" class="btn chk-stbtn" name="paypu-btn">Pay/Unpaid</button>
                                <button type="reset" class="ml-3 btn rs-btn" name="rs-btn">Reset</button>
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
            $(function() {
            $("#dob-pu").datepicker({ dateFormat: 'dd/mm/yy' });
            });
        </script>
    </body>
</html>