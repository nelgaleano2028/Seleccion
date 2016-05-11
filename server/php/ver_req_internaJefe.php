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
$datos= $obj->get_centroCostoJefe($_GET['jefe']);


$obj2= new Utilidades();
$fechaMes=$obj2->mesEsp($fechaMesSys);

$obj3= new Requisicion();
$ausencias=$obj3->get_ausencias();

$obj4=new Requisicion();
$datos2=$obj4->get_formRequisicionInterna($_GET['id_req']);


$terminacion_contrato="";
$promocion="";
$movimiento_area="";
$ausencia="";
$misma_area="";
$externa="";
$sugerencia_persona="";
$externa_persona="";

switch($datos2[0]['motivo']){

case 2:
	$terminacion_contrato="checked";
break;

case 3:
	$promocion="checked";
break;

case 4:
	$movimiento_area="checked";
break;
default:
	$ausencia="checked";
	$obj5= new Requisicion();
	$concepto=$obj5->getConceptosId($datos2[0]['motivo_ausencia']);
	
}




switch($datos2[0]['sugerencia']){

case 1:
	$misma_area="checked";
	$obj6= new Requisicion();
	
	$sugerencia_persona=$obj6->getPersona($datos2[0]['cod_sugerencia']);

	$sugerencia_persona=$sugerencia_persona[0]['nombres'];
	
break;

case 2:
	$externa="checked";
	
	$externa_persona=$datos2[0]['cod_sugerencia'];
break;

}
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
<body id="main">
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
							<option value="<?php echo $datos2[0]['cod_cc2']?>" selected><?php echo $datos2[0]['nom_cc2']?></option>
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
					<select data-placeholder="Seleccione" name="cargo" class="cargo ">
							<option class="remove_cargo" value="<?php echo $datos2[0]['cod_car']?>"><?php echo $datos2[0]['nom_car']?></option>
							<option value="">Cargo</option> 
							
					</select>
					<label class="login_label2 control-label" for="reemplazo">Reemplazo a:</label>

					
					<?php if($datos2[0]['num_select_reemp']==1){?>
					<select data-placeholder="Seleccione" name="reemplazo" class="reemplazo1 required">
							<option value="-1">Seleccione ...</option>
							<option  value="<?php echo $datos2[0]['reemp']?>" selected><?php echo $datos2[0]['reemplazo_a']?></option>							
					</select>
					<?php }else{?>
							<select name="reemplazo" class="reemplazo1 required">
								<option value="-1">Seleccione ...</option>
                            							
							</select>

					<?php }?>


					<?php if($datos2[0]['num_select_reemp']==2){?>
						<select data-placeholder="Seleccione" name="reemplazo_inactivo" class="reemplazo2">
							<option value="-1">Seleccione ...</option>
							<option  value="<?php echo $datos2[0]['reemp']?>" selected><?php echo $datos2[0]['reemplazo_a']?></option>
									           							
						</select>
					<?php }else{?>
						<select name="reemplazo_inactivo" class="reemplazo2">
								<option value="-1">Seleccione...</option>
			                            							
						</select>

					<?php }?>


					<?php if($datos2[0]['num_select_reemp']==3){?>
						<select  data-placeholder="Seleccione" id="reemplazo_cedula"  name="reemplazo_cedula" >
									<option value="-1">Seleccione ...</option>
									<option  value="<?php echo $datos2[0]['reemp']?>" selected><?php echo $datos2[0]['reemplazo_a']?></option>
									

						</select>
					<br>
					<?php }else{?>

						<select id="reemplazo_cedula"  name="reemplazo_cedula" >
									<option value="-1">Seleccione...</option>

						</select>

					<?php }?>


					<label class="login_label2 control-label label_motivo">Causa de la Vacante:</label>

					<div style="height:20px"></div>
					
					<?php if($datos2[0]['motivo'] ==2 || $datos2[0]['motivo'] ==3 || $datos2[0]['motivo'] ==4){ ?>
						<label class="radio">
								<input type="radio" name="motivo"  value="1" <?php echo $ausencia;?> />
								Ausencia
								<select name="ausencia" class="ausencia">
									<option value="">Seleccione...</option>
									<?php
										for($i=0; $i<count($ausencias); $i++){
										
												if($datos2[0]['motivo_ausencia'] != $ausencias[$i]['concepto']){
													echo "<option value='".@$ausencias[$i]['codigo']."' >".@$ausencias[$i]['concepto']."</option>";
												}
										}
									?>
								</select>
							</label>
											
						<?php }else{?>
						<label class="radio">
							<input type="radio" name="motivo"  value="1" <?php echo $ausencia;?> />
							Ausencia
							<select name="ausencia" class="ausencia">
								<option value="<?php echo $datos2[0]['motivo_ausencia']?>"><?php echo $concepto;?></option>
								<option value="">Seleccione...</option>
								<?php
									for($i=0; $i<count($ausencias); $i++){
									
											if($concepto != $ausencias[$i]['concepto']){
												echo "<option value='".@$ausencias[$i]['codigo']."' >".@$ausencias[$i]['concepto']."</option>";
											}
									}
								?>
							</select>
						</label>

						<?php }?>
			
					<label class="radio">
						<input type="radio" name="motivo"  value="2" <?php echo $terminacion_contrato; ?> />
						Terminación Contrato
					</label>
					<label class="radio">
						<input type="radio" name="motivo"  value="3"  <?php echo $promocion; ?> />
						Promocion
					</label>
					<label class="radio">
						<input type="radio" name="motivo"  value="4" <?php echo $movimiento_area;?>/>
						Movimiento de Area
					</label>

					<hr>

					<label class="login_label2 control-label label_motivo">Defina las Fechas correspondientes del Nuevo Personal</label>

					<div style="height:40px"></div>
					

					<div class="label1">
						<label class="login_label2 control-label">Fecha Inicio Entrenamiento:</label>
						<div class="input-append date" id="dp1" data-date="<?php echo $fechaSys; ?>" data-date-format="dd-mm-yyyy">
						  <input class="span3" size="16" type="text" name="fecha_inicioE" value="<?php echo $datos2[0]['fec_inicio_ent'] ?>" >
						  <span class="add-on"><i class="icon-th"></i></span>
						</div>
					</div>
					<div class="label2">
						<label class="login_label2 control-label" >Fecha Fin Entrenamiento:</label>
						<div class="input-append date" id="dp2" data-date="<?php echo $fechaSys; ?>" data-date-format="dd-mm-yyyy">
						  <input class="span3" size="16" type="text" name="fecha_finE" value="<?php echo $datos2[0]['fec_fin_ent'] ?>" >
						  <span class="add-on"><i class="icon-th"></i></span>
						</div>
					</div>
					<div style="clear:both"></div>
					<div class="label1">
						<label class="login_label2 control-label">Fecha Inicio Labor:</label>
						<div class="input-append date" id="dp3" data-date="<?php echo $fechaSys; ?>" data-date-format="dd-mm-yyyy">
						  <input class="span3" size="16" type="text" name="fecha_inicioL" value="<?php echo $datos2[0]['fec_inicio_lab'] ?>">
						  <span class="add-on"><i class="icon-th"></i></span>
						</div>
					</div>
					<div class="label2">
						<label class="login_label2 control-label" >Fecha Fin Labor:</label>
						<div class="input-append date" id="dp4" data-date="<?php echo $fechaSys; ?>" data-date-format="dd-mm-yyyy">
						  <input class="span3" size="16" type="text" name="fecha_finL" value="<?php echo $datos2[0]['fec_fin_lab'] ?>">
						  <span class="add-on"><i class="icon-th"></i></span>
						</div>
					</div>
			
					<div style="clear:both"></div>

					<hr>
					

					<label class="login_label2 control-label">Sugerencia de la persona a ocupar el cargo:</label>
					<?php if($datos2[0]['sugerencia']==1){ ?>
					<label class="radio">
						<input type="radio" name="sugerencia" <?php echo $misma_area?> value="1" class="misma_area">
						<select name="misma_area" class="misma_area">
						    <option value="<?php echo $datos2[0]['cod_sugerencia']?>"><?php echo $sugerencia_persona;?></option>
							<option value="">De la misma Area...</option> 	
							
						</select>
					</label>
					<?php }else{?>
					<label class="radio">
						<input type="radio" name="sugerencia" <?php echo $misma_area?> value="1">
						<select name="misma_area" class="misma_area">

							<option value="">De la misma Area...</option> 	
						</select>
					</label>
					<?php }?>
					<label class="radio">
						<?php if($datos2[0]['sugerencia']==2){  ?>
						<input type="radio" name="sugerencia" <?php echo $externa?> value="2">
						<select data-placeholder="Seleccione cedula" id="area_externa"  name="area_externa" >
							<option value="<?php echo $datos2[0]['cod_sugerencia']?>" selected> <?php echo $datos2[0]['nom_sugerencia']?></option>	

						</select>

						<span style="color:rgb(173, 21, 39); font-weight:bold">Externa al Area</span>
						<?php }else{?>

							<input type="radio" name="sugerencia" <?php echo $externa?> value="2">
							<select data-placeholder="Seleccione cedula" id="area_externa"  name="area_externa" >
								<option value="-1" selected> Seleccione...</option>	

							</select>

							<span style="color:rgb(173, 21, 39); font-weight:bold">Externa al Area</span>


						<?php } ?>

					</label>
					<div style="clear:both"></div>
					<!--codigo del jefe-->
					<input type="hidden" name="cod_epl_jefe" value="<?php echo $_SESSION['cod_epl'] ?>" id="cod_epl" />
					<input type="hidden" name="id" value="<?php echo $datos2[0]['id'] ?>"  />
					
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