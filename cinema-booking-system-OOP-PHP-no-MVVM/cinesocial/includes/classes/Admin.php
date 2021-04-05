<?php
require '../config/config.php';
require '../includes/classes/User.php';

class Admin extends User {
//overloading? kai kane kati me to idio session drop kapws 
    public function __construct(){
        $this->initConAdmin();
    }
    public function initConAdmin() {
        if (isset($_SESSION['usernamea'])) {
            $adminLoggedIn = $_SESSION['usernamea'];
            $user_details_query = mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"), "SELECT * FROM admins WHERE username='$adminLoggedIn'");
            $user = mysqli_fetch_array($user_details_query);
        }
        else {
            header("Location: ../loginadmin.php");
        }
    }
}
?>