<?php 

//session_start();

//include_once '../crud/conexion.php';


// echo $_SESSION['userId'];

if(!isset($_SESSION['userId'])) {
	session_start();
	header('location: ../login');	
} 
//echo Console::log('', $_SESSION['userId']);
//echo Console::log('', $_SESSION['user_type']);
if ($_SESSION['user_type'] !=  1 ){
	header('location: ../index');	
		}
	
$inactivo = 900;
 
    if(isset($_SESSION['tiempo']) ) {
    $vida_session = time() - $_SESSION['tiempo'];
        if($vida_session > $inactivo)
        {
            session_destroy();
            header("Location: ../login"); 
        }
    }
$_SESSION['tiempo'] = time();


?>