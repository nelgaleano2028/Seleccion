<?php session_start();

require_once("class_administracion.php");

$obj= new  Administracion();

$datos=$obj-> resp_pf_aspirante($_GET['id']);


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
						<th style="color:#2b4c88; font-weight: bold" width="10%" scope="col">Codigo</th>
						<th style="color:#2b4c88; font-weight: bold" width="10%" scope="col">DM</th>
						<th style="color:#2b4c88; font-weight: bold" width="10%" scope="col">A</th>
						<th style="color:#2b4c88; font-weight: bold" width="9%" scope="col">B</th>
						<th style="color:#2b4c88; font-weight: bold" width="5%" scope="col">C</th>
						<th style="color:#2b4c88; font-weight: bold" width="5%" scope="col">E</th>
						<th style="color:#2b4c88; font-weight: bold" width="5%" scope="col">F</th>	
						<th style="color:#2b4c88; font-weight: bold" width="5%" scope="col">G</th>
						<th style="color:#2b4c88; font-weight: bold" width="5%" scope="col">H</th>
						<th style="color:#2b4c88; font-weight: bold" width="5%" scope="col">I</th>
						<th style="color:#2b4c88; font-weight: bold" width="5%" scope="col">L</th>
						<th style="color:#2b4c88; font-weight: bold" width="5%" scope="col">M</th>
						<th style="color:#2b4c88; font-weight: bold" width="5%" scope="col">N</th>
						<th style="color:#2b4c88; font-weight: bold" width="5%" scope="col">O</th>
						<th style="color:#2b4c88; font-weight: bold" width="5%" scope="col">Q1</th>
						<th style="color:#2b4c88; font-weight: bold" width="5%" scope="col">Q2</th>	
						<th style="color:#2b4c88; font-weight: bold" width="5%" scope="col">Q3</th>	
						<th style="color:#2b4c88; font-weight: bold" width="5%" scope="col">Q4</th>	
						<th style="color:#2b4c88; font-weight: bold" width="5%" scope="col">fecha</th>									
			        </tr>
			    </thead>
				<tbody>
						<?php 
						
						
							if($datos > 0){
							for($i=0; $i<count($datos); $i++){ 
						?>
						<tr> 
							<td align="center"><?php echo $datos[$i]['cod_aspirante']; ?></td>
							<td align="center"><?php echo $datos[$i]['dm']; ?></td>
							<td align="center"><?php echo $datos[$i]['A']; ?></td>
							<td align="center"><?php echo $datos[$i]['B']; ?></td>
							<td align="center"><?php echo $datos[$i]['C']; ?></td>
							<td align="center"><?php echo $datos[$i]['E']; ?></td>
							<td align="center"><?php echo $datos[$i]['F']; ?></td>
							<td align="center"><?php echo $datos[$i]['G']; ?></td>
							<td align="center"><?php echo $datos[$i]['H']; ?></td>
							<td align="center"><?php echo $datos[$i]['I']; ?></td>
							<td align="center"><?php echo $datos[$i]['L']; ?></td>
							<td align="center"><?php echo $datos[$i]['M']; ?></td>
							<td align="center"><?php echo $datos[$i]['N']; ?></td>
							<td align="center"><?php echo $datos[$i]['O']; ?></td>
							<td align="center"><?php echo $datos[$i]['Q1']; ?></td>
							<td align="center"><?php echo $datos[$i]['Q2']; ?></td>
							<td align="center"><?php echo $datos[$i]['Q3']; ?></td>
							<td align="center"><?php echo $datos[$i]['Q4']; ?></td>
							<td align="center"><?php echo $datos[$i]['fecha']; ?></td>

                        </tr>
						
						<?php 	} 
					
					}?>
				</tbody>
			 </table>
		</div>
	</div>

	<script type="text/javascript" charset="utf-8" src="../../js/prueba_admin16PF.js"></script>
</body>
</html>