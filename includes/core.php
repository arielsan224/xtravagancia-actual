<?php 

//session_start();

//include_once '../crud/conexion.php';


// echo $_SESSION['userId'];

if(!isset($_SESSION['userId'])) {
	header('location: ../login');	
} 
//echo Console::log('', $_SESSION['userId']);
//echo Console::log('', $_SESSION['user_type']);
if ($_SESSION['user_type'] !=  2 ){
	header('location: ../index');	
		}
	



?>