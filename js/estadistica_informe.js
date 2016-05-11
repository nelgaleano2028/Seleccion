$(document).ready(main);


function main(){

$('#editar_informe').click(editar_informe);

	$.ajax({
			
		url:'estadistica_informe.php',
		type:'POST',
		data:'cedula='+$('#identificacion').val(),
		dataType:'JSON',
		success:function(res){
		
			console.log(res);
			
			var titulo='ATENCION AL DETALLE';
			var ca1='Focalizada';
			var ca2='Selectiva';
			var ca3='Procesamiento';
			var id='#contenedor1'
			var valor_1_1=Number(res.valor_1_1);
			var valor_2_1=Number(res.valor_2_1);
			var valor_3_1=Number(res.valor_3_1);
			
			
			estadistica_editable(id,titulo,valor_1_1,valor_2_1,valor_3_1,ca1,ca2,ca3);
			
			
			var id2='#contenedor2'
			var valor_1_2=Number(res.valor_1_2);
			var valor_2_2=Number(res.valor_2_2);
			var valor_3_2=Number(res.valor_3_2);
			
			
			estadistica_editable(id2,titulo,valor_1_2,valor_2_2,valor_3_2,ca1,ca2,ca3);
			
			
			var id3='#contenedor3'
			var valor_1_3=Number(res.valor_1_3);
			var valor_2_3=Number(res.valor_2_3);
			var valor_3_3=Number(res.valor_3_3);
			
			
			estadistica_editable(id3,titulo,valor_1_3,valor_2_3,valor_3_3,ca1,ca2,ca3);
			
			
			var id4='#contenedor4'
			var valor_1_4=Number(res.valor_1_4);
			var valor_2_4=Number(res.valor_2_4);
			var valor_3_4=Number(res.valor_3_4);
			
			
			estadistica_editable(id4,titulo,valor_1_4,valor_2_4,valor_3_4,ca1,ca2,ca3);
			
				 
		}
	});

		 
	return false;
}


//estadistica
function estadistica_editable(id,titulo,valor1,valor2,valor3,ca1,ca2,ca3){


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
			data: [valor1,valor2,valor3]
		}]
	});

}

function editar_informe(){

	if($('select[name=cargo]').val() == ""){

		mensaje="<p style='text-align:center; color:red; font-weight:bold;'>Hay campos vacíos...</p>";

					Alert.alert(mensaje,function(){

							$('#myModal6').modal('hide');

						

						});

	}else{
	
		var datos=$('#imforme_integral').serializeArray();
		
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
		
		var idcand = $("#idcandidatolab").val();
		
	
			$.ajax({
					
				url:'editar_integral.php',
				type:'POST',
				data:datos,
				dataType:'html',
				success:function(res){
					console.log(res); 
					
					if(res==true){
					
						$('#contenido2').css('display','none');
						$('#contenido').css('display','block');
						$('#contenido').load('editar_inf.php');
						
						mensaje="Se ha ingresado correctamente"

						Alert.alert(mensaje,function(){

								$('#myModal6').modal('hide');

							     location.reload();

							});
							
							
							
					
					}else{
						
						
						mensaje="No se ha ingresado correctamente comuniquese con el administrador..."

						Alert.alert(mensaje,function(){

								$('#myModal6').modal('hide');

								

							});
					
					
					}
					 
				}
			});
			
			
			
			$.ajax({
					
				url:'editar_integral2.php',
				type:'POST',
				data:'id='+idcand+'&cos_asprefperosonal='+cos_asprefperosonal+'&nombreCandidato='+nombreCandidato+'&cargoAspira='+cargoAspira+'&fechaLb='+fechaLb+'&organizacion1='+organizacion1+'&telefono1='+telefono1+'&referido1='+referido1+'&cargo1='+cargo1+'&funcionesr1='+funcionesr1+'&tiempol1='+tiempol1+'&motivore1='+motivore1+'&puntaje1='+puntaje1+'&puntaje2='+puntaje2+'&puntaje3='+puntaje3+'&puntaje4='+puntaje4+'&puntaje5='+puntaje5+'&puntaje6='+puntaje6+'&puntaje7='+puntaje7+'&puntaje8='+puntaje8+'&puntajegeneral='+puntajegeneral+'&aspectore1='+aspectore1+'&contrataria1='+contrataria1+'&observaciones1='+observaciones1+'&verificadopor1='+verificadopor1+'&organizacion2='+organizacion2+'&telefono2='+telefono2+'&referido2='+referido2+'&cargo2='+cargo2+'&funcionesrea2='+funcionesrea2+'&tiempolb2='+tiempolb2+'&motivore2='+motivore2+'&puntaje12='+puntaje12+'&puntaje22='+puntaje22+'&puntaje32='+puntaje32+'&puntaje42='+puntaje42+'&puntaje52='+puntaje52+'&puntaje62='+puntaje62+'&puntaje72='+puntaje72+'&puntaje82='+puntaje82+'&puntajegeneral2='+puntajegeneral2+'&aspectosreal2='+aspectosreal2+'&contratarianuev2='+contratarianuev2+'&observaciones2='+observaciones2+'&verificadopor2='+verificadopor2+'&nombrerespersonal='+nombrerespersonal+'&telefonorespersonal='+telefonorespersonal+'&ocupacionrespersonal='+ocupacionrespersonal+'&vinculorespersonal='+vinculorespersonal+'&descotro='+descotro+'&tiemporespersonal='+tiemporespersonal+'&descriprefpersonal='+descriprefpersonal+'&porrecomienpersonal='+porrecomienpersonal+'&fortalpersonal='+fortalpersonal+'&empresalaborocandpersonal='+empresalaborocandpersonal+'&verificadoporultimo='+verificadoporultimo+'&conceptogestionhumana='+conceptogestionhumana,
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
			
			

				 
				return false;
	
	}


}
