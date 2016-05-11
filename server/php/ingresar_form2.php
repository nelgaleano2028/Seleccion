<?php
require_once('class_avila.php');
require_once("class_utilidades.php");



date_default_timezone_set('America/Bogota');

$fecha=date('d-m-Y');

$obj5= new Utilidades();

$fecha=$obj5->formatFecha($_POST['fec_nivel']);

$obj= new Avila();

$rs=$obj->insert_formDos($_POST['supernumerario'],$_POST['centro_costo'],$_POST['cargo'],$_POST['persona'],$_POST['titular'],$_POST['cuanto_inicia'],$fecha);


if($rs==true){
	echo true;
}else{

	echo false;
}



?>
		 