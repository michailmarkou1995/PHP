<?php

if (strpos($_SERVER['REQUEST_URI'], "booking.php") !== false){
    include("config/config.php");
    include("includes/classes/User.php");
    }
else
{
    include("../config/config.php");
    include("../includes/classes/User.php");
}


class Admin extends User {
    private static $admcon;
    public function __construct(){
        $this->initConAdmin();
    }
    public static function initConAdmin() {
        if (isset($_SESSION['usernamea'])) {
            $adminLoggedIn = $_SESSION['usernamea'];
            $user_details_query = mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"), "SELECT * FROM admins WHERE username='$adminLoggedIn'");
            $user = mysqli_fetch_array($user_details_query);
            self::$admcon = $adminLoggedIn;
            //echo self::$admcon;
        }
        else {
            header("Location: ../loginadmin.php");
        }
    }
    public static function verifyConAdmin() {
        if (self::$admcon == 'admin') {
           return true;
    }
    }
}
?>