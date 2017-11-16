<?php
session_start();
include_once 'conexion.php';

/* code for data insert */
if(isset($_POST['save']))
{

     $descripcion = $MySQLiconn->real_escape_string($_POST['descripcion']);
     $id_municipio = $MySQLiconn->real_escape_string($_POST['id_municipio']);
     $precio = $MySQLiconn->real_escape_string($_POST['precio']);
     $dias = $MySQLiconn->real_escape_string($_POST['dias']);
     $imagen = $MySQLiconn->real_escape_string($_POST['imagen']);
     
 
  $SQL = $MySQLiconn->query("INSERT INTO destino(descripcion,id_municipio,precio,dias,imagen) VALUES('$descripcion','$id_municipio','$precio','$dias','$imagen')");
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
 $SQL = $MySQLiconn->query("DELETE FROM destino WHERE id_destino=".$_GET['del']);
 $SQL2 = $MySQLiconn->query("ALTER TABLE destino AUTO_INCREMENT=1");
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
 $SQL = $MySQLiconn->query("SELECT dest.id_destino,dest.descripcion, dep.id_depto, dep.nombre_depto, dest.id_municipio, mun.nombre_municipio,dest.precio,dest.dias,dest.imagen,dest.estatus
from destino as dest
inner join municipio as mun on dest.id_municipio = mun.id_municipio
inner join departamento dep on mun.id_depto = dep.id_depto
WHERE dest.id_destino=".$_GET['edit']);
 $getROW = $SQL->fetch_array();
}

if(isset($_POST['update']))
{
     $descripcion = $MySQLiconn->real_escape_string($_POST['descripcion']);
     $id_municipio = $MySQLiconn->real_escape_string($_POST['id_municipio']);
     $precio = $MySQLiconn->real_escape_string($_POST['precio']);
     $dias = $MySQLiconn->real_escape_string($_POST['dias']);
     $imagen = $MySQLiconn->real_escape_string($_POST['imagen']);

 $SQL = $MySQLiconn->query("UPDATE usuario SET descripcion= '".$descripcion."', id_municipio='".$id_municipio."', precio='".$precio."', dias='".$dias."', imagen='".$imagen."'  WHERE id_destino=".$_GET['edit']);
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