<?php  

if(isset($_POST['login_button'])) {

	$usern = ($_POST['log_user']);

	$_SESSION['log_user'] = $usern; //Store email into session variable 
	$password= $_POST['log_password'];//Get password
	

	$check_database_query = mysqli_query($con, "SELECT * FROM admins WHERE username='$usern' AND password='$password'");
	$check_login_query = mysqli_num_rows($check_database_query);

	if($check_login_query == 1) {
		$row = mysqli_fetch_array($check_database_query);
		$username = $row['username'];

		$_SESSION['usernamea'] = $username;
		header("Location: admin/admin.php");
		exit();
	}
	else {
		array_push($error_array, "username or password was incorrect<br>");
	}


}

?>