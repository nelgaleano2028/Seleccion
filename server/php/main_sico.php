<?php 
session_start();
?>
<html>
  <head>
    <title>Seleccion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
   <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/style.css"  />
    <link rel="stylesheet" href="../../css/font-awesome/css/font-awesome.css" />
	<style type="text/css" title="currentStyle">
		@import "../../js/DataTables/extras/TableTools/media/css/TableTools.css";
		@import "../../js/DataTables/extras/TableTools/media/css/TableTools_JUI.css";
		@import "../../js/DataTables/media/css/demo_page.css";
		@import "../../js/DataTables/media/css/demo_table_jui.css";
		@import "../../js/DataTables/media/css/jquery-ui-1.8.4.custom.css";

		#example_filter{
			display:none;
		}
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
							<li><a tabindex="-1" href="#agregar_tiempo" class="text">MODIFICAR TIEMPOS PRUEBAS</a></li>
                                                        
                            <li><a tabindex="-1" href="#asignar_prueba" class="text">ASIGNAR PRUEBA A UN GRUPO</a></li>
                                                             
                            <li><a tabindex="-1" href="#consultar_inf" class="text">CREAR INFORME FINAL</a></li>
                                
                            <li><a tabindex="-1" href="#editar_inf" class="text">EDITAR INFORME FINAL</a></li>
                               
                            <li><a tabindex="-1" href="#admin_cmt" class="text">RESULTADOS CMT</a></li>
							
                            <li><a tabindex="-1" href="#admin_16pf" class="text">RESULTADOS 16PF</a></li>

                            <li><a tabindex="-1" href="#solicitud_2" class="text">ADJUNTAR PRUEBA</a></li>
							
							<li><a tabindex="-1" id="inicial" href="#Solicitudes_vacantes" class="text"> VER VACANTES</a></li>
							
							
							
							<li><a tabindex="-1" href="#Solicitudes_vacantes" class="text">IMPRIMIR INFORME INTEGRAL</a></li>
							   
							<li><a tabindex="-1" href="#cargos" class="text">INGRESAR CARGOS</a></li>
							
							<li><a tabindex="-1" href="#vacantes_avila_ver_jimenez" class="text">ASPIRANTES ENVIADOS A CONCURSAR</a></li>
								

                            <li class="dropdown-submenu"><a tabindex="-1" href="#" class="text">ASPIRANTES H.V.</a>
                                        <ul class="dropdown-menu">
											<li><a tabindex="-1" href="#bancos" class="text">BANCOS</a></li>
                                            <li><a tabindex="-1" href="#vida" class="text">CON PROCESO</a></li>
											
                                            <li><a tabindex="-1" href="#vida_sinproceso" class="text">SIN PROCESO</a></li>
                                            <li><a tabindex="-1" href="#vida_preseleccionado" class="text">PRE SELECCIONADOS</a></li>
                                            <li><a tabindex="-1" href="#vida_nocumple" class="text">NO CUMPLE</a></li>
                                            <li><a tabindex="-1" href="#vida_seleccionados" class="text">SELECCIONADOS</a></li>
											
                                        </ul>


                            </li>
							
							<li class="dropdown-submenu"><a tabindex="-1" href="#" class="text">CATALOGOS</a>
                                        <ul class="dropdown-menu">

                                           <!-- <li><a tabindex="-1" href="#crud_vista_ciudades" class="text">CIUDADES</a></li>-->
											<li><a tabindex="-1" href="#crud_vista_comp" class="text">COMPETENCIAS</a></li>
											<li><a tabindex="-1" href="#crud_vista_profesiones" class="text">PROFESIONES</a></li>
											<li><a tabindex="-1" href="#crud_vista_sector" class="text">SECTORES</a></li>
                                           
                                        </ul>


                            </li>
							
							

                                                    
                            <li class="divider"></li>
                            <li><a tabindex="-1" href="#nuevopass" class="text">Cambiar Contrase&ntilde;a</a></li>
                            <li><a tabindex="-1" href="#cerrar" class="text">Cerrar Sesi&oacute;n</a></li>
                        </ul>
                    </li>
                    
                </ul> 
                <a class="brand" href="#"><span id="titulo" class="first">Sicologo</span></a>
            </div>
        </div>
    </div>
    <div id="content"></div>
    
    <script src="../../js/jquery-1.10.1.min.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
	<script type="text/javascript" src="../../js/jquery-ui.min.js"></script>  
    <script src="../../js/bootstrap.min.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
	<script type="text/javascript" charset="utf-8" src="../../js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="../../js/DataTables/extras/TableTools/media/js/ZeroClipboard.js"></script>
	<script type="text/javascript" charset="utf-8" src="../../js/DataTables/extras/TableTools/media/js/TableTools.js"></script>
    <script src="../../js/funciones.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
      
  </body>
</html>