<?php
include '../sources.php';
include '../header.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Abonos</title>
        <script src="/js/abonos.js"></script>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar bg-light">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="btn btn-success" href="/views/adds/addAbono.php">Nuevo Abono</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-secondary" href="creditos.php">listado de creditos</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-secondary" href="">reporte de abonos</a>
                </li>
            </ul>
        </div>
    </nav>



    <table id ="tbAbono">
        <thead class="text-center">
        <tr>
            <th>numero de abono</th>
            <th>fecha de abono</th>
            <th>cantidad</th>
            <th>numero de credito</th>
            <th>numero de cliente</th>
<!--            <th>acciones</th>-->
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    </body>
</html>

