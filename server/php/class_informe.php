<?php
	require_once("../librerias/lib/connection.php");
	
	
	class informe_integral{
		
		
		public function get_informe_integral(){


			try { 
				global $conn;

				$sql="select * from informe_integral";
						
				$rs=$conn->Execute($sql);
				while($fila=$rs->FetchRow()){
					$this->lista[]=array( "id" => $fila["id"],
										  "cod_asp" => $fila["cod_asp"],
										  "observacion_1" => $fila["observacion_1"],
										  "valor_1_1" => $fila["valor_1_1"],
										  "valor_2_1" => $fila["valor_2_1"],
										  "valor_3_1" => $fila["valor_3_1"],
										  "observacion_2" => $fila["observacion_2"],
										  "valor_1_2" => $fila["valor_1_2"],
										  "valor_2_2" => $fila["valor_2_2"],
										  "valor_3_2" => $fila["valor_3_2"],
										  "observacion_3" => $fila["observacion_3"],
										  "valor_1_3" => $fila["valor_1_3"],
										  "valor_2_3" => $fila["valor_2_3"],
										  "valor_3_3" => $fila["valor_3_3"],
										  "observacion_4" => $fila["observacion_4"],
										  "valor_1_4" => $fila["valor_1_4"],
										  "valor_2_4" => $fila["valor_2_4"],
										  "valor_3_4" => $fila["valor_3_4"],
										  "observacion_5" => $fila["observacion_5"],
										  "observacion_6" => $fila["observacion_6"],
										  "observacion_7" => $fila["observacion_7"],
										  "fecha" => $fila["fecha"],
										  "nombre_asp" => $fila["nombre_asp"],
										  "apellido_asp" => $fila["apellido_asp"],
										  "edad" => $fila["edad"],
										  "identificacion" => $fila["identificacion"],
										  "estado_civil" => $fila["estado_civil"],
										  "cargo" => $fila["cargo"],
										  "bg3" => $fila["bg3"],
										  "cmt" => $fila["cmt"],
										  "letras" => $fila["letras"],
										  "temp" => $fila["temp"],
										  "caras" => $fila["caras"],
										  "aprendizaje" => $fila["aprendizaje"],
										  "conocimiento" => $fila["conocimiento"],
										  "observacion_psico" => $fila["observacion_psico"],
										  "comp_uno_laboral" => $fila["comp_uno_laboral"],
										  "comp_dos_laboral" => $fila["comp_dos_laboral"],
										  "comp_tres_laboral" => $fila["comp_tres_laboral"]										  
										  );

				
				}


				return $this->lista;
				
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}
	}