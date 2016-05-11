<?php session_start();

require_once("class_crud_modelo.php");

$obj= new  Crud();

$datos=$obj-> consultar_datos_ciudades();
?>
<html>
<head>
    <title>Crud Dinamico</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
    
	
  

	
	<style type="text/css" title="currentStyle">
			@import "../../js/DataTables/media/css/demo_page.css";
			@import "../../js/DataTables/media/css/demo_table.css";		
			@import "../../js/DataTables/media/css/themes/smoothness/jquery-ui-1.7.2.custom.css";
			
			#example_filter {
				display: block !important;
			}
			
	</style>

	
	
	
</head>
<body>
	
	<div id="contenido" class="container-fluid">
		<div class="row-fluid">
			 <table cellpadding="0" cellspacing="0" border="0" class="display " id="example" width="100%" style="color:rgb(41,76,139) !important;">


				<thead style="background-color:rgb(41,76,139) !important;">
			        <tr>
					
					
						<th style="color:white; font-weight: bold" width="8%" scope="col">CODIGO CIUDAD</th>
						<th style="color:white; font-weight: bold" width="10%" scope="col">CODIGO DPT</th>						
						<th style="color:white; font-weight: bold" width="10%" scope="col">NOMBRE CIUDAD</th>	
						<th style="color:white; font-weight: bold" width="10%" scope="col">CIUDAD ISS</th>
						<th style="color:white; font-weight: bold" width="10%" scope="col">CODIGO PAIS</th>								
								
			        </tr>
			    </thead>
				
				
				<tbody>
						<?php 
						
						
							if($datos > 0){
								for($i=0; $i<count($datos); $i++){ 
						?>
						<tr id='<?php echo $datos[$i]['cod_ciu']; ?>'> 
							
							<td align="center"><?php echo $datos[$i]['cod_ciu']; ?></td>
							<td align="center"><?php echo $datos[$i]['cod_dpt']; ?></td>						
							<td align="center"><?php echo $datos[$i]['nom_ciu']; ?></td>	
							<td align="center"><?php echo $datos[$i]['cod_ciu_iss']; ?></td>	
							<td align="center"><?php echo $datos[$i]['cod_pais']; ?></td>	
							
							
                        </tr>
						
						<?php 	} 
					
							}?>
					
				</tbody>
			 </table>
		</div>
	</div>
	
	<!-- Place holder where add and delete buttons will be generated -->
		<div class="add_delete_toolbar" />
		
			<!--<button class="borrar">Deletes</button>-->

		
<!-- Custom form for adding new records -->
 <form id="formAddNewRow" action="#" title="Adicionar Registro">
        <label for="engine">Codigo Ciudad</label>
		<br />
		<input type="text" name="cod_ciu" id="cod_ciu" class="required" rel="0" />
		
		<br />
		
        <label for="browser">Codigo Depto</label>
		<br />
		<input type="text" name="cod_dpt" id="cod_dpt" class="required" rel="1" />
		
        <br />
		
        <label for="platforms">Nombre Ciudad</label>
		<br />
		<input type="text" name="nom_ciu" id="nom_ciu" class="required" rel="2" />
		
		<br />
		
        <label for="version">Codigo ISS</label>
		<br />
		<input type="text" name="cod_ciu_iss" id="cod_ciu_iss" class="required" rel="3" />
		
		<br />
		
        <label for="version">Codigo Pais</label>
		<br />
		<input type="text" name="cod_pais" id="cod_pais" class="required" rel="4" />
		
		
</form>
	

	
		
		<script src="../../js/jquery.min.js" type="text/javascript"></script>
        <script src="../../js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="../../js/jquery.jeditable.js" type="text/javascript"></script>
        <script src="../../js/jquery-ui.js" type="text/javascript"></script>
        <script src="../../js/jquery.validate.js" type="text/javascript"></script>
		<script src="../../js/jquery.dataTables.editable.js" type="text/javascript"></script>
		<script src="../../js/script_datatable_ciudades.js" type="text/javascript" charset="utf-8"></script>

</body>
</html>


</body>
</html>