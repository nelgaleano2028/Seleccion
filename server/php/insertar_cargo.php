<?php
	require_once("../librerias/lib/connection.php");
	
	
	
	
	$id_fk=@$_POST['id'];
	@$id_tipo_cargo_fk=@$_POST['id1'];
	$campo=$_POST['nombre'];
	$bandera=$_POST['bandera'];


	global $conn;

			
			if($bandera==1){
			
				$sql="insert into cargos_anidados(id_tipo_cargo, nombre) VALUES (".@$id_fk.", '".$campo."')";
			
			
							
				$rs=$conn->Execute($sql);
				
				echo 1;
			
			
			}else if($bandera==2){
			
				$sql="insert into area_des(id_cargos_anidados, nombre) VALUES (".@$id_tipo_cargo_fk.", '".$campo."')";			
				
							
				$rs=$conn->Execute($sql);
				
				echo 1;
			}
			
			







?>