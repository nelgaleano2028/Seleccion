$(document).ready(main);


function main(){

	$("#crear_grupo").submit(crear_grupo);

}


function crear_grupo(){


	var datos= $("#crear_grupo").serializeArray();


	$.ajax({
		
			url:'ing_grupo.php',
			type:'POST',
			data:datos,
			dataType:'html',
			success:function(res){
				//validar 
				//console.log(data);
				$("#grupo").val("");

				if(res==true){

					mensaje="<span style='color:green; font-weight:bold'>Se ha ingresado correctamentefffff</span>";
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