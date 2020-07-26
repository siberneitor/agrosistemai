//busca el producto por codigo , lo agrega a tabla temporal y muestra la tabla cobrando

function buscarcod($cod){


	txtUnidades = $('#txtunidad').val();

	cadena={codigo:$cod,
		Unidades: txtUnidades

	}
	
	 $.ajax({
  		//url:'f3.php',
  		//url:'procesaBuscaCod.php',
  		url:'/controllers/buscaCod_controller.php',
  		type:'POST',
  		data:cadena,
  		success:function(xx){
  			dividir=xx.split('/');
  		},
  		error:function(e,ee,eee){
  			console.log(e);
  			console.log(ee);
  			console.log(eee);
  		},
  		complete: function(){

  			if(dividir==""){
  				alert('el codigo ingresado no existe');
  				UNO=$("#ttcodigo").val('');
  			}else{
  							
	  			UNO=$(".td3").val(dividir[0]);
	  			dos=$(".td4").val(dividir[1]);
	  			tres=$(".td5").val(dividir[2]);
				unidadesBD=dividir[3];
				$Xunidades=dividir[4];

	  			//console.log('uno: '+UNO);console.log('dos: '+dos);console.log('tres: '+tres);
				unidadesBDint=parseInt(unidadesBD);
				totalUnidades= totalUnidades + unidadesBDint;

  				//PRECIO=dividir[2];
  				PRECIO=$Xunidades;
  				precio_int=parseInt(PRECIO);
				TOTAL=TOTAL+precio_int;

				//convertir a valor de dinero la cifra total
				const formatter = new Intl.NumberFormat('en-US', {
					style: 'currency',
					currency: 'USD',
					minimumFractionDigits: 0
				})
				var value = TOTAL

				$("h1").text('TOTAL: '+ formatter.format(value));
				console.log(TOTAL);

				$("#labelTotalArt").text('total de articulos: '+ totalUnidades);

				//$('#precioTotal').text('');


  				$('.divR').load('/controllers/tablaCobrando_controller.php');

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
function agregarProducto($codigo,$articulo,$costo,$precio,$provee,$fcad){

	cadena={
		opcion:1,
		Codigo:$codigo,
		Art:$articulo,
		Costo:$costo,
		Precio:$precio,
		Provee:$provee,
		Fcad:$fcad
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

function agregarInventario($addCodInv,$unidades,$addCostoInv,$addPrecioInv,$addFcad,$faddIdGasto){
	//alert('YEA');

	cadena={
		opcion:1,
		addCodInv:$addCodInv,
		addUnidInv:$unidades,
		addCostoInv:$addCostoInv,
		addPrecioInv:$addPrecioInv,
		addFcad:$addFcad,
		faddIdGasto:$faddIdGasto
	}

	//console.log($addFcad);

	$.ajax({
		type:'POST',
		url:'../controllers/AJAX/agregarInventario_ajax.php',
		data:cadena,
		success:function(x){
			console.log('entro a success');

			console.log(x);

			if (x!=1){
				alert('error al insertar');
			}else{
				//$('.divR').load('tablaAgregarProducto.php');
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

	enviar={
		cobro:valorcambio,
		cambiot:vcambio,
		numcli:nv
	}
	
	$.ajax({
		url:'f5.php',
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
/*
function buscadordinamico(){
	$(document).load('componentes/buscador.php');
	('#buscadorvivo').select2();

			$('#buscadorvivo').change(function(){
				$.ajax({
					type:"post",
					data:'valor=' + $('#buscadorvivo').val(),
					url:'php/crearsession.php',
					success:function(r){
						$('#tabla').load('componentes/tabla.php');
						alert ('has seleccionado'+r);
					}
				});
			});
}

*/
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
			$(".td3").val('');
			$('.td4').val('');
			$(".td5").val('');

			nv=$('#nocli').empty();
			//$('#tcliente').attr('hidden','false');

		}
	});
}