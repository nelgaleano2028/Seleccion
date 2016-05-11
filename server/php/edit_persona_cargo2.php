<?php
require_once('class_requisicion.php');
require_once('class_utilidades.php');


$obj_desc_cargo_nuevo=new Requisicion();

$obj2=new Utilidades();

$cod_epl=$_POST['cod_jefe']; // codigo jefe
$observaciones='se ingresa nueva plaza';


date_default_timezone_set('America/Bogota');
//Imprimimos la fecha actual dandole un formato fecha de la solicitud

$fecha=$obj2->formatFecha(date("d-m-Y"));



/*insert de las pestañas: Proposito del cargo, justificacion de la creacion del cargo, para procesos administrativos*/
$ing_desc_cargo_nuevo=$obj_desc_cargo_nuevo->edit_desc_cargo_nuevoDos($_POST['numero_pacientes1'],
                       $_POST['numero_pacientes2'],$_POST['cumplir_meta1'],$_POST['numero_ventas1'],$_POST['numero_ventas2'],$_POST['cumplir_meta2'],$_POST['numero_procedimientos1'],$_POST['numero_procedimientos2'],$_POST['cumplir_meta3'],
					   $_POST['utilidad_neta1'],$_POST['utilidad_neta2'],$_POST['cumplir_meta4'],$_POST['costos_gastos1'],$_POST['costos_gastos2'],$_POST['cumplir_meta5'],$_POST['Impacto_esperado'],
					   $_POST['personas_cargo1'],$_POST['personas_cargo2'],$_POST['cumplir_meta6'],$_POST['gastos_administrativos1'],$_POST['gastos_administrativos2'],$_POST['cumplir_meta7'],
					   $_POST['presupuesto_area1'],$_POST['presupuesto_area2'],$_POST['cumplir_meta8'],$_POST['actividades_no'],$_POST['Impacto_esperado2'],$fecha,$observaciones,$_POST['nom_car_sol'],$_POST['num_per_car_sol'],$_POST['desc_car_sol'],$_POST['id_form']);

echo $ing_desc_cargo_nuevo;					   
?>