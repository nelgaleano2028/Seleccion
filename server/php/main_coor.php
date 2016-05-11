<?php 
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Seleccion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/style.css"  />
    <link rel="stylesheet" href="../../css/font-awesome/css/font-awesome.css" />
    <link type="text/css" href="../../jquery-ui-1.8.18.custom.css" rel="Stylesheet" id="linkestilo" /> 
	<style type="text/css" title="currentStyle">
			@import "../../js/DataTables/extras/TableTools/media/css/TableTools.css";
			@import "../../js/DataTables/extras/TableTools/media/css/TableTools_JUI.css";
			@import "../../js/DataTables/media/css/demo_page.css";
			@import "../../js/DataTables/media/css/demo_table_jui.css";
			@import "../../js/DataTables/media/css/jquery-ui-1.8.4.custom.css";
		</style>	
  </head>
  <body id="main">
      
      <div class="navbar">
        <div class="navbar-inner">
            <div class="container-fluid">
                <ul class="nav pull-right">
                    
                    <li class="dropdown">
                        <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> <?php echo $_SESSION['usuario'] ?>
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <!--<li><a tabindex="-1" id="inicial" href="#solicitud_1" class="text">Solicitudes Nuevo Cargo</a></li>                            
                            <li><a tabindex="-1" href="#solicitud_javier_confirmadas" class="text">Solicitudes Nuevo Cargo Confirmadas</a></li>
							<li><a tabindex="-1" href="#solicitud_javier_rechazadas" class="text">Solicitudes Nuevo Cargo Rechazadas</a></li>-->
							
							<li><a tabindex="-1" href="#Requisicion_Interna" class="text">REQUISICION DE PERSONAL</a></li>                           
							
							<li><a tabindex="-1" href="#Solicitudes_Internas_Rechazadas" class="text">SOLICITUDES DE PERSONAL RECHAZADAS</a></li>
							<li><a tabindex="-1" href="#Solicitudes_Internas_Confirmadas" class="text">SOLICITUDES DE PERSONAL CONFIRMADAS</a></li>
                            <li><a tabindex="-1" href="#Requisicion_Nuevo_Cargo2" class="text">REQUISICION NUEVA PLAZA</a></li>
							
                            <li><a id="inicial" tabindex="-1" href="#solicitud_1_3" class="text">SOLICITUDES NUEVA PLAZA</a></li>  
								
                            <li><a tabindex="-1" href="#solicitud_javier_confirmadas_3_plaza" class="text">SOLICITUDES NUEVA PLAZA CONFIRMADAS</a></li>
                            <li><a tabindex="-1" href="#solicitud_javier_rechazadas_3_plaza" class="text">SOLICITUDES NUEVA PLAZA RECHAZADAS</a></li>
                            <!--<li><a tabindex="-1" href="#solicitud_javier_rechazadas_3" class="text">Solicitudes Nueva Plaza Rechazadas</a></li>-->
							
							<li><a tabindex="-1" href="#Requisicion_Nuevo_Cargo3" class="text">REQUISICION NUEVO CARGO</a></li> 
							
                            <li><a tabindex="-1" id="inicial" href="#solicitud_1_2" class="text">SOLICITUDES NUEVO CARGO</a></li>                            
                            <li><a tabindex="-1" href="#solicitud_javier_confirmadas_2" class="text">SOLICITUDES NUEVO CARGO CONFIRMADAS</a></li>
                            <li><a tabindex="-1" href="#solicitud_javier_rechazadas_2_cargo_nuevo" class="text">SOLICITUDES NUEVO CARGO RECHAZADAS</a></li>
							<li><a tabindex="-1" href="#work_flow_trejo" class="text">SEGUIMIENTO</a></li>
							
							
							
							
							 <li class="dropdown-submenu"><a tabindex="-1" href="#" class="text">GRAFICA VACANTES</a>
                                        <ul class="dropdown-menu">

                                            <li><a tabindex="-1" href="#estado_trejo" class="text">ESTADOS ACTUALES</a></li>
                                            <li><a tabindex="-1" href="#historial" class="text">HISTORIAL</a></li>
											<li><a tabindex="-1" href="#historial_cerrados" class="text">CERRADOS</a></li>
                                         
                                        </ul>


                            </li>
							
                     
                            <li class="divider"></li>
                            <li><a tabindex="-1" href="#nuevopass" class="text">Cambiar Contrase&ntilde;a</a></li>
                            <li><a tabindex="-1" href="#cerrar" class="text">Cerrar Sesi&oacute;n</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="#"><span id="titulo" class="first">Javier</span></a>
            </div>
        </div>
    </div>
    <div id="content"></div>
    
    <script src="../../js/jquery-1.10.1.min.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
	<script type="text/javascript" src="../../js/jquery-ui.min.js"></script>
    <script src="../../js/bootstrap.min.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
	<script type="text/javascript" language="javascript" src="../../js/DataTables/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf-8" src="../../js/DataTables/extras/TableTools/media/js/ZeroClipboard.js"></script>
	<script type="text/javascript" charset="utf-8" src="../../js/DataTables/extras/TableTools/media/js/TableTools.js"></script>
	<script type="text/javascript" language="javascript" src="../../js/charts/highcharts.js"></script>
    <script type="text/javascript" language="javascript" src="../../js/charts/modules/exporting.js"></script>
	<script src="../../js/funciones.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
    
  </body>
</html>