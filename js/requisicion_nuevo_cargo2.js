$(document).ready(main);

/* validaciones para los formularios: solicitud requisicion_nuevo_cargo y sustentacion de la necesidad */
function main(){

	$("#mostrar").hide();
	/*Mostrar y ocultar los iconos cuando se llena el formulario requisicion_nuevo_cargo y sustentacion de la necesidad*/
	$("#mostrar_delete").hide();
	$("#mostrar_success").hide();


		/*validacion formulario solicitud Requisicion Nuevo cargo*/
        $('#requisicion_nuevo_cargo').validate({
            rules: {
				centro_costo: 'required',
				cargoRequerido:'required',
				cargo:{
					
					 required: { depends: function(element) { return ($('input:radio[name="cargoRequerido"]:checked').val() == 1 && $('.cargo').val() =="")  }}
				
				},
				fec_iniE:{
					required: { depends: function(element) { return $('input:radio[name="motivo"]:checked').val() == 1 && $('input[name="fec_iniE"]').val() =="" && $('input[name="fec_finE"]').val() =="" && $('input[name="fec_iniL"]').val() =="" && $('input[name="fec_finL"]').val() ==""}}
				},
				fec_finE:{
					required: { depends: function(element) { return $('input:radio[name="motivo"]:checked').val() == 1 && $('input[name="fec_iniE"]').val() =="" && $('input[name="fec_finE"]').val() =="" && $('input[name="fec_iniL"]').val() =="" && $('input[name="fec_finL"]').val() ==""}}
				},
				fec_iniL:{
					required: { depends: function(element) { return $('input:radio[name="motivo"]:checked').val() == 1 && $('input[name="fec_iniE"]').val() =="" && $('input[name="fec_finE"]').val() =="" && $('input[name="fec_iniL"]').val() =="" && $('input[name="fec_finL"]').val() ==""}}
				},
				fec_finL:{
					required: { depends: function(element) { return $('input:radio[name="motivo"]:checked').val() == 1 && $('input[name="fec_iniE"]').val() =="" && $('input[name="fec_finE"]').val() =="" && $('input[name="fec_iniL"]').val() =="" && $('input[name="fec_finL"]').val() ==""}}
				},
				fec_iniET:{
					
					required: { depends: function(element) { return $('input:radio[name="motivo"]:checked').val() == 2 && $('input[name="fec_iniET"]').val() =="" && $('input[name="fec_finET"]').val() =="" && $('input[name="fec_iniLT"]').val() =="" && $('input[name="fec_finLT"]').val() ==""}}
				
				},
				fec_finET:{
					
					required: { depends: function(element) { return $('input:radio[name="motivo"]:checked').val() == 2 && $('input[name="fec_iniET"]').val() =="" && $('input[name="fec_finET"]').val() =="" && $('input[name="fec_iniLT"]').val() =="" && $('input[name="fec_finLT"]').val() ==""}}
					
				},
				fec_iniLT:{
					required: { depends: function(element) { return $('input:radio[name="motivo"]:checked').val() == 2 && $('input[name="fec_iniET"]').val() =="" && $('input[name="fec_finET"]').val() =="" && $('input[name="fec_iniLT"]').val() =="" && $('input[name="fec_finLT"]').val() ==""}}
				},
				fec_finLT:{
					required: { depends: function(element) { return $('input:radio[name="motivo"]:checked').val() == 2 && $('input[name="fec_iniET"]').val() =="" && $('input[name="fec_finET"]').val() =="" && $('input[name="fec_iniLT"]').val() =="" && $('input[name="fec_finLT"]').val() ==""}}
				},
				fec_iniEA:{
				
					required: { depends: function(element) { return $('input:radio[name="motivo"]:checked').val() == 3 && $('input[name="fec_iniEA"]').val() =="" && $('input[name="fec_finEA"]').val() =="" && $('input[name="fec_iniLA"]').val() ==""}}
				},
				fec_finEA:{
				
					required: { depends: function(element) { return $('input:radio[name="motivo"]:checked').val() == 3 && $('input[name="fec_iniEA"]').val() =="" && $('input[name="fec_finEA"]').val() =="" && $('input[name="fec_iniLA"]').val() =="" }}
				},
				fec_iniLA:{
					required: { depends: function(element) { return $('input:radio[name="motivo"]:checked').val() == 3 && $('input[name="fec_iniEA"]').val() =="" && $('input[name="fec_finEA"]').val() =="" && $('input[name="fec_iniLA"]').val() =="" }}
				},
				
				motivo:'required',
			},
			
			// Specify the validation error messages
			messages: {
				 cargo: '*',
				 centro_costo : '*',
				 cargoRequerido:'*',
				 fec_iniE:'*',
				 fec_finE:'*',
				 fec_iniL:'*',
				 fec_finL:'*',
				 fec_iniET:'*',
				 fec_finET:'*',
				 fec_iniLT:'*',
				 fec_finLT:'*',
				 fec_iniEA:'*',
				 fec_finEA:'*',
				 fec_iniLA:'*',
				 motivo:'*',
			},
			debug: true,
        });
		/*fin validacion formulario solicitud Requisicion Nuevo cargo*/
		
		
	
    /*seleccionar centro costo del formulario reqisicion nuevo cargo*/	
	$('.centro_costo').change(function(){
		
		var bandera=1;
	
		$.ajax({
	
			url:'select_requisicion.php',
			type:'POST',
			data:'centro_costo='+$('.centro_costo').val()+"&cod_epl="+$('#cod_epl').val()+"&bandera="+bandera,
			dataType:'html',
			success:function(data){
			
				//console.log(data);
				
				$(data).appendTo('.cargo');
				
			}
		});
		
		return false;
	
	});


	/*Fechas para el formulario requesicion nuevo cargo*/
	$('#fec_iniE, #fec_finE, #fec_iniL, #fec_finL, #fec_iniET, #fec_finET, #fec_iniLT, #fec_finLT, #fec_iniEA, #fec_finEA, #fec_iniLA, #fec_finLA').datepicker({
		 autoclose: true,
		 weekStart: 1,
	
	}).on('changeDate', function(ev) {
		
		$(this).datepicker('hide');
		 
		 $('#requisicion_nuevo_cargo').valid();
		 
	});
	
	
	/*Ingresar requisicion nuevo cargo*/
	$('#requisicion_nuevo_cargoBtn').click(requisicion_nuevo_cargo);
	/*Editar personas cargo*/
	$('#EDrequisicion_nuevo_cargoBtn').click(EDrequisicion_nuevo_cargo);
	
	
	
	
	/*validacion formulario sustentacion de la necesidad*/
		$('#personas_cargoFrm').validate({
            rules: {
			nomCar: 'required',
			},
			
			// Specify the validation error messages
			messages: {
				 //area_externa: '*',
				 nomCar : '*',
			},
			debug: true,
        });
		/*fin validacion formulario sustentacion de la necesidad*/
 
	
	/*Mostrar formulario de las sustentacion de la necesidad*/
	$("#show_frmSustentacion").click(function(){
	
		$("#esconder").slideUp('slow');
		$("#mostrar").slideDown('slow');
								
		return false;
	});

	
	
	/*para insertar mas funciones que hace el empleado*/
	$('#funcion').on('click',function(){
			
			$(this).each( function( ) {
				
				var funcion=Number($(".numero").last().html()) +1;
		        
				var caja="caja_"+funcion;
				
				var contenido='<div class="small-box" id="caja_'+funcion+'">';					
				contenido+='<div class="form-group">';
				contenido+='<label class="login_label control-label"><span class="numero">'+funcion+'</span>. Funcion:</label>';
				contenido+='<input type="text" name="funcion[]" class="funcion">';
                contenido+='</div>';
				contenido+='<div class="form-group">';
				contenido+='<label class="login_label control-label">Porcentaje %:</label>';
				contenido+='<input type="text" class="input-mini" name="porcentaje[]" >';	
				contenido+='</div>';
				contenido+='<div style="clear:both"></div>';
				contenido+='<div class="form-group">';
				contenido+='<label class="login_label control-label">¿Qué hace?</label>';
				contenido+='<textarea name="funcion1[]"></textarea>';
				contenido+='</div>';
				contenido+='<div class="form-group">';
				contenido+='<label class="login_label control-label">¿Como se hace?</label>';
				contenido+='<textarea name="funcion2[]"></textarea>';
				contenido+='</div>';
				contenido+='<div class="form-group">';
				contenido+='<label class="login_label control-label">¿Para qué se hace?</label>';
				contenido+='<textarea name="funcion3[]"></textarea>';
				contenido+='</div>';
				contenido+='<a href="#" onClick="eliminar_cargo(\''+caja+'\')" class="btn btn-primary">Eliminar</a>';
				contenido+='</div>';
					
					
				agregar_clon(contenido);
			 
			});					
	});
	
	var count1=2;
	
	$('#area').on('click', function(){
	
		$(this).each( function( ) {
			
			var funcion=Number($(".numero").last().html()) +1;
		        
				var caja="area_"+funcion;
		
			var contenido='<div class="small-box2" id="area_'+funcion+'">';
			contenido+='<div class="form-group">';
            contenido+='<label class="login_label control-label"><span class="numero">'+funcion+'</span>. Área:</label>';
            contenido+='<input type="text" name="area[]" value="">';
            contenido+='<label class="login_label control-label">Cliente:</label>';
            contenido+='<input type="text" name="cliente[]" value="">';			
			contenido+='</div>';
			contenido+='<div class="form-group">';
			contenido+='<label class="login_label control-label">Proveedor:</label>';
			contenido+='<input type="text" name="proveedor[]" value="">';
			contenido+='<a href="#" onClick="eliminar_area(\''+caja+'\')" class="btn btn-primary">Eliminar</a>';
			contenido+='</div>';
			contenido+='<div style="clear:both"></div>';
			
			contenido+='</div>';
			
			agregar_clon2(contenido);
		
		
		
		
		});
		
		
	});	



    /*limpiar las fechas cuando da click en el radio motivio*/
	$( 'input:radio[name="motivo"]' ).on( "click", function() {


		$(':input','#requisicion_nuevo_cargo').not(':button, :submit, :reset, :radio, :hidden').val('');
				
	});

	$( '#requisicion_cancelar' ).click(function(){

		window.close();

	});
	
	
	/*Ingresar personas cargo formulario*/
	$('#personas_cargoBtn').click(ing_persona_cargo);
	/*cancelar el formular de pestañas*/
	$('#cancelar_cargoBtn').click(cancel_persona_cargo);
	
	/*Editar el formulario de pestañas*/
	$('#EDpersonas_cargoBtn').click(edit_persona_cargo);
	
}


/*Clonar el formulario: funciones que hace el empleado*/
function agregar_clon(contenido){
		
	$(contenido).appendTo('.formulario_clon');
		
}

/*clonar areas*/
function agregar_clon2(contenido){
	$(contenido).appendTo('.formulario_clon2');

}


/*cancelar el formulario de pestañas sustentacion de la necesidad*/
function cancel_persona_cargo(){

	$("#mostrar").slideUp('slow');
	$("#esconder").slideDown('slow');
	//$("input[name=nomCar]").val("");


}

/*enviar los datos del formulario de pestañas sustentacion de la necesidad*/
function ing_persona_cargo(){


	if ($('#personas_cargoFrm').valid()) {
		
		
		$("#mostrar_delete").hide();
		$("#mostrar_success").show();
		$("#adjuntar").hide();
		
		
		$("#mostrar").slideUp('slow');
		$("#esconder").slideDown('slow');

		
		datos= new Array();
			
		datos.push({name:'numero_pacientes1', value:$("input[name=numero_pacientes1]").val()},
		{name:'numero_pacientes2', value:$("input[name=numero_pacientes2]").val()},{name:'cumplir_meta1', value:$("input[name=cumplir_meta1]").val()},{name:'numero_ventas1', value:$("input[name=numero_ventas1]").val()},{name:'numero_ventas2', value:$("input[name=numero_ventas2]").val()},{name:'cumplir_meta2', value:$("input[name=cumplir_meta2]").val()},
		{name:'numero_procedimientos1', value:$("input[name=numero_procedimientos1]").val()},{name:'numero_procedimientos2', value:$("input[name=numero_procedimientos2]").val()}, {name:'cumplir_meta3', value:$("input[name=cumplir_meta3]").val()},
		{name:'utilidad_neta1', value:$("input[name=utilidad_neta1]").val()},{name:'utilidad_neta2', value:$("input[name=utilidad_neta2]").val()}, {name:'cumplir_meta4', value:$("input[name=cumplir_meta4]").val()},
		{name:'costos_gastos1', value:$("input[name=costos_gastos1]").val()}, {name:'costos_gastos2', value:$("input[name=costos_gastos2]").val()}, {name:'cumplir_meta5', value:$("input[name=cumplir_meta5]").val()},
		{name:'Impacto_esperado', value:$("textarea[name=Impacto_esperado]").val()}, {name:'personas_cargo1', value:$("input[name=personas_cargo1]").val()}, {name:'personas_cargo2', value:$("input[name=personas_cargo2]").val()},{name:'cumplir_meta6', value:$("input[name=cumplir_meta6]").val()},
		{name:'gastos_administrativos1', value:$("input[name=gastos_administrativos1]").val()}, {name:'gastos_administrativos2', value:$("input[name=gastos_administrativos2]").val()},{name:'cumplir_meta7', value:$("input[name=cumplir_meta7]").val()},
		{name:'presupuesto_area1', value:$("input[name=presupuesto_area1]").val()}, {name:'presupuesto_area2', value:$("input[name=presupuesto_area2]").val()},{name:'cumplir_meta8', value:$("input[name=cumplir_meta8]").val()},
		{name:'actividades_no', value:$("textarea[name=actividades_no]").val()}, {name:'Impacto_esperado2', value:$("textarea[name=Impacto_esperado2]").val()}, {name:'cod_jefe', value:$("input[name=cod_jefe]").val()},
		{name:'nom_car_sol', value:$("input[name=nom_car_sol]").val()}, {name:'num_per_car_sol', value:$("input[name=num_per_car_sol]").val()}, {name:'desc_car_sol', value:$("textarea[name=desc_car_sol]").val()});
		
		$.ajax({
		
			url:'ing_persona_cargo3.php',
			type:'POST',
			data:datos,
			dataType:'html',
			success:function(data){
				//validas

				$("#llenar").val(data);
				$("#llenar1").val($("input[name=nom_car_sol]").val());
				$("#llenar2").val($("input[name=num_per_car_sol]").val());
			}
		});
		
		return false;
	
	}else{
	
		console.log("No puede ingresar los datos"); // poner el alert
	
	}
	
}


/*Editar el formulario de pestañas*/
function edit_persona_cargo(){

	if ($('#personas_cargoFrm').valid()) {
		
		datos= new Array();

		datos.push({name:'numero_pacientes1', value:$("input[name=numero_pacientes1]").val()},
		{name:'numero_pacientes2', value:$("input[name=numero_pacientes2]").val()},{name:'cumplir_meta1', value:$("input[name=cumplir_meta1]").val()},{name:'numero_ventas1', value:$("input[name=numero_ventas1]").val()},{name:'numero_ventas2', value:$("input[name=numero_ventas2]").val()},{name:'cumplir_meta2', value:$("input[name=cumplir_meta2]").val()},
		{name:'numero_procedimientos1', value:$("input[name=numero_procedimientos1]").val()},{name:'numero_procedimientos2', value:$("input[name=numero_procedimientos2]").val()}, {name:'cumplir_meta3', value:$("input[name=cumplir_meta3]").val()},
		{name:'utilidad_neta1', value:$("input[name=utilidad_neta1]").val()},{name:'utilidad_neta2', value:$("input[name=utilidad_neta2]").val()}, {name:'cumplir_meta4', value:$("input[name=cumplir_meta4]").val()},
		{name:'costos_gastos1', value:$("input[name=costos_gastos1]").val()}, {name:'costos_gastos2', value:$("input[name=costos_gastos2]").val()}, {name:'cumplir_meta5', value:$("input[name=cumplir_meta5]").val()},
		{name:'Impacto_esperado', value:$("textarea[name=Impacto_esperado]").val()}, {name:'personas_cargo1', value:$("input[name=personas_cargo1]").val()}, {name:'personas_cargo2', value:$("input[name=personas_cargo2]").val()},{name:'cumplir_meta6', value:$("input[name=cumplir_meta6]").val()},
		{name:'gastos_administrativos1', value:$("input[name=gastos_administrativos1]").val()}, {name:'gastos_administrativos2', value:$("input[name=gastos_administrativos2]").val()},{name:'cumplir_meta7', value:$("input[name=cumplir_meta7]").val()},
		{name:'presupuesto_area1', value:$("input[name=presupuesto_area1]").val()}, {name:'presupuesto_area2', value:$("input[name=presupuesto_area2]").val()},{name:'cumplir_meta8', value:$("input[name=cumplir_meta8]").val()},
		{name:'actividades_no', value:$("textarea[name=actividades_no]").val()}, {name:'Impacto_esperado2', value:$("textarea[name=Impacto_esperado2]").val()}, {name:'cod_jefe', value:$("input[name=cod_jefe]").val()},
		{name:'nom_car_sol', value:$("input[name=nom_car_sol]").val()}, {name:'num_per_car_sol', value:$("input[name=num_per_car_sol]").val()}, {name:'desc_car_sol', value:$("textarea[name=desc_car_sol]").val()},{name:'id_form',value:$("input[name=id_form]").val()});
		
		$.ajax({
		
			url:'edit_persona_cargo2.php',
			type:'POST',
			data:datos,
			dataType:'html',
			success:function(data){
				
					
				$("#mostrar").slideUp('slow');
				$("#esconder").slideDown('slow');
				$("#adjuntar").hide();
				
				if(data == 1){
					
					$("#mostrar_delete").hide();
					$("#mostrar_success").show();
	

				    $("#llenar").val($("input[name=id_form]").val());
					$("#llenar1").val($("input[name=nom_car_sol]").val());
					$("#llenar2").val($("input[name=num_per_car_sol]").val());
					
				
				}else{
				
					$("#mostrar_delete").show();
					$("#mostrar_success").hide();
				
				}
			}
		});
		
		return false;
	
	}else{
	
		console.log("No puede ingresar los datos");
	
	}
}

//eliminar cajones de la pestaña: principales responsabilidades del cargo sin ir a la base de datos
function eliminar_cargo(id){

$("#"+id+"").remove();	

}


//eliminar cajones de la pestaña:  Relacion del puesto con otras areas sin ir a la base de datos
function eliminar_area(id){

$("#"+id+"").remove();	

}

//eliminar cajones de la pestaña: principales responsabilidades del cargo si los datos estan en base de datos
function eliminar_cargoAJAX(id,contador){

  mensaje="<p style='text-align:center; color:red; font-weight:bold;'>Realmente desea eliminar la funcion "+contador+"</p>";
  
  //alert personalizado
 Alert.confirmacion(mensaje,function(){

	  	$.ajax({
		
			url:'eliminar_funcion.php',
			type:'POST',
			data:'id='+id,
			dataType:'html',
			success:function(data){

				if(data==1){
					$("#"+id+"").remove();
	                $('#myModal6').modal('hide');
				}else{
				
					$('#myModal6').modal('hide');
				}
				
				
			}
		});
		
		return false;
	  
  }, function(){
  
	 $('#myModal6').modal('hide');
  
  });
 
 return false;
}


 function eliminar_areaAJAX(id,contador){
 	

  mensaje="<p style='text-align:center; color:red; font-weight:bold;'>Realmente desea eliminar la funcion "+contador+"</p>";
  
  //alert personalizado
  Alert.confirmacion(mensaje,function(){

	  	$.ajax({
		
			url:'eliminar_area.php',
			type:'POST',
			data:'id='+id,
			dataType:'html',
			success:function(data){
				
				
				if(data==1){
				
					$("#area_"+contador+"").remove();
	                $('#myModal6').modal('hide');
				}else{
				
					$('#myModal6').modal('hide');
				}
				
				
			}
		});
		
		return false;
	  
  }, function(){
  
	 $('#myModal6').modal('hide');
  
  });
 
 return false;
 
 }



/*ingresar formulario requisicion nuevo cargo*/
function requisicion_nuevo_cargo(){
	
	
	$.ajax({
	
		url:'ing_requisicion_nuevo_cargo3.php',
		type:'POST',
		data:$('#requisicion_nuevo_cargo').serializeArray(),
		dataType:'html',
		success:function(data){

			
		
			//console.log(data); 
			//limpiar el formulario o resetearlo
			$(':input','#requisicion_nuevo_cargo').not(':button, :submit, :reset').val('');
			
			$(':input','#personas_cargoFrm').not(':button, :submit, :reset').val('');
			
			$('#requisicion_nuevo_cargo').find("input:checked[type='radio']").each(function(){
			   $(this)[0].checked = false;  
			});
			  
			$("#mostrar_success").hide();
			
			
			//alert(data);
			
			if(data=="1"){
			
			//alert("Prueba Success");
			
				mensaje="<p style='text-align:center; color:green; font-weight:bold;'>Se ha enviado correctamente...</p>";
			}else{
			
			//alert(data+"entro al else");
				
				mensaje="<p style='text-align:center; color:red; font-weight:bold;'>No Se ha enviado intentalo mas tarde...</p>";
			
			}




			// if(data==11){
			
				// mensaje="<p style='text-align:center; color:green; font-weight:bold;'>Se ha enviado correctamente...</p>";
			// }else{
				
				// mensaje="<p style='text-align:center; color:red; font-weight:bold;'>No Se ha enviado intentalo mas tarde...</p>";
			
			// }
			
			/*alert personalizado*/
			Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});
			
			//$('#content').load('Requisicion_Nuevo_cargo.php');

		}
	});
	
	return false;
		


}



/*editar formulario requisicion nuevo cargo*/
function EDrequisicion_nuevo_cargo(){

	
			
	$.ajax({
	
		url:'ed_requisicion_nuevo_cargo3.php',
		type:'POST',
		data:$('#requisicion_nuevo_cargo').serialize(),
		dataType:'html',
		success:function(data){

			//console.log(data);


			$("#mostrar_success").hide();
			
			if(data==1){
			
				mensaje="<p style='text-align:center; color:green; font-weight:bold;'>Se ha enviado correctamente...</p>";
			}else{
				
				mensaje="<p style='text-align:center; color:red; font-weight:bold;'>No Se ha enviado intentalo mas tarde...</p>";
			
			}

			
			
			/*alert personalizado*/
			Alert.alert(mensaje,function(){
				window.close();

				window.opener.location.href = window.opener.location.href;
			});

			
			
			//$('#content').load('Requisicion_Nuevo_cargo.php');

		}
	});
	
	return false;


}