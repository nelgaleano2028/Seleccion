<?php 
session_start();
require_once('class_administracion.php');
$ruta='cmt_instructivo';
$grupo=$_SESSION['grupo'];
$obj= new Administracion();
$orden=$obj->orden($ruta,$grupo);



if($orden['tiempo']=="00:00"){	
	 $tiempo="<span style='display:none'>xxxx</span>";	 
}else{
	$tiempo=$orden['tiempo'];
	
}

?>
<html>
<head>
    <title>CMT</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
       
    <link rel="stylesheet" href="../css/style.css?css=<?php echo rand(1, 100);?>"  />
    
	
</head>
<body>

<div id="principal">
	<div class="titulo">		
				<div id="descripcion" style="display:block; text-align:center; font-size:20px; font-weight:bold">CUESTIONARIO DE MOTIVACION PARA EL TRABAJO</div><br>
				<div style="display:block; text-align:center; font-size:20px; font-weight:bold; position: fixed; left: 600px; top: 40px; z-index: 99999;">	
					<p style="color:#D61212; text-align:center; font-size:18px;"  id="counter"><?php echo $tiempo ?></p>
				</div>
	</div>
	</br>	

	<form method="post" id="<?php echo $grupo; ?>"  class="<?php echo $orden['orden']; ?>" action="cmt_insert.php">
			<div id="contenedor_main" style="display:block;">
			<center>
			<table border="1">
				<tr style="background-color: rgb(200, 213, 208); font-size:20px">
					<td width="60px" style="text-align: center;	font-weight:bold;">N°</td>
					<td width="200px" style="text-align: center;	font-weight:bold;">A</td>
					<td width="200px" style="text-align: center;	font-weight:bold;">B</td>
					<td width="200px" style="text-align: center;	font-weight:bold;">C</td>
					<td width="200px" style="text-align: center;	font-weight:bold;">D</td>
					<td width="200px" style="text-align: center;	font-weight:bold;">E</td>
				</tr>
				<tr>
					<td style="background-color: rgb(200, 213, 208); font-size:20px; text-align: center;	font-weight:bold;">1</td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta1 inputs_text" name="1a" maxlength="1"  	id="1a1" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta1 inputs_text" name="1b" maxlength="1"  	id="2b1" /></td>
					<td style="text-align: center;	font-weight:bold;"> <input style="font-size: 30px;" type="text" class="pregunta1 inputs_text" name="1c" maxlength="1" 	id="3c1" /></td>
					<td style="text-align: center;	font-weight:bold;"> <input style="font-size: 30px;" type="text" class="pregunta1 inputs_text" name="1d" maxlength="1"  	id="4d1" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta1 inputs_text" name="1e" maxlength="1" 	id="5e1" /></td>
				</tr>
				<tr>
					<td style="background-color: rgb(200, 213, 208); font-size:20px; text-align: center; font-weight:bold;">2</td>
					<td style="text-align: center;	font-weight:bold;"><input  style="font-size: 30px;" type="text" class="pregunta2 inputs_text" name="2a" maxlength="1" id="1a2"/></td>
					<td style="text-align: center;	font-weight:bold;"><input  style="font-size: 30px;" type="text" class="pregunta2 inputs_text" name="2b" maxlength="1" id="2b2"/></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta2 inputs_text" name="2c" maxlength="1" id="3c2"/></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta2 inputs_text" name="2d" maxlength="1" id="4d2"/></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta2 inputs_text" name="2e" maxlength="1" id="5e2"/></td>
				</tr>
				<tr>
					<td style="background-color: rgb(200, 213, 208); font-size:20px; text-align: center;	font-weight:bold;">3</td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta3 inputs_text" name="3a" maxlength="1" id="1a3"/></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta3 inputs_text" name="3b" maxlength="1" id="2b3"/></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta3 inputs_text" name="3c" maxlength="1" id="3b3"/></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta3 inputs_text" name="3d" maxlength="1" id="4d3"/></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta3 inputs_text" name="3e" maxlength="1" id="5e3"/></td>
				</tr>
				<tr>
					<td style="background-color: rgb(200, 213, 208); font-size:20px; text-align: center;	font-weight:bold;">4</td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta4 inputs_text" name="4a" maxlength="1"  id="1a4" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta4 inputs_text" name="4b" maxlength="1"  id="2b4" /></td>
					<td style="text-align: center;	font-weight:bold;"> <input style="font-size: 30px;" type="text" class="pregunta4 inputs_text" name="4c" maxlength="1"  id="3b4" /></td>
					<td style="text-align: center;	font-weight:bold;" ><input style="font-size: 30px;" type="text" class="pregunta4 inputs_text" name="4d" maxlength="1"  id="4d4" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta4 inputs_text" name="4e" maxlength="1"  id="5e4" /></td>
				</tr>
				<tr>
					<td style="background-color: rgb(200, 213, 208); font-size:20px; text-align: center;	font-weight:bold;">5</td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta5 inputs_text" name="5a" maxlength="1" id="1a5" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta5 inputs_text" name="5b" maxlength="1" id="2b5" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta5 inputs_text" name="5c" maxlength="1" id="3b5" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta5 inputs_text" name="5d" maxlength="1" id="4d5" /></td>
					<td style="text-align: center;	font-weight:bold;"> <input style="font-size: 30px;" type="text" class="pregunta5 inputs_text" name="5e" maxlength="1" id="5e5" /></td>
				</tr>
				<tr>
					<td style="background-color: rgb(200, 213, 208); font-size:20px; text-align: center;	font-weight:bold;">6</td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta6 inputs_text" name="6a" maxlength="1"  id="1a6" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta6 inputs_text" name="6b" maxlength="1"  id="2b6" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta6 inputs_text" name="6c" maxlength="1"  id="3b6" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta6 inputs_text" name="6d" maxlength="1"  id="4d6" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta6 inputs_text" name="6e" maxlength="1"  id="5e6" /></td>
				</tr>
				<tr>
					<td style="background-color: rgb(200, 213, 208); font-size:20px; text-align: center;	font-weight:bold;">7</td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta7 inputs_text" name="7a" maxlength="1"  id="1a7" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta7 inputs_text" name="7b" maxlength="1"  id="2b7" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta7 inputs_text" name="7c" maxlength="1"  id="3b7" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta7 inputs_text" name="7d" maxlength="1"  id="4d7" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta7 inputs_text" name="7e" maxlength="1"  id="5e7" /></td>
				</tr>
				<tr>
					<td style="background-color: rgb(200, 213, 208); font-size:20px; text-align: center;	font-weight:bold;">8</td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta8 inputs_text" name="8a" maxlength="1"  id="1a8" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta8 inputs_text" name="8b" maxlength="1"  id="2b8" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta8 inputs_text" name="8c" maxlength="1"  id="3b8" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta8 inputs_text" name="8d" maxlength="1"  id="4d8" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" class="pregunta8 inputs_text" name="8e" maxlength="1"  id="5e8" /></td>
				</tr>
				<tr>
					<td style="background-color: rgb(200, 213, 208); font-size:20px; text-align: center;	font-weight:bold;">9</td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta9 inputs_text" name="9a" maxlength="1"  id="1a9" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta9 inputs_text" name="9b" maxlength="1"  id="2b9" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta9 inputs_text" name="9c" maxlength="1"  id="3b9" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta9 inputs_text" name="9d" maxlength="1"  id="4d9" /></td>
					<td style="text-align: center;	font-weight:bold;"> <input style="font-size: 30px;" type="text" type="text" class="pregunta9 inputs_text" name="9e" maxlength="1"  id="5e9" /></td>
				</tr>
				<tr>
					<td style="background-color: rgb(200, 213, 208); font-size:20px; text-align: center;	font-weight:bold;">10</td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta10 inputs_text" name="10a" maxlength="1"  id="1a10" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta10 inputs_text" name="10b" maxlength="1"  id="2b10" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta10 inputs_text" name="10c" maxlength="1"  id="3b10" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta10 inputs_text" name="10d" maxlength="1"  id="4d10" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta10 inputs_text" name="10e" maxlength="1"  id="5e10" /></td>
				</tr>
				<tr>
					<td style="background-color: rgb(200, 213, 208); font-size:20px; text-align: center;	font-weight:bold;">11</td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta11 inputs_text" name="11a" maxlength="1"  id="1a11" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta11 inputs_text" name="11b" maxlength="1"  id="2b11" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta11 inputs_text" name="11c" maxlength="1"  id="3b11" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta11 inputs_text" name="11d" maxlength="1"  id="4d11" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta11 inputs_text" name="11e" maxlength="1"  id="5e11" /></td>
				</tr>
				<tr>
					<td style="background-color: rgb(200, 213, 208); font-size:20px; text-align: center;	font-weight:bold;">12</td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta12 inputs_text" name="12a" maxlength="1"  id="1a12" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta12 inputs_text" name="12b" maxlength="1"  id="2b12" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta12 inputs_text" name="12c" maxlength="1"  id="3b12" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta12 inputs_text" name="12d" maxlength="1"  id="4d12" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta12 inputs_text" name="12e" maxlength="1"  id="5e12" /></td>
				</tr>
				<tr>
					<td style="background-color: rgb(200, 213, 208); font-size:20px; text-align: center;	font-weight:bold;">13</td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta13 inputs_text" name="13a" maxlength="1"  id="1a13" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta13 inputs_text" name="12b" maxlength="1"  id="2b13" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta13 inputs_text" name="13c" maxlength="1"  id="3b13" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta13 inputs_text" name="13d" maxlength="1"  id="4d13" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta13 inputs_text" name="13e" maxlength="1"  id="5e13" /></td>
				</tr>
				<tr>
					<td style="background-color: rgb(200, 213, 208); font-size:20px; text-align: center;	font-weight:bold;">14</td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta14 inputs_text" name="14a" maxlength="1"  id="1a14" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta14 inputs_text" name="14b" maxlength="1"  id="2b14" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta14 inputs_text" name="14c" maxlength="1"  id="3b14" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta14 inputs_text" name="14d" maxlength="1"  id="4d14" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta14 inputs_text" name="14e" maxlength="1"  id="5e14" /></td>
				</tr>
				<tr>
					<td style="background-color: rgb(200, 213, 208); font-size:20px; text-align: center;	font-weight:bold;">15</td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta15 inputs_text" name="15a" maxlength="1"  id="1a15" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta15 inputs_text" name="15b" maxlength="1"  id="2b15" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta15 inputs_text" name="15c" maxlength="1"  id="3b15" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta15 inputs_text" name="15d" maxlength="1"  id="4d15" /></td>
					<td style="text-align: center;	font-weight:bold;"><input style="font-size: 30px;" type="text" type="text" class="pregunta15 inputs_text" name="15e" maxlength="1"  id="5e15" /></td>
				</tr>				
			</table>
			</center>
			</div>
			<div id="clear"></div>
			<div id="clear"></div>
			<div id="clear"><br></div>

			<div style="display:block; text-align:center;">
				<input id="enviar"  type="submit" value="Siguiente Prueba" class="btn btn-primary">	
			</div>
	
	</form>	

	<script src="../../js/caras.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>	
	
<div>
</body>
</html>