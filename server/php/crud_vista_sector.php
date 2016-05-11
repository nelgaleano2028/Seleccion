<?php session_start();

require_once("class_crud_modelo.php");

$obj= new  Crud();

$datos=$obj-> consultar_datos_sector();
?>
<html>
<head>
    <title>Crud Dinamico</title>
     <meta name="tipo_contenido"  content="text/html;" http-equiv="content-type" charset="utf-8">
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
					
					
						<th style="color:white; font-weight: bold" width="8%" scope="col">NOMBRE DEL SECTOR</th>
													
								
			        </tr>
			    </thead>
				
				
				<tbody>
						<?php 
						
						
							if($datos > 0){
								for($i=0; $i<count($datos); $i++){ 
						?>
						<tr id='<?php echo $datos[$i]['id']; ?>'> 
							
							<td align="center"><?php echo $datos[$i]['nom_sector']; ?></td>
							
							
							
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
        
		
        <label for="platforms">Nombre Sector</label>
		<br />
		<input type="text" name="nom_sector" id="nom_sector" class="required" rel="0" />
		
		
		
		
</form>
	

	
		
		<script src="../../js/jquery.min.js" type="text/javascript"></script>
        <script src="../../js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="../../js/jquery.jeditable.js" type="text/javascript"></script>
        <script src="../../js/jquery-ui.js" type="text/javascript"></script>
        <script src="../../js/jquery.validate.js" type="text/javascript"></script>
		<script src="../../js/jquery.dataTables.editable.js" type="text/javascript"></script>
		<script type="text/javascript" charset="utf-8" src="../../js/script_datatable_sector.js"></script>

</body>
</html>


</body>
</html>