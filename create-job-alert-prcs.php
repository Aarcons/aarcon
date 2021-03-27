<?php
if (!isset($_SESSION)) {
	session_start();
}

require 'connection.php';
$semail = $_SESSION['email'];
if (isset($_POST['create_alert'])) {
	
	//
	//var_dump($_POST);
	$industry = $_POST['industry'];
	$qualification = $_POST['qual'];
	$salary = $_POST['expcsal'];
	$location = $_POST['loc'];
	$experience = $_POST['exp'];
	
	$sql = "INSERT INTO job_alerts(user_id, industry, quali, salary, location, exp, active_stat) VALUES ('$semail', '$industry', '$qualification', '$salary', '$location', '$experience', 1)";
	$result = $connection->query($sql);	
	if ($result == 0) {
		$a = $connection->error;
		if (strstr($a, 'Duplicate')) {
			$msger = "Duplicate entry";
			

		}
		
	}
	else{
		$msger = "Data Entered";

	}
		
	

}







?>