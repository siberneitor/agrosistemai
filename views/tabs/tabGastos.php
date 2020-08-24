<?php
//include 'header.php';

include '../../controllers/AJAX/valoresSelect.php';
include '../../controllers/variables.php';
include '../adds/modales/modalAddProvee.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gastos</title>
    <script src="/js/gastos.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar bg-light">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="btn btn-success" href="" id ="linkAddGasto">agregar gasto</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-secondary" href="" id ="linkReporte">Reporte de Gastos</a>
            </li>
        </ul>
    </div>
</nav>



<nav class="navbar navbar-expand-lg navbar bg-light" id ="addGasto" style="display: none">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <form id="formAddGasto"  method="GET" class ="form-inline">

                <!--                <a class="nav-link" href="addGastos.php">Agregar Gasto</a>-->
                <input type="hidden" name="opcion" id="opcion" value="1">
                <div class="col-3">
                    <label for ="idNotaCompra" class="col-6 col-form-label" >no gasto</label>
                    <input type="text" class="form-control input-sm" id ="idNotaCompra" name="idNotaCompra" placeholder="no. gasto">
                </div>

                <!--                <a class="nav-link" href="">reporte Gastos</a>-->
                <div class = "col-4 row">
                    <label for ="selectProv" class="col-sm-4 col-form-label">proveedor</label>
                    <select class="form-control input-lg" id="selectProvGasto" name="selectProvGasto">
                        <option value="0">TODOS</option>
                        <?php
                        while ($fila = $result->fetch_assoc()){
                            $idProv= $fila["id_proov"];
                            $descProv= $fila["nombre"];

                            echo '<option value="'.$idProv.'">'.$descProv.'</option>';
                        }
                        ?>
                    </select>
                    <a data-toggle="modal" data-target="#modalAddProvee" href="" href="">agregar Proveedor</a>
                </div>



                <div class = "col-3">
                    <label for ="totalCompra" class ="col-8 col-form-label">Total de Compra</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-sm" id ="totalCompra" name="totalCompra" placeholder="Total de compra">
                    </div>
                </div>



                <div class = "col-2">
                    <button class="btn btn-success" id="btnaddGasto">Registrar Compra</button>
                </div>
            </form>

        </ul>
    </div>
</nav>



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
                <select class="form-control input-sm" id="selectProvRG" name="selectProvRG">
                    <option value="0">TODOS</option>
                    <?php
                    while ($filaProv = $resultprov->fetch_assoc()){
                        $idProv2= $filaProv["id_proov"];
                        $descProv2= $filaProv["nombre"];

                        echo '<option value="'.$idProv2.'">'.$descProv2.'</option>';
                    }
                    ?>
                </select>
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



<table id ="tbGastos" class ="container-fluid">
    <thead class="text-center">
    <tr>
        <th>NO. nota compra</th>
        <th>proveedor</th>
        <th>total</th>
        <th>fecha_alta</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>
</body>

</html>