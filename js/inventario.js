

$(document).ready(function() {




/*
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
	*/



		//ejecuta funcion para agregar inventario
	$('#btnAddInv').click(function () {
		var addCodInv = $('#addCodInv').val();
		var addUnidInv = $('#addUnidInv').val();
		var addCostoInv = $('#addCostoInv').val();
		var addPrecioInv = $('#addPrecioInv').val();
		var addFcad = $('#addFcad').val();
		var addIdGasto = $('#addIdGasto').val();
		agregarInventario(addCodInv,addUnidInv,addCostoInv,addPrecioInv,addFcad,addIdGasto);

		//console.log(codigoProd + nombreProd + costoProd + precioCod + proovProd + fechaCad);
	});




	//Editar
	$(document).on("click", ".btnEditar", function(){
		//alert('presionate el boton editar');

		//alert('empieza');
		//$('#statusInv').prop('checked',false);




		opcion = 2;//editar
		fila = $(this).closest("tr");
		Fcodigo = parseInt(fila.find('td:eq(0)').text()); //capturo el ID
		Fdescripcion = fila.find('td:eq(1)').text();
		Funidades = fila.find('td:eq(2)').text();
		Fcosto = fila.find('td:eq(3)').text();
		Fprecio = fila.find('td:eq(4)').text();
		Fcad = fila.find('td:eq(7)').text();
		estatusInv = fila.find('td:eq(8)').text();


		$("#Fcodigo").val(Fcodigo);
		$("#Fdescripcion").val(Fdescripcion);
		$("#Funidades").val(Funidades);
		$("#Fcosto").val(Fcosto);
		$("#Fprecio").val(Fprecio);
		$("#Fcad").val(Fcad);


		if (estatusInv =='activo'){
			//alert('activo');
				$('#statusInv').prop("checked",true);
		}else{
			$('#statusInv').prop('checked',false);
			//alert('inactiuvo');
		}
		

		$(".modal-header").css("background-color", "#007bff");
		$(".modal-header").css("color", "white" );
		$(".modal-title").text("Editar Inventario");
		$('#modalCRUD').modal('show');
	});

	$('#formInv').submit(function(e){
		//alert('VAS BIEN');

		statusInv = 0;
		if($('#statusInv').prop('checked')){
			statusInv = 1;
		}
			//alert($('#statusInv').val());
		//}else{
		//	alert($('#statusInv').val());
		//}

		e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
		Fcodigo = $.trim($('#Fcodigo').val());
		Fdescripcion = $.trim($('#Fdescripcion').val());
		Funidades = $.trim($('#Funidades').val());
		Fcosto = $.trim($('#Fcosto').val());
		Fprecio = $.trim($('#Fprecio').val());
		Fcad = $.trim($('#Fcad').val());
		$.ajax({
			url:'../controllers/AJAX/agregarInventario_ajax.php',
			type: "POST",
			datatype:"json",
			data:  {Fcodigo:Fcodigo, Fdescripcion:Fdescripcion, addUnidInv:Funidades, addCostoInv:Fcosto, addPrecioInv:Fprecio, addFcad:Fcad ,opcion:opcion, statusInv:statusInv},
			success: function(data) {
				tablaAlertInv.ajax.reload(null, false);
				tablaInventario.ajax.reload(null, false);
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
				url:'../controllers/AJAX/agregarInventario_ajax.php',
				type: "POST",
				datatype:"json",
				data:  {opcion:opcion, user_id:user_id},
				success: function() {
					tablaAlertInv.row(fila.parents('tr')).remove().draw();
					tablaInventario.row(fila.parents('tr')).remove().draw();
				}
			});
		}
	});


	//alert('it is ok');
	tablaAlertInv = $('#tbAlertaInv').DataTable({
		"ajax":{
			//"url": "../controllers/AJAX/addProd_controller.php",
			"url": "../controllers/AJAX/addInv_datatable.php",
			"method": 'POST', //usamos el metodo POST
			"data":{opcion:'2'}, //enviamos opcion 4 para que haga un SELECT
			"dataSrc":""
		},
		"columns":[
			{"data": "codigo"},
			{"data": "descripcion"},
			{"data": "unidades"},
			{"data": "costo"},
			{"data": "precio"},
			{"data": "proveedor"},
			{"data": "fecha_ingreso"},
			{"data": "fecha_caducidad"},
			{"data": "estatus"},
			{"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
		]
	});

	//alert('it is ok');
	tablaInventario = $('#tbAddInv').DataTable({
		"ajax":{
			//"url": "../controllers/AJAX/addProd_controller.php",
			"url": "../controllers/AJAX/addInv_datatable.php",
			"method": 'POST', //usamos el metodo POST
			"data":{opcion:'1'}, //enviamos opcion 4 para que haga un SELECT
			"dataSrc":""
		},
		"columns":[
			{"data": "codigo"},
			{"data": "descripcion"},
			{"data": "unidades"},
			{"data": "costo"},
			{"data": "precio"},
			{"data": "proveedor"},
			{"data": "fecha_ingreso"},
			{"data": "fecha_caducidad"},
			{"data": "estatus"},
			{"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
		]
	});



})