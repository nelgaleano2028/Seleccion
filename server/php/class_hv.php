<?php
	require_once("../librerias/lib/connection.php");
	
	
	class hv_pdf{
		
		private $lista=array();
		
		public function get_sp_hv_basic($cedula){
			
			

			try { 
				global $conn;

				$sql="select a.cod_asp, a.FECHA_HV_ASP, a.nom_asp, a.ape_asp, a.num_doc_asp, a.ciu_doc_asp,b.cod_ciu, 
						b.nom_ciu as ciudad_uno, a.sexo_asp, a.peso_asp, a.tipo_doc_asp, a.lib_mil_asp, 
						a.clase_lib_asp, a.dist_lib_asp, a.lic_con_asp, a.cat_lic_con, convert(varchar,a.vto_lcon_asp,105)as vto_lcon_asp , 
						convert(varchar,a.fec_nac_asp,105)as fec_nac_asp, a.ciu_nac_asp, c.nom_ciu as ciudad_dos, a.dir_asp, 
						a.cod_ciu_asp, d.nom_ciu as ciudad_tres, a.telefono_asp, a.celular_asp,
						a.dir_alt_asp, a.telef_alt_asp, a.email_asp, a.cod_pro_asp,
						a.anos_exp_asp, a.tarj_prof_asp, g.cod_civ, a.cod_bar_asp, 
						g.est_civ, a.anteojos_asp, a.estatura_asp, a.trab_act_asp, a.emp_act_asp,
						a.tipo_empl_asp, a.tipo_cont_asp, a.vinc_ant_asp, a.sol_ant_asp,
						a.fec_ant_asp, a.recom_epl, a.cod_recom_asp, a.fam_emp, a.epl_par_asp, a.movilidad_asp, 
						a.asp_sal_asp
						from sp_hv_basic a, ciudades b , ciudades c , ciudades d,
						estado_civil g
						where a.cod_asp = '".$cedula."' and a.ciu_doc_asp = b.cod_ciu and a.ciu_nac_asp = c.cod_ciu 
						and a.cod_ciu_asp = d.cod_ciu  
						and a.cod_civ_asp = g.cod_civ";
						
						
						
				$rs=$conn->Execute($sql);
				
				while($fila=$rs->FetchRow()){
				
					$this->lista[]=array( "cod_asp" => @$fila["cod_asp"],
										  "nom_asp" => @$fila["nom_asp"],
										  "ape_asp" => @$fila["ape_asp"],
										  "num_doc_asp" => @$fila["num_doc_asp"],
										  "ciu_doc_asp" => @$fila["ciu_doc_asp"],
										  "sexo_asp" => @$fila["sexo_asp"],										  
										  "peso_asp" => @$fila["peso_asp"],
										  "tipo_doc_asp" => @$fila["tipo_doc_asp"],
										  "lib_mil_asp" => @$fila["lib_mil_asp"],
										  "clase_lib_asp" => @$fila["clase_lib_asp"],
										  "dist_lib_asp" => @$fila["dist_lib_asp"],
										  "nom_ciu" => @$fila["nom_ciu"],
										  "lic_con_asp" => @$fila["lic_con_asp"],
										  "cat_lic_con" => @$fila["cat_lic_con"],
										  "vto_lcon_asp" => @$fila["vto_lcon_asp"],
										  "fec_nac_asp" => @$fila["fec_nac_asp"],
										  "ciu_nac_asp" => @$fila["ciu_nac_asp"],
										  "dir_asp" => @$fila["dir_asp"],
										  "cod_bar_asp" => @$fila["cod_bar_asp"],
										  "nom_bar" => @$fila["nom_bar"],
										  "cod_ciu_asp" => @$fila["cod_ciu_asp"],
										  "ciudad_uno" => @$fila["ciudad_uno"],
									      "ciudad_dos" => @$fila["ciudad_dos"],
										  "ciudad_tres" => @$fila["ciudad_tres"],
										  "telefono_asp" => @$fila["telefono_asp"],
										  "celular_asp" => @$fila["celular_asp"],
										  "dir_alt_asp" => @$fila["dir_alt_asp"],
										  "telef_alt_asp" => @$fila["telef_alt_asp"],
										  "email_asp" => @$fila["email_asp"],
										  "est_civ" => @$fila["est_civ"],
										  "estado_civil" => @$fila["estado_civil"],
										  "anteojos_asp" => @$fila["anteojos_asp"],
										  "estatura_asp" => @$fila["estatura_asp"],
										  "recom_epl" => @$fila["recom_epl"],
										  "fam_emp" => @$fila["fam_emp"],
										  "cod_recom_asp" => @$fila["cod_recom_asp"],
										  "asp_sal_asp" => @$fila["asp_sal_asp"]

									  
										  );
				}


				return $this->lista;
				
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}
		
		public function get_sp_hv_familia($cedula){


			try { 
				global $conn;

				$sql2="select 
					a.cod_asp, 
					a.cod_fam,
					a.nom_fam,
					a.ape_fam,
					a.tipo_doc_familia,
					a.tip_pco_fam,
					b.tip_pco,
					b.nom_pco,
					a.sexo_fam,
					a.dir_fam,
					a.cod_ciu_fam,
					c.cod_ciu,
					c.nom_ciu,
					a.telefono_fam,
					a.dep_econ_fam,
					a.cod_pro_fam,
					d.cod_ttp,
					d.desc_ttp,
					a.emp_trab_fam 
					from sp_hv_familia a , parentesco b , ciudades c , titulos d
					where
					a.tip_pco_fam = b.tip_pco and
					a.cod_ciu_fam = c.cod_ciu and
					a.cod_pro_fam = d.cod_ttp and
					a.cod_asp = '".$cedula."'";
					
					
						
				$rs=$conn->Execute($sql2);
				
				
				
				while($fila=$rs->FetchRow()){
				
					$this->lista[]=array( "cod_asp" => @$fila["cod_asp"],
										  "cod_fam" => @$fila["cod_fam"],
										  "nom_fam" => @$fila["nom_fam"],
										  "ape_fam" => @$fila["ape_fam"],
										  "tipo_doc_familia" => @$fila["tipo_doc_familia"],
										  "tip_pco_fam" => @$fila["tip_pco_fam"],
										  "tip_pco" => @$fila["tip_pco"],
										  "nom_pco" => @$fila["nom_pco"],
										  "sexo_fam" => @$fila["sexo_fam"],
										  "dir_fam" => @$fila["dir_fam"],
										  "cod_ciu_fam" => @$fila["cod_ciu_fam"],
										  "cod_ciu" => @$fila["cod_ciu"],
										  "nom_ciu" => @$fila["nom_ciu"],
										  "telefono_fam" => @$fila["telefono_fam"],
										  "dep_econ_fam" => @$fila["dep_econ_fam"],
										  "cod_pro_fam" => @$fila["cod_pro_fam"],
										  "cod_ttp" => @$fila["cod_ttp"],
										  "desc_ttp" => @$fila["desc_ttp"],
										  "emp_trab_fam" => @$fila["emp_trab_fam"]										  										  										  
										  );
				}
				
				


				return $this->lista;
				
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}
		
		public function get_sp_hv_referencias($cedula){


			try { 
				global $conn;

				$sql="select 
					a.cod_asp,
					a.cod_ref,
					a.nom_ref,
					a.ape_ref,
					a.ced_ref,
					a.dir_ref,
					a.telefono_ref,
					a.cod_ciu_ref,
					b.cod_ciu,
					b.nom_ciu,
					a.cod_pro_ref,
					c.cod_ttp,
					c.desc_ttp,
					a.emp_trab_ref,
					a.cargo_ref, 
					e.cod_pai,
					e.nom_pai,
					a.tipo_doc_ref
					from 
					sp_hv_referencias a, ciudades b, titulos c, paises as e
					where 
					a.cod_ciu_ref = b.cod_ciu and
					a.cod_pro_ref = c.cod_ttp and
					a.cod_asp = '".$cedula."' and e.cod_pai=a.cod_pais_ref";
					
					
						
				$rs=$conn->Execute($sql);
				
				while($fila=$rs->FetchRow()){
				
					$this->lista[]=array( "cod_asp" => @$fila["cod_asp"],
										  "cod_ref" => @$fila["cod_ref"],
										  "nom_ref" => @$fila["nom_ref"],
										  "ape_ref" => @$fila["ape_ref"],
										  "ced_ref" => @$fila["ced_ref"],
										  "dir_ref" => @$fila["dir_ref"],
										  "telefono_ref" => @$fila["telefono_ref"],
										  "cod_ciu_ref" => @$fila["cod_ciu_ref"],
										  "tipo_doc_ref" => @$fila["tipo_doc_ref"],
										  "cod_ciu" => @$fila["cod_ciu"],
										  "nom_ciu" => @$fila["nom_ciu"],
										  "cod_pro_ref" => @$fila["cod_pro_ref"],
										  "cod_ttp" => @$fila["cod_ttp"],
										  "desc_ttp" => @$fila["desc_ttp"],
										  "cargo_ref" => @$fila["cargo_ref"],
										  "emp_trab_ref" => @$fila["emp_trab_ref"]

										  
										  );
				}


				return $this->lista;
				
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}
		
		
		public function get_educacion_asp($cedula){


			try { 
				global $conn;

				$sql="select 
					a.cod_asp,
					a.cod_est,
					b.codigo,
					b.nombre_niv,
					a.niv_alc,
					c.nom_nie,
					c.cod_nie,
					convert(varchar,a.fec_ini,105)as fec_ini,
					convert(varchar,a.fec_fin,105)as fec_fin,
					a.cod_titulo,
					d.cod_ttp,
					d.desc_ttp,
					a.cod_ins,
					e.cod_enti,
					e.nom_enti,
					a.cod_ciu_inst,
					f.nom_ciu,
					f.cod_ciu,
					g.cod_pai,
					g.nom_pai,
					a.cual_inst
					from 
					educacion_asp a, estado_estudio b, nivel_ed c, titulos d, entid_cp e, ciudades f, paises as g
					where 
					a.cod_est = b.codigo and
					a.niv_alc = c.cod_nie and
					a.cod_titulo = d.cod_ttp and
					a.cod_ins = e.cod_enti and
					a.cod_ciu_inst = f.cod_ciu and
					a.cod_asp = '".$cedula."' and  a.cod_pais_inst=g.cod_pai ";
						
				$rs=$conn->Execute($sql);
				
				while($fila=$rs->FetchRow()){
				
					$this->lista[]=array( "cod_asp" => @$fila["cod_asp"],
										  "cod_est" => @$fila["cod_est"],
										  "codigo" => @$fila["codigo"],
										  "nombre_niv" => @$fila["nombre_niv"],
										  "niv_alc" => @$fila["niv_alc"],
										  "nom_nie" => @$fila["nom_nie"],
										  "cod_nie" => @$fila["cod_nie"],
										  "fec_ini" => @$fila["fec_ini"],
										  "fec_fin" => @$fila["fec_fin"],
										  "cod_titulo" => @$fila["cod_titulo"],
										  "desc_ttp" => @$fila["desc_ttp"],
										  "cod_ins" => @$fila["cod_ins"],
										  "cod_enti" => @$fila["cod_enti"],
										  "nom_enti" => @$fila["nom_enti"],
										  "cod_ciu_inst" => @$fila["cod_ciu_inst"],
										  "nom_ciu" => @$fila["nom_ciu"],
										  "cod_ciu" => @$fila["cod_ciu"],
										  "cod_pai" => @$fila["cod_pai"],
										  "nom_pai" => @$fila["nom_pai"],
										  "cual_inst" => @$fila["cual_inst"]										 										  										  
										  );
				}


				return $this->lista;
				
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}
		
		
		public function get_sp_hv_experiencia($cedula){


			try { 
				global $conn;

				$sql="
				select distinct a.cod_asp, 
				a.nom_empre,
				a.telefono_empre, 
				a.dir_empre, 
				CONVERT(varchar, a.fec_ini_empre, 105) as fec_ini_empre,
				CONVERT(varchar, a.fec_fin_empre, 105) as fec_fin_empre,
				a.cod_ciu_empre, 
				d.cod_ciu, 
				d.nom_ciu, 
				a.jefe_inme_empre, 
				a.cod_car_asp, 
				a.cod_cto_asp, 
				b.cod_cto,
				b.nom_cto, 
				a.cod_act_eco,
				a.sal_dev_empre,  
				a.mod_cto_asp, 
				a.hor_trab_asp, 
				a.jor_trab_asp, 
				a.cod_cau_re_asp,
				a.funciones_asp, 
				a.logros_asp,
				e.id as id_cargo,
				e.nombre as cargo,
				f.id as cod_cargo,
				f.nombre as nom_car,
				f.id_tipo_cargo,
				a.TRAB_ACT_ASP as trab_act_asp 
				from sp_hv_experiencia a, contratos b, ciudades d, tipo_cargo as e, cargos_anidados f,areas_aspirante g 
				where a.cod_cto_asp = b.cod_cto and
				a.cod_ciu_empre = d.cod_ciu and 
				g.cod_tip_car=e.id and 
				g.cod_cargo=f.id and
				a.COD_ASP=g.cod_asp and
				a.cod_asp = '".$cedula."'";
						
				$rs=$conn->Execute($sql);
				
				while($fila=$rs->FetchRow()){
				
					$this->lista[]=array( "cod_asp" => @$fila["cod_asp"],
										  "trab_act_asp" => @$fila["trab_act_asp"],
										  "nom_empre" => @$fila["nom_empre"],
										  "telefono_empre" => @$fila["telefono_empre"],
										  "dir_empre" => @$fila["dir_empre"],
										  "fec_ini_empre" => @$fila["fec_ini_empre"],
										  "fec_fin_empre" => @$fila["fec_fin_empre"],
										  "sal_dev_empre" => @$fila["sal_dev_empre"],
										  "nom_cto" => @$fila["nom_cto"],
										  "cod_act_eco" => @$fila["cod_act_eco"],
										  "jefe_inme_empre" => @$fila["jefe_inme_empre"],
										  "jor_trab_asp" => @$fila["jor_trab_asp"],
										  "mod_cto_asp" => @$fila["mod_cto_asp"],
										  "hor_trab_asp" => @$fila["hor_trab_asp"],										 
										  "nom_ciu" => @$fila["nom_ciu"],
										  "cod_cau_re_asp" => @$fila["cod_cau_re_asp"],
										  "funciones_asp" => @$fila["funciones_asp"],
										  "logros_asp" => @$fila["logros_asp"]											  
										  );
				}


				return $this->lista;
				
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}
		
		
		
	}