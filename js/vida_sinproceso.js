$(document).ready(main);


function main(){

	 $('#example thead#cabeza td').each( function () {
        var title = $('#example thead td').eq( $(this).index() ).text();
        $(this).html( '<input  style="width: 150px;" type="text" placeholder="'+title+'" />' );
    } );
 
    // DataTable
   
     table = $('#example').DataTable({
			"bSort": false,
			"bFilter": true,
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
 
    // Apply the search
    table.columns().eq( 0 ).each( function ( colIdx ) {
        $( 'input', table.column( colIdx ).header()).on( 'keyup change', function () {
            
			
			
			table.column( colIdx )
			.search( this.value )
			.draw();
			
			console.log('bn');
        } );
    } );

}








function Rechazar(cedula){



	$.ajax({
	   url: "rechazar_vacante.php",
	   type:"POST",
	   data: "cedula="+cedula,
	   success: function (res){

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
			$('#content').load('vida_sinproceso.php');
				
			});
					



	   }

	  });





}



function Preseleccionar(cedula){


	$.ajax({
	   url: "preseleccionar.php",
	   type:"POST",
	   data: "cedula="+cedula,
	   success: function (res){

	   		if(res==1){
						
				//mensaje personalizado
				mensaje="<p style='text-align:center; color:green; font-weight:bold;'>Se ha preseleccionado el aspirante...</p>";
			
			}else if(res==2){
			
				//mensaje personalizado
				mensaje="<p style='text-align:center; color:red; font-weight:bold;'>Intentelo de nuevo...</p>";
			
			}
				
				
			//alert personalizado
			Alert.alert(mensaje,
			function(){
			
			$('#myModal6').modal('hide');

				$('#content').load('vida_sinproceso.php');
				
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
