<?php 
session_start();
require 'connection.php';
if (isset($_POST['jobsk_reg'])) {
	$name = $_POST['name-jobseeker'];
	$email = $_POST['email-jobseeker'];
	$mobile = $_POST['phone-jobseeker'];
	$password = $_POST['confirmpassword-jobseeker'];
	$status = "Unpaid";
	$sql = "INSERT INTO jobskrreg (name, email, mobile, password, status) VALUES ('$name', '$email', '$mobile', '$password', '$status')";
	$result = $connection->query($sql);
	
	if ($result == true) {
		$_SESSION['user'] = $email;	
		header("Location:register-welcome-jobsk.php");

	}
	else
	{
		echo '<script type="text/javascript">alert("'.$connection->error.'");</script>';
		
	}
}







?>