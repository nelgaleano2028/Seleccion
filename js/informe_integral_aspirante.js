$(document).ready(main);


function main(){


	

	if($('.bandera1').length > 0){

			prom=$('.promedio').val();

			$('.1, .2, .3, .4, .5').css('background-color','white');

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

		if($('.bandera2').length > 0){

			prom2=$('.promedio2').val();		

			$('.1, .2, .3, .4, .5').css('background-color','white');

			if(prom2>=1 && prom2<=2){

				$('.1').css('background-color','rgb(53, 66, 157)');
				

			}else if(prom2>2 && prom2<=2.5){

				$('.1, .2').css('background-color','rgb(53, 66, 157)');

			}else if(prom2>2.5 && prom2<=3){

				$('.1, .2, .3').css('background-color','rgb(53, 66, 157)');

			}else if(prom2>3 && prom2<=3.5){

				$('.1, .2, .3, .4').css('background-color','rgb(53, 66, 157)');

			}else if(prom2>3.5){

				$('.1, .2, .3, .4, .5').css('background-color','rgb(53, 66, 157)');


			}
		}

			if($('.bandera3').length > 0){

			prom3=$('.promedio3').val();

			$('.1, .2, .3, .4, .5').css('background-color','white');

			if(prom3>=1 && prom3<=2){

				$('.1').css('background-color','rgb(53, 66, 157)');
				

			}else if(prom3>2 && prom3<=2.5){

				$('.1, .2').css('background-color','rgb(53, 66, 157)');

			}else if(prom3>2.5 && prom3<=3){

				$('.1, .2, .3').css('background-color','rgb(53, 66, 157)');

			}else if(prom3>3 && prom3<=3.5){

				$('.1, .2, .3, .4').css('background-color','rgb(53, 66, 157)');

			}else if(prom3>3.5){

				$('.1, .2, .3, .4, .5').css('background-color','rgb(53, 66, 157)');


			}
		}

			if($('.bandera4').length > 0){

			prom4=$('.promedio4').val();

			$('.1, .2, .3, .4, .5').css('background-color','white');

			if(prom4>=1 && prom4<=2){

				$('.1').css('background-color','rgb(53, 66, 157)');
				

			}else if(prom4>2 && prom4<=2.5){

				$('.1, .2').css('background-color','rgb(53, 66, 157)');

			}else if(prom4>2.5 && prom4<=3){

				$('.1, .2, .3').css('background-color','rgb(53, 66, 157)');

			}else if(prom4>3 && prom4<=3.5){

				$('.1, .2, .3, .4').css('background-color','rgb(53, 66, 157)');

			}else if(prom4>3.5){

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

			

			
		     $('.promedio2').val(prom);

			
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

			

			
		     $('.promedio3').val(prom);

			
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


	$('#enviar_atencion').click(sg_laboral);
	$('#enviar_laboral').click(sg_relacional);
	$('#enviar_relacional').click(sg_pensamiento);
	$('#enviar_pensamiento').click(terminar_informe);



	$("#cerrar").click(function(){

		window.close();
	})



}


function terminar_informe(){


	var datos=$('#info_pensamiento').serializeArray();

	datos.push({name:'bandera', value:4}); //agregar bandera

	var promedio = parseFloat($("input[name=promedio_total]").val());


	


	$.ajax({
		
		url:'edit_informe_integral.php',
		type:'POST',
		data:datos,
		dataType:'html',
		success:function(res){
			//validar 
			console.log(res); 

			if(res != false){

			 	mensaje="<span style='color:green; font-weight:bold'>Se ha editado correctamente</span>";
				


				Alert.alert(mensaje,function(){

						$('#myModal6').modal('hide');

						$('#content').load('editar_inf.php');

						


					});

			}

			 
		}
	});
	
	return false;




}


function sg_pensamiento(){

	

	var datos=$('#info_relacional').serializeArray();

	datos.push({name:'bandera', value:3}); //agregar bandera

	var promedio1 = parseFloat($("#promedio_total2").val());
	var promedio2 = parseFloat($("#promedio_total3").val());

	var promedio = promedio1 + promedio2;

	console.log(promedio+"pensamiento");

	$.ajax({
		
		url:'edit_informe_integral.php',
		type:'POST',
		data:datos,
		dataType:'html',
		success:function(res){
			//validar 
			console.log(res); 

			if(res != false){

			 $('#contenido7').css('display','none');
			 $('#contenido8').load('edit_pensamiento2.php?id='+$("#id").val()+'&promedio='+promedio);

			}

			 
		}
	});
	
	return false;


}


function sg_relacional(){

	var datos=$('#info_laboral').serializeArray();

	datos.push({name:'bandera', value:2}); //agregar bandera

	var promedio1 = parseFloat($("input[name=promedio_total1]").val());
	var promedio2 = parseFloat($("input[name=promedio_total2]").val());
	var promedio = promedio1 + promedio2;

	console.log(promedio+"relacional");

	$.ajax({
		
		url:'edit_informe_integral.php',
		type:'POST',
		data:datos,
		dataType:'html',
		success:function(res){
			//validar 
			console.log(res); 

			if(res != false){

			 $('#contenido5').css('display','none');
			 $('#contenido6').load('edit_relacional2.php?id='+$("#id").val()+'&promedio='+promedio);


			}

			 
		}
	});
	
	return false;



}



function sg_laboral(){



	var datos=$('#info_atencion').serializeArray();

	datos.push({name:'bandera', value:1}); //agregar bandera

	var promedio = $("input[name=prom_total]").val();

	console.log(promedio+"laboral");

	$.ajax({
		
		url:'edit_informe_integral.php',
		type:'POST',
		data:datos,
		dataType:'html',
		success:function(res){
			//validar 
			console.log(res); 

			if(res != false){

			 $('#contenido3').css('display','none');
			 $('#contenido4').load('edit_laboral2.php?id='+res+'&promedio='+promedio);


			}

			 
		}
	});
	
	return false;

}


function informe(cedula){

	$('#contenido').css('display','none');
	$('#contenido2').load('edit_atencion2.php?cedula='+cedula);



}


