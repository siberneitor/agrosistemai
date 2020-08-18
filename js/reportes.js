

$(document).ready(function() {

	$('#btnRventas').click(function(evento) {
		evento.preventDefault();

		idVentaR =$('#idVentaR').val();
		codigoR =$('#codigoR').val();
		nombreProdR =$('#nombreProdR').val();
		clienteR =$('#clienteR').val();
		fInicialR =$('#fInicialR').val();
		fFinalR =$('#fFinalR').val();
		horaInicialR =$('#horaInicialR').val();
		horaFinalR =$('#horaFinalR').val();
		fCadIniR =$('#fCadIniR').val();
		fCadFinalR =$('#fCadFinalR').val();
		selectTipoVenta = $('#selectTipoVenta').val();

		obtenerValoresForm=$('#formReporteVentas').serialize();
		console.log(obtenerValoresForm);
		//window.open("../controllers/AJAX/exportarExcelPrueba.php?" +
		window.open("../controllers/AJAX/exportarExcel_ajax.php?" +
			"idVentaR="+ idVentaR +
			"&codigoR=" +codigoR +
			"&nombreProdR=" +nombreProdR +
			"&clienteR=" +clienteR +
			"&fInicialR=" +fInicialR +
			"&fFinalR=" +fFinalR +
			"&horaInicialR=" +horaInicialR +
			"&horaFinalR=" +horaFinalR +
			"&fCadIniR=" +fCadIniR +
			"&fCadFinalR=" +fCadFinalR+
			"&tipoVenta=" +selectTipoVenta,
			'directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no'
			 );
	});


//boton generar reporte verde
	$('#btnExportar').click(function(){
		alert('presionaste el boton con el id: '+'btnExportar');


	});


})