$(document).ready(main);


function main(){


	if($('.banderase').length > 0){

		

			 $('.promedio').val(prom);

			if(prom>=1 && prom<=2){

				$('.1').css('background-color','rgb(53, 66, 157)');
				

			}else if(prom>2 && prom<=2.5){

				$('.1, .2').css('background-color','rgb(53, 66, 157)');

			}else if(prom>2.5 && prom<=3){

				$('.1, .2, .3').css('background-color','rgb(53, 66, 157)');

			}else if(prom>3 && prom<=3.5){

				$('.1, .2, .3, .4').css('background-color','rgb(53, 66, 157)');

			}else if(prom>3.5){

				$('.1, .2, .3, .4, .5').css('background-color','rgb(53, 66, 157)');


			}


	}


$('.10').focus(function(){
	
	$('.10').val("");

});

$('.20').focus(function(){
	
	$('.20').val("");

});

$('.30').focus(function(){
	
	$('.30').val("");

});

$('.40').focus(function(){
	
	$('.40').val("");

});

$('.50').focus(function(){
	
	$('.50').val("");

});

$('.60').focus(function(){
	
	$('.60').val("");

});

$('.70').focus(function(){
	
	$('.70').val("");

});

$('.80').focus(function(){
	
	$('.80').val("");

});

$('.90').focus(function(){
	
	$('.90').val("");

});


	$('.10, .20, .30').on('keyup',function(tecla){

			
			$('.1, .2, .3, .4, .5').css('background-color','white');


			var focalizada=Number($('.10').val());
			var Selectiva=Number($('.20').val());
			var Procesamiento=Number($('.30').val());

		

			prom= ((focalizada+ Selectiva + Procesamiento)/3);
			prom=prom.toFixed(1);

			
			
		     $('.promedio').val(prom);

			
			if(prom>=1 && prom<=2){

				$('.1').css('background-color','rgb(53, 66, 157)');
				

			}else if(prom>2 && prom<=2.5){

				$('.1, .2').css('background-color','rgb(53, 66, 157)');

			}else if(prom>2.5 && prom<=3){

				$('.1, .2, .3').css('background-color','rgb(53, 66, 157)');

			}else if(prom>3 && prom<=3.5){

				$('.1, .2, .3, .4').css('background-color','rgb(53, 66, 157)');

			}else if(prom>3.5){

				$('.1, .2, .3, .4, .5').css('background-color','rgb(53, 66, 157)');


			}




		});

	$('.40, .50, .60').on('keyup',function(tecla){

			$('.1, .2, .3, .4, .5').css('background-color','white');


			var focalizada=Number($('.40').val());
			var Selectiva=Number($('.50').val());
			var Procesamiento=Number($('.60').val());

		

			prom= ((focalizada+ Selectiva + Procesamiento)/3);
			prom=prom.toFixed(1);

			
			
		     $('.promedio').val(prom);

			
			if(prom>=1 && prom<=2){

				$('.1').css('background-color','rgb(53, 66, 157)');
				

			}else if(prom>2 && prom<=2.5){

				$('.1, .2').css('background-color','rgb(53, 66, 157)');

			}else if(prom>2.5 && prom<=3){

				$('.1, .2, .3').css('background-color','rgb(53, 66, 157)');

			}else if(prom>3 && prom<=3.5){

				$('.1, .2, .3, .4').css('background-color','rgb(53, 66, 157)');

			}else if(prom>3.5){

				$('.1, .2, .3, .4, .5').css('background-color','rgb(53, 66, 157)');


			}




		});

	$('.70, .80, .90').on('keyup',function(tecla){

			$('.1, .2, .3, .4, .5').css('background-color','white');


			var focalizada=Number($('.70').val());
			var Selectiva=Number($('.80').val());
			var Procesamiento=Number($('.90').val());

		

			prom= ((focalizada+ Selectiva + Procesamiento)/3);
			prom=prom.toFixed(1);

			

			
		     $('.promedio').val(prom);

			
			if(prom>=1 && prom<=2){

				$('.1').css('background-color','rgb(53, 66, 157)');
				

			}else if(prom>2 && prom<=2.5){

				$('.1, .2').css('background-color','rgb(53, 66, 157)');

			}else if(prom>2.5 && prom<=3){

				$('.1, .2, .3').css('background-color','rgb(53, 66, 157)');

			}else if(prom>3 && prom<=3.5){

				$('.1, .2, .3, .4').css('background-color','rgb(53, 66, 157)');

			}else if(prom>3.5){

				$('.1, .2, .3, .4, .5').css('background-color','rgb(53, 66, 157)');


			}




		});


	//botones de siguiente
	$('.enviar_general').click(sg_observaciones);
	$('.enviar_observaciones').click(sg_atencion);
	$('.enviar_atencion').click(sg_laboral);
	$('.enviar_laboral').click(sg_afectivo);
	$('#enviar_afectivo').click(sg_relacional);
	$('#enviar_relacional').click(sg_pensamiento);
	$('#enviar_pensamiento').click(terminar_informe);



	//botones anterior
	$('.ant_general').click(ant_general);
	$('.ant_obsrvaciones').click(ant_obsrvaciones);




}


//botones anterior
function ant_general(){


	var cedula = $("input[name=cedula]").val();

	 $('#contenido11').css('display','none');
	 $('#contenido12').load('inf_general.php?cedula='+cedula);


	return false;

}



function ant_obsrvaciones(){


	var cedula = $("input[name=cedula]").val();

	 $('#contenido3').css('display','none');
	 $('#contenido4').load('inf_observaciones.php?cedula='+cedula);


	return false;

}


function ant_atencion(){

	var cedula = $("input[name=cedula]").val();

	 $('#contenido5').css('display','none');
	 $('#contenido6').load('inf_atencion.php?cedula='+cedula);


	return false;


}


//botones siguiente
function terminar_informe(){


	var datos=$('#informacion_pensamiento').serializeArray();

	datos.push({name:'bandera', value:5}); //agregar bandera

	var promedio = parseFloat($("input[name=promedio_total]").val());



	$.ajax({
		
		url:'ing_informe_integral.php',
		type:'POST',
		data:datos,
		dataType:'html',
		success:function(res){
			//validar 
			console.log(res); 

			if(res != false){

			 	mensaje="<span style='color:green; font-weight:bold'>Se ha ingresado correctamente</span>";
				


				Alert.alert(mensaje,function(){

						$('#myModal6').modal('hide');

						$('#content').load('consultar_inf.php');

						


					});

			}

			 
		}
	});
	
	return false;




}


function sg_pensamiento(){

	

	var datos=$('#info_relacional').serializeArray();

	datos.push({name:'bandera', value:4}); //agregar bandera

	var promedio1 = parseFloat($("input[name=promedio_total5]").val());
	var promedio2 = parseFloat($("input[name=promedio_total6]").val());

	var promedio = promedio1 + promedio2;


	$.ajax({
		
		url:'ing_informe_integral.php',
		type:'POST',
		data:datos,
		dataType:'html',
		success:function(res){
			//validar 
			console.log(res); 

			if(res != false){

			 $('#contenido7').css('display','none');
			 $('#contenido8').load('inf_pensamiento.php?id='+$("#id").val()+'&promedio='+promedio);

			}

			 
		}
	});
	
	return false;


}



function sg_afectivo(){

	var datos=$('#info_laboral').serializeArray();

	datos.push({name:'bandera', value:2}); //agregar bandera

	var promedio1 = parseFloat($("input[name=promedio_total2]").val());
	var promedio2 = parseFloat($("input[name=promedio_total3]").val());

	var promedio = promedio1 + promedio2;



	$.ajax({
		
		url:'ing_informe_integral.php',
		type:'POST',
		data:datos,
		dataType:'html',
		success:function(res){
			//validar 
			console.log(res); 

			if(res != false){

			 $('#contenido5').css('display','none');
			 $('#contenido6').load('inf_afectivo.php?id='+$("#id").val()+'&promedio='+promedio);

			}

			 
		}
	});
	
	return false;


}



function sg_relacional(){

	var datos=$('#info_afectivo').serializeArray();

	datos.push({name:'bandera', value:3}); //agregar bandera

	var promedio1 = parseFloat($("input[name=promedio_total3]").val());
	var promedio2 = parseFloat($("input[name=promedio_total4]").val());
	var promedio = promedio1 + promedio2;



	$.ajax({
		
		url:'ing_informe_integral.php',
		type:'POST',
		data:datos,
		dataType:'html',
		success:function(res){
			//validar 
		

			if(res != false){

			 $('#contenido13').css('display','none');
			 $('#contenido14').load('inf_relacional.php?id='+$("#id").val()+'&promedio='+promedio);


			}

			 
		}
	});
	
	return false;



}



function sg_laboral(){



	var datos=$('#info_atencion').serializeArray();

	datos.push({name:'bandera', value:1}); //agregar bandera

	var promedio = $("input[name=prom_total]").val();



	$.ajax({
		
		url:'ing_informe_integral.php',
		type:'POST',
		data:datos,
		dataType:'html',
		success:function(res){
			//validar 
			console.log(res); 

			if(res != false){

			 $('#contenido3').css('display','none');
			 $('#contenido4').load('inf_laboral.php?id='+res+'&promedio='+promedio);


			}

			 
		}
	});
	
	return false;

}



function sg_atencion(e){

	e.preventDefault();


	var id= $("input[name=id]").val();

	var cedula= $("input[name=cedula]").val();

	var observaciones= $(".observacion_psico").val();

	console.log(id);
	console.log(observaciones)


	$.ajax({
			
		url:'ing_informe_integral.php',
		type:'POST',
		data:'id='+id+'&observaciones='+observaciones+'&bandera='+7,
		dataType:'html',
		success:function(res){


			if(res != false){


			 $('#contenido11').css('display','none');
			 $('#contenido12').load('inf_atencion.php?id='+id+'&cedula='+cedula);



			}else{

				mensaje="No se ha ingresado correctamente comuniquese con el administrador..."

				Alert.alert(mensaje,function(){

						$('#myModal6').modal('hide');

					

					});


			}

			 
		}
	});

		 
		return false;


}




function sg_observaciones(e){

	e.preventDefault();


	if($('select[name=cargo]').val() == ""){

		mensaje="<p style='text-align:center; color:red; font-weight:bold;'>Hay campos vacíos...</p>";

					Alert.alert(mensaje,function(){

							$('#myModal6').modal('hide');

						

						});



	}else{



		var datos=$('.info_general').serializeArray();


		datos.push({name:'bandera', value:6}); //agregar bandera

		var cedula= $("input[name=identificacion]").val();


		$.ajax({
			
			url:'ing_informe_integral.php',
			type:'POST',
			data:datos,
			dataType:'html',
			success:function(res){


				if(res != false){

				 $('#contenido9').css('display','none');
		 		 $('#contenido10').load('inf_observaciones.php?id='+res+'&cedula='+cedula);



				}else{

					mensaje="No se ha ingresado correctamente comuniquese con el administrador..."

					Alert.alert(mensaje,function(){

							$('#myModal6').modal('hide');

						

						});


				}

				 
			}
		});

		 
		return false;

	}

    

}


function informe(cedula){

	$('#contenido').css('display','none');
	$('#contenido2').load('inf_general.php?cedula='+cedula);



}


//funcion solo numeros
		function validarnum(e) {
			tecla = (document.all) ? e.keyCode : e.which;
			if (tecla==8) return true;
			patron = /\d/;
			te = String.fromCharCode(tecla);
			return patron.test(te);
		}
