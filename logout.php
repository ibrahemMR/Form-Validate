<?php
	session_start();
	//clear all session variables
	session_unset();
	//Destroy Session
	session_destroy();
	//redirect to index
	header('Location: login.php');

?>