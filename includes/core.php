<?php 

session_start();

include_once '../includes/conexion.php';

// echo $_SESSION['userId'];

if(!$_SESSION['userId']) {
	header('location: login.php');	
} 



?>