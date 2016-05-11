<?php


$raiz="../../archivos/";

$cod_epl=$_POST['cod_epl'];
$prueba= $_POST['prueba'];


$path2=$raiz.$cod_epl."/".$prueba.".pdf";
$path3=$raiz.$cod_epl."/".$prueba.".xls";
$path4=$raiz.$cod_epl."/".$prueba.".xlsx";
$path5=$raiz.$cod_epl."/".$prueba.".doc";
$path6=$raiz.$cod_epl."/".$prueba.".docx";
$path7=$raiz.$cod_epl."/".$prueba.".jpeg";
$path8=$raiz.$cod_epl."/".$prueba.".jpg";
$path9=$raiz.$cod_epl."/".$prueba.".png";


if (file_exists($path2)  || file_exists($path3) || file_exists($path4)  || file_exists($path5)
			 || file_exists($path6)  || file_exists($path7)  || file_exists($path8) || file_exists($path9)) {


		echo 1;	 die();
 	  
}else{


	echo 2;  die();
}




?>