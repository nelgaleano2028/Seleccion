 $(document).ready(function() {
 		

 	/*Lo utiliza  todas las pruebas*/
	 $('#pruebas_Btn').click(ver_prueba);

	 $("form").submit(enviar);


	 /*prueba de letras---------------------------------------------*/

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
				
				elem.html('<span style="display:none">'+elem.data("numsoltar")+""+'</span>');
			}
		},
		out: function( event, ui ) {
			if (ui.draggable.data("soltado")){
				ui.draggable.data("soltado", false);
				var elem = $(this);
				elem.data("numsoltar", elem.data("numsoltar") - 1);
				elem.html('<span style="display:none">'+elem.data("numsoltar")+'</span>');
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
	
		var posx = aleatorio(80, 90);
		var posy = aleatorio(255, 260);
		var nuevoElemento = $('<div class="' + $(this).attr("href") + ' arrastrable '+ (contador_elemento++ )+'" style="position:absolute !important; z-index: 10; top: ' + posy + 'px; left: ' + posx + '%;" ondblclick="pinchar(event)"></div>');
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
   /*Fin prueba de letras---------------------------------------------*/



/*script para la prueba cmt control de inupts-------------------------*/







var datos1= new Array();
var datos2= new Array();
var datos3= new Array();
var datos4= new Array();
var datos5= new Array();
var datos6= new Array();
var datos7= new Array();
var datos8= new Array();
var datos9= new Array();
var datos10= new Array();
var datos11= new Array();
var datos12= new Array();
var datos13= new Array();
var datos14= new Array();
var datos15= new Array();



$('.pregunta1,.pregunta2,.pregunta3,.pregunta4,.pregunta5,.pregunta6,.pregunta7,.pregunta8,.pregunta9,.pregunta10,.pregunta11,.pregunta12,.pregunta13,.pregunta14,.pregunta15').click(function(){



  var traer= $(this).attr('id');

  var separar=traer.split(" ");


  var buscar = $("#"+separar[0]+"").val();



 // console.log(buscar+"soy clickkkkkkk");


    setValue(buscar);

});


$('.pregunta1,.pregunta2,.pregunta3,.pregunta4,.pregunta5,.pregunta6,.pregunta7,.pregunta8,.pregunta9,.pregunta10,.pregunta11,.pregunta12,.pregunta13,.pregunta14,.pregunta15').on('keydown',function(teclas){



    var traer= $(this).attr('id');

    var separar=traer.split(" ");


  	var buscar = $("#"+separar[0]+"").val();


    arregloDatos(separar[0],buscar,'keydown');

});


$('.pregunta1,.pregunta2,.pregunta3,.pregunta4,.pregunta5,.pregunta6,.pregunta7,.pregunta8,.pregunta9,.pregunta10,.pregunta11,.pregunta12,.pregunta13,.pregunta14,.pregunta15').on('keyup',function(tecla){


var traer= $(this).attr('id');

var separar=traer.split(" ");


var buscar = $("#"+separar[0]+"").val();


	//console.log(buscar);


var validar_numero= valida(buscar);


if(validar_numero== false){

     console.log('solo puede digitar de 0 hasta 4');

    $("#"+separar[0]+"").val('');


}else{



   //buscar datos
   arregloDatos(separar[0],buscar,'buscar');



   	if (tecla.keyCode == 8 ) { 



		arregloDatos(separar[0],getValue(),'keyup');


	}

  	
}





 });




	function arregloDatos(id,buscar,condicion){

		//console.log('hola arregloDatos');
		//console.log('hola soy condicon'+condicion);

		var traerClass= $("#"+id+"").attr('class');

  		var separar2= traerClass.split(" ");


	  	switch (separar2[0]) {

	  		case "pregunta1" :
	        	
	  			var p2=datos1.indexOf(buscar);

	  			if(buscar != "" && condicion=='keydown'){

					datos1.splice(p2,1);

				   setValue("");

				}else if(p2 != -1 && condicion=='buscar'){


					 //console.log(p2);

			       	console.log('ya ha dijitado el numero');

			        $("#"+id+"").val('');


				}else if(buscar != "" && p2 == -1 && condicion=='buscar'){

					 datos1.push(buscar);

				}else if(p2 != -1 && condicion=='keyup' ){

					console.log("hola borrar");

					datos1.splice(p2,1);

   					setValue("");

				}
			

	        break;

	        case "pregunta2" :
	        	
	  			var p2=datos2.indexOf(buscar);

	  			if(buscar != "" && condicion=='keydown'){

					datos2.splice(p2,1);

				   setValue("");

				}else if(p2 != -1 && condicion=='buscar'){


					 //console.log(p2);

			       	console.log('ya ha dijitado el numero');

			        $("#"+id+"").val('');


				}else if(buscar != "" && p2== -1 && condicion=='buscar'){

					 datos2.push(buscar);

				}else if(p2 != -1 && condicion=='keyup' ){

					console.log("hola borrar");

					datos2.splice(p2,1);

   					setValue("");

				}
			

	        break;

	         case "pregunta3" :
	        	
	  			var p2=datos3.indexOf(buscar);

	  			if(buscar != "" && condicion=='keydown'){

					datos3.splice(p2,1);

				   setValue("");

				}else if(p2 != -1 && condicion=='buscar'){


					 //console.log(p2);

			       	console.log('ya ha dijitado el numero');

			        $("#"+id+"").val('');


				}else if(buscar != "" && p2== -1 && condicion=='buscar'){

					 datos3.push(buscar);

				}else if(p2 != -1 && condicion=='keyup' ){

				
					datos3.splice(p2,1);

   					setValue("");

				}
			

	        break;

	        case "pregunta4" :
	        	
	  			var p2=datos4.indexOf(buscar);

	  			if(buscar != "" && condicion=='keydown'){

					datos4.splice(p2,1);

				   setValue("");

				}else if(p2 != -1 && condicion=='buscar'){


					 //console.log(p2);

			       	console.log('ya ha dijitado el numero');

			        $("#"+id+"").val('');


				}else if(buscar != "" && p2== -1 && condicion=='buscar'){

					 datos4.push(buscar);

				}else if(p2 != -1 && condicion=='keyup' ){

					console.log("hola borrar");

					datos4.splice(p2,1);

   					setValue("");

				}
			

	        break;

	        case "pregunta5" :
	        	
	  			var p2=datos5.indexOf(buscar);

	  			if(buscar != "" && condicion=='keydown'){

					datos5.splice(p2,1);

				   setValue("");

				}else if(p2 != -1 && condicion=='buscar'){


					 //console.log(p2);

			       	console.log('ya ha dijitado el numero');

			        $("#"+id+"").val('');


				}else if(buscar != "" && p2== -1 && condicion=='buscar'){

					 datos5.push(buscar);

				}else if(p2 != -1 && condicion=='keyup' ){

					console.log("hola borrar");

					datos5.splice(p2,1);

   					setValue("");

				}
			

	        break;

	        case "pregunta6" :
	        	
	  			var p2=datos6.indexOf(buscar);

	  			if(buscar != "" && condicion=='keydown'){

					datos6.splice(p2,1);

				   setValue("");

				}else if(p2 != -1 && condicion=='buscar'){


					 //console.log(p2);

			       	console.log('ya ha dijitado el numero');

			        $("#"+id+"").val('');


				}else if(buscar != "" && p2== -1 && condicion=='buscar'){

					 datos6.push(buscar);

				}else if(p2 != -1 && condicion=='keyup' ){

					console.log("hola borrar");

					datos6.splice(p2,1);

   					setValue("");

				}
			

	        break;

	        case "pregunta7" :
	        	
	  			var p2=datos7.indexOf(buscar);

	  			if(buscar != "" && condicion=='keydown'){

					datos7.splice(p2,1);

				   setValue("");

				}else if(p2 != -1 && condicion=='buscar'){


					 //console.log(p2);

			       	console.log('ya ha dijitado el numero');

			        $("#"+id+"").val('');


				}else if(buscar != "" && p2== -1 && condicion=='buscar'){

					 datos7.push(buscar);

				}else if(p2 != -1 && condicion=='keyup' ){

					console.log("hola borrar");

					datos7.splice(p2,1);

   					setValue("");

				}
			

	        break;

	        case "pregunta8" :
	        	
	  			var p2=datos8.indexOf(buscar);

	  			if(buscar != "" && condicion=='keydown'){

					datos8.splice(p2,1);

				   setValue("");

				}else if(p2 != -1 && condicion=='buscar'){


					 //console.log(p2);

			       	console.log('ya ha dijitado el numero');

			        $("#"+id+"").val('');


				}else if(buscar != "" && p2== -1 && condicion=='buscar'){

					 datos8.push(buscar);

				}else if(p2 != -1 && condicion=='keyup' ){

					console.log("hola borrar");

					datos8.splice(p2,1);

   					setValue("");

				}
			

	        break;

	        case "pregunta9" :
	        	
	  			var p2=datos9.indexOf(buscar);

	  			if(buscar != "" && condicion=='keydown'){

					datos9.splice(p2,1);

				   setValue("");

				}else if(p2 != -1 && condicion=='buscar'){


					 //console.log(p2);

			       	console.log('ya ha dijitado el numero');

			        $("#"+id+"").val('');


				}else if(buscar != "" && p2== -1 && condicion=='buscar'){

					 datos9.push(buscar);

				}else if(p2 != -1 && condicion=='keyup' ){

					console.log("hola borrar");

					datos9.splice(p2,1);

   					setValue("");

				}
			

	        break;

	        case "pregunta10" :
	        	
	  			var p2=datos10.indexOf(buscar);

	  			if(buscar != "" && condicion=='keydown'){

					datos10.splice(p2,1);

				   setValue("");

				}else if(p2 != -1 && condicion=='buscar'){


					 //console.log(p2);

			       	console.log('ya ha dijitado el numero');

			        $("#"+id+"").val('');


				}else if(buscar != "" && p2== -1 && condicion=='buscar'){

					 datos10.push(buscar);

				}else if(p2 != -1 && condicion=='keyup' ){

					console.log("hola borrar");

					datos10.splice(p2,1);

   					setValue("");

				}
			

	        break;

	        case "pregunta11" :
	        	
	  			var p2=datos11.indexOf(buscar);

	  			if(buscar != "" && condicion=='keydown'){

					datos11.splice(p2,1);

				   setValue("");

				}else if(p2 != -1 && condicion=='buscar'){


					 //console.log(p2);

			       	console.log('ya ha dijitado el numero');

			        $("#"+id+"").val('');


				}else if(buscar != "" && p2== -1 && condicion=='buscar'){

					 datos11.push(buscar);

				}else if(p2 != -1 && condicion=='keyup' ){

					console.log("hola borrar");

					datos11.splice(p2,1);

   					setValue("");

				}
			

	        break;

	        case "pregunta12" :
	        	
	  			var p2=datos12.indexOf(buscar);

	  			if(buscar != "" && condicion=='keydown'){

					datos12.splice(p2,1);

				   setValue("");

				}else if(p2 != -1 && condicion=='buscar'){


					 //console.log(p2);

			       	console.log('ya ha dijitado el numero');

			        $("#"+id+"").val('');


				}else if(buscar != "" && p2== -1 && condicion=='buscar'){

					 datos12.push(buscar);

				}else if(p2 != -1 && condicion=='keyup' ){

					console.log("hola borrar");

					datos12.splice(p2,1);

   					setValue("");

				}
			

	        break;

	        case "pregunta13" :
	        	
	  			var p2=datos13.indexOf(buscar);

	  			if(buscar != "" && condicion=='keydown'){

					datos13.splice(p2,1);

				   setValue("");

				}else if(p2 != -1 && condicion=='buscar'){


					 //console.log(p2);

			       	console.log('ya ha dijitado el numero');

			        $("#"+id+"").val('');


				}else if(buscar != "" && p2== -1 && condicion=='buscar'){

					 datos13.push(buscar);

				}else if(p2 != -1 && condicion=='keyup' ){

					console.log("hola borrar");

					datos13.splice(p2,1);

   					setValue("");

				}
			

	        break;

	        case "pregunta14" :
	        	
	  			var p2=datos14.indexOf(buscar);

	  			if(buscar != "" && condicion=='keydown'){

					datos14.splice(p2,1);

				   setValue("");

				}else if(p2 != -1 && condicion=='buscar'){


					 //console.log(p2);

			       	console.log('ya ha dijitado el numero');

			        $("#"+id+"").val('');


				}else if(buscar != "" && p2== -1 && condicion=='buscar'){

					 datos14.push(buscar);

				}else if(p2 != -1 && condicion=='keyup' ){

					console.log("hola borrar");

					datos14.splice(p2,1);

   					setValue("");

				}
			

	        break;

	        case "pregunta15" :
	        	
	  			var p2=datos15.indexOf(buscar);

	  			if(buscar != "" && condicion=='keydown'){

					datos15.splice(p2,1);

				   setValue("");

				}else if(p2 != -1 && condicion=='buscar'){


					 //console.log(p2);

			       	console.log('ya ha dijitado el numero');

			        $("#"+id+"").val('');


				}else if(buscar != "" && p2== -1 && condicion=='buscar'){

					 datos15.push(buscar);

				}else if(p2 != -1 && condicion=='keyup' ){

					console.log("hola borrar");

					datos15.splice(p2,1);

   					setValue("");

				}
			

	        break;
	    }

	}

/*-----Fin script para la prueba cmt--------------------*/


/*para los radios button de la prueba test aprendizaje*/

var contar=0;
    		

$( ".radios" ).each(function(){


	

$(this).on('click',function(){


	console.log('hola');


	contar++;


	setConteo2(contar);

	

	if(contar==3){

		//console.log('hola');


		//$( ":radio" ).attr( "disabled", "disabled" );


		mensaje2="<span style='color:blue; font-weight:bold'>Solo puede ir dos opciones</span>";
			//alert personalizado
		Alert.alert(mensaje2,function(){

			$('#myModal6').modal('hide');

			


		});


		$("form").find(".radios:checked").each(function(){
	   		$(this)[0].checked = false;  
		  });

		  contar=0;
	}

	//var prueba=$( this ).val();

	//console.log(contar);




});	

	

});

/*Fin para los radios button de la prueba aprendizaje----------------------------------*/




 }); //fin del document ready	



/*este es el enviar para ingresar los datos a la base de datos "lo utiliza todas las pruebas"*/
 function enviar(){

 	//console.log('hola'); return false;

 	var puntos= 0; // Estos son los puntos de la prueba letras
 	var pararAjax=false;
 	var orden= $('form').attr('class');


	var grupo= $('form').attr('id');


	var action = $('form').attr('action');

	if(action == 'c_temperamento_resp.php'){


		var sanguineo=0;
	 	var colerico=0;
	 	var melancolico=0;
	 	var flematico=0;

	 	var datos= new Array();

	 			

 				for(var i=1; i<41; i++){



	 				if($('input:radio[name="'+i+'"]').is( ":checked" ) == true){

				 		clase= Number($('input:radio[name="'+i+'"]:checked').attr('class'));


				 		switch (clase){

				 			case 1: 
				 				sanguineo++;

				 			break;

				 			case 2: 
				 				colerico++;
				 			break;

				 			case 3:
				 				melancolico++;
				 			break;

				 			case 4:
				 				flematico++;
				 			break;

				 		}
		 			}else{


		 				mensaje3="<span style='color:red; font-weight:bold'>Existe algun campo Vacio, debes completar la prueba</span>";
									//alert personalizado
								Alert.alert(mensaje3,function(){

									$('#myModal6').modal('hide');

									


								});

								 pararAjax= true;


								 return false;


		 			}

		 			datos.push({name:'sanguineo', value:sanguineo}, {name:'colerico', value:colerico}, {name: 'melancolico', value:melancolico}, {name: 'flematico', value:flematico} );



 				}
 		


 	

	}else if(action =='cmt_insert.php'){

		

			//validacion cmt
			var datos= $("form").serializeArray();


			/*validacion cmt*/
			$( ".inputs_text" ).each(function(){

				

				if($(this).val()==""){

					


					mensaje="<span style='color:red; font-weight:bold'>Existe algun campo Vacio, debes completar la prueba</span>";
					//alert personalizado
					Alert.alert(mensaje,function(){

						$('#myModal6').modal('hide');

						


					});

					 pararAjax= true;


				}


			});

 			/*Fin validacion CMT*/


 			

				
		

	}else if(action=='test_insert_aprendizaje.php'){

		
		var datos= $("form").serializeArray();


		/*validacion para el test_aprendizaje*/

 			


 				for(var i=1; i<16; i++){


 					    
 					if(i== 6){
 						continue;

 					}else if( $('input:radio[name="'+i+'"]').is( ":checked" ) == false){ 





 							mensaje="<span style='color:red; font-weight:bold'>Existe algun campo Vacio, debes completar la prueba !!!</span>";
								//alert personalizado
							Alert.alert(mensaje,function(){

								$('#myModal6').modal('hide');

								


							});

							 pararAjax= true;
							 return false;


 						
	 				}

 				}

			

 			/*validaciones para la pregunta 6*/
 			if($("form .6p:checked").length == 0){


				mensaje="<span style='color:red; font-weight:bold'>Existe algun campo Vacio, debes completar la prueba</span>";
							//alert personalizado
						Alert.alert(mensaje,function(){

							$('#myModal6').modal('hide');

							


						});

						 pararAjax= true;

						 return false;

			}

			

			if(getConteo2() == 1){

				mensaje="<span style='color:red; font-weight:bold'>La pregunta 6 falta llenar un campo</span>";
							//alert personalizado
						Alert.alert(mensaje,function(){

							$('#myModal6').modal('hide');

							


						});

						 pararAjax= true;



			}


			/*fin validacion test_aprendizaje*/



	}else if(action=='test_16pf.php') {


		var datos= $("form").serializeArray();



		/*$("input[type='radio']:checked").each(function(){

				var b=$(this).val();
 					
 		});

 		console.log(b.val().length); return false;*/



 			/*var radios = jQuery("input[type='radio']");


 			var hola=radios.filter(":checked").length;

 			console.log(hola);


 			if(hola < 187){


 				mensaje="<span style='color:red; font-weight:bold'>Hace falta campos por llenar</span>";
							//alert personalizado
						Alert.alert(mensaje,function(){

							$('#myModal6').modal('hide');

							


						});

						 pararAjax= true;




 			}*/
 			



 		  




	}else if(action=='letras_insert.php'){

			var datos= new Array();

			var puntos= Number(getConteo());

			

			datos.push({name:'pd', value:puntos});
				
				

	}else{

		var datos= $("form").serializeArray();

	}

 	

	
	if(pararAjax==false){

			$.ajax({
			url:action,
			dataType:"html",
			data:datos,
			type:"post",
			success:function(res){

				console.log(res);  


				$.ajax({
					url:"administrador_instructivos.php",
					dataType:"html",
					data:"orden="+orden+"&grupo="+grupo+"&bandera=2",
					type:"post",
					success:function(res){

						

						if(res == 0){

							mensaje="<span style='color:green; font-weight:bold'>Has finalizado tu prueba con Exito</span>";

							/*alert personalizado*/
							
							Alert.alert(mensaje,function(){

								window.location.href="cerrar.php";
									return false;

				


							});

							return false;


						}else{

							$("#pruebas").load(res+".php");

						}
						
						
						
							
					}
				});
			


			}

		});


	}
 	

	return false;


 }


/*ver los pruebas  para toddos los formularios de prueba*/
 function ver_prueba(){


 	$(".estirar_form2").css('display','none');

 	$("#pruebas").css('display','block');

 	//$("#prueba_caras").css('display','block');

 	var separar= $('#pruebas_Btn').attr('class');

 	var orden= separar.split(" ");

 	console.log(orden[0]);

 	$("#pruebas").load(orden[0]+'.php');

 	

 	var numero= Number(orden[1]);

 	$(".estirar_form2").remove();


 	$.ajax({
		url:"administrador_instructivos.php",
		dataType:"html",
		data:"orden="+orden[1]+"&grupo="+orden[2]+"&bandera=1",
		type:"post",
		success:function(res){
			

			if(orden[1]== res){

 	
 				setInterval(function(){ getTime()}, 1000); // tiempo

 			}
  	
		}
	});


 }


/*el cronometro para todas las pruebas*/
 
 function getTime(){


	var counter= $("#counter").html();


	
	var tiempo=counter.split(":");


	var minutes= Number(tiempo[0]);

	var seconds= Number(tiempo[1]);

	

	if(minutes == 0){

		
		seconds--;

		if(seconds == 00){


			seconds='0';


			var mensaje= "El tiempo de la prueba ha terminado";



			Alert.alert(mensaje,function(){

				$('#myModal6').modal('hide');

					var orden= $('form').attr('class');
					var grupo= $('form').attr('id');

					var datos= $("form").serializeArray();

					var action = $('form').attr('action');


					ver_instructivo(orden,grupo,datos,action);

					


				});

		}else if( seconds == -1 ){


			return false;


		}

	
	}else if(seconds == 0){


		minutes--;


		seconds='59';


	}else{

			seconds--;

						
	}

  

	if(minutes < 10){

			minutes='0'+minutes;
	}

	if(seconds < 10){

		seconds='0'+seconds;

	}

	
	

	$("#counter").html(minutes+":"+seconds);




 }

/*ver los instructivos  para todos los formularios de prueba*/
 function ver_instructivo(orden,grupo,datos,action){


	$.ajax({
		url:action,
		dataType:"html",
		data:datos,
		type:"post",
		success:function(data){

			console.log(data);

			$.ajax({
				url:"administrador_instructivos.php",
				dataType:"html",
				data:"orden="+orden+"&grupo="+grupo+"&bandera=2",
				type:"post",
				success:function(res){

				
					if(res == 0){

						return false;


					}else{

						$("#pruebas").load(res+".php");

					}
					
					
					
						
				}
			});
		
				
		}
	});

 	
	
	return false;	


 }



 /*funciones para la prueba letras*/

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

 /*Fin funciones para la prueba letras*/

/*funciones para el formulario CMT*/	


 function setValue(valor){


    this.valor=valor;

 }


 function getValue(){


    return this.valor;
 }



 function setBuscar(valor2){

 	this.valor2=valor2;

 }


 function getBuscar(){

 	return this.valor2;

 }





function valida(number){

  if ( /^([0-4])*$/.test( number ) ){

      return true; 
    
    } else {
      
      return false;
    
    }



}

/* FIn funciones para el formulario CMT*/

//funcion solo numeros
		function validarnum(e) {
			tecla = (document.all) ? e.keyCode : e.which;
			if (tecla==8) return true;
			patron = /\d/;
			te = String.fromCharCode(tecla);
			return patron.test(te);
		}



/*funciones para el test aprendizaje*/

function setConteo2(conteo){

	this.valor3=conteo;

}

function getConteo2(conteo){

	return this.valor3;
}

		