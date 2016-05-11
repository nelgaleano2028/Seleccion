<?php session_start();

require_once("class_solicitud.php");

$obj= new  Solicitudes();

$datos=$obj-> contar_estados();


?>
<html>
<head>
    <title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
    
	<!-- Bootstrap -->
	
</head>
<body >
	<input type="hidden" id="proceso" value="<?php echo $datos['proceso']?>" />
	<input type="hidden" id="pendiente" value="<?php echo $datos['pendiente']?>" />
	<input type="hidden" id="cerrado" value="<?php echo $datos['cerrado']?>" />
	<div id="contenido"><div>
	
	

<script type="text/javascript" charset="utf-8" src="../../js/estado_trejo.js"></script>


</body>
</html>