<?php

class Movies {
    private $table;
	private $sql;
	private $user; //Composite depencie if no User No MovieList
	private $con;
	private  $idc;
    private  $linkc;
    private  $movieQueryc;
    private  $movieImageByIdc;
    private  $rowc;
	
    public function __construct($con, $userLoggedIn){
		$this->user = new User($con, $userLoggedIn);//user object created here
		$this->con = $this->user->getCon();
		//needs more probably here
	}
    public function getMovieTable() {
		$this->sql = "SELECT * FROM movieTable";
		return $this->sql;
	}
	public function getMovieList() {
		if($result = mysqli_query($this->con, $this->sql)){
			if(mysqli_num_rows($result) > 0){
				for ($i = 0; $i <= 5; $i++){
					$row = mysqli_fetch_array($result);
					echo '<div class="movie-box">';
					echo '<img src="'. $row['movieImg'] .'" alt=" ">';
					echo '<div class="movie-info ">';
					echo '<h3>'. $row['movieTitle'] .'</h3>';
					echo '<a href="booking.php?id='.$row['movieID'].'"><i class="fas fa-ticket-alt"></i> Book a seat</a>';
					echo '</div>';
					echo '</div>';
				}
				mysqli_free_result($result);
			} else{
				echo '<h4 class="no-annot">No Booking to our movies right now</h4>';
			}
		} else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
		}
		
		// Close connection
		mysqli_close($this->con);
	}
	public function doBookConnect() {
        $this->$idc = $_GET['id'];
        $this->$linkc = mysqli_connect("localhost", "root", "", "cinema_db");
        $this->$movieQueryc = "SELECT * FROM movieTable WHERE movieID = $id"; 
        $this->$movieImageByIdc = mysqli_query($this->$linkc,$this->$movieQueryc);
        $this->$rowc = mysqli_fetch_array($this->$movieImageByIdc);
    }
    public static function doBooking() {
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
                            bookingPNumber)
            VALUES (        '".$this->$row['movieTitle']."',
                            '".$_POST["theatre"]."',
                            '".$_POST["type"]."',
                            '".$_POST["date"]."',
                            '".$_POST["hour"]."',
                            '".$_POST["fName"]."',
                            '".$_POST["lName"]."',
                            '".$_POST["pNumber"]."')";
            mysqli_query($this->linkc,$insert_query);
            }
    }
    public function fetchBookMovTitle(){
        echo '$this->rowc'['movieTitle'];
    }
    public function fetchBookMovGenre(){
        echo $this->rowc['movieGenre'];
    }
    public function fetchBookMovDuration(){
        echo $this->rowc['movieDuration'];
    }
    public function fetchBookMovDate(){
        echo $this->rowc['movieRelDate'];
    }
    public function fetchBookActors(){
        echo $this->rowc['movieActors'];
    }

    public function fetchBookMovImg(){
        echo '<img src="'.$this->rowc['movieImg'].'" alt="">';
    }
}
?>