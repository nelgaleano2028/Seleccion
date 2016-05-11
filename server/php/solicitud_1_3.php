<?php session_start();

require_once("class_solicitud.php");

$obj= new  Solicitudes();

$datos=$obj-> get_solitudReqNuevaPlaza();

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
					<th style="color:#2b4c88; font-weight: bold" width="10%" scope="col">Nombre Jefe</th>
					<th style="color:#2b4c88; font-weight: bold" width="10%" scope="col">Cargo Solicitado</th>
					<th style="color:#2b4c88; font-weight: bold" width="9%" scope="col">Personas</th>
					<th style="color:#2b4c88; font-weight: bold" width="7%" scope="col">Fecha</th>	
					<th style="color:#2b4c88; font-weight: bold" width="5%" scope="col">Ver</th>
					<th style="color:#2b4c88; font-weight: bold" width="8%" scope="col">Aceptar</th>
					<th style="color:#2b4c88; font-weight: bold" width="8%" scope="col">Rechazar</th>
					<th style="color:#2b4c88; font-weight: bold" width="10%" scope="col">Observaciones</th>									
			        </tr>
			    </thead>
				<tbody>
						<?php 
						
						
							if($datos > 0){
							for($i=0; $i<count($datos); $i++){ 
						?>
						<tr  class="remove<?php echo $datos[$i]['id_form'] ?>"> 
							<td align="center"><?php echo $datos[$i]['nombres']; ?></td>
							<td align="center"><?php echo $datos[$i]['nom_car_solicitado']; ?></td>
							<td align="center"><?php echo $datos[$i]['personas']; ?></td>
							<td align="center"><?php echo $datos[$i]['fecha']; ?></td>
							<td align="center"><a href="ver_nuevo_cargo_trejo.php?id_form=<?php echo $datos[$i]['id_form']?>&cod_form=<?php echo $datos[$i]['cod_form'] ?>" target="_blank">Ver</a></td>
							<td align="center"> <a href="#" onClick="solicitud_javier('<?php echo $datos[$i]['cod_form']; ?>',1)" >Aceptar</a></td>
							<td align="center"><a href="#" onClick="solicitud_javier('<?php echo $datos[$i]['cod_form']; ?>',2)" >Rechazar</a></td>
							<td align="center"><textarea name="observaciones<?php echo $datos[$i]['cod_form'] ?>"></textarea></td>
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