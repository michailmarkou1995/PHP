<?php
//insert.php


$connect = new PDO("mysql:host=localhost;dbname=cinema_db", "root", "");

$form_data = json_decode(file_get_contents("php://input"));

    if($form_data->action)
    {
     $query = "SELECT * FROM scheduletable WHERE date_play_fk='".$form_data->id."'";

     $query1 = "SELECT count(*) as total FROM scheduletable WHERE date_play_fk='".$form_data->id."'";
     $result2 = mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"),$query1);
     $datas=mysqli_fetch_assoc($result2);
     $output['count'] = $datas['total'];

     $result1 = mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"),$query);
    
 $i=1;
 while(mysqli_fetch_array($result1))
 {
     $i++;
 }

 /* if($form_data->action == '2021-04-01')
 {
   $queryF = "SELECT * FROM scheduletable WHERE date_play='".$form_data->action."'";
    $resultF = mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"),$queryF);
    $output['timing'] =$resultF;

    $output['times'] = $i;
    $output['namara'] = "TEST IF WORKING";
 }*/

 /*if($form_data->action == '2021-04-02')
 {
    $queryF = "SELECT * FROM scheduletable WHERE date_play='".$form_data->action."'";
    $resultF = mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"),$queryF);
    $output['timing'] =$resultF;

    $output['times'] = $i;
    $output['namara'] = "TEST IF WORKING";
 }*/

 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();


 foreach($result as $row)
 {
    $output['times'] = $i;
    $output[] = $row;
    $output['movie_play_fk'] = $row['movie_play_fk'];
    $output['date_play'] = $row['date_play_fk'];
    $output['time_play'] = $row['time_play'];
    $output['duration_play_fk'] = $row['duration_play_fk'];
    $output['theatre_name_fk'] = $row['theatre_name_fk'];
    $output['hall_name_fk'] = $row['hall_name_fk'];
    $output['hall_type_fk'] = $row['hall_type_fk'];
    $output['movie_synopsis'] = $row['movie_synopsis'];

   // $output['times'] = $i;
    $output['press'] = true;
 }
     //echo json_encode($form_data->id);
    /* $statement = $connect->prepare($query);
     $statement->execute();
     $result = $statement->fetchAll();
     foreach($result as $row)
     {
     
     }
     //echo json_encode($output);
    } 
    echo json_encode($output);*/
}echo json_encode($output);
?>