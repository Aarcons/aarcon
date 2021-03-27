<?php
$data = array();

if(isset($_GET["query"]))
{
 $connect = new PDO("mysql:host=localhost; dbname=acsdb", "root","");

 $query = "
 SELECT skills FROM skills 
 WHERE skills LIKE '".$_GET["query"]."%' 
 ORDER BY skills ASC 
 LIMIT 15
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row["skills"];
 }
}

echo json_encode($data);




















?>