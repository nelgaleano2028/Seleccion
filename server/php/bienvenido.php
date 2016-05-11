<?php session_start();
require_once('class_administracion.php');

$grupo=$_SESSION['grupo'] ;
$obj= new Administracion();
$ruta=$obj->primer_test($grupo);
?>
<html>
  <head>
    <title>CARAS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <!--<link rel="stylesheet" href="../../css/style_caras.css?css=<?php echo rand(1, 100);?>"  />-->
  </head>
  <body>


  	
		
       	<div class="estirar_form2">
              
			<div class="cambia" >
				<div style="text-align:center; margin-top:20px;"><p style="font-weight:bold; font-size:20px;">BIENVENIDOS A LAS PRUEBAS PSICOTECNICAS DE SELECCION DE PERSONAL PARA CMI</p></div>
				
				<div style="margin-top:25px; width:75%; text-align:justify; margin-left:124px; text-align: justify"><p style="font-size:17px;">
				A continuacion se te guiara para que tu proceso quede correctamente diligenciado y de esta manera puedas ser un aspirante mas para la consecucion de un 
				puesto en el CENTRO MEDICO IMBANACO.</p>
				
				<p style="font-size:15px;">Por favor espera la señal de la Psicologa para poder empezar a aplicar tu prueba.</p><br>
				
				<div style="text-align:center"><p style="font-size:37px; font-weight:bold">Exitos!</p></div></div>
				 	 
		</div>
		</div>
		
		<div class="estirar_form2">	

			<div class="cambia" >
				 
				<form id="info_per">
				<div id="nucleo_fam">
					
					<table width="100%" border="0">
						<tr>
							<td colspan="2"><br></td>
						</tr>
						<tr>
							<td colspan="2"><center><p style="font-weight:bold; font-size:20px;">INFORMACION SOBRE EL NUCLEO FAMILIAR</p></center></td>
						</tr>
						<tr>
							<td colspan="2"><br></td>
						</tr>
						
						<tr>
							<td align='right'><span style='font-weight:bold'>¿Quíen toma las decisiones en el hogar?&nbsp;</span></td>
							<td><textarea name="deci_fam" class="requerido" style="margin: 0px 0px 10px; width: 640px; height: 40px;"></textarea></td>
						</tr>
						<tr>
							<td align='right'><span style='font-weight:bold'>¿Qué tipo de actividades realizan y con que &nbsp; frecuencia? &nbsp;</span></td>
							<td><textarea name="acti_fam" class="requerido" style="margin: 0px 0px 10px; width: 640px; height: 40px;"></textarea></td>
						</tr>
						
						<tr>
							<td align='right'><span style='font-weight:bold'>¿Mencione una dificultad que haya afectado a&nbsp; la familia o a uno de sus miembros?&nbsp;</span></td>
							<td><textarea name="difi_fam" class="requerido" style="margin: 0px 0px 10px; width: 640px; height: 40px;"></textarea></td>
						</tr>
						
						<tr>
							<td align='right'><span style='font-weight:bold'>¿Como fue afrontada?¿Que hizo usted?&nbsp;</span></td>
							<td><textarea name="afron_fam" class="requerido" style="margin: 0px 0px 10px; width: 640px; height: 40px;"></textarea></td>
						</tr>
						
						<tr>
							<td align='right'><span style='font-weight:bold'>¿Cúales son los principios y valores que&nbsp; fundamentan su hogar?&nbsp;</span></td>
							<td><textarea name="prin_fam" class="requerido" style="margin: 0px 0px 10px; width: 640px !important; height: 40px;"></textarea></td>
						</tr>
						
						<tr>
							<td align='right'><span style='font-weight:bold'>¿Qué cosas han logrado como familia?&nbsp;</span></td>
							<td><textarea name="logro_fam" class="requerido" style="margin: 0px 0px 10px; width: 640px; height: 40px;"></textarea></td>
						</tr>
						
						<tr>
							<td align='right'><span style='font-weight:bold'>¿Cúal es su principal meta familiar?&nbsp;</span></td>
							<td><textarea name="print_fam" class="requerido" style="margin: 0px 0px 10px; width: 640px; height: 40px;"></textarea></td>
						</tr>
						<tr>
							<td colspan="3" height='50px'></td>
						</tr>
					
					
					
					</table>
				 </div>
				<div id="percep_per">
					<table width="100%" border="0">					
						<tr>
							<td colspan="3"><center><p style="font-weight:bold; font-size:20px;">PERCEPCION PERSONAL</p></center></td>
						</tr>
						<tr>
							<td colspan="2"><br></td>
						</tr>
						
						<tr>
							<td align='right'><span style='font-weight:bold'>Realice una breve descripción de si&nbsp; mismo&nbsp;</span></td>
							<td colspan="2"><textarea name="desc_per" class="requerido" style="margin: 0px 0px 10px; width: 600px; height: 42px;"></textarea></td>
							
						</tr>
						
						<tr>
							<td align='right'><span style='font-weight:bold'>Mencione fortalezas y aspectos a&nbsp; mejorar&nbsp;</span></td>
							<td colspan="2"><textarea name="forta_per" class="requerido" style="margin: 0px 0px 10px; width: 600px; height: 42px;"></textarea></td>
							
						</tr>
						
						<tr>
							<td align='right' ><span style='font-weight:bold'>¿Tiene problemas de salud? <br> ¿Cuál es la frecuencia?&nbsp;</span></td>
							<td width='90px'>&nbsp;<input type="radio" name="prob_per" value="si">&nbsp;<span style='font-weight:bold'>Si</span> &nbsp;&nbsp;
								<input type="radio" name="prob_per" value="no" >&nbsp;<span style='font-weight:bold'>No</span> </td>
							<td><textarea name="salud_per" class="requerido" style="margin: 0px 0px 10px; width: 511px; height: 40px;"></textarea></td>
						</tr>
						
						<tr>
							<td align='right'><span style='font-weight:bold'>¿Ha consultado a&nbsp; psiquiatria/psicologia? <br> ¿Cuál es la frecuencia?&nbsp;</span></td>
							<td>&nbsp;<input type="radio" name="psico_per" value="si">&nbsp;<span style='font-weight:bold'>Si</span>&nbsp;&nbsp;
								<input type="radio" name="psico_per" value="no" >&nbsp;<span style='font-weight:bold'>No</span></td>
							<td><textarea name="psico_text_per" class="requerido" style="margin: 0px 0px 10px; width: 511px; height: 40px;"></textarea></td>
						</tr>
						
						<tr>
							<td align='right'><span style='font-weight:bold'>¿Por qué desea vincularse la empresa?&nbsp;</span></td>
							<td colspan="2"><textarea name="vincu_per" class="requerido" style="margin: 0px 0px 10px; width: 600px; height: 42px;"></textarea></td>
							
						</tr>
						
						<tr>
							<td align='right'><span style='font-weight:bold'>¿Cómo maneja las situaciones&nbsp; dificiles?&nbsp;</span></td>
							<td colspan="2"><textarea name="situa_per" class="requerido" style="margin: 0px 0px 10px; width: 600px; height: 42px;"></textarea></td>
						</tr>
						
						<tr>
							<td align='right'><span style='font-weight:bold'>¿Cúal es principal la meta?&nbsp;</span></td>
							<td colspan="2"><textarea name="meta_per" class="requerido" style="margin: 0px 0px 10px; width: 600px; height: 42px;"></textarea></td>
						</tr>
						
						<tr>
							<td align='right'><span style='font-weight:bold'>¿Qué desea lograr a futuro?&nbsp;</span></td>
							<td colspan="2"><textarea name="logra_per" class="requerido" style="margin: 0px 0px 10px; width: 600px; height: 42px;"></textarea></td>
						</tr>
					
					</table>
				</div>
				
				<div><br><br></div>
				
				<div id="save_per">
					<table width="100%" border="0">
						<tr>
							<input type="hidden" id="ruta" value="<?php echo $ruta?>">
							<td ><center><input type="button" class="requerido" id="guardar_infoper" value="Guardar e Inicar Prueba"></center></td>
						</tr>
						
					</table>
				
				</div>
				
				</form>


         	</div>
        </div>
		
 

    <!--<div id="prueba_caras" style="display:none;">

			<?php //require_once('caras.php'); ?>
		
	</div>-->


	<div id="pruebas" style="display:none;">

			
		
	</div>

	<script src="../../js/alert.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>		
	<script src="../../js/bienvenido.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>		

</body>
</html>