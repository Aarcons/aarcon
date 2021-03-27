<?php
session_start();
$req_id = $_SESSION['req_id'];
$service = $_SESSION['serv_name'];
$amount = $_SESSION['amount'];

?>
<!Doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Payment Receipt</title>
        <link rel="stylesheet" type="text/css" href="../css/social-share.css">
        <link rel="stylesheet" type="text/css" href="../css/hover.css">
        <link rel="stylesheet" type="text/css" href="../lib/bootstrap-4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../lib/fontawesome/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="../lib/animate-master/animate.min.css">
        <link rel="icon" type="image/png" href="../images/acs-a3.png">
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
        <section id="nav-bar-sec">
            <?php include '../flex-strip.php' ?>
            <?php include '../new-nav-diff-fold.php' ?>
        </section>
        <section id="print-brand">
            <img src="../images/aarcons.png">
        </section>
        
        <section id="payment-receipt">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12 p-4 receipt-col">
                        <h3 class="text-center"><b>Payment Receipt</b></h3>
                        <div class="receipt-div mt-4 d-flex justify-content-center">
                            <div class="det-div p-4">
                                <table class="st-table ">
                                    <tr>
                                        <td><h4><b>Application No.</b></h4></td>
                                        <td><h4 class="ml-3"><?php echo $req_id; ?></h4></td>
                                    </tr>
                                    <tr>
                                        <td><h4><b>Service Applied For</b></h4></td>
                                        <td><h4 class="ml-3"><?php echo $service; ?></h4></td>
                                    </tr>
                                    <tr>
                                        <td><h4><b>Payment Amount</b></h4></td>
                                        <td><h4 class="ml-3"><?php echo $amount; ?></h4></td>
                                    </tr>
                                    <tr>
                                        <td><h4><b>Payment Status</b></h4></td>
                                        <td><h4 class="ml-3 text-success">Success</h4></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="receipt-btndiv mt-3 d-flex justify-content-center">
                            <button type="submit" class="btn print-btn" onclick="window.print();return false;">Print Payment Receipt</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="watermark-sec">
            <h1 class="mt-5">PAYMENT RECIEVED</h1>
        </section>
        <section id="det-footer">
            <?php include '../big-footer-diff-fold.php' ?>
        </section>
        <script src="../lib/popperjs-1.16.0/javascript/popper.min.js"></script>
        <script src="../lib/bootstrap-4.4.1/js/bootstrap.min.js"></script>
    </body>
</html>

<?php 
session_unset();
session_destroy();
?>