<?php

//fetch_data

include("../../system/config_Backend.php"); 

$form_data = json_decode(file_get_contents("php://input"));

$query = "SELECT * FROM scheduletable WHERE movie_play_fk='".$form_data->movie_name."'";

$query = "SELECT * FROM (
            SELECT b.*,
            ROW_NUMBER() OVER (PARTITION BY date_play_fk ORDER BY id) as num
            FROM scheduletable b
            WHERE movie_play_fk = '".$form_data->movie_name."'
          ) tbl
          WHERE num = 1";

$statement = $connect->prepare($query);

if($statement->execute())
{
  while($row = $statement->fetch(PDO::FETCH_ASSOC)){
    $data[] = $row;
  }
}
echo json_encode($data);
