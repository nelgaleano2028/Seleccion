<?php
session_start();
require_once("../librerias/lib/connection.php");
require_once('../librerias/tcpdf/config/lang/spa.php');
require_once('../librerias/tcpdf/tcpdf.php');
require_once("class_informe.php");

global $conn;



$obj= new  informe_integral();
$lista=$obj->get_informe_integral();





$sql="select * from informe_integral";


//promedios

$resultado_prom1=($lista[0]['valor_1_1']+$lista[0]['valor_2_1']+$lista[0]['valor_3_1'])/3;
$resultado_prom2=($lista[0]['valor_1_2']+$lista[0]['valor_2_2']+$lista[0]['valor_3_2'])/3;
$resultado_prom3=($lista[0]['valor_1_3']+$lista[0]['valor_2_3']+$lista[0]['valor_3_3'])/3;
$resultado_prom4=($lista[0]['valor_1_4']+$lista[0]['valor_2_4']+$lista[0]['valor_3_4'])/3;



 $html='<table border="1">
			<thead>
				<tr>
					<th scope="col" colspan="4"  align="center">&nbsp;<br>CENTRO MEDICO IMBANACO DE CALI INFORME INTEGRAL <br><br> GERENCIA ADMINISTRATIVA DEPARTAMENTO DE GESTION HUMANA<br></th>
				
					
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="4" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">&nbsp;<br>INFORMACION GENERAL<br></td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">NOMBRE CANDIDATO</td>
					<td>&nbsp;'.@$lista[0]['nombre_asp'].'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">APELLIDO CANDIDATO</td>
					<td>&nbsp;'.@$lista[0]['apellido_asp'].'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">EDAD</td>
					<td>&nbsp;'.@$lista[0]['edad'].'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">IDENTIFICACION</td>
					<td>&nbsp;'.@$lista[0]['identificacion'].'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">ESTADO CIVIL</td>
					<td>&nbsp;'.@$lista[0]['estado_civil'].'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">CARGO</td>
					<td>&nbsp;'.@$lista[0]['cargo'].'</td>
				</tr>
				<tr>
					<td colspan="4" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">&nbsp;<br>RESULTADOS PRUEBAS PSICOMETRICAS<br></td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">TEST BG3</td>
					<td>&nbsp;'.@$lista[0]['bg3'].'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">CMT</td>
					<td>&nbsp;'.@$lista[0]['cmt'].'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">CUADRADO DE LETRAS</td>
					<td>&nbsp;'.@$lista[0]['letras'].'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">TEMPERAMENTO</td>
					<td>&nbsp;'.@$lista[0]['temp'].'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">CARAS</td>
					<td>&nbsp;'.@$lista[0]['caras'].'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">ESTILO DE APRENDIZAJE</td>
					<td>&nbsp;'.@$lista[0]['aprendizaje'].'</td>
				</tr>
				<tr>
					<td colspan="2" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">PRUEBA DE CONOCIMIENTO</td>
					<td colspan="2">&nbsp;&nbsp;'.@$lista[0]['conocimiento'].'</td>					
				</tr>
				<tr>
					<td colspan="4" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">&nbsp;<br>OBSERVACIONES GENERALES DE ENTREVISTA PSICOSOCIAL<br></td>
				</tr>
				<tr>
					<td colspan="4" align="center">'.@$lista[0]['observacion_psico'].'<br></td>
				</tr>
				
				<!--OJO 1-->
				
				<tr>
					<td colspan="4" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center" height="22px">ATENCION AL DETALLE</td>
				</tr>
				<tr>
					<td colspan="2" rowspan="5" align="center">'.@$lista[0]['observacion_1'].'</td>
					<td colspan="1" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">COMPETENCIAS</td>
					<td colspan="1" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">PUNTUACION</td>					
				</tr>
				<tr>
					
					<td colspan="1" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">Atencion Focalizada</td>
					<td colspan="1" align="center">'.@$lista[0]['valor_1_1'].'</td>					
				</tr>
				
				<tr>
					
					<td colspan="1" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">Atencion Selectiva</td>
					<td colspan="1" align="center">'.@$lista[0]['valor_2_1'].'</td>					
				</tr>
				<tr>
					
					<td colspan="1" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">Agilidad procesamiento informacion</td>
					<td colspan="1" align="center">'.@$lista[0]['valor_3_1'].'</td>					
				</tr>
				<tr>
					
					<td colspan="1" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">Promedio Total</td>
					<td colspan="1" align="center">'.$resultado_prom1.'</td>					
				</tr>
				
				
				<!--OJO 2-->
				
				<tr>
					<td colspan="4" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center" height="22px">MODALIDAD LABORAL</td>
				</tr>
				<tr>
					<td colspan="2" rowspan="5" align="center">'.@$lista[0]['observacion_2'].'</td>
					<td colspan="1" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">COMPETENCIAS</td>
					<td colspan="1" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">PUNTUACION</td>					
				</tr>
				<tr>
					
					<td colspan="1" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">'.@$lista[0]['comp_uno_laboral'].'</td>
					<td colspan="1" align="center">'.@$lista[0]['valor_1_2'].'</td>					
				</tr>
				
				<tr>
					
					<td colspan="1" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">'.@$lista[0]['comp_dos_laboral'].'</td>
					<td colspan="1" align="center">'.@$lista[0]['valor_2_2'].'</td>					
				</tr>
				<tr>
					
					<td colspan="1" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">'.@$lista[0]['comp_tres_laboral'].'</td>
					<td colspan="1" align="center">'.@$lista[0]['valor_3_2'].'</td>					
				</tr>
				<tr>
					
					<td colspan="1" align="center" style="font-weight:bold; background-color:rgb(201, 201, 201);">PROMEDIO TOTAL</td>
					<td colspan="1" align="center">'.$resultado_prom2.'</td>					
				</tr>
				
				<!--OJO 3-->
				
				<tr>
					<td colspan="4" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center" align="center" height="22px">NIVEL AFECTIVO</td>
				</tr>
				<tr>
					<td colspan="2"  rowspan="5" align="center">'.@$lista[0]['observacion_3'].'</td>
					<td colspan="1" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">COMPETENCIAS</td>
					<td colspan="1" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">PUNTUACION</td>					
				</tr>
				<tr>
					
					<td colspan="1" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center" align="center">ESTABILIDAD EMOCIONAL</td>
					<td colspan="1" align="center">'.@$lista[0]['valor_1_3'].'</td>					
				</tr>
				
				<tr>
					
					<td colspan="1" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center" align="center">RESTABLECIMIENTO</td>
					<td colspan="1" align="center">'.@$lista[0]['valor_2_3'].'</td>					
				</tr>
				<tr>
					
					<td colspan="1" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center" align="center">TOLERANCIA AL ESTRES</td>
					<td colspan="1" align="center">'.@$lista[0]['valor_3_3'].'</td>					
				</tr>
				<tr>
					
					<td colspan="1" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">Promedio Total</td>
					<td colspan="1" align="center">'.$resultado_prom3.'</td>					
				</tr>
				
				
				<!--OJO 4-->
				
				<tr>
					<td colspan="4" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center" height="22px">PLANO RELACIONAL</td>
				</tr>
				<tr>
					<td colspan="2"  rowspan="5" align="center">'.@$lista[0]['observacion_4'].'</td>
					<td colspan="1" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">COMPETENCIAS</td>
					<td colspan="1" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">PUNTUACION</td>					
				</tr>
				<tr>
					
					<td colspan="1" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">ESTABLECIMIENTO DE RELACIONES</td>
					<td colspan="1" align="center">'.@$lista[0]['valor_1_4'].'</td>					
				</tr>
				
				<tr>
					
					<td colspan="1" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">COMUNICACION</td>
					<td colspan="1" align="center">'.@$lista[0]['valor_2_4'].'</td>					
				</tr>
				<tr>
					
					<td colspan="1" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center" >TRABAJO EN EQUIPO</td>
					<td colspan="1" align="center">'.@$lista[0]['valor_3_4'].'</td>					
				</tr>
				<tr >					
					<td colspan="1"  style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">PROMEDIO TOTAL</td>
					<td colspan="1" align="center">'.$resultado_prom4.'</td>					
				</tr>
				
				<!--OJO 5-->
				
				<tr>
					<td colspan="4" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center" height="22px">ESTILO DE APRENDIZAJE Y TIPO DE PENSAMIENTO</td>
				</tr>				
				<tr>					
					<td colspan="4" align="center">'.@$lista[0]['observacion_5'].'<br></td>								
				</tr>
				<tr style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">					
					<td colspan="2" align="center" height="22px">FORTALEZAS FRENTE AL CARGO</td>	
					<td colspan="2" align="center" height="22px">ASPECTOS A MEJORAR FRENTE AL ARGO</td>						
				</tr>				
				<tr>					
					<td colspan="2" align="center">'.@$lista[0]['observacion_6'].'<br></td>
					<td colspan="2" align="center">'.@$lista[0]['observacion_7'].'<br></td>									
				</tr>
	
			</tbody>
		</table>';



class MYPDF extends TCPDF {

		// Page footer
		public function Footer() {
			// Position at 15 mm from bottom
			$this->SetY(-15);
			// Set font
			$this->SetFont('helvetica', 'I', 14);
			// Page number
			//$this->Cell(0, 10, 'Pagina '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		}
    }	
	
	// create new PDF document
	$pdf = new MYPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); //P O L orientacion de la pagina

	 //$pdf->SetHeaderData('', '40', 'PLANILLA DE PROGRAMACIÓN DE TURNOS', 'REPORTE DEL MES DE '.$return.'Dirección Cra 38ª No. 5ª-100');
	 
	// set header and footer fonts
	//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

	// set default monospaced font
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
	
	$pdf->setPrintHeader(false);

	//set margins
	//$pdf->SetMargins(5, 10, 20, 10);


	//$pdf->SetMargins(15,35,15);
	//$pdf->SetMargins(PDF_MARGIN_LEFT,15);
	//$pdf->SetMargins(PDF_MARGIN_RIGHT,15);


	//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	//$pdf->SetHeaderMargin(5, 10, 20, 10);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

	//set auto page breaks
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

	//set image scale factor
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	//set some language-dependent strings
	$pdf->setLanguageArray($l);

	// ---------------------------------------------------------


	// set font
	$pdf->SetFont('helvetica', '',10);




	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	// Print a table

	// add a page
	$pdf->AddPage();

	//echo $html;die();
	
	
	$pdf->writeHTML($html, true, false, true, false, '');



	// ---------------------------------------------------------

	//Close and output PDF document
	$pdf->Output('reporte.pdf', 'I');

?>

