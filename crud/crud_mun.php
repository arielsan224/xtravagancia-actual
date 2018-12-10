<?php
session_start();
include_once 'conexion.php';

/* code for data insert */
if(isset($_POST['save']))
{

     $nombre_municipio = $MySQLiconn->real_escape_string($_POST['nombre_municipio']);
     $id_depto = $MySQLiconn->real_escape_string($_POST['id_depto']);
 
  $SQL = $MySQLiconn->query("INSERT INTO municipio(nombre_municipio,id_depto) VALUES('$nombre_municipio','$id_depto')");
  
  
  if(!$SQL)
  {
   //echo $MySQLiconn->error;
	  $_SESSION['message'] = "Error al insertar los registros. Error ( ".$MySQLiconn->error.")";
  }
  else {
	  $_SESSION['message'] = "Registro Guardado";
  }
}
/* code for data insert */


/* code for data delete */
if(isset($_GET['del']))
{
 $SQL = $MySQLiconn->query("DELETE FROM municipio WHERE id_municipio=".$_GET['del']);
 
 if(!$SQL)
  {
   //echo $MySQLiconn->error;
	  $_SESSION['message'] = "Error al borrar los registros. Error ( ".$MySQLiconn->error.")";
  }
  else {
	  $SQL2 = $MySQLiconn->query("ALTER TABLE municipio AUTO_INCREMENT=1");
      $_SESSION['message'] = "Registro Borrado";
  }
 header("Location: municipio.php");
 exit();
}
/* code for data delete */



/* code for data update */
if(isset($_GET['edit']))
{
 $SQL = $MySQLiconn->query("SELECT mun.id_municipio, dep.id_depto ,dep.nombre_depto, mun.nombre_municipio 
from municipio mun inner join departamento dep on mun.id_depto = dep.id_depto WHERE mun.id_municipio=".$_GET['edit']);
 $getROW = $SQL->fetch_array();
}

if(isset($_POST['update']))
{
 $SQL = $MySQLiconn->query("UPDATE municipio SET nombre_municipio='".$_POST['nombre_municipio']."' WHERE id_municipio=".$_GET['edit']);
 
 if(!$SQL)
  {
   //echo $MySQLiconn->error;
	  $_SESSION['message'] = "Error al actualizar los registros. Error ( ".$MySQLiconn->error.")";
  }
  else {
	  $_SESSION['message'] = "Registro Actualizado";
  }
 header("Location: municipio.php");
 exit();
}
/* code for data update */

?>