<?php 
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['paid'] = "Paid") {
    header("Location: job-portal-login.php");
}
$username = $_SESSION['name'];
$email = $_SESSION['email'];
?>
<!Doctype html>
<html lang="en" style="height: 100%;">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Welcome</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="lib/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="lib/animate-master/animate.min.css">
    <link rel="icon" type="image/png" href="images/acs-a3.png">
    <link rel="stylesheet" type="text/css" href="css/hover.css">
    <script src="lib/jquery-3.4.1/jquery-3.4.1.min.js"></script>
    <script src="lib/waypoints-master/lib/jquery.waypoints.min.js"></script>
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
            background-image: url(../images/bg-6.png);
            background-size: 100% 160%;
        }
        @media screen and (min-width: 320px){
            body{
                background-image: none;
                background-color: #edf5ff;
            }
        }
        @media screen and (min-width: 768px){
            body{
                background-image: url(../images/bg-6.png);
                background-size: auto;
            }
        }
        @media screen and (min-width: 1020px){
            body{
                background-size: 115vw 135vw;
            }
        }
        @media screen and (min-width: 1050px){
            body{
                background-size: 100% 160%;
            }
        }
    </style>

    </head>
    <body style="height: 100%;">
        
        
        <section class="h-100 ">
            <div class="container h-100 d-flex justify-content-center">
                <div class="row align-items-center h-100">
                    <div class="bg-div  pt-4 pb-5 " >
                        <h3 class="mb-3 act-hd">Hi <?php echo $username; ?> To activate your Id please <br>recharge with standard plan</h3>
                        <div class="container-fluid animated fadeInUp delay-2s" id="payment-con">
                            <h3 class="text-center pl-hd pt-3 pb-3">Standard Plan</h3>
                            <img src="images/payment-page.svg">
                            <div class="row mt-3">
                                <div class="col-6"> 
                                    <h5><i class="fas fa-id-card"></i> Id Activation</h5>
                                </div>
                                <div class="col-2">
                                    <h5>--</h5>
                                </div>
                                <div class="col-4">
                                    <h5>Rs 100</h5>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <h5><i class="fas fa-donate"></i> GST (18%)</h5>
                                </div>
                                <div class="col-2">
                                    <h5>--</h5>
                                </div>
                                <div class="col-4">
                                    <h5>Rs 18</h5>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <h5><i class="far fa-money-bill-alt"></i> Service Fee</h5>
                                </div>
                                <div class="col-2">
                                    <h5>--</h5>
                                </div>
                                <div class="col-4">
                                    <h5>Rs 2</h5>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <h5><i class="fas fa-hand-holding-usd"></i> Total Amount</h5>
                                </div>
                                <div class="col-2">
                                    <h5>--</h5>
                                </div>
                                <div class="col-4">
                                    <h5>Rs 120</h5>
                                </div>
                            </div>
                            <p class="text-center mb-0">*Validity of Standard Plan (1 Year)</p>
                            
                            <button id="rzp-button1">Pay with Razorpay1</button>
                            <form name='razorpayform' action="../razorpay/verify.php" method="POST">
                                <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                                <input type="hidden" name="razorpay_signature"  id="razorpay_signature" >
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>  
        
             
<script>
// Checkout details as a json
var options = <?php echo $json?>;

/**
 * The entire list of Checkout fields is available at
 * https://docs.razorpay.com/docs/checkout-form#checkout-fields
 */
options.handler = function (response){
    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
    document.getElementById('razorpay_signature').value = response.razorpay_signature;
    document.razorpayform.submit();
};

// Boolean whether to show image inside a white frame. (default: true)
options.theme.image_padding = false;

options.modal = {
    ondismiss: function() {
        console.log("This code runs when the popup is closed");
    },
    // Boolean indicating whether pressing escape key 
    // should close the checkout form. (default: true)
    escape: true,
    // Boolean indicating whether clicking translucent blank
    // space outside checkout form should close the form. (default: false)
    backdropclose: false
};

var rzp = new Razorpay(options);

document.getElementById('rzp-button1').onclick = function(e){
    rzp.open();
    e.preventDefault();
}
</script> 
        




    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/popperjs-1.16.0/javascript/popper.min.js"></script>
    <script src="lib/bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script type="text/javascript">
      new WOW().init();
    </script>
  </body>
</html>