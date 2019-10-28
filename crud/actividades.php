<?php
include_once 'conexion.php';

if(isset($_POST['id_act']))
{
$id = $_POST['id_act'];

$act = $MySQLiconn->query( "SELECT * FROM actividad where id_categoria= $id" );


while ( $row = $act->fetch_array() ){
    $actividad .= "<option value='$row[id_actividad]'>$row[descripcion]</option>";
  }
echo $actividad;
	
}

if(isset($_POST['id_depto']))
{
$id_depto = $_POST['id_depto'];

$depto = $MySQLiconn->query( "SELECT * FROM municipio where id_depto= $id_depto" );

$municipio = '<option value="0">Seleccione municipio</option>';
while ( $row = $depto->fetch_array() ){
    $municipio .= "<option value='$row[id_municipio]'>$row[nombre_municipio]</option>";
  }
echo $municipio;
	
}

if(isset($_POST['id_municipio']))
{
$id_municipio = $_POST['id_municipio'];

$dest = $MySQLiconn->query( "SELECT d.id_destino,d.nombre_dest
FROM destino d
WHERE d.id_municipio = $id_municipio" );

$destino = '<option value="0">Seleccione destino</option>';
while ( $row = $dest->fetch_array() ){
    $destino .= "<option value='$row[id_destino]'>$row[nombre_dest]</option>";
  }
echo $destino;
	
}

if(isset($_POST['id_dest']))
{
$id_dest = $_POST['id_dest'];

$dest_precio = $MySQLiconn->query( "SELECT d.precio
FROM destino d
WHERE d.id_destino = $id_dest" );

$precio = mysqli_fetch_assoc($dest_precio);
echo $precio['precio'] ;
	
}


if(isset($_POST['fecha']))
{
	$id_dest = $_POST['fecha'];
	$json_array = array();
    $locate = $MySQLiconn->query("SET lc_time_names = 'es_ES'");
	$dest_info = $MySQLiconn->query( "SELECT vd.precio,rd.dias,t.inicio,t.fin
									FROM v_destinos vd
									LEFT JOIN horario_destino hd ON hd.id_destino = vd.id_destino
									INNER JOIN rango_dias rd ON rd.id_rango_dias = hd.id_rango_dias
									INNER JOIN tiempo t ON t.id_tiempo=hd.id_tiempo
									WHERE vd.id_estatus=1
									AND hd.estatus=1
									AND vd.id_destino =  $id_dest" );

	while($row = mysqli_fetch_assoc($dest_info))  
			   {  
					$json_array[] = $row;
			   }  
			   echo json_encode($json_array);
	
}


if (isset($_POST['email'])){
	$email = $MySQLiconn->real_escape_string($_POST['email']);
	$json_array = array();
	$info_user = $MySQLiconn->query("SELECT u.nombre, u.apellido,u.telefono,u.id_usuario
									FROM usuario u
									WHERE u.email = '$email'");
	
	while($row = mysqli_fetch_assoc($info_user))  
           {  
                $json_array[] = $row;
           }  
           echo json_encode($json_array);
			//var_dump($json_array);
			//var_dump($email);
	
}

if (isset($_POST['id_dest_sem'])){
	$id_dest = $MySQLiconn->real_escape_string($_POST['id_dest_sem']);
	$delete_val = array();
	$id =0;
	$t_sem ='';
	$sem =$MySQLiconn->query("SELECT DISTINCT rd.cod AS dias, hd.id_rango_dias
							FROM horario_destino hd
							INNER JOIN rango_dias rd ON rd.id_rango_dias = hd.id_rango_dias
							WHERE hd.id_destino = ".$id_dest);
	while ($array_sem = mysqli_fetch_assoc($sem)){
		$id = $array_sem['id_rango_dias'];
		if(($id<7)){ 
			$delete_val []= $array_sem['dias'];
			}
		else {
			$t_sem =$array_sem['dias'];
		}
		}
	//var_dump($t_sem);
	       if(($id > 7)){ 
			   $delete_val = explode("," , $t_sem);
		   }
	  		$semanas = array(0,1,2,3,4,5,6);
			// Search for the array key and unset   
			foreach($delete_val as $key){
				$keyToDelete = array_search($key, $semanas);
				unset($semanas[$keyToDelete]);
				$semanas = array_values($semanas);
			}
			$semanas = "'".implode(",", $semanas)."'";
			echo $semanas;
	
}

if(isset($_POST['id_dest_hor'])){
	$id_dest = $MySQLiconn->real_escape_string($_POST['id_dest_hor']);
	$horario_list = $MySQLiconn->query("SELECT hd.id_horario_destino, CONCAT (TIME_FORMAT(t.inicio, '%h:%i %p'),'-', 									TIME_FORMAT(t.fin, '%h:%i %p')) as horario
								FROM horario_destino hd
								INNER JOIN tiempo t ON t.id_tiempo = hd.id_tiempo
								WHERE hd.id_destino = ".$id_dest);
	$cmbo_horarios = '<option value="">Seleccione horario</option>';
	while($horarios = $horario_list->fetch_array()){
		$cmbo_horarios .= "<option value='$horarios[id_horario_destino]'>$horarios[horario]</option>";
	}
	echo $cmbo_horarios;
	//var_dump($cmbo_horarios);
}

if(isset($_POST['fecha']) && isset($_POST['id_horario']) && isset($_POST['id_destino']) ){
	
}

  ?>                        					