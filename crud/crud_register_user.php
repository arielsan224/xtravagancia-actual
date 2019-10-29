<?php
//session_start();
include_once 'conexion.php';

if(isset($_POST['save']))
{

     $password = $MySQLiconn->real_escape_string($_POST['password1']);
     $nombre = $MySQLiconn->real_escape_string($_POST['nombres']);
     $apellido = $MySQLiconn->real_escape_string($_POST['apellidos']);
     $email = $MySQLiconn->real_escape_string($_POST['email']);
     //$id_tipo_usuario = $MySQLiconn->real_escape_string($_POST['id_tipo_usuario']);
     //$id_estatus = $MySQLiconn->real_escape_string($_POST['id_estatus']);
	 $password = md5($password);
 
  $SQL = $MySQLiconn->query("INSERT INTO usuario(password,nombre,apellido,email) VALUES('$password','$nombre','$apellido','$email')");
  
  
  if(!$SQL)
  {
   //echo $MySQLiconn->error;
	  $_SESSION['message'] = "Error al insertar los registros. Error ( ".$MySQLiconn->error.")";
  }
  else {
	  $_SESSION['message'] = "Su registro se realizo con exito";
	  header("Location: /register");
	  exit();
  }
}
/* code for data insert */

if(isset($_POST['login'])) {
	$email = $MySQLiconn->real_escape_string($_POST['email']);
	$password = $MySQLiconn->real_escape_string($_POST['password']);

	if(empty($email) || empty($password)) {
		if($username == "") {
			$errors[] = "Username is required";
		} 

		if($password == "") {
			$errors[] = "Password is required";
		}
	} else {
		$sql = "SELECT * FROM usuario WHERE email = '$email' AND id_estatus = 1";
		$result = $MySQLiconn->query($sql);

		if($result->num_rows == 1) {
			$password = md5($password);
			// exists
			$mainSql = "SELECT * FROM usuario WHERE email = '$email' AND password = '$password'";
			$mainResult = $MySQLiconn->query($mainSql);

			if($mainResult->num_rows == 1) {
				$value = $mainResult->fetch_assoc();
				$user_id = $value['id_usuario'];
				$user_type = $value['id_tipo_usuario'];

				// set session
				$_SESSION['userId'] = $user_id;
				$_SESSION['user_type'] = $user_type;
				$_SESSION['tiempo'] = time();
				if ($_SESSION['user_type'] == 1 ){
					header('location: appweb/admin');
					//exit();
						}
					else { 
						$ruta=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
						$ruta= str_replace(".php","",$ruta);
						header('location: ../'.$ruta);
						}
					exit();
				/*header('location: http://localhost:9080/stock/dashboard.php');	*/
			} else{
				
				$errors[] = "usuario/password Incorrecto";
				//exit();
			} // /else
		} else {		
			$errors[] = "Usuario no existe o inactivo";	
			//exit();
		} // /else
	} // /else not empty username // password
	
}

?>