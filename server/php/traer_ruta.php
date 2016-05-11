<?php
require_once("../librerias/lib/connection.php");
	

global $conn;

$sql="select ruta from solicitud_req where ruta like '%".$_POST['prueba']."%'";

//var_dump($sql);die();

$rs=$conn->Execute($sql);

$fila=$rs->FetchRow();

echo $fila['ruta'];



?>