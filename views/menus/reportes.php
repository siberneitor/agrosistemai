<?php
include '../sources.php';
include '../header.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reportes</title>
    <link rel="stylesheet" href="/agrosistemai/css/reportes.css">
    <script src="/agrosistemai/js/reportes.js"></script>
    <script src="/agrosistemai/js/ganancias.js"></script>
    <script src="/agrosistemai/js/gastos.js"></script>
</head>
<body>
<!--  <button id ="btnExportar">EXPORTAR</button> -->

<nav class="divInputs">
    <div class="distanciaInput">
        <button id ="btnRventasVerde" class="btn btn-outline-success" type="button">ventas</button>
    </div>
    <div class="distanciaInput">
        <button id ="btnGastos" class="btn btn-outline-success" type="button">gastos</button>
    </div>

</nav>
<nav class="navbar navbar-expand-lg navbar bg-light" id ="filtrosVentas" >
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

<!--SEPARACIONB -->

<nav class="navbar navbar-expand-lg navbar bg-light" id ="filtrosGastos" style="display: none">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <div class = "col-1">
                <label>Filtrar por: </label>
            </div>


            <!--                <a class="nav-link" href="addGastos.php">Agregar Gasto</a>-->
            <div class = "col-2">
                <input type="text" id="idNotaCompraF" class ="form-control" placeholder="No. nota compra">
            </div>

            <!--                <a class="nav-link" href="">reporte Gastos</a>-->
            <div class = "col-2">
                <!-- input solo para mostrarse-->
                <input type = "text" class="form-control input-sm" id="" name="" placeholder = "proveedor">

            </div>

            <div class = "col-2">
                <input type="text" id ="totalR" class ="form-control" placeholder="total">
            </div>


            <div class = "col-3">
                <input type="date" id ="fIncialRG" class ="form-control" placeholder="fecha inicial" value="<?php echo $fechaActual ?>" >
                <input type="date" id ="fFinalRG" class ="form-control" placeholder="fecha final" value="<?php echo $fechaActual ?>">
            </div>



            <div class = "col-4">
                <button  type="button" id="btnReporteGastos" class="btn btn-outline-success">generar Reporte</button>
            </div>


        </ul>
    </div>
</nav>
</body>
</html>

