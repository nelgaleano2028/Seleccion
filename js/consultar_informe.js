$(document).ready(main);


function main(){

	if(window.Highcharts){
		window.Highcharts = null;
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

$('.100').focus(function(){
	
	$('.100').val("");

});

$('.110').focus(function(){
	
	$('.110').val("");

});

$('.120').focus(function(){
	
	$('.120').val("");

});


	$('.10, .20, .30').on('keyup',function(tecla){

			var focalizada=Number($('.10').val());
			var Selectiva=Number($('.20').val());
			var Procesamiento=Number($('.30').val());

			prom= ((focalizada+ Selectiva + Procesamiento)/3);
			prom=prom.toFixed(1);
			
			var ca1='Focalizada';
			var ca2='Selectiva';
			var ca3='Procesamiento';
			
			var titulo='ATENCION AL DETALLE';
			
			console.log(focalizada);
			console.log(Selectiva);
			console.log(Procesamiento);
			

			
			estadistica('#contenedor1',focalizada,Selectiva,Procesamiento,ca1,ca2,ca3,titulo);
			
		     $('.promedio1').val(prom);
			 
			 
			 

	});

	$('.40, .50, .60').on('keyup',function(tecla){

		
			var focalizada=Number($('.40').val());
			var Selectiva=Number($('.50').val());
			var Procesamiento=Number($('.60').val());

			prom= ((focalizada+ Selectiva + Procesamiento)/3);
			prom=prom.toFixed(1);
			
			var ca1='Focalizada';
			var ca2='Selectiva';
			var ca3='Procesamiento';
			
			var titulo='MODALIDAD LABORAL';
			
			estadistica('#contenedor2',focalizada,Selectiva,Procesamiento,ca1,ca2,ca3,titulo);
			
		     $('.promedio2').val(prom);		

		});

	$('.70, .80, .90').on('keyup',function(tecla){

			var focalizada=Number($('.70').val());
			var Selectiva=Number($('.80').val());
			var Procesamiento=Number($('.90').val());

		

			prom= ((focalizada+ Selectiva + Procesamiento)/3);
			prom=prom.toFixed(1);
			
			
			var ca1='Focalizada';
			var ca2='Selectiva';
			var ca3='Procesamiento';
			
			var titulo='NIVEL AFECTIVO';
			
			estadistica('#contenedor3',focalizada,Selectiva,Procesamiento,ca1,ca2,ca3,titulo);
			

		     $('.promedio3').val(prom);

			
		});
		
		$('.100, .110, .120').on('keyup',function(tecla){

			var focalizada=Number($('.100').val());
			var Selectiva=Number($('.110').val());
			var Procesamiento=Number($('.120').val());

		

			prom= ((focalizada+ Selectiva + Procesamiento)/3);
			prom=prom.toFixed(1);
			
			var ca1='Focalizada';
			var ca2='Selectiva';
			var ca3='Procesamiento';
			
			var titulo='PLANO RELACIONAL';
			
			estadistica('#contenedor4',focalizada,Selectiva,Procesamiento,ca1,ca2,ca3,titulo);
			
			$('.promedio4').val(prom);
			
			
		});

	$('#enviar_informe').click(guardar_informe);
	$('#calcular_informe').click(calcular_informe);


}


function calcular_informe(){


	var promedio1=$('.promedio1').val();
	var promedio2=$('.promedio2').val();
	var promedio3=$('.promedio3').val();
	var promedio4=$('.promedio4').val();
	
	console.log(promedio1);
	console.log(promedio2);
	console.log(promedio3);
	console.log(promedio4);
	estadistica2('#contenedor5',promedio1,promedio2,promedio3,promedio4);



}

//estadistica
function estadistica(id,dato1,dato2,dato3,ca1,ca2,ca3,titulo){


	$(id).highcharts({
		title: {
			text: titulo,
			x: -20 //center
		},
		subtitle: {
			text: '',
			x: -20
		},
		xAxis: {
			categories: [ca1, ca2, ca3]
		},
		yAxis: {
			title: {
				text: 'Puntuacion'
			},
			plotLines: [{
				value: 0,
				width: 1,
				color: '#FF0000'
			}]
		},
		tooltip: {
			valueSuffix: ' Puntos'
		},
		legend: {
			layout: 'vertical',
			align: 'right',
			verticalAlign: 'middle',
			borderWidth: 0
		},
		series: [{
			name: 'Competencias',
			data: [dato1, dato2, dato3]
		}]
	});

}

//estadistica
function estadistica2(id,prom1,prom2,prom3,prom4){


	$(id).highcharts({
		title: {
			text: 'ESTILO APRENDIZAJE',
			x: -20 //center
		},
		subtitle: {
			text: '',
			x: -20
		},
		xAxis: {
			categories: ['Atencion al detalle', 'Modalidad Laboral', 'Nivel Afectivo', 'Plano Relacional']
		},
		yAxis: {
			title: {
				text: 'Puntuacion'
			},
			plotLines: [{
				value: 0,
				width: 1,
				color: '#FF0000'
			}]
		},
		tooltip: {
			valueSuffix: ' Puntos'
		},
		legend: {
			layout: 'vertical',
			align: 'right',
			verticalAlign: 'middle',
			borderWidth: 0
		},
		series: [{
			name: 'Competencias',
			data: [Number(prom1),Number(prom2),Number(prom3),Number(prom4)]
		}]
	});

}

function guardar_informe(){


	if($('select[name=cargo]').val() == ""){

		mensaje="<p style='text-align:center; color:red; font-weight:bold;'>Hay campos vacíos...</p>";

					Alert.alert(mensaje,function(){

							$('#myModal6').modal('hide');

						

						});



	}else{
	
		var datos=$('#imforme_integral').serializeArray();
		
		// console.log(datos);
		
		// alert("correcto");
		
		// return false;

		var nombreCandidato = $("#nombrecandidato").val();
		
		var cargoAspira = $("#cargoaspira").val();
		
		var fechaLb = $("#fecharlb").val();
		
		var organizacion1 = $("#organizacion1").val();
		
		var telefono1 = $("#telefono1").val();
		
		var referido1 = $("#referido1").val();
		
		var cargo1 = $("#cargo1").val();
		
		var funcionesr1 = $("#funcionesr1").val();
		
		var tiempol1 = $("#tiempol1").val();
		
		var motivore1 = $("#motivore1").val();
		
		var puntaje1 = $("#puntaje1").val();
		
		var puntaje2 = $("#puntaje2").val();
		
		var puntaje3 = $("#puntaje3").val();
		
		var puntaje4 = $("#puntaje4").val();
		
		var puntaje5 = $("#puntaje5").val();
		
		var puntaje6 = $("#puntaje6").val();
		
		var puntaje7 = $("#puntaje7").val();
		
		var puntaje8 = $("#puntaje8").val();
		
		var puntajegeneral = $("#puntajegeneral").val();
		
		var aspectore1 = $("#aspectore1").val();
		
		var contrataria1 = $("#contrataria1").val();
		
		var observaciones1 = $("#observaciones1").val();
		
		var verificadopor1 = $("#verificadopor1").val();
		
		var organizacion2 = $("#organizacion2").val();
		
		var telefono2 = $("#telefono2").val();
		
		var referido2 = $("#referido2").val();
		
		var cargo2 = $("#cargo2").val();
		
		var funcionesrea2 = $("#funcionesrea2").val();
		
		var tiempolb2 = $("#tiempolb2").val();
		
		var motivore2 = $("#motivore2").val();
		
		var puntaje12 = $("#puntaje12").val();
		
		var puntaje22 = $("#puntaje22").val();
		
		var puntaje32 = $("#puntaje32").val();
		
		var puntaje42 = $("#puntaje42").val();
		
		var puntaje52 = $("#puntaje52").val();
		
		var puntaje62 = $("#puntaje62").val();
		
		var puntaje72 = $("#puntaje72").val();
		
		var puntaje82 = $("#puntaje82").val();
		
		var puntajegeneral2 = $("#puntajegeneral2").val();
		
		var aspectosreal2 = $("#aspectosreal2").val();
		
		var contratarianuev2 = $("#contratarianuev2").val();
		
		var observaciones2 = $("#observaciones2").val();
		
		var verificadopor2 = $("#verificadopor2").val();
		
		var nombrerespersonal = $("#nombrerespersonal").val();
		
		var telefonorespersonal = $("#telefonorespersonal").val();
		
		var ocupacionrespersonal = $("#ocupacionrespersonal").val();
		
		var vinculorespersonal = $("#vinculorespersonal").val();
		
		var descotro = $("#descotro").val();
		
		var tiemporespersonal = $("#tiemporespersonal").val();
		
		var descriprefpersonal = $("#descriprefpersonal").val();
		
		var porrecomienpersonal = $("#porrecomienpersonal").val();
		
		var fortalpersonal = $("#fortalpersonal").val();
		
		var empresalaborocandpersonal = $("#empresalaborocandpersonal").val();
		
		var verificadoporultimo = $("#verificadoporultimo").val();
		
		var conceptogestionhumana = $("#conceptogestionhumana").val();
		
		var cos_asprefperosonal = $("#cos_asprefperosonal").val();
		
		

		 // console.log("ggggg:"+nombreCandidato+"-------"+cargoAspira+"---"+fechaLb+"fecha"+organizacion1+"--gestion humana"+conceptogestionhumana);
		
		
		//return false; //quitarr se para para verificar que esta recogiendo los datos****
		
		
		
	
			$.ajax({
					
				url:'ing_informe_integral.php',
				type:'POST',
				data:datos,
				dataType:'html',
				success:function(res){
				
					
					if(res==true){
					
						$('#contenido2').css('display','none');
						$('#contenido').css('display','block');
						$('#contenido').load('consultar_inf.php');
						
						mensaje="Se ha ingresado correctamente"

						Alert.alert(mensaje,function(){

								$('#myModal6').modal('hide');

							

							});
					
					}else{
						
						
						mensaje="No se ha ingresado correctamente comuniquese con el administrador..."

						Alert.alert(mensaje,function(){

								$('#myModal6').modal('hide');

							

							});
					
					
					}
					 
				}
			});
			
			
			
			

		//segundo ajax guarda en la tabla informe_integral2
		
		$.ajax({
					
				url:'ing_informe_integral2.php',
				type:'POST',
				data:'&cos_asprefperosonal='+cos_asprefperosonal+'&nombreCandidato='+nombreCandidato+'&cargoAspira='+cargoAspira+'&fechaLb='+fechaLb+'&organizacion1='+organizacion1+'&telefono1='+telefono1+'&referido1='+referido1+'&cargo1='+cargo1+'&funcionesr1='+funcionesr1+'&tiempol1='+tiempol1+'&motivore1='+motivore1+'&puntaje1='+puntaje1+'&puntaje2='+puntaje2+'&puntaje3='+puntaje3+'&puntaje4='+puntaje4+'&puntaje5='+puntaje5+'&puntaje6='+puntaje6+'&puntaje7='+puntaje7+'&puntaje8='+puntaje8+'&puntajegeneral='+puntajegeneral+'&aspectore1='+aspectore1+'&contrataria1='+contrataria1+'&observaciones1='+observaciones1+'&verificadopor1='+verificadopor1+'&organizacion2='+organizacion2+'&telefono2='+telefono2+'&referido2='+referido2+'&cargo2='+cargo2+'&funcionesrea2='+funcionesrea2+'&tiempolb2='+tiempolb2+'&motivore2='+motivore2+'&puntaje12='+puntaje12+'&puntaje22='+puntaje22+'&puntaje32='+puntaje32+'&puntaje42='+puntaje42+'&puntaje52='+puntaje52+'&puntaje62='+puntaje62+'&puntaje72='+puntaje72+'&puntaje82='+puntaje82+'&puntajegeneral2='+puntajegeneral2+'&aspectosreal2='+aspectosreal2+'&contratarianuev2='+contratarianuev2+'&observaciones2='+observaciones2+'&verificadopor2='+verificadopor2+'&nombrerespersonal='+nombrerespersonal+'&telefonorespersonal='+telefonorespersonal+'&ocupacionrespersonal='+ocupacionrespersonal+'&vinculorespersonal='+vinculorespersonal+'&descotro='+descotro+'&tiemporespersonal='+tiemporespersonal+'&descriprefpersonal='+descriprefpersonal+'&porrecomienpersonal='+porrecomienpersonal+'&fortalpersonal='+fortalpersonal+'&empresalaborocandpersonal='+empresalaborocandpersonal+'&verificadoporultimo='+verificadoporultimo+'&conceptogestionhumana='+conceptogestionhumana,
				dataType:'html',
				success:function(res){
				
					//alert(res);
				
					
					// if(res==true){
					
						// $('#contenido2').css('display','none');
						// $('#contenido').css('display','block');
						// $('#contenido').load('consultar_inf.php');
						
						// mensaje="Se ha ingresado correctamente"

						// Alert.alert(mensaje,function(){
								// $('#myModal6').modal('hide');
							// });
					
					// }else{
						
						// mensaje="No se ha ingresado correctamente comuniquese con el administrador..."

						// Alert.alert(mensaje,function(){
								// $('#myModal6').modal('hide');
							// });
					
					
					// }
					 
				}
			});
		
		



		//end del segundo ajax		
				 
				 
				 
				return false;
	
	}

	

}




function informe(cedula){

	$('#contenido').css('display','none');
	$('#contenido2').load('informe_integral.php?cedula='+cedula);



}


//funcion solo numeros
		function validarnum(e) {
			tecla = (document.all) ? e.keyCode : e.which;
			if (tecla==8) return true;
			patron = /\d/;
			te = String.fromCharCode(tecla);
			return patron.test(te);
		}
