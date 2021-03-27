<?php
session_start();
if (isset($_POST['employer-email'])) {
	$compmail = $_POST['employer-email'];
	$comppass = $_POST['employer-password'];
	require 'connection.php';
	$sql = "SELECT * FROM comp_reg WHERE email = '$compmail'";
	$results = $connection->query($sql);
	$row = $results->fetch_assoc();
	if ($comppass == $row['pass']) {
		$_SESSION['comp'] = $compmail;
		echo "<script>window.location.replace('emp-dashboard.php');</script>";
	}
	else
	{
		echo "Login failed";
	}
}
if (isset($_POST['placement-associate-email'])) {
	$instmail = $_POST['placement-associate-email'];
	$instpass = $_POST['placement-associate-password'];
	require 'connection.php';
	$sql = "SELECT * FROM inst_reg WHERE inst_email = '$instmail'";
	$results = $connection->query($sql);
	$row = $results->fetch_assoc();
	if ($instpass == $row['inst_pass']) {
		$_SESSION['inst'] = $instmail;
		echo "<script>window.location.replace('inst-dash.php');</script>";
	}
	else
	{
		echo "Login failed";
	}
}



















?>