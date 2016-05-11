<?php
require_once("class_solicitudes.php");
require_once('class_utilidades.php');

include_once("class_mailer.php");

date_default_timezone_set('America/Bogota');

$raiz="../../archivos/";
$detalle=$_POST['detalle'];
$cod_epl=$_POST['cod_epl'];
$prueba= $_POST['prueba'];
$file_name=$_FILES['archivo0']['name'];
$extension=explode(".",$file_name);

//echo $file_name; die();
$file_tmp=$_FILES['archivo0']["tmp_name"];
//$file_tamano=($_FILES['size'] /1000)."Kb";



$path=$raiz.$cod_epl."/";


if (!file_exists($path)) {
    mkdir($path, 0700);
}



move_uploaded_file($file_tmp, $path . $prueba.".".$extension[1]); //Movemos el archivo temporal a la ruta especificada


if($_POST['bandera']==2){

	$obj2= new Utilidades();
	$fecha=$obj2->formatFecha(date("d-m-Y"));

	$obj=new Solicitud();	
	$respuesta=$obj->crear_solicitud($detalle,$path,$prueba.".".$extension[1],$cod_epl,$fecha);
	
}


/*Enviar email*/
$mail= new mailer();
$mail->IsHTML(true);
$mail->AddCC('rober.ospina@talentsw.com');
$mail->Subject = "Solicitud "; // Este es el titulo del email.
$mail->Body = $detalle; // Mensaje a enviar
			
$exito = $mail->Send(); // Envía el correo.
 
if($exito){
	
	$exito=1;
}else{
	$exito=2;
}

if($respuesta == 1){

	echo "<span class='mensajes_success'>Se ingreso correctamente.</span>";

}else{

	echo "<span class='mensajes_error'>Error al Ingresar los registros.</span>";

}

?>



