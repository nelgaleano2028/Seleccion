<?php require_once('class_solicitud.php');



$obj= new Solicitudes();

$datos=$obj->promedio_cierre($_POST['anio']);



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

$p1=0;
$p2=0;
$p3=0;
$p4=0;
$p5=0;
$p6=0;
$p7=0;
$p8=0;
$p9=0;
$p10=0;
$p11=0;
$p12=0;



for($i=0; $i<count($datos); $i++){

	$fecha_ini=explode("/",$datos[$i]['fecha_inicio']);
	
	$fecha1=$fecha_ini[0]."-".$fecha_ini[1]."-".$fecha_ini[2];
	
	$fecha_fin=explode("/",$datos[$i]['fecha_click']);
	
	$fecha2=$fecha_fin[0]."-".$fecha_fin[1]."-".$fecha_fin[2];
	
	
	$dif=diferencia_fecha($fecha1,$fecha2);
	
	$fecha1=strtotime($fecha1);
	
	
	$fecha2=strtotime($fecha2);
	
	
	switch((int)$fecha_ini[1]){
		
		case 1 :
			
			$enero++;	

			$p1+=$dif; 
			
		break;
		
		case 2 :
			
			$febrero++;
			
			$p2+=$dif; 
			
		break;
			
		case 3 :
			$marzo++;
			
			$p3+=$dif; 
		break;
		
		case 4 :
			$abril++;
			
			$p4+=$dif; 
		break;
		
		case 5 :
			$mayo++;
			
			$p5+=$dif; 
		break;

		case 6 :
			$junio++;
			
			$p6+=$dif; 
		break;
					
		case 7 :
			
			$julio++;
			
			$p7+=$dif; 
		break;
					
		case 8	:
			
			$agosto++;
			
			$p8+=$dif;
			
		break;
					
		case 9 :
			$septiembre++;
			$p9+=$dif;
		break;
		
		case 10 :
			$octubre++;
			
			$p10+=$dif;
		break;
		
		case 11 :
			$noviembre++;
			$p11+=$dif;
		break;
		
		case 12 :
				
			$diciembre++;
			
			$p12+=$dif; 
			
			
		break;
			
	}	
	
}// fin del for


if($enero==0){

	$pt1=0;
}else{
	
	$pt1=$p1/$enero;
}

if($febrero==0){

	$pt2=0;
}else{
	
	$pt2=$p2/$febrero;
}


if($marzo==0){

	$pt3=0;
}else{
	
	$pt3=$p3/$marzo;
}


if($abril==0){

	$pt4=0;
}else{
	
	$pt4=$p4/$abril;
}


if($mayo==0){

	$pt5=0;
}else{
	
	$pt5=$p5/$mayo;
}



if($junio==0){

	$pt6=0;
}else{
	
	$pt6=$p6/$junio;
}


if($julio==0){

	$pt7=0;
}else{
	
	$pt7=$p7/$julio;
}



if($agosto==0){

	$pt8=0;
}else{
	
	$pt8=$p8/$agosto;
}


if($septiembre==0){

	$pt9=0;
}else{
	
	$pt9=$p9/$septiembre;
}



if($octubre==0){

	$pt10=0;
}else{
	
	$pt10=$p10/$octubre;
}


if($noviembre==0){

	$pt11=0;
}else{
	
	$pt11=$p11/$noviembre;
}


if($diciembre==0){

	$pt12=0;
}else{
	
	$pt12=$p12/$diciembre;
}




$valor=array();

  
  $valor1=array(
	
	'Ene', (float)$pt1	
  
  );
  
  $valor2=array(
	
	'Feb', (float)$pt2	
  
  );
  
  
  $valor3=array(
	
	'Mar', (float)$pt3	
  
  );
  
   $valor4=array(
	
	'Abr', (float)$pt4	
  
   );
   
    $valor5=array(
	
	'May', (float)$pt5	
	);
	
	
	$valor6=array(
	
	'Jun', (float)$pt6	
	);
	
	
	$valor7=array(
	
	'Jul', (float)$pt7	
	);
	
	$valor8=array(
	
	'Ago', (float)$pt8	
	);
	
	$valor9=array(
	
	'Sep', (float)$pt9	
	);
	
	
	$valor10=array(
	
	'Oct', (float)$pt10	
	);
	
	$valor11=array(
	
	'Nov', (float)$pt11	
	);
  
   $valor12=array(
  
	'Dic',(float)$pt12
	
	);
  

 
 echo json_encode(array('dato1'=>$valor1,'dato2'=>$valor2, 'dato3'=>$valor3,
 'dato4'=>$valor4, 'dato5'=> $valor5, 'dato6'=>$valor6, 'dato7'=>$valor7, 'dato8'=>$valor8, 'dato9'=> $valor9,
 'dato10'=>$valor10, 'dato11'=> $valor11, 'dato12'=> $valor12)); exit();
 
 
 function diferencia_fecha($fec1,$fec2){
 
	date_default_timezone_set('America/Bogota');
	
	$diferencia= strtotime($fec1) - strtotime($fec2);
 
	$dias_diferencia= floor($diferencia/86400) ;
										
	return $dias_diferencia; 
 
 }
 
?>

