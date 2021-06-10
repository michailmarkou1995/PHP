<?php
class UpdateHandlings {
        private static $fileNameNewCover;
        private static $fileNameNewPrev;
        private static $selectedScheduleViewDate=false;
        public static $rows = array();
        public static $rowss;

        public static function getAdminSideBar(){
           echo '<div class="admin-section admin-section1 ">
            <ul>
                <li><i class="fas fa-sliders-h"></i><a href="admin.php">Dashboard </a><i class="fas admin-dropdown fa-chevron-right"></i></li>
                <li><i class="fas fa-ticket-alt"></i><a href="bookingAdmin.php">Bookings</a> <i class="fas admin-dropdown fa-chevron-right"></i></li>
                <li class="admin-navigation-schedule"><i class="fas fa-calendar-alt"></i><a href="scheduleAdmin.php">Schedule <i
                        class="fas admin-dropdown fa-chevron-right"></i>
                </li>
                <li><i class="fas fa-film"></i><a href="moviesAdmin.php">Movies <i class="fas admin-dropdown fa-chevron-right"></i></li>
                <li><i class="fas fa-envelope-open-text"></i><a href="messagesAdmin.php">Messages</a> <i class="fas admin-dropdown fa-chevron-right"></i></li>
            </ul>
        </div>';
        }
        public static function getTicketsAdmin($row)
        {
                echo "<div class=\"admin-panel-section-booking-item\">\n";
                    echo "                            <div class=\"admin-panel-section-booking-response\">\n";
                    echo "                                <i class=\"fas fa-check accept-booking\" title=\"Verify booking\"></i>\n";
                    echo "                                <a href='../../models/deleteBooking.php?id=".$row['bookingID']."'><i class=\"fas fa-times decline-booking\" title=\"Reject booking\"></i></a>\n";
                    echo "                            </div>\n";
                    echo "                            <div class=\"admin-panel-section-booking-info\">\n";
                    echo "                                <div>\n";
                    echo "                                    <h3>". $row['movieName_fk'] ."</h3>\n";
                    echo "                                    <i class=\"fas fa-circle \"></i>\n";
                    echo "                                    <h4>". $row['bookingTheatre_fk'] ."</h4>\n";
                    echo "                                    <i class=\"fas fa-circle \"></i>\n";
                    echo "                                    <h4>". $row['bookingDate_fk'] ."</h4>\n";
                    echo "                                    <i class=\"fas fa-circle \"></i>\n";
                    echo "                                    <h4>". $row['bookingTime_fk'] ."</h4>\n";
                    echo "                                </div>\n";
                    echo "                                <div>\n";
                    echo "                                    <h4>". $row['bookingFName'] ." ". $row['bookingLName'] . " Seat No ". $row['seatP'] ."</h4>\n";
                    echo "                                    <i class=\"fas fa-circle\"></i>\n";
                    echo "                                    <h4>". $row['bookingPNumber'] ."</h4>\n";
                    echo "                                </div>\n";
                    echo "                            </div>\n";
                    echo "                        </div>";
        }
        public static function conDb($sql){
                //your connection to the db and query would go here
		$con=User::getConS();
                if (mysqli_connect_errno())
                 {
                       echo "Failed to connect to MySQL: " . mysqli_connect_error();
                 }
               
            //$sql = "SELECT * FROM movieTable";
            $result = mysqli_query($con, $sql);
            return $result;
        }
        public static function addPictureCovers($movieImgCover, $movieImgPrev, $movieTitle)
        {
            /* may need to flush before call this function
            $fileNameNewCover="";
            $fileNameNewPrev=""; 
            */
            $fileNameNewCover="";
            $fileNameNewPrev=""; 
    
            $fileCover = $_FILES[$movieImgCover];//add parameters on TOP of FUNC here for changed NAMES if so
            $filePrev = $_FILES[$movieImgPrev];
            //print_r($fileCover); //assoc array
            $filenameCover = $_FILES[$movieImgCover]['name'];
            $filenameCoverTmp = $_FILES[$movieImgCover]['tmp_name'];
            $filenameCoverSize = $_FILES[$movieImgCover]['size'];
            $filenameCoverError = $_FILES[$movieImgCover]['error'];
            $filenameCoverType = $_FILES[$movieImgCover]['type'];
    
            $fileCoverExt = explode('.', $filenameCover);
            $fileCoverActualExt = strtolower(end($fileCoverExt));
    
            $allowed = array('jpg','jpeg','png');
    
            if(in_array($fileCoverActualExt, $allowed)){
                if($filenameCoverError === 0){
                    if($filenameCoverSize < 900000)
                    {//".$_POST["movieTitle"]." .
                        self::$fileNameNewCover = $_POST[$movieTitle]. ".". uniqid('', true).  "." . $fileCoverActualExt;
                        $fileDestinationCover = '../../../web/images/movieTableCover/' . self::$fileNameNewCover;
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
    
            $filenamePrev = $_FILES[$movieImgPrev]['name'];
    
            $filenamePrevTmp = $_FILES[$movieImgPrev]['tmp_name'];
            $filenamePrevSize = $_FILES[$movieImgPrev]['size'];
            $filenamePrevError = $_FILES[$movieImgPrev]['error'];
            $filenamePrevType = $_FILES[$movieImgPrev]['type'];
    
            $filePrevExt = explode('.', $filenamePrev);
            $filePrevActualExt = strtolower(end($filePrevExt));
    
            $allowed = array('jpg','jpeg','png');
    
            if(in_array($filePrevActualExt, $allowed)){
                if($filenamePrevError === 0){
                    if($filenamePrevSize < 900000)
                    {
                        self::$fileNameNewPrev = $_POST[$movieTitle]. ".". uniqid('', true).  "." . $filePrevActualExt;
                        $fileDestinationPrev = '../../../web/images/movieTablePrev/' . self::$fileNameNewPrev;
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
        }
    
        public static function mov_addPictureCovers(){
            
        }
    
        public static function del_addPictureCoversx($file_pointer){
            if (!unlink($file_pointer)) { 
                echo ("$file_pointer from Drive cannot be deleted due to an error");
                echo"\r\n"; 
            } 
            else { 
                echo ("$file_pointer from Drive has been deleted");
                echo"\r\n"; 
            } 
            if (!unlink($file_pointer1)) { 
                echo ("$file_pointer1 from Drive cannot be deleted due to an error"); 
                echo"\r\n";
            } 
            else { 
                echo ("$file_pointer1 from Drive has been deleted");
                echo"\r\n"; 
            } 
        }
    
        public static function del_addPictureCovers($file_pointer){
        if (!unlink($file_pointer)) { 
            echo ("$file_pointer from Drive cannot be deleted due to an error");
            echo"\r\n"; 
        } 
        else { 
            echo ("$file_pointer from Drive has been deleted");
            echo"\r\n"; 
    } 
     
    }
    public static function addMovie(){
        self::$fileNameNewCover="";
        self::$fileNameNewPrev="";
        if(isset($_POST['submitval'])){
                UpdateHandlings::addPictureCovers('movieImgCover', 'movieImgPrev', 'movieTitle');
            $insert_query = "INSERT INTO 
            movieTable (  movieImgCover,
                          movieImgPrev,
                            movieTitle,
                            movieGenre,
                            movieDuration,
                            movieRelDate,
                            movieDirector,
                            movieActors,
                            urlPath,
                            admin_fk)
            VALUES (        '../../web/images/movieTableCover/".self::$fileNameNewCover."',
                             '../../web/images/movieTablePrev/".self::$fileNameNewPrev."',
                            '".$_POST["movieTitle"]."',
                            '".$_POST["movieGenre"]."',
                            '".$_POST["movieDuration"]."',
                            '".$_POST["movieRelDate"]."',
                            '".$_POST["movieDirector"]."',
                            '".$_POST["movieActors"]."',
                            '".$_POST["url"]."',
                            'admin')";
            mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"),$insert_query);


            self::$fileNameNewCover="";
            self::$fileNameNewPrev="";
            header("Location: admin.php?uploadsuccess");
            echo '<meta http-equiv="refresh" content="0">';
        }   
    }
    public static function addTheatre(){
        if(isset($_POST['submitTheatre'])){
            $insert_query = "INSERT INTO 
            theatretable (  tName_pk,
                            tHalls,
                            tAvailable,
                            admin_tk)
            VALUES (
                            '".$_POST["tName"]."',
                            '".$_POST["tHalls"]."',
                            '1',
                            '".$_SESSION['usernamea']."')";
            mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"),$insert_query);

            header("Location: scheduleAdmin.php?TheatreSuccess");
            echo '<meta http-equiv="refresh" content="0">';
        }
    }
    public static function addHalls(){
        if(isset($_POST['submitHall'])){
            $insert_query = "INSERT INTO 
            hallstable (    tName_fk ,
                            date_added,
                            removed,
                            hallName,
                            hallType,
                            seatsAvailable,
                            hall_id)
            VALUES (
                            '".$_POST["tName_fk"]."',
                            '2020-10-10',
                            'no',
                            '".$_POST["hallName"]."',
                            '".$_POST["hallType"]."',
                            '".$_POST["seatsAvailable"]."',
                            '1')";
            mysqli_query(mysqli_connect("localhost", "root", "", "cinema_db"),$insert_query);

            header("Location: scheduleAdmin.php?HallSucceed");
            echo '<meta http-equiv="refresh" content="0">';
        }
    }

    public static function getTheatreList(){
        $db=mysqli_connect("localhost", "root", "", "cinema_db");
        $query = "SELECT tName_pk FROM theatretable";
        $resultt = mysqli_query($db,$query);
        if(mysqli_num_rows($resultt) > 0){
            //$i=1;
            while($row = mysqli_fetch_array($resultt)) {
                echo "<option value=\"".$row['tName_pk']."\">".$row['tName_pk']."</option>";
            }
        } else {}

    }

    public static function addScheduleMovies($user){
        if(isset($_POST['submitMActive'])){

$db=mysqli_connect("localhost", "root", "", "cinema_db");
$query = "SELECT * FROM datetable WHERE date_uniq='".$_POST["date_play_fk"]."'";
$resultt = mysqli_query($db,$query);
if(mysqli_num_rows($resultt) > 0){} else {

            $insert_query1 = "INSERT INTO datetable (date_uniq) VALUES ('".$_POST["date_play_fk"]."')";
            $db1=mysqli_connect("localhost", "root", "", "cinema_db");
            $resultsd0 = mysqli_query($db1,$insert_query1)  or die(mysqli_error($db1));
        }

            $insert_query = "INSERT INTO 
            scheduletable (  movie_play_fk,
                            date_play_fk,
                            time_play,
                            duration_play_fk,
                            theatre_name_fk,
                            hall_name_fk,
                            hall_type_fk,
                            movie_synopsis,
                            urlPath_fk,
                            admin_fk)
            VALUES (
                            '".$_POST["movie_play_fk"]."',
                            '".$_POST["date_play_fk"]."',
                            '".$_POST["time_play"]."',
                            '".$_POST["duration_play_fk"]."',
                            '".$_POST["theatre_name_fk"]."',
                            '".$_POST["hall_name_fk"]."',
                            '".$_POST["hall_type_fk"]."',
                            '".$_POST["movie_synopsis"]."',
                            '".UpdateHandlings::getUrlPath("Captain Marvel", "test")."',
                            '".$user."')";
                            $db=mysqli_connect("localhost", "root", "", "cinema_db");
            $resultsd1 = mysqli_query($db,$insert_query) or die(mysqli_error($db));

            header("Location: scheduleAdmin.php?ScheduledSuccess");
            echo '<meta http-equiv="refresh" content="0">';
           
        }        
    }

    public static function getUrlPath($moviename, $db_name){
        //sanitize?
        $db_name=mysqli_connect("localhost", "root", "", "cinema_db");
        $movieQuery = "SELECT * FROM movietable WHERE movieTitle ='".$moviename."'";
        $result = mysqli_query($db_name,$movieQuery) or die(mysqli_error($db_name));
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
            return $row['urlPath'];}
        }
    }
    public static function setSelectedViewDate(){
        if (self::$selectedScheduleViewDate == false)
        {
            self::$selectedScheduleViewDate = true;
            echo 'schedule-item-selected';
           
        }
        else{
            self::$selectedScheduleViewDate = false;
            echo '';
        }
    }

    public static function getScheduleView($test, $test1){

        if(isset($_POST['2021-04-01']))
            {
                for($i = 1; $i <= 1; $i++)
                {
                    echo '<tr class="fade-scroll">
                        <td>
                            <h2>{{movie_play_fk}}</h2>
                            <i class="far fa-clock"></i> 125m <i class="fas fa-desktop"></i> IMAX
                            <h3>SYNOPSIS</h3>
                            <p>Ethan and team take on their most impossible mission yet, eradicating the Syndicate - an International rogue organization
                            </p>
                            <div class="schedule-item"> Book Now edw name apo func ama available or reserverd all seats or not scheduled</a>
                            <div class="schedule-item"> DETAILS</a>
                            </div>
                        </td>
                        <td>
                            <div class="hall-type">
                                <h3>VIP Hall</h3>
                                <div>
                                    <div class="schedule-item"><i class="far fa-clock"></i></div>
                                    <div class="schedule-item">09:00 AM</div>
                                    <div class="schedule-item">11:30 AM</div>
                                    <div class="schedule-item">06:00 PM</div>
                                </div>
                            </div>
                            <div class="hall-type">
                                <h3>Main Hall</h3>
                                <div>
                                    <div class="schedule-item"><i class="far fa-clock"></i></div>
                                    <div class="schedule-item">09:00 AM</div>
                                    <div class="schedule-item">11:30 AM</div>
                                    <div class="schedule-item">06:00 PM</div>
                                </div>
                            </div>
                        </td>
                    </tr>';
                }
            }else echo 'nnn';
    }
}
