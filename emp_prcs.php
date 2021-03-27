<?php
$compid = $_SESSION['comp'];  
require 'connection.php';
$sqlcom = "SELECT * FROM comp_profile WHERE comp_id= '$compid'";
$resultcom = $connection->query($sqlcom);
$rowcom = $resultcom->fetch_assoc();
$comname = $rowcom['name'];
$comemail = $rowcom['email'];
$commd = $rowcom['md_name'];
$commdemail = $rowcom['md_email'];
$comweb = $rowcom['website'];
$comindustry = $rowcom['industry'];
$comdesc = $rowcom['descr'];
$repname = $rowcom['rep_name'];
$repmob = $rowcom['rep_mob'];
$comaddress = $rowcom['address'];
$compcity = $rowcom['city'];
$compdis = $rowcom['district'];
$compstate = $rowcom['state'];
$comppin = $rowcom['pin'];

if (mysqli_num_rows($resultcom)==0) {
	$sqlcomid = "INSERT INTO comp_profile(comp_id) VALUES ('$compid')";
	$resultcomid = $connection->query($sqlcomid);
}

if (isset($_POST['comp-basic'])) {
	$name = $_POST['comp-name'];
	$email = $_POST['off-email-emp'];
	$mdname = $_POST['md-name'];
	$mdemail = $_POST['md-email-emp'];
	$website = $_POST['website-emp'];
	$industry = $_POST['industry'];
	$desc = $_POST['comp-desc'];

	
	$sqlemp = "UPDATE comp_profile SET name= '$name', email= '$email', md_name= '$mdname', md_email= '$mdemail', website= '$website', industry= '$industry', descr= '$desc' WHERE comp_id= '$compid'";
	$resultemp = $connection->query($sqlemp);
	if ($resultemp == true) {
		echo "data updated";
		header("Location: emp-dashboard.php");
	}
	else
	{
		echo $connection->error;
	}
	
}

if (isset($_POST['con-info-btn'])) {
	$repname = $_POST['rep-name-emp'];
	$repmob = $_POST['rep-mob-emp'];
	$address = $_POST['addemp'] . " " . $_POST['land-emp'] ;
	$city = $_POST['city-emp'];
	$district = $_POST['dist-emp'];
	$industry = $_POST['state'];
	$pin = $_POST['pincode-emp'];

	
	$sqlcomp = "UPDATE comp_profile SET rep_name= '$repname', rep_mob ='$repmob', address ='$address', city ='$city', district ='$district', state ='$industry', pin ='$pin' WHERE comp_id= '$compid'";
	$resultcomp = $connection->query($sqlcomp);
	if ($resultcomp === true) {
		echo "data updated";
		header("Location: emp-dashboard.php");
	}
	else
	{
		echo $connection->error;
	}
	var_dump($_POST);
}
// var_dump($_POST);
?>