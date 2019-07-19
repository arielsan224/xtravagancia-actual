<?php
session_start();
include_once 'conexion.php';

/* code for data insert */
if(isset($_POST['save']))
{

     /*$id_depto = $MySQLiconn->real_escape_string($_POST['id_depto']);*/
     $nombre_depto = $MySQLiconn->real_escape_string($_POST['nombre_depto']);
 
  $SQL = $MySQLiconn->query("INSERT INTO departamento(nombre_depto) VALUES('$nombre_depto')");
  
  
  if(!$SQL)
  {
   //echo $MySQLiconn->error;
	  $_SESSION['message'] = "Error al insertar los registros. Error ( ".$MySQLiconn->error.")";
  }
  else {
	  $_SESSION['message'] = "Registro Guardado";
	  header("Location: departamento");
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
	 $SQL = $MySQLiconn->query("UPDATE departamento SET estatus= '".$estatus."'  WHERE id_depto=".$_GET['del']);
	  
	 
	 if(!$SQL)
	  {
	   //echo $MySQLiconn->error;
		 $_SESSION['message'] = "Error al '".$est_text."' los registros. Error ( ".$MySQLiconn->error.")";
	  } 
	 else {
		 $_SESSION['message'] = "Registro ".$esta_text;
		 //$SQL2 = $MySQLiconn->query("ALTER TABLE destino AUTO_INCREMENT=1");
	 }
	 header("Location: departamento");
	 exit();
}
/* code for data delete */



/* code for data update */
if(isset($_GET['edit']))
{
 $SQL = $MySQLiconn->query("SELECT * FROM departamento WHERE id_depto=".$_GET['edit']);
 $getROW = $SQL->fetch_array();
}

if(isset($_POST['update']))
{
 $SQL = $MySQLiconn->query("UPDATE departamento SET nombre_depto='".$_POST['nombre_depto']."' WHERE id_depto=".$_GET['edit']);
 
 if(!$SQL)
  {
   //echo $MySQLiconn->error;
	  $_SESSION['message'] = "Error al actualizar los registros. Error ( ".$MySQLiconn->error.")";
  } 
  else {
	  $_SESSION['message'] = "Registro Actualizado";
  }
 header("Location: departamento");
 exit();
}
/* code for data update */

?>