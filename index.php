<!DOCTYPE html>
<html>
  <head>
    <title>SELECCION DE PERSONAL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css"  />	
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.css" />
	
	
	<!--LIBRERIAS DE BOOTSTRAP-->
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="../css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="../css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="../js/bootstrap.min.js"></script>
	
    <!--END LIBRERIAS DE BOOTSTRAP-->

  </head>
  <body id="body">
      
	  <div id="error"></div>
	  
     <div class="container-fluid">
        
        <div class="row-fluid">
          <div class="dialog span4">
              <div class="block2">
                  <div class="header-login1">MODULO DE SELECCION DE PERSONAL</div>
                 
                    <div class="block">
                        <div class="block-body">
                            <form id="form_login">
                                <div id="val1">
                                <label class="login_label control-label" for="usuario">Usuario</label>
                                <div class="controls">
                                <input type="text" class="span12" id="usuario" name="usuario"/></div>  </div>
								<div id="val2">
                                <label class="login_label control-label" for="clave">Contrase&ntilde;a</label>
                                <div class="controls">
                                <input type="password" class="span12" id="clave" name="clave"/></div></div>
                                <div class="centrar">
                                	<a href="#myModal" id="modal_contrasena" data-toggle="modal">Recordar Cuenta</a><br>
                                    <input type="submit" class="btn btn-primary" style="background: rgb(41, 76, 139);" id="ingresar" value="Ingresar"/>
                                </div>
                               
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
					
					
					
					
					
					
					
             </div>
          </div>
        </div>
   </div>
    
    <script src="js/jquery-1.10.1.min.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
    <script src="js/bootstrap.min.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
    <script src="js/login.js?js=<?php echo rand(1, 100);?>" type="text/javascript"></script>
  </body>
</html>