<?php
	require_once("../librerias/lib/connection.php");

class Avila{


	private $lista=array();
		
		/*Traer todos los centro de costos*/
		public function get_centroCosto(){
			
			try { 
				global $conn;
				$sql="SELECT distinct AREA.COD_CC2,   AREA.NOM_CC2 
						FROM  CENTROCOSTO2 AREA, EMPLEADOS_BASIC EPL, EMPLEADOS_GRAL GRAL
						WHERE EPL.COD_EPL = GRAL.COD_EPL
						AND EPL.COD_CC2=AREA.COD_CC2
						and AREA.estado='A'
						and EPL.estado='A'
						order by nom_cc2 asc
						";
						
				$rs=$conn->Execute($sql);
				while($fila=$rs->FetchRow()){
					$this->lista[]=array("codigo" => $fila["COD_CC2"],
										  "area"	  => utf8_encode($fila["NOM_CC2"]));
				}
			
				return $this->lista;
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
			
			
		}

		/*Traer todos los cargos por centro costo */
		public function get_cargos($centro_costo){
			
			
			try { 
				global $conn;
				$sql="SELECT distinct c.cod_car, C.NOM_CAR  
					    FROM CARGOS C, CENTROCOSTO2 AREA, EMPLEADOS_BASIC EPL
						WHERE 
					    EPL.COD_CC2='".$centro_costo."'
						AND EPL.COD_CAR=C.COD_CAR
						order by nom_car asc
						";
						
				$rs=$conn->Execute($sql);
				while($fila=$rs->FetchRow()){
					$this->lista[]=array("codigo" => $fila["cod_car"],
										  "cargos"=> utf8_encode($fila["NOM_CAR"]));
				}
			
				return $this->lista;
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		
		}



		/* Traer empleados por cargo y centro costo activos*/
		public function get_cargosCentroCosto($centro_costo,$cargos){
			
			
			try { 
				global $conn;
				$sql="select cod_epl, rtrim(nom_epl)+' '+rtrim(ape_epl) as nombres from empleados_basic where cod_car='".$cargos."' and cod_cc2 ='".$centro_costo."' and estado='A'";

				
				$rs=$conn->Execute($sql);
				while($fila=$rs->FetchRow()){
					$this->lista[]=array("codigo" => $fila["cod_epl"],
										 "nombres"=> utf8_encode($fila["nombres"]));
				}
			
				return $this->lista;
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		}



		/*insertar */
		public function insert_formUno($centro_costo,$cargo,$persona,$salario,$beneficiario,$fecha){
		
		
			try { 
				global $conn;

				$sql="insert into form_uno(cod_cc2,cod_car,codigo,salario_act,bonificacion,fecha) values('".$centro_costo."','".$cargo."','".$persona."','".$salario."','".$beneficiario."','".$fecha."')";
				
				$rs=$conn->Execute($sql);
				
				if($rs){
					
					return  true;
				}else{
					
					return false;
				}
	
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}


		/*insertar */
		public function insert_formDos($supernumerario,$centro_costo,$cargo,$persona,$salario,$beneficiario,$fecha){
		
		
			try { 
				global $conn;

                 $sql="insert into form_dos(cod_super,cod_cc2,cod_car,codigo,sal_tirular,din_inicia,fecha_niv) values('".$supernumerario."','".$centro_costo."','".$cargo."','".$persona."','".$salario."','".$beneficiario."','".$fecha."')";
				
				$rs=$conn->Execute($sql);
				
				if($rs){
					
					return  true;
				}else{
					
					return false;
				}
	
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}

		public function insert_formTres($supernumerario,$centro_costo,$cargo,$persona,$fec_ini,$fec_fin,$fec_iniL,$fec_finL){
		
		
			try { 
				global $conn;

                 $sql="insert into form_tres(cod_super,cod_cc2,cod_car,codigo,fecha_ini_entre,fecha_fin_entre,fecha_ini_lab,fecha_fin_lab) values('".$supernumerario."','".$centro_costo."','".$cargo."','".$persona."','".$fec_ini."','".$fec_fin."','".$fec_iniL."','".$fec_finL."')";
				
				$rs=$conn->Execute($sql);
				
				if($rs){
					
					return  true;
				}else{
					
					return false;
				}
	
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}
		
		/*traer aspirantes*/
		public function aspirantes_seleccion(){

			try { 
				global $conn;

				$sql="select rtrim(nombre)+' '+rtrim(apellidos) as nombres, cedula, correo, convert(varchar,fecha,105)as fecha from selec_usuario_nuevo";

												
				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

						while($fila=$rs->FetchRow()){
							$this->lista[]=array("nombres" => $fila["nombres"],
												 "cedula" => $fila["cedula"],
												 "correo" => $fila["correo"],
												 "fecha" => $fila["fecha"]);

				
						}


						return $this->lista;
				}else{


					return null;
				}

			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}

}