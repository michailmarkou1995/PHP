<?php

//fetch_data

include("../../system/config_Backend.php"); 

$form_data = json_decode(file_get_contents("php://input"));

//JOIN
$query = "SELECT DISTINCT a.theatre_name_fk, a.movie_play_fk, a.hall_name_fk, a.date_play_fk, a.time_play, a.hall_type_fk, b.seatsAvailable
FROM scheduletable a
INNER JOIN hallstable b ON a.theatre_name_fk = b.tName_fk AND a.hall_name_fk = b.hallName
WHERE a.movie_play_fk='".$form_data->movie_name."' AND a.theatre_name_fk='".$form_data->theatre_n."' AND a.hall_name_fk='".$form_data->hall_name_n."' AND a.date_play_fk='".$form_data->date_play_n."' AND a.hall_type_fk='".$form_data->hall_type_n."' AND a.time_play='".$form_data->time_play_n."'";

$querySub = "SELECT seatP 
FROM  bookingtable
WHERE movieName_fk = '".$form_data->movie_name."' AND bookingTheatre_fk='".$form_data->theatre_n."' AND bookingType_fk='".$form_data->hall_type_n."' AND bookingTheatreHall_fk='".$form_data->hall_name_n."' AND bookingDate_fk='".$form_data->date_play_n."' AND bookingTime_fk='".$form_data->time_play_n."'";


$statement = $connect->prepare($query);

if($statement->execute()){

 while($row = $statement->fetch(PDO::FETCH_ASSOC)){
  $data[] = $row;
 }
}
echo json_encode($data);
