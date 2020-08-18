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
        $('#ttcodigo').focus();
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



        //alert('cosita');

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
        }else{
            // $("#formModalCobrar").on('submit', function(evt){
            //     evt.preventDefault();
            //     // tu codigo aqui
            // });
            $('#btnModalCObrar').show();

        }

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
            //alert('presioante tecla f9 y se ejecuta funcion cobrar');
           $('#btncobrar').click();
           $('#txtcambio').focus();

        }

    });

});