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
WHERE d.id_municipio = $id_depto" );

$destino = '<option value="0">Seleccione destino</option>';
while ( $row = $dest->fetch_array() ){
    $destino .= "<option value='$row[id_destino]'>$row[nombre_dest]</option>";
  }
echo $destino;
	
}

  ?>                        					