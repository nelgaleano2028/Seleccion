$(document).ready(main);


function main(){

	/*inicio tabla*/
		$('#admin').dataTable({
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

}


function tablaPruebas(cedula){

	
	var mensaje="<div>";
		
		mensaje+="<div><table style='color:black;' border=1>";
		mensaje+="<tr>";
		mensaje+="<td><a href='javascript:void(0);'>Caras</a></td>";
		mensaje+="</tr>";
		mensaje+="<tr>";
		mensaje+="<td><a href='javascript:void(0);'>BG3</a></td>";
		mensaje+="</tr>";
		mensaje+="<tr>";
		mensaje+="<td><a href='javascript:void(0);'>Cuadrado de letras</a></td>";
		mensaje+="</tr>";
		mensaje+="<tr>";
		mensaje+="<td><a href='javascript:void(0);'>CMT</a></td>";
		mensaje+="</tr>";
		mensaje+="<tr>";
		mensaje+="<td><a href='javascript:void(0);'>Estilos de Aprendizaje</a></td>";
		mensaje+="</tr>";
		mensaje+="<tr>";
		mensaje+="<td><a href='javascript:void(0);'>Temperamento Humano</a></td>";
		mensaje+="</tr>";
		mensaje+="<tr>";
		mensaje+="<td><a href='javascript:void(0);'>Wartegg</a></td>";
		mensaje+="</tr>";
		mensaje+="<tr>";
		mensaje+="<td><a href='javascript:void(0);'>16pf</a></td>";
		mensaje+="</tr>";
		mensaje+="</table></div>";
		mensaje+="</div>";


		modals("Informaci&oacute;n  <i class='icon-question-sign'></i>",mensaje);



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