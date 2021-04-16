<?php

if (strpos($_SERVER['REQUEST_URI'], "admin.php") !== false){
    }
else if (strpos($_SERVER['REQUEST_URI'], "trailers.php") !== false){}
else if (strpos($_SERVER['REQUEST_URI'], "bookingAdmin.php") !== false){}
else if (strpos($_SERVER['REQUEST_URI'], "scheduleAdmin.php") !== false){}
else if (strpos($_SERVER['REQUEST_URI'], "moviesAdmin.php") !== false){}
else
{
    include("includes/classes/Admin.php");
}

class Booking  {
    private $row;
    private $isReservedSeat=false;

    public function __construct(){
        $this->getCon();
        $this->fetchbookingTable();
        $this->getbookingNo();
        $this->getMessageNo();
        $this->getMoviesNo();
    }

    public function getCon() {
        return mysqli_connect("localhost", "root", "", "cinema_db");
    }
    public function fetchbookingTable() {
        return "SELECT * FROM bookingTable ORDER BY bookingID DESC";
    }//reverse order selection

    public function getbookingNo() {
        return mysqli_num_rows(mysqli_query($this->getCon(), $this->fetchbookingTable()));
    }

    public function getMessageNo() {
        return mysqli_num_rows(mysqli_query($this->getCon(), "SELECT * FROM feedbackTable"));
    }

    public function getMoviesNo() {
        return mysqli_num_rows(mysqli_query($this->getCon(), "SELECT * FROM movieTable"));
    }
    public function handleBookings() {
        if($result = mysqli_query($this->getCon(), $this->fetchbookingTable())){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
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
                mysqli_free_result($result);
            } else{
                echo '<h4 class="no-annot">No Bookings right now</h4>';
            }
        } else{
            echo "ERROR: Could not able to execute $this->fetchbookingTable(). " . mysqli_error($bookTable->getCon());
        }
    }

    public function handleBookingsTop() {
        if($result = mysqli_query($this->getCon(), $this->fetchbookingTable())){
            if(mysqli_num_rows($result) > 0){
                for($i = 0; $i < 5; $i++){
                    $row = mysqli_fetch_array($result);
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
                mysqli_free_result($result);
            } else{
                echo '<h4 class="no-annot">No Bookings right now</h4>';
            }
        } else{
            echo "ERROR: Could not able to execute $this->fetchbookingTable(). " . mysqli_error($bookTable->getCon());
        }
    }

    public static function addMovie(){
        $fileNameNewCover="";
        $fileNameNewPrev="";
        if(isset($_POST['submitval'])){
            $fileCover = $_FILES['movieImgCover'];
            $filePrev = $_FILES['movieImgPrev'];
            //print_r($fileCover); //assoc array
            $filenameCover = $_FILES['movieImgCover']['name'];
            $filenameCoverTmp = $_FILES['movieImgCover']['tmp_name'];
            $filenameCoverSize = $_FILES['movieImgCover']['size'];
            $filenameCoverError = $_FILES['movieImgCover']['error'];
            $filenameCoverType = $_FILES['movieImgCover']['type'];

            $fileCoverExt = explode('.', $filenameCover);
            $fileCoverActualExt = strtolower(end($fileCoverExt));

            $allowed = array('jpg','jpeg','png');

            if(in_array($fileCoverActualExt, $allowed)){
                if($filenameCoverError === 0){
                    if($filenameCoverSize < 900000)
                    {//".$_POST["movieTitle"]." .
                        $fileNameNewCover = $_POST["movieTitle"]. ".". uniqid('', true).  "." . $fileCoverActualExt;
                        $fileDestinationCover = '../assets/images/movieTableCover/' . $fileNameNewCover;
                        move_uploaded_file($filenameCoverTmp, $fileDestinationCover);
                        //header(Location: admin.php?uploadsuccess);
                    }
                    else 
                    {
                        echo "File size too BIG!";
                    }
                } else {
                    echo "There was an error uploading your file!";
                }
            } else {
                echo "You cannot upload files of this type!";
            }

            $filenamePrev = $_FILES['movieImgPrev']['name'];

            $filenamePrevTmp = $_FILES['movieImgPrev']['tmp_name'];
            $filenamePrevSize = $_FILES['movieImgPrev']['size'];
            $filenamePrevError = $_FILES['movieImgPrev']['error'];
            $filenamePrevType = $_FILES['movieImgPrev']['type'];

            $filePrevExt = explode('.', $filenamePrev);
            $filePrevActualExt = strtolower(end($filePrevExt));

            $allowed = array('jpg','jpeg','png');

            if(in_array($filePrevActualExt, $allowed)){
                if($filenamePrevError === 0){
                    if($filenamePrevSize < 900000)
                    {//".$_POST["movieTitle"]." .
                        $fileNameNewPrev = $_POST["movieTitle"]. ".". uniqid('', true).  "." . $filePrevActualExt;
                        $fileDestinationPrev = '../assets/images/movieTablePrev/' . $fileNameNewPrev;
                        move_uploaded_file($filenamePrevTmp, $fileDestinationPrev);
                        //header(Location: admin.php?uploadsuccess);
                    }
                    else 
                    {
                        echo "File size too BIG!";
                    }
                } else {
                    echo "There was an error uploading your file!";
                }
            } else {
                echo "You cannot upload files of this type!";
            }
//.$_POST['movieImgPrev'].
            $insert_query = "INSERT INTO 
            movieTable (  movieImgCover,
                          movieImgPrev,
                            movieTitle,
                            movieGenre,
                            movieDuration,
                            movieRelDate,
                            movieDirector,
                            movieActors,
                            urlPath)
            VALUES (        'assets/images/movieTableCover/".$fileNameNewCover."',
                             'assets/images/movieTablePrev/".$fileNameNewPrev."',
                            '".$_POST["movieTitle"]."',
                            '".$_POST["movieGenre"]."',
                            '".$_POST["movieDuration"]."',
                            '".$_POST["movieRelDate"]."',
                            '".$_POST["movieDirector"]."',
                            '".$_POST["movieActors"]."',
                            '".$_POST["url"]."')";
            mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"),$insert_query);



            header("Location: admin.php?uploadsuccess");
            echo '<meta http-equiv="refresh" content="0">';
        }   
    }
    public static function delBooking(){
        $id = $_GET['id'];
        $link = mysqli_connect("localhost", "root", "", "cinema_db");
       
        $sql = "DELETE FROM bookingTable WHERE bookingID = $id"; 
        if ($link->query($sql) === TRUE) {
            header('Location: admin.php');
            exit;
        } else {
            echo "Error deleting record: " . $link->error;
        }
    }
    
     public function getSeats($numseat, $moviesT) //supports only seat availability with no Theatre halls checking
    {
        if($result = mysqli_query($this->getCon(), $this->fetchbookingTable())){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                   if ($row[9] == $numseat && $moviesT == $row[1]){
                    echo ' reserved seat';
                    //echo $this->isReservedSeat;
                }
                } 
                mysqli_free_result($result);
            }
        }
    }

    public function isReserved($numseat, $moviesT)
    {
        if($result = mysqli_query($this->getCon(), $this->fetchbookingTable())){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                   if ($row[9] == $numseat && $moviesT == $row[1]){
                    $this->isReservedSeat=true;
                    return $this->isReservedSeat;
                } else {$this->isReservedSeat=false; 
                    //return $this->isReservedSeat;
                       }
                } 
                mysqli_free_result($result);
            }
        }
        //return true;
    }

    public function setSeatSelection($moviesTable)
    {
       echo '<option value="" disabled selected>Seat</option>';
       echo '<option value="1">1' . " " . $this->getSeats(1,$moviesTable->getMovieTitle()) . '</option>';
       echo '<option value="2">2' . $this->getSeats(2,$moviesTable->getMovieTitle()) . '</option>';
       echo '<option value="3">3' . $this->getSeats(3,$moviesTable->getMovieTitle()) . '</option>';
       echo '<option value="4">4' . $this->getSeats(4,$moviesTable->getMovieTitle()) . '</option>';
       echo '<option value="5">5' . $this->getSeats(5,$moviesTable->getMovieTitle()) . '</option>';
      // echo '<option value="6">'. $moviesTable->getMovieTitle() .'</option>';
    }
    
    public function getMovieTheatre()//future work for per theatre check availability?
    {
        if($result = mysqli_query($this->getCon(), $this->fetchbookingTable())){
            if(mysqli_num_rows($result) > 0){
                while($this->row = mysqli_fetch_array($result)){
                    return $this->row['bookingTheatre'];
                } 
                mysqli_free_result($result);
            }
        }
        
    }
}
?>
