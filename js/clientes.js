

$(document).ready(function() {


/*
	$( '#').multiselect({


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



	$('#').click(function () {

		var codigoProd = $('#addCod').val();
		var nombreProd = $('#addArt').val();
		var costoProd = $('#addCosto').val();
		var precioCod = $('#addPrecio').val();
		var proovProd = $('#selectProv').val();
		var fechaCad = $('#addFcad').val();
		agregarProducto(codigoProd,nombreProd,costoProd,precioCod,proovProd,fechaCad);

		//console.log(codigoProd + nombreProd + costoProd + precioCod + proovProd + fechaCad);
	});



       */
	//alert('it is ok');



	$('#btnaddclient').click(function () {
		//alert ('presinaste el boton addcleinte');

		//e.preventDefault();
		//alert('algo');
		var dataStringCliente = $('#formcliente').serialize();
		//alert('Datos serializados: ' + dataString);
		agregarCLiente(dataStringCliente);
		//console.log(dataStringCliente);
	});

	tablaUsuarios = $('#tbClientes').DataTable({
		"ajax":{
			//"url": "../controllers/AJAX/addProd_controller.php",
			"url": "../controllers/AJAX/tbCliente_controller.php",
			"method": 'POST', //usamos el metodo POST
			//"data":{opcion:'4'}, //enviamos opcion 4 para que haga un SELECT
			"dataSrc":""
		},
		"columns":[
			{"data": "id_cliente"},
			{"data": "nombre"},
			{"data": "apellido_paterno"},
			{"data": "apellido_materno"},
			{"data": "domicilio"},
			{"data": "localidad"},
			{"data": "telefono"},
			{"data": "email"},
			{"data": "fecha_alta"},
			{"data": "credito_actual"},
			{"data": "estatus_credito_actual"},
			{"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
		]
	});



})