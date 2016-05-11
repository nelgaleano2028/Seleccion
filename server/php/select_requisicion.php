<?php
require_once('class_requisicion.php');


if(@$_POST['bandera']==1){

	$obj= new Requisicion();

	$datos=$obj->get_cargosJefe($_POST['centro_costo'],$_POST['cod_epl']);

	$html="<option value=''>Selecione...</option> ";
		
		for($i=0;$i<count($datos);$i++){	
		
			$html.= "<option class='remove_cargo' value=".$datos[$i]['codigo'].">".$datos[$i]['cargos']."</option>";

		}
		
		echo $html;

}else if(@$_POST['bandera']==2){
	
	$obj2= new Requisicion();

	$datos2=$obj2->get_cargosCentroCosto($_POST['cargo'],$_POST['centro_costo']);

	$html2="<option value='-1' >Seleccione Reemplazo...</option>";
	
	for($i=0;$i<count($datos2);$i++){	
	
		$html2.= "<option class='remove_reemplazo' value=".$datos2[$i]['codigo'].">".$datos2[$i]['nombres']."</option>";

	}
	
	echo $html2;


}else if(@$_POST['bandera']==3){
	
	$obj3= new Requisicion();
	
	$datos3=$obj3->get_personasCargo($_POST['centro_costo']);
	
	$html3="<option value='' >Seleccione misma Area...</option>";
	
	for($i=0;$i<count($datos3);$i++){	
	
		$html3.= "<option value=".$datos3[$i]['codigo'].">".$datos3[$i]['nombres']."</option>";

	}
	
	echo $html3;
	

}else if(@$_POST['bandera']==4){

	$obj4= new Requisicion();
	
	$datos4=$obj4->get_cargosCentroCosto2($_POST['cargo'],$_POST['centro_costo']);
	
	$html4="<option value='-1' >Seleccione Reemplazo...</option>";
	
	for($i=0;$i<count($datos4);$i++){	
	
		$html4.= "<option value=".$datos4[$i]['codigo'].">".$datos4[$i]['nombres']."</option>";

	}
	
	echo $html4;
}

?>