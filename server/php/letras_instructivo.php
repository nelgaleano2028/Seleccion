<?php 
session_start();
require_once('class_administracion.php');

$ruta='letras_instructivo';
$grupo=$_SESSION['grupo'];
$obj= new Administracion();
$orden=$obj->orden($ruta,$grupo);

?>

<html>
  <head>
    <title>CARAS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <style type="text/css">
	body{
		background-color: #fff;
		
	}
	.azul{
		width: 6px;
		height: 110px;
		position: absolute;
		background-color: #33c;
		z-index:10;
		cursor:pointer;
	}
	
	.rojo{
		width: 110px;
		height: 6px;
		position: absolute;
		background-color: #c33;
		z-index:10;
		cursor:pointer;
	}
	
	
	
	.suelta{
		padding: 10px;		
		width: 140px;
		height: 10px;		
		position: absolute;
		/*border: 2px solid #000;*/
		
		

	}
	#sueltarojo1, #sueltarojo2{
		z-index:2;
		/*background-color: #c33;*/
		top: 86px; 
		left: 23px;
		width: 103px;
		height: 1px;
		
		
	
	}
	#sueltaazul1, #sueltaazul2{
		z-index:2;
		/*background-color: #33c;*/				
		width: 2px;
		height: 87px;
		
		
	}
	</style>
  </head>
  <body>
		
					<div class="estirar_form2" style="margin-top:1% !important">
              
							<h3 id="myModalLabel" style="text-align:center">CUADRADO DE LETRAS</h3>					
							<div style="display:none;" id="counter">60:00</div>			
						
				
				
							<div style="text-align:center; font-weight:bold; font-size: 20px">INSTRUCCIONES</div>
							<br>
							<div style="font-size: 18px">
								<p>El cuadrado siguiente tiene 16 letras distribuidas en 4 filas y 4 columnas. Solamente en una fila o en una columna hay una letra repetida. La columna 
								ha sido marcada para indicar  donde esta la letra repetida.</p>	<br>
								
								<div style="diplay:block; text-align:center"><img src="../../img/letras_ejemplo1.png"></div>
									<br>
																							
								<div style="text-align:justify"><p>A continuacion  hay otros cuadros semejantes para que practiques con ellos. En cada cuadrado identifica la fila o columna en que se repita una letra, 
								determina si es horizontal o vertical, crea la raya segun tu criterio y arrastrala hasta la respuesta indicada.
								Las diagonales no cuentan. Trabajara mas rapidamente si observa el cuadrado entero en lugar de comprobar fila por fila y columna por columna.</p></div>
								
										<br>							
								
								<div style="background-color:red">
									<div  style="width:70%; background-color:green; float:left; position:relative;">
			
										<div id="sueltarojo1" style="top: 26px; left: 193px;"  	class="suelta"></div>
										<div id="sueltarojo2" style="top: 71px; left: 580px;"  	class="suelta"></div>
								
										<div id="sueltaazul1" style="top: 0px; left: 453px;" 	class="suelta"></div>
										<div id="sueltaazul2" style="top: 0px; left: 82px;" 	class="suelta"></div>
						
								
										<div><img src="../../img/letras_ejemplo2.png"></div>
										
									</div>
								
								   <div id="element" style="background-color:rgb(68, 63, 63); width:30%; height: 100px; float:left">
										<div style="text-align:center">
											<a href="rojo" class="creaelemento"><span style="color:rgb(243, 234, 234); font-weight:bold">RAYA Horizontal</span></a><span style="color:rgb(243, 234, 234); font-weight:bold; font-size:18px"> |</span> 
											<a href="azul" class="creaelemento"><span style="color:rgb(243, 234, 234); font-weight:bold">RAYA Vertical</span></a>
										</div>
									</div> 
								</div>
								
								<br><br><br><br>	<br><br><br><br>								
								
								<p>A continuacion tendra que resolver otros problemas semejantes. Trabaje lo mas rapidamente posible y no se detenga  mucho en un mismo cuadrado.<p>
								
								<br><br>
								
								<p style="font-weight:bold">ESPERE LA SEÑAL DE COMIENZO</p>
							</div>
							
							<br>
						
							
							<div style="text-align:center; display:block" >
								<input id="pruebas_Btn" type="button" class="letras <?php echo $orden['orden'] ?> <?php echo $grupo ?> btn btn-primary" value="Empezar"/>
							</div>
							
								<div style="color:white">Este texto no se muestra es hechizo para hacer un enter</div>	
				


         	
					</div>

        <div id="pruebas" style="display:none;">

			
		
		</div>


<script src="../../js/caras.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>	

		
</body>
</html>