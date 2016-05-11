<?php
	require_once("../librerias/lib/connection.php");


	
	
	class Solicitud{
		
		private $arrays=array();
		
		
		public function crear_solicitud($detalle,$ruta,$file_name,$cod_epl,$fecha,$detalle){
			
			global $conn;
			date_default_timezone_set('America/Bogota');
			//Imprimimos la fecha actual dandole un formato
			
			$ruta= $ruta.$file_name;
			
			$sql="insert into solicitud_req(detalle,fecha,ruta,cod_epl) values('".$detalle."','".$fecha."','".$ruta."','".$cod_epl."')";

			$rs=$conn->Execute($sql);
			
			
			if($rs){
					
				$respuesta=1;;
			}else{
				
				$respuesta=2;
			}
			
			return $respuesta;	
			
		}


		
		public function get_aspirantes(){
			
			try { 
				global $conn;
				$sql="select  rtrim(nombre)+' '+rtrim(apellidos) as nombre, cedula, estado from selec_usuario_nuevo where estado='Con Proceso' or estado = 'CPE' ";
						
				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

					while($fila=$rs->FetchRow()){
					$this->lista[]=array("cedula" => @$fila["cedula"],
										  "nombre"	  => utf8_encode(@$fila["nombre"]),
										  "estado"	  => @$fila["estado"]);
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
