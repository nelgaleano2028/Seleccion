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

}

function aceptar_solicitud(consecutivo){

	var cod_form=consecutivo;
	
	var observaciones=$('textarea[name="observaciones'+consecutivo+'"]').val();
	
	var observaciones=observaciones.toUpperCase();
	
	var bandera=1;
	
	
	if(observaciones ==""){
		
		var mensaje="<p style='text-align:center; color:red; font-weight:bold;'>Debe llenar el campo Observaciones</p>";
	
	
		Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});
	
	}else{
	
		
		$.ajax({
	
			url:'editar_requisicion.php',
			type:'POST',
			data:'cod_form='+cod_form+'&observaciones='+observaciones+'&bandera='+bandera,
			dataType:'html',
			success:function(data){
			
				if(data==1){
					
						mensaje="<p style='text-align:center; color:green; font-weight:bold;'>Se ha aceptado la solicitud correctamente...</p>";
				}else{
						
						mensaje="<p style='text-align:center; color:red; font-weight:bold;'>No se ha aceptado, intentalo mas tarde...</p>";
					
			    }
					$("#admin tbody .remove"+consecutivo+"").remove();
					//$("#admin tbody").append("<tr><td valign='center'><center>No Hay registros</center><td></tr>"); agregar una fila
					/*alert personalizado*/
					Alert.alert(mensaje,function(){
						$('#content').load("Solicitudes_Requisicion_Interna.php");
					$('#myModal6').modal('hide');});

			}
		});
				
	
			return false;
	}
	
		
}

function rechazar_solicitud(consecutivo){

	
	var cod_form=consecutivo;
	
	var observaciones=$('textarea[name="observaciones'+consecutivo+'"]').val();
	
	var bandera=2;
	
	if(observaciones ==""){
		
		var mensaje="<p style='text-align:center; color:red; font-weight:bold;'>Debe llenar el campo Observaciones</p>";
	
	
		Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});
	
	}else{
	
		$.ajax({
	
			url:'editar_requisicion.php',
			type:'POST',
			data:'cod_form='+cod_form+'&observaciones='+observaciones+'&bandera='+bandera,
			dataType:'html',
			success:function(data){
				
				if(data==1){
						
						mensaje="<p style='text-align:center; color:green; font-weight:bold;'>Se ha rechazado  la solicitud correctamente...</p>";
				}else{
						
						mensaje="<p style='text-align:center; color:red; font-weight:bold;'>No se ha rechazado, intentalo mas tarde...</p>";
					
				}
					$("#admin tbody .remove"+consecutivo+"").remove();
					//$("#admin tbody").append("<tr class='odd'><td class='dataTables_empty'>No Hay registros<td></tr>"); agregar una fila
					/*alert personalizado*/
					Alert.alert(mensaje,function(){
					
						$('#content').load("Solicitudes_Requisicion_Interna.php");
						$('#myModal6').modal('hide');});

			}
		});
		
		return false;
	
	
	}
	

}