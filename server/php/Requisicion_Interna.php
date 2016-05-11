<?php
session_start();
require_once('class_requisicion.php');
require_once('class_utilidades.php');

date_default_timezone_set('America/Bogota');
$fechaDiaSys=date('d');
$fechaMesSys= date('m');
$fechaAnioSys= date('Y');
$fechaSys= date('d-m-Y');

$obj= new Requisicion();
$datos= $obj->get_centroCostoJefe($_SESSION['cod_epl']);

$obj2= new Utilidades();
$fechaMes=$obj2->mesEsp($fechaMesSys);

$obj3= new Requisicion();
$ausencias=$obj3->get_ausencias();

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
    
	<!-- Bootstrap -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css?css=<?php echo rand(1, 100);?>" />
    <link rel="stylesheet" href="../../css/style.css?css=<?php echo rand(1, 100);?>"  />
    <link rel="stylesheet" href="../../css/font-awesome/css/font-awesome.css?css=<?php echo rand(1, 100);?>" />
	<link rel="stylesheet" href="../../css/datepicker.css?css=<?php echo rand(1, 100);?>" />
	<link rel="stylesheet" href="../../css/chosen.css?css=<?php echo rand(1, 100);?>" />
</head>
<body>
	<div id="error"></div>
	
	<div class="row">
		
		<div class="estirar_form2">
		
			<div class="cambia" style="height: 600px;">
			
				<div class="modal-header">
					<h3 id="myModalLabel">Solicitud Requisicion de Personal</h3>
				</div>
				<div id="obligatorio2" style="color:red; text-align:center; display:none;" id="obligatorio">Los campos con (*) son requeridos</div>
				<form method="post" id="requisicion_interna" class="active">
				<!--inicio modal-body3-->
				<div class="modal-body3" style="max-height: 470px !important">
					<div class="label1">
						<label class="login_label2" for="centro_costo">Seleccione Centro de costo:</label>
						<select name="centro_costo" class="centro_costo">
							<option value="">Seleccione Centro Costo</option>
							<?php
								for($i=0; $i<count($datos); $i++){
								
								echo "<option value='".@$datos[$i]['codigo']."' >".@$datos[$i]['area']."</option>";
								
								}
							?>

						</select>
					
					</div>
					<div class="label2">
						<label class="login_label2 control-label">Fecha Solicitud:</label>
						<p><?php  echo $fechaDiaSys.'-'.$fechaMes.'-'.$fechaAnioSys; ?></p>
					</div>
					<div style="clear:both;"></div>
					<label class="login_label2 control-label" for="cargo">Seleccione Cargo Requerido:</label>
					<select name="cargo" class="cargo ">
							<option value="" id="remover_cargo">Seleccione...</option> 
							
					</select>
					<label class="login_label2 control-label" for="reemplazo">Personal Activo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Personal Inactivo:</label>
					<select name="reemplazo" class="reemplazo1">
							<option value="-1" id="remover_reemplazo">Seleccione Reemplazo...</option>
                            							
					</select>
				   
					<select name="reemplazo_inactivo" class="reemplazo2">
							<option value="-1" id="remover_reemplazo2">Seleccione Reemplazo...</option>
                            							
					</select>

					<select id="reemplazo_cedula"  name="reemplazo_cedula" ></select>

					<br>

					<label class="login_label2 control-label label_motivo">Causa de la Vacante:</label>

					<div style="height:20px"></div>

					<label class="radio">
						<input type="radio" name="motivo"  value="1" >
						Ausencia: &nbsp;
						<select name="ausencia" class="ausencia">
							<option value="">Seleccione...</option> 
							<?php
								for($i=0; $i<count($ausencias); $i++){
								
									echo "<option value='".@$ausencias[$i]['codigo']."' >".@$ausencias[$i]['concepto']."</option>";
								}
							?>
						</select>

						<span class="poner_dias">


						</span>
						
						<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
						
						<span class="leyenda" style="color:rgb(173, 21, 39)">


						</span>

					</label>

					

					<label class="radio">
						<input type="radio" name="motivo"  value="2" >
						Terminación Contrato
					</label>
					<label class="radio">
						<input type="radio" name="motivo"  value="3">
						Promocion
					</label>
					<label class="radio">
						<input type="radio" name="motivo"  value="4">
						Movimiento de Area
					</label>

					<hr>

					<label class="login_label2 control-label label_motivo">Defina las Fechas correspondientes del Nuevo Personal</label>

					<div style="height:40px"></div>
					

					<div class="label1">
						<label class="login_label2 control-label">Fecha Inicio Entrenamiento:</label>
						<div class="input-append date" id="dp1" data-date="<?php echo $fechaSys; ?>" data-date-format="dd-mm-yyyy">
						  <input class="span3" size="16" type="text" name="fecha_inicioE" >
						  <span class="add-on"><i class="icon-th"></i></span>
						</div>
					</div>
					<div class="label2">
						<label class="login_label2 control-label" >Fecha Fin Entrenamiento:</label>
						<div class="input-append date" id="dp2" data-date="<?php echo $fechaSys; ?>" data-date-format="dd-mm-yyyy">
						  <input class="span3" size="16" type="text" name="fecha_finE">
						  <span class="add-on"><i class="icon-th"></i></span>
						</div>
					</div>
					<div style="clear:both"></div>
					<div class="label1">
						<label class="login_label2 control-label">Fecha Inicio Labor:</label>
						<div class="input-append date" id="dp3" data-date="<?php echo $fechaSys; ?>" data-date-format="dd-mm-yyyy">
						  <input class="span3" size="16" type="text" name="fecha_inicioL">
						  <span class="add-on"><i class="icon-th"></i></span>
						</div>
					</div>
					<div class="label2">
						<label class="login_label2 control-label" >Fecha Fin Labor:</label>
						<div class="input-append date" id="dp4" data-date="<?php echo $fechaSys; ?>" data-date-format="dd-mm-yyyy">
						  <input class="span3" size="16" type="text" name="fecha_finL">
						  <span class="add-on"><i class="icon-th"></i></span>
						</div>
					</div>

					

					<div style="clear:both"></div>

					<hr>
					

					<label class="login_label2 control-label">Sugerencia de la persona a ocupar el cargo:</label>

					<div style="height:20px"></div>

					<label class="radio">
						<input type="radio" name="sugerencia" id="optionsRadios2" value="1">
						<select name="misma_area" class="misma_area">
							<option value="" id="remover_mismaArea">Seleccione misma Area...</option> 	
							
						</select>
					</label>
					<label class="radio">
						<input type="radio" name="sugerencia"  value="2">

						<select data-placeholder="Seleccione cedula" id="area_externa"  name="area_externa" ></select>&nbsp;&nbsp; <span style="color:rgb(173, 21, 39); font-weight:bold">Externa al Area</span>
						
					</label>
					<div style="clear:both"></div>
					<!--codigo del jefe-->
					<input type="hidden" name="cod_epl_jefe" value="<?php echo $_SESSION['cod_epl'] ?>" id="cod_epl" />
					<div class="btn-form2" ><input id="requisicion_internaBtn" type="button" class="btn btn-primary" value="Enviar"/></div>
					
				</div>
				</form>
				<!--inicio modal-body3-->
			</div>
		</div>
	</div>
	<script src="../../js/jquery-1.10.1.min.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
	<script src="../../js/bootstrap.min.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>	
	<script src="../../js/bootstrap-datepicker.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
	<script src="../../js/alert.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
	<script src="../../js/chosen.jquery.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
	<script src="../../js/requisicion_interna.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
	
</body>
</html>