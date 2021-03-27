<?php
require 'connection.php';
if (!isset($_SESSION)) {
	session_start();
}
// var_dump($_SESSION);

$msg = "";
$alert ="";
$msgedqual = "";
$ermsgeduqual ="";
$skillmsg = "";
$profilemsg = "";
$promsg = "";
$semail = $_SESSION['email'];
$smobile = $_SESSION['mobile'];
$sname = "";
$sdob = "";
$sgender = "";
$smstatus = "";
$saddress = "";
$saddress1 = "";
$saddress2 = "";
$sstate = "";
$sdistrict = "";
$scity = "";
$spin = "";
$sfirstname = "";
$slastname = "";
$smiddlename = "";
$sql1 = "SELECT * FROM can_basic_info WHERE user_id = '$semail'";
$result = $connection->query($sql1);
$row = $result->fetch_assoc();
if (!empty($row['name'])) {
	$sname = $row['name'];
	$sdob = $row['dob'];
	$sgender = $row['gender'];
	$smstatus = $row['marital'];
	$sstate = $row['state'];
	$sdistrict = $row['district'];
	$scity = $row['city'];
	$spin = $row['pin'];
	$snameword = str_word_count($sname);
	$strimname = preg_replace('/^\s+|\s+$|\s+(?=\s)/', '', $sname);
	if (!empty($row['address'])) {
		$saddress = explode("\n", $row['address']);
		$saddress1 = $saddress[0];
		$saddress2 = $saddress[1];
		}	
	if ($snameword == 3) {
		$sfirstname = implode(' ', array_slice(explode(' ', $strimname), 0, 1));
		$slastname = implode(' ', array_slice(explode(' ', $strimname), 2, 1));
		$smiddlename = implode(' ', array_slice(explode(' ', $strimname), 1, 1));
	}
	else
	{
		$sfirstname = implode(' ', array_slice(explode(' ', $strimname), 0, 1));
		$slastname = implode(' ', array_slice(explode(' ', $strimname), 1, 1));
	}
}

	




if (isset($_POST['submit_bi'])) {
	$name = $_POST['FirstName'] . " " . $_POST['MiddleName'] . " " . $_POST['LastName'];
	$dob = $_POST['DOB'];
	$gender = $_POST['gender'];
	$mstatus = $_POST['mstatus'];
	$address = $_POST['add1'] . "\n" . $_POST['add2'];
	$state = $_POST['state'];
	$district = $_POST['district'];
	$city = $_POST['city'];
	$pin = $_POST['pin'];
	$sql = "UPDATE can_basic_info SET name = '$name', dob = '$dob', gender = '$gender', marital = '$mstatus', address = '$address', state = '$state', district = '$district', city = '$city', pin = '$pin' WHERE user_id = '$semail'";
	$results = $connection->query($sql);
	if ($results === true) {
		echo "data inserted";
		header("Location:cand-dashboard.php");

	}
	else
	{
		echo "Error: " . $connection->error;
	}
}

if (empty($row['con_email']) OR empty($row['con_mobile'])) {
	$sqlcon = "UPDATE can_basic_info SET con_email= '$semail',con_mobile= '$smobile' WHERE user_id = '$semail'";
	$resultcon = $connection->query($sqlcon);
}



//send OTP to E-Mail
$keepOpen = "";
$response = "";
if (isset($_POST['sendotp'])) {
	$emailid = $_POST['emailid'];
	$sendername = "Aarambh E-Services";
	$mailsubject = "Please verify your email to get notified by jobs";
	$mailotp = mt_rand(100000, 999999);
	$mailbody = '<head><style type="text/css">
        @media screen and (max-width: 767px){
            .embody{
                width: 96%!important;
            }
        }
        @media screen and (min-width: 768px){
            .embody{
                width: 75%!important;
            }
        }
        @media screen and (min-width: 1050px){
            .embody{
                width: 50%!important;
            }
        }
    </style></head> <body style="width: 50%;" class="embody">
        <img src="https://lh3.googleusercontent.com/5hcXZ6ikwuXg1oxwdNcwuA_OmAKPkBzikDm4To0HJadvhpVTjsLh8oSBsxT2eLYgzprRV9uTdWO81QfwJYbpohoaIKawSNvmaIsBpVqZf0s28GQHL9T9t3cy5Q0HaMdZ5YHoXW9L=w975-h245-no" style="width: 20%; height: 20%;">
        <img src="https://lh3.googleusercontent.com/D2PrstOGHpxeK5fn_bnocceu4YCFtkGh63vNqfBPsxSkKtw44U022n-lAtWC4T-bCs3yvFHW2VZ2CZqs_KRHgs_AOa8Gbzc13VNlnseSd4otMBBXV91Vbic79YVj3cZdebIrR6jb=s512-no" style="height: 4%; width: 4%; margin-top: 1%; float: right;">
    
   
        <div style="background-color: #265077; height: 150px; position: relative;">
            <h3 style="color: #fff; font-family: Raleway; position: absolute; top: 50%; transform: translate(0,-50%); font-size: 1.5rem; margin-left: 2%;">Aarambh Job Consultancy Verification Code </h3>
        </div>
    
   
        <div style="background-color: #eee; padding: 20px;">
            <h5 >Dear '.$row['name'].',</h5>
            <p style="text-align: ">We received a request to access your Aarambh Account <a href="#">'.$semail.'</a>  through your email address. Your Aarambh verification code is:</p>
            <h2 style="margin-left: 40%;">'.$mailotp.'</h2>
            <p style="text-align: justify; ">If you did not request this code, it is possible that someone else is trying to access the Aarambh account <a href="#">'.$semail.'</a>. If that is incorrect, <br>please click <a href="#">here</a> to remove your email address from that Aarambh account.</p>
            <h5>Sincerly yours,</h5>
            <h5>The Aarambh Accounts Team</h5>
        </div>
    </body> ' ;
	if ($row['con_email'] == $emailid ) {
		if ($row['email_status'] == "Verified") {
			$msg = "Email Already Verified";
		}
		else
		{
			require_once 'sendEmail.php';
			$sqlver = "UPDATE can_basic_info SET email_status ='Unverified' WHERE user_id = '$semail'";
			$_SESSION['otp'] = $mailotp;
			$resultver = $connection->query($sqlver);	
			if ($status == "success") {
			$keepOpen="<script> $('#VerifyOTP').modal('show'); </script>";
			$alert = "<div class='alert alert-success'>OTP sent to Email</div>";
			}
			else
			{
				$keepOpen=" ";
			}
		}
		
	}
	else
	{
		require_once 'sendEmail.php';
		$sqlotp = "UPDATE can_basic_info SET con_email= '$emailid', email_status ='Unverified' WHERE user_id = '$semail'";
		$resultotp = $connection->query($sqlotp);	
		$_SESSION['otp'] = $mailotp;
		if ($status == "success") {
		$keepOpen="<script> $('#VerifyOTP').modal('show'); </script>";
		$alert = "<div class='alert alert-success'>New Email Updated and OTP Sent</div>";
		}
		else
		{
			$keepOpen=" ";
		}
	}
	
	
}
//check otp and verify email

if (isset($_POST['checkotp'])) {
	$postotp = $_POST['otp'];
	if ($_SESSION['otp'] == $postotp) {
		$sqlchkotp = "UPDATE can_basic_info SET email_status ='Verified' WHERE user_id = '$semail'";
		$resultchkotp = $connection->query($sqlchkotp);	
		$msg = "Email Verified Succesfully";
	}
	else
	{
		
		$keepOpen="<script> $('#VerifyOTP').modal('show'); </script>";
		$alert = "<div class='alert alert-danger'>You Entered Wrong OTP</div>";
	}
}
//send otp to mobile
if (isset($_POST['otpmobile'])) {
	$phone = $_POST['mobileno'];
	$conmobile = $row['con_mobile'];
	$mvstatus = $row['mobile_status'];
	if ($conmobile == $phone) {
		if ($mvstatus == "Verified") {
			$msg = "Already Verified";
		}
		else
		{
			$sqlmo = "UPDATE can_basic_info SET con_mobile='$phone',mobile_status='Unverified' WHERE user_id = '$semail'";
			$connection->query($sqlmo);
			$otp = mt_rand(100000, 999999);
			$_SESSION['motp'] = $otp;
			// $sms=urlencode("Dear Customer, Your OTP for Verification is: " . $otp);
			//$phones= $phone;
			// $url="https:9//smsleads.in/pushsms.php";
			// $ch = curl_init($url);
			// curl_setopt($ch, CURLOPT_HEADER, 0);
			// curl_setopt($ch, CURLOPT_POST, 1);
			// curl_setopt($ch, CURLOPT_POSTFIELDS, "username=aarambhnmh&password=immu123*&sender=ARAMBH&numbers=$phones&message=$sms");
			// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
			//textlocal sms gateway
			$username = "aarambhnmh@gmail.com";
			$hash = "f2df1ed49b275539a2b0585d9ecac1b426e1735e4ecb1c02f98cd26047a0136a";

			// Config variables. Consult http://api.textlocal.in/docs for more info.
			$test = "0";
			//$otp =  mt_rand(100000, 999999);
			// Data for text message. This is the text message data.
			$sender = "ARAMBH"; // This is who the message appears to be from.
			$numbers = $phone; // A single number or a comma-seperated list of numbers
			#Custom1##Custom2#
			$message = $otp . " is your one time password (OTP) for verification. It will be valid for only 5 minutes. Thank you " . $sender;
			// 612 chars or less
			// A single number or a comma-seperated list of numbers
			$message = urlencode($message);
			$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
			$ch = curl_init('http://api.textlocal.in/send/?');
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$resultsms = curl_exec($ch); // This is the result from the API
			curl_close($ch);
			$response = $resultsms;
			$keepOpen="<script> $('#VerifymbOTP').modal('show'); </script>";
			$alert = "<div class='alert alert-success'>New Mobile Updated and OTP Sent</div>";
			
		}
	}
	else
	{
		$sqlmo = "UPDATE can_basic_info SET con_mobile='$phone',mobile_status='Unverified' WHERE user_id = '$semail'";
		$connection->query($sqlmo);
		$otp = mt_rand(100000, 999999);
		$_SESSION['motp'] = $otp;
		// $sms=urlencode("Dear Customer, Your OTP for Verification is: " . $otp);
		// $phones= $phone;
		// $url="https://smsleads.in/pushsms.php";
		// $ch = curl_init($url);
		// curl_setopt($ch, CURLOPT_HEADER, 0);
		// curl_setopt($ch, CURLOPT_POST, 1);
		// curl_setopt($ch, CURLOPT_POSTFIELDS, "username=aarambhnmh&password=immu123*&sender=ARAMBH&numbers=$phones&message=$sms");
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		// $response = curl_exec($ch);
		//textlocal sms gateway
		//textlocal sms gateway
		$username = "aarambhnmh@gmail.com";
		$hash = "f2df1ed49b275539a2b0585d9ecac1b426e1735e4ecb1c02f98cd26047a0136a";

		// Config variables. Consult http://api.textlocal.in/docs for more info.
		$test = "0";
		//$otp =  mt_rand(100000, 999999);
		// Data for text message. This is the text message data.
		$sender = "ARAMBH"; // This is who the message appears to be from.
		$numbers = $phone; // A single number or a comma-seperated list of numbers
		$message = $otp . " is your one time password (OTP) for verification. It will be valid for only 5 minutes. Thank you " . $sender;
		// 612 chars or less
		// A single number or a comma-seperated list of numbers
		$message = urlencode($message);
		$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
		$ch = curl_init('http://api.textlocal.in/send/?');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$resultsms = curl_exec($ch); // This is the result from the API
		curl_close($ch);
		$response = $resultsms;
		$keepOpen="<script> $('#VerifymbOTP').modal('show'); </script>";
		$alert = "<div class='alert alert-success'>New Mobile Updated and OTP Sent</div>";
		
	}
}
//check otp and verify mobile
if (isset($_POST['checkmobileotp'])) {
	$postmotp = $_POST['mobileotp'];
	if ($_SESSION['motp'] == $postmotp) {
		$sqlchkmotp = "UPDATE can_basic_info SET mobile_status ='Verified' WHERE user_id = '$semail'";
		$resultchkmotp = $connection->query($sqlchkmotp);	
		$msg = "Mobile Verified Succesfully";
	}
	else
	{
		
		$keepOpen="<script> $('#VerifyOTP').modal('show'); </script>";
		$alert = "<div class='alert alert-danger'>You Entered Wrong OTP</div>";
	}
}
//fetch data of educational qualification
$sql2 = "SELECT * FROM cand_edu_qual WHERE user_id = '$semail'";
$result2 = $connection->query($sql2);
$row2 = $result2->fetch_assoc();
$hsc_passyear = $row2['hsc_year'];
$hsc_percent = $row2['hsc_per'];
$hsc_sch = $row2['hsc_school'];
// echo $row2['higher_sub'];
$higher_passyear = $row2['higher_year'];
$higher_percent = $row2['higher_per'];
$higher_sch = $row2['higher_school'];
$grad_passyear = $row2['grad_year'];
$grad_percent = $row2['grad_per'];
$grad_univ = $row2['grad_univ'];
$pg_passyear = $row2['pg_year'];
$pg_percent = $row2['pg_per'];
$pg_univ = $row2['pg_univ'];
$other_sub = $row2['other_sub'];
$other_passyear = $row2['other_year'];
$other_percent = $row2['other_per'];
$other_univ = $row2['other_univ'];
//submit educational qualification
if (isset($_POST['eduupdate'])) {
	if (isset($_POST['hsc_passyear'])) {
		if (!empty($_POST['hsc_passyear']) && !empty($_POST['hsc_percent']) && !empty($_POST['hsc_sch'])) {
			
			$hsc_passyear = $_POST['hsc_passyear'];
			$hsc_percent = $_POST['hsc_percent'];
			$hsc_sch = $_POST['hsc_sch'];
			$sqlqual = "UPDATE cand_edu_qual SET hsc_year = '$hsc_passyear', hsc_per = '$hsc_percent', hsc_school = '$hsc_sch' WHERE user_id = '$semail'";
			$resultqual = $connection->query($sqlqual);
				if ($resultqual == true) {
					$msgedqual = "High school Data updated successfully";
				}
				else
				{
					$msgedqual = $connection->error;
				}
			if (isset($_POST['higher_sub'])) {
				if (!empty($_POST['higher_passyear']) && !empty($_POST['higher_percent']) && !empty($_POST['higher_sch'])) {
					$higher_sub = $_POST['higher_sub'];
					$higher_passyear = $_POST['higher_passyear'];
					$higher_percent = $_POST['higher_percent'];
					$higher_sch = $_POST['higher_sch'];	
					$sqlqual = "UPDATE cand_edu_qual SET higher_sub = '$higher_sub', higher_year = '$higher_passyear', higher_per = '$higher_percent', higher_school = '$higher_sch' WHERE user_id = '$semail'";
					$resultqual = $connection->query($sqlqual);
					if ($resultqual == true) {
						$msgedqual = "High School and Higher Secondary Data updated successfully";
					}
					else
					{
						$msgedqual = $connection->error;
					}
					if (isset($_POST['grad_sub'])) {
						if (!empty($_POST['grad_passyear']) && !empty($_POST['grad_percent']) && !empty($_POST['grad_univ'])) {
						$grad_sub = $_POST['grad_sub'];
						$grad_passyear = $_POST['grad_passyear'];
						$grad_percent = $_POST['grad_percent'];
						$grad_univ = $_POST['grad_univ'];
						$sqlqual = "UPDATE cand_edu_qual SET grad_sub = '$grad_sub', grad_year = '$grad_passyear', grad_per = '$grad_percent',grad_univ = '$grad_univ' WHERE user_id = '$semail'";
						$resultqual = $connection->query($sqlqual);
							if ($resultqual == true) {
								$msgedqual = "updated successfully";
							}
							else
							{
								$msgedqual = $connection->error;
							}
							if (isset($_POST['pg_sub'])) {
								if (!empty($_POST['pg_passyear']) && !empty($_POST['pg_percent']) && !empty($_POST['pg_univ'])) {
									$pg_sub = $_POST['pg_sub'];
									$pg_passyear = $_POST['pg_passyear'];
									$pg_percent = $_POST['pg_percent'];
									$pg_univ = $_POST['pg_univ'];
									$sqlqual = "UPDATE cand_edu_qual SET pg_sub = '$pg_sub', pg_year = '$pg_passyear', pg_per = '$pg_percent', pg_univ = '$pg_univ' WHERE user_id = '$semail'";
									$resultqual = $connection->query($sqlqual);
									if ($resultqual == true) {
										$msgedqual = "updated successfully";
									}
									else
									{
										$msgedqual = $connection->error;
									}

								}
								else
								{
									$ermsgeduqual = "PG Data Not Entered";
								}
							}
							else
							{
								$ermsgeduqual = "Post Graduation Data left blank so not submitted";
							}
						}
						else
						{
							$ermsgeduqual = "Graduation Data Not Entered";
							
						}
					}
					else
					{
						$ermsgeduqual = "Graduation Data Left Blank so not updated";			
					}
				}
				else
				{
					$ermsgeduqual = "Higher Data Not Entered";
				}
			}
			else
			{
				$ermsgeduqual = "Higher Data Left Blank so not updated";
			}
			if (!empty($_POST['other_sub'])) {
				if (!empty($_POST['other_passyear']) && !empty($_POST['other_percent']) && !empty($_POST['other_univ'])) {
					$other_sub = $_POST['other_sub'];
					$other_passyear = $_POST['other_passyear'];
					$other_percent = $_POST['other_percent'];
					$other_univ = $_POST['other_univ'];
					$sqlqual = "UPDATE cand_edu_qual SET other_sub = '$other_sub', other_year = '$other_passyear', other_per = '$other_percent', other_univ = '$other_univ' WHERE user_id = '$semail'";
					$resultqual = $connection->query($sqlqual);
					if ($resultqual == true) {
						$msgedqual = "All with Other Qualification Data updated successfully";
					}
					else
					{
						$msgedqual = $connection->error;
					}
				}
				else
				{
					$ermsgeduqual = "Other Data Not Entered";
				}
			}
		}
		else
		{
			$ermsgeduqual =  "Matric Data Not Entered";
		}
	}
	else
	{
		$ermsgeduqual =  "Matric Data Cannot be left blank";
	}
}

//keyskill updation
$sqlskill = "SELECT * FROM cand_skills WHERE user_id = '$semail'";
$resultskill = $connection->query($sqlskill);
$rowsk = $resultskill->fetch_assoc();
$upskills = $rowsk['skills'];
$upsummary = $row['profile_sum'];
if (isset($_POST['keyskills'])) {
	$skills = $_POST['search'];
	$sql = "UPDATE cand_skills SET skills = '$skills' WHERE user_id = '$semail'";
	$result = $connection->query($sql);
	if ($result == true) {
		$skillmsg = "Skills updated successfully";
	}
	else
	{
		$skillmsg = "Error: " . $connection->error();
	}
}

//profile summary

if (isset($_POST['profile'])) {
	$summary = $_POST['summary'];
	$sql = "UPDATE can_basic_info SET profile_sum = '$summary' WHERE user_id = '$semail'";
	$result = $connection->query($sql);
	if ($result == true) {
		$profilemsg = "Profile summary updated successfully";
	}
	else
	{
		$profilemsg = "Error: " . $connection->error();
	}	
}	

//desired candidate profile
if (isset($_POST['desired'])) {
	$industry = $_POST['industry'];
	$salary = $_POST['salary'];
	$location = $_POST['location'];
	$sql = "UPDATE des_profile SET industry = '$industry', salary = '$salary', location = '$location' WHERE user_id = '$semail'";
	$result = $connection->query($sql);
	if ($result == true) {
		$promsg = "Profile summary updated successfully";
	}
	else
	{
		$promsg = "Error: " . $connection->error();
	}	
}

//delete cand other quali


if (isset($_GET['delete'])) {
	$delid = $_GET['delete'];
	$sqldel = "DELETE FROM oqal_can WHERE MD5(id) = '$delid'";
	$connection->query($sqldel); 
	header("Location: cand-dashboard.php");
	
}
if (isset($_GET['d1'])) {
	$did = $_GET['d1'];
	$sqldi = "DELETE FROM can_exp WHERE MD5(id) = '$did'";
	$connection->query($sqldi); 
	header("Location: cand-dashboard.php");
	
}

?>
