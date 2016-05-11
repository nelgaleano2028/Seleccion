<?php
require_once('class_requisicion.php');
require_once('class_utilidades.php');
include_once("class_mailer.php");


$obj= new Requisicion();
$obj2= new Utilidades();

date_default_timezone_set('America/Bogota');


$centro_costo=@$_POST['centro_costo'];
$cargo=@$_POST['cargo'];
$reemplazo1=@$_POST['reemplazo'];
$reemplazo2=@$_POST['reemplazo_inactivo'];
$reemplazo3=@$_POST['reemplazo_cedula'];
$motivo=@$_POST['motivo'];
$ausencia=@$_POST['ausencia'];  
$fecha_inicioE=@$_POST['fecha_inicioE'];
$fecha_finE=@$_POST['fecha_finE'];
$fecha_inicioL=@$_POST['fecha_inicioL'];
$fecha_finL=@$_POST['fecha_finL'];
$sugerencia=@$_POST['sugerencia'];
$misma_area=@$_POST['misma_area']; 
$area_externa=@$_POST['area_externa']; 
$cod_epl_jefe=@$_POST['cod_epl_jefe'];
$id=@$_POST['id'];


if($reemplazo1 != -1 && isset($reemplazo1) ){

	$reemplazo=$reemplazo1;
	$num_select_reemp=1;

}else if($reemplazo2 != -1 && isset($reemplazo2) ){

	$reemplazo=$reemplazo2;
	$num_select_reemp=2;

}else if($reemplazo3 != -1 && isset($reemplazo3)){

	$reemplazo=$reemplazo3;
	$num_select_reemp=3;
}


if($motivo==1){
	$motivo_ausencia=$ausencia;
}else{

	$motivo_ausencia=null;
}

if($sugerencia==1){

 $sugerencia_persona=$misma_area;
}else{
	
 $sugerencia_persona=$area_externa;
}
	


$fecha_inicioE=$obj2->formatFecha($fecha_inicioE);

$fecha_finE=$obj2->formatFecha($fecha_finE);

$fecha_inicioL=$obj2->formatFecha($fecha_inicioL);

if($fecha_finL!=""){

	$fecha_finL=$obj2->formatFecha($fecha_finL);

}



$fecha_solicitud=$obj2->formatFecha(date("d-m-Y"));


$datos=$obj->ed_requisicionInterna($id,$centro_costo,$cargo,$reemplazo,$motivo,$motivo_ausencia,$fecha_inicioE,$fecha_finE,$fecha_inicioL,$fecha_finL,$sugerencia,$sugerencia_persona,$cod_epl_jefe,$fecha_solicitud,$num_select_reemp);

echo 1;


/*Enviar correo  a Javier trejo*/
/*
$destinatario="quake2400@gmail.com"; 

$mail= new mailer();

$mail->IsHTML(true);

$mail->addAddress($destinatario); 

 $mail->Subject = "Solicitud de nuevo cargo"; 
 
 $mail->Body = "Se ha enviado una solicitd de requisicion  favor de revisar"; // Mensaje a enviar
  
 $exito = $mail->Send(); // Envía el correo.


echo $datos; 
*/
?>