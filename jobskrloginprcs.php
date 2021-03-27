<?php
if (!isset($_SESSION)) {
	session_start();
}

require 'connection.php';
$status = "";
if (isset($_POST['jobsk_lg'])) {
	$username = $_POST['jobseeker-email'];
	$password = $_POST['jobseeker-password'];
	$sql = "SELECT * FROM jobskrreg WHERE email='$username' AND password='$password'";
	$result=$connection->query($sql);
	$row=$result->fetch_assoc();
	if ($row['email'] == $username AND $row['password'] == $password) {
		$_SESSION['name'] = $row['name'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['mobile'] = $row['mobile'];
		$_SESSION['cand'] = $row['email'];
		if ($row['status'] == "Paid") {
			$name = $_SESSION['name'];
			$email = $_SESSION['email'];
			$mobile = $_SESSION['mobile'];
			$_SESSION['paid'] = $row['status'];
			$sql1 = "SELECT * FROM can_basic_info WHERE user_id = '$email'";
			$result1 = $connection->query($sql1);
			$row1 = $result1->fetch_assoc();
			if (empty($row1['user_id'])) {
				$sql2 = "INSERT INTO can_basic_info (user_id, name) VALUES ('$email', '$name')";
				$connection->query($sql2);
			}
			$sql3 = "SELECT * FROM cand_edu_qual WHERE user_id = '$email'";
			$result3 = $connection->query($sql3);
			$row3 = $result3->fetch_assoc();
			if (empty($row3['user_id'])) {
				$sql4 = "INSERT INTO cand_edu_qual (user_id) VALUES ('$email')";
				$connection->query($sql4);
			}
			$sql5 = "SELECT * FROM cand_skills WHERE user_id = '$email'";
			$result4 = $connection->query($sql5);
			$row4 = $result4->fetch_assoc();
			if (empty($row4['user_id'])) {
				$sql6 = "INSERT INTO cand_skills (user_id) VALUES ('$email')";
				$connection->query($sql6);
			}
			$sql7 = "SELECT * FROM des_profile WHERE user_id = '$email'";
			$result5 = $connection->query($sql7);
			$row5 = $result5->fetch_assoc();
			echo $connection->error;
			if (empty($row5['user_id'])) {
				$sql8 = "INSERT INTO des_profile (user_id) VALUES ('$email')";
				$connection->query($sql8);	
			}
			header("Location: cand-dashboard.php");
			
			
		}
		else
		{
			header("Location: ./razorpay/pay.php?checkout=manual") ;
		}

	}
	else
	{
		$status = "Login Failed";
	}
}

?>