<?php
	require_once("../librerias/lib/connection.php");
	
	
	class Vacantes{
		
		private $lista=array();


		public function aspirantes_porvacantes(){

			try { 
				global $conn;

				//$sql="select correo, contrasena,* from sp_hv_basic, selec_usuario_nuevo WHERE COD_ASP=cedula ";
				
				$sql="select cedula, rtrim(e.nombre)+' '+rtrim(e.apellidos) as nombre, nom_car, cod_car from ASP_VAC vac, selec_usuario_nuevo e, cargos
					where cod_vac=cod_car and cod_asp= cedula and vac.estado='CPE'";


												
				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

						while($fila=$rs->FetchRow()){
							$this->lista[]=array("cedula" => $fila["cedula"],
							"nombre" => $fila["nombre"],
							"nom_car" => $fila["nom_car"],
							"cod_car" => $fila["cod_car"]											
							);
		
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