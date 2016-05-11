<?php 
session_start();
require_once('class_administracion.php');

//crear session para grupos por el momento esta estatico
$ruta='bg3_instructivo';
$grupo=$_SESSION['grupo'];
$obj= new Administracion();
$orden=$obj->orden($ruta,$grupo);

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>

    <link rel="stylesheet" href="../../css/style_caras.css?css=<?php echo rand(1, 100);?>"  />

</head>
<body>

	<div id="principal">
			<div class="titulo">
				<div id="descripcion" style="display:block; text-align:center; font-size:20px; font-weight:bold">TEST B.G.3</div><br>
				<div style="display:block; text-align:center; font-size:20px; font-weight:bold; position: fixed; left: 600px; top: 40px; z-index: 99999;">	
					<p style="color:#D61212;text-align:center;font-size:18px;" id="counter"><?php echo $orden['tiempo']; ?></p>
				</div>
			</div>
			
			<br>
		
		
			<form id="<?php echo $grupo; ?>"  class="<?php echo $orden['orden']; ?>" method="post" action="c_bg3_resp.php"> 
			<center>
			<div id="contenedor_main" style="display:block;">
			<div class="contenedor" style="margin-left: 105px;">
					<div id="imagen">
						<img src="../../img/prueba1.png" />
					</div>
					<div id="resultados">
					
						<table border=1 class="bg3">
							<tr id="titulo_1" >
								<td  colspan="2">RESULTADOS</td>						
							</tr>
							<tr>
								<td><input type="text" name="1"   maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text"  name="2"  maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="3" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="4" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="5" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="6" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="7" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="8" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="9" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="10" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="11" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="12" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="13" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="14" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="15" maxlength="2" onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="16" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="17"  maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="18"  maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="19" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="20" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="21" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="22" maxlength="2" onKeyPress="return validarnum(event)"></td>
							</tr>
							
						</table>
					</div>
			</div>
			
			<div id="clear"></div>
			
			<div class="contenedor" style="margin-left: 105px;">
					<div id="imagen">
						<img src="../../img/prueba2.png" />
					</div>
					<div id="resultados">
						<table border=1 class="bg3">
							<tr id="titulo_1" >
								<td  colspan="2">RESULTADOS</td>						
							</tr>
							<tr>
								<td><input type="text"  name="23" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="24" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="25" maxlength="2" onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="26"  maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="27" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="28" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="29" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="30" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="31" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="32" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="33" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="34" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="35" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="36" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="37" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="38" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="39" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="40" maxlength="2"  onKeyPress="return validarnum(event)"> </td>
							</tr>
							<tr>
								<td><input type="text" name="41" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="42" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="43" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="44" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>

						</table>			
					</div>
			</div>
			
			<div id="clear"></div>
			
			<div class="contenedor" style="margin-left: 105px;">
					<div id="imagen">
						<img src="../../img/prueba3.png" />
					</div>
					<div id="resultados">
						<table border=1 class="bg3">
							<tr id="titulo_1" >
								<td  colspan="2">RESULTADOS</td>						
							</tr>
							<tr>
								<td><input type="text"  name="45" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="46" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="47" maxlength="2" onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="48"  maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="49" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="50" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="51" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="52" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="53" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="54" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="55" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="56" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="57" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="58" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="59" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="60" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="61" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="62" maxlength="2"  onKeyPress="return validarnum(event)"> </td>
							</tr>
							<tr>
								<td><input type="text" name="63" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="64" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="65" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="66" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>

						</table>			
					</div>
			</div>
			
			<div id="clear"></div>
			
			<div class="contenedor" style="margin-left: 105px;">
					<div id="imagen">
						<img src="../../img/prueba4.png" />
					</div>
					<div id="resultados">
						<table border=1 class="bg3">
							<tr id="titulo_1" >
								<td  colspan="2">RESULTADOS</td>						
							</tr>
							<tr>
								<td><input type="text"  name="67" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="68" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="69" maxlength="2" onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="70"  maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="71" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="72" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="73" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="74" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="75" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="76" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="77" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="78" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="79" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="80" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="81" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="82" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="83" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="84" maxlength="2"  onKeyPress="return validarnum(event)"> </td>
							</tr>
							<tr>
								<td><input type="text" name="85" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="86" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>
							<tr>
								<td><input type="text" name="87" maxlength="2"  onKeyPress="return validarnum(event)"></td>
								<td><input type="text" name="88" maxlength="2"  onKeyPress="return validarnum(event)"></td>
							</tr>

						</table>			
					</div>
			</div>
			
			
			</div><!-- cierre div contenedor_main -->
			</center>
				<div id="clear"></div>
			
			<div style="display:block; text-align:center;">
				<input id="enviar"  type="submit" value="Siguiente Prueba" class="btn btn-primary">	
			</div>
			
			</form>
		
	</div>
	<script src="../../js/alert.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>	
	<script src="../../js/caras.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>	

</body>
</html>