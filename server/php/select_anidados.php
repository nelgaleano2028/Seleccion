<?php
require_once('class_avila.php');


if($_POST['bandera']==1){


	$obj= new Avila();

	$datos=$obj->get_cargos($_POST['centro_costo']);

	$html="";
		
		for($i=0;$i<count($datos);$i++){	
		
			$html.= "<option  value=".$datos[$i]['codigo'].">".$datos[$i]['cargos']."</option>";

		}
		
		echo $html;




}else if($_POST['bandera']==2){


	$obj= new Avila();

	$datos=$obj->get_cargosCentroCosto($_POST['centro_costo'],$_POST['cargo']);

	$html="";
		
		for($i=0;$i<count($datos);$i++){	
		
			$html.= "<option  value=".$datos[$i]['codigo'].">".$datos[$i]['nombres']."</option>";

		}
		
		echo $html;



}




?>