<?php
require_once('class_requisicion.php');
require_once("class_utilidades.php");

//fecha, reemplazo ,ausencia


date_default_timezone_set('America/Bogota');

$fecha=date('d-m-Y');

$obj= new Utilidades();

$fecha=$obj->formatFecha($fecha);




$ausencia=$_POST['ausencia'];

$reemplazo=$_POST['reemplazo'];


$obj2=  new Requisicion();

$rs= $obj2->get_dias($fecha, $reemplazo, $ausencia);


if($rs==""){


	echo 0;


}else{

	echo $rs;
}





 

?>