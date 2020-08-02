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

    //funcion para buscar cliente
    $('#tcliente').keypress(function(E){
        alert('presiono id tclientes');

        if(E.which == 13) {
            alert('presiono tecla 13');
            txtcl=$('#tcliente').val();
            buscarcliente(txtcl);
        }
    });

    //ejecuta funcion cobrar al presionar boton cobrar
    $('#btncobrar').click(function(){
        ventanacobrar();
    });

    //ejecuta funcion al presionar boton añadir
    $('#btnadd').click(function(){
        inputCodigo = $('#ttcodigo').val();
        inputUnidades = $('#txtunidad').val();
        validarCodigo= validarInputNum(inputCodigo)
        let respuestaCodigo = validarCodigo[0];
        let mensajeCodigo = validarCodigo[1];
        validarUnidades= validarInputNum(inputUnidades)
        let respuestaInput = validarUnidades[0];
        let mensajeInput = validarUnidades[1];

        if(!respuestaCodigo){
           alert(mensajeCodigo);
        }
        else if(!respuestaInput){
          alert(mensajeInput);
        }else{

            buscarcod(inputCodigo,inputUnidades);
        }
    });

    $('#btnborrar').click(function(){
        cancelarCobrando();
    });

    //funcion sim usarsse para ejecutar una bisqueda dinamica
    /*
    $('#btnbdin').click(function(){
        $('#buscador').load('componentes/buscador.php');
    });
    */

    //funciones que se ejecutan al presionar teclas en input codigo o unidades
    $('#ttcodigo,#txtunidad').keydown(function(e) {

        //CONDICION AL PRESIONAR F8 (ejecuta funcioon cancelar cobrando)
        if(e.which == 119) {
            $('#btnborrar').click();
            alert('presioante tecla f8 y se ejecuta funcion cancelarcobrando');
        }

        //CONDICION AL PRESIONAR F9 (ejecuta ventana cobrar)
        if(e.which == 120) {
           $('#btncobrar').click();
           $('#txtcambio').focus();
        }

        //FUNCION AL PRESIONAR LA TECLA ENTER
        if(e.which == 13) {
            $('#btnadd').click();
        }
    });

});