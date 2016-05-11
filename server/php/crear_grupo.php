<?php
session_start();
?>

<html>
<head>
    <title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
	
</head>
<body>
	<div id="error"></div>
	<div class="container-fluid">
		<div class="row-fluid">
          <div class="dialog span4">
              
			<div class="cambia" >
				<div class="modal-header">
				
				<h3 id="myModalLabel">Crear Grupo</h3>
				</div>
				<div class="modal-body">
				 <form id="crear_grupo" method="post">
				 
				 
                      <label class="login_label control-label" for="grupo">Grupo:</label>
                        <div class="controls">
							<input type="text" name="grupo" id="grupo" />
						</div>
				 

				  <div><input type="submit" class="btn btn-primary" value="Enviar"/></div>
				  </form>
				</div>
          </div>
		</div>
    </div>

    <script src="../../js/alert.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
	<script src="../../js/crear_grupo.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
</body>
</html>