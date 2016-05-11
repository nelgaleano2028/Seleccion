<?php session_start();

require_once("class_prueba_respuesta.php");
require_once("class_prueba_inserccion.php");
require_once("class_utilidades.php");



// cuantas preguntas alcanzo a responder el aspirante
$preg_asp=""; // preguntas del aspirante

$resp_asp=""; // respuestas del aspirantes



/*Para saber cuantas buenas y malas quedaron*/
foreach($_POST as $clave=>$valor){

	if($valor != ""){

		$preg_asp.=$clave.",";

		$resp_asp.=$valor.",";


	}

	
	
}


$preg_asp = substr($preg_asp, 0, -1);

$resp_asp = substr($resp_asp, 0, -1);

$cod_asp=$_SESSION['cod_epl'];
// $grupo=$_SESSION['grupo'];
$grupo=$_SESSION['grupo']; //grupo quemado


date_default_timezone_set('America/Bogota');

$fecha=date('d-m-Y');

$obj5= new Utilidades();

$fecha=$obj5->formatFecha($fecha);


$obj2= new Inserccion();

$rs=$obj2->insert_resp_cmt($cod_asp, $preg_asp, $resp_asp, $fecha );




?>