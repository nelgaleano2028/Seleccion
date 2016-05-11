<?php session_start();

require_once('class_utilidades.php');
require_once('class_empleado.php');


$obj= new Empleado();

$datos=$obj->atencion_detalle($_POST['cedula']);

echo json_encode($datos);






?>