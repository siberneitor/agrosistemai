<?php
include 'header.html';
include 'modales/modalAddProd.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Productos</title>
    <script src="/js/productos.js"></script>



</head>
<body>

<nav class="navbar navbar-expand-lg navbar bg-light">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="AgregarProducto.php">Agregar Producto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="agregarProv.php">Agregar Proveedor</a>
            </li>

        </ul>
    </div>
</nav>


<table id ="tbAddProd">
    <thead class="text-center">
    <tr>
        <th>codigo</th>
        <th>descripcion</th>
        <th>costo</th>
        <th>precio</th>
        <th>proveedor</th>
        <th>fecha_caducidad</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>
</body>

</html>