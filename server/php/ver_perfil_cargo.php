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
				  <li><a href="#habilidades" data-toggle="tab">Habilidades y Actitudes</a></li>
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
						<p class="p_justifica_cargo">Haga una s�ntesis general del trabajo bas�ndose en: �Qu� se hace? (acci�n) �C�mo se hace? (m�todo) y �Para qu� se hace? (resultado esperado)</p>
						<p><br></p>
						<div class="form-group">
							<label class="login_label control-label">�Qu� hace?</label>
							<textarea name="cargo_hace"><?php echo $datos[0]['q_hace']?></textarea>
						</div>
						
						<div class="form-group">
							<label class="login_label control-label">�Como se hace?</label>
							<textarea name="cargo_como"><?php echo $datos[0]['c_hace']?></textarea>
						</div>
						
						<div class="form-group">
							<label class="login_label control-label">�Para qu� se haceis?</label>
							<textarea name="cargo_para"><?php echo $datos[0]['p_hace']?></textarea>
						</div>
					
					
					</div>
				<!--Fin proposito-->
				
				<!--Inicio principales-->
					<div class="tab-pane" id="principales">
						<div class="envolver_justificacion">
								<p class="p_justifica_cargo">Enuncie las principales funciones �Que se hace?(accion) �como se hace?(m�todo) y �para qu� se hace?(resultado esperado), especificando el 
								porcentaje (%) de tiempo que le toma esa funci�n, dentro del total de funciones del cargo.</p>
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
									<label class="login_label control-label">�Qu� hace?</label>
									<textarea name="funcion1[]"><?php echo $datos2[$j]['q_hace']?></textarea>
								</div>
								<div class="form-group">
									<label class="login_label control-label">�Como se hace?</label>
									<textarea name="funcion2[]"><?php echo $datos2[$j]['c_hace']?></textarea>
								</div>
								<div class="form-group">
									<label class="login_label control-label">�Para qu� se hace?</label>
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
							<p class="p_justifica_cargo">Describa las relaciones m�s importantes con las otras �reas y especifique si la relaci�n es de (a) Cliente (b) Proveedor <a href="#"  id="area">Agregar Area</a></p>		
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
										<label class="login_label control-label"><span class="numero"><?php echo $contador;?></span> �rea:</label>
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
				
				 <!--Inicio id habilidades-->
				  <div class="tab-pane" id="habilidades">
						<p>Enumere en orden de importancia las habilidades y las actitudes que el candidato debe tener</p>
						 <div class="envolver"> <!--Inicio de la pesta�a envolver-->
							 <h5>Habilidades</h5>
							 <div class="bloque1">
							  
								 <label class="checkbox">
								  <input type="checkbox" name="habilidades[]" value="administracion">
								  Administraci�n
								 </label>
								
								<label class="checkbox">
								  <input type="checkbox" name="habilidades[]"  value="analitica">
								  Capacidad Anal�tica
								</label>
								<label class="checkbox">
								  <input type="checkbox"  name="habilidades[]"  value="escrita" >
								  Comunicaci�n escrita
								</label>
								<label class="checkbox">
								  <input type="checkbox" name="habilidades[]" value="presion">
								  Trabajo bajo presi�n
								</label>
							</div>
							<div class="bloque1">
								 <label class="checkbox">
								  <input type="checkbox" name="habilidades[]" value="oral">
								  Comunicaci�n Oral
								 </label>
								
								<label class="checkbox">
								  <input type="checkbox" name="habilidades[]" value="liderazgo">
								  Liderazgo
								</label>
								<label class="checkbox">
								  <input type="checkbox" name="habilidades[]" value="negociacion">
								  Negociaci�n
								</label>
							</div>
						</div><!--Fin de la pesta�a envolver-->
						
						<div class="envolver"> <!--Inicio de la pesta�a envolver-->
							 <h5>Actitudes</h5>
							 <div class="bloque1">
							  
								 <label class="checkbox">
								  <input type="checkbox" name="habilidades[]" value="adtitud_cambio">
								 Adtitudes al cambio
								 </label>
								
								<label class="checkbox">
								  <input type="checkbox" name="habilidades[]" value="iniciativa">
								  Iniciativa/c reatividad
								</label>
								<label class="checkbox">
								  <input type="checkbox" name="habilidades[]" value="motivacion">
								  Motivaci�n 
								</label>
								<label class="checkbox">
								  <input type="checkbox" name="habilidades[]" value="otros1">
								  Otros
								</label>
							</div>
							<div class="bloque1">
								 <label class="checkbox">
								  <input type="checkbox" name="habilidades[]" value="responsabilidad">
								  Responsabilidad
								 </label>
								
								<label class="checkbox">
								  <input type="checkbox" name="habilidades[]" value="trabajo_equipo">
								 Trabajo en equipo
								</label>
								<label class="checkbox">
								  <input type="checkbox" name="habilidades[]" value="otros2">
								  Otros
								</label>
							</div>
						</div><!--Fin de la pesta�a envolver-->
				  
				  
				  
				  </div>
				  <!--Fin id habilidades-->
				  
				  <!--Inicio justificacion-->
				  <div class="tab-pane" id="justificacion">
				  
					<div class="envolver_justificacion">
						<p class="p_justifica_cargo">Enuncie las razones principales del nuevo cargo, explicando con DATOS de productividad cu�les actividades diarias est�n sin atenderse
						   por falta de mano obra, o cu�les est�n siendo atendidas con mano de obra extra. Tenga en cuenta y describa los siguientes parametros:</p>
						<p class="p_justifica_cargo_n">Comparativo entre n�mero actual de procedimientos, valor venta a�o anterior. Valor venta actua, utilidad operacional. Margen operacional. Margen de utilidad
						   operacional. N�mero de personas con el mismo cargo.</p>
						   
						   <div class="titulo_tabla">Para Procesos Cl�nicos: (Datos Cuadro de Manto integral/ Aplicativo SIAM)</div>
						   <div  class="reducir_tabla">
							   <table class="table table-bordered">
									<th>PARAMETRO</th>
									<th>DATO A�O 2011</th>
									<th>DATO A�O 2012</th>
									<th>%CUMPLIMIENTO DE LA META EN 2012</th>
									<tr>
										<td>N�mero de Pacientes</td>
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
										<td>N�mero de procedimientos</td>
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
							<p class="p_justifica_cargo">N�mero de personas en el mismo cargo: Atividades no atendidas por falta de mano de obra, Impacto:</p>
							<p class="p_justifica_cargo">�ndice de gasto administrativo:</p>
							<div  class="reducir_tabla">
								<table class="table table-bordered">
									<th>PARAMETRO</th>
									<th>DATO A�O 2011</th>
									<th>DATO A�O 2012</th>
									<th>%CUMPLIMIENTO DE LA META EN 2012</th>
									<tr>
										<td>N�mero de Personas en el mismo cargo</td>
										<td><input class="input-mini" type="text" name="personas_cargo1" value="<?php echo $datos[0]['num_per_dato_1']?>"></td>
										<td><input class="input-mini" type="text" name="personas_cargo2" value="<?php echo $datos[0]['num_per_dato_2']?>"></td>
										<td><input class="input-large" type="text" name="cumplir_meta6" value="<?php echo $datos[0]['num_per_cumplir']?>"></td>
									</tr>
									<tr>
										<td>�ndice de gastos administrativos</td>
										<td><input class="input-mini" type="text" name="gastos_administrativos1" value="<?php echo $datos[0]['indi_gasto_dato_1']?>" ></td>
										<td><input class="input-mini" type="text" name="gastos_administrativos2" value="<?php echo $datos[0]['indi_gasto_dato_2']?>"></td>
										<td><input class="input-large" type="text" name="cumplir_meta7" value="<?php echo $datos[0]['indi_gasto_cumplir']?>"></td>
									</tr>
									<tr>
										<td>Presupuesto total del �rea</td>
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
					<!--codigo del jefe-->
					<input type="hidden" name="cod_jefe" value="<?php echo $cod_jefe; ?>" id="cod_jefe" />
					<!--Codigos del formulario de pesta�as-->
					<input type="hidden" name="cod_resp" value="<?php echo $datos[0]['cod_resp'] ?>"  />
					<input type="hidden" name="cod_rel" value="<?php echo $datos[0]['cod_rel'] ?>"  />
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