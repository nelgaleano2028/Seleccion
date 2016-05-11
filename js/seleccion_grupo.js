$(document).ready(main);


function main(){

	$(".grupo").change(function(){


		var id=$(this).val();

		$('#contenido').load('formulario_grupo.php?id='+id);


	});


	$("#update_tiempo").submit(update_tiempo);

}



function update_tiempo(){


	var datos= $("#update_tiempo").serializeArray();


	$.ajax({
		
			url:'ing_tiempo.php',
			type:'POST',
			data:datos,
			dataType:'html',
			success:function(res){


				if(res==true){

					mensaje="<span style='color:green; font-weight:bold'>Se ha ingresado correctamente</span>";
							//alert personalizado
					
				}else{

					mensaje="<span style='color:red; font-weight:bold'>No se ha ingresado intentalo mas tarde</span>";
				}


				Alert.alert(mensaje,function(){

						$('#myModal6').modal('hide');

						


					});
				
				
			}
		});
		
		return false;


}


