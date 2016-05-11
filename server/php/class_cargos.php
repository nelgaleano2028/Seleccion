<?php
	require_once("../librerias/lib/connection.php");
	
	class Cargos{

		public function cargos_anidados($id){
						
			global $conn;
					
					$sql="select * from cargos_anidados where id_tipo_cargo=$id";
								
					$rs=$conn->Execute($sql);

					if($rs->RecordCount() > 0){

						while($fila=$rs->FetchRow()){
							$this->lista[]=array("id" => $fila["id"],
												 "id_tipo_cargo" => $fila["id_tipo_cargo"],
												 "nombre" => $fila["nombre"]												 
												);		
						}
						return $this->lista;
						
					}else{
						return null;
					}				
					
				 
	
		}
		
		
		
		public function cargos_anidados_mas($id, $id1){
						
			global $conn;
					
					$sql="select * from area_des where id_cargos_anidados=$id1";
								
					$rs=$conn->Execute($sql);

					if($rs->RecordCount() > 0){

						while($fila=$rs->FetchRow()){
							$this->lista[]=array("id" => $fila["id_cargos_anidados"],
												 "nombre" => $fila["nombre"]												 
												);		
						}
						return $this->lista;
						
					}else{
						return null;
					}				
				
					
				 
	
		}

	}