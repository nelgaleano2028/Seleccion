<?php
session_start();
include_once("../librerias/lib/connection.php");
		
		
$codigo = @$_SESSION['cod_epl']; //Codigo empleado del perfil
$nom_admin = @$_SESSION['usuario'];//Usuario
$privilegio=@$_SESSION['privi'];//Privilegio


$actual = $_POST["passv"];//Contraseña Actual la que quiere cambiar

$passn = $_POST["nue_cont"];//Nueva Contraseña
$pass = $_POST["pass"];//La confirmacion de la nueva contraseña


$sql="select * from t_admin_seleccion where nom_admin='".$nom_admin."'";
$rs = $conn->Execute($sql);
$row = $rs->fetchrow();
$cod_epl=$row['nom_admin'];
$contrasena=$row['contrasena'];
 



if(empty($cod_epl)){
$sql="select cod_epl from acc_usuarios where usuario='".$nom_admin."' and cod_gru_prg in('SELECCIONJEF','SELECCIONHE','SELECCION', 'SELECCIONGE', 'SELECCIONCO')";
$rs = $conn->Execute($sql);
$row = $rs->fetchrow();
$cod_epl=$row['cod_epl']; 


if($actual != $cod_epl){

	echo "1";
}else{

	$query = "INSERT INTO t_admin_seleccion(nom_admin,contrasena,privilegio,cod_epl) VALUES ('".$nom_admin."','".$passn."',
	'".$privilegio."','".$codigo."')";
    $rs2 = @$conn->Execute($query);
	
	
	
	if($rs2){
		echo $privilegio;
	}else{
		echo "al Insertar los Datos";
	}
}
}else{

	if($actual != $contrasena){
		
		echo "1";
	
	}else{
	$query = "update t_admin_seleccion set contrasena='".$passn."' where  nom_admin='".$nom_admin."'";
    $rs2 = @$conn->Execute($query);
	
	if($rs2){
		echo "2";
	}else{
		echo "al Modificar su Contrase&ntilde;a";
	}
	}



}
?>  