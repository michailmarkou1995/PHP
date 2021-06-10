<?php

//insert

include("../../system/config_Backend.php"); 


$form_data = json_decode(file_get_contents("php://input"));

if ($form_data->action == 'fetch_single_dataUser') {
    $query = "SELECT * FROM bookingtable WHERE bookingID='".$form_data->id."'";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output['first_name'] = $row['bookingFName'];
        $output['last_name'] = $row['bookingLName'];
        $output['movie_name'] = $row['movieName_fk'];
        $output['theatre'] = $row['bookingTheatre_fk'];
        $output['hall_type'] = $row['bookingTheatreHall_fk'];
        $output['booking_type'] = $row['bookingType_fk'];
        $output['date'] = $row['bookingDate_fk'];
        $output['time'] = $row['bookingTime_fk'];
        $output['seatp'] = $row['seatP'];
        $output['phone_number'] = $row['bookingPNumber'];
        $output['account'] = $row['bookingAccount_fk'];
    }
}
if ($form_data->action == 'fetch_single_dataSeat') {
    $output=[];

    $query = "SELECT seatP 
    FROM  bookingtable
    WHERE movieName_fk = '".$form_data->movie_n."' AND bookingTheatre_fk='".$form_data->theatre_name."' AND bookingType_fk='".$form_data->hall_type."' AND bookingTheatreHall_fk='".$form_data->hall_name."' AND bookingDate_fk='".$form_data->date."' AND bookingTime_fk='".$form_data->time."' AND bookingAccount_fk='".$form_data->account."' AND bookingFName='".$form_data->fname."' AND bookingLName='".$form_data->lname."'";

$query1 = "SELECT seatP 
FROM  bookingtable
WHERE movieName_fk = '".$form_data->movie_n."' AND bookingTheatre_fk='".$form_data->theatre_name."' AND bookingType_fk='".$form_data->hall_type."' AND bookingTheatreHall_fk='".$form_data->hall_name."' AND bookingDate_fk='".$form_data->date."' AND bookingTime_fk='".$form_data->time."'";

$result = mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"), $query);
$result1 = mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"), $query1);
$queryResult1 = mysqli_num_rows($result1);
$queryResult = mysqli_num_rows($result);

$statement = $connect->prepare($query);
$statement1 = $connect->prepare($query1);

if($queryResult > 0 && $queryResult1>0){
if($statement->execute() && $statement1->execute()){

while($row = $statement->fetch(PDO::FETCH_ASSOC)){
    $output['userseat'] = $row['seatP'];
}
while($row = $statement1->fetch(PDO::FETCH_ASSOC)){
    $output[]=$row['seatP'];
}

}
} else $output=[];
}
if ($form_data->action == 'fetch_single_dataFSeat') {
    $query = "SELECT DISTINCT a.theatre_name_fk, a.movie_play_fk, a.hall_name_fk, a.date_play_fk, a.time_play, a.hall_type_fk, b.seatsAvailable
    FROM scheduletable a
    INNER JOIN hallstable b ON a.theatre_name_fk = b.tName_fk AND a.hall_name_fk = b.hallName
    WHERE a.movie_play_fk='".$form_data->movie_n."' AND a.theatre_name_fk='".$form_data->theatre_name."' AND a.hall_name_fk='".$form_data->hall_name."' AND a.date_play_fk='".$form_data->date."' AND a.hall_type_fk='".$form_data->hall_type."' AND a.time_play='".$form_data->time."'";
$statement = $connect->prepare($query);

if($statement->execute()){

 while($row = $statement->fetch(PDO::FETCH_ASSOC)){
  $output['seatsAvailable'] = $row['seatsAvailable'];
 }
}    
}
echo json_encode($output);
