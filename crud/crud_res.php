<?php
session_start();
include_once 'conexion.php';
include_once '../function/comunes.php';

/* code for data insert */
if(isset($_POST['save']))
{

     $nombres = $MySQLiconn->real_escape_string($_POST['nombres']);
	 $apellidos = $MySQLiconn->real_escape_string($_POST['apellidos']);
	 $email = $MySQLiconn->real_escape_string($_POST['email']);
	 $telefono = $MySQLiconn->real_escape_string($_POST['telefono']);
     $id_dest = $MySQLiconn->real_escape_string($_POST['id_dest']);
     $datepicker = $MySQLiconn->real_escape_string($_POST['datepicker']);
	 $horario = $MySQLiconn->real_escape_string($_POST['horario']);
     $precio = $MySQLiconn->real_escape_string($_POST['precio']);
	 $personas = $MySQLiconn->real_escape_string($_POST['personas']);
	 $total = $MySQLiconn->real_escape_string($_POST['total']);
	 $password = md5(123);
	 //var_dump($_POST['id_usuario']);
	 
	 if(!(isset($_POST['id_usuario']))|| $_POST['id_usuario']=='' ){
		 
		  $SQL = $MySQLiconn->query("INSERT INTO usuario(password,nombre,apellido,email,telefono) VALUES('$password','$nombres','$apellidos','$email','$telefono')");
		  
		  $id_user = mysqli_insert_id($MySQLiconn);
	 	}
	 else {
		$id_user = $MySQLiconn->real_escape_string($_POST['id_usuario']);
		}
 
		  $SQL2 = $MySQLiconn->query("INSERT INTO reservacion (id_destino,id_usuario,fecha_tour,id_horario_destino,precio,cant_personas,total) VALUES('$id_dest','$id_user','$datepicker',' $horario','$precio','$personas','$total')");
		
		//var_dump('mensaje'.$SQL2);

		 if(!$SQL2)
			  {
			   //echo $MySQLiconn->error;
			   $_SESSION['message'] = "Error al insertar los registros. Error ( ".$MySQLiconn->error.")";
			   exit();
			  } 

			else {

				 
				$_SESSION['message'] = "Registro Guardado";
				header("Location: reservacion");
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



/* code for data update */
if(isset($_GET['edit']))
{
			 $SQL = $MySQLiconn->query("SELECT u.email,u.nombre,u.apellido,u.telefono,r.idreservacion,vd.id_destino,vd.nombre_dest,vd.id_depto,vd.nombre_depto,vd.id_municipio,vd.nombre_municipio,r.fecha_tour,t.id_tiempo, CONCAT (TIME_FORMAT(t.inicio, '%h:%i %p'),'-', TIME_FORMAT(t.fin, '%h:%i %p')) AS horario,r.precio,r.cant_personas,r.total
			FROM reservacion r
			INNER JOIN v_destinos vd ON vd.id_destino = r.id_destino
			INNER JOIN horario_destino hd ON hd.id_horario_destino = r.id_horario_destino
			INNER JOIN rango_dias rd ON rd.id_rango_dias = hd.id_rango_dias
			INNER JOIN tiempo t ON t.id_tiempo = hd.id_tiempo
			INNER JOIN usuario u ON u.id_usuario = r.id_usuario
			WHERE r.idreservacion = ".$_GET['edit']);
 $getROW = $SQL->fetch_array();
 
 if(!$SQL)
  {
   //echo $MySQLiconn->error;
	 $_SESSION['message'] = "Error al cargar los registros. Error ( ".$MySQLiconn->error.")";
  }
	

}

if(isset($_POST['update']))
{
     $id_reservacion = $MySQLiconn->real_escape_string($_POST['id_reservacion']);
     $datepicker = $MySQLiconn->real_escape_string($_POST['datepicker']);
	 $horario = $MySQLiconn->real_escape_string($_POST['horario']);
     $precio = $MySQLiconn->real_escape_string($_POST['precio']);
	 $personas = $MySQLiconn->real_escape_string($_POST['personas']);
	 $total = $MySQLiconn->real_escape_string($_POST['total']);
		

	
	 
	$SQL = $MySQLiconn->query("UPDATE reservacion SET fecha_tour= '".$datepicker."',id_horario_destino='".$horario."',precio='".$precio."', cant_personas='".$personas."', total='".$total."' WHERE idreservacion=".$id_reservacion);
 	
 
	if(!$SQL)
	  {
	   //echo $MySQLiconn->error;
	   $_SESSION['message'] = "Error al actualizar los registros. Error ( ".$MySQLiconn->error.")";
	  } 
  	
 	else {
		
		$_SESSION['message'] = "Registro Actualizado";
	} 
 header("Location: reservacion");
 exit();
}
/* code for data update */

?>