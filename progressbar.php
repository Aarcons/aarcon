<?php
if (empty($_SESSION)) {
	session_start();
}
$profile_per = 0;
$semail = $_SESSION['email'];
require 'connection.php';
$sqlper = "SELECT * FROM can_basic_info WHERE user_id = '$semail'";
$resultper = $connection->query($sqlper);
$rowper = $resultper->fetch_assoc();
$name = $rowper['name'];
$dob = $rowper['dob'];
$gender = $rowper['gender'];
$marital = $rowper['marital'];
$address = $rowper['address'];
$state = $rowper['state'];
$district = $rowper['district'];
$city = $rowper['city'];
$email_status = $rowper['email_status'];
$mobile_status = $rowper['mobile_status'];
if ($name !="" && $dob && $gender && $marital && $address && $state && $district && $city) {
	$profile_per = $profile_per+20;
}
if ($email_status == "Verified") {
	$profile_per = $profile_per+10;
}
if ($mobile_status == "Verified") {
	$profile_per = $profile_per+10;
}
$sqlper1 = "SELECT * FROM cand_edu_qual WHERE user_id = '$semail'";
$resultper1 = $connection->query($sqlper1);
$rowper1 = $resultper1->fetch_assoc();
$hsc_year = $rowper1['hsc_year'];
$hsc_per = $rowper1['hsc_per'];
$hsc_school = $rowper1['hsc_school'];
if ($hsc_year !="" && $hsc_per !="" && $hsc_school !="") {
	$profile_per = $profile_per+20;	
}
$sqlper2 = "SELECT * FROM oqal_can WHERE user_id = '$semail'";
$resultper2 = $connection->query($sqlper2);
$rowper2 = $resultper2->fetch_assoc();
$quali = $rowper2['quali'];
$year = $rowper2['year'];
$percentage = $rowper2['percentage'];
if ($quali !="" && $year !="" && $percentage !="") {
	$profile_per = $profile_per+5;	
}
$sqlper3 = "SELECT * FROM cand_skills WHERE user_id = '$semail'";
$resultper3 = $connection->query($sqlper3);
$rowper3 = $resultper3->fetch_assoc();
$skills = $rowper3['skills'];
if ($skills !="") {
	$profile_per = $profile_per+10;		
}
$sqlper4 = "SELECT * FROM can_exp WHERE user_id = '$semail'";
$resultper4 = $connection->query($sqlper4);
$rowper4 = $resultper4->fetch_assoc();
$exp = $rowper4['exp'];
$pos = $rowper4['pos'];
$comp = $rowper4['comp'];
if ($exp != "" && $pos != "" && $comp != "") {
	$profile_per = $profile_per+10;	
}
$profile_sum = $row['profile_sum'];
if ($profile_sum !="") {
	$profile_per = $profile_per+5;		
}
$sqlper5 = "SELECT * FROM des_profile WHERE user_id = '$semail'";
$resultper5 = $connection->query($sqlper5);
$rowper5 = $resultper5->fetch_assoc();
$industry = $rowper5['industry'];
$salary = $rowper5['salary'];
$location = $rowper5['location'];
if ($industry !="" && $salary !="" && $location !="") {
	$profile_per = $profile_per+10;
}

?>