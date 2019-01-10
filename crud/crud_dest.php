<?php
session_start();
include_once 'conexion.php';

/* code for data insert */
if(isset($_POST['save']))
{

     $nombre_dest = $MySQLiconn->real_escape_string($_POST['nombre_dest']);
	 $desc_corta = $MySQLiconn->real_escape_string($_POST['desc_corta']);
	 $desc_larga = $MySQLiconn->real_escape_string($_POST['desc_larga']);
     $id_municipio = $MySQLiconn->real_escape_string($_POST['id_municipio']);
     $precio = $MySQLiconn->real_escape_string($_POST['precio']);
     $dias = $MySQLiconn->real_escape_string($_POST['dias']);
	 $id_estatus = $MySQLiconn->real_escape_string($_POST['id_estatus']);
//     $imagen = $MySQLiconn->real_escape_string($_POST['imagen']);
//	 $imagen="img/slider_single_tour/leon/1_medium.jpg";
	 $items1 = ($_POST['actividad']);
	 $url = '../uploads/'.$nombre_dest.'/';
	 $url2 = 'uploads/'.$nombre_dest.'/';
	 $nombre_img = $_FILES['img_dest']['name'];
	 $imagen=$url.$nombre_img;
	 $imagen_ins=$url2.$nombre_img;
		//var_dump($_FILES);
		//var_dump($imagen);
	
		
	if (!file_exists($url)) {
		mkdir($url, 0777, true);
	}
	 
	if(is_uploaded_file($_FILES['img_dest']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['img_dest']['tmp_name'], $imagen )) {
	
	    
 
		  $SQL = $MySQLiconn->query("INSERT INTO destino (nombre_dest,desc_corta,desc_larga,id_municipio,precio,dias,imagen,estatus) VALUES('$nombre_dest','$desc_corta ','$desc_larga ',' $id_municipio','$precio','$dias','$imagen_ins','$id_estatus')");

			$inserted = mysqli_insert_id($MySQLiconn);

		 if(!$SQL)
			  {
			   //echo $MySQLiconn->error;
			   $_SESSION['message'] = "Error al insertar los registros. Error ( ".$MySQLiconn->error.")";
			  } 

			elseif($inserted != 0 ) {

				while(true) {
					 //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
							$item1 = current($items1);


							////// ASIGNARLOS A VARIABLES ///////////////////
							$id_act=(( $item1 !== false) ? $item1 : ", &nbsp;");


							//// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
							$valores='('.$id_act.',"'.$inserted.'"),';

							//////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
							$valoresQ= substr($valores, 0, -1);

							///////// QUERY DE INSERCIÓN ////////////////////////////
							$sql = "INSERT INTO maestro_act (id_actividad, id_destino) 
							VALUES $valoresQ";


							$sqlRes=$MySQLiconn->query($sql) or mysqli_error();


							// Up! Next Value
							$item1 = next( $items1 );


							// Check terminator
							if($item1 === false ) break;
				} 
				$_SESSION['message'] = "Registro Guardado";
			}
			//$_SESSION['message'] = "Registro Guardado";
				//print_r( $_SESSION['message'] ); 
					}
			else{
				$_SESSION['message'] = "La imagen no se guardo favor verificar";
			}
			}
	else {
		$_SESSION['message'] = "No se cargo ninguna imagen";
	}
	
}
/* code for data insert */


/* code for data delete */
if(isset($_GET['del'], $_GET['est']))
{
  //if(unlink($_GET['url'])) { 
	 if ($_GET['est']==1)
	 {
		 $estatus = 2;
		 $est_text = 'inactivar';
		 $esta_text = 'Inactivado';
	 }
	 else {
		 $estatus = 1;
		 $est_text = 'Activar';
		 $esta_text = 'Activado';
	 }
	
	 //$SQL = $MySQLiconn->query("DELETE FROM destino WHERE id_destino=".$_GET['del']);
	 $SQL = $MySQLiconn->query("UPDATE destino SET estatus= '".$estatus."'  WHERE id_destino=".$_GET['del']);
	  
	 
	 if(!$SQL)
	  {
	   //echo $MySQLiconn->error;
		 $_SESSION['message'] = "Error al '".$est_text."' los registros. Error ( ".$MySQLiconn->error.")";
	  } 
	 else {
		 $_SESSION['message'] = "Registro ".$esta_text;
		 //$SQL2 = $MySQLiconn->query("ALTER TABLE destino AUTO_INCREMENT=1");
	 }
	 header("Location: destino.php");
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
 $SQL = $MySQLiconn->query("SELECT dest.id_destino,dest.nombre_dest,dest.desc_corta,dest.desc_larga, mun.id_depto, dest.id_municipio, 
								   (SELECT ac.id_categoria
									FROM maestro_act as ma
									inner join actividad as ac on ma.id_actividad = ac.id_actividad
									where ma.id_destino = dest.id_destino
									group by ac.id_categoria) as id_categoria,
								   dest.precio,dest.dias,
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
     $nombre_dest = $MySQLiconn->real_escape_string($_POST['nombre_dest']);
	 $desc_corta = $MySQLiconn->real_escape_string($_POST['desc_corta']);
	 $desc_larga = $MySQLiconn->real_escape_string($_POST['desc_larga']);
     $id_municipio = $MySQLiconn->real_escape_string($_POST['id_municipio']);
     $precio = $MySQLiconn->real_escape_string($_POST['precio']);
     $dias = $MySQLiconn->real_escape_string($_POST['dias']);
	 $id_estatus = $MySQLiconn->real_escape_string($_POST['id_estatus']);
//     $imagen = $MySQLiconn->real_escape_string($_POST['imagen']);
//	 $imagen="img/slider_single_tour/leon/1_medium.jpg";
	 $items1 = ($_POST['actividad']);
	 $id_destino=($_POST['id_destino']);
	 $carpeta_ant = '../uploads/'.$getROW['nombre_dest'].'/';
	 $url = '../uploads/'.$nombre_dest.'/';
	 $nombre_img = $_FILES['img_dest']['name'];
	 $imagen=$url.$nombre_img;
	 //var_dump($_FILES);
	 //var_dump($imagen);
	//var_dump($carpeta_ant,$url);
	/*if (file_exists($carpeta_ant)){
		var_dump('archivo existe');
	}*/
	
	if ($carpeta_ant != $url){
		rename($carpeta_ant,$url);
		chmod($url, 0777);
		//var_dump('carpetas no son iguales');
	}
	/*else
	{
		var_dump('las carpetas son iguales');
	}
	exit;*/
		
	if (!file_exists($url)) {
		mkdir($url, 0777, true);
	}
	/*else {
		chmod($url, 0777);
	}*/
 	if (is_uploaded_file($_FILES['img_dest']['tmp_name'])){
		if(move_uploaded_file($_FILES['img_dest']['tmp_name'], $imagen )) {
			$SQL4 = $MySQLiconn->query("UPDATE destino SET imagen='".$imagen."'  WHERE id_destino=".$id_destino);
		}
		else {
			$_SESSION['message'] = "La imagen no se guardo favor verificar";
			header("Location: destino.php");
 			exit();
		}
	}
//	else {
//		$_SESSION['message'] = "No se cargo ninguna imagen";
//		header("Location: destino.php");
// 		exit();
//	}  en la actualizacion si no se cargo imagen es porque no se actualizo la imagen
	
	 
	$SQL = $MySQLiconn->query("UPDATE destino SET nombre_dest= '".$nombre_dest."',desc_corta='".$desc_corta."',desc_larga='".$desc_larga."', id_municipio='".$id_municipio."', precio='".$precio."', dias='".$dias."', estatus='".$id_estatus."'  WHERE id_destino=".$id_destino);
 	
 
	if(!$SQL)
	  {
	   //echo $MySQLiconn->error;
	   $_SESSION['message'] = "Error al actualizar los registros. Error ( ".$MySQLiconn->error.")";
	  } 
  	
 	else {
		
		$SQL2 = $MySQLiconn->query("DELETE FROM maestro_act WHERE id_destino=".$id_destino);
 		$SQL3 = $MySQLiconn->query("ALTER TABLE maestro_act AUTO_INCREMENT=1");
	
		while(true) {
			 //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
				    $item1 = current($items1);
				    
				    
				    ////// ASIGNARLOS A VARIABLES ///////////////////
				    $id_act=(( $item1 !== false) ? $item1 : ", &nbsp;");
				    

				    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
				    $valores='('.$id_act.',"'.$id_destino.'"),';

				    //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
				    $valoresQ= substr($valores, 0, -1);
				    
				    ///////// QUERY DE INSERCIÓN ////////////////////////////
				    $sql = "INSERT INTO maestro_act (id_actividad, id_destino) 
					VALUES $valoresQ";

					
					$sqlRes=$MySQLiconn->query($sql) or mysqli_error();

				    
				    // Up! Next Value
				    $item1 = next( $items1 );
				    
				    
				    // Check terminator
				    if($item1 === false ) break;
		} 
		$_SESSION['message'] = "Registro Actualizado";
	} 
 header("Location: destino.php");
 exit();
}
/* code for data update */

?>