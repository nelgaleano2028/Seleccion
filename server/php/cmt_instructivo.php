<?php 
session_start();
require_once('class_administracion.php');
$ruta='cmt_instructivo';
$grupo=$_SESSION['grupo'];
$obj= new Administracion();
$orden=$obj->orden($ruta,$grupo);

?>

<html>
  <head>
    <title>CMT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../css/style_caras.css?css=<?php echo rand(1, 100);?>"  />
  </head>
  <body>


  	
		
       	<div class="estirar_form2">
              
			<div class="cambia" style="height:700px;">
				<div class="modal-header">
					<h3 id="myModalLabel" style="text-align:center">CUESTIONARIO DE MOTIVACION PARA EL TRABAJO</h3>
					<h4 id="myModalLabel" style="text-align:center">CMT</h4>
					<div style="display:none;" id="counter">60:00</div>						
				</div>
				<div class="modal-body" style="max-height: 720px !important">
				
					<div style="text-align:center; font-weight:bold; font-size: 20px">INSTRUCCIONES</div>
							<br>
							<div style="font-size: 18px; text-align:justify">
								<p>Este cuestionario tiene por objeto recoger una idea sobre aquellos aspectos del trabajo que son de interes para usted y sobre las acciones que usted 
								esta dispuesto a emprender para conseguirlos.</p>
								
								<p>Lealas con atencion y no comience a responder hasta tanto no este seguro de haberlas comprendido. Responda todos y cada uno de los puntos,
								pero no dedique  demasiado tiempo a cada uno. Responda con rapidez y de la manera mas espontanea posible.</p>
								
								<p style="font-weight:bold; margin-left:30px">EJEMPLO:</p>
								
								<p style="margin-left:40px">La mayor satisfaccion que deseo obtener en el trabajo es:</p>
								
								<p style="margin-left:40px">
								A) Dirigir Personal<br>
								B) Ser estimado<br>
								C) Tener amistades<br>
								D) Ser elogiado<br>
								E) Llevar a cabo lo que soy capaz de hacer<br>
								</p>
								
								<br>
								<br>
								
								<table border="1">
									<tr style="background-color: rgb(200, 213, 208); font-size:20px">
										<td width="60px">N°</td>
										<td width="200px">A</td>
										<td width="200px">B</td>
										<td width="200px">C</td>
										<td width="200px">D</td>
										<td width="200px">E</td>
									</tr>
									<tr>
										<td style="background-color: rgb(200, 213, 208); font-size:20px">1</td>
										<td><input type="text" class="pregunta1 inputs_text" name="1a" maxlength="1"  	id="1a1" /></td>
										<td><input type="text" class="pregunta1 inputs_text" name="1b" maxlength="1"  	id="2b1" /></td>
										<td><input type="text" class="pregunta1 inputs_text" name="1c" maxlength="1" 	id="3c1" /></td>
										<td><input type="text" class="pregunta1 inputs_text" name="1d" maxlength="1"  	id="4d1" /></td>
										<td><input type="text" class="pregunta1 inputs_text" name="1e" maxlength="1" 	id="5e1" /></td>
									</tr>
								</table>
								
								<br>
								<br>
								
								<p style="font-weight:bold">ESPERE LA SEÑAL DE COMIENZO</p>
							</div>
							<br>
							<br>				

					<div style="text-align:center; display:block" >
						<input id="pruebas_Btn" type="button" class="cmt <?php echo $orden['orden'] ?> <?php echo $grupo ?> btn btn-primary" value="Empezar"/>
					</div>
				</div>


         	</div>
        </div>


	<div id="pruebas" style="display:none;">

			
		
	</div>






		
<script src="../../js/caras.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>		

</body>
</html>