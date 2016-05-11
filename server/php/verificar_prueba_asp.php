<?php
require_once("../librerias/lib/connection.php");

require_once('class_administracion.php');
require_once('class_utilidades.php');
include_once("class_mailer.php");


if($_POST['bandera']==1){


	$obj = new Administracion();
	$raiz="../../archivos/";

	$datos=$obj->lista_pruebaAsp($_POST['cedula']);


	global $conn;


	//incio del for
	for($i=0; $i<count($datos); $i++){

		$flager=1;

		if($datos[$i]['nombre_prueba']== 'CMT' || $datos[$i]['nombre_prueba']== 'Wartegg' || $datos[$i]['nombre_prueba']== '16pf' ){
			

			$path1=$raiz.$_POST['cedula']."/";
			$path2=$raiz.$_POST['cedula']."/".$datos[$i]['nombre_prueba'].".pdf";
			$path3=$raiz.$_POST['cedula']."/".$datos[$i]['nombre_prueba'].".xls";
			$path4=$raiz.$_POST['cedula']."/".$datos[$i]['nombre_prueba'].".xlsx";
			$path5=$raiz.$_POST['cedula']."/".$datos[$i]['nombre_prueba'].".doc";
			$path6=$raiz.$_POST['cedula']."/".$datos[$i]['nombre_prueba'].".docx";
			$path7=$raiz.$_POST['cedula']."/".$datos[$i]['nombre_prueba'].".jpeg";
			$path8=$raiz.$_POST['cedula']."/".$datos[$i]['nombre_prueba'].".jpg";
			$path9=$raiz.$_POST['cedula']."/".$datos[$i]['nombre_prueba'].".png";




			if (file_exists($path2)  || file_exists($path3) || file_exists($path4)  || file_exists($path5)
				 || file_exists($path6)  || file_exists($path7)  || file_exists($path8) || file_exists($path9)) {

				
	   
			}else{

				 echo "Falta este item por adjuntar: ".@$datos[$i]['nombre_prueba']; die();
			}


			$flager=2;

		}

		if($flager==1){

				$sql="select * from ".$datos[$i]['tabla']." where cod_asp=".$_POST['cedula']."";


				$rs=$conn->Execute($sql);
							
				if($rs->RecordCount() == 0){

					echo "Falta este item por llenar: ".@$datos[$i]['nombre_prueba']; die();


				}
		}


	}
	//Fin del for

	echo 1; die();

}else if($_POST['bandera']==2){


	$mensaje="El Aspirante se Enviara Sin estas opciones: ";



	$sql2="select * from informe_integral where cod_asp=".$_POST['cedula']."";


	$r=$conn->Execute($sql2);
				
	if($r->RecordCount() == 0){


		$mensaje.="El informe integral, ";


	}



	$sql3="select * from solicitud_req where ruta like '%Otros%' and cod_epl='".$_POST['cedula']."'";


	$r=$conn->Execute($sql3);
				
	if($r->RecordCount() == 0){

		
		$mensaje.="Otros, ";

	}


	$sql4="select * from solicitud_req where ruta like '%Prueba_Tecnica%' and cod_epl='".$_POST['cedula']."'";


	$r=$conn->Execute($sql4);
				
	if($r->RecordCount() == 0){

		
		$mensaje.="Prueba_Tecnica, ";


	}


	$sql4="select * from solicitud_req where ruta like '%Referencias_laborales%' and cod_epl='".$_POST['cedula']."'";


	$r=$conn->Execute($sql4);
				
	if($r->RecordCount() == 0){

		
		$mensaje.="Referencias_laborales, ";


	}


	$mensaje = substr($mensaje, 0, -1);

	$mensaje.="<br> Deseas Continuar?";



	echo $mensaje; die();

}

?>