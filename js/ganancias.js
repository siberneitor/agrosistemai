

$(document).ready(function() {




	//carga los datos de tabla gastos
	tablaGastos = $('#tbVentasR').DataTable({
		"ajax":{
			"url": "../../controllers/AJAX/tbRventas_datatable.php",
			"method": 'POST', //usamos el metodo POST
			//"data":{opcion:'4'}, //enviamos opcion 4 para que haga un SELECT
			"dataSrc":""
		},
		"columns":[
			{"data": "id_venta"},
			{"data": "estatusConvertido"},
			{"data": "total_unidades"},
			{"data": "totalVenta"},
			{"data": "cantidad_pagada"},
			{"data": "cambio"},
			{"data": "id_cliente"},
			{"data": "fechaRegistro"},
			//{"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button></div></div>"}
		],
		"order": [[ 0, "desc" ]]
	});

	$('#linkRventas').click(function (e){
		e.preventDefault();
		//alert('entr');
		//$('#filtrosGastos').attr('hidden',false);
		$('#filtrosVentas').toggle("slow");
	});




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
		window.open("../../controllers/AJAX/exportarExcel_ajax.php?" +
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