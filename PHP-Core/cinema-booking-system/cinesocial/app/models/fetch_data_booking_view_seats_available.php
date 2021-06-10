<?php

//fetch_data

include("../../system/config_Backend.php"); 

$form_data = json_decode(file_get_contents("php://input"));

$query = "SELECT seatP 
            FROM  bookingtable
            WHERE movieName_fk = '".$form_data->movie_name."' AND bookingTheatre_fk='".$form_data->theatre_n."' AND bookingType_fk='".$form_data->hall_type_n."' AND bookingTheatreHall_fk='".$form_data->hall_name_n."' AND bookingDate_fk='".$form_data->date_play_n."' AND bookingTime_fk='".$form_data->time_play_n."'";

$result = mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"), $query);
$queryResult = mysqli_num_rows($result);

$statement = $connect->prepare($query);

if($queryResult > 0){
    if($statement->execute()){

        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
            $data[] = $row;
        }
    }
} else $data=[];
echo json_encode($data);
