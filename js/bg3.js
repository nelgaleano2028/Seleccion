 $(document).ready(function() {
 		
	 $("#formulario_bg3").submit(validar);


	

 });


 

 function validar(){

 	var datos= $("#formulario_bg3").serializeArray();



	$.ajax({
		url:"c_bg3_resp.php",
		data:datos,
		dataType:"html",
		type:"POST",			
		success:function(data){
			
			console.log(data); return false;
			
			
			
			
		}
	});
		
	return false;	


 	console.log(datos); 


 	return false;
 }	
