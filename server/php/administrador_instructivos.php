<?php

require_once('class_administracion.php');

$obj= new Administracion();

$orden=$_POST['orden'];

$grupo=$_POST['grupo'];

if($_POST['bandera']==1){


	echo $obj->primer_test_prueba($grupo);


}else if($_POST['bandera']==2){

	$arreglo=$obj->orden_instructivo($grupo);

	//print_r($arreglo); die();

	$posicion=(int)array_search($_POST['orden'],$arreglo);

	@$id_prueba=$arreglo[++$posicion];


	if($id_prueba ==""){

		echo 0; 


	}else{

		echo $obj->traer_siguiente_prueba($id_prueba,$grupo);

	}

	

}


?>