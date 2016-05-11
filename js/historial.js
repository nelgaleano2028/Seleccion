$(document).ready(main);


function main(){


$('.anio').change(function(){


var anio=$('.anio').val();


	$.ajax({
		url:'consulta_historial.php',
		type:'POST',
		dataType:'JSON',
		data:'anio='+anio,
		success:function(res){
				
			$('#contenedor').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Historial por año'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Dias'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: '<b>{point.y} Dias</b>'
        },
        series: [{
            name: 'Population',
            data: [
                res.dato1,
				res.dato2,
				res.dato3,
				res.dato4,
				res.dato5,
				res.dato6,
				res.dato7,
				res.dato8,
				res.dato9,
				res.dato10,
				res.dato11,
				res.dato12
            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                x: 4,
                y: 10,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif',
                    textShadow: '0 0 3px black'
                }
            }
        }]
    });

		
		}
		


	});


});

}