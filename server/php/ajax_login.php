<?php 
include_once("../librerias/lib/connection.php");
	
	
$usuario = $_POST["usuario"];
$pass = $_POST["clave"];




//Aspirantes con Usuario: email y Contraseña
$query = "SELECT nombre, apellidos, cedula, correo, contrasena, fecha, estado,  COD_EST
		FROM selec_usuario_nuevo, educacion_asp 
		WHERE correo = '$usuario'  and COD_ASP=cedula and  estado='Preseleccionado'";
		
		$rs = $conn->Execute($query);
		$row3 = $rs->fetchrow();
        $correopass = $row3['correo'];
		$contrasenapass = $row3['contrasena'];

//Usuario y Contraseña por defecto de la tabla acc_usuarios ingresando por primera vez al aplicativo (SELECCIONJEF - SELECCIONHE - SELECCION - SELECCIONGE -- SELECCIONCO) 		
$query1 = "select usuario, cod_epl, cod_gru_prg from acc_usuarios where usuario = '$usuario' and cod_gru_prg in('SELECCIONJEF','SELECCIONHE','SELECCION', 'SELECCIONGE', 'SELECCIONCO')";
		
		$rs1 = $conn->Execute($query1);
		$row1 = $rs1->fetchrow();
        $correopass1 = $row1['usuario']; //Usuario
		$contrasenapass1 = $row1['cod_epl']; //Contraseña
		$privi = $row1['cod_gru_prg']; //Privilegio segun cod_gru_prg en acc_usuarios
		
	
	
	

//Usuario y Contraseña de la tabla t_admin_seleccion para SELECCIONJEF - SELECCIONHE - SELECCION - SELECCIONGE -- SELECCIONCO con su contraseña cambiada		
$query2 = "select nom_admin, contrasena, privilegio, cod_epl from t_admin_seleccion where nom_admin = '$usuario'";
		
		//var_dump($query2);die("ddd");
		
		
		$rs2 = $conn->Execute($query2);
		$row2 = $rs2->fetchrow();
        $correopass2 = $row2['nom_admin']; //Usuario
		$contrasenapass2 = $row2['contrasena']; //Contraseña
		$privi = $row2['privilegio']; //Privilegio segun(SELECCIONJEF - SELECCIONHE - SELECCION - SELECCIONGE -- SELECCIONCO)
		$cod_epl = $row2['cod_epl']; //codigo
		
		
if($correopass == $usuario && $contrasenapass == $pass){
		
		session_start();
		
		$_SESSION['usuario'] = $row3['correo'];
        $_SESSION['cod_epl'] = $row3['cedula'];
        $_SESSION['nombre'] = $row3['nombre'];
		$_SESSION['apellidos'] = $row3['apellidos'];
		$_SESSION['grupo'] = $row3['COD_EST'];
		
		
		echo "7";
		//header("Location:main_asp.php");
		
		
}elseif ($correopass1 == $usuario && $contrasenapass1 == $pass && empty($contrasenapass2)) { //Validacion PERFILES a su respectivo Main si no ha cambiado su password por primera vez

		
		session_start();
		
		$_SESSION['usuario'] = $row1['usuario'];
        $_SESSION['cod_epl'] = $row1['cod_epl'];
        $_SESSION['privi'] = $row1['cod_gru_prg'];
		$_SESSION['nom'] = $row1['usuario'];
		
		
		echo "2";
		//header("Location:nuevopass.php");

}elseif ($correopass2 == $usuario && $contrasenapass2 == $pass && $privi=='SELECCIONJEF') { // Validacion de RHERRERA JEFES
		
		session_start();
        
		//$_SESSION['nom'] = $row2['nom_admin'];
		$_SESSION['pas'] = $row2['contrasena'];
     	$_SESSION['privi'] = $row2['privilegio'];
		$_SESSION['cod_epl'] = $row2['cod_epl'];
		$_SESSION['usuario'] = $row2['nom_admin'];
		
		echo "3";
		//header("Location:main_jefe.php");
		
}elseif ($correopass2 == $usuario && $contrasenapass2 == $pass && $privi=='SELECCIONHE') {  //Validacion de TURNOSHE SICOLOGO VALERY
		
		session_start();
        
		//$_SESSION['nom'] = $row2['nom_admin'];
		$_SESSION['pas'] = $row2['contrasena'];      
		$_SESSION['privi'] = $row2['privilegio'];
		$_SESSION['cod_epl'] = $row2['cod_epl'];
		$_SESSION['usuario'] = $row2['nom_admin'];
		
		echo "4";
		//header("Location:main_sico.php");
}

elseif ($correopass2 == $usuario && $contrasenapass2 == $pass && $privi=='SELECCION') { 
		
		session_start();
        
		//$_SESSION['nom'] = $row2['nom_admin'];
		$_SESSION['pas'] = $row2['contrasena'];
       	$_SESSION['privi'] = $row2['privilegio'];
		$_SESSION['cod_epl'] = $row2['cod_epl'];
		$_SESSION['usuario'] = $row2['nom_admin'];
		
		echo "5";
		//header("Location:main_gh.php");
		
}

elseif ($correopass2 == $usuario && $contrasenapass2 == $pass && $privi=='SELECCIONGE') { 
		
		session_start();
        
		//$_SESSION['nom'] = $row2['nom_admin'];
		$_SESSION['pas'] = $row2['contrasena'];
       	$_SESSION['privi'] = $row2['privilegio'];
		$_SESSION['cod_epl'] = $row2['cod_epl'];
		$_SESSION['usuario'] = $row2['nom_admin'];
		
		echo "1";
		//header("Location:main_gerencia.php");
		
}

elseif ($correopass2 == $usuario && $contrasenapass2 == $pass && $privi=='SELECCIONCO') { 
		
		session_start();
        
		//$_SESSION['nom'] = $row2['nom_admin'];
		$_SESSION['pas'] = $row2['contrasena'];
       	$_SESSION['privi'] = $row2['privilegio'];
		$_SESSION['cod_epl'] = $row2['cod_epl'];
		$_SESSION['usuario'] = $row2['nom_admin'];
		
		echo "6";
		//header("Location:main_coor.php");
		
}

elseif ($correopass2 == $usuario && $contrasenapass2 == $pass && $privi=='ADMIN') { 
		
		session_start();
        
		//$_SESSION['nom'] = $row2['nom_admin'];
		$_SESSION['pas'] = $row2['contrasena'];
       	$_SESSION['privi'] = $row2['privilegio'];		
		$_SESSION['usuario'] = $row2['nom_admin'];
		
		echo "8";
		//header("Location:main_admin.php");
		
}

else{
	echo "El usuario no existe en el momento";
}
$conn->Close();
?>
	
	
