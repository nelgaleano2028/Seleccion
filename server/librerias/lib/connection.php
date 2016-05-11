<?php
	   include_once("adodb/adodb.inc.php");
	   
	   include_once("adodb/adodb-exceptions.inc.php");
       include_once("adodb/adodb-error.inc.php");
	   
	   $odbc="odbc_mssql";
	   $user = "";
	   $pass = "";
	   
	   $is_connect = false;
	   
	   try{
	  
	    $conn = ADONewConnection($odbc);
	    $dsn = "Driver={SQL Server};Server=LENOVO-PC\SQLEXPRESS;Database=talentoCMI;";
		$conn->Connect($dsn,'','');
	    $conn->SetFetchMode(ADODB_FETCH_ASSOC);
	   
	   		if($conn->isConnected()){				 
		  		 $is_connect=true;				
	   		}else{ 
				die("Error al conectar con la base de datos");
	   			$is_connect=false;
			}
	   }catch (exception  $e) 
	   { 
	      die($e->getMessage());
	     
	   }
?>