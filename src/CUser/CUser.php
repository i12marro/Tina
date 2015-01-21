<?php

class CUser
{

	private $_db;
	function __construct()
	{
		$this->_db = new CDatabase();
	}

	// Function to check if the user is authenticated.
	public function Authenticated() {
		$username = isset($_SESSION['username']) ? $_SESSION['username']->uname : null;
 
		if($username) {
		  $loginuser = "Du är inloggad som: {$_SESSION['username']->uname}";
	
			return $loginuser;
		}
    }

    // Function to log in
	public function login($username,$password){
		$result = $this->_db->select("SELECT * FROM user WHERE uname = :uname AND password = md5(concat(:password, salt))",array(
				':uname' => $username,
				':password' => $password
			)
		);
		if($result[0]) {
            return $_SESSION['username'] = $result[0];
		}
	}
	// Function to log out
	public function logout(){
		unset($_SESSION['username']);
		header("location:index.php");
	}
}