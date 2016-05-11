<?php session_start();

require_once('class_administracion.php');

require_once('class_utilidades.php');

$obj= new Administracion();


$obj2= new Utilidades();

date_default_timezone_set('America/Bogota');

$fecha=$obj2->formatFecha(date("d-m-Y"));

$ing=$obj->editar_integral($_POST['identificacion'],$_POST['nom_asp'],$_POST['ape_asp'],$_POST['edad'],$_POST['identificacion'],$_POST['estado_civil'],$_POST['cargo'],$_POST['bg3'],
	$_POST['cmt'],$_POST['letras'],$_POST['temp'],$_POST['caras'],$_POST['aprendizaje'],$_POST['conocimiento'],$_POST['observacion_psico'],$_POST['observacion_1'],
	$_POST['valor_1_1'], $_POST['valor_2_1'],$_POST['valor_3_1'],$_POST['observacion_2'],$_POST['comp_uno_laboral'],$_POST['valor_1_2'],$_POST['comp_dos_laboral'],
	$_POST['valor_2_2'], $_POST['comp_tres_laboral'], $_POST['valor_3_2'], $_POST['observacion_3'],$_POST['valor_1_3'],$_POST['valor_2_3'],$_POST['valor_3_3'],$_POST['observacion_4'],
	$_POST['valor_1_4'], $_POST['valor_2_4'],$_POST['valor_3_4'],$_POST['observacion_5'],$_POST['observacion_6'],$_POST['observacion_7'],$fecha,$_POST['prom_total'],$_POST['promedio_total_2'],$_POST['prom_total_3'],$_POST['promedio_total_4'],$_POST['id']);

if($ing){


	echo true;
}else{

	echo false;
}







?>