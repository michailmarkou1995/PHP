<?php

//fetch_data.php

//include('config/config.php');
$connect = new PDO("mysql:host=localhost;dbname=cinema_db", "root", "");

$form_data = json_decode(file_get_contents("php://input"));

if ($form_data->action == 'getcolor') {

    $query = "SELECT colortheme FROM usersettingstable WHERE user_fk='".$form_data->user_profile."'";
    $statement = $connect->prepare($query);

    if ($statement->execute()) {
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row['colortheme'];
        }
    }
}
elseif ($form_data->action == 'setcolor') {
    $query = "
    UPDATE usersettingstable 
    SET colortheme='".$form_data->color."' WHERE user_fk='".$form_data->user_profile."'
    ";
    $statement = $connect->prepare($query);
    if($statement->execute())
    {

    }
    $query = "SELECT colortheme FROM usersettingstable WHERE user_fk='".$form_data->user_profile."'";
$statement = $connect->prepare($query);
if ($statement->execute()) {
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row['colortheme'];
    }
}
}
 echo json_encode($data);

?>