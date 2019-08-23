<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
if(!isset($_SESSION['userId'])) {
	header('location: ../index');
	//exit();
}
//include_once '../crud/conexion.php';
$id_reserva=$_POST['id_reserva'];
$jreport=$_POST['jreport'];
/*
$report = $MySQLiconn->query("SELECT sm.id_sub_menu,sm.nombre_sub_menu,sm.id_menu,sm.url
		FROM r_menu_sub sm
		WHERE sm.acceso=1
		AND  sm.id_sub_menu = ".$_GET['id_reporte']);
			$reportinfo = mysqli_fetch_assoc($report);
			$jreport=$reportinfo['url'];
			$MySQLiconn->close();
			*/
			
//$jreport_id = $_POST['id_reporte'];
//$jreport='MiReserva.jrxml';
//echo $jreport.' '.$id_reserva;

include_once("../bower_components/phpjasperxml/PHPJasperXML.inc.php");

include_once ('setting.php');

//$PHPJasperXML = new PHPJasperXML();
//$PHPJasperXML->debugsql=false;
$PHPJasperXML = new PHPJasperXML("en","TCPDF");
$PHPJasperXML->debugsql=false;
$PHPJasperXML->arrayParameter=array("p_Id_reserva"=>$id_reserva);
$PHPJasperXML->load_xml_file($jreport);

$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file


?>
