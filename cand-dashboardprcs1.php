<?php 
session_start();
$semail = $_SESSION["email"];
require 'connection.php';
$namecount = count($_POST['cersub']);
// var_dump($_POST);
if ($namecount > 0) {
	for ($i=0; $i < $namecount; $i++) { 
	// 	if (trim($_POST['cersub'][$i]) == NULL || trim($_POST['cerpyearc1'][$i]) == NULL) {
	// 		echo "empty";
	// 	}
	// 	else if (trim($_POST['cersub'][$i]) != "" && trim($_POST['cerpyearc1'][$i]) != "") {
	// 		echo "data inserted";
	// 	}
	// 	else
	// 	{
	// 		echo "error";
	// 	}
	// }
		if (array_search(NULL, $_POST['cersub']) !== false || array_search(NULL, $_POST['cerpyearc1']) !== false || array_search(NULL, $_POST['cerptgc1']) !== false || array_search(NULL, $_POST['cerunamec1']) !== false) {
			
			$error[] = "Empty Field";
			echo "All fields in opened Rows Should be filled fully";
		}
		else
		{
			$sql = "INSERT INTO oqal_can(user_id, quali, year, percentage, univ) VALUES ('$semail', '".mysqli_real_escape_string($connection, $_POST['cersub'][$i])."', '".mysqli_real_escape_string($connection, $_POST['cerpyearc1'][$i])."', '".mysqli_real_escape_string($connection, $_POST['cerptgc1'][$i])."', '".mysqli_real_escape_string($connection, $_POST['cerunamec1'][$i])."')";
			
			$result = $connection->query($sql);
			echo "data inserted";

		}
	}
}


 ?>