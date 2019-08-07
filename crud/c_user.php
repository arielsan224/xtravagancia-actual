<?php 
//include_once 'conexion.php';

if(isset($_POST['update']))
{
     $password = $MySQLiconn->real_escape_string($_POST['password']);
     $nombre = $MySQLiconn->real_escape_string($_POST['nombre']);
     $apellido = $MySQLiconn->real_escape_string($_POST['apellido']);
     $email = $MySQLiconn->real_escape_string($_POST['email']);
     $id_tipo_usuario = $MySQLiconn->real_escape_string($_POST['id_tipo_usuario']);
     $id_estatus = $MySQLiconn->real_escape_string($_POST['id_estatus']);
	 $password = md5($password);

 $SQL = $MySQLiconn->query("UPDATE usuario SET password= '".$password."', nombre='".$nombre."', apellido='".$apellido."', email='".$email."', id_tipo_usuario='".$id_tipo_usuario."', id_estatus= '".$id_estatus."'  WHERE id_usuario=".$_GET['edit']);
 
 if(!$SQL)
  {
   //echo $MySQLiconn->error;
	  $_SESSION['message'] = "Error al actualizar los registros. Error ( ".$MySQLiconn->error.")";
  }
  else {
	  $_SESSION['message'] = "Registro Actualizado";
  }
 header("Location: usuario.php");
 exit();
}
/* code for data update */
?>