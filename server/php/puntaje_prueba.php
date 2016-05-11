<?php session_start();

require_once("class_administracion.php");

$obj= new  Administracion();


	if($_POST['id']==2){


		$datos=$obj-> puntaje_bg3($_POST['cedula']);


		if($datos != null){

			echo json_encode($datos); 

		}else{

			echo json_encode(-1); 
		}

		
		

	}else if($_POST['id']==3){


		$datos=$obj-> puntaje_letras($_POST['cedula']);


		if($datos != null){

			echo json_encode($datos); 

		}else{

			echo json_encode(-1); 
		}



	}else if($_POST['id']==4){




		


	}else if($_POST['id']==5){



		$datos=$obj-> puntaje_aprendizaje($_POST['cedula']);

		if($datos != null){

			echo json_encode($datos); 

		}else{

			echo json_encode(-1); 
		}
		


	}else if($_POST['id']==6){



		$datos=$obj-> puntaje_temperamento($_POST['cedula']);

		if($datos != null){

			echo json_encode($datos); 

		}else{

			echo json_encode(-1); 
		}
		


	}else if($_POST['id']==7){



		
		


	}else if($_POST['id']==8){

	
		
		$datos=$obj-> puntaje_dieciseispf($_POST['cedula']);

		if($datos != null){

			echo json_encode($datos); 

		}else{

			echo json_encode(-1); 
		}


	}else if($_POST['id']==1){
		
			
		$datos=$obj-> puntaje_caras($_POST['cedula']);

		if($datos != null){

			echo json_encode($datos); 

		}else{
		
		

			echo json_encode(-1); 
		}
		
		
	
	
	}


	exit();

?>