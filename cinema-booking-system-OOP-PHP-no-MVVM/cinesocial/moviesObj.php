<?php
require_once 'includes/fheaderinfo.php';
require_once 'includes/classes/Movies.php';
$moviesTable = new Movies($con, $userLoggedIn);
?>