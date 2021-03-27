<?php
//session_start();
//$semail = $_SESSION['email'];
include 'array_chk.php';

	
	//$selectsql  = "SELECT * FROM  alert_status WHERE user_id = '$semail'";
	//$resultsel = $connection->query($selectsql);
	// if (mysqli_num_rows($resultsel)==0) {
	// 	foreach ($jqid as $key => $value) {
	// 		$job_id = $value;
	// 		$sql = "INSERT INTO alert_status(user_id, job_id) VALUES ('$semail', '$job_id')";
	// 		$result  = $connection->query($sql);
	// 	}
	// }
	// elseif (mysqli_num_rows($resultsel)>0) {
	// 	while ($rowsel = $resultsel->fetch_assoc()) {
	// 		echo  "</br>" . $rowsel['job_id'];

	// 		foreach ($jqid as $key => $value) {
	// 		$job_id = $value;
	// 		if ($job_id != $rowsel['job_id']) {
	// 		echo $sql = "INSERT INTO alert_status(user_id, job_id) VALUES ('$semail', '$job_id')";
	// 		// 	$result  = $connection->query($sql);
	// 			echo "Matched";
	// 		 }	
	// 	}
	// }
	// }
	// $countjqid = count($jqid);
	
	// $job_id = NULL;
	// for ($i=0; $i < $countjqid ; $i++) { 
	// 	$jlocid = $jqid[$i];
	// 	$selectsql  = "SELECT * FROM  alert_status WHERE user_id = '$semail' && job_id = '$jlocid'";
	// 	$resultsel = $connection->query($selectsql);
	// 	while ($rowsel = $resultsel->fetch_assoc()) {
	// 	//echo "</br>";
	// 	$job_id[] = $rowsel['job_id'];
		// 	if ($job_id == $jlocid) {
		// 		echo "</br>";
				
		// 		echo "Matched" . $job_id . "  ";
		// 		//break;
		// 	}

		// 	else{
		// 	echo "</br>";
		// 	echo $job_id;
		// 	echo "Matched";
		// 	//break;
		// 	}
	// 	}
	// }
	// print_r($job_id);
	// echo "</br>";
	// print_r($jqid);
	// if ($job_id != NULL) {
	// 	//print_r(array_unique($job_id));
	// 	print_r($newjqid = array_diff($jqid, $job_id));
	// 	echo $countnewjqid = count($newjqid);
	// 	foreach ($newjqid as $key => $newjqid1) {
	// 		if ($newjqid1 != NULL) {
				
	// 		$sql = "INSERT INTO alert_status(user_id, job_id) VALUES ('$semail', '$newjqid1')";
	// 		$result  = $connection->query($sql);
	// 		}
	// 	}
		// for ($i=0; $i <$countnewjqid ; $i++) { 
		// 	$newjqid1 = $newjqid[$i];
		// 	print_r($newjqid1);
		// 	if ($newjqid1 != NULL) {
				
		// 	$sql = "INSERT INTO alert_status(user_id, job_id) VALUES ('$semail', '$newjqid1')";
		// 	$result  = $connection->query($sql);
		// 	}
		// }
	// }
	// else
	// {
	// 	foreach ($jqid as $key => $newjqid1) {
	// 		if ($newjqid1 != NULL) {
				
	// 		$sql = "INSERT INTO alert_status(user_id, job_id) VALUES ('$semail', '$newjqid1')";
	// 		$result  = $connection->query($sql);
	// 		}
	// 	}
	// }


	foreach ($jqid as $key => $value) {
		$sql = "INSERT IGNORE INTO alert_status(user_id, job_id) VALUES ('$semail', '$value')";
		$result  = $connection->query($sql);
	}



?>