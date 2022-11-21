$(document).ready(function() {
	$('#divTbCredXuser').hide();
	 //multiselect proveedor
	$( '#selectClienteCred').multiselect({
		numberDisplayed: 1,
		enableFiltering: true,
		enableCaseInsensitiveFiltering: true,
		includeSelectAllOption: true,
		selectAllJustVisible: false,
		maxHeight: 600,
		buttonContainer: '<div class="btn-group multiselect-container" />',
		nonSelectedText: 'TODOS',
		filterPlaceholder: 'Buscar',
		selectAllText: 'TODOS'
	});
	//carga los datos de tabla abono
	tablaAbono = $('#tbAbono').DataTable({
		"ajax":{
			"url": "../../controllers/AJAX/tbAbono_datatable.php",
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

	$('#selectClienteCred').change(function(){
		$('#lblescojeCred').attr('hidden',false);
		$('#tbCredXuser').attr('hidden',false);


		idClienteCred = $('#selectClienteCred').val();
		$.ajax({
			url:'../../controllers/AJAX/valoresSelect.php',
			type:'POST',
			idClienteCred:idClienteCred,
			success:function(x){
				tbCredXuser = $('#tbCredXuser').DataTable({
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
						{"data": "cantidadQdebe"}
						// {"data": "creditosActivos"},
						// {"data": "cantidadQdebe"},
						// {"data": "totalAbonosXcred"},
						// {"data": "cantidadPrestada"},
						// {"data": "primerFechaVenc"},
						// {"data": "ultimoAbono"},
						// {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button></div></div>"}
					],
					"destroy": true
				});
				$('#tbCredXuser tbody tr').addClass('btn btn-secondary active');
				$('#divTbCredXuser').show();
				$('#tbCredXuser tbody').on( 'click', 'tr', function () {
					if ( $(this).hasClass('selected') ) {
					}
					else {
						$('#divNoCred').attr('hidden',false);
						$('#divDeuda').attr('hidden',false);
						$('#divInputAbono').attr('hidden',false);
						$('#btnaddAbono').attr('hidden',false);
						fila = $(this).closest("tr");
						noCredXcliente = fila.find('td:eq(0)').text();
						deudaXcred = fila.find('td:eq(1)').text();
						$('#inputNocred').val(noCredXcliente);
						$('#inputNocred').attr('hidden',false);
						$('#inputDeuda').val(deudaXcred);
						$('#inputDeuda').attr('hidden',false);

						$('#divInputAbono').focus();
					}
				});
			},
			error:function(primer,segundo,tercer){
				console.log('primer');
				console.log('segundo');
				console.log('tercer');
			}
		});
	});

	//evento para boton agregar abono
	$('#btnaddAbono').click(function (e) {
		e.preventDefault();
		var dataStringAbono = $('#formAbono').serialize();
		agregarAbono(dataStringAbono);
	});
	 $('#btnReporteGastos').click(function(evento){
		evento.preventDefault();
		idNotaCompraF =$('#idNotaCompraF').val();
		selectProvGasto =$('#selectProvGasto').val();
		totalR =$('#totalR').val();
		fIncialRG = $('#fIncialRG').val();
		fFinalRG = $('#fFinalRG').val();
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