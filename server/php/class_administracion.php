<?php
	require_once("../librerias/lib/connection.php");
	
	
	class Administracion{


		/*seleccionar el primer test*/
		public function primer_test($grupo){
			
			try { 
				global $conn;
				$sql="select top(1) prueba.ruta
					  from pruebas_asp_gru as gru, pruebas_seleccion as prueba
					  where prueba.id=gru.id_prueba and gru.id_grupo=".$grupo."";
						
				$rs=$conn->Execute($sql);
				$fila=$rs->FetchRow();
				return $fila["ruta"];
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
			
		}


		public function primer_test_prueba($grupo){
			
			try { 
				global $conn;
				$sql="select top(1) gru.id_prueba
					  from pruebas_asp_gru as gru, pruebas_seleccion as prueba
					  where prueba.id=gru.id_prueba and gru.id_grupo=".$grupo."";
						
				$rs=$conn->Execute($sql);
				$fila=$rs->FetchRow();
				return $fila["id_prueba"];
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
			
		}
		
		
		/*seleccionar el orden */
		public function orden($ruta,$grupo){
			
			try { 
				global $conn;
				$sql="select gru.id_prueba as orden, prueba.tiempo as tiempo
					 from pruebas_asp_gru as gru, pruebas_seleccion as prueba
                     where prueba.id=gru.id_prueba and gru.id_grupo=".$grupo." and prueba.ruta='".$ruta."'";
						
				$rs=$conn->Execute($sql);
				$fila=$rs->FetchRow();

				return	$this->data=array('orden'=>$fila["orden"],
									      'tiempo'=>$fila["tiempo"]);
				 
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
			
		}


		/*traer la ruta por el filto orden*/

		public function orden_instructivo($grupo){
			
			try { 
				global $conn;

				$i=0;

				$sql="select gru.id_prueba
					  from pruebas_asp_gru as gru, pruebas_seleccion as prueba
					  where prueba.id=gru.id_prueba and gru.id_grupo=".$grupo."";
						
				$rs=$conn->Execute($sql);
				
				while($fila=$rs->FetchRow()){
					
					if($i>=1){				
						array_push($this->lista, $fila['id_prueba']);
					}
					
					if($i==0){	
							$this->lista=array($fila['id_prueba']);
										
					}
					$i++;

				}
			
				return $this->lista;
				
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
			
		}


		/*traer la siguiente prueba*/
		public function traer_siguiente_prueba($id_prueba,$grupo){


			try { 
				global $conn;

				$sql="select  prueba.ruta
					from pruebas_asp_gru as gru, pruebas_seleccion as prueba
					where prueba.id=gru.id_prueba and gru.id_grupo=".$grupo." and gru.id_prueba=".$id_prueba." ";
						
				$rs=$conn->Execute($sql);
				$fila=$rs->FetchRow();
				return $fila["ruta"];
				
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}


		/*ingresar grupo*/
		public function ing_grupo($grupo){
			
			
			try { 
				global $conn;

				$sql="insert into grupo_asp(nombre) values('".$grupo."')";
				
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


		/*traer las pruebas con sus respectivos tiempos*/
		public function pruebas_seleccion(){


			try { 
				global $conn;

				$sql="select nombre_prueba,tiempo from pruebas_seleccion ";
						
				$rs=$conn->Execute($sql);
				while($fila=$rs->FetchRow()){
					$this->lista[]=array("nombre_prueba" => $fila["nombre_prueba"],
										  "tiempo" => $fila["tiempo"] );

				
				}


				return $this->lista;
				
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}


		/*Actualizar el tiempo de las pruebas*/
		public function update_tiempo($caras,$bg3,$letras,$cmt,$aprendizaje,$temperamento,$wartegg,$pf){

			try { 
				global $conn;

				$sql="update pruebas_seleccion set tiempo='".$caras."' where id=1";
				$sql.="update pruebas_seleccion set tiempo='".$bg3."' where id=2";
				$sql.="update pruebas_seleccion set tiempo='".$letras."' where id=3";
				$sql.="update pruebas_seleccion set tiempo='".$cmt."' where id=4";
				$sql.="update pruebas_seleccion set tiempo='".$aprendizaje."' where id=5";
				$sql.="update pruebas_seleccion set tiempo='".$temperamento."' where id=6";
				$sql.="update pruebas_seleccion set tiempo='".$wartegg."' where id=7";
				$sql.="update pruebas_seleccion set tiempo='".$pf."' where id=8";
				
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


		/*Traer todos los grupos*/
		public function grupo(){


			try { 
				global $conn;

				$sql="select id, nombre from grupo_asp where id in(1,2)";
						
				$rs=$conn->Execute($sql);
				while($fila=$rs->FetchRow()){
					$this->lista[]=array("id" => $fila["id"],
										  "nombre" => $fila["nombre"] );

				
				}


				return $this->lista;
				
				
				
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 

		}


		/*seleccionar prueba*/
		public function seleccion_prueba($id_grupo){


			try { 
				global $conn;

				$sql="select s.nombre_prueba as nombre
					  from  pruebas_asp_gru as p, pruebas_seleccion as s
					  where p.id_grupo=".$id_grupo." and p.id_prueba=s.id";


												
				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

						while($fila=$rs->FetchRow()){
							$this->lista[]=array("nombre" => $fila["nombre"]);

				
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



		/*eliminar prueba*/
		public function eliminar_pruebaGurpo($id_grupo){


			try { 
				global $conn;

				$sql="delete from pruebas_asp_gru where id_grupo=".$id_grupo."";


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


		/*ingresar tiempo*/
		public function ing_tiempo($sql){

			try { 
				global $conn;

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


		/*traer los aspirantes*/
		public function aspirantes(){

			try { 
				global $conn;

				$sql="select  rtrim(nombre)+' '+rtrim(apellidos) as nombre, * from selec_usuario_nuevo where cedula not in(select cod_asp from informe_integral) and estado='Con Proceso'";


												
				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

						while($fila=$rs->FetchRow()){
							$this->lista[]=array("nombre" => $fila["nombre"],
												"cedula"=>  $fila["cedula"],
												"correo"=>  $fila["correo"],
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

		/*aspirante con informes*/

		public function aspirantes_inf(){

			try { 
				global $conn;

				$sql="select  rtrim(nombre)+' '+rtrim(apellidos) as nombre, cedula, correo FROM informe_integral, selec_usuario_nuevo where cedula=cod_asp";


												
				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

						while($fila=$rs->FetchRow()){
							$this->lista[]=array("nombre" => $fila["nombre"],
												"cedula"=>  $fila["cedula"],
												"correo"=>  $fila["correo"],
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



		/*traer prueba cmt aspirante*/
		public function cmt_aspirante(){

			try { 
				global $conn;

				$sql="select top(1)rtrim(usu.nombre)+' '+rtrim(usu.apellidos) as nombre, usu.cedula,convert(varchar,cmt.fecha,105)as fecha 
						from selec_usuario_nuevo as usu, cmt
						where usu.cedula=cmt.cod_asp";


												
				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

						while($fila=$rs->FetchRow()){
							$this->lista[]=array("nombre" => $fila["nombre"],
												 "cedula" => $fila["cedula"],
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

		

		/*Buscar el informe integral*/
		public function buscar_informe($cedula){

			try { 
				global $conn;

				$sql=" select id from informe_integral where cod_asp='".$cedula."'";

								
				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

					$fila=$rs->FetchRow();

					return $fila['id'];

				}else{


					return null;
				}


			
	
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 


		}
		



		/*ingresar informe integral numero 1*/
			public function ing_informe_integral($cod_asp,$nom_asp,$ape_asp,$edad,$identificacion,$estado_civil,$cargo,$bg3,
			$cmt,$letras,$temp,$caras,$aprendizaje,$conocimiento,$observacion_psico,$observacion_1,
			$valor_1_1, $valor_2_1,$valor_3_1,$observacion_2,$comp_uno_laboral,$valor_1_2,$comp_dos_laboral,
			$valor_2_2, $comp_tres_laboral,$valor_3_2,$observacion_3,$valor_1_3,$valor_2_3,$valor_3_3,$observacion_4,
			$valor_1_4, $valor_2_4,$valor_3_4,$observacion_5,$observacion_6,$observacion_7,$fecha,$promedio_1,$promedio_2,$promedio_3,$promedio_4){
			
			
			try { 
				global $conn;

				$sql="insert into informe_integral(cod_asp,nombre_asp,apellido_asp,edad,identificacion,estado_civil,cargo,bg3,cmt,
					letras,temp,caras,aprendizaje,conocimiento,observacion_psico,observacion_1,valor_1_1,valor_2_1,valor_3_1,
					observacion_2,comp_uno_laboral,valor_1_2,comp_dos_laboral,valor_2_2,comp_tres_laboral,valor_3_2,observacion_3,valor_1_3,
					valor_2_3,valor_3_3,observacion_4,valor_1_4,valor_2_4,valor_3_4,observacion_5,observacion_6,observacion_7,fecha,promedio_1,promedio_2,promedio_3,promedio_4) values('".$cod_asp."','".$nom_asp."','".$ape_asp."','".$edad."','".$identificacion."','".$estado_civil."',
					'".$cargo."','".$bg3."', '".$cmt."','".$letras."','".$temp."','".$caras."','".$aprendizaje."','".$conocimiento."','".$observacion_psico."','".$observacion_1."',
					'".$valor_1_1."','".$valor_2_1."','".$valor_3_1."','".$observacion_2."','".$comp_uno_laboral."','".$valor_1_2."','".$comp_dos_laboral."','".$valor_2_2."',
					'".$comp_tres_laboral."','".$valor_3_2."','".$observacion_3."','".$valor_1_3."','".$valor_2_3."','".$valor_3_3."','".$observacion_4."',
					'".$valor_1_4."', '".$valor_2_4."', '".$valor_3_4."', '".$observacion_5."', '".$observacion_6."','".$observacion_7."','".$fecha."','".$promedio_1."','".$promedio_2."','".$promedio_3."','".$promedio_4."')";
					
				

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
//FINAL DE INSERT DE INFORME INTEGRAL




//COMIENZA EL INSERT EN INFORME INTEGAL2


// ($cos_asprefperosonal, $nombreCandidato, $cargoAspira, $fechaLb, $organizacion1, $telefono1, $referido1, $cargo1, $funcionesr1, $tiempol1, $motivore1, $puntaje1, $puntaje2, $puntaje3, $puntaje4, $puntaje5, $puntaje6, $puntaje7, $puntaje8, $puntajegeneral, $aspectore1, $contrataria1, $observaciones1, $verificadopor1, $organizacion2, $telefono2, $referido2, $cargo2, $funcionesrea2, $tiempolb2, $motivore2, $puntaje12, $puntaje22, $puntaje32, $puntaje42, $puntaje52, $puntaje62, $puntaje72, $puntaje82, $puntajegeneral2, $aspectosreal2, $observaciones2, $verificadopor2, $nombrerespersonal, $telefonorespersonal, $ocupacionrespersonal, $vinculorespersonal, $descotro, $tiemporespersonal, $descriprefpersonal, $porrecomienpersonal, $fortalpersonal, $empresalaborocandpersonal, $verificadoporultimo, $conceptogestionhumana)





			public function ing_informe_integral2($cos_asprefperosonal, $nombreCandidato, $cargoAspira, $fechaLb, $organizacion1, $telefono1, $referido1, $cargo1, $funcionesr1, $tiempol1, $motivore1, $puntaje1, $puntaje2, $puntaje3, $puntaje4, $puntaje5, $puntaje6, $puntaje7, $puntaje8, $puntajegeneral, $aspectore1, $contrataria1, $observaciones1, $verificadopor1, $organizacion2, $telefono2, $referido2, $cargo2, $funcionesrea2, $tiempolb2, $motivore2, $puntaje12, $puntaje22, $puntaje32, $puntaje42, $puntaje52, $puntaje62, $puntaje72, $puntaje82, $puntajegeneral2, $aspectosreal2, $observaciones2, $verificadopor2, $nombrerespersonal, $telefonorespersonal, $ocupacionrespersonal, $vinculorespersonal, $descotro, $tiemporespersonal, $descriprefpersonal, $porrecomienpersonal, $fortalpersonal, $empresalaborocandpersonal, $verificadoporultimo, $conceptogestionhumana){
			
			
		     // var_dump($cos_asprefperosonal.$nombreCandidato.$cargoAspira.$fechaLb.$organizacion1.$telefono1.$referido1.$cargo1.$funcionesr1.$tiempol1.$motivore1."Puntajes:".$puntaje1.$puntaje2.$puntaje3.$puntaje4.$puntaje5.$puntaje6.$puntaje7.$puntaje8.$puntajegeneral.$aspectore1.$contrataria1.$observaciones1.$verificadopor1."Organizacion 2 ".$organizacion2.$telefono2.$referido2.$cargo2.$funcionesrea2.$tiempolb2.$motivore2."Puntaje 2 ".$puntaje12.$puntaje22.$puntaje32.$puntaje42.$puntaje52.$puntaje62.$puntaje72.$puntaje82.$puntajegeneral2.$aspectosreal2.$observaciones2.$verificadopor2.$nombrerespersonal.$telefonorespersonal.$ocupacionrespersonal.$vinculorespersonal.$descotro.$tiemporespersonal.$descriprefpersonal.$porrecomienpersonal.$fortalpersonal.$empresalaborocandpersonal.$verificadoporultimo.$conceptogestionhumana);die("DEATH");
			
			try { 
				global $conn;
				
				$sqlinform2="insert into  informe_integral2(cod_asp,nombre_cand,cargo_asp,fecha,organizacion_1,telefonono_1,referido_1,cargo_1,funciones_1,tiempol_1,motivore_1,puntaje_1,puntaje_2,puntaje_3,puntaje_4,puntaje_5,puntaje_6,puntaje_7,puntaje_8,puntajegeneral_1,aspectosre_1,contrataria_1,observaciones_1,verificadopo_1,organizacion_2,telefonono_2,referido_2,cargo_2, funciones_2, tiempol_2, motivore_2, puntaje_21, puntaje_22, puntaje_23, puntaje_24, puntaje_25, puntaje_26, puntaje_27, puntaje_28, puntajegeneral_2, aspectosre_2, contrataria_2, observaciones_2, verificadopo_2, nombrepersonal, telefonopersonal, ocupacionper, vinculoper, cual, tiemporeper, descriprefper, porrecomiendaper, fortalpersonal, descripersonal, emprelaboroper, verificadoporultimo, conceptogestionhumana) VALUES ('".$cos_asprefperosonal."','".$nombreCandidato."','".$cargoAspira."','".$fechaLb."','".$organizacion1."','".$telefono1."',
					'".$referido1."','".$cargo1."', '".$funcionesr1."','".$tiempol1."','".$motivore1."','".$puntaje1."','".$puntaje2."','".$puntaje3."','".$puntaje4."','".$puntaje5."',
					'".$puntaje6."','".$puntaje7."','".$puntaje8."','".$puntajegeneral."','".$aspectore1."','".$contrataria1."','".$observaciones1."','".$verificadopor1."',
					'".$organizacion2."','".$telefono2."','".$referido2."','".$cargo2."','".$funcionesrea2."','".$tiempolb2."','".$motivore2."',
					'".$puntaje12."', '".$puntaje22."', '".$puntaje32."', '".$puntaje42."', '".$puntaje52."','".$puntaje62."','".$puntaje72."','".$puntaje82."','".$puntajegeneral2."','".$aspectosreal2."', '', '".$observaciones2."','".$verificadopor2."','".$nombrerespersonal."','".$telefonorespersonal."','".$ocupacionrespersonal."','".$vinculorespersonal."','".$descotro."','".$tiemporespersonal."','".$descriprefpersonal."','".$porrecomienpersonal."','".$fortalpersonal."', '', '".$empresalaborocandpersonal."','".$verificadoporultimo."','".$conceptogestionhumana."')";
					
				//var_dump($sqlinform2);die("Informe 2");

				$rs22=$conn->Execute($sqlinform2);
				
				if($rs22){
					
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










//TERMINA EL INSERT DEL INFORME INTEGRAL 2

		public function editar_integral($cod_asp,$nom_asp,$ape_asp,$edad,$identificacion,$estado_civil,$cargo,$bg3,
	$cmt,$letras,$temp,$caras,$aprendizaje,$conocimiento,$observacion_psico,$observacion_1,
	$valor_1_1, $valor_2_1,$valor_3_1,$observacion_2,$comp_uno_laboral,$valor_1_2,$comp_dos_laboral,
	$valor_2_2, $comp_tres_laboral,$valor_3_2,$observacion_3,$valor_1_3,$valor_2_3,$valor_3_3,$observacion_4,
	$valor_1_4, $valor_2_4,$valor_3_4,$observacion_5,$observacion_6,$observacion_7,$fecha,$promedio_1,$promedio_2,$promedio_3,$promedio_4,$id){



			try { 
				global $conn;

				$sql="update informe_integral set cod_asp='".$cod_asp."', nombre_asp='".$nom_asp."', apellido_asp='".$ape_asp."', edad='".$edad."', identificacion='".$identificacion."', estado_civil='".$estado_civil."',
					cargo='".$cargo."', bg3='".$bg3."', cmt='".$cmt."', letras='".$letras."', temp='".$temp."', caras='".$caras."', aprendizaje='".$aprendizaje."', conocimiento='".$conocimiento."', observacion_psico='".$observacion_psico."',
					 observacion_1='".$observacion_1."', valor_1_1='".$valor_1_1."', valor_2_1='".$valor_2_1."', valor_3_1='".$valor_3_1."', observacion_2='".$observacion_2."', comp_uno_laboral='".$comp_uno_laboral."', valor_1_2='".$valor_1_2."',
					  comp_dos_laboral='".$comp_dos_laboral."', valor_2_2='".$valor_2_2."', comp_tres_laboral='".$comp_tres_laboral."', valor_3_2='".$valor_3_2."', observacion_3='".$observacion_3."', valor_1_3='".$valor_1_3."', valor_2_3='".$valor_2_3."',
					  valor_3_3='".$valor_3_3."', observacion_4='".$observacion_4."', valor_1_4='".$valor_1_4."', valor_2_4='".$valor_2_4."',valor_3_4='".$valor_3_4."',observacion_5='".$observacion_5."',observacion_6='".$observacion_6."',observacion_7='".$observacion_7."',
					   promedio_1='".$promedio_1."', promedio_2='".$promedio_2."', promedio_3='".$promedio_3."', promedio_4='".$promedio_4."' where id='".$id."'";


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


		
		//empieza el ediar el formulario de referencia plaboral
		
		
		
		
			public function editar_integral2($id, $cos_asprefperosonal, $nombreCandidato, $cargoAspira, $fechaLb, $organizacion1, $telefono1, $referido1, $cargo1, $funcionesr1, $tiempol1, $motivore1, $puntaje1, $puntaje2, $puntaje3, $puntaje4, $puntaje5, $puntaje6, $puntaje7, $puntaje8, $puntajegeneral, $aspectore1, $contrataria1, $observaciones1, $verificadopor1, $organizacion2, $telefono2, $referido2, $cargo2, $funcionesrea2, $tiempolb2, $motivore2, $puntaje12, $puntaje22, $puntaje32, $puntaje42, $puntaje52, $puntaje62, $puntaje72, $puntaje82, $puntajegeneral2, $aspectosreal2, $observaciones2, $verificadopor2, $nombrerespersonal, $telefonorespersonal, $ocupacionrespersonal, $vinculorespersonal, $descotro, $tiemporespersonal, $descriprefpersonal, $porrecomienpersonal, $fortalpersonal, $empresalaborocandpersonal, $verificadoporultimo, $conceptogestionhumana){



			try { 
				global $conn;

				$sql="update informe_integral2 set cod_asp='".$cos_asprefperosonal."', nombre_cand='".$nombreCandidato."', cargo_asp='".$cargoAspira."', fecha='".$fechaLb."', organizacion_1='".$organizacion1."', telefonono_1='".$telefono1."',
				referido_1='".$referido1."', cargo_1='".$cargo1."', funciones_1='".$funcionesr1."', tiempol_1='".$tiempol1."', motivore_1='".$motivore1."', puntaje_1='".$puntaje1."', puntaje_2='".$puntaje2."', puntaje_3='".$puntaje3."', puntaje_4='".$puntaje4."',
				 puntaje_5='".$puntaje5."', puntaje_6='".$puntaje6."', puntaje_7='".$puntaje7."', puntaje_8='".$puntaje8."', puntajegeneral_1='".$puntajegeneral."', aspectosre_1='".$aspectore1."', contrataria_1='".$contrataria1."',
				  observaciones_1='".$observaciones1."', verificadopo_1='".$verificadopor1."', organizacion_2='".$organizacion2."', telefonono_2='".$telefono2."', referido_2='".$referido2."', cargo_2='".$cargo2."', funciones_2='".$funcionesrea2."',
				  tiempol_2='".$tiempolb2."', motivore_2='".$motivore2."', puntaje_21='".$puntaje12."', puntaje_22='".$puntaje22."',puntaje_23='".$puntaje32."',puntaje_24='".$puntaje42."',puntaje_25='".$puntaje52."',puntaje_26='".$puntaje62."',
				   puntaje_27='".$puntaje72."', puntaje_28='".$puntaje82."', puntajegeneral_2='".$puntajegeneral2."', aspectosre_2='".$aspectosreal2."', contrataria_2='', observaciones_2='".$observaciones2."', verificadopo_2='".$verificadopor2."', nombrepersonal='".$nombrerespersonal."', telefonopersonal='".$telefonorespersonal."', ocupacionper='".$ocupacionrespersonal."', vinculoper='".$vinculorespersonal."', cual='".$descotro."', tiemporeper='".$tiemporespersonal."', descriprefper='".$descriprefpersonal."', porrecomiendaper='".$porrecomienpersonal."', fortalpersonal='".$fortalpersonal."', descripersonal='".$empresalaborocandpersonal."', emprelaboroper='".$empresalaborocandpersonal."', verificadoporultimo='".$verificadoporultimo."', conceptogestionhumana='".$conceptogestionhumana."' where id='".$id."'";

				   
					//var_dump($sql);DIE("integral 2");

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
		
		
		
		
		//termina el editar de informe laboral
		
		
		/*actualizar informe integral*/
		public function update_informe_integral8($cod_asp,$nom_asp,$ape_asp,$edad,$identificacion,$estado_civil,$cargo,$bg3,$cmt,$letras,$temp,$caras,$aprendizaje,$conocimiento,$id){
			
			
			try { 
				global $conn;

				$sql="update informe_integral set cod_asp='".$cod_asp."', nombre_asp='".$nom_asp."', apellido_asp='".$ape_asp."', edad='".$edad."', identificacion='".$identificacion."', estado_civil='".$estado_civil."', 
				cargo='".$cargo."', bg3='".$bg3."', cmt='".$cmt."', letras='".$letras."', temp='".$temp."', caras='".$caras."', aprendizaje='".$aprendizaje."', conocimiento='".$conocimiento."' where id='".$id."'";

				$rs=$conn->Execute($sql);
				
				if($rs){
					
					return $id;
				}else{
					// el 0 es porque no se ingreso
					return false;
				}
	
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
			
		}


		/*actualizar informe integral*/
		public function update_informe_integral9($id,$observacion_psico){
			
			
			try { 
				global $conn;

				$sql="update informe_integral set observacion_psico='".$observacion_psico."' where id='".$id."'";

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





		public function update_informe_integral1($id,$observacion_2,$valor_1_2,$valor_2_2,$valor_3_2){



			try { 
				global $conn;

				$sql="update informe_integral set observacion_2='".$observacion_2."', valor_1_2='".$valor_1_2."', valor_2_2='".$valor_2_2."', valor_3_2='".$valor_3_2."' where id=".$id." ";

				
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


		public function update_informe_integral2($id,$observacion_3,$valor_1_3,$valor_2_3,$valor_3_3){



			try { 
				global $conn;

				$sql="update informe_integral set observacion_3='".$observacion_3."', valor_1_3='".$valor_1_3."', valor_2_3='".$valor_2_3."', valor_3_3='".$valor_3_3."' where id=".$id." ";
				

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


		public function update_informe_integral3($id,$observacion_4,$valor_1_4,$valor_2_4,$valor_3_4){

			try { 
				global $conn;

				$sql="update informe_integral set observacion_4='".$observacion_4."', valor_1_4='".$valor_1_4."', valor_2_4='".$valor_2_4."', valor_3_4='".$valor_3_4."' where id=".$id." ";

				
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

		public function update_informe_integral7($id,$observacion_5,$observacion_6,$observacion_7,$fecha){

			try { 
				global $conn;

				$sql="update informe_integral set observacion_5='".$observacion_5."', observacion_6='".$observacion_6."', observacion_7='".$observacion_7."', fecha='".$fecha."' where id=".$id." ";


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


		/*para editar el formulario de atencion*/
		public function edit_atencion($cod_asp){


			try { 
				global $conn;

				$sql=" select observacion_1, valor_1_1, valor_2_1,valor_3_1 from informe_integral where cod_asp='$cod_asp' ";

				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

						while($fila=$rs->FetchRow()){
							$this->lista[]=array("observacion_1" => $fila["observacion_1"],
												 "valor_1_1" => $fila["valor_1_1"],
												 "valor_2_1" => $fila["valor_2_1"],
												 "valor_3_1" => $fila["valor_3_1"]);

				
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


		/*actualizo el formulario informe atencion*/
		public function update_informe_integral($cod_asp,$observacion_1,$valor_1_1,$valor_2_1,$valor_3_1){


			try { 
				global $conn;

				$sql="update informe_integral set observacion_1='".$observacion_1."', valor_1_1='".$valor_1_1."', valor_2_1='".$valor_2_1."', valor_3_1='".$valor_3_1."' where cod_asp=".$cod_asp." ";

				
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




		/*para editar el formulario laboral*/
		public function edit_laboral($cod_asp){

			try { 
				global $conn;

				$sql=" select observacion_2, valor_1_2, valor_2_2,valor_3_2 from informe_integral where cod_asp='$cod_asp' ";

				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

						while($fila=$rs->FetchRow()){
							$this->lista[]=array("observacion_2" => $fila["observacion_2"],
												 "valor_1_2" => $fila["valor_1_2"],
												 "valor_2_2" => $fila["valor_2_2"],
												 "valor_3_2" => $fila["valor_3_2"]);

				
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



		public function edit_relacional($cod_asp){

			try { 
				global $conn;

				$sql=" select observacion_3, valor_1_3, valor_2_3,valor_3_3 from informe_integral where cod_asp='$cod_asp' ";

				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

						while($fila=$rs->FetchRow()){
							$this->lista[]=array("observacion_3" => $fila["observacion_3"],
												 "valor_1_3" => $fila["valor_1_3"],
												 "valor_2_3" => $fila["valor_2_3"],
												 "valor_3_3" => $fila["valor_3_3"]);

				
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


		public function edit_pensamiento($cod_asp){

			try { 
				global $conn;

				$sql=" select observacion_4, observacion_5, observacion_6 from informe_integral where cod_asp='$cod_asp' ";

				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

						while($fila=$rs->FetchRow()){
							$this->lista[]=array("observacion_4" => $fila["observacion_4"],
												 "observacion_5" => $fila["observacion_5"],
												 "observacion_6" => $fila["observacion_6"]);

				
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



		public function update_informe_integral4($id,$observacion_2,$valor_1_2,$valor_2_2,$valor_3_2){



			try { 
				global $conn;

				$sql="update informe_integral set observacion_2='".$observacion_2."', valor_1_2='".$valor_1_2."', valor_2_2='".$valor_2_2."', valor_3_2='".$valor_3_2."' where cod_asp=".$id." ";

				
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



		public function update_informe_integral5($id,$observacion_3,$valor_1_3,$valor_2_3,$valor_3_3){



			try { 
				global $conn;

				$sql="update informe_integral set observacion_3='".$observacion_3."', valor_1_3='".$valor_1_3."', valor_2_3='".$valor_2_3."', valor_3_3='".$valor_3_3."' where cod_asp=".$id." ";
				
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


		public function update_informe_integral6($id,$observacion_4,$observacion_5,$observacion_6, $fecha){

			try { 
				global $conn;

				$sql="update informe_integral set observacion_4='".$observacion_4."', observacion_5='".$observacion_5."', observacion_6='".$observacion_6."', fecha='".$fecha."' where cod_asp=".$id." ";

				
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


		
		



/*traer prueba 16pf aspirante*/

		public function pf_aspirante(){

			try { 
				global $conn;

				$sql=" select top(1)rtrim(usu.nombre)+' '+rtrim(usu.apellidos) as nombre, usu.cedula,convert(varchar,pf.fecha,105)as fecha 
						from selec_usuario_nuevo as usu, dieciseispf as pf
						where usu.cedula=pf.cod_asp";

				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

						while($fila=$rs->FetchRow()){
							$this->lista[]=array("nombre" => $fila["nombre"],
												 "cedula" => $fila["cedula"],
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




		public function resp_pf_aspirante($cod_asp){


			try { 
				global $conn;

				$sql="select *,convert(varchar,fecha,105)as fecha  from dieciseispf_resp_puntuacion where cod_aspirante='$cod_asp'";
	
				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

						while($fila=$rs->FetchRow()){
							$this->lista[]=array("cod_aspirante" => $fila["cod_aspirante"],
												 "dm"=>$fila["dm"],
												 "A"=>$fila["A"],
												 "B"=>$fila["B"],
												 "C"=>$fila["C"],
												 "E"=>$fila["E"],
												 "F"=>$fila["F"],
												 "G"=>$fila["G"],
												 "H"=>$fila["H"],
												 "I"=>$fila["I"],
												 "L"=>$fila["L"],
												 "M"=>$fila["M"],
												 "N"=>$fila["N"],
												 "O"=>$fila["O"],
												 "Q1"=>$fila["Q1"],
												 "Q2"=>$fila["Q2"],
												 "Q3"=>$fila["Q3"],
												 "Q4"=>$fila["Q4"],
												 "fecha"=>$fila["fecha"]);

				
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



		public function resp_cmt_aspirante($cod_asp){

			try { 
				global $conn;

				$sql="select top(1) preg_asp, resp_asp from cmt where cod_asp='$cod_asp'";
	
				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

						while($fila=$rs->FetchRow()){
							$this->lista[]=array("res_asp" => $fila["resp_asp"]);

				
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




		public function vacantes(){

			try { 
				global $conn;

				$sql="select v.codigo, c.nom_cc2, car.nom_car, convert(varchar,v.fecha,105)as fecha
					from vacantes_gh as v, centrocosto2 as c, cargos as car
					where v.cod_cc2=c.cod_cc2 and v.cod_cargo=car.cod_car";
	
				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

						while($fila=$rs->FetchRow()){
							$this->lista[]=array("codigo" => $fila["codigo"],
												"nom_cc2" => $fila["nom_cc2"],
												"nom_car" => $fila["nom_car"],
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

		
		
		/*traer prueba cmt aspirante*/
		public function catalogos(){

			try { 
				global $conn;

				$sql="select * from catalogos ";


												
				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

						while($fila=$rs->FetchRow()){
							$this->lista[]=array("id" => $fila["id"],
												 "nombre" => $fila["nombre"],
												 "tabla" => $fila["tabla"]
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
		
	
		public function cargos(){

			try { 
				global $conn;

				$sql="select * from tipo_cargo ";


												
				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

						while($fila=$rs->FetchRow()){
							$this->lista[]=array("id" => $fila["id"],
												 "nombre" => $fila["nombre"]
												
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
		
		
		public function aspirantes_hv(){

			try { 
				global $conn;

				//$sql="select correo, contrasena,* from sp_hv_basic, selec_usuario_nuevo WHERE COD_ASP=cedula ";
				
				$sql="select a.cod_asp, 
				desc_ttp as nom_ttl, 
				nombre_niv as nom_nivel,
				d.nombre as nom_cargo,
				areas,  
				FUNCIONES_ASP,
				rtrim(e.nombre)+' '+rtrim(e.apellidos) as nombre,
				e.correo, e.contrasena, e.estado
				from sp_hv_experiencia a, educacion_asp b, cargos_anidados d, titulos, estado_estudio, selec_usuario_nuevo e
				where a.COD_ASP=b.COD_ASP and d.id=cod_cargo and  cod_ttp=cod_titulo and  codigo=cod_est and a.COD_ASP=e.cedula
				";


												
				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

						while($fila=$rs->FetchRow()){
							$this->lista[]=array("cedula" => $fila["cod_asp"],
							"titulo" => $fila["nom_ttl"],
							"nivel" => $fila["nom_nivel"],
							"cargo" => $fila["nom_cargo"],
							"areas" => $fila["areas"],
							"funciones" => $fila["FUNCIONES_ASP"],							
							"nombre" => $fila["nombre"],							
							"correo" => $fila["correo"],
							"contrasena" => $fila["contrasena"]												
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
		
		
		
		//QUERY QUE MUESTRA LOS DATOS DE CON PROCESO EN EL PERFIL DE VJIMENEZ 
		
		public function aspirantes_hv_con_proceso(){

		  try { 
			global $conn;

			//$sql="select correo, contrasena,* from sp_hv_basic, selec_usuario_nuevo WHERE COD_ASP=cedula ";

			$sql="select DISTINCT a.cod_asp, 
			desc_ttp as nom_ttl, 
			nombre_niv as nom_nivel,
			a.nombre_cargo_nu as nom_cargo,
			areas,  
			FUNCIONES_ASP,
			rtrim(e.nombre)+' '+rtrim(e.apellidos) as nombre,
			e.correo, e.contrasena, e.estado
			from sp_hv_experiencia a, educacion_asp b, cargos_anidados d, titulos, estado_estudio, selec_usuario_nuevo e
			where a.COD_ASP=b.COD_ASP and d.id=cod_cargo and  cod_ttp=cod_titulo and  codigo=cod_est and a.COD_ASP=e.cedula and e.estado='Con Proceso' group by  a.cod_asp, desc_ttp, nombre_niv, a.nombre_cargo_nu, areas, FUNCIONES_ASP, 
            e.nombre, e.apellidos, e.correo, e.contrasena, e.estado ";

	          //var_dump($sql);

			$rs=$conn->Execute($sql);

			if($rs->RecordCount() > 0){

						$i=0;
						$cod_temp='0';
						

						while($fila=$rs->FetchRow()){
						
						
							if($fila["cod_asp"]==$cod_temp){
							
																
								$this->lista[$i=$i-1]=array("cedula" =>$fila["cod_asp"],
								"titulo" => $this->lista[$i]['titulo'].','.$fila["nom_ttl"],
								"nivel" => $this->lista[$i]['nivel'].','.$fila["nom_nivel"],
								"cargo" => $this->lista[$i]['cargo'].','.$fila["nom_cargo"],
								"areas" => $this->lista[$i]['areas'].','.$fila["areas"],
								"funciones" => $this->lista[$i]['funciones'].','.$fila["FUNCIONES_ASP"],							
								"nombre" => $fila["nombre"],							
								"correo" => $fila["correo"],
								"contrasena" => $fila["contrasena"]												
								);
									
							}else{
								
								$this->lista[$i]=array("cedula" => $fila["cod_asp"],
								"titulo" => $fila["nom_ttl"],
								"nivel" => $fila["nom_nivel"],
								"cargo" => $fila["nom_cargo"],
								"areas" => $fila["areas"],
								"funciones" => $fila["FUNCIONES_ASP"],							
								"nombre" => $fila["nombre"],							
								"correo" => $fila["correo"],
								"contrasena" => $fila["contrasena"]
								);	

								$cod_temp=$fila["cod_asp"];
								
								
							
							}
						
							$i++;
						
						
		
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
		
		//TERMINA EL QUERY DE LLAMAR LOS DATOS "CON PROCESO" EN EL PERFIL DE VJIMENEZ
		
		
		
		
		//EMPIEZA EL QUERY QUE LLAMA LOS DATOS CON ESTADO "BANCOS"
		
		
		
		public function aspirantes_hv_con_bancos(){

		  try { 
			global $conn;

			//$sql="select correo, contrasena,* from sp_hv_basic, selec_usuario_nuevo WHERE COD_ASP=cedula ";

			$sql="select DISTINCT a.cod_asp, 
			desc_ttp as nom_ttl, 
			nombre_niv as nom_nivel,
			a.nombre_cargo_nu as nom_cargo,
			areas,  
			FUNCIONES_ASP,
			rtrim(e.nombre)+' '+rtrim(e.apellidos) as nombre,
			e.correo, e.contrasena, e.estado
			from sp_hv_experiencia a, educacion_asp b, cargos_anidados d, titulos, estado_estudio, selec_usuario_nuevo e
			where a.COD_ASP=b.COD_ASP and d.id=cod_cargo and  cod_ttp=cod_titulo and  codigo=cod_est and a.COD_ASP=e.cedula and e.estado='Bancos' group by  a.cod_asp, desc_ttp, nombre_niv, a.nombre_cargo_nu, areas, FUNCIONES_ASP, 
            e.nombre, e.apellidos, e.correo, e.contrasena, e.estado ";

	          //var_dump($sql);

			$rs=$conn->Execute($sql);

			if($rs->RecordCount() > 0){

						$i=0;
						$cod_temp='0';
						

						while($fila=$rs->FetchRow()){
						
						
							if($fila["cod_asp"]==$cod_temp){
							
																
								$this->lista[$i=$i-1]=array("cedula" =>$fila["cod_asp"],
								"titulo" => $this->lista[$i]['titulo'].','.$fila["nom_ttl"],
								"nivel" => $this->lista[$i]['nivel'].','.$fila["nom_nivel"],
								"cargo" => $this->lista[$i]['cargo'].','.$fila["nom_cargo"],
								"areas" => $this->lista[$i]['areas'].','.$fila["areas"],
								"funciones" => $this->lista[$i]['funciones'].','.$fila["FUNCIONES_ASP"],							
								"nombre" => $fila["nombre"],							
								"correo" => $fila["correo"],
								"contrasena" => $fila["contrasena"]												
								);
									
							}else{
								
								$this->lista[$i]=array("cedula" => $fila["cod_asp"],
								"titulo" => $fila["nom_ttl"],
								"nivel" => $fila["nom_nivel"],
								"cargo" => $fila["nom_cargo"],
								"areas" => $fila["areas"],
								"funciones" => $fila["FUNCIONES_ASP"],							
								"nombre" => $fila["nombre"],							
								"correo" => $fila["correo"],
								"contrasena" => $fila["contrasena"]
								);	

								$cod_temp=$fila["cod_asp"];
								
								
							
							}
						
							$i++;
						
						
		
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
		
		
		
		
		//TERMINA EL QUERY QUE LLAMA LOS DATOS CON EL ESTADO "BANCOS"
		
		
		
		


		public function aspirantes_sinProceso(){

			try { 
				global $conn;

				//$sql="select correo, contrasena,* from sp_hv_basic, selec_usuario_nuevo WHERE COD_ASP=cedula ";
				
				$sql="select a.cod_asp, 
				desc_ttp as nom_ttl, 
				nombre_niv as nom_nivel,
				a.nombre_cargo_nu as nom_cargo,
				areas,  
				FUNCIONES_ASP,
				rtrim(e.nombre)+' '+rtrim(e.apellidos) as nombre,
				e.correo, e.contrasena, e.estado
				from sp_hv_experiencia a, educacion_asp b, cargos_anidados d, titulos, estado_estudio, selec_usuario_nuevo e
				where a.COD_ASP=b.COD_ASP and d.id=cod_cargo and  cod_ttp=cod_titulo and  codigo=cod_est and a.COD_ASP=e.cedula
				and e.estado='Sin Proceso'";
												
				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){
					
						$i=0;
						$cod_temp='0';

						while($fila=$rs->FetchRow()){
						
						
							if($fila["cod_asp"]==$cod_temp){
							
																
								$this->lista[$i=$i-1]=array("cedula" =>$fila["cod_asp"],
								"titulo" => $this->lista[$i]['titulo'].','.$fila["nom_ttl"],
								"nivel" => $this->lista[$i]['nivel'].','.$fila["nom_nivel"],
								"cargo" => $this->lista[$i]['cargo'].','.$fila["nom_cargo"],
								"areas" => $this->lista[$i]['areas'].','.$fila["areas"],
								"funciones" => $this->lista[$i]['funciones'].','.$fila["FUNCIONES_ASP"],							
								"nombre" => $fila["nombre"],							
								"correo" => $fila["correo"],
								"contrasena" => $fila["contrasena"]												
								);
									
							}else{
								
								$this->lista[$i]=array("cedula" => $fila["cod_asp"],
								"titulo" => $fila["nom_ttl"],
								"nivel" => $fila["nom_nivel"],
								"cargo" => $fila["nom_cargo"],
								"areas" => $fila["areas"],
								"funciones" => $fila["FUNCIONES_ASP"],							
								"nombre" => $fila["nombre"],							
								"correo" => $fila["correo"],
								"contrasena" => $fila["contrasena"]
								);	

								$cod_temp=$fila["cod_asp"];
								
								
							
							}
						
							$i++;
							
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




		public function aspirantes_preseleccionados(){

			try { 
				global $conn;

				//$sql="select correo, contrasena,* from sp_hv_basic, selec_usuario_nuevo WHERE COD_ASP=cedula ";
				
				$sql="select a.cod_asp, 
				desc_ttp as nom_ttl, 
				nombre_niv as nom_nivel,
				a.nombre_cargo_nu as nom_cargo,
				areas,  
				FUNCIONES_ASP,
				rtrim(e.nombre)+' '+rtrim(e.apellidos) as nombre,
				e.correo, e.contrasena, e.estado
				from sp_hv_experiencia a, educacion_asp b, cargos_anidados d, titulos, estado_estudio, selec_usuario_nuevo e
				where a.COD_ASP=b.COD_ASP and d.id=cod_cargo and  cod_ttp=cod_titulo and  codigo=cod_est and a.COD_ASP=e.cedula
				and e.estado='Preseleccionado'";


												
				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){
				
				
						$i=0;
						$cod_temp='0';
						

						while($fila=$rs->FetchRow()){
						
						
							if($fila["cod_asp"]==$cod_temp){
							
																
								$this->lista[$i=$i-1]=array("cedula" =>$fila["cod_asp"],
								"titulo" => $this->lista[$i]['titulo'].','.$fila["nom_ttl"],
								"nivel" => $this->lista[$i]['nivel'].','.$fila["nom_nivel"],
								"cargo" => $this->lista[$i]['cargo'].','.$fila["nom_cargo"],
								"areas" => $this->lista[$i]['areas'].','.$fila["areas"],
								"funciones" => $this->lista[$i]['funciones'].','.$fila["FUNCIONES_ASP"],							
								"nombre" => $fila["nombre"],							
								"correo" => $fila["correo"],
								"contrasena" => $fila["contrasena"]												
								);
									
							}else{
								
								$this->lista[$i]=array("cedula" => $fila["cod_asp"],
								"titulo" => $fila["nom_ttl"],
								"nivel" => $fila["nom_nivel"],
								"cargo" => $fila["nom_cargo"],
								"areas" => $fila["areas"],
								"funciones" => $fila["FUNCIONES_ASP"],							
								"nombre" => $fila["nombre"],							
								"correo" => $fila["correo"],
								"contrasena" => $fila["contrasena"]
								);	

								$cod_temp=$fila["cod_asp"];
								
								
							
							}
						
							$i++;
						
						
		
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


		
		public function aspirantes_nocumple(){


			try { 
				global $conn;

				//$sql="select correo, contrasena,* from sp_hv_basic, selec_usuario_nuevo WHERE COD_ASP=cedula ";
				
				$sql="select a.cod_asp, 
				desc_ttp as nom_ttl, 
				nombre_niv as nom_nivel,
				a.nombre_cargo_nu as nom_cargo,
				areas,  
				FUNCIONES_ASP,
				rtrim(e.nombre)+' '+rtrim(e.apellidos) as nombre,
				e.correo, e.contrasena, e.estado
				from sp_hv_experiencia a, educacion_asp b, cargos_anidados d, titulos, estado_estudio, selec_usuario_nuevo e
				where a.COD_ASP=b.COD_ASP and d.id=cod_cargo and  cod_ttp=cod_titulo and  codigo=cod_est and a.COD_ASP=e.cedula
				and e.estado='No Cumple'";


												
				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

						$i=0;
						$cod_temp='0';
						

						while($fila=$rs->FetchRow()){
						
						
							if($fila["cod_asp"]==$cod_temp){
							
																
								$this->lista[$i=$i-1]=array("cedula" =>$fila["cod_asp"],
								"titulo" => $this->lista[$i]['titulo'].','.$fila["nom_ttl"],
								"nivel" => $this->lista[$i]['nivel'].','.$fila["nom_nivel"],
								"cargo" => $this->lista[$i]['cargo'].','.$fila["nom_cargo"],
								"areas" => $this->lista[$i]['areas'].','.$fila["areas"],
								"funciones" => $this->lista[$i]['funciones'].','.$fila["FUNCIONES_ASP"],							
								"nombre" => $fila["nombre"],							
								"correo" => $fila["correo"],
								"contrasena" => $fila["contrasena"]												
								);
									
							}else{
								
								$this->lista[$i]=array("cedula" => $fila["cod_asp"],
								"titulo" => $fila["nom_ttl"],
								"nivel" => $fila["nom_nivel"],
								"cargo" => $fila["nom_cargo"],
								"areas" => $fila["areas"],
								"funciones" => $fila["FUNCIONES_ASP"],							
								"nombre" => $fila["nombre"],							
								"correo" => $fila["correo"],
								"contrasena" => $fila["contrasena"]
								);	

								$cod_temp=$fila["cod_asp"];
								
								
							
							}
						
							$i++;
						
						
		
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

		
		public function aspirante_seleccionado(){


			try { 
				global $conn;

				//$sql="select correo, contrasena,* from sp_hv_basic, selec_usuario_nuevo WHERE COD_ASP=cedula ";
				
				$sql="select a.cod_asp, 
				desc_ttp as nom_ttl, 
				nombre_niv as nom_nivel,
				d.nombre as nom_cargo,
				areas,  
				FUNCIONES_ASP,
				rtrim(e.nombre)+' '+rtrim(e.apellidos) as nombre,
				e.correo, e.contrasena, e.estado
				from sp_hv_experiencia a, educacion_asp b, cargos_anidados d, titulos, estado_estudio, selec_usuario_nuevo e
				where a.COD_ASP=b.COD_ASP and d.id=cod_cargo and  cod_ttp=cod_titulo and  codigo=cod_est and a.COD_ASP=e.cedula
				and e.estado='Seleccionado'";


												
				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

						$i=0;
						$cod_temp='0';
						

						while($fila=$rs->FetchRow()){
						
						
							if($fila["cod_asp"]==$cod_temp){
							
																
								$this->lista[$i=$i-1]=array("cedula" =>$fila["cod_asp"],
								"titulo" => $this->lista[$i]['titulo'].','.$fila["nom_ttl"],
								"nivel" => $this->lista[$i]['nivel'].','.$fila["nom_nivel"],
								"cargo" => $this->lista[$i]['cargo'].','.$fila["nom_cargo"],
								"areas" => $this->lista[$i]['areas'].','.$fila["areas"],
								"funciones" => $this->lista[$i]['funciones'].','.$fila["FUNCIONES_ASP"],							
								"nombre" => $fila["nombre"],							
								"correo" => $fila["correo"],
								"contrasena" => $fila["contrasena"]												
								);
									
							}else{
								
								$this->lista[$i]=array("cedula" => $fila["cod_asp"],
								"titulo" => $fila["nom_ttl"],
								"nivel" => $fila["nom_nivel"],
								"cargo" => $fila["nom_cargo"],
								"areas" => $fila["areas"],
								"funciones" => $fila["FUNCIONES_ASP"],							
								"nombre" => $fila["nombre"],							
								"correo" => $fila["correo"],
								"contrasena" => $fila["contrasena"]
								);	

								$cod_temp=$fila["cod_asp"];
								
								
							
							}
						
							$i++;
						
						
		
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

		public function otras_pruebas($cedula,$prueba){


			try { 
				global $conn;



					$sql="select ruta,detalle from solicitud_req where ruta like '%".$prueba."%' and cod_epl='".$cedula."'";
				
					$r=$conn->Execute($sql);
					$f=$r->FetchRow();

					if($r->RecordCount() > 0){
					

					 $this->lista[]=array(
							 "ruta"=>@$f["ruta"],
							 "detalle"=>@$f["detalle"]);

					 	return $this->lista;


					}else{


						return null;



					}

			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 






		}



		public function lista_pruebaAsp($cedula){

			try { 
				global $conn;

				
				$sql="select  a.cod_asp,c.id, c.nombre_prueba, b.id_grupo,c.tabla from EDUCACION_ASP as a, pruebas_asp_gru as b, pruebas_seleccion c
					  where COD_EST=id_grupo and id_prueba=c.id and COD_ASP='$cedula'";
		
				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){


					while($fila=$rs->FetchRow()){

						
						$sql3="select observacion_1 from informe_integral where cod_asp='".$fila["cod_asp"]."'";
							$q=$conn->Execute($sql3);
							$p=$q->FetchRow();


						if($fila["nombre_prueba"]=='CMT'  || $fila["nombre_prueba"]=='Wartegg' || $fila["nombre_prueba"]=='16pf'){



							$sql2="select ruta,detalle from solicitud_req where ruta like '%".$fila["nombre_prueba"]."%' and cod_epl='".$fila["cod_asp"]."'";

							
							
							$r=$conn->Execute($sql2);
							$f=$r->FetchRow();



							$this->lista[]=array("id" => $fila["id"],
								 "nombre_prueba"=>$fila["nombre_prueba"],
								 "id_grupo"=>$fila["nombre_prueba"],
								 "cedula"=>$fila["cod_asp"],
								 "tabla"=>$fila["tabla"],
								 "ruta"=>@$f["ruta"],
								 "detalle"=>@$f["detalle"],
								 "observacion_1"=>@$p["observacion_1"]	
							);

							

						}else{



							$this->lista[]=array("id" => $fila["id"],
								 "nombre_prueba"=>$fila["nombre_prueba"],
								 "id_grupo"=>$fila["nombre_prueba"],
								 "cedula"=>$fila["cod_asp"],
								 "tabla"=>$fila["tabla"],
								 "ruta"=>"",
								 "observacion_1"=>@$p["observacion_1"]
							);


						}

						
	
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




		public function traer_ruta($cedula){


			try { 
				global $conn;

				
				$sql="select ruta from solicitud_req where cod_epl='".$cedula."'";

				$rs=$conn->Execute($sql);


				if($rs->RecordCount() > 0){

						while($fila=$rs->FetchRow()){
							$this->lista[]=array("ruta" => $fila["ruta"]
										 
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



		public function puntaje_bg3($cedula){


			try { 
				global $conn;

				
				$sql="select *, convert(varchar,fecha,105)as fecha from bg3_puntuacion where cod_asp='$cedula'";

								
				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

						while($fila=$rs->FetchRow()){
							$this->lista[]=array("cedula" => $fila["cod_asp"],
										 "pd"=>$fila["pd"],
										 "pc"=>$fila["pc"],
										 "fecha"=>$fila["fecha"]
															
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


		public function puntaje_letras($cedula){


			try { 
				global $conn;

				
				$sql="select *, convert(varchar,fecha,105)as fecha from letras_puntuacion where cod_asp='$cedula'";

								
				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

						while($fila=$rs->FetchRow()){
							$this->lista[]=array("cedula" => $fila["cod_asp"],
										 "pd"=>$fila["pd"],
										 "pc"=>$fila["pc"],
										 "fecha"=>$fila["fecha"]
															
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


		public function puntaje_aprendizaje($cedula){


			try { 
				global $conn;

				
				$sql="select *, convert(varchar,fecha,105)as fecha from aprendizaje_puntuacion where cod_asp='$cedula'";

								
				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

						while($fila=$rs->FetchRow()){
							$this->lista[]=array("id" => $fila["id"],
										"cedula" => $fila["cod_asp"],
										 "auditivo"=>$fila["Auditivo"],
										 "visual"=>$fila["Visual"],
										 "kinestesico"=>$fila["Kinestesico"],
										 "logico"=>$fila["logico"],
										 "logico"=>$fila["logico"],
										 "holistico"=>$fila["holistico"],
										 "resultado"=>$fila["resultado"],
										 "fecha"=>$fila["fecha"]
															
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


		public function puntaje_temperamento($cedula){


			try { 
				global $conn;

				
				$sql="select *, convert(varchar,fecha,105)as fecha from temperamento_puntuacion where cod_asp='$cedula'";

								
				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

						while($fila=$rs->FetchRow()){
							$this->lista[]=array("id" => $fila["id"],
										"cedula" => $fila["cod_asp"],
										 "sanguineo"=>$fila["sanguineo"],
										 "colerico"=>$fila["colerico"],
										 "melancolico"=>$fila["melancolico"],
										 "flematico"=>$fila["flematico"],
										 "resultado"=>$fila["resultado"],
										 "fecha"=>$fila["fecha"]															
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
		
		public function  puntaje_caras($cedula){
		
			try { 
				global $conn;

				
				$sql="select *, convert(varchar,fecha,105)as fecha from caras_puntuacion where cod_asp='$cedula'";

								
				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

						while($fila=$rs->FetchRow()){
							$this->lista[]=array(
										 "cedula"=>$fila["cod_asp"],
										 "pd"=>$fila["pd"],
										 "pc"=>$fila["pc"],
										 "fecha"=>$fila["fecha"]																	
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

		public function puntaje_dieciseispf($cedula){


			try { 
				global $conn;

				
				$sql="select *, convert(varchar,fecha,105)as fecha from dieciseispf_resp_puntuacion where cod_aspirante='$cedula'";

								
				$rs=$conn->Execute($sql);

				if($rs->RecordCount() > 0){

						while($fila=$rs->FetchRow()){
							$this->lista[]=array("id" => $fila["id"],
										"cedula" => $fila["cod_aspirante"],
										 "dm"=>$fila["dm"],
										 "A"=>$fila["A"],
										 "B"=>$fila["B"],
										 "C"=>$fila["C"],
										 "E"=>$fila["E"],
										 "F"=>$fila["F"],
										 "G"=>$fila["G"],
										 "H"=>$fila["H"],
										 "I"=>$fila["I"],
										 "L"=>$fila["L"],
										 "M"=>$fila["M"],
										 "N"=>$fila["N"],
										 "O"=>$fila["O"],
										 "Q1"=>$fila["Q1"],
										 "Q2"=>$fila["Q2"],
										 "Q3"=>$fila["Q3"],
										 "Q4"=>$fila["Q4"],
										 "fecha"=>$fila["fecha"],																	
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



		
		public function vacantes_aspirantes(){
			
			try { 
				global $conn;
				$sql="
					select codigo, cod_cargo, nom_car 
					from vacantes_gh vac, cargos car 
					where vac.cod_cargo=car.cod_car and vac.estado='PROC'";
						
				$rs=$conn->Execute($sql);
				if($rs->RecordCount() > 0){

						while($fila=$rs->FetchRow()){
							$this->lista[]=array("cod_cargo" => $fila["cod_cargo"],
										"nom_car" => $fila["nom_car"]
										 																	
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


		public function enviar_pruebaAsp($cedula,$vacante){

			try { 
				global $conn;

				$sql="insert into asp_vac(cod_asp,cod_vac, estado) values('".$cedula."','".$vacante."', 'CPE')";
				
				$rs=$conn->Execute($sql);
				
				if($rs){


					$sql2="update selec_usuario_nuevo set estado='CPE' where cedula='".$cedula."'";

					$rs2=$conn->Execute($sql2);

					if($rs2){
						return true;


					}else{
						
						return false;

					}

					
				
				}else{
					// el 0 es porque no se ingreso
					return false;
				}
	
			}catch (exception $e) { 

			   var_dump($e); 

			   adodb_backtrace($e->gettrace());

			} 
			
		
		}
		
		
		
	
		public function ing_form_ini($deci_fam,$acti_fam,$difi_fam,$afron_fam,$prin_fam,$logro_fam,$print_fam,
			$desc_per,$forta_per,$salud_per,$psico_text_per,$vincu_per,$situa_per,$meta_per,$logra_per,$prob_per,$psico_per,$cod_epl){
			
			
			try { 
				global $conn;

				$sql="insert into form_inicial_pruebas(deci_fam,acti_fam,difi_fam,afron_fam,prin_fam,logro_fam,
				print_fam,desc_per,forta_per,salud_per,psico_text_per,vincu_per,situa_per,meta_per,logra_per,
				prob_per,psico_per,cod_asp) values('".$deci_fam."','".$acti_fam."','".$difi_fam."','".$afron_fam."','".$prin_fam."','".$logro_fam."',
				'".$print_fam."','".$desc_per."','".$forta_per."','".$salud_per."','".$psico_text_per."','".$vincu_per."','".$situa_per."','".$meta_per."',
				'".$logra_per."','".$prob_per."','".$psico_per."','".$cod_epl."')";
				
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
		
		
		public function traer_form_inicial($cedula){


			try { 
				global $conn;



					$sql="select * from form_inicial_pruebas where cod_asp='".$cedula."'";
				
					$r=$conn->Execute($sql);
					$f=$r->FetchRow();

					if($r->RecordCount() > 0){
					

					 $this->lista[]=array(
							 "deci_fam"=>@$f["deci_fam"],
							 "acti_fam"=>@$f["acti_fam"],
							 "difi_fam"=>@$f["difi_fam"],
							 "afron_fam"=>@$f["afron_fam"],
							 "prin_fam"=>@$f["prin_fam"],
							 "logro_fam"=>@$f["logro_fam"],
							 "print_fam"=>@$f["print_fam"],
							 "desc_per"=>@$f["desc_per"],
							 "forta_per"=>@$f["forta_per"],
							 "salud_per"=>@$f["salud_per"],
							 "psico_text_per"=>@$f["psico_text_per"],
							 "vincu_per"=>@$f["vincu_per"],
							 "situa_per"=>@$f["situa_per"],
							 "meta_per"=>@$f["meta_per"],
							 "logra_per"=>@$f["logra_per"],
							 "prob_per"=>@$f["prob_per"],
							 "psico_per"=>@$f["psico_per"],
							 "cod_asp"=>@$f["cod_asp"],
							 "autori_per"=>@$f["autori_per"],
							 
							 );

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