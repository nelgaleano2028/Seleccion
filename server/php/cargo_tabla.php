<?php session_start();
require_once("class_cargos.php");

$obj1= new  Cargos();


$datos=$obj1->cargos_anidados($_GET['id']);



?>
<html>
<head>
    <title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
    
	<!-- Bootstrap -->
</head>
<body >
	
	<div  class="container-fluid">
		<div class="row-fluid">
			 <table cellpadding="0" cellspacing="0" border="0" class="display " id="admin2" width="100%" style="color:rgb(41,76,139) !important;">
				<thead style="background-color:rgb(41,76,139) !important;">
			        <tr>
						
						<th style="color:#2b4c88; font-weight: bold" width="10%" scope="col">Nombre</th>
						<th style="color:#2b4c88; font-weight: bold" width="10%" scope="col">Ingresar Nuevos</th>		
						<th style="color:#2b4c88; font-weight: bold" width="10%" scope="col">Ver Registros</th>								
			        </tr>
			    </thead>
				<tbody>
						<?php 
						
						
							if($datos > 0){
							for($i=0; $i<count($datos); $i++){ 
						?>
						<tr> 
							
							<td align="center"><?php echo $datos[$i]['nombre']; ?></td>	
							<td align="center"><a href="javascript:void(0);"  onClick="tablaCargoNuevo2('<?php echo $datos[$i]['id']?>', '<?php echo $datos[$i]['id_tipo_cargo']?>' )" >Nuevo</a></td>
							<td align="center"><a href="javascript:void(0);"  onClick="tablaCargos2('<?php echo $datos[$i]['id']?>' , '<?php echo $datos[$i]['id_tipo_cargo']?>')" >Ver</a></td>							
                        </tr>
						
						<?php 	} 
					
					}?>
					
					
				</tbody>
			 </table>
		</div>
	</div>

	<script type="text/javascript" charset="utf-8" src="../../js/admin_cargos2.js"></script>
</body>
</html>