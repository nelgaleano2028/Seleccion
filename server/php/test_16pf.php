<?php
session_start();

require_once("class_prueba_respuesta.php");
require_once("class_prueba_inserccion.php");
require_once("class_utilidades.php");


$respuesta_usuario=$_POST; // respueswta del usuario


/*Logica de la tabla select * from dieciseispf_resp_cuestionario*/
$obj= new Respuestas();

$datos=$obj->dieciseispf_resp_cuestionario(); // 


//contadores de puntaje
$A=0;
$B=0;
$C=0;
$E=0;
$F=0;
$G=0;
$H=0;
$I=0;
$L=0;
$M=0;
$N=0;
$O=0;
$Q1=0;
$Q2=0;
$Q3=0;
$Q4=0;


$preg_16pf="";

$resp_16pf="";


foreach($respuesta_usuario as $clave=>$valor){


	$preg_16pf.=$clave.",";

	$resp_16pf.=$valor.",";


	for($i=1; $i<count($datos); $i++){


		if($clave== $datos[$i]['preg'] && $valor== $datos[$i]['respuesta']){


				if($datos[$i]['grupo']=='A'){

					$A+=$datos[$i]['puntaje'];

				}else if($datos[$i]['grupo']=='B'){

					$B+=$datos[$i]['puntaje'];

				}else if($datos[$i]['grupo']=='C'){

					$C+=$datos[$i]['puntaje'];
				
				}else if($datos[$i]['grupo']=='E'){

					$E+=$datos[$i]['puntaje'];

				}else if($datos[$i]['grupo']=='F'){

					$F+=$datos[$i]['puntaje'];

				}else if($datos[$i]['grupo']=='G'){

					$G+=$datos[$i]['puntaje'];
				
				}else if($datos[$i]['grupo']=='H'){

					$H+=$datos[$i]['puntaje'];

				}else if($datos[$i]['grupo']=='I'){

					$I+=$datos[$i]['puntaje'];
				
				}else if($datos[$i]['grupo']=='L'){

					$L+=$datos[$i]['puntaje'];

				}else if($datos[$i]['grupo']=='M'){

					$M+=$datos[$i]['puntaje'];

				}else if($datos[$i]['grupo']=='N'){

					$N+=$datos[$i]['puntaje'];

				}else if($datos[$i]['grupo']=='O'){

					$O+=$datos[$i]['puntaje'];

				}else if($datos[$i]['grupo']=='Q1'){

					$Q1+=$datos[$i]['puntaje'];

				}else if($datos[$i]['grupo']=='Q2'){

					$Q2+=$datos[$i]['puntaje'];

				}else if($datos[$i]['grupo']=='Q3'){

					$Q3+=$datos[$i]['puntaje'];

				}else if($datos[$i]['grupo']=='Q4'){

					$Q4+=$datos[$i]['puntaje'];
				}

		}


	}

}
/*Fin Logica de la tabla select * from dieciseispf_resp_cuestionario*/



/*Logica de la tabla select * from dieciseispf_resp_dm*/
$obj2= new Respuestas();

$datos2=$obj2->dieciseispf_resp_dm();

$puntaje=0; //contador de puntaje


foreach($respuesta_usuario as $clave=>$valor){


	for($i=1; $i<count($datos2); $i++){


		if($clave== $datos2[$i]['preg_16pf'] && $valor== $datos2[$i]['resp_16pf']){ $puntaje++;


		}


	}

}

/*FIN Logica de la tabla select * from dieciseispf_resp_dm*/


/*Logica del insert*/

$cod_asp=$_SESSION['cod_epl'];

date_default_timezone_set('America/Bogota');

$fecha=date('d-m-Y');

$obj3= new Inserccion();

$obj4= new Utilidades();

$fecha=$obj4->formatFecha($fecha);

$insert=$obj3->insert_puntuacion_dieciseispf($cod_asp,$puntaje,$A,$B,$C,$E,$F,$G,$H,$I,$L,$M,$N,$O,$Q1,$Q2,$Q3,$Q4,$fecha);



/*logica del insert auditoria*/

$obj5= new Inserccion();

$obj5->insert_dieciseispf($cod_asp,$preg_16pf,$resp_16pf,$fecha);


$obj6= new Inserccion();


$obj6->update_usuario($cod_asp);


?>