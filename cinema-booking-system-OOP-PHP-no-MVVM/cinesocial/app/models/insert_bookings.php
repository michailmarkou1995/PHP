<?php

//insert


if (strpos($_SERVER['REQUEST_URI'], "bookingAdmin.php") !== false){
  include("../../../system/config_Backend.php"); 

} else
include("../../system/config_Backend.php"); 

$form_data = json_decode(file_get_contents("php://input"));

$error = array();
$output=array();
$message = '';
$validation_error = '';
$first_name = '';
$last_name = '';
$movie_name = '';
$theatre = '';
$hall_type = '';
$booking_type = '';
$date = '';
$time = '';
$seatp = '';
$phone_number = '';
$account = '';
$closeM=0;


if($form_data->action == 'seat_select'){
 
    $output=[]; // OR {} or output[]='';? megalwni to JSON des to kapou me console.log
    //to submit ginetai sto button ara oxi sto ON seat select mporouses kai edw bebaia
}
elseif($form_data->action == 'search_account'){
  $search = mysqli_real_escape_string(mysqli_connect("localhost", "root", "", "cinema_db"), $form_data->search);
//.$form_data->search
  $query = "SELECT * FROM users WHERE email LIKE '$search'";
  $result = mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"), $query);
  $queryResult = mysqli_num_rows($result);
  if($queryResult > 0){
    $output['account_available']='Exists';
  }
  else $output['account_available']='Not Exists';
}
elseif($form_data->action == 'search_account_seat'){

  if(empty($form_data->first_name))
{
 $error[] = 'First Name is Required';
}
else
{
 $first_name = $form_data->first_name;
}

if(empty($form_data->last_name))
{
 $error[] = 'Last Name is Required';
}
else
{
 $last_name = $form_data->last_name;
}
            if(empty(implode(" ", $form_data->movie_name)))
            {
            $error[] = 'movie name is Required';
            }
            else
            {
            $movie_name = implode(" ", $form_data->movie_name);
            }

            if(empty(implode(" ",$form_data->theatre)))
            {
            $error[] = 'theatre is Required';
            }
            else
            {
            $theatre =  implode(" ",$form_data->theatre);
            }

if(empty(implode(" ",$form_data->hall_type)))
{
 $error[] = 'hall is Required';
}
else
{
 $hall_type = implode(" ",$form_data->hall_type);
}

if(empty(implode(" ",$form_data->booking_type)))
{
 $error[] = 'Book Type Name is Required';
}
else
{
 $booking_type = implode(" ",$form_data->booking_type);
}

if(empty(implode(" ",$form_data->date)))
{
 $error[] = 'Date is Required';
}
else
{
 $date = implode(" ",$form_data->date);
}

if(empty(implode(" ",$form_data->time)))
{
 $error[] = 'Time is Required';
}
else
{
 $time = implode(" ",$form_data->time);
}

if(empty($form_data->seatp))
{
 $error[] = 'Seat No is Required';
}
else
{
 $seatp = $form_data->seatp;
}

if(empty($form_data->phone_number))
{
 $error[] = 'Phone is Required';
}
else
{
 $phone_number = $form_data->phone_number;
}

if(empty($form_data->account))
{
 $error[] = 'account Name is Required';
}
else
{
 $account = $form_data->account;
}

if(empty($error))
{
  $search = mysqli_real_escape_string(mysqli_connect("localhost", "root", "", "cinema_db"), $form_data->search_seats);

  $query = "SELECT * FROM bookingtable WHERE seatP LIKE '$search' AND bookingFName='".$form_data->first_name."' AND bookingLName='".$form_data->last_name."' AND bookingPNumber='".$form_data->phone_number."' AND bookingDate_fk='".implode(" ", $form_data->date)."' AND bookingTime_fk='".implode(" ", $form_data->time)."' AND bookingType_fk='".implode(" ", $form_data->booking_type)."' AND bookingTheatreHall_fk='".implode(" ", $form_data->hall_type)."' AND bookingTheatre_fk='".implode(" ", $form_data->theatre)."' AND movieName_fk='".implode(" ", $form_data->movie_name)."'";

  $result = mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"), $query);

  $queryResult = mysqli_num_rows($result);

  if($queryResult > 0){
    $output['seat_available']='Taken';
    $result=$output['seat_available'];
    $message='succeed searching';
    $closeM=0;
  }
  //elseif($queryResult <= 0) {$output['seat_available']='Not Taken';
    else{
    $output['seat_available']='Not Taken';
    $message='succeed searching';
    $result=$output['seat_available'];
    $closeM=0;
    }
  //}else
    //$message='Searching FAILED';
  }else{
    $validation_error = implode(", ", $error);
    $output['seat_available']='error';
  }
   $output = array(
    'result' => $output['seat_available'],
    'message' => $message,
    'error'  => $validation_error,
   );
  
}
elseif($form_data->action == 'hall_based'){
  $query = "SELECT * FROM (
        SELECT b.*,
        ROW_NUMBER() OVER (PARTITION BY hall_type_fk ORDER BY id) as num
        FROM scheduletable b
        WHERE movie_play_fk = '".implode(" ", $form_data->movie_name)."'
        AND date_play_fk = '".implode(" ", $form_data->date_play)."' AND time_play = '".implode(" ", $form_data->time_play)."' AND theatre_name_fk = '".implode(" ", $form_data->theatre)."' AND hall_name_fk = '".implode(" ", $form_data->hall_name)."'
      ) tbl
      WHERE num = 1";
      $statement = $connect->prepare($query);
      $statement->execute();
      $result = $statement->fetchAll();
      foreach($result as $row)
      {
        $output[]=$row;
      }
}
elseif($form_data->action == 'theatre_based'){
  $query = "SELECT * FROM (
        SELECT b.*,
        ROW_NUMBER() OVER (PARTITION BY hall_name_fk ORDER BY id) as num
        FROM scheduletable b
        WHERE movie_play_fk = '".implode(" ", $form_data->movie_name)."'
        AND date_play_fk = '".implode(" ", $form_data->date_play)."' AND time_play = '".implode(" ", $form_data->time_play)."' AND theatre_name_fk = '".implode(" ", $form_data->theatre)."'
      ) tbl
      WHERE num = 1";
      $statement = $connect->prepare($query);
      $statement->execute();
      $result = $statement->fetchAll();
      foreach($result as $row)
      {
        $output[]=$row;
      }
}
elseif($form_data->action == 'time_based'){
  $query = "SELECT * FROM (
        SELECT b.*,
        ROW_NUMBER() OVER (PARTITION BY theatre_name_fk ORDER BY id) as num
        FROM scheduletable b
        WHERE movie_play_fk = '".implode(" ", $form_data->movie_name)."'
        AND date_play_fk = '".implode(" ", $form_data->date_play)."' AND time_play = '".implode(" ", $form_data->time_play)."'
      ) tbl
      WHERE num = 1";
      $statement = $connect->prepare($query);
      $statement->execute();
      $result = $statement->fetchAll();
      foreach($result as $row)
      {
        $output[]=$row;
      }
}
elseif($form_data->action == 'date_based'){
  $query = "SELECT * FROM (
        SELECT b.*,
        ROW_NUMBER() OVER (PARTITION BY time_play ORDER BY id) as num
        FROM scheduletable b
        WHERE movie_play_fk = '".implode(" ", $form_data->movie_name)."'
        AND date_play_fk = '".implode(" ", $form_data->date_play)."'
      ) tbl
      WHERE num = 1";
      $statement = $connect->prepare($query);
      $statement->execute();
      $result = $statement->fetchAll();
      foreach($result as $row)
      {
        $output[]=$row;
      }
}
elseif($form_data->action == 'movie_based'){
      $query = "SELECT * FROM (
            SELECT b.*,
            ROW_NUMBER() OVER (PARTITION BY date_play_fk ORDER BY id) as num
            FROM scheduletable b
            WHERE movie_play_fk = '".implode(" ", $form_data->movie_name)."'
          ) tbl
          WHERE num = 1";
          $statement = $connect->prepare($query);
          $statement->execute();
          $result = $statement->fetchAll();
          foreach($result as $row)
          {
            $output[]=$row;
          }
}

elseif($form_data->action == 'movie_based1'){
  $query = "SELECT * FROM (
        SELECT b.*,
        ROW_NUMBER() OVER (PARTITION BY date_play_fk ORDER BY id) as num
        FROM scheduletable b
        WHERE movie_play_fk = '".$form_data->movie_name."'
      ) tbl
      WHERE num = 1";
      $statement = $connect->prepare($query);
      $statement->execute();
      $result = $statement->fetchAll();
      foreach($result as $row)
      {
        $output[]=$row;
      }
}
elseif($form_data->action == 'pre_add_Data'){
      $query = "SELECT * FROM (
            SELECT b.*,
            ROW_NUMBER() OVER (PARTITION BY movie_play_fk ORDER BY id) as num
            FROM scheduletable b
          ) tbl
          WHERE num = 1";
      $statement = $connect->prepare($query);
      $statement->execute();
      $result = $statement->fetchAll();
      foreach($result as $row)
      {//EDW tha pekso mpala grami 26 den thes ID thes ola MOVIES omos pws fetch current info? san selected?
        $output['movies_l'][] = array($row['movie_play_fk']); 
        $output['rest_info_movie'][] = array($row);
      }
      $query = "SELECT * FROM (
            SELECT b.*,
            ROW_NUMBER() OVER (PARTITION BY theatre_name_fk ORDER BY id) as num
            FROM scheduletable b
          ) tbl
          WHERE num = 1";
      $statement = $connect->prepare($query);
      $statement->execute();
      $result = $statement->fetchAll();
      foreach($result as $row)
      {//EDW tha pekso mpala grami 26 den thes ID thes ola MOVIES omos pws fetch current info? san selected?
        $output['theatre_l'][] = array($row['theatre_name_fk']);  
      }
      $query = "SELECT * FROM (
        SELECT b.*,
        ROW_NUMBER() OVER (PARTITION BY time_play ORDER BY id) as num
        FROM scheduletable b
      ) tbl
      WHERE num = 1";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
    $output['rest_info_time'][] = array($row);
  }
  $query = "SELECT * FROM scheduletable";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
      $output['rest_info_general'][]= array($row);
    }
}
elseif($form_data->action == 'fetch_single_data_user_edit'){
  $query = "SELECT * FROM scheduletable";
  // $query = "SELECT * FROM (
  //   SELECT b.*,
  //   ROW_NUMBER() OVER (PARTITION BY movie_play_fk ORDER BY id) as num
  //   FROM scheduletable b
  // ) tbl
  // WHERE num = 1";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
    //$output['movies_l'][] = array($row['movie_play_fk']); 
    $output['rest_info_general'][]= array($row);
  }
}
elseif($form_data->action == 'fetch_single_data')
{
 $query = "SELECT * FROM bookingtable WHERE bookingID='".$form_data->id."'";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {//EDW tha pekso mpala grami 26 den thes ID thes ola MOVIES omos pws fetch current info? san selected?
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

 $query = "SELECT * FROM (
  SELECT b.*,
  ROW_NUMBER() OVER (PARTITION BY movie_play_fk ORDER BY id) as num
  FROM scheduletable b
) tbl
WHERE num = 1";

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{//EDW tha pekso mpala grami 26 den thes ID thes ola MOVIES omos pws fetch current info? san selected?
$output['movies_l'][] = array($row['movie_play_fk']); 
$output['rest_info_movie'][] = array($row);
}
$query = "SELECT * FROM (
  SELECT b.*,
  ROW_NUMBER() OVER (PARTITION BY theatre_name_fk ORDER BY id) as num
  FROM scheduletable b
) tbl
WHERE num = 1";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{//EDW tha pekso mpala grami 26 den thes ID thes ola MOVIES omos pws fetch current info? san selected?
$output['theatre_l'][] = array($row['theatre_name_fk']);  
}
$query = "SELECT * FROM (
SELECT b.*,
ROW_NUMBER() OVER (PARTITION BY time_play ORDER BY id) as num
FROM scheduletable b
) tbl
WHERE num = 1";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{
$output['rest_info_time'][] = array($row);
}
$query = "SELECT * FROM scheduletable";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{
$output['rest_info_general'][]= array($row);
}
 /*$query = "SELECT * FROM (
      SELECT b.*,
      ROW_NUMBER() OVER (PARTITION BY theatre_name_fk ORDER BY id) as num
      FROM scheduletable b
    ) tbl
    WHERE num = 1";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{//EDW tha pekso mpala grami 26 den thes ID thes ola MOVIES omos pws fetch current info? san selected?
  $output['theatre_l'][] = array($row['theatre_name_fk']);;  
}
$query = "SELECT * FROM (
      SELECT b.*,
      ROW_NUMBER() OVER (PARTITION BY movie_play_fk ORDER BY id) as num
      FROM scheduletable b
    ) tbl
    WHERE num = 1";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{//EDW tha pekso mpala grami 26 den thes ID thes ola MOVIES omos pws fetch current info? san selected?
  $output['movies_l'][] = array($row['movie_play_fk']); 
}

$query = "SELECT * FROM (
      SELECT b.*,
      ROW_NUMBER() OVER (PARTITION BY movie_play_fk ORDER BY id) as num
      FROM scheduletable b
    ) tbl
    WHERE num = 1";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{//EDW tha pekso mpala grami 26 den thes ID thes ola MOVIES omos pws fetch current info? san selected? 
  $output['rest_info_movie'][] = array($row);
}
$query = "SELECT * FROM (
  SELECT b.*,
  ROW_NUMBER() OVER (PARTITION BY time_play ORDER BY id) as num
  FROM scheduletable b
  WHERE movie_play_fk = '".$form_data->movie_name."' AND date_play_fk='".$form_data->date_play."' 
) tbl
WHERE num = 1";
//$statement = $connect->prepare($query);
//$statement->execute();
//$result = $statement->fetchAll();
//foreach($result as $row)
//{//EDW tha pekso mpala grami 26 den thes ID thes ola MOVIES omos pws fetch current info? san selected? 
//$output['rest_info_time'][] = array($row);
//}

/*$query = "SELECT * FROM (
      SELECT b.*,
      ROW_NUMBER() OVER (PARTITION BY date_play_fk ORDER BY id) as num
      FROM scheduletable b
      WHERE movie_play_fk = '".$form_data->movie_name."'
    ) tbl
    WHERE num = 1";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
      $output['date_play'][]= array($row['date_play_fk']);
    }*/ //xrisimopoieis IDIO modal structure opws sto AddData etsi sto FetchSingleData

    /*$query = "SELECT * FROM scheduletable";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
      $output['rest_info_general'][]= array($row);
    }*/

} 
elseif($form_data->action == 'Delete')
{
 $query = "
 DELETE FROM bookingtable WHERE bookingID='".$form_data->id."'
 ";
 $statement = $connect->prepare($query);
 if($statement->execute())
 {
  //$output['message'] = 'Data Deleted';
  $message='Data Deleted';
 }
}
else {
if(empty($form_data->first_name))
{
 $error[] = 'First Name is Required';
}
else
{
 $first_name = $form_data->first_name;
}

if(empty($form_data->last_name))
{
 $error[] = 'Last Name is Required';
}
else
{
 $last_name = $form_data->last_name;
}
          /*  if($form_data->action == 'fetch_single_data' || $form_data->action == 'Edit'){
                  if(empty($form_data->theatre))
            {
            $error[] = 'theatre is Required';
            }
            else
            {
            $theatre =  $form_data->theatre;
            }
            if(empty($form_data->movie_name))
            {
            $error[] = 'movie name is Required';
            }
            else
            {
            $movie_name = $form_data->movie_name;
            }
            }
            elseif($form_data->action == 'Insert' || $form_data->action != 'fetch_single_data'){
            if(empty(implode(" ", $form_data->movie_name)))
            {
            $error[] = 'movie name is Required';
            }
            else
            {
            $movie_name = implode(" ", $form_data->movie_name);
            }

            if(empty(implode(" ",$form_data->theatre)))
            {
            $error[] = 'theatre is Required';
            }
            else
            {
            $theatre =  implode(" ",$form_data->theatre);
            }
            }*/
            if(empty(implode(" ", $form_data->movie_name)))
            {
            $error[] = 'movie name is Required';
            }
            else
            {
            $movie_name = implode(" ", $form_data->movie_name);
            }

            if(empty(implode(" ",$form_data->theatre)))
            {
            $error[] = 'theatre is Required';
            }
            else
            {
            $theatre =  implode(" ",$form_data->theatre);
            }
/*
            if(empty($form_data->theatre))
            {
            $error[] = 'theatre is Required';
            }
            else
            {
            $theatre =  $form_data->theatre;
            }
            if(empty($form_data->movie_name))
            {
            $error[] = 'movie name is Required';
            }
            else
            {
            $movie_name = $form_data->movie_name;
            }
      */

if(empty(implode(" ",$form_data->hall_type)))
{
 $error[] = 'hall is Required';
}
else
{
 $hall_type = implode(" ",$form_data->hall_type);
}

if(empty(implode(" ",$form_data->booking_type)))
{
 $error[] = 'Book Type Name is Required';
}
else
{
 $booking_type = implode(" ",$form_data->booking_type);
}

if(empty(implode(" ",$form_data->date)))
{
 $error[] = 'Date is Required';
}
else
{
 $date = implode(" ",$form_data->date);
}

if(empty(implode(" ",$form_data->time)))
{
 $error[] = 'Time is Required';
}
else
{
 $time = implode(" ",$form_data->time);
}

if(empty($form_data->seatp))
{
 $error[] = 'Seat No is Required';
}
else
{
 $seatp = $form_data->seatp;
}

if(empty($form_data->phone_number))
{
 $error[] = 'Phone is Required';
}
else
{
 $phone_number = $form_data->phone_number;
}

if(empty($form_data->account))
{
 $error[] = 'account Name is Required';
}
else
{
 $account = $form_data->account;
}

if(empty($error))
{
  /*if($form_data->action == 'search_account_seat'){
    $search = mysqli_real_escape_string(mysqli_connect("localhost", "root", "", "cinema_db"), $form_data->search_seats);
  
    $query = "SELECT * FROM bookingtable WHERE seatP LIKE '$search' AND bookingFName='$first_name' AND bookingLName='$last_name' AND bookingPNumber='$phone_number' AND bookingDate_fk='$date' AND bookingTime_fk='$time' AND bookingType_fk='$booking_type' AND bookingTheatreHall_fk='$hall_type' AND bookingTheatre_fk='$theatre' AND movieName_fk='$movie_name'";
  
    $result = mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"), $query);
  
    $queryResult = mysqli_num_rows($result);
  
    if($queryResult > 0){
      $output['seat_available']='Taken';
    }
    else $output['seat_available']='Not Taken';
  }*/
 if($form_data->action == 'Insert')
 {//echo implode(" ", $movie_name);
 // if(empty($form_data->account))
//{
 // $output['error']='account Name is Required'; vs error[] = '...';
//}
  $data = array(
   ':first_name'  => $first_name,
   ':last_name'  => $last_name,
   ':movie_name'  => $movie_name,
   ':theatre'  => $theatre,
   ':hall_type'  => $hall_type,
   ':booking_type'  => $booking_type,
   ':date'  => $date,
   ':time'  => $time,
   ':seatp'  => $seatp,
   ':phone_number'  => $phone_number,
   ':account'  => $account
  );
  $query = "
  INSERT INTO bookingtable 
  (movieName_fk, bookingTheatre_fk, bookingTheatreHall_fk, bookingType_fk, bookingDate_fk, bookingTime_fk, bookingFName, bookingLName, bookingAccount_fk, bookingPNumber, seatP) VALUES 
  (:movie_name, :theatre, :hall_type, :booking_type, :date, :time, :first_name, :last_name, :account, :phone_number, :seatp)
  ";
         $statement = $connect->prepare($query);
  if($statement->execute($data))
  {
   $message = 'Data Inserted';
   //$output['message'] = 'Data Inserted';
   //$output['error']='';
  }
 }

 if($form_data->action == 'Edit')
 {
       //echo $bookingID .'test';//'test'; first_name and other vars ok
       $db=mysqli_connect("localhost", "root", "", "cinema_db");
      
        $query= "SELECT * FROM bookingtable WHERE movieName_fk='".$movie_name."' and bookingTime_fk='".$time."' and bookingDate_fk='".$date."' and bookingTheatre_fk='".$theatre."' and bookingTheatreHall_fk='".$hall_type."' and bookingType_fk='".$booking_type."' and bookingFName='".$first_name."' and bookingLName='".$last_name."' and bookingPNumber='".$phone_number."'";

        $resultt = mysqli_query($db, $query);
        if (mysqli_num_rows($resultt) >= 1) {
            //$output['alert']='Duplicate Record Denied';
            $error[]='Duplicate Record Denied';
            $validation_error = implode(", ", $error);
        } else {
  $data = array(
       ':first_name'  => $first_name,
       ':last_name'  => $last_name,
       ':movie_name'  => $movie_name,
       ':theatre'  => $theatre,
       ':hall_type'  => $hall_type,
       ':booking_type'  => $booking_type,
       ':date'  => $date,
       ':time'  => $time,
       ':seatp'  => $seatp,
       ':phone_number'  => $phone_number,
       ':account'  => $account,
       ':bookingID'   => $form_data->id//$form_data->bookingID//$bookingID//
  );
  $query = "
  UPDATE bookingtable 
  SET movieName_fk = :movie_name, bookingTheatre_fk = :theatre, bookingTheatreHall_fk = :hall_type, bookingType_fk = :booking_type, bookingDate_fk = :date, bookingTime_fk = :time, bookingFName = :first_name, bookingLName = :last_name,  seatP = :seatp, bookingPNumber = :phone_number, bookingAccount_fk = :account
  WHERE bookingID = :bookingID
  ";
  $statement = $connect->prepare($query);
  if($statement->execute($data))
  {
   $message = 'Data Edited';
   //$output['message'] = 'Data Edited';
   //$output['error']='';
  }
  }
 }

} else {
  $validation_error = implode(", ", $error);
 }
 $output = array(
  'error'  => $validation_error,
  'message' => $message//$output['message']//$message
 );
}
echo json_encode($output);
?>
