

$(document).ready(function() {

$('#btnRventas').click(function(evento) {
		evento.preventDefault();


	});


//boton generar reporte verde
	$('#btnExportar').click(function(){
		alert('presionaste el boton con el id: '+'btnExportar');
	});



	$('#btnGastos').click(function(){
		$('#filtrosVentas').hide();
		$('#filtrosGastos').show();
	});

	$('#btnRventasVerde').click(function(){
		$('#filtrosGastos').hide();
		$('#filtrosVentas').show();
	});




})