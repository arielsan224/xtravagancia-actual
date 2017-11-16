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
  $_SESSION['message'] = "Registro Guardado";
  
  if(!$SQL)
  {
   echo $MySQLiconn->error;
  } 
}
/* code for data insert */


/* code for data delete */
if(isset($_GET['del']))
{
 $SQL = $MySQLiconn->query("DELETE FROM usuario WHERE id_usuario=".$_GET['del']);
 $SQL2 = $MySQLiconn->query("ALTER TABLE usuario AUTO_INCREMENT=1");
 $_SESSION['message'] = "Registro Borrado";
 if(!$SQL)
  {
   echo $MySQLiconn->error;
  } 
 header("Location: usuario.php");
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
 $_SESSION['message'] = "Registro Actualizado";
 if(!$SQL)
  {
   echo $MySQLiconn->error;
  } 
 header("Location: usuario.php");
 exit();
}
/* code for data update */

?>