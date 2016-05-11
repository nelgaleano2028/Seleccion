<?php session_start();

require_once("class_prueba_respuesta.php");
require_once("class_prueba_inserccion.php");
require_once("class_utilidades.php");

$respuestas=$_POST;



$sanguineo=$_POST['sanguineo'];
$colerico=$_POST['colerico'];
$melancolico=$_POST['melancolico'];
$flematico=$_POST['flematico'];




asort($respuestas);

//print_r($respuestas); die();

$i=0;
foreach($respuestas as $clave=>$valor){


	$preg_asp[$i]=$clave;

	$i++;
}


if($respuestas[$preg_asp[2]]==$respuestas[$preg_asp[1]]){

	$resp=$preg_asp[3]." / ".$preg_asp[2]." / ".$preg_asp[1];
	
}else{
	
	$resp=$preg_asp[3]." / ".$preg_asp[2];
	
}


	
date_default_timezone_set('America/Bogota');

$fecha=date('d-m-Y');

$obj5= new Utilidades();

$fecha=$obj5->formatFecha($fecha);

$cod_asp=$_SESSION['cod_epl'];

$obj= new Inserccion();

$obj->insert_resp_temperamento($sanguineo,$colerico,$melancolico,$flematico,$resp,$cod_asp,$fecha);





?>