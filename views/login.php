<?php
session_start();

if (isset($_SESSION['user'])){
    header('Location: /views/menus/puntoVenta.php');
}


if ($_GET['cerrar']){
   session_destroy();
}

include 'sources.php';


?>
<html>
<head>
    <meta charset="utf-8">
    <title>login</title>
<script src="/js/login.js"></script>
<link rel="stylesheet" href="/css/login.css">
<!--    <link rel="icon"  type="image/png" href="iconoventa.png">-->

</head>


<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">acceder</h5>
            <form class="form-signin" id ="formLogin" method="POST">
              <div class="form-label-group">
                <input type="text" id="inputUser" class="form-control" placeholder="usuario" required autofocus  value="admin">
                <label for="inputUser">Usuario</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="contraseña" required value ="holamundo">
                <label for="inputPassword">contraseña</label>
              </div>


              <button class="btn btn-lg btn-outline-success btn-block text-uppercase" type="submit" id ="btnEntrar">Entrar</button>
             </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>