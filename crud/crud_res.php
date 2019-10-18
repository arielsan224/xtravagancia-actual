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
	 //$id_estatus = $MySQLiconn->real_escape_string($_POST['id_estatus']);
	 $personas = $MySQLiconn->real_escape_string($_POST['personas']);
	 $total = $MySQLiconn->real_escape_string($_POST['total']);
	 //$id_user = $MySQLiconn->real_escape_string($_POST['id_user']);
	 $password = md5(123);
	 //$id_user = $_SESSION['userId'];
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
 $SQL = $MySQLiconn->query("SELECT dest.id_destino,dest.nombre_dest, 																dest.direccion,dest.desc_corta,dest.desc_larga, mun.id_depto, 											dest.id_municipio, 
								   (SELECT ac.id_categoria
									FROM maestro_act as ma
									inner join actividad as ac on ma.id_actividad = ac.id_actividad
									where ma.id_destino = dest.id_destino
									group by ac.id_categoria) as id_categoria,
								   dest.precio,dest.dias,dest.minimo,
								   dest.imagen,dest.estatus
							from destino as dest
							inner join municipio as mun on dest.id_municipio = mun.id_municipio
							WHERE dest.id_destino=".$_GET['edit']);
 $getROW = $SQL->fetch_array();
 
 if(!$SQL)
  {
   //echo $MySQLiconn->error;
	 $_SESSION['message'] = "Error al cargar los registros. Error ( ".$MySQLiconn->error.")";
  }
	

}

if(isset($_POST['update']))
{
     $nombres = $MySQLiconn->real_escape_string($_POST['nombres']);
	 $apellidos = $MySQLiconn->real_escape_string($_POST['apellidos']);
	 $email = $MySQLiconn->real_escape_string($_POST['email']);
     $id_dest = $MySQLiconn->real_escape_string($_POST['id_dest']);
     $datepicker = $MySQLiconn->real_escape_string($_POST['datepicker']);
     $precio = $MySQLiconn->real_escape_string($_POST['precio']);
	 //$id_estatus = $MySQLiconn->real_escape_string($_POST['id_estatus']);
	 $personas = $MySQLiconn->real_escape_string($_POST['personas']);
	 $total = $MySQLiconn->real_escape_string($_POST['total']);
		

	
	 
	$SQL = $MySQLiconn->query("UPDATE destino SET nombre_dest= '".$nombre_dest."',desc_corta='".$desc_corta."',desc_larga='".$desc_larga."', id_municipio='".$id_municipio."', precio='".$precio."', dias='".$dias."', minimo ='".$minimo."', direccion = '".$direccion."' WHERE id_destino=".$id_destino);
 	
 
	if(!$SQL)
	  {
	   //echo $MySQLiconn->error;
	   $_SESSION['message'] = "Error al actualizar los registros. Error ( ".$MySQLiconn->error.")";
	  } 
  	
 	else {
		
		$_SESSION['message'] = "Registro Actualizado";
	} 
 header("Location: destino.php");
 exit();
}
/* code for data update */

?>