<?php
include '../sources.php';
include '../header.php';

include '../../controllers/AJAX/valoresSelect.php';
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Agregar Credito</title>
    <script src="/js/creditos.js"></script>
</head>

<body>
<div class = "content">
    <div class="form-control">
        <form id="formCredito"  method="GET" accept-charset="utf-8" class="form">
            <div class ="form-group row">

                <input type="hidden" name="opcion" id="opcion" value="1">
                <input type="hidden" name="estatusCredito" id="estatusCredito" value="1">

                <label for ="montoPrestamo" class="col-sm-2 col-form-label" >Monto Prestamo</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control input-sm" id ="montoPrestamo" name="montoPrestamo" placeholder="Monto">
                </div>
            </div>

<!--            <div class ="form-group row">-->
<!---->
<!--                <label for ="montoApagar" class="col-sm-2 col-form-label" >Monto A pagar</label>-->
<!--                <div class="col-sm-3">-->
<!--                    <input type="text" class="form-control input-sm" id ="montoApagar" name="montoApagar" placeholder="Monto a pagar">-->
<!--                </div>-->
<!--            </div>-->




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



<!--            <div class ="form-group row">-->
<!---->
<!--                <label for ="diasPlazo" class="col-sm-2 col-form-label" >Dias plazo</label>-->
<!--                <div class="col-sm-3">-->
<!--                    <input type="number" class="form-control input-sm" id ="diasPlazo" name="diasPlazo" placeholder="Dias plazo">-->
<!--                </div>-->
<!--            </div>-->
            <div class ="form-group row">

                <label for ="interes" class="col-sm-2 col-form-label" >% interes</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control input-sm" id ="interes" name="interes" placeholder="% interes">
                </div>
            </div>
            <div class ="form-group row">

                <label for ="fechaVenc" class="col-sm-2 col-form-label" >Fecha Vencimiento</label>
                <div class="col-sm-3">
                    <input type="date" class="form-control input-sm" id ="fechaVenc" name="fechaVenc" placeholder="Fecha Vencimiento">
                </div>
            </div>
            <div class ="form-group row">

                <label for ="pagoInicial" class="col-sm-2 col-form-label" >pago inicial</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control input-sm" id ="pagoInicial" name="pagoInicial" placeholder="Pago inicial">
                </div>
            </div>

        </form>
        <button class="btn btn-success" id="btnaddCred">Registrar Credito</button>

    </div>
</div>
</body>
<script>


</script>
</html>