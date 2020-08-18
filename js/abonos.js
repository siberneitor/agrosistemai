
$(document).ready(function() {

	 //multiselect proveedor
	$( '#selectCliente').multiselect({
		numberDisplayed: 1,
		enableFiltering: true,
		enableCaseInsensitiveFiltering: true,
		includeSelectAllOption: true,
		selectAllJustVisible: false,
		maxHeight: 400,
		buttonContainer: '<div class="btn-group multiselect-container-" />',
		nonSelectedText: 'TODOS',
		filterPlaceholder: 'Buscar',
		selectAllText: 'TODOS'
	});

	//evento para boton agregar abono
	$('#btnaddAbono').click(function () {
		var dataStringAbono = $('#formAbono').serialize();
		agregarAbono(dataStringAbono);
	});

	//carga los datos de tabla abono
	tablaAbono = $('#tbAbono').DataTable({
		"ajax":{
			"url": "../controllers/AJAX/tbAbono_datatable.php",
			"method": 'POST', //usamos el metodo POST
			//"data":{opcion:valorRadio}, //enviamos opcion 4 para que haga un SELECT
			"dataSrc":""
		},
		"columns":[
			{"data": "id_abono"},
			{"data": "fechaAbono"},
			{"data": "total"},
			{"data": "id_detalle_credito"},
			{"data": "id_cliente"}
			//{"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button></div></div>"}
		],
		"order": [[ 0, "desc" ]]
	});


	 $('#btnReporteGastos').click(function(evento){

		evento.preventDefault();

		idNotaCompraF =$('#idNotaCompraF').val();
		selectProvGasto =$('#selectProvGasto').val();
		totalR =$('#totalR').val();
		fIncialRG = $('#fIncialRG').val();
		fFinalRG = $('#fFinalRG').val();

		//console.log(fIncialRG);
		window.open("../controllers/AJAX/reporteGastos_ajax.php?" +
			"idNotaCompraF="+ idNotaCompraF +
			"&selectProvGasto=" +selectProvGasto +
			"&totalR=" +totalR+
			"&fIncialRG=" +fIncialRG+
			"&fFinalRG=" +fFinalRG,
			'directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no'
		);

	});
})