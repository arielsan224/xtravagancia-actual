<?php
session_start();
include_once 'conexion.php';

/* code for data insert */
if(isset($_POST['save']))
{

     $actividad = $MySQLiconn->real_escape_string($_POST['actividad']);
     $id_categoria = $MySQLiconn->real_escape_string($_POST['id_categoria']);
 
  $SQL = $MySQLiconn->query("INSERT INTO actividad(descripcion,id_categoria) VALUES('$actividad','$id_categoria')");
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
 $SQL = $MySQLiconn->query("DELETE FROM actividad WHERE id_actividad=".$_GET['del']);
 $SQL2 = $MySQLiconn->query("ALTER TABLE actividad AUTO_INCREMENT=1");
 $_SESSION['message'] = "Registro Borrado";
 if(!$SQL)
  {
   echo $MySQLiconn->error;
  } 
 header("Location: actividad.php");
 exit();
}
/* code for data delete */



/* code for data update */
if(isset($_GET['edit']))
{
 $SQL = $MySQLiconn->query("SELECT act.id_actividad,cat.id_categoria,cat.descripcion as categoria, act.descripcion as actividad 
from actividad as act inner join categoria as cat on act.id_categoria = cat.id_categoria WHERE act.id_actividad=".$_GET['edit']);
 $getROW = $SQL->fetch_array();
}

if(isset($_POST['update']))
{
 $SQL = $MySQLiconn->query("UPDATE actividad SET descripcion='".$_POST['actividad']."' WHERE id_actividad=".$_GET['edit']);
 $_SESSION['message'] = "Registro Actualizado";
 if(!$SQL)
  {
   echo $MySQLiconn->error;
  } 
 header("Location: actividad.php");
 exit();
}
/* code for data update */

?>