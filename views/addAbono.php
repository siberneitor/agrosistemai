<?php
include 'header.html';

include '../controllers/AJAX/valoresSelect.php';
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Agregar Abono</title>
    <script src="/js/abonos.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar bg-light">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">


            <li class="nav-item">
                <a class="btn btn-outline-secondary" href="creditos.php">listado de creditos</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-secondary" href="abonos.php">listado de abonos</a>
            </li>
        </ul>
    </div>
</nav>

<div class = "content">
    <div class="form-control">
        <form id="formAbono"  method="GET" accept-charset="utf-8" class="form">
            <div class ="form-group row">

                <input type="hidden" name="opcion" id="opcion" value="1">

                <label for ="" class="col-sm-2 col-form-label" >Tipo de Pago</label>

                <div class="col-sm-3">

                    <input type="radio" id="tipoAbono" name="tipoAbono" value="1">
                    <label for="tipoAbono">contado</label><br>
                    <input type="radio" id="tipoAbono2" name="tipoAbono" value="2" disabled>
                    <label for="tipoAbono2">especie</label><br>

                </div>

                </div>

            <div class ="form-group row">


                <label for ="cantidadAbonada" class="col-sm-2 col-form-label" >Cantidad Abonada</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control input-sm" id ="cantidadAbonada" name="cantidadAbonada" placeholder="Cantidad a abonar">
                </div>
            </div>
            <div class="form-group row">
                <label for ="selectCliente" class="col-sm-2 col-form-label">Cliente</label>
                <div class="col-sm-2">
                    <select class="form-control input-sm" id="selectCliente" name="selectCliente">
                        <?php
                        while ($filasCLientes = $resultGetClientes->fetch_assoc()){
                            $idCLiente= $filasCLientes["id_cliente"];
                            $nombreCLiente= $filasCLientes["nombre"];
                            $ap_pat= $filasCLientes["apellido_paterno"];
                            $ap_mat= $filasCLientes["apellido_materno"];

                            echo '<option value="'.$idCLiente.'">'.$ap_pat." ".$ap_mat." ".$nombreCLiente.'</option>';
                        }
                        ?>
                    </select>

                </div >

            </div>


            <div class ="form-group row">
                <label for ="idCreditoAbono" class="col-sm-2 col-form-label" >Numero de Credito</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control input-sm" id ="idCreditoAbono" name="idCreditoAbono" placeholder="Numero de credito" >
                </div>
            </div>

        </form>
        <button class="btn btn-success" id="btnaddAbono">Registrar Abono</button>

    </div>
</div>
</body>

</html>