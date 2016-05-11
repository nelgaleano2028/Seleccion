<?php 
session_start();
require_once('class_administracion.php');
$ruta='16pf_instructivo';
$grupo=$_SESSION['grupo'];
$obj= new Administracion();
$orden=$obj->orden($ruta,$grupo);

?>


<html>
  <head>
    <title>16pf</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  </head>
  <body>
		
       	<div class="estirar_form2">
              
			<div class="cambia"  style="height: 640px;">
			
				<div class="modal-header">
					<h3 id="myModalLabel" style="text-align:center">TEST  16PF</h3>					
					<div style="display:none;" id="counter">60:00</div>			
			    </div>
				<div class="modal-body" style="max-height: 555px !important">
				 	<div style="text-align:center; font-weight:bold; font-size: 20px">INSTRUCCIONES</div>
							<br>
							<div style="font-size: 18px; text-align:justify">
								<p>A continuacion encontrara una serie de cuestiones que permitiran conocer sus actitudes e intereses. En general, no existen contestaciones
								correctas o incorrectas, porque las personas tienen distintos intereses y ven las cosas desde distintos puntos de vista. Conteste con sinceridad;
								de esta forma se podra conocer mejor su forma de ser.</p>
								
								<p>Ahora conteste a los ejemplos de practica; para señalar su respuesta elija una de las opciones propuestas. Si tienes dudas preguntale al examinador.</p>
							
						<div style="text-align:justify;margin-top:20px; margin-left: 70px;">
							<p><strong>1.</strong> Me gusta presenciar una competicion deportiva::</p>
						</div>
						<div class="label3" style="margin-left: 110px;">

							<label class="radio inline">
							<input type="radio" name="1"  id="3pf" value="a" >
							<strong>A) Si</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="1"   id="3pf" value="b" >
							<strong>B) A veces</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="1"  id="3pf"  value="c" >
							<strong>C) No</strong>
							</label>

						</div>
						
						<div style="text-align:justify;margin-top:20px; margin-left: 70px;">
							<p><strong>2.</strong> Prefiero las personas:</p>
						</div>
						<div class="label3" style="margin-left: 110px;">

							<label class="radio inline">
							<input type="radio" name="2"  id="3pf" value="a" >
							<strong>A) Reservadas</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="2"   id="3pf" value="b" >
							<strong>B) Termino medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="2"  id="3pf"  value="c" >
							<strong>C) Que hacen amigos facilmente</strong>
							</label>

						</div>
						
						<div style="text-align:justify;margin-top:20px; margin-left: 70px;">
							<p><strong>3.</strong> El dinero no hace la  felicidad:</p>
						</div>
						<div class="label3" style="margin-left: 110px;">

							<label class="radio inline">
							<input type="radio" name="3"  id="3pf" value="a" >
							<strong>A) Verdadero</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="3"   id="3pf" value="b" >
							<strong>B) Termino medio</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="3"  id="3pf"  value="c" >
							<strong>C) Falso</strong>
							</label>

						</div>
						
						<div style="text-align:justify;margin-top:20px; margin-left: 70px;">
							<p><strong>4.</strong> Toro es a Ternero como caballo es a:</p>
						</div>
						<div class="label3" style="margin-left: 110px;">

							<label class="radio inline">
							<input type="radio" name="4"  id="3pf" value="a" >
							<strong>A) Potro</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="4"   id="3pf" value="b" >
							<strong>B) Ternera</strong>
							</label>

							<label class="radio inline">
							<input type="radio" name="4"  id="3pf"  value="c" >
							<strong>C) Yegua</strong>
							</label>

						</div>
						
<br><br>						
						
								<p style="font-weight:bold">ESPERE LA SEÑAL DE COMIENZO</p>
							</div>
							<br>
							<br>	
					<div style="text-align:center; display:block" >
						<input id="pruebas_Btn" type="button" class="16pf <?php echo $orden['orden'] ?> <?php echo $grupo ?> btn btn-primary" value="Empezar"/>		
					</div>
				</div>
				
				
					
				


         	</div>
        </div>

        <div id="pruebas" style="display:none;">

			
		
		</div>


<script src="../../js/caras.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>	

		
</body>
</html>