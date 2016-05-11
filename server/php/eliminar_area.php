<?php
require_once('class_requisicion.php');

$obj= new Requisicion();

$datos=$obj->eliminar_area($_POST['id']);

echo $datos;
?>