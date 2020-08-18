
//busca el producto por codigo , lo agrega a tabla temporal y muestra la tabla cobrando

alertify.set('notifier','position', 'top-right');
alertify.set('notifier','delay', 3);

function buscarcod($cod,$unidades){

	//txtUnidades = $('#txtunidad').val();

	cadena={codigo:$cod,
		Unidades: $unidades
	}
	 $.ajax({
  		url:'/controllers/buscaCod_controller.php',
  		//url:'/controllers/restarunidadesInput.php',
  		type:'POST',
  		data:cadena,
  		success:function(resultado){

  			//se recibe array con resultados y se aplica funcion para dividirlo
  			dividirResultado=resultado.split('/');
			
				bool = dividirResultado[0];
				mensajeError = dividirResultado[1];
				inputCodigo=dividirResultado[2];
				nombreArtRead=dividirResultado[3];
				$Xunidad=dividirResultado[4];
			    unidadesInput =dividirResultado[5];
				$totalXcod=dividirResultado[6];
				unidadesTempInv = dividirResultado[7];


  		},
  		fail:function(resultado){
			//console.log('entra a fail y el resultado es: '+resultado);
  		},
  		complete: function(){
			$Xunidad=dividirResultado[4];

  			//validacion para saber si encontro resultado o no
  			if(bool == false) {
  				//mensajeError =  dividirResultado[1];
				//alert('el resultado ajax es false y el mensaje error es: '+mensajeError);
				//alert(mensajeError);

				//alertify.error(mensajeError);

				alertify.error(mensajeError);

  				//alert('el codigo ingresado no aparece en el inventario 	');
  				inputCodigo=$("#ttcodigo").val('');
				$('#txtunidad').val(1);
  			}else{


				unidadesInputint=parseInt(unidadesInput);
				totalUnidades= totalUnidades + unidadesInputint;

				$Xcod=parseInt($Xunidad) * parseInt(unidadesInput);

  				//PRECIO=$Xunidad;
  				PRECIO=$Xcod;
  				precio_int=parseInt(PRECIO);
				TOTAL=TOTAL+precio_int;

				//convertir a valor de dinero la cifra total
				const formatter = new Intl.NumberFormat('en-US', {
					style: 'currency',
					currency: 'USD',
					minimumFractionDigits: 0
				})
				var value = TOTAL;

				$("h1").text('TOTAL: '+ formatter.format(value));
				//console.log(TOTAL);

				$("#labelTotalArt").text('total de articulos: '+ totalUnidades);

				//se carga tabla con resultados.
				$('.divR').load('/controllers/tablaCobrando_controller.php');
				//console.log('esto es despues de mostrar la tablita');

 				//se resetean inputs
				$('#ttcodigo').focus();
  				$('#ttcodigo').val('');
  				$('.td1').val('');
  				$('.td2').val('');
				$('#txtunidad').val(1);

				$('#selectProdVentas').val(0);
				$('#selectProdVentas').multiselect('refresh');

  			}
  		}

  	});

}

function agregarProducto($codigo,$articulo,$provee){

	cadena={
		opcion:1,
		Codigo:$codigo,
		Art:$articulo,
		Provee:$provee,
	}

	$.ajax({
		type:'POST',
		url:'../controllers/AJAX/agregarProducto_ajax.php',
		data:cadena,
		success:function(x){
			console.log('entro a success');

			console.log(x);

			if (x!=1){
				alert('error al insertar');
			}else{
				$('.divR').load('tablaAgregarProducto.php');
				alert("insertado correctamente 1");
			}

		},
		error:function(jqXHR,estado,error){
			console.log('entro a error');
			console.log(estado);
			console.log(error);
		},
		complete:function(){

			$('.text1').val('');
			$('.text2').val('');
			$('.text3').val('');
			$('.text4').val('');
			$('.text5').val('');
			$('.text6').val('');
			$('.text1').focus();
		}
	});
}

function agregarInventario($addCodInv,$unidades,$addCostoInv,$addPrecioInv,$faddIdGasto,usaFcad){
	//alert('YEA');
	cadena={
		opcion:1,
		addCodInv:$addCodInv,
		addUnidInv:$unidades,
		addCostoInv:$addCostoInv,
		addPrecioInv:$addPrecioInv,
		//addFcad:$addFcad,
		faddIdGasto:$faddIdGasto,
		usaFcad : usaFcad
	}

	//console.log($addFcad);

	$.ajax({
		type:'POST',
		url:'../controllers/AJAX/agregarInventario_ajax.php',
		data:cadena,
		success:function(respuesta){
			console.log('entro a success');
			//console.log(respuesta);

			dividirRespuesta=respuesta.split('/');
			bool =dividirRespuesta[0];
			mensaje = dividirRespuesta[1];

			//alert('bool: '+bool+ '; ' + 'mensaje: '+mensaje)

			if (bool){
				alert('true' + mensaje);

			}else{
				alert('false'+ mensaje);
			}

		},
		error:function(jqXHR,estado,error){
			console.log('entro a error');
			console.log(estado);
			console.log(error);
		},
		complete:function(){
		}
	});
}

function agregarProv($cadena){

	//alert ($cadena);


	$.ajax({
		type:'GET',
		data:$cadena,
		url:'../controllers/AJAX/agregarProveedor_ajax.php',
		beforesend:function(){
		},
		success: function(r){
			console.log(r);

			if (r !=1){
				alertify.error('hubo un error y el proveedor no pudo ser guardado');

			}else{
				alertify.success('el proveedor se guardo con exito');
			}


		},
		error:function(r,rr,rrr){
			console.log(r);
			console.log(rr);
			console.log(rrr);
		},
		complete:function(){

		}
	});



}

function agregarCLiente($valores){

	//alert ('llega a funcion agergar cliente');
	$.ajax({
		type:'GET',
		data:$valores,
		url:'../controllers/AJAX/agregarCliente_ajax.php',
		beforesend:function(){
		},
		success: function(r){
			console.log(r);

			if (r !=1){
				alert('hubo un error y el cliente no pudo ser guardado');
			}else{
				alert('el cliente se guardo con exito');
				$('#formcliente')[0].reset();
				//$("#idformulario")[0].reset();

			}


		},
		error:function(r,rr,rrr){
			console.log(r);
			console.log(rr);
			console.log(rrr);
		},
		complete:function(){

		}
	});

}


//hace los calculos de la ventana cobrar
function datosModalcobrar(){
	$("#myModal").modal("show");
	$('#divInputsCredito').hide();
	$('#inputsVentaContado').hide();
	$('#btnModalCObrar').hide();

	$('h6').text('TOTAL: '+'$'+TOTAL);

	// $('input:radio[id=radioTipoVenta]:checked');
	$('input:radio[name=radioTipoVenta]').click(function(){
		radioTVenta = $('input:radio[name=radioTipoVenta]:checked').val();
		if(radioTVenta ==0){
			if($('#selectClienteVentas').val() == null){
				alertify.error('debe seleccionar un cliente');
				$('#radioTipoVenta').prop('checked', false);
			}else{
				$('#divInputsCredito').show();
				$('#inputsVentaContado').hide();
				valorcambio =0;
				vcambio =0;
			}

		}else{

			$('#inputsVentaContado').show();
			$('#divInputsCredito').hide();
		}
	});



} 

//forma el archivo de texto con los datos de las ventas
function cobrar(){
	//$("#formCobrarContado").valid();

	radioTVenta = $('input:radio[name=radioTipoVenta]:checked').val();
	$('#txtcambio').focus();
	nv=$('#nocli').text();
	//idCliente =$('#tcliente').val();
	idCliente =$('#selectClienteVentas').val();
	pagoInicial=$('#txtAbonoInicial').val();
	interesVenta=$('#interesVenta').val();
 	fVencVenta = $('#fVencVenta').val();



	datos={
		TOTAL:TOTAL,
		totalUnidades:totalUnidades,
		cobro:valorcambio,
		cambiot:vcambio,
		numcli:idCliente,
		tipoVenta:radioTVenta
	}

	$.ajax({
		//url:'f5.php',
		url:'../controllers/procesarVenta_controller.php',
		type:'POST',
		data:datos,
		success:function(x){

			if(radioTVenta == 0){

				cadenaValores = 'opcion=1&pagoInicial='+pagoInicial+'&estatusCredito=1&montoPrestamo='+TOTAL+'&selectCliente='+idCliente+'&interes='+interesVenta+'&fechaVenc='+fVencVenta+'&totalUnidades='+totalUnidades;
				agregarCredito(cadenaValores);
			}
			$("#myModal").modal("hide");
			alertify.success('la venta fue correcta')
			$("#formModalCobrar").each(function() { this.selectedIndex = 0 });

		},
		error:function(primer,segundo,tercer){
			console.log('primer');
			console.log('segundo');
			console.log('tercer');
		},
		complete:function(){

			//vaciar valores de ventana cambio
			$('#txtcambio').val('');
			$('h5').text('');
			$('#txtAbonoInicial').val('');
			$('#interesVenta').val('');
			$('#fVencVenta').val('');
			$('#selectClienteVentas').val(0);
			$('#selectClienteVentas').multiselect('refresh');
			$('input:radio[name=radioTipoVenta]').prop('checked', false);

			cancelarCobrando();
		}
	})
}

//borra datos de la tabla temporal y de la tabla cobrando
function cancelarCobrando(){

	$.ajax({
		url:'/controllers/AJAX/eliminarCobrar.php',
		type:'POST',
		success:function(x){
		},
		error:function(error1,error2,error3){
			console.log(error1);
			console.log(error2);
			console.log(error3);
		},
		complete: function(){
			
			$('#ttcodigo').focus();

			totalUnidades =0;
			$("#labelTotalArt").text('');

			//$('.divR').load('tablaCobrando.php');
			$('.divR').empty();
			$('H1').empty();
			TOTAL=0;

			//vaciar valores de campos de texto de desc de punto vent
			$("#codRead").val('');
			$('#nombreArtRead').val('');
			$("#precioRead").val('');

			nv=$('#nocli').empty();
			//$('#tcliente').attr('hidden','false');
			//$('#tcliente').val(0);
			//$('#selectClienteVentas').html('<option>- sin Cliente -</option>');
			$('#selectClienteVentas').val(0);
			$('#selectProdVentas').val(0);

			$('#selectProdVentas').multiselect('refresh');

			//$('input:radio[name=radioTipoVenta]').attr('checked',false);

		}
	});
}

function mostrarTablaAlertaInv(){
	//console.log('SE EJECUTA FUNCION MOSRAR TABLA ALERT DIV');
	$('#divTabAlertInv').hide();
	$peticionAjax =$.ajax({
		url: '../controllers/AJAX/addInv_datatable.php',
		type: "POST",
		data: {opcion: 2},
		success: function (datos){
			console.log('datos'+datos);
			if(datos!=0){
				var tablaAlertInv = $('#tbAlertaInv').DataTable({
					"ajax":{
						//"url": "../controllers/AJAX/addProd_controller.php",
						"url": "../controllers/AJAX/addInv_datatable.php",
						"method": 'POST', //usamos el metodo POST
						"data":{opcion:'2'}, //enviamos opcion 4 para que haga un SELECT
						"dataSrc":""
					},
					"searching": false,
					"bPaginate": false,
					"bLengthChange": false,
					"bInfo": false,
					"columns":[
						{"data": "descripcion"},
						{"data": "codigo"},
						{"data": "unidades"},
						{"data": "costo"},
						{"data": "precio"},
						{"data": "proveedor"},
						{"data": "fecha_ingreso"},
						{"data": "fecha_caducidad"},
						{"data": "estatus"},
						{"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
					],
					"language": {
						"emptyTable": "no se encontraron datos"
					},
					"destroy": true
				});
				tablaAlertInv.ajax.reload(null, false);
				$('#divTabAlertInv').show();
				$('hr').show();
			}else{
				$('#divTabAlertInv').hide();
				tablaAlertInv.ajax.reload(null, false);
				$('#linea').hide();
			}
		},
		fail: function (error) {
			alert('error: '+error);
		}
	});
};

function mostrarTablaAlertaProducto(){
	//console.log('SE EJECUTA FUNCION MOSRAR TABLA ALERTA PRODUCTO');
	$('#divTabAlertProducto').hide();
	$peticionAjax =$.ajax({
		url: '../controllers/AJAX/addProd_datatable.php',
		type: "POST",
		data: {opcion: 2},
		success: function (datos){
			if(datos!=0){
				var tablaAlertProducto = $('#tbAlertaProducto').DataTable({
					"ajax":{
						//"url": "../controllers/AJAX/addProd_controller.php",
						"url": "../controllers/AJAX/addProd_datatable.php",
						"method": 'POST', //usamos el metodo POST
						"data":{opcion:'2'}, //enviamos opcion 4 para que haga un SELECT
						"dataSrc":""
					},
					"searching": false,
					"bPaginate": false,
					"bLengthChange": false,
					"bInfo": false,
					"columns":[
						{"data": "descripcion"},
						{"data": "codigo"},
						{"data": "costo"},
						{"data": "precio"},
						{"data": "proveedor"},
						{"data": "fecha_caducidad"},
						{"data": "unidades"},
						{"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
					],
					"language": {
						"emptyTable": "no se encontraron datos"
					},
					"destroy": true
				});
				tablaAlertProducto.ajax.reload(null, false);
				$('#divTabAlertProducto').show();
				$('hr').show();
			}else{
				$('#divTabAlertProducto').hide();
				tablaAlertProducto.ajax.reload(null, false);
				$('#linea').hide();
			}
		},
		fail: function (error) {
			alert('error: '+error);
		}
	});
};

function agregarGasto($valores){
	//alert ($valores);
	$.ajax({
		type:'GET',
		data:$valores,
		url:'../controllers/AJAX/agregarGasto_ajax.php',
		beforesend:function(){
		},
		success: function(r){
			//console.log(r);

			if (r !=1){
				alert('hubo un error y la compra no pudo ser guardada');
			}else{
				alert('la compra ha sido guardada con exito');
				$('#idNotaCompra').val('');
				$('#totalCompra').val('');
				$('#selectProvGasto').val(0);
				$('#selectProvGasto').multiselect('refresh');
			}


		},
		error:function(r,rr,rrr){
			console.log(r);
			console.log(rr);
			console.log(rrr);
		},
		complete:function(){

		}
	});


}

function agregarCredito($valores){
	//alert ('llega a funcion agergar credito');
	$.ajax({
		type:'GET',
		data:$valores,
		url:'../controllers/AJAX/agregarCredito_ajax.php',
		beforesend:function(){
		},
		success: function(r){
			console.log(r);

			if (r !=1){
				alert('hubo un error y el credito no pudo ser guardado');
			}else{
				alert('el credito ha sido registrado con exito');
			}
		},
		error:function(r,rr,rrr){
			console.log(r);
			console.log(rr);
			console.log(rrr);
		},
		complete:function(){

		}
	});

}

function agregarAbono(valores){
	//alert ('llega a funcion agergar Abono');
	$.ajax({
		type:'GET',
		data:valores,
		url:'../controllers/AJAX/agregarAbono_ajax.php',
		beforesend:function(){
		},
		success: function(r){
			console.log(r);

			if (r !=1){
				alert('hubo un error y el abono no pudo ser guardado');
			}else{
				alert('el abono ha sido registrado con exito');
				$('#cantidadAbonada').val('');
				$('#idCreditoAbono').val('');
				$('#selectCliente').val(0);
				$('#selectCliente').multiselect('refresh');
			}
		},
		error:function(r,rr,rrr){
			console.log(r);
			console.log(rr);
			console.log(rrr);
		},
		complete:function(){

		}
	});

}





