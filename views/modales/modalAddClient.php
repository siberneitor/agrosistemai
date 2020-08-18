<!--Modal para CRUD-->


<div class="modal fade" id="modalAddClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formClient">
                <div class="modal-body">
                    <input type="hidden" id="id_cliente" name ="id_cliente">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="NombreCli" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="NombreCli">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="ap_pat_cli" class="col-form-label">apellido paterno</label>
                                <input type="text" class="form-control" id="ap_pat_cli">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="ap_mat_cli" class="col-form-label">apellido materno</label>
                                <input type="text" class="form-control" id="ap_mat_cli">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="domicilio_cli" class="col-form-label">domicilio</label>
                                <input type="text" class="form-control" id="domicilio_cli">
                            </div>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="localid_cli" class="col-form-label">Localidad:</label>

                                    <input type="text" class="form-control" id="localid_cli">


                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="telef_cli" class="col-form-label">Telefono</label>
                                <input type="text" class="form-control" id="telef_cli">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email_cli" class="col-form-label">Email:</label>

                                <input type="text" class="form-control" id="email_cli">


                            </div>
                        </div>
<!--                        <div class="col-lg-6">-->
<!--                            <div class="form-group">-->
<!--                                <label for="cred_act_cli" class="col-form-label">Credito Actual</label>-->
<!--                                <input type="text" class="form-control" id="cred_act_cli">-->
<!--                            </div>-->
<!--                        </div>-->
                    </div>

<!--                    <div class="row">-->
<!--                        <div class="col-lg-6">-->
<!--                            <div class="form-group">-->
<!--                                <label for="estatus_cred_cli" class="col-form-label">Estatus Credito:</label>-->
<!---->
<!--                                <input type="text" class="form-control" id="estatus_cred_cli">-->
<!---->
<!---->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

