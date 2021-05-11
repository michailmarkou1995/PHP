<?php
$error_array = array(); //Holds error messages
require '../../system/config.php';
require '../../system/form_handlers/login_handleradmin.php';
?>

<html>

<head>
	<title>Login admin</title>

	<link rel="stylesheet" type="text/css" href="../../web/css/register_style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="../../web/js/register.js"></script>
</head>

<body>
	<?php


	echo '<script>
				$(document).ready(function() {
					$("#loginForm").show();
					$("#registerForm").hide();
				});
			</script>';
	?>


	<div id="background">

		<div id="loginContainer">

			<div id="inputContainer">
				<form id="loginForm" action="loginadmin.php" method="POST">
					<h2>Restricted personnel only</h2>
					<p>

						<label for="loginUsername">admin username</label>
						<input id="loginUsername" name="log_user" type="text" placeholder="e.g. admin" required autocomplete="off">
					</p>
					<p>
						<label for="loginPassword">Password</label>
						<input id="loginPassword" name="log_password" type="password" placeholder="e.g admin no seriously" required>
					</p>
					<?php if (in_array("username or password was incorrect<br>", $error_array)) echo  "Email or password was incorrect<br>"; ?>
					<button type="submit" name="login_button" onclick="">LOG IN</button>

				</form>


			</div>

			<div id="loginText">
				<h1>Get great Movies, right now</h1>
				<h2>Book to loads of movies</h2>
				<ul>
					<li>Discover movies you'll fall in love with</li>
					<li>share with friends</li>
					<li>Follow artists to keep up to date</li>
				</ul>
			</div>

		</div>
	</div>

</body>

</html>