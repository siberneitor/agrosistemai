
//busca el producto por codigo , lo agrega a tabla temporal y muestra la tabla cobrando
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
  			console.log('entra a success y el resultado es: '+ resultado);

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


			console.log('unidadesTempInv: '+unidadesTempInv);

  		},
  		fail:function(resultado){
			console.log('entra a fail y el resultado es: '+resultado);
  		},
  		complete: function(){
			$Xunidad=dividirResultado[4];

  			//validacion para saber si encontro resultado o no
  			if(bool == false) {
  				//mensajeError =  dividirResultado[1];
				alert('el resultado ajax es false y el mensaje error es: '+mensajeError);

  				//alert('el codigo ingresado no aparece en el inventario 	');
  				inputCodigo=$("#ttcodigo").val('');
				$('#txtunidad').val(1);
  			}else{

  				//se asignan valores a inputs de solo lectura
	  			$("#codRead").val(inputCodigo);
	  			$("#nombreArtRead").val(nombreArtRead);
	  			$("#precioRead").val($Xunidad);

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
  			}
  		}

  	});

}

//funcion que agrega producto
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
				alert('hubo un error y el proveedor no pudo ser guardado');
			}else{
				alert('el proveedor se guardo con exito');
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

function buscarcliente(idc){
	dato={idclient:idc
	}

	$.ajax({
		type:'POST',
		data:dato,
		url:'buscarcliente.php',
		beforesend:function(){
		},
		success: function(r){
			console.log(r);
			if (r<1 || r==""){
	 			alert('el numero de cliente es invalido');
	 		}else{
				labelno = $('#nocli').text(r);
				$('#tcliente').attr('hidden','true');
							 	
	 		}
		},
		error:function(r,rr,rrr){
			console.log(r);
			console.log(rr);
			console.log(rrr);
		},
		complete:function(){
			 
			nv=$('#nocli').text();
			alert('cliente '+nv+' encontrado');
		}
	});
}

//hace los calculos de la ventana cobrar
function ventanacobrar(){
	$('h6').text('TOTAL: '+'$'+TOTAL);
	
	$('#txtcambio').change(function(){
		valorcambio=$('#txtcambio').val();
		vcambio=valorcambio-TOTAL;
		$('h5').text('cambio: '+'$'+vcambio);
	});
} 

//forma el archivo de texto con los datos de las ventas
function cobrar(){
	$('#txtcambio').focus();
	nv=$('#nocli').text();
	idCliente =$('#tcliente').val();

	enviar={
		TOTAL:TOTAL,
		totalUnidades:totalUnidades,
		cobro:valorcambio,
		cambiot:vcambio,
		numcli:idCliente
	}
	console.log('no cliente: '+idCliente);
	$.ajax({
		//url:'f5.php',
		url:'../controllers/procesarVenta_controller.php',
		type:'POST',
		data:enviar,
		success:function(x){
			if(x==1){
				alert('borrado correctamente');
			}
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

			cancelarCobrando();
		}
	})
}

//borra datos de la tabla temporal y de la tabla cobrando
function cancelarCobrando(){
	//alert ('si se ejecuta funcion cancelar cobrando ');
	
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

		}
	});
}

function mostrarTablaAlertaInv(){
	console.log('SE EJECUTA FUNCION MOSRAR TABLA ALERT DIV');
	$('#divTabAlertInv').hide();
	$peticionAjax =$.ajax({
		url: '../controllers/AJAX/addInv_datatable.php',
		type: "POST",
		data: {opcion: 2},
		success: function (datos){
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