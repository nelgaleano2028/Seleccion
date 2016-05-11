<?php session_start();
require_once("class_administracion.php");


$obj= new Administracion();

$rs= $obj->ing_form_ini($_POST['deci_fam'],$_POST['acti_fam'],$_POST['difi_fam'],$_POST['afron_fam'],$_POST['prin_fam'],$_POST['logro_fam'],
$_POST['print_fam'],$_POST['desc_per'],$_POST['forta_per'],$_POST['salud_per'],$_POST['psico_text_per'],$_POST['vincu_per'],$_POST['situa_per'],
$_POST['meta_per'],$_POST['logra_per'],$_POST['prob_per'],$_POST['psico_per'],$_SESSION['cod_epl']);


if($rs==true){

	echo true;

}else{

	echo false;

}

