<?php

$a=$_GET['State'];

// if ($a=="Gujarat") {
	
// }
require 'connection.php';
require 'cand-dashboardprcs.php';
$sql = "SELECT distinct(mpdist) FROM select_input WHERE mpdist != ' ' ";
$result = $connection->query($sql);
$ddist = $row['district'];

$sql1 = "SELECT distinct(rjdist) FROM select_input WHERE rjdist != ' ' ";
$result1 = $connection->query($sql1);




switch ($a) {
	case 'Madhya Pradesh':
		foreach ($result as $row) {
			$item = $row['mpdist'];
			if ($item == $ddist) {
				$s = "selected";
			}
			else
			{   
			$s="";
			
			}
			echo "<option value='$item' $s>$item</option>";
		}
	 	
		break;
	case 'Rajasthan':
		foreach ($result1 as $row1) {
			$item = $row1['rjdist'];
			if ($item == $ddist) {
				$s = "selected";
			}
			else
			{   
			$s="";
			
			}
			echo "<option value='$item' $s>$item</option>";
		}
		break;
	
	default:
		echo "<select><option>Please Select Value</option></select>";
		break;
}
  ?>