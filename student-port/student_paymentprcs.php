<?php
session_start();
if (isset($_POST['paypu-btn'])) {
	require '../connection.php';
	$req_id = $_POST['tno-pu'];
	$dob = $_POST['dob-pu'];
	$sql = "SELECT * FROM stu_service_request WHERE req_id = '$req_id' && dob = '$dob'";
	$result = $connection->query($sql);	
	if (mysqli_num_rows($result)>0) {
		echo "DATA Found";
		$row = $result->fetch_assoc();
		if ($row['paid_status'] == 0) {
			$_SESSION['req_id'] = $req_id;
			$_SESSION['name'] = $row['name'];
			$_SESSION['mobile'] = $row['mobile'];
			$_SESSION['address'] = $row['address'];
			$_SESSION['serv_name'] = $row['serv_name'];
			header("Location: ./razorpay/pay.php?checkout=automatic");
		}
		else
		{
			echo "Already Paid";
		}
	}
	else
	{
		echo "Wrong Combination";
	}
}












?>