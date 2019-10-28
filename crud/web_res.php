<?php
session_start();
include_once 'conexion.php';
include_once '../function/comunes.php';

/* code for data insert */
if(isset($_POST['save']))
{

     $id_dest = $MySQLiconn->real_escape_string($_POST['id_destino']);
     $datepicker = $MySQLiconn->real_escape_string($_POST['datepicker']);
	 $horario = $MySQLiconn->real_escape_string($_POST['horario']);
     $precio = $MySQLiconn->real_escape_string($_POST['precio']);
	 $personas = $MySQLiconn->real_escape_string($_POST['personas']);
	 $total = $precio*$personas;
	 $id_user = $MySQLiconn->real_escape_string($_POST['id_usuario']);
	 //var_dump($_POST['id_usuario']);
	 
	 	  $SQL = $MySQLiconn->query("INSERT INTO reservacion (id_destino,id_usuario,fecha_tour,id_horario_destino,precio,cant_personas,total) VALUES('$id_dest','$id_user','$datepicker',' $horario','$precio','$personas','$total')");
		  
	  	  $id_reserva = mysqli_insert_id($MySQLiconn);
		
		var_dump('mensaje'.$SQL2);

		 if(!$SQL)
			  {
			   //echo $MySQLiconn->error;
			   $_SESSION['message'] = "Error al insertar los registros. Error ( ".$MySQLiconn->error.")";
			   exit();
			  } 

			else {

				 
				$_SESSION['message'] = "Su Numero de reservacion es ".$id_reserva;
				header("Location: tour?id_dest=".$id_dest);
	 			exit();
			}

			}
/* code for data insert */


/* code for data delete or inactive */
if(isset($_GET['del'], $_GET['est']))
{
  //if(unlink($_GET['url'])) { 
	 if ($_GET['est']==2)
	 {
		 $estatus = 3;
		 $est_text = 'Cancelar';
		 $esta_text = 'Cancelado';
	 }
	 else {
		 $estatus = 2;
		 $est_text = 'Reservar';
		 $esta_text = 'Reservado';
	 }
	
	 //$SQL = $MySQLiconn->query("DELETE FROM destino WHERE id_destino=".$_GET['del']);
	 $SQL = $MySQLiconn->query("UPDATE reservacion SET estatus= '".$estatus."'  WHERE idreservacion=".$_GET['del']);
	  
	 
	 if(!$SQL)
	  {
	   //echo $MySQLiconn->error;
		 $_SESSION['message'] = "Error al '".$est_text."' los registros. Error ( ".$MySQLiconn->error.")";
	  } 
	 else {
		 $_SESSION['message'] = "Registro ".$esta_text;
		 //$SQL2 = $MySQLiconn->query("ALTER TABLE destino AUTO_INCREMENT=1");
	 }
	 header("Location: reservacion");
	 exit();
	/*  }
	else {
		$_SESSION['message'] = "No se pudo inactivar el archivo. Error ( ".$MySQLiconn->error.")";
		header("Location: destino.php");
		//exit();
	} */
	 
}
/* code for data delete */



?>