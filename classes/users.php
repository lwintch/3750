<?php

require 'classes/mysql.php';

class User{

	function validateUser($un, $pwd){
		$mysql = New Mysql();
		$ensure_credentials = $mysql->verify_Username_and_Pass($un, md5($pwd));

		if($ensure_credentials){
			$_SESSION['status'] = 'authorized';
			header('location: index.php');
		}else return "Failed login, please try again";
	}

	function log_User_Out(){
		if(isset($_SESSION['status'])){
			unset($_SESSION['status']);

			if(isset($_COOKIE[session_name()])){
				setcookie(session_name(), '', time() - 10000);
				session_destroy();
			}
		}
	}

	function confirm_User(){
		session_start();
		if($_SESSION['status'] != 'authorized'){
			header('location: login.php');
		}
	}
}

?>