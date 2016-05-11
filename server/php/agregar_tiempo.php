<?php session_start();

require_once("class_administracion.php");


$obj= new Administracion();

$lista= $obj->pruebas_seleccion();

$caras=explode(":", $lista[0]['tiempo']);

$bg3=explode(":", $lista[1]['tiempo']);

$letras=explode(":", $lista[2]['tiempo']);

$cmt=explode(":", $lista[3]['tiempo']);

$aprendizaje=explode(":", $lista[4]['tiempo']);

$temperamento=explode(":", $lista[5]['tiempo']);

$wartegg=explode(":", $lista[6]['tiempo']);

$pf=explode(":", $lista[7]['tiempo']);





?>
<html>
<head>
    <title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
    
	
</head>
<body>
	<div id="error"></div>
	<div class="container-fluid">
		<div class="row-fluid">
          	<div class="dialog span4">
					<div class="cambia" style="height:550px; width:500px">
						<div class="modal-header" style="text-align:center">
						
						<h3 id="myModalLabel">Agregar Tiempo</h3>
						</div>
						<div class="modal-body" style="max-height: 479px !important;">
						 <form id="update_tiempo" method="post">
						 
						 	<table>
								<tr>
									<td align="right"> <label class="control-label" for="caras" style="font-weight:bold">Caras &nbsp;&nbsp;&nbsp;</label></td>
									<td><input type="number" name="caras1" value="<?php echo $caras[0]?>"   min="0"  max="60" style="height:40px; width:53px"></td>
									<td><span style="font-weight:bold" >:</span> <input type="number" name="caras2" value="<?php echo $caras[1]?>"   min="0"   max="60"  style="height:40px; width:53px"></td>
								</tr>
								<tr>
									<td align="right"><label class="control-label" for="bg3" style="font-weight:bold">Bg3 &nbsp;&nbsp;&nbsp;</label></td>
									<td><input type="number" name="bg31" value="<?php echo $bg3[0] ?>" min="0"  max="60" style="height:40px; width:53px"></td>
									<td><span style="font-weight:bold" >:</span> <input type="number" name="bg32" value="<?php echo $bg3[1] ?>" min="0"  max="60" style="height:40px; width:53px"></td>
								</tr>

								<tr>
									<td align="right"><label class="control-label" for="letras" style="font-weight:bold">Cuadrado de Letras &nbsp;&nbsp;&nbsp;</label></td>
									<td><input type="number" name="letras1" value="<?php echo $letras[0] ?>" min="0"  max="60" style="height:40px; width:53px"></td>
									<td><span style="font-weight:bold" >:</span> <input type="number" name="letras2" value="<?php echo $letras[1] ?>" min="0"  max="60" style="height:40px; width:53px"></td>
								</tr>

								<tr>
									<td align="right"><label class="control-label" for="cmt" style="font-weight:bold">CMT &nbsp;&nbsp;&nbsp;</label></td>
									<td><input type="number" name="cmt1" value="<?php echo $cmt[0] ?>"  min="0"  max="60" style="height:40px; width:53px"></td>
									<td><span style="font-weight:bold" >:</span> <input type="number" name="cmt2" value="<?php echo $cmt[1] ?>" min="0"  max="60" style="height:40px; width:53px" ></td>
								</tr>


								<tr>
									<td align="right"><label class="control-label" for="aprendizaje" style="font-weight:bold">Estilos de Aprendizaje</label></td>
									<td><input type="number" name="aprendizaje1" value="<?php echo $aprendizaje[0] ?>" min="0"  max="60"  style="height:40px; width:53px"></td>
									<td><span style="font-weight:bold" >:</span> <input type="number" name="aprendizaje2" value="<?php echo $aprendizaje[1] ?>" min="0"  max="60"  style="height:40px; width:53px"></td>
								</tr>


								<tr>
									<td align="right"><label class="control-label" for="temperamento" style="font-weight:bold">Temperamentos Humano &nbsp;&nbsp;&nbsp;</label></td>
									<td><input type="number" name="temperamento1" value="<?php echo $temperamento[0] ?>" min="0"  max="60" style="height:40px; width:53px"></td>
									<td><span style="font-weight:bold" >:</span> <input type="number" name="temperamento2" value="<?php echo $temperamento[1] ?>" min="0"  max="60"  style="height:40px; width:53px"></td>
								</tr>


								<tr>
									<td align="right"><label class="control-label" for="Wartegg" style="font-weight:bold">Wartegg &nbsp;&nbsp;&nbsp;</label></td>
									<td><input type="number" name="wartegg1" value="<?php echo $wartegg[0] ?>" min="0"  max="60" style="height:40px; width:53px"></td>
									<td><span style="font-weight:bold" >:</span> <input type="number" name="wartegg2" value="<?php echo $wartegg[1] ?>" min="0"  max="60" style="height:40px; width:53px"></td>
								</tr>


								<tr>
									<td align="right"><label class="control-label" for="pf" style="font-weight:bold">16PF &nbsp;&nbsp;&nbsp;</label></td>
									<td><input type="number" name="pf1" value="<?php echo $pf[0] ?>" min="0"  max="60" style="height:40px; width:53px"></td>
									<td><span style="font-weight:bold" >:</span> <input type="number" name="pf2" value="<?php echo $pf[1] ?>" min="0"  max="60" style="height:40px; width:53px"></td>
								</tr>

							</table>
		                     <br> 
						 

						  <div style="text-align:center"><input type="button" class="btn btn-primary" id="enviar_tiempo" value="Enviar"/></div>
						  </form>
						</div>
		          	</div>
			</div>
   		 </div>
    </div>

   
    <script src="../../js/alert.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
	<script src="../../js/agregar_tiempo.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
</body>
</html>