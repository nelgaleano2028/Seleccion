$(document).ready(main);


function main(){

	/* reemplazo_cedula  Buscar cedula con autocompletar*/
	$("#supernumerario").chosen({width:"100%"});

	$.ajax({
			url:"select_empleado.php",
			type:"post",
			success:function(res){
				
				$("#supernumerario").html(res);
				$("#supernumerario").trigger("liszt:updated");
			}
	});
	
	$('#fec_nivel').datepicker({
		 autoclose: true,
		 weekStart: 1,
    }).on('changeDate', function(ev) {
		
		$(this).datepicker('hide'); });


	/*seleccionar centro costo del formulario*/	
	$('.centro_costo').change(function(){
		
		var bandera=1;
	
		$.ajax({
	
			url:'select_anidados.php',
			type:'POST',
			data:'centro_costo='+$('.centro_costo').val()+'&bandera='+bandera,
			dataType:'html',
			success:function(res){
				
				
				$('.cargo').html(res);
				
			}
		});
		
		return false;
	
	});


	$('.cargo').change(function(){
		
		var bandera=2;
	
		$.ajax({
	
			url:'select_anidados.php',
			type:'POST',
			data:'centro_costo='+$('.centro_costo').val()+"&cargo="+$('.cargo').val()+"&bandera="+bandera,
			dataType:'html',
			success:function(res){
			
				$('.persona').html(res);
				
			}
		});
		
		return false;
	
	});


	$('#form2').click(ingresar_form);

}

function ingresar_form(){

	var datos =$('#formulario2').serializeArray();


	$.ajax({
	
			url:'ingresar_form2.php',
			type:'POST',
			data:datos,
			dataType:'html',
			success:function(res){
			
				console.log(res);

				if(res==true){

					mensaje="<p style='text-align:center; color:green; font-weight:bold;'>Se ingreso Correctamente...</p>";

				}else{

					mensaje="<p style='text-align:center; color:red; font-weight:bold;'>No se ingreso Correctamente</p>";

				}


			    	Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});

				
			}
		});
		
		return false;

}


