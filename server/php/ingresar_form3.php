<?php
require_once('class_avila.php');
require_once("class_utilidades.php");



date_default_timezone_set('America/Bogota');

$fecha=date('d-m-Y');

$obj2= new Utilidades();

$fec_ini=$obj2->formatFecha($_POST['fec_ini']);

$obj3= new Utilidades();

$fec_fin=$obj3->formatFecha($_POST['fec_fin']);


$obj4= new Utilidades();

$fec_iniL=$obj4->formatFecha($_POST['fec_iniL']);


$obj5= new Utilidades();

$fec_finL=$obj5->formatFecha($_POST['fec_finL']);


$obj= new Avila();

$rs=$obj->insert_formTres($_POST['supernumerario'],$_POST['centro_costo'],$_POST['cargo'],$_POST['persona'],$fec_ini,$fec_fin,$fec_iniL,$fec_finL);


if($rs==true){
	echo true;
}else{

	echo false;
}



?>
		 