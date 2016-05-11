<?php
session_start();
require_once('class_solicitudes.php');


$obj= new Solicitud();
$datos= $obj->get_aspirantes();


?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
    
	<link rel="stylesheet" href="../../css/chosen.css?css=<?php echo rand(1, 100);?>" />
</head>
<body>
	<div id="error"></div>
	<div class="container-fluid">
		<div class="row-fluid">
          <div class="dialog span4">
              
			<div class="cambia" >
				<div class="modal-header">
				
				<h3 id="myModalLabel">Solicitud</h3>
				</div>
				<div class="modal-body">
				 <form id="su_temp" method="post" enctype="multipart/form-data">
				 

				 <div id="val3">
                      <label class="login_label2 control-label">Estado - Aspirante:</label>
                        
							<select name="cedula" id="cedula">
							<option value="">Seleccione Aspirante...</option>
							<?php
								for($i=0; $i<count($datos); $i++){
								
								echo "<option value='".@$datos[$i]['cedula']."' >".@$datos[$i]['estado']."&nbsp;&nbsp;-&nbsp;&nbsp;".@$datos[$i]['nombre']."</option>";
								
								}
							?>

						</select>
						
				 </div>


				 <div id="val3">
                      <label class="login_label2 control-label">Pruebas:</label>
                        <div class="controls">
							<select name="prueba" id="prueba">
								<option value="">Seleccione Prueba...</option>
								<option value="16pf">16PF</option>
								<option value="CMT">CMT</option>
								<option value="Wartegg">Wartegg</option>
								<option value="Otros">Otros</option>
								<option value="Prueba_Tecnica">Prueba Tecnica</option>
								<option value="Referencias_laborales">Referencia laborales</option>
							</select>
						</div>
				 </div>

				  <div id="val3">
                      <label class="login_label2 control-label">Detalle:</label>
                        <div class="controls">
							<textarea cols="80" rows="5" style='text-transform: uppercase; resize: none;' id="detalle"></textarea>
						</div>
				 </div>

				 <div id="val3">
                       <label class="login_label2 control-label" for="passv">Archivos</label>
                        <div class="controls">
							<input id="archivos" type="file" name="archivos[]" multiple="multiple"  />
						</div>  
				 </div>


				 <div id="cargados">
					<!-- Aqui van los archivos cargados -->
				 </div>
				  <div><input id="solicitud_2" type="button" class="btn btn-primary" value="Enviar"/></div>
				  </form>
				</div>
          </div>
		</div>
    </div>


    <script src="../../js/chosen.jquery.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
    <script src="../../js/alert.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
	<script src="../../js/solicitud_2.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
</body>
</html>