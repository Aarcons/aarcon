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
	else if ($insstatus == 1 && $anymig != "" && $file1status == 0 && $file2status == 1  && $file3status == 1) {
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

	$sqlins2 = "INSERT INTO stu_req_aca (req_id, message) VALUES ('$req_id', '$degmes')";
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
					$uploadpath = "docs/" . $serv_name ."Previous_degree" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file1 = $uploadpath;
					$file1status = 1;
					// $msg .=  "Marksheet Uploaded Successfully" .'</br>';
				}
				else
				{
					$msg .=  "Previous Degree Size must be less than 200kb" .'</br>';
				}
			}
			else
			{
					$msg .=  "Previous Degree File PDF only allowed" .'</br>';

			}
		}
	if ($_FILES['cordoc-degcor']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['cordoc-degcor']['name'];
		$temppath = $_FILES['cordoc-degcor']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."Correction_Doc" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file2 = $uploadpath;
					$file2status = 1;
					// $msg .=  "TC Uploaded Successfully" .'</br>';
				}
				else
				{
					$msg .=  "Correction Document Size must be less than 200kb" .'</br>';
				}
			}
			else
			{
					$msg .=  "Correction Document File PDF only allowed" .'</br>';
			}
		}
	
	// var_dump($_FILES['tc-mig']);
	$response = 1;
	//echo $file1status, $file2status, $file3status, $insstatus;
	if ($insstatus == 1  && $file1status == 1 && $file2status==1 ) {
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, prev_degree, cr_doc) VALUES ('$req_id','$file1', '$file2')";
		$resultfile = $connection->query($sqlfile);
	}
	// else if($insstatus == 1 && $file1status == 1 && $file2status == 1){
	// 	$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
	// 	$data ="";
	// 	$modaltitle = "Note Your Request ID from below";
	// 	$location = "";
	// 	$sqlfile = "INSERT INTO stu_serv_req_files(req_id, prev_degree, cr_doc) VALUES ('$req_id','$file1', '$file2')";
	// 	$resultfile = $connection->query($sqlfile);
	// }
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
	$division = $_POST['divison-deg'];
	$exam = $_POST['ename-deg'];
	$year = $_POST['eyear-deg'];
	$roll = $_POST['rno-deg'];
	$enroll = $_POST['erno-deg'];
	$reg_pri = $_POST['rp-deg'];
	$centername = $_POST['ecenter-deg'];
	
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
	else
	{
		$insstatus = 0;
		echo $connection->error;
	}
	// echo $connection->error;
	// var_dump($resultins2);
	$file1status = 0;
	$file2status = 0;
	// $file3status = 0;
	$anydeg = "";
	if (isset($_POST['any-deg'])) {
		$anydeg = $_POST['any-deg'];
		if ($_FILES['any-deg']['name'] != "") {
		$allowed_ext = array('jpg', 'JPG', 'jpeg', 'JPEG');
		$file = $_FILES['any-deg']['name'];
		$temppath = $_FILES['any-deg']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."opt-doc-degcr" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file1 = $uploadpath;
					$file1status = 1;
					// $msg .= $anymig . "Uploaded Successfully" .'</br>';
					
				}
				else
				{
					
					$msg .= $anydeg . " Doc Size Must be less than 200 kb" .'</br>';
				}
			}
			else
			{
				
				$msg .= $anydeg . " Doc Only JPG,JPEG Allowed" .'</br>';
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
	if ($insstatus == 1 && $anydeg != "" && $file1status == 1 && $file2status==1 ) {
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, opt_doc_name, opt_doc_file, last_year_ms) VALUES ('$req_id', '$anydeg', '$file1', '$file2')";
		$resultfile = $connection->query($sqlfile);
	}
	else if($insstatus == 1 && $anydeg == "" && $file1status == 0 && $file2status == 1 ){
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, last_year_ms) VALUES ('$req_id', '$file2')";
		$resultfile = $connection->query($sqlfile);
	}
	else if ($insstatus == 1 && $anydeg != "" && $file1status == 0 && $file2status == 1 ) {
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



//migration-correction



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
	$msg = "";
	$insstatus = 1;
	$file1status = 0;
	if ($_FILES['mark-prcer']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['mark-prcer']['name'];
		$temppath = $_FILES['mark-prcer']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."Last_Marksheet" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file1 = $uploadpath;
					$file1status = 1;
				}
				else
				{
					$msg .=  "Last Marksheet Size must be less than 200kb" .'</br>';
				}
			}
			else
			{
					$msg .=  "Last Marksheet File PDF only allowed" .'</br>';

			}
		}
	$response = 1;
	if ($insstatus == 1  && $file1status ) {
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, last_year_ms) VALUES ('$req_id','$file1')";
		$resultfile = $connection->query($sqlfile);
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
	$msg = "";
	if ($resultins && $resultins2) {
		$insstatus = 1;
	}
	else
	{
		$insstatus = 0;
		echo $connection->error;
	}
	$file1status = 0;
	$file2status = 0;
	$anyprovdeg = "";
	if (isset($_POST['any-prdeg'])) {
		$anyprovdeg = $_POST['any-prdeg'];
		if ($_FILES['any-prdeg']['name'] != "") {
		$allowed_ext = array('jpg', 'JPG', 'jpeg', 'JPEG');
		$file = $_FILES['any-prdeg']['name'];
		$temppath = $_FILES['any-prdeg']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."opt-doc_prov-deg" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file1 = $uploadpath;
					$file1status = 1;
					
				}
				else
				{
					
					$msg .= $anyprovdeg . " Doc Size Must be less than 200 kb" .'</br>';
				}
			}
			else
			{
				
				$msg .= $anyprovdeg . " Doc Only JPG,JPEG Allowed" .'</br>';
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
					$uploadpath = "docs/" . $serv_name ."prov_deg-marksheet" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file2 = $uploadpath;
					$file2status = 1;
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
	$response = 1;
	if ($insstatus == 1 && $anyprovdeg != "" && $file1status == 1 && $file2status==1 ) {
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, opt_doc_name, opt_doc_file, last_year_ms) VALUES ('$req_id', '$anyprovdeg', '$file1', '$file2')";
		$resultfile = $connection->query($sqlfile);
	}
	else if($insstatus == 1 && $anyprovdeg == "" && $file1status == 0 && $file2status == 1 ){
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, last_year_ms) VALUES ('$req_id', '$file2')";
		$resultfile = $connection->query($sqlfile);
	}
	else if ($insstatus == 1 && $anyprovdeg != "" && $file1status == 0 && $file2status == 1 ) {
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
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

	$sqlins2 = "INSERT INTO stu_req_aca (req_id, course, exam, exam_yr, roll, enroll, reg_pri, center, dup_mrk_sem) VALUES ('$req_id', '$course', '$exam', '$year', '$roll', '$enroll', '$reg_pri', '$centername', '$dupsem' )";
	$resultins2 = $connection->query($sqlins2);
	$msg = "";
	if ($resultins && $resultins2) {
		$insstatus = 1;
	}
	else
	{
		$insstatus = 0;
		echo $connection->error;
	}
	$file1status = 0;
	$file2status = 0;
	$anydupmark = "";
	if (isset($_POST['any-dmark'])) {
		$anydupmark = $_POST['any-dmark'];
		if ($_FILES['any-dmark']['name'] != "") {
		$allowed_ext = array('jpg', 'JPG', 'jpeg', 'JPEG');
		$file = $_FILES['any-dmark']['name'];
		$temppath = $_FILES['any-dmark']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."opt-doc_dup-mark" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file1 = $uploadpath;
					$file1status = 1;
					
				}
				else
				{
					
					$msg .= $anydupmark . " Doc Size Must be less than 200 kb" .'</br>';
				}
			}
			else
			{
				
				$msg .= $anydupmark . " Doc Only JPG,JPEG Allowed" .'</br>';
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
					$uploadpath = "docs/" . $serv_name ."dup-mark-marksheet" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file2 = $uploadpath;
					$file2status = 1;
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
	$response = 1;
	if ($insstatus == 1 && $anydupmark != "" && $file1status == 1 && $file2status==1 ) {
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, opt_doc_name, opt_doc_file, last_year_ms) VALUES ('$req_id', '$anydupmark', '$file1', '$file2')";
		$resultfile = $connection->query($sqlfile);
	}
	else if($insstatus == 1 && $anydupmark == "" && $file1status == 0 && $file2status == 1 ){
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, last_year_ms) VALUES ('$req_id', '$file2')";
		$resultfile = $connection->query($sqlfile);
	}
	else if ($insstatus == 1 && $anydupmark != "" && $file1status == 0 && $file2status == 1 ) {
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
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
	$msg = "";
	$insstatus = 1;
	$file1status = 0;
	$file2status = 0;
	if ($_FILES['mark-marcor']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['mark-marcor']['name'];
		$temppath = $_FILES['mark-marcor']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."Previous_Marksheet" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file1 = $uploadpath;
					$file1status = 1;
				}
				else
				{
					$msg .=  "Previous Marksheet Size must be less than 200kb" .'</br>';
				}
			}
			else
			{
					$msg .=  "Previous Marksheet File PDF only allowed" .'</br>';

			}
		}
	if ($_FILES['12th-marcor']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['12th-marcor']['name'];
		$temppath = $_FILES['12th-marcor']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."12th_Marksheet" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file2 = $uploadpath;
					$file2status = 1;
				}
				else
				{
					$msg .=  "12th Marksheet Size must be less than 200kb" .'</br>';
				}
			}
			else
			{
					$msg .=  "12th Marksheet File PDF only allowed" .'</br>';
			}
		}
	
	$response = 1;
	if ($insstatus == 1  && $file1status == 1 && $file2status==1 ) {
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, last_year_ms, xii_ms) VALUES ('$req_id','$file1', '$file2')";
		$resultfile = $connection->query($sqlfile);
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
	
	$sqlins = "INSERT INTO stu_service_request (serv_name, name, dob, mobile, cat, address) VALUES ('$serv_name', '$name', '$dob', '$mob', '$cat', '$add')";
	$resultins = $connection->query($sqlins);
	$req_id = $connection->insert_id;
	$msg = "";
	$insstatus = 1;
	$file1status = 0;
	$file2status = 0;
	$file3status = 0;
	if ($_FILES['polrep-dpmig']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['polrep-dpmig']['name'];
		$temppath = $_FILES['polrep-dpmig']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."Police_Report" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file1 = $uploadpath;
					$file1status = 1;
				}
				else
				{
					$msg .=  "Police Report Size must be less than 200kb" .'</br>';
				}
			}
			else
			{
					$msg .=  "Police Report File PDF only allowed" .'</br>';

			}
		}
	if ($_FILES['affidavit-dpmig']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['affidavit-dpmig']['name'];
		$temppath = $_FILES['affidavit-dpmig']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."Affidavit" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file2 = $uploadpath;
					$file2status = 1;
				}
				else
				{
					$msg .=  "Affidavit Size must be less than 200kb" .'</br>';
				}
			}
			else
			{
					$msg .=  "Affidavit File PDF only allowed" .'</br>';
			}
		}
	if ($_FILES['mark-dpmig']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['mark-dpmig']['name'];
		$temppath = $_FILES['mark-dpmig']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."All_Marksheet" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file3 = $uploadpath;
					$file3status = 1;
				}
				else
				{
					$msg .=  "All Marksheet Size must be less than 200kb" .'</br>';
				}
			}
			else
			{
					$msg .=  "All Marksheet File PDF only allowed" .'</br>';
			}
		}
	$response = 1;
	if ($insstatus == 1  && $file1status == 1 && $file2status==1 && $file3status==1 ) {
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, pol_rep, affidavit, all_ms) VALUES ('$req_id','$file1', '$file2', '$file3')";
		$resultfile = $connection->query($sqlfile);
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
	$msg = "";
	$insstatus = 1;
	$file1status = 0;
	if ($_FILES['migcer-migcan']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['migcer-migcan']['name'];
		$temppath = $_FILES['migcer-migcan']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."Migration_Certificate" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file1 = $uploadpath;
					$file1status = 1;
				}
				else
				{
					$msg .=  "Migration Certificate Size must be less than 200kb" .'</br>';
				}
			}
			else
			{
					$msg .=  "Migration Certificate File PDF only allowed" .'</br>';

			}
		}
	$response = 1;
	if ($insstatus == 1  && $file1status ) {
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, migra_cer) VALUES ('$req_id','$file1')";
		$resultfile = $connection->query($sqlfile);
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
	$msg = "";
	$insstatus = 1;
	$file1status = 0;
	if ($_FILES['mark-resupd']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['mark-resupd']['name'];
		$temppath = $_FILES['mark-resupd']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."All_Marksheet" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file1 = $uploadpath;
					$file1status = 1;
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
	$response = 1;
	if ($insstatus == 1  && $file1status ) {
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, all_ms) VALUES ('$req_id','$file1')";
		$resultfile = $connection->query($sqlfile);
	}
	else
	{
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
	}
}

// Revised Marksheet
if (isset($_POST['sb-revmark'])) {
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

	$sqlins2 = "INSERT INTO stu_req_aca (req_id, message) VALUES ('$req_id', '$rev_reason' )";
	$resultins2 = $connection->query($sqlins2);
	$msg = "";
	if ($resultins && $resultins2) {
		$insstatus = 1;
	}
	else
	{
		$insstatus = 0;
		echo $connection->error;
	}
	$file1status = 0;
	$file2status = 0;
	$anyrevmark = "";
	if (isset($_POST['any-revmark'])) {
		$anyrevmark = $_POST['any-revmark'];
		if ($_FILES['any-revmark']['name'] != "") {
		$allowed_ext = array('jpg', 'JPG', 'jpeg', 'JPEG');
		$file = $_FILES['any-revmark']['name'];
		$temppath = $_FILES['any-revmark']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
			if (in_array($filetype, $allowed_ext)) {
				
				if (filesize($temppath) < 210000) {
					$uploadpath = "docs/" . $serv_name ."opt-doc_rev-mark" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file1 = $uploadpath;
					$file1status = 1;
					
				}
				else
				{
					
					$msg .= $anyrevmark . " Doc Size Must be less than 200 kb" .'</br>';
				}
			}
			else
			{
				
				$msg .= $anyrevmark . " Doc Only JPG,JPEG Allowed" .'</br>';
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
					$uploadpath = "docs/" . $serv_name ."prev-marksheet" . $req_id . "-" . time() . "." . $filetype;
					move_uploaded_file($temppath, $uploadpath);
					$file2 = $uploadpath;
					$file2status = 1;
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
	$response = 1;
	if ($insstatus == 1 && $anyrevmark != "" && $file1status == 1 && $file2status==1 ) {
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, opt_doc_name, opt_doc_file, last_year_ms) VALUES ('$req_id', '$anyrevmark', '$file1', '$file2')";
		$resultfile = $connection->query($sqlfile);
	}
	else if($insstatus == 1 && $anyrevmark == "" && $file1status == 0 && $file2status == 1 ){
		$msg .=  "Your Request Sent Successfully with Request ID:". $req_id .'</br>';
		$data ="";
		$modaltitle = "Note Your Request ID from below";
		$location = "";
		$sqlfile = "INSERT INTO stu_serv_req_files(req_id, last_year_ms) VALUES ('$req_id', '$file2')";
		$resultfile = $connection->query($sqlfile);
	}
	else if ($insstatus == 1 && $anyrevmark != "" && $file1status == 0 && $file2status == 1 ) {
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
	}
	else
	{
		$data = "data-dismiss = 'modal'";
		$modaltitle = "Error";
		$location = "";
	}
}


?>