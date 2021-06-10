<?php

//insert.php

$connect = new PDO("mysql:host=localhost;dbname=cinema_db", "root", "");

$form_data = json_decode(file_get_contents("php://input"));

if ($form_data->action == 'Delete') {
    $query = "
 DELETE FROM scheduletable WHERE id='" . $form_data->id . "'
 ";
    $statement = $connect->prepare($query);
    if ($statement->execute()) {
        $output['message'] = 'Data Deleted';
    }
    $db = mysqli_connect("localhost", "root", "", "cinema_db");
    $queryz = "SELECT date_play_fk, COUNT(*) AS totalD FROM scheduletable WHERE date_play_fk='" . $form_data->date . "'";
    $resultt = mysqli_query($db, $queryz);
    $dataCount = mysqli_fetch_assoc($resultt);
    $output['stored'] = $dataCount["totalD"];
    echo $dataCount["totalD"];
    if ($dataCount["totalD"] == 0) {
        $del_query = "DELETE FROM datetable WHERE date_uniq='" . $form_data->date . "'";
        $resultt = mysqli_query($db, $del_query) or die(mysqli_error($db));
    } else {
    }
}

echo json_encode($output);
