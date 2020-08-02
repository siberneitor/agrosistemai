<!--Modal para CRUD-->

<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formInv">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Fcodigo" class="col-form-label">Codigo:</label>
                                <input type="text" class="form-control" id="Fcodigo" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Fdescripcion" class="col-form-label">Descripcion</label>
                                <input type="text" class="form-control" id="Fdescripcion" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Funidades" class="col-form-label">Unidades</label>
                                <input type="text" class="form-control" id="Funidades">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Fcosto" class="col-form-label">Costo</label>
                                <input type="text" class="form-control" id="Fcosto">
                            </div>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Fprecio" class="col-form-label">Precio:</label>

                                    <input type="text" class="form-control" id="Fprecio">


                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Fcad" class="col-form-label">Fecha Caducidad:</label>

                                <input type="text" class="form-control" id="Fcad">
                              <!--  <input type="date" class="form-control" id="Fcad"> -->


                            </div>
                        </div>
                    </div>

                    <div class = "row">
                        <div class="col-lg-6">
                            <div class="form-group">


                                <!-- Material indeterminate -->
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="statusInv" >
                                    <label class="form-check-label" for="statusInv">Activo</label>
                                </div>

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

