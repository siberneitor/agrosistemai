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

	valorRadio = $('input:radio[name=CredType]:checked').val();

//tabla resumen de creditos si nseleccioanr radio boton
	tbCreditoGeneral = $('#tbCreditoGeneral').DataTable({
		"ajax":{
			"url": "../../controllers/AJAX/tbCreditos_datatable.php",
			"method": 'POST', //usamos el metodo POST
			"data":{opcion:1}, //enviamos opcion 4 para que haga un SELECT
			"dataSrc":""
		},
		"columns":[
			{
				"className":      'details-control',
				"orderable":      false,
				"data":           null,
				"defaultContent": '<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">\n' +
					'  <path fill-rule="evenodd" d="M3.204 5L8 10.481 12.796 5H3.204zm-.753.659l4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z"/>\n' +
					'</svg>'
			},
			{"data": "nombreCliente"},
			{"data": "aliasCliente"},
			{"data": "creditosActivos"},
			{"data": "deudaActual"},
			{"data": "abono"},
			{"data": "cantidadPrestada"},
			{"data": "primerFechaVenc"},
			{"data": "ultimoAbono"},
			{"data": "garantia"},
			{"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-outline-primary btn-sm btnCalendario'><i class='material-icons'>date_range</i></button></div></div>"}


		],
		"destroy": true
	});

	$(document).on("click", ".btnCalendario", function(){
		//alert('presionate el boton editar cliente');



		opcion = 1;//editar
		fila = $(this).closest("tr");
		id_cliente = parseInt(fila.find('td:eq(2)').text()); //capturo el ID
		NombreCli = fila.find('td:eq(1)').text(); //capturo el ID
		console.log('NombreCli');
		console.log(NombreCli);
		creditosAct = fila.find('td:eq(3)').text();
		deudaAct = fila.find('td:eq(4)').text();
		cantidadAbonada = fila.find('td:eq(5)').text();
		MontocreditoTotal = fila.find('td:eq(6)').text();
		fechaVenc = fila.find('td:eq(7)').text();
		fechaUltimoAbono = fila.find('td:eq(7)').text();
		$("#deudaActual").text(deudaAct);
		$("#cantidadAbonada").text(cantidadAbonada);
		$("#MontocreditoTotal").text(MontocreditoTotal);
		// debe1diames1 = MontocreditoTotal *

		var fechaInicio = new Date().getTime();


		var fechaFin    = 	new Date();
		var fechaFin2    = 	new Date();
		fechaFin.setDate(fechaFin.getDate() + 30);
		fechaFin2.setDate(fechaFin.getDate() + 60);
		// var fechaFin2    = 	new Date().setDate(fecha.getDate() + 60);

		// var fechaFin    = new Date('2022-07-01').getTime();
		// var fechaFin2    = new Date('2022-08-01').getTime();

		var diff = fechaFin - fechaInicio;
		var diff2 = fechaFin2 - fechaInicio;

		dias = parseInt(diff/(1000*60*60*24));
		dias2 = parseInt(diff2/(1000*60*60*24));
masInteres = dias * 0.0712;
masInteres2 = dias2 * 0.0712;
cantidad = deudaAct * masInteres / 100;
cantidad2 = deudaAct * masInteres2 / 100;
console.log('cantidad');
console.log(cantidad);
deuda1 = parseFloat(deudaAct) + parseFloat(cantidad);
deuda2 = parseFloat(deudaAct) + parseFloat(cantidad2);
console.log('deudaAct');
console.log(deudaAct);
		$("#debe1diames1").text(deuda1.toFixed(2));
		$("#Montocredito1").text(MontocreditoTotal);
		$("#cantidadAbonada1").text(cantidadAbonada);
		$("#debe1diames2").text(deuda2.toFixed(2));
		$("#Montocredito2").text(MontocreditoTotal);
		$("#cantidadAbonada2").text(cantidadAbonada);


		$(".modal-header").css("background-color", "#007bff");
		$(".modal-header").css("color", "white" );
		// $(".modal-title").text(NombreCli);
		$(".modal-title").text(NombreCli);
		$('#modalCalendPagos').modal('show');


	});


	//seleciona el tipo de credito y vuelve a mostar tabla
	$('input:radio[name=CredType]').click(function(){
		valorRadio = $('input:radio[name=CredType]:checked').val();
		tbCreditoGeneral = $('#tbCreditoGeneral').DataTable({
			"ajax":{
				"url": "../../controllers/AJAX/tbCreditos_datatable.php",
				"method": 'POST', //usamos el metodo POST
				"data":{opcion:valorRadio}, //enviamos opcion 4 para que haga un SELECT
				"dataSrc":""
			},
			"columns":[
				{
					"className":      'details-control',
					"orderable":      false,
					"data":           null,
					"defaultContent": '<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">\n' +
						'  <path fill-rule="evenodd" d="M3.204 5L8 10.481 12.796 5H3.204zm-.753.659l4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z"/>\n' +
						'</svg>'
				},
				{"data": "nombreCliente"},
				{"data": "aliasCliente"},
				{"data": "creditosActivos"},
				{"data": "deudaActual"},
				{"data": "abono"},
				{"data": "cantidadPrestada"},
				{"data": "primerFechaVenc"},
				{"data": "ultimoAbono"},
				{"data": "garantia"},
				{"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}


			],
			"order": [[1, 'asc']],
			"destroy": true
		});
	});
	//muestra tabla detalle de credito al desplegar
	$('#tbCreditoGeneral tbody').on('click', 'td.details-control', function () {
		var tr = $(this).closest('tr');
		idClienteCred = tr.find('td:eq(2)').text();
		var row = tbCreditoGeneral.row( tr );
		if ( row.child.isShown() ) {
			// This row is already open - close it
			row.child.hide();
			tr.removeClass('shown');
		}
		else {
			// Open this row
			row.child( tablaCredXclient(row.data()) ).show();
			tr.addClass('shown');
			//empieza a formar datatable
			tbCredXuser2 = $('#tbCredXuser2').DataTable({
				"ajax":{
					"url": "../../controllers/AJAX/tbCredXcliente_datatable.php",
					"method": 'POST', //usamos el metodo POST
					"data":{opcion:1,
						idClienteCred:idClienteCred
					}, //enviamos opcion 4 para que haga un SELECT
					"dataSrc":""
				},
				"searching": false,
				"bPaginate": false,
				"bLengthChange": false,
				"bInfo": false,
				"columns":[
					{"data": "idCredDC"},
					{"data": "cantidadMasInteres"},
					 {"data": "fVencimiento"},
					 {"data": "montoMenosPI"},
					{"data": "montoPrestado"},
					 {"data": "InteresXdias"},
					 {"data": "pagoInicial"},
					 {"data": "totalAbonos"},
					 {"data": "fechaInicio"},
					 {"data": "idVenta"},
					{"data": "tipo_credito"},
					{"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-outline-warning btn-sm btnDetalleVenta'><i class='material-icons'>receipt_long</i></button></div></div>"}
				],
				"destroy": true
			});
		}
	});
	//evento para boton agregar CREDITO
	$('#btnaddCred').click(function () {
		var dataStringCredito = $('#formCredito').serialize();
		agregarCredito(dataStringCredito);
	});

	//evneto para icono detalle venta
	$(document).on("click", ".btnDetalleVenta", function(){
		fila = $(this).closest("tr");
		idNotaCompra = parseInt(fila.find('td:eq(9)').text()); //capturo el ID
		// console.log('idNotaCompra');
		// console.log(idNotaCompra);

		$.ajax({
			url:'../../controllers/AJAX/detalle_ticket_ajax.php',
			type:'GET',
			data:{idNotaCompra:idNotaCompra},
			success:function(tabla){
				// console.log(tabla);
				$('#divDetalleTicket').html(tabla);
				$('#modalDetalleTicket').modal('show');
			},
			error:function(error1,error2,error3){
				console.log(error1);
				console.log(error2);
				console.log(error3);
			},
			complete: function(){
			}
		});
	});


	//evento para boton editar gasto
	$(document).on("click", ".btnEditar", function(){
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
			url:'../../controllers/AJAX/agregarGasto_ajax.php',
			type: "GET",
			datatype:"json",
			data:  {idNotaCompra:idNotaCompra, selectProvGasto:selectProvGasto, totalCompra:totalCompra, opcion:opcion},
			success: function(data) {
				tbCreditoGeneral.ajax.reload(null, false);
			}
		});
		$('#modalAddGasto').modal('hide');
	});

	//muesrtra inputs para filtrar reporte de gastos
	$('#linkReporte').click(function (e){
		e.preventDefault();
		//alert('entr');
		$('#filtrosGastos').attr('hidden',false);
		});

	$('#btnReporteGastos').click(function(evento){
		evento.preventDefault();
		idNotaCompraF =$('#idNotaCompraF').val();
		selectProvGasto =$('#selectProvGasto').val();
		totalR =$('#totalR').val();
		fIncialRG = $('#fIncialRG').val();
		fFinalRG = $('#fFinalRG').val();

		//console.log(fIncialRG);
		window.open("../../controllers/AJAX/reporteGastos_ajax.php?" +
			"idNotaCompraF="+ idNotaCompraF +
			"&selectProvGasto=" +selectProvGasto +
			"&totalR=" +totalR+
			"&fIncialRG=" +fIncialRG+
			"&fFinalRG=" +fFinalRG,
			'directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no'
		);

	});
})