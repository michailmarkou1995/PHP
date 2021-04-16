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
    private static $searchRes;

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
    public static function verifyConAdmin() {
        if (self::$admcon == 'admin') {
           return true;
    }
    }
    public function getSearch() {
        if (isset($_POST['submit']))
        {
            $search = mysqli_real_escape_string(User::getConS(), $_POST['search-db']); //sql injection safe data type data
            $sql="SELECT * FROM bookingTable WHERE bookingFName LIKE '%$search%' OR bookingLName LIKE '%$search%'";
            $result = mysqli_query(User::getConS(), $sql);
            $queryResult = mysqli_num_rows($result);
            //echo "There are ". $queryResult." results!";
            self::$searchRes = "<div style='color:red;'><b>There are ". $queryResult." results!</b></div>"; //div in div letter specific change?
           // $this->getResMsg();
            Admin::getResMsg();
            if($queryResult > 0){
                while($row = mysqli_fetch_assoc($result))
                {
                    echo "<div class=\"admin-panel-section-booking-item\">\n";
    echo "                            <div class=\"admin-panel-section-booking-response\">\n";
    echo "                                <i class=\"fas fa-check accept-booking\" title=\"Verify booking\"></i>\n";
    echo "                                <a href='deleteBooking.php?id=".$row['bookingID']."'><i class=\"fas fa-times decline-booking\" title=\"Reject booking\"></i></a>\n";
    echo "                            </div>\n";
    echo "                            <div class=\"admin-panel-section-booking-info\">\n";
    echo "                                <div>\n";
    echo "                                    <h3>". $row['movieName'] ."</h3>\n";
    echo "                                    <i class=\"fas fa-circle \"></i>\n";
    echo "                                    <h4>". $row['bookingTheatre'] ."</h4>\n";
    echo "                                    <i class=\"fas fa-circle \"></i>\n";
    echo "                                    <h4>". $row['bookingDate'] ."</h4>\n";
    echo "                                    <i class=\"fas fa-circle \"></i>\n";
    echo "                                    <h4>". $row['bookingTime'] ."</h4>\n";
    echo "                                </div>\n";
    echo "                                <div>\n";
    echo "                                    <h4>". $row['bookingFName'] ." ". $row['bookingLName'] . " Seat No ". $row['seatP'] ."</h4>\n";
    echo "                                    <i class=\"fas fa-circle\"></i>\n";
    echo "                                    <h4>". $row['bookingPNumber'] ."</h4>\n";
    echo "                                </div>\n";
    echo "                            </div>\n";
    echo "                        </div>";
                }
            } else { echo 'There are no Results matching your Search';}
        }
    }
    public static function getResMsg(){
        echo self::$searchRes;
    }
}
?>