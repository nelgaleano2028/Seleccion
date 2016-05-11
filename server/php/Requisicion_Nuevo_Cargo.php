<?php
session_start();
require_once('class_requisicion.php');
require_once('class_utilidades.php');


$obj= new Requisicion();
$datos= $obj->get_centroCostoJefe($_SESSION['cod_epl']);

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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
    
	<!-- Bootstrap -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css?css=<?php echo rand(1, 100);?>" />
    <link rel="stylesheet" href="../../css/style.css?css=<?php echo rand(1, 100);?>"  />
    <link rel="stylesheet" href="../../css/font-awesome/css/font-awesome.css?css=<?php echo rand(1, 100);?>" />
	<link rel="stylesheet" href="../../css/datepicker.css?css=<?php echo rand(1, 100);?>" />
	
</head>
<body id="contenido">
	
		<div id="esconder">
			
			<div id="error"></div>
			
			<div class="row">
				
				<div class="estirar_form2">
				
					<div class="cambia">
					
						<div class="modal-header">
							<h3 id="myModalLabel">Solicitud de Requisicion Nuevo cargo</h3>
						</div>
						<form method="post" id="requisicion_nuevo_cargo" class="active">
							<!--Inicio modal-body2-->
							<div class="modal-body2">
								<div class="label1">
									<label class="login_label2 control-label persona" for="supernumeario">Seleccione Centro de costo:</label>
									<select name="centro_costo" class="centro_costo required">
										<option value="">Seleccione Centro Costo</option>
										<?php
											for($i=0; $i<count($datos); $i++){
											
											echo "<option value='".@$datos[$i]['codigo']."' >".@$datos[$i]['area']."</option>";
											
											}
										?>
										
									</select>
								</div>
								<div class="label2">
									<label class="login_label2 control-label persona">Fecha Solicitud:</label>
									<p><?php  echo $fechaDiaSys.'-'.$fechaMes.'-'.$fechaAnioSys; ?></p>
								</div>
								<div style="clear:both;"></div>
								<label class="login_label2 control-label persona">Cargo Requerido:</label>
								<label class="radio">
									<input type="radio" name="cargoRequerido"  value="1">
									<select name="cargo" class="cargo">
											<option value="">Cargo</option> 
											
									</select>
								</label>
								<label class="radio">
									<input type="radio" name="cargoRequerido"  value="2">
									<input type="text"  class="span3" name="nuevo_cargo" /> Escriba su cargo nuevo no existente
								</label>
								<label class="login_label2 control-label persona">Motivo:</label>
								<label class="radio">
									<input type="radio" name="motivo" value="1">
									<div class="alinear">Aumento de la Demanda</div>
									<div class="input-append date" id="fec_iniE"  data-date="<?php echo $fechaSys; ?>" data-date-format="dd-mm-yyyy">
										<input class="span3" type="text" name="fec_iniE"  placeholder="Fecha Inicio Entrenamiento:"/>
										<span class="add-on"><i class="icon-th"></i></span>
									</div>
						
									<div class="input-append date" id="fec_finE"  data-date="<?php echo $fechaSys; ?>" data-date-format="dd-mm-yyyy">
										<input class="span3" type="text" name="fec_finE"  placeholder="Fecha Fin Entrenamiento:"/>
										<span class="add-on"><i class="icon-th"></i></span>
									</div>
									<div class="input-append date" id="fec_iniL" data-date="<?php echo $fechaSys; ?>" data-date-format="dd-mm-yyyy">
										<input class="span3" type="text" name="fec_iniL"  placeholder="Fecha Inicio labor:"/>
										<span class="add-on"><i class="icon-th"></i></span>
									</div>
									<div class="input-append date" id="fec_finL"  data-date="<?php echo $fechaSys; ?>" data-date-format="dd-mm-yyyy">
										<input class="span3" type="text" name="fec_finL"  placeholder="Fecha Fin labor:"/>
										<span class="add-on"><i class="icon-th"></i></span>
									</div>
								</label>
								<label class="radio">
									<input type="radio" name="motivo"  value="2">
									<div class="alinear">Proyecto Temporal</div>
									<div class="input-append date" id="fec_iniET"  data-date="<?php echo $fechaSys; ?>" data-date-format="dd-mm-yyyy">
										<input class="span3" type="text" name="fec_iniET"  placeholder="Fecha Inicio Entrenamiento:"/>
										<span class="add-on"><i class="icon-th"></i></span>
									</div>
									<div class="input-append date" id="fec_finET"  data-date="<?php echo $fechaSys; ?>" data-date-format="dd-mm-yyyy">
										<input class="span3" type="text"  name="fec_finET"  placeholder="Fecha Fin Entrenamiento:"/>
										<span class="add-on"><i class="icon-th"></i></span>
									</div>
									<div class="input-append date" id="fec_iniLT"  data-date="<?php echo $fechaSys; ?>" data-date-format="dd-mm-yyyy">
										<input class="span3" type="text"  name="fec_iniLT"  placeholder="Fecha Inicio labor:"/>
										<span class="add-on"><i class="icon-th"></i></span>
									</div>
									<div class="input-append date" id="fec_finLT"  data-date="<?php echo $fechaSys; ?>"  data-date-format="dd-mm-yyyy">
										<input class="span3" type="text" value="" name="fec_finLT"  placeholder="Fecha Fin labor:"/>
										<span class="add-on"><i class="icon-th"></i></span>
									</div>
								</label>
								
								<label class="radio">
									<input type="radio" name="motivo"  value="3">
									<div class="alinear">Nuevo Actividad en el Proceso</div>
									<div class="input-append date"  id="fec_iniEA"  data-date="<?php echo $fechaSys; ?>" data-date-format="dd-mm-yyyy">
										<input class="span3" type="text"  name="fec_iniEA"  placeholder="Fecha Inicio Entrenamiento:"/>
										<span class="add-on"><i class="icon-th"></i></span>
									</div>
									<div class="input-append date" id="fec_finEA"  data-date="<?php echo $fechaSys; ?>"  data-date-format="dd-mm-yyyy">
										<input class="span3" type="text" name="fec_finEA" placeholder="Fecha Fin Entrenamiento:"/>
										<span class="add-on"><i class="icon-th"></i></span>
									</div>
									<div class="input-append date" id="fec_iniLA"  data-date="<?php echo $fechaSys; ?>"  data-date-format="dd-mm-yyyy">
										<input class="span3" type="text" name="fec_iniLA"  placeholder="Fecha Inicio labor:"/>
										<span class="add-on"><i class="icon-th"></i></span>
									</div>
									
								</label>
								<label class="login_label control-label persona">Formulario de Sustentación de la necesidad: <a href="#" id="show_frmSustentacion">Click</a><span id="mostrar_delete"><img src="../../img/delete.png" /></span><span id="mostrar_success"><img src="../../img/success.gif" /></span></label>
								<label class="login_label2 control-label">Persona Sugerida a Ocupar el Cargo:</label>
								<input class="span4" type="text" name="persona_sugerida" />
								<div style="clear:both"></div>
								<!--codigo del jefe-->
								<input type="hidden" name="cod_epl_jefe" value="<?php echo $_SESSION['cod_epl'] ?>" id="cod_epl" />
								<!--codigo del  formulario de la sustentacion-->
								<input type="hidden"  id="llenar" name="cod_form"  />
								<input type="hidden"  id="llenar1" name="nom_car_nuevo"  />
								<input type="hidden"  id="llenar2" name="ubicacion2"  />
								<!--Codigo del formulario form_perfil_cargo-->
								<!--<input type="hidden" name="form_perfil_cargo" value="" id="form_perfil_cargo" />-->
								<div class="btn-form2" ><input id="requisicion_nuevo_cargoBtn" type="button" class="btn btn-primary" value="Enviar"/></div>
								
							</div>
							<!--Fin modal-body2-->
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<div id="mostrar">
			<?php
				$cod_jefe=$_SESSION['cod_epl'];
				include_once('form_perfil_cargo.php');
			?>
		</div>
		
		
		
		
	<script src="../../js/jquery-1.10.1.min.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
	<script src="../../js/bootstrap.min.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
    <script src="../../js/bootstrap-datepicker.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
	<script src="../../js/alert.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
	<script src="../../js/dist/jquery.validate.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
	<script src="../../js/requisicion_nuevo_cargo.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
</body>
</html>