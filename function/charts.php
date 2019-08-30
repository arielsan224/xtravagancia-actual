<?php 
session_start();
include_once '../crud/conexion.php';


if (isset($_POST['data'])){
	$id = $_POST['data'];
	
	if ($id==1)
	{
		$json_mes1 = array();
        $json_cant_dest1 = array();
		$json_array = array();
		$locate = $MySQLiconn->query("SET lc_time_names = 'es_ES'");
        $chart = $MySQLiconn -> query(" SELECT count(d.id_destino) AS cant_dest, MONTHNAME(r.fecha_reservacion) AS mes 
										FROM v_destinos d
										INNER JOIN reservacion r  ON r.id_destino = d.id_destino
										WHERE YEAR(r.fecha_reservacion) = YEAR(CURDATE())
										GROUP BY MONTH (r.fecha_reservacion), MONTHNAME(r.fecha_reservacion)
										ORDER BY MONTH (r.fecha_reservacion)");

		while($row = mysqli_fetch_assoc($chart))  
           {  
                //$json_mes1[] = $row['mes']; 
			   	//$json_cant_dest1[] = $row['cant_dest']; 
			    $json_array[] = $row;
           }  
           /*echo '<pre>';  
           print_r(json_encode($json_array));  
           echo '</pre>';*/  
           echo json_encode($json_array);
		   //echo $json_array;
		   //echo json_encode($json_array2);
		}

}
	


	


?>

