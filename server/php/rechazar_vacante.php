<?php
require_once('class_solicitud.php');
require_once('class_utilidades.php');
include_once("class_mailer.php");




$obj = new Solicitudes();


$datos=$obj->rechazar_vacante($_POST['cedula']);


echo $datos;

?>