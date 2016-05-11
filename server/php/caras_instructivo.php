<?php 
session_start();
require_once('class_administracion.php');
$ruta='caras_instructivo';
$grupo=$_SESSION['grupo'];
$obj= new Administracion();
$orden=$obj->orden($ruta,$grupo);
?>
<html>
  <head>
    <title>Caras Instructivo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../css/style_caras.css?css=<?php echo rand(1, 100);?>"  />
  </head>
  <body> 	
		
       	<div class="estirar_form2">              
			<div class="cambia" style="height:736px;">	
			
				<div class="modal-header">				
					<h3 id="myModalLabel" style="text-align:center">TEST DE PERCEPCION DE DIFERENCIAS</h3>
					<h4 id="myModalLabel" style="text-align:center">CARAS</h4>
					<div style="display:none;" id="counter">60:00</div>
				</div>
				
				<div class="modal-body" style="max-height: 720px !important">
				 	
							<div style="text-align:center; font-weight:bold; font-size: 20px">INSTRUCCIONES</div>
							<br>
							<div style="font-size: 18px;  text-align:justify">
								<p>Observe las siguiente fila de caras. Una de las caras es distinta a las otras. La cara que es distinta esta marcada con un punto.</p>
						
								<div style="text-align:center">
									<img src="../../img/caras_ejemplo1.png" /><br>
									
									<input type="radio" name="1" value="A">A
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio" name="1" value="B" checked="true">B
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio" name="1" value="C">C									
								</div>
								<br>
						
							
						
								<p>¿Puede apreciar el motivo por la cual esta marcada?, la boca es la parte distinta.</p>
						
								<p>A continuacion hay otra fila de caras. Mirela y marque una la cual se diferencia de las otras.</p>
								
								
								
								<br>
								<div style="text-align:center">
									<img src="../../img/caras_ejemplo2.png" /><br>
									<input type="radio" name="2" value="A">A
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio" name="2" value="B">B
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio" name="2" value="C">C
								</div>
								<br>
								
						
								<p>Debio haber marcado la ultima cara.</p>
								<br>
								<p style="font-weight:bold">ESPERE LA SEÑAL DE COMIENZO</p>
							</div>
							<br>
							
							
						   <div  style="text-align:center; display:block">
								<input id="pruebas_Btn" type="button" class="caras <?php echo $orden['orden'] ?> <?php echo $grupo ?> btn btn-primary" value="Empezar"/>
						   </div>
				</div>
				
         	</div>
        </div>

		<!-- OJO Es para mostrar el contenido de la Prueba -->
        <div id="pruebas" style="display:none;">

			
		
		</div>

<script src="../../js/alert.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>	
<script src="../../js/caras.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>		

</body>
</html>