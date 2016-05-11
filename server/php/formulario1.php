<?php 
session_start();
require_once('class_avila.php');

$obj= new Avila();
$datos= $obj->get_centroCosto();



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
	
	<div class="row">
		
			<div class="estirar_form2">
		
				<div class="cambia" >
				
					<div class="modal-header">
							<h3 id="myModalLabel">Formulario 1</h3>
					</div>
					<form method="post" id="formulario1">
					<!--Inicio modal-body2-->
					<div class="modal-body2">
						<div class="label1">
						<label class="login_label2 control-label" >Seleccione Centro de costo:</label>
							<select name="centro_costo" class="centro_costo">
								<option value="-1">Seleccione...</option> 
								<?php
									for($i=0; $i<count($datos); $i++){
									
									echo "<option value='".@$datos[$i]['codigo']."' >".@$datos[$i]['area']."</option>";
									
									}
								?>
								
							</select>
						</div>
						<div class="label2">
							<label class="login_label2 control-label" >Seleccione Cargo:</label>
							<select name="cargo" class="cargo">
								<option value="-1">Cargo</option> 
								
							</select>


						</div>

						<div class="label2">

							<label class="login_label2 control-label" >Seleccione Persona:</label>
							<select name="persona" class="persona">
								<option value="-1">Persona</option> 
								
							</select>
						</div>

						<div style="height:80px"></div>

						<div class="label1">
							<label class="login_label2 control-label" >Salario Actual $:</label>
							<input type="text" class="span4" style="width: 211px !important"  name="salario" id="salario" />
						</div>

						<div class="label2">
							<label class="login_label2 control-label" >Bonificación Requerida $:</label>
							<input type="text" class="span4" style="width: 211px !important" name="beneficiario" id="beneficiario" />
						</div>
						<div class="btn-form2" ><input  id="fm1" type="button" class="btn btn-primary" value="Enviar"/></div>


					</div>
					<!--Fin modal-body2-->
					</form>
				</div>

			
		</div>
	</div>

	<script src="../../js/alert.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>	
	<script src="../../js/form1.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>	
</body>
</html>
