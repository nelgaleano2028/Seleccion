<?php
require_once('class_avila.php');
require_once("class_utilidades.php");



date_default_timezone_set('America/Bogota');

$fecha=date('d-m-Y');

$obj5= new Utilidades();

$fecha=$obj5->formatFecha($fecha);

$obj= new Avila();

$rs=$obj->insert_formUno($_POST['centro_costo'],$_POST['cargo'],$_POST['persona'],$_POST['salario'],$_POST['beneficiario'],$fecha);


if($rs==true){
	echo true;
}else{

	echo false;
}



?>
		