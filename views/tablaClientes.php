<?php
include 'header.html';
include 'modales/modalAddClient.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Clientes</title>
    <script src="/js/clientes.js"></script>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar bg-light">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="agregarclienteS.php">Agregar Cliente</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="agregarProv.php"></a>
            </li>

        </ul>
    </div>
</nav>


<table id ="tbClientes">
    <thead class="text-center">
    <tr>
        <th>id</th>
        <th>nombre(s)</th>
        <th>ap_paterno</th>
        <th>ap_materno</th>
        <th>domicilio</th>
        <th>localidad</th>
        <th>telefono</th>
        <th>email</th>
        <th>fecha_alta</th>
        <th>cred_actual</th>
        <th>estatus cred</th>
        <th>acciones</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>
</body>

</html>