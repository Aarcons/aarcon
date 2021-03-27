<?php
if ($_SESSION == NULL) {
	session_start();
}

$semail = $_SESSION['email'];
if (isset($_POST['govtidup'])) {
	$idname = $_POST['id-name'];
	if ($_FILES['id-file']['name'] != "") {
		$allowed_ext = array('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG');
		$file = $_FILES['id-file']['name'];
		$temppath = $_FILES['id-file']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
		if (in_array($filetype, $allowed_ext)) {
			
			if (filesize($temppath) < 200000) {
				$uploadpath = "docs/" . $semail . $idname . time() . "." . $filetype;
				move_uploaded_file($temppath, $uploadpath);
				$id_msg =  "File uploaded successfully";
			}
			else
			{
				$id_msg = "File size must be less than 200KB";
			}
		}
		else
		{
			$id_msg = "Please upload image file only";
		}
	}
}

if (isset($_POST['allmark'])) {
	$marksname = "Marksheets";
	if ($_FILES['file-marks']['name'] != "") {
		$allowed_ext = array('pdf', 'PDF');
		$file = $_FILES['file-marks']['name'];
		$temppath = $_FILES['file-marks']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
		if (in_array($filetype, $allowed_ext)) {
			
			if (filesize($temppath) < 2000000) {
				$uploadpath = "docs/" . $semail . $marksname . time() . "." . $filetype;
				move_uploaded_file($temppath, $uploadpath);
				$marks_msg = "File uploaded successfully";
				
			}
			else
			{
				$marks_msg = "File size must be less than 2MB";
			}
		}
		else
		{
			$marks_msg = "Please upload pdf file only";
		}
	}
}


if (isset($_POST['resume'])) {
	$rname = "Resume";
	if ($_FILES['r-file']['name'] != "") {
		$allowed_ext = array('doc', 'DOC','docx', 'DOCX');
		$file = $_FILES['r-file']['name'];
		$temppath = $_FILES['r-file']['tmp_name'];
		$filetype = pathinfo($file, PATHINFO_EXTENSION);
		if (in_array($filetype, $allowed_ext)) {
			
			if (filesize($temppath) < 2000000) {
				$uploadpath = "docs/" . $semail . $rname . time() . "." . $filetype;
				move_uploaded_file($temppath, $uploadpath);
				$r_msg = "File uploaded successfully";
				
			}
			else
			{
				$r_msg = "File size must be less than 2MB";
			}
		}
		else
		{
			$r_msg = "Please upload doc or docx file only";
		}
	}
}





?>