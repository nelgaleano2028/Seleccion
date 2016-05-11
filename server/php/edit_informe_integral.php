<?php session_start();

require_once('class_administracion.php');

require_once('class_utilidades.php');

$obj= new Administracion();


$obj2= new Utilidades();

date_default_timezone_set('America/Bogota');



if($_POST['bandera']==1){



  $update=$obj->update_informe_integral($_POST['cedula'],$_POST['observacion_1'],$_POST['valor_1_1'],$_POST['valor_2_1'],$_POST['valor_3_1'] );


	if($update != false){


		echo $_POST['cedula'];

	}else{

		echo false;
	}



}else if($_POST['bandera']==2){



	$update=$obj->update_informe_integral4($_POST['id'],$_POST['observacion_2'],$_POST['valor_1_2'],$_POST['valor_2_2'],$_POST['valor_3_2'] );


	if($update == true){


		echo true;

	}else{

		echo false;
	}



}else if($_POST['bandera']==3){



	$update=$obj->update_informe_integral5($_POST['id'],$_POST['observacion_3'],$_POST['valor_1_3'],$_POST['valor_2_3'],$_POST['valor_3_3'] );


	if($update == true){


		echo true;

	}else{

		echo false;
	}



}else if($_POST['bandera']==4){



	$fecha=$obj2->formatFecha(date("d-m-Y"));



	$update=$obj->update_informe_integral6($_POST['id'],$_POST['observacion_4'],$_POST['observacion_5'],$_POST['observacion_6'], $fecha);


	if($update == true){


		echo true;

	}else{

		echo false;
	}



}



?>