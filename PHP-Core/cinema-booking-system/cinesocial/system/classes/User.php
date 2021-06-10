<?php
class User {
    private $user;
    private $con;
	private static $email;

    public function __construct($con, $user){
		$this->con = $con;
		$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$user'");
		$this->user = mysqli_fetch_array($user_details_query);
		$this->getEmail();
	}

    public function getUsername() {
		return $this->user['username'];
	}
	public function getEmail() {
		self::$email = $this->user['email'];
		//return $this->user['email'];
	}
    public function getCon() {
		return $this->con;
	}
	public static function getConS() {
		return mysqli_connect("localhost", "root", "", "cinema_db");
	}
	public static function getConSemail() {
		return self::$email;
	}
}
