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
                            <!--<li><a  tabindex="-1" href="#formulario1" class="text">formulario1</a></li>
                            <li><a tabindex="-1" href="#formulario2" class="text">formulario2</a></li>
                            <li><a tabindex="-1" href="#formulario3" class="text">formulario3</a></li>-->
							<li><a tabindex="-1" id="inicial" href="#Solicitudes_Requisicion_Interna" class="text">SOLICITUDES REQUISICION DE PERSONAL</a></li>
							<li><a tabindex="-1" href="#Solicitudes_Requisicion_Rechazadas" class="text">SOLICITUDES REQUISICION RECHAZADAS</a></li>
							<li><a tabindex="-1" href="#Solicitudes_Requisicion_Aprobadas" class="text">REQUISICION APROBADAS A SOLUCIONAR</a></li>
							<li><a tabindex="-1" href="#Solicitudes_Requisicion_Aprobadas_Pendientes" class="text">REQUISICION APROBADAS Y PENDIENTES</a></li>
							<li><a tabindex="-1" href="#vacantes_avila" class="text">REQUISICION APROBADAS Y EN PROCESO</a></li>
							<li><a tabindex="-1" href="#Solicitudes_Requisicion_Aprobadas_Cerrada" class="text">REQUISICION APROBADAS Y CERRADAS</a></li>
							
							<!--<li><a tabindex="-1" href="#todos_aspirantes" class="text">VER ASPIRANTES</a></li>-->
                            
                            
                            <li class="divider"></li>                            
                            <li><a tabindex="-1" href="#cerrar" class="text">Cerrar Sesi&oacute;n</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="#"><span id="titulo" class="first">SOLICITUDES REQUISICION DE PERSONAL</span></a>
            </div>
        </div>
    </div>
    <div id="content"></div>
    
    
    <script src="../../js/jquery-1.10.1.min.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
    <script src="../../js/bootstrap.min.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>	
    <script src="../../js/funciones.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
     
    
  </body>
</html>