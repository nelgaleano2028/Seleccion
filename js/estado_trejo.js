$(document).ready(main);


function main(){

var proceso=Number($('#proceso').val());
var pendiente=Number($('#pendiente').val());
var cerrado=Number($('#cerrado').val());

$('#contenido').highcharts({
		title: {
			text: 'Estados Workflow',
			x: -20 //center
		},
		subtitle: {
			text: '',
			x: -20
		},
		xAxis: {
			categories: ['Proceso', 'Pendiente', 'Cerrado']
		},
		yAxis: {
			title: {
				text: 'Puntuacion'
			},
			plotLines: [{
				value: 0,
				width: 1,
				color: '#FF0000'
			}]
		},
		tooltip: {
			valueSuffix: ' Puntos'
		},
		legend: {
			layout: 'vertical',
			align: 'right',
			verticalAlign: 'middle',
			borderWidth: 0
		},
		series: [{
			name: 'Competencias',
			data: [proceso,pendiente,cerrado]
		}]
	});

}