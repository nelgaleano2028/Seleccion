<?php
	require_once("../librerias/lib/connection.php");
	
	
	class Respuestas{
		
		private $lista=array();
		
		
		/*Traer todos las respuestas de las caras*/
		public function caras_resp(){
			
			try { 
				global $conn;
				$sql="select * from caras_resp";
						
				$rs=$conn->Execute($sql);
				$i=1;
				while($fila=$rs->FetchRow()){
					$this->lista[$i]=array("preg_caras" => $fila["preg_caras"],
										  "resp_caras" => $fila["resp_caras"] );

					$i++;
				}
			
				return $this->lista;
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
			
			
		}


		/*Traer todas las respuesta de la prueba BG3*/
		public function bg3_resp(){
			
			try { 
				global $conn;
				$sql="select * from bg3_resp";
						
				$rs=$conn->Execute($sql);
				$i=1;
				while($fila=$rs->FetchRow()){
					$this->lista[$i]=array("preg_caras" => $fila["preg_caras"],
										  "resp_caras" => $fila["resp_caras"] );

					$i++;
				}
			
				return $this->lista;
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		}


		/*respuestas de bg3*/

		public function bg3_centiles($grupo){


			try { 
				global $conn;
				$sql="select * from bg3_centiles where grupo='".$grupo."'";


				$rs=$conn->Execute($sql);
				$i=1;
				while($fila=$rs->FetchRow()){

					$this->lista[$i]=array("id"=> $fila["id"],
											"pd" => $fila["pd"],
										   "centil" => $fila["centil"],
										   "grupo"=> $fila["grupo"]);

					$i++;
				}
			
				return $this->lista;
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}


		public function dieciseispf_resp_cuestionario(){

			try { 
				global $conn;
				$sql="select rtrim(pregunta)+''+rtrim(grupo) as preg, respuesta, puntaje, grupo from dieciseispf_resp_cuestionario";
						
				$rs=$conn->Execute($sql);
				$i=1;
				while($fila=$rs->FetchRow()){
					$this->lista[$i]=array("preg" => $fila["preg"],
										  "respuesta" => $fila["respuesta"],
										  "puntaje"=> $fila["puntaje"],
										  "grupo"=> $fila["grupo"],
										  );

					$i++;
				}
			
				return $this->lista;
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}



		public function dieciseispf_resp_dm(){

			try { 
				global $conn;
				$sql="select * from dieciseispf_resp_dm";
						
				$rs=$conn->Execute($sql);
				$i=1;
				while($fila=$rs->FetchRow()){
					$this->lista[$i]=array("preg_16pf" => $fila["preg_16pf"],
										   "resp_16pf" => $fila["resp_16pf"]);

					$i++;
				}
			
				return $this->lista;
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}



		/*respuestas de letras*/
		public function letras_centiles($grupo){

			try { 
				global $conn;
				$sql="select * from letras_centiles where grupo='".$grupo."'";

				$rs=$conn->Execute($sql);
				$i=1;
				while($fila=$rs->FetchRow()){

					$this->lista[$i]=array("id"=> $fila["id"],
											"pd" => $fila["pd"],
										   "centil" => $fila["centil"],
										   "grupo"=> $fila["grupo"]);

					$i++;
				}
			
				return $this->lista;
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 





		}




	} // fin de la clase