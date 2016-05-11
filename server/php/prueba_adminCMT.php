<?php session_start();

require_once("class_administracion.php");

$obj= new  Administracion();

$datos=$obj-> resp_cmt_aspirante($_GET['id']);


$cmt= explode(",", $datos[0]['res_asp']);

//print_r($cmt); die();

?>
<html>
<head>
    <title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
    
	<!-- Bootstrap -->
</head>
<body >
	
	<div  class="container-fluid">
		<div class="row-fluid">
			 <table cellpadding="0" cellspacing="0" border="0" class="display " id="admin2" width="100%" style="color:rgb(41,76,139) !important;">
				<thead style="background-color:rgb(41,76,139) !important;">
			        <tr>
						<th style="color:#2b4c88; font-weight: bold" width="10%" scope="col">N°</th>
						<th style="color:#2b4c88; font-weight: bold" width="10%" scope="col">A</th>
						<th style="color:#2b4c88; font-weight: bold" width="9%" scope="col">B</th>
						<th style="color:#2b4c88; font-weight: bold" width="5%" scope="col">C</th>
						<th style="color:#2b4c88; font-weight: bold" width="5%" scope="col">D</th>
						<th style="color:#2b4c88; font-weight: bold" width="5%" scope="col">E</th>								
			        </tr>
			    </thead>
				<tbody>
						<?php 
							$ini=0;
							$fin=4;
						
							if($datos > 0){
							for($i=1; $i<16; $i++){ 
						?>

							<tr> 
										<td align="center"><?php echo $i; ?></td>


											<?php 


											for($j=$ini;$j<=$fin;$j++) {



												if($j % 4 == 0){

													$fin=$ini+4;
													$ini=$j;
												
												}

											?>

										<td align="center"><?php 
											if(@$cmt[$j]==""){

												echo "";

											}else{
												echo $cmt[$j];

											}
										 ?>
									    </td>

											
									  <?php } // fin del for 2?>
			                        </tr>	

						
						<?php 	} 
					
					}?>
					
				</tbody>
			 </table>
		</div>
	</div>

	<script type="text/javascript" charset="utf-8" src="../../js/prueba_adminCMT.js"></script>
</body>
</html>