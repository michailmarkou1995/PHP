<?php

//insert.php

$connect = new PDO("mysql:host=localhost;dbname=cinema_db", "root", "");

$form_data = json_decode(file_get_contents("php://input"));

if($form_data->action == 'Delete')
{
 $query = "
 DELETE FROM feedbacktable WHERE msgID='".$form_data->id."'
 ";
 $statement = $connect->prepare($query);
 if($statement->execute())
 {
  $output['message'] = 'Data Deleted';
 }
}

echo json_encode($output);
?>
