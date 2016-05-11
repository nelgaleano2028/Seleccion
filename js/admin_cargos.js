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


function tablaCargos(id){

	

	$('#contenido').css('display','none');
	$('#contenido2').load('cargo_tabla.php?id='+id);



}


function tablaCargoNuevo(id){

	//console.log(id);return false;
	
	var mensaje="<center><div>";
		mensaje+="<form id='cargo'>";
		mensaje+="<div><table style='color:black;' border=0>";
		mensaje+="<tr>";
		mensaje+="<td align='left' style='font-weight:bold'>Nombre:&nbsp;&nbsp;&nbsp;</td>";
		mensaje+="<td><input type='text' id='nombre' style='height: 35px; !important'></td>";
		mensaje+="</tr>";
		mensaje+="</form>";		
		mensaje+="</table></div></center>";
		
	
		//covertir id en variable global
		var id=id;

		info_alert_principal("AGREGAR NUEVO CARGO",mensaje,
		function(){
			
			$.ajax({
				url: "insertar_cargo.php",
				type: 'POST',
				data: 'id='+id+'&nombre='+$("#nombre").val()+'&bandera=1',
				success:function(res){
					
					console.log(res); 
					
					if(res==1){
						$("#content").load('cargos.php');
						$('#cargo').modal('hide');
					}
				}
			});
		 
			 return false;
		},
		function(){ $('#cargo').modal('hide');$('#cargo').modal('hide');},
		'cargo');


}

function info_alert_principal(titulo,mensaje,callback1,callback2,id){
		
		var modal='<!-- Modal -->';
				modal+='<div id="'+id+'" class="modal hide fade" style="margin-top: 3%; background-color: rgb(41, 76, 139); color: #fff; z-index: 900001; behavior: url(../../css/PIE.htc)" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">';
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
		
		$('#'+id+'').modal({
			keyboard: false,
			backdrop: "static" 
		});
		
		$("#aceptar").click(function(){callback1(); });
				
		$("#cancelar").click(function(){callback2();});
				
		$('#'+id+'').on('hidden', function () { $(this).remove();});

	}

