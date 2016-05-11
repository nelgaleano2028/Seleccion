 $(document).ready(function() {
 		
	 $("#test_16pf").submit(prueba);

	
 } );	


 function prueba(){

 	var datos=$("#test_16pf").serialize();


 	$.ajax({
		url:"test_16pf.php",
		data:datos,
		dataType:"html",
		type:"POST",			
		success:function(data){
			
			console.log(data); return false;
			
			
			
			
		}
	});
		
	return false;


 	return false;


 }
