<?php 
session_start();
require_once('class_administracion.php');
$ruta='temperamento_instructivo';
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

    <link rel="stylesheet" href="../../css/style_caras.css?css=<?php echo rand(1, 100);?>"  />

</head>
<body>

		<div>
					<div id="descripcion" style="display:block; text-align:center; font-size:20px; font-weight:bold">TEST DEL TEMPERAMENTO HUMANO</div>
					<br>
					<div style="display:block; text-align:center; font-size:20px; font-weight:bold; position: fixed; left: 600px; top: 40px; z-index: 99999;">	
						<p style="color:#D61212; text-align:center; font-size:18px;"  id="counter"><?php echo $tiempo ?></p>
					</div>					
		</div>


<form id="<?php echo $grupo; ?>"  class="<?php echo $orden['orden']; ?>" action="c_temperamento_resp.php" method="post"> 

	<center>
	<table border="1" width="95%">
		<tr style="background-color: rgb(200, 213, 208);">
			<td colspan="5" id="titulo_2"><div  style="text-align:center; margin: 15px">CARACTERISTICAS QUE RESALTAN LA MAYOR PARTE DEL TIEMPO</div></td>			
		</tr>
		<tr>
			<td style="width:40px; background-color: rgb(200, 213, 208); font-size:20px">1</td>
			<td style="width:340px; "><div class="grupo">Animado</div><div class="grupo_2"> <input class="1"   id="1t" type="radio" name="1" value="Animado" style="width: 25px; height: 25px;"/></div></td>
			<td style="width:340px;"><div class="grupo">Aventurero </div><div class="grupo_2"><input class="2" id="1t" type="radio" name="1" value="Aventurero" style="width: 25px; height: 25px;"/></td>
			<td style="width:340px;"><div class="grupo">Analitico</div><div class="grupo_2"> <input class="3"  id="1t" type="radio" name="1" value="Analitico" style="width: 25px; height: 25px;"/></td>
			<td style="width:340px;"><div class="grupo">Adaptable</div><div class="grupo_2"> <input class="4" id="1t"  type="radio" name="1" value="Adaptable" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">2</td>
			<td><div class="grupo">Jugueton</div><div class="grupo_2"> <input class="1" id="2t" type="radio" name="2" value="jugeton" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Persuasivo </div><div class="grupo_2" ><input class="2" id="2t" type="radio" name="2" value="Aventurero" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Persistente</div><div class="grupo_2"> <input class="3" id="2t" type="radio" name="2" value="Analitico" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Placido</div><div class="grupo_2"> <input class="4" id="2t" type="radio" name="2" value="Adaptable" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">3</td>
			<td><div class="grupo">Sociable</div><div class="grupo_2"> <input class="1"  id="3t" type="radio" name="3" value="Sociable" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Decidido </div><div class="grupo_2" ><input class="2"  id="3t" type="radio" name="3" value="Decidido" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Abnegado(Que se sacrifica por otros)</div><div class="grupo_2"> <input class="3" id="3t"  type="radio" name="3" value="Abnegado" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Sumiso</div><div class="grupo_2"> <input class="4" id="3t"  type="radio" name="3" value="Sumiso" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">4</td>
			<td><div class="grupo">Convincente</div><div class="grupo_2"> <input class="1" id="4t" type="radio" name="4" value="Convincente" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Competitivo(Que vende cosas o ideas) </div><div class="grupo_2" ><input class="2" id="4t"  type="radio" name="4" value="Competitivo" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Considerado</div><div class="grupo_2"> <input class="3" id="4t" type="radio" name="4" value="Considerado" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Controlado</div><div class="grupo_2"> <input class="4" id="4t"  type="radio" name="4" value="Controlado" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">5</td>
			<td><div class="grupo">Entusiasta</div><div class="grupo_2"> <input class="1" id="5t"  type="radio" name="5" value="Entusiasta" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Inventivo </div><div class="grupo_2" ><input class="2" id="5t" type="radio" name="5" value="Inventivo" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Respetuoso</div><div class="grupo_2"> <input class="3"id="5t"  type="radio" name="5" value="Respetuoso" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Reservado</div><div class="grupo_2"> <input class="4" id="5t" type="radio" name="5" value="Reservado" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">6</td>
			<td><div class="grupo">Energico</div><div class="grupo_2"> <input class="1" id="6t"  type="radio" name="6" value="Energico" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Autosuficiente(Habla o actua con suficiencia) </div><div class="grupo_2" ><input class="2" id="6"  type="radio" name="6" value="Autosuficiente" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Sensible</div><div class="grupo_2"> <input class="3" id="6t"  type="radio" name="6" value="Sensible" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Contento</div><div class="grupo_2"> <input class="4" id="6t"  type="radio" name="6" value="Contento" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">7</td>
			<td><div class="grupo">Positivo</div><div class="grupo_2"> <input class="1" id="7t" type="radio" name="7" value="Positivo" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Activista </div><div class="grupo_2" ><input class="2" id="7t" type="radio" name="7" value="Activista" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Planificador</div><div class="grupo_2"> <input class="3" id="7t" type="radio" name="7" value="Planificador" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Paciente</div><div class="grupo_2"> <input class="4" id="7t" type="radio" name="7" value="Paciente" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">8</td>
			<td><div class="grupo">Espontaneo</div><div class="grupo_2"> <input class="1" id="8t"  type="radio" name="8" value="Espontaneo" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Seguro en si mismo </div><div class="grupo_2" ><input class="2" id="8t"  type="radio" name="8" value="Seguro en si mismo" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Puntual</div><div class="grupo_2"> <input class="3" id="8t"  type="radio" name="8" value="Puntual" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Timido</div><div class="grupo_2"> <input class="4"  id="8t" type="radio" name="8" value="Timido" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">9</td>
			<td><div class="grupo">Optimista</div><div class="grupo_2"> <input class="1" id="9t" type="radio" name="9" value="Optimista" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Abierto </div><div class="grupo_2" ><input class="2" id="9t" type="radio" name="9" value="Abierto" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Ordenado</div><div class="grupo_2"> <input class="3" id="9t" type="radio" name="9" value="Ordenado" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Atento</div><div class="grupo_2"> <input class="4" id="9t" type="radio" name="9" value="Atento" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">10</td>
			<td><div class="grupo">Humoristico</div><div class="grupo_2"> <input class="1" id="10t"   type="radio" name="10" value="Humoristico" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Dominante </div><div class="grupo_2" ><input class="2" id="10t" type="radio" name="10" value="Dominante" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Fiel</div><div class="grupo_2"> <input class="3" id="10t" type="radio" name="10" value="Fiel" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Amigable</div><div class="grupo_2"> <input class="4" id="10t" type="radio" name="10" value="Amigable" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">11</td>
			<td><div class="grupo">Encantador</div><div class="grupo_2"> <input class="1" id="11t"  type="radio" name="11" value="Encantador" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Osado </div><div class="grupo_2" ><input class="2"  id="11t" type="radio" name="11" value="Osado" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Detallista</div><div class="grupo_2"> <input class="3" id="11t"  type="radio" name="11" value="Detallista" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Diplomatico</div><div class="grupo_2"> <input class="4" id="11t"  type="radio" name="11" value="Diplomatico" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">12</td>
			<td><div class="grupo">Alegre</div><div class="grupo_2"> <input class="1"  id="12t"  type="radio" name="12" value="Alegre" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Confiado </div><div class="grupo_2" ><input class="2"  id="12t" type="radio" name="12" value="Confiado" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Culto</div><div class="grupo_2"> <input class="3" id="12t"  type="radio" name="12" value="Culto" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Constante</div><div class="grupo_2"> <input class="4"  id="12t" type="radio" name="12" value="Constante" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">13</td>
			<td><div class="grupo">Inspirador</div><div class="grupo_2"> <input class="1"  id="13t"  type="radio" name="13" value="Inspirador" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Independiente </div><div class="grupo_2" ><input class="2"  id="13t" type="radio" name="13" value="Independiente" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Idealista</div><div class="grupo_2"> <input class="3" id="13t"  type="radio" name="13" value="Idealista" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Inofensivo</div><div class="grupo_2"> <input class="4"  id="13t" type="radio" name="13" value="Inofensivo" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">14</td>
			<td><div class="grupo">Calido</div><div class="grupo_2"> <input class="1"  id="14t" type="radio" name="14" value="Calido" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Decisivo </div><div class="grupo_2" ><input class="2"  id="14t" type="radio" name="14" value="Decisivo" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Introspectivo(Reflexivo hacia si mismo)</div><div class="grupo_2"> <input class="3" id="14t" type="radio" name="14" value="Introspectivo" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Humor Seco</div><div class="grupo_2"> <input class="4" id="14t" type="radio" name="14" value="Humor Seco" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">15</td>
			<td><div class="grupo">Cordial</div><div class="grupo_2"> <input class="1" id="15t" type="radio" name="15" value="Cordial" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Instigador </div><div class="grupo_2" ><input class="2" id="15t" type="radio" name="15" value="Instigador" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Con Intereses Artisticos - Creativo	</div><div class="grupo_2"> <input class="3" id="15t"  type="radio" name="15" value="Creativo" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Conciliador</div><div class="grupo_2"> <input class="4" id="15t" type="radio" name="15" value="Conciliador" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">16</td>
			<td><div class="grupo">Conversador</div><div class="grupo_2"> <input class="1"  id="16t"  type="radio" name="16" value="Conversador" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Tenaz </div><div class="grupo_2" ><input class="2"  id="16t" type="radio" name="16" value="Tenaz" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Considerado</div><div class="grupo_2"> <input class="3"  id="16t" type="radio" name="16" value="Considerado" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Tolerante</div><div class="grupo_2"> <input class="4"  id="16t" type="radio" name="16" value="Tolerante" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">17</td>
			<td><div class="grupo">Vivaz</div><div class="grupo_2"> <input class="1"  id="17t"  type="radio" name="17" value="Vivaz" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Lider </div><div class="grupo_2" ><input class="2"  id="17t" type="radio" name="17" value="Lider" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Leal</div><div class="grupo_2"> <input class="3" id="17t"  type="radio" name="17" value="Leal" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Escucha</div><div class="grupo_2"> <input class="4" id="17t"  type="radio" name="17" value="Escucha" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">18</td>
			<td><div class="grupo">Listo</div><div class="grupo_2"> <input class="1"  id="18t" type="radio" name="18" value="Listo" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Jefe </div><div class="grupo_2" ><input  class="2" id="18t" type="radio" name="18" value="Jefe" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Organizado</div><div class="grupo_2"> <input class="3"  id="18t" type="radio" name="18" value="Organizado" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Contento</div><div class="grupo_2"> <input class="4" id="18t" type="radio" name="18" value="Contento" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">19</td>
			<td><div class="grupo">Popular</div><div class="grupo_2"> <input class="1" id="19t"  type="radio" name="19" value="Animado" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Productivo(Que se enfoca en los resultados) </div><div class="grupo_2" ><input class="2" id="19t"  type="radio" name="19" value="Aventurero" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Perfeccionista</div><div class="grupo_2"> <input class="3" id="19t"  type="radio" name="19" value="Analitico" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Permisivo</div><div class="grupo_2"> <input class="4" id="19t"  type="radio" name="19" value="Adaptable" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">20</td>
			<td><div class="grupo">Jovial</div><div class="grupo_2"> <input class="1"  id="20t" type="radio" name="20" value="Jovial" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Atrevido </div><div class="grupo_2" ><input class="2" id="20t" type="radio" name="20" value="Atrevido" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Se comporta bien</div><div class="grupo_2"> <input class="3" id="20t" type="radio" name="20" value="Se comporta bien" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Equilibrado</div><div class="grupo_2"> <input class="4"  id="20t" type="radio" name="20" value="Equilibrado" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr style="background-color: rgb(200, 213, 208);">
			<td colspan="5" id="titulo_2"><div style="text-align:center; margin: 15px">ASPECTOS QUE SE RESALTAN EN MOMENTOS CRITICOS</div></td>
		</tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">21</td>
			<td><div class="grupo">Estridente(Que habla fuerte)</div><div class="grupo_2"> <input class="1"  id="21t" type="radio" name="21" value="Estridente" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Mandon </div><div class="grupo_2" ><input class="2" id="21t" type="radio" name="21" value="Mandon" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Desanimado</div><div class="grupo_2"> <input class="3"  id="21t" type="radio" name="21" value="Desanimado" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Soso</div><div class="grupo_2"> <input class="4" id="21t" type="radio" name="21" value="Soso" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr >
			<td style="background-color: rgb(200, 213, 208); font-size:20px">22</td>
			<td><div class="grupo">Indiciplinado</div><div class="grupo_2"> <input class="1"  id="22t" type="radio" name="22" value="Indiciplinado" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Antipatico </div><div class="grupo_2" ><input class="2"  id="22t" type="radio" name="22" value="Antipatico" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Sin entusiasmo</div><div class="grupo_2"> <input class="3" id="22t"  type="radio" name="22" value="Sin entusiasmo" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Implacable</div><div class="grupo_2"> <input class="4" id="22t"  type="radio" name="22" value="Implacable" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">23</td>
			<td><div class="grupo">Repetidor</div><div class="grupo_2"> <input class="1" id="23t" type="radio" name="23" value="Repetidor" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Resistente </div><div class="grupo_2" ><input class="2" id="23t" type="radio" name="23" value="Resistente" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Resentido</div><div class="grupo_2"> <input class="3" id="23t"  type="radio" name="23" value="Resentido" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Reservado-Reticente</div><div class="grupo_2"> <input class="4" id="23t"  type="radio" name="23" value="Reservado" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">24</td>
			<td><div class="grupo">Olvidadizo</div><div class="grupo_2"> <input class="1" id="24t" type="radio" name="24" value="Olvidadizo" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Franco </div><div class="grupo_2" ><input  class="2" id="24t" type="radio" name="24" value="Franco" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Exigente</div><div class="grupo_2"> <input class="3" id="24t" type="radio" name="24" value="Exigente" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Temeroso</div><div class="grupo_2"> <input class="4" id="24t" type="radio" name="24" value="Temeroso" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">25</td>
			<td><div class="grupo">Interrumpe</div><div class="grupo_2"> <input class="1" id="25t"  type="radio" name="25" value="Interrumpe" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Impaciente </div><div class="grupo_2" ><input class="2" id="25t"  type="radio" name="25" value="Impaciente" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Inseguro</div><div class="grupo_2"> <input class="3" id="25t"  type="radio" name="25" value="Inseguro" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Indeciso</div><div class="grupo_2"> <input class="4" id="25t"  type="radio" name="25" value="Indeciso" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">26</td>
			<td><div class="grupo">Impredecible</div><div class="grupo_2"> <input class="1" id="26t" type="radio" name="26" value="Impredecible" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Frio </div><div class="grupo_2" ><input class="2"  id="26t" type="radio" name="26" value="Frio" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">No comprometido</div><div class="grupo_2"> <input class="3" id="26t" type="radio" name="26" value="No comprometido" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Impopular</div><div class="grupo_2"> <input  class="4" id="26t" type="radio" name="26" value="Impopular" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">27</td>
			<td><div class="grupo">Descuidado</div><div class="grupo_2"> <input class="1"  id="27t" type="radio" name="27" value="Descuidado" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Terco </div><div class="grupo_2" ><input class="2" id="27t" type="radio" name="27" value="Terco" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Dificil de Contentar</div><div class="grupo_2"> <input class="3" id="27t" type="radio" name="27" value="Dificil de Contentar" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Vacilante</div><div class="grupo_2"> <input class="4" id="27t" type="radio" name="27" value="Vacilante" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">28</td>
			<td><div class="grupo">Tolerante</div><div class="grupo_2"> <input class="1"   id="28t" type="radio" name="28" value="Tolerante" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Orgulloso </div><div class="grupo_2" ><input class="2"  id="28t"  type="radio" name="28" value="Orgulloso" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Pesimista</div><div class="grupo_2"> <input class="3"  id="28t"  type="radio" name="28" value="Pesimista" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Insipido</div><div class="grupo_2"> <input class="4"  id="28t" type="radio" name="28" value="Insipido" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">29</td>
			<td><div class="grupo">Iracundo</div><div class="grupo_2"> <input class="1"  id="29t" type="radio" name="29" value="Iracundo" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Argumentador </div><div class="grupo_2" ><input class="2" id="29t" type="radio" name="29" value="Argumentador" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Sin Motivacion</div><div class="grupo_2"> <input class="3" id="29t" type="radio" name="29" value="Sin Motivacion" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Taciturno-Silencioso</div><div class="grupo_2"> <input class="4" id="29t" type="radio" name="29" value="Silencioso" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">30</td>
			<td><div class="grupo">Ingenuo</div><div class="grupo_2"> <input class="1"   id="30t"  type="radio" name="30" value="Ingenuo" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Nervioso </div><div class="grupo_2" ><input class="2"  id="30t"  type="radio" name="30" value="Nervioso" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Negativo</div><div class="grupo_2"> <input  class="3" id="30t"  type="radio" name="30" value="Negativo" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Desprendido</div><div class="grupo_2"> <input class="4" id="30t" type="radio" name="30" value="Desprendido" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">31</td>
			<td><div class="grupo">Egocentrico</div><div class="grupo_2"> <input class="1" id="31t" type="radio" name="31" value="Egocentrico" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Adicto al trabajo </div><div class="grupo_2" ><input class="2" id="31t"  type="radio" name="31" value="Adicto al trabajo" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Distraido</div><div class="grupo_2"> <input class="3" id="31t"  type="radio" name="31" value="Distraido" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Ansioso</div><div class="grupo_2"> <input class="4" id="31t" type="radio" name="31" value="Ansioso" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">32</td>
			<td><div class="grupo">Hablador</div><div class="grupo_2"> <input class="1"  id="32t" type="radio" name="32" value="Hablador" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Indiscreto </div><div class="grupo_2" ><input class="2" id="32t"  type="radio" name="32" value="Indiscreto" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Susceptible</div><div class="grupo_2"> <input class="3" id="32t"  type="radio" name="32" value="Susceptible" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Timido</div><div class="grupo_2"> <input class="4"  id="32t" type="radio" name="32" value="Timido" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">33</td>
			<td><div class="grupo">Desorganizado</div><div class="grupo_2"> <input class="1" id="33t"  type="radio" name="33" value="Desorganizado" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Dominante </div><div class="grupo_2" ><input class="2" id="33t"  type="radio" name="33" value="Dominante" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Deprimido</div><div class="grupo_2"> <input class="3" id="33t" type="radio" name="33" value="Deprimido" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Dudoso</div><div class="grupo_2"> <input class="4" id="33t"  type="radio" name="33" value="Dudoso" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">34</td>
			<td><div class="grupo">Inconsistente(Que no termina lo que hace)</div><div class="grupo_2"> <input class="1"  id="34t" type="radio" name="34" value="Inconsistente" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Intolerante </div><div class="grupo_2" ><input class="2"  id="34t" type="radio" name="34" value="Intolerante" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Introvertido(Poco sociable)</div><div class="grupo_2"> <input class="3" id="34t" type="radio" name="34" value="Introvertido" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Indiferente</div><div class="grupo_2"> <input class="4" id="34t" type="radio" name="34" value="Indiferente" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">35</td>
			<td><div class="grupo">Desordenado</div><div class="grupo_2"> <input class="1" id="35t"  type="radio" name="35" value="Desordenado" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Manipulador </div><div class="grupo_2" ><input class="2" id="35t"  type="radio" name="35" value="Manipulador" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Moroso(Deudor, Pausado o Lento)</div><div class="grupo_2"> <input class="3" id="35t"  type="radio" name="35" value="Moroso" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Quejumbroso</div><div class="grupo_2"> <input class="4"  id="35t" type="radio" name="35" value="Quejumbroso" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">36</td>
			<td><div class="grupo">Ostentoso(Le gusta llamar la atencion)</div><div class="grupo_2"> <input class="1" id="36t"  type="radio" name="36" value="Ostentoso" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Testarudo </div><div class="grupo_2" ><input class="2" id="36t"  type="radio" name="36" value="Testarudo" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Esceptico</div><div class="grupo_2"> <input class="3" id="36t"  type="radio" name="36" value="Esceptico" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Lento</div><div class="grupo_2"> <input class="4" id="36t"  type="radio" name="36" value="Lento" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">37</td>
			<td><div class="grupo">Emocional(Que actua dependiendo de su emocion)</div><div class="grupo_2"> <input class="1" id="37t" type="radio" name="37" value="Inconsistente" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Prepotente </div><div class="grupo_2" ><input class="2" id="37t" type="radio" name="37" value="Intolerante" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Solitario</div><div class="grupo_2"> <input class="3" id="37t" type="radio" name="37" value="Introvertido" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Perezoso</div><div class="grupo_2"> <input class="4" id="37t" type="radio" name="37" value="Indiferente" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">38</td>
			<td><div class="grupo">Atolondrado-Torpe</div><div class="grupo_2"> <input class="1"  id="38t" type="radio" name="38" value="Atolondrado" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Malgeniado </div><div class="grupo_2" ><input class="2" id="38t"  type="radio" name="38" value="Malgeniado" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Suspicaz-Desconfiado</div><div class="grupo_2"> <input class="3" id="38t"  type="radio" name="38" value="Desconfiado" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Sin ambiciones</div><div class="grupo_2"> <input class="4"  id="38t" type="radio" name="38" value="Sin ambiciones" style="width: 25px; height: 25px;"/></td>
		<tr>
		
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">39</td>
			<td><div class="grupo">Inquieto</div><div class="grupo_2"> <input class="1"  id="39t"  type="radio" name="39" value="Inconsistente" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Precipitado </div><div class="grupo_2" ><input class="2" id="39t"  type="radio" name="39" value="Intolerante" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Vengativo</div><div class="grupo_2"> <input class="3" id="39t"  type="radio" name="39" value="Introvertido" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Poca Voluntad</div><div class="grupo_2"> <input class="4"id="39t"   type="radio" name="39" value="Indiferente" style="width: 25px; height: 25px;"/></td>
		<tr>
		<tr>
			<td style="background-color: rgb(200, 213, 208); font-size:20px">40</td>
			<td><div class="grupo">Variable</div><div class="grupo_2"> <input class="1" id="40t" type="radio" name="40" value="Variable" style="width: 25px; height: 25px;"/></div></td>
			<td><div class="grupo">Astuto </div><div class="grupo_2" ><input class="2" id="40t" type="radio" name="40" value="Astuto" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Comprometedor</div><div class="grupo_2"> <input class="3" id="40t" type="radio" name="40" value="Comprometedor" style="width: 25px; height: 25px;"/></td>
			<td><div class="grupo">Critico</div><div class="grupo_2"> <input class="4" id="40t" type="radio" name="40" value="Critico" style="width: 25px; height: 25px;"/></td>
		<tr>
	</table>
	</center>
	<br>
	<div style="text-align:center; display:block" >
		<input type="submit" value="Siguiente" class="btn btn-primary">							
	</div>
</form>


<script src="../../js/caras.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>	

</body>
</html>