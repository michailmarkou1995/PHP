<?php
include("../../system/classes/Updatehandling.php");
//insert.php

$connect = new PDO("mysql:host=localhost;dbname=cinema_db", "root", "");

$form_data = json_decode(file_get_contents("php://input"));

$error = array();
$validation_error = '';
$message = '';
$movieImgCover = '';
$movieImgPrev = '';
$movieTitle = '';
$movieGenre = '';
$movieDuration = '';
$movieRelDate = '';
$movieDirector = '';
$movieActors = '';
$urlPath = '';
$admin_fk = '';
$movieImgCovericon = '';
$movieImgPrevicon = '';

if($form_data->action == 'fetch_single_data')
{
 $query = "SELECT * FROM movietable WHERE movieID='".$form_data->id."'";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output['movieTitle'] = $row['movieTitle'];
  $output['movieGenre'] = $row['movieGenre'];
  $output['movieDuration'] = $row['movieDuration'];
  $output['movieRelDate'] = $row['movieRelDate'];
  $output['movieDirector'] = $row['movieDirector'];
  $output['movieActors'] = $row['movieActors'];
  $output['urlPath'] = $row['urlPath'];
  $output['movieImgCover'] = $row['movieImgCover'];
  $output['movieImgPrev'] = $row['movieImgPrev'];
 }
 //echo json_encode($output);
} 
elseif($form_data->action == 'Delete')
{
 $query = "SELECT * FROM movietable WHERE movieID='".$form_data->id."'";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
      $file_pointer = "" . $row['movieImgCover'];//../
      $file_pointer1 = "" . $row['movieImgPrev'];//../
 }
 UpdateHandlings::del_addPictureCovers($file_pointer);
 UpdateHandlings::del_addPictureCovers($file_pointer1);

 $query = "
 DELETE FROM movietable WHERE movieID='".$form_data->id."'
 ";
 $statement = $connect->prepare($query);
 if($statement->execute())
 {
  $output['message'] = 'Data Deleted';
 }
}
else {
if(empty($form_data->movieTitle))
{
 $error[] = 'movie Title is Required';
}
else
{
 $movieTitle = $form_data->movieTitle;
}

if(empty($form_data->movieGenre))
{
 $error[] = 'movie Genre is Required';
}
else
{
 $movieGenre = $form_data->movieGenre;
}

if(empty($form_data->movieDuration))
{
 $error[] = 'movie Duration is Required';
}
else
{
 $movieDuration = $form_data->movieDuration;
}

if(empty($form_data->movieRelDate))
{
 $error[] = 'movie RelDate is Required';
}
else
{
 $movieRelDate = $form_data->movieRelDate;
}

if(empty($form_data->movieDirector))
{
 $error[] = 'movie Director is Required';
}
else
{
 $movieDirector = $form_data->movieDirector;
}

if(empty($form_data->movieActors))
{
 $error[] = 'movie Actors Name is Required';
}
else
{
 $movieActors = $form_data->movieActors;
}

if(empty($form_data->urlPath))
{
 $error[] = 'url Path is Required';
}
else
{
 $urlPath = $form_data->urlPath;
}

if(empty($error))
{
 if($form_data->action == 'Insert')
 {
  $data = array(
   ':movieTitle'  => $movieTitle,
   ':movieGenre'  => $movieGenre,
   ':movieDuration'  => $movieDuration,
   ':movieRelDate'  => $movieRelDate,
   ':movieDirector'  => $movieDirector,
   ':movieActors'  => $movieActors,
   ':urlPath'  => $urlPath
  );
  $dataname = array(
      ':movieImgCovericon'  => $movieImgCovericon,
      ':movieImgPrevicon'  => $movieImgPrevicon
     );
  $query = "
  INSERT INTO movietable 
  (movieTitle, movieGenre, movieDuration, movieRelDate, movieDirector, movieActors, urlPath, admin_fk) VALUES 
  (:movieTitle, :movieGenre, :movieDuration, :movieRelDate, :movieDirector, :movieActors, :urlPath, 'admin')
  ";
         $statement = $connect->prepare($query);
  if($statement->execute($data))
  {
   $message = 'Data Inserted';
  }
 }

 if($form_data->action == 'Edit')
 {
  $data = array(
       ':movieImgCover'  => $movieImgCover,
       ':movieImgPrev'  => $movieImgPrev,
       ':movieTitle'  => $movieTitle,
       ':movieGenre'  => $movieGenre,
       ':movieDuration'  => $movieDuration,
       ':movieRelDate'  => $movieRelDate,
       ':movieDirector'  => $movieDirector,
       ':movieActors'  => $movieActors,
       ':urlPath'  => $urlPath,
       ':movieID'   => $form_data->id
  );
  $query = "
  UPDATE movietable 
  SET movieImgCover = :movieImgCover, movieImgPrev = :movieImgPrev, movieTitle = :movieTitle, movieGenre = :movieGenre, movieDuration = :movieDuration, movieRelDate = :movieRelDate, movieDirector = :movieDirector, movieActors = :movieActors, urlPath = :urlPath
  WHERE movieID = :movieID
  ";
  $statement = $connect->prepare($query);
  if($statement->execute($data))
  {
   $output['message'] = 'Data Edited';
  }
 }
} else {
  $validation_error = implode(", ", $error);
 }
 $output = array(
       'error'  => $validation_error,
       'message' => $message
      );
}

echo json_encode($output);
