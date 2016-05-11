<?php session_start();

require_once("class_requisicion.php");

$obj= new  Requisicion();

$datos=$obj-> get_solcitudInternaConfirmadas($_SESSION['cod_epl']);


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
						<th style="color:#2b4c88; font-weight: bold" width="9%" scope="col">Centro Costo</th>
						<th style="color:#2b4c88; font-weight: bold" width="9%" scope="col">Cargo</th>
						<th style="color:#2b4c88; font-weight: bold" width="9%" scope="col">Reemplazo a</th>
                        <th style="color:#2b4c88; font-weight: bold" width="9%" scope="col">Motivo</th>						
					    <th style="color:#2b4c88; font-weight: bold" width="9%" scope="col">Fecha Solicitud</th>
						<th style="color:#2b4c88; font-weight: bold" width="9%" scope="col">Ver</th>
						<th style="color:#2b4c88; font-weight: bold" width="9%" scope="col">Observaciones</th>
			        </tr>
			    </thead>
				<tbody>
						<?php 
							if($datos > 0){
							for($i=0; $i<count($datos); $i++){ 
						?>
						<tr class="remove<?php echo $datos[$i]['id'] ?>"> 
						
								<td align="center"><?php echo $datos[$i]['nom_cc2']; ?></td>
								<td align="center"><?php echo $datos[$i]['nom_car']; ?></td>
								<td align="center"><?php echo $datos[$i]['reemplazo_a']; ?></td>
								<?php if($datos[$i]['motivo'] ==1){ 
										
										$motivo='ausencia';
									}else if( $datos[$i]['motivo'] ==2){
										
										$motivo='Terminación Contrato';
									}else if( $datos[$i]['motivo'] == 3){
										
										$motivo='Promocion';
									}else if( $datos[$i]['motivo'] == 4){
										
										$motivo='Movimiento de area';
									}
								
								?>
								<td align="center"><?php echo $motivo; ?></td>
								<td align="center"><?php echo $datos[$i]['fec_sol']; ?></td>
								<td align="center"><a href="ver_req_internaJefe.php?id_req=<?php echo $datos[$i]['id']?>&jefe=<?php echo $datos[$i]['id']?>" target="_blank">Ver</a></td>
								<td align="center"><?php echo $datos[$i]['observaciones']; ?></td>
							
                        </tr>
					<?php 	} 
					
					}?>
						
					
				</tbody>
			 </table>
		</div>
	</div>
<script src="../../js/jquery-1.10.1.min.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
<script src="../../js/bootstrap.min.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
<script type="text/javascript" language="javascript" src="../../js/DataTables/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" src="../../js/DataTables/extras/TableTools/media/js/ZeroClipboard.js"></script>
<script type="text/javascript" charset="utf-8" src="../../js/DataTables/extras/TableTools/media/js/TableTools.js"></script>
<script src="../../js/alert.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8" src="../../js/solicitud_req.js"></script>


</body>
</html>