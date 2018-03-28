<?php 
session_start();
//include_once 'includes/core.php';
if(isset($_SESSION['userId'])) {
		// remove all session variables
	session_unset(); 

	// destroy the session 
	session_destroy();	
}
 
header('location: index.php');

?>