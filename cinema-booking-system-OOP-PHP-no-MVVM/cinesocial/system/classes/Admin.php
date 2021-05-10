<?php

if (strpos($_SERVER['REQUEST_URI'], "booking.php") !== false){
    include("../../system/config.php");
    include("../../system/classes/User.php");
    }
    
elseif (strpos($_SERVER['REQUEST_URI'], "deleteBooking.php") == true){
    include("../../system/config.php");
    include("../../system/classes/User.php");
    }
else
{
    include("../../../system/config.php");
    include("../../../system/classes/User.php");
}


class Admin extends User {
    private static $admcon;
    private static $searchRes;
    private $user;

    public function __construct(){
        $this->initConAdmin();
    }
    public static function initConAdmin() {
        if (isset($_SESSION['usernamea'])) {
            $adminLoggedIn = $_SESSION['usernamea'];
            $user_details_query = mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"), "SELECT * FROM admins WHERE username='$adminLoggedIn'");
            $user = mysqli_fetch_array($user_details_query);
            self::$admcon = $adminLoggedIn;
        }
        else {
            header("Location: ../loginadmin.php");
        }
    }

    public function initConAdminA() {
        if (isset($_SESSION['usernamea'])) {
            $adminLoggedIn = $_SESSION['usernamea'];
            $user_details_query = mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"), "SELECT * FROM admins WHERE username='$adminLoggedIn'");
            $this->user = mysqli_fetch_array($user_details_query);
            self::$admcon = $adminLoggedIn;
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
    public function getSearch() {
        if (isset($_POST['submit']))
        {
            $search = mysqli_real_escape_string(User::getConS(), $_POST['search-db']); //sql injection safe data type data
            $sql="SELECT * FROM bookingTable WHERE bookingFName LIKE '%$search%' OR bookingLName LIKE '%$search%' OR bookingLName LIKE '%$search%' OR bookingLName LIKE '%$search%'";
            $result = mysqli_query(User::getConS(), $sql);
            //or die(mysqli_error(User::getConS()));
            $queryResult = mysqli_num_rows($result);
            //echo "There are ". $queryResult." results!";
            self::$searchRes = "<div style='color:red;'><b>There are ". $queryResult." results!</b></div>"; //div in div letter specific change?
           // $this->getResMsg();
            Admin::getResMsg();
            if($queryResult > 0){
                while($row = mysqli_fetch_assoc($result))
                {
                    UpdateHandlings::getTicketsAdmin($row);
                }
            } else { echo 'There are no Results matching your Search';}
        }
    }
    public static function getResMsg(){//POLLES MATSAKWNIES STRWSE TA FUNCTIONS ta xis dipla tripla ksana idio kwdika FTIAXTA OLA!!!!!!!!!!!!!!!!!!!!!!!! <------ SOS
        echo self::$searchRes;
    }
    public function getSessionUser(){
        if (isset($_SESSION['usernamea'])) {
            $adminLoggedIn = $_SESSION['usernamea'];
            $user_details_query = mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"), "SELECT * FROM admins WHERE username='$adminLoggedIn'");
            $this->user = mysqli_fetch_array($user_details_query);
            self::$admcon = $adminLoggedIn;
        }
        else {
            header("Location: ../loginadmin.php");
        }
        return $this->user['username'];
    }
}
?>