<?php session_start();

require_once("class_avila.php");

$obj= new  Avila();

$datos=$obj-> aspirantes_seleccion();

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
			 <table cellpadding="0" cellspacing="0" border="0" class="display " id="admin" width="100%" style="color:rgb(41,76,139) !important;">
				<thead style="background-color:rgb(41,76,139) !important;">
			        <tr>
					<th style="color:#2b4c88; font-weight: bold" width="10%" scope="col">Nombres</th>
					<th style="color:#2b4c88; font-weight: bold" width="10%" scope="col">Cedula</th>
					<th style="color:#2b4c88; font-weight: bold" width="9%" scope="col">Correo</th>
					<th style="color:#2b4c88; font-weight: bold" width="5%" scope="col">Fecha</th>
					<th style="color:#2b4c88; font-weight: bold" width="5%" scope="col">Pruebas</th>							
			        </tr>
			    </thead>
				<tbody>
						<?php 
						
						
							if($datos > 0){
							for($i=0; $i<count($datos); $i++){ 
						?>
						<tr> 
							<td align="center"><?php echo $datos[$i]['nombres']; ?></td>
							<td align="center"><?php echo $datos[$i]['cedula']; ?></td>
							<td align="center"><?php echo $datos[$i]['correo']; ?></td>
							<td align="center"><?php echo $datos[$i]['fecha']; ?></td>
							<td align="center"><a href="javascript:void(0);"  onClick="tablaPruebas('<?php echo $datos[$i]['cedula']?>')" >Ver</a></td>
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

<script type="text/javascript" language="javascript" src="../../js/DataTables/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" src="../../js/DataTables/extras/TableTools/media/js/ZeroClipboard.js"></script>
<script type="text/javascript" charset="utf-8" src="../../js/DataTables/extras/TableTools/media/js/TableTools.js"></script>
<script type="text/javascript" charset="utf-8" src="../../js/alert.js"></script>
<script type="text/javascript" charset="utf-8" src="../../js/todos_aspirantes.js"></script>


</body>
</html>