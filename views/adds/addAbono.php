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
    <title>Agregar Abono</title>
    <script src="/js/abonos.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar bg-light">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">


            <li class="nav-item">
                <a class="btn btn-outline-secondary" href="/views/menus/creditos.php">listado de creditos</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-secondary" href="/views/menus/abonos.php">listado de abonos</a>
            </li>
        </ul>
    </div>
</nav>

<div class = "row content">
    <div class ="col-6">
        <form id="formAbono"  method="GET" accept-charset="utf-8" class="form-control">
                            <div>
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
                        <div class="form-group row">
                            <label for ="selectClienteCred" class="col-sm-2 col-form-label">Cliente</label>
                            <div class="col-sm-2">
                                <select class="form-control input-sm" id="selectClienteCred" name="selectClienteCred">
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

                            </div >

                        </div>


                                <div class ="form-group row">


                                    <label id="lblescojeCred" class="col-6 col-form-label" hidden="true">selecciona un credito de la lista</label>
<!--                                    <div class="col-sm-3">-->
<!--                                        <input type="text" class="form-control input-sm" id ="inputNocred" name="inputNocred" readonly>-->
<!--                                    </div>-->
                                </div>



                        <div id = "divNoCred" class ="form-group row" hidden="true">


                            <label for ="inputNocred" class="col-sm-2 col-form-label" > No de credito</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control input-sm" id ="inputNocred" name="inputNocred" readonly>
                            </div>
                        </div>

                        <div id = "divDeuda" class ="form-group row" hidden="true">


                            <label for ="inputDeuda" class="col-sm-2 col-form-label" >Monto que debe</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control input-sm" id ="inputDeuda" name="inputDeuda" readonly>
                            </div>
                        </div>


                        <div id ="divInputAbono" class ="form-group row" hidden="true">


                            <label for ="cantidadAbonada" class="col-sm-2 col-form-label" >Cantidad a Abonar</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control input-sm" id ="cantidadAbonada" name="cantidadAbonada" placeholder="$ abono">
                            </div>
                        </div>




                        </div>
            <button class="btn btn-success" id="btnaddAbono" hidden="true">Registrar Abono</button>

        </form>
    </div>
    <div class ="col-6">
        <div id ="divTbCredXuser"  class ="form-group row">
            <table id ="tbCredXuser" class="row-border hover">
                <thead>
                <tr>
                    <th>no de credito</th>
                    <th>deuda</th>
                </tr>


                </thead>
                <tbody style="  cursor: pointer;">


                </tbody>
            </table>
        </div>
    <div>
</div>
</body>

</html>