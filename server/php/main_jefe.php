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
							<li><a id="inicial" tabindex="-1" href="#Requisicion_Descripciones" class="text">MENU DE REQUISICION</a></li>
                            <li><a tabindex="-1" href="#Requisicion_Interna" class="text">REQUISICION DE PERSONAL</a></li>                           
							<li><a tabindex="-1" href="#Solicitudes_Internas_Enviadas" class="text">SOLICITUDES DE PERSONAL ENVIADAS</a></li>
							<li><a tabindex="-1" href="#Solicitudes_Internas_Rechazadas" class="text">SOLICITUDES DE PERSONAL RECHAZADAS</a></li>
							<li><a tabindex="-1" href="#Solicitudes_Internas_Confirmadas" class="text">SOLICITUDES DE PERSONAL CONFIRMADAS</a></li>

                            <li><a tabindex="-1" href="#Requisicion_Nuevo_Cargo2" class="text">REQUISICION NUEVA PLAZA</a></li>
                            <li><a tabindex="-1" href="#Solicitudes_Nueva_Plaza_Enviadas" class="text">SOLICITUDES NUEVA PLAZA ENVIADAS</a></li>
                            <li><a tabindex="-1" href="#Solicitudes_Nueva_Plaza_Rechazadas" class="text">SOLICITUDES NUEVA PLAZA RECHAZADAS</a></li>
                            <li><a tabindex="-1" href="#solicitud_javier_confirmadas_rherrera" class="text">SOLICITUDES NUEVA PLAZA CONFIRMADAS</a></li>

                            <li><a tabindex="-1" href="#Requisicion_Nuevo_Cargo3" class="text">REQUISICION NUEVO CARGO</a></li> 
                            <li><a tabindex="-1" href="#Solicitudes_Nuevo_Cargo_Enviadas" class="text">SOLICITUDES NUEVO CARGO ENVIADAS</a></li>
                            <li><a tabindex="-1" href="#Solicitudes_Nuevo_Cargo_Rechazadas" class="text">SOLICITUDES NUEVO CARGO RECHAZADAS</a></li>
                            <li><a tabindex="-1" href="#solicitud_javier_confirmadas2" class="text">SOLICITUDES NUEVO CARGO CONFIRMADAS</a></li>     							
                            <li class="divider"></li>
                            <li><a tabindex="-1" href="#" class="text">Cambiar Contrase&ntilde;a</a></li>
                            <li><a tabindex="-1" href="#cerrar" class="text">Cerrar Sesi&oacute;n</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="#"><span id="titulo" class="first">MENU DE REQUISICION</span></a>
            </div>
        </div>
    </div>
    <div id="content"></div>
    
    <script src="../../js/jquery-1.10.1.min.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
    <script src="../../js/bootstrap.min.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
    <script src="../../js/funciones.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
    
  </body>
</html>