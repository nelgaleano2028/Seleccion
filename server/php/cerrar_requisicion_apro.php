<?php
require_once('class_requisicion.php');
//include_once("class_mailer.php");
require_once("class_utilidades.php");

$obj= new Requisicion();





date_default_timezone_set('America/Bogota');

$fecha=date('d-m-Y');

$obj2= new Utilidades();

$fecha=$obj2->formatFecha($fecha);

$cod_form=$_POST['cod_form'];
$cod_epl=$_POST['cod_epl'];
$cod_car=$_POST['cod_car'];
$observaciones=$_POST['observaciones'];


$datos=$obj->cerrar_requisicion_apro($cod_form,$observaciones,$fecha,$cod_car,$cod_epl);

if($datos==1){

	echo 1; exit();

}else{

	echo 2; exit();
}


/*
$destinatario="quake2400@gmail.com"; 

$mail= new mailer();

$mail->IsHTML(true);

$mail->addAddress($destinatario); 

 $mail->Subject = "Solicitud de nuevo cargo"; 
 
 $mail->Body = "Se ha enviado una solicitd de requisicion  favor de revisar"; // Mensaje a enviar
  
 $exito = $mail->Send(); // Envía el correo.
*/
 
 ?>