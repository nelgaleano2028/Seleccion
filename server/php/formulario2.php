<?php 
session_start();
require_once('class_avila.php');
require_once('class_utilidades.php');

$obj= new Avila();
$datos= $obj->get_centroCosto();


date_default_timezone_set('America/Bogota');
$fechaDiaSys=date('d');
$fechaMesSys= date('m');
$fechaAnioSys= date('Y');
$fechaSys= date('d-m-Y');


$obj2= new Utilidades();
$fechaMes=$obj2->mesEsp($fechaMesSys);


?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="../../css/datepicker.css?css=<?php echo rand(1, 100);?>" />
    <link rel="stylesheet" href="../../css/chosen.css?css=<?php echo rand(1, 100);?>" />
	
</head>
<body>
	<div id="error"></div>

	<div class="row">
		<div class="estirar_form2">

			<div class="cambia" >

				<div class="modal-header">
							<h3 id="myModalLabel">Formulario 2</h3>
				</div>
				<form method="post" id="formulario2">
					<!--Inicio modal-body2-->
					<div class="modal-body2">

						<div class="label1">
							<label class="login_label2 control-label">Seleccione Supernumerario:</label>
							<select name="supernumerario"  id="supernumerario">
								<option value="-1">Seleccione...</option> 								
							</select>

						</div>
						<div style="clear:both"></div>

						<div style="height:30px"></div>

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
                        <div style="clear:both"></div>

                        <div style="height:30px"></div>

						<label class="radio">
							<input type="radio" name="titular" id="" value="1" >
							<label class="login_label2 control-label">Ingresa con el salario del titular del cargo</label>
						</label>
						
						<div style="height:30px"></div>

						<label class="radio">
							<input type="radio" name="titular" value="2">
							<div style='width: 196px; float:left'>
								<label class="login_label2 control-label">Con cuanto dinero Inicia: $</label>
							</div> <input type="text"  class="span3" name="cuanto_inicia" id="cuanto_inicia" />
						</label>

						 <div style="height:30px"></div>

						<label class="login_label2 control-label">Fecha de nivelación:</label>
						<div class="input-append date" id="fec_nivel"  data-date="<?php echo $fechaSys; ?>"  data-date-format="dd-mm-yyyy">
							<input class="span3" type="text" name="fec_nivel"/>
							<span class="add-on"><i class="icon-th"></i></span>
						</div>
						<div class="btn-form" ><input id="form2" type="button" class="btn btn-primary" value="Registrar"/></div>



					</div>
					<!--Fin modal-body2-->
				</form>

			</div>

		</div>
	</div>
	<script src="../../js/bootstrap-datepicker.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
	<script src="../../js/alert.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>	
	<script src="../../js/chosen.jquery.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
	<script src="../../js/form2.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>

</body>
</html>
