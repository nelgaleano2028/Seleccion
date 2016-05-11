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
                            <li><a tabindex="-1" id="inicial" href="#solicitud_1_de_javier" class="text">SOLICITUDES NUEVA PLAZA</a></li>
                            <li><a tabindex="-1" href="#solicitudes_mena_aceptadas" class="text">SOLICITUDES ACEPTADAS</a></li>
                            <li><a tabindex="-1" href="#solicitudes_mena_rechazadas" class="text">SOLICITUDES RECHAZADAS</a></li>
							 <li><a tabindex="-1" id="inicial" href="#solicitud_1_de_javier_mena" class="text">SOLICITUDES CARGO NUEVO</a></li>
                            <li><a tabindex="-1" href="#solicitudes_mena_aceptadas" class="text">SOLICITUDES ACEPTADAS</a></li>
                            <li><a tabindex="-1" href="#solicitudes_mena_rechazadas" class="text">SOLICITUDES RECHAZADAS</a></li>
                            
                            <li class="divider"></li>                            
                            <li><a tabindex="-1" href="#cerrar" class="text">Cerrar Sesi&oacute;n</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="#"><span id="titulo" class="first">Gerencia</span></a>
            </div>
        </div>
    </div>
    <div id="content"></div>
    
    <script src="../../js/jquery-1.10.1.min.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
    <script src="../../js/bootstrap.min.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>	
    <script src="../../js/funciones.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
     
    
  </body>
</html>