<?php require_once('class_solicitud.php');


$obj= new Solicitudes();

$datos=$obj->vacante_fecha_limite($_POST['anio']);


date_default_timezone_set('America/Bogota');


$enero=0;
$febrero=0;
$marzo=0;
$abril=0;
$mayo=0;
$junio=0;
$julio=0;
$agosto=0;
$septiembre=0;
$octubre=0;
$noviembre=0;
$diciembre=0;



for($i=0; $i<count($datos); $i++){

	$fecha_ini=explode("/",$datos[$i]['fecha_inicio']);
	
	$fecha1=$fecha_ini[0]."-".$fecha_ini[1]."-".$fecha_ini[2];
	
	$fecha_fin=explode("/",$datos[$i]['fecha_click']);
	
	$fecha2=$fecha_fin[0]."-".$fecha_fin[1]."-".$fecha_fin[2];
	
	$fecha1=strtotime($fecha1);
	
	
	$fecha2=strtotime($fecha2);
	

	if($fecha2 > $fecha1){
	
		switch((int)$fecha_ini[1]){
			
			case 1 :
				
				$enero++;			
			break;
			
			case 2 :
				$febrero++;			
			break;
				
			case 3 :
				$marzo++;
			break;
			
			case 4 :
				$abril++;
			break;
			
			case 5 :
				$mayo++;
			break;

			case 6 :
				$junio++;
			break;
						
			case 7 :
				
				$julio++;
			break;
						
			case 8	:
				
				$agosto++;
			break;
						
			case 9 :
				$septiembre++;
			break;
			
			case 10 :
				$octubre++;
			break;
			
			case 11 :
				$noviembre++;
			break;
			
			case 12 :
				$diciembre++;
			break;
				
		}	
	
	}

}


  
   $valor1=array(
	
	'Ene', (float)$enero	
  
  );
  
  $valor2=array(
	
	'Feb', (float)$febrero	
  
  );
  
  
  $valor3=array(
	
	'Mar', (float)$marzo	
  
  );
  
   $valor4=array(
	
	'Abr', (float)$abril	
  
   );
   
    $valor5=array(
	
	'May', (float)$mayo	
	);
	
	
	$valor6=array(
	
	'Jun', (float)$junio	
	);
	
	
	$valor7=array(
	
	'Jul', (float)$julio	
	);
	
	$valor8=array(
	
	'Ago', (float)$agosto	
	);
	
	$valor9=array(
	
	'Sep', (float)$septiembre	
	);
	
	
	$valor10=array(
	
	'Oct', (float)$octubre	
	);
	
	$valor11=array(
	
	'Nov', (float)$noviembre	
	);
  
   $valor12=array(
  
	'Dic',(float)$diciembre
	
	);
  
  
  echo json_encode(array('dato1'=>$valor1,'dato2'=>$valor2, 'dato3'=>$valor3,
 'dato4'=>$valor4, 'dato5'=> $valor5, 'dato6'=>$valor6, 'dato7'=>$valor7, 'dato8'=>$valor8, 'dato9'=> $valor9,
 'dato10'=>$valor10, 'dato11'=> $valor11, 'dato12'=> $valor12)); exit();
 

?>

