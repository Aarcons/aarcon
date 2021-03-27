<?php
//migration prcs

require '../connection.php';
//migration prcs
$response = 0;
if (isset($_POST['migration'])) {
	// var_dump($_POST);
	// array(17) { ["fname-mig"]=> string(5) "imran" ["lname-mig"]=> string(6) "tanwar" ["dob-mig"]=> string(10) "02/04/2020" ["mob-deg"]=> string(10) "7566075707" ["cat-mig"]=> string(2) "sc" ["add-mig"]=> string(19) "noori colony manasa" ["cname-mig"]=> string(5) "SDIPR" ["ename-mig"]=> string(3) "HSC" ["eyear-mig"]=> string(4) "2000" ["rno-mig"]=> string(6) "102010" ["erno-mig"]=> string(6) "102010" ["rp-mig"]=> string(7) "regular" ["eresult-mig"]=> string(4) "fail" ["any-mig"]=> string(0) "" ["mark-mig"]=> string(13) "3C138C70.xlsx" ["tc-mig"]=> string(13) "3C138C70.xlsx" ["migration"]=> string(0) "" }
	// }
	$serv_name = "Migration";
	$name = $_POST['fname-mig']." ". $_POST['lname-mig'];
	$dob = $_POST['dob-mig'];
	$mob = $_POST['mob-deg'];
	$cat = $_POST['cat-mig'];
	$add = $_POST['add-mig'];
	$course = $_POST['cname-mig'];
	$exam = $_POST['ename-mig'];
	$year = $_POST['eyear-mig'];
	$roll = $_POST['rno-mig'];
	$enroll = $_POST['erno-mig'];
	$reg_pri = $_POST['rp-mig'];
	$examres = $_POST['eresult-mig'];
	$centername = $_POST['ecenter-mig'];
	
	$sqlins = "INSERT INTO stu_service_request (serv_name, name, dob, mobile, cat, address) VALUES ('$serv_name', '$name', '$dob', '$mob', '$cat', '$add')";
	$resultins = $connection->query($sqlins);
	$req_id = $connection->insert_id;

	$sqlins2 = "INSERT INTO stu_req_aca (req_id, course, exam, exam_yr, roll, enroll, reg_pri, result, center) VALUES ('$req_id', '$course', '$exam', '$year', '$roll', '$enroll', '$reg_pri', '$examres', '$centername' )";
	$resultins2 = $connection->query($sqlins2);
	// $_POST['cen-nm-mig'] = "";
	$msg = "";
	if ($resultins && $resultins2) {
		$insstatus = 1;
	}
	// echo $connection->error;
	// var_dump($resultins2);
	$file1status = 0;
	$file2status = 0;
	$file3status = 0;
	$anymig = "";
	if (isset($_POST['cen-nm-mig'])) {
		$anymig = $_POST['cen-nm-mig'];
		if ($_FILES['any-mig']['name'] != "") {
		$allowed_ext = array('jpg', 'JPG', 'jpeg', 'JPEG');
		$file = $_FILES['any-mig']['name'];
		$temppath = $_FILES['any-mig']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."opt-doc" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file1 = $uploadpath;
					$file1status = 1;
					// $msg .= $anymig . "Uploaded Successfully" .'</br>';
					
				}
				else
				{
					
					$msg .= $anymig . " Doc Size Must be less than 200 kb" .'</br>';
				}
			}
			else
			{
				
				$msg .= $anymig . " Doc Only JPG,JPEG Allowed" .'</br>';
			}
	}
	}
	if ($_FILES['mark-mig']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['mark-mig']['name'];
		$temppath = $_FILES['mark-mig']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."marksheet" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file2 = $uploadpath;
					$file2status = 1;
					// $msg .=  "Marksheet Uploaded Successfully" .'</br>';
				}
				else
				{
					$msg .=  "Marksheet Size must be less than 200kb" .'</br>';
				}
			}
			else
			{
					$msg .=  "Marksheet File PDF only allowed" .'</br>';

			}
		}
	if ($_FILES['tc-mig']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['tc-mig']['name'];
		$temppath = $_FILES['tc-mig']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."tc" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file3 = $uploadpath;
					$file3status = 1;
					// $msg .=  "TC Uploaded Successfully" .'</br>';
				}
				else
				{
					$msg .=  "TC Size must be less than 200kb" .'</br>';
				}
			}
			else
			{
					$msg .=  "TC File PDF only allowed" .'</br>';
			}
		}
	
	// var_dump($_FILES['tc-mig']);
	$response = 1;
	//echo $file1status, $file2status, $file3status, $insstatus;
	if ($insstatus == 1 && $anymig != "" && $file1status == 1 && $file2status==1 && $file3status == 1) {
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, opt_doc_name, opt_doc_file, last_year_ms, tc) VALUES ('$req_id', '$anymig', '$file1', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if($insstatus == 1 && $anymig == "" && $file1status == 0 && $file2status == 1 && $file3status == 1){
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, last_year_ms, tc) VALUES ('$req_id', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if ($insstatus == 1 && $anymig != "" && $file1status == 0 && $file2status == 1 && $file2status == 1 && $file3status == 1) {
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
		// $msg .=  "Optional File Selected (Please Select the correct file in required size)".'</br>';
	}
	else
	{
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
	}
}
// answer book review
if (isset($_POST['sb-abrev'])) {
	// var_dump($_POST);
	// array(17) { ["fname-mig"]=> string(5) "imran" ["lname-mig"]=> string(6) "tanwar" ["dob-mig"]=> string(10) "02/04/2020" ["mob-deg"]=> string(10) "7566075707" ["cat-mig"]=> string(2) "sc" ["add-mig"]=> string(19) "noori colony manasa" ["cname-mig"]=> string(5) "SDIPR" ["ename-mig"]=> string(3) "HSC" ["eyear-mig"]=> string(4) "2000" ["rno-mig"]=> string(6) "102010" ["erno-mig"]=> string(6) "102010" ["rp-mig"]=> string(7) "regular" ["eresult-mig"]=> string(4) "fail" ["any-mig"]=> string(0) "" ["mark-mig"]=> string(13) "3C138C70.xlsx" ["tc-mig"]=> string(13) "3C138C70.xlsx" ["migration"]=> string(0) "" }
	// }
	$serv_name = "Answer Book Review";
	$name = $_POST['fname-abrev']." ". $_POST['lname-abrev'];
	$dob = $_POST['dob-abrev'];
	$mob = $_POST['mob-abrev'];
	$cat = $_POST['cat-abrev'];
	$add = $_POST['add-abrev'];
	$enroll = $_POST['enrollno-abrev'];
	
	$sqlins = "INSERT INTO stu_service_request (serv_name, name, dob, mobile, cat, address) VALUES ('$serv_name', '$name', '$dob', '$mob', '$cat', '$add')";
	$resultins = $connection->query($sqlins);
	$req_id = $connection->insert_id;

	$sqlins2 = "INSERT INTO stu_req_aca (req_id, enroll) VALUES ('$req_id', '$enroll' )";
	$resultins2 = $connection->query($sqlins2);
	// $_POST['cen-nm-mig'] = "";
	$msg = "";
	if ($resultins && $resultins2) {
		$insstatus = 1;
	}
	// echo $connection->error;
	// var_dump($resultins2);
	
	// var_dump($_FILES['tc-mig']);
	$response = 1;
	//echo $file1status, $file2status, $file3status, $insstatus;
	if ($insstatus == 1 && $anymig != "" && $file1status == 1 && $file2status==1 && $file3status == 1) {
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, opt_doc_name, opt_doc_file, last_year_ms, tc) VALUES ('$req_id', '$anymig', '$file1', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if($insstatus == 1 && $anymig == "" && $file1status == 0 && $file2status == 1 && $file3status == 1){
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, last_year_ms, tc) VALUES ('$req_id', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if ($insstatus == 1 && $anymig != "" && $file1status == 0 && $file2status == 1 && $file2status == 1 && $file3status == 1) {
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
		// $msg .=  "Optional File Selected (Please Select the correct file in required size)".'</br>';
	}
	else
	{
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
	}
}
// degree correction
if (isset($_POST['sb-degcor'])) {
	// var_dump($_POST);
	// array(17) { ["fname-mig"]=> string(5) "imran" ["lname-mig"]=> string(6) "tanwar" ["dob-mig"]=> string(10) "02/04/2020" ["mob-deg"]=> string(10) "7566075707" ["cat-mig"]=> string(2) "sc" ["add-mig"]=> string(19) "noori colony manasa" ["cname-mig"]=> string(5) "SDIPR" ["ename-mig"]=> string(3) "HSC" ["eyear-mig"]=> string(4) "2000" ["rno-mig"]=> string(6) "102010" ["erno-mig"]=> string(6) "102010" ["rp-mig"]=> string(7) "regular" ["eresult-mig"]=> string(4) "fail" ["any-mig"]=> string(0) "" ["mark-mig"]=> string(13) "3C138C70.xlsx" ["tc-mig"]=> string(13) "3C138C70.xlsx" ["migration"]=> string(0) "" }
	// }
	$serv_name = "Degree Correction";
	$name = $_POST['fname-degcor']." ". $_POST['lname-degcor'];
	$dob = $_POST['dob-degcor'];
	$mob = $_POST['mob-degcor'];
	$cat = $_POST['cat-degcor'];
	$add = $_POST['add-degcor'];
	$degmes = $_POST['degmes-degcor'];
	
	$sqlins = "INSERT INTO stu_service_request (serv_name, name, dob, mobile, cat, address) VALUES ('$serv_name', '$name', '$dob', '$mob', '$cat', '$add')";
	$resultins = $connection->query($sqlins);
	$req_id = $connection->insert_id;

	$sqlins2 = "INSERT INTO stu_req_aca (req_id, degmes) VALUES ('$req_id', '$degmes')";
	$resultins2 = $connection->query($sqlins2);
	// $_POST['cen-nm-mig'] = "";
	$msg = "";
	if ($resultins && $resultins2) {
		$insstatus = 1;
	}
	// echo $connection->error;
	// var_dump($resultins2);
	$file1status = 0;
	$file2status = 0;
	$file3status = 0;
	$anymig = "";
	// if (isset($_POST['cen-nm-mig'])) {
	// 	$anymig = $_POST['cen-nm-mig'];
	// 	if ($_FILES['any-mig']['name'] != "") {
	// 	$allowed_ext = array('jpg', 'JPG', 'jpeg', 'JPEG');
	// 	$file = $_FILES['any-mig']['name'];
	// 	$temppath = $_FILES['any-mig']['tmp_name'];
	// 	$filetype = pathinfo($file, PATHINFO_EXTENSION);
	// 		if (in_array($filetype, $allowed_ext)) {
				
	// 			if (filesize($temppath) < 210000) {
	// 				$uploadpath = "docs/" . $serv_name ."opt-doc" . $req_id . "-" . time() . "." . $filetype;
	// 				move_uploaded_file($temppath, $uploadpath);
	// 				$file1 = $uploadpath;
	// 				$file1status = 1;
	// 				// $msg .= $anymig . "Uploaded Successfully" .'</br>';
					
	// 			}
	// 			else
	// 			{
					
	// 				$msg .= $anymig . " Doc Size Must be less than 200 kb" .'</br>';
	// 			}
	// 		}
	// 		else
	// 		{
				
	// 			$msg .= $anymig . " Doc Only JPG,JPEG Allowed" .'</br>';
	// 		}
	// }
	// }
	if ($_FILES['mark-degcor']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['mark-degcor']['name'];
		$temppath = $_FILES['mark-degcor']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."marksheet" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file2 = $uploadpath;
					$file2status = 1;
					// $msg .=  "Marksheet Uploaded Successfully" .'</br>';
				}
				else
				{
					$msg .=  "Marksheet Size must be less than 200kb" .'</br>';
				}
			}
			else
			{
					$msg .=  "Marksheet File PDF only allowed" .'</br>';

			}
		}
	if ($_FILES['cordoc-degcor']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['cordoc-degcor']['name'];
		$temppath = $_FILES['cordoc-degcor']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."tc" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file3 = $uploadpath;
					$file3status = 1;
					// $msg .=  "TC Uploaded Successfully" .'</br>';
				}
				else
				{
					$msg .=  "TC Size must be less than 200kb" .'</br>';
				}
			}
			else
			{
					$msg .=  "TC File PDF only allowed" .'</br>';
			}
		}
	
	// var_dump($_FILES['tc-mig']);
	$response = 1;
	//echo $file1status, $file2status, $file3status, $insstatus;
	if ($insstatus == 1 && $anymig != "" && $file1status == 1 && $file2status==1 && $file3status == 1) {
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, opt_doc_name, opt_doc_file, last_year_ms, tc) VALUES ('$req_id', '$anymig', '$file1', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if($insstatus == 1 && $anymig == "" && $file1status == 0 && $file2status == 1 && $file3status == 1){
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, last_year_ms, tc) VALUES ('$req_id', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if ($insstatus == 1 && $anymig != "" && $file1status == 0 && $file2status == 1 && $file2status == 1 && $file3status == 1) {
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
		// $msg .=  "Optional File Selected (Please Select the correct file in required size)".'</br>';
	}
	else
	{
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
	}
}
// Degree Verification
if (isset($_POST['sb-degver'])) {
	// var_dump($_POST);
	// array(17) { ["fname-mig"]=> string(5) "imran" ["lname-mig"]=> string(6) "tanwar" ["dob-mig"]=> string(10) "02/04/2020" ["mob-deg"]=> string(10) "7566075707" ["cat-mig"]=> string(2) "sc" ["add-mig"]=> string(19) "noori colony manasa" ["cname-mig"]=> string(5) "SDIPR" ["ename-mig"]=> string(3) "HSC" ["eyear-mig"]=> string(4) "2000" ["rno-mig"]=> string(6) "102010" ["erno-mig"]=> string(6) "102010" ["rp-mig"]=> string(7) "regular" ["eresult-mig"]=> string(4) "fail" ["any-mig"]=> string(0) "" ["mark-mig"]=> string(13) "3C138C70.xlsx" ["tc-mig"]=> string(13) "3C138C70.xlsx" ["migration"]=> string(0) "" }
	// }
	$serv_name = "Degree Verification";
	$name = $_POST['fname-degver']." ". $_POST['lname-degver'];
	$dob = $_POST['dob-degver'];
	$mob = $_POST['mob-degver'];
	$cat = $_POST['cat-degver'];
	$add = $_POST['add-degver'];
	
	$sqlins = "INSERT INTO stu_service_request (serv_name, name, dob, mobile, cat, address) VALUES ('$serv_name', '$name', '$dob', '$mob', '$cat', '$add')";
	$resultins = $connection->query($sqlins);
	$req_id = $connection->insert_id;

	// $sqlins2 = "INSERT INTO stu_req_aca (req_id, course, exam, exam_yr, roll, enroll, reg_pri, result, center) VALUES ('$req_id', '$course', '$exam', '$year', '$roll', '$enroll', '$reg_pri', '$examres', '$centername' )";
	$resultins2 = $connection->query($sqlins2);
	// $_POST['cen-nm-mig'] = "";
	$msg = "";
	if ($resultins && $resultins2) {
		$insstatus = 1;
	}
	// echo $connection->error;
	// var_dump($resultins2);
	$file1status = 0;
	$file2status = 0;
	$file3status = 0;
	$anymig = "";
	// if (isset($_POST['cen-nm-mig'])) {
	// 	$anymig = $_POST['cen-nm-mig'];
	// 	if ($_FILES['any-mig']['name'] != "") {
	// 	$allowed_ext = array('jpg', 'JPG', 'jpeg', 'JPEG');
	// 	$file = $_FILES['any-mig']['name'];
	// 	$temppath = $_FILES['any-mig']['tmp_name'];
	// 	$filetype = pathinfo($file, PATHINFO_EXTENSION);
	// 		if (in_array($filetype, $allowed_ext)) {
				
	// 			if (filesize($temppath) < 210000) {
	// 				$uploadpath = "docs/" . $serv_name ."opt-doc" . $req_id . "-" . time() . "." . $filetype;
	// 				move_uploaded_file($temppath, $uploadpath);
	// 				$file1 = $uploadpath;
	// 				$file1status = 1;
	// 				// $msg .= $anymig . "Uploaded Successfully" .'</br>';
					
	// 			}
	// 			else
	// 			{
					
	// 				$msg .= $anymig . " Doc Size Must be less than 200 kb" .'</br>';
	// 			}
	// 		}
	// 		else
	// 		{
				
	// 			$msg .= $anymig . " Doc Only JPG,JPEG Allowed" .'</br>';
	// 		}
	// }
	// }
	if ($_FILES['mark-degver']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['mark-degver']['name'];
		$temppath = $_FILES['mark-degver']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."marksheet" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file2 = $uploadpath;
					$file2status = 1;
					// $msg .=  "Marksheet Uploaded Successfully" .'</br>';
				}
				else
				{
					$msg .=  "Marksheet Size must be less than 200kb" .'</br>';
				}
			}
			else
			{
					$msg .=  "Marksheet File PDF only allowed" .'</br>';

			}
		}
	// if ($_FILES['tc-mig']['name'] != "") {
	// 	$allowed_ext = array('pdf', 'PDF');
	// 	$file = $_FILES['tc-mig']['name'];
	// 	$temppath = $_FILES['tc-mig']['tmp_name'];
	// 	$filetype = pathinfo($file, PATHINFO_EXTENSION);
	// 		if (in_array($filetype, $allowed_ext)) {
				
	// 			if (filesize($temppath) < 210000) {
	// 				$uploadpath = "docs/" . $serv_name ."tc" . $req_id . "-" . time() . "." . $filetype;
	// 				move_uploaded_file($temppath, $uploadpath);
	// 				$file3 = $uploadpath;
	// 				$file3status = 1;
	// 				// $msg .=  "TC Uploaded Successfully" .'</br>';
	// 			}
	// 			else
	// 			{
	// 				$msg .=  "TC Size must be less than 200kb" .'</br>';
	// 			}
	// 		}
	// 		else
	// 		{
	// 				$msg .=  "TC File PDF only allowed" .'</br>';
	// 		}
	// 	}
	
	// var_dump($_FILES['tc-mig']);
	$response = 1;
	//echo $file1status, $file2status, $file3status, $insstatus;
	if ($insstatus == 1 && $anymig != "" && $file1status == 1 && $file2status==1 && $file3status == 1) {
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, opt_doc_name, opt_doc_file, last_year_ms, tc) VALUES ('$req_id', '$anymig', '$file1', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if($insstatus == 1 && $anymig == "" && $file1status == 0 && $file2status == 1 && $file3status == 1){
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, last_year_ms, tc) VALUES ('$req_id', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if ($insstatus == 1 && $anymig != "" && $file1status == 0 && $file2status == 1 && $file2status == 1 && $file3status == 1) {
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
		// $msg .=  "Optional File Selected (Please Select the correct file in required size)".'</br>';
	}
	else
	{
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
	}
}
// Degree
if (isset($_POST['sb-deg'])) {
	// var_dump($_POST);
	// array(17) { ["fname-mig"]=> string(5) "imran" ["lname-mig"]=> string(6) "tanwar" ["dob-mig"]=> string(10) "02/04/2020" ["mob-deg"]=> string(10) "7566075707" ["cat-mig"]=> string(2) "sc" ["add-mig"]=> string(19) "noori colony manasa" ["cname-mig"]=> string(5) "SDIPR" ["ename-mig"]=> string(3) "HSC" ["eyear-mig"]=> string(4) "2000" ["rno-mig"]=> string(6) "102010" ["erno-mig"]=> string(6) "102010" ["rp-mig"]=> string(7) "regular" ["eresult-mig"]=> string(4) "fail" ["any-mig"]=> string(0) "" ["mark-mig"]=> string(13) "3C138C70.xlsx" ["tc-mig"]=> string(13) "3C138C70.xlsx" ["migration"]=> string(0) "" }
	// }
	$serv_name = "Degree";
	$name = $_POST['fname-deg']." ". $_POST['lname-deg'];
	$dob = $_POST['dob-deg'];
	$mob = $_POST['mob-deg'];
	$cat = $_POST['cat-deg'];
	$add = $_POST['add-deg'];
	$course = $_POST['cname-deg'];
	$divison = $_POST['divison-deg']
	$exam = $_POST['ename-deg'];
	$year = $_POST['eyear-deg'];
	$roll = $_POST['rno-deg'];
	$enroll = $_POST['erno-deg'];
	$reg_pri = $_POST['rp-deg'];
	$centername = $_POST['ecenter-deg'];
	
	$sqlins = "INSERT INTO stu_service_request (serv_name, name, dob, mobile, cat, address) VALUES ('$serv_name', '$name', '$dob', '$mob', '$cat', '$add')";
	$resultins = $connection->query($sqlins);
	$req_id = $connection->insert_id;

	$sqlins2 = "INSERT INTO stu_req_aca (req_id, course, division, exam_name, laste_year, roll, enroll, reg_pri, center) VALUES ('$req_id', '$course', '$division', '$exam', '$year', '$roll', '$enroll', '$reg_pri', '$centername' )";
	$resultins2 = $connection->query($sqlins2);
	// $_POST['cen-nm-mig'] = "";
	$msg = "";
	if ($resultins && $resultins2) {
		$insstatus = 1;
	}
	// echo $connection->error;
	// var_dump($resultins2);
	$file1status = 0;
	$file2status = 0;
	$file3status = 0;
	$anymig = "";
	if (isset($_POST['any-deg'])) {
		$anymig = $_POST['any-deg'];
		if ($_FILES['any-deg']['name'] != "") {
		$allowed_ext = array('jpg', 'JPG', 'jpeg', 'JPEG');
		$file = $_FILES['any-deg']['name'];
		$temppath = $_FILES['any-deg']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."opt-doc" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file1 = $uploadpath;
					$file1status = 1;
					// $msg .= $anymig . "Uploaded Successfully" .'</br>';
					
				}
				else
				{
					
					$msg .= $anymig . " Doc Size Must be less than 200 kb" .'</br>';
				}
			}
			else
			{
				
				$msg .= $anymig . " Doc Only JPG,JPEG Allowed" .'</br>';
			}
	}
	}
	if ($_FILES['mark-deg']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['mark-deg']['name'];
		$temppath = $_FILES['mark-deg']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."marksheet" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file2 = $uploadpath;
					$file2status = 1;
					// $msg .=  "Marksheet Uploaded Successfully" .'</br>';
				}
				else
				{
					$msg .=  "Marksheet Size must be less than 200kb" .'</br>';
				}
			}
			else
			{
					$msg .=  "Marksheet File PDF only allowed" .'</br>';

			}
		}
	// if ($_FILES['tc-mig']['name'] != "") {
	// 	$allowed_ext = array('pdf', 'PDF');
	// 	$file = $_FILES['tc-mig']['name'];
	// 	$temppath = $_FILES['tc-mig']['tmp_name'];
	// 	$filetype = pathinfo($file, PATHINFO_EXTENSION);
	// 		if (in_array($filetype, $allowed_ext)) {
				
	// 			if (filesize($temppath) < 210000) {
	// 				$uploadpath = "docs/" . $serv_name ."tc" . $req_id . "-" . time() . "." . $filetype;
	// 				move_uploaded_file($temppath, $uploadpath);
	// 				$file3 = $uploadpath;
	// 				$file3status = 1;
	// 				// $msg .=  "TC Uploaded Successfully" .'</br>';
	// 			}
	// 			else
	// 			{
	// 				$msg .=  "TC Size must be less than 200kb" .'</br>';
	// 			}
	// 		}
	// 		else
	// 		{
	// 				$msg .=  "TC File PDF only allowed" .'</br>';
	// 		}
	// 	}
	
	// var_dump($_FILES['tc-mig']);
	$response = 1;
	//echo $file1status, $file2status, $file3status, $insstatus;
	if ($insstatus == 1 && $anymig != "" && $file1status == 1 && $file2status==1 && $file3status == 1) {
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, opt_doc_name, opt_doc_file, last_year_ms, tc) VALUES ('$req_id', '$anymig', '$file1', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if($insstatus == 1 && $anymig == "" && $file1status == 0 && $file2status == 1 && $file3status == 1){
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, last_year_ms, tc) VALUES ('$req_id', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if ($insstatus == 1 && $anymig != "" && $file1status == 0 && $file2status == 1 && $file2status == 1 && $file3status == 1) {
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
		// $msg .=  "Optional File Selected (Please Select the correct file in required size)".'</br>';
	}
	else
	{
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
	}
}
// Duplicate Marksheet
if (isset($_POST['sb-dmark'])) {
	// var_dump($_POST);
	// array(17) { ["fname-mig"]=> string(5) "imran" ["lname-mig"]=> string(6) "tanwar" ["dob-mig"]=> string(10) "02/04/2020" ["mob-deg"]=> string(10) "7566075707" ["cat-mig"]=> string(2) "sc" ["add-mig"]=> string(19) "noori colony manasa" ["cname-mig"]=> string(5) "SDIPR" ["ename-mig"]=> string(3) "HSC" ["eyear-mig"]=> string(4) "2000" ["rno-mig"]=> string(6) "102010" ["erno-mig"]=> string(6) "102010" ["rp-mig"]=> string(7) "regular" ["eresult-mig"]=> string(4) "fail" ["any-mig"]=> string(0) "" ["mark-mig"]=> string(13) "3C138C70.xlsx" ["tc-mig"]=> string(13) "3C138C70.xlsx" ["migration"]=> string(0) "" }
	// }
	$serv_name = "Duplicate Marksheet";
	$name = $_POST['fname-dmark']." ". $_POST['lname-dmark'];
	$dob = $_POST['dob-dmark'];
	$mob = $_POST['mob-dmark'];
	$cat = $_POST['cat-dmark'];
	$add = $_POST['add-dmark'];
	$course = $_POST['cname-dmark'];
	$exam = $_POST['ename-dmark'];
	$year = $_POST['eyear-dmark'];
	$roll = $_POST['rno-dmark'];
	$enroll = $_POST['erno-dmark'];
	$reg_pri = $_POST['rp-dmark'];
	$centername = $_POST['ecenter-dmark'];
	$dupsem = $_POST['dupsem-dmark'];
	
	$sqlins = "INSERT INTO stu_service_request (serv_name, name, dob, mobile, cat, address) VALUES ('$serv_name', '$name', '$dob', '$mob', '$cat', '$add')";
	$resultins = $connection->query($sqlins);
	$req_id = $connection->insert_id;

	$sqlins2 = "INSERT INTO stu_req_aca (req_id, course, exam, exam_yr, roll, enroll, reg_pri, center, dup_sem) VALUES ('$req_id', '$course', '$exam', '$year', '$roll', '$enroll', '$reg_pri', '$centername', '$dupsem' )";
	$resultins2 = $connection->query($sqlins2);
	// $_POST['cen-nm-mig'] = "";
	$msg = "";
	if ($resultins && $resultins2) {
		$insstatus = 1;
	}
	// echo $connection->error;
	// var_dump($resultins2);
	$file1status = 0;
	$file2status = 0;
	$file3status = 0;
	$anymig = "";
	if (isset($_POST['any-dmark'])) {
		$anymig = $_POST['any-dmark'];
		if ($_FILES['any-dmark']['name'] != "") {
		$allowed_ext = array('jpg', 'JPG', 'jpeg', 'JPEG');
		$file = $_FILES['any-dmark']['name'];
		$temppath = $_FILES['any-dmark']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."opt-doc" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file1 = $uploadpath;
					$file1status = 1;
					// $msg .= $anymig . "Uploaded Successfully" .'</br>';
					
				}
				else
				{
					
					$msg .= $anymig . " Doc Size Must be less than 200 kb" .'</br>';
				}
			}
			else
			{
				
				$msg .= $anymig . " Doc Only JPG,JPEG Allowed" .'</br>';
			}
	}
	}
	if ($_FILES['mark-dmark']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['mark-dmark']['name'];
		$temppath = $_FILES['mark-dmark']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."marksheet" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file2 = $uploadpath;
					$file2status = 1;
					// $msg .=  "Marksheet Uploaded Successfully" .'</br>';
				}
				else
				{
					$msg .=  "Marksheet Size must be less than 200kb" .'</br>';
				}
			}
			else
			{
					$msg .=  "Marksheet File PDF only allowed" .'</br>';

			}
		}
	// if ($_FILES['tc-mig']['name'] != "") {
	// 	$allowed_ext = array('pdf', 'PDF');
	// 	$file = $_FILES['tc-mig']['name'];
	// 	$temppath = $_FILES['tc-mig']['tmp_name'];
	// 	$filetype = pathinfo($file, PATHINFO_EXTENSION);
	// 		if (in_array($filetype, $allowed_ext)) {
				
	// 			if (filesize($temppath) < 210000) {
	// 				$uploadpath = "docs/" . $serv_name ."tc" . $req_id . "-" . time() . "." . $filetype;
	// 				move_uploaded_file($temppath, $uploadpath);
	// 				$file3 = $uploadpath;
	// 				$file3status = 1;
	// 				// $msg .=  "TC Uploaded Successfully" .'</br>';
	// 			}
	// 			else
	// 			{
	// 				$msg .=  "TC Size must be less than 200kb" .'</br>';
	// 			}
	// 		}
	// 		else
	// 		{
	// 				$msg .=  "TC File PDF only allowed" .'</br>';
	// 		}
	// 	}
	
	// var_dump($_FILES['tc-mig']);
	$response = 1;
	//echo $file1status, $file2status, $file3status, $insstatus;
	if ($insstatus == 1 && $anymig != "" && $file1status == 1 && $file2status==1 && $file3status == 1) {
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, opt_doc_name, opt_doc_file, last_year_ms, tc) VALUES ('$req_id', '$anymig', '$file1', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if($insstatus == 1 && $anymig == "" && $file1status == 0 && $file2status == 1 && $file3status == 1){
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, last_year_ms, tc) VALUES ('$req_id', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if ($insstatus == 1 && $anymig != "" && $file1status == 0 && $file2status == 1 && $file2status == 1 && $file3status == 1) {
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
		// $msg .=  "Optional File Selected (Please Select the correct file in required size)".'</br>';
	}
	else
	{
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
	}
}
// Duplicate Migration
if (isset($_POST['sb-dpmig'])) {
	// var_dump($_POST);
	// array(17) { ["fname-mig"]=> string(5) "imran" ["lname-mig"]=> string(6) "tanwar" ["dob-mig"]=> string(10) "02/04/2020" ["mob-deg"]=> string(10) "7566075707" ["cat-mig"]=> string(2) "sc" ["add-mig"]=> string(19) "noori colony manasa" ["cname-mig"]=> string(5) "SDIPR" ["ename-mig"]=> string(3) "HSC" ["eyear-mig"]=> string(4) "2000" ["rno-mig"]=> string(6) "102010" ["erno-mig"]=> string(6) "102010" ["rp-mig"]=> string(7) "regular" ["eresult-mig"]=> string(4) "fail" ["any-mig"]=> string(0) "" ["mark-mig"]=> string(13) "3C138C70.xlsx" ["tc-mig"]=> string(13) "3C138C70.xlsx" ["migration"]=> string(0) "" }
	// }
	$serv_name = "Duplicate Migration";
	$name = $_POST['fname-dpmig']." ". $_POST['lname-dpmig'];
	$dob = $_POST['dob-dpmig'];
	$mob = $_POST['mob-dpmig'];
	$cat = $_POST['cat-dpmig'];
	$add = $_POST['add-dpmig'];
	// $course = $_POST['cname-mig'];
	// $exam = $_POST['ename-mig'];
	// $year = $_POST['eyear-mig'];
	// $roll = $_POST['rno-mig'];
	// $enroll = $_POST['erno-mig'];
	// $reg_pri = $_POST['rp-mig'];
	// $examres = $_POST['eresult-mig'];
	// $centername = $_POST['ecenter-mig'];
	
	$sqlins = "INSERT INTO stu_service_request (serv_name, name, dob, mobile, cat, address) VALUES ('$serv_name', '$name', '$dob', '$mob', '$cat', '$add')";
	$resultins = $connection->query($sqlins);
	$req_id = $connection->insert_id;

	// $sqlins2 = "INSERT INTO stu_req_aca (req_id, course, exam, exam_yr, roll, enroll, reg_pri, result, center) VALUES ('$req_id', '$course', '$exam', '$year', '$roll', '$enroll', '$reg_pri', '$examres', '$centername' )";
	$resultins2 = $connection->query($sqlins2);
	// $_POST['cen-nm-mig'] = "";
	$msg = "";
	if ($resultins && $resultins2) {
		$insstatus = 1;
	}
	// echo $connection->error;
	// var_dump($resultins2);
	$file1status = 0;
	$file2status = 0;
	$file3status = 0;
	$anymig = "";
	// if (isset($_POST['cen-nm-mig'])) {
		// $anymig = $_POST['cen-nm-mig'];
		if ($_FILES['polrep-dpmig']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['polrep-dpmig']['name'];
		$temppath = $_FILES['polrep-dpmig']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."opt-doc" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file1 = $uploadpath;
					$file1status = 1;
					// $msg .= $anymig . "Uploaded Successfully" .'</br>';
					
				}
				else
				{
					
					$msg .= $anymig . " Doc Size Must be less than 200 kb" .'</br>';
				}
			}
			else
			{
				
				$msg .= $anymig . " Doc Only PDF Allowed" .'</br>';
			}
	}
	}
	if ($_FILES['affidavit-dpmig']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['affidavit-dpmig']['name'];
		$temppath = $_FILES['affidavit-dpmig']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."marksheet" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file2 = $uploadpath;
					$file2status = 1;
					// $msg .=  "Marksheet Uploaded Successfully" .'</br>';
				}
				else
				{
					$msg .=  "Marksheet Size must be less than 200kb" .'</br>';
				}
			}
			else
			{
					$msg .=  "Marksheet File PDF only allowed" .'</br>';

			}
		}
	if ($_FILES['mark-dpmig']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['mark-dpmig']['name'];
		$temppath = $_FILES['mark-dpmig']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."tc" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file3 = $uploadpath;
					$file3status = 1;
					// $msg .=  "TC Uploaded Successfully" .'</br>';
				}
				else
				{
					$msg .=  "TC Size must be less than 200kb" .'</br>';
				}
			}
			else
			{
					$msg .=  "TC File PDF only allowed" .'</br>';
			}
		}
	
	// var_dump($_FILES['tc-mig']);
	$response = 1;
	//echo $file1status, $file2status, $file3status, $insstatus;
	if ($insstatus == 1 && $anymig != "" && $file1status == 1 && $file2status==1 && $file3status == 1) {
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, opt_doc_name, opt_doc_file, last_year_ms, tc) VALUES ('$req_id', '$anymig', '$file1', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if($insstatus == 1 && $anymig == "" && $file1status == 0 && $file2status == 1 && $file3status == 1){
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, last_year_ms, tc) VALUES ('$req_id', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if ($insstatus == 1 && $anymig != "" && $file1status == 0 && $file2status == 1 && $file2status == 1 && $file3status == 1) {
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
		// $msg .=  "Optional File Selected (Please Select the correct file in required size)".'</br>';
	}
	else
	{
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
	}
}
// Eligibility Form
if (isset($_POST['sb-elig'])) {
	// var_dump($_POST);
	// array(17) { ["fname-mig"]=> string(5) "imran" ["lname-mig"]=> string(6) "tanwar" ["dob-mig"]=> string(10) "02/04/2020" ["mob-deg"]=> string(10) "7566075707" ["cat-mig"]=> string(2) "sc" ["add-mig"]=> string(19) "noori colony manasa" ["cname-mig"]=> string(5) "SDIPR" ["ename-mig"]=> string(3) "HSC" ["eyear-mig"]=> string(4) "2000" ["rno-mig"]=> string(6) "102010" ["erno-mig"]=> string(6) "102010" ["rp-mig"]=> string(7) "regular" ["eresult-mig"]=> string(4) "fail" ["any-mig"]=> string(0) "" ["mark-mig"]=> string(13) "3C138C70.xlsx" ["tc-mig"]=> string(13) "3C138C70.xlsx" ["migration"]=> string(0) "" }
	// }
	$serv_name = "Eligibility Form";
	$name = $_POST['fname-elig']." ". $_POST['lname-elig'];
	$dob = $_POST['dob-elig'];
	$mob = $_POST['mob-elig'];
	$cat = $_POST['cat-elig'];
	$add = $_POST['add-elig'];
	$lexam = $_POST['lp-elig'];
	$year = $_POST['le-elig'];
	$lresult = $_POST['ler-elig'];
	$percent = $_POST['per-elig']
	$roll = $_POST['rno-elig'];
	$enroll = $_POST['erno-elig'];
	$univ_board = $_POST['univ-elig'];
	$mig_no = $_POST['mig-elig'];  
	$centername = $_POST['ec-elig'];
	$session = $_POST['sess-elig'];
	
	$sqlins = "INSERT INTO stu_service_request (serv_name, name, dob, mobile, cat, address) VALUES ('$serv_name', '$name', '$dob', '$mob', '$cat', '$add')";
	$resultins = $connection->query($sqlins);
	$req_id = $connection->insert_id;

	$sqlins2 = "INSERT INTO stu_req_aca (req_id, last_exam, lexam_yr, lresult, percent, roll, enroll, univ_board, mig_no, center, session) VALUES ('$req_id', '$lexam', '$year', '$lresult', '$percent', '$roll', '$enroll', '$univ_board', '$mig_no', '$centername', $session )";
	$resultins2 = $connection->query($sqlins2);
	// $_POST['cen-nm-mig'] = "";
	$msg = "";
	if ($resultins && $resultins2) {
		$insstatus = 1;
	}
	// echo $connection->error;
	// var_dump($resultins2);
	$file1status = 0;
	$file2status = 0;
	$file3status = 0;
	$anymig = "";
	// if (isset($_POST['cen-nm-mig'])) {
	// 	$anymig = $_POST['cen-nm-mig'];
	// 	if ($_FILES['any-mig']['name'] != "") {
	// 	$allowed_ext = array('jpg', 'JPG', 'jpeg', 'JPEG');
	// 	$file = $_FILES['any-mig']['name'];
	// 	$temppath = $_FILES['any-mig']['tmp_name'];
	// 	$filetype = pathinfo($file, PATHINFO_EXTENSION);
	// 		if (in_array($filetype, $allowed_ext)) {
				
	// 			if (filesize($temppath) < 210000) {
	// 				$uploadpath = "docs/" . $serv_name ."opt-doc" . $req_id . "-" . time() . "." . $filetype;
	// 				move_uploaded_file($temppath, $uploadpath);
	// 				$file1 = $uploadpath;
	// 				$file1status = 1;
	// 				// $msg .= $anymig . "Uploaded Successfully" .'</br>';
					
	// 			}
	// 			else
	// 			{
					
	// 				$msg .= $anymig . " Doc Size Must be less than 200 kb" .'</br>';
	// 			}
	// 		}
	// 		else
	// 		{
				
	// 			$msg .= $anymig . " Doc Only JPG,JPEG Allowed" .'</br>';
	// 		}
	// }
	// }
	if ($_FILES['sc-elig']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['sc-elig']['name'];
		$temppath = $_FILES['sc-elig']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."marksheet" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file2 = $uploadpath;
					$file2status = 1;
					// $msg .=  "Marksheet Uploaded Successfully" .'</br>';
				}
				else
				{
					$msg .=  "Marksheet Size must be less than 200kb" .'</br>';
				}
			}
			else
			{
					$msg .=  "Marksheet File PDF only allowed" .'</br>';

			}
		}
	// if ($_FILES['tc-mig']['name'] != "") {
	// 	$allowed_ext = array('pdf', 'PDF');
	// 	$file = $_FILES['tc-mig']['name'];
	// 	$temppath = $_FILES['tc-mig']['tmp_name'];
	// 	$filetype = pathinfo($file, PATHINFO_EXTENSION);
	// 		if (in_array($filetype, $allowed_ext)) {
				
	// 			if (filesize($temppath) < 210000) {
	// 				$uploadpath = "docs/" . $serv_name ."tc" . $req_id . "-" . time() . "." . $filetype;
	// 				move_uploaded_file($temppath, $uploadpath);
	// 				$file3 = $uploadpath;
	// 				$file3status = 1;
	// 				// $msg .=  "TC Uploaded Successfully" .'</br>';
	// 			}
	// 			else
	// 			{
	// 				$msg .=  "TC Size must be less than 200kb" .'</br>';
	// 			}
	// 		}
	// 		else
	// 		{
	// 				$msg .=  "TC File PDF only allowed" .'</br>';
	// 		}
	// 	}
	
	// var_dump($_FILES['tc-mig']);
	$response = 1;
	//echo $file1status, $file2status, $file3status, $insstatus;
	if ($insstatus == 1 && $anymig != "" && $file1status == 1 && $file2status==1 && $file3status == 1) {
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, opt_doc_name, opt_doc_file, last_year_ms, tc) VALUES ('$req_id', '$anymig', '$file1', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if($insstatus == 1 && $anymig == "" && $file1status == 0 && $file2status == 1 && $file3status == 1){
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, last_year_ms, tc) VALUES ('$req_id', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if ($insstatus == 1 && $anymig != "" && $file1status == 0 && $file2status == 1 && $file2status == 1 && $file3status == 1) {
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
		// $msg .=  "Optional File Selected (Please Select the correct file in required size)".'</br>';
	}
	else
	{
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
	}
}
// Enrollment Form
if (isset($_POST['sb-enrollf'])) {
	// var_dump($_POST);
	// array(17) { ["fname-mig"]=> string(5) "imran" ["lname-mig"]=> string(6) "tanwar" ["dob-mig"]=> string(10) "02/04/2020" ["mob-deg"]=> string(10) "7566075707" ["cat-mig"]=> string(2) "sc" ["add-mig"]=> string(19) "noori colony manasa" ["cname-mig"]=> string(5) "SDIPR" ["ename-mig"]=> string(3) "HSC" ["eyear-mig"]=> string(4) "2000" ["rno-mig"]=> string(6) "102010" ["erno-mig"]=> string(6) "102010" ["rp-mig"]=> string(7) "regular" ["eresult-mig"]=> string(4) "fail" ["any-mig"]=> string(0) "" ["mark-mig"]=> string(13) "3C138C70.xlsx" ["tc-mig"]=> string(13) "3C138C70.xlsx" ["migration"]=> string(0) "" }
	// }
	$serv_name = "Enrollment Form";
	$name = $_POST['fname-enrollf']." ". $_POST['lname-enrollf'];
	$dob = $_POST['dob-enrollf'];
	$mob = $_POST['mob-enrollf'];
	$cat = $_POST['cat-enrollf'];
	$add = $_POST['add-enrollf'];
	$clgid = $_POST['clgid-enrollf'];
	$clgpass = $_POST['clgpass-enrollf'];
	$fathname = $_POST['fathname-enrollf'];
	$mothname = $_POST['mothname-enrollf'];
	$12rno = $_POST['12thrno-enrollf'];
	$lboard = $_POST['lboard-enrollf'];
	$percent = $_POST['perc-enrollf'];
	$gender = $_POST['gender-enrollf'];
	$admcourse = $_POST['admcname-enrollf'];

	$sqlins = "INSERT INTO stu_service_request (serv_name, name, dob, mobile, cat, address) VALUES ('$serv_name', '$name', '$dob', '$mob', '$cat', '$add')";
	$resultins = $connection->query($sqlins);
	$req_id = $connection->insert_id;

	$sqlins2 = "INSERT INTO stu_req_aca (req_id, clgid, clgpass, fathname, mothname, 12thrno, last_board, percent, gender, admcourse) VALUES ('$req_id', '$clgid', '$clgpass', '$fathname', '$mothname', '$12rno', '$lboard', '$percent', '$gender', '$admcourse' )";
	$resultins2 = $connection->query($sqlins2);
	// $_POST['cen-nm-mig'] = "";
	$msg = "";
	if ($resultins && $resultins2) {
		$insstatus = 1;
	}
	// echo $connection->error;
	// var_dump($resultins2);
	$file1status = 0;
	$file2status = 0;
	$file3status = 0;
	$anymig = "";
	// if (isset($_POST['cen-nm-mig'])) {
	// 	$anymig = $_POST['cen-nm-mig'];
	// 	if ($_FILES['any-mig']['name'] != "") {
	// 	$allowed_ext = array('jpg', 'JPG', 'jpeg', 'JPEG');
	// 	$file = $_FILES['any-mig']['name'];
	// 	$temppath = $_FILES['any-mig']['tmp_name'];
	// 	$filetype = pathinfo($file, PATHINFO_EXTENSION);
	// 		if (in_array($filetype, $allowed_ext)) {
				
	// 			if (filesize($temppath) < 210000) {
	// 				$uploadpath = "docs/" . $serv_name ."opt-doc" . $req_id . "-" . time() . "." . $filetype;
	// 				move_uploaded_file($temppath, $uploadpath);
	// 				$file1 = $uploadpath;
	// 				$file1status = 1;
	// 				// $msg .= $anymig . "Uploaded Successfully" .'</br>';
					
	// 			}
	// 			else
	// 			{
					
	// 				$msg .= $anymig . " Doc Size Must be less than 200 kb" .'</br>';
	// 			}
	// 		}
	// 		else
	// 		{
				
	// 			$msg .= $anymig . " Doc Only JPG,JPEG Allowed" .'</br>';
	// 		}
	// }
	// }
	if ($_FILES['12th-enrollf']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['12th-enrollf']['name'];
		$temppath = $_FILES['12th-enrollf']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."marksheet" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file2 = $uploadpath;
					$file2status = 1;
					// $msg .=  "Marksheet Uploaded Successfully" .'</br>';
				}
				else
				{
					$msg .=  "Marksheet Size must be less than 200kb" .'</br>';
				}
			}
			else
			{
					$msg .=  "Marksheet File PDF only allowed" .'</br>';

			}
		}
	if ($_FILES['pphoto-enrollf']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['pphoto-enrollf']['name'];
		$temppath = $_FILES['pphoto-enrollf']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."tc" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file3 = $uploadpath;
					$file3status = 1;
					// $msg .=  "TC Uploaded Successfully" .'</br>';
				}
				else
				{
					$msg .=  "TC Size must be less than 200kb" .'</br>';
				}
			}
			else
			{
					$msg .=  "TC File PDF only allowed" .'</br>';
			}
		}
	
	// var_dump($_FILES['tc-mig']);
	$response = 1;
	//echo $file1status, $file2status, $file3status, $insstatus;
	if ($insstatus == 1 && $anymig != "" && $file1status == 1 && $file2status==1 && $file3status == 1) {
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, opt_doc_name, opt_doc_file, last_year_ms, tc) VALUES ('$req_id', '$anymig', '$file1', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if($insstatus == 1 && $anymig == "" && $file1status == 0 && $file2status == 1 && $file3status == 1){
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, last_year_ms, tc) VALUES ('$req_id', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if ($insstatus == 1 && $anymig != "" && $file1status == 0 && $file2status == 1 && $file2status == 1 && $file3status == 1) {
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
		// $msg .=  "Optional File Selected (Please Select the correct file in required size)".'</br>';
	}
	else
	{
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
	}
}
// Gap Certificate
if (isset($_POST['sb-gapcer'])) {
	// var_dump($_POST);
	// array(17) { ["fname-mig"]=> string(5) "imran" ["lname-mig"]=> string(6) "tanwar" ["dob-mig"]=> string(10) "02/04/2020" ["mob-deg"]=> string(10) "7566075707" ["cat-mig"]=> string(2) "sc" ["add-mig"]=> string(19) "noori colony manasa" ["cname-mig"]=> string(5) "SDIPR" ["ename-mig"]=> string(3) "HSC" ["eyear-mig"]=> string(4) "2000" ["rno-mig"]=> string(6) "102010" ["erno-mig"]=> string(6) "102010" ["rp-mig"]=> string(7) "regular" ["eresult-mig"]=> string(4) "fail" ["any-mig"]=> string(0) "" ["mark-mig"]=> string(13) "3C138C70.xlsx" ["tc-mig"]=> string(13) "3C138C70.xlsx" ["migration"]=> string(0) "" }
	// }
	$serv_name = "Gap Certificate";
	$name = $_POST['fname-gapcer']." ". $_POST['lname-gapcer'];
	$dob = $_POST['dob-gapcer'];
	$mob = $_POST['mob-gapcer'];
	$cat = $_POST['cat-gapcer'];
	$add = $_POST['add-gapcer'];
	$lexam = $_POST['lexam-gapcer'];
	$lyear = $_POST['lyear-gapcer'];

	$sqlins = "INSERT INTO stu_service_request (serv_name, name, dob, mobile, cat, address) VALUES ('$serv_name', '$name', '$dob', '$mob', '$cat', '$add')";
	$resultins = $connection->query($sqlins);
	$req_id = $connection->insert_id;

	$sqlins2 = "INSERT INTO stu_req_aca (req_id, last_exam, last_yr) VALUES ('$req_id', '$lexam', '$lyear' )";
	$resultins2 = $connection->query($sqlins2);
	// $_POST['cen-nm-mig'] = "";
	$msg = "";
	if ($resultins && $resultins2) {
		$insstatus = 1;
	}
	// echo $connection->error;
	// var_dump($resultins2);
	$file1status = 0;
	$file2status = 0;
	$file3status = 0;
	$anymig = "";
	// if (isset($_POST['cen-nm-mig'])) {
	// 	$anymig = $_POST['cen-nm-mig'];
	// 	if ($_FILES['any-mig']['name'] != "") {
	// 	$allowed_ext = array('jpg', 'JPG', 'jpeg', 'JPEG');
	// 	$file = $_FILES['any-mig']['name'];
	// 	$temppath = $_FILES['any-mig']['tmp_name'];
	// 	$filetype = pathinfo($file, PATHINFO_EXTENSION);
	// 		if (in_array($filetype, $allowed_ext)) {
				
	// 			if (filesize($temppath) < 210000) {
	// 				$uploadpath = "docs/" . $serv_name ."opt-doc" . $req_id . "-" . time() . "." . $filetype;
	// 				move_uploaded_file($temppath, $uploadpath);
	// 				$file1 = $uploadpath;
	// 				$file1status = 1;
	// 				// $msg .= $anymig . "Uploaded Successfully" .'</br>';
					
	// 			}
	// 			else
	// 			{
					
	// 				$msg .= $anymig . " Doc Size Must be less than 200 kb" .'</br>';
	// 			}
	// 		}
	// 		else
	// 		{
				
	// 			$msg .= $anymig . " Doc Only JPG,JPEG Allowed" .'</br>';
	// 		}
	// }
	// }
	if ($_FILES['stamp-gapcer']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['stamp-gapcer']['name'];
		$temppath = $_FILES['stamp-gapcer']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."marksheet" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file2 = $uploadpath;
					$file2status = 1;
					// $msg .=  "Marksheet Uploaded Successfully" .'</br>';
				}
				else
				{
					$msg .=  "Marksheet Size must be less than 200kb" .'</br>';
				}
			}
			else
			{
					$msg .=  "Marksheet File PDF only allowed" .'</br>';

			}
		}
	// if ($_FILES['tc-mig']['name'] != "") {
	// 	$allowed_ext = array('pdf', 'PDF');
	// 	$file = $_FILES['tc-mig']['name'];
	// 	$temppath = $_FILES['tc-mig']['tmp_name'];
	// 	$filetype = pathinfo($file, PATHINFO_EXTENSION);
	// 		if (in_array($filetype, $allowed_ext)) {
				
	// 			if (filesize($temppath) < 210000) {
	// 				$uploadpath = "docs/" . $serv_name ."tc" . $req_id . "-" . time() . "." . $filetype;
	// 				move_uploaded_file($temppath, $uploadpath);
	// 				$file3 = $uploadpath;
	// 				$file3status = 1;
	// 				// $msg .=  "TC Uploaded Successfully" .'</br>';
	// 			}
	// 			else
	// 			{
	// 				$msg .=  "TC Size must be less than 200kb" .'</br>';
	// 			}
	// 		}
	// 		else
	// 		{
	// 				$msg .=  "TC File PDF only allowed" .'</br>';
	// 		}
	// 	}
	
	// var_dump($_FILES['tc-mig']);
	$response = 1;
	//echo $file1status, $file2status, $file3status, $insstatus;
	if ($insstatus == 1 && $anymig != "" && $file1status == 1 && $file2status==1 && $file3status == 1) {
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, opt_doc_name, opt_doc_file, last_year_ms, tc) VALUES ('$req_id', '$anymig', '$file1', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if($insstatus == 1 && $anymig == "" && $file1status == 0 && $file2status == 1 && $file3status == 1){
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, last_year_ms, tc) VALUES ('$req_id', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if ($insstatus == 1 && $anymig != "" && $file1status == 0 && $file2status == 1 && $file2status == 1 && $file3status == 1) {
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
		// $msg .=  "Optional File Selected (Please Select the correct file in required size)".'</br>';
	}
	else
	{
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
	}
}
// Marksheet Correction
if (isset($_POST['sb-marcor'])) {
	// var_dump($_POST);
	// array(17) { ["fname-mig"]=> string(5) "imran" ["lname-mig"]=> string(6) "tanwar" ["dob-mig"]=> string(10) "02/04/2020" ["mob-deg"]=> string(10) "7566075707" ["cat-mig"]=> string(2) "sc" ["add-mig"]=> string(19) "noori colony manasa" ["cname-mig"]=> string(5) "SDIPR" ["ename-mig"]=> string(3) "HSC" ["eyear-mig"]=> string(4) "2000" ["rno-mig"]=> string(6) "102010" ["erno-mig"]=> string(6) "102010" ["rp-mig"]=> string(7) "regular" ["eresult-mig"]=> string(4) "fail" ["any-mig"]=> string(0) "" ["mark-mig"]=> string(13) "3C138C70.xlsx" ["tc-mig"]=> string(13) "3C138C70.xlsx" ["migration"]=> string(0) "" }
	// }
	$serv_name = "Marksheet Correction";
	$name = $_POST['fname-marcor']." ". $_POST['lname-marcor'];
	$dob = $_POST['dob-marcor'];
	$mob = $_POST['mob-marcor'];
	$cat = $_POST['cat-marcor'];
	$add = $_POST['add-marcor'];
	
	$sqlins = "INSERT INTO stu_service_request (serv_name, name, dob, mobile, cat, address) VALUES ('$serv_name', '$name', '$dob', '$mob', '$cat', '$add')";
	$resultins = $connection->query($sqlins);
	$req_id = $connection->insert_id;

	// $sqlins2 = "INSERT INTO stu_req_aca (req_id, course, exam, exam_yr, roll, enroll, reg_pri, result, center) VALUES ('$req_id', '$course', '$exam', '$year', '$roll', '$enroll', '$reg_pri', '$examres', '$centername' )";
	$resultins2 = $connection->query($sqlins2);
	// $_POST['cen-nm-mig'] = "";
	$msg = "";
	if ($resultins && $resultins2) {
		$insstatus = 1;
	}
	// echo $connection->error;
	// var_dump($resultins2);
	$file1status = 0;
	$file2status = 0;
	$file3status = 0;
	$anymig = "";
	// if (isset($_POST['cen-nm-mig'])) {
	// 	$anymig = $_POST['cen-nm-mig'];
	// 	if ($_FILES['any-mig']['name'] != "") {
	// 	$allowed_ext = array('jpg', 'JPG', 'jpeg', 'JPEG');
	// 	$file = $_FILES['any-mig']['name'];
	// 	$temppath = $_FILES['any-mig']['tmp_name'];
	// 	$filetype = pathinfo($file, PATHINFO_EXTENSION);
	// 		if (in_array($filetype, $allowed_ext)) {
				
	// 			if (filesize($temppath) < 210000) {
	// 				$uploadpath = "docs/" . $serv_name ."opt-doc" . $req_id . "-" . time() . "." . $filetype;
	// 				move_uploaded_file($temppath, $uploadpath);
	// 				$file1 = $uploadpath;
	// 				$file1status = 1;
	// 				// $msg .= $anymig . "Uploaded Successfully" .'</br>';
					
	// 			}
	// 			else
	// 			{
					
	// 				$msg .= $anymig . " Doc Size Must be less than 200 kb" .'</br>';
	// 			}
	// 		}
	// 		else
	// 		{
				
	// 			$msg .= $anymig . " Doc Only JPG,JPEG Allowed" .'</br>';
	// 		}
	// }
	// }
	if ($_FILES['mark-marcor']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['mark-marcor']['name'];
		$temppath = $_FILES['mark-marcor']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."marksheet" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file2 = $uploadpath;
					$file2status = 1;
					// $msg .=  "Marksheet Uploaded Successfully" .'</br>';
				}
				else
				{
					$msg .=  "Marksheet Size must be less than 200kb" .'</br>';
				}
			}
			else
			{
					$msg .=  "Marksheet File PDF only allowed" .'</br>';

			}
		}
	if ($_FILES['12th-marcor']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['12th-marcor']['name'];
		$temppath = $_FILES['12th-marcor']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."tc" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file3 = $uploadpath;
					$file3status = 1;
					// $msg .=  "TC Uploaded Successfully" .'</br>';
				}
				else
				{
					$msg .=  "TC Size must be less than 200kb" .'</br>';
				}
			}
			else
			{
					$msg .=  "TC File PDF only allowed" .'</br>';
			}
		}
	
	// var_dump($_FILES['tc-mig']);
	$response = 1;
	//echo $file1status, $file2status, $file3status, $insstatus;
	if ($insstatus == 1 && $anymig != "" && $file1status == 1 && $file2status==1 && $file3status == 1) {
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, opt_doc_name, opt_doc_file, last_year_ms, tc) VALUES ('$req_id', '$anymig', '$file1', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if($insstatus == 1 && $anymig == "" && $file1status == 0 && $file2status == 1 && $file3status == 1){
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, last_year_ms, tc) VALUES ('$req_id', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if ($insstatus == 1 && $anymig != "" && $file1status == 0 && $file2status == 1 && $file2status == 1 && $file3status == 1) {
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
		// $msg .=  "Optional File Selected (Please Select the correct file in required size)".'</br>';
	}
	else
	{
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
	}
}
// Marksheet Verification
if (isset($_POST['sb-markver'])) {
	// var_dump($_POST);
	// array(17) { ["fname-mig"]=> string(5) "imran" ["lname-mig"]=> string(6) "tanwar" ["dob-mig"]=> string(10) "02/04/2020" ["mob-deg"]=> string(10) "7566075707" ["cat-mig"]=> string(2) "sc" ["add-mig"]=> string(19) "noori colony manasa" ["cname-mig"]=> string(5) "SDIPR" ["ename-mig"]=> string(3) "HSC" ["eyear-mig"]=> string(4) "2000" ["rno-mig"]=> string(6) "102010" ["erno-mig"]=> string(6) "102010" ["rp-mig"]=> string(7) "regular" ["eresult-mig"]=> string(4) "fail" ["any-mig"]=> string(0) "" ["mark-mig"]=> string(13) "3C138C70.xlsx" ["tc-mig"]=> string(13) "3C138C70.xlsx" ["migration"]=> string(0) "" }
	// }
	$serv_name = "Marksheet Verification";
	$name = $_POST['fname-markver']." ". $_POST['lname-markver'];
	$dob = $_POST['dob-markver'];
	$mob = $_POST['mob-markver'];
	$cat = $_POST['cat-markver'];
	$add = $_POST['add-markver'];
	
	$sqlins = "INSERT INTO stu_service_request (serv_name, name, dob, mobile, cat, address) VALUES ('$serv_name', '$name', '$dob', '$mob', '$cat', '$add')";
	$resultins = $connection->query($sqlins);
	$req_id = $connection->insert_id;

	// $sqlins2 = "INSERT INTO stu_req_aca (req_id, course, exam, exam_yr, roll, enroll, reg_pri, result, center) VALUES ('$req_id', '$course', '$exam', '$year', '$roll', '$enroll', '$reg_pri', '$examres', '$centername' )";
	$resultins2 = $connection->query($sqlins2);
	// $_POST['cen-nm-mig'] = "";
	$msg = "";
	if ($resultins && $resultins2) {
		$insstatus = 1;
	}
	// echo $connection->error;
	// var_dump($resultins2);
	$file1status = 0;
	$file2status = 0;
	$file3status = 0;
	$anymig = "";
	// if (isset($_POST['cen-nm-mig'])) {
	// 	$anymig = $_POST['cen-nm-mig'];
	// 	if ($_FILES['any-mig']['name'] != "") {
	// 	$allowed_ext = array('jpg', 'JPG', 'jpeg', 'JPEG');
	// 	$file = $_FILES['any-mig']['name'];
	// 	$temppath = $_FILES['any-mig']['tmp_name'];
	// 	$filetype = pathinfo($file, PATHINFO_EXTENSION);
	// 		if (in_array($filetype, $allowed_ext)) {
				
	// 			if (filesize($temppath) < 210000) {
	// 				$uploadpath = "docs/" . $serv_name ."opt-doc" . $req_id . "-" . time() . "." . $filetype;
	// 				move_uploaded_file($temppath, $uploadpath);
	// 				$file1 = $uploadpath;
	// 				$file1status = 1;
	// 				// $msg .= $anymig . "Uploaded Successfully" .'</br>';
					
	// 			}
	// 			else
	// 			{
					
	// 				$msg .= $anymig . " Doc Size Must be less than 200 kb" .'</br>';
	// 			}
	// 		}
	// 		else
	// 		{
				
	// 			$msg .= $anymig . " Doc Only JPG,JPEG Allowed" .'</br>';
	// 		}
	// }
	// }
	if ($_FILES['mark-markver']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['mark-markver']['name'];
		$temppath = $_FILES['mark-markver']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."marksheet" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file2 = $uploadpath;
					$file2status = 1;
					// $msg .=  "Marksheet Uploaded Successfully" .'</br>';
				}
				else
				{
					$msg .=  "Marksheet Size must be less than 200kb" .'</br>';
				}
			}
			else
			{
					$msg .=  "Marksheet File PDF only allowed" .'</br>';

			}
		}
	// if ($_FILES['tc-mig']['name'] != "") {
	// 	$allowed_ext = array('pdf', 'PDF');
	// 	$file = $_FILES['tc-mig']['name'];
	// 	$temppath = $_FILES['tc-mig']['tmp_name'];
	// 	$filetype = pathinfo($file, PATHINFO_EXTENSION);
	// 		if (in_array($filetype, $allowed_ext)) {
				
	// 			if (filesize($temppath) < 210000) {
	// 				$uploadpath = "docs/" . $serv_name ."tc" . $req_id . "-" . time() . "." . $filetype;
	// 				move_uploaded_file($temppath, $uploadpath);
	// 				$file3 = $uploadpath;
	// 				$file3status = 1;
	// 				// $msg .=  "TC Uploaded Successfully" .'</br>';
	// 			}
	// 			else
	// 			{
	// 				$msg .=  "TC Size must be less than 200kb" .'</br>';
	// 			}
	// 		}
	// 		else
	// 		{
	// 				$msg .=  "TC File PDF only allowed" .'</br>';
	// 		}
	// 	}
	
	// var_dump($_FILES['tc-mig']);
	$response = 1;
	//echo $file1status, $file2status, $file3status, $insstatus;
	if ($insstatus == 1 && $anymig != "" && $file1status == 1 && $file2status==1 && $file3status == 1) {
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, opt_doc_name, opt_doc_file, last_year_ms, tc) VALUES ('$req_id', '$anymig', '$file1', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if($insstatus == 1 && $anymig == "" && $file1status == 0 && $file2status == 1 && $file3status == 1){
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, last_year_ms, tc) VALUES ('$req_id', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if ($insstatus == 1 && $anymig != "" && $file1status == 0 && $file2status == 1 && $file2status == 1 && $file3status == 1) {
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
		// $msg .=  "Optional File Selected (Please Select the correct file in required size)".'</br>';
	}
	else
	{
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
	}
}
// Migration Cancellation
if (isset($_POST['sb-migcan'])) {
	// var_dump($_POST);
	// array(17) { ["fname-mig"]=> string(5) "imran" ["lname-mig"]=> string(6) "tanwar" ["dob-mig"]=> string(10) "02/04/2020" ["mob-deg"]=> string(10) "7566075707" ["cat-mig"]=> string(2) "sc" ["add-mig"]=> string(19) "noori colony manasa" ["cname-mig"]=> string(5) "SDIPR" ["ename-mig"]=> string(3) "HSC" ["eyear-mig"]=> string(4) "2000" ["rno-mig"]=> string(6) "102010" ["erno-mig"]=> string(6) "102010" ["rp-mig"]=> string(7) "regular" ["eresult-mig"]=> string(4) "fail" ["any-mig"]=> string(0) "" ["mark-mig"]=> string(13) "3C138C70.xlsx" ["tc-mig"]=> string(13) "3C138C70.xlsx" ["migration"]=> string(0) "" }
	// }
	$serv_name = "Migration Cancellation";
	$name = $_POST['fname-migcan']." ". $_POST['lname-migcan'];
	$dob = $_POST['dob-migcan'];
	$mob = $_POST['mob-migcan'];
	$cat = $_POST['cat-migcan'];
	$add = $_POST['add-migcan'];
	
	$sqlins = "INSERT INTO stu_service_request (serv_name, name, dob, mobile, cat, address) VALUES ('$serv_name', '$name', '$dob', '$mob', '$cat', '$add')";
	$resultins = $connection->query($sqlins);
	$req_id = $connection->insert_id;

	// $sqlins2 = "INSERT INTO stu_req_aca (req_id, course, exam, exam_yr, roll, enroll, reg_pri, result, center) VALUES ('$req_id', '$course', '$exam', '$year', '$roll', '$enroll', '$reg_pri', '$examres', '$centername' )";
	$resultins2 = $connection->query($sqlins2);
	// $_POST['cen-nm-mig'] = "";
	$msg = "";
	if ($resultins && $resultins2) {
		$insstatus = 1;
	}
	// echo $connection->error;
	// var_dump($resultins2);
	$file1status = 0;
	$file2status = 0;
	$file3status = 0;
	$anymig = "";
	// if (isset($_POST['cen-nm-mig'])) {
	// 	$anymig = $_POST['cen-nm-mig'];
	// 	if ($_FILES['any-mig']['name'] != "") {
	// 	$allowed_ext = array('jpg', 'JPG', 'jpeg', 'JPEG');
	// 	$file = $_FILES['any-mig']['name'];
	// 	$temppath = $_FILES['any-mig']['tmp_name'];
	// 	$filetype = pathinfo($file, PATHINFO_EXTENSION);
	// 		if (in_array($filetype, $allowed_ext)) {
				
	// 			if (filesize($temppath) < 210000) {
	// 				$uploadpath = "docs/" . $serv_name ."opt-doc" . $req_id . "-" . time() . "." . $filetype;
	// 				move_uploaded_file($temppath, $uploadpath);
	// 				$file1 = $uploadpath;
	// 				$file1status = 1;
	// 				// $msg .= $anymig . "Uploaded Successfully" .'</br>';
					
	// 			}
	// 			else
	// 			{
					
	// 				$msg .= $anymig . " Doc Size Must be less than 200 kb" .'</br>';
	// 			}
	// 		}
	// 		else
	// 		{
				
	// 			$msg .= $anymig . " Doc Only JPG,JPEG Allowed" .'</br>';
	// 		}
	// }
	// }
	if ($_FILES['migcer-migcan']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['migcer-migcan']['name'];
		$temppath = $_FILES['migcer-migcan']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."marksheet" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file2 = $uploadpath;
					$file2status = 1;
					// $msg .=  "Marksheet Uploaded Successfully" .'</br>';
				}
				else
				{
					$msg .=  "Marksheet Size must be less than 200kb" .'</br>';
				}
			}
			else
			{
					$msg .=  "Marksheet File PDF only allowed" .'</br>';

			}
		}
	// if ($_FILES['tc-mig']['name'] != "") {
	// 	$allowed_ext = array('pdf', 'PDF');
	// 	$file = $_FILES['tc-mig']['name'];
	// 	$temppath = $_FILES['tc-mig']['tmp_name'];
	// 	$filetype = pathinfo($file, PATHINFO_EXTENSION);
	// 		if (in_array($filetype, $allowed_ext)) {
				
	// 			if (filesize($temppath) < 210000) {
	// 				$uploadpath = "docs/" . $serv_name ."tc" . $req_id . "-" . time() . "." . $filetype;
	// 				move_uploaded_file($temppath, $uploadpath);
	// 				$file3 = $uploadpath;
	// 				$file3status = 1;
	// 				// $msg .=  "TC Uploaded Successfully" .'</br>';
	// 			}
	// 			else
	// 			{
	// 				$msg .=  "TC Size must be less than 200kb" .'</br>';
	// 			}
	// 		}
	// 		else
	// 		{
	// 				$msg .=  "TC File PDF only allowed" .'</br>';
	// 		}
	// 	}
	
	// var_dump($_FILES['tc-mig']);
	$response = 1;
	//echo $file1status, $file2status, $file3status, $insstatus;
	if ($insstatus == 1 && $anymig != "" && $file1status == 1 && $file2status==1 && $file3status == 1) {
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, opt_doc_name, opt_doc_file, last_year_ms, tc) VALUES ('$req_id', '$anymig', '$file1', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if($insstatus == 1 && $anymig == "" && $file1status == 0 && $file2status == 1 && $file3status == 1){
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, last_year_ms, tc) VALUES ('$req_id', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if ($insstatus == 1 && $anymig != "" && $file1status == 0 && $file2status == 1 && $file2status == 1 && $file3status == 1) {
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
		// $msg .=  "Optional File Selected (Please Select the correct file in required size)".'</br>';
	}
	else
	{
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
	}
}
// Provisional Certificate
if (isset($_POST['sb-prcer'])) {
	// var_dump($_POST);
	// array(17) { ["fname-mig"]=> string(5) "imran" ["lname-mig"]=> string(6) "tanwar" ["dob-mig"]=> string(10) "02/04/2020" ["mob-deg"]=> string(10) "7566075707" ["cat-mig"]=> string(2) "sc" ["add-mig"]=> string(19) "noori colony manasa" ["cname-mig"]=> string(5) "SDIPR" ["ename-mig"]=> string(3) "HSC" ["eyear-mig"]=> string(4) "2000" ["rno-mig"]=> string(6) "102010" ["erno-mig"]=> string(6) "102010" ["rp-mig"]=> string(7) "regular" ["eresult-mig"]=> string(4) "fail" ["any-mig"]=> string(0) "" ["mark-mig"]=> string(13) "3C138C70.xlsx" ["tc-mig"]=> string(13) "3C138C70.xlsx" ["migration"]=> string(0) "" }
	// }
	$serv_name = "Provisional Certificate";
	$name = $_POST['fname-prcer']." ". $_POST['lname-prcer'];
	$dob = $_POST['dob-prcer'];
	$mob = $_POST['mob-prcer'];
	$cat = $_POST['cat-prcer'];
	$add = $_POST['add-prcer'];
	
	$sqlins = "INSERT INTO stu_service_request (serv_name, name, dob, mobile, cat, address) VALUES ('$serv_name', '$name', '$dob', '$mob', '$cat', '$add')";
	$resultins = $connection->query($sqlins);
	$req_id = $connection->insert_id;

	// $sqlins2 = "INSERT INTO stu_req_aca (req_id, course, exam, exam_yr, roll, enroll, reg_pri, result, center) VALUES ('$req_id', '$course', '$exam', '$year', '$roll', '$enroll', '$reg_pri', '$examres', '$centername' )";
	$resultins2 = $connection->query($sqlins2);
	// $_POST['cen-nm-mig'] = "";
	$msg = "";
	if ($resultins && $resultins2) {
		$insstatus = 1;
	}
	// echo $connection->error;
	// var_dump($resultins2);
	$file1status = 0;
	$file2status = 0;
	$file3status = 0;
	$anymig = "";
	// if (isset($_POST['cen-nm-mig'])) {
	// 	$anymig = $_POST['cen-nm-mig'];
	// 	if ($_FILES['any-mig']['name'] != "") {
	// 	$allowed_ext = array('jpg', 'JPG', 'jpeg', 'JPEG');
	// 	$file = $_FILES['any-mig']['name'];
	// 	$temppath = $_FILES['any-mig']['tmp_name'];
	// 	$filetype = pathinfo($file, PATHINFO_EXTENSION);
	// 		if (in_array($filetype, $allowed_ext)) {
				
	// 			if (filesize($temppath) < 210000) {
	// 				$uploadpath = "docs/" . $serv_name ."opt-doc" . $req_id . "-" . time() . "." . $filetype;
	// 				move_uploaded_file($temppath, $uploadpath);
	// 				$file1 = $uploadpath;
	// 				$file1status = 1;
	// 				// $msg .= $anymig . "Uploaded Successfully" .'</br>';
					
	// 			}
	// 			else
	// 			{
					
	// 				$msg .= $anymig . " Doc Size Must be less than 200 kb" .'</br>';
	// 			}
	// 		}
	// 		else
	// 		{
				
	// 			$msg .= $anymig . " Doc Only JPG,JPEG Allowed" .'</br>';
	// 		}
	// }
	// }
	if ($_FILES['mark-prcer']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['mark-prcer']['name'];
		$temppath = $_FILES['mark-prcer']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."marksheet" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file2 = $uploadpath;
					$file2status = 1;
					// $msg .=  "Marksheet Uploaded Successfully" .'</br>';
				}
				else
				{
					$msg .=  "Marksheet Size must be less than 200kb" .'</br>';
				}
			}
			else
			{
					$msg .=  "Marksheet File PDF only allowed" .'</br>';

			}
		}
	// if ($_FILES['tc-mig']['name'] != "") {
	// 	$allowed_ext = array('pdf', 'PDF');
	// 	$file = $_FILES['tc-mig']['name'];
	// 	$temppath = $_FILES['tc-mig']['tmp_name'];
	// 	$filetype = pathinfo($file, PATHINFO_EXTENSION);
	// 		if (in_array($filetype, $allowed_ext)) {
				
	// 			if (filesize($temppath) < 210000) {
	// 				$uploadpath = "docs/" . $serv_name ."tc" . $req_id . "-" . time() . "." . $filetype;
	// 				move_uploaded_file($temppath, $uploadpath);
	// 				$file3 = $uploadpath;
	// 				$file3status = 1;
	// 				// $msg .=  "TC Uploaded Successfully" .'</br>';
	// 			}
	// 			else
	// 			{
	// 				$msg .=  "TC Size must be less than 200kb" .'</br>';
	// 			}
	// 		}
	// 		else
	// 		{
	// 				$msg .=  "TC File PDF only allowed" .'</br>';
	// 		}
	// 	}
	
	// var_dump($_FILES['tc-mig']);
	$response = 1;
	//echo $file1status, $file2status, $file3status, $insstatus;
	if ($insstatus == 1 && $anymig != "" && $file1status == 1 && $file2status==1 && $file3status == 1) {
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, opt_doc_name, opt_doc_file, last_year_ms, tc) VALUES ('$req_id', '$anymig', '$file1', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if($insstatus == 1 && $anymig == "" && $file1status == 0 && $file2status == 1 && $file3status == 1){
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, last_year_ms, tc) VALUES ('$req_id', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if ($insstatus == 1 && $anymig != "" && $file1status == 0 && $file2status == 1 && $file2status == 1 && $file3status == 1) {
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
		// $msg .=  "Optional File Selected (Please Select the correct file in required size)".'</br>';
	}
	else
	{
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
	}
}
// Provisional Degree
if (isset($_POST['sb-prdeg'])) {
	// var_dump($_POST);
	// array(17) { ["fname-mig"]=> string(5) "imran" ["lname-mig"]=> string(6) "tanwar" ["dob-mig"]=> string(10) "02/04/2020" ["mob-deg"]=> string(10) "7566075707" ["cat-mig"]=> string(2) "sc" ["add-mig"]=> string(19) "noori colony manasa" ["cname-mig"]=> string(5) "SDIPR" ["ename-mig"]=> string(3) "HSC" ["eyear-mig"]=> string(4) "2000" ["rno-mig"]=> string(6) "102010" ["erno-mig"]=> string(6) "102010" ["rp-mig"]=> string(7) "regular" ["eresult-mig"]=> string(4) "fail" ["any-mig"]=> string(0) "" ["mark-mig"]=> string(13) "3C138C70.xlsx" ["tc-mig"]=> string(13) "3C138C70.xlsx" ["migration"]=> string(0) "" }
	// }
	$serv_name = "Provisional Degree";
	$name = $_POST['fname-prdeg']." ". $_POST['lname-prdeg'];
	$dob = $_POST['dob-prdeg'];
	$mob = $_POST['mob-prdeg'];
	$cat = $_POST['cat-prdeg'];
	$add = $_POST['add-prdeg'];
	$course = $_POST['cname-prdeg'];
	$division = $_POST['divison-prdeg'];
	$exam = $_POST['ename-prdeg'];
	$year = $_POST['eyear-prdeg'];
	$roll = $_POST['rno-prdeg'];
	$enroll = $_POST['erno-prdeg'];
	$reg_pri = $_POST['rp-prdeg'];
	$centername = $_POST['ecenter-prdeg'];
	
	$sqlins = "INSERT INTO stu_service_request (serv_name, name, dob, mobile, cat, address) VALUES ('$serv_name', '$name', '$dob', '$mob', '$cat', '$add')";
	$resultins = $connection->query($sqlins);
	$req_id = $connection->insert_id;

	$sqlins2 = "INSERT INTO stu_req_aca (req_id, course, division, exam, exam_yr, roll, enroll, reg_pri, center) VALUES ('$req_id', '$course', '$division', '$exam', '$year', '$roll', '$enroll', '$reg_pri', '$centername' )";
	$resultins2 = $connection->query($sqlins2);
	// $_POST['cen-nm-mig'] = "";
	$msg = "";
	if ($resultins && $resultins2) {
		$insstatus = 1;
	}
	// echo $connection->error;
	// var_dump($resultins2);
	$file1status = 0;
	$file2status = 0;
	$file3status = 0;
	$anymig = "";
	if (isset($_POST['any-prdeg'])) {
		$anymig = $_POST['any-prdeg'];
		if ($_FILES['any-prdeg']['name'] != "") {
		$allowed_ext = array('jpg', 'JPG', 'jpeg', 'JPEG');
		$file = $_FILES['any-prdeg']['name'];
		$temppath = $_FILES['any-prdeg']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."opt-doc" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file1 = $uploadpath;
					$file1status = 1;
					// $msg .= $anymig . "Uploaded Successfully" .'</br>';
					
				}
				else
				{
					
					$msg .= $anymig . " Doc Size Must be less than 200 kb" .'</br>';
				}
			}
			else
			{
				
				$msg .= $anymig . " Doc Only JPG,JPEG Allowed" .'</br>';
			}
	}
	}
	if ($_FILES['mark-prdeg']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['mark-prdeg']['name'];
		$temppath = $_FILES['mark-prdeg']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."marksheet" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file2 = $uploadpath;
					$file2status = 1;
					// $msg .=  "Marksheet Uploaded Successfully" .'</br>';
				}
				else
				{
					$msg .=  "Marksheet Size must be less than 200kb" .'</br>';
				}
			}
			else
			{
					$msg .=  "Marksheet File PDF only allowed" .'</br>';

			}
		}
	// if ($_FILES['tc-mig']['name'] != "") {
	// 	$allowed_ext = array('pdf', 'PDF');
	// 	$file = $_FILES['tc-mig']['name'];
	// 	$temppath = $_FILES['tc-mig']['tmp_name'];
	// 	$filetype = pathinfo($file, PATHINFO_EXTENSION);
	// 		if (in_array($filetype, $allowed_ext)) {
				
	// 			if (filesize($temppath) < 210000) {
	// 				$uploadpath = "docs/" . $serv_name ."tc" . $req_id . "-" . time() . "." . $filetype;
	// 				move_uploaded_file($temppath, $uploadpath);
	// 				$file3 = $uploadpath;
	// 				$file3status = 1;
	// 				// $msg .=  "TC Uploaded Successfully" .'</br>';
	// 			}
	// 			else
	// 			{
	// 				$msg .=  "TC Size must be less than 200kb" .'</br>';
	// 			}
	// 		}
	// 		else
	// 		{
	// 				$msg .=  "TC File PDF only allowed" .'</br>';
	// 		}
	// 	}
	
	// var_dump($_FILES['tc-mig']);
	$response = 1;
	//echo $file1status, $file2status, $file3status, $insstatus;
	if ($insstatus == 1 && $anymig != "" && $file1status == 1 && $file2status==1 && $file3status == 1) {
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, opt_doc_name, opt_doc_file, last_year_ms, tc) VALUES ('$req_id', '$anymig', '$file1', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if($insstatus == 1 && $anymig == "" && $file1status == 0 && $file2status == 1 && $file3status == 1){
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, last_year_ms, tc) VALUES ('$req_id', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if ($insstatus == 1 && $anymig != "" && $file1status == 0 && $file2status == 1 && $file2status == 1 && $file3status == 1) {
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
		// $msg .=  "Optional File Selected (Please Select the correct file in required size)".'</br>';
	}
	else
	{
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
	}
}
// Rechecking
if (isset($_POST['sb-rchk'])) {
	// var_dump($_POST);
	// array(17) { ["fname-mig"]=> string(5) "imran" ["lname-mig"]=> string(6) "tanwar" ["dob-mig"]=> string(10) "02/04/2020" ["mob-deg"]=> string(10) "7566075707" ["cat-mig"]=> string(2) "sc" ["add-mig"]=> string(19) "noori colony manasa" ["cname-mig"]=> string(5) "SDIPR" ["ename-mig"]=> string(3) "HSC" ["eyear-mig"]=> string(4) "2000" ["rno-mig"]=> string(6) "102010" ["erno-mig"]=> string(6) "102010" ["rp-mig"]=> string(7) "regular" ["eresult-mig"]=> string(4) "fail" ["any-mig"]=> string(0) "" ["mark-mig"]=> string(13) "3C138C70.xlsx" ["tc-mig"]=> string(13) "3C138C70.xlsx" ["migration"]=> string(0) "" }
	// }
	$serv_name = "Rechecking";
	$name = $_POST['fname-rchk']." ". $_POST['lname-rchk'];
	$dob = $_POST['dob-rchk'];
	$mob = $_POST['mob-rchk'];
	$cat = $_POST['cat-rchk'];
	$add = $_POST['add-rchk'];
	$enroll = $_POST['enrollno-rchk'];
	$subject = $_POST['rech-rchk'];
	
	$sqlins = "INSERT INTO stu_service_request (serv_name, name, dob, mobile, cat, address) VALUES ('$serv_name', '$name', '$dob', '$mob', '$cat', '$add')";
	$resultins = $connection->query($sqlins);
	$req_id = $connection->insert_id;

	$sqlins2 = "INSERT INTO stu_req_aca (req_id, enroll, subject) VALUES ('$req_id', '$enroll', '$subject' )";
	$resultins2 = $connection->query($sqlins2);
	// $_POST['cen-nm-mig'] = "";
	$msg = "";
	if ($resultins && $resultins2) {
		$insstatus = 1;
	}
	// echo $connection->error;
	// var_dump($resultins2);
	$file1status = 0;
	$file2status = 0;
	$file3status = 0;
	$anymig = "";
	// if (isset($_POST['cen-nm-mig'])) {
	// 	$anymig = $_POST['cen-nm-mig'];
	// 	if ($_FILES['any-mig']['name'] != "") {
	// 	$allowed_ext = array('jpg', 'JPG', 'jpeg', 'JPEG');
	// 	$file = $_FILES['any-mig']['name'];
	// 	$temppath = $_FILES['any-mig']['tmp_name'];
	// 	$filetype = pathinfo($file, PATHINFO_EXTENSION);
	// 		if (in_array($filetype, $allowed_ext)) {
				
	// 			if (filesize($temppath) < 210000) {
	// 				$uploadpath = "docs/" . $serv_name ."opt-doc" . $req_id . "-" . time() . "." . $filetype;
	// 				move_uploaded_file($temppath, $uploadpath);
	// 				$file1 = $uploadpath;
	// 				$file1status = 1;
	// 				// $msg .= $anymig . "Uploaded Successfully" .'</br>';
					
	// 			}
	// 			else
	// 			{
					
	// 				$msg .= $anymig . " Doc Size Must be less than 200 kb" .'</br>';
	// 			}
	// 		}
	// 		else
	// 		{
				
	// 			$msg .= $anymig . " Doc Only JPG,JPEG Allowed" .'</br>';
	// 		}
	// }
	// }
	// if ($_FILES['mark-mig']['name'] != "") {
	// 	$allowed_ext = array('pdf', 'PDF');
	// 	$file = $_FILES['mark-mig']['name'];
	// 	$temppath = $_FILES['mark-mig']['tmp_name'];
	// 	$filetype = pathinfo($file, PATHINFO_EXTENSION);
	// 		if (in_array($filetype, $allowed_ext)) {
				
	// 			if (filesize($temppath) < 210000) {
	// 				$uploadpath = "docs/" . $serv_name ."marksheet" . $req_id . "-" . time() . "." . $filetype;
	// 				move_uploaded_file($temppath, $uploadpath);
	// 				$file2 = $uploadpath;
	// 				$file2status = 1;
	// 				// $msg .=  "Marksheet Uploaded Successfully" .'</br>';
	// 			}
	// 			else
	// 			{
	// 				$msg .=  "Marksheet Size must be less than 200kb" .'</br>';
	// 			}
	// 		}
	// 		else
	// 		{
	// 				$msg .=  "Marksheet File PDF only allowed" .'</br>';

	// 		}
	// 	}
	// if ($_FILES['tc-mig']['name'] != "") {
	// 	$allowed_ext = array('pdf', 'PDF');
	// 	$file = $_FILES['tc-mig']['name'];
	// 	$temppath = $_FILES['tc-mig']['tmp_name'];
	// 	$filetype = pathinfo($file, PATHINFO_EXTENSION);
	// 		if (in_array($filetype, $allowed_ext)) {
				
	// 			if (filesize($temppath) < 210000) {
	// 				$uploadpath = "docs/" . $serv_name ."tc" . $req_id . "-" . time() . "." . $filetype;
	// 				move_uploaded_file($temppath, $uploadpath);
	// 				$file3 = $uploadpath;
	// 				$file3status = 1;
	// 				// $msg .=  "TC Uploaded Successfully" .'</br>';
	// 			}
	// 			else
	// 			{
	// 				$msg .=  "TC Size must be less than 200kb" .'</br>';
	// 			}
	// 		}
	// 		else
	// 		{
	// 				$msg .=  "TC File PDF only allowed" .'</br>';
	// 		}
	// 	}
	
	// var_dump($_FILES['tc-mig']);
	$response = 1;
	//echo $file1status, $file2status, $file3status, $insstatus;
	if ($insstatus == 1 && $anymig != "" && $file1status == 1 && $file2status==1 && $file3status == 1) {
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, opt_doc_name, opt_doc_file, last_year_ms, tc) VALUES ('$req_id', '$anymig', '$file1', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if($insstatus == 1 && $anymig == "" && $file1status == 0 && $file2status == 1 && $file3status == 1){
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, last_year_ms, tc) VALUES ('$req_id', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if ($insstatus == 1 && $anymig != "" && $file1status == 0 && $file2status == 1 && $file2status == 1 && $file3status == 1) {
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
		// $msg .=  "Optional File Selected (Please Select the correct file in required size)".'</br>';
	}
	else
	{
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
	}
}
// Result Updation
if (isset($_POST['sb-resupd'])) {
	// var_dump($_POST);
	// array(17) { ["fname-mig"]=> string(5) "imran" ["lname-mig"]=> string(6) "tanwar" ["dob-mig"]=> string(10) "02/04/2020" ["mob-deg"]=> string(10) "7566075707" ["cat-mig"]=> string(2) "sc" ["add-mig"]=> string(19) "noori colony manasa" ["cname-mig"]=> string(5) "SDIPR" ["ename-mig"]=> string(3) "HSC" ["eyear-mig"]=> string(4) "2000" ["rno-mig"]=> string(6) "102010" ["erno-mig"]=> string(6) "102010" ["rp-mig"]=> string(7) "regular" ["eresult-mig"]=> string(4) "fail" ["any-mig"]=> string(0) "" ["mark-mig"]=> string(13) "3C138C70.xlsx" ["tc-mig"]=> string(13) "3C138C70.xlsx" ["migration"]=> string(0) "" }
	// }
	$serv_name = "Result Updation";
	$name = $_POST['fname-resupd']." ". $_POST['lname-resupd'];
	$dob = $_POST['dob-resupd'];
	$mob = $_POST['mob-resupd'];
	$cat = $_POST['cat-resupd'];
	$add = $_POST['add-resupd'];
	
	$sqlins = "INSERT INTO stu_service_request (serv_name, name, dob, mobile, cat, address) VALUES ('$serv_name', '$name', '$dob', '$mob', '$cat', '$add')";
	$resultins = $connection->query($sqlins);
	$req_id = $connection->insert_id;

	// $sqlins2 = "INSERT INTO stu_req_aca (req_id, course, exam, exam_yr, roll, enroll, reg_pri, result, center) VALUES ('$req_id', '$course', '$exam', '$year', '$roll', '$enroll', '$reg_pri', '$examres', '$centername' )";
	$resultins2 = $connection->query($sqlins2);
	// $_POST['cen-nm-mig'] = "";
	$msg = "";
	if ($resultins && $resultins2) {
		$insstatus = 1;
	}
	// echo $connection->error;
	// var_dump($resultins2);
	$file1status = 0;
	$file2status = 0;
	$file3status = 0;
	$anymig = "";
	// if (isset($_POST['cen-nm-mig'])) {
	// 	$anymig = $_POST['cen-nm-mig'];
	// 	if ($_FILES['any-mig']['name'] != "") {
	// 	$allowed_ext = array('jpg', 'JPG', 'jpeg', 'JPEG');
	// 	$file = $_FILES['any-mig']['name'];
	// 	$temppath = $_FILES['any-mig']['tmp_name'];
	// 	$filetype = pathinfo($file, PATHINFO_EXTENSION);
	// 		if (in_array($filetype, $allowed_ext)) {
				
	// 			if (filesize($temppath) < 210000) {
	// 				$uploadpath = "docs/" . $serv_name ."opt-doc" . $req_id . "-" . time() . "." . $filetype;
	// 				move_uploaded_file($temppath, $uploadpath);
	// 				$file1 = $uploadpath;
	// 				$file1status = 1;
	// 				// $msg .= $anymig . "Uploaded Successfully" .'</br>';
					
	// 			}
	// 			else
	// 			{
					
	// 				$msg .= $anymig . " Doc Size Must be less than 200 kb" .'</br>';
	// 			}
	// 		}
	// 		else
	// 		{
				
	// 			$msg .= $anymig . " Doc Only JPG,JPEG Allowed" .'</br>';
	// 		}
	// }
	// }
	if ($_FILES['mark-resupd']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['mark-resupd']['name'];
		$temppath = $_FILES['mark-resupd']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."marksheet" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file2 = $uploadpath;
					$file2status = 1;
					// $msg .=  "Marksheet Uploaded Successfully" .'</br>';
				}
				else
				{
					$msg .=  "Marksheet Size must be less than 200kb" .'</br>';
				}
			}
			else
			{
					$msg .=  "Marksheet File PDF only allowed" .'</br>';

			}
		}
	// if ($_FILES['tc-mig']['name'] != "") {
	// 	$allowed_ext = array('pdf', 'PDF');
	// 	$file = $_FILES['tc-mig']['name'];
	// 	$temppath = $_FILES['tc-mig']['tmp_name'];
	// 	$filetype = pathinfo($file, PATHINFO_EXTENSION);
	// 		if (in_array($filetype, $allowed_ext)) {
				
	// 			if (filesize($temppath) < 210000) {
	// 				$uploadpath = "docs/" . $serv_name ."tc" . $req_id . "-" . time() . "." . $filetype;
	// 				move_uploaded_file($temppath, $uploadpath);
	// 				$file3 = $uploadpath;
	// 				$file3status = 1;
	// 				// $msg .=  "TC Uploaded Successfully" .'</br>';
	// 			}
	// 			else
	// 			{
	// 				$msg .=  "TC Size must be less than 200kb" .'</br>';
	// 			}
	// 		}
	// 		else
	// 		{
	// 				$msg .=  "TC File PDF only allowed" .'</br>';
	// 		}
	// 	}
	
	// var_dump($_FILES['tc-mig']);
	$response = 1;
	//echo $file1status, $file2status, $file3status, $insstatus;
	if ($insstatus == 1 && $anymig != "" && $file1status == 1 && $file2status==1 && $file3status == 1) {
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, opt_doc_name, opt_doc_file, last_year_ms, tc) VALUES ('$req_id', '$anymig', '$file1', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if($insstatus == 1 && $anymig == "" && $file1status == 0 && $file2status == 1 && $file3status == 1){
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, last_year_ms, tc) VALUES ('$req_id', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if ($insstatus == 1 && $anymig != "" && $file1status == 0 && $file2status == 1 && $file2status == 1 && $file3status == 1) {
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
		// $msg .=  "Optional File Selected (Please Select the correct file in required size)".'</br>';
	}
	else
	{
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
	}
}
// Revised Marksheet
if (isset($_POST['revmark'])) {
	// var_dump($_POST);
	// array(17) { ["fname-mig"]=> string(5) "imran" ["lname-mig"]=> string(6) "tanwar" ["dob-mig"]=> string(10) "02/04/2020" ["mob-deg"]=> string(10) "7566075707" ["cat-mig"]=> string(2) "sc" ["add-mig"]=> string(19) "noori colony manasa" ["cname-mig"]=> string(5) "SDIPR" ["ename-mig"]=> string(3) "HSC" ["eyear-mig"]=> string(4) "2000" ["rno-mig"]=> string(6) "102010" ["erno-mig"]=> string(6) "102010" ["rp-mig"]=> string(7) "regular" ["eresult-mig"]=> string(4) "fail" ["any-mig"]=> string(0) "" ["mark-mig"]=> string(13) "3C138C70.xlsx" ["tc-mig"]=> string(13) "3C138C70.xlsx" ["migration"]=> string(0) "" }
	// }
	$serv_name = "Revised Marksheet";
	$name = $_POST['fname-revmark']." ". $_POST['lname-revmark'];
	$dob = $_POST['dob-revmark'];
	$mob = $_POST['mob-revmark'];
	$cat = $_POST['cat-revmark'];
	$add = $_POST['add-revmark'];
	$rev_reason = $_POST['reas-revmark'];
	
	$sqlins = "INSERT INTO stu_service_request (serv_name, name, dob, mobile, cat, address) VALUES ('$serv_name', '$name', '$dob', '$mob', '$cat', '$add')";
	$resultins = $connection->query($sqlins);
	$req_id = $connection->insert_id;

	$sqlins2 = "INSERT INTO stu_req_aca (req_id, rev_reason) VALUES ('$req_id', '$rev_reason')";
	$resultins2 = $connection->query($sqlins2);
	// $_POST['cen-nm-mig'] = "";
	$msg = "";
	if ($resultins && $resultins2) {
		$insstatus = 1;
	}
	// echo $connection->error;
	// var_dump($resultins2);
	$file1status = 0;
	$file2status = 0;
	$file3status = 0;
	$anymig = "";
	if (isset($_POST['any-revmark'])) {
		$anymig = $_POST['any-revmark'];
		if ($_FILES['any-revmark']['name'] != "") {
		$allowed_ext = array('jpg', 'JPG', 'jpeg', 'JPEG');
		$file = $_FILES['any-revmark']['name'];
		$temppath = $_FILES['any-revmark']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."opt-doc" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file1 = $uploadpath;
					$file1status = 1;
					// $msg .= $anymig . "Uploaded Successfully" .'</br>';
					
				}
				else
				{
					
					$msg .= $anymig . " Doc Size Must be less than 200 kb" .'</br>';
				}
			}
			else
			{
				
				$msg .= $anymig . " Doc Only JPG,JPEG Allowed" .'</br>';
			}
	}
	}
	if ($_FILES['mark-revmark']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['mark-revmark']['name'];
		$temppath = $_FILES['mark-revmark']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."marksheet" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file2 = $uploadpath;
					$file2status = 1;
					// $msg .=  "Marksheet Uploaded Successfully" .'</br>';
				}
				else
				{
					$msg .=  "Marksheet Size must be less than 200kb" .'</br>';
				}
			}
			else
			{
					$msg .=  "Marksheet File PDF only allowed" .'</br>';

			}
		}
	// if ($_FILES['tc-mig']['name'] != "") {
	// 	$allowed_ext = array('pdf', 'PDF');
	// 	$file = $_FILES['tc-mig']['name'];
	// 	$temppath = $_FILES['tc-mig']['tmp_name'];
	// 	$filetype = pathinfo($file, PATHINFO_EXTENSION);
	// 		if (in_array($filetype, $allowed_ext)) {
				
	// 			if (filesize($temppath) < 210000) {
	// 				$uploadpath = "docs/" . $serv_name ."tc" . $req_id . "-" . time() . "." . $filetype;
	// 				move_uploaded_file($temppath, $uploadpath);
	// 				$file3 = $uploadpath;
	// 				$file3status = 1;
	// 				// $msg .=  "TC Uploaded Successfully" .'</br>';
	// 			}
	// 			else
	// 			{
	// 				$msg .=  "TC Size must be less than 200kb" .'</br>';
	// 			}
	// 		}
	// 		else
	// 		{
	// 				$msg .=  "TC File PDF only allowed" .'</br>';
	// 		}
	// 	}
	
	// var_dump($_FILES['tc-mig']);
	$response = 1;
	//echo $file1status, $file2status, $file3status, $insstatus;
	if ($insstatus == 1 && $anymig != "" && $file1status == 1 && $file2status==1 && $file3status == 1) {
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, opt_doc_name, opt_doc_file, last_year_ms, tc) VALUES ('$req_id', '$anymig', '$file1', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if($insstatus == 1 && $anymig == "" && $file1status == 0 && $file2status == 1 && $file3status == 1){
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, last_year_ms, tc) VALUES ('$req_id', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if ($insstatus == 1 && $anymig != "" && $file1status == 0 && $file2status == 1 && $file2status == 1 && $file3status == 1) {
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
		// $msg .=  "Optional File Selected (Please Select the correct file in required size)".'</br>';
	}
	else
	{
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
	}
}
// Transcript
if (isset($_POST['sb-trans'])) {
	// var_dump($_POST);
	// array(17) { ["fname-mig"]=> string(5) "imran" ["lname-mig"]=> string(6) "tanwar" ["dob-mig"]=> string(10) "02/04/2020" ["mob-deg"]=> string(10) "7566075707" ["cat-mig"]=> string(2) "sc" ["add-mig"]=> string(19) "noori colony manasa" ["cname-mig"]=> string(5) "SDIPR" ["ename-mig"]=> string(3) "HSC" ["eyear-mig"]=> string(4) "2000" ["rno-mig"]=> string(6) "102010" ["erno-mig"]=> string(6) "102010" ["rp-mig"]=> string(7) "regular" ["eresult-mig"]=> string(4) "fail" ["any-mig"]=> string(0) "" ["mark-mig"]=> string(13) "3C138C70.xlsx" ["tc-mig"]=> string(13) "3C138C70.xlsx" ["migration"]=> string(0) "" }
	// }
	$serv_name = "Transcript";
	$name = $_POST['fname-trans']." ". $_POST['lname-trans'];
	$dob = $_POST['dob-trans'];
	$mob = $_POST['mob-trans'];
	$cat = $_POST['cat-trans'];
	$add = $_POST['add-trans'];
	
	$sqlins = "INSERT INTO stu_service_request (serv_name, name, dob, mobile, cat, address) VALUES ('$serv_name', '$name', '$dob', '$mob', '$cat', '$add')";
	$resultins = $connection->query($sqlins);
	$req_id = $connection->insert_id;

	// $sqlins2 = "INSERT INTO stu_req_aca (req_id, course, exam, exam_yr, roll, enroll, reg_pri, result, center) VALUES ('$req_id', '$course', '$exam', '$year', '$roll', '$enroll', '$reg_pri', '$examres', '$centername' )";
	$resultins2 = $connection->query($sqlins2);
	// $_POST['cen-nm-mig'] = "";
	$msg = "";
	if ($resultins && $resultins2) {
		$insstatus = 1;
	}
	// echo $connection->error;
	// var_dump($resultins2);
	$file1status = 0;
	$file2status = 0;
	$file3status = 0;
	$anymig = "";
	// if (isset($_POST['cen-nm-mig'])) {
	// 	$anymig = $_POST['cen-nm-mig'];
	// 	if ($_FILES['any-mig']['name'] != "") {
	// 	$allowed_ext = array('jpg', 'JPG', 'jpeg', 'JPEG');
	// 	$file = $_FILES['any-mig']['name'];
	// 	$temppath = $_FILES['any-mig']['tmp_name'];
	// 	$filetype = pathinfo($file, PATHINFO_EXTENSION);
	// 		if (in_array($filetype, $allowed_ext)) {
				
	// 			if (filesize($temppath) < 210000) {
	// 				$uploadpath = "docs/" . $serv_name ."opt-doc" . $req_id . "-" . time() . "." . $filetype;
	// 				move_uploaded_file($temppath, $uploadpath);
	// 				$file1 = $uploadpath;
	// 				$file1status = 1;
	// 				// $msg .= $anymig . "Uploaded Successfully" .'</br>';
					
	// 			}
	// 			else
	// 			{
					
	// 				$msg .= $anymig . " Doc Size Must be less than 200 kb" .'</br>';
	// 			}
	// 		}
	// 		else
	// 		{
				
	// 			$msg .= $anymig . " Doc Only JPG,JPEG Allowed" .'</br>';
	// 		}
	// }
	// }
	if ($_FILES['mark-trans']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['mark-trans']['name'];
		$temppath = $_FILES['mark-trans']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."marksheet" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file2 = $uploadpath;
					$file2status = 1;
					// $msg .=  "Marksheet Uploaded Successfully" .'</br>';
				}
				else
				{
					$msg .=  "Marksheet Size must be less than 200kb" .'</br>';
				}
			}
			else
			{
					$msg .=  "Marksheet File PDF only allowed" .'</br>';

			}
		}
	// if ($_FILES['tc-mig']['name'] != "") {
	// 	$allowed_ext = array('pdf', 'PDF');
	// 	$file = $_FILES['tc-mig']['name'];
	// 	$temppath = $_FILES['tc-mig']['tmp_name'];
	// 	$filetype = pathinfo($file, PATHINFO_EXTENSION);
	// 		if (in_array($filetype, $allowed_ext)) {
				
	// 			if (filesize($temppath) < 210000) {
	// 				$uploadpath = "docs/" . $serv_name ."tc" . $req_id . "-" . time() . "." . $filetype;
	// 				move_uploaded_file($temppath, $uploadpath);
	// 				$file3 = $uploadpath;
	// 				$file3status = 1;
	// 				// $msg .=  "TC Uploaded Successfully" .'</br>';
	// 			}
	// 			else
	// 			{
	// 				$msg .=  "TC Size must be less than 200kb" .'</br>';
	// 			}
	// 		}
	// 		else
	// 		{
	// 				$msg .=  "TC File PDF only allowed" .'</br>';
	// 		}
	// 	}
	
	// var_dump($_FILES['tc-mig']);
	$response = 1;
	//echo $file1status, $file2status, $file3status, $insstatus;
	if ($insstatus == 1 && $anymig != "" && $file1status == 1 && $file2status==1 && $file3status == 1) {
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, opt_doc_name, opt_doc_file, last_year_ms, tc) VALUES ('$req_id', '$anymig', '$file1', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if($insstatus == 1 && $anymig == "" && $file1status == 0 && $file2status == 1 && $file3status == 1){
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, last_year_ms, tc) VALUES ('$req_id', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
	}
	else if ($insstatus == 1 && $anymig != "" && $file1status == 0 && $file2status == 1 && $file2status == 1 && $file3status == 1) {
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
		// $msg .=  "Optional File Selected (Please Select the correct file in required size)".'</br>';
	}
	else
	{
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
	}
}
?>