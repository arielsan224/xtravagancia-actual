<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("../bower_components/phpjasperxml/PHPJasperXML.inc.php");

include_once ('setting.php');



$id=1;//$_GET['id'];
$PHPJasperXML = new PHPJasperXML();
//$PHPJasperXML->debugsql=false;
$PHPJasperXML->arrayParameter=array("p_Id_reserva"=>$id);
$PHPJasperXML->load_xml_file("MiReserva.jrxml");

$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file


?>
