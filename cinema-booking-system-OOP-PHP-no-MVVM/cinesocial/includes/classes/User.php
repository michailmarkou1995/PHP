<?php
class User {
    private $user;
    private $con;//public

    public function __construct($con, $user){
		$this->con = $con;
		$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$user'");
		$this->user = mysqli_fetch_array($user_details_query);
	}

	public static function constructorParamless() {
		$instance = new User();
		return $instance;
	}//future work

    public function getUsername() {
		return $this->user['username'];
	}
    public function getCon() {
		return $this->con;
	}
    public static function activeCon() {
		return $this->getCon();
	}
}
?>