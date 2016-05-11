<?php
	require_once("../librerias/lib/connection.php");
	
	
	class Inserccion{


		/*auditoria de la tabla caras*/
		public function insert_resp_caras($cod_asp, $preg_asp, $resp_asp, $fecha){
			
			
			try { 
				global $conn;

				$sql="insert into caras(cod_asp, preg_asp, resp_asp, fecha) values('".$cod_asp."','".$preg_asp."', '".$resp_asp."', '".$fecha."')";
				
				$rs=$conn->Execute($sql);
				
				if($rs){
					
					return true;
				}else{
					// el 0 es porque no se ingreso
					return false;
				}
	
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
			
		}

		

		/*insertar la puntuacion del aspirante*/
		
		public function insert_caras_puntuacion($cod_asp, $PD, $PC, $fecha){
			
			
			try { 
				global $conn;

				$sql="insert into caras_puntuacion(cod_asp, pd, pc, fecha) values('".$cod_asp."','".$PD."', '".$PC."', '".$fecha."')";
				
				$rs=$conn->Execute($sql);
				
				if($rs){
					
					return true;
				}else{
					// el 0 es porque no se ingreso
					return false;
				}
	
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
			
		}



		/*auditoria de la tabla bg3*/
		public function insert_resp_bg3($cod_asp, $preg_asp, $resp_asp, $fecha){
			
			
			try { 
				global $conn;

				$sql="insert into bg3(cod_asp, preg_asp, resp_asp, fecha) values('".$cod_asp."','".$preg_asp."', '".$resp_asp."', '".$fecha."')";
				
				$rs=$conn->Execute($sql);
				
				if($rs){
					
					return true;
				}else{
					// el 0 es porque no se ingreso
					return false;
				}
	
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
			
		}


		/*insertar la puntuacion del aspirante*/
		public function insert_bg3_puntuacion($cod_asp, $PD, $PC, $PDmalas, $fecha){
			
			
			try { 
				global $conn;

				$sql="insert into bg3_puntuacion(cod_asp, pd, pc, fecha, pdmalas) values('".$cod_asp."','".$PD."', '".$PC."', '".$fecha."','".$PDmalas."')";
				
				$rs=$conn->Execute($sql);
				
				if($rs){
					
					return true;
				}else{
					// el 0 es porque no se ingreso
					return false;
				}
	
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
			
		}



		
		/*insertar la puntuacion del aspirante*/
		public function insert_puntuacion_dieciseispf($cod_asp,$puntaje,$A,$B,$C,$E,$F,$G,$H,$I,$L,$M,$N,$O,$Q1,$Q2,$Q3,$Q4,$fecha){


			try { 
				global $conn;

				$sql="insert into dieciseispf_resp_puntuacion(cod_aspirante, dm,A,B,C,E,F,G,H,I,L,M,N,O,Q1,Q2,Q3,Q4,fecha)
				 values('".$cod_asp."','".$puntaje."','".$A."','".$B."','".$C."','".$E."','".$F."','".$G."','".$H."','".$I."',
				 	'".$L."','".$M."','".$N."','".$O."','".$Q1."','".$Q2."','".$Q3."','".$Q4."','".$fecha."')";

				
				$rs=$conn->Execute($sql);
				
				if($rs){
					
					return true;
				}else{
					// el 0 es porque no se ingreso
					return false;
				}
	
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}


		/*insert del 16pf*/

		public function insert_dieciseispf($cod_asp,$preg_16pf,$resp_16pf,$fecha){

			try { 
				global $conn;

				$sql="insert into dieciseispf(cod_asp, preg_asp,resp_asp,fecha)
				 values('".$cod_asp."','".$preg_16pf."','".$resp_16pf."','".$fecha."')";

			
			
				
				$rs=$conn->Execute($sql);
				
				if($rs){
					
					return true;
				}else{
					// el 0 es porque no se ingreso
					return false;
				}
	
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 


		}



		/*auditoria de la tabla cmt*/
		public function insert_resp_cmt($cod_asp, $preg_asp, $resp_asp, $fecha){
			
			
			try { 
				global $conn;

				$sql="insert into cmt(cod_asp, preg_asp, resp_asp, fecha) values('".$cod_asp."','".$preg_asp."', '".$resp_asp."', '".$fecha."')";
			
				
				$rs=$conn->Execute($sql);
				
				if($rs){
					
					return true;
				}else{
					// el 0 es porque no se ingreso
					return false;
				}
	
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
			
		}


		/*insert de prueba aprendizaje*/
		public function insert_resp_aprendizaje($A,$V,$K,$H,$L,$resp_final,$cod_asp,$fecha){


			try { 
				global $conn;

				$sql="insert into aprendizaje_puntuacion(Auditivo, Visual, Kinestesico, logico, holistico, resultado, cod_asp, fecha) 
		               values('".$A."',  '".$V."',  '".$K."', '".$H."', '".$L."', '".$resp_final."', '".$cod_asp."', '".$fecha."')";
				
				$rs=$conn->Execute($sql);
				
				if($rs){
					
					return true;
				}else{
					// el 0 es porque no se ingreso
					return false;
				}
	
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 


		}



		/*insert prueba de aprendizaje*/
		public function insert_resp_temperamento($sanguineo,$colerico,$melancolico,$flematico,$resp,$cod_asp,$fecha){



			try { 
				global $conn;

				$sql="insert into temperamento_puntuacion(sanguineo, colerico, melancolico, flematico, resultado, cod_asp, fecha) 
					values('".$sanguineo."',  '".$colerico."',  '".$melancolico."', '".$flematico."', '".$resp."', '".$cod_asp."', '".$fecha."')";
				
				
				
				$rs=$conn->Execute($sql);
				
				if($rs){
					
					return true;
				}else{
					// el 0 es porque no se ingreso
					return false;
				}
	
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 




		}




		/*insertar la puntuacion de la prueba letrar*/
		public function insert_letras_puntuacion($cod_asp, $PD, $PC, $fecha){
			
			
			try { 
				global $conn;

				$sql="insert into letras_puntuacion(cod_asp, pd, pc, fecha) values('".$cod_asp."','".$PD."', '".$PC."', '".$fecha."')";
				
				$rs=$conn->Execute($sql);
				
				if($rs){
					
					return true;
				}else{
					// el 0 es porque no se ingreso
					return false;
				}
	
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
			
		}


		/*actualizar usuario con proceso*/
		public function update_usuario($cod_asp){
			
			
			try { 
				global $conn;

				$sql="update  selec_usuario_nuevo set estado='Con Proceso' where cedula='".$cod_asp."'";
				
				$rs=$conn->Execute($sql);
				
				if($rs){
					
					return true;
				}else{
					// el 0 es porque no se ingreso
					return false;
				}
	
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
			
		}




	 }// fin de la clase 