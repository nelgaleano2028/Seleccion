<?php session_start();

require_once("class_administracion.php");

$obj= new  Administracion();

$datos=$obj-> aspirantes_nocumple();


$obj2= new Administracion();

$datos2= $obj2->vacantes_aspirantes(); 
?>
<html>
<head>
    <title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
    
	<!-- Bootstrap -->
    
    <link rel="stylesheet" href="../../css/font-awesome/css/font-awesome.css?css=<?php echo rand(1, 100);?>" />
	<style type="text/css" title="currentStyle">
		@import "../../js/DataTables/extras/TableTools/media/css/TableTools.css";
		@import "../../js/DataTables/extras/TableTools/media/css/TableTools_JUI.css";
		@import "../../js/DataTables/media/css/demo_page.css";
		@import "../../js/DataTables/media/css/demo_table_jui.css";
		@import "../../js/DataTables/media/css/jquery-ui-1.8.4.custom.css";

		#example_filter{
			display:none;
		}
	</style>
	
</head>
<body>
	
	<div id="contenido" class="container-fluid">
		<div class="row-fluid">
			 <table cellpadding="0" cellspacing="0" border="0" class="display " id="example" width="100%" style="color:rgb(41,76,139) !important;">

			 	<thead id='cabeza'>
					<tr style='background-color: #2B4C88'>
						<td>NOMBRES</td>
						<td>TIPO ESTUDIO</td>
						<td>TITULO</t>
						<td>CARGOS</td>
						<td>EXPERIENCIA</td>
						<td>FUNCIONES</td>
						<th></th>
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
					<th style="color:white; font-weight: bold" width="3%" scope="col">HV</th>	
								
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


<script type="text/javascript" charset="utf-8" src="../../js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf-8" src="../../js/DataTables/extras/TableTools/media/js/ZeroClipboard.js"></script>
<script type="text/javascript" charset="utf-8" src="../../js/DataTables/extras/TableTools/media/js/TableTools.js"></script>
<script type="text/javascript" charset="utf-8" src="../../js/alert.js"></script>
<script type="text/javascript" charset="utf-8" src="../../js/vida_preseleccionado.js"></script>


</body>
</html>


</body>
</html>