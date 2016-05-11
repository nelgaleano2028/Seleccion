<?php
require_once('class_requisicion.php');
require_once('class_utilidades.php');



$obj_habilidad_actitud= new Requisicion();
$obj_cod_resp_car=new Requisicion();
$obj_cod_max_resp_car=new Requisicion();
$obj_insert_resp_car=new Requisicion();
$obj_rel_cargo_nuevo=new Requisicion();
$obj_desc_cargo_nuevo=new Requisicion();

$obj2=new Utilidades();

$cod_epl=$_POST['cod_jefe']; // codigo jefe
$observaciones='por el momento esta registro se guarda como una prueba';


date_default_timezone_set('America/Bogota');
//Imprimimos la fecha actual dandole un formato fecha de la solicitud

$fecha=$obj2->formatFecha(date("d-m-Y"));


$habilidades=@$_POST['habilidades'];


/*Insertar tabla habilidad_actitud*/

/*Insertar tabla habilidad_actitud*/
/*if(isset($_POST['habilidades'])){

	for($t=0; $t<sizeof($_POST['habilidades']); $t++){

		$habilidades .=$_POST['habilidades'][$t].',';

	}
	
	$id_habilidad_actitud=$obj_habilidad_actitud->insert_habilidad_actitud($habilidades,$fecha);
	
}*/

$id_habilidad_actitud=1; // falta organizar la pesta�a habilidades y actitudes


/*insert de principales resposabilidades del cargo*/
if(@$_POST['funcion'] != ""){

	
	$cod_resp_car=$obj_cod_resp_car->get_resp_cargo();
	
	if($cod_resp_car == null){
	
		$cod_resp=1000;
	
	}else{
	
		$obj_cod_max_resp_car->get_max_cod_resp();
		
		$cod_resp=$obj_cod_max_resp_car->get_max_cod_resp();
		
	}

		$datos_obj=$obj_insert_resp_car->insert_resp_car($cod_resp,$_POST['funcion'],$_POST['porcentaje'],$_POST['funcion1'],$_POST['funcion2'],$_POST['funcion3'],$fecha);
}


/*insert relacion de puestos y areas*/
if($_POST['area']!= ""){

	
	$obj_rel_cargo_nuevo->insert_rel_cargo_nuevo($cod_resp,$_POST['area'],$_POST['cliente'],$_POST['proveedor'],$fecha);
	
}

/*insert de las pesta�as: Proposito del cargo, justificacion de la creacion del cargo, para procesos administrativos*/
$ing_desc_cargo_nuevo=$obj_desc_cargo_nuevo->insert_desc_cargo_nuevo($cod_epl,$_POST['nomCar'],$_POST['ubicacion'],$_POST['gerencia'],$_POST['coordinacion'],$_POST['cargo_hace'],$_POST['cargo_como'],$_POST['cargo_para'],$cod_resp,$_POST['numero_pacientes1'],
                       $_POST['numero_pacientes2'],$_POST['cumplir_meta1'],$_POST['numero_ventas1'],$_POST['numero_ventas2'],$_POST['cumplir_meta2'],$_POST['numero_procedimientos1'],$_POST['numero_procedimientos2'],$_POST['cumplir_meta3'],
					   $_POST['utilidad_neta1'],$_POST['utilidad_neta2'],$_POST['cumplir_meta4'],$_POST['costos_gastos1'],$_POST['costos_gastos2'],$_POST['cumplir_meta5'],$_POST['Impacto_esperado'],
					   $_POST['personas_cargo1'],$_POST['personas_cargo2'],$_POST['cumplir_meta6'],$_POST['gastos_administrativos1'],$_POST['gastos_administrativos2'],$_POST['cumplir_meta7'],
					   $_POST['presupuesto_area1'],$_POST['presupuesto_area2'],$_POST['cumplir_meta8'],$_POST['actividades_no'],$_POST['Impacto_esperado2'],$fecha,$observaciones,$id_habilidad_actitud);

echo $ing_desc_cargo_nuevo;					   
?>