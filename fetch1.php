<?php
session_start();
$semail = $_SESSION['email'];

require 'chk_noti.php';
//$semail = $_SESSION['email'];
// var_dump($_POST);
if(isset($_POST["view"]))
{
 include("connect.php");
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE alert_status 
INNER JOIN post_job ON alert_status.job_id = post_job.job_id
SET alert_status.seen_status = 1 
WHERE alert_status.user_id = '$semail' && alert_status.seen_status =0";
  mysqli_query($connect, $update_query);
 }
 $query = "SELECT * FROM post_job INNER JOIN alert_status ON alert_status.job_id = post_job.job_id && alert_status.user_id = '$semail' ORDER BY post_job.job_id DESC";
 $result = mysqli_query($connect, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
   <li>
    <a href="#">
     <strong>'.$row["position"].'</strong><br />
     <small><em>'.$row["location"].'</em></small>
    </a>
   </li>
   <li class="divider"></li>
   ';
  }
 }
 else
 {
    $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 }
 
 $query_1 = "SELECT * FROM post_job INNER JOIN alert_status ON alert_status.job_id = post_job.job_id && alert_status.seen_status= 0 && alert_status.user_id = '$semail' ORDER BY post_job.job_id DESC";
 $result_1 = mysqli_query($connect, $query_1);
  $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}

?>
