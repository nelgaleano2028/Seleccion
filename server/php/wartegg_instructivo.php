<?php 
session_start();
require_once('class_administracion.php');
$ruta='wartegg_instructivo';
$grupo=$_SESSION['grupo'];
$obj= new Administracion();
$orden=$obj->orden($ruta,$grupo);

$arreglo=$obj->orden_instructivo($grupo);

$posicion=(int)array_search($orden['orden'],$arreglo);

$id_prueba=$arreglo[++$posicion];

$prueba=$obj->traer_siguiente_prueba($id_prueba,$grupo);

?>
<html>
  <head>
    <title>WARTEGG</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  </head>
  <body>
		
       	<div class="estirar_form2">
              
			<div class="cambia" >
				<div class="modal-header">
					<h3 id="myModalLabel" style="text-align:center">TEST WARTEGG</h3>					
					<div style="display:none;" id="counter">60:00</div>			
			    </div>
				<div class="modal-body">
				 	<div style="text-align:center; font-weight:bold; font-size: 20px">INSTRUCCIONES</div>
							<br>
							<div style="font-size: 18px; text-align: justify">
								<p>El test de Wartegg es una prueba sicológica proyectiva que permite conocer algunos aspectos de la personalidad del candidato, así como su posición frente al mundo,
								las relaciones interpersonales, estados de ánimo y preferencias. Por ende, no mide aptitudes artísticas.</p>

								<p>Este tipo de examen consta de  16 campos, cada uno con un estímulo diferente para que el aspirante realice un dibujo libre, parte del cuadro más fácil al de mayor
								dificultad y marca este orden.</p>

								<p>Es una prueba simple, corta y de fácil aplicación e interpretación. Sin embargo es subjetiva, no tiene la verdad absoluta y solo mide algunos rasgos de la personalidad.
								Tradicionalmente, el dibujo ha sido una herramienta con la que las personas proyectan algo de sí mismas, de su situación emocional y sicológica, esto sirve para 
								observar si hay algún factor de trastorno o enfermedad. </p><br>
							
								<p style="font-weight:bold">ESPERE LA SEÑAL DE COMIENZO</p>
							</div>
							<br>
							<br>	
					<div style="text-align:center; display:block" >
						<input id="pruebas_Btn" type="button" class="<?php echo $prueba ?> <?php echo $orden['orden'] ?> <?php echo $grupo ?> btn btn-primary" value="Empezar"/>				
					</div>
				</div>
				
				


         	</div>
        </div>

        <div id="pruebas" style="display:none;">

			
		
		</div>


<script src="../../js/caras.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>	

		
</body>
</html>