
$(document).ready(function() {


	//multiselect proveedor
	$( '#selectProvGasto,#selectProvRG').multiselect({
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




	//carga los datos de tabla gastos
	tablaGastos = $('#tbGastos').DataTable({
		"ajax":{
			"url": "../controllers/AJAX/tbGastos_datatable.php",
			"method": 'POST', //usamos el metodo POST
			//"data":{opcion:'4'}, //enviamos opcion 4 para que haga un SELECT
			"dataSrc":""
		},
		"columns":[
			{"data": "id_nota_compra"},
			{"data": "nombre"},
			{"data": "total"},
			{"data": "fecha_alta"},
			{"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button></div></div>"}
		],
		"order": [[ 0, "desc" ]]
	});



	//muesrtra inputs para filtrar reporte de gastos
	$('#linkReporte').click(function (e){
		e.preventDefault();
		//alert('entr');
		//$('#filtrosGastos').attr('hidden',false);
		$('#filtrosGastos').toggle("slow");
		});


	//muesrtra inputs para filtrar reporte de gastos
	$('#linkAddGasto').click(function (e){
		e.preventDefault();
		//alert('entr');
		//$('#filtrosGastos').attr('hidden',false);
		$('#addGasto').toggle("slow");
	});



	$('#btnReporteGastos').click(function(evento){
		// alert('frijo');


		evento.preventDefault();

		idNotaCompraF =$('#idNotaCompraF').val();
		selectProvGasto =$('#selectProvRG').val();
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