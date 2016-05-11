<?php session_start();
date_default_timezone_set('America/Bogota');

require_once('class_utilidades.php');
require_once('class_empleado.php');

$obj4= new Empleado();

$datos4= $obj4-> aspirante_integral($_GET['cedula'])



?>

<html>
<head>
    <title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>

</head>
<body>


	<div id="contenido11">
		<div class="container-fluid">
			<div class="row-fluid">
	          	<center>
						<div class="cambia" style="height:550px; width:850px">
							
							<div class="modal-header" style="text-align:center">							
								<h3 id="myModalLabel">OBSERVACIONES GENERALES DE ENTREVISTA PSICOSOCIAL</h3>
							</div>

							<div class="modal-body" style="max-height: 479px !important;">
							 <form class="info_observacion" method="post">
								


								<div style="float:left; width:100%; margin-top:10px">
									<span style="font-weight:bold">OBSERVACION</span><br><br>
									<textarea style=" resize: none; width:800px"  class="observacion_psico" name="observacion_psico" cols="90" rows="9"><?php echo @$datos4['observacion_psico'] ?></textarea>		
								</div>
									

								  <input type="hidden" name="id"  value="<?php echo $_GET['id']?>" />

								  <input type="hidden" name="cedula"  value="<?php echo $_GET['cedula']?>" />
								
								  <div style="float:left; width:100%; margin-top:50px">
								  		<input type="button" class="btn btn-primary ant_general"  value="Anterior"/>&nbsp;
								  		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  		<input type="button" class="btn btn-primary enviar_observaciones"  value="Siguiente"/>
								  </div>
								

							  </form>
							</div>
			          	</div>
				</center>
	   		 </div>
	    </div>
	</div>

	<div id="contenido12">

    		

    </div>


   
    <script src="../../js/alert.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
    <script src="../../js/consultar_inf.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
</body>
</html>