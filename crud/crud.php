<?php

include_once 'conexion.php';

/* code for data insert */
if(isset($_POST['save']))
{

     $fn = $MySQLiconn->real_escape_string($_POST['fn']);
     $ln = $MySQLiconn->real_escape_string($_POST['ln']);
 
  $SQL = $MySQLiconn->query("INSERT INTO departamento(id_depto,nombre_depto) VALUES('$fn','$ln')");
  
  if(!$SQL)
  {
   echo $MySQLiconn->error;
  } 
}
/* code for data insert */


/* code for data delete */
if(isset($_GET['del']))
{
 $SQL = $MySQLiconn->query("DELETE FROM departamento WHERE id=".$_GET['del']);
 header("Location: index.php");
}
/* code for data delete */



/* code for data update */
if(isset($_GET['edit']))
{
 $SQL = $MySQLiconn->query("SELECT * FROM departamento WHERE id=".$_GET['edit']);
 $getROW = $SQL->fetch_array();
}

if(isset($_POST['update']))
{
 $SQL = $MySQLiconn->query("UPDATE departamento SET nombre_depto='".$_POST['nombre_depto']."' WHERE id=".$_GET['edit']);
 header("Location: plantilla.php");
}
/* code for data update */

?>