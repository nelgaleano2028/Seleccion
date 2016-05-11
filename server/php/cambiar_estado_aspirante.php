<?php
require_once('class_solicitud.php');
require_once('class_utilidades.php');
require_once('class_empleado.php'); // la class empleado depende de la class utilidades porque extiende
include_once("class_mailer.php");


$estado=$_POST['estado'];

$obj = new Solicitudes();


//$obj5= new Utilidades();




//$_POST['codigo']  cedula del empleado

if($estado=='Seleccionado'){
	
	$datos=$obj->aceptar_vacante($_POST['codigo']);

	if($datos){

		$obj2= new Empleado();

		$insert=$obj2->basic_empleado($_POST['codigo']);

		if($insert){

			echo true;

		}else{

			echo false;

		}

	}else{

		echo false;
	}


}else if($estado=='No Cumple'){

	$datos=$obj->rechazar_vacante($_POST['codigo']);

}else{
	
	$datos=$obj->conproceso_vacante($_POST['codigo'], $_POST['estado']);
		
}



echo $_POST['codigo'];

?>