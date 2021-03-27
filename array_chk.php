<?php
if (!isset($_SESSION)) {
	session_start();
}
//$jid[]=" ";
$semail = $_SESSION['email'];
//$string1 = "PHP, My-SQL, Angular, Java";
require'connection.php';
$sqlskil = "SELECT * FROM cand_skills WHERE user_id = '$semail'" ;
$resultskil = $connection->query($sqlskil);
$rowskil = $resultskil->fetch_assoc();
$tagstring = $rowskil['skills'];
$tags = explode(",", $tagstring);
$tagcount = count($tags);
$prid ="";
$id2 = "";
for ($i=0; $i <$tagcount ; $i++) { 
	$tag = trim($tags[$i]);
	$sql = "SELECT * FROM post_job WHERE skills LIKE '%$tag%'" ;
	$result = $connection->query($sql);

	while ($row = $result->fetch_assoc()) {
		
		$id = $row['job_id'];
		
		if ($id > $prid) {
			$id . "</br>";
		}
		$prid = $id;
		$id1[] = $id;
		$id2 = array_merge($id1);

	}

}
if ($id2 != NULL) {
	//print_r($id2);
	$new = array_unique($id2);
	//print_r($new);
	//echo count($new);
	arsort($new);
	//print_r($new);
}


//echo "</br>";
//echo "</br>";
//location search
//$string2 = "Indore, Mandsaur, Ratlam, Jaora";
//require'connection.php';
$sqlloc = "SELECT * FROM can_basic_info WHERE user_id = '$semail'";
$resultloc = $connection->query($sqlloc);
$rowloc = $resultloc->fetch_assoc();
$alocation = $rowloc['district'];
$sqldloc = "SELECT * FROM des_profile WHERE user_id = '$semail'";
$resultdloc = $connection->query($sqldloc);
$rowdloc = $resultdloc->fetch_assoc();
$deslocation = $rowdloc['location'];

$tags1 = explode(",", $deslocation);
array_push($tags1, $alocation);
$tags2 = array_filter($tags1);
array_splice($tags2, 0, 0);
$tagcount1 = count($tags2);
$prid1 ="";
$id5 ="";
if ($tags2 !="") {
	for ($i=0; $i <$tagcount1 ; $i++) { 
	$tag1 = trim($tags2[$i]);
	$sql = "SELECT * FROM post_job WHERE location LIKE '%$tag1%'" ;
	$result = $connection->query($sql);

	while ($row = $result->fetch_assoc()) {
		
		$id3 = $row['job_id'];
		
		if ($id3 > $prid1) {
			$id3;
		}
		$prid1 = $id3;
		$id4[] = $id3;
		$id5 = array_merge($id4);
		
	}

}

}

$new1[] ="";
if ($id5 !="") {
	//print_r($id5);
$new1 = array_unique($id5);
//print_r($new1);
//echo count($new1);
//echo "</br>";
arsort($new1);
array_splice($new1, 0, 0);
//print_r($new1);

//echo "</br>";

//$new2 = array_merge($new, $new1);
//print_r($new2);
}

//experience calculation
$sqlexp = "SELECT * FROM can_exp WHERE user_id = '$semail'";
$resultexp = $connection->query($sqlexp);
while ($rowexp = $resultexp->fetch_assoc()) {
	$experience = $rowexp['exp'];
	// switch ($experience) {
	// 	case 'Fresher':
	// 		echo $total = 0;
	// 		break;
	// 	case '1':
	// 		echo $total = 1;
	// 		break;
		
	// 	case '2':
	// 		echo $total = 2;
	// 		break;
	// 	case '3':
	// 		echo $total = 3;
	// 		break;
	// 	case '4':
	// 		echo $total = 4;
	// 		break;
	// 	case '5':
	// 		echo $total = 5;
	// 		break;
	// 	case '6':
	// 		echo $total = 6;
	// 		break;
	// 	case '7':
	// 		echo $total = 7;
	// 		break;
	// 	case '8':
	// 		echo $total = 8;
	// 		break;
	// 	case '9':
	// 		echo $total = 9;
	// 		break;
	// 	case '10':
	// 		echo $total = 10;
	// 		break;
	// 	case '10+':
	// 		echo $total = 11;
	// 		break;
		
	// 	default:
	// 		echo "No Value";
	// 		break;

	// }
	$total1[] = $experience;
	//echo "</br>";
	//print_r($total1);
}
$jid[] =" ";
if (!empty($total1)) {
	$exptotal = array_sum($total1);
	//echo "</br>";
//echo $exptotal;
//var_dump($exptotal);
//fetch job_id according to candidate experience

//var_dump($exptotal);

if ($exptotal == 0) {
	for ($i=0; $i <$tagcount ; $i++) { 
		$tag = trim($tags[$i]);
		$sqljex = "SELECT * FROM post_job WHERE exp = $exptotal && skills LIKE '%$tag%'";
		$resultjex = $connection->query($sqljex);
		while ($rowjex = $resultjex->fetch_assoc()) {
			$rowjex['job_id'];
			$jid[] = $rowjex['job_id']; 
		}
	}
}
else if ($exptotal > 0 ) {
	for ($i=0; $i <$tagcount ; $i++) { 
		$tag = trim($tags[$i]);
		$sqljex = "SELECT * FROM post_job WHERE exp <= $exptotal && exp != 0 && skills LIKE '%$tag%'";
		$resultjex = $connection->query($sqljex);
		//print_r($resultjex);
		//echo "</br>";
		//var_dump($resultjex);
		//echo "</br>";
		//$rowjex = $resultjex->fetch_assoc();
		//var_dump($rowjex);
		while ($rowjex = $resultjex->fetch_assoc()) {
			$rowjex['job_id'];
			$jid[] = $rowjex['job_id'];
		}
	}
}

}
foreach($jid as $key=>$value)
{
    if(is_null($value) || $value == ' ')
        unset($jid[$key]);
}
$jid1 = array_filter($jid);
$jid1 = array_unique($jid);
//echo "</br>";

//array_splice($jid1, 0, 0);
//print_r($jid1);

//Fetching Job_id as per required educational qualification//
$sqlqual = "SELECT * FROM cand_edu_qual WHERE user_id = '$semail'";
$resultqual = $connection->query($sqlqual);
$rowqual = $resultqual->fetch_assoc();
$sscyear = $rowqual['hsc_year'];
if ($sscyear != "") {
	$ssc = "10th";
}
else
{
	$ssc = "";
}
$hscyear = $rowqual['higher_year'];
if ($hscyear != "") {
	$hsc = "12th";
}
else
{
	$hsc = "";
}
$grad = $rowqual['grad_sub'];
$postgrad = $rowqual['pg_sub'];
$jqid[] ="";
if ($grad != "") {
	$sqljqual = "SELECT * FROM post_job WHERE qual = 'Any Graduate' ";
	$resultjqual = $connection->query($sqljqual);
	while ($rowjqual = $resultjqual->fetch_assoc()) {
	$jqid[] = $rowjqual['job_id'];
	}
}

$sqljqual = "SELECT * FROM post_job WHERE qual = '$ssc' || qual = '$hsc' || qual = '$grad' || qual = '$postgrad'";
$resultjqual = $connection->query($sqljqual);
while ($rowjqual = $resultjqual->fetch_assoc()) {
	$jqid[] = $rowjqual['job_id'];
}
foreach($jqid as $key=>$value)
{
    if(is_null($value) || $value == '')
        unset($jqid[$key]);
}
//echo "</br>";
//print_r($jqid);
$jobid = array_unique(array_merge($new, $new1, $jid, $jqid)) ;
arsort($jobid);
array_splice($jobid, 0, 0);
//echo "</br>";
//print_r($jobid);


?>