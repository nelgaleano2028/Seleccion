<?php 
session_start();
require_once('class_administracion.php');
$ruta='aprendizaje_instructivo';
$grupo=$_SESSION['grupo'];
$obj= new Administracion();
$orden=$obj->orden($ruta,$grupo);

?>


<html>
  <head>
    <title>APRENDIZAJE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  </head>
  <body>
		
       	<div class="estirar_form2">
              
			<div class="cambia" >
			
				<div class="modal-header">				
					<h3 id="myModalLabel" style="text-align:center">TEST DE ESTILOS DE APRENDIZAJE</h3>
					<h4 id="myModalLabel" style="text-align:center">Sistema de Representacion Favorito</h4>
					<div style="display:none;" id="counter">60:00</div>
				</div>
				
				
				<div class="modal-body">
					<div style="text-align:center; font-weight:bold; font-size: 20px">INSTRUCCIONES</div>
							<br>
							<div style="font-size: 18px; text-align:justify">
								<p>A continuacion  usted va a encontrar  una serie de preguntas de seleccion multiple. Debe elegir entre una de las 3 opciones o en tal caso si
|								se le piden que marque 2; la opcion con las que mas se identifique o se ajuste a su forma de pensar/actuar.</p><br>
						
								<p style="font-weight:bold">ESPERE LA SEÑAL DE COMIENZO</p>
							</div>
							<br>
							<br>				

					<div style="text-align:center; display:block" >
						<input id="pruebas_Btn" type="button" class="test_aprendizaje <?php echo $orden['orden'] ?> <?php echo $grupo ?> btn btn-primary" value="Empezar"/>
					</div>
				</div>


         	</div>
        </div>

        <div id="pruebas" style="display:none;">

			
		
		</div>


<script src="../../js/caras.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>	

		
</body>
</html>