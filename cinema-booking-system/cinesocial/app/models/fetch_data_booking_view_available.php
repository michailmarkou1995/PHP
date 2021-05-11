<?php

//fetch_data

include("../../system/config_Backend.php"); 

$form_data = json_decode(file_get_contents("php://input"));

$query = "SELECT * FROM scheduletable WHERE movie_play_fk='".$form_data->movie_name."'";

$result1 = mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"),$query);
$i=0;
  while(mysqli_fetch_array($result1))
  {
      $i++;
  }
  if ($i >= 1){
      $data['isAvailable'] = true;
  } else  $data['isAvailable'] = false;
$data['name']=$form_data->movie_name;

$statement = $connect->prepare($query);

if($statement->execute())
{
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data['theatre_name_fk'] = $row['theatre_name_fk'];
  $data[] = $row;
 }
}
echo json_encode($data);
