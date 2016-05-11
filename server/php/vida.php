<?php session_start();

require_once("class_administracion.php");

$obj= new  Administracion();

$datos=$obj-> aspirantes_hv_con_proceso();


$obj2= new Administracion();

$datos2= $obj2->vacantes_aspirantes(); 
?>
<html>
<head>
    <title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
    
</head>
<body>
	
	<div id="contenido" class="container-fluid" style="width: 1700px;">
		<div class="row-fluid">
			 <table cellpadding="0" cellspacing="0" border="0" class="display " id="example" width="100%" style="color:rgb(41,76,139) !important;">


			 	<thead id='cabeza'>
					<tr style='background-color: #2B4C88'>
						<td>NOMBRES</th>
						<td>TIPO DE ESTUDIO</th>
						<td>TITULO OBTENIDO</th>
						<td>CARGOS</th>
						<td>EXPERIENCIA</th>
						<td>FUNCIONES</th>
						<th></td>
						<th></td>
						<th></td>
						<th></td>
						<!--<th></td>-->
						<th></td>
						<th></td>						
					</tr>
				</thead>



				<thead style="background-color:rgb(41,76,139) !important;">
			        <tr>
					
					<th style="color:white; font-weight: bold" width="8%" scope="col">NOMBRES</th>
					<th style="color:white; font-weight: bold" width="8%" scope="col">TIPO DE ESTUDIO</th>
					<th style="color:white; font-weight: bold" width="10%" scope="col">TITULO OBTENIDO</th>	
					<th style="color:white; font-weight: bold" width="10%" scope="col">CARGOS</th>
					<th style="color:white; font-weight: bold" width="10%" scope="col">EXPERIENCIA</th>
					<th style="color:white; font-weight: bold" width="12%" scope="col">FUNCIONES</th>					
					<th style="color:white; font-weight: bold" width="3%" scope="col"  class="noSearch">HV</th>	
					<th style="color:white; font-weight: bold" width="3%" scope="col"  class="noSearch">PRUEBAS</th>
					<th style="color:white; font-weight: bold" width="3%" scope="col"  class="noSearch">ENVIAR</th>	
					<th style="color:white; font-weight: bold" width="3%" scope="col"  class="noSearch">NO CUMPLE</th>
					<th style="color:white; font-weight: bold" width="3%" scope="col"  class="noSearch">VACANTE</th>
					<th style="color:white; font-weight: bold" width="3%" scope="col"  class="noSearch">IMPRIMIR HV</th>						
			        </tr>
			    </thead>
				
				
				<tbody>
						<?php 
						
						
							if($datos > 0){
							for($i=0; $i<count($datos); $i++){ 
						?>
						<tr> 
							<td align="center"><?php echo $datos[$i]['nombre']; ?></td>
							<td align="center"><?php echo $datos[$i]['nivel']; ?></td>
							<td align="center"><?php echo $datos[$i]['titulo']; ?></td>
							<td align="center"><?php echo $datos[$i]['cargo']; ?></td>
							<td align="center"><?php echo $datos[$i]['areas']; ?></td>
							<td align="center"><?php echo $datos[$i]['funciones']; ?></td>							
							<td align="center"><a target="blank" href="../../../aspirantes_HV_GH/php/valida.php?usuario=<?php echo $datos[$i]['correo']; ?>&contrasena=<?php echo $datos[$i]['contrasena']; ?>">Ver</a></td>
							<td align="center"><a href="javascript:void(0);"  onClick="tablaPruebas('<?php echo $datos[$i]['cedula']?>')" >Ver</a></td>	
							<td align="center"><a href="javascript:void(0);"  onClick="enviarPruebas('<?php echo $datos[$i]['cedula']?>')" >Enviar</a></td>	
							<td align="center"><a href="javascript:void(0);"  onClick="Rechazar('<?php echo $datos[$i]['cedula']?>')" >No Cumple</a></td>	
							<td align="center">
							    <select id="vacante">
									<option value="">Seleccionar....</option>
									<?php
										for($j=0; $j<count($datos2); $j++){
										
										echo "<option value='".@$datos2[$j]['cod_cargo']."' >".@$datos2[$j]['nom_car']."</option>";
										
										}
									?>
								</select>
							</td>
							
							
							<td align="center"><a target="blank" href="pdf_hv.php?cedula=<?php echo $datos[$i]['cedula']; ?>">Imprimir</a></td>							
                        </tr>
						
						<?php 	} 
					
					}?>
					
				</tbody>
			 </table>
		</div>
	</div>

	<div id="contenido2">
		 		<!--Aca carga el formulario -->
	</div>


<script type="text/javascript" charset="utf-8" src="../../js/alert.js"></script>
<script type="text/javascript" charset="utf-8" src="../../js/admin_vida.js"></script>


</body>
</html>