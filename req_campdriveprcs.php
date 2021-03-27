<?php
$ins_id = $_SESSION['inst'];
$response = 0;
$data = "";
require 'connection.php';
// $sqlsel = "SELECT * FROM campus_req WHERE ins_id = '$ins_id'";
// $resultsel = $connection->query($sqlsel);
// $sqlsel1 = "SELECT * FROM camp_req_class_detail WHERE ins_id = '$ins_id'";
// $resultsel1 = $connection->query($sqlsel1);
// if (mysqli_num_rows($resultsel) == 0) {
// 	$sqlins = "INSERT INTO campus_req (ins_id) VALUES ('$ins_id')";
// 	$resultins = $connection->query($sqlins);
// }
if (isset($_POST['request'])) {
	$ten_dt = $_POST['ten_date'];
	$total_stu = $_POST['total_stu'];
	$sqlins2 = "INSERT INTO campus_req (ins_id, ten_dt, total_stu) VALUES ('$ins_id', '$ten_dt', '$total_stu')";
	$resultins2 = $connection->query($sqlins2);
	$req_id = $connection->insert_id;
	$namecount = count($_POST['name']);
	for ($i=0; $i < $namecount ; $i++) { 
		$name = $_POST['name'][$i];
		$year = $_POST['year'][$i];
		$nos = $_POST['nos'][$i];
		$sqlins3 = "INSERT INTO camp_req_class_detail (req_id, ins_id, course, sem, num_stu) VALUES ('$req_id', '$ins_id', '$name', '$year', '$nos')";
		$resultins3 = $connection->query($sqlins3);
	}
	if ($_FILES['csv_file']['name'] != "") {
		$allowed_ext = array('xls', 'XLS', 'xlsx', 'XLSX');
		$file = $_FILES['csv_file']['name'];
		$temppath = $_FILES['csv_file']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
		if (in_array($filetype, $allowed_ext)) {
			
			if (filesize($temppath) < 2000000) {
				$uploadpath = "docs/" . $ins_id ."-" . $req_id . "-" . time() . "." . $filetype;
				move_uploaded_file($temppath, $uploadpath);
				$status="Ok";
				
			}
			else
			{
				$status = "!size";
			}
		}
		else
		{
				$status ="!type";

		}
	}
	$response = 1;
	if ($resultins2 == true && $resultins3 == true && $status == "Ok") {
		$modaltitle = "Success";
		$msg = "Request Created Successfully Your Request Id is: " . $req_id;
		$location = "inst-view-req.php";
		
	}
	else if ($status == "!size") {
		$modaltitle = "Something went wrong!!";
		$msg = "File must be less than 2MB";
		$location = "#";
		$data = "data-dismiss = 'modal'";
	}
	else if ($status == "!type") {
		$modaltitle = "Something went wrong!!";
		$msg = "Only xlsx and xls allowed";
		$location = "#";
		$data = "data-dismiss = 'modal'";
	}
	else
	{
		$modaltitle = "Something went wrong!!";
		$msg = $connection->error;
		$location = "#";
		$data = "data-dismiss = 'modal'";
	}

}







?>