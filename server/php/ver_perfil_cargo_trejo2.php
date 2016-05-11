<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	
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
				  <li><a href="#proposito" data-toggle="tab">Proposito del Cargo</a></li>
				  <li><a href="#principales" data-toggle="tab">Principales Responsabilidades del Cargo</a></li>
				  <li><a href="#areas" data-toggle="tab">Relacion del Puesto con otras Areas</a></li>
				  <li><a href="#cargo" data-toggle="tab">Cargo</a></li>
				 
				  <li><a href="#justificacion" data-toggle="tab">Justificacion de la Creacion del Cargo</a></li>
				  <li><a href="#administrativos" data-toggle="tab">Para Procesos Administrativos</a></li>
				</ul>
				
				
				<form  method="post"  id="personas_cargoFrm" class="active">
				<!--Inicio tab-content-->
				<div class="tab-content">
				<!--Inicio Perfil-->
				<div class="tab-pane active" id="perfil">
					<div class="form-group">
						<label class="login_label control-label">Nombre Cargo Nuevo:</label>
						<input type="text" class="form-control" name="nomCar" value="<?php echo $datos[0]['nom_car_nuevo']?>"/>
					</div>
					
					<div class="form-group">
						<label class="login_label control-label">Ubicacion</label>
						<input type="text" name="ubicacion"  value="<?php echo $datos[0]['ubicacion']?>"/>
					</div>
					
					<div class="form-group">
						<label class="login_label control-label">Gerencia</label>
						<input type="text" name="gerencia" value="<?php echo $datos[0]['gerencia']?>"/>
					</div>
					
					<div class="form-group">
						<label class="login_label control-label">Coordinacion</label>
						<input type="text" name="coordinacion" value="<?php echo $datos[0]['coordinacion']?>"/>
					</div>
					
					<div style="clear:both"></div>
					
				</div>
				<!--Fin Perfil-->
				
				<!--Inicio proposito-->
					<div class="tab-pane" id="proposito">
						<p class="p_justifica_cargo">Haga una síntesis general del trabajo basándose en: ¿Qué se hace? (acción) ¿Cómo se hace? (método) y ¿Para qué se hace? (resultado esperado)</p>
						<p><br></p>
						<div class="form-group">
							<label class="login_label control-label">¿Qué hace?</label>
							<textarea name="cargo_hace"><?php echo $datos[0]['q_hace']?></textarea>
						</div>
						
						<div class="form-group">
							<label class="login_label control-label">¿Como se hace?</label>
							<textarea name="cargo_como"><?php echo $datos[0]['c_hace']?></textarea>
						</div>
						
						<div class="form-group">
							<label class="login_label control-label">¿Para qué se haceis?</label>
							<textarea name="cargo_para"><?php echo $datos[0]['p_hace']?></textarea>
						</div>
					
					
					</div>
				<!--Fin proposito-->
				
				<!--Inicio principales-->
					<div class="tab-pane" id="principales">
						<div class="envolver_justificacion">
								<p class="p_justifica_cargo">Enuncie las principales funciones ¿Que se hace?(accion) ¿como se hace?(método) y ¿para qué se hace?(resultado esperado), especificando el 
								porcentaje (%) de tiempo que le toma esa función, dentro del total de funciones del cargo.</p>
								<p class="p_justifica_cargo"><span class="negrita">Nota:</span> puede haber mas de tres funciones: <a href="#"  id="funcion">Insertar funcion</a></p>
								
						</div>
						
						<div class="formulario_clon">
							
							<?php $datos2=$obj4->get_resp_cargo_id($datos[0]['cod_resp']);
								
								$contador=1;
								for($j=0;$j<count($datos2);$j++){
							?>
							<div class="small-box" id="<?php echo $datos2[$j]['id_resp']; ?>">
									
								<div class="form-group">
								<label class="login_label control-label"><span class="numero"><?php echo $contador;?></span>. Funcion:</label>
								<input type="text" name="funcion[]" class="funcion" value="<?php echo $datos2[$j]['funcion']?>">
								</div>
								<div class="form-group">
								<label class="login_label control-label">Porcentaje %:</label>
								<input type="text" class="input-mini" name="porcentaje[]" value="<?php echo $datos2[$j]['porcentaje']?>">
								</div>
								
								<div style="clear:both"></div>
								<div class="form-group">
									<label class="login_label control-label">¿Qué hace?</label>
									<textarea name="funcion1[]"><?php echo $datos2[$j]['q_hace']?></textarea>
								</div>
								<div class="form-group">
									<label class="login_label control-label">¿Como se hace?</label>
									<textarea name="funcion2[]"><?php echo $datos2[$j]['c_hace']?></textarea>
								</div>
								<div class="form-group">
									<label class="login_label control-label">¿Para qué se hace?</label>
									<textarea name="funcion3[]"><?php echo $datos2[$j]['p_hace']?></textarea>
								</div>
								<a href="#" onClick="eliminar_cargoAJAX('<?php echo $datos2[$j]['id_resp']; ?>','<?php echo $contador++;?>')" class="btn btn-primary">Eliminar</a>	
							</div>
							<?php }?>
							
						</div>
					</div>
					
				<!--Fin principales-->
				
				<!--Inicio Relacion areas-->
				<div class="tab-pane" id="areas">
					<div class="envolver_justificacion">
							<p class="p_justifica_cargo">Describa las relaciones más importantes con las otras áreas y especifique si la relación es de (a) Cliente (b) Proveedor <a href="#"  id="area">Agregar Area</a></p>		
					</div>
					
					<div class="formulario_clon2">
					
						<div class="form-group"><label class="login_label control-label">AREA</label></div>
									<div class="caja1"><label class="login_label control-label">PROPOSITO</label></div>
									<div style="clear:both"></div>
						<?php 
								$datos3=$obj5->get_rel_cargo_id($datos[0]['cod_rel']);
								$contador=1;
								for($j=0;$j<count($datos3);$j++){
								
								
						?>
						<?php echo "<div class='small-box2' id='area_".$contador."' >" ?>

									<div class="form-group">
										<label class="login_label control-label"><span class="numero"><?php echo $contador;?></span> Área:</label>
										<input type="text" name="area[]" value="<?php echo $datos3[$j]['area']?>">
										<label class="login_label control-label">Cliente:</label>
										<input type="text" name="cliente[]" value="<?php echo $datos3[$j]['cliente']?>">
									</div>
									<div class="form-group">
										<label class="login_label control-label">Proveedor:</label>
										<input type="text" name="proveedor[]" value="<?php echo $datos3[$j]['proveedor']?>">
										<a href="#" onClick="eliminar_areaAJAX('<?php echo $datos3[$j]['id_rel']; ?>','<?php echo $contador++;?>')" class="btn btn-primary">Eliminar</a>	
									</div>
									<div style="clear:both"></div>
	
						 </div>
						 <?php }?>
					</div>
					
				
				</div>
				
				<!--Fin Relacion areas-->


				<!--Inicio cargo-->
					<div class="tab-pane" id="cargo">
						
						<div class="form-group">
							<label class="login_label2">Nombre Cargo Solicitado:</label>
							<input type="text" class="form-control" name="nom_car_sol" value="<?php echo $datos[0]['nom_car_sol'] ?>" />
						</div>

						<div class="form-group">
							<label class="login_label2">Numero Personas solicitadas:</label>
							<input type="text" class="form-control input-small" name="num_per_car_sol" value="<?php echo $datos[0]['num_per_car_sol'] ?>"/>
						</div>

						<div style="clear:both"></div>

						<div class="form-group">
							<label class="login_label2">DESCRIPCIÓN DE LA SOLICITUD: Cúal  es la razón principal por la cual se está solcitando el nuevo cargo?</label>
							<textarea name="desc_car_sol"> <?php echo $datos[0]['desc_car_sol'] ?></textarea>
						</div>


					</div>
				  	<!--Fin pcargo-->
				
			
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
				  <div style="clear:both"></div>
				  <!--Fin administrativos-->
					<!--codigo del jefe-->
					<input type="hidden" name="cod_jefe" value="<?php echo $cod_jefe; ?>" id="cod_jefe" />
					<!--Codigos del formulario de pestañas-->
					<input type="hidden" name="cod_resp" value="<?php echo $datos[0]['cod_resp'] ?>"  />
					<input type="hidden" name="cod_rel" value="<?php echo $datos[0]['cod_rel'] ?>"  />
					<input type="hidden" name="id_form" value="<?php echo $datos[0]['id_form'] ?>"  />
					<!--Inicio del boton adjuntar-->
					<div class="form-group">
						<div class="btn-form2 btn-form3"><button type="button"  class="btn btn-primary" id="cancelar_cargoBtn">Devolver</button></div>
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