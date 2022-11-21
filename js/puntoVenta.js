$(document).ready(function(){

    // se resetea la tabla temporal para eliminar alguna venta incompleta
    cancelarCobrando();

    //variables de costos y cantidades para cobrar
    n=0;
    n2=0;
    num1=1;
    TOTAL=0;
    totalUnidades =0;

    //variables de inputs
    inputCodigo = $('#ttcodigo').val();
    inputUnidades = $('#txtunidad').val();
    dos=$('.text2').val();
    tres=$('.text3').val();
    precio_int=parseInt(dos);


    //valor de multiselect
    $( '#selectClienteVentas,#selectProdVentas').multiselect({

        numberDisplayed: 1,
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        includeSelectAllOption: true,
        selectAllJustVisible: false,
        maxHeight: 600,
        buttonContainer: '<div class="btn-group multiselect-container-" />',
        nonSelectedText: 'sin Cliente',
        filterPlaceholder: 'Buscar',
        selectAllText: 'TODOS'

    });

    //se ejecuta funcion buscar codigo al escojer un producto en el select
    $('#selectProdVentas').change(function(){
        //alert ('aqui cambia');
        $('#ttcodigo').val($('#selectProdVentas').val());
        $('#btnadd').click();
        // $('#ttcodigo').focus();
    });


    // $('#tcliente').click(function(){
    //     $('#tcliente').val('');
    // });


    $('#btnCancelMvent').click(function(){
        //alert('presionas');
        $("#formModalCobrar")[0].reset();
    });

    $('#txtunidad').click(function(){
        $('#txtunidad').val('');

    });


    //ejecuta funcion para asignar datos a modar cobrar
    $('#btncobrar').click(function(e){
       if (TOTAL) {
           datosModalcobrar();
       }else{
        alertify.error('debe agregar algun articulo a la lista de ventas');
                e.preventDefault()
           }
    });

    //ejecuta funcion al presionar boton añadir
    $('#btnadd').click(function(){
        //event.preventDefault();
        $('#addCodListado').validate({
            rules: {
                ttcodigo: {
                    required: true,
                    number: true
                },
                txtunidad: {
                    required: true,
                    number: true
                },
            },
            messages: {
                ttcodigo: {
                    required: "no ha agregado ningun codigo",
                    number: "el codigo solo debe contener numeros"
                },
                txtunidad: {
                    required: "ingrese las unidades"
                }
            },
            submitHandler: function (form) {
                 buscarcod(inputCodigo,inputUnidades);
            }
        });
        inputCodigo = $('#ttcodigo').val();
        inputUnidades = $('#txtunidad').val();
        valorSelectProd = $('#selectProdVentas').val();

    });


    $('#btnborrar').click(function(e){
        alertify.confirm("seguro que desea cancelar la venta en curso ?",
            function(){
                cancelarCobrando();
                alertify.success('venta cancelada');
            },function(){
            });
       e.preventDefault();
    });

    $('#txtcambio').keydown(function(){
        // $("#formModalCobrar").on('submit', function(evt){
        //     evt.preventDefault();
        //     // tu codigo aqui
        // });

    });
    $('#txtAbonoInicial').click(function(){
        $('#txtAbonoInicial').val('');
    });

    $('#txtcambio').change(function(){
        $('#txtcambio').validate();
       // alert('ejecuta evento change');
        if($('#txtcambio').val()<TOTAL){
            alertify.error('el pago debe ser igual o mayor al total');
        }else{
            valorcambio=$('#txtcambio').val();
            vcambio=valorcambio-TOTAL;
            $('h5').text('cambio: '+'$'+vcambio);
            // $("#formModalCobrar").on('submit', function(evt){
            //     evt.preventDefault();
            //     // tu codigo aqui
            // });
            $('#btnModalCObrar').show();
        }
    });

    $('#fVencVenta').change(function(){
        fechaJS =new Date($.now());
        fechaInput = $('#fVencVenta').val();
        fechaInputCobrar =new Date(fechaInput + ' '+'00:'+'00:'+'00');
            if(fechaInputCobrar<fechaJS){
            alertify.error('la fecha debe ser mayor a hoy');
        }
            // else{
            // $("#formModalCobrar").on('submit', function(evt){
            //     evt.preventDefault();
            //     // tu codigo aqui
            // });
        // }
    });

$('#selectClienteVentas').change(function(){
    $('#btnModalCObrar').show();
});

    $('#btnModalCObrar').click(function(){
       cobrar();
    });
    //termina validacion
    $(this).keydown(function(e) {
        //CONDICION AL PRESIONAR F8 (ejecuta funcioon cancelar cobrando)
        if(e.which == 119) {
            $('#btnborrar').click();
             e.preventDefault();
        }
        //CONDICION AL PRESIONAR F9 (ejecuta ventana cobrar)
        if(e.which == 120) {
            $('#ttcodigo').blur();
            document.getElementById('ttcodigo');
            //alert('presioante tecla f9 y se ejecuta funcion cobrar');
           $('#btncobrar').click();
           $('#txtcambio').focus();
        }
        if(e.which == 115) {
            //alert('presioante tecla f9 y se ejecuta funcion cobrar');
            $('#btnErase').click();
        }
    });

    $(document).on("click", ".btnQuitar", function(){
        fila = $(this).closest("tr");
        idProducto = parseInt(fila.find('td:eq(0)').text()); //capturo el ID
        precioArt  = parseInt(fila.find('td:eq(2)').text()); //capturo el ID
        unidadesAct = parseInt(fila.find('td:eq(3)').text()); //capturo el ID
        // console.log(idProducto);
        $("#unidadesActuales").val(unidadesAct);
        $('#modalQuitar').modal('show');

        // $('#btnModalQuitar').click(function(){


    });
    $(document).on("click", "#btnModalQuitar", function(){

        unidadesAquitar = $('#quitarUnidades').val();
        nuevasUnidadesActuales = unidadesAct - unidadesAquitar;
        cadena={idProducto:idProducto,
            unidadesAquitar: unidadesAquitar
        }
        $.ajax({
            url:'../../controllers/buscaCod_controller.php',
            type:'POST',
            data:cadena,
            success:function(resultado){

                $('#modalQuitar').modal('hide');
                alertify.success("unidades disminuidas correctamente");
//mostrar las nuevas unidades disponibles
                $("#labelTotalArt").empty();
                unidadesInputHidden = $('#totalArt').val();

                // newTotalArt = totalUnidades - unidadesAquitar;
                newTotalArt = parseInt(unidadesInputHidden) - unidadesAquitar;
                $('#totalArt').val(newTotalArt);
                $("#labelTotalArt").text('total de articulos: '+ newTotalArt);

                //mostrar el nuevo total
                $("h1").empty();
                totalInputHidden = $('#cantTotal').val();

                unidXprecio = unidadesAquitar * precioArt;
                // newCantTotal = TOTAL - unidXprecio;
                newCantTotal = parseFloat(totalInputHidden) - unidXprecio;

                $('#cantTotal').val(newCantTotal);
                const formatter = new Intl.NumberFormat('es-MX', {
                    style: 'currency',
                    currency: 'MXN',
                    minimumFractionDigits: 0
                })

                $("h1").text('TOTAL: '+ formatter.format(newCantTotal));



                // $("h1").text('TOTAL: '+ formatter.format(value));

            },
            fail:function(resultado){
                //console.log('entra a fail y el resultado es: '+resultado);
            },
            complete: function(){
                //convertir a valor de dinero la cifra total
                // const formatter = new Intl.NumberFormat('es-MX', {
                // 	style: 'currency',
                // 	currency: 'MXN',
                // 	minimumFractionDigits: 0
                // })

                //console.log(TOTAL);


                //se carga tabla con resultados.
                cargarTabla =$('.divR').load('../../controllers/tablaCobrando_controller.php');
                //console.log('esto es despues de mostrar la tablita');
                $('#quitarUnidades').val('');
            }

        });
        //temrina peticion ajax

    });
});

