<?php
//include '../sources.php';
include '../header.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Creditos</title>
        <script src="/agrosistemai/js/creditos.js"></script>
        <link rel="stylesheet" href="/agrosistemai/css/creditos.css">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="btn btn-success" href="/views/adds/addCredito.php">Nuevo Credito</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-secondary" href=" abonos.php">Abonos</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-secondary" href="">Reporte de Credito</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-secondary" href="movimientos.php">Movimientos</a>
                </li>
            </ul>
        </div>
    </nav>


    <!----------------------------------->
    <nav class="navbar navbar-expand-lg navbar bg-light" id ="filtrosGastos" >
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <div class = "col-5">
                    <label>Filtrar por: </label>
                </div>

                <div class = "col-3">
                    <input type="radio" id="CredType" name="CredType" value="1" checked>
                    <label for="CredType" >Activos</label><br>
                </div>
                    <div class = "col-2">
                    <input type="radio" id="CredType" name="CredType" value="0">
                <label for="CredType">Finalizados</label>
                </div>


            </ul>
        </div>
    </nav>
    <table id ="tbCreditoGeneral"  class="table-striped" style="width:100%">
        <thead class="text-center">
        <tr>
            <th></th>
            <th>Nombre</th>
            <th>No CLiente</th>
            <th>No Creditos Act</th>
            <th>deuda Actual</th>
            <th>Cantidad Total Abonada</th>
            <th>Monto Total de Cred</th>
            <th>Fecha Vencimiento</th>
            <th>fecha Ultimo Abono</th>
            <th>Periodos de Pago</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    </body>
</html>
<?php
include '../adds/modales/modalCalendarioPagos.php';
include '../adds/modales/modalDetalleTicket.php';
?>

