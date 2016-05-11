<?php
require_once('class_requisicion.php');


	$obj= new Requisicion();

	$datos=$obj->select_empleados();

	$html="<option value='-1'>Seleccione...</option>";
		
		for($i=0;$i<count($datos);$i++){	
		
			$html.= "<option class='remove_cargo' value=".$datos[$i]['cod_epl'].">".utf8_encode($datos[$i]['nombres'])."</option>";

		}
		
		echo $html;




?>