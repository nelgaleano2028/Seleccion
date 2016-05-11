<?php session_start();
require_once("class_vacantes.php");
require_once("class_administracion.php");

$obj1= new  Vacantes();

$codigo=$_GET['codigo'];


$datos=$obj1->aspirantes_porvacantes($codigo);



$obj= new  Administracion();

$datos2=$obj-> aspirantes_hv();



 

?>
<html>
<head>
    <title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
    
	<!-- Bootstrap -->
    
    <link rel="stylesheet" href="../../css/style.css?css=<?php echo rand(1, 100);?>"  />
    <link rel="stylesheet" href="../../css/font-awesome/css/font-awesome.css?css=<?php echo rand(1, 100);?>" />
	<style type="text/css" title="currentStyle">
		@import "../../js/DataTables/extras/TableTools/media/css/TableTools.css";
		@import "../../js/DataTables/extras/TableTools/media/css/TableTools_JUI.css";
		@import "../../js/DataTables/media/css/demo_page.css";
		@import "../../js/DataTables/media/css/demo_table_jui.css";
		@import "../../js/DataTables/media/css/jquery-ui-1.8.4.custom.css";
	</style>
	
</head>
<body >


	
	<div  class="container-fluid">
		<div class="row-fluid">
			 <table cellpadding="0" cellspacing="0" border="0" class="display " id="admin3" width="100%" style="color:rgb(41,76,139) !important;">
				<thead style="background-color:rgb(41,76,139) !important;">
			        <tr>
						
						<th style="color:#2b4c88; font-weight: bold" width="10%" scope="col">Nombres</th>
					    <th style="color:#2b4c88; font-weight: bold" width="10%" scope="col">Cedula</th>
					    <th style="color:#2b4c88; font-weight: bold" width="10%" scope="col">HV</th>
					    <th style="color:#2b4c88; font-weight: bold" width="10%" scope="col">Pruebas</th>
						<th style="color:#2b4c88; font-weight: bold" width="10%" scope="col">Estado</th>
					    <!--<th style="color:#2b4c88; font-weight: bold" width="10%" scope="col">Aceptar</th>
					    <th style="color:#2b4c88; font-weight: bold" width="10%" scope="col">Rechazar</th>-->
													
			        </tr>
			    </thead>
				<tbody>
						<?php 
						
						
							if($datos > 0){
							for($i=0; $i<count($datos); $i++){ 
						?>
						<tr> 
							
							<td align="center"><?php echo $datos[$i]['nombre']; ?></td>	
							<td align="center"><?php echo $datos[$i]['cedula']; ?></td>
							<td align="center"><a target="blank" href="../../../aspirantes_HV_GH/php/valida.php?usuario=<?php echo $datos2[$i]['correo']; ?>&contrasena=<?php echo $datos2[$i]['contrasena']; ?>">Ver</a></td>
							<td align="center"><a href="javascript:void(0);"  onClick="tablaPruebas('<?php echo $datos[$i]['cedula']?>')" >Ver</a></td>
							
							<td align="center">
								<select   onchange="cambiar_estado('<?php echo $datos[$i]['cedula']; ?>')" id="estado">
									<option value="">Seleccione...</option>
									<option value="No Cumple">No Cumple</option>
									<option value="Seleccionado">Seleccionado</option>
									<option value="Con Proceso">Con Proceso</option>
									<option value="Bancos">Bancos</option>									
								</select>
							</td>							
							<!--<td align="center"><a href="javascript:void(0);"  onClick="Aceptar('<?php //echo $datos[$i]['cedula']?>')" >Aceptar</a></td>
							<td align="center"><a href="javascript:void(0);"  onClick="Rechazar('<?php //echo $datos[$i]['cedula']?>')" >Rechazar</a></td>-->						
                        </tr>
						
						<?php 	} 
					
					}?>
					
					
				</tbody>
			 </table>
		</div>
	</div>
	

<script type="text/javascript" language="javascript" src="../../js/DataTables/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" src="../../js/DataTables/extras/TableTools/media/js/ZeroClipboard.js"></script>
<script type="text/javascript" charset="utf-8" src="../../js/DataTables/extras/TableTools/media/js/TableTools.js"></script>
<script type="text/javascript" charset="utf-8" src="../../js/alert.js"></script>	
<script type="text/javascript" charset="utf-8" src="../../js/admin_vacantes.js"></script>

</body>
</html>