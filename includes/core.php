<?php 

session_start();

include_once '../crud/conexion.php';

// echo $_SESSION['userId'];

if(!isset($_SESSION['userId'])) {
	header('location: login.php');	
} 



?>