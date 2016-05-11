<?php session_start();

require_once("class_administracion.php");

$obj= new Administracion();

$lista= $obj->grupo();

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
	
</head>
<body>
	<div id="body">
		<div id="wrapper">
			<div id="header">
				<form class="form-inline">
					<select class="grupo">
					 <option value="-1">Seleccione Grupo</option>
			  
					 <?php 
						for($i=0; $i<count($lista);$i++){
						
							echo "<option value='".@$lista[$i]['id']."' id='".@$lista[$i]['id']."'>".@$lista[$i]['nombre']."</option>";		
					
						} 
					 ?>
				  </select>

				</form>
			</div>

			<div id="contenido">
		 		<!--Aca carga el formulario -->
			</div>
		</div>
	</div>

    <script src="../../js/alert.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
	<script src="../../js/seleccion_grupo.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
</body>
</html>