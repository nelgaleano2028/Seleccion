<?php session_start();
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
					<select class="anio">
					 <option value="-1">Seleccione A&ntilde;o</option>
					 <option value="2014">2014</option>
					 <option value="2015">2015</option>

				  </select>

				</form>
			</div>

			<div id="contenedor">
		 		<!--Aca carga el formulario -->
			</div>
		</div>
	</div>

    <script src="../../js/alert.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
	<script src="../../js/historial_cerrados.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
</body>
</html>