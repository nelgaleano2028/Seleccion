<?php require_once("../librerias/lib/connection.php");


	class Utilidades{
	
		private $fecha='';
		private $utilidad;
	
		public function mesEsp($mes){
		
			switch($mes){
				
				case '01':
					$this->utilidad='Enero';
					break;
				case '02':
					$this->utilidad='Febrero';
					break;
				case '03':
					$this->utilidad='Marzo';
					break;
				case '04':
					$this->utilidad='Abril';
					break;
				case '05':
					$this->utilidad='Mayo';
					break;
				case '06':
					$this->utilidad='Junio';
					break;
				case '07':
					$this->utilidad='Julio';
					break;
				case '08':
					$this->utilidad='Agosto';
					break;
				case '09':
					$this->utilidad='Septiembre';
					break;
				case '10':
					$this->utilidad='Octubre';
					break;
				case '11':
					$this->utilidad='Noviembre';
					break;
				case '12':
					$this->utilidad='Diciembre';
					break;

			}
			
				return $this->utilidad;
		
		
		}
		
		public function formatFecha($fecha){

			unset($this->fecha);
			
			global $conn;
			
			$sql="select @@language as lenguaje";
			$rs=$conn->Execute($sql);
			$fila=$rs->FetchRow();
			$language=utf8_encode($fila['lenguaje']);
		

			
			$anio=substr($fecha,6, 4);
			$mes=substr($fecha, 3, 2);
			$dia=substr($fecha, 0, 2);
			
			
			
			switch($language){
				
				 case 'us_english':
					$fecha=$mes.'-'.$dia.'-'.$anio.' 00:00:00.000';
					
				 break;
				 
				 case 'Español':
					
					$fecha=$dia.'-'.$mes.'-'.$anio.' 00:00:00.000';


				 
				 break;
				
			}
			
			return $this->fecha=$fecha;
		}



		public function arreglarFecha($fecha){


			$fec_espacio=explode(" ",$fecha);
			$fec_separar=explode("-",$fec_espacio[0]);
			$fec=$fec_separar[2]."-".$fec_separar[1]."-".$fec_separar[0];


			return $fec;

		}


	}