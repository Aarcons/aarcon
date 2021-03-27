<!Doctype html>
<html lang="en" style="height: 100%;">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Payment Page</title>
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
	</head>
    <body style="height: 100%;" class="student-paymentbody">
	<section class="h-100">
		<div class="container h-100 d-flex justify-content-center">
			<div class="row h-100 align-items-center">
				<div class="payment-div">
					<h4 class="text-center pl-3 pr-3">Hi, Name <br> Please complete your transaction <br> to submit your request for the service.</h4>
					<div class="container justify-content-center text-center">
						<div class="d-inline-block p-3" >
							<h4 class="text-center text-white ser-head mb-0 p-2">Service Fees</h4>
							<div id="payment-box" class="p-3">
								<img src="../images/payment-page.svg" >
								<table class="container-fluid">
									<tr>
										<td class="pl-2"><i class="fas fa-id-card"></i></td>
										<td class="pl-2 data text-left">Service Name</td>	
										<td class="pl-3 data">--</td>
										<td class="text-right data pr-2 pl-2">Rs 1000</td>	
									</tr>
									<tr>
										<td class="pl-2"><i class="fas fa-donate"></i></td>
										<td class="pl-2 data text-left">GST (18%)</td>
										<td class="pl-2 data">--</td>
										<td class="pl-2 pr-2 text-right data">Rs 180</td>
									</tr>
									<tr>
										<td class="pl-2"><i class="fas fa-money-bill-alt"></i></td>
										<td class="pl-2 data text-left">Service Charge</td>
										<td class="pl-2 data">--</td>
										<td class="pl-2 pr-2 text-right data">Rs 20</td>
									</tr>
									<tr>
										<td class="pl-2"><i class="fas fa-hand-holding-usd"></i></td>
										<td class="pl-2 data text-left">Total Amount</td>
										<td class="pl-2 data">--</td>
										<td class="pl-2 pr-2 text-right data">Rs 1200</td>
									</tr>
								</table>
								<button id="rzp-button-student" class="text-white btn mt-3" type="submit"  name="rzpaybtn-student">Pay Now</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>




    <script src="../lib/popperjs-1.16.0/javascript/popper.min.js"></script>
    <script src="../lib/bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <script src="../lib/jquery-ui-all/jquery-ui.min.js"></script>
    </body>
</html>