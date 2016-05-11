<?php require_once("class_administracion.php");


$obj= new Administracion();



$rs= $obj->update_tiempo($_POST['caras'],$_POST['bg3'],$_POST['letras'],$_POST['cmt'],$_POST['aprendizaje'],$_POST['temperamento'],$_POST['wartegg'],$_POST['pf']);


if($rs==true){

	echo true;

}else{

	echo false;

}




?>