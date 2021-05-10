<?php
	require '../../system/config.php';
	require '../../system/form_handlers/register_handler.php';
	require '../../system/form_handlers/login_handler.php';
?>

<html>
<head>
	<title>Welcome to CineSocial!</title>

	<link rel="stylesheet" type="text/css" href="../../web/css/register_style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular-sanitize.js"></script>
	<script src="../../web/js/register.js"></script>
</style>
</head>
<body ng-app="liveRegisterApp" ng-controller="liveRegisterController">
	<?php

	if(isset($_POST['register_button'])) {
		echo '<script>
				$(document).ready(function() {
					$("#loginForm").hide();
					$("#registerForm").show();
				});
			</script>';
	}
	else {
		echo '<script>
				$(document).ready(function() {
					$("#loginForm").show();
					$("#registerForm").hide();
				});
			</script>';
	}

	?>
	
	<div id="background">
	
		<div id="loginContainer">
		
			<div id="inputContainer">
				<form id="loginForm" action="register.php" method="POST">
					<h2>Login to your account</h2>
					<p>
						
						<label for="loginUsername">email</label>
						<input id="loginUsername" name="log_email" type="text" placeholder="e.g. example@example.com"
						value="<?php 
						if(isset($_SESSION['log_email'])) {
						echo $_SESSION['log_email'];
					} 
					?>"  required autocomplete="off">
					</p>
					<p>
						<label for="loginPassword">Password</label>
						<input id="loginPassword" name="log_password" type="password" placeholder="Your password" required>
					</p>
					<?php if(in_array("Email or password was incorrect<br>", $error_array)) echo  "Email or password was incorrect<br>"; ?>
					<button type="submit" name="login_button">LOG IN</button>

					<div class="hasAccountText">
						<span id="hideLogin">Don't have an account yet? Signup here.</span>
					</div>
					
				</form>



				<form id="registerForm" action="register.php" method="POST">
					<h2>Create your free account</h2>

					<p>
						<label for="firstName">First name</label>
						<input id="firstName" name="reg_fname" type="text" placeholder="e.g. Michail"
						value="<?php 
						if(isset($_SESSION['reg_fname'])) {
						echo $_SESSION['reg_fname'];
					} 
					?>" required>
					</p>
					<?php if(in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) echo "Your first name must be between 2 and 25 characters<br>"; ?>
					<p>
						
						<label for="lastName">Last name</label>
						<input id="lastName" name="reg_lname" type="text" placeholder="e.g. Markou"
						value="<?php 
						if(isset($_SESSION['reg_lname'])) {
						echo $_SESSION['reg_lname'];
					} 
					?>"  required>
					</p>
					<?php if(in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) echo "Your last name must be between 2 and 25 characters<br>"; ?>
					<p>
						<label for="email">Email</label>
						<input ng-model="account" ng-model-options='{ debounce: 1000 }' ng-change="searchAccount(account)"  id="email" name="reg_email" type="email" placeholder="e.g. michail@gmail.com" value="<?php 
						if(isset($_SESSION['reg_email'])) {
						echo $_SESSION['reg_email'];
					} 
					?>" required><i class="fas fa-user-check" ng-if="accountText == 'EXISTS' || 'NOT EXISTS'"></i>
					</p>	
					<p ng-if="accountText == 'Exists' || 'Not Exists'">{{accountText}}</p>
					<p>

						<label for="email2">Confirm email</label>
						<input id="email2" name="reg_email2" type="email" placeholder="e.g. michail@gmail.com" value="<?php 
						if(isset($_SESSION['reg_email2'])) {
						echo $_SESSION['reg_email2'];
					} 
					?>" required>
					</p>
					<?php if(in_array("Email already in use<br>", $error_array)) echo "Email already in use<br>"; 
					else if(in_array("Invalid email format<br>", $error_array)) echo "Invalid email format<br>";
					else if(in_array("Emails don't match<br>", $error_array)) echo "Emails don't match<br>"; ?>

					<p>
						<label for="password">Password</label>
						<input id="password" name="reg_password" type="password" placeholder="Your password" required>
					</p>

					<p>
						<label for="password2">Confirm password</label>
						<input id="password2" name="reg_password2" type="password" placeholder="Your password" required>
					</p>
					<?php if(in_array("Your passwords do not match<br>", $error_array)) echo "Your passwords do not match<br>"; 
					else if(in_array("Your password can only contain english characters or numbers<br>", $error_array)) echo "Your password can only contain english characters or numbers<br>";
					else if(in_array("Your password must be betwen 5 and 30 characters<br>", $error_array)) echo "Your password must be betwen 5 and 30 characters<br>"; ?>
					<button type="submit" name="register_button">SIGN UP</button>

					<?php if(in_array("<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>", $error_array)) echo "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>"; ?>

					<div class="hasAccountText">
						<span id="hideRegister">Already have an account? Log in here.</span>
					</div>
					
				</form>


			</div>

			<div id="loginText">
				<h1 style="color:#3498db">Get great Movies, right now</h1>
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
<script src="../controllers/liveRegisterApp.js"></script>