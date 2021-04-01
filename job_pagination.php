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

  $offset = ($page - 1) * $limit;

  $sql = "SELECT * FROM post_job ORDER BY job_id DESC LIMIT $offset, $limit";
  $result = $connection->query($sql);
  $row = $result->fetch_assoc();
  $total_rec = count($row);
  $total_pages = ceil($total_rec/10);
 


  while ( $row = $result->fetch_assoc()) {
  // echo "<table border='1' width='100%' cellspacing='0' cellpadding='10px'>
  //     <tr>
  //       <th width='100px'>Post</th>
  //       <th>Location</th>
  //       <th>Vacancy</th>
  //       <th>Last Date</th>
  //     </tr>
  //     <tr>
  //       <td>{$row['position']}</td>
  //       <td>{$row['location']}</td>
  //       <td>{$row['vacant_post']}</td>
  //       <td>{$row['last_date']}</td>
  //     </tr>
  // </table>
  echo "<div class='row'>
                <ul class='job-title'>
                  <li>
                    <h4>{$row['position']}</h4>
                    <p>{$row['location']}</p>
                  </li>
                </ul>
                <ul class='job-date'>
                  <li>
                    <p>Posts: {$row['vacant_post']}</p>
                    <p>Last Date: {$row['last_date']}</p>
                  </li>
                </ul>
                <ul class='job-button'>
                  <li>
                    <button type='button' class='btn btn-primary' onclick='window.location = \"job-portal-login.php\"'>Read More</button>
                  </li>
                </ul>
                <ul class='icon'>
                  <li>
                    <i class='far fa-heart'></i>
                  </li>
                </ul>
              </div>";


    // $row['position']."</br>";
    // echo $row['location']."</br>";
    // echo $row['vacant_post']."</br>";
    // echo $row['last_date']."</br>";
  };
  $output ="";
  $output .='<div id="pagination">';
  $class_name = "pages";
  for ($i=1; $i <=$total_pages ; $i++) { 
    if($i == $page){
        $class_name = "active";
      }else{
        $class_name = "pages";
      }
    $output .= "<a class='{$class_name} ' id='{$i}' href=''>{$i}</a>";
  }
  $output .='</div>';
  echo $output;
 ?> 
  
