<?php
require_once('class_requisicion.php');
require_once('class_utilidades.php');
include_once("class_mailer.php");

$obj= new Requisicion();

$obj2= new Utilidades();

date_default_timezone_set('America/Bogota');
			

				
$motivo=@$_POST['motivo'];
$fec_iniE=@$_POST['fec_iniE']; // x
$fec_finE=@$_POST['fec_finE']; // x
$fec_iniL=@$_POST['fec_iniL']; // x
$fec_finL=@$_POST['fec_finL']; // x
$fec_iniET=@$_POST['fec_iniET']; // x
$fec_finET=@$_POST['fec_finET'];  // x
$fec_iniLT=@$_POST['fec_iniLT']; // x
$fec_finLT=@$_POST['fec_finLT']; // x
$fec_iniEA=@$_POST['fec_iniEA']; // x
$fec_finEA=@$_POST['fec_iniEA']; // x
$fec_iniLA=@$_POST['fec_iniLA']; // x
$id=@$_POST['id'];
$cod_form=@$_POST['cod_form'];



if($motivo==1){
	
	$motivo=1; //Aumento de la Demanda
	$fec1=$fec_iniE;
	$fec2=$fec_finE;
	$fec3=$fec_iniL;
	$fec4=$fec_finL;

}else if($motivo==2){
	
	$motivo=2;  //Proyecto Temporal
	$fec1=$fec_iniET;
	$fec2=$fec_finET;
	$fec3=$fec_iniLT;
	$fec4=$fec_finLT;
	
}else if($motivo==3){
	
	$motivo=3; //Nuevo Actividad en el Proceso
	$fec1=$fec_iniEA;
	$fec2=$fec_finEA;
	$fec3=$fec_iniLA;
	$fec4="";

}



$fec1=$obj2->formatFecha($fec1);
$fec2=$obj2->formatFecha($fec2);
$fec3=$obj2->formatFecha($fec3);
if($fec4 !=""){
	$fec4=$obj2->formatFecha($fec4);
}

$fecha_solicitud=$obj2->formatFecha(date("d-m-Y"));


$datos=$obj->edit_requisicion_nuevo_cargoDos($id,$cod_form,$motivo,$fec1,$fec2,$fec3,$fec4,$fecha_solicitud,$_POST['nom_car'],$_POST['ubicacion']);

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