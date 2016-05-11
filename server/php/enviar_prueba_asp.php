<?php
require_once("../librerias/lib/connection.php");

require_once('class_administracion.php');
require_once('class_utilidades.php');
include_once("class_mailer.php");


$obj= new  Administracion();


$datos=$obj->enviar_pruebaAsp($_POST['cedula'],$_POST['vacante']);




if($datos==1){


	echo 1;
}else{

	echo 2;
}




?>