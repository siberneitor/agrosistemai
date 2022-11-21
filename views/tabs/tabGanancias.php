<?php

include '../../controllers/AJAX/valoresSelect.php';
include '../../controllers/variables.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ventas</title>
    <script src="/agrosistemai/js/ganancias.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar bg-light">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="btn btn-outline-secondary" href="" id ="linkRventas">Reporte de Ventas</a>
            </li>

        </ul>
    </div>
</nav>




<nav class="navbar navbar-expand-lg navbar bg-light" id ="filtrosVentas" style="display: none">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

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
                            <input type="date" id = "fInicialR" name="fInicialR" class="form-control" placeholder="fecha venta inicial" value="<?php echo $fechaActual ?>">
                        </div>
                        <div class="col">
                            <input type="date" id = "fFinalR" name="fFinalR" class="form-control" placeholder="fecha venta final" value="<?php echo $fechaActual ?>">
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
                            <input type="date" id = "fCadIniR" name ="fCadIniR" class="form-control" placeholder="fecha cad inicial" >
                        </div>
                        <div class="col">
                            <input type="date" id = "fCadFinalR" name ="fCadFinalR" class="form-control" placeholder="fecha cad final">
                        </div>
                    </div>
                    <div class =" col-2">
                        <p></p>
                    </div>
                    <div class ="col-1 row">
                    <button id = "btnRventas" class = "btn btn-secondary btn-sm" style=" margin-top: 45px;height: 40px">Generar Reporte</button>
                    </div>
                    </div>

            </form>

        </ul>
    </div>
</nav>



<table id ="tbVentasR" class ="container-fluid" width="100%">
    <thead class="text-center">
    <tr>
        <th>NO. Venta</th>
        <th>Tipo Venta</th>
        <th>Unid.</th>
        <th>Total</th>
        <th>Pago con:</th>
        <th>Cambio</th>
        <th>No. CLiente</th>
        <th>Fecha Venta</th>
        <th>Det. Venta</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>
</body>

</html>