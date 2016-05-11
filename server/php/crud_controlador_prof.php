<?php
require_once("../librerias/lib/connection.php");
require_once("class_crud_modelo.php");

global $conn;


//CONTENIDO DEL CRUD DEPENDIENDO DE LA BANDERA
//$flag=1 es ELIMINAR
//$flag=2 es ACTUALIZAR
//$flag=3 es ADICIONAR


$flag=$_GET['bandera'];



if($flag==1){
	//ELIMINAR
	  $obj=new Crud();
	
	  $id= $_REQUEST['id'];
	
	  $resultado=$obj->eliminar_datos_prof($id);

	  if($resultado===1){

		  //echo "Tu Registro ha sido eliminado con Exito";
	
		  echo "ok";

	  }else{

		  echo "Error en la Eliminacion ".$resultado;
	 }

}else if($flag==2){
	//ACTUALIZAR
      $obj=new Crud();

	  $id=$_POST['id'];
 
	  $value = $_REQUEST['value'] ; //El value nuevo que esta siendo cambiado
	  $column = $_REQUEST['columnName'] ; //La columna que se activo para que sea cambiada
	  $columnPosition = $_REQUEST['columnPosition'] ;// La posicion de la columna en el datatable 0 1 2 3 si hay 4 columnas
	  $rowId = $_REQUEST['rowId'] ;//rowId - id of the row containing the cell that has been edited

	  $resultado=$obj->actualizar_datos_prof($column, $value, $id);


	  if($resultado===1){

		 //echo "Tu Registro ha sido eliminado con Exito";
		
		 echo "ok";

	  }else{

		 echo "Error en la Actualizacion ".$resultado;

	  }





}else if($flag==3){

		//INSERCCION
		$obj=new Crud();

		//OJO VAARIABLES QUE LLEGA DEL FORMULATRIO ACOMODAR
		$nom_profe=$_REQUEST['nom_profe'];		

				
		$resultado=$obj->insertar_datos_prof($nom_profe);


		if($resultado===1){

			//echo "Tu Registro ha sido eliminado con Exito";
			
			echo "ok";

		}else{

			echo "Error en la Inserccion ".$resultado;

		}

}