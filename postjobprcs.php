<?php
$comp_id = $_SESSION['comp'];  
require 'connection.php';  
if (isset($_POST['pjbtn'])) {
		
	$position = $_POST['pospj'];
	$location = $_POST['locpj'];
	$salary = $_POST['salpj'];
	$last_date = $_POST['ldpj'];
	$exp = $_POST['exp'];
	$skills = $_POST['skpj'];
	$qual = $_POST['qual'];
	$role = $_POST['jbrpj'];
	$con_name = $_POST['cpname'];
	$con_num = $_POST['cpnum'];
	$con_email = $_POST['cpemail'];
	$vacant = $_POST['vacant'];
	$job_desc = $_POST['job_desc'];
	$how_to = $_POST['how_to'];
	$resp = $_POST['respo'];


	$sql = "INSERT INTO post_job(comp_id, position, location, salary, last_date, exp, skills, qual, role, con_name, con_num, con_email, vacant_post, job_desc, how_to, resp) VALUES ('$comp_id', '$position', '$location', '$salary', '$last_date', '$exp', '$skills', '$qual', '$role', '$con_name', '$con_num', '$con_email', '$vacant', '$job_desc', '$how_to', '$resp')";
	$result = $connection->query($sql);
	if ($result === true) {
		echo "Data Entered";
	}
	else
	{
		echo "Error: " . $connection->error;
	}


	

}

?>