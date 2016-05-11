<?php
require_once('class_requisicion.php');
include_once("class_mailer.php");


$obj= new Requisicion();

if(@$_POST['bandera'] ==1){

$cod_form=$_POST['cod_form'];
$observaciones=$_POST['observaciones'];

$datos=$obj->aceptar_requisicionInterna($cod_form,$observaciones);

if($datos==1){
	echo 1; exit();
}else{

   echo 2; exit();
}


}else if(@$_POST['bandera']==2){


	$cod_form=$_POST['cod_form'];
	$observaciones=$_POST['observaciones'];

	$datos=$obj->rechazar_requisicionInterna($cod_form,$observaciones);
	

	if($datos==1){
		
		echo 1; exit();
	}else{
		echo 2; exit();
	}

}

/*Enviar correo  a Viviana*/

$destinatario="quake2400@gmail.com"; 

$mail= new mailer();

$mail->IsHTML(true);

$mail->addAddress($destinatario); 

 $mail->Subject = "Solicitud de nuevo cargo"; 
 
 $mail->Body = "Se ha enviado una solicitd de requisicion  favor de revisar"; // Mensaje a enviar
  
 $exito = $mail->Send(); // Envía el correo.



?>