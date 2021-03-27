<?php 
ob_start();
session_start();
$username = $_SESSION['name'];
$email = $_SESSION['email'];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Unpaid Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="icon" type="image/png" href="images/acs-a3.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
    <link rel="stylesheet" type="text/css" href="css/main.min.css">
    <style type="text/css">
      body{
        background-image: none;
        background-color: #17a2b8;
      }
      .unpaid-bg{
        height: 40%;
        width: 50%;
        position: absolute;
        transform: translate(-50%,-50%);
        top: 50%;
        left: 50%;
        background-color: #fff;
        border-radius: 20px;
        text-align: center;
        padding: 4px;
      }
      .unpaid-bg h4{
        margin-top: 40px;
      }
      .unpaid-bg ol{
        text-align: left;
        transform: translate(-50%,0);
        margin-left: 53%;
        font-size: 0.9rem;
      }
      .unpaid-bg .row{
        transform: translate(-50%, 0);
        margin-left: 55%;
      }
      .unpaid-bg button{
        margin-right: 20px;
        border-radius: 16px;
        background-color: #000;
        color: #fff;
        border: none;
        width: 38vw;
      }
      .unpaid-bg button:hover{
        background-color: #265077;
        color: #fff;
        border: none;
      }
      .unpaid-bg span{
        color: #265077;
        text-transform: capitalize;
        font-weight: bold;
      }
      @media screen and (min-width: 300px){
        .unpaid-bg{
          height: 85%;
          width: 93%;
        }
        .unpaid-bg ol{
          transform: translate(0,0);
          margin-left: 5px;
        }
        .unpaid-bg button{
          margin-top: 10px;
        }
      }
      @media screen and (min-width: 350px){
        .unpaid-bg{
          height: 78%;
        }
        .unpaid-bg ol{
          margin-left: 27px;
        }
      }
      @media screen and (min-width: 400px){
        .unpaid-bg{
          height: 67%;
        }
      }
      @media screen and (min-height: 812px){
        .unpaid-bg{
          height: 60%;
        }
      }
      @media screen and (min-width: 768px){
        .unpaid-bg{
          height: 40%;
        }
        .unpaid-bg ol{
          transform: translate(-50%,0);
          margin-left: 53%;
        }
      }
      @media screen and (min-width: 1020px){
        .unpaid-bg{
          height: 31%;
          width: 66%;
        }
      }
      @media screen and (min-width: 1050px){
        .unpaid-bg{
          height: 40%;
          width: 50%;
        }
        .unpaid-bg button{
          width: 10vw;
        }
        .unpaid-bg .row{
          margin-left: 52%;
        }
      }
      @media screen and (min-width: 1500px){
        .unpaid-bg{
          height: 45%;
        }
      }
    </style>
  </head>
  <body>
    <div class="unpaid-bg">
      <h4>Hi <span><?php echo $username; ?></span> Please complete your registration to become a premium member.</h4>
      <p>And avail the exclusive benefits of a premium member like:</p>
      <ol>
        <li>Search for thousands of Jobs</li>
        <li>Get alerts directly to your inbox</li>
        <li>Get best matched jobs on your email</li>
        <li>Search Walk-In Jobs</li>
      </ol>
      <p>To complete the registration process please pay Rs. 100 by clicking the below <br>Pay Now button.</p>
      <div class="row">
        <form method="post">
        <button type="submit" name="pay-now">Pay Now</button>
        <button type="submit" name="unpaid-logout">Logout</button>
        </form>
      </div>
    </div>
<?php 
  if (isset($_POST['unpaid-logout'])) {
    session_unset();
    session_destroy();
    header("Location: job-portal-home.php");
  }
  elseif (isset($_POST['pay-now'])) 
  {
   header("Location: ./razorpay/pay.php?checkout=manual") ;
  }

?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>