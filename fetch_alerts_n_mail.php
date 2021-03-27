<?php
if (isset($_POST['fetch'])) {
//echo "Hello";
require 'connection.php';

$sql = "SELECT * FROM job_alerts INNER JOIN can_basic_info ON job_alerts.user_id = can_basic_info.user_id WHERE can_basic_info.email_status = 'Verified'";
$result = $connection->query($sql);  
echo "<table>";
echo "<tr><th>user_id</th><th>Industry</th><th>Qualification</th><th>Salary</th><th>Location</th><th>Experiance</th><th>Email id</th><th>Status</th></tr>";
	while ($row = $result->fetch_assoc()) {
	echo "
	<tr><td>".$row['user_id']."</td><td>".$row['industry']."</td><td>".$row['quali']."</td><td>".$row['salary']."</td><td>".$row['location']."</td><td>".$row['exp']."</td><td>".$row['con_email']."</td><td>".$row['email_status']."</td></tr>
	";
	$users[] = array(
			$emails = $row['con_email'],
			$user_id = $row['user_id']
		
		);
		
	}
echo "</table>";

//$user = array_unique($users);
$uniqueUser = array_unique($users, SORT_REGULAR);
// var_dump($uniqueUser);
// echo count($uniqueUser);
// echo $uniqueUser[4][0];
array_splice($uniqueUser, 0, 0);
//$usercount = count($uniqueUser);

for ($i=0; $i < count($uniqueUser); $i++) { 
	$output[] ="";
	$user_id = $uniqueUser[$i][1];
	$query = "SELECT * FROM post_job INNER JOIN alert_status ON alert_status.job_id = post_job.job_id && alert_status.user_id = '$user_id' && alert_status.mail_sent= 0 ORDER BY post_job.job_id DESC";
	$resultqu = $connection->query($query);
	echo $i;
	
	echo "</br>";
	$olduser  = "";
	while ( $row1 = $resultqu->fetch_assoc()) {
		//$row[] = $row1['position'];
		//$rows = array("id"=>$i,$user_id, $row);	
		$output[] .= '
	   
   			<div style="background-color: #eee; padding: 0px 0 0 20px; position: relative;">
		   		<ul style="margin: 0; list-style-type: none; padding-left: 0;">
				   <li style="background-color: #85909e; border-radius: 5px; width: 100%; padding: 10px; margin: 0px 0 0 0; font-family: Raleway;" class="rlist">
				    <a href="#" style="color: #fff;">
				     <strong>'.$row1["position"].'</strong><br/>
				     <small><em>'.$row1["location"].'</em></small>
				    </a>
				   </li><br>
				</ul>
		   </div>

	   
	   ';
	}

	$sendername = 'AARCON';
	$mailsubject = 'Latest Jobs For You';
	$result = implode("", $output);
	$mailbody = '<head><style type="text/css">
        @media screen and (max-width: 767px){
            .embody{
                width: 96%!important;
            }
        }
        @media screen and (min-width: 768px){
            .embody{
                width: 75%!important;
            }
        }
        @media screen and (min-width: 1050px){
            .embody{
                width: 100%!important;
            }
        }
        
    </style>
    </head>
    <body class="embody">
    	<img src="https://lh3.googleusercontent.com/5hcXZ6ikwuXg1oxwdNcwuA_OmAKPkBzikDm4To0HJadvhpVTjsLh8oSBsxT2eLYgzprRV9uTdWO81QfwJYbpohoaIKawSNvmaIsBpVqZf0s28GQHL9T9t3cy5Q0HaMdZ5YHoXW9L=w975-h245-no" style="width: 20%; height: 20%;">
        <img src="https://lh3.googleusercontent.com/D2PrstOGHpxeK5fn_bnocceu4YCFtkGh63vNqfBPsxSkKtw44U022n-lAtWC4T-bCs3yvFHW2VZ2CZqs_KRHgs_AOa8Gbzc13VNlnseSd4otMBBXV91Vbic79YVj3cZdebIrR6jb=s512-no" style="height: 4%; width: 4%; margin-top: 1%; float: right;">
        <div style="background-color: #265077; height: 150px;">
            <h3 style="color: #fff; font-family: Raleway; text-align: center; padding-top: 70px; font-size: 30px;">Aarambh Job Consultancy </h3>
        </div>
        <div style="background-color: #eee; padding: 20px; font-family:Raleway;">
        <h4>Hi, </h4>
        <p style="text-align: justify;">These are the jobs that we have for you. Please go through them and review them before they are gone.</p>
        </div>
        <table style="background-color: #eee; width: 100%;">
        <tr>
        <td style="width: 50%; height: 100%;">'.$result.'</td>
        <td style="width: 50%; height: 100%; background-color: #eee;"><img src="https://lh3.googleusercontent.com/FYI59YqygciyNYPX18e7gsPZb5uOkaVnW-Mwpy52lnWWx8MWbjGBl4M15AayA9tY3fDRXnpYMD3sDGO9WU6lrVrUOuWNjC1NYPx9q7zxXMSvROvozFhTOPpJG4xELfXrIvFNpnIAO3JcTFm6clZr0I5s15bRx5a70Z1Klp60n-Yx_WLRpDWMVFKVdmL1qig_wujeGIfduq_CN13nNhn4kfsYL4a_HM5gfGQVU6ihLzYh9iBvSoiOALEjJh-0YuRRPUB5rmZjCkGq-WgpzNrhBCCwwkFXR7OPJpxRvOKMwE4b8cPLipjzstjC9xXh_EoSKsiPfu008GhE-j2ILbTsRKaU3KvwNnOymaaIIJbigiNQj1CV55Rldt_5fLFfsmkpnQbjOa_Zw8PwDL6oLHCulX0C5ddkyJTuNHXPQSBYSAOfmOsXZ0iDj892TZWjPgBT4rOBFvOfolJ9VFmmnarCNOYPNawi7GXF05sJOOdV7ZXXUW2QKCq_8_YijgLQuj0WXBDRDv82A9Aftf0HPZsyDuZ-OldQYcMNQkdq8vqwppn8wuvyXRB0LJtHesbX_5Lfb4Kz2pmBq4dd6NUqWvHdh907JCRdAAMteEQi2Fiq8l2A-EUzXJOJUJHeB9h8jhjK8JHli7__zX83_QBPIK-unpMrxNb9cYNpIhqXudCTjtdG2HXp9wE39Q=w384-h512-no" style="min-height: 100%; width: 100%!important; position: absolute; bottom: 0;"></td>
        </tr>
        </table>	
        <div style="transform: translate()">
        	
        </div>
        <div style="background-color: #000; color: #fff; padding: 20px; font-family:Raleway;">
        <p>Regards, <br>The Support Team <br>Aarcons</p>
        </div>

    </body>' ;
	//var_dump($mailbody);
	//var_dump($row);
	
	//unset($row);
	unset($output);
	$_POST['emailid'] = $uniqueUser[$i][0];
	require 'sendEmail.php';

	}
	
}






// for ($i=0; $i <$usercount ; $i++) { 
// 	$user_id = $uniqueUser[$i][1];
// $query = "SELECT * FROM post_job INNER JOIN alert_status ON alert_status.job_id = post_job.job_id && alert_status.user_id = '$user_id' && alert_status.mail_sent= 0 ORDER BY post_job.job_id DESC";
// $resultqu = $connection->query($query);
// 	  while($row1 = $resultqu->fetch_assoc())
// 	  {
// 	  	foreach ($uniqueUser as $user) {
// 	  		$output .= '
// 	   <li>
// 	    <a href="#">
// 	     <strong>'.$row1["position"].'</strong><br />
// 	     <small><em>'.$row1["location"].'</em></small>
// 	    </a>
// 	   </li>
// 	   <li class="divider"></li>
// 	   ';
	   
		
// 	  	}
// 	 }
// }  
// for ($i=0; $i <$usercount ; $i++) { 
// 	$user_id = $uniqueUser[$i][1];
// 	$query = "SELECT * FROM post_job INNER JOIN alert_status ON alert_status.job_id = post_job.job_id && alert_status.user_id = '$user_id' && alert_status.mail_sent= 0 ORDER BY post_job.job_id DESC";
// 	$resultqu = $connection->query($query);
// 	// $row1 = $resultqu->fetch_assoc();
// 	// echo "</br>";
// 	// print_r($row1);
// 	  while($row1 = $resultqu->fetch_assoc())
// 	  {
// 	  $output .= '
// 	   <li>
// 	    <a href="#">
// 	     <strong>'.$row1["position"].'</strong><br />
// 	     <small><em>'.$row1["location"].'</em></small>
// 	    </a>
// 	   </li>
// 	   <li class="divider"></li>
// 	   ';
// 	   //break;
		
// 	  }
// 	// $sendername = 'AARCON';
// 	// $mailsubject = 'Latest Jobs For You';
// echo $mailbody = $output;
// // 	// $_POST['emailid'] = $uniqueUser[$i][0];
// // 	// require 'sendEmail.php';
	
// // 	var_dump($output);
// // 	//echo $email;
// 	}




?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post">
		<button type="submit" name="fetch">fetch records</button>
	</form>
	
		
		

	
</body>
</html>