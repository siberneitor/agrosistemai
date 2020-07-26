<?php
include 'header.html';
include 'modales/modalAddInv.php';

?>
<!DOCTYPE html>
<html>
<head>
    <title>Inventario</title>
    <script src="/js/inventario.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar bg-light">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="AgregarInv.php">Agregar Inventario</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="agregarProv.php">Agregar Proveedor</a>
            </li>

        </ul>
    </div>
</nav>

<table id ="tbAlertaInv">
    <thead class="text-center">
    <tr>
        <th>codigo</th>
        <th>descripcion</th>
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
<table id ="tbAddInv">
    <thead class="text-center">
    <tr>
        <th>codigo</th>
        <th>descripcion</th>
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
</body>

</html>