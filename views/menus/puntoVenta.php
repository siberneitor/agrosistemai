<?php
include '../sources.php';
include '../header.php';
include '../adds/modales/modalCobrar.php';
include '../../controllers/AJAX/valoresSelect.php';
include '../../controllers/variables.php';


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Punto Venta</title>
<!--        <link rel="icon"  type="image/png" href="/images/iconoventa.png">-->
<!--        <link rel="shortcut icon" type="image/png" href="/views/48.png" />-->
        <link rel="stylesheet" href="/css/puntoVenta.css">
        <script src="/js/puntoVenta.js"></script>
    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar bg-light content-fluid" id ="filtrosGastos" >

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form id ="addCodListado">
            <ul class="navbar-nav mr-auto">


                <div class = "col-2">
                    <label class =" labelInputPV ">codigo</label>
                    <input type="text" class="form-control input-sm" name="ttcodigo" id="ttcodigo" placeholder="codigo"autofocus autocomplete="off">

                </div>


                <div class = "col-1">
                    <label class ="labelInputPV">unidades: </label>
                    <input type="number"  class="form-control input-sm" name="txtunidad" id="txtunidad" placeholder="" autofocus value ="1"  >

                </div>

                <!--                <a class="nav-link" href="">reporte Gastos</a>-->
                <div class = "col-1">
                    <label for="selectClienteVentas" class ="labelInputPV">Cliente:</label>
                    <select  id="selectClienteVentas" name="selectClienteVentas">
                        <option value="1" selected>-   Sin Cliente    -</option>
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

                </div>

                <div class = "col-1">
                    <div class="divTotalArt">
                        <label id ="labelTotalArt" class="labelTotalArt"></label>
                    </div>
                </div>

                <div class = "col-2">
                    <label for="selectProdVentas" class ="labelInputPV">Productos:</label>
                    <select  id="selectProdVentas" name="selectProdVentas" data-default-value="0">
                        <option value="0" selected="selected">Nombre Producto</option>
                        <?php
                        while ($filasProds = $resultGetProds->fetch_assoc()){
                            $codigoProd= $filasProds["codigo"];
                            $nombreProd= $filasProds["descripcion"];


                            echo '<option value="'.$codigoProd.'">'.$nombreProd.'</option>';
                        }
                        ?>
                    </select>
                </div>

            </form>


                <div class = "col-1">
                    <label></label>
                    <button id="btnadd" class="btn btn-outline-primary input-sm">añadir (int)</button>
                    <div id ="divTotal" class="divTotal">
                        <label><h1></h1></label>
<!--                        <label id="labelTotalArt" class ="totalArt"></label>-->
                    </div>
                </div>
                <div class = "col-1">
                    <label></label>
                    <button id="btnborrar" class="btn btn-outline-danger input-sm">cancel (f8)</button>

                </div>
                <div class = "col-1">
                    <label></label>
                    <button id="btncobrar"   data-target="#myModal" class="btn btn-outline-success input-sm">cobrar (f9)</button>

                </div>


            </ul>

            <!--aqui esrta bien -->
        </div>

    </nav>

        <div class = "container-fluid">
            </form id ="myForm">
                <div class = "row">

                    <div class = "col-lg-12 divListaProd">
                        <hr width="1200">
                        <div class="divR">
                        </div>
                    </div>
                </div>
             </form>
        </div>
        <!-- inicia preuba de div bien acomodado -->
        <h2></h2>
    </body>
</html>

