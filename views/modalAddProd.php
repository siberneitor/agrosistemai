<!--Modal para CRUD-->
<?php
include '../controllers/AJAX/obtenerProv.php';
?>

<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formUsuarios">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="codigo" class="col-form-label">Codigo:</label>
                                <input type="text" class="form-control" id="codigo">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="descripcion" class="col-form-label">Descripcion</label>
                                <input type="text" class="form-control" id="descripcion">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="costo" class="col-form-label">Costo</label>
                                <input type="text" class="form-control" id="costo">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="precio" class="col-form-label">Precio</label>
                                <input type="text" class="form-control" id="precio">
                            </div>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="selectProv" class="col-form-label">proveedor:</label>

                                    <input type="text" class="form-control" id="proveedor">


                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="fecha_caducidad" class="col-form-label">fecha_cad</label>
                                <input type="text" class="form-control" id="fecha_caducidad">
                            </div>
                        </div>
                    </div>






                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

