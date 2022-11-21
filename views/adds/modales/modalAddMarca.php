<!--Modal para CRUD-->
<?php
//include '../../../controllers/AJAX/valoresSelect.php';
include($_SERVER['DOCUMENT_ROOT']."/agrosistemai/controllers/AJAX/valoresSelect.php");
?>

<div class="modal fade" id="modalAddMarca" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Marca</h5>
                <button type="button" class="close" id="closeModMarca1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formMarca"  method="get" accept-charset="utf-8" class="form-horizontal">
                <div class="modal-body">
                            <div class ="form-group row">
                                <label for="nombreMarca" class="col-3 col-form-label">nombre</label>
                                <div class="col-8">
                                    <input type="text" class="form-control input-sm" id ="nombreMarca" name="nombreMarca" placeholder="nombre" autofocus required>
                                </div>
                            </div>
                            <br>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnAddMarca" class="btn btn-success" >agregar</button>
                    <button type="button" id="closeModMarca2" class="btn btn-light" data-dismiss="modal">Cerrar</button>
<!--                    <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>-->
                </div>
            </form>
        </div>
    </div>
</div>

