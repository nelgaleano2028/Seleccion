$(document).ready(main);


function main(){

	//$(".borrar").click(ver_errores);
 
	// (COLUMNAS PARA CAMBIAR)
	 
	 $('#example').dataTable({
	 "bSort": false,	 
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
								},
                    aoColumns: [                              
                                {
                                    sName: "nom_profe"
                                }
                              ] 

                 })
                 .makeEditable({
							sDeleteURL: "crud_controlador_prof.php?bandera=1",
							sUpdateURL: "crud_controlador_prof.php?bandera=2",							
							sAddURL: "crud_controlador_prof.php?bandera=3"                    		
							 /*fnShowError: function (message, action) {
								switch (action) {
									case "delete":
										alert(message, "Delete failed");
										break;
									default:
										alert(mensaje+' si');
										break;
								}
							}*/
							
							});

}


function ver_errores(){





	$.ajax({
	   url: "DeleteData.php",
	   type:"POST",
	   data: "id=8",
	   success: function (res){

	   		console.log(res);
	   }

	  });
	  
	  


}

