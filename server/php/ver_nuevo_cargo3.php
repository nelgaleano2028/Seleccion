<?php 
session_start();
require_once('class_requisicion.php');
require_once('class_utilidades.php');

$obj= new Requisicion();
$obj2= new Requisicion();
$obj3= new Requisicion();
$obj4= new Requisicion();
$obj5= new Requisicion();


$datos=$obj->get_formRequisicionNuevoCargo($_GET['id_form'],$_GET['cod_form']);


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
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/style.css"  />
    <link rel="stylesheet" href="../../css/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="../../css/datepicker.css" />
	
			
	<script src="../../js/jquery-1.10.1.min.js" type="text/javascript"></script>
	<script src="../../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../../js/bootstrap-datepicker.js" type="text/javascript"></script>
	<script src="../../js/alert.js" type="text/javascript"></script>
	<script src="../../js/dist/jquery.validate.js" type="text/javascript"></script>
	<script src="../../js/requisicion_nuevo_cargo3.js" type="text/javascript"></script>
	
</head>
<body  id="main">
	
		<div id="esconder">
			
			<div id="error"></div>
			
			<div class="row">
				
				<div class="estirar_form2">
				
					<div class="cambia">
					
						<div class="modal-header">
							<h3 id="myModalLabel">Solicitud de Requisicion Nueva Cargo</h3>
						</div>
						<form method="post" id="requisicion_nuevo_cargo" class="active">
							<!--Inicio modal-body2-->
							<div class="modal-body2">
								
									
								<label class="login_label2 control-label persona">Motivo:</label>
								<?php
									
									$flag=0;
									$bandera=0;
									
									if($datos[0]['motivo']==1 || $flag==0){ //aumento de la demanda
										
										if($datos[0]['motivo']==1){
											$bandera=1;
										}
										
										
										if($bandera!=1){
											$checked="";
											$fec_ini_ent="";
											$fec_fin_ent="";
											$fec_ini_lab="";
											$fec_fin_lab="";
										}else{
											$checked="checked";
											$fec_ini_ent=@$datos[0]['fec_ini_ent'];
											$fec_fin_ent=@$datos[0]['fec_fin_ent'];
											$fec_ini_lab=@$datos[0]['fec_ini_lab'];
											$fec_fin_lab=@$datos[0]['fec_fin_lab'];
										}
										
										
								?>
								<label class="radio">
									<input type="radio" name="motivo" <?php echo $checked ?> value="1">
									<div class="alinear">Aumento de la Demanda</div>
									<div class="input-append date" id="fec_iniE"  data-date="<?php echo $fechaSys; ?>" data-date-format="dd-mm-yyyy">
										<input class="span3" type="text" name="fec_iniE"  placeholder="Fecha Inicio Entrenamiento:" value="<?php echo $fec_ini_ent?>"/>
										<span class="add-on"><i class="icon-th"></i></span>
									</div>
						
									<div class="input-append date" id="fec_finE"  data-date="<?php echo $fechaSys; ?>" data-date-format="dd-mm-yyyy">
										<input class="span3" type="text" name="fec_finE"  placeholder="Fecha Fin Entrenamiento:" value="<?php echo $fec_fin_ent?>"/>
										<span class="add-on"><i class="icon-th"></i></span>
									</div>
									<div class="input-append date" id="fec_iniL" data-date="<?php echo $fechaSys; ?>" data-date-format="dd-mm-yyyy">
										<input class="span3" type="text" name="fec_iniL"  placeholder="Fecha Inicio labor:" value="<?php echo $fec_ini_lab?>"/>
										<span class="add-on"><i class="icon-th"></i></span>
									</div>
									<div class="input-append date" id="fec_finL"  data-date="<?php echo $fechaSys; ?>" data-date-format="dd-mm-yyyy">
										<input class="span3" type="text" name="fec_finL"  placeholder="Fecha Fin labor:" value="<?php echo $fec_fin_lab?>"/>
										<span class="add-on"><i class="icon-th"></i></span>
									</div>
								</label>
								<?php }?>
								<?php
									
								
									if($datos[0]['motivo']==2 || $flag==0){ //Proyecto temporal
										
										
										if($datos[0]['motivo']==2){
											$bandera=2;
										}
										
										
										
										if($bandera!=2){
											$checked2="";
											$fec_ini_ent="";
											$fec_fin_ent="";
											$fec_ini_lab="";
											$fec_fin_lab="";
										}else{
											$checked2="checked";
											$fec_ini_ent=@$datos[0]['fec_ini_ent'];
											$fec_fin_ent=@$datos[0]['fec_fin_ent'];
											$fec_ini_lab=@$datos[0]['fec_ini_lab'];
											$fec_fin_lab=@$datos[0]['fec_fin_lab'];

										}
								?>
								<label class="radio">
									<input type="radio" name="motivo"  <?php echo $checked2 ?> value="2">
									<div class="alinear">Proyecto Temporal</div>
									<div class="input-append date" id="fec_iniET"  data-date="<?php echo $fechaSys; ?>" data-date-format="dd-mm-yyyy">
										<input class="span3" type="text" name="fec_iniET"  placeholder="Fecha Inicio Entrenamiento:" value="<?php echo $fec_ini_ent ?>"/>
										<span class="add-on"><i class="icon-th"></i></span>
									</div>
									<div class="input-append date" id="fec_finET"  data-date="<?php echo $fechaSys; ?>" data-date-format="dd-mm-yyyy">
										<input class="span3" type="text"  name="fec_finET"  placeholder="Fecha Fin Entrenamiento:" value="<?php echo $fec_fin_ent?>"/>
										<span class="add-on"><i class="icon-th"></i></span>
									</div>
									<div class="input-append date" id="fec_iniLT"  data-date="<?php echo $fechaSys; ?>" data-date-format="dd-mm-yyyy">
										<input class="span3" type="text"  name="fec_iniLT"  placeholder="Fecha Inicio labor:" value="<?php echo $fec_ini_lab?>"/>
										<span class="add-on"><i class="icon-th"></i></span>
									</div>
									<div class="input-append date" id="fec_finLT"  data-date="<?php echo $fechaSys; ?>"  data-date-format="dd-mm-yyyy">
										<input class="span3" type="text"  name="fec_finLT"  placeholder="Fecha Fin labor:" value="<?php echo $fec_fin_lab?>"/>
										<span class="add-on"><i class="icon-th"></i></span>
									</div>
								</label>
								<?php }?>
								<?php
									
								
									if($datos[0]['motivo']==3  || $flag==0){ //Nuevo Actividad en el Proceso
										
										if($datos[0]['motivo']==3){
											$bandera=3;
										}
										
										if($bandera!=3){
										    $checked3="";
											$fec_ini_ent="";
											$fec_fin_ent="";
											$fec_ini_lab="";
											$fec_fin_lab="";
										}else{
											$checked3="checked";
											$fec_ini_ent=@$datos[0]['fec_ini_ent'];
											$fec_fin_ent=@$datos[0]['fec_fin_ent'];
											$fec_ini_lab=@$datos[0]['fec_ini_lab'];
											//$fec_fin_lab=@$datos[0]['fec_fin_lab'];
										}
								?>
								<label class="radio">
									<input type="radio" name="motivo" <?php echo $checked3 ?> value="3">
									<div class="alinear">Nuevo Actividad en el Proceso</div>
									<div class="input-append date"  id="fec_iniEA"  data-date="<?php echo $fechaSys; ?>" data-date-format="dd-mm-yyyy">
										<input class="span3" type="text"  name="fec_iniEA"  placeholder="Fecha Inicio Entrenamiento:" value="<?php echo $fec_ini_ent ?>"/>
										<span class="add-on"><i class="icon-th"></i></span>
									</div>
									<div class="input-append date" id="fec_finEA"  data-date="<?php echo $fechaSys; ?>"  data-date-format="dd-mm-yyyy">
										<input class="span3" type="text" name="fec_finEA" placeholder="Fecha Fin Entrenamiento:" value="<?php echo $fec_fin_ent?>"/>
										<span class="add-on"><i class="icon-th"></i></span>
									</div>
									<div class="input-append date" id="fec_iniLA"  data-date="<?php echo $fechaSys; ?>"  data-date-format="dd-mm-yyyy">
										<input class="span3" type="text" name="fec_iniLA"  placeholder="Fecha Inicio labor:" value="<?php echo $fec_ini_lab?>"/>
										<span class="add-on"><i class="icon-th"></i></span>
									</div>
									
								</label>
								<?php }?>
								<label class="login_label control-label persona">Formulario de Sustentación de la necesidad: <a href="#" id="show_frmSustentacion">Click</a><span id="mostrar_delete"><img src="../../img/delete.png" /></span><span id="mostrar_success"><img src="../../img/success.gif" /></span></label>
								
								<div style="clear:both"></div>
								<!--codigo del jefe-->
								<input type="hidden" name="cod_epl_jefe" value="<?php echo $_SESSION['cod_epl'] ?>" id="cod_epl" />
								<!--codigo del  formulario de la sustentacion-->
								<input type="hidden"  id="llenar" name="cod_form"  value="<?php echo $_GET['cod_form']?>" />
								<input type="hidden"  id="llenar1" name="nom_car" value="<?php echo @$datos[0]['nom_car_nuevo']?>"  />
								<input type="hidden"  id="llenar2" name="ubicacion" value="<?php echo @$datos[0]['ubicacion']?>" />
								<input type="hidden"  name="id" value="<?php echo @$datos[0]['id_form']?>"  />
								<!--Codigo del formulario form_perfil_cargo-->
								<!--<input type="hidden" name="form_perfil_cargo" value="" id="form_perfil_cargo" />-->
								<div class="btn-form2" >
								<input id="requisicion_cancelar" type="button" class="btn btn-primary" value="Cerrar"/></div>
								
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
				include_once('ver_perfil_cargo3.php');
			?>
		</div>
		
		
		

</body>
</html>