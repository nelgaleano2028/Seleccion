<?php
session_start();
require_once("../librerias/lib/connection.php");
require_once('../librerias/tcpdf/config/lang/spa.php');
require_once('../librerias/tcpdf/tcpdf.php');
require_once("class_hv.php");

global $conn;



$cedula1 = $_GET['cedula'];

$cedula=$cedula1;



//-------------------------LISTA--------------------------
$obj= new  hv_pdf();
$lista=$obj->get_sp_hv_basic($cedula);

//PARA SABER EL TIPO DE DOCUMENTO QUE ES
if(@$lista[0]['tipo_doc_asp']=='C'){

	$documento='Cedula de Ciudadaia';

}else if(@$lista[0]['tipo_doc_asp']=='CE'){

	$documento='Cedula de Extranjeria';

}else if(@$lista[0]['tipo_doc_asp']=='TI'){

	$documento='Tarjeta de Identidad';
}


//PARA SABER SI ES MASCULINO O FEMENINO
if(@$lista[0]['sexo_asp']=='M'){

	$sexo='Masculino';

}else if(@$lista[0]['sexo_asp']=='F'){

	$sexo='Femenino';

}

//PARA SABER SI USA ANTEOJOS
if($lista[0]['anteojos_asp']=='N'){

	$anteojos='No';

}else if($lista[0]['anteojos_asp']=='S'){

	$anteojos='Si';

}


//PARA SABER SI TIENE FAMILIAR EN LA EMPRESA
if($lista[0]['fam_emp']=='N'){

	$familiar='No';

}else if($lista[0]['fam_emp']=='S'){

	$familiar='Si';

}


//PARA SABER SI TIENE RECOMENACION EN LA EMPRESA
if($lista[0]['recom_epl']=='N'){

	$recom_epl='No';

}else if($lista[0]['recom_epl']=='S'){

	$recom_epl='Si';

}


if(@$lista[0]['cod_bar_asp']!=NULL){


$sql="select nom_bar from barrios where cod_bar='".@$lista[0]['cod_bar_asp']."'";


$rs1=$conn->Execute($sql);
				
$fila1=$rs1->FetchRow();

$nom_bar=$fila1["nom_bar"];

}else{
	$nom_bar='';
}

//-------------------------LISTA1--------------------------
$obj1= new  hv_pdf();
$lista1=$obj1->get_sp_hv_familia($cedula);





//-------------------------LISTA2--------------------------
$obj2= new  hv_pdf();
$lista2=$obj2->get_sp_hv_referencias($cedula);




//-------------------------LISTA3--------------------------
$obj3= new  hv_pdf();
$lista3=$obj3->get_educacion_asp($cedula);




//-------------------------LISTA4--------------------------
$obj4= new  hv_pdf();
$lista4=$obj4->get_sp_hv_experiencia($cedula);





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

	// set default monospaced font
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
	
	$pdf->setPrintHeader(false);
	
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

	//set auto page breaks
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

	//set image scale factor
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	//set some language-dependent strings
	$pdf->setLanguageArray($l);

	// set font
	$pdf->SetFont('helvetica', '',10);

//------------------------------



 $html='<table border="1">
			<thead>
				<tr>
					<th scope="col" colspan="4" style="font-weight:bold; font-size:42px"  align="center">&nbsp;<br>HOJA DE VIDA <br></th>
				
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="4" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">&nbsp;<br>INFORMACION GENERAL<br></td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">NOMBRE</td>
					<td>&nbsp;'.utf8_encode(@$lista[0]['nom_asp']).'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">APELLIDO</td>
					<td>&nbsp;'.utf8_encode(@$lista[0]['ape_asp']).'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">TIPO DOCUMENTO</td>
					<td>&nbsp;'.@$documento.'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">NUMERO DOCUMENTO</td>
					<td>&nbsp;'.@$lista[0]['num_doc_asp'].'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">CIUDAD EXPEDICION</td>
					<td>&nbsp;'.utf8_encode(@$lista[0]['ciudad_uno']).'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">SEXO</td>
					<td>&nbsp;'.@$sexo.'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">FECHA NACIMIENTO</td>
					<td>&nbsp;'.@$lista[0]['fec_nac_asp'].'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">CIUDAD NACIMIENTO</td>
					<td>&nbsp;'.utf8_encode(@$lista[0]['ciudad_dos']).'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">DIRECCION</td>
					<td>&nbsp;'.@$lista[0]['dir_asp'].'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">CIUDAD</td>
					<td>&nbsp;'.@$lista[0]['ciudad_tres'].'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">BARRRIO</td>
					<td>&nbsp;'.$nom_bar.'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">EMAIL</td>
					<td>&nbsp;'.@$lista[0]['email_asp'].'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">TELEFONO</td>
					<td>&nbsp;'.@$lista[0]['telefono_asp'].'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">CELULAR</td>
					<td>&nbsp;'.@$lista[0]['celular_asp'].'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">TELEFONO ALTERNO</td>
					<td>&nbsp;'.@$lista[0]['telef_alt_asp'].'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">DIRECCION ALTERNA</td>
					<td>&nbsp;'.@$lista[0]['dir_alt_asp'].'</td>
				</tr>
				
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">ESTADO CIVIL</td>
					<td>&nbsp;'.strtolower(@$lista[0]['est_civ']).'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">USA ANTEOJOS</td>
					<td>&nbsp;'.@$anteojos.'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">RECOMENDACION POR EMPLEADO</td>
					<td>&nbsp;'.@$recom_epl.'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">NOMBRE EMPLEADO</td>
					<td>&nbsp;'.utf8_encode(@$lista[0]['cod_recom_asp']).'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">FAMILIAR EN LA EMPRESA</td>
					<td>&nbsp;'.@$familiar.'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">NOMBRE FAMILIAR</td>
					<td>&nbsp;'.utf8_encode(@$lista[0]['epl_par_asp']).'</td>
				</tr>		
			</tbody>
		</table>
		
		<table border="1">
			<thead>
				<tr>
					<th scope="col" colspan="4"  align="center"><br><br><br></th>
				
				</tr>
			</thead>		
			<tbody>
				<tr>
					<td colspan="4" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">&nbsp;<br>INFORMACION FAMILIAR<br></td>
				</tr>';
				
				
				
				
		
		for($i=0; $i<count($lista1); $i++){	

			//PARA SABER EL TIPO DE DOCUMENTO QUE ES
			if(@$lista1[$i]['tipo_doc_familia']=='C'){

				$documento2='Cedula de Ciudadaia';

			}else if(@$lista1[$i]['tipo_doc_familia']=='CE'){

				$documento2='Cedula de Extranjeria';

			}else if(@$lista1[$i]['tipo_doc_familia']=='TI'){

				$documento2='Tarjeta de Identidad';
			}
			
			
			
			//PARA SABER SI ES MASCULINO O FEMENINO
			if(@$lista1[$i]['sexo_fam']=='M'){

				$sexo2='Masculino';

			}else if(@$lista1[$i]['sexo_fam']=='F'){

				$sexo2='Femenino';

			}
			
			
			//PARA SABER SI DEPENDE ECONOMICAMENTE DE ESA PERSONA
			if($lista1[$i]['dep_econ_fam']=='N'){

				$dep_econ_fam='No';

			}else if($lista1[$i]['dep_econ_fam']=='S'){

				$dep_econ_fam='Si';

			}
				
				
				$html.='<tr>
					<td colspan="4" style="font-weight:bold; font-size:28px; background-color:white;" align="center">FAMILIAR '.($i+1).'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">NOMBRE</td>
					<td>&nbsp;'.utf8_encode(@$lista1[$i]['nom_fam']).'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">APELLIDOS</td>
					<td>&nbsp;'.utf8_encode(@$lista1[$i]['ape_fam']).'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">TIPO DE DOCUMENTO</td>
					<td>&nbsp;'.@$documento2.'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">NUMERO DE DOCUMENTO</td>
					<td>&nbsp;'.@$lista1[$i]['cod_fam'].'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">PARENTESCO</td>
					<td>&nbsp;'.@$lista1[$i]['nom_pco'].'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">CIUDAD</td>
					<td>&nbsp;'.@$lista1[$i]['nom_ciu'].'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">DIRECCION</td>
					<td>&nbsp;'.@$lista1[$i]['dir_fam'].'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">TELEFONO</td>
					<td>&nbsp;'.@$lista1[$i]['telefono_fam'].'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">OFICIO</td>
					<td>&nbsp;'.utf8_encode(@$lista1[$i]['desc_ttp']).'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">EMPRESA</td>
					<td>&nbsp;'.utf8_encode(@$lista1[$i]['emp_trab_fam']).'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">SEXO</td>
					<td>&nbsp;'.@$sexo2.'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">DEPENDE ECONOMICAMENTE</td>
					<td>&nbsp;'.@$dep_econ_fam.'</td>
				</tr>';
			
		
		}
		
		$html.='</tbody>
		</table>';
		
		
	// add a page new
	$pdf->AddPage();
	
	$pdf->writeHTML($html, true, false, true, false, '');		
	
	// reset pointer to the last page
	$pdf->lastPage();

	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	// Print a table new

	// add a page
	$pdf->AddPage();

	// create some HTML content
$html2= '<table border="1">
			<thead>
				<tr>
					<th scope="col" colspan="4" style="font-weight:bold; font-size:42px" align="center">&nbsp;<br>HOJA DE VIDA <br></th>
				
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="4" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">&nbsp;<br>REFERENCIAS<br></td>
				</tr>';
				
				for($j=0; $j<count($lista2); $j++){		
				
				//PARA SABER EL TIPO DE DOCUMENTO QUE ES
				if(@$lista2[$j]['tipo_doc_ref']=='C'){

					$documento3='Cedula de Ciudadaia';

				}else if(@$lista2[$j]['tipo_doc_ref']=='CE'){

					$documento3='Cedula de Extranjeria';

				}else if(@$lista2[$j]['tipo_doc_ref']=='TI'){

					$documento3='Tarjeta de Identidad';
				}
			
			
				
				$html2.='<tr>
					<td colspan="4" style="font-weight:bold; font-size:28px; background-color:white;" align="center">PERSONA '.($j+1).'</td>
				</tr><tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">NOMBRE</td>
					<td>&nbsp;'.utf8_encode(@$lista2[$j]['nom_ref']).'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">APELLIDOS</td>
					<td>&nbsp;'.utf8_encode(@$lista2[$j]['ape_ref']).'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">TIPO DE DOCUMENTO</td>
					<td>&nbsp;'.@$documento3.'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">NUMERO DE DOCUMENTO</td>
					<td>&nbsp;'.@$lista2[$j]['ced_ref'].'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">DIRECCION</td>
					<td>&nbsp;'.@$lista2[$j]['dir_ref'].'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">TELEFONO</td>
					<td>&nbsp;'.@$lista2[$j]['telefono_ref'].'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">CIUDAD</td>
					<td>&nbsp;'.utf8_encode(@$lista2[$j]['nom_ciu']).'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">PROFESION</td>
					<td>&nbsp;'.utf8_encode(@$lista2[0]['desc_ttp']).'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">EMPRESA</td>
					<td>&nbsp;'.utf8_encode(@$lista2[$j]['emp_trab_ref']).'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">CARGO</td>
					<td>&nbsp;'.utf8_encode(@$lista2[$j]['cargo_ref']).'</td>
				</tr>';
				
				}
				
				
			$html2.='</tbody>
		</table>
		
		<table border="1">
			<thead>
				<tr>
					<th scope="col" colspan="4"  align="center"><br><br><br></th>
				
				</tr>
			</thead>	
			<tbody>
				<tr>
					<td colspan="4" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">&nbsp;<br>EDUCACION/FORMACION<br></td>
				</tr>';
				
					for($k=0; $k<count($lista3); $k++){		
					
					
				$html2.='<tr>
					<td colspan="4" style="font-weight:bold; font-size:28px; background-color:white;" align="center">EDUCACION '.($k+1).'</td>
				</tr><tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">TIPO DE TITULO</td>
					<td>&nbsp;'.utf8_encode(@$lista3[$k]['nombre_niv']).'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">NIVEL ALCANZADO</td>
					<td>&nbsp;'.utf8_encode(@$lista3[$k]['nom_nie']).'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">TITULO OBTENIDO</td>
					<td>&nbsp;'.utf8_encode(@$lista3[$k]['desc_ttp']).'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">PAIS</td>
					<td>&nbsp;'.@$lista3[$k]['nom_pai'].'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">FECHA DE INICIO</td>
					<td>&nbsp;'.@$lista3[$k]['fec_ini'].'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">FECHA FINAL</td>
					<td>&nbsp;'.@$lista3[$k]['fec_fin'].'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">INSTITUTO/UNIVERSIDAD</td>
					<td>&nbsp;'.utf8_encode(@$lista3[$k]['nom_enti']).'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">CIUDAD</td>
					<td>&nbsp;'.@$lista3[$k]['nom_ciu'].'</td>
				</tr>';
		
		}
		
		$html2.='</tbody>
		</table>';


$pdf->writeHTML($html2, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	// Print a table

	// add a page
	$pdf->AddPage();

	// create some HTML content
$html3= '<table border="1">
			<thead>
				<tr>
					<th scope="col" colspan="4" style="font-weight:bold; font-size:42px" align="center">&nbsp;<br>HOJA DE VIDA <br></th>
				
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="4" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">&nbsp;<br>EXPERIENCIA LABORAL<br></td>
				</tr>';
				
					for($m=0; $m<count($lista4); $m++){	


						
					//PARA SABER SI TRABAJA ACTUALMENTE
					if($lista4[$m]['trab_act_asp']=='N'){

						$trab_act='No';

					}else if($lista4[$m]['trab_act_asp']=='S'){

						$trab_act='Si';

					}
					
					
					if(@$lista4[$m]['cod_cau_re_asp']!=NULL){


					$sql1="select nom_cau_ret from causa_retiro where cod_cau_re='".@$lista4[$m]['cod_cau_re_asp']."'";


					$rs1=$conn->Execute($sql1);
									
					$fila2=$rs1->FetchRow();

					$causa_des=$fila2["nom_cau_ret"];

					}else{
						$causa_des='';
					}

					
					
				$html3.='<tr>
					<td colspan="4" style="font-weight:bold; font-size:28px; background-color:white;" align="center">EXPERIENCIA '.($m+1).'</td>
				</tr><tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">TRABAJA ACTUALMENTE</td>
					<td>&nbsp;'.@$trab_act.'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">EMPRESA</td>
					<td>&nbsp;'.utf8_encode(@$lista4[$m]['nom_empre']).'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">TELEFONO</td>
					<td>&nbsp;'.@$lista4[$m]['telefono_empre'].'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">DIRECCION</td>
					<td>&nbsp;'.@$lista4[$m]['dir_empre'].'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">TIPO DE CONTRATO</td>
					<td>&nbsp;'.utf8_encode(@$lista4[$m]['nom_cto']).'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">SALARIO DEVENGADO</td>
					<td>&nbsp;'.@$lista4[$m]['sal_dev_empre'].'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">INICIO DE CONTRATO</td>
					<td>&nbsp;'.@$lista4[$m]['fec_ini_empre'].'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">FIN DE CONTRATO</td>
					<td>&nbsp;'.@$lista4[$m]['fec_fin_empre'].'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">ACTIVIDAD DE LA EMPRESA</td>
					<td>&nbsp;'.utf8_encode(@$lista4[$m]['cod_act_eco']).'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">JEFE INMEDIATO</td>
					<td>&nbsp;'.utf8_encode(@$lista4[$m]['jefe_inme_empre']).'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">TIPO DE CARGO</td>
					<td>&nbsp;'.utf8_encode(@$lista4[$m]['nom_cto']).'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">CARGO</td>
					<td>&nbsp;'.utf8_encode(@$lista4[$m]['nom_empre']).'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">EXPERIENCIA</td>
					<td>&nbsp;'.utf8_encode(@$lista4[$m]['nom_empre']).'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">MODALIDAD</td>
					<td>&nbsp;'.@$lista4[$m]['mod_cto_asp'].'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">HORARIO DE TRABAJO</td>
					<td>&nbsp;'.@$lista4[$m]['hor_trab_asp'].'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">JORNADA DE TRABAJO</td>
					<td>&nbsp;'.@$lista4[$m]['jor_trab_asp'].'</td>
				</tr>
				<tr>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">CAUSA Y RETIRO</td>
					<td>&nbsp;'.utf8_encode($causa_des).'</td>
					<td style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">CIUDAD</td>
					<td>&nbsp;'.@$lista4[$m]['nom_ciu'].'</td>
				</tr>				
				<tr>
					<td height="25px"  colspan="4" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">FUNCIONES LABORALES</td>
				</tr>
				<tr>
					<td colspan="4" style="background-color:white;" align="justify">'.utf8_encode(@$lista4[$m]['funciones_asp']).'<br></td>
				</tr>
				<tr>
					<td height="25px" colspan="4" style="font-weight:bold; background-color:rgb(201, 201, 201);" align="center">LOGROS LABORALES</td>
				</tr>
				<tr>
					<td colspan="4" style="background-color:white;" align="justify">'.utf8_encode(@$lista4[$m]['logros_asp']).'<br></td>
				</tr>';
				
				}
				
			$html3.='</tbody>
		</table>';

		
	

$pdf->writeHTML($html3, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();



//-------------------------------

//Close and output PDF document
	$pdf->Output('reporte.pdf', 'I');

//var_dump($cedula); die('3');	



?>

