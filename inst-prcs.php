<?php
if (!isset($_SESSION['inst'])) {
    header("Location: job-portal-login.php");
}
require 'connection.php';

$ins_id = $_SESSION['inst'];
$sqlsel = "SELECT * FROM inst_profile WHERE ins_id = '$ins_id'";
$resultsel = $connection->query($sqlsel);
if (mysqli_num_rows($resultsel) == 0) {
	$sqlins = "INSERT INTO inst_profile (ins_id) VALUES ('$ins_id')";
	$resultins = $connection->query($sqlins);
}
if (isset($_POST['inst_profile'])) {
	$name = $_POST['name'];
	$mobile = $_POST['mobile'];
	$univ = $_POST['univ'];
	$designation = $_POST['designation'];
	$of_email = $_POST['of_email'];
	$ins_name = $_POST['ins_name'];
	$ins_add = $_POST['ins_add'];
	$md_name = $_POST['md_name'];
	$md_mobile = $_POST['md_mobile'];
	$md_email = $_POST['md_email'];
	$sql = "UPDATE inst_profile SET p_name = '$name', p_mobile = '$mobile', univ = '$univ', p_design = '$designation', of_email = '$of_email', ins_name = '$ins_name', ins_add = '$ins_add', md_name = '$md_name', md_mobile = '$md_mobile', md_email = '$md_email' WHERE ins_id = '$ins_id'";
	$result = $connection->query($sql);
	if ($result == true) {
		echo "<script>alert('Data Submitted')</script>";
	}
}

?>