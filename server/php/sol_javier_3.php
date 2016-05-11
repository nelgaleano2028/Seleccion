<?php
require_once('class_solicitud.php');
include_once("class_mailer.php");


$obj= new Solicitudes();

$cod_form=$_POST['cod_form'];
$observaciones=$_POST['observaciones'];
$bandera=@$_POST['bandera'];

if($bandera==1)
	$estado='AP';
else
	$estado='R';


$datos=$obj->solReqCargoNuevaPlaza($cod_form,$observaciones,$estado);



if($bandera== 1 && $datos==1){

	

	echo "<p style='text-align:center; color:green; font-weight:bold;'>Se ha acepta la solicitud correctamente...</p>";
}else if($bandera== 2 && $datos==1){



	echo "<p style='text-align:center; color:green; font-weight:bold;'>Se rechaza la solicitud correctamente...</p>";
}else{



	echo "<p style='text-align:center; color:red; font-weight:bold;'>No Se ha enviado intentalo mas tarde...</p>";
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