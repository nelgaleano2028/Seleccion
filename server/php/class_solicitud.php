<?php
	require_once("../librerias/lib/connection.php");
	
	
	class Solicitudes{
		
		private $lista=array();

		/*Mostrar las solicitudes de Requesicion de nuevo cargo pendientes*/
		public function get_solitudReqCarNuevo(){
			
			unset($this->lista); //limpiar variable
			
			try { 
				global $conn;
				$sql="select sol.id_form, sol.cod_form, sol.observaciones, sol.nom_car_nuevo, sol.ubicacion, convert(varchar,sol.fecha,105)as fecha, cc2.nom_cc2, car.nom_car,rtrim(emp.nom_epl)+' '+rtrim(emp.ape_epl) as nombres  
					  from sol_req_ext_tmp sol, centrocosto2 as cc2, cargos car, empleados_basic emp
					  where cc2.cod_cc2= sol.cod_cc2 and car.cod_car=sol.cod_car and emp.cod_epl=sol.cod_epl_jefe and sol.estado='P'";
						
				$rs=$conn->Execute($sql);
				
				if($rs->RecordCount() > 0){
				
					while($fila=$rs->FetchRow()){
					$this->lista[]=array( "id_form" => @$fila["id_form"],
										  "cod_form" => @$fila["cod_form"],
										  "nom_car_nuevo"=> utf8_encode(@$fila["nom_car_nuevo"]),
										  "ubicacion"=> utf8_encode(@$fila["ubicacion"]),
										  "area"=> utf8_encode(@$fila["nom_cc2"]),
										  "cargo"=> utf8_encode(@$fila["nom_car"]),
										  "nombres"=> utf8_encode(@$fila["nombres"]),
										  "fecha"=> @$fila["fecha"],
										  "observaciones"=> utf8_encode(@$fila["observaciones"]));
					}
				}else{
				
					$this->lista=0;
					
				
				
				}
			
				return $this->lista;
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		
		
		}
		
		/*Mostrar las solicitudes de Requesicion de nuevo cargo pendientes*/
		public function get_solitudReqCarNuevo2(){
			
			unset($this->lista); //limpiar variable
			
			try { 
				global $conn;
				$sql="select sol.id_form, sol.cod_form, sol.observaciones, sol.nom_car_nuevo, sol.ubicacion, convert(varchar,sol.fecha,105)as fecha,rtrim(emp.nom_epl)+' '+rtrim(emp.ape_epl) as nombres  
					  from sol_req_ext_tmp2 sol, empleados_basic emp
					  where emp.cod_epl=sol.cod_epl_jefe and sol.estado='P'";
						
				$rs=$conn->Execute($sql);
				
				if($rs->RecordCount() > 0){
				
					while($fila=$rs->FetchRow()){
					$this->lista[]=array( "id_form" => @$fila["id_form"],
										  "cod_form" => @$fila["cod_form"],
										  "nom_car_nuevo"=> utf8_encode(@$fila["nom_car_nuevo"]),
										  "ubicacion"=> utf8_encode(@$fila["ubicacion"]),			 
										
										  "nombres"=> utf8_encode(@$fila["nombres"]),
										  "fecha"=> @$fila["fecha"],
										  "observaciones"=> utf8_encode(@$fila["observaciones"]));
					}
				}else{
				
					$this->lista=0;
					
				
				
				}
			
				return $this->lista;
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		
		
		}

		/*Mostrar las solicitudes de Requesicion de nuevo cargo pendientes*/
		public function get_solitudReqNuevaPlaza(){
			
			unset($this->lista); //limpiar variable
			
			try { 
				global $conn;
				$sql="select sol.id_form, sol.cod_form, sol.observaciones, sol.nom_car_solicitado, sol.personas, convert(varchar,sol.fecha,105)as fecha,
						rtrim(emp.nom_epl)+' '+rtrim(emp.ape_epl) as nombres  
						from sol_req_ext_tmp3 sol,  empleados_basic emp
						where emp.cod_epl=sol.cod_epl_jefe and sol.estado='P'";
						
				$rs=$conn->Execute($sql);
				
				if($rs->RecordCount() > 0){
				
					while($fila=$rs->FetchRow()){
					$this->lista[]=array( "id_form" => @$fila["id_form"],
										  "cod_form" => @$fila["cod_form"],										 
										  "nombres"=> utf8_encode(@$fila["nombres"]),
										  "nom_car_solicitado"=> utf8_encode(@$fila["nom_car_solicitado"]),
										  "personas" => @$fila["personas"],		
										  "fecha"=> @$fila["fecha"],
										  "observaciones"=> utf8_encode(@$fila["observaciones"]));
					}
				}else{
				
					$this->lista=0;
					
				
				
				}
			
				return $this->lista;
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		
		
		}
		
		public function get_solitudReqCarNuevoConfirmadas($jefe){
			
			unset($this->lista); //limpiar variable
			
			try { 
				global $conn;
				$sql="select sol.id_form, sol.cod_form, sol.observaciones, sol.nom_car_nuevo, sol.ubicacion, convert(varchar,sol.fecha,105)as fecha, rtrim(emp.nom_epl)+' '+rtrim(emp.ape_epl) as nombres  
					  from sol_req_ext_tmp2 sol,  empleados_basic emp
					  where  emp.cod_epl=sol.cod_epl_jefe and sol.estado='AC' and cod_epl_jefe='".$jefe."' ";
						
				$rs=$conn->Execute($sql);
				
				if($rs->RecordCount() > 0){
				
					while($fila=$rs->FetchRow()){
					$this->lista[]=array( "id_form" => @$fila["id_form"],
										  "cod_form" => @$fila["cod_form"],
										  "nom_car_nuevo"=> utf8_encode(@$fila["nom_car_nuevo"]),
										  "ubicacion"=> utf8_encode(@$fila["ubicacion"]),										  
										  "nombres"=> utf8_encode(@$fila["nombres"]),
										  "fecha"=> @$fila["fecha"],
										  "observaciones"=> utf8_encode(@$fila["observaciones"]));
					}
				}else{
				
					$this->lista=0;
					
				
				
				}
			
				return $this->lista;
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		
		
		}
		
		public function get_solitudReqCarNuevoConfirmadas_RHERRERA(){
			
			unset($this->lista); //limpiar variable
			
			try { 
				global $conn;
				$sql="select sol.id_form, sol.cod_form, sol.observaciones, sol.nom_car_nuevo, sol.ubicacion, convert(varchar,sol.fecha,105)as fecha, rtrim(emp.nom_epl)+' '+rtrim(emp.ape_epl) as nombres  
					  from sol_req_ext_tmp2 sol,  empleados_basic emp
					  where  emp.cod_epl=sol.cod_epl_jefe and sol.estado='AEX'";
						
						
						
				$rs=$conn->Execute($sql);
				
				if($rs->RecordCount() > 0){
				
					while($fila=$rs->FetchRow()){
					$this->lista[]=array( "id_form" => @$fila["id_form"],
										  "cod_form" => @$fila["cod_form"],
										  "nom_car_nuevo"=> utf8_encode(@$fila["nom_car_nuevo"]),
										  "ubicacion"=> utf8_encode(@$fila["ubicacion"]),										  
										  "nombres"=> utf8_encode(@$fila["nombres"]),
										  "fecha"=> @$fila["fecha"],
										  "observaciones"=> utf8_encode(@$fila["observaciones"]));
					}
				}else{
				
					$this->lista=0;
					
				
				
				}
			
				return $this->lista;
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		
		
		}
		

		public function get_solitudReqNuevaPlazaConfirmadas_rherrera($jefe){	
			
			try { 
				global $conn;
				$sql="select id_form,cod_form, cod_epl_jefe, RTRIM(nom_epl)+' '+RTRIM(ape_epl) as nombres, observaciones, nom_car_solicitado, personas, sol.estado, 
					convert(varchar,sol.fecha,105)as fecha  from sol_req_ext_tmp3 sol, empleados_basic emp 
					where cod_epl=cod_epl_jefe and  sol.estado ='AEX' and cod_epl_jefe='".$jefe."'";
					
					//var_dump($sql);die("MUERTE");
					
				$rs=$conn->Execute($sql);
				
				if($rs->RecordCount() > 0){
				
					while($fila=$rs->FetchRow()){
					$this->lista[]=array( "id_form" => @$fila["id_form"],
										  "cod_form" => @$fila["cod_form"],
										  "nom_car_solicitado"=> utf8_encode(@$fila["nom_car_solicitado"]),
										  "personas" => @$fila["personas"],																				 
										  "nombres"=> utf8_encode(@$fila["nombres"]),
										  "fecha"=> @$fila["fecha"],
										  "observaciones"=> utf8_encode(@$fila["observaciones"]));
					}
				}else{
				
					$this->lista=0;
					
				
				
				}
			
				return $this->lista;
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		
		
		}

		public function get_solitudReqCarNuevoConfirmadas_plaza(){
			
			unset($this->lista); //limpiar variable
			
			try { 
				global $conn;
				$sql="select id_form,cod_form, cod_epl_jefe, RTRIM(nom_epl)+' '+RTRIM(ape_epl) as nombres, observaciones, nom_car_solicitado, personas, sol.estado, 
convert(varchar,sol.fecha,105)as fecha  from sol_req_ext_tmp3 sol, empleados_basic emp 
where cod_epl=cod_epl_jefe and  sol.estado ='AC'";
				$rs=$conn->Execute($sql);
				
				if($rs->RecordCount() > 0){
				
					while($fila=$rs->FetchRow()){
					$this->lista[]=array( "id_form" => @$fila["id_form"],
										  "cod_form" => @$fila["cod_form"],
										  "nom_car_solicitado"=> utf8_encode(@$fila["nom_car_solicitado"]),
										  "personas"=>$fila["personas"],										 
										  "nombres"=> utf8_encode(@$fila["nombres"]),
										  "fecha"=> @$fila["fecha"],
										  "observaciones"=> utf8_encode(@$fila["observaciones"]));
					}
				}else{
				
					$this->lista=0;
					
				
				
				}
			
				return $this->lista;
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		
		
		}
		

		public function get_solitudReqCarNuevoRechazadas_plaza(){
			
			unset($this->lista); //limpiar variable
			
			try { 
				global $conn;
				$sql="select id_form,cod_form, cod_epl_jefe, RTRIM(nom_epl)+' '+RTRIM(ape_epl) as nombres, observaciones, nom_car_solicitado, personas, sol.estado, 
						convert(varchar,sol.fecha,105)as fecha  from sol_req_ext_tmp3 sol, empleados_basic emp 
						where cod_epl=cod_epl_jefe and  sol.estado ='RC'";
				$rs=$conn->Execute($sql);
				
				if($rs->RecordCount() > 0){
				
					while($fila=$rs->FetchRow()){
					$this->lista[]=array( "id_form" => @$fila["id_form"],
										  "cod_form" => @$fila["cod_form"],
										  "nom_car_solicitado"=> utf8_encode(@$fila["nom_car_solicitado"]),
										  "personas"=>$fila["personas"],										 
										  "nombres"=> utf8_encode(@$fila["nombres"]),
										  "fecha"=> @$fila["fecha"],
										  "observaciones"=> utf8_encode(@$fila["observaciones"]));
					}
				}else{
				
					$this->lista=0;
					
				
				
				}
			
				return $this->lista;
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		
		
		}

		/*Mostrar las solicitudes de Requesicion de nuevA PLAZA Aceptadas*/
		public function get_solitudReqCarNuevo_javier(){
			
			unset($this->lista); //limpiar variable
			
			try { 
				global $conn;
				$sql="select id_form,cod_form, cod_epl_jefe, RTRIM(nom_epl)+' '+RTRIM(ape_epl) as nombres, 
				observaciones, nom_car_solicitado, personas, sol.estado, 
convert(varchar,sol.fecha,105)as fecha  from sol_req_ext_tmp3 sol, empleados_basic emp 
where cod_epl=cod_epl_jefe and  sol.estado ='AP'";
				$rs=$conn->Execute($sql);
				
				if($rs->RecordCount() > 0){
				
					while($fila=$rs->FetchRow()){
					$this->lista[]=array( "id_form" => @$fila["id_form"],
										  "cod_form" => @$fila["cod_form"],
										  "nom_car_solicitado"=> utf8_encode(@$fila["nom_car_solicitado"]),
										  "personas"=> $fila["personas"],
										 
										  "nombres"=> utf8_encode(@$fila["nombres"]),
										  "fecha"=> @$fila["fecha"],
										  "observaciones"=> utf8_encode(@$fila["observaciones"]));
					}
				}else{
				
					$this->lista=0;
					
				
				
				}
			
				return $this->lista;
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		
		
		}
		
		/*Mostrar las solicitudes de Requesicion de nuevO Cargo Aceptadas*/
		public function get_solitudReqCarNuevo_javier_mena(){
			
			unset($this->lista); //limpiar variable
			
			try { 
				global $conn;
				$sql="select id_form,cod_form, cod_epl_jefe, RTRIM(nom_epl)+' '+RTRIM(ape_epl) as nombres, 
				observaciones, nom_car_nuevo, ubicacion, sol.estado, 
convert(varchar,sol.fecha,105)as fecha  from sol_req_ext_tmp2 sol, empleados_basic emp 
where cod_epl=cod_epl_jefe and  sol.estado ='AP'";
				$rs=$conn->Execute($sql);
				
				if($rs->RecordCount() > 0){
				
					while($fila=$rs->FetchRow()){
					$this->lista[]=array( "id_form" => @$fila["id_form"],
										  "cod_form" => @$fila["cod_form"],
										  "nom_car_nuevo"=> utf8_encode(@$fila["nom_car_nuevo"]),
										  "ubicacion"=> $fila["ubicacion"],										 
										  "nombres"=> utf8_encode(@$fila["nombres"]),
										  "fecha"=> @$fila["fecha"],
										  "observaciones"=> utf8_encode(@$fila["observaciones"]));
					}
				}else{
				
					$this->lista=0;
					
				
				
				}
			
				return $this->lista;
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		
		
		}
		
		
		public function get_solitudReqCarNuevo_Confirm(){
			
			unset($this->lista); //limpiar variable
			
			try { 
				global $conn;
				$sql="select sol.id_form, sol.cod_form, sol.observaciones, sol.nom_car_nuevo, sol.ubicacion, convert(varchar,sol.fecha,105)as fecha, cc2.nom_cc2, car.nom_car,rtrim(emp.nom_epl)+' '+rtrim(emp.ape_epl) as nombres  
					  from sol_req_ext_tmp sol, centrocosto2 as cc2, cargos car, empleados_basic emp
					  where cc2.cod_cc2= sol.cod_cc2 and car.cod_car=sol.cod_car and emp.cod_epl=sol.cod_epl_jefe and sol.estado='C'";
						
				$rs=$conn->Execute($sql);
				
				if($rs->RecordCount() > 0){
				
					while($fila=$rs->FetchRow()){
					$this->lista[]=array( "id_form" => @$fila["id_form"],
										  "cod_form" => @$fila["cod_form"],
										  "nom_car_nuevo"=> utf8_encode(@$fila["nom_car_nuevo"]),
										  "ubicacion"=> utf8_encode(@$fila["ubicacion"]),
										  "area"=> utf8_encode(@$fila["nom_cc2"]),
										  "cargo"=> utf8_encode(@$fila["nom_car"]),
										  "nombres"=> utf8_encode(@$fila["nombres"]),
										  "fecha"=> @$fila["fecha"],
										  "observaciones"=> utf8_encode(@$fila["observaciones"]));
					}
				}else{
				
					$this->lista=0;
					
				
				
				}
			
				return $this->lista;
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		
		
		}
		
		public function get_solitudReqCarNuevo_Negar(){
		
			unset($this->lista); //limpiar variable
			
			try { 
				global $conn;
				$sql="select sol.id_form, sol.cod_form, sol.observaciones, sol.nom_car_nuevo, sol.ubicacion, convert(varchar,sol.fecha,105)as fecha, rtrim(emp.nom_epl)+' '+rtrim(emp.ape_epl) as nombres  
					  from sol_req_ext_tmp2 sol,  empleados_basic emp
					  where  emp.cod_epl=sol.cod_epl_jefe and sol.estado='RC' ";
						
				$rs=$conn->Execute($sql);
				
				if($rs->RecordCount() > 0){
				
					while($fila=$rs->FetchRow()){
					$this->lista[]=array( "id_form" => @$fila["id_form"],
										  "cod_form" => @$fila["cod_form"],
										  "nom_car_nuevo"=> utf8_encode(@$fila["nom_car_nuevo"]),
										  "ubicacion"=> utf8_encode(@$fila["ubicacion"]),										 
										  "nombres"=> utf8_encode(@$fila["nombres"]),
										  "fecha"=> @$fila["fecha"],
										  "observaciones"=> utf8_encode(@$fila["observaciones"]));
					}
				}else{
				
					$this->lista=0;
					
				
				
				}
			
				return $this->lista;
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		
		
		}

		public function get_solitudReqNuevaPlaza_Rechazadas(){
		
			unset($this->lista); //limpiar variable
			
			try { 
				global $conn;
				$sql="select id_form,cod_form, cod_epl_jefe, RTRIM(nom_epl)+' '+RTRIM(ape_epl) as nombres, observaciones, nom_car_solicitado, personas, sol.estado, 
convert(varchar,sol.fecha,105)as fecha  from sol_req_ext_tmp3 sol, empleados_basic emp 
where cod_epl=cod_epl_jefe and  sol.estado ='R'";
				$rs=$conn->Execute($sql);
				
				if($rs->RecordCount() > 0){
				
					while($fila=$rs->FetchRow()){
					$this->lista[]=array( "id_form" => @$fila["id_form"],
										  "cod_form" => @$fila["cod_form"],
										  "nom_car_solicitado"=> utf8_encode(@$fila["nom_car_solicitado"]),
										  "personas"=> utf8_encode(@$fila["personas"]),										 
										  "nombres"=> utf8_encode(@$fila["nombres"]),
										  "fecha"=> @$fila["fecha"],
										  "observaciones"=> utf8_encode(@$fila["observaciones"]));
					}
				}else{
				
					$this->lista=0;
					
				
				
				}
			
				return $this->lista;
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		
		
		}
		
		
		/*aceptar y rechazar requisicion interna*/
		public function solReqCargoNuevo($cod_form,$observaciones,$estado){
		
			
			try { 
				global $conn;
			
				$sql="update sol_req_ext_tmp2 set observaciones='".$observaciones."', estado='".$estado."' where cod_form='".$cod_form."'";
				$rs=$conn->Execute($sql);
				
				if($rs)
					
					return 1;
				else
					return 2;
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}


		/*aceptar y rechazar requisicion interna*/
		public function solReqCargoNuevaPlazaMena($cod_form,$observaciones,$estado){
		
			
			try { 
				global $conn;
			
				$sql="update sol_req_ext_tmp3 set observaciones='".$observaciones."', estado='".$estado."' where cod_form='".$cod_form."'";
				$rs=$conn->Execute($sql);
				
				if($rs)
					
					return 1;
				else
					return 2;
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}
		
		/*aceptar y rechazar requisicion interna*/
		public function solReqCargoNuevaPlazaMena2($cod_form,$observaciones,$estado){
		
			
			try { 
				global $conn;
			
				$sql="update sol_req_ext_tmp2 set observaciones='".$observaciones."', estado='".$estado."' where cod_form='".$cod_form."'";
				$rs=$conn->Execute($sql);
				
				if($rs)
					
					return 1;
				else
					return 2;
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}


		

		/*aceptar y rechazar requisicion nueva plaza*/
		public function solReqCargoNuevaPlaza($cod_form, $observaciones, $estado){
		
			
			try { 
				global $conn;
			
				$sql="update sol_req_ext_tmp3 set observaciones='".$observaciones."', estado='".$estado."' where cod_form='".$cod_form."'";
				$rs=$conn->Execute($sql);
				
				if($rs)
					
					return 1;
				else
					return 2;
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}
		
		/*aceptar y rechazar requisicion nueva plaza*/
		public function solReqCargoNuevaPlaza2($cod_form, $observaciones, $estado){
		
			
			try { 
				global $conn;
			
				$sql="update sol_req_ext_tmp2 set observaciones='".$observaciones."', estado='".$estado."' where cod_form='".$cod_form."'";
				$rs=$conn->Execute($sql);
				
				if($rs)
					
					return 1;
				else
					return 2;
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}




		public function cambiar_estado_vacante($codigo,$cod_form){
			
			date_default_timezone_set('America/Bogota');
			
			try { 
				global $conn;
			
				$sql="update vacantes_gh set  estado='PROC' where codigo='".$codigo."'";

				$rs=$conn->Execute($sql);
				$fecha_click=date("Y-m-d H:i:s"); 
				$estado='En Proceso';
				
				if($rs){
				
					$sql4="select * from log_vacantes where codigo_vacante=$cod_form";
					
					$rs2=$conn->Execute($sql4);
				
					if($rs2->RecordCount() > 0){
					
						
						$fila=$rs2->FetchRow();
						
						
						$sql3="insert into log_vacantes(codigo_vacante,jefe,estado,fecha_click,fecha_ini_entr,categoria)
					   values(".$cod_form.",'".$fila['jefe']."','".$estado."','".$fecha_click."','".$fila['fecha_ini_entr']."','Requisicion Interna')";
					   
					   $rs3=$conn->Execute($sql3);
					   
					   if($rs3){
					   
							return 1;
					   }else{
					   
							return 2;
					   }
					
					}else{
						
						return 2;
					
					}
					
					
				}else{
				
					return 2;
				
				}
					
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}


		public function cambiar_estado_vacantevida($codigo,$cod_form){
		
			date_default_timezone_set('America/Bogota');
			
			try { 
				global $conn;
			
				$sql="update vacantes_gh set  estado='CERR' where codigo='".$codigo."'";

				
				$rs=$conn->Execute($sql);
				
				$fecha_click=date("Y-m-d H:i:s"); 
				$estado='Cerrado';
				
				if($rs){
					
					$sql4="select * from log_vacantes where codigo_vacante=$cod_form";
					
					$rs2=$conn->Execute($sql4);
				
					if($rs2->RecordCount() > 0){
					
						
						$fila=$rs2->FetchRow();
						
						
						$sql3="insert into log_vacantes(codigo_vacante,jefe,estado,fecha_click,fecha_ini_entr,categoria)
					   values(".$cod_form.",'".$fila['jefe']."','".$estado."','".$fecha_click."','".$fila['fecha_ini_entr']."','Requisicion Interna')";
					   
					   $rs3=$conn->Execute($sql3);
					  
					   if($rs3){
					   
							return 1;
					   }else{
					   
							return 2;
					   }
					
					}else{
						return 2;
						
					}
				}else{
					return 2;
				}
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}
		
		



		public function rechazar_vacante($codigo){
		
			
			try { 
				global $conn;
			
				$sql="update selec_usuario_nuevo set  estado='No Cumple' where cedula='".$codigo."'";

				
				$rs=$conn->Execute($sql);
				
				if($rs){



					$sql2="update ASP_VAC set estado='cerrado' where cod_asp='".$codigo."' and estado='CPE'";

					$rs2=$conn->Execute($sql2);

					if($rs2){
						return 1;


					}else{
						
						return 2;

					}




				}else{


					return 2;
				}
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}



		public function aceptar_vacante($codigo){
		
			
			try { 
				global $conn;
			
				$sql="update selec_usuario_nuevo set  estado='Seleccionado' where cedula='".$codigo."'";

				
				$rs=$conn->Execute($sql);
				
				if($rs){
					
					$sql2="update ASP_VAC set estado='cerrado' where cod_asp='".$codigo."' and estado='CPE'";

					$rs2=$conn->Execute($sql2);

					if($rs2){
						return 1;


					}else{
						
						return 2;

					}

				}else{
					return 2;
				}
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}
		
		public function conproceso_vacante($codigo, $estado){
		
			
			try { 
				global $conn;
			
				$sql="update selec_usuario_nuevo set  estado='".$estado."' where cedula='".$codigo."'";
				
				
				//var_dump($sql); die();

				
				$rs=$conn->Execute($sql);
				
				if($rs){
					
					$sql2="update ASP_VAC set estado='cerrado' where cod_asp='".$codigo."' and estado='CPE'";

					$rs2=$conn->Execute($sql2);

					if($rs2){
						return 1;


					}else{
						
						return 2;

					}

				}else{
					return 2;
				}
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}




		public function preseleccionar_asp($codigo){
		
			
			try { 
				global $conn;
			
				$sql="update selec_usuario_nuevo set  estado='Preseleccionado' where cedula='".$codigo."'";

				
				$rs=$conn->Execute($sql);
				
				if($rs)
					
					return 1;
				else
					return 2;
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}
		
		
		public function contar_estados(){
			
			$proceso=0;
			$pendiente=0;
			$cerrado=0;
			
			global $conn;
			
				//$sql="select * from probar_wokflow";
									
				/*$sql="select codigo_vacante, nom_car as vacante_sol,  rtrim(nom_epl)+' '+rtrim(ape_epl) as nombre, log_vac.estado, fecha_click, fecha_ini_entr, categoria 
				from log_vacantes log_vac, empleados_basic, req_Interna req, cargos car
				where jefe=cod_epl and req.id=codigo_vacante and car.cod_car=req.cod_car";*/
				
				$sql="select codigo_vacante, nom_car as vacante_sol,  rtrim(nom_epl)+' '+rtrim(ape_epl) as nombre,fecha_click, 
				log_vac.estado,  fecha_ini_entr, categoria 
				from log_vacantes log_vac, empleados_basic, req_Interna req, cargos car
				where jefe=cod_epl and req.id=codigo_vacante and car.cod_car=req.cod_car 
				and codigo_vacante+''+CONVERT(varchar(20),fecha_click,120) in (select distinct codigo_vacante+''+CONVERT(varchar(20),max(fecha_click),120)
				from log_vacantes log_vac, empleados_basic, req_Interna req, cargos car
				where jefe=cod_epl and req.id=codigo_vacante and car.cod_car=req.cod_car 
				group by codigo_vacante)
				group by codigo_vacante, nom_car,nom_epl,ape_epl, log_vac.estado,fecha_click, 
				fecha_ini_entr, categoria"; 
				
				
				$rs=$conn->Execute($sql);
				
				if($rs->RecordCount() > 0){
				
					while($fila=$rs->FetchRow()){
						
						switch(@$fila["estado"]){
						
							case 'En Proceso':
								$proceso++;
							break;
							case 'P':
								$pendiente++;
							break;
							case 'Cerrado':
								$cerrado++;
							break;
						
						}
					}
					
					return $datos=array('proceso'=>$proceso,'pendiente'=>$pendiente,'cerrado'=>$cerrado );
					
					
				}else{
				
					return $datos=array('proceso'=>0,'pendiente'=>0,'cerrado'=>0 );
					
					
				
				}
			
		}
		
		
		
		

		public function get_workflow(){
			
			
				global $conn;
			
				$sql="
				select log_vac.id, codigo_vacante, nom_car as vacante_sol, rtrim(nom_epl)+' '+rtrim(ape_epl) as nombre,CONVERT(varchar(20),fecha_click,103)+' '+CONVERT(varchar(20),fecha_click,108) as fecha_click, log_vac.estado as estado, CONVERT(varchar(20),fecha_ini_entr,103) as fecha_ini_entr, categoria
				from log_vacantes log_vac, empleados_basic, req_Interna req, cargos car where jefe=cod_epl and req.id=codigo_vacante and car.cod_car=req.cod_car and codigo_vacante+''+CONVERT(varchar(20),fecha_click,120) in (select distinct codigo_vacante+''+CONVERT(varchar(20),max(fecha_click),120) from log_vacantes log_vac, empleados_basic, req_Interna req, cargos car where jefe=cod_epl and req.id=codigo_vacante and car.cod_car=req.cod_car group by codigo_vacante) group by codigo_vacante, nom_car,nom_epl,ape_epl, log_vac.estado,fecha_click, fecha_ini_entr, categoria, log_vac.id	";
				
				
				$rs=$conn->Execute($sql);
				
				if($rs->RecordCount() > 0){
				
					while($fila=$rs->FetchRow()){
					$this->lista[]=array( "codigo_vacante" => @$fila["codigo_vacante"],
										  "vacante_sol" => @$fila["vacante_sol"],
										  "jefe"=> utf8_encode(@$fila["nombre"]),
										  "estado"=> utf8_encode(@$fila["estado"]),										 
										  "fecha_inicial"=> utf8_encode(@$fila["fecha_click"]),
										  "fecha_ini_entr"=> @$fila["fecha_ini_entr"],
										  "categoria"=> utf8_encode(@$fila["categoria"]),
										  "id"=> @$fila["id"],
										  );
					}
				}else{
				
					$this->lista=0;
					
				
				
				}
				
				
				return $this->lista;
		
		}
		
		
		
		
		
		
		public function vacante_independiente($codigo_vacante, $id){
		
			global $conn;
			
				$sql="select *, CONVERT(varchar(20),fecha_click,103) as fecha_inicio, CONVERT(varchar(20),fecha_click,103)+' '+CONVERT(varchar(20),fecha_click,108) as fecha_click from log_vacantes where codigo_vacante=$codigo_vacante and id=$id order by  id asc";
				
				$rs=$conn->Execute($sql);
				
				if($rs->RecordCount() > 0){
				
					while($fila=$rs->FetchRow()){
					$this->lista[]=array( 
										  
										  "estado"=> utf8_encode(@$fila["estado"]),
                                          "fecha_inicio"=> @$fila["fecha_inicio"],	
										  "fecha_click"=> @$fila["fecha_click"],										  
										  
										  );
					}
				}else{
				
					$this->lista=0;
					
				
				
				}
				
				
				return $this->lista;
		}
		
		
		public function vacante_fecha_limite($anio){
		
			global $conn;
			
				$sql="select codigo_vacante, nom_car as vacante_sol,  rtrim(nom_epl)+' '+rtrim(ape_epl) as nombre,CONVERT(varchar(20),fecha_click,103) as fecha_click, 
					log_vac.estado as estado, CONVERT(varchar(20),fecha_ini_entr,103) as fecha_ini_entr, categoria 
					from log_vacantes log_vac, empleados_basic, req_Interna req, cargos car
					where jefe=cod_epl and req.id=codigo_vacante and car.cod_car=req.cod_car AND  YEAR(fecha_click)=$anio
					and codigo_vacante+''+CONVERT(varchar(20),fecha_click,120) in (select distinct codigo_vacante+''+CONVERT(varchar(20),max(fecha_click),120)
					from log_vacantes log_vac, empleados_basic, req_Interna req, cargos car
					where jefe=cod_epl and req.id=codigo_vacante and car.cod_car=req.cod_car 
					group by codigo_vacante)
					group by codigo_vacante, nom_car,nom_epl,ape_epl, log_vac.estado,fecha_click, 
					fecha_ini_entr, categoria";
				
				$rs=$conn->Execute($sql);
				
				if($rs->RecordCount() > 0){
				
					while($fila=$rs->FetchRow()){
					$this->lista[]=array( 
									  "fecha_inicio"=> @$fila["fecha_ini_entr"],	
									  "fecha_click"=> @$fila["fecha_click"],										  
									  
									  );
					}
				}else{
				
					$this->lista=0;
					
				
				
				}
				
				
				return $this->lista;
			
		}
		
		
		
		public function promedio_cierre($anio){
			
			
			global $conn;
			
				$sql="select codigo_vacante, nom_car as vacante_sol,  rtrim(nom_epl)+' '+rtrim(ape_epl) as nombre,CONVERT(varchar(20),fecha_click,103) as fecha_click, 
					log_vac.estado as estado, CONVERT(varchar(20),fecha_ini_entr,103) as fecha_ini_entr, categoria 
					from log_vacantes log_vac, empleados_basic, req_Interna req, cargos car
					where jefe=cod_epl and req.id=codigo_vacante and car.cod_car=req.cod_car AND  YEAR(fecha_ini_entr)=$anio and log_vac.estado='Cerrado'
					and codigo_vacante+''+CONVERT(varchar(20),fecha_click,120) in (select distinct codigo_vacante+''+CONVERT(varchar(20),max(fecha_click),120)
					from log_vacantes log_vac, empleados_basic, req_Interna req, cargos car
					where jefe=cod_epl and req.id=codigo_vacante and car.cod_car=req.cod_car 
					group by codigo_vacante)
					group by codigo_vacante, nom_car,nom_epl,ape_epl, log_vac.estado,fecha_click, 
					fecha_ini_entr, categoria";
				
				$rs=$conn->Execute($sql);
				
				if($rs->RecordCount() > 0){
				
					while($fila=$rs->FetchRow()){
					$this->lista[]=array( 
									   "fecha_inicio"=> @$fila["fecha_ini_entr"],	
									   "fecha_click"=> @$fila["fecha_click"]
									  );
					}
				}else{
				
					$this->lista=0;
					
				
				
				}
				
				
				return $this->lista;

		}
		
	}