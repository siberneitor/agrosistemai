<?php
include 'header.html';

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Creditos</title>
        <script src="/js/creditos.js"></script>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar bg-light">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="btn btn-success" href="addCredito.php">Nuevo Credito</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-secondary" href="abonos.php">Abonos</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-secondary" href="">Reporte de Credito</a>
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

<!--                               <a class="nav-link" href="addGastos.php">Agregar Gasto</a>-->
<!--                <div class = "col-2">-->
<!--                    <input type="text" id="idNotaCompraF" class ="form-control" placeholder="No. nota compra">-->
<!--                </div>-->

                <!--                <a class="nav-link" href="">reporte Gastos</a>-->
<!--                <div class = "col-2">-->
<!--                    <select class="form-control input-sm" id="selectProvGasto" name="selectProvGasto">-->
<!--                        <option value="0">TODOS</option>-->
<!--                        --><?php
//                        while ($fila = $result->fetch_assoc()){
//                            $idProv= $fila["id_proov"];
//                            $descProv= $fila["nombre"];
//
//                            echo '<option value="'.$idProv.'">'.$descProv.'</option>';
//                        }
//                        ?>
<!--                    </select>-->
<!--                </div>-->

<!--                <div class = "col-2">-->
<!--                    <input type="text" id ="totalR" class ="form-control" placeholder="total">-->
<!--                </div>-->
<!---->
<!--                <div class = "col-2">-->
<!--                    <input type="date" id ="fIncialRG" class ="form-control" placeholder="fecha inicial">-->
<!--                    <input type="date" id ="fFinalRG" class ="form-control" placeholder="fecha final">-->
<!--                </div>-->


<!---->
<!--                <div class = "col-4">-->
<!--                    <button  type="button" id="btnFiltrarCred" class="btn btn-outline-success">BUSCAR</button>-->
<!--                </div>-->
<!---->

            </ul>
        </div>
    </nav>
    <table id ="tbCreditoGeneral">
        <thead class="text-center">
        <tr>
            <th>Nombre</th>
            <th>No CLiente</th>
            <th>No Creditos Act</th>
            <th>deuda Actual</th>
            <th>Cantidad Total Abonada</th>
            <th>Monto Total de Cred</th>
            <th>Fecha Vencimiento</th>
            <th>fecha Ultimo Abono</th>
            <th>acciones</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    </body>
</html>

