<?php
require 'jobskrregprcs.php';
$user = $_SESSION['user'];
if (empty($_SESSION['user'])) {
  header("Location:register.php");
}
else
{
  session_unset();
  session_destroy();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <title>Registration Successful</title>
    <style type="text/css">
      body{
       background-color: #17a2b8;
       background-image: none;
      }
      .alert{
        width: 50%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #000;
        background-color: #f9f4f4;
        border-radius: 26px;
        height: 239px;
      }
      h3{
        text-align: center;
        margin-top: 30px;
      }
      h4{
        text-align: center;
        margin-top: 15px;
      }
      .row{
        transform: translate(-50%,20px);
        margin-left: 50%;
      }
      button {
        padding: 8px;
        width: 10vw;
        border-radius: 31px;
        background-color: #000;
        color: #fff;
        border-color: #000;
        font-size: 1rem;
        margin-right: 20px;
      }
      @media screen and (min-width: 300px){
        .alert{
          height: 429px;
          width: 94%;
        }
      }
      @media screen and (min-width: 300px){
        button{
          width: 39vw;
          margin-top: 5px;
          margin-left: 10px;
        }
      }
      @media screen and (min-width: 350px){
        .alert{
          width: 94%;
          height: 405px;
        }
      }
      @media screen and (min-width: 768px){
        .alert{
          height: 308px;
        }
      }
      @media screen and (min-width: 1020px){
        .alert{
          height: 298px;
          width: 50%;
        }
      }
      @media screen and (min-width: 1020px){
        button{
          width: 10vw;
          margin-left: 0;
          margin-top: 0;
        }
      }
      @media screen and (min-width: 1050px){
        .alert{
          height: 239px;
        }
      }
    </style>
  </head>
  <body>
    <div class="alert alert-success">
    	<h3>Congratulations you have been registered successfully. Your username is <?php echo $user; ?></h3>
      <h4>Please click the below button to login to your account.</h4>
      <div class="row">
        <button onclick="window.location.href = 'job-portal-login.php'">Login</button>
        <button onclick="window.location.href = 'job-portal-home.html'">Job Home</button>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>