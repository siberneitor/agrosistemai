<?php
include 'header.html';
?>
<!DOCTYPE html>

<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Punto Venta</title>


</head>
<body>


<!-- inicia preuba de div bien acomodado -->

<div class = "container-fluid">


    <div class = "row">
        <div class = "col-lg-4 divInputs" >

            <div class ="row">
                <div class="col-4">
                    <label class =" labelInputPV ">codigo</label>
                    <input type="text" class="form-control input-sm" name="" id="ttcodigo" placeholder="codigo"autofocus >
                </div>


                <div class="col-4">
                    <label class ="labelInputPV">unidades: </label>
                    <input type="text"  class="form-control input-sm" name="txtunidad" id="txtunidad" placeholder="unidades"autofocus value ="1">

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
                <div class="col-3">
                    <label class = "labelInputPV2">codigo:</label>
                    <input type="text" class="td3 form-control input-sm" name="tdato3" placeholder="codigo" readonly>
                </div>


                <div class="col-3">
                    <label class = "labelInputPV2">articulo:</label>
                    <input type="text" class="td4 form-control input-sm" name="tdato4" placeholder="articulo" readonly>

                </div>
                <div class="col-3">
                    <label class = "labelInputPV2">precio:</label>
                    <input type="text" class="td5 form-control input-sm" name="tdato5" placeholder="precio" readonly>
                </div>
            </div>

            <div class ="row">
                <hr width=500>
            </div>

            <div class ="row">
                <div class="col-2">
                    <label><button id="search" class="btn btn-primary">buscar</button></label>
                </div>


                <div class="col-2">
                    <button id="btnadd" class="btn btn-dark">añadir</button>

                </div>
                <div class="col-2">
                    <button id="btncobrar"  data-toggle="modal" data-target="#myModal" class="btn btn-success">cobrar</button>
                </div>
                <div class="col-2">
                    <label><button id="btnborrar" class="btn btn-danger">Cancelar</button></label>
                </div>
                <div class="col-2">
                    <button id="btnbdin" class="btn btn-primary" data-toggle="modal" data-target="#modalbusqueda">search</button>
                </div>
                <div class="col-2">
                    <button id="btnbdin" class="btn btn-primary" data-toggle="modal" data-target="#modalbusqueda">search</button>
                </div>
            </div>
            <div class ="row">
                <hr width=500>
            </div>
            <div class="row">
                <label id="labelTotalArt" class ="totalArt"></label>
            </div>
            <div class="row">
                <!-- <label id="precioTotal"></label> -->
                <h1></h1>
            </div>


        </div>



        <div class = "col-lg-8 divListaProd">
            <div class="divR"></div>


        </div>
    </div>
</div>

<!-- inicia preuba de div bien acomodado -->

<h2></h2>
<!--modal busqueda------------------------------------------------------>

<div class="modal fade" id="modalbusqueda" role="dialog">
    <div class="modal-dialog" role="dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">VENTANA BUSQUEDA</h4>
                <button id="btnclose" type="button" class="close" data-dismiss="modal">&times;</button>
                <!--content-->
            </div>
            <div class="modal-body col-xs-4" >
                <div id="buscador"></div>
            </div>

        </div>
    </div>
</div>

<!--fin modal busqueda-------------------------------------------------------->

<!--modal ventana cobrar------------------------------------------------------>
<div>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">VENTANA COBRAR</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <strong>
                        <h6></h6>
                        <label>pago con:</label>
                        <input type="text" id="txtcambio" autofocus/>
                        <h5></h5>
                    </strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="cobrar();">abonar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--fin modal------------------------------------------------------------------------->


</body>


</html>
