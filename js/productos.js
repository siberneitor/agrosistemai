

$(document).ready(function() {





	$( '#selectProv').multiselect({


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



	$('#btnAddProd').click(function () {

		var codigoProd = $('#addCod').val();
		var nombreProd = $('#addArt').val();
		var costoProd = $('#addCosto').val();
		var precioCod = $('#addPrecio').val();
		var proovProd = $('#selectProv').val();
		var fechaCad = $('#addFcad').val();
		agregarProducto(codigoProd,nombreProd,costoProd,precioCod,proovProd,fechaCad);

		//console.log(codigoProd + nombreProd + costoProd + precioCod + proovProd + fechaCad);
	});

	$('#btnAddProv').click(function () {

		//e.preventDefault();
		//alert('algo');
		var dataString = $('#formProv').serialize();
		//alert('Datos serializados: ' + dataString);
		agregarProv(dataString);
	});


	//Editar
	$(document).on("click", ".btnEditar", function(){
		//alert('presionate el boton editar');



		opcion = 2;//editar
		fila = $(this).closest("tr");
		codigo = parseInt(fila.find('td:eq(0)').text()); //capturo el ID
		descripcion = fila.find('td:eq(1)').text();
		costo = fila.find('td:eq(2)').text();
		precio = fila.find('td:eq(3)').text();
		proveedor = fila.find('td:eq(4)').text();
		fecha_caducidad = fila.find('td:eq(5)').text();
		$("#codigo").val(codigo);
		$("#descripcion").val(descripcion);
		$("#costo").val(costo);
		$("#precio").val(precio);
		$("#proveedor").val(proveedor);
		$("#fecha_caducidad").val(fecha_caducidad);
		$(".modal-header").css("background-color", "#007bff");
		$(".modal-header").css("color", "white" );
		$(".modal-title").text("Editar prodcuto");
		$('#modalCRUD').modal('show');

		$('#selectProv').prepend("<option value='1' >Josh_reder</option>");

	});

	$('#formUsuarios').submit(function(e){
		//alert('VAS BIEN');

		e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
		Codigo = $.trim($('#codigo').val());
		Art = $.trim($('#descripcion').val());
		Costo = $.trim($('#costo').val());
		Precio = $.trim($('#precio').val());
		Provee = $.trim($('#proveedor').val());
		Fcad = $.trim($('#fecha_caducidad').val());
		$.ajax({
			url:'../controllers/AJAX/agregarProducto_ajax.php',
			type: "POST",
			datatype:"json",
			data:  {Codigo:Codigo, Art:Art, Costo:Costo, Precio:Precio, Provee:Provee, Fcad:Fcad ,opcion:opcion},
			success: function(data) {
				tablaUsuarios.ajax.reload(null, false);
			}
		});
		$('#modalCRUD').modal('hide');

	});

	$(document).on("click", ".btnBorrar", function(){
		fila = $(this);
		user_id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;
		opcion = 3; //eliminar
		var respuesta = confirm("¿Está seguro de borrar el registro "+user_id+"?");
		if (respuesta) {
			$.ajax({
				url:'../controllers/AJAX/agregarProducto_ajax.php',
				type: "POST",
				datatype:"json",
				data:  {opcion:opcion, user_id:user_id},
				success: function() {
					tablaUsuarios.row(fila.parents('tr')).remove().draw();
				}
			});
		}
	});

	//alert('it is ok');
	tablaUsuarios = $('#tbAddProd').DataTable({
		"ajax":{
			//"url": "../controllers/AJAX/addProd_controller.php",
			"url": "../controllers/AJAX/addProd_datatable.php",
			"method": 'POST', //usamos el metodo POST
			//"data":{opcion:'4'}, //enviamos opcion 4 para que haga un SELECT
			"dataSrc":""
		},
		"columns":[
			{"data": "codigo"},
			{"data": "descripcion"},
			{"data": "costo"},
			{"data": "precio"},
			{"data": "proveedor"},
			{"data": "fecha_caducidad"},
			{"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
		]
	});



})