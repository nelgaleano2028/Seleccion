<?php
session_start();
require_once('class_administracion.php');
$ruta='aprendizaje_instructivo';
$grupo=$_SESSION['grupo'];
$obj= new Administracion();
$orden=$obj->orden($ruta,$grupo);



if($orden['tiempo']=="00:00"){	
	 $tiempo="<span style='display:none'>xxxx</span>";	 
}else{
	$tiempo=$orden['tiempo'];
	
}
?>

<html>
<head>
    <title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
    
	
    <link rel="stylesheet" href="../../css/bootstrap.min.css?css=<?php echo rand(1, 100);?>" />
    <link rel="stylesheet" href="../../css/style.css?css=<?php echo rand(1, 100);?>"  />
    <link rel="stylesheet" href="../../css/font-awesome/css/font-awesome.css?css=<?php echo rand(1, 100);?>" />
	<link rel="stylesheet" href="../../css/datepicker.css?css=<?php echo rand(1, 100);?>" />
	
	<style>
		.pregunta, .preg, .resp{
		display:block;
		margin-top:10px;
		}
		div.resp div{
			margin-left:20px;
			
		}
		.preg{
			font-weight:bold;
			font-size:14px;
		
		}
	</style>
</head>
<body>
	
	<div class="row">
		
		<div class="estirar_form2">
		
			<div class="cambia">
			
				<div class="modal-header">
					<div id="descripcion" style="display:block; text-align:center; font-size:20px; font-weight:bold">TEST DE ESTILOS DE APRENDIZAJE</div>
					<br>
					<div style="display:block; text-align:center; font-size:20px; font-weight:bold; position: fixed; left: 600px; top: 40px; z-index: 99999;">	
						<p style="color:#D61212; text-align:center; font-size:18px;"  id="counter"><?php echo $tiempo ?></p>
					</div>					
				</div>
				
				
				<form method="post" id="<?php echo $grupo; ?>"  class="<?php echo $orden['orden']; ?>" action="test_insert_aprendizaje.php">
				
				
					<div class="modal-body2">
						
						<div class="pregunta">
								<div class="preg">
									1. Cuando esta en una capacitacion y el facilitador explica algo que esta escrito en el tablero o proyectado en una diapositiva, usted comprende con mas facilidad de la siguiente manera:
								</div>
								<div class="resp">
									<div><input type="radio" name="1"  id="1p" value="A"> Escuchando al facilitador</div>
									<div><input type="radio" name="1"  id="2p" value="V"> Leyendo el tablero, o leyendo la diapositiva</div>
									<div><input type="radio" name="1"  id="1p" value="K"> Permaneciendo a la espera que le den algo por hacer a Ud, un ejercicio practico.</div>
								</div>
						</div>
						<div class="pregunta">
								<div class="preg">
									2. Normalmente Ud. se distrae en una capacitacion porque:
								</div>
								<div class="resp">
									<div><input type="radio" name="2"  id="2p" value="A"> Lo distraen los ruidos</div>
									<div><input type="radio" name="2"  id="2p" value="V"> Lo distrae el movimiento de las demas personas</div>
									<div><input type="radio" name="2"  id="2p" value="K"> Lo distrae que las explicaciones sean muy largas</div>
								</div>
						</div>
						<div class="pregunta">
								<div class="preg">
									3. Cuando le dan instrucciones sobre algo para ahcer Ud:
								</div>
								<div class="resp">
									<div><input type="radio" name="3"  id="3p" value="K"> Se pone en movimiento antes de que terminen de explicar lo que hay que hacer</div>
									<div><input type="radio" name="3"  id="3p" value="V"> Le cuesta recordar las instrucciones orales, pero no hay problema se se las dan por escrito</div>
									<div><input type="radio" name="3"  id="3p" value="A"> Recuerda facilmente las instrucciones exactas que le dijeron</div>
								</div>
						</div>
						<div class="pregunta"> 
								<div class="preg">
									4. Cuando debe aprenderse algo de memoria Ud:
								</div>
								<div class="resp">
									<div><input type="radio" name="4" id="4p" value="V"> Memoriza lo que ve y recuerda la imagen(por ejemplo la pagina de un libro)</div>
									<div><input type="radio" name="4" id="4p" value="A"> Memoriza si repite ritmicamente y paso a paso una instruccion</div>
									<div><input type="radio" name="4" id="4p" value="K"> Memoriza paseando, mirando y recordando una idea en general</div>
								</div>
						</div>
						<div class="pregunta">
								<div class="preg">
									5. Lo que mas le gusta de las capacitaciones es que:
								</div>
								<div class="resp">
									<div><input type="radio" name="5" id="5p" value="A"> Se originen debates y haya dialogo</div>
									<div><input type="radio" name="5" id="5p" value="K"> Se organicen actividades en las que los participantes puedan moverse y hacer cosas</div>
									<div><input type="radio" name="5" id="5p"value="V"> Que le den material escrito, fotos o diagramas</div>
								</div>
						</div>
						<div class="pregunta">
								<div class="preg">
									6. Marque <span style="text-decoration:underline">DOS<span> frases con las que Ud. mas se identifique:
								</div>
								<div class="resp">
								
								
									<div><input type="radio" name="6radio1" id="6radio1"  value="V" class="radios 6p"> Cuando escucho a un facilitador me gusta hacer garabatos en un papel, escribir o dibujar algo</div>
									<div><input type="radio" name="6radio2" id="6radio2" value="K" class="radios 6p" > Soy intuitivo, muchas veces me gusta o disgusta alguien sin saber bien el por que</div>
									<div><input type="radio" name="6radio3" id="6radio3" value="K" class="radios 6p"> Me gusta tocar las cosas y tiendo a acercarme mucho a la gente cuando hablo</div>
									<div><input type="radio" name="6radio4" id="6radio4"  value="V" class="radios 6p"> Mis cuadernos y libreta de notas estan ordenados y bien presentados. Me molestan los tachones y las correcciones</div>
									<div><input type="radio" name="6radio5" id="6radio5" value="A" class="radios 6p"> Me gustan mas los chistes que leer las tiras comicas</div>
									<div><input type="radio" name="6radio6" id="6radio6" value="A"  class="radios 6p"> Suelo hablar en voz alta, conmigo mismo cuando estoy haciendo algun trabajo.</div>
									
									
								</div>
						</div>
						<div class="pregunta">
								<div class="preg">
									7. Recuerde la utima conversacion que tuvo antes de venir a este lugar. ¿Que fue lo primero que recordo?:
								</div>
								<div class="resp">
									<div><input type="radio" name="7" id="7p" value="L"> El tema y las palabras de la conversacion que tuvo</div>
									<div><input type="radio" name="7" id="7p" value="H"> La o las personas o el lugar en donde se encontraba</div>
								</div>
						</div>
						<div class="pregunta">
								<div class="preg">
									8. Se siente incomodo cuando se le asignan tareas o talleres, en los que no esta clara la instruccion de lo que debe hacer
								</div>
								<div class="resp">
									<div><input type="radio" name="8" id="8p" value="H"> V</div>
									<div><input type="radio" name="8" id="9p" value="L"> F</div>		
								</div>
						</div>
						<div class="pregunta">
								<div class="preg">
									9. En el trabajo le preocupa mas el proceso de las tareas que el resultado final
								</div>
								<div class="resp">
									<div><input type="radio" name="9" id="10p" value="L"> V</div>
									<div><input type="radio" name="9" id="11p" value="H"> F</div>
								</div>
						</div>
						<div class="pregunta">
								<div class="preg">
									10. Prefiere leer el libro que ver la pelicula en la que se narra la historia del libro
								</div>
								<div class="resp">
									<div><input type="radio" name="10" id="12p" value="H"> V</div>
									<div><input type="radio" name="10" id="13p" value="L"> F</div>
								</div>
						</div>
						<div class="pregunta">
								<div class="preg">
									11. Se siente incomodo en actividades que tengan muchas reglas o restricciones
								</div>
								<div class="resp">
									<div><input type="radio" name="11" id="14p" value="L"> V</div>
									<div><input type="radio" name="11" id="15p" value="H"> F</div>
								</div>
						</div>
						<div class="pregunta">
								<div class="preg">
									12. Cuando debe tomar decisiones laborales prefiere hacerle caso a la razon mas que a la intuicion
								</div>
								<div class="resp">
									<div><input type="radio" name="12" id="16p" value="H"> V</div>
									<div><input type="radio" name="12" id="17p" value="L"> F</div>
								</div>
						</div>
						<div class="pregunta">
								<div class="preg">
									13. Entiende con mas facilidad cuando la informacion esta organizada en un mapa conceptual(ideas generales) que cuando esta en un esquema(organizacion secuencial)
								</div>
								<div class="resp">
									<div><input type="radio" name="13" id="18p" value="L"> V</div>
									<div><input type="radio" name="13" id="19p" value="H"> F</div>
								</div>
						</div>
						<div class="pregunta">
								<div class="preg">
									14. Cuando va a explicarle algun tema a alguien empieza explicandole la idea general y luego las partes que lo componen
								</div>
								<div class="resp">
									<div><input type="radio" name="14" id="20p" value="L"> V</div>
									<div><input type="radio" name="14" id="21p" value="H"> F</div>
								</div>
						</div>
						<div class="pregunta">
								<div class="preg">
									15. Normalmente expresa sus emociones, sentimiento e impresiones sin dificultades a los demas
								</div>
								<div class="resp">
									<div><input type="radio" name="15" id="22p" value="L"> V</div>
									<div><input type="radio" name="15" id="23p" value="H"> F</div>
								</div>
						</div>	
					</div>

					<br>
				<div style="text-align:center; display:block" >
					<input id="enviar" type="submit" value="Siguiente Prueba" class="btn btn-primary">				
				</div>
				</form>
				
			</div>
		</div>
	</div>
	<script src="../../js/alert.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
	<script src="../../js/caras.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
</body>
</html>