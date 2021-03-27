<?php 
session_start();
$semail = $_SESSION["email"];
require 'connection.php';
if (isset($_POST['exp'])) {
	$expcount = count($_POST['exp']);
	if ($expcount > 0) {
			for ($i=0; $i < $expcount; $i++) { 
				if (array_search(NULL, $_POST['exp']) !== false || array_search(NULL, $_POST['positionc1']) !== false || array_search(NULL, $_POST['compnamec2']) !== false) {
					$error = "Empty Field";
					echo "All fields in opened Rows Should be filled fully";		
				}
				else
				{
					$sql = "INSERT INTO can_exp(user_id, exp, pos, comp) VALUES ('$semail', '".mysqli_real_escape_string($connection, $_POST['exp'][$i])."', '".mysqli_real_escape_string($connection, $_POST['positionc1'][$i])."', '".mysqli_real_escape_string($connection, $_POST['compnamec2'][$i])."')";
					$result = $connection->query($sql);
					echo "data inserted" . $connection->error;
				}
			}
		}	
}



// if ($namecount > 0) {
// 	for ($i=0; $i < $namecount; $i++) { 
	
// 		if (array_search(NULL, $_POST['cersub']) !== false || array_search(NULL, $_POST['cerpyearc1']) !== false || array_search(NULL, $_POST['cerptgc1']) !== false || array_search(NULL, $_POST['cerunamec1']) !== false) {
			
// 			$error[] = "Empty Field";
// 			echo "All fields in opened Rows Should be filled fully";
// 		}
// 		else
// 		{
// 			$sql = "INSERT INTO oqal_can(user_id, quali, year, percentage, univ) VALUES ('$semail', '".mysqli_real_escape_string($connection, $_POST['cersub'][$i])."', '".mysqli_real_escape_string($connection, $_POST['cerpyearc1'][$i])."', '".mysqli_real_escape_string($connection, $_POST['cerptgc1'][$i])."', '".mysqli_real_escape_string($connection, $_POST['cerunamec1'][$i])."')";
			
// 			$result = $connection->query($sql);
// 			echo "data inserted";

// 		}
// 	}
// }


 ?>