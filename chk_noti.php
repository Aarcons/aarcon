<?php
require 'connection.php';
// session_start();
// $semail = $_SESSION['email'];  
//check job alerts and insert matching job ids to alerts table
$sqljb = "SELECT * FROM job_alerts WHERE user_id = '$semail'";
$resultjb = $connection->query($sqljb);
while ($rowjb = $resultjb->fetch_assoc()) {
	$tagstring = $rowjb['location'];
	$tags = explode(",", $tagstring);
	
	$tagcount = count($tags);
	foreach ($tags as $key => $tag) {
		$tagt = trim($tag);
		$sqlpjb = "SELECT * FROM post_job INNER JOIN job_alerts ON post_job.salary >= job_alerts.salary && post_job.location LIKE '%$tagt%' && post_job.exp <= job_alerts.exp && post_job.qual = job_alerts.quali && job_alerts.active_stat=1 && job_alerts.user_id = '$semail'";
		$resultpjb = $connection->query($sqlpjb);

		while ($rowpjb = $resultpjb->fetch_assoc()) {
			$job_id  = $rowpjb['job_id'];
			$sqlal = "INSERT IGNORE INTO alert_status(user_id, job_id) VALUES ('$semail', '$job_id')";
			$resultal  = $connection->query($sqlal);
		}
	}
}




?>