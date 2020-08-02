<?php
include 'header.html';
include 'modales/modalCobrar.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Punto Venta</title>
        <script src="/js/puntoVenta.js"></script>
    </head>
    <body>
        <div class = "container-fluid">
            </form id ="myForm">
                <div class = "row">
                    <div class = "col-lg-4 divInputs" >
                        <div class ="row">
                            <div class="col-4">
                                <label class =" labelInputPV ">codigo</label>
                                <input type="text" class="form-control input-sm" name="" id="ttcodigo" placeholder="codigo"autofocus >
                            </div>
                            <div class="col-4">
                                <label class ="labelInputPV">unidades: </label>
                                <input type="text"  class="form-control input-sm" name="txtunidad" id="txtunidad" placeholder="unidades"autofocus value ="1" required>
                            </div>
                            <div class="col-4">
                                <label for="tcliente" class ="labelInputPV"> no cliente:</label>
                                <input type="text" class="form-control input-sm" name="txtcliente" id="tcliente" placeholder="cliente">
                            </div>
                        </div>
                        <div class ="row">
                            <hr width=500>
                        </div>
                        <div class ="row">
                            <div class="col-4">
                                <label class = "labelInputPV2">codigo:</label>
                                <input type="text" id="codRead" class="td3 form-control input-sm" name="tdato3" placeholder="codigo" readonly>
                            </div>
                            <div class="col-6">
                                <label class = "labelInputPV2">articulo:</label>
                                <input type="text" id ="nombreArtRead" class="td4 form-control input-sm" name="tdato4" placeholder="articulo" readonly>
                            </div>
                            <div class="col-2">
                                <label class = "labelInputPV2">precio:</label>
                                <input type="text" id ="precioRead" class="td5 form-control input-sm" name="tdato5" placeholder="" readonly>
                            </div>
                        </div>
                        <div class ="row">
                            <hr width=500>
                        </div>
                        <div class ="row">
                            <div class="col-3">
                                <label><button id="search" class="btn badge-secondary input-sm">buscar</button></label>
                            </div>
                            <div class="col-2">
                                <button id="btnadd" class="btn btn-primary input-sm">añadir</button>
                            </div>
                            <div class="col-3">
                                <label><button id="btnborrar" class="btn btn-danger input-sm">cancel (f8)</button></label>
                            </div>
                            <div class="col-3">
                                <button id="btncobrar"  data-toggle="modal" data-target="#myModal" class="btn btn-success input-sm">cobrar (f9)</button>
                            </div>
                            <!--
                            <div class="col-2">
                                <button id="btnbdin" class="btn btn-primary" data-toggle="modal" data-target="#modalbusqueda">search</button>
                            </div>
                            -->
                        </div>
                        <div class ="row">
                            <hr width=500>
                        </div>
                        <div class="row">
                            <label id="labelTotalArt" class ="totalArt"></label>
                        </div>
                        <div class="row">
                            <h1></h1>
                        </div>
                    </div>
                    <div class = "col-lg-8 divListaProd">
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

                <!--modal busqueda------------------------------------------------------>

                <!--<div class="modal fade" id="modalbusqueda" role="dialog">-->
                <!--    <div class="modal-dialog" role="dialog">-->
                <!---->
                <!--        Modal content-->
                <!--        <div class="modal-content">-->
                <!--            <div class="modal-header">-->
                <!--                <h4 class="modal-title">VENTANA BUSQUEDA</h4>-->
                <!--                <button id="btnclose" type="button" class="close" data-dismiss="modal">&times;</button>-->
                <!--                content-->
                <!--            </div>-->
                <!--            <div class="modal-body col-xs-4" >-->
                <!--                <div id="buscador"></div>-->
                <!--            </div>-->
                <!---->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->

                <!--fin modal busqueda-------------------------------------------------------->
