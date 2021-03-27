<?php
if (isset($_POST['updatejob'])) {
	
	$jobid = $_POST['job_id'];
	$position = $_POST['position'];
	$location = $_POST['location'];
	$lastdate = $_POST['lastdate'];
	$salary = $_POST['salary'];
	$skills = $_POST['skills'];
	$exp = $_POST['exp'];
	$qual = $_POST['qual'];
	$role = $_POST['role'];
	$personname = $_POST['personname'];
	$personmobile = $_POST['personmobile'];
	$personemail = $_POST['personemail'];
	$vacantpost = $_POST['vacantpost'];
	$jobdescr = $_POST['jobdescr'];
	$howto = $_POST['howto'];
	$resp = $_POST['resp'];
	$sql = "UPDATE post_job SET position = '$position', location = '$location', salary = '$salary', last_date = '$lastdate', exp ='$exp' , skills ='$skills', qual ='$qual', role ='$role', con_name ='$personname', con_num ='$personmobile', con_email ='$personemail', vacant_post ='$vacantpost', job_desc ='$jobdescr', how_to ='$howto', resp ='$resp', status = 0 WHERE job_id = '$jobid' ";
	$result = $connection->query($sql);
	if ($result == true) {
		echo "<script> $('#successmsg').modal('show'); </script>";
		

	}
	else
	{
		echo $connection->error;
	}
}
if (isset($_POST['deljob'])) {
	$jobid = $_POST['job_id'];
	$sqldel = "DELETE FROM post_job WHERE job_id = '$jobid'";
	$resultdel = $connection->query($sqldel);
	if ($resultdel == true) {
		echo "<script> $('#delmsg').modal('show'); </script>";
		

	}
	else
	{
		echo $connection->error;
	}
}




?>