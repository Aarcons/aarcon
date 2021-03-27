<?php
require 'student-prcs.php';


?>
<!Doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Degree Certificate</title>
        <link rel="stylesheet" type="text/css" href="../css/social-share.css">
        <link rel="stylesheet" type="text/css" href="../css/hover.css">
        <link rel="stylesheet" type="text/css" href="../lib/bootstrap-4.4.1/css/bootstrap.min.css">
        <link rel="icon" type="image/png" href="../images/acs-a3.png">
        <link rel="stylesheet" type="text/css" href="../lib/fontawesome/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="../lib/jquery-ui-all/jquery-ui.min.css">
        <link rel="stylesheet" type="text/css" href="../lib/animate-master/animate.min.css">
        <script src="../lib/jquery-3.4.1/jquery-3.4.1.min.js"></script>
        <script src="../lib/waypoints-master/lib/jquery.waypoints.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/main.min.css">
        <meta name="description" content="<b>At Aarcons</b> we provide <b>degree certificate</b> service for students of MP. We help students of MP to getting degree certificate very fast.">
  <meta property="og:title" content="Degree Certificate - Aarcons" >
  <meta property="og:url" content="https://aarcons.com" >
  <meta property="og:type" content="website" >
  <meta property="og:description" content="<b>At Aarcons</b> we provide <b>degree certificate</b> service for students of MP. We help students of MP to getting degree certificate very fast." >
  <meta property="og:image" content="images/aarcons.png" >
  <meta name="keywords" content="degree certificate, degree, online degree certificate, aarcons, aarcons consultancy, aarambh consultancy services">
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
                        <h3 class="pt-3 text-center"><b>Degree Certificate</b></h3>
                        <form method="post" enctype="multipart/form-data">
                            <h4 class="text-center mt-3 mb-3">Basic Details</h4>
                            <div class="form-group row d-flex justify-content-center pl-3 pr-3 pl-md-0 pr-md-0">
                                <label class="col-md-2 pl-0 pl-md-3" for="fname-deg">First Name *</label>
                                <input type="text" name="fname-deg" id="fname-deg" class=" col-md-3 form-control" required>
                                <label class="col-md-2 pl-0 pl-md-3" for="lname-deg">Last Name *</label>
                                <input type="text" name="lname-deg" id="lname-deg" class="col-md-3 form-control" required>
                            </div>
                            <div class="form-group row d-flex justify-content-center pl-3 pr-3 pl-md-0 pr-md-0">
                                <label class="col-md-2 pl-0 pl-md-3" for="dob-deg">Date of Birth *</label>
                                <input type="text" name="dob-deg" id="dob-deg" class="col-md-3 form-control" pattern="^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d$" required>
                                <label class="col-md-2 pl-0 pl-md-3" for="mob-deg">Mobile No. *</label>
                                <input type="text" name="mob-deg" id="mob-deg" class="col-md-3 form-control" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" required>
                            </div>
                            <div class="form-group row d-flex justify-content-center pl-3 pr-3 pl-md-0 pr-md-0">
                                <label class="col-md-2 pl-0 pl-md-3" for="cat-deg">Category *</label>
                                <select class="col-md-3 form-control" name="cat-deg" required>
                                    <option disabled selected value="">Select Cast</option>
                                    <option value="obc">OBC</option>
                                    <option value="sc">SC</option>
                                    <option value="st">ST</option>
                                    <option value="gen">GEN</option>
                                </select>
                                <label class="col-md-2 pl-0 pl-md-3" for="add-deg">Address *</label>    
                                <input type="text" name="add-deg" id="add-deg" class="col-md-3 form-control" required>
                            </div>
                            <h4 class="text-center mb-3">College Detail</h4>
                            <div class="form-group row d-flex justify-content-center pl-3 pr-3 pl-md-0 pr-md-0">
                                <label class="col-md-2 pl-0 pl-md-3" for="cname-deg">Course Name *</label>
                                <select class="col-md-3 form-control" name="cname-deg" required>
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
                                <label class="col-md-2 pl-0 pl-md-3" for="divison-deg">Division *</label>
                                <input type="text" name="divison-deg" id="divison-deg" class="col-md-3 form-control" required>
                            </div>
                            <div class="form-group row d-flex justify-content-center pl-3 pr-3 pl-md-0 pr-md-0">
                                <label class="col-md-2 pl-0 pl-md-3" for="ename-deg">Exam Name *</label>
                                <input type="text" name="ename-deg" id="ename-deg" class="col-md-3 form-control" required>
                                <label class="col-md-2 pl-0 pl-md-3" for="eyear-deg">Last Exam Year *</label>
                                <select class="col-md-3 form-control" name="eyear-deg" required>
                                    <option disabled selected value="">Select Year</option>
                                    <option value="1970">1970</option>
                                    <option value="1971">1971</option>
                                    <option value="1972">1972</option>
                                    <option value="1973">1973</option>
                                    <option value="1974">1974</option>
                                    <option value="1975">1975</option>
                                    <option value="1976">1976</option>
                                    <option value="1977">1977</option>
                                    <option value="1978">1978</option>
                                    <option value="1979">1979</option>
                                    <option value="1980">1980</option>
                                    <option value="1981">1981</option>
                                    <option value="1982">1982</option>
                                    <option value="1983">1983</option>
                                    <option value="1984">1984</option>
                                    <option value="1985">1985</option>
                                    <option value="1986">1986</option>
                                    <option value="1987">1987</option>
                                    <option value="1988">1988</option>
                                    <option value="1989">1989</option>
                                    <option value="1990">1990</option>
                                    <option value="1991">1991</option>
                                    <option value="1992">1992</option>
                                    <option value="1993">1993</option>
                                    <option value="1994">1994</option>
                                    <option value="1995">1995</option>
                                    <option value="1996">1996</option>
                                    <option value="1997">1997</option>
                                    <option value="1998">1998</option>
                                    <option value="1999">1999</option>
                                    <option value="2000">2000</option>
                                    <option value="2001">2001</option>
                                    <option value="2002">2002</option>
                                    <option value="2003">2003</option>
                                    <option value="2004">2004</option>
                                    <option value="2005">2005</option>
                                    <option value="2006">2006</option>
                                    <option value="2007">2007</option>
                                    <option value="2008">2008</option>
                                    <option value="2009">2009</option>
                                    <option value="2010">2010</option>
                                    <option value="2011">2011</option>
                                    <option value="2012">2012</option>
                                    <option value="2013">2013</option>
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                </select>
                                
                            </div>
                            <div class="form-group row d-flex justify-content-center pl-3 pr-3 pl-md-0 pr-md-0">
                                <label class="col-md-2 pl-0 pl-md-3" for="rno-deg">Roll No. *</label>
                                <input type="text" name="rno-deg" id="rno-deg" class="col-md-3 form-control" required>
                                <label class="col-md-2 pl-0 pl-md-3" for="erno-deg">Enrollment No. *</label>
                                <input type="text" name="erno-deg" id="erno-deg" class="col-md-3 form-control" required>
                                
                            </div>
                            <div class="form-group row d-flex justify-content-center pl-3 pr-3 pl-md-0 pr-md-0">
                                <label class="col-md-2 pl-0 pl-md-3" for="rp-deg">Regular/ Private *</label>
                                <select class="col-md-3 form-control" name="rp-deg" required>
                                    <option disabled selected value="">Select</option>
                                    <option value="regular">Regular</option>
                                    <option value="private">Private</option>
                                </select>
                                <label class="col-md-2 pl-0 pl-md-3" for="ecenter-deg">Exam Center Name *</label>
                                <select class="col-md-3 form-control" name="ecenter-deg" required>
                                    <option disabled selected value="">Select</option>
                                    <option value="101">Govt. K.P.College, Dewas (101) </option>
                                    <option value="102">Govt. Girls College, Dewas (102) </option>
                                    <option value="103">Govt. College Of Education, Dewas (103) </option>
                                    <option value="104">Govt. College, Khategaon (104) </option>
                                    <option value="105">Govt. College, Hatpipliya (105) </option>
                                    <option value="106">Govt. Arts & Comm. College, Kannod (106) </option>
                                    <option value="107">Govt. College, Bagli (107) </option>
                                    <option value="108">Govt. College, Sonkach (108) </option>
                                    <option value="109">Moulana Azad  College of Prof. Studies, Dewas (109) </option>
                                    <option value="110">Prestige Institute of Management, Dewas (110) </option>
                                    <option value="111">Abdul Hamid Unani Chikitsa College, Dewas (111) </option>
                                    <option value="112">B.C.G. Education College, Dewas (112) </option>
                                    <option value="113">Guru Vashita College of Education, Dewas (113) </option>
                                    <option value="114">New Era College of Education, Dewas (114) </option>
                                    <option value="115">Guru Vashita College, Dewas (115) </option>
                                    <option value="116">Om Shanti Vigyan College, Bagli (116) </option>
                                    <option value="117">Saraswati Gyanpeeth Edu. College, Dewas (117) </option>
                                    <option value="118">Tribhawans College, Dewas (118) </option>
                                    <option value="119">Vidhya Sagar Institute of Professional Studies, Khategaon (119) </option>
                                    <option value="120">New Tech Institute of Management & Technology, Dewas (120) </option>
                                    <option value="121">Synargy Institute of Technology, Dewas (121) </option>
                                    <option value="122">Ma Jinwani College of Legal  Studies, Pushpgiri Sonkach (122) </option>
                                    <option value="123">Maya Devi Institute of Education, Dewas (123) </option>
                                    <option value="124">Sant Singaji Institute of Science & Management Sandalpur, Dewas (124) </option>
                                    <option value="126">Soham Institute of Management, Dewas (126) </option>
                                    <option value="127">Govt. College Tokkhurd, Dewas (127) </option>
                                    <option value="128">Pushpdeep girls college, Nayapura, Khategaon, Dewas (128) </option>
                                    <option value="129">Govt College Satvas,Dewas (129) </option>
                                    <option value="130">Govt. Navin Vigyan College, Dewas (130) </option>
                                    <option value="131">Imperial College of fundamental Studies, Vijayganj Mandi, Dewas (131) </option>
                                    <option value="132">Shri Dadaji Shaikshanik Evam Samajik Samiti College,Satvas,Dewas (132) </option>
                                    <option value="133">Gyanodaya  Institute of Professional Studies, Dewas (133) </option>
                                    <option value="134">Guru Drona College of Education, Tokhurd,Dewas (134) </option>
                                    <option value="135">K. R. Academy,Rajoda (135) </option>
                                    <option value="136">Govt. Law College, Dewas (136) </option>
                                    <option value="137">Govt. College, Pipalrawan (137) </option>
                                    <option value="138">Shri Uma Girls College,hatpipliya (138) </option>
                                    <option value="201">Rajiv Gandhi PG Govt. College, Mandsaur (201) </option>
                                    <option value="202">Govt. Girls College, Mandsaur (202) </option>
                                    <option value="203">Govt. S.N.Udia College,GAROTH (203) </option>
                                    <option value="204">Pandit Atal Bihari Vajpayee Govt. College, Pipliyamandi (204) </option>
                                    <option value="205">Shri J.N.Law College, Mandsaur (205) </option>
                                    <option value="206">Jain College of Education, Mandsaur (206) </option>
                                    <option value="207">H.C. College, Bhanpura (207) </option>
                                    <option value="208">Jain Arts , Commerce & Science College, Mandsaur (208) </option>
                                    <option value="209">Savita Devi Jaiswal College, Samgarh (209) </option>
                                    <option value="210">Mandsaur Institute of Science & Technology, Mandsaur (210) </option>
                                    <option value="211">Late R.M.S.College of Education, Bhanpura (211) </option>
                                    <option value="212">Dr. Rawatmal Dhanroupmalji Sojatia College of Education, Bhanpura (212) </option>
                                    <option value="213">Saraswati Education College, Mandsaur (213) </option>
                                    <option value="214">Mandsaur Institute of Technology, Mandsaur (214) </option>
                                    <option value="215">Bhagvan Mahavir Education College Daloda, Mandsaur (215) </option>
                                    <option value="216">Gyan Veehar College, Bhesoda Mandi (216) </option>
                                    <option value="217">Safal College, Suswara, Mandsaur (217) </option>
                                    <option value="218">Smt. Dherya Prabha Devi Sojatiya Ayurved College, Neemthur, Bhanpura (218) </option>
                                    <option value="219">Mandsaur Institute of Physical Education, Mandsaur (219) </option>
                                    <option value="220">Royal College of Edu. Bhesodamandi, Mandsaur (220) </option>
                                    <option value="221">Mandsaur Institute of Education, Mandsaur (221) </option>
                                    <option value="222">Ma Sharda College Sagoriya, Shamgarh (222) </option>
                                    <option value="223">Eklavya Prerna College Suvasra, Mandsour (223) </option>
                                    <option value="224">Govt. College Sitamau, Mandsaur (224) </option>
                                    <option value="225">Shri  JEE INSTITUTE OF NURSING SCIENCE ,MANDSAUR (225) </option>
                                    <option value="226">Miracle Paramedical College, Mandsaur (226) </option>
                                    <option value="227">Mandsaur Institute of Ayurved Education & Research, Mandsaur (227) </option>
                                    <option value="228">Govt College, Bhanpura (Mandsaur) (228) </option>
                                    <option value="229">Shri Sainath College of Nursing, Bhensoda Mandi, Mandsaur (229) </option>
                                    <option value="230">Govt. College Malhargarh, Mandsaur (230) </option>
                                    <option value="231">Sanskar Institute Of Professional Studies, Daloda, Mandsaur (231) </option>
                                    <option value="232">Govt. College, Shyamgarh, Mandsaur (232) </option>
                                    <option value="233">Govt. College, Suvasara, Mandsaur (233) </option>
                                    <option value="234">Acharya Rajendra Suri Shiksha Mahavidhyalaya,Guradiya,Mandsaur (234) </option>
                                    <option value="235">Gyan Veehar College  of Education, Bhesoda Mandi,Bhanpura (235) </option>
                                    <option value="236">Shri  JEE College of Education ,Mandsaur (236) </option>
                                    <option value="237">Swmi Vivekanand College of Education,MIT Square (237) </option>
                                    <option value="238">Shree Natnagar Shodh Sansthan, Sitamau,Mandsour (238) </option>
                                    <option value="239">Govt. College Daloda, Mandsaur (239) </option>
                                    <option value="240">Shree Natnagar Shodh Sansthan, Sitamau, Dist- Mandsour (240) </option>
                                    <option value="301">Govt. College, Neemuch (301) </option>
                                    <option value="302">Shri SitaRam Jaju Govt. Girls College, Neemuch (302) </option>
                                    <option value="303">Govt. Mahatma Gandhi College, Jawad (303) </option>
                                    <option value="304">Govt. R.V.College, Manasa (304) </option>
                                    <option value="305">Government College, Rampura (305) </option>
                                    <option value="306">Gyan Mandir College, Neemuch (306) </option>
                                    <option value="307">J.R.Kimti Girls College, Rampura (307) </option>
                                    <option value="308">Balkavi Bairagee Teacher Edu. Research Centre, Neemuch (308) </option>
                                    <option value="311">Balkavi Bairagee College, Kanawati, Neemuch (311) </option>
                                    <option value="312">Shri Krishna College of Education, Javi, Neemuch (312) </option>
                                    <option value="313">Gyanoday Institute of Mangt & Technology, Kanawati, Neemuch (313) </option>
                                    <option value="314">Radha Devi R.M. Institute of Management & Research, Bhatkhedi, Neemuch (314) </option>
                                    <option value="315">Shikhar Teacher Training Inst. Bholyawas, Neemuch (315) </option>
                                    <option value="316">Arawali Mang. & Computer College,Neemuch (316) </option>
                                    <option value="317">Dr. Radha Krishna College, Neemuch (317) </option>
                                    <option value="318">R.B.S.Inst.Of Education, Kacholi, Neemuch (318) </option>
                                    <option value="319">Gyanoday Institute of Nursing Kanavati, Neemuch (319) </option>
                                    <option value="320">Govt. College Singoli, Neemuch (320) </option>
                                    <option value="321">R.B.S.Inst.Of Nursing, Kacholi, Neemuch (321) </option>
                                    <option value="322">SHRI S.R.Tiwari college of Education Nevad Neemuch (322) </option>
                                    <option value="323">Shri S. R. Education College, Newad, Neemuch (323) </option>
                                    <option value="324">Radhadevi Ramchandra Mangal Institute, Bhat Kheda, Neemuch (324) </option>
                                    <option value="325">Aastha College of Education, Neemuch (325) </option>
                                    <option value="326">Gyanodaya Institute of Professional Studies,Neemuch (326) </option>
                                    <option value="327">Madhusudan Mahavidhyalaya,Neemuch (327) </option>
                                    <option value="328">Balkavi Bairagi Teacher Education Research Center ,Neemuch (328) </option>
                                    <option value="329">Govt. College,  Jeeran (329) </option>
                                    <option value="401">Govt. Arts & Science College, Ratlam (401) </option>
                                    <option value="402">Govt. Girls College, Ratlam (402) </option>
                                    <option value="403">Swami Vivekanand Govt. Commerce College, Ratlam (403) </option>
                                    <option value="404">Govt. College, Sailana (404) </option>
                                    <option value="405">Govt. Shaheed Bhagat Singh College, Jaora (405) </option>
                                    <option value="406">Govt. College, Alot (406) </option>
                                    <option value="407">Govt. College, Kalukheda (407) </option>
                                    <option value="408">Dr.K.N.Kataju Law College, Ratlam (408) </option>
                                    <option value="409">District Homeyopathy College, Katju Nagar, Ratlam (409) </option>
                                    <option value="410">Royal Institute of Management & Advanced Studies, Ratlam (410) </option>
                                    <option value="411">Pt. Shiv Shaktilal Sharma Ayurved Medical College, Ratlam (411) </option>
                                    <option value="412">SHREE SAI INSTITUTE OF TECHNOLOGY ,New R.T.O.Office, Jaora Road, Ratlam (412) </option>
                                    <option value="413">Shaheed Narandra Singh  College, Jaora (413) </option>
                                    <option value="414">Shaheed Narandra Singh Education College, Jaora (414) </option>
                                    <option value="415">Shivang College of Physiothereaphy, Ratlam (415) </option>
                                    <option value="417">Shanti NiketanInstitute of Technology, Ratlam (417) </option>
                                    <option value="418">St. STEPHENS College, Ratlam (418) </option>
                                    <option value="419">Dr.M.B.Sharma Nursing College. Ratlam (419) </option>
                                    <option value="420">SHRI GURU HARIKISHAN COLLEGE OF EDUCATION, RATLAM (420) </option>
                                    <option value="421">Shri Yogindra Sagar Institute of Tech & Sc.Dharad, Ratlam (421) </option>
                                    <option value="422">Malwa College of Prof. Studies, Ratlam (422) </option>
                                    <option value="423">Shree Arihant College of Professional Education, Ratlam (423) </option>
                                    <option value="424">Guru harikishan College  of Education, Ratlam (424) </option>
                                    <option value="425">Sardar Patel college of nursing bannakheda Jaora, Ratlam (425) </option>
                                    <option value="427">Maruti College of Professional, Ratlam (427) </option>
                                    <option value="428">Govt. College, Taal, Ratlam (428) </option>
                                    <option value="429">Govt College, Bajna,Ratlam (429) </option>
                                    <option value="430">Govt College, Namli (430) </option>
                                    <option value="431">Govt College, Rawti (431) </option>
                                    <option value="432">Govt. College,  Piploda (432) </option>
                                    <option value="501">B.S.N. Govt College, Shajapur (501) </option>
                                    <option value="502">Govt.Girls College, Shajapur (502) </option>
                                    <option value="503">J.N.S.Govt.College, Shujalpur (503) </option>
                                    <option value="504">Govt.College, Maksi (504) </option>
                                    <option value="505">Govt. College, Susner (505) </option>
                                    <option value="506">Govt. College, Kalapipal (506) </option>
                                    <option value="507">Nehru Govt. College, Agar (507) </option>
                                    <option value="508">Govt. College, Nalkheda (508) </option>
                                    <option value="509">Govt. College, Polaykala (509) </option>
                                    <option value="510">S.L.V.College, Saraswati College, Shujalpur Mandi (510) </option>
                                    <option value="511">Dayanand Saraswati College, Shajapur (511) </option>
                                    <option value="514">Sanskar College of Management & Compu. Tech., Agar (514) </option>
                                    <option value="515">Jagannath Gomthi Ambavatiya College of Edu.Nalkheda, Shajapur (515) </option>
                                    <option value="516">V.R.Science & Commerce College, Kalapipal (516) </option>
                                    <option value="517">Navin Sahaj College, Shajapur (517) </option>
                                    <option value="518">Shanti Niketan College, Akodiya Mandi (518) </option>
                                    <option value="521">Shri Lal Saxena Smriti College Shujalpur (521) </option>
                                    <option value="522">Govt. College Mohan Badodiya, Shujalpur (522) </option>
                                    <option value="523">Prachya Vidhyapeeth, Shajapur (523) </option>
                                    <option value="524">Govt. College, Badod (524) </option>
                                    <option value="525">Govt. College,  Soyatkala (525) </option>
                                    <option value="526">Govt. College,   Gulana (526) </option>
                                    <option value="527">BUDDHISAGAR COLLEGE, AGAR MALWA (527) </option>
                                    <option value="528">Govt. Law College Shajapur (528) </option>
                                    <option value="601">Govt.Girls college,ujjain (601) </option>
                                    <option value="602">Govt.Kalidas Girls College,Ujjain (602) </option>
                                    <option value="603">Govt. Dhanvantri Aurved College, Ujjain (603) </option>
                                    <option value="604">Govt. College of Education, Ujjain (604) </option>
                                    <option value="605">Madhav Science College,Kothi Road,Ujjain (605) </option>
                                    <option value="606">Madhav College,Dewas Gate, Ujjain (606) </option>
                                    <option value="607">Govt.College, Badanagar (607) </option>
                                    <option value="608">Govt. Vikram College, Khachraud (608) </option>
                                    <option value="609">Gov.College, Tarana (609) </option>
                                    <option value="610">Govt. College, Mahidpur (610) </option>
                                    <option value="611">Govt. College,Nagda (611) </option>
                                    <option value="612">Govt. College,Ghatiya (612) </option>
                                    <option value="613">Sandipani Arts & Com. College, Ujjain (613) </option>
                                    <option value="614">Sandipani Law College, Ujjain (614) </option>
                                    <option value="615">Lokmanya Tilak College of Education, Ujjain (615) </option>
                                    <option value="616">Lokmanya Tilak Science & Commerence College, Ujjain (616) </option>
                                    <option value="618">Future Vision College, Ujjain (618) </option>
                                    <option value="619">Moulana Azad Institute of Professional Studies, Ujjain (619) </option>
                                    <option value="620">Bhartiya College, Madhav Nagar Front Of Railway Station, Ujjain (620) </option>
                                    <option value="621">Jai Bharti College,Chand ka kuan Abdalpura, Ujjain (621) </option>
                                    <option value="622">Awantika College City Plaza, Front of Gopal Mandir, Freegunj, Ujjain (622) </option>
                                    <option value="623">Rukmani Ben DeepchandGardi Medical College, Charitable Hospital, Ujjain (623) </option>
                                    <option value="624">Jai Jawan College,Tarana (624) </option>
                                    <option value="625">Advance Science & Commerce College, Ujjain (625) </option>
                                    <option value="626">Mahakal Institute of Management, Ujjain (626) </option>
                                    <option value="628">Nav Samvat Vidhi College, Ujjain (628) </option>
                                    <option value="629">Maharaja College of Ujjain, Ujjain (629) </option>
                                    <option value="631">R.D.Gardi College of Nursing ,Ujjain (631) </option>
                                    <option value="632">Ujjain Institute of Paramedical Science & College Of Phyothrathy,Ujjain (632) </option>
                                    <option value="633">Rashtra Bharti Shiksha Mahavidhyalaya, Ujjain (633) </option>
                                    <option value="634">Prashanti College Of Prof.Studies, Ujjain (634) </option>
                                    <option value="635">Seshshayee College of Prof. Studies, Nagda (635) </option>
                                    <option value="636">Model College, Ujjain (636) </option>
                                    <option value="637">Navyug College, Badnagar (637) </option>
                                    <option value="638">Apline Institute of Tech., Ujjain (638) </option>
                                    <option value="639">Saraswati Edu.College,Ujjain (639) </option>
                                    <option value="640">Maharaja Institute of Management,Ujjain (640) </option>
                                    <option value="643">Prashanti Inst. Of Management,Ujjain (643) </option>
                                    <option value="644">V.S.Institute of Prof.Studies, Ujjain (644) </option>
                                    <option value="645">Helioj College, Ujjain (645) </option>
                                    <option value="646">Vardhman College Of Prof.Studies, Nagda (646) </option>
                                    <option value="647">Career Vision College, Mahidpur (647) </option>
                                    <option value="648">Govt.Nursing College, Ujjain (648) </option>
                                    <option value="649">Govt. Girls college, Nagda (649) </option>
                                    <option value="650">Master Mind Girls College, Tarana, Ujjain (650) </option>
                                    <option value="651">Govt. Law College, Ujjain (651) </option>
                                    <option value="652">Govt. College, Maakdone, Ujjain (652) </option>
                                    <option value="653">Manovikash College of Special Eductaion, Ujjain (653) </option>
                                    <option value="654">Shri Raj Rajendra Jayantsen Suri College of Education , Ujjain (654) </option>
                                    <option value="655">Shri Guru Sandipani Institute of Management (655) </option>
                                    <option value="656">Shri Guru Sandipani Girls Institute of Professional Studies, Ujjain (656) </option>
                                    <option value="657">Jai Narsing COllege of Education,Naagda (657) </option>
                                    <option value="658">AMPPLE COLLEGE OF PROF. STUDIES,UJJAIN (658) </option>
                                    <option value="659">NIRMALA COLLEGE OF EDUCATION (659) </option>
                                    <option value="660">NIRMALA COLLEGE UJJAIN (660) </option>
                                    <option value="662">Shree Kaweri Shodh Sansthan, ujjain  (662) </option>
                                    <option value="663">Madhya Pradesh samajik vigyan Shodh Sansthan, Ujjain (663) </option>
                                    <option value="664">Madhya Pradesh Dalit Sahitya Akademy, Ujjain (664) </option>
                                    <option value="665">Wakankar Shodh Sansthan, ujjain (665) </option>
                                    <option value="666">Sanjos Inst. Of Counseling and Carrier Guidens (666) </option>
                                    <option value="667">Govt. College, Kaytha (667) </option>
                                    <option value="668">Govt. College,  Jharda (668) </option>
                                    <option value="669">Govt. College,   Unhel (669) </option>
                                    <option value="670">Shree Kaweri Shodh Sansthan, ujjain (670) </option>
                                    <option value="671">Wakankar Shodh Sansthan, ujjain (671) </option>
                                    <option value="672">Madhya Pradesh Dalit Sahitya Akademy, Ujjain (672) </option>
                                    <option value="801">School of Studies in English (801) </option>
                                    <option value="802">Institute of Computer Science (802) </option>
                                    <option value="803">School of Studies in Continuing Education (803) </option>
                                    <option value="804">School of Studies in Chemistry & Biochemistry (804) </option>
                                    <option value="805">School of Studies in Library and Information Sciences (805) </option>
                                    <option value="806">School of Studies in Botany (806) </option>
                                    <option value="807">School of Studies in Sanskrit (807) </option>
                                    <option value="808">School of Studies in Jyotirvigyan (808) </option>
                                    <option value="809">School of Studies in Ved (809) </option>
                                    <option value="810">School of Studies in Mathematics (810) </option>
                                    <option value="811">School of Studies in Sociology (811) </option>
                                    <option value="812">School of Studies in Political Sci. & Public Adm. (812) </option>
                                    <option value="813">School of Studies in A. I. H. C. & Archaeology (813) </option>
                                    <option value="814">School of Studies in Economics (814) </option>
                                    <option value="815">School of Studies in Hindi (815) </option>
                                    <option value="816">School of Studies in Earth Sciences (816) </option>
                                    <option value="817">School of Studies in Physics (817) </option>
                                    <option value="818">School of Studies in Statistics (818) </option>
                                    <option value="819">School of Studies in Zoology & Bio-Technology (819) </option>
                                    <option value="820">School of Studies in Philosophy (820) </option>
                                    <option value="821">School of Studies in Microbiology (821) </option>
                                    <option value="822">Department of Foreign Languages (822) </option>
                                    <option value="823">School of Studies in Commerce (823) </option>
                                    <option value="824">Institute of Pharmacy (824) </option>
                                    <option value="825">Scindia Oriental Research Institute (825) </option>
                                    <option value="826">Institute of Pharmacy (826) </option>
                                    <option value="827">School of Studies in Environment Management (827) </option>
                                    <option value="828">Pt. Jawaharlal Nehru Inst. of Business Management (828) </option>
                                    <option value="829">School of Engineering & Technology (829) </option>
                                    <option value="901">Suman Manvikiya Bhavan, Vikram University Campus, Opp. Circuit House, Dewas Road, Ujjain (901) </option>
                                    <option value="902">Vag Devi Bhawan, Vikram University, Opp. Circuit House, Dewas Road, Ujjain (902) </option>
                                    <option value="903">Swami Vivekananda Bhawan, Vikram University, Opp. Circuit House, Dewas Road, Ujjain (903) </option>
                                </select>
                            </div>
                            <h4 class="text-center mb-3">Degree Details</h4>
                            <div class="form-group row d-flex justify-content-center pl-3 pr-3 pl-md-0 pr-md-0">
                                <label class="col-md-3 pl-0 pl-md-3" for="any-deg">Please Select Any One (If Applicable)</label>
                                <div class="input-group col-md-4 pl-0 pr-0">
                                    <div class="input-group-append">
                                        <select name="any-deg" class="form-control col-5">
                                            <option disabled selected value="">Choose</option>
                                            <option value="noc">NOC</option>
                                            <option value="final-mark">Final Year Marksheet</option>
                                            <option value="prev-mark">Previous Exam Marksheet</option>
                                            <option value="hindi-deg">Hindi Degree Scan Copy</option>
                                        </select>
                                        <div class="custom-file col-7 overflow-hidden">
                                            <input type="file" name="any-deg" class="custom-file-input" id="any-deg">
                                            <label class="custom-file-label" for="any-deg">..</label>
                                        </div>
                                    </div>    
                                </div>
                                <label class="col-md-3 pl-0 pl-md-3 text-danger">JPG (Max Size 200 KB)</label>
                            </div>
                            <div class="form-group row d-flex justify-content-center pl-3 pr-3 pl-md-0 pr-md-0">
                                <label class="col-md-3 pl-0 pl-md-3" for="mark-deg">Upload Marksheet *</label>
                                <div class="custom-file col-md-4 overflow-hidden">
                                    <input type="file" name="mark-deg" class="custom-file-input" id="mark-deg" required>
                                    <label class="custom-file-label" for="mark-deg">Choose File</label>
                                </div>
                                <label class="col-md-3 pl-0 pl-md-3 text-danger">PDF (Max Size 200 KB)</label>
                            </div>
                            <div class="btn-div-enq pb-5 pt-3 d-flex justify-content-center">
                                <button type="submit" class="btn sb-btn" name="sb-deg">Submit</button>
                                <button type="reset" class="btn rs-btn ml-3" name="rs-deg">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title w-100 text-center mb-0" id="exampleModalCenterTitle"><?php echo $modaltitle; ?></h5>
                    <button type="button" class="close modal-clbtn" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <h4 class="text-center"><?php echo $msg; ?></h4>
                  </div>
                  <div class="modal-footer d-flex justify-content-center">
                    <a href="<?php echo $location; ?>" class="btn btn-primary" <?php echo $data; ?>>Close</a>
                  </div>
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
            $("#dob-deg").datepicker({ dateFormat: 'dd/mm/yy' });
            });
        </script>
    </body>
</html>
<?php
if ($response == 1) {
    echo "<script> $('#success').modal('show'); </script>";
}
?>