
$(document).ready(function() {
    $('#formLogin').submit(function(e){
        e.preventDefault();
        //alert('jacob');

        user = $('#inputUser').val();
        password = $('#inputPassword').val();


        $.ajax({
            url:'/controllers/AJAX/procesaLogin.php',
            type: "POST",
            datatype:"json",
            data:  {user:user, password:password},
            success: function(data) {
                console.log(data);
                       if (data==1){
                          // alert('existe');
                           window.location.href = "/views/menus/puntoVenta.php";
                       }else{
                          // alert('no existe');
                           alertify.error('usuario o password incorrectos');
                           $('#formLogin')[0].reset();
                           $('#inputUser').focus();
                       }
            },error :function(x){
                console.log(x);
            },
        });


     });
});
