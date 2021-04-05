<?php 
require_once 'includes/fheaderinfo.php';
require_once 'includes/classes/User.php';
require_once 'includes/classes/Movies.php';
$moviesTable = new Movies($con, $userLoggedIn);
?>


<div class="navbar-brand">
    <a href="index.php">
        <h1 class="navbar-heading">CineSocial</h1>
    </a>
</div>
<div class="navbar-container">
    <nav class="navbar">
        <ul class="navbar-menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="schedule.php">Schedule</a></li>       
            <li><a href="contact-us.php">Contact</a></li>
            <li><a href="includes/handlers/logout.php"><?php
            echo $user['first_name'] . " " . $user['last_name'] . " logout";
            ?>
            </a></li>
        </ul>
    </nav>
</div>
