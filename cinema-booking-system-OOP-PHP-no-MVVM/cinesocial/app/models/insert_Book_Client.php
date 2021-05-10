<?php

//insert.php

$connect = new PDO("mysql:host=localhost;dbname=cinema_db", "root", "");

$form_data = json_decode(file_get_contents("php://input"));

$error = array();
$message = '';
$validation_error = '';
$alertB='';
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

if(empty($form_data->movie_name))
{
 $error[] = 'movie name is Required';
}
else
{
 $movie_name = $form_data->movie_name;
}

if(empty($form_data->theatre))
{
 $error[] = 'theatre is Required';
}
else
{
 $theatre = $form_data->theatre;
}

if(empty($form_data->hall_type))
{
 $error[] = 'hall is Required';
}
else
{
 $hall_type = $form_data->hall_type;
}

if(empty($form_data->booking_type))
{
 $error[] = 'Book Type Name is Required';
}
else
{
 $booking_type = $form_data->booking_type;
}

if(empty($form_data->date))
{
 $error[] = 'Date is Required';
}
else
{
 $date = $form_data->date;
}

if(empty($form_data->time))
{
 $error[] = 'Time is Required';
}
else
{
 $time = $form_data->time;
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

if (empty($error)) {
    if ($form_data->action == 'Insert') {
        $db=mysqli_connect("localhost", "root", "", "cinema_db");
      
        $query= "SELECT * FROM bookingtable WHERE movieName_fk='".$form_data->movie_name."' and bookingTime_fk='".$form_data->time."' and bookingDate_fk='".$form_data->date."' and bookingTheatre_fk='".$form_data->theatre."' and bookingTheatreHall_fk='".$form_data->hall_type."' and bookingType_fk='".$form_data->booking_type."' and bookingFName='".$form_data->first_name."' and bookingLName='".$form_data->last_name."' and bookingPNumber='".$form_data->phone_number."'";

        $resultt = mysqli_query($db, $query);
        if (mysqli_num_rows($resultt) >= 1) {
            //$output['alert']='Duplicate Record Denied';
            $alertB='Duplicate Record Denied';
        } else {
              //else $alertB='LOL';
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
            if ($statement->execute($data)) {
                $message = 'Data Inserted';
            }
        }
    }
}else {
      $validation_error = implode(", ", $error);
}
 $output = array(
       'error'  => $validation_error,
       'message' => $message,
       'alertB' => $alertB
      );
echo json_encode($output);
?>
