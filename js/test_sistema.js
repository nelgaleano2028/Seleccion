 $(document).ready(function() {
 		
	 $("#test_sistema").submit(validar);

	
 } );	


 function validar(){

 	var datos=$("#test_sistema").serializeArray();


 	console.log(datos); 


 	return false;


 }
