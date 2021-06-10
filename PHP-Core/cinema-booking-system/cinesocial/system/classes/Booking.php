<?php

if (strpos($_SERVER['REQUEST_URI'], "admin.php") !== false){
    }
else if (strpos($_SERVER['REQUEST_URI'], "trailers.php") !== false){}
else if (strpos($_SERVER['REQUEST_URI'], "bookingAdmin.php") !== false){}
else if (strpos($_SERVER['REQUEST_URI'], "scheduleAdmin.php") !== false){}
else if (strpos($_SERVER['REQUEST_URI'], "moviesAdmin.php") !== false){}
else if (strpos($_SERVER['REQUEST_URI'], "messagesAdmin.php") !== false){}
else if (strpos($_SERVER['REQUEST_URI'], "profile.php") !== false){}
else
{
    include("../../system/classes/Admin.php");
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

    public function fetchbookingTableUser($acc) {
        return "SELECT * FROM bookingTable WHERE bookingAccount_fk='".$acc."' ORDER BY bookingID DESC";
    }//reverse order selection

    public function getbookingNoUser($acc) {
        return mysqli_num_rows(mysqli_query($this->getCon(), $this->fetchbookingTableUser($acc)));
    }

    public function getbookingNo() {
        return mysqli_num_rows(mysqli_query($this->getCon(), $this->fetchbookingTable()));
    }

    public function getMessageNo() {
        return mysqli_num_rows(mysqli_query($this->getCon(), "SELECT * FROM feedbackTable"));
    }

    public function getMoviesNo() {
        return mysqli_num_rows(mysqli_query($this->getCon(), "SELECT * FROM movietable"));
    }

    public function getTheatreNo() {
        return mysqli_num_rows(mysqli_query($this->getCon(), "SELECT * FROM theatretable"));
    }

    public function getScheduleNo() {
        return mysqli_num_rows(mysqli_query($this->getCon(), "SELECT * FROM scheduletable"));
    }

    public function handleBookings() {
        if($result = mysqli_query($this->getCon(), $this->fetchbookingTable())){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    UpdateHandlings::getTicketsAdmin($row);
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
                    if (mysqli_num_rows($result) > $i){
                    $row = mysqli_fetch_array($result);
                    UpdateHandlings::getTicketsAdmin($row);
                }else break;
                } 
                mysqli_free_result($result);
            } else{
                echo '<h4 class="no-annot">No Bookings right now</h4>';
            }
        } else{
            echo "ERROR: Could not able to execute $this->fetchbookingTable(). " . mysqli_error($bookTable->getCon());
        }
    }


    public static function delBooking(){
        $id = $_GET['id'];
        $link = mysqli_connect("localhost", "root", "", "cinema_db");
       
        $sql = "DELETE FROM bookingTable WHERE bookingID = $id"; 
        if ($link->query($sql) === TRUE) {
            header('Location: ../views/admin/admin.php');
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

    public function bookingTable()
    {
        $con = User::getConS();
        $result = mysqli_query($this->getCon(), $this->fetchbookingTable());

        echo '<div class="table-responsive" style="overflow-x: unset;">';  
        echo '<table datatable="ng" dt-options="vm.dtOptions" id="booking_data" class="table table-striped table-bordered">  
             <thead>  
                  <tr>  
                       <th>bookingID</th>  
                       <th>movieName_fk</th>  
                       <th>bookingTheatre_fk</th>  
                       <th>bookingDate_fk</th>  
                       <th>bookingTime_fk</th>
                       <th>bookingFName</th>   
                       <th>bookingLName</th>  
                       <th>seatP</th>  
                       <th>bookingPNumber</th>  
                  </tr>  
             </thead>';  
             echo '<tbody>';
                  echo '  
                  <tr ng-repeat="name in namesData">  
                       <th>{{name.bookingID}}</th>  
                       <th>{{name.movieName_fk}}</th>  
                  </tr>  
                  ';  
 
                  echo '</tbody>';
                echo '</table>  
    </div>  
    </div>   ';
    }

    public function bookingTableJquery()
    {//den mporis edw na to kanis DYNAMIC kapws? ta fields?
        $con = User::getConS();
        $result = mysqli_query($this->getCon(), $this->fetchbookingTable());

        echo '<div class="table-responsive" style="overflow-x: unset;">';  
        echo '<table datatable="ng" dt-options="vm.dtOptions" id="booking_data" class="table table-striped table-bordered">  
             <thead>  
                  <tr>  
                       <td>bookingID</td>  
                       <td>movieName_fk</td>  
                       <td>bookingTheatre_fk</td>  
                       <td>bookingDate_fk</td>  
                       <td>bookingTime_fk</td>
                       <td>bookingFName</td>   
                       <td>bookingLName</td>  
                       <td>seatP</td>  
                       <td>bookingPNumber</td>  
                  </tr>  
             </thead>';  
             //<?php  
             while($row = mysqli_fetch_array($result))  
             {  
                  echo '  
                  <tr>  
                       <td>'.$row["bookingID"].'</td>  
                       <td>'.$row["movieName_fk"].'</td>  
                       <td>'.$row["bookingTheatre_fk"].'</td>  
                       <td>'.$row["bookingDate_fk"].'</td>  
                       <td>'.$row["bookingTime_fk"].'</td>
                       <td>'.$row["bookingFName"].'</td> 
                       <td>'.$row["bookingLName"].'</td> 
                       <td>'.$row["seatP"].'</td>
                       <td>'.$row["bookingPNumber"].'</td>    
                  </tr>  
                  ';  
             }  
            // ?d>  
                echo '</table>  
    </div>  
    </div>   
        <script class="init">';  
        echo "$(document).ready(function(){  
        $('#booking_data').DataTable();  
        });  
        </script>";

    }

    public function setSeatSelection($moviesTable)
    {
       echo '<option value="" disabled selected>Seat</option>';
       echo '<option value="1">1' . " " . $this->getSeats(1,$moviesTable->getMovieTitle()) . '</option>';
       echo '<option value="2">2' . $this->getSeats(2,$moviesTable->getMovieTitle()) . '</option>';
       echo '<option value="3">3' . $this->getSeats(3,$moviesTable->getMovieTitle()) . '</option>';
       echo '<option value="4">4' . $this->getSeats(4,$moviesTable->getMovieTitle()) . '</option>';
       echo '<option value="5">5' . $this->getSeats(5,$moviesTable->getMovieTitle()) . '</option>';
    }
    
    public function getMovieTheatre()
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
