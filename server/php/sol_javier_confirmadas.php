<?php
require_once('class_solicitud.php');
include_once("class_mailer.php");


$obj= new Solicitudes();

$cod_form=$_POST['cod_form'];
$observaciones=$_POST['observaciones'];
$estado=@$_POST['estado'];


$datos=$obj->solReqCargoNuevaPlaza($cod_form, $observaciones, $estado);

if($estado=='R' && $datos==1){

	echo "<p style='text-align:center; color:green; font-weight:bold;'>Se ha rechazado la solicitud correctamente...</p>";
}else if($estado=='AEX' && $datos==1){

	echo "<p style='text-align:center; color:green; font-weight:bold;'>Se ha acepta la solicitud correctamente...</p>";
}else{

	echo "<p style='text-align:center; color:red; font-weight:bold;'>No Se ha rechazado la solicitud intentalo mas tarde...</p>";
}


/*Enviar correo  a la jefe Elizabeth mena*/

$destinatario="quake2400@gmail.com"; 

$mail= new mailer();

$mail->IsHTML(true);

$mail->addAddress($destinatario); 

 $mail->Subject = "Solicitud de nuevo cargo"; 
 
 $mail->Body = "Se ha enviado una solicitd de cargo nuevo favor de revisar"; // Mensaje a enviar
  
 $exito = $mail->Send(); // Envía el correo.


 echo $datos;

?>