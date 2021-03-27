<!Doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Enrollment Form</title>
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
                        <h3 class="text-center pt-3"><b>Enrollment Form</b></h3>
                        <form method="post">
                            <h4 class="text-center mt-3 mb-3">Basic Details</h4>
                            <div class="form-group row d-flex justify-content-center pl-3 pr-3 pl-md-0 pr-md-0">
                                <label class="col-md-2 pl-0 pl-md-3" for="fname-enrollf">First Name *</label>
                                <input type="text" name="fname-enrollf" id="fname-enrollf" class=" col-md-3 form-control" required>
                                <label class="col-md-2 pt-2 pt-md-0 pl-0 pl-md-3" for="lname-enrollf">Last Name *</label>
                                <input type="text" name="lname-enrollf" id="lname-enrollf" class="col-md-3 form-control" required>
                            </div>
                            <div class="form-group row d-flex justify-content-center pl-3 pr-3 pl-md-0 pr-md-0">
                                <label class="col-md-2 pl-0 pl-md-3" for="dob-enrollf">Date of Birth *</label>
                                <input type="text" name="dob-enrollf" id="dob-enrollf" class="col-md-3 form-control" pattern="^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d$" required>
                                <label class="col-md-2 pt-3 pt-md-0 pl-0 pl-md-3" for="mob-enrollf">Mobile No. *</label>
                                <input type="text" name="mob-enrollf" id="mob-enrollf" class="col-md-3 form-control" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" required>
                            </div>
                            <div class="form-group row d-flex justify-content-center pl-3 pr-3 pl-md-0 pr-md-0">
                                <label class="col-md-2 pl-0 pl-md-3" for="cat-enrollf">Category *</label>
                                <select class="col-md-3 form-control" name="cat-enrollf" required>
                                    <option disabled selected value="">Select Cast</option>
                                    <option value="obc">OBC</option>
                                    <option value="sc">SC</option>
                                    <option value="st">ST</option>
                                    <option value="gen">GEN</option>
                                </select>
                                <label class="col-md-2 pt-3 pt-md-0 pl-0 pl-md-3" for="add-enrollf">Address *</label>    
                                <input type="text" name="add-enrollf" id="add-enrollf" class="col-md-3 form-control" required>
                            </div>
                            <h4 class="text-center mb-3">Enrollment Form Details</h4>
                            <div class="form-group row d-flex justify-content-center pl-3 pr-3 pl-md-0 pr-md-0">
                                <label class="col-md-2 pl-0 pl-md-3" for="clgid-enrollf">College Id *</label>
                                <input type="text" name="clgid-enrollf" id="clgid-enrollf" class="form-control col-md-3" required>
                                <label class="col-md-2 pl-0 pl-md-3" for="clgpass-enrollf">College Password *</label>
                                <div class="input-group col-md-3 pl-0 pr-0">
                                    <div class="input-group append" >
                                        <input type="password" name="clgpass-enrollf" class="form-control" id="clgpass-enrollf" required>
                                        <a href="#" onclick="enrolshow()"><i class="form-control enrolleye fas fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row d-flex justify-content-center pl-3 pr-3 pl-md-0 pr-md-0">
                                <label class="col-md-2 pl-0 pl-md-3" for="fathname-enrollf">Father Name *</label>
                                <input type="text" name="fathname-enrollf" class="form-control col-md-3" required id="fathname-enrollf">
                                <label class="col-md-2 pl-0 pl-md-3 pt-3 pt-md-0" for="mothname-enrollf">Mother Name *</label>
                                <input type="text" name="mothname-enrollf" class="form-control col-md-3" required id="mothname-enrollf">
                            </div>
                            <div class="form-group row d-flex justify-content-center pl-3 pr-3 pl-md-0 pr-md-0">
                                <label class="col-md-2 pl-0 pl-md-3" for="12thrno-enrollf">12th Roll No.*</label>
                                <input type="text" name="12thrno-enrollf" class="col-md-3 form-control" id="12thrno-enrollf" required>
                                <label class="col-md-2 pt-3 pt-md-0 pl-0 pl-md-3" for="lboard-enrollf">Last Board Name *</label>
                                <input type="text" name="lboard-enrollf" class="form-control col-md-3" id="lboard-enrollf" required>
                            </div>
                            <div class="form-group row d-flex justify-content-center pl-3 pr-3 pl-md-0 pr-md-0">
                                <label class="col-md-2 pl-0 pl-md-3" for="perc-enrollf">Percentage *</label>
                                <input type="text" name="perc-enrollf" class="form-control col-md-3" id="perc-enrollf" required>
                                <label class="col-md-2 pt-3 pt-md-0 pl-0 pl-md-3" for="gender-enrollf">Gender *</label>
                                <select class="form-control col-md-3" name="gender-enrollf" required>
                                    <option disabled selected value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="form-group row d-flex justify-content-center pl-3 pr-3 pl-md-0 pr-md-0">
                                <label class="col-md-3 pl-0 pl-md-3" for="admcname-enrollf">Admission Course Name *</label>
                                <select class="col-md-7 form-control" name="admcname-enrollf" required>
                                    <option disabled selected value="">Select Course</option>
                                    <option value="BA">Bachelor of Arts</option>
                                    <option value="BABED">Bachelor of Arts Bachelor of Education</option>
                                    <option value="BAH">BA(Honours)</option>
                                    <option value="BAHU">BA(Honours)-U</option>
                                    <option value="BALLB">BALLB</option>
                                    <option value="BAMS">B.A.M.S</option>
                                    <option value="BBA">BBA</option>
                                    <option value="BBAH">BBA(Honours)</option>
                                    <option value="BBAHU">BBA(Honours)-U</option>
                                    <option value="BBAU">BBA-U</option>
                                    <option value="BCA">B.C.A</option>
                                    <option value="BCAU">B.C.A-U</option>
                                    <option value="BCOM">Bachelor of Commerce</option>
                                    <option value="BCOMH">B.Com.(Honours)</option>
                                    <option value="BCOMHU">B.Com.(Honours)-U</option>
                                    <option value="BE">BE</option>
                                    <option value="BED">Bachelor of Education</option>
                                    <option value="BEDMED">BEDMED</option>
                                    <option value="BEU">BE-U</option>
                                    <option value="BHMS">B.H.M.S.</option>
                                    <option value="BHSC">Bachelor in Home Science</option>
                                    <option value="BLSC">B.Lib Sc</option>
                                    <option value="BLSCU">B.Lib Sc-U</option>
                                    <option value="BMLT">BMLT</option>
                                    <option value="BPED">B.P.Ed.</option>
                                    <option value="BPHARM">B.Pharma</option>
                                    <option value="BPHARMU">B.Pharma-U</option>
                                    <option value="BPT">BPT</option>
                                    <option value="BSC">Bachelor in Science</option>
                                    <option value="BSCBED">Bachelor of Science Bachelor of Education</option>
                                    <option value="BSCH">B.Sc.(Honours)</option>
                                    <option value="BSCHU">B.Sc.(Honours)-U</option>
                                    <option value="BSCN">Bachelor in Science.(Nursing)</option>
                                    <option value="BUMS">B.U.M.S</option>
                                    <option value="CPC">Certificate of Proficiency in Chinese</option>
                                    <option value="CPCU">Certificate of Proficiency in Chinese-U</option>
                                    <option value="CPF">Cert. Of  Proficiency In French</option>
                                    <option value="CPFU">Cert. Of  Proficiency In French-U</option>
                                    <option value="CPG">Cert.of  Proficiency In German</option>
                                    <option value="CPGU">Cert.of  Proficiency In German-U</option>
                                    <option value="CPR">Cert. Of Proficiency in Russian</option>
                                    <option value="CPRU">Cert. Of Proficiency in Russian-U</option>
                                    <option value="DAFTM">Dip.Air Fare & Travel Mngt.</option>
                                    <option value="DAFTMU">Dip.Air Fare & Travel Mngt.-U</option>
                                    <option value="DIPKK">Diploma in Karmakanda</option>
                                    <option value="DIPKKU">Diploma in Karmakanda-U</option>
                                    <option value="DIPLOMA">DIPLOMA</option>
                                    <option value="DIPR">Dip.in Russian</option>
                                    <option value="DIPRU">Dip.in Russian-U</option>
                                    <option value="DLIT">D.LIT.</option>
                                    <option value="DLITU">D.LIT.-U</option>
                                    <option value="DMLT">DMLT</option>
                                    <option value="DYED">Diploma In Yoga Education</option>
                                    <option value="LLB">Bachelor in Laws</option>
                                    <option value="LLM">L.L.M.</option>
                                    <option value="MA">Master of Arts</option>
                                    <option value="MAU">Master of Arts-U</option>
                                    <option value="MBA">MBA</option>
                                    <option value="MBAU">MBA-U</option>
                                    <option value="MBBS">M.B.B.S.</option>
                                    <option value="MCA">MCA</option>
                                    <option value="MCAU">MCA-U</option>
                                    <option value="MCOM">Master of Commerce</option>
                                    <option value="MCOMU">Master of Commerce-U</option>
                                    <option value="MD">M.D.</option>
                                    <option value="MED">M.Ed.</option>
                                    <option value="MHSC">M.H.Sc.</option>
                                    <option value="MLSC">M.Lib. & Info.Sc.</option>
                                    <option value="MLSCU">M.Lib. & Info.Sc.-U</option>
                                    <option value="MLT">Med.Lab.Tech</option>
                                    <option value="MPHIL">M. Phil</option>
                                    <option value="MPHILU">M. Phil-U</option>
                                    <option value="MPT">MPT</option>
                                    <option value="MS">MS</option>
                                    <option value="MSC">Master of Science</option>
                                    <option value="MSCU">Master of Science-U</option>
                                    <option value="MSW">M.S.W</option>
                                    <option value="MSWU">M.S.W-U</option>
                                    <option value="PGDCBA">PGDCBA</option>
                                    <option value="PGDCSA">PGDCSA</option>
                                    <option value="PGDFDM">P.G.D.F.D.M.</option>
                                    <option value="PGDGWM">PG Dip-Ground Water Management</option>
                                    <option value="PGDGWMU">PG Dip-Ground Water Management-U</option>
                                    <option value="PGDHM">P.G.Diploma In Heritage Mngt.</option>
                                    <option value="PGDHMU">P.G.Diploma In Heritage Mngt.-U</option>
                                    <option value="PGDLL">PGD in Labour Laws</option>
                                    <option value="PGDMU">P.G.D.in Museology-U</option>
                                    <option value="PGDMUU">P.G.D.in Museology-U</option>
                                    <option value="PGDPQCQAM">PGD in P.Q.C. & Q.A Mngt.</option>
                                    <option value="PGDRSG">PG Dip-Remote Sensing & GIS.</option>
                                    <option value="PGDRSGU">PG Dip-Remote Sensing & GIS.-U</option>
                                    <option value="PGDT">P.G.Dip. In Tourism</option>
                                    <option value="PGDTHM">PGD in Tour & Hotel Mngt.</option>
                                    <option value="PGDTHMU">PGD in Tour & Hotel Mngt.-U</option>
                                    <option value="PGDY">PG Dip in Yoga</option>
                                    <option value="PGDYU">PG Dip in Yoga-U</option>
                                    <option value="PHD">PHD</option>
                                    <option value="PHDU">PHD-U</option>
                                    <option value="PSTBSC">Post Basic BSC Nursing</option>
                                    <option value="SDIPR">Sr. Dip. In Russian</option>
                                    <option value="SDIPRU">Sr. Dip. In Russian-U</option>
                                </select>
                            </div> 
                            <div class="form-group row d-flex justify-content-center pl-3 pr-3 pl-md-0 pr-md-0">
                                <label class="col-md-3 pl-0 pl-md-3" for="12th-enrollf">12th Marksheet *</label>
                                <div class="custom-file col-md-4 overflow-hidden">
                                    <input type="file" name="12th-enrollf" class="custom-file-input" id="12th-enrollf" required>
                                    <label class="custom-file-label" for="12th-enrollf">Choose File</label>
                                </div>
                                <label class="col-md-3 pl-0 pl-md-3 text-danger">PDF (Max Size 200 KB)</label>
                            </div>
                            <div class="form-group row d-flex justify-content-center pl-3 pr-3 pl-md-0 pr-md-0">
                                <label class="col-md-3 pl-0 pl-md-3" for="pphoto-enrollf">Passport Size Photo (2) *</label>
                                <div class="custom-file col-md-4 overflow-hidden">
                                    <input type="file" name="pphoto-enrollf" class="custom-file-input" id="pphoto-enrollf" required>
                                    <label class="custom-file-label" for="pphoto-enrollf">Choose File</label>
                                </div>
                                <label class="col-md-3 pl-0 pl-md-3 text-danger">PDF (Max Size 200 KB)</label>
                            </div>
                            <div class="form-group row d-flex justify-content-center pl-3 pr-3 pl-md-0 pr-md-0">
                                <label class=" pl-0 pl-md-3 text-danger">Note:- This service is available after college end.</label>
                            </div>
                            <div class="btn-div-enq pb-5 pt-3 d-flex justify-content-center">
                                <button type="submit" class="btn sb-btn" name="sb-enrollf">Submit</button>
                                <button type="reset" class="btn rs-btn ml-3" name="rs-enrollf">Reset</button>
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
            $("#dob-enrollf").datepicker({ dateFormat: 'dd/mm/yy' });
            });
            function enrolshow(){
            var clgpassshow = document.getElementById("clgpass-enrollf");
             event.preventDefault();
            if (clgpassshow.type === "password") {
                clgpassshow.type = "text";
            } 
            else {
                clgpassshow.type = "password";
            }
            }
        </script>
    </body>
</html>