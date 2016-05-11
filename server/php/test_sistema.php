<?php
session_start();
require_once('class_requisicion.php');
require_once('class_utilidades.php');

date_default_timezone_set('America/Bogota');
$fechaDiaSys=date('d');
$fechaMesSys= date('m');
$fechaAnioSys= date('Y');
$fechaSys= date('d-m-Y');

$obj= new Requisicion();
$datos= $obj->get_centroCostoJefe($_SESSION['cod_epl']);

$obj2= new Utilidades();
$fechaMes=$obj2->mesEsp($fechaMesSys);

$obj3= new Requisicion();
$ausencias=$obj3->get_ausencias();

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
    
	<!-- Bootstrap -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css?css=<?php echo rand(1, 100);?>" />
    <link rel="stylesheet" href="../../css/style.css?css=<?php echo rand(1, 100);?>"  />
    <link rel="stylesheet" href="../../css/font-awesome/css/font-awesome.css?css=<?php echo rand(1, 100);?>" />
	<link rel="stylesheet" href="../../css/datepicker.css?css=<?php echo rand(1, 100);?>" />
</head>
<body>
	<div id="error"></div>
	
	<div class="row">
		
		<div class="estirar_form2">
		
			<div class="cambia">
			
				<div class="modal-header">
					<h3 id="myModalLabel">TEST DE SISTEMA DE APRENDIZAJE</h3>
				</div>
				<div id="obligatorio2" style="color:red; text-align:center; display:none;" id="obligatorio">Los campos con (*) son requeridos</div>
				<form method="post" id="test_sistema" class="active">
				<!--inicio modal-body3-->
				
					<div class="modal-body2">

						<div style="clear:both"></div>

						<div class="label1">
							<p>Elige la opcion más adecuada a) b) o c)</p>

						</div>

						<div style="clear:both"></div>

						<div style="text-align:justify">
							<p>1. Cuando estás en una capacitación y el facilitador explica algo qye está escrito en el tablero,
								te es más fácil seguir las explicaciones</p>
						</div>

						<div class="label3">

							<label class="radio">
							<input type="radio" name="1"  value="a" >
							A) escuchando el facilitador
							</label>

							<label class="radio">
							<input type="radio" name="1"  value="b" >
							b) Leyendo el tablero
							</label>

							<label class="radio">
							<input type="radio" name="1"  value="c" >
							c) Leyendo el tablero
							</label>

						</div>

						<div style="clear:both; margin-botton:10px;"></div>

						<div style="text-align:justify">
							<p>2. Cuando estás en una capacitación</p>
						</div>
						<div class="label3">

							<label class="radio">
							<input type="radio" name="2"  value="a" >
							a) Te distraen los ruidos
							</label>

							<label class="radio">
							<input type="radio" name="2"  value="b" >
							b) Te distrae el movimiento
							</label>

							<label class="radio">
							<input type="radio" name="2"  value="c" >
							c) Te distraes cuando las explicaciones son demasiadas largas
							</label>

						</div>


						<div style="clear:both; margin-botton:10px;"></div>

						<div style="text-align:justify">
							<p>3. Cuando te dan instrucciones</p>
						</div>
						<div class="label3">

							<label class="radio">
							<input type="radio" name="3"  value="a" >
							a) Te pones en movimiento antes de que acaben de hablar y explicar lo que hay que hacer
							</label>

							<label class="radio">
							<input type="radio" name="3"  value="b" >
							b) Te cuesta recordar las intrucciones orales, pero no hay problema si te las dan por escrito
							</label>

							<label class="radio">
							<input type="radio" name="3"  value="c" >
							c) Recuerdas con facilidad las palabras exactas que te dijieron
							</label>

						</div>


						<div style="clear:both; margin-botton:10px;"></div>

						<div style="text-align:justify">
							<p>4. Cuando tienes que aprender algo de memoria</p>
						</div>
						<div class="label3">

							<label class="radio">
							<input type="radio" name="4"  value="a" >
							a) Memorizas lo que ves y recuerdas la imagen (Por ejemplo la página del libro)
							</label>

							<label class="radio">
							<input type="radio" name="3"  value="b" >
							b) Te cuesta recordar las intrucciones orales, pero no hay problema si te las dan por escrito
							</label>

							<label class="radio">
							<input type="radio" name="3"  value="c" >
							c) Recuerdas con facilidad las palabras exactas que te dijieron
							</label>

						</div>


						<div style="clear:both; margin-botton:10px;"></div>

						<div style="text-align:justify">
							<p>5. En las capacitaciones lo que más te gusta es que:</p>
						</div>
						<div class="label3">

							<label class="radio">
							<input type="radio" name="5"  value="a" >
							a) Se orginen debates y que haya dialogo
							</label>

							<label class="radio">
							<input type="radio" name="5"  value="b" >
							b) Que se organicen actividades en que los participantes tengan que hacer cosas y puedan moverse
							</label>

							<label class="radio">
							<input type="radio" name="5"  value="c" >
							c) Que te den material escrito, fotos y diagrama.
							</label>

						</div>


						<div style="clear:both; margin-botton:10px;"></div>

						<div style="text-align:justify">
							<p>6. Marca las <strong>DOS</strong> frases con las que te identificas más</p>
						</div>
						<div class="label3">

							<label class="radio">
							<input type="radio" name="6a"  value="a" >
							a) Cuando escuchas al profesor o capacitador te gusta hacer garabatos en un papel
							</label>

							<label class="radio">
							<input type="radio" name="6b"  value="b" >
							b) Eres visceral e intuitivo, muchas veces te gusta/disgusta la gente sin saber bien el porqué
							</label>

							<label class="radio">
							<input type="radio" name="6c"  value="c" >
							c) Te gusta tocar las cosas y entiendes a cercarte mucho a la gente cuando hablas.
							</label>

							<label class="radio">
							<input type="radio" name="6d"  value="d" >
							c) Tus cuadernos y libretos están bien ordenados y bien presentados, te molestan los tachones y correciones
							</label>


							<label class="radio">
							<input type="radio" name="6e"  value="e" >
							e) Prefieres los chistes y comics
							</label>

							<label class="radio">
							<input type="radio" name="6f"  value="f" >
							e) Sueles hablar contigo mismo cuando estás haciendo algún trabajo
							</label>

						</div>
						<div style="clear:both; margin-botton:10px;"></div>

						<div style="text-align:center"><strong>Cuestionario sobre la organización mental de la información</strong></div>

						<div style="text-align:justify">
							<p>1. Recuerda tu ultima conversación. Que se te vino primero a la cabeza</p>
						</div>
						<div class="label3">

							<label class="radio">
							<input type="radio" name="7"  value="a" >
							a) Las palabras o temáticas de la conversación
							</label>

							<label class="radio">
							<input type="radio" name="7"  value="b" >
							b) Las personas con las que hablas o en lugar en dónde estaban
							</label>
						</div>
						<div style="clear:both; margin-botton:10px;"></div>

						<div style="text-align:justify">
							<p>2. Se siente incomodoo/a en actividades y talleres abiertosy poco estructurados donde no este clara la instrucción de lo que se  va hacer</p>
						</div>

						<div class="label3">

							<label class="radio">
							<input type="radio" name="8"  value="F" >
							F
							</label>

							<label class="radio">
							<input type="radio" name="8"  value="v" >
							v
							</label>
						</div>

						<div style="clear:both; margin-botton:10px;"></div>
						<div style="text-align:justify">
							<p>3. En un ámbito laboral le preocupa más el proceso que el resultado final</p>
						</div>


						<div class="label3">

							<label class="radio">
							<input type="radio" name="9"  value="F" >
							F
							</label>

							<label class="radio">
							<input type="radio" name="9"  value="v" >
							v
							</label>
						</div>

						<div style="clear:both; margin-botton:10px;"></div>
						<div style="text-align:justify">
							<p>4. Prefiere leer un libro que ver película en que se narra la historia del libro</p>
						</div>


						<div class="label3">

							<label class="radio">
							<input type="radio" name="10"  value="F" >
							F
							</label>

							<label class="radio">
							<input type="radio" name="10"  value="v" >
							v
							</label>
						</div>


						<div style="clear:both; margin-botton:10px;"></div>
						<div style="text-align:justify">
							<p>5. Se siente incomodo/a en actividades que tenga muchas reglas y restricciones</p>
						</div>


						<div class="label3">

							<label class="radio">
							<input type="radio" name="11"  value="F" >
							F
							</label>

							<label class="radio">
							<input type="radio" name="11"  value="v" >
							v
							</label>
						</div>

						<div style="clear:both; margin-botton:10px;"></div>
						<div style="text-align:justify">
							<p>6. Cuando debe tomar una decisión en el ámbito laboral generalmente predomina mas la razón que la intuición</p>
						</div>


						<div class="label3">

							<label class="radio">
							<input type="radio" name="13"  value="F" >
							F
							</label>

							<label class="radio">
							<input type="radio" name="13"  value="v" >
							v
							</label>
						</div>

						<div style="clear:both; margin-botton:10px;"></div>
						<div style="text-align:justify">
							<p>7. Entiende con mas facilidad la información organizada en un mapa conceptual que en un esquema donde la información está organizada de manera secuencial</p>
						</div>


						<div class="label3">

							<label class="radio">
							<input type="radio" name="14"  value="F" >
							F
							</label>

							<label class="radio">
							<input type="radio" name="14"  value="v" >
							v
							</label>
						</div>


						<div style="clear:both; margin-botton:10px;"></div>
						<div style="text-align:justify">
							<p>8. Cuando deseas brindar información a otra persona empiezas explicando la idea global y luego las partes que lo componen</p>
						</div>


						<div class="label3">

							<label class="radio">
							<input type="radio" name="15"  value="F" >
							F
							</label>

							<label class="radio">
							<input type="radio" name="15"  value="v" >
							v
							</label>
						</div>


						<div style="clear:both; margin-botton:10px;"></div>
						<div style="text-align:justify">
							<p>9. Con frecuencia expresa tus emociones e impresiones a los demás</p>
						</div>


						<div class="label3">

							<label class="radio">
							<input type="radio" name="16"  value="F" >
							F
							</label>

							<label class="radio">
							<input type="radio" name="16"  value="v" >
							v
							</label>
						</div>
					</div>
				</form>
				<!--Fin modal-body3-->
			</div>
		</div>
	</div>
	
	<script src="../../js/test_sistema.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
</body>
</html>