<?php

//fetch_data.php

//include('config/config.php');
$connect = new PDO("mysql:host=localhost;dbname=cinema_db", "root", "");

$query = "SELECT * FROM scheduletable ORDER BY id DESC";

$statement = $connect->prepare($query);

if($statement->execute())
{
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data2[] = $row;
 }
 echo json_encode($data2);
}

?>