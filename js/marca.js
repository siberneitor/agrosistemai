$(document).ready(function() {
	//
	$( '#selectMarca').multiselect({
		numberDisplayed: 1,
		enableFiltering: true,
		enableCaseInsensitiveFiltering: true,
		includeSelectAllOption: true,
		selectAllJustVisible: false,
		maxHeight: 800,
		buttonContainer: '<div class="btn-group multiselect-container-" />',
		nonSelectedText: 'TODOS',
		filterPlaceholder: 'Buscar',
		selectAllText: 'TODOS'
	});



	// $('#btnAddProd').click(function () {
	//
	// 	//empieza
	//
	// 		$('#formAddProv').validate({
	// 			rules: {
	// 				addCod: { required: true,
	// 					number:true
	// 				},
	// 				addArt: { required: true
	// 				},
	//
	//
	// 			},
	// 			messages: {
	// 				addCod: {
	// 					required: "el codigo es obigatorio",
	// 					number: "el codigo solo debe contener numeros",
	// 				},
	// 				addArt: {
	// 					required: "el nombre del articulo es obigatorio"
	//
	// 				}
	//
	//
	//
	// 			},
	// 			submitHandler: function (form) {
	//
	// 				var codigoProd = $('#addCod').val();
	// 				var nombreProd = $('#addArt').val();
	// 				var proovProd = $('#selectProv').val();
	// 				agregarProducto(codigoProd,nombreProd,proovProd);
	// 			}
	//
	// 	});
	//
	// });



	$('#btnAddMarca').click(function () {
		console.log('llega hasta click btn add marca');

		$('#formMarca').validate({
			rules: {
				nombreMarca: { required: true,
					minlength: 2
				}
				},
			messages: {
				nombreMarca: {
					required: "el nombre es obigatorio",
					minlength: "debe contener al menos 2 caracteres",
				}
				},
			submitHandler: function (form) {


				var dataString = $('#formMarca').serialize();
				//alert('exitoso: '+dataString);
				agregarMarca(dataString);
			}

		});


	});


	// //Editar
	// $(document).on("click", ".btnEditar", function(){
	// 	//alert('presionate el boton editar');
	//
	//
	//
	// 	opcion = 2;//editar
	// 	fila = $(this).closest("tr");
	// 	descripcion = fila.find('td:eq(0)').text();
	// 	codigo = parseInt(fila.find('td:eq(1)').text()); //capturo el ID
	// 	costo = fila.find('td:eq(2)').text();
	// 	precio = fila.find('td:eq(3)').text();
	// 	proveedor = fila.find('td:eq(4)').text();
	// 	fecha_caducidad = fila.find('td:eq(5)').text();
	// 	unidades = fila.find('td:eq(6)').text();
	// 	$("#codigo").val(codigo);
	// 	$("#descripcion").val(descripcion);
	// 	$("#costo").val(costo);
	// 	$("#precio").val(precio);
	// 	$("#proveedor").val(proveedor);
	// 	$("#fecha_caducidad").val(fecha_caducidad);
	// 	$("#unidades").val(unidades);
	// 	$(".modal-header").css("background-color", "#007bff");
	// 	$(".modal-header").css("color", "white" );
	// 	$(".modal-title").text("Editar producto");
	// 	$('#modalCRUD').modal('show');
	//
	// 	//$('#selectProv').prepend("<option value='1' >Josh_reder</option>");
	//
	// });

	// $('#formUsuarios').submit(function(e){
	// 	//alert('VAS BIEN');
	//
	// 	e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
	// 	Codigo = $.trim($('#codigo').val());
	// 	Art = $.trim($('#descripcion').val());
	// 	Costo = $.trim($('#costo').val());
	// 	Precio = $.trim($('#precio').val());
	// 	Provee = $.trim($('#proveedor').val());
	// 	Fcad = $.trim($('#fecha_caducidad').val());
	// 	Unidades = $.trim($('#unidades').val());
	// 	$.ajax({
	// 		url:'../controllers/AJAX/agregarProducto_ajax.php',
	// 		type: "POST",
	// 		datatype:"json",
	// 		data:  {Codigo:Codigo, Art:Art, Costo:Costo, Precio:Precio, Provee:Provee, Fcad:Fcad ,Unidades:Unidades,opcion:opcion},
	// 		success: function(data) {
	// 			tablaUsuarios.ajax.reload(null, false);
	// 		}
	// 	});
	// 	$('#modalCRUD').modal('hide');
	// 	mostrarTablaAlertaProducto();
	//
	// });

	// $(document).on("click", ".btnBorrar", function(){
	// 	fila = $(this);
	// 	user_id = parseInt($(this).closest('tr').find('td:eq(1)').text()) ;
	// 	opcion = 3; //eliminar
	// 	var respuesta = confirm("¿Está seguro de borrar el registro "+user_id+"?");
	// 	if (respuesta) {
	// 		$.ajax({
	// 			url:'../controllers/AJAX/agregarProducto_ajax.php',
	// 			type: "POST",
	// 			datatype:"json",
	// 			data:  {opcion:opcion, user_id:user_id},
	// 			success: function() {
	// 				tablaUsuarios.row(fila.parents('tr')).remove().draw();
	// 			}
	// 		});
	// 	}
	// });

	//alert('it is ok');
	// tablaUsuarios = $('#tbAddProducto').DataTable({
	// 	"ajax":{
	// 		"url": "../controllers/AJAX/addProd_datatable.php",
	// 		"method": 'POST', //usamos el metodo POST
	// 		"data":{opcion:1}, //enviamos opcion 4 para que haga un SELECT
	// 		"dataSrc":""
	// 	},
	// 	"columns":[
	// 		{"data": "descripcion"},
	// 		{"data": "codigo"},
	// 		{"data": "costo"},
	// 		{"data": "precio"},
	// 		{"data": "proveedor"},
	// 		{"data": "fecha_caducidad"},
	// 		{"data": "unidades"},
	// 		{"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
	// 	]
	// });



})