<?php

//fetch_data.php

//include('config/config.php');
$connect = new PDO("mysql:host=localhost;dbname=cinema_db", "root", "");

$form_data = json_decode(file_get_contents("php://input"));

$error = '';
$message = '';

//$data=array();

$query = "SELECT * FROM bookingtable WHERE bookingAccount_fk='".$form_data->user_profile."' ORDER BY bookingID DESC";

$result = mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"), $query);
$queryResult = mysqli_num_rows($result);

$statement = $connect->prepare($query);

if($statement->execute())
{
    if ($queryResult > 0) {
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
            //$data[]['notickets'] = 'no';
        }
    } else {$data[]['notickets'] = 'yes';}
 echo json_encode($data);
}

?>