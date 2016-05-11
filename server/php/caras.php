<?php 
session_start();
require_once('class_administracion.php');
$ruta='caras_instructivo';
$grupo=$_SESSION['grupo'];
$obj= new Administracion();
$orden=$obj->orden($ruta,$grupo);

?>
<html>
  <head>
    <title>Prueba CARAS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../css/style_caras.css?css=<?php echo rand(1, 100);?>"  />
  </head>
  <body>
	<div class="titulo">		
		<div id="descripcion" style="display:block; text-align:center; font-size:20px; font-weight:bold">TEST DE PERCEPCION DE DIFERENCIAS</div><br>
		<div style="display:block; text-align:center; font-size:20px; font-weight:bold; position: fixed; left: 600px; top: 40px; z-index: 99999;">	
			<p style="color:#D61212;text-align:center;font-size:18px;" id="counter"><?php echo $orden['tiempo']; ?></p>
		</div>
	</div>
	<br>
	<center>
	<div class="contenido_prueba">

		<form id="<?php echo $grupo; ?>"  class="<?php echo $orden['orden']; ?>" method="post" action="c_caras_resp.php">
				<table border="1">
					<tr>	
						<td>
							<div class="ubicar">
								<img src="../../img/caras1.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="1" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="1" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="1" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras2.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="2" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="2" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="2" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras3.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="3" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="3" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="3" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras4.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="4" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="4" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="4" value="C">C
							</div>
						</td>
					</tr>
					
					<tr>	
						<td>
							<div class="ubicar">
								<img src="../../img/caras5.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="5" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="5" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="5" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras6.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="6" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="6" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="6" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras7.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="7" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="7" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="7" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras8.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="8" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="8" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="8" value="C">C
							</div>
						</td>
					</tr>
					
					<tr>	
						<td>
							<div class="ubicar">
								<img src="../../img/caras1.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="9" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="9" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="9" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras2.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="10" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="10" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="10" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras3.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="11" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="11" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="11" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras4.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="12" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="12" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="12" value="C">C
							</div>
						</td>
					</tr>
					
					<tr>	
						<td>
							<div class="ubicar">
								<img src="../../img/caras5.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="13" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="13" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="13" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras6.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="14" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="14" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="14" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras7.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="15" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="15" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="15" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras8.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="16" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="16" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="16" value="C">C
							</div>
						</td>
					</tr>
					
					<tr>	
						<td>
							<div class="ubicar">
								<img src="../../img/caras1.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="17" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="17" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="17" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras2.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="18" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="18" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="18" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras3.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="19" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="19" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="19" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras4.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="20" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="20" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="20" value="C">C
							</div>
						</td>
					</tr>
					
					<tr>	
						<td>
							<div class="ubicar">
								<img src="../../img/caras5.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="21" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="21" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="21" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras6.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="22" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="22" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="22" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras7.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="23" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="23" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="23" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras8.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="24" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="24" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="24" value="C">C
							</div>
						</td>
					</tr>
					
					<tr>	
						<td>
							<div class="ubicar">
								<img src="../../img/caras1.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="25" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="25" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="25" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras2.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="26" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="26" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="26" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras3.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="27" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="27" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="27" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras4.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="28" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="28" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="28" value="C">C
							</div>
						</td>
					</tr>
					
					<tr>	
						<td>
							<div class="ubicar">
								<img src="../../img/caras5.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="29" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="29" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="29" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras6.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="30" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="30" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="30" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras7.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="31" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="31" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="31" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras8.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="32" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="32" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="32" value="C">C
							</div>
						</td>
					</tr>
					
					<tr>	
						<td>
							<div class="ubicar">
								<img src="../../img/caras1.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="33" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="33" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="33" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras2.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="34" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="34" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="34" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras3.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="35" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="35" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="35" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras4.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="36" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="36" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="36" value="C">C
							</div>
						</td>
					</tr>
					
					<tr>	
						<td>
							<div class="ubicar">
								<img src="../../img/caras5.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="37" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="37" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="37" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras6.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="38" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="38" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="38" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras7.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="39" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="39" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="39" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras8.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="40" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="40" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="40" value="C">C
							</div>
						</td>
					</tr>
					
					<tr>	
						<td>
							<div class="ubicar">
								<img src="../../img/caras1.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="41" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="41" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="41" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras2.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="42" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="42" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="42" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras3.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="43" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="43" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="43" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras4.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="44" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="44" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="44" value="C">C
							</div>
						</td>
					</tr>
					
					<tr>	
						<td>
							<div class="ubicar">
								<img src="../../img/caras5.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="45" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="45" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="45" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras6.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="46" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="46" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="46" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras7.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="47" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="47" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="47" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras8.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="48" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="48" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="48" value="C">C
							</div>
						</td>
					</tr>
					
					<tr>	
						<td>
							<div class="ubicar">
								<img src="../../img/caras1.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="49" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="49" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="49" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras2.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="50" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="50" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="50" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras3.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="51" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="51" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="51" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras4.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="52" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="52" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="52" value="C">C
							</div>
						</td>
					</tr>
					
					<tr>	
						<td>
							<div class="ubicar">
								<img src="../../img/caras5.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="53" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="53" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="53" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras6.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="54" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="54" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="54" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras7.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="55" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="55" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="55" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras8.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="56" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="56" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="56" value="C">C
							</div>
						</td>
					</tr>
					
					<tr>	
						<td>
							<div class="ubicar">
								<img src="../../img/caras1.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="57" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="57" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="57" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras2.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="58" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="58" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="58" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras3.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="59" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="59" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="59" value="C">C
							</div>
						</td>
						<td>
							<div class="ubicar">
								<img src="../../img/caras4.png"><br>
						
								&nbsp;&nbsp;
								<input type="radio" name="60" value="A">A
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="60" value="B">B
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="60" value="C">C
							</div>
						</td>
					</tr>			
				</table>
				<br>
				<br>
				<div>
					<input id="enviar" type="submit" value="Siguiente Prueba" class="btn btn-primary">				
				</div>
		</form>	

	</div>
	</center>

	<script src="../../js/caras.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>	
  </body>
  </html>