<?php
require 'jobskrregprcs.php';
//require 'emp_reg_prcs.php';
?>
<!Doctype html>
<html lang="en" style="height: 100%;">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="lib/bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="lib/fontawesome/css/all.min.css">
    <link rel="icon" type="image/png" href="images/acs-a3.png">
    <link rel="stylesheet" type="text/css" href="lib/animate-master/animate.min.css">
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
    <title>Job Portal Registration</title>
    <style type="text/css">
      .form-container{
        /*background-color: #fff;*/
        background-image: url(./images/white-texture12.png);
        background-repeat: no-repeat;
        background-size: cover;
        position: absolute;
        top:50%;
        right: 0%;
        /*border-radius: 10% 0 0 10%;*/
        transform: translate(0, -50%);
        border-top-left-radius: 10% 50%;
        border-bottom-left-radius: 10% 50%;
        
        min-height: 76%;
        width: 70%;
      }
      .image-container{
        /*background-color: #000;*/
        background-image: url(./images/register-home1100.png);
        position: absolute;
        top: 50%;
        left: 0%;
        transform: translate(0,-50%);
        /*height: 826px;*/
        /*width: 100%;*/
        background-position: -29px 0px;
        background-size: cover;
        /*border-top-right-radius: 10% 50%;
        border-bottom-right-radius: 10% 50%;*/
        /*border-radius: 0 20% 20% 0;*/
      }
      /*#jobseeker_tab a:focus .image-container{
        background-position: -271px 0px;
      }
      #employer_tab a:focus .image-container{
        background-position: -357px 0px;
      }*/
      .overlay-reg-home{
        /*position: absolute;
        height: 100%;
        width: 100%;*/
        /*background-color: #000;
        opacity: 0.5;*/
      }
      @media screen and (max-width: 767px){
        .image-container{
          display: none;
          transform: translate(0);
        }
      }
      @media screen and (min-width: 768px){
        .image-container{
          min-height: 60%!important;
        }
      }
      @media screen and (min-width: 1020px){
        .image-container{
          min-height: 45%!important;
        }
      }
      @media screen and (min-width: 1050px){
        .image-container{
          min-height: 67%!important;
        }
      }
      @media screen and (max-width: 767px){
        .form-container{
          min-height: 100%;
          width: 109%;
          padding-top: 10px;
          margin-left: 0;
          height: 100%;
          border-radius: 0;
          position: unset;
          top: 0;
          right: 0;
          transform: translate(0);
        }
      }
      @media screen and (min-width: 1020px){
        .form-container{
          min-height: 53%;
        }
      }
      @media screen and (min-width: 1050px){
        .form-container{
          min-height: 76%;
        }
      }
      @media screen and (max-width: 767px){
        #registration .form-group label{
          font-size: 0.85rem;
        }
      }
      @media screen and (max-width: 767px){
        #jobseeker li{
          font-size: 0.85rem;
        }
        #employer li{
          font-size: 0.85rem;
        }
        #placement-associate li{
          font-size: 0.85rem;
        }
        #registration .nav-tabs .nav-link.active{
          font-size: 0.8rem;
        }
        #registration .nav-tabs .nav-link{
          font-size: 0.8rem;
          padding: 6px;
        }
        .col-content{
          margin-top: 0!important;
        }
        .reg_head{
          margin-bottom: 10px!important;
          margin-top: 3rem!important;
          font-size: 1rem;
          font-weight: bold;
        }
        #registration .form-inline .form-group{
          margin-bottom: 5px;
        }
        #background-div{
          padding-left: 0;
        }
        #registration{
          margin-left: 0!important;
          margin-top: 0!important;
        }
        .form-container .form-inline .form-control{
          width: 82vw;
        }
        .form-container .form-inline .custom-select{
          width: 82vw;
        }
        .col-content-ben{
          padding-bottom: 20px;
          padding-left: 0;
        }
        .reg_subhead{
          margin-bottom: 0px!important;
          margin-top: 3rem!important;
          font-size: 1rem;
          font-weight: bold;
        }
        #jobseeker .jobseeker-desc{
          position: unset;
          margin-top: 25px;
          border:none;
        }
        #jobseeker ul{
          margin-left: 0;
        }
        #employer .employer-desc{
          position: unset;
          margin-top: 25px;
          border:none;
        }
        #employer ul{
          margin-left: 0;
        }
        #placement-associate .placement-associate-desc{
          position: unset;
          margin-top: 25px;
          border:none;
        }
        #placement-associate ul{
          margin-left: 0;
        }
        .form-inline button{
          margin-top: 10px;
        }
        #background-div{
          background:none!important;
        }
      }
      @media screen and (min-width: 300px){
        #registration .nav-tabs{
          width: 88%;
          margin-left: 10px;
        }
        #registration .form-inline button{
          margin-left: 35%;
        }
      }
      @media screen and (min-width: 350px){
        #registration .nav-tabs{
          margin-left: 32px;
        }
      }
      @media screen and (min-width: 410px){
        #registration .nav-tabs{
          margin-left: 52px;
        }
      }
      @media screen and (min-width: 768px){
        .reg_head{
          margin-top: 0!important;
        }
        .form-container .form-inline .form-control{
          width: 30vw;
        }
        .form-container .form-inline .custom-select{
          width: 30vw;
        }
        .reg_subhead{
          margin-top: -7px!important;
          margin-bottom: 102px!important;
        }
        #jobseeker-desc-id {
          border:none;
        }
      }
      @media screen and (min-width: 1020px){
        .reg_head{
          margin-top: 20px!important;
        }
        .form-container .form-inline .form-control{
          width: 22vw;
        }
        .form-container .form-inline .custom-select{
          width: 22vw;
        }
        .reg_subhead{
          margin-top: 20px!important;
          margin-bottom: 40px!important;
        }
      }
      @media screen and (min-width: 1500px){
        .reg_head{
          margin-top: -22px!important;
        }
        .reg_subhead{
          margin-top: -22px!important;
          margin-bottom: 40px!important;
        }
      }
      @media screen and (min-width: 1600px){
       .reg_head{
          margin-top: 25px!important;
        }
        .reg_subhead{
          margin-top: 25px!important;
          margin-bottom: 40px!important;
        } 
      }
      @media screen and (min-height: 600px){
        .mt-4{
          margin-top: -1.5rem!important;
        }
        #jobseeker h4{
          margin-bottom: 20px!important;
        }
      }
      @media screen and (min-height: 800px){
        .mt-4{
          margin-top: 1.5rem!important;
        }
        #jobseeker h4{
          margin-bottom: 40px!important;
        }
      }
    </style>
  </head>
  <body style="height: 100%;">
    <div class="container-fluid" id="background-div" style="min-height: 100%; background: linear-gradient(73deg, rgb(121, 84, 47) 42%, rgb(19, 97, 168) 97%);">
      <div class="image-container" id="image-container" style="min-height: 67%; width: 37%;">
        <!-- <img src="images/register-girl.jpg" style="height: inherit; width: inherit;"> -->
        <div class="overlay-reg-home">
          
        </div>
      </div>
     <div class="form-container">
        <div style="min-height: 50%;" class="mt-5 ml-3" id="registration">
         <ul class="nav nav-tabs">
           <li class="nav-item">
             <a href="#jobseeker" id="jobseeker_tab" class="nav-link active" data-toggle="tab">Jobseeker</a>
           </li>
           <li class="nav-item">
             <a href="#employer" id="employer_tab" class="nav-link" data-toggle="tab">Employer</a>
           </li>
           <li class="nav-item">
             <a href="#placement-associate" id="associate_tab" class="nav-link" data-toggle="tab">Institute Partner</a>
           </li>
         </ul>
         <div class="tab-content mt-3">
          <div id="jobseeker" class="container tab-pane active">
            <div class="container jobseeker-tab-container">
              <div class="row">
                <div class="col-lg-6 col-content mt-4">
                  <h4 class="reg_head">Register as Jobseeker</h4>
                <form class="form-inline"  method="post">
                    <div class="form-group has-success">
                      <label for="name-jobseeker">Name</label>
                      <input type="text" class="form-control form-control-success" name="name-jobseeker" id="name-jobseeker" required>
                    </div>
                    <div class="form-group">
                      <label for="email-jobseeker">Email Id</label>
                      <input type="email" pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$" class="form-control" name="email-jobseeker" id="email-jobseeker" required>
                    </div>
                    <div class="form-group">
                      <label for="phone-jobseeker">Mobile No.</label>
                      <input type="tel" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" class="form-control" name="phone-jobseeker" id="phone-jobseeker" required>
                    </div>
                    <div class="form-group">
                      <label for="password-jobseeker">Password</label>
                      <div class="input-group" id="show_hide_password">                 
                        <input type="password" pattern="^(?=.*\d).{4,8}$" class="form-control" name="password-jobseeker" id="password-jobseeker" oninvalid="this.setCustomValidity('Password must be 4-8 character long, atleast 1 number required')" oninput="this.setCustomValidity('')" required>
                        <a href="#" class=""><i class="fas fa-eye" aria-hidden="true"></i></a>
                      </div>  
                    </div>
                    <div class="form-group">
                      <label for="confirmpassword-jobseeker">Confirm Password</label>
                      <input type="password" class="form-control" name="confirmpassword-jobseeker" id="confirmpassword-jobseeker" required>
                    </div>
                      <button type="submit" name="jobsk_reg" class="btn btn-primary">Register</button>
                      <a href="job-portal-login.php">Login</a>
                  </form> 
                </div>
                <div class="col-lg-6 col-content col-content-ben mt-4">
                  <h4 class="reg_subhead">Benefits of Jobseekers</h4>
                  <ul class="jobseeker-desc">
                    <li>
                      Search thousands of jobs
                    </li>
                    <li>
                      Get alerts directly to your inbox
                    </li>
                    <li>
                      Get best matched jobs on your email
                    </li>
                    <li>
                      Search Walk-In Jobs
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div id="employer" class="container tab-pane">
            <div class="container employer-tab-container">
              <div class="row">
                <div class="col-lg-6 col-content mt-4">
                  <h4 class="reg_head">Register as an Employer</h4>
                  <form id="emp_reg" class="form-inline" method="post">
                    <div class="form-group has-success">
                      <label for="name-employer">Employer Name</label>
                      <input type="text" class="form-control form-control-success" name="name-employer" id="name-employer" required>
                    </div>
                    <div class="form-group">
                      <label for="email-employer">Official Email Id</label>
                      <input type="email" class="form-control" name="email-employer" id="email-employer" required>
                    </div>
                    <div class="form-group">
                      <label for="phone-employer">Mobile No.</label>
                      <input type="tel" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" class="form-control" name="phone-employer" id="phone-employer" required>
                    </div>
                    <div class="form-group">
                      <label for="password-employer">Password</label>
                      <div class="input-group" id="show_hide_password">                 
                        <input type="password" pattern="^(?=.*\d).{4,8}$" oninvalid="this.setCustomValidity('Password must be 4-8 character long, atleast 1 number required')" class="form-control" name="password-employer" id="password-employer" required>
                        <a href="#" class=""><i class="fas fa-eye" aria-hidden="true"></i></a>
                      </div>  
                    </div>
                    <div class="form-group">
                      <label for="confirmpassword-employer">Confirm Password</label>
                      <input type="password" class="form-control" name="confirmpassword-employer" id="confirmpassword-employer" required>
                    </div>
                    <button type="submit" name="sub_emp_reg" id="sub_emp_reg" class="btn btn-primary">Register</button>
                    <a href="job-portal-login.php">Login</a>
                  </form>
                </div>
                <div class="col-lg-6 col-content col-content-ben mt-4">
                  <h4 class="reg_subhead">Benefits of an Employer</h4>
                  <ul class="employer-desc">
                    <li>
                      Search Candidate Profiles
                    </li>
                    <li>
                      Post Job Requirement from your dashboard
                    </li>
                    <li>
                      See details of candidates who applied for jobs
                    </li>
                    <li>
                      Do seamless candidate management
                    </li>
                  </ul>
                </div>
              </div>
            </div>
             
          </div>
          <div id="placement-associate" class="container tab-pane">
            <div class="container placement-associate-tab-container">
              <div class="row">
                <div class="col-lg-6 col-content mt-4">
                  <h4 class="reg_head">Register as an Institute Partner</h4>
                  <form id="col_reg" class="form-inline" method="post">
                    <div class="form-group has-success">
                      <label for="name-placement-associate">Associate Type
                      </label>
                      <select class="custom-select" name="type_inst" id="type_inst" required>
                        <option value="" disabled selected >
                          Select Associate Type
                        </option>
                        <option value="College">
                          College
                        </option>
                        <option value="School">
                          School
                        </option>
                        <option value="Coaching">
                          Coaching
                        </option>
                        <option value="Other Organization">
                          Other Educational Organization
                        </option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="name-placement-associate">Organization Name</label>
                      <input type="text" class="form-control" name="name-inst" id="name-inst" required>
                    </div>
                    <div class="form-group">
                      <label for="email-placement-associate">Official Email Id</label>
                      <input type="email" class="form-control" name="email-inst" id="email-inst" required>
                    </div>
                    <div class="form-group">
                      <label for="phone-placement-associate">Mobile No.</label>
                      <input type="tel" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" class="form-control" name="phone-inst" id="phone-inst" required>
                    </div>
                    <div class="form-group">
                      <label for="password-placement-associate">Password</label>
                      <div class="input-group" id="show_hide_password">                 
                        <input type="password" pattern="^(?=.*\d).{4,8}$" oninvalid="this.setCustomValidity('Password must be 4-8 character long, atleast 1 number required')" class="form-control" name="password-inst" id="password-inst" required>
                        <a href="#" class=""><i class="fas fa-eye" aria-hidden="true"></i></a>
                      </div>  
                    </div>
                    <div class="form-group">
                      <label for="confirmpassword-placement-associate">Confirm Password</label>
                      <input type="password" class="form-control" name="confirmpassword-inst" id="confirmpassword-inst" required>
                    </div>
                    <button type="submit" id="sub_col_reg" name="sub_col_reg" class="btn btn-primary">Register</button>
                  </form>
                </div>
                <div class="col-lg-6 col-content col-content-ben mt-4">
                  <h4 class="reg_subhead">Benefits of Institute Partner</h4>
                  <ul class="placement-associate-desc">
                    <li>
                      Ability to book seminar sessions
                    </li>
                    <li>
                      Get candidate placed faster
                    </li>
                    <li>
                      Get companies faster at your campus
                    </li>
                    <li>
                      Register candidates for job placement
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            
          </div> 
         </div>
       </div>
     </div> 
    </div>
    <div >
      
    </div>
    
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script type="text/javascript">
      $(document).ready(function() {
      $("#show_hide_password a").on('click', function(event) {
          event.preventDefault();
          if($('#show_hide_password input').attr("type") == "text"){
              $('#show_hide_password input').attr('type', 'password');
              $('#show_hide_password i').addClass( "fa-eye-slash" );
              $('#show_hide_password i').removeClass( "fa-eye" );
          }else if($('#show_hide_password input').attr("type") == "password"){
              $('#show_hide_password input').attr('type', 'text');
              $('#show_hide_password i').removeClass( "fa-eye-slash" );
              $('#show_hide_password i').addClass( "fa-eye" );
          }
          });
      var password = document.getElementById("password-jobseeker")
    , confirm_password = document.getElementById("confirmpassword-jobseeker");

    function validatePassword(){
      if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
      } else {
        confirm_password.setCustomValidity('');
      }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;

    var password1 = document.getElementById("password-employer")
    , confirm_password1 = document.getElementById("confirmpassword-employer");
    function validatePassword1(){
      if(password1.value != confirm_password1.value){
        confirm_password1.setCustomValidity("Passwords Don't Match");
      } else {
        confirm_password1.setCustomValidity('');
      }
    }
    password1.onchange = validatePassword1;
    confirm_password1.onkeyup = validatePassword1;
    
    var password2 = document.getElementById("password-inst")
    , confirm_password2 = document.getElementById("confirmpassword-inst");
    function validatePassword2(){
      if (password2.value != confirm_password2.value){
        confirm_password2.setCustomValidity("Passwords Don't Match");
      } else {
        confirm_password2.setCustomValidity('');
      }
    }
    password2.onchange = validatePassword2;
    confirm_password2.onkeyup = validatePassword2;

    $('#jobseeker_tab').on('click', function() {
        $('#image-container').css('background-image', 'url(./images/register-home1100.png)');
        $('#image-container').css('background-position',  '-29px 0px');
        $('#background-div').css('background', 'linear-gradient(73deg, rgb(121, 84, 47) 42%, rgb(19, 97, 168) 97%)');
        
    })
    $('#employer_tab').on('click', function() {
        $('#image-container').css('background-image', 'url(./images/employer-home7.jpg)');
        $('#background-div').css('background', 'linear-gradient(135deg, rgb(189, 209, 216) 39%, rgb(19, 97, 168) 96%)');
        $('#image-container').css('background-position', '-316px 0px');
    })
     $('#associate_tab').on('click', function() {
        $('#image-container').css('background-image', 'url(./images/placement-associate2.jpg)');
        $('#image-container').css('background-position', '-122px 0px');
        $('#background-div').css('background', 'linear-gradient(225deg, rgb(148, 132, 117) 59%, rgb(19, 97, 168) 96%)');
    })

      // $('#sub_emp_reg').click(function(){
      //   if($("emp_reg")[0].checkValidity()) {
      //   $.ajax({
      //               url:"emp_reg_prcs.php",
      //               method:"POST",
      //               data:$('#emp_reg').serialize(),
      //               success:function(data)
      //               {
      //                   alert(data);
      //                   $('#emp_reg')[0].reset();
      //               }
      //           });
      //   }else console.log("invalid form");
                
      //       });
    jQuery('#emp_reg').on('submit', function (e) {
    if (document.getElementById("emp_reg").checkValidity()) {
        e.preventDefault();
        jQuery.ajax({
            url: 'emp_reg_prcs.php',
            method: 'POST',
            data: jQuery('#emp_reg').serialize(),
            success: function (response) {
                alert(response);
                $('#emp_reg')[0].reset();

            }
        })
    }
    return true;
});

    jQuery('#col_reg').on('submit', function (e) {
    if (document.getElementById("col_reg").checkValidity()) {
        e.preventDefault();
        jQuery.ajax({
            url: 'emp_reg_prcs.php',
            method: 'POST',
            data: jQuery('#col_reg').serialize(),
            success: function (response) {
                alert(response);
                $('#col_reg')[0].reset();

            }
        })
    }
    return true;
});





     });
   </script>
    <script src="lib/popperjs-1.16.0/javascript/popper.min.js"></script>
    <script src="lib/bootstrap-4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>