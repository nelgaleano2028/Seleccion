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



function cambiar_estado(codigo,cod_form){


	//console.log($(this).val;



		var mensaje="<p  id='vancante_mensaje' style='text-align:center; color:blue; font-weight:bold;'>Desea iniciar el proceso de vacante?</p>";
	


		Alert.confirmacion(mensaje,
			function(){
				

				$.ajax({
	
					url:'cambiar_estado_vacante.php',
					type:'POST',
					data:'codigo='+codigo+"&cod_form="+cod_form,
					dataType:'html',
					success:function(res){
					
						console.log(res);

						$("#content").load('Solicitudes_vacantes.php');
						$('#myModal6').modal('hide');
					
						


					}
				});






			},
			function(){


				$('#myModal6').modal('hide');
				$("#content").load('Solicitudes_vacantes.php');
			}
		);



}



function aceptar_solicitud(consecutivo){

	var cod_form=consecutivo;
	
	var observaciones=$('textarea[name="observaciones'+consecutivo+'"]').val();
	
	var observaciones=observaciones.toUpperCase();

	
	var bandera=1;
	
	//console.log(observaciones);
	
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
					
						mensaje="<p style='text-align:center; color:green; font-weight:bold;'>Se ha acepta la solicitud correctamente...</p>";
				}else{
						
						mensaje="<p style='text-align:center; color:red; font-weight:bold;'>No Se ha enviado intentalo mas tarde...</p>";
					
			    }
					$("#admin tbody .remove"+consecutivo+"").remove();
					//$("#admin tbody").append("<tr><td valign='center'><center>No Hay registros</center><td></tr>"); agregar una fila
					/*alert personalizado*/
					Alert.alert(mensaje,function(){
						$('#content').load("Solicitudes_Requisicion_Aprobadas.php");
					$('#myModal6').modal('hide');});

			}
		});
				
	
			return false;
	}
	
		
}


function enviar_solicitud(consecutivo,cod_cc2,cod_car,cod_epl){

	
	var cod_form=consecutivo;
	
	var observaciones=$('textarea[name="observaciones'+consecutivo+'"]').val();
	
	var observaciones=observaciones.toUpperCase();

	
	var bandera=2;
	
	if(observaciones ==""){
		
		var mensaje="<p style='text-align:center; color:red; font-weight:bold;'>Debe llenar el campo Observaciones</p>";
	
	
		Alert.alert(mensaje,function(){$('#myModal6').modal('hide');});
	
	}else{
	
		$.ajax({
	
			url:'editar_requisicion_apro.php',
			type:'POST',
			data:'cod_form='+cod_form+'&observaciones='+observaciones+'&bandera='+bandera+"&cod_cc2="+cod_cc2+"&cod_car="+cod_car+"&cod_epl="+cod_epl,
			dataType:'html',
			success:function(data){

				console.log(data); 
				
				if(data==1){
						
						mensaje="<p style='text-align:center; color:green; font-weight:bold;'>Se ha enviado  la solicitud correctamente...</p>";
				}else{
						
						mensaje="<p style='text-align:center; color:red; font-weight:bold;'>No Se ha enviado intentalo mas tarde...</p>";
					
				}
					$("#admin tbody .remove"+consecutivo+"").remove();
					//$("#admin tbody").append("<tr class='odd'><td class='dataTables_empty'>No Hay registros<td></tr>"); agregar una fila
					/*alert personalizado*/
					Alert.alert(mensaje,function(){
					
						$('#content').load("Solicitudes_Requisicion_Aprobadas.php");
						$('#myModal6').modal('hide');});

			}
		});
		
		return false;
	
	
	}
	

}


function aceptar_solicitud_super(cod_form,cod_cc2,cod_car,cod_epl){

  

   observaciones="";

   $.ajax({

   url:'cerrar_requisicion_apro.php',
   type:'POST',
   data:'cod_form='+cod_form+'&observaciones='+observaciones+"&cod_cc2="+cod_cc2+"&cod_car="+cod_car+"&cod_epl="+cod_epl,
   dataType:'html',
   success:function(data){

    console.log(data);

    if(data==1){

      mensaje="<p style='text-align:center; color:green; font-weight:bold;'>Se ha cerrado la Requisicion Correctamente</p>";
    }else{

      mensaje="<p style='text-align:center; color:red; font-weight:bold;'>Intentalo mas tarde...</p>";

    }

     $("#admin tbody").append("<tr class='odd'><td class='dataTables_empty'>No Hay registros<td></tr>");

     Alert.alert(mensaje,function(){

      $('#content').load("Solicitudes_Requisicion_Aprobadas.php");
      $('#myModal6').modal('hide');});

   }
  });

  return false;

 }




