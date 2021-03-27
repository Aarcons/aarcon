<?php
include 'alert_creation.php';
//fetch.php;
var_dump($_POST); 
// if(isset($_POST["view"]))
// {
//   //include 'alert_creation.php';
include("connection.php");
//  if($_POST["view"] != '')
//  {
  
//   $update_query = "UPDATE alert_status SET seen_status=1 WHERE user_id = '$semail' && seen_status=0";
//   mysqli_query($connection, $update_query);
//  }

//SELECT post_job.position, post_job.location FROM post_job INNER JOIN alert_status ON alert_status.job_id = post_job.job_id && alert_status.seen_status= 0 && alert_status.user_id = 'imranwebworks@gmail.com';
foreach ($jqid as $key => $value) {
 $query = "SELECT * FROM post_job WHERE job_id = '$value'";
 $result = $connection->query($query);
 $output = '';
 while ($row = $result->fetch_assoc()) {
 $row['position'];
   echo $output .= '<li><a href="#">
     <strong>'.$row["position"].'</strong><br />
     <small><em>'.$row["location"].'</em></small>
    </a>
   </li>
   <li class="divider"></li>
   ';
 }
}

 
 
 
 // if(mysqli_num_rows($result) > 0)
 // {
 //  while($row = mysqli_fetch_array($result))
 //  {
 //   $output .= '
 //   <li> 
 //    <a href="#">
 //     <strong>'.$row["position"].'</strong><br />
 //     <small><em>'.$row["location"].'</em></small>
 //    </a>
 //   </li>
 //   <li class="divider"></li>
 //   ';
 //  }
 // }
 // else
 // {
 //  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 // }
 
 // echo $query_1 = "SELECT * FROM alert_status WHERE user_id='$semail' && seen_status=0";
 // $result_1 = mysqli_query($connection, $query_1);
 // $count = mysqli_num_rows($result_1);
 // $data = array(
 //  'notification'   => $output,
 //  'unseen_notification' => $count
 // );
 // echo json_encode($data);
// }




?>


<?php
//fetch.php;
if(isset($_POST["view"]))
{
 include("connect.php");
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE comments SET comment_status=1 WHERE comment_status=0";
  mysqli_query($connect, $update_query);
 }
 $query = "SELECT * FROM comments ORDER BY comment_id DESC LIMIT 5";
 $result = mysqli_query($connect, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
   <li>
    <a href="#">
     <strong>'.$row["comment_subject"].'</strong><br />
     <small><em>'.$row["comment_text"].'</em></small>
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
 
 $query_1 = "SELECT * FROM comments WHERE comment_status=0";
 $result_1 = mysqli_query($connect, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>
