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

function solicitud_mena(cod_form,estado){

	
	var observaciones=$('textarea[name="observaciones'+cod_form+'"]').val();
	
	if(observaciones ==""){
	
		var mensaje="<p style='text-align:center; color:red; font-weight:bold;'>Debe llenar el campo Observaciones</p>";
	
	
		Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});
	
	}else{
	
		$.ajax({
	
			url:'sol_mena.php',
			type:'POST',
			data:'cod_form='+cod_form+'&observaciones='+observaciones+'&estado='+estado,
			dataType:'html',
			success:function(data){
			
					$("#admin tbody .remove"+cod_form+"").remove();
					/*alert personalizado*/
					Alert.alert(data,function(){$('#myModal6').modal('hide');});

			}
		});
			return false;
	}
	
		
}