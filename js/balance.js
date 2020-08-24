$(document).ready(function(){

    fInicioBalance = $('#fInicioBalance').val();
    fFInalBalance = $('#fFInalBalance').val();

 tablaBalance(fInicioBalance,fFInalBalance);


    $('#btnBuscarBalance').click(function(e){
        fInicioBalance2 = $('#fInicioBalance').val();
        fFInalBalance2 = $('#fFInalBalance').val();
        e.preventDefault();
        console.log(fInicioBalance2);
        tablaBalance(fInicioBalance2,fFInalBalance2);
    });

});