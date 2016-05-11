$(document).ready(mains);

function mains(){

	
	
	/*validar las fechas y el plugin datapicker*/
	$('#dp1, #dp2, #dp3, #dp4').datepicker({
		 autoclose: true,
		 weekStart: 1,
	
	}).on('changeDate', function(ev) {
		
		$(this).datepicker('hide');
		 
		 
		 
	});
	
	
	$('.centro_costo').change(function(){
		
		var bandera=1;
			//$('.remove_cargo').remove(); // remover el cargo cuando se edita el formulario
			//$('.remove_reemplazo').remove();
	
		$.ajax({
	
			url:'select_requisicion.php',
			type:'POST',
			data:'centro_costo='+$('.centro_costo').val()+"&cod_epl="+$('#cod_epl').val()+"&bandera="+bandera,
			dataType:'html',
			success:function(data){

				$("#remover_cargo").remove();
			
				$('.cargo').html(data);
				
				bandera=3;
				
				$.ajax({
	
					url:'select_requisicion.php',
					type:'POST',
					data:'centro_costo='+$('.centro_costo').val()+"&bandera="+bandera,
					dataType:'html',
					success:function(res){

						$("#remover_mismaArea").remove();

						$('.misma_area').html(res);

					}
				});
				
				
				
			}
		});
		
		return false;
	
	});
	
	$('.cargo').change(function(){
		
		var bandera=2;
		
		$.ajax({
	
			url:'select_requisicion.php',
			type:'POST',
			data:'centro_costo='+$('.centro_costo').val()+"&cargo="+$('.cargo').val()+"&bandera="+bandera,
			dataType:'html',
			success:function(res){
			
				$("#remover_reemplazo").remove();
				$('.reemplazo1').html(res);


				bandera=4;

				$.ajax({
	
					url:'select_requisicion.php',
					type:'POST',
					data:'centro_costo='+$('.centro_costo').val()+"&cargo="+$('.cargo').val()+"&bandera="+bandera,
					dataType:'html',
					success:function(res){

						$("#remover_reemplazo2").remove();
						$('.reemplazo2').html(res);


					}
				});

				
			}
		});
		
		return false;
	
	});

	/* reemplazo_cedula  Buscar cedula con autocompletar*/
	$("#reemplazo_cedula").chosen({width:"30%"});



   		$.ajax({
					url:"select_empleado.php",
					type:"post",
					success:function(res){
						
						$("#reemplazo_cedula").html(res);
						$("#reemplazo_cedula").trigger("liszt:updated");
					}
			});

		

	/*fin reemplazo_cedula  Buscar cedula con autocompletar*/

	/*poner automaticamente los dias de la ausencia*/
	$('.ausencia').change(function(){
	
			

		var reemplazo;

		if($('.reemplazo2').val() ==-1 && $('#reemplazo_cedula').val() ==-1){


			reemplazo=	$('.reemplazo1').val();

		}else if($('.reemplazo1').val() ==-1 && $('.reemplazo2').val() ==-1){




			reemplazo=	$('#reemplazo_cedula').val();

		}else{


			reemplazo=	$('#reemplazo2').val();
		}

		

		if($(".ausencia").val() != ""){


			$.ajax({

				url:'traer_dias_ausencia.php',
				type:'POST',
				data:'reemplazo='+reemplazo+"&ausencia="+$('.ausencia').val(),
				dataType:'html',
				success:function(res){

				

					$(".poner_dias").html(res+" Días");
					$(".leyenda").html("NOTA: La respectiva Ausencia se realiza en el Modulo de Turnos");
					
					
				}
			});
	
			return false;


		}else{

			$(".poner_dias").html("");
			$(".leyenda").html("");

		}
		
		
		
	
	});
	/*----------------------------------------------*/
	
	
	/*formulario requision interna validacion de los checked para limpiar los campos select*/
	$( 'input:radio[name="sugerencia"]' ).on( "click", function() {
	
		var checked=$('input:radio[name="sugerencia"]:checked').val();
		
		if(checked ==2){
			
			$('select[name=misma_area]').val('');
		}else if(checked ==1){
		
			$("input[name=area_externa]").val('');
		}
	});
	
	$( 'input:radio[name="motivo"]' ).on( "click", function() {
	
		var checked=$('input:radio[name="motivo"]:checked').val();
		
		if(checked ==2 || checked ==3 || checked ==4){

			$('.poner_dias').html("");
			$('.leyenda').html('');
			
			$('select[name=ausencia]').val('');

		}
	});


	/* area_externa Buscar cedula con autocompletar*/
	$("#area_externa").chosen({width:"25%"});

	$.ajax({
				url:"select_empleado.php",
				type:"post",
				success:function(res){
					$("#area_externa").append(res);
					$("#area_externa").trigger("liszt:updated");
				}
		});

	/*fin de la busqueda area_externa autocompletar*/
	
	
	/*Ingresar requisicion*/
	$('#requisicion_internaBtn').click(ingresar_requisicion);
	/*Editar requisicion interna*/
	$('#EDrequisicion_internaBtn').click(editar_requisicion);
	/*cancelar el editar de la requisicion interna*/
	$('#EDrequisicion_cancelar').click(requisicion_cancelar);


	/*desabilitar los selects una vez elegido uno*/

	$('.reemplazo1').change(function(){


		$('.poner_dias').html("");
		$('.leyenda').html('');



		if($('.reemplazo1').val() != -1 ){


			$('.reemplazo2').attr('disabled',true);
			$( "#reemplazo_cedula" ).attr('disabled',true).trigger("liszt:updated");

		}else{

			$('.reemplazo2').attr('disabled',false);
			$( "#reemplazo_cedula" ).attr('disabled',false).trigger("liszt:updated");
		}


	});


	$('.reemplazo2').change(function(){

		$('.poner_dias').html("");
		$('.leyenda').html('');

		if($('.reemplazo2').val() != -1 ){


			$('.reemplazo1').attr('disabled',true);
			$( "#reemplazo_cedula" ).attr('disabled',true).trigger("liszt:updated");

		}else{

			$('.reemplazo1').attr('disabled',false);
			$( "#reemplazo_cedula" ).attr('disabled',false).trigger("liszt:updated");
		}


	});


	$( "#reemplazo_cedula" ).change(function(){

		$('.poner_dias').html("");
		$('.leyenda').html('');

		if($( "#reemplazo_cedula option:selected" ).val() != -1  ){


			$('.reemplazo1').val('-1');
			$('.reemplazo2').val('-1');

			$('.reemplazo1').attr('disabled',true);
			$('.reemplazo2').attr('disabled',true);

		}else{

			$('.reemplazo1').val('-1');
			$('.reemplazo2').val('-1');

			$('.reemplazo1').attr('disabled',false);
			$('.reemplazo2').attr('disabled',false);
		}


	});


	$('#area_externa').change(function(){


		$('.misma_area').val("");


			if($('#area_externa option:selected').val() ==-1){

				

				$('input:radio[name="sugerencia"]').each(function(){
					   $(this)[0].checked = false;  
					});



			}
	});


	$(".misma_area").change(function(){


			$('#area_externa').val(-1).trigger("liszt:updated");;


			if($('.misma_area option:selected').val() ==""){

				

				$('input:radio[name="sugerencia"]').each(function(){
					   $(this)[0].checked = false;  
					});



			}
	});
	
}

function requisicion_cancelar(){

	window.close();
}



function ingresar_requisicion(){

	if($('.centro_costo').val()== ""){
		
		
		
	
		mensaje="<p style='text-align:center; color:green; font-weight:bold;'>El Centro Costo esta vacío...</p>";

		Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});


	}else if($('.cargo').val()== ""){

			
    	mensaje="<p style='text-align:center; color:green; font-weight:bold;'>El Cargo Rerquerido esta vacío..</p>";

		Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});


	}else if( $( "#reemplazo_cedula option:selected" ).val() == -1  && $('.reemplazo2').val() == -1  &&  $('.reemplazo1').val() == -1){

			mensaje="<p style='text-align:center; color:green; font-weight:bold;'>El Reemplazo  esta vacío..</p>";

			Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});

	}else if($('input:radio[name="motivo"]:checked').val() == 1 &&  $('.ausencia').val() ==""  ||   $('.ausencia').val() != "" && $('input:radio[name="motivo"]:checked').val() != 1  ){

			mensaje="<p style='text-align:center; color:green; font-weight:bold;'>Seleeccione una ausencia..</p>";

			Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});

	}else if($('input:radio[name="motivo"]:checked').val() != 1 && $('input:radio[name="motivo"]:checked').val() != 2  && $('input:radio[name="motivo"]:checked').val() != 3 && $('input:radio[name="motivo"]:checked').val() != 4){


		mensaje="<p style='text-align:center; color:green; font-weight:bold;'>Causa de la vacante esta vacío ..</p>";

			Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});


	}else if( $('input[name="fecha_inicioL"]').val()== ""){


		mensaje="<p style='text-align:center; color:green; font-weight:bold;'>La fecha de  inicia Labor ..</p>";

			Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});

	}else if( $('input:radio[name="sugerencia"]:checked').val() == 1 &&  $('.misma_area').val() == "" || $('.misma_area').val() != "" && $('input:radio[name="sugerencia"]:checked').val() != 1  ){

			mensaje="<p style='text-align:center; color:green; font-weight:bold;'>Seleeccione la misma area ..</p>";

			Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});


	}else if($('input:radio[name="sugerencia"]:checked').val() == 2 &&  $('#area_externa option:selected').val() == -1 || $('#area_externa option:selected').val() != -1  && $('input:radio[name="sugerencia"]:checked').val() != 2 ){

			mensaje="<p style='text-align:center; color:green; font-weight:bold;'>Debe seleccionar una cedula del area externa ..</p>";

			Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});

	}else{


			$.ajax({
	
				url:'ingresar_requisicion.php',
				type:'POST',
				data:$('#requisicion_interna').serialize(),
				dataType:'html',
				success:function(data){
					
					console.log(data); 

					
					//limpiar el formulario o resetearlo
					$(':input','#requisicion_interna').not(':button, :submit, :reset').val('');
					$('#requisicion_interna').find("input:checked[type='radio']").each(function(){
					   $(this)[0].checked = false;  
					});
					$('#area_externa, #reemplazo_cedula').val('').trigger("liszt:updated");
					$('.poner_dias').html('');
					$('.leyenda').html('');
					
					
					if(data==1){
					
						//mensaje personalizado
						mensaje="<p style='text-align:center; color:green; font-weight:bold;'>Se ha enviado correctamente...</p>";
					
					}else if(data==2){
					
						//mensaje personalizado
						mensaje="<p style='text-align:center; color:red; font-weight:bold;'>No Se ha enviado intentalo de nuevo...</p>";
					
					}
					
					//alert personalizado
					Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});
					
					
				}
			});
					
			return false;




	}

	
					
			
}

function editar_requisicion(){


	//console.log($('#area_externa option:selected').val()); return false;



	if($('.centro_costo').val()== ""){

		mensaje="<p style='text-align:center; color:red; font-weight:bold;'>El Centro Costo esta vacío...</p>";

		Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});


	}else if($('.cargo').val()== ""){

			
    	mensaje="<p style='text-align:center; color:red; font-weight:bold;'>El Cargo Rerquerido esta vacío..</p>";

		Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});


	}else if( $( "#reemplazo_cedula option:selected" ).val() == -1  && $('.reemplazo2').val() == -1  &&  $('.reemplazo1').val() == -1){

			mensaje="<p style='text-align:center; color:red; font-weight:bold;'>El Reemplazo  esta vacío..</p>";

			Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});

	}else if($('input:radio[name="motivo"]:checked').val() == 1 &&  $('.ausencia').val() =="" ){

			mensaje="<p style='text-align:center; color:red; font-weight:bold;'>Seleeccione una ausencia..</p>";

			Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});

	}else if($('input:radio[name="motivo"]:checked').val() != 1 && $('input:radio[name="motivo"]:checked').val() != 2  && $('input:radio[name="motivo"]:checked').val() != 3 && $('input:radio[name="motivo"]:checked').val() != 4){


		mensaje="<p style='text-align:center; color:red; font-weight:bold;'>Causa de la vacante esta vacío ..</p>";

			Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});


	}else if( $('input[name="fecha_inicioE"]').val()== ""){

		mensaje="<p style='text-align:center; color:red; font-weight:bold;'>La fecha de  inicio entrenamiento esta vacío ..</p>";

			Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});


	}else if( $('input[name="fecha_finE"]').val()== ""){


		mensaje="<p style='text-align:center; color:red; font-weight:bold;'>La fecha de  Fin Entrenamiento esta vacío ..</p>";

			Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});


	}else if( $('input[name="fecha_inicioL"]').val()== ""){


		mensaje="<p style='text-align:center; color:red; font-weight:bold;'>La fecha de  inicia Labor ..</p>";

			Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});

	}else if( $('input:radio[name="sugerencia"]:checked').val() == 1 &&  $('.misma_area').val() == "" ){

			mensaje="<p style='text-align:center; color:red; font-weight:bold;'>Seleeccione la misma area ..</p>";

			Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});


	}else if($('input:radio[name="sugerencia"]:checked').val() == 2 &&  $('#area_externa option:selected').val() == -1 || $('#area_externa option:selected').val() != -1  && $('input:radio[name="sugerencia"]:checked').val() != 2 ){

			mensaje="<p style='text-align:center; color:red; font-weight:bold;'>Debe seleccionar una cedula del area externa ..</p>";

			Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});

	}else{


		$.ajax({

			url:'ed_requisicion_interna.php',
			type:'POST',
			data:$('#requisicion_interna').serialize(),
			dataType:'html',
			success:function(data){

				if(data==1){
					
					//mensaje personalizado
					mensaje="<p style='text-align:center; color:green; font-weight:bold;'>Se ha enviado correctamente...</p>";
				
				}else if(data==2){
				
					//mensaje personalizado
					mensaje="<p style='text-align:center; color:red; font-weight:bold;'>No Se ha enviado intentalo de nuevo...</p>";
				
				}
					
					
				//alert personalizado
				Alert.alert(mensaje,
				function(){
				
				$('#myModal6').modal('hide');
					//window.opener.location.reload();
					window.close();
				});
				
				
			}
		});
				
		return false;

	}

	
    


}