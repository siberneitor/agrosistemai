$(document).ready(function() {

	usaFcad=0;

	//muestra u oculta la tabla con los productos con pocas unidades
	mostrarTablaAlertaInv();

	//activa o desactiva el input para agregar fecha de caducidad
	$('#addFcad').attr('disabled', true)
	cambiarcheckboxFcad = $('#checkboxFcadInv').change(function(){
		if($('#checkboxFcadInv').is(':checked')) {
			$('#addFcad').attr('disabled', false)
			usaFcad = 1;
		}else {
			$('#addFcad').attr('disabled', true)
		}
	});

	//ejecuta funcion para agregar inventario
	$('#btnAddInv').click(function () {
		if(usaFcad){
			//usaFcad=$('#addFcad').val()+' '+'23'+':'+'59'+':'+'59'
			usaFcad=$('#addFcad').val();
		}
		var addCodInv = $('#addCodInv').val();
		var addUnidInv = $('#addUnidInv').val();
		var addCostoInv = $('#addCostoInv').val();
		var addPrecioInv = $('#addPrecioInv').val();
		//var addFcad = $('#addFcad').val();
		var addIdGasto = $('#addIdGasto').val();

		agregarInventario(addCodInv,addUnidInv,addCostoInv,addPrecioInv,addIdGasto,usaFcad);
		$('#addCodInv').focus();
	});

	//Editar inventario
	$(document).on("click", ".btnEditar", function(){
		//alert('presionate el boton editar');
		$('#FunidadesNew').val(0);
		opcion = 2;//editar
		fila = $(this).closest("tr");
		Fdescripcion = fila.find('td:eq(0)').text();
		Fcodigo = parseInt(fila.find('td:eq(1)').text()); //capturo el ID
		Funidades = fila.find('td:eq(2)').text();
		Fcosto = fila.find('td:eq(3)').text();
		Fprecio = fila.find('td:eq(4)').text();
		Fcad = fila.find('td:eq(7)').text();
		estatusInv = fila.find('td:eq(10)').text();

		$("#Fcodigo").val(Fcodigo);
		$("#Fdescripcion").val(Fdescripcion);
		$("#Funidades").val(Funidades);
		$("#Fcosto").val(Fcosto);
		$("#Fprecio").val(Fprecio);

		//validacion para saber si el articulo contiene fecha de caducidad
		if(Fcad == ''){
			$("#Fcad").val('');
			$("#Fcad").attr('disabled',true);
		}else{
			$("#Fcad").attr('disabled',false);
			$("#Fcad").val(Fcad);
		}
console.log('estatusInv');
console.log(estatusInv);
		if (estatusInv =='activo'){
			$('#statusInv').prop("checked",true);
		}else{
			$('#statusInv').prop('checked',false);
		}

		//datos para abrir el modal editar inventario
		$(".modal-header").css("background-color", "#007bff");
		$(".modal-header").css("color", "white" );
		$(".modal-title").text("Editar Inventario");
		$('#modalCRUD').modal('show');
	});

	//guarda datos ingresados en "editar inventario"
	$('#formInv').submit(function(e){

		statusInv = 0;
		if($('#statusInv').prop('checked')){
			statusInv = 1;
		}

		e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
		Fcodigo = $.trim($('#Fcodigo').val());
		Fdescripcion = $.trim($('#Fdescripcion').val());
		Funidades = $.trim($('#Funidades').val());
		FunidadesNew = $.trim($('#FunidadesNew').val());
		Fcosto = $.trim($('#Fcosto').val());
		Fprecio = $.trim($('#Fprecio').val());
		Fcad = $.trim($('#Fcad').val());
		$.ajax({
			url:'../../controllers/AJAX/agregarInventario_ajax.php',
			type: "POST",
			datatype:"json",
			data:  {Fcodigo:Fcodigo, Fdescripcion:Fdescripcion, addUnidInv:Funidades,FunidadesNew:FunidadesNew, addCostoInv:Fcosto, addPrecioInv:Fprecio, addFcad:Fcad ,opcion:opcion, statusInv:statusInv},
			success: function(data) {
				tablaInventario.ajax.reload(null, false);
				$('#FunidadesNew').val(0);
			}
		});

		$('#modalCRUD').modal('hide');
		mostrarTablaAlertaInv();
	});

	//eliminar registro de inventario
	$(document).on("click", ".btnBorrar", function(){
		fila = $(this);
		user_id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;
		opcion = 3; //eliminar
		var respuesta = confirm("¿Está seguro de borrar el registro "+user_id+"?");
		if (respuesta) {
			$.ajax({
				url:'../../controllers/AJAX/agregarInventario_ajax.php',
				type: "POST",
				datatype:"json",				data:  {opcion:opcion, user_id:user_id},
				success: function() {
					//tablaAlertInv.row(fila.parents('tr')).remove().draw();
					tablaInventario.row(fila.parents('tr')).remove().draw();
					mostrarTablaAlertaInv();
				}
			});
		}
	});


	tablaInventario = $('#tbAddInv').DataTable({
		"ajax":{
			//"url": "../controllers/AJAX/addProd_controller.php",
			"url": "../../controllers/AJAX/addInv_datatable.php",
			"method": 'POST', //usamos el metodo POST
			"data":{opcion:'1'}, //enviamos opcion 4 para que haga un SELECT
			"dataSrc":""
		},
		//"pageLength": 20,
		"columns":[
			{"data": "descripcion"},
			{"data": "codigo"},
			{"data": "unidades"},
			{"data": "costo"},
			{"data": "precio"},
			{"data": "marca"},
			{"data": "categoria"},
			{"data": "proveedor"},
			{"data": "fecha_ingreso"},
			{"data": "fecha_caducidad"},
			{"data": "estatus"},
			{"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
		]
	});
})