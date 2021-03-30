<?php
  include 'connection.php';
  //var_dump($connection);SELECT * FROM `post_job` ORDER BY job_id DESC

  $limit = 10;
  $page = "";


  if(isset($_POST["page_no"])){
    $page = $_POST["page_no"];
  }else{
    $page = 1;
  };

  echo $offset = ($page - 1) * $limit;

  $sql = "SELECT * FROM post_job ORDER BY job_id DESC LIMIT $offset, $limit";
  $result = $connection->query($sql);
  $row = $result->fetch_assoc();
  $total_rec = count($row);
  $total_pages = ceil($total_rec/10);
 


  while ( $row = $result->fetch_assoc()) {
  echo "<table border='1' width='100%' cellspacing='0' cellpadding='10px'>
      <tr>
        <th width='100px'>Post</th>
        <th>Location</th>
        <th>Vacancy</th>
        <th>Last Date</th>
      </tr>
      <tr>
        <td>{$row['position']}</td>
        <td>{$row['location']}</td>
        <td>{$row['vacant_post']}</td>
        <td>{$row['last_date']}</td>
      </tr>
  </table>";

    // $row['position']."</br>";
    // echo $row['location']."</br>";
    // echo $row['vacant_post']."</br>";
    // echo $row['last_date']."</br>";
  };
  $output ="";
  $output .='<div id="pagination">';
  $class_name = "";
  for ($i=1; $i <=$total_pages ; $i++) { 
    if($i == $page){
        $class_name = "active";
      }else{
        $class_name = "";
      }
    $output .= "<a class='{$class_name}' id='{$i}' href=''>{$i}</a>";
  }
  $output .='</div>';
  echo $output;
 ?> 
  
