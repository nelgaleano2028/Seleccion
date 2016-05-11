<?php session_start();

require_once("class_prueba_respuesta.php");
require_once("class_prueba_inserccion.php");
require_once("class_utilidades.php");


$obj= new Respuestas();

$datos=$obj->caras_resp();

$buenos=array();

$malos=array();

$caras=$_POST;


// cuantas preguntas alcanzo a responder el aspirante
$preg_asp=""; // preguntas del aspirante

$resp_asp=""; // respuestas del aspirantes

foreach($caras as $clave=>$valor){


	$preg_asp.=$clave.",";

	$resp_asp.=$valor.",";

	if($valor == $datos[$clave]['resp_caras']){

		array_push($buenos, $clave);

	}else{

		array_push($malos, $clave);

	}


}


$preg_asp = substr($preg_asp, 0, -1);

$resp_asp = substr($resp_asp, 0, -1);

$cod_asp=$_SESSION['cod_epl'];

date_default_timezone_set('America/Bogota');

$fecha=date('d-m-Y');

$obj5= new Utilidades();

$fecha=$obj5->formatFecha($fecha);

$obj2= new Inserccion();

$rs=$obj2->insert_resp_caras($cod_asp, $preg_asp, $resp_asp, $fecha );




if($rs == true){


	$PD=count($buenos); //Cuantas buenas saco

	$PC= ($PD / 60) * 100;  //PROMEDIO DE LAS BUENAS

	$PC= round($PC); 

	$obj3= new Inserccion();


	$rs=$obj3->insert_caras_puntuacion($cod_asp, $PD, $PC, $fecha);


	if($rs==true){

		echo true;

	}else{

		echo false;

	}

}

?>