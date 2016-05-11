<?php 
session_start();
require_once('class_administracion.php');

$ruta='bg3_instructivo';
$grupo=$_SESSION['grupo'];
$obj= new Administracion();
$orden=$obj->orden($ruta,$grupo);
?>

<html>
  <head>
    <title>BG3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  </head>
  <body>
		
       	<div class="estirar_form2">
              
			<div class="cambia" style="height:600px;">
			
				<div class="modal-header">							
					<h3 id="myModalLabel" style="text-align:center">TEST B.G.3</h3>					
					<div style="display:none;" id="counter">60:00</div>
				</div>
				
				<div class="modal-body" style="max-height: 500px !important">
					
					<div style="text-align:center; font-weight:bold; font-size: 20px">INSTRUCCIONES</div>
							<br>
							<div style="font-size: 18px; text-align:justify">
								<p>Observe el siguiente dibujo:</p>
						
								<p>Debes poner  los numeros de los dos cuadrantes que sean iguales. </p>
								
								<br><br>
								<div>
									<img src="../../img/bg3_ejemplo.png" />								
								</div>
								<br><br>
								
								<p style="font-weight:bold">ESPERE LA SEÑAL DE COMIENZO</p>
							</div>
							<br>
							<br>
							
						<div style="text-align:center; display:block" >
							<input id="pruebas_Btn" type="button" class="pruebabg3 <?php echo $orden['orden'] ?> <?php echo $grupo ?> btn btn-primary " value="Empezar"/>
						</div>
				 	
						
						
					</div>

         	</div>
        </div>

        <div id="pruebas" style="display:none;">

			
		
		</div>


<script src="../../js/caras.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>	

		
</body>
</html>