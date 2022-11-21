<?php
//include '../sources.php';
include '../header.php';
include '../adds/modales/modalAddClient.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Clientes</title>
    <script src="/agrosistemai/js/clientes.js"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar bg-light">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="btn btn-success" href="/agrosistemai/views/adds/addCliente.php">Agregar Cliente</a>
            </li>

        </ul>
    </div>
</nav>



<table id ="tbClientes">
    <thead class="text-center">
    <tr>
        <th>ap_paterno</th>
        <th>ap_materno</th>
        <th>nombre(s)</th>
        <th>No Cliente</th>
        <th>domicilio</th>
        <th>localidad</th>
        <th>telefono</th>
        <th>email</th>
        <th>fecha_alta</th>
        <th>acciones</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>
</body>

</html>