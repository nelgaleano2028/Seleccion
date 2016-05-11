<?php session_start();
date_default_timezone_set('America/Bogota');
require_once('class_utilidades.php');
require_once('class_empleado.php');

$obj= new Empleado();

$datos=$obj->get_info_general($_GET['cedula']);

//edad
$dias = explode("-", $datos['fecha_nac'],3);
$dias = mktime(0,0,0,$dias[1],$dias[0],$dias[2]);
$edad = (int)((time()-$dias)/31556926 );

$obj2= new Empleado();

$datos2=$obj2->prueba_aspirante($_GET['cedula']);


$obj3= new Empleado();

$datos3= $obj3->cargos();


$obj4= new Empleado();

$datos4= $obj4-> aspirante_integral($_GET['cedula'])



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
								<h3 id="myModalLabel">INFORMACIÓN GENERAL</h3>
							</div>

							<div class="modal-body" style="max-height: 479px !important;">
							 <form class="info_general" method="post">

									<table border="1" style="width: 100%;">
										<tr>
											<td  style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">NOMBRE:</td>
											<td><input type="input"  style="width:200px" name="nom_asp" value="<?php echo @$datos['nom_asp'];?>" readonly></td>
											<td style="font-weight:bold; background-color:rgb(201, 201, 201); " align="center">APELLIDOS:</td>
											<td><input type="input"  style="width:200px" name="ape_asp" value="<?php echo $datos['ape_asp'];?>" readonly></td>
										</tr>
										<tr>
											<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">EDAD</td>
											<td ><input type="input"  style="width:200px" name="edad" value="<?php echo $edad; ?>" readonly ></td>
											<td style="font-weight:bold; background-color:rgb(201, 201, 201); " align="center">IDENTIFICACION</td>
											<td><input type="input"  style="width:200px" name="identificacion" value="<?php echo @$datos['cod_asp']; ?>"  readonly ></td>
																					
										</tr>
										<tr>
											<td style="font-weight:bold; background-color:rgb(201, 201, 201); " align="center">ESTADO CIVIL</td>
											<td><input type="input"  style="width:200px" name="estado_civil" value="<?php echo @$datos['est_civ']; ?>" readonly ></td>
											<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">CARGO</td>
											<td ><select name="cargo"> 

													
													<?php if(isset($datos4['cargo'])){ ?>
													<option value="<?php echo @$datos4['cargo']; ?> "><?php echo @$datos4['nom_car']; ?> </option>

													<?php } ?>
													<option value="">Seleccione... </option>
													<?php for($i=1; $i< count($datos3); $i++){

															if(@$datos4['nom_car'] !=  @$datos3['nom_car'] ){
														?>



														<option value="<?php echo @$datos3['cod_cargo']; ?> "><?php echo @$datos3['nom_car']; ?> </option>


													<?php }

														}
													?>
												</select>
											</td>
																					
										</tr>
										<tr>
											<td style="font-weight:bold; background-color:rgb(201, 201, 201); " align="center"></td>
																			
										</tr>
										<tr>
											<td colspan="4" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center"> RESULTADOS PRUEBAS PSICOMETRICAS</td>																
										</tr>
										<tr>
											<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">TEST BG3</td>
											<td ><input type="input"  style="width:200px" name="bg3"  value="<?php echo @$datos2['bg3_pc']; ?>" readonly /></td>
											<td style="font-weight:bold; background-color:rgb(201, 201, 201); " align="center">CMT</td>
											<td><input type="input"  style="width:200px" name="cmt" id="cmt" value="<?php echo @$datos4['cmt']; ?>" ></td>
																					
										</tr>
										<tr>
											<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">CUADRADO DE LETRAS</td>
											<td ><input type="input"  style="width:200px" name="letras" value="<?php echo @$datos2['letras_pc']; ?>" readonly ></td>
											<td style="font-weight:bold; background-color:rgb(201, 201, 201); " align="center">TEMPERAMENTO</td>
											<td><input type="input"  style="width:200px" name="temp" value="<?php echo @$datos2['temp_resultado']; ?>" readonly ></td>
																					
										</tr>
										<tr>
											<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">CARAS</td>
											<td ><input type="input"  style="width:200px" name="caras" value="<?php echo @$datos2['pc_caras']; ?>" readonly ></td>
											<td style="font-weight:bold; background-color:rgb(201, 201, 201); " align="center">ESTILO DE APRENDIZAJE</td>
											<td><input type="input"  style="width:200px" name="aprendizaje" value="<?php echo @$datos2['apren_resultado']; ?>"  readonly ></td>
																					
										</tr>
										<tr>
											<td colspan="2" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">PRUEBA DE CONOCIMIENTO</td>
											<td colspan="2"><input type="input"  style="width:200px" name="conocimiento" class="promedio" value="<?php echo @$datos4['conocimiento']; ?>" ></td>
											
										</tr>
										
									</table>
								


									<input type="hidden" name="cedula" value="<?php echo $_GET['cedula'] ?>" />


								  <div style="float:left; width:100%; margin-top:50px">

								  		
										<input type="button" class="btn btn-primary enviar_general"  value="Siguiente"/>

								  		
								  </div>
								

							  </form>
							</div>
			          	</div>
				</center>
	   		 </div>
	    </div>
	</div>


    <div id="contenido10">

    		

    </div>

   
    <script src="../../js/alert.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
    <script src="../../js/consultar_inf.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
</body>
</html>