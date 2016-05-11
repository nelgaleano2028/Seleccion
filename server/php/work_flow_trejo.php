<?php session_start();

require_once("class_solicitud.php");

$obj= new  Solicitudes();

$datos=$obj-> get_workflow();



?>
<html>
<head>
    <title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
   
</head>
<body >
	
	<div id="contenido" class="container-fluid">
		<div class="row-fluid">
			 <table cellpadding="0" cellspacing="0" border="0" class="display " id="admin" width="100%" style="color:rgb(41,76,139) !important;">
				<thead style="background-color:rgb(41,76,139) !important;">
			        <tr>
					<th style="color:#2b4c88; font-weight: bold" width="10%" scope="col">Vacante Solicitada</th>
					<th style="color:#2b4c88; font-weight: bold" width="10%" scope="col">Jefe</th>
					<th style="color:#2b4c88; font-weight: bold" width="9%" scope="col">Fecha de Inicio</th>
					<th style="color:#2b4c88; font-weight: bold" width="7%" scope="col">Dias en Espera</th>	
					<th style="color:#2b4c88; font-weight: bold" width="9%" scope="col">Estado Actual</th>					
					<th style="color:#2b4c88; font-weight: bold" width="5%" scope="col">Fecha Inicio Entrenamiento</th>
					<th style="color:#2b4c88; font-weight: bold" width="8%" scope="col">Categoria</th>							
			        </tr>
			    </thead>
				<tbody>
						<?php 
						
						
						//var_dump($datos);
						
						
						echo "<br />";
						
							if($datos > 0){
							for($i=0; $i<count($datos); $i++){ 
						?>
						<tr> 
							<td align="center"><?php echo $datos[$i]['vacante_sol']; ?></td>
							<td align="center"><?php echo $datos[$i]['jefe']; ?></td>							
							
								<?php
								
									date_default_timezone_set('America/Bogota');
									
									$obj2= new  Solicitudes();
									
									$d=$obj2-> vacante_independiente( $datos[$i]['codigo_vacante'], $datos[$i]['id'] );
									
									//var_dump($d);
									
									
									//echo "<br />";
									
									
									
									
									$fecha_inici=0;
									$fecha_fin=0;
								
									for($j=0;$j<count($d);$j++){
									
										
										if($d[$j]['estado']=='P' || $d[$j]['estado']=='En Proceso' ){
										

											$fecha_inicio=$d[$j]['fecha_inicio'];
											
										?>
											<td align="center"><?php echo $d[$j]['fecha_click']; ?></td>
										
										<?php
										
										
										}else if($d[$j]['estado']=='Cerrado'){
																		
											
											$fecha_inicial=$d[$j]['fecha_click'];
											
											//echo "<br />";
											
											
											//var_dump($fecha_inicial);
											
											//echo "<br />";
											
											$categoria = $datos[$i]['categoria']; 
											
											//var_dump($categoria);
											
											
											// die();
												
									
											
											
											
											
										
											$fecha_fin=$d[$j]['fecha_inicio'];
											
											
											
											

										}
									}
									
									?>
									<td align="center"><?php echo $fecha_inicial; ?>
									<?php
									
									
									//var_dump($fecha_inicial);
									
									if(@$fecha_inicial!=null){
									

										$fecha=explode("/",$fecha_fin);
									
									   
									   //var_dump($fecha);
									
									
										$dia1=$fecha[0];
										$mes1=$fecha[1];
										$anio1=$fecha[2];


										$separar2=explode(" ",$fecha_fin);
										
										$fecha2=explode("/",$fecha_fin);
										$dia2=$fecha2[0];
										$mes2=$fecha2[1];
										$anio2=$fecha2[2];

										$timestamp1 = mktime(0,0,0,$mes1,$dia1,$anio1); 
										$timestamp2 = mktime(4,12,0,$mes2,$dia2,$anio2);

										//resto a una fecha la otra 
										$segundos_diferencia = $timestamp1 - $timestamp2; 

										$dias_diferencia = $segundos_diferencia / (60 * 60 * 24); 

										$dias_diferencia = abs($dias_diferencia); 

										$dias_diferencia = floor($dias_diferencia);
																			
										echo $dias_diferencia; 
									
									}else{
									
										
										$fecha=explode("/",$fecha_inicio);
										
										
										// var_dump($fecha);
										

										$dia1=$fecha[0];
										$mes1=$fecha[1];
										$anio1=$fecha[2];


										$dia2=date('d');
										$mes2=date('m');
										$anio2=date('Y');

										$timestamp1 = mktime(0,0,0,$mes1,$dia1,$anio1); 
										$timestamp2 = mktime(4,12,0,$mes2,$dia2,$anio2);

										//resto a una fecha la otra 
										$segundos_diferencia = $timestamp1 - $timestamp2; 

										$dias_diferencia = $segundos_diferencia / (60 * 60 * 24); 


										//obtengo el valor absoulto de los días (quito el posible signo negativo) 
										$dias_diferencia = abs($dias_diferencia); 

										//quito los decimales a los días de diferencia 
										$dias_diferencia = floor($dias_diferencia);
																			
										echo $dias_diferencia; 
									
									
									}
									
									

									?>
									</td>
							<td align="center"><?php echo $dias_diferencia; ?></td>
							<td align="center"><?php echo $datos[$i]['estado']; ?></td>
							<td align="center"><?php echo $datos[$i]['fecha_ini_entr']; ?></td>						
							<td align="center"><?php echo $categoria; ?></td>
                        </tr>
						
						<?php 	} 
					
					}?>
					
				</tbody>
			 </table>
		</div>
	</div>


<script type="text/javascript" charset="utf-8" src="../../js/alert.js"></script>
<script type="text/javascript" charset="utf-8" src="../../js/solicitud_1_3.js"></script>

</body>
</html>