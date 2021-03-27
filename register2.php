<!Doctype html>
<html lang="en" style="height: 100%;">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register</title>
        <link rel="stylesheet" type="text/css" href="lib/bootstrap-4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="lib/fontawesome/css/all.min.css">
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
                background-image: none;
                background-color: #ccd7e8;
            }
        </style>
        </head>
    <body style="height: 100%;">
        <section id="jb-register" class="h-100">
                <div class="container-fluid h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-md-4 p-0 d-none d-md-block" id="img-cont">
                            <img src="images/jobseeker3.png" >
                        </div>
                        <div class="col-md-8 form-col-reg p-4">   
                            <ul class="nav nav-tabs d-flex justify-content-md-start justify-content-center mt-3 ml-md-5">
                                <li class="nav-item">
                                    <a href="#jobseekernew" data-toggle="tab" class="nav-link active" id="jobsk-tab">Jobseeker</a>
                                </li>
                                <li class="nav-item ml-3">
                                    <a href="#employernew" data-toggle="tab" class="nav-link" id="emp-tab">Employer</a>
                                </li>
                                <li class="nav-item ml-md-3 mt-3 mt-md-0">
                                    <a href="#institute-partnew" data-toggle="tab" class="nav-link" id="inst-part-tab">Institute Partner</a>
                                </li>
                            </ul>    
                            <div class="tab-content">
                                <div class="container tab-pane active" id="jobseekernew">
                                    <div class="row">
                                        <div class="col-md-6 pl-0 pl-lg-3 pr-0 pr-lg-3">
                                            <h4 class="text-center mt-4 mb-5">Register as Jobseeker</h4>
                                            <form method="post">
                                                <div class="form-row">
                                                    <label class="col-md-5" for="name-jobseeker">Name</label>
                                                    <input type="text" name="name-jobseeker" class="form-control col-md-7" id="name-jobseeker" required>
                                                </div>
                                                <div class="form-row mt-3">
                                                    <label class="col-md-5" for="email-jobseeker">Email Id</label>
                                                    <input type="email" name="email-jobseeker" class="form-control col-md-7" id="email-jobseeker" required>
                                                </div>
                                                <div class="form-row mt-3">
                                                    <label class="col-md-5" for="phone-jobseeker">Mobile No.</label>
                                                    <input type="tel" name="phone-jobseeker" class="form-control col-md-7" id="phone-jobseeker" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" required>
                                                </div>
                                                <div class="form-row mt-3">
                                                    <label class="col-md-5" for="password-jobseeker">Password</label>
                                                    <div class="input-group col-md-7 p-0">
                                                        <div class="input-group append">
                                                            <input type="password" name="password-jobseeker" placeholder="New Password" class="form-control" id="password-jobseeker" required pattern="^(?=.*\d).{4,8}$" oninvalid="this.setCustomValidity('Password must be 4-8 character long, atleast 1 number required')" oninput="this.setCustomValidity('')">
                                                            <div class="eye">
                                                              <a href="#" class="passeye" onclick="shpassreg()"><i class="fas fa-eye  form-control"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row mt-3">
                                                    <label class="col-md-5" for="confirmpassword-jobseeker">Confirm Password</label>
                                                    <input type="password" name="confirmpassword-jobseeker" class="form-control col-md-7" id="confirmpassword-jobseeker" required>
                                                </div>
                                                <div class="reg-btndiv d-flex justify-content-center mt-4">
                                                    <button type="submit" class="btn regbtn" name="jobsk_reg">Register</button>
                                                    <button type="submit" class="btn lgbtnrg ml-5">Login</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-6 pl-0 pl-md-3 pr-0 pr-lg-3">
                                            <h4 class="text-center mt-5 mt-md-4 mb-md-5">Benefits of Jobseeker</h4>
                                            <ul class="pt-5">
                                                <li>Search thousands of jobs</li>
                                                <li>Get alerts directly to your inbox</li>
                                                <li>Get best matched jobs on your email</li>
                                                <li>Search Walk-In Jobs</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="container tab-pane" id="employernew">
                                    <div class="row">
                                        <div class="col-md-6 pl-0 pl-lg-3 pr-0 pr-lg-3">
                                            <h4 class="text-center mt-4 mb-5">Register as Employer</h4>
                                            <form method="post" id="emp_reg">
                                                <div class="form-row">
                                                    <label class="col-md-5" for="name-employer">Employer Name</label>
                                                    <input type="text" name="name-employer" class="form-control col-md-7" id="name-employer" required>
                                                </div>
                                                <div class="form-row mt-3">
                                                    <label class="col-md-5" for="email-employer">Official Email Id</label>
                                                    <input type="email" name="email-employer" class="form-control col-md-7" id="email-employer" required>
                                                </div>
                                                <div class="form-row mt-3">
                                                    <label class="col-md-5" for="phone-employer">Mobile No.</label>
                                                    <input type="tel" name="phone-employer" class="form-control col-md-7" id="phone-employer" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" required>
                                                </div>
                                                <div class="form-row mt-3">
                                                    <label class="col-md-5" for="password-employer">Password</label>
                                                    <div class="input-group col-md-7 p-0">
                                                        <div class="input-group append">
                                                            <input type="password" name="password-employer" placeholder="New Password" class="form-control" id="password-employer" required pattern="^(?=.*\d).{4,8}$" oninvalid="this.setCustomValidity('Password must be 4-8 character long, atleast 1 number required')" oninput="this.setCustomValidity('')">
                                                            <div class="eye">
                                                              <a href="#" class="passeye" onclick="shpassreg2()"><i class="fas fa-eye  form-control"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row mt-3">
                                                    <label class="col-md-5" for="confirmpassword-employer">Confirm Password</label>
                                                    <input type="password" name="confirmpassword-employer" class="form-control col-md-7" id="confirmpassword-employer" required>
                                                </div>
                                                <div class="reg-btndiv mt-4 d-flex justify-content-center">
                                                    <button type="submit" class="btn regbtn" id="sub_emp_reg" name="sub_emp_reg">Register</button>
                                                    <button type="submit" class="btn lgbtnrg ml-5">Login</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-6 pl-0 pl-md-3 pr-0 pr-lg-3">
                                            <h4 class="text-center mt-5 mt-md-4 mb-md-5">Benefits of Employer</h4>
                                            <ul class="pt-5">
                                                <li>Search Candidate Profiles</li>
                                                <li>Post Job Requirement from your dashboard</li>
                                                <li>See details of candidates who applied for jobs</li>
                                                <li>Do seamless candidate management</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="container tab-pane" id="institute-partnew">
                                    <div class="row">
                                        <div class="col-md-6 pl-0 pl-lg-3 pr-0 pr-lg-3">
                                            <h4 class="text-center mt-4 mb-5">Register as Institute Partner</h4>
                                            <form method="post" id="col_reg">
                                                <div class="form-row">
                                                    <label class="col-md-5" for="name-placement-associate">Associate Type</label>
                                                    <select class="form-control col-md-7" name="type_inst" id="type_inst" required>
                                                        <option disabled selected value="">Select Associate Type</option>
                                                        <option>College</option>
                                                        <option>School</option>
                                                        <option>Coaching</option>
                                                        <option>Other Educational Organization</option>
                                                    </select>
                                                </div>
                                                <div class="form-row mt-3">
                                                    <label class="col-md-5" for="name-placement-associate">Employer Name</label>
                                                    <input type="text" name="name-inst" class="form-control col-md-7" id="name-inst" required>
                                                </div>
                                                <div class="form-row mt-3">
                                                    <label class="col-md-5" for="email-placement-associate">Official Email Id</label>
                                                    <input type="email" name="email-inst" class="form-control col-md-7" id="email-inst" required>
                                                </div>
                                                <div class="form-row mt-3">
                                                    <label class="col-md-5" for="phone-placement-associate">Mobile No.</label>
                                                    <input type="text" name="phone-inst" class="form-control col-md-7" id="phone-inst" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" required>
                                                </div>
                                                <div class="form-row mt-3">
                                                    <label class="col-md-5" for="password-placement-associate">Password</label>
                                                    <div class="input-group col-md-7 p-0">
                                                        <div class="input-group append">
                                                            <input type="password" name="password-inst" placeholder="New Password" class="form-control" id="password-inst" required oninvalid="this.setCustomValidity('Password must be 4-8 character long, atleast 1 number required')" oninput="this.setCustomValidity('')" pattern="^(?=.*\d).{4,8}$">
                                                            <div class="eye">
                                                              <a href="#" class="passeye" onclick="shpassreg3()"><i class="fas fa-eye  form-control"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row mt-3">
                                                    <label class="col-md-5" for="confirmpassword-placement-associate">Confirm Password</label>
                                                    <input type="password" name="confirmpassword-inst" class="form-control col-md-7" id="confirmpassword-inst" required>
                                                </div>
                                                <div class="reg-btndiv mt-4 d-flex justify-content-center">
                                                    <button type="submit" class="btn regbtn" name="sub_col_reg" id="sub_col_reg">Register</button>
                                                    <button type="submit" class="btn lgbtnrg ml-5">Login</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-6 pl-0 pl-md-3 pr-0 pr-lg-3">
                                            <h4 class="text-center mt-5 mt-md-4 mb-md-5">Benefits of Institute Partner</h4>
                                            <ul class="pt-5">
                                                <li>Ability to book seminar sessions</li>
                                                <li>Get candidate placed faster</li>
                                                <li>Get companies faster at your campus</li>
                                                <li>Register candidates for job placement</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
        </section>
        <script src="lib/popperjs-1.16.0/javascript/popper.min.js"></script>
        <script src="lib/bootstrap-4.4.1/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            function shpassreg(){
                var shpassj = document.getElementById("password-jobseeker")
                event.preventDefault();
                if (shpassj.type === "password") {
                    shpassj.type = "text";
                } 
                else {
                    shpassj.type = "password";
                }
            }
            function shpassreg2(){
                var shpasse = document.getElementById("password-employer")
                event.preventDefault();
                if (shpasse.type === "password") {
                    shpasse.type = "text";
                } 
                else {
                    shpasse.type = "password";
                }
            }
            function shpassreg3(){
                var shpassi = document.getElementById("password-inst")
                event.preventDefault();
                if (shpassi.type === "password") {
                    shpassi.type = "text";
                } 
                else {
                    shpassi.type = "password";
                }
            }
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
            $(document).ready(function(){
            $('#jobsk-tab').on('click', function() {
            $('#img-cont').html('<img src="images/jobseeker3.png" style="height: 100%; width: 100%;">');
            })
            $('#emp-tab').on('click', function(){
                $('#img-cont').html('<img src="images/employer8.png" style="height: 100%; width: 100%;">');
            })
            $('#inst-part-tab').on('click', function(){
                $('#img-cont').html('<img src="images/institute-partner.png" style="height: 100%; width: 100%;">');
            })
            });
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
        </script>
    </body>
</html>