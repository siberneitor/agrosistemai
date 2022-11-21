<?php
include '../header.php';
include '../adds/modales/modalAddInv.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inventario</title>
    <script src="/agrosistemai/js/inventario.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="btn btn-success" href="/agrosistemai/views/adds/AgregarInv.php">Agregar Prod a Inventario</a>
            </li>
<!--            <li class="nav-item">-->
<!--                <a class= "btn btn-outline-secondary" href="/agrosistemai/views/adds/modales/modalAddProvee.php">Agregar Proveedor</a>-->
<!--            </li>-->
            <!--            <li class="nav-item">-->
            <!--                <a class= "btn btn-info" href="agregarProv.php">generar reporte</a>-->
            <!--            </li>-->
        </ul>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar bg-light">
</nav>
<div id ="divTabAlertInv" class ="container">
    <table  class="table">
        <thead class="table-danger text-center">
        <tr>
           <th>ARTICULOS AGOTADOS O CON POCAS UNIDADES</th>
        </tr>
        </thead>
    </table>

<table id ="tbAlertaInv">
    <thead class="text-center">
    <tr>
        <th>descripcion</th>
        <th>codigo</th>
        <th>unidades</th>
        <th>costo</th>
        <th>precio</th>
        <th>proveedor</th>
        <th>fecha_ingreso</th>
        <th>fecha_caducidad</th>
        <th>estatus</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>
</div>
<hr id ="linea" />
<div id ="divTabInv" class ="">
    <table  class="table">
        <thead class="table-active text-center">
        <tr>
            <th>INVENTARIO DE PRODUCTOS</th>
        </tr>
        </thead>

    </table>
</div>
<table id ="tbAddInv" >
    <thead class="text-center">
    <tr>
        <th>Descripcion</th>
        <th>Codigo</th>
        <th>Unidades</th>
        <th>Costo</th>
        <th>Precio</th>
        <th>Marca</th>
        <th>Proveedor</th>
        <th>Categoria</th>
        <th>Fecha ingreso</th>
        <th>Fecha caducidad</th>
        <th>Estatus</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody class ="table-hover" >
    </tbody>
</table>
</body>

</html>