<?php

session_start();
include_once 'conexion.php';

if(isset($_POST['save']))
{

    $items1 = ($_POST['id']);
	$id_d = 2;
	$actividad = $MySQLiconn->real_escape_string($_POST['actividad']);
	$id_categoria = $MySQLiconn->real_escape_string($_POST['id_categoria']);
 
	$SQL = $MySQLiconn->query("INSERT INTO destino(descripcion,id_categoria) VALUES('$actividad','$id_categoria')");
	$_SESSION['message'] = "Registro Guardado";
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
				    $id=(( $item1 !== false) ? $item1 : ", &nbsp;");
				    

				    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
				    $valores='('.$id.',"'.$inserted.'"),';

				    //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
				    $valoresQ= substr($valores, 0, -1);
				    
				    ///////// QUERY DE INSERCIÓN ////////////////////////////
				    $sql = "INSERT INTO alumnos (id, id_d) 
					VALUES $valoresQ";
					
					echo "<br>" . $sql; 

					
					//$sqlRes=$conexion->query($sql) or mysql_error();

				    
				    // Up! Next Value
				    $item1 = next( $items1 );
				    
				    // Check terminator
				    if($item1 === false ) break;
    
				}
	}
	
//  for ($i=0;$i<count($items1);$i++)    
//	{     
//	echo "<br> Id " . $i . ": " . $items1[$i];    
//	} 
	
  
}


?>
