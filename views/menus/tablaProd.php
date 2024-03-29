<?php
//include '../sources.php';
include '../header.php';
include '../adds/modales/modalAddProd.php';
include '../adds/modales/modalAddProvee.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Productos</title>
    <script src="/agrosistemai/js/productos.js"></script>
    <script src="/agrosistemai/js/proveedor.js"></script>




</head>
<body>

<nav class="navbar navbar-expand-lg navbar bg-light">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="btn btn-success" href="/agrosistemai/views/adds/AgregarProducto.php">Agregar Producto</a>
            </li>
            <li class="nav-item">
                <a data-toggle="modal" data-target="#modalAddProvee" class= "btn btn-outline-secondary" href="">Agregar Proveedor</a>
            </li>
<!--            <li class="nav-item">-->
<!--                <a class= "btn btn-info" href="agregarProv.php">generar reporte</a>-->
<!--            </li>-->
        </ul>
    </div>
</nav>
<div id ="divTabAlertProducto" class ="container">
    <table  class="table">
        <thead class="table-danger text-center">
        <tr>
            <th>PRODUCTOS  SIN AGREGAR A INVENTARIO</th>
        </tr>
        </thead>

    </table>


    <table id ="tbAlertaProducto">
        <thead class="text-center">
        <tr>
            <th>articulo</th>
            <th>codigo</th>
            <th>costo</th>
            <th>precio</th>
            <th>marca</th>
            <th>categoria</th>
            <th>proveedor</th>
            <th>fecha_caducidad</th>
            <th>unidades</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<hr id ="linea" />
<div id ="divTabProductos" class ="">
    <table  class="table">
        <thead class="table-active text-center">
        <tr>
            <th>LISTADO DE PRODUCTOS</th>
        </tr>
        </thead>

    </table>
</div>

<table id ="tbAddProducto">
    <thead class="text-center">
    <tr>
        <th>articulo</th>
        <th>codigo</th>
        <th>costo</th>
        <th>precio</th>
        <th>marca</th>
        <th>categoria</th>
        <th>proveedor</th>
        <th>fecha_caducidad</th>
        <th>unidades</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>
</body>

</html>