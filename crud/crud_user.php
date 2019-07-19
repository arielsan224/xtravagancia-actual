<?php
session_start();
include_once 'conexion.php';

/* code for data insert */
if(isset($_POST['save']))
{

     $password = $MySQLiconn->real_escape_string($_POST['password']);
     $nombre = $MySQLiconn->real_escape_string($_POST['nombre']);
     $apellido = $MySQLiconn->real_escape_string($_POST['apellido']);
     $email = $MySQLiconn->real_escape_string($_POST['email']);
     $id_tipo_usuario = $MySQLiconn->real_escape_string($_POST['id_tipo_usuario']);
     $id_estatus = $MySQLiconn->real_escape_string($_POST['id_estatus']);
	 $password = md5($password);
 
  $SQL = $MySQLiconn->query("INSERT INTO usuario(password,nombre,apellido,email,id_tipo_usuario,id_estatus) VALUES('$password','$nombre','$apellido','$email','$id_tipo_usuario','$id_estatus')");
  
  
  if(!$SQL)
  {
   //echo $MySQLiconn->error;
	  $_SESSION['message'] = "Error al insertar los registros. Error ( ".$MySQLiconn->error.")";
  }
  else {
	  $_SESSION['message'] = "Registro Guardado";
	  header("Location: usuario");
	  exit();
  }
}
/* code for data insert */


/* code for data delete */
if(isset($_GET['del']))
{
 	if ($_GET['est']==1)
	 {
		 $estatus = 0;
		 $est_text = 'inactivar';
		 $esta_text = 'Inactivado';
	 }
	 else {
		 $estatus = 1;
		 $est_text = 'Activar';
		 $esta_text = 'Activado';
	 }
	
	 //$SQL = $MySQLiconn->query("DELETE FROM departamento WHERE id_destino=".$_GET['del']);
	 $SQL = $MySQLiconn->query("UPDATE usuario SET id_estatus= '".$estatus."'  WHERE id_usuario=".$_GET['del']);
	  
	 
	 if(!$SQL)
	  {
	   //echo $MySQLiconn->error;
		 $_SESSION['message'] = "Error al '".$est_text."' los registros. Error ( ".$MySQLiconn->error.")";
	  } 
	 else {
		 $_SESSION['message'] = "Registro ".$esta_text;
		 //$SQL2 = $MySQLiconn->query("ALTER TABLE destino AUTO_INCREMENT=1");
	 }
	 header("Location: usuario");
	 exit();
}
/* code for data delete */



/* code for data update */
if(isset($_GET['edit']))
{
 $SQL = $MySQLiconn->query("SELECT us.id_usuario,us.nombre, us.apellido,us.password,us.email, 
  tu.id_tipo_usuario, tu.descripcion as tipo, es.id_estatus, es.descripcion as estatus 
FROM usuario as us
inner join tipo_usuario as tu on us.id_tipo_usuario = tu.id_tipo_usuario
inner join estatus as es on us.id_estatus=es.id_estatus
WHERE us.id_usuario=".$_GET['edit']);
 $getROW = $SQL->fetch_array();
}

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