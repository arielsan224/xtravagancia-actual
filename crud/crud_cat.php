<?php
session_start();
include_once 'conexion.php';

/* code for data insert */
if(isset($_POST['save']))
{

     /*$id_categoria = $MySQLiconn->real_escape_string($_POST['id_categoria']);*/
     $descripcion = $MySQLiconn->real_escape_string($_POST['descripcion']);
 
  $SQL = $MySQLiconn->query("INSERT INTO categoria(descripcion) VALUES('$descripcion')");
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
 $SQL = $MySQLiconn->query("DELETE FROM categoria WHERE id_categoria=".$_GET['del']);
 $SQL2 = $MySQLiconn->query("ALTER TABLE categoria AUTO_INCREMENT=1");
 $_SESSION['message'] = "Registro Borrado";
 if(!$SQL)
  {
   echo $MySQLiconn->error;
  } 
 header("Location: categoria.php");
 exit();
}
/* code for data delete */



/* code for data update */
if(isset($_GET['edit']))
{
 $SQL = $MySQLiconn->query("SELECT * FROM categoria WHERE id_categoria=".$_GET['edit']);
 $getROW = $SQL->fetch_array();
}

if(isset($_POST['update']))
{
 $SQL = $MySQLiconn->query("UPDATE categoria SET descripcion='".$_POST['descripcion']."' WHERE id_categoria=".$_GET['edit']);
 $_SESSION['message'] = "Registro Actualizado";
 if(!$SQL)
  {
   echo $MySQLiconn->error;
  } 
 header("Location: categoria.php");
 exit();
}
/* code for data update */

?>