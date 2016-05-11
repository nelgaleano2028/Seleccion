$(document).ready(mains);

function mains(){

	$('#guardar_infoper').click(guardar_per);
}

function guardar_per(e){

	var ruta=$('#ruta').val();	
	var datos =$('#info_per').serializeArray();	

		var error = 0;
	
	$('.requerido').each(function(i, elem){
		if($(elem).val() == ''){
			error++;
		}
	
	});
		
	if(error > 0){
		e.preventDefault();
		 var mensaje="<span style='font-weight:bold; color:red'>Hay campos vacíos por favor llenar</span>"
		Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});
		
	}else{
		
		//validaciones radios
		var error_radio=0;
		$('#info_per').find("input[type='radio']").each(function(i, elem){
					   
			  var radio= $(elem)[0].checked;
			 
			  if(radio==false){
				error_radio++;
			  }
					   			 
		});
		
		//eliminar los falsos que me sobran
		var totalRadio= error_radio -2; 
		
		if(totalRadio > 0){
			
			e.preventDefault();
			var mensaje="<span style='font-weight:bold; color:red'>Hay campos vacíos por favor llenar</span>"
			Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});
		
		}else{
				
			$.ajax({
		
				url:'ing_form_inicial.php',
				type:'POST',
				data:datos,
				dataType:'html',
				success:function(res){
					
					console.log(res); 
					
					if(res==true){
						
						var mensaje="<span style='font-weight:bold; color:green'>Se ha ingresado correctamente</span>";
						Alert.alert(mensaje,function(){
						
							$('#content').load(ruta+'.php');
							$('#myModal6').modal('hide');
						});
					
					}else{
						
						var mensaje="<span style='font-weight:bold; color:red'>No se ha ingresado correctamente comuniquese con el administrador</span>";
						Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});
						
					}
				
				}
			});
				
		}
	
	}
}