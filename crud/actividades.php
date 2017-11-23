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

  ?>                        					