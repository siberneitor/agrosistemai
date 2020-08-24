<!--Modal para CRUD-->
<?php
include '../../../controllers/AJAX/valoresSelect.php';

?>

<div class="modal fade" id="modalAddProvee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formProv"  method="get" accept-charset="utf-8" class="form-horizontal">
                <div class="modal-body">




                            <div class ="form-group row">

                                <label for="nombreProv" class="col-3 col-form-label">nombre</label>
                                <div class="col-8">
                                    <input type="text" class="form-control input-sm" id ="nombreProv" name="nombreProv" placeholder="nombre" autofocus required>
                                </div>
                            </div>
                            <div class ="form-group row">
                                <label for="adressProv" class="col-3 col-form-label">domicilio</label>
                                <div class="col-8">
                                    <input type="text" class="form-control input" id ="adressProv" name="adressProv" placeholder="domicilio">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for ="telefonoProv" class="col-3 col-form-label">telefono</label>
                                <div class ="col-8">
                                    <input type="tel" id ="telefonoProv" class="form-control input" name="telefonoProv" placeholder="telefono" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for ="emailProv" class="col-3 col-form-label">email</label>
                                <div class="col-8">
                                    <input type="email" id ="emailProv" class="form-control input-sm" name="emailProv" placeholder="email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="responsProv" class="col-3 col-form-label">responsable</label>
                                <div class ="col-8">
                                    <input type="text" id ="responsProv" class="form-control input-sm" name="responsProv" placeholder="responsable">
                                </div>
                            </div>
                            <br>

                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnAddProv" class="btn btn-success" >agregar</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
<!--                    <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>-->
                </div>
            </form>
        </div>
    </div>
</div>

