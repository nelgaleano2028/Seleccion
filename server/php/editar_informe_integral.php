<?php session_start();
date_default_timezone_set('America/Bogota');
require_once('class_utilidades.php');
require_once('class_empleado.php');

$obj= new Empleado();

$objtable2= new Empleado();

$datos=$obj->aspirante_integral($_GET['cedula']);

$datostable2=$objtable2->aspirante_integral2($_GET['cedula']);

$obj2= new Empleado();

$datos2= $obj2->cargos();

$obj4= new Empleado();

$datos4= $obj4->competencias_informe();

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
		<!--Inicio estirar_form2-->
		<div class="estirar_form2">
			
			<form id="imforme_integral" method="post">
			<!--Inicio class cambia-->
			<div class="cambia">
				<ul class="nav nav-tabs">
				  <li class="active"><a href="#general" data-toggle="tab">Info General</a></li>
				  <li><a href="#entrevista" data-toggle="tab">Entrevista Psicosocial</a></li>
				  <li><a href="#atencion" data-toggle="tab">Atencion al Detalle</a></li>
				  <li><a href="#laboral" data-toggle="tab">Modalidad Laboral</a></li>
				  <li><a href="#afectivo" data-toggle="tab">Nivel Afectivo</a></li>
				  <li><a href="#relacional" data-toggle="tab">Plano Relacional</a></li>
				  <li><a href="#aprendizaje" data-toggle="tab">Estilo Aprendizaje</a></li>
				  <li><a href="#referenciaslaborales" data-toggle="tab">Referencias Laborales</a></li>
				  <li><a href="#correlacion" data-toggle="tab">Correlación al cargo</a></li>
				  
				</ul>
				
				<!--Inicio tab-content-->
				<div class="tab-content">
					
				
					<!--Inicio general-->
					<div class="tab-pane active" id="general">
						<table border="1" style="width: 100%;">
							<tr>
								<td  style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">NOMBRE:</td>
								<td><input type="input"  style="width:200px" name="nom_asp" value="<?php echo @$datos['nombre_asp'];?>" readonly></td>
								<td style="font-weight:bold; background-color:rgb(201, 201, 201); " align="center">APELLIDOS:</td>
								<td><input type="input"  style="width:200px" name="ape_asp" value="<?php echo $datos['apellido_asp'];?>" readonly></td>
							</tr>
							<tr>
								<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">EDAD</td>
								<td ><input type="input"  style="width:200px" name="edad" value="<?php echo $datos['edad'];?>" readonly ></td>
								<td style="font-weight:bold; background-color:rgb(201, 201, 201); " align="center">IDENTIFICACION</td>
								<td><input type="input"  style="width:200px" id="identificacion" name="identificacion" value="<?php echo $datos['identificacion'];?>"  readonly ></td>
																		
							</tr>
							<tr>
								<td style="font-weight:bold; background-color:rgb(201, 201, 201); " align="center">ESTADO CIVIL</td>
								<td><input type="input"  style="width:200px" name="estado_civil" value="<?php echo @$datos['estado_civil']; ?>" readonly ></td>
								<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">CARGO</td>
								<td ><select name="cargo"> 

										
										
										<option value="<?php echo @$datos['cargo']; ?> "><?php echo @$datos['cargo']; ?> </option>
										<option value="">Seleccione... </option>
										
										<?php for($i=1; $i< count($datos2); $i++){

												if(@$datos['cargo'] !=  @$datos2['nom_car'] ){
											?>

											<option value="<?php echo @$datos2['cod_cargo']; ?> "><?php echo @$datos2['nom_car']; ?> </option>

										<?php }

											}
										?>
									</select>
								</td>
																		
							</tr>
							<tr>
								<td style="font-weight:bold; background-color:rgb(201, 201, 201); " align="center"></td>
																
							</tr>
							<tr>
								<td colspan="4" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center"> RESULTADOS PRUEBAS PSICOMETRICAS</td>																
							</tr>
							<tr>
								<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">TEST BG3</td>
								<td ><input type="input"  style="width:200px" name="bg3"  value="<?php echo @$datos['bg3']; ?>" readonly /></td>
								<td style="font-weight:bold; background-color:rgb(201, 201, 201); " align="center">CMT</td>
								<td><input type="input"  style="width:200px" name="cmt" value="<?php echo @$datos['cmt']; ?>"  id="cmt"  ></td>
																		
							</tr>
							<tr>
								<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">CUADRADO DE LETRAS</td>
								<td ><input type="input"  style="width:200px" name="letras" value="<?php echo @$datos['letras']; ?>" readonly ></td>
								<td style="font-weight:bold; background-color:rgb(201, 201, 201); " align="center">TEMPERAMENTO</td>
								<td><input type="input"  style="width:200px" name="temp" value="<?php echo @$datos['temp']; ?>" readonly ></td>
																		
							</tr>
							<tr>
								<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">CARAS</td>
								<td ><input type="input"  style="width:200px" name="caras" value="<?php echo @$datos['caras']; ?>" readonly ></td>
								<td style="font-weight:bold; background-color:rgb(201, 201, 201); " align="center">ESTILO DE APRENDIZAJE</td>
								<td><input type="input"  style="width:200px" name="aprendizaje" value="<?php echo @$datos['aprendizaje']; ?>"  readonly ></td>
																		
							</tr>
							<tr>
								<td colspan="2" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">PRUEBA DE CONOCIMIENTO</td>
								<td colspan="2"><input type="input"  style="width:200px" name="conocimiento" value="<?php echo @$datos['conocimiento']; ?>"  class="promedio" ></td>
								
								
								
							</tr>
							
						</table>							
						
				    </div>
				  	<!--Fin general-->

				  <!--Inicio entrevista-->
				  <div class="tab-pane" id="entrevista">
				  
						<div style="float:left; width:100%; margin-top:10px">
							<span style="font-weight:bold">OBSERVACION</span><br><br>
							<textarea style=" resize: none; width:800px"  class="observacion_psico" name="observacion_psico" cols="90" rows="9"><?php echo @$datos['observacion_psico']; ?></textarea>		
						</div>
						
				  </div>
				  <!--Fin entrevista-->
				  
				   <!--Inicio atencion-->
				  <div class="tab-pane" id="atencion">

							<div style="float:left; width:50%;">
								<span style="font-weight:bold">OBSERVACIONES</span><br><br>
								<textarea style=" resize: none;  width:400px" name="observacion_1" cols="90" rows="9"><?php echo @$datos['observacion_1']; ?></textarea>							
							</div>
							
							<div style="float:left; width:50%; padding-top:40px">
								<table border="2">
									<tr>
										<td style="font-weight:bold; background-color:rgb(201, 201, 201)" align="center">COMPETENCIAS</td>
										<td style="font-weight:bold; background-color:rgb(201, 201, 201)">PUNTUACION</td>
									</tr>
									<tr>
										<td style="font-weight:bold; font-size:12px" align="left">Atencion Focalizada</td>
										<td align="center"><input type="input" style="width:50px" name="valor_1_1" class="10"  maxlength="1" value="<?php echo @$datos['valor_1_1']; ?>" onKeyPress="return validarnum(event)" ></td>
									</tr>
									<tr>
										<td style="font-weight:bold; font-size:12px" align="left">Atencion Selectiva</td>
										<td align="center"><input type="input" style="width:50px" name="valor_2_1" class="20"  maxlength="1" value="<?php echo @$datos['valor_2_1']; ?>" onKeyPress="return validarnum(event)" ></td>
									</tr>
									<tr>
										<td style="font-weight:bold; font-size:12px" align="left">Agilidad Procesamiento<br> Informacion</td>
										<td align="center"><input type="input" style="width:50px" name="valor_3_1" class="30"  maxlength="1" value="<?php echo @$datos['valor_3_1']; ?>"  onKeyPress="return validarnum(event)" ></td>
									</tr>
									<tr>
										<td style="font-weight:bold; font-size:12px" align="center">Promedio Total</td>
										<td align="center"><input type="input" readonly style="width:50px" name="prom_total" class="promedio1"  maxlength="1" value="<?php echo @$datos['promedio_1'];?>" ></td>
									</tr>
								</table> 
							</div>
							
							
							<!--Inicio Estadistica-->
							<div style="float:left; width:100%; margin-top:30px" id="contenedor1">
								
							
							</div>
							<!--Fin Estadistica-->

					
						
				  </div>
				  <!--Fin atencion-->
				  
				   <!--Inicio laboral-->
				  <div class="tab-pane" id="laboral">
					
								
						<div style="float:left; width:50%;">
							<span style="font-weight:bold">OBSERVACIONES</span><br><br>
							<textarea style=" resize: none; width:400px"  name="observacion_2" cols="90" rows="9"><?php echo @$datos['observacion_2']; ?></textarea>							
						</div>
						
						<div style="float:left; width:50%; padding-top:40px">
							<table border="2">
								<tr>
									<td style="font-weight:bold; background-color:rgb(201, 201, 201)" align="center">COMPETENCIAS</td>
									<td style="font-weight:bold; background-color:rgb(201, 201, 201)">PUNTUACION</td>
								</tr>
								<tr>
									<td style="font-weight:bold; font-size:12px" align="left"><select name="comp_uno_laboral"> 
										<option value="<?php echo @$datos['comp_uno_laboral']; ?> "><?php echo @$datos['comp_uno_laboral']; ?> </option>
										<option value="">Seleccione... </option>
										<?php for($i=1; $i< count($datos4); $i++){
										
												if(@$datos4[$i]['nombre_comp'] != @$datos['comp_uno_laboral']){
											?>
										

											<option value="<?php echo @$datos4[$i]['nombre_comp']; ?> "><?php echo @$datos4[$i]['nombre_comp']; ?> </option>

										<?php 
												}
											}
										?>
									
									</select></td>
									<td align="center"><input type="input" style="width:50px" name="valor_1_2" value="<?php echo @$datos['valor_1_2']; ?>" class="40" value="0" maxlength="1" onKeyPress="return validarnum(event)" ></td>
								</tr>
								<tr>
									<td style="font-weight:bold; font-size:12px" align="left"><select name="comp_dos_laboral"> 
										<option value="<?php echo @$datos['comp_dos_laboral']; ?> "><?php echo @$datos['comp_dos_laboral']; ?> </option>
										<option value="">Seleccione... </option>
										<?php for($i=1; $i< count($datos4); $i++){
										
												if(@$datos4[$i]['nombre_comp'] != @$datos['comp_dos_laboral']){
											?>
										

											<option value="<?php echo @$datos4[$i]['nombre_comp']; ?> "><?php echo @$datos4[$i]['nombre_comp']; ?> </option>

										<?php 
												}
											}
										?>
									
									</select></td>
									<td align="center"><input type="input" style="width:50px" name="valor_2_2" value="<?php echo @$datos['valor_2_2']; ?>" class="50" value="0" maxlength="1" onKeyPress="return validarnum(event)" ></td>
								</tr>
								<tr>
									<td style="font-weight:bold; font-size:12px" align="left"><select name="comp_tres_laboral"> 
										<option value="<?php echo @$datos['comp_tres_laboral']; ?> "><?php echo @$datos['comp_tres_laboral']; ?> </option>
										<option value="">Seleccione... </option>
										<?php for($i=1; $i< count($datos4); $i++){
										
												if(@$datos4[$i]['nombre_comp'] != @$datos['comp_tres_laboral']){
											?>
										

											<option value="<?php echo @$datos4[$i]['nombre_comp']; ?> "><?php echo @$datos4[$i]['nombre_comp']; ?> </option>

										<?php 
												}
											}
										?>
									
									</select></td>
									<td align="center"><input type="input" style="width:50px" name="valor_3_2" class="60" value="<?php echo @$datos['valor_3_2']; ?>"  maxlength="1" onKeyPress="return validarnum(event)" ></td>
								</tr>
								<tr>
									<td style="font-weight:bold; font-size:12px" align="center">Promedio Total</td>
									<td align="center"><input type="input" readonly style="width:50px" name="promedio_total_2" class="promedio2" value="<?php echo @$datos['promedio_2']; ?>" maxlength="1" ></td>
								</tr>
							</table> 
						</div>
						
						
					
						<!--Inicio Estadistica-->
						<div style="float:left; width:100%; margin-top:30px" id="contenedor2">
							
						
						</div>
						<!--Fin Estadistica-->


				  </div>
				  <!--Fin Laboral-->
				  <!--Inicio afectivo-->
				  <div class="tab-pane" id="afectivo">
					 
								
								<div style="float:left; width:50%;">
									<span style="font-weight:bold">OBSERVACIONES</span><br><br>
									<textarea style=" resize: none;  width:400px" name="observacion_3" cols="90" rows="9"><?php echo @$datos['observacion_3']; ?></textarea>							
								</div>
								
								<div style="float:left; width:50%; padding-top:40px">
									<table border="2">
										<tr>
											<td style="font-weight:bold; background-color:rgb(201, 201, 201)" align="center">COMPETENCIAS</td>
											<td style="font-weight:bold; background-color:rgb(201, 201, 201)">PUNTUACION</td>
										</tr>
										<tr>
											<td style="font-weight:bold; font-size:12px" align="left">Estabilidad Emocional</td>
											<td align="center"><input type="input" style="width:50px" name="valor_1_3" class="70" value="<?php echo @$datos['valor_1_3']; ?>" maxlength="1" onKeyPress="return validarnum(event)" ></td>
										</tr>
										<tr>
											<td style="font-weight:bold; font-size:12px" align="left">Restablecimiento</td>
											<td align="center"><input type="input" style="width:50px" name="valor_2_3" class="80" value="<?php echo @$datos['valor_2_3']; ?>" maxlength="1" onKeyPress="return validarnum(event)" ></td>
										</tr>
										<tr>
											<td style="font-weight:bold; font-size:12px" align="left">Tolerancia al estres</td>
											<td align="center"><input type="input" style="width:50px" name="valor_3_3" class="90" value="<?php echo @$datos['valor_3_3']; ?>" maxlength="1" onKeyPress="return validarnum(event)" ></td>
										</tr>
										<tr>
											<td style="font-weight:bold; font-size:12px" align="center">Promedio Total</td>
											<td align="center"><input type="input" readonly style="width:50px" name="prom_total_3" class="promedio3" value="<?php echo @$datos['promedio_3']; ?>" maxlength="1" ></td>
										</tr>
									</table> 
								</div>
								
								

						<!--Inicio Estadistica-->
						<div style="float:left; width:100%; margin-top:30px" id="contenedor3">
							
						
						</div>
						<!--Fin Estadistica-->
				  
				  </div>
				 <!--Fin afectivo-->
				 
				 <!--Inicio relacional-->
				 <div class="tab-pane" id="relacional">
				
								<div style="float:left; width:50%;">
									<span style="font-weight:bold">OBSERVACIONES</span><br><br>
									<textarea style=" resize: none; width:400px" name="observacion_4" cols="90" rows="9"><?php echo @$datos['observacion_4']; ?></textarea>							
								</div>
								
								<div style="float:left; width:50%; padding-top:40px">
									<table border="2">
										<tr>
											<td style="font-weight:bold; background-color:rgb(201, 201, 201)" align="center">COMPETENCIAS</td>
											<td style="font-weight:bold; background-color:rgb(201, 201, 201)">PUNTUACION</td>
										</tr>
										<tr>
											<td style="font-weight:bold; font-size:12px" align="left">Establecimiento de <br> relaciones</td>
											<td align="center"><input type="input" style="width:50px" class="100" name="valor_1_4" value="<?php echo @$datos['valor_1_4']; ?>" maxlength="1" onKeyPress="return validarnum(event)" ></td>
										</tr>
										<tr>
											<td style="font-weight:bold; font-size:12px" align="left">Comunicacion</td>
											<td align="center"><input type="input" style="width:50px" class="110" name="valor_2_4" value="<?php echo @$datos['valor_2_4']; ?>" maxlength="1" onKeyPress="return validarnum(event)" ></td>
										</tr>
										<tr>
											<td style="font-weight:bold; font-size:12px" align="left">Trabajo en Equipo</td>
											<td align="center"><input type="input" style="width:50px" class="120"  name="valor_3_4" value="<?php echo @$datos['valor_3_4']; ?>" maxlength="1" onKeyPress="return validarnum(event)" ></td>
										</tr>
										<tr>
											<td style="font-weight:bold; font-size:12px" align="center">Promedio Total</td>
											<td align="center"><input type="input" readonly style="width:50px" class="promedio4" value="<?php echo @$datos['promedio_4']; ?>" name="promedio_total_4"  maxlength="1" ></td>
										</tr>
									</table> 
								</div>
								

						<!--Inicio Estadistica-->
						<div style="float:left; width:100%; margin-top:30px" id="contenedor4">
							
						
						</div>
						<!--Fin Estadistica-->

				 </div>
				<!--Fin relacional-->
				
				
				<!--******TAB CORRELACION*****-->
				<div class="tab-pane" id="correlacion">

					<div style="float:left; width:50%;">
						<span style="font-weight:bold">FORTALEZAS FRENTE AL CARGO</span><br><br>
						<textarea style=" resize: none; width:300px" name="observacion_6" cols="90" rows="9"><?php echo @$datos['observacion_6']; ?></textarea>							
					</div>
					
					<div style="float:left; width:50%;">
						<span style="font-weight:bold">ASPECTOS A MEJORAR FRENTE AL CARGO</span><br><br>
						<textarea style=" resize: none; width:300px" name="observacion_7"  cols="90" rows="9"><?php echo @$datos['observacion_7']; ?></textarea>	
					</div>
					
						<!--Inicio Estadistica-->
						<div style="float:left; width:100%; margin-top:30px" id="contenedor5">
							
						
						</div>
						<!--Fin Estadistica-->

					 <div style="clear:both"></div>
					
				<!--Inicio del boton editar-->
					<div class="form-group">
						<input type="hidden" name="id" value="<?php echo $datos['id']; ?>" />
						<div class="btn-form2 btn-form3"><input type="button" class="btn btn-primary" id="editar_informe" value="Editar"/>&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="button" class="btn btn-primary" id="calcular_informe" value="Calcular"/>
						</div>
					</div>


				</div>  
			
				
                <!--Inicio aprendizaje-->
				<div class="tab-pane" id="aprendizaje">

					<div style="float:left; width:100%; margin-top:10px">
						<span style="font-weight:bold">OBSERVACION</span><br><br>
						<textarea style=" resize: none; width:800px" name="observacion_5" cols="90" rows="9"><?php echo @$datos['observacion_5']; ?></textarea>		
					</div>
					
						<!--Inicio Estadistica-->
						<div style="float:left; width:100%; margin-top:30px" id="contenedor5">
							
						
						</div>
						<!--Fin Estadistica-->

					 <div style="clear:both"></div>
					
					
					<!--Fin del boton editar-->

				</div>  
				 <!--Fin aprendizaje--> 
				  
				 
				 
				 
				 <!--TAB DE REFERENCIAS LABORALES NEW-->



				 
				 
				  <div class="tab-pane" id="referenciaslaborales">
				  
				  
				  <input type="hidden" id="idcandidatolab" style="height: 29px;" value="<?php echo $datostable2['id'];?>">
				  
				  
				  
				  
					<h3>Formato de Verificación de las Referencias</h3>
					<div style="float:left; width:100%; margin-top:10px">
						
						Nombre del Canditado:&nbsp;<input type="text" id="nombrecandidato" style="height: 29px;" value="<?php echo $datostable2['nombre_cand'];?>" readonly>
						
						
						Cargo al que aspira:&nbsp;
						<select name="cargo"> 
										<option value="<?php echo @$datostable2['cargo_asp']; ?> "><?php echo @$datos['cargo']; ?> </option>
										<option value="">Seleccione... </option>
										
										<?php for($i=1; $i< count($datos2); $i++){

												if(@$datos['cargo'] !=  @$datos2['nom_car'] ){
											?>

											<option value="<?php echo @$datos2['nom_car']; ?> "><?php echo @$datos2['nom_car']; ?> </option>

										<?php }

											}
										?>
									</select>
						
						
						Fecha:&nbsp;<input type="text" id="fecharlb" value="<?php echo @$datostable2['fecha']; ?>" style="height: 29px;">
						
						
						<input type="hidden" id="cos_asprefperosonal" value="<?php echo @$datostable2['cod_asp']; ?>">
						
					</div>
					<br /><br /><br />
					
					<div style="float:left; width:100%; margin-top:10px;  background-color: rgb(213, 213, 213);"><center><h4><u>Referencias Laborales #1</u></h4></center></div><br /><br /><br />
					
					
					
					<!--EMPIEZA LA PRIMERA EMPRESA-->
					
						<div style="float:left; width:100%; margin-top:10px">
							
							Organización #1:&nbsp;<input type="text" id="organizacion1" style="height: 29px;" value="<?php echo @$datostable2['organizacion_1']; ?> ">
							
							
							Telefono:&nbsp;<input type="text" id="telefono1" style="height: 29px;width: 131px;" value="<?php echo @$datostable2['telefonono_1']; ?> ">
							
							Referido por:&nbsp;<input type="text" id="referido1" style="height: 29px;width: 174px;" value="<?php echo @$datostable2['referido_1']; ?> ">
							
							Cargo:&nbsp;<input type="text" id="cargo1" style="height: 29px;width: 174px;" value="<?php echo @$datostable2['cargo_1']; ?> ">
							
							<br /><br />
							
							<h4>Cargo del candidato:</h4><br />
							
							Funciones Realizadas:&nbsp;<br /><textarea class="form-control" rows="3" style="width: 294px;" id="funcionesr1"><?php echo @$datostable2['funciones_1']; ?></textarea>
							
							
							Tiempo Laborado:&nbsp;<input type="text" id="tiempol1" style="height: 29px;width: 174px;" value="<?php echo @$datostable2['tiempol_1']; ?> ">
							
							Motivo de Retiro:&nbsp;<textarea class="form-control" rows="3" style="width: 294px;" id="motivore1"><?php echo @$datostable2['motivore_1']; ?> </textarea>
							
							
							<br /><br /><br />
					
					<div style="float:left; width:100%; margin-top:10px;  background-color: rgb(213, 213, 213);"><h5><u>Puntajes</u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1: Comp. no presente&nbsp;&nbsp;&nbsp;2: Comp. Nivel mínimo&nbsp;&nbsp;&nbsp;3. Comp. Nivel requerido&nbsp;&nbsp;&nbsp;4. Comp. Nivel superior</h5></div><br /><br /><br />
							
					
							<div style="float:left; width:50%; margin-top:10px;  background-color: rgb(213, 213, 213);">
							
							<center><b>Evalue</b></center>
							
							</div>
							
							<div style="float:left; width:50%; margin-top:10px;  background-color: rgb(213, 213, 213);">
							
							<center><b>Puntaje Org</b></center>
							
							</div><br /><br />
							
							<!--******preguntas1*****-->
						
							<div style="float:left; width:50%; margin-top:10px;">
								
						
							
							<p style="font-size: 24px;">Siguió las instrucciones para el cargo</p>
						
							
							</div>
							
							<div style="float:left; width:50%; margin-top:10px;">
							
							<select class="form-control" id="puntaje1">
							<option value="<?php echo @$datostable2['puntaje_1']; ?> "><?php echo @$datostable2['puntaje_1']; ?> </option>
							<option value="">Seleccione...</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							
							</select>
							
							</div><br />
							
							
							
							<!--******preguntas2*****-->
						
							<div style="float:left; width:50%; margin-top:10px;">
								
						
							
							<p style="font-size: 24px;">Desarrolló completamente sus funciones</p>
						
							
							</div>
							
							<div style="float:left; width:50%; margin-top:10px;">
							
							<select class="form-control" id="puntaje2">
							<option value="<?php echo @$datostable2['puntaje_2']; ?> "><?php echo @$datostable2['puntaje_2']; ?> </option>
							<option value="">Seleccione...</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							
							</select>
							
							</div><br />
							
							
							<!--******preguntas3*****-->
						
							<div style="float:left; width:50%; margin-top:10px;">
								
						
							
							<p style="font-size: 24px;">Se relacionó con los compañeros laborales</p>
						
							
							</div>
							
							<div style="float:left; width:50%; margin-top:10px;">
							
							<select class="form-control" id="puntaje3">
							<option value="<?php echo @$datostable2['puntaje_3']; ?> "><?php echo @$datostable2['puntaje_3']; ?> </option>
							<option value="">Seleccione...</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							
							</select>
							
							</div><br />
							
							<!--******preguntas4*****-->
						
							<div style="float:left; width:50%; margin-top:10px;">
								
						
							
							<p style="font-size: 24px;">Planeó y organizó sus actividades</p>
						
							
							</div>
							
							<div style="float:left; width:50%; margin-top:10px;">
							
							<select class="form-control" id="puntaje4">
							<option value="<?php echo @$datostable2['puntaje_4']; ?> "><?php echo @$datostable2['puntaje_4']; ?> </option>
							<option value="">Seleccione...</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							
							</select>
							
							</div><br />
							
							
							
							<div style="float:left; width:50%; margin-top:10px;">
								
						
							
							<p style="font-size: 24px;">Aprendió nuevos procedimientos</p>
						
							
							</div>
							
							<div style="float:left; width:50%; margin-top:10px;">
							
							<select class="form-control" id="puntaje5">
							<option value="<?php echo @$datostable2['puntaje_5']; ?> "><?php echo @$datostable2['puntaje_5']; ?> </option>
							<option value="">Seleccione...</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							
							</select>
							
							</div><br />
							
							<div style="float:left; width:50%; margin-top:10px;">
								
						
							
							<p style="font-size: 24px;">Generó iniciativas de trabajo</p>
						
							
							</div>
							
							<div style="float:left; width:50%; margin-top:10px;">
							
							<select class="form-control" id="puntaje6">
							<option value="<?php echo @$datostable2['puntaje_6']; ?> "><?php echo @$datostable2['puntaje_6']; ?> </option>
							<option value="">Seleccione...</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							
							</select>
							
							</div><br />
							
							
							<div style="float:left; width:50%; margin-top:10px;">
								
						
							
							<p style="font-size: 24px;">Manejo situaciones estresantes</p>
						
							
							</div>
							
							<div style="float:left; width:50%; margin-top:10px;">
							
							<select class="form-control" id="puntaje7">
							<option value="<?php echo @$datostable2['puntaje_7']; ?> "><?php echo @$datostable2['puntaje_7']; ?> </option>
							<option value="">Seleccione...</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							
							</select>
							
							</div><br />
						
							
							
							<div style="float:left; width:50%; margin-top:10px;">
								
						
							
							<p style="font-size: 24px;">Propuso soluciones a problemáticas</p>
						
							
							</div>
							
							<div style="float:left; width:50%; margin-top:10px;">
							
							<select class="form-control" id="puntaje8">
							<option value="<?php echo @$datostable2['puntaje_8']; ?> "><?php echo @$datostable2['puntaje_8']; ?> </option>
							<option value="">Seleccione...</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							
							</select>
							
							</div><br />
							
							
							
							
							
							<div style="float:left; width:50%; margin-top:10px;">
								
						
							
							<p style="font-size: 24px;">Califique el desempeño en general</p>
						
							
							</div>
							
							<div style="float:left; width:50%; margin-top:10px;">
							
							<select class="form-control" id="puntajegeneral">
							<option value="<?php echo @$datostable2['puntajegeneral_1']; ?> "><?php echo @$datostable2['puntajegeneral_1']; ?> </option>
							<option value="">Seleccione...</option>
							<option value="exelente">Exelente</option>
							<option value="bueno">Bueno</option>
							<option value="regular">Regular</option>
							<option value="malo">Malo</option>
							
							</select>
							
							</div><br /><br /><br />
							
							
							
							<div style="float:left; width:50%; margin-top:10px;">
								
						
							Aspectos para resaltar del candidato:&nbsp;<textarea class="form-control" rows="3" style="width: 294px;" id="aspectore1"><?php echo @$datostable2['aspectosre_1']; ?></textarea>
							
						
							
							</div>
							
							<div style="float:left; width:50%; margin-top:10px;">
							
							¿Contrataría nuevamente a esta persona?, ¿por qué?:&nbsp;<textarea class="form-control" rows="3" style="width: 294px;" id="contrataria1"><?php echo @$datostable2['contrataria_1']; ?></textarea>
							
							
							
							</div><br />
							
							
							
							<div style="float:left; width:50%; margin-top:10px;">
								
						
							Observaciones:&nbsp;<br /><textarea class="form-control" rows="3" style="width: 294px;" id="observaciones1"><?php echo @$datostable2['observaciones_1']; ?></textarea>
							
						
							
							</div>
							
							<div style="float:left; width:50%; margin-top:10px;">
							
							Verificado por:&nbsp;<br /><textarea class="form-control" rows="3" style="width: 294px;" id="verificadopor1"><?php echo @$datostable2['verificadopo_1']; ?></textarea>
							
							
							
							</div><br />
							
							
							
						</div><!--TERMINA LA PRIMERA EMPRESA-->
						
						
						
						<!--EMPIEZA LA SEGUNDA EMPRESA-->
						
						
						<div style="float:left; width:100%; margin-top:10px"><hr / style="  border-top: 1px solid #000;border-bottom: 1px solid #000;"></div>
					
					<br />
					
					<div style="float:left; width:100%; margin-top:10px;  background-color: rgb(213, 213, 213);"><center><h4><u>Referencias Laborales #2</u></h4></center></div><br /><br /><br />
					
					
					<!----*************************************************************------>
					
					
					
					<!--EMPIEZA LA SEGUNDA EMPRESA-->
					
						<div style="float:left; width:100%; margin-top:10px">
							
							Organización #2:&nbsp;<input type="text" id="organizacion2" style="height: 29px;" value="<?php echo @$datostable2['organizacion_2']; ?>">
							
							
							Telefono:&nbsp;<input type="text" id="telefono2" style="height: 29px;width: 131px;" value="<?php echo @$datostable2['telefonono_2']; ?>">
							
							Referido por:&nbsp;<input type="text" id="referido2" style="height: 29px;width: 174px;" value="<?php echo @$datostable2['referido_2']; ?>">
							
							Cargo:&nbsp;<input type="text" id="cargo2" style="height: 29px;width: 174px;" value="<?php echo @$datostable2['cargo_2']; ?>">
							
							<br /><br />
							
							<h4>Cargo del candidato:</h4><br />
							
							Funciones Realizadas:&nbsp;<br /><textarea class="form-control" rows="3" style="width: 294px;" id="funcionesrea2"><?php echo @$datostable2['funciones_2']; ?></textarea>
							
							
							Tiempo Laborado:&nbsp;<input type="text" id="tiempolb2" style="height: 29px;width: 174px;" value="<?php echo @$datostable2['tiempol_2']; ?>">
							
							Motivo de Retiro:&nbsp;<textarea class="form-control" rows="3" style="width: 294px;" id="motivore2"><?php echo @$datostable2['motivore_2']; ?></textarea>
							
							
							<br /><br /><br />
					
					<div style="float:left; width:100%; margin-top:10px;  background-color: rgb(213, 213, 213);"><h5><u>Puntajes</u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1: Comp. no presente&nbsp;&nbsp;&nbsp;2: Comp. Nivel mínimo&nbsp;&nbsp;&nbsp;3. Comp. Nivel requerido&nbsp;&nbsp;&nbsp;4. Comp. Nivel superior</h5></div><br /><br /><br />
							
					
							<div style="float:left; width:50%; margin-top:10px;  background-color: rgb(213, 213, 213);">
							
							<center><b>Evalue</b></center>
							
							</div>
							
							<div style="float:left; width:50%; margin-top:10px;  background-color: rgb(213, 213, 213);">
							
							<center><b>Puntaje Org</b></center>
							
							</div><br /><br />
							
							<!--******preguntas1*****-->
						
							<div style="float:left; width:50%; margin-top:10px;">
								
						
							
							<p style="font-size: 24px;">Siguió las instrucciones para el cargo</p>
						
							
							</div>
							
							<div style="float:left; width:50%; margin-top:10px;">
							
							<select class="form-control" id="puntaje12">
							<option value="<?php echo @$datostable2['puntaje_21']; ?> "><?php echo @$datostable2['puntaje_21']; ?> </option>
							<option value="">Seleccione...</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							
							</select>
							
							</div><br />
							
							
							
							<!--******preguntas2*****-->
						
							<div style="float:left; width:50%; margin-top:10px;">
								
						
							
							<p style="font-size: 24px;">Desarrolló completamente sus funciones</p>
						
							
							</div>
							
							<div style="float:left; width:50%; margin-top:10px;">
							
							<select class="form-control" id="puntaje22">
							<option value="<?php echo @$datostable2['puntaje_22']; ?> "><?php echo @$datostable2['puntaje_22']; ?> </option>
							<option value="">Seleccione...</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							
							</select>
							
							</div><br />
							
							
							<!--******preguntas3*****-->
						
							<div style="float:left; width:50%; margin-top:10px;">
								
						
							
							<p style="font-size: 24px;">Se relacionó con los compañeros laborales</p>
						
							
							</div>
							
							<div style="float:left; width:50%; margin-top:10px;">
							
							<select class="form-control" id="puntaje32">
							<option value="<?php echo @$datostable2['puntaje_23']; ?> "><?php echo @$datostable2['puntaje_23']; ?> </option>
							<option value="">Seleccione...</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							
							</select>
							
							</div><br />
							
							<!--******preguntas4*****-->
						
							<div style="float:left; width:50%; margin-top:10px;">
								
						
							
							<p style="font-size: 24px;">Planeó y organizó sus actividades</p>
						
							
							</div>
							
							<div style="float:left; width:50%; margin-top:10px;">
							
							<select class="form-control" id="puntaje42">
							<option value="<?php echo @$datostable2['puntaje_24']; ?> "><?php echo @$datostable2['puntaje_24']; ?> </option>
							<option value="">Seleccione...</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							
							</select>
							
							</div><br />
							
							
							
							<div style="float:left; width:50%; margin-top:10px;">
								
						
							
							<p style="font-size: 24px;">Aprendió nuevos procedimientos</p>
						
							
							</div>
							
							<div style="float:left; width:50%; margin-top:10px;">
							
							<select class="form-control" id="puntaje52">
							<option value="<?php echo @$datostable2['puntaje_25']; ?> "><?php echo @$datostable2['puntaje_25']; ?> </option>
							<option value="">Seleccione...</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							
							</select>
							
							</div><br />
							
							<div style="float:left; width:50%; margin-top:10px;">
								
						
							
							<p style="font-size: 24px;">Generó iniciativas de trabajo</p>
						
							
							</div>
							
							<div style="float:left; width:50%; margin-top:10px;">
							
							<select class="form-control" id="puntaje62">
							<option value="<?php echo @$datostable2['puntaje_26']; ?> "><?php echo @$datostable2['puntaje_26']; ?> </option>
							<option value="">Seleccione...</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							
							</select>
							
							</div><br />
							
							
							<div style="float:left; width:50%; margin-top:10px;">
								
						
							
							<p style="font-size: 24px;">Manejo situaciones estresantes</p>
						
							
							</div>
							
							<div style="float:left; width:50%; margin-top:10px;">
							
							<select class="form-control" id="puntaje72">
							<option value="<?php echo @$datostable2['puntaje_27']; ?> "><?php echo @$datostable2['puntaje_27']; ?> </option>
							<option value="">Seleccione...</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							
							</select>
							
							</div><br />
						
							
							
							<div style="float:left; width:50%; margin-top:10px;">
								
						
							
							<p style="font-size: 24px;">Propuso soluciones a problemáticas</p>
						
							
							</div>
							
							<div style="float:left; width:50%; margin-top:10px;">
							
							<select class="form-control" id="puntaje82">
							<option value="<?php echo @$datostable2['puntaje_28']; ?> "><?php echo @$datostable2['puntaje_28']; ?> </option>
							<option value="">Seleccione...</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							
							</select>
							
							</div><br />
							
							
							
							
							
							<div style="float:left; width:50%; margin-top:10px;">
								
						
							
							<p style="font-size: 24px;">Califique el desempeño en general</p>
						
							
							</div>
							
							<div style="float:left; width:50%; margin-top:10px;">
							
							<select class="form-control" id="puntajegeneral2">
							<option value="<?php echo @$datostable2['puntajegeneral_2']; ?> "><?php echo @$datostable2['puntajegeneral_2']; ?> </option>
							<option value="">Seleccione...</option>
							<option value="exelente">Exelente</option>
							<option value="bueno">Bueno</option>
							<option value="regular">Regular</option>
							<option value="malo">Malo</option>
							
							</select>
							
							</div><br /><br /><br />
							
							
							
							<div style="float:left; width:50%; margin-top:10px;">
								
						
							Aspectos para resaltar del candidato:&nbsp;<textarea class="form-control" rows="3" style="width: 294px;" id="aspectosreal2"><?php echo @$datostable2['aspectosre_2']; ?></textarea>
							
						
							
							</div>
							
							<div style="float:left; width:50%; margin-top:10px;">
							
							¿Contrataría nuevamente a esta persona?, ¿por qué?:&nbsp;<textarea class="form-control" rows="3" style="width: 294px;" id="contratarianuev2"><?php echo @$datostable2['contrataria_2']; ?></textarea>
							
							
							
							</div><br />
							
							
							
							<div style="float:left; width:50%; margin-top:10px;">
								
						
							Observaciones:&nbsp;<br /><textarea class="form-control" rows="3" style="width: 294px;" id="observaciones2"><?php echo @$datostable2['observaciones_2']; ?></textarea>
							
						
							
							</div>
							
							<div style="float:left; width:50%; margin-top:10px;">
							
							Verificado por:&nbsp;<br /><textarea class="form-control" rows="3" style="width: 294px;" id="verificadopor2"><?php echo @$datostable2['verificadopo_2']; ?></textarea>
							
							
							
							</div><br />

					
					
					
					
							<div style="float:left; width:100%; margin-top:10px;  background-color: rgb(213, 213, 213);"><center><h4><u>Referencia Personal</u></h4></center></div><br /><br /><br />
					
					
						<div style="float:left; width:100%; margin-top:10px;">
							
							Nombre:&nbsp;<input type="text" id="nombrerespersonal" style="height: 29px;" value="<?php echo @$datostable2['nombrepersonal']; ?>">
							
							Telefono:&nbsp;<input type="text" id="telefonorespersonal" style="height: 29px;" value="<?php echo @$datostable2['telefonopersonal']; ?>">
							
							Ocupación:&nbsp;<input type="text" id="ocupacionrespersonal" style="height: 29px;margin-left: 58px;" value="<?php echo @$datostable2['ocupacionper']; ?>">
							
							
							
						</div>
						
						
						<div style="float:left; width:100%; margin-top:10px;">
							
							Vinculo:&nbsp;<select id="vinculorespersonal">
							<option value="<?php echo @$datostable2['vinculoper']; ?> "><?php echo @$datostable2['vinculoper']; ?> </option>
							<option value="">Seleccione...</option>
							<option value="amigo">Amigo</option>
							<option value="familiar">familiar</option>
							<option value="otro">otro</option>
							<select>
							
							Cual?&nbsp;<input type="text" id="descotro" style="height: 29px;  margin-left: 13px;" disabled="disabled" value="<?php echo @$datostable2['cual']; ?>">
							
							Tiempo de Relación:&nbsp;<input type="text" id="tiemporespersonal" style="height: 29px;" value="<?php echo @$datostable2['tiemporeper']; ?>">
							
						</div>
						
						
						<div style="float:left; width:50%; margin-top:10px;">
								
						
							Descripción de la Relación:&nbsp;<br /><textarea class="form-control" rows="3" style="width: 294px;" id="descriprefpersonal"><?php echo @$datostable2['descriprefper']; ?></textarea>
							
						
							
						</div>
						
						<div style="float:left; width:50%; margin-top:10px;">
								
						
							Por que lo recomienda?:&nbsp;<br /><textarea class="form-control" rows="3" style="width: 294px;" id="porrecomienpersonal"><?php echo @$datostable2['porrecomiendaper']; ?></textarea>
							
						
							
						</div>
						
						
						<div style="float:left; width:50%; margin-top:10px;">
								
						
							Fortalezas del candidato:&nbsp;<br /><textarea class="form-control" rows="3" style="width: 294px;" id="fortalpersonal"><?php echo @$datostable2['fortalpersonal']; ?></textarea>
							
						
							
						</div>
						
						<div style="float:left; width:50%; margin-top:10px;">
								
						
							Aspectos por mejorar del candidato:&nbsp;<br /><textarea class="form-control" rows="3" style="width: 294px;" id="descriprefpersonal"><?php echo @$datostable2['descripersonal']; ?></textarea>
							
						
							
						</div>
						
						<div style="float:left; width:50%; margin-top:10px;">
								
						
							¿Conoce cuales fueron las últimas empresas donde laboró el candidato?, ¿Cuáles son?&nbsp;<br /><textarea class="form-control" rows="3" style="width: 294px;" id="empresalaborocandpersonal"><?php echo @$datostable2['emprelaboroper']; ?></textarea>
							
						
							
						</div>
					
					
					
						<div style="float:left; width:100%; margin-top:10px;  background-color: rgb(213, 213, 213);"><center><h4><u>-------</u></h4></center></div><br /><br /><br />
						
						<div style="float:left; width:50%; margin-top:10px;">
						 Verificado por: <input type="text" id="verificadoporultimo" style="height: 29px;" value="<?php echo @$datostable2['verificadoporultimo']; ?>">
						</div>
						
						
						<div style="float:left; width:50%; margin-top:10px;">
						  Concepto gesti&oacute;n humana<input type="text" id="conceptogestionhumana" style="height: 29px;" value="<?php echo @$datostable2['conceptogestionhumana']; ?>">
						</div>
						
					
						<!--Inicio Estadistica-->
						<div style="float:left; width:100%; margin-top:30px" id="contenedor5"></div>
						<!--Fin Estadistica-->

					 <div style="clear:both"></div>
					
					
					<!--Fin del boton editar-->

				</div> 
					
			
				</div> 
				 
				 
				 
					
			
				</div>
				<!--Fin tab-content-->
				
		
					

			</div>
			<!--Fin class cambia-->
			</form>
			
		</div>
		<!--Inicio estirar_form2-->
	</div>
	
	<script src="../../js/consultar_informe.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
	<script src="../../js/estadistica_informe.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>

</body>
</html>