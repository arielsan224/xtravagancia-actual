<?php
include ('crud/conexion.php');

$limit =5;
$pag=(int)$_GET['pag'];
if($pag<1)
{
	$pag=1;
}
$offset =($pag-1)*$limit;

$mun = $MySQLiconn->query("select mun.id_municipio,dep.nombre_depto, mun.nombre_municipio 
from municipio mun inner join departamento dep on mun.id_depto = dep.id_depto 
order by mun.Id_municipio limit $offset,$limit");

$total_mun = $MySQLiconn->query("Select mun.id_municipio
from municipio mun inner join departamento dep on mun.id_depto = dep.id_depto");

$total= $total_mun-> rowCount();

$total_pag = ceil($total/$limit);
$links= array();
for ($i=1; $i <=$total_pag; $i++)
{
	
}

?>