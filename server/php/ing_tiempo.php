<?php require_once("class_administracion.php");




$obj= new Administracion();


$rs=$obj->eliminar_pruebaGurpo($_POST['grupo']);

$id_grupo=$_POST['grupo'];


if($rs==true){
 	

 	//eliminar el grupo 
 	unset($_POST['grupo']);

 	$sql="";

 	foreach ($_POST as $key => $value) {
 		
 		$sql.="insert into pruebas_asp_gru values('".$key."', '".$id_grupo."')";
 	}


 	$obj2=new Administracion();

	$rs2= $obj2->ing_tiempo($sql);


	if($rs2==true){

		echo true;

	}else{

		echo false;

	}

}else{

	echo false;

}




?>