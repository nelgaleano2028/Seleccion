<?php session_start();

require_once("class_administracion.php");

$obj= new  Administracion();

$datos=$obj-> lista_pruebaAsp($_POST['cedula']);



$obj2= new Administracion();

$prueba_tecnica=$obj2->otras_pruebas($_POST['cedula'],'Prueba_Tecnica');



$obj3= new Administracion();

$otras=$obj3->otras_pruebas($_POST['cedula'],'Otros');



$obj4=  new Administracion();

$referencias_laborales=$obj4->otras_pruebas($_POST['cedula'],'Referencias_laborales');




echo json_encode(array('data1'=>$datos, 'data2'=>$prueba_tecnica, 'data3'=>$otras, 'data4'=>$referencias_laborales )); exit();

?>