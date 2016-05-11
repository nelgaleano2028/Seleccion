$(document).ready(main);


function main(){
}


function informe(cedula){


	$('#contenido').css('display','none');
	$('#contenido2').load('editar_informe_integral.php?cedula='+cedula);



}


//funcion solo numeros
		function validarnum(e) {
			tecla = (document.all) ? e.keyCode : e.which;
			if (tecla==8) return true;
			patron = /\d/;
			te = String.fromCharCode(tecla);
			return patron.test(te);
		}
