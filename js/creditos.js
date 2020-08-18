
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


	//valorRadio = $('input:radio[name=CredType]:checked').val();

	tbCreditoGeneral = $('#tbCreditoGeneral').DataTable({
		"ajax":{
			"url": "../controllers/AJAX/tbCreditos_datatable.php",
			"method": 'POST', //usamos el metodo POST
			"data":{opcion:1}, //enviamos opcion 4 para que haga un SELECT
			"dataSrc":""
		},
		"columns":[
			{"data": "nombreCliente"},
			{"data": "idCliente"},
			{"data": "creditosActivos"},
			{"data": "cantidadQdebe"},
			{"data": "totalAbonosXcred"},
			{"data": "cantidadPrestada"},
			{"data": "primerFechaVenc"},
			{"data": "ultimoAbono"},
			{"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button></div></div>"}

		],
		"destroy": true
	});

	$('input:radio[name=CredType]').click(function(){

		valorRadio = $('input:radio[name=CredType]:checked').val();
		tbCreditoGeneral = $('#tbCreditoGeneral').DataTable({
			"ajax":{
				"url": "../controllers/AJAX/tbCreditos_datatable.php",
				"method": 'POST', //usamos el metodo POST
				"data":{opcion:valorRadio}, //enviamos opcion 4 para que haga un SELECT
				"dataSrc":""
			},
			"columns":[
				{"data": "nombreCliente"},
				{"data": "idCliente"},
				{"data": "creditosActivos"},
				{"data": "cantidadQdebe"},
				{"data": "totalAbonosXcred"},
				{"data": "cantidadPrestada"},
				{"data": "primerFechaVenc"},
				{"data": "ultimoAbono"},
				{"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button></div></div>"}

				],
			"destroy": true
		});


	});



	//evento para boton agregar CREDITO
	$('#btnaddCred').click(function () {
		var dataStringCredito = $('#formCredito').serialize();
		agregarCredito(dataStringCredito);
	});

	//evento para boton editar gasto
	$(document).on("click", ".btnEditar", function(){
		//alert('presionate el boton editar cliente');

		opcion = 2;//editar
		fila = $(this).closest("tr");
		idNotaCompra = parseInt(fila.find('td:eq(0)').text()); //capturo el ID
		selectProvGasto = fila.find('td:eq(1)').text(); //capturo el ID
		totalCompra = fila.find('td:eq(2)').text();
		fechaAltaG = fila.find('td:eq(3)').text();

		$("#idNotaCompraG").val(idNotaCompra);
		$("#selectProvGastoG").val(selectProvGasto);
		$("#totalCompraG").val(totalCompra);
		$("#fechaAltaG").val(fechaAltaG);

		$(".modal-header").css("background-color", "#007bff");
		$(".modal-header").css("color", "white" );
		$(".modal-title").text("Editar gasto");
		$('#modalAddGasto').modal('show');


	});


	//evento para boton guardar editar gasto
	$('#formGasto').submit(function(e){

		idNotaCompra = $("#idNotaCompraG").val();
		selectProvGasto = $("#selectProvGastoG").val();
		totalCompra = $("#totalCompraG").val();


		e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
		$.ajax({
			url:'../controllers/AJAX/agregarGasto_ajax.php',
			type: "GET",
			datatype:"json",
			data:  {idNotaCompra:idNotaCompra, selectProvGasto:selectProvGasto, totalCompra:totalCompra, opcion:opcion},
			success: function(data) {
				tbCreditoGeneral.ajax.reload(null, false);
			}
		});
		$('#modalAddGasto').modal('hide');

	});

	//carga los datos de tabla gastos



	//muesrtra inputs para filtrar reporte de gastos
	$('#linkReporte').click(function (e){
		e.preventDefault();
		//alert('entr');
		$('#filtrosGastos').attr('hidden',false);
		});

	$('#btnReporteGastos').click(function(evento){
		// alert('frijo');


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