<?php 
session_start();
require_once('class_administracion.php');
$ruta='16pf_instructivo';
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
</head>
<body>

	<div class="row">

		<div class="estirar_form2">
			<div class="cambia">
			<div class="modal-header">
					<div id="descripcion" style="display:block; text-align:center; font-size:20px; font-weight:bold">TEST DE 16PF</div>
					<br>
					<div style="display:block; text-align:center; font-size:20px; font-weight:bold; position: fixed; left: 600px; top: 40px; z-index: 99999;">	
						<p style="color:#D61212; text-align:center; font-size:18px;"  id="counter"><?php echo $tiempo ?></p>
					</div>					
				</div>
			

				
				<form method="post" id="<?php echo $grupo; ?>"  class="<?php echo $orden['orden']; ?>" action="test_16pf.php" >
					<div class="modal-body2">
						<div style="text-align:justify;margin-top:20px;">
							<p><strong>1.</strong> He comprendido bien las instrucciones para contestar al cuestinario:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="1" class="1pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="1" class="1pf" value="b" >
							<strong>B) No estoy seguro</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="1" class="1pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>2.</strong> Estoy dispuesto a contestar todas las cuestiones con sinceridad:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="2" class="2pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="2" class="2pf" value="b" >
							<strong>B) No estoy seguro</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="2" class="2pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>3.</strong> ¿Cuáles de las siguientes palabras es diferente de la otras dos?:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="3B"  class="3pf" value="a" >
							<strong>A) Algo</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="3B"   class="3pf" value="b" >
							<strong>B) Nada</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="3B"  class="3pf"  value="c" >
							<strong>C) Mucho</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>4.</strong> Poseo suficiente energía para enfrentarme a todos mis problemas</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="4C" class="4pf"  value="a" >
							<strong>A) Siempre</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="4C"  class="4pf" value="b" >
							<strong>B) Frecuentemente</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="4C"  class="4pf" value="c" >
							<strong>C) Raras veces</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>5.</strong> Evito criticar a la gente y sus ideas</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="5E"  class="5pf" value="a" >
							<strong>A) Si</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="5E"  class="5pf" value="b" >
							<strong>B) Algunas veces</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="5E" class="5pf" value="c" >
							<strong>C) Nunca</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>6. </strong>Hago agudas y sarcásticas observaciones a la gente si creo que las merece:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="6E"  class="6pf" value="a" >
							<strong>A) Generalemente</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="6E" class="6pf"  value="b" >
							<strong>B) Algunas veces</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="6E"  class="6pf" value="c" >
							<strong>C) Nunca</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>7.</strong> Me gusta más la música semiclásica que las canciones populares:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="7F"  class="7pf" value="a" >
							<strong>A) Verdadero</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="7F" class="7pf" value="b" >
							<strong>B) No estoy seguro</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="7F"  class="7pf"value="c" >
							<strong>C) Falso</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>8.</strong> Si veo peleándose a los niños de mis vecinos:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="8G"  class="8pf"value="a" >
							<strong>A) Les dejo solucionar sus problemas</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="8G"  class="8pf"value="b" >
							<strong>B) No estoy seguro</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="8G" class="8pf" value="c" >
							<strong>C) Razono con ellos la solución</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>9. </strong>En situaciones sociales:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="9H"  class="9pf" value="a" >
							<strong>A) Fácilmente soy de los que toman iniciativas</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="9H"  class="9pf" value="b" >
							<strong>B) Intervengo algunas veces</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="9H" class="9pf" value="c" >
							<strong>C) Prefiero quedarme tranquilamente a distancia</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>10. </strong>sería mas interesante ser:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="10I" class="10pf" value="a" >
							<strong>A) Ingeniero de la construcción</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="10I"  class="10pf" value="b" >
							<strong>B) No estoy seguro entre los dos</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="10I" class="10pf" value="c" >
							<strong>C) Escritor de teatro</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>11. </strong>Generalmente puedo tolerar a la gente presuntuosa, aunque fanforronee o pienese demasiado bien de ella misma:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="11L"  class="11pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="11L"  class="11pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="11L"  class="11pf" value="c" >
							<strong>C) Falso</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>12.</strong> Cuando una persona no es honrada, casi siempre se le puede notar en la cara:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="12M"  class="12pf" value="a" >
							<strong>A) Verdadero </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="12M"  class="12pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="12M" class="12pf" value="c" >
							<strong>C) Falso</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>13.</strong> Aceptaría mejor los riesgos de un trabajo donde pudiera tener ganancias mayores, aunque eventuales, que otro con sueldo pequeño, pero seguro:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="13N"  class="13pf" value="a" >
							<strong>A) Sí </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="13N" class="13pf" value="b" >
							<strong>B) No estoy seguro</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="13N" class="13pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>



						<div style="text-align:justify;margin-top:20px;">
							<p><strong>14.</strong> De vez en cuando siento un vago temor o un repentino miedo, sin poder comprender las razones:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="14O" class="14pf" value="a" >
							<strong>A) Sí </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="14O" class="14pf" value="b" >
							<strong>B) Termino miedo</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="14O" class="14pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>15.</strong> Cuando me critican duramente por algo que no he hecho:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="15O" class="15pf" value="a" >
							<strong>A) No me siento culpable</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="15O" class="15pf" value="b" >
							<strong>B) Termino miedo</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="15O" class="15pf" value="c" >
							<strong>C) Todavía me siento un poco culpable</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>16. </strong>Casi todo se puede comprar con dinero:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="16Q1" class="16pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="16Q1" class="16pf" value="b" >
							<strong>B) No estoy seguro</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="16Q1" class="16pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>17.</strong> La mayoría de las personas serian más felices si convivieran mas con la gente de su nivel e hicieran las cosas como los demás:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="17Q2" class="17pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="17Q2" class="17pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="17Q2" class="17pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>18.</strong> En ocaciones, mirándome en un espejo, me entran dudas sobre lo que es mi derecha o izquierda:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="18Q3"  class="18pf" value="a" >
							<strong>A) Verdadero</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="18Q3" class="18pf" value="b" >
							<strong>B) No estoy seguro</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="18Q3" class="18pf" value="c" >
							<strong>C) Falso</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>19. </strong>Cuando algo realmente me pone furioso suelo calmarme muy pronto:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="19Q4" class="19pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="19Q4" class="19pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="19Q4" class="19pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>20.</strong> Preferiría tener una casa:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="20A" class="20pf" value="a" >
							<strong>A) En un barrio con vida social</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="20A" class="20pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="20A" class="20pf" value="c" >
							<strong>C) Aislada del bosque</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>21.</strong> Con el mismo horario y sueldo sería mas interesante ser:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="21A" class="21pf" value="a" >
							<strong>A) El cocinero de un restaurante</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="21A" class="21pf" value="b" >
							<strong>B) No estoy seguro entre ambos</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="21A" class="21pf" value="c" >
							<strong>C) El que sirve mesas en el restaurante</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>22. </strong>Cansado es a trabajar como orgullo es a:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="22B" class="22pf" value="a" >
							<strong>A) Sonreir</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="22B" class="22pf" value="b" >
							<strong>B) Tener exito</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="22B" class="22pf" value="c" >
							<strong>C) Ser feliz</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>23. </strong>Me pongo algo nervioso ante animales salvajes, incluso cuando están encerrados en fuertes jaulas:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="23C" class="23pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="23C" class="23pf" value="b" >
							<strong>B) No estoy seguro</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="23C" class="23pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>24.</strong> Una ley anticuada deberia cambiarse:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="24E" class="24pf" value="a" >
							<strong>A) Sólo después de muchas discusiones</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="24E" class="24pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="24E" class="24pf" value="c" >
							<strong>C) Inmediatamente</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>25. </strong>La mayor parte de las personas me consideran un iterlocutor agradable:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="25F"  class="25pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="25F"  class="25pf" value="b" >
							<strong>B) No estoy seguro</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="25F"  class="25pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>26. </strong>Me gusta salir a divertirme o ir a un espectáculo:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="26F" class="26pf"  value="a" >
							<strong>A) Mas de una vez por semana (más de lo corriente)</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="26F"  class="26pf" value="b" >
							<strong>B) Alrededor de una vez por semana (lo corriente)</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="26F" class="26pf"  value="c" >
							<strong>C) Menos de una vez por semana (menos de lo corriente)</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>27. </strong>Cuando veo gente desaliñada y sucia:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="27G"  class="27pf" value="a" >
							<strong>A) Lo acepto simplemente</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="27G" class="27pf"  value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="27G" class="27pf"  value="c" >
							<strong>C) Me disgusta y me fastidia</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>28.</strong> Estando en un grupo social me siento un poco turbado si de pronto paso a ser el foco de atención:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="28H" class="28pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="28H" class="28pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="28H" class="28pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>29. </strong>Cuando voy por la calle prefiero detenerme antes a ver a un artista pintando que a escuchar a la gente discutir:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="29I" class="29pf" value="a" >
							<strong>A) Verdadero</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="29I"  class="29pf"value="b" >
							<strong>B) No estoy seguro</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="29I" class="29pf" value="c" >
							<strong>C) Falso</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>30.</strong> Cuando me ponen al frente algo; insisto en que sigan mis instrucciones; en caso contrario renuncio:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="30L" class="30pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="30L" class="30pf" value="b" >
							<strong>B) Algunas veces</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="30L" class="30pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>31. </strong>Sería mejor que las vacaciones fueran más largas y obligatorias para todas las personas:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="31M"  class="31pf" value="a" >
							<strong>A) De acuerdo</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="31M" class="31pf" value="b" >
							<strong>B) No estoy seguro</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="31M" class="31pf" value="c" >
							<strong>C) En desacuerdo</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>32. </strong>Hablo acerca de mis sentimientos:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="32N" class="32pf" value="a" >
							<strong>A) Solo si es necesario</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="32N" class="32pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="32N" class="32pf" value="c" >
							<strong>C) Fácilmente, siempre que tengo ocasión</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>33. </strong>Me siento muy abatido cuando la gente me critica en un grupo:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="33O" class="33pf" value="a" >
							<strong>A) Verdadero</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="33O" class="33pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="33O" class="33pf" value="c" >
							<strong>C) Falso</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>34.</strong>Si mi jefe (profesor) me llama a su despacho:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="34O" class="34pf" value="a" >
							<strong>A) Aprovecho la ocasión para pedirle algo que deseo</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="34O" class="34pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="34O" class="34pf" value="c" >
							<strong>C) Temo haber hecho algo malo</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>35. </strong>Mis decisiones se apoyan en más en:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="35Q1" class="35pf" value="a" >
							<strong>A) El corazón</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="35Q1" class="35pf" value="b" >
							<strong>B) Los sentimientos y la razón por igual</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="35Q1" class="35pf" value="c" >
							<strong>C) La cabeza</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>36.</strong> En mi adolescencia pertenecía a equipos deportivos:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="36Q2" class="36pf" value="a" >
							<strong>A) Algunas veces</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="36Q2" class="36pf" value="b" >
							<strong>B) A menudo</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="36Q2" class="36pf" value="c" >
							<strong>C) La mayoría de la veces</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>37. </strong>Cuando hablo con alguien, me gusta:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="37Q3" class="37pf" value="a" >
							<strong>A) Decir las cosas tal como se me ocurren</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="37Q3" class="37pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="37Q3" class="37pf" value="c" >
							<strong>C) Organizar antes mis ideas</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>38. </strong>A veces me pongo en estado de tensión y agitación cuando pienso en los sucesos del día:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="38Q4" class="38pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="38Q4" class="38pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="38Q4" class="38pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>39. </strong>He sido elegido para hacer algo:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="39A" class="39pf" value="a" >
							<strong>A) Solo en pocas ocasiones</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="39A" class="39pf" value="b" >
							<strong>B) Varias veces</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="39A" class="39pf" value="c" >
							<strong>C) Muchas veces</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>40.</strong> ¿cual de las siguientes cosas es diferente:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="40B" class="40pf" value="a" >
							<strong>A) Solo en pocas ocasiones</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="40B" class="40pf" value="b" >
							<strong>B) Varias veces</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="40B" class="40pf" value="c" >
							<strong>C) Muchas veces</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>41. </strong>Sorpresa es a extraño como miedo es a:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="41B"  class="41pf" value="a" >
							<strong>A) Valeroso</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="41B"  class="41pf" value="b" >
							<strong>B) Ansioso</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="41B" class="41pf"  value="c" >
							<strong>C) Terrible</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>42. </strong>A veces no puedo dormirme porque tengo una idea que me da vueltas en la cabeza:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="42C" class="42pf" value="a" >
							<strong>A) Verdadero</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="42C" class="42pf" value="b" >
							<strong>B) No estoy seguro</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="42C" class="42pf" value="c" >
							<strong>C) Falso</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>43. </strong>Me siento desosegado cuando trabajo en un poryecto que requiere una acción rápida que afecta:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="43E"  class="43pf" value="a" >
							<strong>A) Verdadero</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="43E"  class="43pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="43E" class="43pf"  value="c" >
							<strong>C) Falso</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>44. </strong>Indudablemente tengo menos amigos que la mayoría de las personas:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="44F" class="44pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="44F" class="44pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="44F" class="44pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>45. </strong>Aborrecía tener que estar en lugar donde hubiera poca gente con quien hablar:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="45F"  class="45pf" value="a" >
							<strong>A) Verdadero</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="45F" class="45pf" value="b" >
							<strong>B) No estoy seguro</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="45F" class="45pf" value="c" >
							<strong>C) Falso</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>46.</strong> Creo que es más importante mucha libertad que buena educación y respeto a la ley:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="46G" class="46pf" value="a" >
							<strong>A) Verdadero</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="46G" class="46pf" value="b" >
							<strong>B) No estoy seguro</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="46G" class="46pf" value="c" >
							<strong>C) Falso</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>47. </strong>Siempre me alegra formar parte de un grupo grande, como una reunión, un baile o una asamblea:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="47H"  class="47pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="47H"  class="47pf" value="b" >
							<strong>B) Termino medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="47H" class="47pf"  value="c" >
							<strong>C) No</strong>
							</label>

						</div>



						<div style="text-align:justify;margin-top:20px;">
							<p><strong>48.</strong> En mi época de estudiante me gustaba (me gusta):</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="48I" class="48pf" value="a" >
							<strong>A) La música</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="48I" class="48pf" value="b" >
							<strong>B) No estoy seguro</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="48I" class="48pf" value="c" >
							<strong>C) La actividad de tipo manual</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>49.</strong> Si alguien se enfada conmigo:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="49L" class="49pf" value="a" >
							<strong>A) Intento calmarme</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="49L" class="49pf" value="b" >
							<strong>B) No estoy seguro</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="49L" class="49pf" value="c" >
							<strong>C) Me irrito con el</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>50.</strong> Para los padres es más importante:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="50M" class="50pf" value="a" >
							<strong>A) Ayudar a sus hijos a desarrollarse afectivamente</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="50M" class="50pf" value="b" >
							<strong>B) Termino medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="50M" class="50pf" value="c" >
							<strong>C) Muy a menudo</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>51.</strong> Siento de vez en cuando la necesidad de ocuparme en una actividad fisica enérgica:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="51N"  class="51pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="51N" class="51pf"  value="b" >
							<strong>B) Termino medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="51N"  class="51pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>52.</strong> Hay veces en que no me siento con humor para ver alguien:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="52O"  class="52pf"  value="a" >
							<strong>A) Muy raramente</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="52O"  class="52pf"  value="b" >
							<strong>B) Termino medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="52O"   class="52pf" value="c" >
							<strong>C) Muy a menudo</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>53.</strong> Aveces los demás me advierten que  yo muestro mi exitación demasiado claramente en la voz y en los modales:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="53O" class="53pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="53O" class="53pf" value="b" >
							<strong>B) Termino medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="53O" class="53pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>54.</strong> Lo que el mundo necesita es:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="54Q1" class="54pf"  value="a" >
							<strong>A) Ciudadanos más sensatos y constantes</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="54Q1"  class="54pf" value="b" >
							<strong>B) No estoy seguro</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="54Q1" class="54pf"  value="c" >
							<strong>C) Mas idealistas con proyectos para un mundo mejor</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>55.</strong>Preferiría tener negocio propio, no compartido con otra persona:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="55Q2" class="55pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="55Q2" class="55pf" value="b" >
							<strong>B) No estoy seguro</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="55Q2" class="55pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>56.</strong> Tengo mi habitación organizada de un modo inteligente y estético, con las cosas colocadas casi siempre en lugares conocidos:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="56Q3" class="56pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="56Q3" class="56pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="56Q3" class="56pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>



						<div style="text-align:justify;margin-top:20px;">
							<p><strong>57.</strong> En ocaciones dudo si la gente con quien estoy hablando se interesa realemnte por lo que digo:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="57Q4" class="57pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="57Q4" class="57pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="57Q4" class="57pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>58.</strong> Si tuviera que escoger, prefiriía ser :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="58A" class="58pf" value="a" >
							<strong>A) Guarda forestal</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="58A" class="58pf" value="b" >
							<strong>B) No estoy seguro</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="58A" class="58pf" value="c" >
							<strong>C) Profesor de Enseñanza Media</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>59.</strong> ¿Cual de las siguientes fracciones es diferente de las otras dos? :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="59B" class="59pf" value="a" >
							<strong>A) 3/7</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="59B" class="59pf" value="b" >
							<strong>B) 3/9</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="59B" class="59pf" value="c" >
							<strong>C) 3/11</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>60.</strong> Tamaño es a longitud como delito es a :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="60B" class="60pf" value="a" >
							<strong>A) Prisión</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="60B" class="60pf" value="b" >
							<strong>B) Catigo</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="60B" class="60pf" value="c" >
							<strong>C) Robo</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>61.</strong> Es mi vida personal consigo casi siempre todos mis propoósitos :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="61C" class="61pf" value="a" >
							<strong>A) Verdadero</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="61C" class="61pf" value="b" >
							<strong>B) No estoy seguro</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="61C" class="61pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>62.</strong> Tengo algunas características en las que me siento claramente superior a la mayor parte de la gente :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="62E"  class="62pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="62E"  class="62pf" value="b" >
							<strong>B) No estoy seguro</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="62E" class="62pf"  value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>63.</strong> Sólo asisto a actos sociales cuando estoy obligado, y me mantengo aparte de las demas ocaciones  :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="63F"  class="63pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="63F" class="63pf"  value="b" >
							<strong>B) No estoy seguro</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="63F" class="63pf"  value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>64.</strong> Es mejor cuatos y esperar poco y optimista y esperar siempre el éxito  :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="64F" class="64pf" value="a" >
							<strong>A) Verdadero</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="64F" class="64pf" value="b" >
							<strong>B) No estoy seguro</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="64F" class="64pf" value="c" >
							<strong>C) Falso</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>65.</strong> Algunas veces la gente dice que soy descuidado, aunque me condiseran una persona agradable  :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="65G"  class="65pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="65G" class="65pf"  value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="65G" class="65pf"  value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>66.</strong> Suelo permanecer callado delante de personas mayores (con mucha más experiencia, edad, jerarquía) :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="66H" class="66pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="66H" class="66pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="66H" class="66pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>67.</strong> Tengo un buen sentido de la orientación (sitúo fácilmente los puntos cardianles), cuando me encuentro en un lugar desconocido :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="67I"  class="67pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="67I" class="67pf"  value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="67I" class="67pf"  value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>68.</strong> Cuando leo en una revista un artículo tendencioso o injusto me inclino más a olvidarlo que a replicar  o devolver el golpe:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="68L"  class="68pf" value="a" >
							<strong>A) Verdadero</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="68L"  class="68pf" value="b" >
							<strong>B) No estoy seguro</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="68L" class="68pf"  value="c" >
							<strong>C) Falso</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>69.</strong> En tareas de grupo, prefiriría:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="69M" class="69pf" value="a" >
							<strong>A) Intentar mejorar los preparativos</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="69M" class="69pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="69M" class="69pf" value="c" >
							<strong>C) Llevar las actas o registros y procurar que se cumplan las normas</strong>
							</label>

						</div>



						<div style="text-align:justify;margin-top:20px;">
							<p><strong>70.</strong>Me gustaría más andar con personas corteses que con individuos rebeldes y toscos:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="70N" class="70pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="70N" class="70pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="70N" class="70pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>71.</strong> si mis conocidos me tratan mal o muestran que yo les digusto:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="71O" class="71pf" value="a" >
							<strong>A) No me importa nada</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="71O" class="71pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="71O" class="71pf" value="c" >
							<strong>C) Me siento abatido</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>72.</strong> si mis conocidos me tratan mal o muestran que yo les digusto:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="72Q1" class="72pf" value="a" >
							<strong>A) No me importa nada</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="72Q1" class="72pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="72Q1" class="72pf" value="c" >
							<strong>C) Me siento abatido</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>73.</strong> Me gustaría más gozar de la vida tranquilamente y a mi modo que ser admirado por mis resultados:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="73Q2" class="73pf" value="a" >
							<strong>A) Verdadero</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="73Q2" class="73pf" value="b" >
							<strong>B) No estoy seguro </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="73Q2" class="73pf" value="c" >
							<strong>C) Falso</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>74.</strong> Para estar informado prefiero:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="74Q2" class="74pf" value="a" >
							<strong>A) Discutir los acontecimientos con la gente</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="74Q2" class="74pf" value="b" >
							<strong>B) Término medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="74Q2" class="74pf" value="c" >
							<strong>C) Apoyarme en las informacíones periodísticas de la actualidad</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>75.</strong> Me encuentro formado (maduro) para la mayor parte de las cosas:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="75Q3" class="75pf" value="a" >
							<strong>A) Verdadero</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="75Q3" class="75pf" value="b" >
							<strong>B) No estoy seguro </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="75Q3" class="75pf" value="c" >
							<strong>C) Falso</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>76.</strong> Me encuentro más abatido que ayudado por el tipo de crítica que la gente suele hacer:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="76Q4" class="76pf" value="a" >
							<strong>A) A menudo</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="76Q4" class="76pf" value="b" >
							<strong>B) Ocasionalmente </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="76Q4" class="76pf" value="c" >
							<strong>C) Nunca</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>77.</strong> En las fiestas de cumpleaños :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="77A" class="77pf" value="a" >
							<strong>A) Me gusta hacer regalos personales</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="77A" class="77pf" value="b" >
							<strong>B) No estoy seguro</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="77A" class="77pf" value="c" >
							<strong>C) Pienso que comprar regalos es un poco latoso</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>78.</strong> AB es a dc como SR es  :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="78B" class="78pf" value="a" >
							<strong>A) qp</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="78B" class="78pf" value="b" >
							<strong>B) pq</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="78B" class="78pf" value="c" >
							<strong>C) tu</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>79.</strong> Mejor es a pésimo como menor es a  :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="79B" class="79pf" value="a" >
							<strong>A) Mayor</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="79B" class="79pf" value="b" >
							<strong>B) Optimo</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="79B" class="79pf" value="c" >
							<strong>C) Máximo</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>80.</strong> Mis amigos me han fallado :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="80C" class="80pf" value="a" >
							<strong>A) Muy rara vez</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="80C" class="80pf" value="b" >
							<strong>B) Ocasionalmente</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="80C" class="80pf" value="c" >
							<strong>C) Muchas veces</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>81.</strong> Cuando me siento abatido hago grandes esfuerzos por ocultar mis sentimientos a los demás :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="81E" class="81pf" value="a" >
							<strong>A) Verdadero</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="81E" class="81pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="81E" class="81pf" value="c" >
							<strong>C) Falso</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>82.</strong> Gasto gran parte de mi tiempo libre hablando con los amigos sobre situaciones sociales agradables vividas en el pasado:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="82F" class="82pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="82F" class="82pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="82F" class="82pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>83.</strong> Pensando en las dificultades de mi trabajo :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="83G"  class="83pf" value="a" >
							<strong>A) Intento organizarme antes de que aparezcan</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="83G" class="83pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="83G" class="83pf" value="c" >
							<strong>C) Doy por supuesto que puedo dominarlas cuando vengas</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>84.</strong> Me cuesta bastante hablar o dirigir la palabra a un grupo numeroso :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="84H"  class="84pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="84H"  class="84pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="84H" class="84pf"  value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>85.</strong> He experimentado en varias situaciones sociales el llamado nerviosismo del orador:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="85H" class="85pf"  value="a" >
							<strong>A) Muy frecuentemente</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="85H" class="85pf"  value="b" >
							<strong>B) Ocasinalmente</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="85H"  class="85pf" value="c" >
							<strong>C) Casi nunca</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>86.</strong> Prefiero leer :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="86I" class="86pf" value="a" >
							<strong>A) Una narración realista de contiendas militares o políticas</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="86I" class="86pf" value="b" >
							<strong>B) No estoy seguro</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="86I" class="86pf" value="c" >
							<strong>C) Una novela imaginativa y delicada</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>87.</strong> Cuando la gente autoritaria trata de dominarme, hago justamente lo contrario de lo que quiere :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="87L" class="87pf" value="a" >
							<strong>A) Una narración realista de contiendas militares o políticas</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="87L" class="87pf" value="b" >
							<strong>B) No estoy seguro</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="87L" class="87pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>88.</strong> Suelo olvidar muchas cosas triviales y sin importancia tales como los nombres de la calle y tiendas de la ciudad :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="88M" class="88pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="88M" class="88pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="88M" class="88pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>89.</strong> Me gustaría la profesión de veterinaria, ocupado con las enfermedades y curación de los animales:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="89N" class="89pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="89N" class="89pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="89N" class="89pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>90.</strong> Me resulta embarazoso que me dediquen elogios o cumplidos:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="90O" class="90pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="90O" class="90pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="90O" class="90pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>91.</strong> Siendo adolescente, cuando mi opinión era distinta de la de mis padres, normalmente:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="91Q1" class="91pf"  value="a" >
							<strong>A) Mantenía mi opinión</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="91Q1" class="91pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="91Q1"  class="91pf" value="c" >
							<strong>C) Aceptaba su autoridad</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>92.</strong> Me gusta tomar parte activa en las tareas sociales, trabajo de comité, etc:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="92Q2" class="92pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="92Q2" class="92pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="92Q2" class="92pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>93.</strong> Al llevar a cabo una tarea, no estoy satisfecho hasta que se ha considerado con toda atención el menor detalle:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="93Q3" class="93pf" value="a" >
							<strong>A) Verdadero</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="93Q3" class="93pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="93Q3" class="93pf" value="c" >
							<strong>C) Falso</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>94.</strong> Tengo ocaciones en que me he es difícil alejar un sentimiento de compasión hacía mí mismo :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="94Q3" class="94pf" value="a" >
							<strong>A) A menudo</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="94Q3" class="94pf"  value="b" >
							<strong>B) Algunas veces</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="94Q3" class="94pf" value="c" >
							<strong>C) Nunca</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>95.</strong> Siempre soy capaz de controlar perfectamente la expresión de mis sentimientos :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="95Q4" class="95pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="95Q4" class="95pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="95Q4" class="95pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>96.</strong> Ante un nuevo evento utilitario me gustaría :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="96A" class="96pf" value="a" >
							<strong>A) Trabajar sobre él laboratorio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="96A" class="96pf" value="b" >
							<strong>B) No estoy seguro</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="96A" class="96pf" value="c" >
							<strong>C) Venderlo a la gente</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>97.</strong> La siguiente serie de letras XOOOOXXOOOXXX continúa en el grupo:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="97B"  class="97pf" value="a" >
							<strong>A) OXXX </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="97B"  class="97pf" value="b" >
							<strong>B) OOXX</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="97B" class="97pf"  value="c" >
							<strong>C) XOOO</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>98.</strong> Algunas personas ignorarme o evitarme, aunque no sé por que:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="98C" class="98pf" value="a" >
							<strong>A) Verdadero </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="98C" class="98pf" value="b" >
							<strong>B) No estoy seguro </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="98C" class="98pf" value="c" >
							<strong>C) Falso</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>99.</strong> La gente me trata menos razonablemente de lo que merecen mis buenas intenciones:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="99C" class="99pf" value="a" >
							<strong>A) A menudo </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="99C" class="99pf" value="b" >
							<strong>B) Ocasionalmente </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="99C" class="99pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>100.</strong> Aunque no sea en un grupo mixto de mujeres y hombres, me disgusta que se use un lenguaje obsceno :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="100E" class="100pf" value="a" >
							<strong>A) Sí </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="100E" class="100pf" value="b" >
							<strong>B) Término medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="100E" class="100pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>



						<div style="text-align:justify;margin-top:20px;">
							<p><strong>101.</strong> Me gusta hacer cosas atrevidas y temerarias sólo por el placer de divirtirme :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="101F" class="1001pf" value="a" >
							<strong>A) Sí </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="101F" class="1001pf" value="b" >
							<strong>B) Término medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="101F" class="1001pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>102.</strong> Me resulta molesta la vista de una habitación muy sucia :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="102G" class="102pf"  value="a" >
							<strong>A) Sí </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="102G" class="102pf"  value="b" >
							<strong>B) Término medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="102G"  class="102pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>103.</strong> Cuando estoy en un grupo pequeño, me agrada quedarme en un segundo termino y dejar que otros lleven el peso de la conversación:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="103H" class="103pf" value="a" >
							<strong>A) Sí </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="103H" class="103pf" value="b" >
							<strong>B) Término medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="103H" class="103pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>104.</strong> Me resulta fácil mezclarme con la gente en una reunion social :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="104H" class="104pf" value="a" >
							<strong>A) Verdadero </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="104H" class="104pf" value="b" >
							<strong>B) No estoy segeuro </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="104H" class="104pf" value="c" >
							<strong>C) Falso</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>105.</strong> sería mas interesante ser :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="105I" class="105pf" value="a" >
							<strong>A) Orientador vocacional para ayudar a los jóvenes en la busqueda de la profesión</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="105I" class="105pf" value="b" >
							<strong>B) No estoy segeuro </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="105I" class="105pf" value="c" >
							<strong>C) Directivo de una empresa industrial</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>106.</strong> Por regla general, mis jefes y mi familia me encuentran defectos sólo cuando realmente existen :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="106L" class="106pf" value="a" >
							<strong>A) Orientador vocacional para ayudar a los jóvenes en la busqueda de la profesión</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="106L" class="106pf" value="b" >
							<strong>B) No estoy segeuro </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="106L" class="106pf" value="c" >
							<strong>C) Directivo de una empresa industrial</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>107.</strong> Me disgusta el modo con que algunas personas se fijan en otras en las calles o en las tiendas :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="107M"  class="107pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="107M" class="107pf"  value="b" >
							<strong>B)Término medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="107M"  class="107pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>108.</strong>Como los alimentos con gusto y placer, aunque no siempre tan cuidadosa y educadamente como otras personas :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="108N" class="108pf" value="a" >
							<strong>A) Verdadero </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="108N" class="108pf" value="b" >
							<strong>B)No estoy seguro  </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="108N" class="108pf" value="c" >
							<strong>C) Falso</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>109.</strong> Temo algún castigo incluso cuando no he hecho nada malo :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="109O" class="109pf" value="a" >
							<strong>A) A menudo </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="109O" class="109pf" value="b" >
							<strong>B) Ocasionalmente  </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="109O" class="109pf" value="c" >
							<strong>C) Nunca</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>110.</strong> Me gustaría más tener un trabajo con :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="110Q1" class="110pf"  value="a" >
							<strong>A) Un determinado sueldo fijo </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="110Q1" class="110pf"  value="b" >
							<strong>B) Término medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="110Q1"  class="110pf" value="c" >
							<strong>C) Un sueldo más alto pero siempre que demuestra a los demás que lo merezco  </strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>111.</strong> Me molesta que la gente piense que mi comportamiento es demasiado raro o fuera de lo corriente :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="111Q2" class="111pf" value="a" >
							<strong>A) Mucho </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="111Q2" class="111pf" value="b" >
							<strong>B) Algo  </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="111Q2" class="111pf" value="c" >
							<strong>C) Nada en absoluto  </strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>112.</strong>A veces dejo que sentimientos de envidia o celos influyen en mis acciones :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="112Q3" class="112pf" value="a" >
							<strong>A) Sí </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="112Q3" class="112pf" value="b" >
							<strong>B) Término medio  </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="112Q3" class="112pf" value="c" >
							<strong>C) No  </strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>113.</strong> En ocaciones, contrariedades muy pequeñas me irritan mucho :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="113Q4" class="113pf" value="a" >
							<strong>A) Sí </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="113Q4" class="113pf" value="b" >
							<strong>B) Término medio  </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="113Q4" class="113pf" value="c" >
							<strong>C) No  </strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>114.</strong> Siempre duermo bien, nunca hablo en sueños ni me levanto sonámbulo:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="114Q4" class="114pf" value="a" >
							<strong>A) Sí </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="114Q4" class="114pf" value="b" >
							<strong>B) Término medio  </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="114Q4" class="114pf" value="c" >
							<strong>C) No  </strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>115.</strong> Me resultaría mas interesante trabajar en una empresa:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="115A" class="115pf"  value="a" >
							<strong>A) Atendiendo los clientes </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="115A"  class="115pf" value="b" >
							<strong>B) Término medio  </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="115A"  class="115pf" value="c" >
							<strong>C) Llevando las cuentas o los archivos  </strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>116.</strong> Azada es a cavar como cuchillo es a:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="116B" class="116pf" value="a" >
							<strong>A) Cortar </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="116B" class="116pf" value="b" >
							<strong>B) Afilar  </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="116B" class="116pf" value="c" >
							<strong>C) Picar  </strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>117.</strong> Cuando la gente no es razonable, yo normalmente :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="117C" class="117pf" value="a" >
							<strong>A) Me quedo tan tranquilo </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="117C" class="117pf" value="b" >
							<strong>B) Término medio  </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="117C" class="117pf" value="c" >
							<strong>C) Lo menos precio </strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>118.</strong> Si los demás hablan en voz alta cuando estoy escuchando música :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="118C" class="118pf" value="a" >
							<strong>A) Puedo concentrarme en ella sin que me moleste </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="118C" class="118pf"value="b" >
							<strong>B) Término medio  </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="118C" class="118pf" value="c" >
							<strong>C) Eso me impide disfrutar de ella y me incomoda</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>119.</strong> Creo que se me describe mejor como :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="119E" class="119pf" value="a" >
							<strong>A) Comedido y reposado </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="119E" class="119pf" value="b" >
							<strong>B) Término medio  </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="119E" class="119pf" value="c" >
							<strong>C) Enérgico </strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>120.</strong> Prefiriría vestirme con sencillez y correción que con un estilo personal y llamativo :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="120F"  class="120pf" value="a" >
							<strong>A) Verdadero </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="120F"  class="120pf" value="b" >
							<strong>B) No estoy seguro   </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="120F" class="120pf"  value="c" >
							<strong>C) Falso </strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>121. </strong>Me niego a admitir sugerencias bien intecionadas de los demás aunque se que no debería hacerlo :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="121G" class="121pf" value="a" >
							<strong>A) Algunas veces </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="121G" class="121pf" value="b" >
							<strong>B) Casi nunca   </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="121G" class="121pf" value="c" >
							<strong>C) Nunca </strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>122.</strong> Cuando es necesario que alguien emplee un poco de diplomacia y persuación para conseguir que la gente actúe, generalmente sólo me lo encargan a mi :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="122H" class="122pf" value="a" >
							<strong>A) Sí </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="122H" class="122pf" value="b" >
							<strong>B) Término medio  </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="122H" class="122pf" value="c" >
							<strong>C) No </strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>123.</strong> Me considero a mí mismo como una persona muy abierta y sociable :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="123H"  class="123pf" value="a" >
							<strong>A) Sí </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="123H"  class="123pf" value="b" >
							<strong>B) Término medio  </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="123H" class="123pf"  value="c" >
							<strong>C) No </strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>124.</strong> Me gusta la música :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="124I" class="124pf" value="a" >
							<strong>A) liegera, movida y animada </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="124I" class="124pf" value="b" >
							<strong>B) Término medio  </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="124I" class="124pf" value="c" >
							<strong>C) Emotiva y sentimental </strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>125.</strong> Si estoy completamente seguro de que una persona es injusta o se comporta egoístamente, se lo digo, incluso si esto me causa problemas :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="125L" class="125pf" value="a" >
							<strong>A) Sí </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="125L" class="125pf" value="b" >
							<strong>B) Término medio  </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="125L" class="125pf" value="c" >
							<strong>C) No </strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>126. </strong>En un viaje largo prefiriría  :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="126M"  class="126pf" value="a" >
							<strong>A) Leer algo profundo pero interesante </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="126M"  class="126pf" value="b" >
							<strong>B) No estoy seguro  </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="126M" class="126pf"  value="c" >
							<strong>C) Pasar el tiempo charlando sobre cualquier cosa con un compañero de viaje </strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>127.</strong> En una situación que puede llegar hacer peligrosa, creo que es mejor albortar o hablar alto, aún cuando se pierda la calma y la cortesía  :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="127N" class="127pf" value="a" >
							<strong>A) Sí </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="127N" class="127pf" value="b" >
							<strong>B) Término medio  </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="127N" class="127pf" value="c" >
							<strong>C) No </strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>128.</strong> Es muy exagerada la idea de que la enfermedad proviene tanto de causas metales como físicas:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="128O" class="128pf" value="a" >
							<strong>A) Sí </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="128O" class="128pf" value="b" >
							<strong>B) Término medio  </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="128O" class="128pf" value="c" >
							<strong>C) No </strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>129.</strong> En cualquier gran ceremonia oficial debería mantener la pompa y el esplendor:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="129Q1" class="129pf" value="a" >
							<strong>A) Sí </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="129Q1" class="129pf" value="b" >
							<strong>B) Término medio  </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="129Q1" class="129pf" value="c" >
							<strong>C) No </strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>130. </strong>Cuando hay que hacer algo, me gustaría más trabajar :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="130Q2" class="130pf" value="a" >
							<strong>A) En equipo </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="130Q2" class="130pf" value="b" >
							<strong>B) No estoy seguro  </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="130Q2" class="130pf" value="c" >
							<strong>C) Yo solo </strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>131. </strong>Creo firmemente que talvez el jefe no siempre tenga la razón, pero siempre tiene la razón por ser el jefe :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="131Q3" class="131pf" value="a" >
							<strong>A) Sí </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="131Q3" class="131pf" value="b" >
							<strong>B) No estoy seguro  </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="131Q3" class="131pf" value="c" >
							<strong>C) No </strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>132.</strong> Suelo enfadarme con las personas demasiado pronto  :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="132Q4" class="132pf" value="a" >
							<strong>A) Sí </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="132Q4" class="132pf" value="b" >
							<strong>B) Término medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="132Q4" class="132pf" value="c" >
							<strong>C) No </strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>133. </strong>Siempre puedo cambia viejos hábitos sin dificultad y sin volver a ellos :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="133Q4" class="133pf" value="a" >
							<strong>A) Sí </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="133Q4" class="133pf" value="b" >
							<strong>B) Término medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="133Q4" class="133pf" value="c" >
							<strong>C) No </strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>134.</strong> Si el sueldo fuera el mismo prefiriría ser :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="134A" class="134pf" value="a" >
							<strong>A) Abogado</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="134A" class="134pf" value="b" >
							<strong>B) No estoy seguro </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="134A" class="134pf" value="c" >
							<strong>C) Navegange o piloto </strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>135.</strong> LLama es a calor como rosa es a :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="135B" class="135pf" value="a" >
							<strong>A) Espina</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="135B" class="135pf" value="b" >
							<strong>B) Pétalo </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="135B" class="135pf" value="c" >
							<strong>C) Aroma </strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>136.</strong> Cuando se acerca el momento de algo que he planeado y he esperado, en ocaciones pierdo la ilusión por ello:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="136C" class="136pf" value="a" >
							<strong>A) Verdadero </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="136C" class="136pf" value="b" >
							<strong>B) Término medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="136C" class="136pf" value="c" >
							<strong>C) Falso </strong>
							</label>

						</div>



						<div style="text-align:justify;margin-top:20px;">
							<p><strong>137. </strong>Puedo trabajar cuidadosamente en la mayor parte de las cosas sin que molesten las personas que hacen mucho ruido a mi alrededor:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="137C" class="137pf" value="a" >
							<strong>A) Sí </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="137C" class="137pf" value="b" >
							<strong>B) Término medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="137C" class="137pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>138.</strong> En ocaciones hablo a desconocidos sobre cosas que considero importantes, aunque no me pregunten sobre ellas:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="138E" class="138pf" value="a" >
							<strong>A) Sí </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="138E" class="138pf" value="b" >
							<strong>B) Término medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="138E" class="138pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>139. </strong>Me atrae más pasar una tarde ocupado en una tarea tranquila a la que tenga afición que estar en una reunión animada:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="139F" class="139pf" value="a" >
							<strong>A) Verdadero </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="139F" class="139pf" value="b" >
							<strong>B) No estoy seguro </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="139F" class="139pf" value="c" >
							<strong>C) Falso</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>140. </strong>Cuando debo de decidir algo, tengo siempre presente las reglas basicas de lo justo  y lo injusto:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="140G" class="140pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="140G" class="140pf" value="b" >
							<strong>B) Término medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="140G" class="140pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>141.</strong> En el trato social:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="141H" class="141pf" value="a" >
							<strong>A) Muestro mis emociones tal como la siento</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="141H" class="141pf" value="b" >
							<strong>B) Término medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="141H" class="141pf" value="c" >
							<strong>C) Guardo mis emociones para mis adentros</strong>
							</label>

						</div>



						<div style="text-align:justify;margin-top:20px;">
							<p><strong>142.</strong> Admiro mas la belleza de un poema que la de un arma de fuego bien construida:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="142I"  class="142pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="142I" class="142pf"  value="b" >
							<strong>B) No estoy seguro </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="142I"  class="142pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>143. </strong>A veces digo en broma disparates, solo para sorprender a la gente y ver qué me responden:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="143L" class="143pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="143L" class="143pf" value="b" >
							<strong>B) Término medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="143L" class="143pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>144.</strong> Me agradaría ser periodista que escribiera sobre teatros, conciertos, ópera, etc:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="144M" class="144pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="144M" class="144pf" value="b" >
							<strong>B) No estoy seguro </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="144M" class="144pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>145.</strong> Nunca siento la necesidad de garabatear o dibujar cuando estoy sentado en una reunión:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="145M" class="145pf" value="a" >
							<strong>A) Verdadero </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="145M" class="145pf" value="b" >
							<strong>B) No estoy seguro </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="145M" class="145pf" value="c" >
							<strong>C) Falso</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>146. </strong>Si alguien me dice algo que yo sé que no es cierto, suelo pensar:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="146N" class="146pf" value="a" >
							<strong>A) Es un mentiroso </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="146N" class="146pf" value="b" >
							<strong>B) Término Medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="146N" class="146pf" value="c" >
							<strong>C) Evidentemente no está bien informado</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>147. </strong>La gente me considera con justicia una persona activa pero con éxito solo mediano:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="147O" class="147pf" value="a" >
							<strong>A) Sí </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="147O" class="147pf" value="b" >
							<strong>B) No estoy seguro </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="147O" class="147pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>148.</strong> Si suscitara una controversia violenta entre otros miembros de un grupo de discusión:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="148Q1" class="148pf" value="a" >
							<strong>A) Me gustaría quién es el ganador </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="148Q1" class="148pf" value="b" >
							<strong>B) Término medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="148Q1" class="148pf" value="c" >
							<strong>C) Me gustaría que se suavizara de nuevo la situación</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>149.</strong> Me gusta planear mis cosas solo, sin interrupciones y sugerencias de otros:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="149Q2" class="149pf" value="a" >
							<strong>A) Sí </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="149Q2" class="149pf" value="b" >
							<strong>B) Término medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="149Q2" class="149pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>150.</strong> Me gusta seguir mis propios caminos, en vez actuar según normas establecidas:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="150Q3" class="150pf" value="a" >
							<strong>A) Verdadero </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="150Q3" class="150pf" value="b" >
							<strong>B) No estoy seguro </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="150Q3" class="150pf" value="c" >
							<strong>C) Falso</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>151.</strong> Me pongo nervioso (tenso) cuando pienso en todas las cosas que tengo que hacer:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="151Q4" class="151pf" value="a" >
							<strong>A) Sí </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="151Q4" class="151pf" value="b" >
							<strong>B) Algunas veces </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="151Q4" class="151pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>152.</strong> No perturba que la gente me haga una sugerencia cuando estoy jugando:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="152Q4" class="152pf" value="a" >
							<strong>A) Verdadero </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="152Q4" class="152pf" value="b" >
							<strong>B) No estoy seguro </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="152Q4" class="152pf" value="c" >
							<strong>C) Falso</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>153.</strong> Me parece más interesante ser:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="153A" class="153pf" value="a" >
							<strong>A) Artista </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="153A" class="153pf" value="b" >
							<strong>B) No estoy seguro </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="153A" class="153pf" value="c" >
							<strong>C) Secretario de un club social</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>154.</strong> Cual de las siguientes palabras es diferente de las otras dos?</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="154B" class="154pf" value="a" >
							<strong>A) Ancho</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="154B" class="154pf" value="b" >
							<strong>B) Zigzag </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="154B" class="154pf" value="c" >
							<strong>C) Recto</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>155. </strong>He tenido sueños tan intensos que no me han dejado dormir bien:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="155C" class="155pf" value="a" >
							<strong>A) Si </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="155C" class="155pf" value="b" >
							<strong>B) Termino medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="155C" class="155pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>156. </strong>Aunque tenga pocas posibilidades de exito, creo que todavia me merece la pena correr el riesgo:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="156E" class="156pf" value="a" >
							<strong>A) Si </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="156E" class="156pf" value="b" >
							<strong>B) Termino medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="156E" class="156pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>157.</strong> Cuando yo se muy bien lo que el grupo tiene que hacer, me gusta ser el unico en dar las ordenes:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="157E" class="157pf" value="a" >
							<strong>A) Si </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="157E" class="157pf" value="b" >
							<strong>B) Termino medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="157E" class="157pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>158.</strong> Me consideran una persona muy entusiasta:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="158F" class="158pf" value="a" >
							<strong>A) Si </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="158F" class="158pf" value="b" >
							<strong>B) Termino medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="158F" class="158pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>159. </strong>Soy una persona bastante estricta, e insisto siempre en hacer las cosas tan correctamente como sea posible:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="159G" class="159pf" value="a" >
							<strong>A) Verdadero </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="159G" class="159pf" value="b" >
							<strong>B) Termino medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="159G" class="159pf" value="c" >
							<strong>C) Falso</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>160. </strong>Me disguta un poco que la gente me este mirando cuando trabajo:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="160H" class="160pf" value="a" >
							<strong>A) Si </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="160H" class="160pf" value="b" >
							<strong>B) Termino medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="160H" class="160pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>161. </strong>Como no siempre es posible conseguir las cosas utilizando gradualmente metodos razonoables, a veces  es necesario emplear la fuerza:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="161I" class="161pf" value="a" >
							<strong>A) Verdadero </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="161I" class="161pf"  value="b" >
							<strong>B) Termino medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="161I" class="161pf" value="c" >
							<strong>C) Falso</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>162.</strong> Si se pasa por alto una buena observacion mia:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="162L"  class="162pf"value="a" >
							<strong>A) La dejo pasar </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="162L" class="162pf" value="b" >
							<strong>B) Termino medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="162L" class="162pf" value="c" >
							<strong>C) Doy a la gente la oportunidad de volver a escucharla</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>163.</strong> Me gustaria hacer el trabajo de un oficial encargado de los casos de delincuentes bajo fianza:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="163M" class="163pf" value="a" >
							<strong>A) Si </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="163M" class="163pf" value="b" >
							<strong>B) Termino medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="163M" class="163pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>164.</strong> Hay que ser prudente antes de mezclarse con cualquier desconocido, puesto que hay peligros de infeccion y de otro tipo :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="164M" class="164pf" value="a" >
							<strong>A) Si </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="164M" class="164pf" value="b" >
							<strong>B) No estoy seguro </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="164M" class="164pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>165.</strong> En un viaje al extranjero, preferiria ir en un grupo organizado, con un experto, que planear yo mismo los lugares que deseo visitar:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="165N"  class="165pf" value="a" >
							<strong>A) Si </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="165N" class="165pf"  value="b" >
							<strong>B) No estoy seguro </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="165N" class="165pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>166.</strong> Si la gente se aprovecha de mi amistad, no me quedo resentido y lo olvido pronto:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="166O" class="166pf" value="a" >
							<strong>A) Verdadero </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="166O" class="166pf" value="b" >
							<strong>B) Termino medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="166O" class="166pf" value="c" >
							<strong>C) Falso</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>167. </strong>Creo que la sociedad deberia aceptar nuevas costumbres, de acuerdo con la razon, y olvidar los viejos usos y tradiciones:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="167Q1" class="167pf" value="a" >
							<strong>A) Si </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="167Q1" class="167pf" value="b" >
							<strong>B) Termino medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="167Q1" class="167pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>168. </strong>Aprendo mejor:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="168Q2" class="168pf" value="a" >
							<strong>A) Leyendo un libro bien escrito </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="168Q2" class="168pf" value="b" >
							<strong>B) Termino medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="168Q2" class="168pf" value="c" >
							<strong>C) Participando en un grupo de discusion</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>169. </strong>Me gusta esperar a estar seguro de lo que voy a decir es correcto, antes de exponer mis ideas:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="169Q3" class="169pf" value="a" >
							<strong>A) Siempre </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="169Q3" class="169pf" value="b" >
							<strong>B) Generalmente </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="169Q3" class="169pf" value="c" >
							<strong>C) Solo si es posible</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>170. </strong>Algunas veces me sacan de quicio de un modo insoportable pequeñas cosas, aunque reconozca que son triviales:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="170Q4" class="170pf" value="a" >
							<strong>A) Si </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="170Q4" class="170pf" value="b" >
							<strong>B) Termino medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="170Q4" class="170pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>171. </strong>No suelo decir, sin pensarlas, cosas que luego lamento mucho:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="171Q4"  class="171pf" value="a" >
							<strong>A) Verdadero </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="171Q4" class="171pf"  value="b" >
							<strong>B) No estoy seguro </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="171Q4"  class="171pf" value="c" >
							<strong>C) Falso</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>172. </strong>Si me pidiera colaborar en una campaña caritativa:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="172A" class="172pf" value="a" >
							<strong>A) Aceptaria </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="172A" class="172pf" value="b" >
							<strong>B) No estoy seguro </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="172A" class="172pf" value="c" >
							<strong>C) Diria cortesmente que estoy muy ocupado</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>173. </strong>Pronto es a nunca como cerca es a:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="173B" class="173pf" value="a" >
							<strong>A) Ningun sitio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="173B" class="173pf" value="b" >
							<strong>B) Lejos </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="173B" class="173pf" value="c" >
							<strong>C) En otro sitio</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>174. </strong>Si cometo una falta social o desagradable, puedo olvidarla pronto:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="174C"  class="174pf" value="a" >
							<strong>A) Si </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="174C"  class="174pf" value="b" >
							<strong>B) No estoy seguro </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="174C" class="174pf"  value="c" >
							<strong>C) No</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>175.</strong> Se me considera un hombre de ideas que casi siempre pueda apuntar a una solucion a un problema:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="175E"  class="175pf" value="a" >
							<strong>A) Si </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="175E" class="175pf"  value="b" >
							<strong>B) Termino medio  </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="175E"  class="175pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>176.</strong> Creo que se me da mejor mostrar:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="176E" class="176pf" value="a" >
							<strong>A) Aplomo en las pugnas y discusiones en una reunion</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="176E" class="176pf" value="b" >
							<strong>B) No estoy seguro </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="176E" class="176pf" value="c" >
							<strong>C) Tolerancia con los desos de los demas</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>177. </strong>Me gusta un trabajo que presente cambios, variedad y viajes, aunque implique algun peligro:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="177F" class="177pf" value="a" >
							<strong>A) Si</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="177F" class="177pf" value="b" >
							<strong>B) Termino medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="177F" class="177pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>178. </strong>Me gusta un trabajo que requiera dotes de atencion y exactitud:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="178G" class="178pf" value="a" >
							<strong>A) Si</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="178G" class="178pf" value="b" >
							<strong>B) Termino medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="178G" class="178pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>179.</strong> Soy de ese tipo de personas con tanta energia que siempre estan ocupadas:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="179H"  class="179pf" value="a" >
							<strong>A) Si</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="179H" class="179pf"  value="b" >
							<strong>B) No estoy seguro </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="179H"  class="179pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>180. </strong>En mi epoca de estudiante prefiriria (prefiero):</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="180I" class="180pf" value="a" >
							<strong>A) Lenguaje o literatura</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="180I" class="180pf" value="b" >
							<strong>B) No estoy seguro </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="180I" class="180pf" value="c" >
							<strong>C) Matematicas o aritmeticas</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>181. </strong>Algunas veces me ha turbado el que la gente diga cosas desagradables de mi sin fundamento:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="181L" class="181pf" value="a" >
							<strong>A) Si</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="181L" class="181pf" value="b" >
							<strong>B) No estoy seguro </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="181L" class="181pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>182.</strong> Hablar con personas corrientes, convencionales y rutinarias:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="182M" class="182pf" value="a" >
							<strong>A) Es a menudo muy interesante e instructivo</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="182M" class="182pf" value="b" >
							<strong>B) Termino medio </strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="182M" class="182pf" value="c" >
							<strong>C) Me fastidia porque no hay profundidad o se trata de chismes y cosas sin importancia</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>183.</strong> Algunas cosas me irritan tanto que creo que entonces lo mejor es no hablar  :</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="183M" class="183pf" value="a" >
							<strong>A) Si</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="183M" class="183pf" value="b" >
							<strong>B) Termino medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="183M" class="183pf" value="c" >
							<strong>C)No</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>184.</strong> En la formacion del niño, es importante:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="184N" class="184pf" value="a" >
							<strong>A) Darle bastante afecto</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="184N" class="184pf" value="b" >
							<strong>B) Termino medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="184N"  class="184pf" value="c" >
							<strong>C)Procurar que aprenda habitos y actitudes deseables</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>185.</strong> Los demás me consideran una persona firme e imperturbable, impasible ante vaivenes de las circustancias:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="185O" class="185pf" value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="185O" class="185pf" value="b" >
							<strong>B) Término medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="185O" class="185pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>


						<div style="text-align:justify;margin-top:20px;">
							<p><strong>186.</strong> Creo que en el mundo actual es más imporante resolver:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="186Q1"  class="186pf" value="a" >
							<strong>A) El problema de la intención moral</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="186Q1"  class="186pf" value="b" >
							<strong>B) No estoy seguro</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="186Q1" class="186pf"  value="c" >
							<strong>C) Los problemas políticos</strong>
							</label>

						</div>

						<div style="text-align:justify;margin-top:20px;">
							<p><strong>187.</strong> Creo que no me ha saltado ninguna cuestión y he contestado a todas del modo apropiado:</p>
						</div>
						<div class="label3">

							<label class="radio inline">
							<input type="radio" name="187" class="187pf"  value="a" >
							<strong>A) Sí</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="187" class="187pf"  value="b" >
							<strong>B) No estoy seguro</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="187" class="187pf" value="c" >
							<strong>C) No</strong>
							</label>

						</div>

					</div>

					
					<div style="text-align:center; display:block" >
						<input type="submit" value="Siguiente" class="btn btn-primary">							
					</div>
				</form>
			</div>
		</div>
	</div>
    
	<script src="../../js/alert.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
	<script src="../../js/caras.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
</body>
</html>