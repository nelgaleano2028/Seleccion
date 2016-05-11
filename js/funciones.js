$(document).ready(mains);



function mains(){
	$(".dropdown-menu li .text").click(capturar_text);
	$("#drop3").click(click_menu);
	
	var inicial=$("#inicial").attr("href");
	var url=inicial.replace("#","");
	console.log(url);
	$('#content').load(url+'.php');
	
}

function capturar_text(){

	var texto = $(this).html();
	
	var url=$(this).attr("href");
	var n=url.replace("#","");
	
	$("#titulo").html(texto);

	console.log(n);
	$('#content').load(n+'.php');
	
	
	$(".dropdown").dropdown("toggle");
	return false;
}

function click_menu(){

	$(".dropdown").toggleClass("open");
	
	return false;
}

