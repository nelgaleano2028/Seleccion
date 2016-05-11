<?php
	require_once("../librerias/lib/connection.php");
	
	
	class Requisicion{
		
		private $lista=array();
		
		
		/*Traer todos los centro de costos por jefe*/
		public function get_centroCostoJefe($cod_epl){
			
			try { 
				global $conn;
				$sql="SELECT distinct AREA.COD_CC2,   AREA.NOM_CC2 
						FROM  CENTROCOSTO2 AREA, EMPLEADOS_BASIC EPL, EMPLEADOS_GRAL GRAL
						WHERE EPL.COD_EPL = GRAL.COD_EPL
						AND EPL.COD_CC2=AREA.COD_CC2
						and GRAL.COD_JEFE = '".$cod_epl."'
						and AREA.estado='A'
						and EPL.estado='A'
						order by nom_cc2 asc
						";
						
				$rs=$conn->Execute($sql);
				while($fila=$rs->FetchRow()){
					$this->lista[]=array("codigo" => $fila["COD_CC2"],
										  "area" => utf8_encode($fila["NOM_CC2"]));
				}
			
				return $this->lista;
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
			
			
		}

		
		/*Traer todos los cargos por centro costo y jefe*/
		public function get_cargosJefe($centro_costo,$cod_jefe){
			
			unset($this->lista); //limpiar variable
			
			try { 
				global $conn;
				$sql="SELECT distinct c.cod_car, C.NOM_CAR  
					    FROM CARGOS C, CENTROCOSTO2 AREA, EMPLEADOS_BASIC EPL, EMPLEADOS_GRAL GRAL
						WHERE EPL.COD_EPL = GRAL.COD_EPL
						AND EPL.COD_CC2='".$centro_costo."'
						AND EPL.COD_CAR=C.COD_CAR
						AND gral.COD_JEFE  = '".$cod_jefe."'
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
		
		/*Traer todas las ausencias*/
		public function get_ausencias(){
			
			unset($this->lista); //limpiar variable
			
			try { 
				global $conn;
				$sql="select c.cod_con, con.nom_con from conceptos_ayu c, 
                      conceptos con where con.cod_con = c.cod_con and tabla = 'ausencias' and con.cod_con<>'36' and con.cod_con<>'9000' order by nom_con ";
						
				$rs=$conn->Execute($sql);
				while($fila=$rs->FetchRow()){
					$this->lista[]=array("codigo" => $fila["cod_con"],
										 "concepto"=> utf8_encode($fila["nom_con"]));
				}
			
				return $this->lista;
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		}
		
		/*Ingresar requisicion interna*/
		public function ingresar_requisicionInterna($centro_costo,$cargo,$reemplazo,$motivo,$motivo_ausencia,$fecha_inicioE,$fecha_finE,$fecha_inicioL,$fecha_finL,$sugerencia,$sugerencia_persona,$cod_epl_jefe,$fecha_solicitud,$num_select_reemp){
			
			date_default_timezone_set('America/Bogota');

			try { 
				global $conn;
				
		
			
			
			if($fecha_inicioE =="-- 00:00:00.000"){
				
				$fecha_inicioE = "00:00:00.000";
				
			}
			
			
			if($fecha_finE =="-- 00:00:00.000"){
				
				$fecha_finE = "00:00:00.000";
				
			}
			
			
			
				

				if($fecha_finL==""){

					$sql="insert into req_Interna(cod_cc2,cod_car,reemp,motivo,motivo_ausencia,fec_inicio_ent,fec_fin_ent,fec_inicio_lab,fec_fin_lab,sugerencia,sugerencia_persona,cod_epl_jefe,fec_sol,num_select_reemp) 
					values('".$centro_costo."','".$cargo."','".$reemplazo."','".$motivo."','".$motivo_ausencia."',NULL,NULL,'".$fecha_inicioL."',NULL, '".$sugerencia."','".$sugerencia_persona."','".$cod_epl_jefe."','".$fecha_solicitud."','".$num_select_reemp."')";

				}else{

					$sql="insert into req_Interna(cod_cc2,cod_car,reemp,motivo,motivo_ausencia,fec_inicio_ent,fec_fin_ent,fec_inicio_lab,fec_fin_lab,sugerencia,sugerencia_persona,cod_epl_jefe,fec_sol,num_select_reemp) 
				values('".$centro_costo."','".$cargo."','".$reemplazo."','".$motivo."','".$motivo_ausencia."','".$fecha_inicioE."','".$fecha_finE."','".$fecha_inicioL."','".$fecha_finL."', '".$sugerencia."','".$sugerencia_persona."','".$cod_epl_jefe."','".$fecha_solicitud."','".$num_select_reemp."')";
	
		
				}
				
				//var_dump($sql);die()
				$conn->Execute($sql);
				
				$cod_form=$conn->GetOne("SELECT LAST_INSERT_ID=@@IDENTITY");
				
				$estado='P';
				$sql2="insert into sol_req_int_tmp(cod_form,cod_cc2,cod_car,cod_epl_jefe,fecha,estado)
					   values(".$cod_form.",'".$centro_costo."','".$cargo."','".$cod_epl_jefe."','".$fecha_solicitud."','".$estado."')";
				$conn->Execute($sql2);
				
				$fecha_click=date("Y-m-d H:i:s"); 
				
				$sql3="insert into log_vacantes(codigo_vacante,jefe,estado,fecha_click,fecha_ini_entr,categoria)
					   values(".$cod_form.",'".$cod_epl_jefe."','".$estado."','".$fecha_click."','".$fecha_inicioE."','Requisicion Interna')";
					   
				$rs=$conn->Execute($sql3);

				if($rs){
					
					return 1;
				}else{
					return 2;
				}
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}
		
		/*Editar la requisicion interna*/
		public function ed_requisicionInterna($id,$centro_costo,$cargo,$reemplazo,$motivo,$motivo_ausencia,$fecha_inicioE,$fecha_finE,$fecha_inicioL,$fecha_finL,$sugerencia,$sugerencia_persona,$cod_epl_jefe,$fecha_solicitud,$num_select_reemp){

			try { 
				global $conn;
				
				if($fecha_finL==""){
				
					$sql="update req_Interna set cod_cc2='".$centro_costo."', cod_car='".$cargo."',reemp='".$reemplazo."', motivo='".$motivo."',motivo_ausencia='".$motivo_ausencia."',fec_inicio_ent='".$fecha_inicioE."', fec_fin_ent='".$fecha_finE."', fec_inicio_lab='".$fecha_inicioL."',fec_fin_lab=NULL, sugerencia='".$sugerencia."', sugerencia_persona='".$sugerencia_persona."', cod_epl_jefe='".$cod_epl_jefe."', fec_sol='".$fecha_solicitud."', num_select_reemp='".$num_select_reemp."' where id=".$id."";
					
				}else{

					$sql="update req_Interna set cod_cc2='".$centro_costo."', cod_car='".$cargo."',reemp='".$reemplazo."', motivo='".$motivo."',motivo_ausencia='".$motivo_ausencia."',fec_inicio_ent='".$fecha_inicioE."', fec_fin_ent='".$fecha_finE."', fec_inicio_lab='".$fecha_inicioL."',fec_fin_lab='".$fecha_finL."', sugerencia='".$sugerencia."', sugerencia_persona='".$sugerencia_persona."', cod_epl_jefe='".$cod_epl_jefe."', fec_sol='".$fecha_solicitud."', num_select_reemp='".$num_select_reemp."' where id=".$id."";
				}


				

				$conn->Execute($sql);
				
				$estado='P';
					   
				$sql2="update sol_req_int_tmp set cod_cc2='".$centro_costo."', cod_car='".$cargo."', cod_epl_jefe='".$cod_epl_jefe."', fecha='".$fecha_solicitud."', estado='".$estado."' where cod_form=".$id."";
					   
				$rs=$conn->Execute($sql2);
				
				$fecha_click=date("Y-m-d H:i:s"); 
				
				$sql3="update log_vacantes set jefe='".$cod_epl_jefe."', estado='".$estado."', fecha_click='".$fecha_click."', fecha_ini_entr='".$fecha_inicioE."', categoria='Requisicion Interna' where codigo_vacante='".$id."' ";
				
				$rs=$conn->Execute($sql3);
					   

				if($rs){
					
					return 1;
				}else{
					return 2; 
				}
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}
		
		/*aceptar requisicion interna*/
		public function aceptar_requisicionInterna($cod_form,$observaciones){
			
			date_default_timezone_set('America/Bogota');
			
			try { 
				global $conn;
			
				
				$sql="update sol_req_int_tmp set observaciones='".$observaciones."', estado='A' where cod_form='".$cod_form."'";
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
		
		
		/*Rechazar requisicion interna*/
		public function rechazar_requisicionInterna($cod_form,$observaciones){
			
			
			date_default_timezone_set('America/Bogota');
			try { 
				global $conn;
			
				
				$sql="update sol_req_int_tmp set observaciones='".$observaciones."', estado='R' where cod_form='".$cod_form."'";
				
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
		
		/*Mostrar las solicitudes de Requesicion Pendientes*/
		public function get_solitudReq(){
			
			unset($this->lista); //limpiar variable
			
			try { 
				global $conn;
				$sql="select  sol.cod_form, sol.cod_epl_jefe, cc2.nom_cc2, car.nom_car, rtrim(emp.nom_epl)+' '+rtrim(emp.ape_epl) as nombres, convert(varchar,sol.fecha,105)as fecha, sol.observaciones from 
                     sol_req_int_tmp as sol, centrocosto2 as cc2, cargos car, empleados_basic emp
                     where cc2.cod_cc2= sol.cod_cc2 and car.cod_car=sol.cod_car and emp.cod_epl=sol.cod_epl_jefe and sol.estado='P'";
						
				$rs=$conn->Execute($sql);
				
				if($rs->RecordCount() > 0){
				
					while($fila=$rs->FetchRow()){
					$this->lista[]=array("cod_form" => $fila["cod_form"],
										  "area"=> utf8_encode($fila["nom_cc2"]),
										  "cargo"=> utf8_encode($fila["nom_car"]),
										  "cod_epl_jefe"=>$fila["cod_epl_jefe"],
										  "jefe"=> utf8_encode($fila["nombres"]),
										  "fecha"=> $fila["fecha"],
										  "observaciones"=> utf8_encode($fila["observaciones"]));
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
		
		/*Mostrar las solicitudes de Requesicion Aprobadas*/
		public function get_solitudReqApro(){
		
			
			try { 
				global $conn;
                $sql="select  sol.cod_form, cc2.cod_cc2,cc2.nom_cc2, car.cod_car,car.nom_car, emp.cod_epl, rtrim(emp.nom_epl)+' '+rtrim(emp.ape_epl) as nombres, convert(varchar,sol.fecha,105)as fecha, sol.observaciones from 
                     sol_req_int_tmp as sol, centrocosto2 as cc2, cargos car, empleados_basic emp
                     where cc2.cod_cc2= sol.cod_cc2 and car.cod_car=sol.cod_car and emp.cod_epl=sol.cod_epl_jefe and sol.estado='A'";
						
				$rs=$conn->Execute($sql);
				
				if($rs->RecordCount() > 0){
				
					while($fila=$rs->FetchRow()){
					$this->lista[]=array("cod_form" => $fila["cod_form"],
										  "cod_cc2" => $fila["cod_cc2"],
										  "area"=> utf8_encode($fila["nom_cc2"]),
										  "cod_car"=> utf8_encode($fila["cod_car"]),
										  "cargo"=> utf8_encode($fila["nom_car"]),
										  "cod_epl"=> utf8_encode($fila["cod_epl"]),
										  "jefe"=> utf8_encode($fila["nombres"]),
										  "fecha"=> $fila["fecha"],
										  "observaciones"=> utf8_encode($fila["observaciones"]));
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
		
		/*Mostrar las solicitudes de Requesicion Aprobadas Pendientes*/
		public function get_solitudReqApro_Pend(){
		
			
			try { 
				global $conn;
                /*$sql="select  sol.cod_form, cc2.cod_cc2,cc2.nom_cc2, car.cod_car,car.nom_car, emp.cod_epl, rtrim(emp.nom_epl)+' '+rtrim(emp.ape_epl) as nombres, convert(varchar,sol.fecha,105)as fecha, sol.observaciones from 
                     sol_req_int_tmp as sol, centrocosto2 as cc2, cargos car, empleados_basic emp
                     where cc2.cod_cc2= sol.cod_cc2 and car.cod_car=sol.cod_car and emp.cod_epl=sol.cod_epl_jefe and sol.estado='AP'";*/


					
				 /*$sql="select sol.cod_form, cc2.cod_cc2,cc2.nom_cc2, car.cod_car,car.nom_car, emp.cod_epl, rtrim(emp.nom_epl)+' '+rtrim(emp.ape_epl) as nombres, convert(varchar,sol.fecha,105)as fecha, sol.observaciones
						from  sol_req_int_tmp as sol, centrocosto2 as cc2, cargos car, empleados_basic emp, vacantes_gh vac 
						where cc2.cod_cc2= sol.cod_cc2 and car.cod_car=sol.cod_car and emp.cod_epl=sol.cod_epl_jefe and vac.estado='P'";*/
						
						
				$sql="select vac.cod_form_fk,car.nom_car,emp.cod_epl, rtrim(emp.nom_epl)+' '+rtrim(emp.ape_epl) as nombres,convert(varchar,vac.fecha,105)as fecha 
					  from vacantes_gh vac, cargos car, empleados_basic emp 
					  where car.cod_car=vac.cod_cargo and emp.cod_epl=vac.cod_jefe and vac.estado='P'";
						
				$rs=$conn->Execute($sql);
				
				if($rs->RecordCount() > 0){
				
					while($fila=$rs->FetchRow()){
					$this->lista[]=array("cod_form" => $fila["cod_form_fk"],
										  "cargo"=> utf8_encode($fila["nom_car"]),
										  "cod_epl"=> utf8_encode($fila["cod_epl"]),
										  "jefe"=> utf8_encode($fila["nombres"]),
										  "fecha"=> $fila["fecha"]);
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
		
		/*Mostrar las solicitudes de Requesicion Aprobadas En Proceso*/
		public function get_solitudReqApro_Cerr(){
		
			
			try { 
				global $conn;
                $sql="select  sol.cod_form, cc2.cod_cc2,cc2.nom_cc2, car.cod_car,car.nom_car, emp.cod_epl, rtrim(emp.nom_epl)+' '+rtrim(emp.ape_epl) as nombres, convert(varchar,sol.fecha,105)as fecha, sol.observaciones from 
sol_req_int_tmp as sol, centrocosto2 as cc2, cargos car, empleados_basic emp, vacantes_gh vac
where cc2.cod_cc2= sol.cod_cc2 and car.cod_car=sol.cod_car and emp.cod_epl=sol.cod_epl_jefe and cod_form=cod_form_fk and vac.estado='CERR' ";
						
				$rs=$conn->Execute($sql);
				
				if($rs->RecordCount() > 0){
				
					while($fila=$rs->FetchRow()){
					$this->lista[]=array("cod_form" => $fila["cod_form"],
										  "cod_cc2" => $fila["cod_cc2"],
										  "area"=> utf8_encode($fila["nom_cc2"]),
										  "cod_car"=> utf8_encode($fila["cod_car"]),
										  "cargo"=> utf8_encode($fila["nom_car"]),
										  "cod_epl"=> utf8_encode($fila["cod_epl"]),
										  "jefe"=> utf8_encode($fila["nombres"]),
										  "fecha"=> $fila["fecha"],
										  "observaciones"=> utf8_encode($fila["observaciones"]));
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
		

		/*solicitudes de vacantes*/
		public function get_solitudVac(){
			
			
			try { 
				global $conn;
                $sql="select   sol.cod_form,sol.cod_epl_jefe,vac.codigo,  car.cod_car,car.nom_car, emp.cod_epl, rtrim(emp.nom_epl)+' '+rtrim(emp.ape_epl) as nombres, convert(varchar,vac.fecha,105)as fecha, vac.observaciones, vac.estado from 
					  vacantes_gh as vac,  cargos car, empleados_basic emp, sol_req_int_tmp as sol
                      where   car.cod_car=vac.cod_cargo and emp.cod_epl=vac.cod_jefe and vac.estado='P' and vac.cod_form_fk= sol.cod_form";

				$rs=$conn->Execute($sql);
				
				if($rs->RecordCount() > 0){
				
					while($fila=$rs->FetchRow()){
					$this->lista[]=array("codigo" => $fila["codigo"],
										  "cod_form"=> $fila["cod_form"],
										  "cod_epl_jefe"=> $fila["cod_epl_jefe"],
										  "cod_car" => $fila["cod_car"],
										  "nom_car"=> utf8_encode($fila["nom_car"]),
										  "cod_epl"=> utf8_encode($fila["cod_epl"]),
										  "nombres"=> utf8_encode($fila["nombres"]),
										  "fecha"=> utf8_encode($fila["fecha"]),
										  "observaciones"=> utf8_encode($fila["observaciones"]),
										  "estado"=> utf8_encode($fila["estado"]));
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

		public function vacantes_avila(){
			
			
			try { 
				global $conn;
                $sql="select vac.cod_form_fk,  vac.codigo,  car.cod_car,car.nom_car, emp.cod_epl, rtrim(emp.nom_epl)+' '+rtrim(emp.ape_epl) as nombres, convert(varchar,vac.fecha,105)as fecha, vac.observaciones, vac.estado from 
                     vacantes_gh as vac,  cargos car, empleados_basic emp
                     where   car.cod_car=vac.cod_cargo and emp.cod_epl=vac.cod_jefe and vac.estado='PROC'";
						
				$rs=$conn->Execute($sql);
				
				if($rs->RecordCount() > 0){
				
					while($fila=$rs->FetchRow()){
					$this->lista[]=array("codigo" => $fila["codigo"],
										  "cod_car" => $fila["cod_car"],
										  "nom_car"=> utf8_encode($fila["nom_car"]),
										  "cod_epl"=> utf8_encode($fila["cod_epl"]),
										  "nombres"=> utf8_encode($fila["nombres"]),
										  "fecha"=> utf8_encode($fila["fecha"]),
										  "observaciones"=> utf8_encode($fila["observaciones"]),
										  "estado"=> utf8_encode($fila["estado"]),
										  "cod_form"=> $fila["cod_form_fk"] );
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
		
		
		/*Mostrar las solicitudes de Requesicion rechazadas*/
		public function get_solitudReqRec(){
			
			unset($this->lista); //limpiar variable
			
			try { 
				global $conn;
				$sql="select  sol.cod_form, cc2.nom_cc2, car.nom_car, rtrim(emp.nom_epl)+' '+rtrim(emp.ape_epl) as nombres, convert(varchar,sol.fecha,105)as fecha, sol.observaciones from 
                     sol_req_int_tmp as sol, centrocosto2 as cc2, cargos car, empleados_basic emp
                     where cc2.cod_cc2= sol.cod_cc2 and car.cod_car=sol.cod_car and emp.cod_epl=sol.cod_epl_jefe and sol.estado='R'";
						
				$rs=$conn->Execute($sql);
				
				if($rs->RecordCount() > 0){
				
					while($fila=$rs->FetchRow()){
					$this->lista[]=array("cod_form" => $fila["cod_form"],
										  "area"=> utf8_encode($fila["nom_cc2"]),
										  "cargo"=> utf8_encode($fila["nom_car"]),
										  "jefe"=> utf8_encode($fila["nombres"]),
										  "fecha"=> $fila["fecha"],
										  "observaciones"=> utf8_encode($fila["observaciones"]));
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
		
		
        /*Ingresar requisicion de un nuevo cargo*/		
		public function ing_requisicion_nuevo_cargo($cod_form,$centro_costo,$cargoRequerido,$motivo,$fec1,$fec2,$fec3,$fec4,$personsa_sugerida,$cod_epl_jefe,$fecha_solicitud,$nom_car,$ubicacion){

			try { 
				global $conn;
			
				$sql="insert into req_nuevo_cargo(cod_form,cod_cc2,cod_car,motivo,fec_ini_ent,fec_fin_ent,fec_ini_lab,fec_fin_lab,per_sugerida,cod_epl_jefe,fec_sol) values('".$cod_form."','".$centro_costo."','".$cargoRequerido."','".$motivo."','".$fec1."','".$fec2."','".$fec3."','".$fec4."', '".$personsa_sugerida."', '".$cod_epl_jefe."','".$fecha_solicitud."')";
				
				$conn->Execute($sql);
				
				$id_form=$conn->GetOne("SELECT LAST_INSERT_ID=@@IDENTITY");
				
				//cod_epl_jefe traer centro costo y cargo
				
				$sql1="select cod_cc2, cod_car  from empleados_basic where cod_epl='".$cod_epl_jefe."'";
				$rs=$conn->Execute($sql1);
				$fila=$rs->FetchRow();
				
				
				$sql2="insert into sol_req_ext_tmp(id_form,cod_form,cod_cc2,cod_car,cod_epl_jefe,estado,nom_car_nuevo,ubicacion,fecha) 
				values('".$id_form."','".$cod_form."','".$fila['cod_cc2']."','".$fila['cod_car']."','".$cod_epl_jefe."','P','".$nom_car."','".$ubicacion."','".$fecha_solicitud."')";
                $rs2=$conn->Execute($sql2);
				
				
				if($rs2){
					
					return 1;
				}else{
					return 2;
				}
				
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		}

		 /*Ingresar requisicion de un nuevo cargo*/		
		public function ing_requisicion_nuevo_cargoDos($cod_form,$motivo,$fec1,$fec2,$fec3,$fec4,$cod_epl_jefe,$fecha_solicitud,$nom_car,$ubicacion){

			try { 
				global $conn;
			
				$sql="insert into req_nuevo_cargo2(cod_form,motivo,fec_ini_ent,fec_fin_ent,fec_ini_lab,fec_fin_lab,cod_epl_jefe,fec_sol) values('".$cod_form."','".$motivo."','".$fec1."','".$fec2."','".$fec3."','".$fec4."','".$cod_epl_jefe."','".$fecha_solicitud."')";
				
				$rs=$conn->Execute($sql);

				$id_form=$conn->GetOne("SELECT LAST_INSERT_ID=@@IDENTITY");
				
				
				$sql2="insert into sol_req_ext_tmp2(id_form,cod_form,cod_epl_jefe,estado,nom_car_nuevo,ubicacion,fecha) 
				values('".$id_form."','".$cod_form."','".$cod_epl_jefe."','P','".$nom_car."','".$ubicacion."','".$fecha_solicitud."')";
                
                $rs2=$conn->Execute($sql2);
				

				//var_dump($sql2);die();
				
				if($rs){
					
					return 1;
				}else{
					return 2;
				}
				
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		}

        public function ing_requisicion_nuevo_cargoTres($cod_form,$motivo,$fec1,$fec2,$fec3,$fec4,$cod_epl_jefe,$fecha_solicitud,$nom_car,$personas){

			try { 
				global $conn;
			
				$sql3="insert into req_nuevo_cargo3(cod_form,motivo,fec_ini_ent,fec_fin_ent,fec_ini_lab,fec_fin_lab,cod_epl_jefe,fec_sol) values('".$cod_form."','".$motivo."','".$fec1."','".$fec2."','".$fec3."','".$fec4."','".$cod_epl_jefe."','".$fecha_solicitud."')";
				
				
					//var_dump($sql3);
				
				$rs=$conn->Execute($sql3);

				$id_form=$conn->GetOne("SELECT LAST_INSERT_ID=@@IDENTITY");
				
				
				$sql4="insert into sol_req_ext_tmp3(id_form,cod_form,cod_epl_jefe,estado,nom_car_solicitado,personas,fecha) 
				values('".$id_form."','".$cod_form."','".$cod_epl_jefe."','P','".$nom_car."','".$personas."','".$fecha_solicitud."')";
                
                //var_dump($sql4);die("HOLAAAAAAAAAAAAAAAAA");
               
                $rs2=$conn->Execute($sql4);
				
				
				if($rs2){
					
					return 1;
				}else{
					return 2;
				}
				
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		}


		
		  /*edit requisicion de un nuevo cargo*/	
		public function edit_requisicion_nuevo_cargo($id,$cod_form,$centro_costo,$cargoRequerido,$motivo,$fec1,$fec2,$fec3,$fec4,$personsa_sugerida,$cod_epl_jefe,$fecha_solicitud,$nom_car,$ubicacion){
		
			
			try { 
				global $conn;
				
				$sql="update req_nuevo_cargo set cod_cc2='".$centro_costo."',cod_car='".$cargoRequerido."',motivo='".$motivo."',fec_ini_ent='".$fec1."',fec_fin_ent='".$fec2."',fec_ini_lab='".$fec3."'
				,fec_fin_lab='".$fec4."', per_sugerida='".$personsa_sugerida."', cod_epl_jefe='".$cod_epl_jefe."',fec_sol='".$fecha_solicitud."' where id=".$id."";
				$conn->Execute($sql);
               
				
				$sql2="update sol_req_ext_tmp set nom_car_nuevo='".$nom_car."', ubicacion='".$ubicacion."', fecha='".$fecha_solicitud."' where id_form=".$id." and cod_form=".$cod_form."";
				 $rs2=$conn->Execute($sql2);
				
				if($rs2){
					
					return 1;
				}else{
					return 2;
				}
				
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		
		
		}


		  /*edit requisicion de un nuevo cargo*/	
		public function edit_requisicion_nuevo_cargoTres($id,$cod_form,$motivo,$fec1,$fec2,$fec3,$fec4,$fecha_solicitud,$nom_car,$personas){
		
			
			try { 
				global $conn;
				
				$sql="update req_nuevo_cargo3 set motivo='".$motivo."',fec_ini_ent='".$fec1."',fec_fin_ent='".$fec2."',fec_ini_lab='".$fec3."'
				,fec_fin_lab='".$fec4."', fec_sol='".$fecha_solicitud."' where id=".$id."";
				$conn->Execute($sql);

               
				
				$sql2="update sol_req_ext_tmp3 set nom_car_solicitado='".$nom_car."', estado='P', personas='".$personas."', fecha='".$fecha_solicitud."' where id_form=".$id." and cod_form=".$cod_form."";
				 $rs2=$conn->Execute($sql2);
				
				if($rs2){
					
					return 1;
				}else{
					return 2;
				}
				
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		
		
		}


		  /*edit requisicion de un nuevo cargo*/	
		public function edit_requisicion_nuevo_cargoDos($id,$cod_form,$motivo,$fec1,$fec2,$fec3,$fec4,$fecha_solicitud,$nom_car,$ubicacion){
		
			
			try { 
				global $conn;
				
				$sql="update req_nuevo_cargo2 set motivo='".$motivo."',fec_ini_ent='".$fec1."',fec_fin_ent='".$fec2."',fec_ini_lab='".$fec3."'
				,fec_fin_lab='".$fec4."', fec_sol='".$fecha_solicitud."' where id=".$id."";


				$conn->Execute($sql);

               
				
				$sql2="update sol_req_ext_tmp2 set nom_car_nuevo='".$nom_car."', ubicacion='".$ubicacion."', estado='P', fecha='".$fecha_solicitud."' where id_form=".$id." and cod_form=".$cod_form."";
				 $rs2=$conn->Execute($sql2);
				
				if($rs2){
					
					return 1;
				}else{
					return 2;
				}
				
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		
		
		}




		public function env_requisicionInternaTmpApro($cod_form,$observaciones,$fecha,$cod_car,$cod_epl){
		
				date_default_timezone_set('America/Bogota');
			try { 
				global $conn;
				
				$sql="update sol_req_int_tmp set estado='AP' where cod_form=".$cod_form." ";
				

				$rs=$conn->Execute($sql);
               
				
				if($rs){
					
					$sql2="insert into vacantes_gh(cod_cargo,cod_jefe,fecha,observaciones,estado, cod_form_fk) 
						values('".$cod_car."','".$cod_epl."','".$fecha."','".$observaciones."','P','".$cod_form."' )";

		            $rs2=$conn->Execute($sql2);
					
					
					$fecha_click=date("Y-m-d H:i:s"); 
					$estado='En Proceso';

		            if($rs2){

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


				}else{
					return 2;
				}
				
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		
		
		}
		
		
		//insert CERR a vacantes_gh para caso de usar solucion supernumerario 
		  public function cerrar_requisicion_apro($cod_form,$observaciones,$fecha,$cod_car,$cod_epl){
				
				date_default_timezone_set('America/Bogota');

			   try { 
				global $conn;

				$sql="update sol_req_int_tmp set estado='AP' where cod_form=".$cod_form." ";


				$rs=$conn->Execute($sql);
				
				$fecha_click=date("Y-m-d H:i:s");

				$estado1='CERR';
				$estado='Cerrado';
				
				$sql_comodin="insert into vacantes_gh(cod_cargo,cod_jefe,fecha,observaciones,estado,cod_form_fk)
					   values(".$cod_car.",'66972546','".$fecha_click."','".$observaciones."','".$estado1."','".$cod_form."')";
					   
					   
				$conn->Execute($sql_comodin);

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
		
		
		
		/* Traer empleados por cargo y centro costo activos*/
		public function get_cargosCentroCosto($cargos,$centro_costo){
			
			unset($this->lista); //limpiar variable
			
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
		

		/* Traer empleados por cargo y centro costo inactivos*/
		public function get_cargosCentroCosto2($cargos,$centro_costo){
			
			unset($this->lista); //limpiar variable
			
			try { 
				global $conn;
				$sql="select  rtrim(nom_epl)+' '+rtrim(ape_epl) as nombres, * 
					from empleados_basic 
					where  estado='I' and cod_car='".$cargos."' and cod_cc2 ='".$centro_costo."' and 
					cedula not in(select cedula from empleados_basic where estado='A')";


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


		/* Traer personas ocupar el cargo por centro costo*/
		public function get_personasCargo($centro_costo){
			
			unset($this->lista); //limpiar variable
			
			try { 
				global $conn;
				$sql="select cod_epl, rtrim(nom_epl)+' '+rtrim(ape_epl) as nombres from empleados_basic where cod_cc2 ='".$centro_costo."'";

						
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
		
		/*insertar habilidades y actitudes del aspirante*/
		public function insert_habilidad_actitud($habilidades,$fecha){
		
		
			try { 
				global $conn;

				$sql="insert into habilidad_actitud(descripcion,fecha) values('".$habilidades."','".$fecha."')";
				
				$rs=$conn->Execute($sql);
				
				if($rs){
					
					return $id_habilidad_actitud=$conn->GetOne("SELECT LAST_INSERT_ID=@@IDENTITY");
				}else{
					// el 0 es porque no se ingreso
					return $id_habilidad_actitud=0;
				}
	
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}
		
		/*seleccionar el codigo principales resposabilidades del cargo*/
		public function get_resp_cargo(){
			
			unset($this->lista); //limpiar variable
			
			try { 
				global $conn;
				$sql="select max(cod_resp) cod_resp from resp_cargo_nuevo";
						
				$rs=$conn->Execute($sql);
				while($fila=$rs->FetchRow()){
					$this->lista=array("cod_resp" => $fila["cod_resp"]);
				}
			
				return $this->lista;
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}
		
		/*seleccionar el max del cod_resp*/
		public function get_max_cod_resp(){
			
			unset($this->lista); //limpiar variable
			
			try { 
				global $conn;
				$sql="select max(cod_resp) as cod_resp from resp_cargo_nuevo";
				$rs=$conn->Execute($sql);
				$fila=$rs->FetchRow();
				$cod_resp=(int)$fila['cod_resp'] + 1;
						
			
				return $cod_resp;
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}
		
		public function insert_resp_car($cod_resp,$funcion,$porcentaje,$funcion1,$funcion2,$funcion3,$fecha){
		
			
			try { 
				global $conn;
				
				
				for( $i=0; $i<sizeof($funcion); $i++){

	
					$sql2="insert into resp_cargo_nuevo(cod_resp,funcion,porcentaje,q_hace,c_hace,p_hace,fecha)
							values(".$cod_resp.",'".$funcion[$i]."','".$porcentaje[$i]."','".$funcion1[$i]."','".$funcion2[$i]."','".$funcion3[$i]."', '".$fecha."')";
										
					$rs=$conn->Execute($sql2);
			
				}
				
				if($rs){
					
					return 1;
				}else{
						
					return 2;
				}
	
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
			
		}
		
		public function edit_resp_car($cod_resp,$funcion,$porcentaje,$funcion1,$funcion2,$funcion3,$fecha){
			
			try { 
				global $conn;
				
				$sql="select id_resp, (select COUNT(*) from resp_cargo_nuevo where cod_resp='".$cod_resp."')as tamano_sql from resp_cargo_nuevo where cod_resp='".$cod_resp."'";
				//var_dump($sql); die();
				$rs=$conn->Execute($sql);
				$i=0;
				
				if($rs->RecordCount() > 0){
				
					while($fila=$rs->FetchRow()){
				
						$sql2="update resp_cargo_nuevo set funcion='".$funcion[$i]."', porcentaje='".$porcentaje[$i]."', q_hace='".$funcion1[$i]."', c_hace='".$funcion2[$i]."', p_hace='".$funcion3[$i]."', fecha='".$fecha."' where id_resp='".$fila['id_resp']."' ";
						
						$rs2=$conn->Execute($sql2);
						$i++;
						//$p=$fila['id_resp'];
						$tamano_sql=$fila['tamano_sql'];
				
				   }
					
					
					//aumentar 1 a i
					
					$tamano=sizeof($funcion);
					$diferencia= $tamano - $tamano_sql;
					$hasta= $i + $diferencia;
				   
					   if($diferencia > 0){
							
							for( $j=$i; $j<$hasta; $j++){

								$sql2="insert into resp_cargo_nuevo(cod_resp,funcion,porcentaje,q_hace,c_hace,p_hace,fecha)
										values(".$cod_resp.",'".$funcion[$j]."','".$porcentaje[$j]."','".$funcion1[$j]."','".$funcion2[$j]."','".$funcion3[$j]."', '".$fecha."')";
													
								$rs2=$conn->Execute($sql2);
						
							}
							
							if($rs2){
								
								return 1;
							
							}else{
							
								return 2;
							}
					   
					   }else{
							 
							if($rs2){
								
								return 1;
							
							}else{
							
								return 2;
							}
					   
					   }
				   

				}else{
				
					//insertar
					for( $j=0; $j<sizeof($funcion); $j++){

						$sql2="insert into resp_cargo_nuevo(cod_resp,funcion,porcentaje,q_hace,c_hace,p_hace,fecha)
								values(".$cod_resp.",'".$funcion[$j]."','".$porcentaje[$j]."','".$funcion1[$j]."','".$funcion2[$j]."','".$funcion3[$j]."', '".$fecha."')";
											
						$rs=$conn->Execute($sql2);
						
					}
					
					
					if($rs){
					
						return 1;
					
					}else{
							
						return 2;
					}
				
				}
				
				
				
	
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
			
		}
		

		
		public function eliminar_funcion($id){
		
			try { 
				global $conn;
				
			
					$sql3="delete from resp_cargo_nuevo where id_resp='".$id."'";
					$rs=$conn->Execute($sql3);
				
				if($rs){
					
					return 1;
				}else{
						
					return 2;
				}
	
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		
		
		}
		
		public function eliminar_area($id){
		
			try { 
				global $conn;
				
			
					$sql3="delete from rel_cargo_nuevo where id_rel='".$id."'";
					$rs=$conn->Execute($sql3);
				
				if($rs){
					
					return 1;
				}else{
						
					return 2;
				}
	
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		
		
		}
		
		public function insert_rel_cargo_nuevo($cod_resp,$area,$cliente,$proveedor,$fecha){
		
			
			try { 
				global $conn;
				
					/*insert relacion del puesto con otras areas*/
					for($j=0; $j<sizeof($area); $j++){

						$sql3="insert into rel_cargo_nuevo(cod_rel, area, cliente, proveedor, fecha)
							   values(".$cod_resp.",'".$area[$j]."','".$cliente[$j]."','".$proveedor[$j]."','".$fecha."')";
						$rs=$conn->Execute($sql3);
					}
				
				if($rs){
					
					return 1;
				}else{
						
					return 2;
				}
	
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}
		
		public function edit_rel_cargo_nuevo($cod_rel,$area,$cliente,$proveedor,$fecha){
		
			global $conn;
				
				$sql="select id_rel, (select COUNT(*) from rel_cargo_nuevo where cod_rel='".$cod_rel."')as tamano_sql from rel_cargo_nuevo where cod_rel='".$cod_rel."'";
				//var_dump($sql); die();
				$rs=$conn->Execute($sql);
				$i=0;
				
				if($rs->RecordCount() > 0){
				
					while($fila=$rs->FetchRow()){
				
						$sql2="update rel_cargo_nuevo set area='".$area[$i]."', cliente='".$cliente[$i]."', proveedor='".$proveedor[$i]."' where id_rel='".$fila['id_rel']."' ";
						
						$rs2=$conn->Execute($sql2);
						$i++;
						$tamano_sql=$fila['tamano_sql'];
				
				   }
				   
				    $tamano=sizeof($area);
					$diferencia= $tamano - $tamano_sql;
					$hasta= $i + $diferencia;
					
					if($diferencia > 0){
						
						for( $j=$i; $j<$hasta; $j++){

								$sql2="insert into rel_cargo_nuevo(cod_rel,area,cliente,proveedor,fecha)
										values(".$cod_rel.",'".$area[$j]."','".$cliente[$j]."','".$proveedor[$j]."','".$fecha."')";
													
								$rs2=$conn->Execute($sql2);
								
								if($rs2){
								
									return 1;
								
								}else{
								
									return 2;
								}
						
						}
					
					}else{
							 
							if($rs2){
								
								return 1;
							
							}else{
							
								return 2;
							}
					   
					   }
				
				}else{
				
					//insertar
					for( $j=0; $j<sizeof($area); $j++){

						$sql2="insert into rel_cargo_nuevo(cod_rel,area,cliente,proveedor,fecha)
										values(".$cod_rel.",'".$area[$j]."','".$cliente[$j]."','".$proveedor[$j]."','".$fecha."')";
											
						$rs=$conn->Execute($sql2);
						
					}
					
					if($rs){
					
						return 1;
					
					}else{
							
						return 2;
					}
				}
				
		}
		
		public function insert_desc_cargo_nuevo($cod_epl,$nom_car_nuevo,$ubicacion,$gerencia,$coordinacion,$cargo_hace,$cargo_como,$cargo_para,$cod_resp,$numero_pacientes1,
                       $numero_pacientes2,$cumplir_meta1,$numero_ventas1,$numero_ventas2,$cumplir_meta2,$numero_procedimientos1,$numero_procedimientos2,$cumplir_meta3,
					   $utilidad_neta1,$utilidad_neta2,$cumplir_meta4,$costos_gastos1,$costos_gastos2,$cumplir_meta5,$impacto_esperado,
					   $personas_cargo1,$personas_cargo2,$cumplir_meta6,$gastos_administrativos1,$gastos_administrativos2,$cumplir_meta7,
					   $presupuesto_area1,$presupuesto_area2,$cumplir_meta8,$actividades_no,$Impacto_esperado2,$fecha,$observaciones,$id_habilidad_actitud){

				try { 
				global $conn;
					
					$sql="insert into desc_cargo_nuevo(cod_epl, nom_car_nuevo, ubicacion, gerencia, coordinacion, q_hace, c_hace, p_hace, cod_resp, cod_rel, num_pac_dato_1, num_pac_dato_2,
							 num_pac_cumplir, vlr_ventas_dato_1, vlr_ventas_dato_2, vlr_ventas_cumplir, num_proc_dato_1, num_proc_dato_2, num_proc_cumplir, util_net_dato_1, util_net_dato_2,
							 util_net_cumplir, cost_gast_dato_1, cost_gast_dato_2, cost_gast_cumplr, impacto_esp_1, num_per_dato_1, num_per_dato_2, num_per_cumplir, indi_gasto_dato_1, indi_gasto_dato_2,
							 indi_gasto_cumplir, presp_tot_dato_1, presp_tot_dato_2, presp_tot_cumplir,  act_no_atendidas, impacto_esp_2, fecha_sol, observaciones, cod_hab_act ) values(
							 ".$cod_epl.",
							/*Pestaña: Perfil del cargo*/
							'".$nom_car_nuevo."','".$ubicacion."','".$gerencia."','".$coordinacion."',
							/*Pestaña : Proposito del cargo*/
							'".$cargo_hace."','".$cargo_como."','".$cargo_para."',
							/*Pestaña: Principales Responsabilidades del cargo*/
							".$cod_resp.",
							/*Pestaña: Relacion del puesto con otras areas*/
							".$cod_resp.",				
							/*Pestaña: Justificacion de la creacion del cargo*/
							'".$numero_pacientes1."','".$numero_pacientes2."', '".$cumplir_meta1."','".$numero_ventas1."','".$numero_ventas2."','".$cumplir_meta2."',
							'".$numero_procedimientos1."', '".$numero_procedimientos2."', '".$cumplir_meta3."', '".$utilidad_neta1."', '".$utilidad_neta2."',
							'".$cumplir_meta4."', '".$costos_gastos1."', '".$costos_gastos2."','".$cumplir_meta5."', '".$impacto_esperado."',
							/*Pestaña: Para procesos administrativos*/
							'".$personas_cargo1."', '".$personas_cargo2."','".$cumplir_meta6."','".$gastos_administrativos1."','".$gastos_administrativos2."','".$cumplir_meta7."',
							'".$presupuesto_area1."','".$presupuesto_area2."','".$cumplir_meta8."','".$actividades_no."','".$Impacto_esperado2."',
							/*Pestaña: otros*/
							'".$fecha."' ,'".$observaciones."',
							/*Pestaña: Habilidades y actitudes*/
							".$id_habilidad_actitud."
							)";		
							
					$conn->Execute($sql);
					
					
					$desc_cargo_nuevo=$conn->GetOne("SELECT LAST_INSERT_ID=@@IDENTITY");
					

					if($desc_cargo_nuevo){
						
						return $desc_cargo_nuevo;
					}else{
							
						return $desc_cargo_nuevo=null;
					}
	
				}catch (exception $e) { 

				   var_dump($e); 

				   adodb_backtrace($e->gettrace());

				} 
		
		}



		public function insert_desc_cargo_nuevoDos($cod_epl,$nom_car_nuevo,$ubicacion,$gerencia,$coordinacion,$cargo_hace,$cargo_como,$cargo_para,$cod_resp,$numero_pacientes1,
                       $numero_pacientes2,$cumplir_meta1,$numero_ventas1,$numero_ventas2,$cumplir_meta2,$numero_procedimientos1,$numero_procedimientos2,$cumplir_meta3,
					   $utilidad_neta1,$utilidad_neta2,$cumplir_meta4,$costos_gastos1,$costos_gastos2,$cumplir_meta5,$impacto_esperado,
					   $personas_cargo1,$personas_cargo2,$cumplir_meta6,$gastos_administrativos1,$gastos_administrativos2,$cumplir_meta7,
					   $presupuesto_area1,$presupuesto_area2,$cumplir_meta8,$actividades_no,$Impacto_esperado2,$fecha,$observaciones,$id_habilidad_actitud,$nom_car_sol,$num_per_car_sol,$desc_car_sol){

				try { 
				global $conn;
					
					$sql="insert into desc_cargo_nuevo(cod_epl, nom_car_nuevo, ubicacion, gerencia, coordinacion, q_hace, c_hace, p_hace, cod_resp, cod_rel, num_pac_dato_1, num_pac_dato_2,
							 num_pac_cumplir, vlr_ventas_dato_1, vlr_ventas_dato_2, vlr_ventas_cumplir, num_proc_dato_1, num_proc_dato_2, num_proc_cumplir, util_net_dato_1, util_net_dato_2,
							 util_net_cumplir, cost_gast_dato_1, cost_gast_dato_2, cost_gast_cumplr, impacto_esp_1, num_per_dato_1, num_per_dato_2, num_per_cumplir, indi_gasto_dato_1, indi_gasto_dato_2,
							 indi_gasto_cumplir, presp_tot_dato_1, presp_tot_dato_2, presp_tot_cumplir,  act_no_atendidas, impacto_esp_2, fecha_sol, observaciones, cod_hab_act, nom_car_sol, num_per_car_sol, desc_car_sol ) values(
							 ".$cod_epl.",
							/*Pestaña: Perfil del cargo*/
							'".$nom_car_nuevo."','".$ubicacion."','".$gerencia."','".$coordinacion."',
							/*Pestaña : Proposito del cargo*/
							'".$cargo_hace."','".$cargo_como."','".$cargo_para."',
							/*Pestaña: Principales Responsabilidades del cargo*/
							".$cod_resp.",
							/*Pestaña: Relacion del puesto con otras areas*/
							".$cod_resp.",				
							/*Pestaña: Justificacion de la creacion del cargo*/
							'".$numero_pacientes1."','".$numero_pacientes2."', '".$cumplir_meta1."','".$numero_ventas1."','".$numero_ventas2."','".$cumplir_meta2."',
							'".$numero_procedimientos1."', '".$numero_procedimientos2."', '".$cumplir_meta3."', '".$utilidad_neta1."', '".$utilidad_neta2."',
							'".$cumplir_meta4."', '".$costos_gastos1."', '".$costos_gastos2."','".$cumplir_meta5."', '".$impacto_esperado."',
							/*Pestaña: Para procesos administrativos*/
							'".$personas_cargo1."', '".$personas_cargo2."','".$cumplir_meta6."','".$gastos_administrativos1."','".$gastos_administrativos2."','".$cumplir_meta7."',
							'".$presupuesto_area1."','".$presupuesto_area2."','".$cumplir_meta8."','".$actividades_no."','".$Impacto_esperado2."',
							/*Pestaña: otros*/
							'".$fecha."' ,'".$observaciones."',
							/*Pestaña: Habilidades y actitudes*/
							".$id_habilidad_actitud.",
							/*nueva Pestaña cargo*/
							'".$nom_car_sol."',
							'".$num_per_car_sol."',
							'".$desc_car_sol."'
							)";	


							
					$conn->Execute($sql);
					
					
					$desc_cargo_nuevo=$conn->GetOne("SELECT LAST_INSERT_ID=@@IDENTITY");
					

					if($desc_cargo_nuevo){
						
						return $desc_cargo_nuevo;
					}else{
							
						return $desc_cargo_nuevo=null;
					}
	
				}catch (exception $e) { 

				   var_dump($e); 

				   adodb_backtrace($e->gettrace());

				} 
		
		}



		public function insert_desc_cargo_nuevoTres($numero_pacientes1,
                       $numero_pacientes2,$cumplir_meta1,$numero_ventas1,$numero_ventas2,$cumplir_meta2,$numero_procedimientos1,$numero_procedimientos2,$cumplir_meta3,
					   $utilidad_neta1,$utilidad_neta2,$cumplir_meta4,$costos_gastos1,$costos_gastos2,$cumplir_meta5,$impacto_esperado,
					   $personas_cargo1,$personas_cargo2,$cumplir_meta6,$gastos_administrativos1,$gastos_administrativos2,$cumplir_meta7,
					   $presupuesto_area1,$presupuesto_area2,$cumplir_meta8,$actividades_no,$Impacto_esperado2,$fecha,$observaciones,$nom_car_sol,$num_per_car_sol,$desc_car_sol){

				try { 
				global $conn;
					
					$sql="insert into desc_cargo_nuevo2(num_pac_dato_1, num_pac_dato_2,
							 num_pac_cumplir, vlr_ventas_dato_1, vlr_ventas_dato_2, vlr_ventas_cumplir, num_proc_dato_1, num_proc_dato_2, num_proc_cumplir, util_net_dato_1, util_net_dato_2,
							 util_net_cumplir, cost_gast_dato_1, cost_gast_dato_2, cost_gast_cumplr, impacto_esp_1, num_per_dato_1, num_per_dato_2, num_per_cumplir, indi_gasto_dato_1, indi_gasto_dato_2,
							 indi_gasto_cumplir, presp_tot_dato_1, presp_tot_dato_2, presp_tot_cumplir,  act_no_atendidas, impacto_esp_2, fecha_sol, observaciones,nom_car_sol, num_per_car_sol, desc_car_sol ) values(				
							/*Pestaña: Justificacion de la creacion del cargo*/
							'".$numero_pacientes1."','".$numero_pacientes2."', '".$cumplir_meta1."','".$numero_ventas1."','".$numero_ventas2."','".$cumplir_meta2."',
							'".$numero_procedimientos1."', '".$numero_procedimientos2."', '".$cumplir_meta3."', '".$utilidad_neta1."', '".$utilidad_neta2."',
							'".$cumplir_meta4."', '".$costos_gastos1."', '".$costos_gastos2."','".$cumplir_meta5."', '".$impacto_esperado."',
							/*Pestaña: Para procesos administrativos*/
							'".$personas_cargo1."', '".$personas_cargo2."','".$cumplir_meta6."','".$gastos_administrativos1."','".$gastos_administrativos2."','".$cumplir_meta7."',
							'".$presupuesto_area1."','".$presupuesto_area2."','".$cumplir_meta8."','".$actividades_no."','".$Impacto_esperado2."',
							/*Pestaña: otros*/
							'".$fecha."' ,'".$observaciones."',
							/*nueva Pestaña cargo*/
							'".$nom_car_sol."',
							'".$num_per_car_sol."',
							'".$desc_car_sol."'
							)";	
					


							
					$conn->Execute($sql);
					
					
					$desc_cargo_nuevo=$conn->GetOne("SELECT LAST_INSERT_ID=@@IDENTITY");

					

					if($desc_cargo_nuevo){
						
						return $desc_cargo_nuevo;
					}else{
							
						return $desc_cargo_nuevo=null;
					}
	
				}catch (exception $e) { 

				   var_dump($e); 

				   adodb_backtrace($e->gettrace());

				} 
		
		}
		
		
		
		
		public function edit_desc_cargo_nuevo($cod_epl,$nom_car_nuevo,$ubicacion,$gerencia,$coordinacion,$cargo_hace,$cargo_como,$cargo_para,$cod_resp,$cod_rel,$numero_pacientes1,
                       $numero_pacientes2,$cumplir_meta1,$numero_ventas1,$numero_ventas2,$cumplir_meta2,$numero_procedimientos1,$numero_procedimientos2,$cumplir_meta3,
					   $utilidad_neta1,$utilidad_neta2,$cumplir_meta4,$costos_gastos1,$costos_gastos2,$cumplir_meta5,$impacto_esperado,
					   $personas_cargo1,$personas_cargo2,$cumplir_meta6,$gastos_administrativos1,$gastos_administrativos2,$cumplir_meta7,
					   $presupuesto_area1,$presupuesto_area2,$cumplir_meta8,$actividades_no,$Impacto_esperado2,$fecha,$observaciones,$id_habilidad_actitud,$id_form){

				try { 
				global $conn;
					
					$sql="update desc_cargo_nuevo set
							cod_epl=".$cod_epl.",
							/*Pestaña: Perfil del cargo*/
							nom_car_nuevo='".$nom_car_nuevo."', ubicacion='".$ubicacion."', gerencia='".$gerencia."', coordinacion='".$coordinacion."',
							/*Pestaña : Proposito del cargo*/
							q_hace='".$cargo_hace."',c_hace='".$cargo_como."',p_hace='".$cargo_para."',
							/*Pestaña: Principales Responsabilidades del cargo*/
							cod_resp=".$cod_resp.",
							/*Pestaña: Relacion del puesto con otras areas*/
							cod_rel=".$cod_rel.",				
							/*Pestaña: Justificacion de la creacion del cargo*/
							num_pac_dato_1='".$numero_pacientes1."',num_pac_dato_2='".$numero_pacientes2."', num_pac_cumplir='".$cumplir_meta1."',vlr_ventas_dato_1='".$numero_ventas1."',vlr_ventas_dato_2='".$numero_ventas2."',vlr_ventas_cumplir='".$cumplir_meta2."',
							num_proc_dato_1='".$numero_procedimientos1."', num_proc_dato_2='".$numero_procedimientos2."', num_proc_cumplir='".$cumplir_meta3."',util_net_dato_1='".$utilidad_neta1."',util_net_dato_2='".$utilidad_neta2."',
							util_net_cumplir='".$cumplir_meta4."', cost_gast_dato_1='".$costos_gastos1."',cost_gast_dato_2='".$costos_gastos2."',cost_gast_cumplr='".$cumplir_meta5."',impacto_esp_1='".$impacto_esperado."',
							/*Pestaña: Para procesos administrativos*/
							num_per_dato_1='".$personas_cargo1."', num_per_dato_2='".$personas_cargo2."',num_per_cumplir='".$cumplir_meta6."',indi_gasto_dato_1='".$gastos_administrativos1."',indi_gasto_dato_2='".$gastos_administrativos2."',indi_gasto_cumplir='".$cumplir_meta7."',
							presp_tot_dato_1='".$presupuesto_area1."',presp_tot_dato_2='".$presupuesto_area2."',presp_tot_cumplir='".$cumplir_meta8."',act_no_atendidas='".$actividades_no."',impacto_esp_2='".$Impacto_esperado2."',
							/*Pestaña: otros*/
							fecha_sol='".$fecha."' ,observaciones='".$observaciones."',
							/*Pestaña: Habilidades y actitudes*/
							cod_hab_act=".$id_habilidad_actitud." where id_form=".$id_form."
							";		
							
					$rs=$conn->Execute($sql);
					
					if($rs){
						
						return 1;
					}else{
							
						return 2;
					}
	
				}catch (exception $e) { 

				   var_dump($e); 

				   adodb_backtrace($e->gettrace());

				} 
		
		}


		public function edit_desc_cargo_nuevoDos($numero_pacientes1,
                       $numero_pacientes2,$cumplir_meta1,$numero_ventas1,$numero_ventas2,$cumplir_meta2,$numero_procedimientos1,$numero_procedimientos2,$cumplir_meta3,
					   $utilidad_neta1,$utilidad_neta2,$cumplir_meta4,$costos_gastos1,$costos_gastos2,$cumplir_meta5,$impacto_esperado,
					   $personas_cargo1,$personas_cargo2,$cumplir_meta6,$gastos_administrativos1,$gastos_administrativos2,$cumplir_meta7,
					   $presupuesto_area1,$presupuesto_area2,$cumplir_meta8,$actividades_no,$Impacto_esperado2,$fecha,$observaciones,$nom_car_sol,$num_per_car_sol,$desc_car_sol,$id_form){

				try { 
				global $conn;
					
					$sql="update desc_cargo_nuevo2 set
							num_pac_dato_1='".$numero_pacientes1."',num_pac_dato_2='".$numero_pacientes2."', num_pac_cumplir='".$cumplir_meta1."',vlr_ventas_dato_1='".$numero_ventas1."',vlr_ventas_dato_2='".$numero_ventas2."',vlr_ventas_cumplir='".$cumplir_meta2."',
							num_proc_dato_1='".$numero_procedimientos1."', num_proc_dato_2='".$numero_procedimientos2."', num_proc_cumplir='".$cumplir_meta3."',util_net_dato_1='".$utilidad_neta1."',util_net_dato_2='".$utilidad_neta2."',
							util_net_cumplir='".$cumplir_meta4."', cost_gast_dato_1='".$costos_gastos1."',cost_gast_dato_2='".$costos_gastos2."',cost_gast_cumplr='".$cumplir_meta5."',impacto_esp_1='".$impacto_esperado."',
							/*Pestaña: Para procesos administrativos*/
							num_per_dato_1='".$personas_cargo1."', num_per_dato_2='".$personas_cargo2."',num_per_cumplir='".$cumplir_meta6."',indi_gasto_dato_1='".$gastos_administrativos1."',indi_gasto_dato_2='".$gastos_administrativos2."',indi_gasto_cumplir='".$cumplir_meta7."',
							presp_tot_dato_1='".$presupuesto_area1."',presp_tot_dato_2='".$presupuesto_area2."',presp_tot_cumplir='".$cumplir_meta8."',act_no_atendidas='".$actividades_no."',impacto_esp_2='".$Impacto_esperado2."',
							/*Pestaña: otros*/
							fecha_sol='".$fecha."' ,observaciones='".$observaciones."',
							/*nueva Pestaña cargo*/
							nom_car_sol='".$nom_car_sol."',
							num_per_car_sol='".$num_per_car_sol."',
							desc_car_sol='".$desc_car_sol."'
							where id_form=".$id_form."
							";		
					
					$rs=$conn->Execute($sql);
					
					if($rs){
						
						return 1;
					}else{
							
						return 2;
					}
	
				}catch (exception $e) { 

				   var_dump($e); 

				   adodb_backtrace($e->gettrace());

				} 
		
		}


		public function edit_desc_cargo_nuevoTres($cod_epl,$nom_car_nuevo,$ubicacion,$gerencia,$coordinacion,$cargo_hace,$cargo_como,$cargo_para,$cod_resp,$cod_rel,$numero_pacientes1,
                       $numero_pacientes2,$cumplir_meta1,$numero_ventas1,$numero_ventas2,$cumplir_meta2,$numero_procedimientos1,$numero_procedimientos2,$cumplir_meta3,
					   $utilidad_neta1,$utilidad_neta2,$cumplir_meta4,$costos_gastos1,$costos_gastos2,$cumplir_meta5,$impacto_esperado,
					   $personas_cargo1,$personas_cargo2,$cumplir_meta6,$gastos_administrativos1,$gastos_administrativos2,$cumplir_meta7,
					   $presupuesto_area1,$presupuesto_area2,$cumplir_meta8,$actividades_no,$Impacto_esperado2,$fecha,$observaciones,$id_habilidad_actitud,$id_form,$nom_car_sol,$num_per_car_sol,$desc_car_sol){

				try { 
				global $conn;
					
					$sql="update desc_cargo_nuevo set
							cod_epl=".$cod_epl.",
							/*Pestaña: Perfil del cargo*/
							nom_car_nuevo='".$nom_car_nuevo."', ubicacion='".$ubicacion."', gerencia='".$gerencia."', coordinacion='".$coordinacion."',
							/*Pestaña : Proposito del cargo*/
							q_hace='".$cargo_hace."',c_hace='".$cargo_como."',p_hace='".$cargo_para."',
							/*Pestaña: Principales Responsabilidades del cargo*/
							cod_resp=".$cod_resp.",
							/*Pestaña: Relacion del puesto con otras areas*/
							cod_rel=".$cod_rel.",				
							/*Pestaña: Justificacion de la creacion del cargo*/
							num_pac_dato_1='".$numero_pacientes1."',num_pac_dato_2='".$numero_pacientes2."', num_pac_cumplir='".$cumplir_meta1."',vlr_ventas_dato_1='".$numero_ventas1."',vlr_ventas_dato_2='".$numero_ventas2."',vlr_ventas_cumplir='".$cumplir_meta2."',
							num_proc_dato_1='".$numero_procedimientos1."', num_proc_dato_2='".$numero_procedimientos2."', num_proc_cumplir='".$cumplir_meta3."',util_net_dato_1='".$utilidad_neta1."',util_net_dato_2='".$utilidad_neta2."',
							util_net_cumplir='".$cumplir_meta4."', cost_gast_dato_1='".$costos_gastos1."',cost_gast_dato_2='".$costos_gastos2."',cost_gast_cumplr='".$cumplir_meta5."',impacto_esp_1='".$impacto_esperado."',
							/*Pestaña: Para procesos administrativos*/
							num_per_dato_1='".$personas_cargo1."', num_per_dato_2='".$personas_cargo2."',num_per_cumplir='".$cumplir_meta6."',indi_gasto_dato_1='".$gastos_administrativos1."',indi_gasto_dato_2='".$gastos_administrativos2."',indi_gasto_cumplir='".$cumplir_meta7."',
							presp_tot_dato_1='".$presupuesto_area1."',presp_tot_dato_2='".$presupuesto_area2."',presp_tot_cumplir='".$cumplir_meta8."',act_no_atendidas='".$actividades_no."',impacto_esp_2='".$Impacto_esperado2."',
							/*pestaña nuevo cargo*/
							nom_car_sol='".$nom_car_sol."',
							num_per_car_sol='".$num_per_car_sol."',
							desc_car_sol='".$desc_car_sol."'
							where id_form=".$id_form."
							";	

							
					$rs=$conn->Execute($sql);
					
					if($rs){
						
						return 1;
					}else{
							
						return 2;
					}
	
				}catch (exception $e) { 

				   var_dump($e); 

				   adodb_backtrace($e->gettrace());

				} 
		
		}



		public function get_solcitudNuevaPlazaPendientes($jefe){
			
			try { 

				global $conn;

				$sql="select id_form,cod_form, cod_epl_jefe, RTRIM(nom_epl)+' '+RTRIM(ape_epl) as nombres, observaciones, nom_car_solicitado, personas, sol.estado, 
				convert(varchar,sol.fecha,105)as fecha  from sol_req_ext_tmp3 sol, empleados_basic emp 
				where cod_epl=cod_epl_jefe and  sol.estado ='P' and cod_epl_jefe='".$jefe."'";
				$rs=$conn->Execute($sql);
				
				while($fila=$rs->FetchRow()){
					$this->lista[]=array("id_form" => $fila["id_form"],
										 "cod_form" => $fila["cod_form"],
									     "cod_epl_jefe" => $fila["cod_epl_jefe"],
									     "nombres" => $fila["nombres"],
									     "observaciones" => $fila["observaciones"],
									     "nom_car_solicitado" => $fila["nom_car_solicitado"],
									     "personas"=>$fila["personas"],
									     "fecha_sol"=>utf8_encode($fila["fecha"]),
									   );
				}
			
				return $this->lista;
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}

		public function get_solcitudNuevaPlazaRechazadas($jefe){
		
			
			try { 

				global $conn;
				
				$sql="select id_form,cod_form, cod_epl_jefe, RTRIM(nom_epl)+' '+RTRIM(ape_epl) as nombres, observaciones, nom_car_solicitado, personas, sol.estado, 
					convert(varchar,sol.fecha,105)as fecha  from sol_req_ext_tmp3 sol, empleados_basic emp 
					where cod_epl=cod_epl_jefe and  sol.estado ='R' and  cod_epl_jefe='".$jefe."'";

				//var_dump($sql);die();
				
				
				$rs=$conn->Execute($sql);
				
				
				
				while($fila=$rs->FetchRow()){
					$this->lista[]=array("id_form" => $fila["id_form"],
										 "cod_form" => $fila["cod_form"],
									     "cod_epl_jefe" => $fila["cod_epl_jefe"],
									     "nombres" => $fila["nombres"],
									     "observaciones" => $fila["observaciones"],
									     "nom_car_solicitado" => $fila["nom_car_solicitado"],
									     "personas"=>$fila["personas"],
									     "fecha_sol"=>utf8_encode($fila["fecha"]),
									   );
				}
			
				return $this->lista;
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}
		
		public function get_solcitudNuevoCargo($jefe){
		
			
			try { 
				global $conn;
				$sql="select id_form,cod_form,nom_car_nuevo, ubicacion, convert(varchar,fecha,105)as fecha  from sol_req_ext_tmp2 where estado ='P' and cod_epl_jefe='".$jefe."' ";
				
				
				//var_dump($sql);die("DEATH");
				
				
				$rs=$conn->Execute($sql);
				
				while($fila=$rs->FetchRow()){
					$this->lista[]=array("id_form" => $fila["id_form"],
										 "cod_form" => $fila["cod_form"],
									     "nom_car_nuevo" => $fila["nom_car_nuevo"],
									     "ubicacion"=>$fila["ubicacion"],
									     "fecha_sol"=>utf8_encode($fila["fecha"]),
									   );
				}
			
				return $this->lista;
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}
		
		public function get_solcitudNuevoCargoRechazadas($jefe){
			
			try { 
				global $conn;
				$sql="select id_form,cod_form,nom_car_nuevo, ubicacion, convert(varchar,fecha,105)as fecha,observaciones  from sol_req_ext_tmp2 where estado ='R' and cod_epl_jefe='".$jefe."'";
				$rs=$conn->Execute($sql);
				
				while($fila=$rs->FetchRow()){
					$this->lista[]=array("id_form" => $fila["id_form"],
										 "cod_form" => $fila["cod_form"],
									     "nom_car_nuevo" => $fila["nom_car_nuevo"],
									     "ubicacion"=>$fila["ubicacion"],
									     "fecha_sol"=>utf8_encode($fila["fecha"]),
										 "observaciones"=>$fila["observaciones"]
									   );
				}
			
				return $this->lista;
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}
		
		public function get_solcitudInterna($jefe){
			
			try { 
				global $conn;
				$sql="select distinct interna.id, cc2.nom_cc2, car.nom_car, interna.cod_epl_jefe,(select rtrim(nom_epl)+' '+rtrim(ape_epl) as nombre from empleados_basic where cod_epl=interna.cod_epl_jefe)as jefe,
					convert(varchar,interna.fec_sol,105)as fec_sol ,(select rtrim(nom_epl)+' '+rtrim(ape_epl) as nombre from empleados_basic where cod_epl=interna.reemp) as reemplazo_a,interna.motivo, sol.estado
					from req_Interna as interna, centrocosto2 as cc2, cargos as car, sol_req_int_tmp  as sol
					where interna.cod_cc2=cc2.cod_cc2 and interna.cod_car=car.cod_car and interna.id=sol.cod_form and sol.estado='P' and interna.cod_epl_jefe='".$jefe."'";
				$rs=$conn->Execute($sql);
				
				while($fila=$rs->FetchRow()){
					$this->lista[]=array("id" => $fila["id"],
										 "nom_cc2" => $fila["nom_cc2"],
									     "nom_car" => $fila["nom_car"],
									     "jefe"=>utf8_encode($fila["jefe"]),
										 "cod_epl_jefe"=>$fila["cod_epl_jefe"],
										 "fec_sol"=> $fila["fec_sol"],
									     "reemplazo_a"=>utf8_encode($fila["reemplazo_a"]),
										 "motivo"=>$fila["motivo"],
									   );
				}
			
				return $this->lista;
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		
		}
		
		public function get_solcitudInternaRechazadas($jefe){
			
			try { 
				global $conn;
				$sql="select distinct interna.id, cc2.nom_cc2, car.nom_car, interna.cod_epl_jefe,(select nom_epl from empleados_basic where cod_epl=interna.cod_epl_jefe)as jefe,
					convert(varchar,interna.fec_sol,105)as fec_sol ,(select nom_epl from empleados_basic where cod_epl=interna.reemp) as reemplazo_a,interna.motivo, sol.estado, sol.observaciones
					from req_Interna as interna, centrocosto2 as cc2, cargos as car, sol_req_int_tmp  as sol
					where interna.cod_cc2=cc2.cod_cc2 and interna.cod_car=car.cod_car and interna.id=sol.cod_form and sol.estado='R' and interna.cod_epl_jefe='".$jefe."'";
				$rs=$conn->Execute($sql);
				
				while($fila=$rs->FetchRow()){
					$this->lista[]=array("id" => $fila["id"],
										 "nom_cc2" => $fila["nom_cc2"],
									     "nom_car" => $fila["nom_car"],
									     "jefe"=>utf8_encode($fila["jefe"]),
										 "cod_epl_jefe"=>$fila["cod_epl_jefe"],
										 "fec_sol"=> $fila["fec_sol"],
									     "reemplazo_a"=>utf8_encode($fila["reemplazo_a"]),
										 "motivo"=>$fila["motivo"],
										 "observaciones"=>$fila["observaciones"]);
				}
			
				return $this->lista;
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		
		}
		
		public function get_solcitudInternaConfirmadas($jefe){
			
			try { 
				global $conn;
				$sql="select distinct interna.id, cc2.nom_cc2, car.nom_car, interna.cod_epl_jefe,(select nom_epl from empleados_basic where cod_epl=interna.cod_epl_jefe)as jefe,
					convert(varchar,interna.fec_sol,105)as fec_sol ,(select nom_epl from empleados_basic where cod_epl=interna.reemp) as reemplazo_a,interna.motivo, sol.estado, sol.observaciones
					from req_Interna as interna, centrocosto2 as cc2, cargos as car, sol_req_int_tmp  as sol
					where interna.cod_cc2=cc2.cod_cc2 and interna.cod_car=car.cod_car and interna.id=sol.cod_form and (sol.estado='A' or sol.estado='AP') and interna.cod_epl_jefe='".$jefe."'";
			
				
				//var_dump($sql);die("DEATH");
				
				
				$rs=$conn->Execute($sql);
				
				while($fila=$rs->FetchRow()){
					$this->lista[]=array("id" => $fila["id"],
										 "nom_cc2" => $fila["nom_cc2"],
									     "nom_car" => $fila["nom_car"],
									     "jefe"=>utf8_encode($fila["jefe"]),
										 "cod_epl_jefe"=>$fila["cod_epl_jefe"],
										 "fec_sol"=> $fila["fec_sol"],
									     "reemplazo_a"=>utf8_encode($fila["reemplazo_a"]),
										 "motivo"=>$fila["motivo"],
										 "observaciones"=>$fila["observaciones"]);
				}
			
				return $this->lista;
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		
		}
		
		public function get_formRequisicionInterna($id){
			
			try { 
				global $conn;
				
				   

					$sql="select interna.id,interna.cod_cc2,cc2.nom_cc2,interna.cod_car,car.nom_car,interna.cod_epl_jefe,interna.num_select_reemp,
						(select rtrim(nom_epl)+' '+rtrim(ape_epl) as nombre 
						from empleados_basic 
						where cod_epl=interna.cod_epl_jefe)as jefe, 
						convert(varchar,interna.fec_sol,105)as 
						fec_sol ,interna.reemp,(select rtrim(nom_epl)+' '+rtrim(ape_epl) as nombre 
						from empleados_basic where cod_epl=interna.reemp) as reemplazo_a, 
						convert(varchar,interna.fec_inicio_ent,105)as fec_inicio_ent, 
						convert(varchar,interna.fec_fin_ent,105)as fec_fin_ent, 
						convert(varchar,interna.fec_inicio_lab,105)as fec_inicio_lab,
						convert(varchar,interna.fec_fin_lab,105)as fec_fin_lab,
						interna.sugerencia,interna.sugerencia_persona as cod_sugerencia,(select rtrim(nom_epl)+' '+rtrim(ape_epl) as nombre 
						from empleados_basic 
						where cod_epl=interna.sugerencia_persona)as nom_sugerencia,interna.motivo, 
						interna.motivo_ausencia from req_Interna as interna, 
						centrocosto2 as cc2, cargos as car where interna.cod_cc2=cc2.cod_cc2 and interna.cod_car=car.cod_car and interna.id=".$id."";





						
						$rs=$conn->Execute($sql);
				
						while($fila=$rs->FetchRow()){
							$this->lista[]=array("id" => $fila["id"],
												 "cod_cc2" => $fila["cod_cc2"],
												 "nom_cc2" => $fila["nom_cc2"],
												 "cod_car" => $fila["cod_car"],
												 "nom_car" => $fila["nom_car"],
												 "cod_epl_jefe" => $fila["cod_epl_jefe"],
												 "jefe"=>utf8_encode($fila["jefe"]),
												 "fec_sol"=> $fila["fec_sol"],
												 "reemp"=>$fila["reemp"],
												 "reemplazo_a"=>utf8_encode($fila["reemplazo_a"]),
												 "fec_inicio_ent"=>$fila["fec_inicio_ent"],
												 "fec_fin_ent"=>$fila["fec_fin_ent"],
												 "fec_inicio_lab"=>$fila["fec_inicio_lab"],
												 "fec_fin_lab"=>$fila["fec_fin_lab"],
												 "sugerencia"=>$fila["sugerencia"],
												 "cod_sugerencia"=>$fila["cod_sugerencia"],
												 "nom_sugerencia"=>$fila["nom_sugerencia"],
												 "motivo"=>$fila["motivo"],
												 "motivo_ausencia"=>$fila["motivo_ausencia"],
												 "num_select_reemp"=>$fila["num_select_reemp"]);
						}
				
				
						return $this->lista;
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		}

		
		public function getPersona($codigo){
			
			try { 
				global $conn;
				
					$sql="select  rtrim(nom_epl)+' '+rtrim(ape_epl) as nombres from empleados_basic where cod_epl='".$codigo."' ";
						
						$rs=$conn->Execute($sql);
				
						while($fila=$rs->FetchRow()){
							$this->lista[]=array("nombres" => $fila["nombres"]);
						}
				
				
						return $this->lista;
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		
		}
		
		public function get_formRequisicionNuevoCargo($id_form,$cod_form){
			
			
			
			try { 
				global $conn;
                $sql="select req.id, req.cod_form,  req.motivo, convert(varchar,req.fec_ini_ent,105)as fec_ini_ent,
					convert(varchar,req.fec_fin_ent,105)as fec_fin_ent, convert(varchar,req.fec_ini_lab,105)as fec_ini_lab,
					convert(varchar,req.fec_fin_lab,105)as fec_fin_lab,req.cod_epl_jefe, convert(varchar,req.fec_sol,105)as req_fec_sol,
					descc.id_form, descc.cod_epl, descc.nom_car_nuevo, descc.ubicacion, descc.gerencia, descc.coordinacion, descc.q_hace, descc.c_hace,
					descc.p_hace, descc.cod_resp,descc.cod_rel,descc.num_pac_dato_1, descc.num_pac_dato_2, descc.num_pac_cumplir, descc.vlr_ventas_dato_1, descc.vlr_ventas_dato_2,
					descc.vlr_ventas_cumplir,descc.num_proc_dato_1, descc.num_proc_dato_2, descc.num_proc_cumplir, descc.util_net_dato_1, descc.util_net_dato_2, descc.util_net_cumplir,
					descc.cost_gast_dato_1, descc.cost_gast_dato_2, descc.cost_gast_cumplr, descc.impacto_esp_1,descc.num_per_dato_1,descc.num_per_dato_2,descc.num_per_cumplir,
					descc.indi_gasto_dato_1,descc.indi_gasto_dato_2,descc.indi_gasto_cumplir,descc.presp_tot_dato_1,descc.presp_tot_dato_2,descc.presp_tot_cumplir,descc.act_no_atendidas,descc.impacto_esp_2,convert(varchar,descc.fecha_sol,105)as des_fec_sol, descc.nom_car_sol, descc.num_per_car_sol, descc.desc_car_sol
					from req_nuevo_cargo2 as req, desc_cargo_nuevo descc
					where req.cod_form=descc.id_form and req.id='".$id_form."' and descc.id_form='".$cod_form."'";
					
					

					
				$rs=$conn->Execute($sql);
				
				while($fila=$rs->FetchRow()){
					$this->lista[]=array("id_form" => $fila["id"],
										 "cod_form" => $fila["cod_form"],
										 "motivo"=>$fila["motivo"],
										 "fec_ini_ent"=>$fila["fec_ini_ent"],
										 "fec_fin_ent"=>$fila["fec_fin_ent"],
										 "fec_ini_lab"=>$fila["fec_ini_lab"],
										 "fec_fin_lab"=>$fila["fec_fin_lab"],
										 "cod_epl_jefe"=>$fila["cod_epl_jefe"],
										 "req_fec_sol"=>$fila["req_fec_sol"],
										 "id_form"=>$fila["id_form"],
										 "cod_epl"=>$fila["cod_epl"],
										 "nom_car_nuevo"=>$fila["nom_car_nuevo"],
										 "ubicacion"=>$fila["ubicacion"],
										 "gerencia"=>$fila["gerencia"],
										 "coordinacion"=>$fila["coordinacion"],
										 "q_hace"=>$fila["q_hace"],
										 "c_hace"=>$fila["c_hace"],
										 "p_hace"=>$fila["p_hace"],
										 "cod_resp"=>$fila["cod_resp"],
										 "cod_rel"=>$fila["cod_rel"],
										 "num_pac_dato_1"=>$fila["num_pac_dato_1"],
										 "num_pac_dato_2"=>$fila["num_pac_dato_2"],
										 "num_pac_cumplir"=>$fila["num_pac_cumplir"],
										 "vlr_ventas_dato_1"=>$fila["vlr_ventas_dato_1"],
										 "vlr_ventas_dato_2"=>$fila["vlr_ventas_dato_2"],
										 "vlr_ventas_cumplir"=>$fila["vlr_ventas_cumplir"],
										 "num_proc_dato_1"=>$fila["num_proc_dato_1"],
										 "num_proc_dato_2"=>$fila["num_proc_dato_2"],
										 "num_proc_cumplir"=>$fila["num_proc_cumplir"],
										 "util_net_dato_1"=>$fila["util_net_dato_1"],
										 "util_net_dato_2"=>$fila["util_net_dato_2"],
										 "util_net_cumplir"=>$fila["util_net_cumplir"],
										 "cost_gast_dato_1"=>$fila["cost_gast_dato_1"],
										 "cost_gast_dato_2"=>$fila["cost_gast_dato_2"],
										 "cost_gast_cumplr"=>$fila["cost_gast_cumplr"],
										 "impacto_esp_1"=>$fila["impacto_esp_1"],
										 "num_per_dato_1"=>$fila["num_per_dato_1"],
										 "num_per_dato_2"=>$fila["num_per_dato_2"],
										 "num_per_cumplir"=>$fila["num_per_cumplir"],
										 "indi_gasto_dato_1"=>$fila["indi_gasto_dato_1"],
										 "indi_gasto_dato_2"=>$fila["indi_gasto_dato_2"],
										 "indi_gasto_cumplir"=>$fila["indi_gasto_cumplir"],
										 "presp_tot_dato_1"=>$fila["presp_tot_dato_1"],
										 "presp_tot_dato_2"=>$fila["presp_tot_dato_2"],
									     "presp_tot_cumplir"=>$fila["presp_tot_cumplir"],
										 "act_no_atendidas"=>$fila["act_no_atendidas"],
										 "impacto_esp_2"=>$fila["impacto_esp_2"],
										 "des_fec_sol"=>$fila["des_fec_sol"],
										 "nom_car_sol"=>$fila["nom_car_sol"],
										 "num_per_car_sol"=>$fila["num_per_car_sol"],
										 "desc_car_sol"=>$fila["desc_car_sol"]
									   );
				}
			
				return $this->lista;
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		
		}



		public function get_formRequisicionNuevaPlaza($id_form,$cod_form){
			
			
			
			try { 
				global $conn;

                $sql="select req.id, req.cod_form,req.motivo, convert(varchar,req.fec_ini_ent,105)as fec_ini_ent,
					convert(varchar,req.fec_fin_ent,105)as fec_fin_ent, convert(varchar,req.fec_ini_lab,105)as fec_ini_lab,
					convert(varchar,req.fec_fin_lab,105)as fec_fin_lab,req.cod_epl_jefe, convert(varchar,req.fec_sol,105)as req_fec_sol,
					descc.id_form, descc.num_pac_dato_1, descc.num_pac_dato_2, descc.num_pac_cumplir, descc.vlr_ventas_dato_1, descc.vlr_ventas_dato_2,
					descc.vlr_ventas_cumplir,descc.num_proc_dato_1, descc.num_proc_dato_2, descc.num_proc_cumplir, descc.util_net_dato_1, descc.util_net_dato_2, descc.util_net_cumplir,
					descc.cost_gast_dato_1, descc.cost_gast_dato_2, descc.cost_gast_cumplr, descc.impacto_esp_1,descc.num_per_dato_1,descc.num_per_dato_2,descc.num_per_cumplir,
					descc.indi_gasto_dato_1,descc.indi_gasto_dato_2,descc.indi_gasto_cumplir,descc.presp_tot_dato_1,descc.presp_tot_dato_2,descc.presp_tot_cumplir,descc.act_no_atendidas,descc.impacto_esp_2,convert(varchar,descc.fecha_sol,105)as des_fec_sol,
					nom_car_sol, num_per_car_sol, desc_car_sol
					from req_nuevo_cargo3 as req, desc_cargo_nuevo2 descc
					where req.cod_form=descc.id_form and req.id='".$id_form."' and descc.id_form='".$cod_form."'";
					
				$rs=$conn->Execute($sql);
				
				while($fila=$rs->FetchRow()){
					$this->lista[]=array("id_form" => $fila["id"],
										 "motivo"=>$fila["motivo"],
										 "fec_ini_ent"=>$fila["fec_ini_ent"],
										 "fec_fin_ent"=>$fila["fec_fin_ent"],
										 "fec_ini_lab"=>$fila["fec_ini_lab"],
										 "fec_fin_lab"=>$fila["fec_fin_lab"],
										 "cod_epl_jefe"=>$fila["cod_epl_jefe"],
										 "req_fec_sol"=>$fila["req_fec_sol"],
										 "id_form"=>$fila["id_form"],
										 "nom_car_sol"=>$fila["nom_car_sol"],
										 "num_per_car_sol"=>$fila["num_per_car_sol"],
										 "desc_car_sol"=>$fila["desc_car_sol"],
										 "num_pac_dato_1"=>$fila["num_pac_dato_1"],
										 "num_pac_dato_2"=>$fila["num_pac_dato_2"],
										 "num_pac_cumplir"=>$fila["num_pac_cumplir"],
										 "vlr_ventas_dato_1"=>$fila["vlr_ventas_dato_1"],
										 "vlr_ventas_dato_2"=>$fila["vlr_ventas_dato_2"],
										 "vlr_ventas_cumplir"=>$fila["vlr_ventas_cumplir"],
										 "num_proc_dato_1"=>$fila["num_proc_dato_1"],
										 "num_proc_dato_2"=>$fila["num_proc_dato_2"],
										 "num_proc_cumplir"=>$fila["num_proc_cumplir"],
										 "util_net_dato_1"=>$fila["util_net_dato_1"],
										 "util_net_dato_2"=>$fila["util_net_dato_2"],
										 "util_net_cumplir"=>$fila["util_net_cumplir"],
										 "cost_gast_dato_1"=>$fila["cost_gast_dato_1"],
										 "cost_gast_dato_2"=>$fila["cost_gast_dato_2"],
										 "cost_gast_cumplr"=>$fila["cost_gast_cumplr"],
										 "impacto_esp_1"=>$fila["impacto_esp_1"],
										 "num_per_dato_1"=>$fila["num_per_dato_1"],
										 "num_per_dato_2"=>$fila["num_per_dato_2"],
										 "num_per_cumplir"=>$fila["num_per_cumplir"],
										 "indi_gasto_dato_1"=>$fila["indi_gasto_dato_1"],
										 "indi_gasto_dato_2"=>$fila["indi_gasto_dato_2"],
										 "indi_gasto_cumplir"=>$fila["indi_gasto_cumplir"],
										 "presp_tot_dato_1"=>$fila["presp_tot_dato_1"],
										 "presp_tot_dato_2"=>$fila["presp_tot_dato_2"],
									     "presp_tot_cumplir"=>$fila["presp_tot_cumplir"],
										 "act_no_atendidas"=>$fila["act_no_atendidas"],
										 "impacto_esp_2"=>$fila["impacto_esp_2"],
										 "des_fec_sol"=>$fila["des_fec_sol"]
									   );
				}
			
				return $this->lista;
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		
		}

		
		public function get_cargosID($id){
		
			try { 
				global $conn;
				$sql="select nom_car from cargos where cod_car='".$id."'";
				$rs=$conn->Execute($sql);
				if($rs->RecordCount() > 0){
				
					return 1;
				
				}else{
				
					return 2;
				}
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}
		
		
		public function get_resp_cargo_id($cod_resp){
		
			try {

				global $conn;
				$sql="select id_resp,cod_resp,funcion,porcentaje,q_hace,c_hace,p_hace,convert(varchar,fecha,105)as fecha from resp_cargo_nuevo where cod_resp='".$cod_resp."' ORDER BY id_resp asc";
				$rs=$conn->Execute($sql);
				while($fila=$rs->FetchRow()){
					
					$this->lista[]=array(
						 "id_resp"=>$fila["id_resp"],
						 "cod_resp"=>$fila["cod_resp"],
						 "funcion"=>$fila["funcion"],
						 "porcentaje"=>$fila["porcentaje"],
						 "q_hace"=>$fila["q_hace"],
						 "c_hace"=>$fila["c_hace"],
						 "p_hace"=>$fila["p_hace"],
						 "fecha"=>$fila["fecha"]
					);
				}
				
				return $this->lista;
			
			}catch (exception $e) {
				
				 var_dump($e); 

			   adodb_backtrace($e->gettrace());
			}
		
		
		} 
		
		public function get_rel_cargo_id($cod_rel){
		
			try {

				global $conn;
				$sql="select id_rel,cod_rel,area,cliente,proveedor,convert(varchar,fecha,105)as fecha from rel_cargo_nuevo where cod_rel='".$cod_rel."'";
				$rs=$conn->Execute($sql);
				while($fila=$rs->FetchRow()){
					
					$this->lista[]=array(
						 "id_rel"=>$fila["id_rel"],
						 "cod_rel"=>$fila["cod_rel"],
						 "area"=>$fila["area"],
						 "cliente"=>$fila["cliente"],
						 "proveedor"=>$fila["proveedor"],
						 "fecha"=>$fila["fecha"],
					);
				}
				
				return $this->lista;
			
			}catch (exception $e) {
				
				 var_dump($e); 

			   adodb_backtrace($e->gettrace());
			}
		
		
		}
		
		public function getConceptosId($concepto){
			
			try {

				global $conn;
				$sql="select nom_con from conceptos where cod_con=".$concepto."";
				$rs=$conn->Execute($sql);
				$fila=$rs->FetchRow();
				
				return $fila["nom_con"];
				
			
			}catch (exception $e) {
				
				 var_dump($e); 

			   adodb_backtrace($e->gettrace());
			}

		}

		public function get_dias($fecha, $reemplazo, $ausencia){


			try {

				global $conn;

				$sql="select dias from ausencias a, conceptos_ayu b 
					where a.cod_con=b.cod_con and a.fec_ini>'$fecha'
					and a.cod_epl='".$reemplazo."' and a.cod_con='".$ausencia."' and tabla = 'ausencias'";
				
				//var_dump($sql);

				$rs=$conn->Execute($sql);
				$fila=$rs->FetchRow();
				
				return $fila["dias"];
				
			
			}catch (exception $e) {
				
				 var_dump($e); 

			   adodb_backtrace($e->gettrace());
			}

		}


		public function select_empleados(){
		
			try {

				global $conn;
				$sql="select cod_epl, rtrim(nom_epl)+' '+rtrim(ape_epl) as nombre
					 from empleados_basic where estado='A'";
				$rs=$conn->Execute($sql);
				while($fila=$rs->FetchRow()){
					
					$this->lista[]=array(
						 "nombres"=>$fila["nombre"],
						 "cod_epl"=>$fila["cod_epl"]);
				}
				
				return $this->lista;
			
			}catch (exception $e) {
				
				 var_dump($e); 

			   adodb_backtrace($e->gettrace());
			}
		
		
		}

	}