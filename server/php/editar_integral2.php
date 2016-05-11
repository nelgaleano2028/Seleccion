<?php session_start();

require_once('class_administracion.php');

require_once('class_utilidades.php');

$obj= new Administracion();


$obj2= new Utilidades();

date_default_timezone_set('America/Bogota');

$fecha=$obj2->formatFecha(date("d-m-Y"));

$ing=$obj->editar_integral2($_POST['id'],$_POST['cos_asprefperosonal'],$_POST['nombreCandidato'],$_POST['cargoAspira'],$_POST['fechaLb'],$_POST['organizacion1'],$_POST['telefono1'],$_POST['referido1'],$_POST['cargo1'],$_POST['funcionesr1'],$_POST['tiempol1'],$_POST['motivore1'],$_POST['puntaje1'],$_POST['puntaje2'],$_POST['puntaje3'],$_POST['puntaje4'],$_POST['puntaje5'],$_POST['puntaje6'],$_POST['puntaje7'], $_POST['puntaje8'],$_POST['puntajegeneral'],$_POST['aspectore1'],$_POST['contrataria1'],$_POST['observaciones1'],$_POST['verificadopor1'],$_POST['organizacion2'], $_POST['telefono2'], $_POST['referido2'],$_POST['cargo2'],$_POST['funcionesrea2'],$_POST['tiempolb2'],$_POST['motivore2'],$_POST['puntaje12'],$_POST['puntaje22'], $_POST['puntaje32'],$_POST['puntaje42'],$_POST['puntaje52'],$_POST['puntaje62'],$_POST['puntaje72'],$_POST['puntaje82'],$_POST['puntajegeneral2'],$_POST['aspectosreal2'],$_POST['observaciones2'],$_POST['verificadopor2'],$_POST['nombrerespersonal'],$_POST['telefonorespersonal'],$_POST['ocupacionrespersonal'],$_POST['vinculorespersonal'],$_POST['descotro'],$_POST['tiemporespersonal'],$_POST['descriprefpersonal'],$_POST['porrecomienpersonal'],$_POST['fortalpersonal'],$_POST['empresalaborocandpersonal'],$_POST['verificadoporultimo'],	$_POST['conceptogestionhumana']);

if($ing){


	echo true;
}else{

	echo false;
}







?>