<?php
//include '../sources.php';
include '../header.php';
include '../../controllers/AJAX/valoresSelect.php';


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mmovimientos</title>
    <script src="/agrosistemai/js/movimientos.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <!--                    <a class="btn btn-success" href="/views/adds/addCredito.php">Nuevo Credito</a>-->
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-secondary" href=" abonos.php">Abonos</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-secondary" href="creditos.php">Reporte de Credito</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-secondary" href="movimientos.php">Movimientos</a>
            </li>
        </ul>
    </div>
</nav>
<p></p>
<div class=" row col-12">
    <div class="col-1">
        <label for="" class="">Numero de Cliente</label>
        <!--        <input type="text" readonly class="form-control-plaintext" id="noCliente" value="Numero de cliente">-->
    </div><!--        <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Jane Doe">-->
    <div class="col-2">
        <input type ="number" id ="idClienteMov" class = "form-control">
    </div>
    <div class = "col-2">
        <select class="form-control" id="selectClienteMov" name="selectClienteMov">
            <option value ="o">TODOS</option>
            <?php
            while ($filasCLientes = $resultClientCred->fetch_assoc()){
                $idCLiente= $filasCLientes["id_cliente"];
                $nombreCLiente= $filasCLientes["nombre"];
                $ap_pat= $filasCLientes["apellido_paterno"];
                $ap_mat= $filasCLientes["apellido_materno"];

                echo '<option value="'.$idCLiente.'">'.$ap_pat." ".$ap_mat." ".$nombreCLiente.'</option>';
            }
            ?>
        </select>
    </div>
        <div class="offset-1">
            <button id="buscarClienteMov" class ="btn btn-success">buscar</button>
        </div>

</div>
<p></p>


<table id ="tbMov">
    <thead class="text-center">
    <tr>
        <th>Fecha</th>
        <th>No Cliente</th>
        <th>Numero de Movimento</th>
        <th>Tipo Movimiento</th>
        <th>Monto</th>
        <th>Numero Credito</th>
        <th>Numero Venta</th>
        <th>Numero Abono</th>
        <th>Saldo A Pagar</th>
        <!--            <th>acciones</th>-->
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>

</body>
</html>

