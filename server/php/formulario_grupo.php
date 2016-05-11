<?php

require_once("class_administracion.php");


$obj= new Administracion();

$grupo=$_GET['id'];

$lista= $obj->seleccion_prueba($_GET['id']);

$caras="";
$bg3="";
$letras="";
$cmt="";
$aprendizaje="";
$temperamento="";
$wartegg="";
$pf="";



if($lista != null){

	for($i=0;$i<count($lista);$i++){


		switch ($lista[$i]['nombre']) {
			
			case 'Caras':
				
					$caras="checked";
				break;

			case 'Bg3':
				
					$bg3="checked";
				break;

			case 'Cuadrado de letras':
				
					$letras="checked";
				break;

			case 'CMT':
				
					$cmt="checked";
				break;

			case 'Estilos de aprendizaje':
				
					$aprendizaje="checked";
				break;

			case 'Temperamento humano':
				
					$temperamento="checked";
				break;

			case 'Wartegg':
				
					$wartegg="checked";
				break;

			case '16pf':
				
					$pf="checked";
				break;
			
		}


	
	}



}



?>
<!DOCTYPE html>
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
					<div class="cambia" >
						<div class="modal-header">
						
						<h3 id="myModalLabel" style="text-align:center">Asignar pruebas</h3>
						</div>
						<div class="modal-body">
						 <form id="update_tiempo" method="post">
						 
						 	<table>
								<tr>
									<td align="right"> <label class="control-label" for="caras" style="font-weight:bold">Caras &nbsp;&nbsp;&nbsp;</label></td>
									<td><input type="checkbox" name="1" <?php echo $caras; ?> ></td>
								</tr>
								<tr>
									<td align="right"> <label class="control-label" for="bg3" style="font-weight:bold">Bg3 &nbsp;&nbsp;&nbsp;</label></td>
									<td><input type="checkbox" name="2"  <?php echo $bg3; ?> ></td>
								</tr>

								<tr>
									<td align="right"><label class="control-label" for="letras" style="font-weight:bold">Cuadrado de Letras &nbsp;&nbsp;&nbsp;</label></td>
									<td><input type="checkbox" name="3" <?php echo $letras; ?> ></td>
								</tr>

								<tr>
									<td align="right"><label class="control-label" for="cmt" style="font-weight:bold">CMT &nbsp;&nbsp;&nbsp;</label></td>
									<td><input type="checkbox" name="4" <?php echo $cmt; ?> ></td>
								</tr>


								<tr>
									<td align="right"><label class="control-label" for="aprendizaje" style="font-weight:bold">Estilos de Aprendizaje &nbsp;&nbsp;&nbsp;</label></td>
									<td><input type="checkbox" name="5" <?php echo $aprendizaje; ?> ></td>
								</tr>


								<tr>
									<td align="right"><label class="control-label" for="temperamento" style="font-weight:bold">Temperamentos Humano &nbsp;&nbsp;&nbsp;</label></td>
									<td><input type="checkbox" name="6" <?php echo $temperamento; ?> ></td>
								</tr>


								<tr>
									<td align="right"><label class="control-label" for="Wartegg" style="font-weight:bold">Wartegg &nbsp;&nbsp;&nbsp;</label></td>
									<td><input type="checkbox" name="7" <?php echo $wartegg; ?> ></td>
								</tr>


								<tr>
									<td align="right"><label class="control-label" for="pf" style="font-weight:bold">16PF &nbsp;&nbsp;&nbsp;</label></td>
									<td><input type="checkbox" name="8" <?php echo $pf; ?> ></td>
								</tr>

							</table>
							
							 <br> 
		                      
						 		<input type="hidden" name="grupo" value="<?php echo $grupo?>" />

						  <div style="text-align:center"><input type="submit" class="btn btn-primary" value="Enviar"/></div>
						  </form>
						</div>
		          	</div>
			</div>
   		 </div>
    </div>

    <script src="../../js/alert.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
    <script src="../../js/seleccion_grupo.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>

</body>
</html>