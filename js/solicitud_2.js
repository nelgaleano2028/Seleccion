$(document).ready(main);

function main(){

	$("#solicitud_2").click(enviar_solicitud);
	$("#cedula").chosen({width:"70%"});

}

function enviar_solicitud(){


	if($('#cedula').val()== ""){


		var mensaje="<p style='text-align:center; color:red; font-weight:bold;'>El campo Cedula esta vacía..</p>";

		Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});



	}else if($('#prueba').val()== ""){

		var mensaje="<p style='text-align:center; color:red; font-weight:bold;'>El campo prueba esta vacía..</p>";

		Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});



	}else{


		var archivos=document.getElementById("archivos");
		var archivo = archivos.files;

		if(archivo.length == 0){

			var mensaje="<p style='text-align:center; color:red; font-weight:bold;'>El campo Archivos es obligatorio</p>";

			Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});

		}else{


			var detalle=$('#detalle').val();
			var cod_epl=$('#cedula').val();
			var prueba=$('#prueba').val();
			
			
			 //El objeto FormData nos permite crear un formulario pasandole clave/valor para poder enviarlo, este tipo de objeto ya tiene la propiedad multipart/form-data para poder subir archivos
		     var datos = new FormData();

		  //Como no sabemos cuantos archivos subira el usuario, iteramos la variable y al
		  //objeto de FormData con el metodo "append" le pasamos calve/valor, usamos el indice "i" para
		  //que no se repita, si no lo usamos solo tendra el valor de la ultima iteracion
			  for(i=0; i<archivo.length; i++){
				datos.append('archivo'+i,archivo[i]);
			  }
				datos.append('detalle',detalle);
				datos.append('cod_epl',cod_epl);
				datos.append('prueba',prueba);
			//console.log(datos);


			$.ajax({
				url : "verificar_archivo.php",
				type : "POST",
				contentType:false,
				processData:false,
				dataType:'html',
				data : datos,
				success:function(data){


					if(data==1){


						var mensaje="<p  id='vancante_mensaje' style='text-align:center; color:blue; font-weight:bold;'>Desea sobreescribir el archivo?</p>";

						info_alert_principal('Informacion',mensaje,
							function(){

								datos.append('bandera',1);
								
								$.ajax({
									url : "response_solicitud.php",
									type : "POST",
									contentType:false,
									processData:false,
									dataType:'html',
									data : datos,
									success:function(data){

										$('#detalle').val("");
										$('#cedula').val("").trigger("liszt:updated");;
										$('#prueba').val("");
										document.getElementById("archivos").value = ""; 
										$('#vancante_mensaje').html('');
										$('#aceptar').remove('');
										$('#cancelar').html('Aceptar');
										$('#vancante_mensaje').html("<p  id='vancante_mensaje' style='text-align:center; color:blue; font-weight:bold;'>Se ingreso correctamente</p>");

										//$('#myModal8').modal('hide');

										
									}
								});




							},
							function(){


								$('#myModal8').modal('hide');
								
									}
						);


						



					}else{

						
						datos.append('bandera',2);

						$.ajax({
								url : "response_solicitud.php",
								type : "POST",
								contentType:false,
								processData:false,
								dataType:'html',
								data : datos,
								success:function(data){
									

									$('#detalle').val("");
										$('#cedula').val("").trigger("liszt:updated");;
										$('#prueba').val("");
										document.getElementById("archivos").value = ""; 
										mensaje="<p style='text-align:center; color:green; font-weight:bold;'>Se ingreso correctamente..</p>";

										Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});

									

									
								}
						});
							return false;

					}
					
					
				}
			});
			

			
			
			

		}

		
		
	}
}



function info_alert_principal(titulo,mensaje,callback1,callback2){
		
		var modal='<!-- Modal -->';
				modal+='<div id="myModal8" class="modal hide fade" style="margin-top: 3%; background-color: rgb(41, 76, 139); color: #fff; z-index: 900001; behavior: url(../../css/PIE.htc)" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">';
				modal+='<div class="modal-header" style="border-bottom: 0px !important;">';
				modal+='<button type="button" class="close" style="color:#fff !important;" data-dismiss="modal" aria-hidden="true">x</button>';
				modal+='<h4 id="myModalLabel">'+titulo+'</h4>';
				modal+='</div>';
				modal+='<div class="modal-body" style="max-width: 92% !important; background-color:#fff; margin: 0 auto; margin-bottom: 1%; border-radius: 8px; behavior: url(../../css/PIE.htc);">';
				modal+='<p>'+mensaje+'</p>';
				modal+='<div class="botones" style="text-align:center;">';
				modal+="<button style='color:#fff;'  id='aceptar' class='btn btn-primary'>Aceptar</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
		        modal+="<button style='color:#fff;'  id='cancelar' class='btn btn-primary'>Cancelar</button>"
				modal+='</div>'
				modal+='</div>';
				modal+='</div>';
				
		$("#main").append(modal);
		
		$('#myModal8').modal({
			keyboard: false,
			backdrop: "static" 
		});
		
		$("#aceptar").click(function(){callback1(); });
				
		$("#cancelar").click(function(){callback2();});
				
		$('#myModal8').on('hidden', function () { $(this).remove();});

	}
