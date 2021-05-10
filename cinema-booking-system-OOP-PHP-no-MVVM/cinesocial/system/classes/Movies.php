<?php

class Movies {
	private $sqlMovieTable;
	private $user; //Composite depencie if no User No MovieList
	private $con;
    private $row;
    private $link;
	
    public function __construct($con, $userLoggedIn){
		$this->user = new User($con, $userLoggedIn);//user object created here
		$this->con = $this->user->getCon();
	}
    public function getMovieTable() {
		$this->sqlMovieTable = "SELECT * FROM movieTable";
		return $this->sqlMovieTable;
	}
	public function getMovieList() {
		if($result = mysqli_query($this->con, $this->sqlMovieTable)){
			if(mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_array($result)){
					//$row = mysqli_fetch_array($result); with for
					echo '<div class="movie-box">';echo"\r\n";
					echo '<img src="'. $row['movieImgCover'] .'" alt="'. $row['movieTitle'] . '">';
                    echo"\r\n";
					echo '<div class="movie-info ">';
                    echo"\r\n";
					echo '<h3>'. $row['movieTitle'] .'</h3>';
                    echo"\r\n";
					echo '<a href="booking.php?id='.$row['movieID'].'"><i class="fas fa-ticket-alt"></i> Book a seat</a>';
                    echo"\r\n";
					echo '</div>';
                    echo"\r\n";
					echo '</div>';
                    echo"\r\n";
				}
				mysqli_free_result($result);
			} else{
				echo '<h4 class="no-annot">No Booking to our movies right now</h4>';
			}
		} else{
			echo "ERROR: Could not able to execute $this->sqlMovieTable. " . mysqli_error($this->con);
		}
		
		// Close connection
		mysqli_close($this->con);
	}
    public function getFeedback($user)
    {
        if(isset($_POST['submit'])){
            $insert_query = "INSERT INTO 
            feedbackTable ( senderfName,
                            senderlName,
                            sendereMail,
                            senderfeedback, 
                            account_fk)
            VALUES (        '".$_POST["fName"]."',
                            '".$_POST["lName"]."',
                            '".$_POST["eMail"]."',
                            '".$_POST["feedback"]."',
                            '".$user['email']."')";
            mysqli_query($this->con,$insert_query);
            }
    }
    public function initBooking()
    {
        $id = $_GET['id'];
        $this->link = mysqli_connect("localhost", "root", "", "cinema_db");

        $movieQuery = "SELECT * FROM movieTable WHERE movieID = $id"; 
        $movieImageById = mysqli_query($this->link,$movieQuery);
        $this->row = mysqli_fetch_array($movieImageById);
    }
    public function initMovieTitle()
    {
        echo $this->row['movieTitle'];
    }

    public function getMovieTitle()
    {
        return $this->row['movieTitle'];
    }
   
    public function initMovieImg()
    {
        echo '<img src="'.$this->row['movieImgCover'].'" alt="'. $this->row['movieTitle'] . '">';
    }

    public function initMovieGenre()
    {
        echo $this->row['movieGenre'];
    }
    public function initMovieDuartion()
    {
        echo $this->row['movieDuration'];
    }
    public function initMovieRelDate()
    {
        echo $this->row['movieRelDate'];
    }
    public function initMovieDirector()
    {
        echo $this->row['movieDirector'];
    }
    public function initMovieActors()
    {
        echo $this->row['movieActors'];
    }
    public function initMovieSubmit()
    {
        $fNameErr = $pNumberErr= "";
                    $fName = $pNumber = "";
            
                    if(isset($_POST['submit'])){
                     
            
                        $fName = $_POST['fName'];
                        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $fName)) {
                            $fNameErr = 'Name can only contain letters, numbers and white spaces';
                            echo "<script type='text/javascript'>alert('$fNameErr');</script>";
                        }   
            
                        $pNumber = $_POST['pNumber'];
                        if (preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $pNumber)) {
                            $pNumberErr = 'Phone Number can only contain numbers and white spaces';
                            echo "<script type='text/javascript'>alert('$pNumberErr');</script>";
                        } 
                        
                        $insert_query = "INSERT INTO 
                        bookingTable (  movieName,
                                        bookingTheatre,
                                        bookingType,
                                        bookingDate,
                                        bookingTime,
                                        bookingFName,
                                        bookingLName,
                                        bookingPNumber,
                                        seatP)
                        VALUES (        '".$this->row['movieTitle']."',
                                        '".$_POST["theatre"]."',
                                        '".$_POST["type"]."',
                                        '".$_POST["date"]."',
                                        '".$_POST["hour"]."',
                                        '".$_POST["fName"]."',
                                        '".$_POST["lName"]."',
                                        '".$_POST["pNumber"]."',
                                        '".$_POST["seat"]."')";
                        mysqli_query($this->link,$insert_query);
                        //ob_end_flush();
                        //header("Location: booking.php?uploadsuccess");
                        echo '<meta http-equiv="refresh" content="1">';//refresh page so no RESEND data in DATABASE after submit
                        }
    }

    public function addTrailerFront(){

        if($result = mysqli_query(User::getConS(), $this->sqlMovieTable)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){

                      echo  '<div class="trailers-grid-item">';echo"\r\n";
                          echo  "<img src=".$row['movieImgPrev']." alt=".$row['movieTitle'].">";
                          echo"\r\n";
                          echo  '<div class="trailer-item-info"'; 
                          echo"\r\n";
                          echo "data-video=".$row['urlPath'].">";
                          echo"\r\n";
                              echo  "<h3>".$row['movieTitle']."</h3>";
                              echo"\r\n";
                              echo  '<i class="far fa-3x fa-play-circle"></i>';
                              echo"\r\n";
                    echo '</div>';echo"\r\n";
                 echo '</div>';echo"\r\n";
                        //echo '<div>test</div>';
                } 
                mysqli_free_result($result);
            }
        }  
     
    }
}
?>