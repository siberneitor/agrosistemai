<?php
session_start();
//$controlador = $_SESSION ["user"];
if (!isset($_SESSION['user'])) {

    header("Location: views/login.php");


}else{
    header('Location: /views/menus/principal.php');
}
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="refresh" content="0;URL=views/puntoVenta.php">
    <link rel="icon"  type="image/png" href="/images/iconoventa.png">
</head>

<!-- <a href="/views/puntoVenta.php">principio</a> -->
<!--
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg navbar-light bg-light">


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="puntoVenta.php">Punto-Venta</a>
      </li>
        <li class="nav-item">
            <a class="nav-link" href="AgregarProducto.php">Productos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="agregarclienteS.php">Clientes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Creditos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Reportes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Administracion</a>
        </li>



    </ul>

  </div>
</nav>
-->
</html>
