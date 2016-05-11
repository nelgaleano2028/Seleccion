$(document).ready(mains);

function mains(){
			

	
	$( ".req_reemp_tit" ).mouseover(function() {
		
		$('#req_reemp').show();
		
		$("#btn1").click(function(){
	
			var pagina="./Requisicion_Interna.php"
			
		    window.open(pagina,'_self');	
			
		});
			
	});
	
	
	
	
	
	$( ".req_reemp_tit" ).mouseout(function() {
		
		$('#req_reemp').hide();
		
		
		
	
		
	});
	
		$( ".req_nueva_tit" ).mouseover(function() {
		
		$('#req_nueva').show();
		
		$("#btn2").click(function(){
	
			var pagina="./Requisicion_Nuevo_Cargo2.php"
			
		    window.open(pagina,'_self');	
			
		});
		
		
		
	});
	
	$( ".req_nueva_tit" ).mouseout(function() {
		
		$('#req_nueva').hide();

	});
	
		$( ".req_cargo_tit" ).mouseover(function() {
		
		$('#req_cargo').show();
		
		
		$("#btn3").click(function(){
	
			var pagina="./Requisicion_Nuevo_Cargo3.php"
			
		    window.open(pagina,'_self');	
			
		});
		
		
		
	});
	
	$( ".req_cargo_tit" ).mouseout(function() {
		
		$('#req_cargo').hide();
		
		
		
	});

	
}

function requisicion_cancelar(){

	window.close();
}
