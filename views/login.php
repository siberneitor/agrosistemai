<?php
//session_start();
//if (isset($_SESSION['user'])){
//    header('Location: views/menus/puntoVenta.php');
//}

if (isset($_POST['cerrar'])){
    @session_start();
    session_destroy();
}


//include 'sources.php';


?>
<html>
<head>
    <meta charset="utf-8">
    <title>login</title>
<script src="../librerias/jquery-3.2.1.min.js"></script>
<script src="../js/login.js"></script>
    <!--bootstrap -->
    <script src="../librerias/bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../librerias/bootstrap-4.0.0/dist/css/bootstrap.min.css">
    <!-- alertify -->
    <script src="../librerias/alertifyjs/alertify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/alertify.min.css">
    <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/themes/default.min.css">

    <link rel="stylesheet" href="../css/login.css">
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