//busca el producto por codigo , lo agrega a tabla temporal y muestra la tabla cobrando
alertify.set('notifier','position', 'top-right');
alertify.set('notifier','delay', 3);

function buscarcod($cod,$unidades){
	cadena={codigo:$cod,
		Unidades: $unidades
	}
	$.ajax({
		url:'../../controllers/buscaCod_controller.php',
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

				alertify.error(mensajeError);

				inputCodigo=$("#ttcodigo").val('');
				$('#txtunidad').val(1);
			}else{
				//calcula unidades
				unidadesInputint=parseInt(unidadesInput);
				// totalUnidades= totalUnidades + unidadesInputint;
				totalUnidInputHidden = $('#totalArt').val();
				if(totalUnidInputHidden ==''){
					totalUnidInputHidden = 0;
				}
				totalUnidades= parseInt(totalUnidInputHidden) + unidadesInputint;
				$('#totalArt').val(totalUnidades);
				$("#labelTotalArt").text('total de articulos: '+ totalUnidades);

				//calcula total de cuenta
				totalCuentaHidden = $('#cantTotal').val();
				if(totalCuentaHidden ==''){
					totalCuentaHidden = 0;
				}

				$Xcod=parseInt($Xunidad) * parseInt(unidadesInput);
				PRECIO=$Xcod;
				precio_int=parseFloat(PRECIO);
				// cantTotal = $('#cantTotal').val();
				console.log('totalCuentaHidden');
				console.log(totalCuentaHidden);
				console.log('precio_int');
				console.log(precio_int);

				TOTAL= parseFloat(totalCuentaHidden) + parseFloat(precio_int);
				// TOTAL=TOTAL+precio_int;

				//convertir a valor de dinero la cifra total

				var value = TOTAL;
				const formatter = new Intl.NumberFormat('es-MX', {
					style: 'currency',
					currency: 'MXN',
					minimumFractionDigits: 0
				})
				$('#cantTotal').val(TOTAL);
				$("h1").text('TOTAL: '+ formatter.format(value));
				//console.log(TOTAL);


				//se carga tabla con resultados.
				cargarTabla =$('.divR').load('../../controllers/tablaCobrando_controller.php');

				//se resetean inputs
				// $('#ttcodigo').focus();
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
function quitar(){
	alert('presioanste el boton quitar');
}
function agregarProducto(codigoProd,nombreProd,marcaProd,categProd,proovProd){
	cadena={
		opcion:1,
		Codigo:codigoProd,
		Art:nombreProd,
		marca:marcaProd,
		categProd:categProd,
		proovProd:proovProd,
	}
	$.ajax({
		type:'POST',
		url:'../../controllers/AJAX/agregarProducto_ajax.php',
		data:cadena,
		success:function(x){

			if (x!=1){
				alertify.error(x);
			}else{
				// $('.divR').load('tablaAgregarProducto.php');
				alertify.success("producto agregado correctamente");
				$('#addCod').val('');
				$('#addArt').val('');
				// $('#selectProv').multiselect('refresh');
				$('#selectMarca').val(0);
				$('#selectMarca').multiselect('refresh');

				$('#selectCateg').val(0);
				$('#selectCateg').multiselect('refresh');

				$('#selectProv').val(0);
				$('#selectProv').multiselect('refresh');

				// document.getElementById('selectProv').multiselect('refresh');

			}

		},
		error:function(jqXHR,estado,error){
			console.log(jqXHR);
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
		url:'/controllers/AJAX/agregarInventario_ajax.php',
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
		url:'../../controllers/AJAX/agregarProveedor_ajax.php',
		beforesend:function(){
		},
		success: function(r){
			console.log(r);

			if (r !=1){
				alertify.error('hubo un error y el proveedor no pudo ser guardado');

			}else{
				alertify.success('el proveedor se guardo con exito');
				$('#formProv')[0].reset();
				$('#selectProv').multiselect('refresh');
				$('#closeAddProv1,#closeAddProv2').click(function(){
					window.location.reload();
				});

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
function agregarMarca($cadena){
	$.ajax({
		type:'GET',
		data:$cadena,
		url:'../../controllers/AJAX/agregarMarca_ajax.php',
		beforesend:function(){
		},
		success: function(r){
			console.log(r);
			if (r !=1){
				alertify.error('hubo un error y la marca no pudo ser guardada');
			}else{
				alertify.success('la marca se guardo con exito');
				$('#formMarca')[0].reset();
				$('#selectMarca').multiselect('refresh');
				$('#closeModMarca1,#closeModMarca2').click(function(){
					window.location.reload();
				});
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
		url:'../../controllers/AJAX/agregarCliente_ajax.php',
		beforesend:function(){
		},
		success: function(r){
			console.log(r);

			if (r !=1){
				alertify.error('hubo un error y el cliente no pudo ser guardado');
			}else{
				alertify.success('el cliente se guardo con exito');
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
	// if($("#myModal").modal("show")){
	// 	alert('MOSTARO');
	// }else{
	// 	alert('no mostr5ado');
	// }
	// $("#myModal").click();
	// $("#myModal").focus();
	$("#ttcodigo").blur();
	document.getElementById('ttcodigo').blur();
	// var esVisible = $("#myModal").is(":visible");




	// $('#radioTipoVenta').attr('tabindex','2');

	$('#divInputsCredito').hide();
	$('#inputsVentaContado').hide();
	$('#btnModalCObrar').hide();

	$('h6').text('TOTAL: '+'$'+TOTAL);

	// $('input:radio[id=radioTipoVenta]:checked');
	$('input:radio[name=radioTipoVenta]').click(function(){
		radioTVenta = $('input:radio[name=radioTipoVenta]:checked').val();
		if(radioTVenta ==0){
			// if($('#selectClienteVentas').val() == null){
			// alertify.error('debe seleccionar un cliente');
			// $('#radioTipoVenta').prop('checked', false);
			// }else{
			$('#divInputsCredito').show();
			$('#inputsVentaContado').hide();
			valorcambio =0;
			vcambio =0;
			// }

		}else{

			$('#inputsVentaContado').show();
			$('#divInputsCredito').hide();
		}
	});
}
//forma el archivo de texto con los datos de las ventas
function cobrar(){
	garantia =0;
	//$("#formCobrarContado").valid();
	radioTVenta = $('input:radio[name=radioTipoVenta]:checked').val();
	radioTCredito = $('input:radio[name=radioTipoCredito]:checked').val();
	$('#txtcambio').focus();
	nv=$('#nocli').text();
	//idCliente =$('#tcliente').val();
	idCliente =$('#selectClienteVentas').val();
	pagoInicial=$('#txtAbonoInicial').val();
	interesVenta=$('#interesVenta').val();
	fVencVenta = $('#fVencVenta').val();
	checkGarantia = document.getElementById('garantia');

	if( checkGarantia.checked){
		garantia = 1;
	}




	datos={
		TOTAL:TOTAL,
		totalUnidades:totalUnidades,
		cobro:valorcambio,
		cambiot:vcambio,
		numcli:idCliente,
		tipoVenta:radioTVenta,
		pagoInicial:pagoInicial,
		interesVenta:interesVenta,
		fVencVenta:fVencVenta,
		radioTCredito:radioTCredito,
		garantia:garantia
	}
	console.log('radioTCredito');
	console.log(radioTCredito);
	$.ajax({
		//url:'f5.php',
		url:'../../controllers/procesarVenta_controller.php',
		type:'POST',
		data:datos,
		success:function(x){
			if(radioTVenta == 0){
				cadenaValores = 'opcion=1&pagoInicial='+pagoInicial+'&estatusCredito=1&montoPrestamo='+TOTAL+'&selectCliente='+idCliente+'&interes='+interesVenta+'&fechaVenc='+fVencVenta+'&totalUnidades='+totalUnidades+'&radioTCredito='+radioTCredito+'&garantia='+garantia;
				agregarCredito(cadenaValores);
			}
			$("#myModal").modal("hide");
			alertify.success('la venta fue correcta');
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
			// $('#interesVenta').val('');
			// $('#fVencVenta').val('');
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
		url:'../../controllers/AJAX/eliminarCobrar.php',
		type:'POST',
		success:function(x){
		},
		error:function(error1,error2,error3){
			console.log(error1);
			console.log(error2);
			console.log(error3);
		},
		complete: function(){
			$('#cantTotal').val(0);
			$('#totalArt').val(0);

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
		url: '../../controllers/AJAX/addInv_datatable.php',
		type: "POST",
		data: {opcion: 2},
		success: function (datos){
			console.log('datos'+datos);
			if(datos!=0){
				var tablaAlertInv = $('#tbAlertaInv').DataTable({
					"ajax":{
						//"url": "../controllers/AJAX/addProd_controller.php",
						"url": "../../controllers/AJAX/addInv_datatable.php",
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
				tablaAlertInv.ajax.reload(null, false);

			}else{
				$('#divTabAlertInv').hide();
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
		url: '../../controllers/AJAX/addProd_datatable.php',
		type: "POST",
		data: {opcion: 2},
		success: function (datos){
			if(datos!=0){
				var tablaAlertProducto = $('#tbAlertaProducto').DataTable({
					"ajax":{
						//"url": "../controllers/AJAX/addProd_controller.php",
						"url": "../../controllers/AJAX/addProd_datatable.php",
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
						{"data": "marca"},
						{"data": "categoria"},
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
				$('#divTabAlertProducto').show();
				$('hr').show();
				tablaAlertProducto.ajax.reload(null, false);

			}else{
				$('#divTabAlertProducto').hide();
				// tablaAlertProducto.ajax.reload(null, false);
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
		url:'../../controllers/AJAX/agregarGasto_ajax.php',
		beforesend:function(){
		},
		success: function(r){
			//console.log(r);

			if (r !=1){
				alertify.error('hubo un error y la compra no pudo ser guardada');
			}else{
				alertify.success('la compra ha sido guardada con exito');
				$('#idNotaCompra').val('');
				$('#totalCompra').val('');
				$('#selectProvGasto').val(0);
				$('#selectProvGasto').multiselect('refresh');
				tablaGastos.ajax.reload(null, false);
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
function agregarCredito(valores){
	//alert ('llega a funcion agergar credito');
	$.ajax({
		type:'GET',
		data:valores,
		url:'../../controllers/AJAX/agregarCredito_ajax.php',
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
		url:'../../controllers/AJAX/agregarAbono_ajax.php',
		success: function(r){
			console.log(r);
			if (r !=1){
				// alert('hubo un error y el abono no pudo ser guardado');
				alertify.success('hubo un error y el abono no pudo ser guardado');

			}else{
				// alert('el abono ha sido registrado con exito');
				$('#selectCliente').val(0);
				alertify.success('el abono ha sido registrado con exito');
				$('#formAbono')[0].reset();
				$('#lblescojeCred').attr('hidden',true);
				$('#divNoCred').attr('hidden',true);
				$('#inputNocred').attr('hidden',true);
				$('#divDeuda').attr('hidden',true);
				$('#inputDeuda').attr('hidden',true);
				$('#divInputAbono').attr('hidden',true);
				$('#btnaddAbono').attr('hidden',true);
				// $('#divTbCredXuser').empty();
				$('#selectClienteCred').multiselect('refresh');
				$('#tbCredXuser').attr('hidden',true);
			}
		},
		error:function(err){
			console.log(err);
		}
	});
}
function tablaCredXclient (d) {

	return '<table id ="tbCredXuser2"  class ="" style="padding-left:50px;">'+
		'<thead>'+
		'<tr>'+
		'<th>No Credito</th>'+
		'<th>Cant que Debe</th>'+
		'<th>F. Venc</th>'+
		'<th>Monto Financ.</th>'+
		'<th>Deuda Inic.</th>'+
		'<th>Interes</th>'+
		'<th>Pago Inic.</th>'+
		'<th>Monto Abonado</th>'+
		'<th>F. Inicio Cred.</th>'+
		'<th>No. Venta</th>'+
		'<th>Tipo Cred</th>'+
		'<th>Detalle Venta</th>'+
		'</tr>'+
		'</thead>'+
		'<tbody>'+
		'</tbody>'+
		'</table>';
}
function tablaBalance(fechaInicial,fechaFinal){
	TABLA =0;
	fechas = {fechaInicial:fechaInicial,
		fechaFinal:fechaFinal
	}

	$.ajax({
		url:'../../controllers/AJAX/balance_ajax.php',
		type:'GET',
		data:fechas,
		success:function(tabla){
			//console.log(tabla);
			$('#divBalance').html(tabla);


		},
		error:function(error1,error2,error3){
			console.log(error1);
			console.log(error2);
			console.log(error3);
		},
		complete: function(){

		}
	});
}





