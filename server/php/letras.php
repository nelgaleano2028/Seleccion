<?php 
session_start();
require_once('class_administracion.php');
$ruta='letras_instructivo';
$grupo=$_SESSION['grupo'];
$obj= new Administracion();
$orden=$obj->orden($ruta,$grupo);



if($orden['tiempo']=="00:00"){	
	 $tiempo="<span style='display:none'>xxxx</span>";	 
}else{
	$tiempo=$orden['tiempo'];
	
}
?>



<html lang="es">
<head>
    <title>Probando el comportamiento droppable de jQueryUI</title>
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
		//border: 2px solid #000;
		
		

	}
	#sueltarojo1, #sueltarojo2, #sueltarojo3, #sueltarojo4, #sueltarojo5, #sueltarojo6, #sueltarojo7, #sueltarojo8, #sueltarojo9, #sueltarojo10, #sueltarojo11, #sueltarojo12, #sueltarojo13,
	#sueltarojo14, #sueltarojo15, #sueltarojo16, #sueltarojo17, #sueltarojo18, #sueltarojo19, #sueltarojo20, #sueltarojo21, #sueltarojo22, #sueltarojo23, #sueltarojo24, #sueltarojo25, #sueltarojo26,
	#sueltarojo27, #sueltarojo28, #sueltarojo29, #sueltarojo30, #sueltarojo31, #sueltarojo32, #sueltarojo33, #sueltarojo34, #sueltarojo35, #sueltarojo36, #sueltarojo37, #sueltarojo38, #sueltarojo39, 
	#sueltarojo40, #sueltarojo41, #sueltarojo42, #sueltarojo43{
		z-index:2;
		/*background-color: #c33;*/
		top: 86px; 
		left: 23px;
		width: 103px;
		height: 1px;
		
		
	
	}
	#sueltaazul1, #sueltaazul2, #sueltaazul3, #sueltaazul4, #sueltaazul5, #sueltaazul6, #sueltaazul7, #sueltaazul8, #sueltaazul9, #sueltaazul10, #sueltaazul11, #sueltaazul12, #sueltaazul13,
	#sueltaazul14, #sueltaazul15, #sueltaazul16, #sueltaazul17, #sueltaazul18, #sueltaazul19, #sueltaazul20, #sueltaazul21, #sueltaazul22, #sueltaazul23, #sueltaazul24, #sueltaazul25,
	#sueltaazul26, #sueltaazul27, #sueltaazul28, #sueltaazul29, #sueltaazul30, #sueltaazul31, #sueltaazul32, #sueltaazul33, #sueltaazul34, #sueltaazul35, #sueltaazul36, #sueltaazul37,
	#sueltaazul38, #sueltaazul39, #sueltaazul40, #sueltaazul41, #sueltaazul42, #sueltaazul43, #sueltaazul44, #sueltaazul45, #sueltaazul46, #sueltaazul47{
		z-index:2;
		/*background-color: #33c;*/				
		width: 2px;
		height: 87px;
		
		
	}
	</style>

</head>
<body> 
	<div>
		
		<div>
					<div id="descripcion" style="display:block; text-align:center; font-size:20px; font-weight:bold">CUADRADO DE LETRAS</div>
					<br>
					<div style="display:block; text-align:center; font-size:20px; font-weight:bold; position: fixed; left: 600px; top: 40px; z-index: 99999;">	
						<p style="color:#D61212; text-align:center; font-size:18px;"  id="counter"><?php echo $tiempo ?></p>
					</div>					
				</div>
				
				
		
		<div style="border-bottom: 1px solid; height: 50px; width:100%;">			
			<form id="<?php echo $grupo; ?>"  class="<?php echo $orden['orden']; ?>" method="post" action="letras_insert.php" >
			<div style="text-align:center; display:block;" >
				<input type="submit"  value="Siguiente Prueba"  class="btn btn-primary"/>
				
			</div>
			</form>
					
		</div> 

		<div style="clear:both;"></div>	
		<!--LOS AZULES SON VERTICALES Y SE POSICIONAN, LOS HORIZONTALES SON LOS ROJOS-->
		<div  style="width:70%; background-color:green; float:left; position:relative;">
		
			<div id="sueltarojo1" style="top: 0.5%; left: 41.5%;"  	class="suelta"></div>
			
			<div id="sueltarojo2" style="top: 9%; left: 61.5%;"  	class="suelta"></div>
			<div id="sueltarojo3" style="top: 6%; left: 20.5%;"   	class="suelta"></div>
			<div id="sueltarojo4" style="top: 9%; left: 0%;"   	class="suelta"></div>
			
			<div id="sueltarojo5" style="top: 14.6%; left: 61.5%;"  	class="suelta"></div>
			<div id="sueltarojo6" style="top: 12.5%; left: 20.5%;"  	class="suelta"></div>
			
			<div id="sueltarojo7" style="top: 20.3%; left: 0%;" 	class="suelta"></div>
			<div id="sueltarojo8" style="top: 18%; left: 40.5%;"  	class="suelta"></div>
			<div id="sueltarojo9" style="top: 19%; left: 61.5%;"  	class="suelta"></div>
			
			<div id="sueltarojo10" style="top: 22.6%; left: 0%;"  	class="suelta"></div>
			<div id="sueltarojo11" style="top: 24.7%; left: 20%;"  	class="suelta"></div>
			<div id="sueltarojo12" style="top: 23.7%; left: 41%;"  	class="suelta"></div>
			<div id="sueltarojo13" style="top: 24.7%; left: 82%;"  	class="suelta"></div>
			<div id="sueltarojo14" style="top: 30.9%; left: 20%;"  	class="suelta"></div>
			<div id="sueltarojo15" style="top: 27.8%; left: 41%;"  	class="suelta"></div>
			<div id="sueltarojo16" style="top: 30.8%; left: 82%;"  	class="suelta"></div>
			<div id="sueltarojo17" style="top: 34.3%; left: 82%;"  	class="suelta"></div>
			<div id="sueltarojo18" style="top: 36.3%; left: 62%;"  	class="suelta"></div>
			
			<div id="sueltarojo19" style="top: 44.3%; left: 82%;"  	class="suelta"></div>
			<div id="sueltarojo20" style="top: 47.5%; left: 62%;"  	class="suelta"></div>
			<div id="sueltarojo21" style="top: 46.3%; left: 41%;"  	class="suelta"></div>
			<div id="sueltarojo22" style="top: 44.6%; left: 20%;"  	class="suelta"></div>
			<div id="sueltarojo23" style="top: 40%; left: 20%;"  	class="suelta"></div>
			
			<!-- -->
			
			<div id="sueltarojo24" style="top: 52%; left: 42%;"  	class="suelta"></div>
			<div id="sueltarojo25" style="top: 50.5%; left: 82%;"  	class="suelta"></div>
			
			
			<div id="sueltarojo26" style="top: 56.8%; left: 21%;"  	class="suelta"></div>
			<div id="sueltarojo27" style="top: 55.4%; left: 63%;"  	class="suelta"></div>			
			<div id="sueltarojo28" style="top: 57.2%; left: 83%;"  	class="suelta"></div>
			
			<div id="sueltarojo29" style="top: 63.1%; left: 63%;"  	class="suelta"></div>			
			<div id="sueltarojo30" style="top: 63.4%; left: 21%;"  	class="suelta"></div>
			
			<div id="sueltarojo31" style="top: 67.5%; left: 83%;"  	class="suelta"></div>
			
			<div id="sueltarojo32" style="top: 75%; left: 83%;"  	class="suelta"></div>			
			<div id="sueltarojo33" style="top: 72%; left: 63%;"  	class="suelta"></div>
			
			<div id="sueltarojo34" style="top: 84.2%; left: 63.6%;"  	class="suelta"></div>
			
			<div id="sueltarojo35" style="top: 89%; left: 1%;"  	class="suelta"></div>
			<div id="sueltarojo36" style="top: 89%; left: 21%;"  	class="suelta"></div>
			<div id="sueltarojo37" style="top: 91.8%; left: 42%;"  	class="suelta"></div>
			<div id="sueltarojo38" style="top: 91.8%; left: 63%;"  	class="suelta"></div>
			
			<div id="sueltarojo39" style="top: 97.4%; left: 83%;"  	class="suelta"></div>
			
			<div id="sueltarojo41" style="top: 77.9%; left: 1%;"  	class="suelta"></div>
			<div id="sueltarojo42" style="top: 80%; left: 20.5%;"  	class="suelta"></div>
			<div id="sueltarojo43" style="top: 80.5%; left: 83%;"  	class="suelta"></div>
			
			<div id="sueltarojo40" style="top: 1.5%; left:  21%;"  	class="suelta"></div>
			
			
			
			
			
			<div id="sueltaazul1" style="top: 0.3%; left: 69.5%;" 	class="suelta"></div>
			<div id="sueltaazul2" style="top: 0.3%; left: 8.9%;" 	class="suelta"></div>
			<div id="sueltaazul3" style="top: 0.3%; left: 87%;" 	class="suelta"></div>
			<div id="sueltaazul4" style="top: 5.5%; left: 43%;" 	class="suelta"></div>	
			<div id="sueltaazul5" style="top: 5.7%; left: 87%;" 	class="suelta"></div>
			
			<div id="sueltaazul6" style="top: 11%; left: 3%;"  	    class="suelta"></div>	
			<div id="sueltaazul7" style="top: 11%; left: 48%;"  	class="suelta"></div>	
			<div id="sueltaazul8" style="top: 11%; left: 92%;"  	class="suelta"></div>
			
			<div id="sueltaazul9" style="top: 16.5%; left: 29.5%;"  	class="suelta"></div>	
			<div id="sueltaazul10" style="top: 16.5%; left: 84%;"  	class="suelta"></div>
			
			<div id="sueltaazul11" style="top: 44.2%; left: 9%;" 	class="suelta"></div>
			
			<div id="sueltaazul12" style="top: 38.5%; left: 1%;" 	class="suelta"></div>	
			<div id="sueltaazul13" style="top: 38.5%; left: 48%;" 	class="suelta"></div>	
			<div id="sueltaazul14" style="top: 38.5%; left: 69%;" 	class="suelta"></div>	
			<div id="sueltaazul15" style="top: 38.5%; left: 92.4%;" 	class="suelta"></div>
			
			<div id="sueltaazul16" style="top: 32.5%; left: 25%;" 	class="suelta"></div>	
			<div id="sueltaazul17" style="top: 32.5%; left: 1%;" 	class="suelta"></div>	
			<div id="sueltaazul18" style="top: 32.5%; left: 48%;" 	class="suelta"></div>	
			<div id="sueltaazul19" style="top: 27.5%; left: 9%;" 	class="suelta"></div>	
			<div id="sueltaazul20" style="top: 27.5%; left: 71.3%;" 	class="suelta"></div>	
			<div id="sueltaazul21" style="top: 22.5%; left: 66%;" 	class="suelta"></div>
			
			<div id="sueltaazul22" style="top: 49.5%; left: 1%;" 	class="suelta"></div>	
			<div id="sueltaazul23" style="top: 49.5%; left: 22%;" 	class="suelta"></div>	
			<div id="sueltaazul24" style="top: 49.5%; left: 72%;" 	class="suelta"></div>
			
			<div id="sueltaazul25" style="top: 55.5%; left: 48.5%;" 	class="suelta"></div>	
			<div id="sueltaazul26" style="top: 55.5%; left: 6.5%;" 	class="suelta"></div>
			
			<div id="sueltaazul27" style="top: 60.5%; left: 4%;" 	class="suelta"></div>	
			<div id="sueltaazul28" style="top: 60.5%; left: 43.6%;" 	class="suelta"></div>	
			<div id="sueltaazul29" style="top: 60.5%; left: 85%;" 	class="suelta"></div>
			
			<div id="sueltaazul30" style="top: 66.5%; left: 46.5%;" 	class="suelta"></div>	
			<div id="sueltaazul31" style="top: 66.5%; left: 31%;" 	class="suelta"></div>	
			<div id="sueltaazul32" style="top: 66.5%; left: 2%;" 		class="suelta"></div>			
			<div id="sueltaazul33" style="top: 66.5%; left: 70%;" 	class="suelta"></div>	
			
			<div id="sueltaazul34" style="top: 72.1%; left: 46.2%;" 	class="suelta"></div>	
			<div id="sueltaazul35" style="top: 72.1%; left: 31%;" 	class="suelta"></div>	
			<div id="sueltaazul36" style="top: 71.5%; left: 7%;" 		class="suelta"></div>

			
			<div id="sueltaazul37" style="top: 77.5%; left: 67%;" 	class="suelta"></div>	
			<div id="sueltaazul38" style="top: 77.5%; left: 46.4%;" 	class="suelta"></div>
			
			<div id="sueltaazul39" style="top: 82.5%; left: 1.7%;" 	class="suelta"></div>	
			<div id="sueltaazul40" style="top: 82.9%; left: 46.4%;" 	class="suelta"></div>
			<div id="sueltaazul41" style="top: 82.5%; left: 85%;" 	class="suelta"></div>
			<div id="sueltaazul42" style="top: 82.5%; left: 22.6%;" 	class="suelta"></div>
			
			<div id="sueltaazul43" style="top: 88.5%; left: 90.3%;" 	class="suelta"></div>
			
			<div id="sueltaazul44" style="top: 93.9%; left: 4.6%;" 	class="suelta"></div>
			<div id="sueltaazul45" style="top: 93.9%; left: 72.6%;" 	class="suelta"></div>
			<div id="sueltaazul46" style="top: 93.9%; left: 28.5%;" 	class="suelta"></div>
			<div id="sueltaazul47" style="top: 93.9%; left: 52%;" 	class="suelta"></div>
			
						
			<div><img src="../../img/letras_completo.png"></div>
		</div>
	
	   <div id="element" style="background-color:rgb(68, 63, 63); width:30%; height: 400px; float:left">
	   		<div style="text-align:center">
	   			<a href="rojo" class="creaelemento"><span style="color:rgb(243, 234, 234); font-weight:bold">Crear RAYA Horizontal</span></a><span style="color:rgb(243, 234, 234); font-weight:bold; font-size:18px"> |</span> 
				<a href="azul" class="creaelemento"><span style="color:rgb(243, 234, 234); font-weight:bold">Crear RAYA Vertical</span></a>
			</div>
		</div> 

	</div>
	<script src="../../js/alert.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
	<script src="../../js/caras.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>	
	
</body>
</html>