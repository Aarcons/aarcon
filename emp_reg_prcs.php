<?php  
if (isset($_POST['name-employer'])) {
	require 'connection.php';
	$empname = $_POST['name-employer'];
	$empemail = $_POST['email-employer'];
	$empmobile = $_POST['phone-employer'];
	$emppass = $_POST['confirmpassword-employer'];
	$sql = "INSERT INTO comp_reg(emp_name, email, mobile, pass) VALUES ('$empname', '$empemail', '$empmobile', '$emppass')";
	$result = $connection->query($sql);
	if ($result == 1) {
		echo "Registered Successfully";
		//header("Location: register.php#employer");
		
	}
	else{
		echo "Error: " . $connection->error();
	}
}

if (isset($_POST['type_inst'])) {
	require 'connection.php';
	$insttype = $_POST['type_inst'];
	$instname =$_POST['name-inst'];
	$instemail =$_POST['email-inst'];
	$instphone =$_POST['phone-inst'];
	$instpass =$_POST['confirmpassword-inst'];
	$sql = "INSERT INTO inst_reg(inst_type, inst_name, inst_email, inst_phone, inst_pass) VALUES ('$insttype', '$instname', '$instemail', '$instphone', '$instpass')";
	$result = $connection->query($sql);
	if ($result == 1) {
		echo "Registered Successfully";
		//header("Location: register.php#employer");
		
	}
	else{
		echo "Error: " . $connection->error();
	}
}

?>