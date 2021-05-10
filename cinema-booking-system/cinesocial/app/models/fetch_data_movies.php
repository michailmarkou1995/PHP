<?php

//fetch_data.php

//include('config/config.php');
$connect = new PDO("mysql:host=localhost;dbname=cinema_db", "root", "");

$query = "SELECT * FROM movietable ORDER BY movieID DESC";

$statement = $connect->prepare($query);

if($statement->execute())
{
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;
 }
 echo json_encode($data);
}

?>