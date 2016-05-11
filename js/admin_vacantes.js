$(document).ready(main);


function main(){

    // DataTable
   
     table = $('#admin3').DataTable({
	  "aaSorting": [[ 0, "desc" ]],
			"bAutoWidth": false,			
			"bJQueryUI": true,
			"iDisplayLength": 5,
			"sDom": '<"H"TfrlP>t<"F"ip><"clear">',
		    
			"oTableTools": {
								"sSwfPath": "../../js/DataTables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf",
				          		"aButtons": [
								{"sExtends": "xls","sButtonText": "Guardar a Excel","sFileName": "solicitudes_intercambiar_turno.xls","bFooter": false,"mColumns":6},
								{"sExtends": "pdf","sButtonText": "Guardar a PDF","sFileName": "solicitudes_intercambiar_turno.pdf","sPdfOrientation": "landscape","mColumns":6},
 							    ]
							},
		       "oLanguage": {
								"oPaginate": {
										"sPrevious": "Anterior", 
										"sNext": "Siguiente", 
										"sLast": "Ultima", 
										"sFirst": "Primera" 
										},"sLengthMenu": 'Mostrar <select>'+ 
										'<option value="5">5</option>'+ 
										'<option value="10">10</option>'+ 
										'<option value="25">25</option>'+ 
										'<option value="50">50</option>'+ 
										'<option value="100">100</option>'+ 
										'<option value="-1">Todos</option>'+ 
										'</select> registros', 

								"sInfo": "Mostrando del _START_ a _END_ (Total: _TOTAL_ resultados)", 
								"sInfoFiltered": " - filtrados de _MAX_ registros", 
								"sInfoEmpty": "No hay resultados de busqueda", 
								"sZeroRecords": "No hay registros a mostrar", 
								"sProcessing": "Espere, por favor...", 
								"sSearch": "Buscar:"
								}
	 
	 
	 
	 });
 
   

}



function tablaPruebas(cedula){


	$.ajax({
	   url: "lista_prueba_asp.php",
	   type:"POST",
	   dataType:"JSON",
	   data: "cedula="+cedula,
	   success: function (res){

	   		var cuantos =res.data1.length; 
	   		var mensaje="<div id='esconder_pruebas'>";
	   		mensaje+="<div><table style='color:black;' border=1>";
	   		    mensaje+="<tr>";
	   			
				mensaje+="<td align='center' style='width: 171px;'><span style='color:rgb(41, 76, 139); font-weight:bold'>PROCESO</span></td>";
				mensaje+="<td align='center'><span style='color:rgb(41, 76, 139); font-weight:bold'>OBSERVACION</span></td>";
				mensaje+="</tr>";
				
				mensaje+="<tr><td align='center'><a href='javascript:void(0);'  onClick='abrir_incial("+cedula+")'>Formulario Inicial</a></td>";
				mensaje+='<td align="center"></td></tr>';
	   		
			
			for(i=0; i < cuantos; i ++){

	   			mensaje+="<tr>";
	   			
	   			if(res.data1[i].nombre_prueba=='CMT' || res.data1[i].nombre_prueba=='Wartegg' || res.data1[i].nombre_prueba=='16pf'){

	   				if(res.data1[i].ruta==null){


	   					mensaje+='<td align="center"><a href="javascript:void(0);"  onClick="abrir_especial()">'+res.data1[i].nombre_prueba+'</a></td>';
	   					
	   					if(res.data1[i].detalle!= null){
	   						mensaje+='<td>'+res.data1[i].detalle+'</td>';

	   					}else{

	   						mensaje+='<td></td>';

	   					}
	   					


	   				}else{

	   					mensaje+='<td align="center"><a href="javascript:void(0);"  onClick="abrir('+res.data1[i].cedula+', \''+res.data1[i].ruta+'\')">'+res.data1[i].nombre_prueba+'</a></td>';
	   					
	   					if(res.data1[i].detalle!= null){
	   						mensaje+='<td>'+res.data1[i].detalle+'</td>';

	   					}else{

	   						mensaje+='<td></td>';

	   					}
	   				}

	   				

	   			}else{



	   				mensaje+="<td align='center'><a href='javascript:void(0);'  onClick='prueba("+res.data1[i].id+","+res.data1[i].cedula+")'>"+res.data1[i].nombre_prueba+"</a></td>";
	   				mensaje+='<td align="center"></td>';
	   				

	   				
	   			}
	   			mensaje+="</tr>";
				
			}

			if(res.data1[0].observacion_1==null){

				mensaje+="<tr><td align='center'><a href='javascript:void(0);'  onClick='abrir_especial()'>Informe Final</a></td>";
				mensaje+='<td align="center"></td></tr>';

			}else{

				mensaje+="<tr><td align='center'><a href='javascript:void(0);'  onClick='informe("+cedula+")'>Informe Final</a></td>";
				mensaje+='<td align="center"></td></tr>';

			}


			if(res.data2 !=null){ //Prueba tecnica

				mensaje+='<tr><td align="center"><a href="javascript:void(0);"  onClick="abrir('+cedula+', \''+res.data2[0].ruta+'\')">Prueba Tecnica</a></td>';
				mensaje+='<td align="justify">'+res.data2[0].detalle+'</td></tr>';


			}else{

				mensaje+='<tr><td align="center"><a href="javascript:void(0);" onClick="abrir_especial()"s>Prueba Tecnica</a></td>';
				mensaje+='<td align="center"></td></tr>';
			}
			


			if(res.data3!=null){//Otros

				mensaje+='<tr><td align="center"><a href="javascript:void(0);"  onClick="abrir('+cedula+', \''+res.data3[0].ruta+'\')">Otros</a></td>';
				mensaje+='<td align="justify">'+res.data3[0].detalle+'</td></tr>';


			}else{

				mensaje+='<tr><td align="center"><a href="javascript:void(0);" onClick="abrir_especial()" >Otros</a></td>';
				mensaje+='<td align="center"></td></tr>';
			}



			if(res.data4!=null){//Referencias laborales

				mensaje+='<tr><td align="center"><a href="javascript:void(0);"  onClick="abrir('+cedula+', \''+res.data4[0].ruta+'\')">Referencias laborales</a></td>';
				mensaje+='<td align="justify">'+res.data4[0].detalle+'</td></tr>';


			}else{

				mensaje+='<tr><td align="center"><a href="javascript:void(0);" onClick="abrir_especial()" >Referencias laborales</a></td>';
				mensaje+='<td align="center"></td></tr>';
			}
				
				

	   		mensaje+="</table></div>";
		    mensaje+="</div>";
		    mensaje+="<div id='mostrar_pruebas' ><div id='puntaje'></div></div>";


		    modals("EVIDENCIAS DEL PROCESO <i class='icon-info-sign'></i>",mensaje);


	   }
	});
	
	return false;
}

function abrir_especial(){


	$("#esconder_pruebas").css('display','none');
	$("#mostrar_pruebas").css('display','block');


	var html="<span style='color:rgb(41, 76, 139) !important;'>NO HAY DATOS PARA MOSTRAR</span><div style='clear:both'></div>";
		html+="<br>";
		html+="<a href='javascript:void(0);' onClick='devolver()'>Regresar</a>";

	 $("#puntaje").html(html);



}


function abrir_incial(cedula){


	window.open('ed_form_inicial.php?cedula='+cedula);


	return false;	


}


function cambiar_estado(codigo){

		var estado=$('#estado').val();
		
		
		alert(estado); 
			
		var mensaje="<p  id='vancante_mensaje' style='text-align:center; color:blue; font-weight:bold;'>Desea cambiar su estado a "+estado+"</p>";
		
		// return false;
		
	
		Alert.confirmacion(mensaje,
			function(){
					
				$.ajax({
	
					url:'cambiar_estado_aspirante.php',
					type:'POST',
					data:'codigo='+codigo+'&estado='+estado,
					dataType:'html',
					success:function(res){
					
						console.log(res);
					

						$("#content").load('tabla_vacante.php?codigo='+res);
						$('#myModal6').modal('hide');
					
						


					}
				});






			},
			function(){


				$('#myModal6').modal('hide');
				$("#content").load('tabla_vacante.php?codigo='+res);
			}
		);



}


function abrir(cedula,prueba){

 	

	//window.open(prueba,'width=1024,height=768,top=0,left=0,scrollbars=no');

	window.open(prueba,'menubar=0,toolbar=0,personalbar=0,status=0,scrollbars=0,width=250,height=60');


	return false;	


}




function informe(cedula){

	//console.log('informe integral');

	window.open('mostrar_informe_integral.php?cedula='+cedula);

	return false;

}


function prueba(id,cedula){


	$("#esconder_pruebas").css('display','none');
	

	$("#mostrar_pruebas").css('display','block');


	$.ajax({
	   url: "puntaje_prueba.php",
	   type:"POST",
	   dataType:"JSON",
	   data: "cedula="+cedula+"&id="+id,
	   success: function (res){

	   		if(res==-1){


	   		var html="<span style='color:rgb(41, 76, 139) !important;'>NO HAY DATOS PARA MOSTRAR</span><div style='clear:both'></div>";
					html+="<br>";
	   			    html+="<a href='javascript:void(0);' onClick='devolver()'>Regresar</a>";

	   			$("#puntaje").html(html);
	   			
	   		}else{


	   			if(id== 2 || id==3 || id==1){



				var html="<div id='esconder_pruebas'>";
		   			html+="<div><center><table style='color:black; width: 300px;' border=1>";
		   		    html+="<tr>";
		   			html+="<td align='center'><span style='color:rgb(41, 76, 139); font-weight:bold'>Cedula</span></td>";
					html+="<td align='center'><span style='color:rgb(41, 76, 139); font-weight:bold'>PD</span></td>";
					html+="<td align='center'><span style='color:rgb(41, 76, 139); font-weight:bold'>PC</span></td>";
					//html+="<td align='center'>Fecha</td>";
					html+="</tr>";
						html+="<td align='center'>"+res[0].cedula+"</td>";
						html+="<td align='center'>"+res[0].pd+"</td>";
						html+="<td align='center'>"+res[0].pc+"</td>";
						//html+="<td align='center'>"+res[0].fecha+"</td>";
					html+="<tr>";
					html+="</tr>";
					html+="</table></center></div>";
					html+="<br>";
					html+="<a href='javascript:void(0);' onClick='devolver()'>Regresar</a>";
			        html+="</div>";


				}else if(id==5){


					var html="<div id='esconder_pruebas'>";
			   			html+="<div><table style='color:black; width: 525px;' border=1>";
			   		    html+="<tr>";
			   			html+="<td align='center'><span style='color:rgb(41, 76, 139); font-weight:bold'>Cedula</span></td>";
						html+="<td align='center'><span style='color:rgb(41, 76, 139); font-weight:bold'>Auditivo</span></td>";
						html+="<td align='center'><span style='color:rgb(41, 76, 139); font-weight:bold'>Visual</span></td>";
						html+="<td align='center'><span style='color:rgb(41, 76, 139); font-weight:bold'>Kinestesico</span></td>";
						html+="<td align='center'><span style='color:rgb(41, 76, 139); font-weight:bold'>Logico</span></td>";
						html+="<td align='center'><span style='color:rgb(41, 76, 139); font-weight:bold'>Holistico</span></td>";
						html+="<td align='center'><span style='color:rgb(41, 76, 139); font-weight:bold'>Resultado</span></td>";
						//html+="<td align='center'>Fecha</td>";
						html+="</tr>";
							html+="<td align='center'>"+res[0].cedula+"</td>";
							html+="<td align='center'>"+res[0].auditivo+"</td>";
							html+="<td align='center'>"+res[0].visual+"</td>";
							html+="<td align='center'>"+res[0].kinestesico+"</td>";
							html+="<td align='center'>"+res[0].logigo+"</td>";
							html+="<td align='center'>"+res[0].holistico+"</td>";
							html+="<td align='center'>"+res[0].resultado+"</td>";
							//html+="<td align='center'>"+res[0].fecha+"</td>";
						html+="<tr>";
						html+="</tr>";
						html+="</table></div>";
				        html+="<br>";
					    html+="<a href='javascript:void(0);' onClick='devolver()'>Regresar</a>";
				        html+="</div>";

				}else if(id==6){

						var html="<div id='esconder_pruebas'>";
			   			html+="<div><table style='color:black;' border=1>";
			   		    html+="<tr>";
			   			html+="<td align='center'><span style='color:rgb(41, 76, 139); font-weight:bold'>Cedula</span></td>";
						html+="<td align='center'><span style='color:rgb(41, 76, 139); font-weight:bold'>Sanguineo</span></td>";
						html+="<td align='center'><span style='color:rgb(41, 76, 139); font-weight:bold'>Colerico</span></td>";
						html+="<td align='center'><span style='color:rgb(41, 76, 139); font-weight:bold'>Melancolico</span></td>";
						html+="<td align='center'><span style='color:rgb(41, 76, 139); font-weight:bold'>Flematico</span></td>";
						html+="<td align='center'><span style='color:rgb(41, 76, 139); font-weight:bold'>Resultado</span></td>";
						//html+="<td align='center'>Fecha</td>";
						html+="</tr>";
							html+="<td align='center'>"+res[0].cedula+"</td>";
							html+="<td align='center'>"+res[0].sanguineo+"</td>";
							html+="<td align='center'>"+res[0].colerico+"</td>";
							html+="<td align='center'>"+res[0].melancolico+"</td>";
							html+="<td align='center'>"+res[0].flematico+"</td>";
							html+="<td align='center'>"+res[0].resultado+"</td>";
							//html+="<td align='center'>"+res[0].fecha+"</td>";
						html+="<tr>";
						html+="</tr>";
						html+="</table></div>";
				        html+="<br>";
					    html+="<a href='javascript:void(0);' onClick='devolver()'>Regresar</a>";
				        html+="</div>";

				}else if(id==7){




				}else if(id==8){

					var html="<div id='esconder_pruebas'>";
			   			html+="<div><table style='color:black;' border=1>";
			   		    html+="<tr>";
			   			html+="<td align='center'>Cedula</td>";
						html+="<td align='center'>DM</td>";
						html+="<td align='center'>A</td>";
						html+="<td align='center'>B</td>";
						html+="<td align='center'>C</td>";
						html+="<td align='center'>E</td>";
						html+="<td align='center'>F</td>";
						html+="<td align='center'>G</td>";
						html+="<td align='center'>H</td>";
						html+="<td align='center'>I</td>";
						html+="<td align='center'>L</td>";
						html+="<td align='center'>M</td>";
						html+="<td align='center'>N</td>";
						html+="<td align='center'>O</td>";
						html+="<td align='center'>Q1</td>";
						html+="<td align='center'>Q2</td>";
						html+="<td align='center'>Q3</td>";
						html+="<td align='center'>Q4</td>";			
						html+="<td align='center'>Fecha</td>";
						html+="</tr>";
							html+="<td align='center'>"+res[0].cedula+"</td>";
							html+="<td align='center'>"+res[0].dm+"</td>";
							html+="<td align='center'>"+res[0].A+"</td>";
							html+="<td align='center'>"+res[0].B+"</td>";
							html+="<td align='center'>"+res[0].C+"</td>";
							html+="<td align='center'>"+res[0].E+"</td>";
							html+="<td align='center'>"+res[0].F+"</td>";
							html+="<td align='center'>"+res[0].G+"</td>";
							html+="<td align='center'>"+res[0].H+"</td>";
							html+="<td align='center'>"+res[0].I+"</td>";
							html+="<td align='center'>"+res[0].L+"</td>";
							html+="<td align='center'>"+res[0].M+"</td>";
							html+="<td align='center'>"+res[0].N+"</td>";
							html+="<td align='center'>"+res[0].O+"</td>";
							html+="<td align='center'>"+res[0].Q1+"</td>";
							html+="<td align='center'>"+res[0].Q2+"</td>";
							html+="<td align='center'>"+res[0].Q3+"</td>";
							html+="<td align='center'>"+res[0].Q4+"</td>";
							html+="<td align='center'>"+res[0].fecha+"</td>";

						html+="<tr>";
						html+="</tr>";
						html+="</table></div>";
				        html+="<br>";
					    html+="<a href='javascript:void(0);' onClick='devolver()'>Regresar</a>";
				        html+="</div>";

				}
	   		
	   		

			    $("#puntaje").html(html);
	   		
	   		}

	   	

	   }
	});



}

function devolver(){


	$("#puntaje").html("");

	$("#esconder_pruebas").css('display','block');
	

	$("#mostrar_pruebas").css('display','none');
}




function Aceptar(cedula){


	$.ajax({
	   url: "aceptar_vacante.php",
	   type:"POST",
	   data: "cedula="+cedula,
	   success: function (res){

	   		console.log(res);

	   		if(res==1){
						
				//mensaje personalizado
				mensaje="<p style='text-align:center; color:green; font-weight:bold;'>Se ha seleccionado el aspirante...</p>";
			
			}else if(res==2){
			
				//mensaje personalizado
				mensaje="<p style='text-align:center; color:red; font-weight:bold;'>Intentelo de nuevo...</p>";
			
			}
				
				
			//alert personalizado
			Alert.alert(mensaje,
			function(){
			
			$('#myModal6').modal('hide');
				$('#content').load('vacantes_avila.php');
			});
					



	   }

	  });





}




function Rechazar(cedula){


	$.ajax({
	   url: "rechazar_vacante.php",
	   type:"POST",
	   data: "cedula="+cedula,
	   success: function (res){

	   		console.log(res);

	   		if(res==1){
						
				//mensaje personalizado
				mensaje="<p style='text-align:center; color:green; font-weight:bold;'>Se ha rechazado el aspirante...</p>";
			
			}else if(res==2){
			
				//mensaje personalizado
				mensaje="<p style='text-align:center; color:red; font-weight:bold;'>Intentelo de nuevo...</p>";
			
			}
				
				
			//alert personalizado
			Alert.alert(mensaje,
			function(){
			
			$('#myModal6').modal('hide');
				$('#content').load('vacantes_avila.php');
			});
					



	   }

	  });





}





/*Modal principal parametrizables para manajar la programacion*/
function modals(titulo,mensaje){

	var modal='<!-- Modal -->';
			modal+='<div id="myModal2" class="modal hide fade" style="margin-top: 3%; background-color: rgb(41, 76, 139); color: #fff; z-index: 9000000; behavior: url(../../css/PIE.htc)" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">';
			modal+='<div class="modal-header" style="border-bottom: 0px !important;">';
			modal+='<button type="button" class="close" style="color:#fff !important;" data-dismiss="modal" aria-hidden="true">×</button>';
			modal+='<h4 id="myModalLabel">'+titulo+'</h4>';
			modal+='</div>';
			modal+='<div class="modal-body" style="max-width: 92% !important; background-color:#fff; margin: 0 auto; margin-bottom: 1%; border-radius: 8px; behavior: url(../../css/PIE.htc);">';
			modal+='<p>'+mensaje+'</p>';
			modal+='</div>';
			modal+='</div>';
			
	$("#main").append(modal);
	
	$('#myModal2').modal({
		keyboard: false,
		backdrop: "static" 
	});
	
	$('#myModal2').on('hidden', function () {
		$(this).remove();
	});
}
