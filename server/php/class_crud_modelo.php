<?php
require_once("../librerias/lib/connection.php");
	
	
	class Crud{
		
		private $lista=array();
		
		
		//---------------------------------------------------------------OJO SECCION DE CIUDADES CRUD
		
		//Este es el proceso de Consultar  lo que se desea visualizr (READ)
		public function consultar_datos_ciudades(){
			
			try { 
			
				global $conn;
				
				$sql="select * from ciudades order by cod_ciu desc";
						
				$rs=$conn->Execute($sql);
				while($fila=$rs->FetchRow()){
					$this->lista[]=array("cod_ciu" => $fila["cod_ciu"],
										 "cod_dpt" => $fila["cod_dpt"],											
										 "nom_ciu" => utf8_encode(@$fila["nom_ciu"]),
										 "cod_ciu_iss" => $fila["cod_ciu_iss"],
										 "cod_pais" => $fila["cod_pais"]);
				}
			
				return $this->lista;
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
			
			
		}
		
		
		//Este es el proceso de Actualizar los datos del CRUD (UPDATE)
		public function actualizar_datos_ciudades($column, $value, $id){
			
			try { 
			
				global $conn;
				
				$sql="update  ciudades set ".$column."='".$value."' where cod_ciu='".$id."'";
				
				$conn->Execute($sql); 
			
				$reg_afectados=$conn->Affected_Rows();
							
				if($reg_afectados>0){
				
					return 1;
								
				}else{
				
					return 2;
				}
			
										
			}catch (exception $e) { 

			    var_dump('ERROR EN SQL'); 

			} 
			
			
		}
		
		//Este es el proceso de Insertar los datos del CRUD (CREATE)
		public function insertar_datos_ciudades($cod_ciu, $cod_dpt,$nom_ciu,$cod_ciu_iss, $cod_pais){
			
			try { 
			
				global $conn;
				
				$sql="insert into ciudades(cod_ciu, cod_dpt, nom_ciu,  cod_ciu_iss, cod_pais) values('".$cod_ciu."', '".$cod_dpt."','".$nom_ciu."', '".$cod_ciu_iss."', '".$cod_pais."')";		
				
				$conn->Execute($sql); 			
				
				$reg_afectados=$conn->Affected_Rows();
							
				if($reg_afectados>0){
				
					return 1;
								
				}else{
				
					return 2;
				}
			
			}catch (exception $e) { 

			    var_dump('ERROR EN SQL'); 

			} 
			
			
		}
		
		
		//Este es el proceso de Eliminar los datos del CRUD (DELETE)
		public function eliminar_datos_ciudades($id){
			
			try { 
			
				global $conn;
				
				$sql="delete from ciudades where cod_ciu='".$id."'";			
											
				$conn->Execute($sql); 
				
				$reg_afectados=$conn->Affected_Rows();
							
				if($reg_afectados>0){
				
					return 1;
								
				}else{
				
					return 2;
				}
				
				
				
								
			}catch (exception $e) { 

			   var_dump('ERROR EN SQL'); 

			   //adodb_backtrace($e->gettrace());

			} 
			
			
		}
		
		//---------------------------------------------------------------OJO SECCION DE CIUDADES CRUD FINAL
		
		//---------------------------------------------------------------OJO SECCION DE COMPETENCIAS CRUD
		
		//Este es el proceso de Consultar  lo que se desea visualizar (READ)
		public function consultar_datos_comp(){
			
			try { 
			
				global $conn;
				
				$sql="select * from competencias_informe";
						
				$rs=$conn->Execute($sql);
				while($fila=$rs->FetchRow()){
					$this->lista[]=array("id" => $fila["id"],
										"nombre_comp" => utf8_encode(@$fila["nombre_comp"])											
										);
				}
			
				return $this->lista;
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
			
			
		}
		
		
		//Este es el proceso de Actualizar los datos del CRUD (UPDATE)
		public function actualizar_datos_comp($column, $value, $id){
			
			try { 
			
				global $conn;
				
				$sql="update  competencias_informe set ".$column."='".$value."' where id='".$id."'";
				
				$conn->Execute($sql); 
			
				$reg_afectados=$conn->Affected_Rows();
							
				if($reg_afectados>0){
				
					return 1;
								
				}else{
				
					return 2;
				}
			
										
			}catch (exception $e) { 

			    var_dump('ERROR EN SQL'); 

			} 
			
			
		}
		
		//Este es el proceso de Insertar los datos del CRUD (CREATE)
		public function insertar_datos_comp($nombre_comp){
			
			try { 
			
				global $conn;
				
				$sql="insert into competencias_informe(nombre_comp) values('".$nombre_comp."')";		
				
				$conn->Execute($sql); 			
				
				$reg_afectados=$conn->Affected_Rows();
							
				if($reg_afectados>0){
				
					return 1;
								
				}else{
				
					return 2;
				}
			
			}catch (exception $e) { 

			    var_dump('ERROR EN SQL'); 

			} 
			
			
		}
		
		
		//Este es el proceso de Eliminar los datos del CRUD (DELETE)
		public function eliminar_datos_comp($id){
			
			try { 
			
				global $conn;
				
				$sql="delete from competencias_informe where id='".$id."'";			
											
				$conn->Execute($sql); 
				
				$reg_afectados=$conn->Affected_Rows();
							
				if($reg_afectados>0){
				
					return 1;
								
				}else{
				
					return 2;
				}
				
				
				
								
			}catch (exception $e) { 

			   var_dump('ERROR EN SQL'); 

			   //adodb_backtrace($e->gettrace());

			} 
			
			
		}
		
		
		
		//---------------------------------------------------------------OJO SECCION DE COMPETENCIAS CRUD FINAL
		
		//---------------------------------------------------------------OJO SECCION DE PROFESIONES CRUD
		
		//Este es el proceso de Consultar  lo que se desea visualizar (READ)
		public function consultar_datos_prof(){
			
			try { 
			
				global $conn;
				
				$sql="select * from profesiones_seleccion";
						
				$rs=$conn->Execute($sql);
				while($fila=$rs->FetchRow()){
					$this->lista[]=array("id" => $fila["id"],
										"nom_profe" => utf8_encode(@$fila["nom_profe"])											
										);
				}
			
				return $this->lista;
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
			
			
		}
		
		
		//Este es el proceso de Actualizar los datos del CRUD (UPDATE)
		public function actualizar_datos_prof($column, $value, $id){
			
			try { 
			
				global $conn;
				
				$sql="update  profesiones_seleccion set ".$column."='".$value."' where id='".$id."'";
				
				$conn->Execute($sql); 
			
				$reg_afectados=$conn->Affected_Rows();
							
				if($reg_afectados>0){
				
					return 1;
								
				}else{
				
					return 2;
				}
			
										
			}catch (exception $e) { 

			    var_dump('ERROR EN SQL'); 

			} 
			
			
		}
		
		//Este es el proceso de Insertar los datos del CRUD (CREATE)
		public function insertar_datos_prof($nom_profe){
			
			try { 
			
				global $conn;
				
				$sql="insert into profesiones_seleccion(nom_profe) values('".$nom_profe."')";		
				
				$conn->Execute($sql); 			
				
				$reg_afectados=$conn->Affected_Rows();
							
				if($reg_afectados>0){
				
					return 1;
								
				}else{
				
					return 2;
				}
			
			}catch (exception $e) { 

			    var_dump('ERROR EN SQL'); 

			} 
			
			
		}
		
		
		//Este es el proceso de Eliminar los datos del CRUD (DELETE)
		public function eliminar_datos_prof($id){
			
			try { 
			
				global $conn;
				
				$sql="delete from profesiones_seleccion where id='".$id."'";			
											
				$conn->Execute($sql); 
				
				$reg_afectados=$conn->Affected_Rows();
							
				if($reg_afectados>0){
				
					return 1;
								
				}else{
				
					return 2;
				}
				
				
				
								
			}catch (exception $e) { 

			   var_dump('ERROR EN SQL'); 

			   //adodb_backtrace($e->gettrace());

			} 
			
			
		}
		
		
		
		//---------------------------------------------------------------OJO SECCION DE PROFESIONES CRUD FINAL
		
		//---------------------------------------------------------------OJO SECCION DE SECTORES CRUD
		
		//Este es el proceso de Consultar  lo que se desea visualizar (READ)
		public function consultar_datos_sector(){
			
			try { 
			
				global $conn;
				
				$sql="select * from sector_seleccion";
						
				$rs=$conn->Execute($sql);
				while($fila=$rs->FetchRow()){
					$this->lista[]=array("id" => $fila["id"],
										"nom_sector" => utf8_encode(@$fila["nom_sector"])											
										);
				}
			
				return $this->lista;
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
			
			
		}
		
		
		//Este es el proceso de Actualizar los datos del CRUD (UPDATE)
		public function actualizar_datos_sector($column, $value, $id){
			
			try { 
			
				global $conn;
				
				$sql="update  sector_seleccion set ".$column."='".$value."' where id='".$id."'";
				
				$conn->Execute($sql); 
			
				$reg_afectados=$conn->Affected_Rows();
							
				if($reg_afectados>0){
				
					return 1;
								
				}else{
				
					return 2;
				}
			
										
			}catch (exception $e) { 

			    var_dump('ERROR EN SQL'); 

			} 
			
			
		}
		
		//Este es el proceso de Insertar los datos del CRUD (CREATE)
		public function insertar_datos_sector($nom_sector){
			
			try { 
			
				global $conn;
				
				$sql="insert into sector_seleccion(nom_sector) values('".$nom_sector."')";		
				
				$conn->Execute($sql); 			
				
				$reg_afectados=$conn->Affected_Rows();
							
				if($reg_afectados>0){
				
					return 1;
								
				}else{
				
					return 2;
				}
			
			}catch (exception $e) { 

			    var_dump('ERROR EN SQL'); 

			} 
			
			
		}
		
		
		//Este es el proceso de Eliminar los datos del CRUD (DELETE)
		public function eliminar_datos_sector($id){
			
			try { 
			
				global $conn;
				
				$sql="delete from sector_seleccion where id='".$id."'";			
											
				$conn->Execute($sql); 
				
				$reg_afectados=$conn->Affected_Rows();
							
				if($reg_afectados>0){
				
					return 1;
								
				}else{
				
					return 2;
				}
				
				
				
								
			}catch (exception $e) { 

			   var_dump('ERROR EN SQL'); 

			   //adodb_backtrace($e->gettrace());

			} 
			
			
		}
		
		
		
		//---------------------------------------------------------------OJO SECCION DE SECTORES CRUD FINAL
		
		
		
	}
?>
