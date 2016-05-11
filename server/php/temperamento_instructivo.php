<?php 
session_start();
require_once('class_administracion.php');
$ruta='temperamento_instructivo';
$grupo=$_SESSION['grupo'];
$obj= new Administracion();
$orden=$obj->orden($ruta,$grupo);

?>
<html>
  <head>
    <title>CARAS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  </head>
  <body>
		
       	<div class="estirar_form2">
              
			<div class="cambia" >
				<div class="modal-header">
					<h3 id="myModalLabel" style="text-align:center">TEST DEL TEMPERAMENTO HUMANO</h3>					
					<div style="display:none;" id="counter">60:00</div>			
			    </div>
				<div class="modal-body">
				 	<div style="text-align:center; font-weight:bold; font-size: 20px">INSTRUCCIONES</div>
							<br>
							<div style="font-size: 18px; text-align:justify">
								<p>A continuacion, usted encontrara por cada fila numerada(lineas horizontales) cuatro rasgos o caracteristicas humanas. Su tarea es indicar la opcion con la que 
								mas se identifique, se acerque o refleje su personalidad. Tenga en cuenta que estas caracteristicas estan presentes en usted la mayor parte del tiempo.<p>
								
								<p>Lea cuidadosamente, cada una de las afirmaciones. Gracias.</p>
						
								<p style="font-weight:bold">ESPERE LA SEÑAL DE COMIENZO</p>
							</div>
							<br>
							<br>	
					<div style="text-align:center; display:block" >
						<input id="pruebas_Btn" type="button" class="pruebaTemperamento <?php echo $orden['orden'] ?> <?php echo $grupo ?> btn btn-primary" value="Empezar"/>
					</div>
				</div>


         	</div>
        </div>

        <div id="pruebas" style="display:none;">

			
		
		</div>


<script src="../../js/caras.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>	

		
</body>
</html>