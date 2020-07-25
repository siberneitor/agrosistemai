
$(document).ready(function(){
    //resetea tabla temporal con articulos agregados previamente
    cancelarCobrando();




    //asigna el nombre de la pestaña a la barrita de titulos negra
    var titulo = $(this).attr("title");
    var tituloNegro = $('#titulos').text(titulo);







    n=0;
    n2=0;
    num1=1;
    TOTAL=0;
    totalUnidades =0;

    //evento a realizar al presionar "enter" en el campo de ingreso de codigo
    //
    $('#tcliente').keypress(function(E){


        if(E.which == 13) {


            txtcl=$('#tcliente').val();
            buscarcliente(txtcl);

        }
    });

    //$('#ttcodigo').keydown(function(e) {
    $('#ttcodigo,#txtunidad').keydown(function(e) {

        if(e.which == 120) {
            //ventanacobrar();
            //alert('estas presionando la tecla');
            $('#btncobrar').click();
            $('#txtcambio').focus();

        }


        if(e.which == 13) {
            uno=$('#ttcodigo').val();
            dos=$('.text2').val();
            tres=$('.text3').val();
            precio_int=parseInt(dos);


           validarCodigo= validarInputNum($('#ttcodigo').val())
            let respuesta = validarCodigo[0];
            let mensaje = validarCodigo[1];
            //console.log(primero);
            //console.log(segundo);

            if(respuesta){
                buscarcod(uno);
            }else{
                alert(mensaje);
                $('#ttcodigo').val('');
                $('#txtunidad').val(1);
            }
        }
    });


    $('#btnadd').click(function(){
    })


    $('#btncobrar').click(function(){
        ventanacobrar();
    })



    $('#btnborrar').click(function(){
        cancelarCobrando();
    });
    $('#btnbdin').click(function(){
        $('#buscador').load('componentes/buscador.php');
    });
})

