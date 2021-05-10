<?php

//fetch_data.php

//include('config/config.php');
$connect = new PDO("mysql:host=localhost;dbname=cinema_db", "root", "");

$query = "SELECT date_play_fk FROM scheduletable ORDER BY id ASC";

$statement = $connect->prepare($query);

if($statement->execute())
{
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row['date_play_fk'];//array case with number to string months? return in json?
 }
 echo json_encode($data);
}

?>