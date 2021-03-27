<?php
session_start();
$semail = $_SESSION['email'];
require 'connection.php';
$sql = "SELECT * FROM can_basic_info WHERE user_id = '$semail'";
$result = $connection->query($sql);
$row = $result->fetch_assoc();
$dgender =  $row['gender'];

$sql1 = "SELECT distinct(Gender) FROM select_input";
$result1 = $connection->query($sql1);
$row1 = $result1->fetch_assoc();
// print_r($row1);
// while ( $row1 = $result1->fetch_assoc()) {
// 	$row1['Gender'];
// }

// foreach ($row1 as $item) {
	
// 	echo $item;

// }

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<!-- <select name="DateDropDown">
		<option value='' disabled selected>Please Select Value</option>; -->
<!-- 		<?php
			foreach ($result1 as $row1) {
			$item = $row1['Gender'];
			if ($item == $dgender) {
				$s = "selected";
			}
			else
			{	
				$s="";

			}
			echo "<option value='$item' $s>$item</option>";	
			}
				
		?> -->
	<!-- </select> -->
<div>
<?php $chatid ="<div id='chatid'></div>"; 
echo $chatid; 
 ?>
</div>
<script type="text/javascript">
    document.cookie = "myJavascriptVar =12345";
</script>
</body>
</html>