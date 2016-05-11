<?php session_start();

require_once("class_requisicion.php");

$obj= new  Requisicion();

$datos=$obj-> get_solitudReqApro();

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
	
	<div id="contenido" class="container-fluid">
		<div class="row-fluid">
			 <table cellpadding="0" cellspacing="0" border="0" class="display " id="gh" width="100%" style="color:rgb(41,76,139) !important;">
				<thead style="background-color:rgb(41,76,139) !important;">
			        <tr>
					<th style="color:#2b4c88; font-weight: bold" width="9%" scope="col">Area</th>
					<th style="color:#2b4c88; font-weight: bold" width="9%" scope="col">Cargo</th>
					<th style="color:#2b4c88; font-weight: bold" width="9%" scope="col">Jefe</th>
					<th style="color:#2b4c88; font-weight: bold" width="6%" scope="col">Fecha</th>
					<th style="color:#2b4c88; font-weight: bold" width="6%" scope="col">Requisicion</th>
					<th style="color:#2b4c88; font-weight: bold" width="2%" scope="col">Solucionado</th>
					<th style="color:#2b4c88; font-weight: bold" width="9%" scope="col">Ver por Supernumerario</th>
					<th style="color:#2b4c88; font-weight: bold" width="9%" scope="col">Seleccion Externa</th>
					<th style="color:#2b4c88; font-weight: bold" width="9%" scope="col">Observaciones</th>

					
			        </tr>
			    </thead>
				<tbody>
						
						<?php 
						
						
							if($datos > 0){
							for($i=0; $i<count($datos); $i++){ 
						?>
						<tr> 
						
								<td align="center"><?php echo $datos[$i]['area']; ?></td>
								<td align="center"><?php echo $datos[$i]['cargo']; ?></td>
								<td align="center"><?php echo $datos[$i]['jefe']; ?></td>
								<td align="center"><?php echo $datos[$i]['fecha'];?></td>
								<td align="center"><a href="ver_req_internaJefe.php?id_req=<?php echo $datos[$i]['cod_form'] ?>&jefe=<?php echo $datos[$i]['cod_epl_jefe'];?>" target="_blank">Ver</a></td>
								<td align="center"><a href="#" onClick="aceptar_solicitud_super('<?php echo $datos[$i]['cod_form']; ?>','<?php echo $datos[$i]['cod_cc2']; ?>','<?php echo $datos[$i]['cod_car']; ?>','<?php echo $datos[$i]['cod_epl']; ?>')" >Cerrar</a></td>
								<td align="center"><a target="blank" href="../../../aspirantes_HV_GH/php/valida.php?nom_admin=VAVILA&contrasena=1245">ir</a></td>
								<td align="center"><a href="#" onClick="enviar_solicitud('<?php echo $datos[$i]['cod_form']; ?>','<?php echo $datos[$i]['cod_cc2']; ?>','<?php echo $datos[$i]['cod_car']; ?>','<?php echo $datos[$i]['cod_epl']; ?>')" >Enviar</a></td>
								<td align="center"><textarea name="observaciones<?php echo $datos[$i]['cod_form'] ?>" cols="50" rows="3" style='text-transform: uppercase; resize: none;'></textarea></td>
						
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
<script src="../../js/alert.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8" src="../../js/solicitud_req_aprobadas.js"></script>


</body>
</html>