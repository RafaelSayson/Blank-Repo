<?php
	session_start();
	include("css/imports.html");
	if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1 AND $_SESSION['role'] == "student"){
		include("main.php");
	}
	else{
		echo 'You are not logged in. <a href="login.php">Click here</a> to log in.';
	}
	
?>