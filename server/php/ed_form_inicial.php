<?php session_start();
require_once('class_administracion.php');


$obj= new Administracion();

$datos=$obj->traer_form_inicial($_GET['cedula']);

?>

<html>
  <head>
    <title>CARAS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="tipo_contenido"  content="text/html;" http-equiv="content-type" charset="utf-8">
    <!-- Bootstrap -->
    <!--<link rel="stylesheet" href="../../css/style_caras.css?css=<?php echo rand(1, 100);?>"  />-->
  </head>
  <body style='background-color: rgb(244, 238, 196)'>


  	
		
       	<div class="estirar_form2">
             <br> 
			<div class="cambia" >
				<center>
				<form id="info_per">
				<div id="nucleo_fam">
					
					<table width="70%" border="1">
						<tr>
							<td colspan="2" align='center' style="font-weight:bold; background-color:rgb(201, 201, 201); font-size:20px;" >INFORMACION SOBRE EL NUCLEO FAMILIAR</td>
						</tr>
						<tr>
							<td align='right' style="font-weight:bold; background-color:rgb(201, 201, 201); font-size:17px">¿Quíen toma las decisiones en el hogar?</td>
							<td width='500px' height='40px'><?php echo $datos[0]['deci_fam']?></td>
						</tr>
						<tr>
							<td align='right' style="font-weight:bold; background-color:rgb(201, 201, 201); font-size:17px" height='40px'>¿Qué tipo de actividades realiazan y con que frecuencia?</td>
							<td><?php echo $datos[0]['acti_fam']?></td>
						</tr>
						
						<tr>
							<td align='right' style="font-weight:bold; background-color:rgb(201, 201, 201); font-size:17px" height='40px'>¿Mencione una dificultad que haya afectado a la familia o a no de sus miembros?</td>
							<td><?php echo $datos[0]['difi_fam']?></td>
						</tr>
						
						<tr>
							<td align='right' style="font-weight:bold; background-color:rgb(201, 201, 201); font-size:17px" height='40px'>¿Como fue afrontada?¿Que hizo usted?</td>
							<td><?php echo $datos[0]['afron_fam']?></td>
						</tr>
						
						<tr>
							<td align='right'  style="font-weight:bold; background-color:rgb(201, 201, 201); font-size:17px" height='40px'>¿Cúales son los principios y valores que fundamentan su hogar?</td>
							<td><?php echo $datos[0]['prin_fam']?></td>
						</tr>
						
						<tr>
							<td align='right' style="font-weight:bold; background-color:rgb(201, 201, 201); font-size:17px" height='40px'>¿Qué cosas han logrado como familia?</td>
							<td><?php echo $datos[0]['logro_fam']?></td>
						</tr>
						
						<tr>
							<td align='right' style="font-weight:bold; background-color:rgb(201, 201, 201); font-size:17px" height='40px'>¿Cúal es su principal meta familiar?</td>
							<td><?php echo $datos[0]['print_fam']?></td>
						</tr>
					
					
					
					</table>
				 </div>
				<div id="percep_per">
					<table width="70%" border="1">
						<tr>
							<td colspan="3" style="font-weight:bold; background-color:rgb(201, 201, 201); font-size:20px;"><center>PERCEPCION PERSONAL</center></td>
						</tr>
						
						<tr>
							<td align='right' style="font-weight:bold; background-color:rgb(201, 201, 201); font-size:17px" height='40px'>Realice una breve descripción de si mismo</td>
							<td colspan="2" width='300px'><?php echo $datos[0]['desc_per']?></td>
							
						</tr>
						
						<tr>
							<td align='right' style="font-weight:bold; background-color:rgb(201, 201, 201); font-size:17px" height='40px'>Mencione fortalezas y aspectos a mejorar</td>
							<td colspan="2"><?php echo $datos[0]['forta_per']?></td>
							
						</tr>
						
						<tr>
							<td align='right' style="font-weight:bold; background-color:rgb(201, 201, 201); font-size:17px" height='40px'>¿Tiene problemas de salud? ¿Cuál es la frecuencia?</td>
							<td>
							<?php if($datos[0]['prob_per']== 'si'){ ?>
								<input type="radio" name="prob_per" value="si" checked>Si
								<input type="radio" name="prob_per" value="no" >No
							
							<?php }else{ ?>
								<input type="radio" name="prob_per" value="si"  >Si
								<input type="radio" name="prob_per" value="no" checked>No
							
							<?php } ?>
							 </td>
							<td width='330px'><?php echo $datos[0]['salud_per']?></td>
						</tr>
						
						<tr>
							<td align='right' style="font-weight:bold; background-color:rgb(201, 201, 201);" height='40px'>¿Ha consultado a psiquiatria/psicologia? ¿Cuál es la frecuencia?</td>
							<td><?php if($datos[0]['psico_per']=='si'){ ?>
								<input type="radio" name="psico_per" value="si" checked>Si
								<input type="radio" name="psico_per" value="no" >No
								<?php }else{ ?>
								<input type="radio" name="psico_per" value="si" >Si
								<input type="radio" name="psico_per" value="no" checked>No
								<?php } ?>
							</td>
							<td width='330px'><?php echo $datos[0]['psico_text_per']?></td>
						</tr>
						
						<tr>
							<td align='right' style="font-weight:bold; background-color:rgb(201, 201, 201); font-size:17px" height='40px'>¿Por qué desea vincularse la empresa?</td>
							<td colspan="2"><?php echo $datos[0]['vincu_per']?></td>
							
						</tr>
						
						<tr>
							<td align='right' style="font-weight:bold; background-color:rgb(201, 201, 201); font-size:17px" height='40px'>¿Cómo maneja las situaciones dificiles?</td>
							<td colspan="2"><?php echo $datos[0]['situa_per']?></td>
						</tr>
						
						<tr>
							<td align='right' style="font-weight:bold; background-color:rgb(201, 201, 201); font-size:17px" height='40px'>¿Cúal es principal meta?</td>
							<td colspan="2"><?php echo $datos[0]['meta_per']?></td>
						</tr>
						
						<tr>
							<td align='right' style="font-weight:bold; background-color:rgb(201, 201, 201); font-size:17px" height='40px'>¿Qué desea lograr a futuro?</td>
							<td colspan="2"><?php echo $datos[0]['logra_per']?></td>
						</tr>
					
					</table>
				</div>
				
				
				
				</form>
				</center>

         	</div>
        </div>
		
 




	<div id="pruebas" style="display:none;">

			
		
	</div>






	<script src="../../js/alert.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>		
	<script src="../../js/bienvenido.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>		

</body>
</html>