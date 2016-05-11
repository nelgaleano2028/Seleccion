<?php
	require_once("../librerias/lib/connection.php");
	
	
class Empleado extends Utilidades {
	
	private $lista=array();


		/*Traer los datos basicos del empleado*/
		public function basic_empleado($cedula){


			date_default_timezone_set('America/Bogota');

			try { 
				global $conn;
				
				$sql="select hv.cod_asp, hv.nom_asp, hv.ape_asp, hv.ciu_doc_asp, hv.tipo_doc_asp,hv.sexo_asp, hv.peso_asp, hv.lib_mil_asp,hv.clase_lib_asp,
						hv.dist_lib_asp,hv.lic_con_asp,hv.vto_lcon_asp, hv.fec_nac_asp, hv.ciu_nac_asp,hv.dir_asp,hv.cod_bar_asp,
						hv.cod_ciu_asp,hv.telefono_asp,hv.celular_asp, hv.dir_alt_asp,hv.telef_alt_asp,hv.email_asp,hv.cod_civ_asp, 
						hv.estatura_asp
						from  sp_hv_basic as hv where hv.COD_ASP='".$cedula."'";

						
				$rs=$conn->Execute($sql);
				
				if($rs->RecordCount() > 0){

					$fila=$rs->FetchRow();


					$sql2="insert into empleados_basic(cod_epl,nom_epl,ape_epl,ciu_exp,tipo_doc) values('".$cedula."','".$fila['nom_asp']."','".$fila['ape_asp']."','".$fila['ciu_doc_asp']."','".$fila['tipo_doc_asp']."')";



					$r=$conn->Execute($sql2);
				
						if($r){

								$fecha_nac=$this->arreglarFecha($fila['fec_nac_asp']); // de la clase extendida class_utilidades


							$sql3="insert into empleados_gral (cod_epl,sexo,peso,lib_mil,clase_lib,distrito_lib,lic_con,vto_lcon,fec_nac,ciu_nac,dir_epl,cod_bar,cod_ciu,tel_1,celular,dir_epl2,tel_2,email,cod_civ,estatura) values('".$cedula."','".$fila['sexo_asp']."','".$fila['peso_asp']."','".$fila['lib_mil_asp']."','".$fila['clase_lib_asp']."','".$fila['dist_lib_asp']."','".$fila['lic_con_asp']."','".$fila['vto_lcon_asp']."','".$fecha_nac."','".$fila['ciu_nac_asp']."','".$fila['dir_asp']."','".$fila['cod_bar_asp']."','".$fila['cod_ciu_asp']."','".$fila['telefono_asp']."','".$fila['celular_asp']."','".$fila['dir_alt_asp']."','".$fila['telef_alt_asp']."','".$fila['email_asp']."','".$fila['cod_civ_asp']."','".$fila['estatura_asp']."')";

							

							$r2=$conn->Execute($sql3);

							if($r2){

								$sql4="select cod_asp,nom_fam,ape_fam,cod_fam,tip_pco_fam,sexo_fam,dir_fam,cod_ciu_fam,telefono_fam,
										dep_econ_fam,cod_pro_fam,emp_trab_fam
										from sp_hv_familia where cod_asp='".$cedula."'";



								$r3=$conn->Execute($sql4);

								$sql5="";

								while($f=$r3->FetchRow()){   

									$sql5.="insert into parientes (cod_epl,cod_par,nom_par,ape_par,cedula,tip_pco,sexo,cod_ciu)values('".$cedula."','".$f['cod_fam']."','".$f['nom_fam']."','".$f['ape_fam']."','".$f['cod_fam']."','".$f['tip_pco_fam']."','".$f['sexo_fam']."','".$f['cod_ciu_fam']."')";

								}


								$r4=$conn->Execute($sql5);

								if($r4){

									
									$sql6="select a.niv_alc,b.nom_nie  
											from educacion_asp as a, nivel_ed as b
											where b.cod_nie=a.niv_alc and  cod_asp='".$cedula."'";

									$r5=$conn->Execute($sql6);


									//aqui es para insertar el nivel de estudio que tiene el aspirante por ahora esta insertado si es universitario o el primero que encuentre

									while($fila=$r5->FetchRow()){  


										if($fila['nom_nie']=='UNIVERSITARIO'){


											$sql6="update empleados_gral set cod_nie='".$fila['niv_alc']."' where cod_epl='".$cedula."' ";

												$r6=$conn->Execute($sql6);

												if($r6){

													return true;
												}else{

													return false;
												}




												break;

										}else {


											$sql6="update empleados_gral set cod_nie='".$fila['niv_alc']."' where cod_epl='".$cedula."' ";

												$r6=$conn->Execute($sql6);

										}

									

									}


										if($r6){

											return true;
										}else{

											return false;
										}

									

								
								}else{

									return false;
								}

							}else{

								return false;
							}




						}else{

							return false;

						}
				
					
				}else{
				
					return false;
					
				
				
				}
			
				return $this->lista;
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
		
		
		}

		
		public function get_info_general($cedula){

			date_default_timezone_set('America/Bogota');

			try { 
				global $conn;

				$sql="select a.nom_asp,a.ape_asp,a.cod_asp,b.est_civ,convert(varchar,fec_nac_asp,105)as fecha_nac 
					from sp_hv_basic as a, estado_civil as b 
					where a.cod_asp='".$cedula."' and a.cod_civ_asp=b.cod_civ";


				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

					while($fila=$rs->FetchRow()){  


						$this->lista=array(
								'nom_asp' => $fila['nom_asp'],
								'ape_asp' => $fila['ape_asp'],
								'cod_asp' => $fila['cod_asp'],
								'est_civ' => $fila['est_civ'],
								'fecha_nac' => $fila['fecha_nac']);



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


		public function prueba_aspirante($cedula){


			try { 
				global $conn;

				$sql="if exists (select * from caras_puntuacion) 
					BEGIN
						SELECT a.pc as pc_letras, b.pc as pc_bg3, c.pc as pc_caras, d.resultado as apren_resultado, e.resultado as temp_resultado
						FROM bg3_puntuacion a LEFT JOIN letras_puntuacion c ON a.cod_asp = c.cod_asp INNER JOIN
						caras_puntuacion b ON a.cod_asp=b.cod_asp INNER JOIN
						aprendizaje_puntuacion  d ON d.cod_asp=b.cod_asp INNER JOIN
						temperamento_puntuacion e ON e.cod_asp=b.cod_asp and d.cod_asp='".$cedula."' and e.cod_asp='".$cedula."'
					end
					 ELSE  
					 BEGIN
					SELECT a.pc as pc_letras, b.pc as pc_bg3, c.pc as pc_caras, d.resultado as apren_resultado, e.resultado as temp_resultado
					FROM bg3_puntuacion a LEFT JOIN caras_puntuacion c ON a.cod_asp = c.cod_asp INNER JOIN
					letras_puntuacion b ON a.cod_asp=b.cod_asp INNER JOIN
					aprendizaje_puntuacion  d ON d.cod_asp=b.cod_asp INNER JOIN
					temperamento_puntuacion e ON e.cod_asp=b.cod_asp and d.cod_asp='".$cedula."' and e.cod_asp='".$cedula."'
					end";


				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

					while($fila=$rs->FetchRow()){  


						$this->lista=array(
								'bg3_pc' => $fila['pc_bg3'],
								'letras_pc' => $fila['pc_letras'],
								'apren_resultado' => $fila['apren_resultado'],
								'temp_resultado' => $fila['temp_resultado'],
								'pc_caras' => $fila['pc_caras']);



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

		public function cargos(){



			try { 
				global $conn;

				$sql="select b.nom_car, a.cod_cargo
						from vacantes_gh as a, cargos as b  
						where   a.cod_cargo= b.cod_car --and a.estado='PROC'";


				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

					while($fila=$rs->FetchRow()){  


						$this->lista=array(
								'nom_car' => $fila['nom_car'],
								'cod_cargo' => $fila['cod_cargo']);


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


		
	//LLAMAR LOS DATOS QUE ESTAN EN LA BASE DE DATOS Y MOSTRARLO EN LA VISTA
	
	
		public function aspirante_integral($cedula){


			try { 
				global $conn;

				$sql="select * from informe_integral 
                      where cod_asp='".$cedula."'";


				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

					while($fila=$rs->FetchRow()){  


						$this->lista=array(
								'id' => $fila['id'],
								'cod_asp' => $fila['cod_asp'],
								'observacion_1'=> $fila['observacion_1'],
								'valor_1_1'=> $fila['valor_1_1'],
								'valor_2_1'=>$fila['valor_2_1'],
								'valor_3_1'=>$fila['valor_3_1'],
								'promedio_1'=>$fila['promedio_1'],
								'observacion_2'=> $fila['observacion_2'],
								'comp_uno_laboral'=> $fila['comp_uno_laboral'],
								'valor_1_2'=> $fila['valor_1_2'],
								'comp_dos_laboral'=> $fila['comp_dos_laboral'],
								'valor_2_2'=> $fila['valor_2_2'],
								'comp_tres_laboral'=> $fila['comp_tres_laboral'],
								'valor_3_2'=> $fila['valor_3_2'],
								'promedio_2'=>$fila['promedio_2'],
								'observacion_3'=> $fila['observacion_3'],
								'valor_1_3'=> $fila['valor_1_3'],
								'valor_2_3'=> $fila['valor_1_3'],
								'valor_3_3'=> $fila['valor_1_3'],
								'promedio_3'=>$fila['promedio_3'],
								'observacion_4'=> $fila['observacion_4'],
								'valor_1_4'=> $fila['valor_1_4'],
								'valor_2_4'=> $fila['valor_2_4'],
								'valor_3_4'=> $fila['valor_3_4'],
								'promedio_4'=>$fila['promedio_4'],
								'observacion_5'=> $fila['observacion_5'],
								'observacion_6'=> $fila['observacion_6'],
								'observacion_7'=> $fila['observacion_7'],
								'fecha'=> $fila['fecha'],
								'nombre_asp'=> $fila['nombre_asp'],
								'apellido_asp'=> $fila['apellido_asp'],
								'edad'=>$fila['edad'],
								'identificacion'=>$fila['identificacion'],
								'estado_civil'=>$fila['estado_civil'],
								'cargo'=>$fila['cargo'],
								'bg3'=>$fila['bg3'],
								'cmt'=>$fila['cmt'],
								'letras'=>$fila['letras'],
								'temp'=>$fila['temp'],
								'caras'=>$fila['caras'],
								'aprendizaje'=>$fila['aprendizaje'],
								'conocimiento'=>$fila['conocimiento'],
								'observacion_psico'=>$fila['observacion_psico'],
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

		
		//TERMINA LA FUNCION DE LLAMAR LOS DATOS DEL REGISTRO QUE SE ENCUENTRAN EN LA BASE DE DATOS

		
		
		
		//COMIENZA LA FUNCION DE LLAMAR LOS DATOS DE LA TABLA DE INFORME_INTEGRAL2
		
		
		
		
		public function aspirante_integral2($cedula){


			try { 
				global $conn;

				$sql="select * from informe_integral2 
                      where cod_asp='".$cedula."'";


				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

					while($fila=$rs->FetchRow()){  


						$this->lista=array(
								'id' => $fila['id'],
								'cod_asp' => $fila['cod_asp'],
								'nombre_cand' => $fila['nombre_cand'],
								'cargo_asp' => $fila['cargo_asp'],
								'fecha' => $fila['fecha'],
								'organizacion_1' => $fila['organizacion_1'],
								'telefonono_1' => $fila['telefonono_1'],
								'referido_1' => $fila['referido_1'],
								'cargo_1' => $fila['cargo_1'],
								'funciones_1' => $fila['funciones_1'],
								'tiempol_1' => $fila['tiempol_1'],
								'motivore_1' => $fila['motivore_1'],
								'puntaje_1' => $fila['puntaje_1'],
								'puntaje_2' => $fila['puntaje_2'],
								'puntaje_3' => $fila['puntaje_3'],
								'puntaje_4' => $fila['puntaje_4'],
								'puntaje_5' => $fila['puntaje_5'],
								'puntaje_6' => $fila['puntaje_6'],
								'puntaje_7' => $fila['puntaje_7'],
								'puntaje_8' => $fila['puntaje_8'],
								'puntajegeneral_1' => $fila['puntajegeneral_1'],
								'aspectosre_1' => $fila['aspectosre_1'],
								'contrataria_1' => $fila['contrataria_1'],
								'observaciones_1' => $fila['observaciones_1'],
								'verificadopo_1' => $fila['verificadopo_1'],
								'organizacion_2' => $fila['organizacion_2'],
								'telefonono_2' => $fila['telefonono_2'],
								'referido_2' => $fila['referido_2'],
								'cargo_2' => $fila['cargo_2'],
								'funciones_2' => $fila['funciones_2'],
								'tiempol_2' => $fila['tiempol_2'],
								'motivore_2' => $fila['motivore_2'],
								'puntaje_21' => $fila['puntaje_21'],
								'puntaje_22' => $fila['puntaje_22'],
								'puntaje_23' => $fila['puntaje_23'],
								'puntaje_24' => $fila['puntaje_24'],
								'puntaje_25' => $fila['puntaje_25'],
								'puntaje_26' => $fila['puntaje_26'],
								'puntaje_27' => $fila['puntaje_27'],
								'puntaje_28' => $fila['puntaje_28'],
								'puntajegeneral_2' => $fila['puntajegeneral_2'],
								'aspectosre_2' => $fila['aspectosre_2'],
								'contrataria_2' => $fila['contrataria_2'],
								'observaciones_2' => $fila['observaciones_2'],
								'verificadopo_2' => $fila['verificadopo_2'],
								'nombrepersonal' => $fila['nombrepersonal'],
								'telefonopersonal' => $fila['telefonopersonal'],
								'ocupacionper' => $fila['ocupacionper'],
								'vinculoper' => $fila['vinculoper'],
								'cual' => $fila['cual'],
								'tiemporeper' => $fila['tiemporeper'],
								'descriprefper' => $fila['descriprefper'],
								'porrecomiendaper' => $fila['porrecomiendaper'],
								'fortalpersonal' => $fila['fortalpersonal'],
								'descripersonal' => $fila['descripersonal'],
								'emprelaboroper' => $fila['emprelaboroper'],
								'verificadoporultimo' => $fila['verificadoporultimo'],
								'conceptogestionhumana' => $fila['conceptogestionhumana'],
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
		
		
		
		
		//TERMINA LA FUNCION DE LLAMAR LOS DATOS DE LA TABLA DE INFORME_INTEGRAL2

		
		
		
		
		public function atencion_detalle($cedula){


			try { 
				global $conn;

				$sql="select valor_1_1,valor_2_1,valor_3_1,valor_1_2,valor_2_2,valor_3_2,valor_1_3,valor_2_3,valor_3_3,valor_1_4,valor_2_4,valor_3_4 from informe_integral where cod_asp='".$cedula."'";


				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

					while($fila=$rs->FetchRow()){  


						$this->lista=array(
								
								'valor_1_1'=> $fila['valor_1_1'],
								'valor_2_1'=>$fila['valor_2_1'],
								'valor_3_1'=>$fila['valor_3_1'],
								'valor_1_2'=> $fila['valor_1_2'],
								'valor_2_2'=>$fila['valor_2_2'],
								'valor_3_2'=>$fila['valor_3_2'],
								'valor_1_3'=> $fila['valor_1_3'],
								'valor_2_3'=>$fila['valor_2_3'],
								'valor_3_3'=>$fila['valor_3_3'],
								'valor_1_4'=> $fila['valor_1_4'],
								'valor_2_4'=>$fila['valor_2_4'],
								'valor_3_4'=>$fila['valor_3_4']);



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



		public function competencias_informe(){



			try { 
				global $conn;

				$sql="select id,nombre_comp from competencias_informe";


				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

					while($fila=$rs->FetchRow()){  


						$this->lista[]=array(
								'id' => $fila['id'],
								'nombre_comp' => utf8_encode($fila['nombre_comp']));


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