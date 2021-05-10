<?php
require_once '../../system/fheaderinfo.php';
require_once 'classes/Movies.php';
$moviesTable = new Movies($con, $userLoggedIn);
?>