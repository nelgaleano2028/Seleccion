$(document).ready(main);

function main(){
	
	/*inicio tabla*/
		$('#gh').dataTable({
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
         
		/*fin tabla*/	

		$('#estado').change(cambiar_estado);

}


function cambiar_estado(cedula){



	var mensaje="<p  id='vancante_mensaje' style='text-align:center; color:blue; font-weight:bold;'>Desea cerrar la vacante?</p>";




	Alert.confirmacion(mensaje,
			function(){
				

				$.ajax({
				   url: "cambiar_estado_vacantevida.php",
				   type:"POST",
				   data: "codigo="+cedula,
				   success: function (res){

				   	
						$("#content").load('vacantes_avila_ver_jimenez.php');
						$('#myModal6').modal('hide');
							
						



				   }

				  });






			},
			function(){


				$('#myModal6').modal('hide');
				$("#content").load('vacantes_avila_ver_jimenez.php');
			}
		);



}


function tablaVacante(codigo){


	$('#contenido').css('display','none');
	$('#contenido2').load('tabla_vacante_ver_jimenez.php?codigo='+codigo);

}




