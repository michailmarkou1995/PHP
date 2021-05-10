<?php  
 $connect = mysqli_connect("localhost", "root", "", "cinema_db");  
 $output = array();  
 $query = "SELECT * FROM test ORDER BY id DESC";  
 $result = mysqli_query($connect, $query);  
 while($row = mysqli_fetch_array($result))  
 {  
      $output[] = $row;  
 }  
 echo json_encode($output);  
 ?>  