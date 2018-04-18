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
	 $id_estatus = $MySQLiconn->real_escape_string($_POST['id_estatus']);
//     $imagen = $MySQLiconn->real_escape_string($_POST['imagen']);
//	 $imagen="img/slider_single_tour/leon/1_medium.jpg";
	 $items1 = ($_POST['actividad']);
	 $url = '../uploads/'.$descripcion.'/';
	 $nombre_img = $_FILES['img_dest']['name'];
	 $imagen=$url.$nombre_img;
		//var_dump($_FILES);
		//var_dump($imagen);
	
		
	if (!file_exists($url)) {
		mkdir($url, 0777, true);
	}
	 
	if(is_uploaded_file($_FILES['img_dest']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['img_dest']['tmp_name'], $imagen )) {
	
	    
 
		  $SQL = $MySQLiconn->query("INSERT INTO destino (descripcion,id_municipio,precio,dias,imagen,estatus) VALUES('$descripcion','$id_municipio','$precio','$dias','$imagen','$id_estatus')");

			$inserted = mysqli_insert_id($MySQLiconn);

		 if(!$SQL)
			  {
			   echo $MySQLiconn->error;
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
			}
			$_SESSION['message'] = "Registro Guardado";
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
if(isset($_GET['del']))
{
 $SQL = $MySQLiconn->query("DELETE FROM destino WHERE id_destino=".$_GET['del']);
 $SQL2 = $MySQLiconn->query("ALTER TABLE destino AUTO_INCREMENT=1");
 $_SESSION['message'] = "Registro Borrado";
 if(!$SQL)
  {
   echo $MySQLiconn->error;
  } 
 header("Location: destino.php");
 exit();
}
/* code for data delete */



/* code for data update */
if(isset($_GET['edit']))
{
 $SQL = $MySQLiconn->query("SELECT dest.id_destino,dest.descripcion, mun.id_depto, dest.id_municipio, 
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
	

}

if(isset($_POST['update']))
{
     $descripcion = $MySQLiconn->real_escape_string($_POST['descripcion']);
     $id_municipio = $MySQLiconn->real_escape_string($_POST['id_municipio']);
     $precio = $MySQLiconn->real_escape_string($_POST['precio']);
     $dias = $MySQLiconn->real_escape_string($_POST['dias']);
	 $id_estatus = $MySQLiconn->real_escape_string($_POST['id_estatus']);
//     $imagen = $MySQLiconn->real_escape_string($_POST['imagen']);
//	 $imagen="img/slider_single_tour/leon/1_medium.jpg";
	 $items1 = ($_POST['actividad']);
	 $id_destino=($_POST['id_destino']);
	 $url = '../uploads/'.$descripcion.'/';
	 $nombre_img = $_FILES['img_dest']['name'];
	 $imagen=$url.$nombre_img;
	 //var_dump($_FILES);
	 //var_dump($imagen);
		
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
	else {
		$_SESSION['message'] = "No se cargo ninguna imagen";
		header("Location: destino.php");
 		exit();
	} 
	
	 
	$SQL = $MySQLiconn->query("UPDATE destino SET descripcion= '".$descripcion."', id_municipio='".$id_municipio."', precio='".$precio."', dias='".$dias."', estatus='".$id_estatus."'  WHERE id_destino=".$id_destino);
 	$_SESSION['message'] = "Registro Actualizado";
 
	if(!$SQL)
	  {
	   echo $MySQLiconn->error;
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
	} 
 header("Location: destino.php");
 exit();
}
/* code for data update */

?>