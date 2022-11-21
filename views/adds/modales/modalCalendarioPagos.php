<!--Modal para CRUD-->
<?php
include '../../controllers/variables.php';
include($_SERVER['DOCUMENT_ROOT']."/agrosistemai/controllers/AJAX/valoresSelect.php");


?>

<div class="modal fade" id="modalCalendPagos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formProv"  method="get" accept-charset="utf-8" class="form-horizontal">
                <div class="modal-body">
                    <table class = "table table-responsivve table-striped">
                        <tr>
                            <th>fecha</th>
                            <th>por pagar</th>
                            <th>Monto Credito</th>
                            <th>abonos Hechos</th>
                        </tr>
                        <tr>
                            <td><label id="fechaHoy"><?php echo date("d-m-y",strtotime($fechaActual))?></label></td>
                            <td><label id = "deudaActual"></label></td>
                            <td><label id = "MontocreditoTotal"></label></td>
                            <td><label id="cantidadAbonada"></label></td>
                        </tr>
                        <tr>
                            <td><label id="primerDiaMes1"><?php echo date("d-m-y",strtotime($fechaActual."+ 30 days"))?></label></td>
                            <td><label id = "debe1diames1"></label></td>
                            <td><label id = "Montocredito1"></label></td>
                            <td><label id="cantidadAbonada1"></label></td>
                        </tr>
                        <tr>
                            <td><label id="primerDiaMes2"><?php echo date("d-m-y",strtotime($fechaActual."+ 60 days"))?></label></td>
                            <td><label id = "debe1diames2"></label></td>
                            <td><label id = "Montocredito2"></label></td>
                            <td><label id="cantidadAbonada2"></label></td>
                        </tr>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnAddProv" class="btn btn-success" >Imprimir</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
<!--                    <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>-->
                </div>
            </form>
        </div>
    </div>
</div>

