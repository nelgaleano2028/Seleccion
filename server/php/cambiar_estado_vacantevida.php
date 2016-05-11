<?php
require_once('class_solicitud.php');
require_once('class_utilidades.php');
include_once("class_mailer.php");




$obj = new Solicitudes();


$datos=$obj->cambiar_estado_vacantevida($_POST['codigo'],$_POST['cod_form']);

if($datos==1){

	echo 1; exit();
}else{

	echo 2; exit();

}
?>