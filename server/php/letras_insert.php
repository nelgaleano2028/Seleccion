<?php session_start();

require_once("class_prueba_respuesta.php");
require_once("class_prueba_inserccion.php");
require_once("class_utilidades.php");

$grupo=$_SESSION['grupo']; //grupo 
$cod_asp=$_SESSION['cod_epl']; // codigo del aspirante


$PD=$_POST['pd']; // cuantas buenas saque


$obj= new Respuestas();

$letras_centiles=$obj->letras_centiles($grupo);



for($i=1; $i<count($letras_centiles); $i++){


	if((int)$letras_centiles[$i]["pd"] == $PD ){

		$PC=(int)$letras_centiles[$i]["centil"];

		break;

	}
}



date_default_timezone_set('America/Bogota');

$fecha=date('d-m-Y');

$obj2= new Utilidades();

$fecha=$obj2->formatFecha($fecha);




$obj3= new Inserccion();


	$rs=$obj3->insert_letras_puntuacion($cod_asp, $PD, $PC, $fecha);


	if($rs==true){

		echo true;

	}else{

		echo false;

	}






?>