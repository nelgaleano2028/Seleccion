<html>
<head>
    <title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>

</head>
<body>


	<div id="contenido5">
		<div class="container-fluid">
			<div class="row-fluid">
	          	<center>
						<div class="cambia" style="height:550px; width:850px">
							
							<div class="modal-header" style="text-align:center">							
								<h3 id="myModalLabel">MODALIDAD LABORAL</h3>
							</div>

							<div class="modal-body" style="max-height: 479px !important;">
							 <form id="info_laboral" method="post">
								
								<div style="float:left; width:50%;">
									<span style="font-weight:bold">OBSERVACIONES</span><br><br>
									<textarea style=" resize: none; width:400px"  name="observacion_2" cols="90" rows="9"></textarea>							
								</div>
								
								<div style="float:left; width:50%; padding-top:40px">
									<table border="2">
										<tr>
											<td style="font-weight:bold; background-color:rgb(201, 201, 201)" align="center">COMPETENCIAS</td>
											<td style="font-weight:bold; background-color:rgb(201, 201, 201)">PUNTUACION</td>
										</tr>
										<tr>
											<td style="font-weight:bold; font-size:12px" align="left">Planeacion y Seguimiento</td>
											<td align="center"><input type="input" style="width:50px" name="valor_1_2" class="40" value="0" maxlength="1" onKeyPress="return validarnum(event)" ></td>
										</tr>
										<tr>
											<td style="font-weight:bold; font-size:12px" align="left">Integridad</td>
											<td align="center"><input type="input" style="width:50px" name="valor_2_2" class="50" value="0" maxlength="1" onKeyPress="return validarnum(event)" ></td>
										</tr>
										<tr>
											<td style="font-weight:bold; font-size:12px" align="left">Orientacion a Resultados</td>
											<td align="center"><input type="input" style="width:50px" name="valor_3_2" class="60" value="0" maxlength="1" onKeyPress="return validarnum(event)" ></td>
										</tr>
										<tr>
											<td style="font-weight:bold; font-size:12px" align="center">Promedio Total</td>
											<td align="center"><input type="input" readonly style="width:50px" name="promedio_total3" class="promedio" value="0" maxlength="1" ></td>
										</tr>
									</table> 
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
							 	 
			                     
							 		
									<input type="hidden" name="promedio_total2" value="<?php echo $_GET['promedio']?>" />

									<input type="hidden" name="id" id="id"  value="<?php echo $_GET['id']?>" />


								  <div style="float:left; width:100%; margin-top:50px">
								  		<input type="button" class="btn btn-primary ant_atencion"  value="Anterior"/>&nbsp;
								  		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  		<input type="button" class="btn btn-primary enviar_laboral"  value="Siguiente"/>
								  </div>
								

							  </form>
							</div>
			          	</div>
				</center>
	   		 </div>
	    </div>
	</div>


    <div id="contenido6">

    		

    </div>

   
    <script src="../../js/alert.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
    <script src="../../js/consultar_inf.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
</body>
</html>