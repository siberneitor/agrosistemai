<?php
include 'header.html';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reportes</title>
    <link rel="stylesheet" href="/css/reportes.css">
    <script src="/js/reportes.js"></script>
</head>
<body>
<!--  <button id ="btnExportar">EXPORTAR</button> -->

<nav class="divInputs">
    <div class="distanciaInput">
        <button id ="btnExportar" class="btn btn-outline-success" type="button">ventas</button>
    </div>
    <div class="distanciaInput">
        <button class="btn btn-outline-success" type="button">gastos</button>
    </div>

</nav>
<div class="container-fluid">
    <form id ="formReporteVentas" class = "form-group">
        <div class ="form-group row">
            <div class="col">
                <select id="selectTipoVenta" class ="form-control">
                    <option value="x">TODAS</option>
                    <option value="0">credito</option>
                    <option value="1">contado</option>
                </select>
            </div>
            <div class="col">
                <input type="text" id = "idVentaR" name ="idVenta" class="form-control" placeholder="no ticket">
            </div>
            <div class="col">
                <input type="text" id = "codigoR" name = "codigoR" class="form-control" placeholder="codigo">
            </div>
            <div class="col">
                <input type="text" id = "nombreProdR" name = "nombreProdR" class="form-control" placeholder="nombre producto">
            </div>
            <div class="col">
                <input type="text" id = "clienteR" name = " clienteR"" class="form-control" placeholder="cliente">
            </div>

        </div>

        <div class ="form-group row">

            <div>
                <div class="col">
                    <input type="date" id = "fInicialR" name="fInicialR" class="form-control" placeholder="fecha venta inicial">
                </div>
                <div class="col">
                    <input type="date" id = "fFinalR" name="fFinalR" class="form-control" placeholder="fecha venta final">
                </div>
            </div>
            <div>
                <div class="col">
                    <input type="text" id = "horaInicialR" name="horaInicialR" class="form-control" placeholder="hora venta inicial">
                </div>
                <div class="col">
                    <input type="text" id = "horaFinalR" name ="horaFinalR" class="form-control" placeholder="hora venta final">
                </div>
            </div>
            <div>
                <div class="col">
                    <input type="date" id = "fCadIniR" name ="fCadIniR" class="form-control" placeholder="fecha cad inicial">
                </div>
                <div class="col">
                    <input type="date" id = "fCadFinalR" name ="fCadFinalR" class="form-control" placeholder="fecha cad final">
                </div>
            </div>
            <button id = "btnRventas" class = "btn btn-outline-secondary">Generar Reporte</button>
        </div>

    </form>

</div>

</body>
</html>

