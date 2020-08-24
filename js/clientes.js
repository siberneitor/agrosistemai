

$(document).ready(function() {



	$('#btnaddclient').click(function () {
		//alert ('presinaste el boton addcleinte');


		$('#formcliente').validate
		({
			rules: {
				nombreCliente: { required: true,
					minlength:2
				},
				ap_pat: { required: true,
					minlength:2
				},
				ap_mat: { required: true,
					minlength:2
				},
				domicilio_Clien: { required: true,
					minlength:10
				},
				localidad_Clie: { required: true,
					minlength:5
				},
				telefono_Clien: { required: true,
					number: true,
					minlength:10
				},
				email_Clien: { email: true,
					minlength:5
				},

			},
			messages: {
				nombreCliente: {
					required: "el nombre es obigatorio",
					min: "el minimo son 2 caracteres",
				},
				ap_pat: {
					required: "el apellido paterno es obligatorio",
					min: "el minimo son 2 caracteres"

				},
				ap_mat: {
					required: "el apellido materno es obligatorio",
					min: "el minimo son 2 caracteres"

				},
				domicilio_Clien: {
					required: "el domicilio materno es obligatorio",
					min: "el minimo son 10 caracteres"

				},
				localidad_Clie: {
					required: "la localidad es obligatoria",
					min: "el minimo son 5 caracteres"

				},
				telefono_Clien: {
					required: "el telefono es obligatorio",
					min: "el minimo son 10 caracteres"

				},
				email_Clien: {
					email: "el formato de correo es incorrecto",


				},
			},
			submitHandler: function (form) {

				var dataStringCliente = $('#formcliente').serialize();
				//alert('Datos serializados: ' + dataString);
				agregarCLiente(dataStringCliente);
			}

		});

		//e.preventDefault();
		//alert('algo');

		//console.log(dataStringCliente);
	});


	$(document).on("click", ".btnEditar", function(){
		//alert('presionate el boton editar cliente');



		opcion = 2;//editar
		fila = $(this).closest("tr");
		id_cliente = parseInt(fila.find('td:eq(3)').text()); //capturo el ID
		NombreCli = fila.find('td:eq(2)').text(); //capturo el ID
		ap_pat_cli = fila.find('td:eq(0)').text();
		ap_mat_cli = fila.find('td:eq(1)').text();
		domicilio_cli = fila.find('td:eq(4)').text();
		localid_cli = fila.find('td:eq(5)').text();
		telef_cli = fila.find('td:eq(6)').text();
		email_cli = fila.find('td:eq(7)').text();
		cred_act_cli = fila.find('td:eq(9)').text();
		estatus_cred_cli = fila.find('td:eq(10)').text();
		$("#id_cliente").val(id_cliente);
		$("#NombreCli").val(NombreCli);
		$("#ap_pat_cli").val(ap_pat_cli);
		$("#ap_mat_cli").val(ap_mat_cli);
		$("#domicilio_cli").val(domicilio_cli);
		$("#localid_cli").val(localid_cli);
		$("#telef_cli").val(telef_cli);
		$("#email_cli").val(email_cli);
		$("#cred_act_cli").val(cred_act_cli);
		$("#estatus_cred_cli").val(estatus_cred_cli);
		$(".modal-header").css("background-color", "#007bff");
		$(".modal-header").css("color", "white" );
		$(".modal-title").text("Editar cliente");
		$('#modalAddClient').modal('show');


	});


	$('#formClient').submit(function(e){
		//alert('PRESIONAESTE EL BOTON GUARDAR');

		e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
		id_cliente = $.trim($('#id_cliente').val());
		NombreCli = $.trim($('#NombreCli').val());
		ap_pat_cli = $.trim($('#ap_pat_cli').val());
		ap_mat_cli = $.trim($('#ap_mat_cli').val());
		domicilio_cli = $.trim($('#domicilio_cli').val());
		localid_cli = $.trim($('#localid_cli').val());
		telef_cli = $.trim($('#telef_cli').val());
		email_cli = $.trim($('#email_cli').val());
		cred_act_cli = $.trim($('#cred_act_cli').val());
		estatus_cred_cli = $.trim($('#estatus_cred_cli').val());
		$.ajax({
			url:'../../controllers/AJAX/agregarCliente_ajax.php',
			type: "GET",
			datatype:"json",
			data:  {id_cliente:id_cliente, NombreCli:NombreCli, ap_pat_cli:ap_pat_cli, ap_mat_cli:ap_mat_cli, domicilio_cli:domicilio_cli, localid_cli:localid_cli ,telef_cli:telef_cli,email_cli:email_cli,cred_act_cli:cred_act_cli,estatus_cred_cli:estatus_cred_cli, opcion:opcion},
			success: function(data) {
				tablaClientes.ajax.reload(null, false);
			}
		});
		$('#modalAddClient').modal('hide');

	});

	$(document).on("click", ".btnBorrar", function(){
		fila = $(this);
		cliente_id = parseInt($(this).closest('tr').find('td:eq(3)').text()) ;
		opcion = 3; //eliminar
		var respuesta = confirm("¿Está seguro de borrar el registro "+cliente_id+"?");
		if (respuesta) {
			$.ajax({
				url:'../../controllers/AJAX/agregarCliente_ajax.php',
				type: "GET",
				datatype:"json",
				data:  {opcion:opcion, cliente_id:cliente_id},
				success: function() {
					tablaClientes.row(fila.parents('tr')).remove().draw();
				}
			});
		}
	});

	tablaClientes = $('#tbClientes').DataTable({
		"ajax":{
			"url": "../../controllers/AJAX/tbCliente_datatable.php",
			"method": 'POST', //usamos el metodo POST
			//"data":{opcion:'4'}, //enviamos opcion 4 para que haga un SELECT
			"dataSrc":""
		},
		"columns":[
			{"data": "apellido_paterno"},
			{"data": "apellido_materno"},
			{"data": "nombre"},
			{"data": "id_cliente"},
			{"data": "domicilio"},
			{"data": "localidad"},
			{"data": "telefono"},
			{"data": "email"},
			{"data": "fecha_alta"},
			{"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
		]
	});



})