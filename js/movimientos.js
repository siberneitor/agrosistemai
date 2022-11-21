$(document).ready(function() {
	$('#tbMov').hide();
	//multiselect proveedor
	$( '#selectClienteMov').multiselect({
		numberDisplayed: 1,
		enableFiltering: true,
		enableCaseInsensitiveFiltering: true,
		includeSelectAllOption: true,
		selectAllJustVisible: false,
		maxHeight: 1000,
		buttonContainer: '<div class="btn-group multiselect-container" />',
		nonSelectedText: 'TODOS',
		filterPlaceholder: 'Buscar',
		selectAllText: 'TODOS'
	});
	$('#idClienteMov').on('click',function(){
		$('#selectClienteMov').val(0);
		$('#selectClienteMov').multiselect('refresh');
	});


	$('#selectClienteMov').change(function(){
		$('#idClienteMov').val('');;
	});

	$('#buscarClienteMov').click(function(){

		idCliente = $('#idClienteMov').val();

		if(idCliente.length ==0){
			idCliente =$('#selectClienteMov').val();
		}

		//carga los datos de tabla movmiento
		tablaAbono = $('#tbMov').DataTable({
			"ajax":{
				"url": "../../controllers/AJAX/tbMovimiento_datatable.php",
				"method": 'POST', //usamos el metodo POST
				"data":{idCliente:idCliente}, //enviamos opcion 4 para que haga un SELECT
				"dataSrc":""
			},
			"columns":[
				{"data": "fecha"},
				{"data": "id_cliente"},
				{"data": "idMovimiento"},
				{"data": "tipoMov"},
				{"data": "cantidad"},
				{"data": "id_detalle_credito"},
				{"data": "id_venta"},
				{"data": "abono"},
				{"data": "deuda"}
				//{"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button></div></div>"}
			],
			"order": [[ 0, "asc" ]],
			"destroy": true 
		});
		$('#tbMov').show();

	});
})