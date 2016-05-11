<?php require_once("class_administracion.php");


$obj= new Administracion();

$rs= $obj->ing_grupo($_POST['grupo']);


if($rs==true){

	echo true;

}else{

	echo false;

}




?>