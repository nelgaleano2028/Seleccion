<?php session_start();

require_once('class_administracion.php');

$obj=new Administracion();


$datos=$obj->edit_pensamiento($_GET['id']);



?>

<html>
<head>
    <title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>

</head>
<body>


	<div id="contenido9">
		<div class="container-fluid">
			<div class="row-fluid">
	          	<center>
						<div class="cambia" style="height:550px; width:850px">
							
							<div class="modal-header" style="text-align:center">							
								<h3 id="myModalLabel">ESTILO DE APRENDIZAJE Y TIPO DE PENSAMIENTO</h3>
							</div>

							<div class="modal-body" style="max-height: 479px !important;">
							 <form id="info_pensamiento" method="post">
								


								<div style="float:left; width:100%; margin-top:10px">
									<span style="font-weight:bold">OBSERVACION</span><br><br>
									<textarea style=" resize: none; width:800px" name="observacion_4" cols="90" rows="9"><?php echo $datos[0]['observacion_4'] ?></textarea>		
								</div>
									
								
								


								<div style="float:left; width:50%;">
									<span style="font-weight:bold">FORTALEZAS FRENTE AL CARGO</span><br><br>
									<textarea style=" resize: none; width:300px" name="observacion_5" cols="90" rows="9"><?php echo $datos[0]['observacion_5'] ?></textarea>							
								</div>
								
								<div style="float:left; width:50%;">
									<span style="font-weight:bold">ASPECTOS A MEJORAR FRENTE AL CARGO</span><br><br>
									<textarea style=" resize: none; width:300px" name="observacion_6"  cols="90" rows="9"><?php echo $datos[0]['observacion_6'] ?></textarea>	
								</div>
								
								<div style="float:left; width:100%; margin-top:30px">
									<table border="1" style="width: 80%;">
										<tr style="background-color:rgb(201, 201, 201)">
											<td align="center" style="font-weight:bold; font-size:12px">No presenta<br> competencia</td>
											<td align="center" style="font-weight:bold; font-size:12px">Minimo Nivel</td>
											<td align="center" style="font-weight:bold; font-size:12px">Min. posiblidad<br> de desarrollo</td>
											<td align="center" style="font-weight:bold; font-size:12px">Nivel Requerido</td>
											<td align="center" style="font-weight:bold; font-size:12px">Supera lo requerido<br> IDEAL</td>
											
											
										</tr>
										<tr>
											<td><div class="1" style="height:30px"></div></td>
											<td><div class="2" style="height:30px"></div></td>
											<td><div class="3" style="height:30px"></div></td>
											<td><div class="4" style="height:30px"></div></td>
											<td><div class="5" style="height:30px"></div></td>
											
										</tr>
										<tr style="font-weight:bold; font-size:13px">
											<td align="center">1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2</td>
											<td align="center">2,5</td>
											<td align="center">3</td>
											<td align="center">3,5</td>
											<td align="center">4</td>
										</tr>
										
									</table>
								
								</div>

								
							 	 
			                     
							 		<input type="hidden" class="promedio4 bandera4" name="promedio_total" value="<?php 

							 			echo $_GET['promedio'];

							 			/*$promedio_final=(((float)$_GET['promedio'])/3);

							 			echo $promedio_final;*/

							 		?>" />

									<input type="hidden" name="id"  value="<?php echo $_GET['id']?>" />
								
								  <div style="float:left; width:100%; margin-top:50px">
								  		<input type="button" class="btn btn-primary" id="enviar_pensamiento" value="Finalizar"/>
								  </div>
								

							  </form>
							</div>
			          	</div>
				</center>
	   		 </div>
	    </div>
	</div>


   
    <script src="../../js/alert.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
    <script src="../../js/editar_inf.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
</body>
</html>