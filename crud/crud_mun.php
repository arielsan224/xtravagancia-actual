<?php
session_start();
include_once 'conexion.php';

/* code for data insert */
if(isset($_POST['save']))
{

     $nombre_municipio = $MySQLiconn->real_escape_string($_POST['nombre_municipio']);
     $id_depto = $MySQLiconn->real_escape_string($_POST['id_depto']);
 
  $SQL = $MySQLiconn->query("INSERT INTO municipio(nombre_municipio,id_depto) VALUES('$nombre_municipio','$id_depto')");
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
 $SQL = $MySQLiconn->query("DELETE FROM municipio WHERE id_municipio=".$_GET['del']);
 $SQL2 = $MySQLiconn->query("ALTER TABLE municipio AUTO_INCREMENT=1");
 $_SESSION['message'] = "Registro Borrado";
 if(!$SQL)
  {
   echo $MySQLiconn->error;
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
 $_SESSION['message'] = "Registro Actualizado";
 if(!$SQL)
  {
   echo $MySQLiconn->error;
  } 
 header("Location: municipio.php");
 exit();
}
/* code for data update */

?>