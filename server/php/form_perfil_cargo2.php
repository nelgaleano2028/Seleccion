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
							<input type="text" class="form-control" name="nom_car_sol" />
						</div>

						<div class="form-group">
							<label class="login_label2">Numero Personas solicitadas:</label>
							<input type="text" class="form-control input-small" name="num_per_car_sol" />
						</div>

						<div style="clear:both"></div>

						<div class="form-group">
							<label class="login_label2">DESCRIPCIÓN DE LA SOLICITUD: Cúal  es la razón principal por la cual se está solcitando el nuevo cargo?</label>
							<textarea name="desc_car_sol"></textarea>
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
										<td><input class="input-mini" type="text" name="numero_pacientes1"></td>
										<td><input class="input-mini" type="text" name="numero_pacientes2"></td>
										<td><input class="input-large" type="text" name="cumplir_meta1"></td>
									</tr>
									<tr>
										<td>Valor de la ventas</td>
										<td><input class="input-mini" type="text" name="numero_ventas1"></td>
										<td><input class="input-mini" type="text" name="numero_ventas2"></td>
										<td><input class="input-large" type="text" name="cumplir_meta2"></td>
									</tr>
									<tr>
										<td>Número de procedimientos</td>
										<td><input class="input-mini" type="text" name="numero_procedimientos1"></td>
										<td><input class="input-mini" type="text" name="numero_procedimientos2"></td>
										<td><input class="input-large" type="text" name="cumplir_meta3"></td>
									</tr>
									<tr>
										<td>Utilidad Neta</td>
										<td><input class="input-mini" type="text" name="utilidad_neta1"></td>
										<td><input class="input-mini" type="text" name="utilidad_neta2"></td>
										<td><input class="input-large" type="text" name="cumplir_meta4"></td>
									</tr>
									<tr>
										<td>Costos y Gastos</td>
										<td><input class="input-mini" type="text" name="costos_gastos1"></td>
										<td><input class="input-mini" type="text" name="costos_gastos2"></td>
										<td><input class="input-large" type="text" name="cumplir_meta5"></td>
									</tr>
									<tr>
										<td colspan="4">Impacto esperado con el nuevo cargo:
											<textarea rows="3" cols="50" name="Impacto_esperado"></textarea>
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
										<td><input class="input-mini" type="text" name="personas_cargo1"></td>
										<td><input class="input-mini" type="text" name="personas_cargo2"></td>
										<td><input class="input-large" type="text" name="cumplir_meta6"></td>
									</tr>
									<tr>
										<td>Índice de gastos administrativos</td>
										<td><input class="input-mini" type="text" name="gastos_administrativos1"></td>
										<td><input class="input-mini" type="text" name="gastos_administrativos2"></td>
										<td><input class="input-large" type="text" name="cumplir_meta7"></td>
									</tr>
									<tr>
										<td>Presupuesto total del área</td>
										<td><input class="input-mini" type="text" name="presupuesto_area1"></td>
										<td><input class="input-mini" type="text" name="presupuesto_area2"></td>
										<td><input class="input-large" type="text" name="cumplir_meta8"></td>
									</tr>
									<tr>
										<td colspan="4"><p>Actividades no atendidas hoy por el proceso,</p>
											<p>por falta de mano de obra:</p><textarea rows="3" cols="50" name="actividades_no"></textarea>
											
										</td>
									</tr>
									
									<tr>
										<td colspan="4">Impacto esperado con el nuevo cargo:
											<textarea rows="3" cols="50" name="Impacto_esperado2"></textarea>
										</td>
									</tr>
									
							   </table>
							</div>
							
							<div style="clear:both"></div>
						</div>
				  </div>
				  <!--Fin administrativos-->
				  <div style="clear:both"></div>
					<!--codigo del jefe-->
					<input type="hidden" name="cod_jefe" value="<?php echo $cod_jefe; ?>" id="cod_jefe" />
					<!--Inicio del boton adjuntar-->
					<div class="form-group">
						<div class="btn-form2 btn-form3"><button type="submit"  class="btn btn-primary" id="personas_cargoBtn">Adjuntar</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button"  class="btn btn-primary" id="cancelar_cargoBtn">Cancelar</button></div>
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
	
	
	<!--<script src="../../js/perfil_cargo.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>-->

</body>
</html>