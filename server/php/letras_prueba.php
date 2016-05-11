<html lang="es">
<head>
    <title>Probando el comportamiento droppable de jQueryUI</title>
	<link type="text/css" href="../../jquery-ui-1.8.18.custom.css" rel="Stylesheet" id="linkestilo" />      
	<script type="text/javascript" src="../../js/jquery-1.10.1.min.js"></script>
	
	
	<script type="text/javascript" src="../../js/jquery-ui.min.js"></script>
	
	<style type="text/css">
	body{
		background-color: #fff;
		
	}
	.azul{
		width: 6px;
		height: 110px;
		position: absolute;
		background-color: #33c;
		z-index:10;
		cursor:pointer;
	}
	
	.rojo{
		width: 110px;
		height: 6px;
		position: absolute;
		background-color: #c33;
		z-index:10;
		cursor:pointer;
	}
	
	
	
	.suelta{
		padding: 10px;		
		width: 140px;
		height: 10px;		
		position: absolute;
		border: 2px solid #000;
		
		

	}
	#sueltarojo1{
		z-index:2;
		/*background-color: #c33;*/
		top: 86px; 
		left: 23px;
		width: 103px;
		height: 1px;
		
	
	}
	#sueltaazul1, #sueltaazul2, #sueltaazul3{
		z-index:2;
		/*background-color: #33c;*/				
		width: 2px;
		height: 87px;
		
	}
	</style>
	<script type="text/javascript">
		
		
		function setConteo(conteo){
				
			
			this.conteo=conteo;
		}
		
		function getConteo(){
		
			return this.conteo;
		}
		
		function setClase(clase){

		  this.clase=clase;


		}

		function getClase(){

		  return this.clase;

		}
		
		
		function  pinchar(e){
		  
		  e.preventDefault();


		  var clase=e.target.className;

		   var separar= clase.split(" ");
		   
		   $("."+separar[2]+"").css('background-color', 'yellow');
		   

		   setClase(separar[2]);

		}
	
		function aleatorio(inferior,superior){ 
			numPosibilidades = superior - inferior 
			aleat = Math.random() * numPosibilidades 
			aleat = Math.floor(aleat) 
			return parseInt(inferior) + aleat 
		} 
		
		$(document).ready(function(){
			//defino los elementos que se pueden arrastrar
			$(".arrastrable").draggable();
			$(".arrastrable").data("soltado", false);
			
			//voy a crear una variable para contar los elementos que estoy soltando
			$(".suelta").data("numsoltar", 0);
			//defino elementos donde se puede soltar
			var puntos=0;
			$(".suelta").droppable({
				drop: function( event, ui ) {
				
					
					
					
					if (!ui.draggable.data("soltado")){
						ui.draggable.data("soltado", true);
						var elem = $(this);
						elem.data("numsoltar", elem.data("numsoltar") + 1)
						
						puntos+=elem.data("numsoltar");
						
						$(ui.draggable[0]).addClass($(this).attr("id"));
						
						setConteo(puntos);
						
						elem.html(elem.data("numsoltar")+"");
					}
				},
				out: function( event, ui ) {
					if (ui.draggable.data("soltado")){
						ui.draggable.data("soltado", false);
						var elem = $(this);
						elem.data("numsoltar", elem.data("numsoltar") - 1);
						elem.html(elem.data("numsoltar"));
					}
				}
			});
			
			//soltar solo elementos rojos
			$("#sueltarojo1").droppable("option", "accept", ".rojo ");
			//soltar solo elementos azules
			$("#sueltaazul1, #sueltaazul2, #sueltaazul3").droppable("option", "accept", ".azul");
			
			//enlaces para crear nuevos elementos rojos y azules
			var contador_elemento=1; //contador de elemento rojos y azules
			$(".creaelemento").click(function(e){
				e.preventDefault();
				var posx = aleatorio(2, 50);
				var posy = aleatorio(2, 50);
				var nuevoElemento = $('<div class="' + $(this).attr("href") + ' arrastrable '+ (contador_elemento++ )+'" style="top: ' + posy + 'px; left: ' + posx + 'px;" ondblclick="pinchar(event)"></div>');
				nuevoElemento.draggable();
				$(document.getElementById('element')).append(nuevoElemento);
			});
			
			// para borrar el elemento
			 $(document).keydown(function(tecla){
			 
				

				if (tecla.keyCode == 46) { 

					var clase =getClase();
					
					
					
					var partes=$("."+clase+"").attr("class");
					var id=partes.split(" ");
					//console.log(id[5]);
					
					if( id[5] !=undefined){
					
						var eliminar_puntos=getConteo() - 1;
					
						setConteo(eliminar_puntos);
						
						$("#"+id[5]+"").html("");
						
						if(clase != undefined){

							$("."+clase+"").remove();
					   
					  
						}
						
						
						
					
					}else{
					
						$("."+clase+"").remove();
					}
					
					
					

					
			    }
			   
			 });
			 
			 //enviar las pruebas para calificar
			 $("#prueba_leras").click(function(){
			 
				var puntos= Number(getConteo());
				
				
				
				console.log(puntos);
				
				
				
				
			 
			 });
			 
		})
	</script>
</head>
<body>
   	<div>
   		
	   	<div style="position:fixed;">
			<a href="rojo" class="creaelemento">Crear RAYA Horizontal Roja</a> | 
			<a href="azul" class="creaelemento">Crear RAYA Horizontal Azul</a> 
	    </div>
		
		
		<div id="sueltarojo1" class="suelta"></div>

		<div id="sueltaazul1" style="top: 83px; left: 528px;" class="suelta"></div>

		<div id="sueltaazul2" style="top: 82px; left: 280px;" class="suelta"></div>

		<div id="sueltaazul3" style="top: 79px; left: 875px;" class="suelta"></div>
		
		<div  style="width:933px; /*background-color:green;*/ float:left">
			
		<div><img src="../../img/letras_completo.png"></div>

		
			
			
		</div>
		
	   <div id="element" style="float:left; background-color:gray; width:400px; height: 600px"></div>
		
		<div style="clear:both;"></div>
			
		<input type="button" id="prueba_leras" value="Enviar" /> 
	<div>	
	
</body>
</html>