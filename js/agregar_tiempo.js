$(document).ready(main);


function main(){

	$("#enviar_tiempo").click(update_tiempo);


}


function update_tiempo(){


	//var datos= $("#update_tiempo").serializeArray();
	//datos.push({name:'nomCar', value:$("input[name=nomCar]").val()},

        var datos= new Array();

        var inputCaras1=Number($("input[name=caras1]").val());
        var inputCaras2=Number($("input[name=caras2]").val());


        if(inputCaras1 <=9){
        	

        	inputCaras1= "0"+inputCaras1;

        }

        if(inputCaras2 <= 9){

        	inputCaras2= "0"+inputCaras2;

        }

		var caras= inputCaras1+":"+ inputCaras2;


		var inputBg31=Number($("input[name=bg31]").val());
        var inputBg32=Number($("input[name=bg32]").val());


        if(inputBg31 <=9){
        	

        	inputBg31= "0"+inputBg31;

        }

        if(inputBg32 <= 9){

        	inputBg32= "0"+inputBg32;

        }


		var bg3= inputBg31+":"+ inputBg32;


		var inputletras1=Number($("input[name=letras1]").val());
        var inputletras2=Number($("input[name=letras2]").val());



        if(inputletras1 <=9){
        	

        	inputletras1= "0"+inputletras1;

        }

        if(inputletras2 <= 9){

        	inputletras2= "0"+inputletras2;

        }


		var letras= inputletras1+":"+ inputletras2;



		var inputcmt1=Number($("input[name=cmt1]").val());
        var inputcmt2=Number($("input[name=cmt2]").val());



        if(inputcmt1 <=9){
        	

        	inputcmt1= "0"+inputcmt1;

        }

        if(inputcmt2 <= 9){

        	inputcmt2= "0"+inputcmt2;

        }


		var cmt=  inputcmt1+":"+ inputcmt2;


		var inputaprendizaje1=Number($("input[name=aprendizaje1]").val());
        var inputaprendizaje2=Number($("input[name=aprendizaje2]").val());

        if(inputaprendizaje1 <=9){
        	

        	inputaprendizaje1= "0"+inputaprendizaje1;

        }

        if(inputaprendizaje2 <= 9){

        	inputaprendizaje2= "0"+inputaprendizaje2;

        }


        var aprendizaje=inputaprendizaje1+":"+ inputaprendizaje2;


        var inputtemperamento1=Number($("input[name=temperamento1]").val());
        var inputtemperamento2=Number($("input[name=temperamento2]").val());

        if(inputtemperamento1 <=9){
        	

        	inputtemperamento1= "0"+inputtemperamento1;

        }

        if(inputtemperamento2 <= 9){

        	inputtemperamento2= "0"+inputtemperamento2;

        }

        var temperamento= inputtemperamento1+":"+ inputtemperamento2;

        var inputwartegg1=Number($("input[name=wartegg1]").val());
        var inputwartegg2=Number($("input[name=wartegg2]").val());


        if(inputwartegg1 <=9){
        	

        	inputwartegg1= "0"+inputwartegg1;

        }

        if(inputwartegg2 <= 9){

        	inputwartegg2= "0"+inputwartegg2;

        }


        var wartegg= inputwartegg1+":"+inputwartegg2;


        var inputpf1=Number($("input[name=pf1]").val());
        var inputpf2=Number($("input[name=pf2]").val());


         if(inputpf1 <=9){
        	

        	inputpf1= "0"+inputpf1;

        }

        if(inputpf2 <= 9){

        	inputpf2= "0"+inputpf2;

        }


       var pf= inputpf1+":"+inputpf2;


        datos.push({name:'caras', value:caras} , {name:'caras', value:caras}, {name:'bg3', value:bg3}, {name:'letras', value:letras}, {name:'cmt', value:cmt},
        	{name:'aprendizaje', value:aprendizaje}, {name:'temperamento', value:temperamento}, {name:'wartegg', value:wartegg}, {name:'pf', value:pf});

	$.ajax({
		
			url:'update_tiempo.php',
			type:'POST',
			data:datos,
			dataType:'html',
			success:function(res){
				//validar 
				//console.log(res); return false;

				if(res==true){

					mensaje="<span style='color:green; font-weight:bold'>Se ha Actualizado correctamente</span>";
							//alert personalizado
					
				}else{

					mensaje="<span style='color:red; font-weight:bold'>No se ha ingresado intentalo mas tarde</span>";
				}


				Alert.alert(mensaje,function(){

						$('#myModal6').modal('hide');

						$("#content").load('agregar_tiempo.php');


					});
				
			}
		});
		
		return false;
	



}