<?php session_start();

require_once("class_prueba_respuesta.php");
require_once("class_prueba_inserccion.php");
require_once("class_utilidades.php");


$obj= new Respuestas();

$datos=$obj->bg3_resp();


$buenos=array(); // para traer los datos buenos

$malos=array(); // para traer los datos malos

$post=$_POST;
$bg3=array();
$vector=array();
$contador=1;
$respuesta=array();
$juntar="";
$i=1;


$j=1;


for($i=1;$i<=88;$i=$i+2){ //  Muestra solo las preguntas que ha contestado el participante


	if($_POST[$i]!=null and $_POST[$i+1]!=null){

			$resp=$_POST[$i].$_POST[$i+1];

			$vector[$j]=$resp;
	}

	$j++;
}




// cuantas preguntas alcanzo a responder el aspirante
$preg_asp=""; // preguntas del aspirante

$resp_asp=""; // respuestas del aspirantes


//print_r($vector); die();

/*Para saber cuantas buenas y malas quedaron*/
foreach($vector as $clave=>$valor){


	$preg_asp.=$clave.",";

	$resp_asp.=$valor.",";
	
	if($valor == $datos[$clave]['resp_caras']){

		array_push($buenos, $clave);

	}else{

		array_push($malos, $clave);

	}
}




$preg_asp = substr($preg_asp, 0, -1);

$resp_asp = substr($resp_asp, 0, -1);

$cod_asp=$_SESSION['cod_epl'];


$grupo=$_SESSION['grupo']; //grupo 



date_default_timezone_set('America/Bogota');

$fecha=date('d-m-Y');

$obj5= new Utilidades();

$fecha=$obj5->formatFecha($fecha);


//auditoria inserta las preguntas y sus respectivas respuestas
$obj2= new Inserccion();

$rs=$obj2->insert_resp_bg3($cod_asp, $preg_asp, $resp_asp, $fecha );


$obj4= new Respuestas();


$bg3_centiles=$obj4->bg3_centiles($grupo);



if($rs == true){


	$PD=count($buenos); //Cuantas buenas saco
	$PDmalas= count($malos); //cuantas malas saco



	$PC=0;


	for($i=1; $i<count($bg3_centiles); $i++){


		if((int)$bg3_centiles[$i]["pd"] == $PD ){

			$PC=(int)$bg3_centiles[$i]["centil"];

			break;

		}
	}

	

	//si no hay PC entonces el PC es 0
	if($PC ==0){

		$PC=0;

	}


	$obj3= new Inserccion();


	$rs=$obj3->insert_bg3_puntuacion($cod_asp, $PD, $PC, $PDmalas, $fecha);


	if($rs==true){

		echo true;

	}else{

		echo false;

	}


}


?>