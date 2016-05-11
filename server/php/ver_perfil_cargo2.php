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
<body>
	<div id="error"></div>
	
	<div class="row">
		<!--Inicio estirar_form2-->
		<div class="estirar_form2">
			
			
			<!--Inicio class cambia-->
			<div class="cambia">
				<ul class="nav nav-tabs">
				  <li class="active"><a href="#perfil" data-toggle="tab">Perfil del Cargo</a></li>
				  <li><a href="#justificacion" data-toggle="tab">Justificacion de la Creacion del Cargo</a></li>
				  <li><a href="#administrativos" data-toggle="tab">Para Procesos Administrativos</a></li>
				</ul>
				
				
				<form  method="post"  id="personas_cargoFrm" class="active">
				<!--Inicio tab-content-->
				<div class="tab-content">


					<!--Inicio perfil-->
					<div class="tab-pane active" id="perfil">
						
						<div class="form-group">
							<label class="login_label2">Nombre Cargo Solicitado:</label>
							<input type="text" class="form-control" name="nom_car_sol" value="<?php echo $datos[0]['nom_car_sol']; ?>" />
						</div>

						<div class="form-group">
							<label class="login_label2">Numero Personas solicitadas:</label>
							<input type="text" class="form-control input-small" name="num_per_car_sol" value="<?php echo $datos[0]['num_per_car_sol']; ?>" />
						</div>

						<div style="clear:both"></div>

						<div class="form-group">
							<label class="login_label2">DESCRIPCIÓN DE LA SOLICITUD: Cúal  es la razón principal por la cual se está solcitando el nuevo cargo?</label>
							<textarea name="desc_car_sol"><?php echo $datos[0]['desc_car_sol']; ?></textarea>
						</div>


					</div>
				  	<!--Fin perfil-->

				   <!--Inicio justificacion-->
				  <div class="tab-pane" id="justificacion">
				  
					<div class="envolver_justificacion">
						<p class="p_justifica_cargo">Enuncie las razones principales del nuevo cargo, explicando con DATOS de productividad cuáles actividades diarias están sin atenderse
						   por falta de mano obra, o cuáles están siendo atendidas con mano de obra extra. Tenga en cuenta y describa los siguientes parametros:</p>
						<p class="p_justifica_cargo_n">Comparativo entre número actual de procedimientos, valor venta año anterior. Valor venta actua, utilidad operacional. Margen operacional. Margen de utilidad
						   operacional. Número de personas con el mismo cargo.</p>
						   
						   <div class="titulo_tabla">Para Procesos Clínicos: (Datos Cuadro de Manto integral/ Aplicativo SIAM)</div>
						   <div  class="reducir_tabla">
							   <table class="table table-bordered">
									<th>PARAMETRO</th>
									<th>DATO AÑO 2011</th>
									<th>DATO AÑO 2012</th>
									<th>%CUMPLIMIENTO DE LA META EN 2012</th>
									<tr>
										<td>Número de Pacientes</td>
										<td><input class="input-mini" type="text" name="numero_pacientes1" value="<?php echo $datos[0]['num_pac_dato_1']?>"></td>
										<td><input class="input-mini" type="text" name="numero_pacientes2" value="<?php echo $datos[0]['num_pac_dato_2']?>"></td>
										<td><input class="input-large" type="text" name="cumplir_meta1" value="<?php echo $datos[0]['num_pac_cumplir']?>"></td>
									</tr>
									<tr>
										<td>Valor de la ventas</td>
										<td><input class="input-mini" type="text" name="numero_ventas1" value="<?php echo $datos[0]['vlr_ventas_dato_1']?>" ></td>
										<td><input class="input-mini" type="text" name="numero_ventas2" value="<?php echo $datos[0]['vlr_ventas_dato_2']?>"></td>
										<td><input class="input-large" type="text" name="cumplir_meta2" value="<?php echo $datos[0]['vlr_ventas_cumplir']?>"></td>
									</tr>
									<tr>
										<td>Número de procedimientos</td>
										<td><input class="input-mini" type="text" name="numero_procedimientos1" value="<?php echo $datos[0]['num_proc_dato_1']?>"></td>
										<td><input class="input-mini" type="text" name="numero_procedimientos2" value="<?php echo $datos[0]['num_proc_dato_2']?>"></td>
										<td><input class="input-large" type="text" name="cumplir_meta3" value="<?php echo $datos[0]['num_proc_cumplir']?>"></td>
									</tr>
									<tr>
										<td>Utilidad Neta</td>
										<td><input class="input-mini" type="text" name="utilidad_neta1" value="<?php echo $datos[0]['util_net_dato_1']?>"></td>
										<td><input class="input-mini" type="text" name="utilidad_neta2" value="<?php echo $datos[0]['util_net_dato_2']?>"></td>
										<td><input class="input-large" type="text" name="cumplir_meta4" value="<?php echo $datos[0]['util_net_cumplir']?>"></td>
									</tr>
									<tr>
										<td>Costos y Gastos</td>
										<td><input class="input-mini" type="text" name="costos_gastos1" value="<?php echo $datos[0]['cost_gast_dato_1']?>"></td>
										<td><input class="input-mini" type="text" name="costos_gastos2" value="<?php echo $datos[0]['cost_gast_dato_2']?>"></td>
										<td><input class="input-large" type="text" name="cumplir_meta5" value="<?php echo $datos[0]['cost_gast_cumplr']?>"></td>
									</tr>
									<tr>
										<td colspan="4">Impacto esperado con el nuevo cargo:
											<textarea rows="3" cols="50" name="Impacto_esperado"><?php echo $datos[0]['impacto_esp_1']?></textarea>
										</td>
									</tr>
									
							   </table>
						   </div>
					 </div><!--Fin justificacion-->
				  </div>
				  <!--Fin justificacion-->
				
				  
				   <!--Inicio administrativos-->
				  <div class="tab-pane" id="administrativos">
						<div class="envolver_justificacion">
							<p class="p_justifica_cargo">Número de personas en el mismo cargo: Atividades no atendidas por falta de mano de obra, Impacto:</p>
							<p class="p_justifica_cargo">índice de gasto administrativo:</p>
							<div  class="reducir_tabla">
								<table class="table table-bordered">
									<th>PARAMETRO</th>
									<th>DATO AÑO 2011</th>
									<th>DATO AÑO 2012</th>
									<th>%CUMPLIMIENTO DE LA META EN 2012</th>
									<tr>
										<td>Número de Personas en el mismo cargo</td>
										<td><input class="input-mini" type="text" name="personas_cargo1" value="<?php echo $datos[0]['num_per_dato_1']?>"></td>
										<td><input class="input-mini" type="text" name="personas_cargo2" value="<?php echo $datos[0]['num_per_dato_2']?>"></td>
										<td><input class="input-large" type="text" name="cumplir_meta6" value="<?php echo $datos[0]['num_per_cumplir']?>"></td>
									</tr>
									<tr>
										<td>Índice de gastos administrativos</td>
										<td><input class="input-mini" type="text" name="gastos_administrativos1" value="<?php echo $datos[0]['indi_gasto_dato_1']?>" ></td>
										<td><input class="input-mini" type="text" name="gastos_administrativos2" value="<?php echo $datos[0]['indi_gasto_dato_2']?>"></td>
										<td><input class="input-large" type="text" name="cumplir_meta7" value="<?php echo $datos[0]['indi_gasto_cumplir']?>"></td>
									</tr>
									<tr>
										<td>Presupuesto total del área</td>
										<td><input class="input-mini" type="text" name="presupuesto_area1" value="<?php echo $datos[0]['presp_tot_dato_1']?>"></td>
										<td><input class="input-mini" type="text" name="presupuesto_area2" value="<?php echo $datos[0]['presp_tot_dato_2']?>"></td>
										<td><input class="input-large" type="text" name="cumplir_meta8" value="<?php echo $datos[0]['presp_tot_cumplir']?>"></td>
									</tr>
									<tr>
										<td colspan="4"><p>Actividades no atendidas hoy por el proceso,</p>
											<p>por falta de mano de obra:</p><textarea rows="3" cols="50" name="actividades_no"><?php echo $datos[0]['act_no_atendidas']?></textarea>
											
										</td>
									</tr>
									
									<tr>
										<td colspan="4">Impacto esperado con el nuevo cargo:
											<textarea rows="3" cols="50" name="Impacto_esperado2"><?php echo $datos[0]['impacto_esp_2']?></textarea>
										</td>
									</tr>
									
							   </table>
							</div>
							
							<div style="clear:both"></div>
						</div>
				  </div>
				  <!--Fin administrativos-->
				  <div style="clear:both"></div>
					<!--codigo del formulario-->
					<input type="hidden" name="id_form" value="<?php echo $datos[0]['id_form'] ?>"  />
					<!--Inicio del boton adjuntar-->
					<div class="form-group">
						<div class="btn-form2 btn-form3"><button type="submit"  class="btn btn-primary" id="EDpersonas_cargoBtn">Adjuntar</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button"  class="btn btn-primary" id="cancelar_cargoBtn">Cancelar</button></div>
					</div>
					
					<!--Fin del boton adjuntar-->
				</div>
				<!--Fin tab-content-->
					
				</form>
			</div>
			<!--Fin class cambia-->
			
		</div>
		<!--Inicio estirar_form2-->
	</div>
	
	

</body>
</html>