<?php session_start();
//require_once("class_prueba_respuesta.php");
require_once("class_prueba_inserccion.php");
require_once("class_utilidades.php");


$respuestas=$_POST;

//Determinar cuantas K, V, A, H, L

$A=0;
$V=0;
$K=0;
$H=0;
$L=0;


foreach($respuestas as $valor){

	if($valor=='A'){
	
		$A=$A+1;
		
	}else if($valor=='V'){
		
		$V=$V+1;
	
	}else if($valor=='K'){
		
		$K=$K+1;
	
	}else if($valor=='H'){
		
		$H=$H+1;
	
	}else if($valor=='L'){
	
		$L=$L+1;
	}


}

/*var_dump("A: ".$A);
var_dump("-----------------");
var_dump("V: ".$V);
var_dump("-----------------");
var_dump("K: ".$K);
var_dump("-----------------");
var_dump("H: ".$H);
var_dump("-----------------");
var_dump("L: ".$L);*/




if($A>$V and $A>$K){

	$resp_primera="Auditivo";

}else if($V>$A and $V>$K){

	$resp_primera="Visual";

}else if($K>$V and $K>$A){

	$resp_primera="Kinestesico";

}else if($A==$V){

	$resp_primera="Auditivo - Visual";
	
}else if($A==$K){

	$resp_primera="Auditivo - Kinestesico";
	
}else if($V==$K){

	$resp_primera="Visual - Kinestésico";

}

if($H>$L){

	$resp_seg="Holistico";

}else if($L>$H){

	$resp_seg="Logico";

}

$resp_final=$resp_primera." - ".$resp_seg;



date_default_timezone_set('America/Bogota');

$fecha=date('d-m-Y');

$obj5= new Utilidades();

$fecha=$obj5->formatFecha($fecha);

$cod_asp=$_SESSION['cod_epl'];


$obj= new Inserccion();

$obj->insert_resp_aprendizaje($A,$V,$K,$L,$H,$resp_final,$cod_asp,$fecha);





?>