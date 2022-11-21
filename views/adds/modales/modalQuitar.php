<?php include '../../controllers/AJAX/valoresSelect.php'; ?>

<div>
    <div class="modal fade" id="modalQuitar" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form id ="formModalCobrar">
                    <div class="modal-header">
                        <h4 class="modal-title">Quitar productos</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                        <div class ="row">
                            <div class ="col-6">
                                <center>
                                    <input type="text" readonly class="form-control-plaintext" id="" value="Actuales">
                                </center>
                            </div>
                            <div class ="col-6">
                                <center>
                                    <strong>
                                <input type ="text" readonly class="form-control-plaintext" id ="unidadesActuales"/>
                                </center>
                                </strong>
                            </div>
                        </div>
                        <p></p>
                        <div class ="row">
                            <div class ="col-4">
<!--                                <label id ="unidadesActuales">Quitar</label>-->
                                <input type="text" readonly class="form-control-plaintext" id="" value="Quitar">

                            </div>
                            <div class ="col-4">
                                <input type ="number"  id ="quitarUnidades" class=" form-control"/>
                            </div>
                            <div class ="col-4">
<!--                                <label id ="">Unidades</label>-->
                                <input type="text" readonly class="form-control-plaintext" id="" value="Unidades">
                            </div>
                        </div>
                        </div>
                    <div class="modal-footer">
                        <!--                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="cobrar();">abonar</button>-->
                        <!--                    <button type="button" class="btn btn-primary" id ="btnModalCObrar">abonar</button>-->
                        <!--                    <input type="submit" class="btn btn-primary" id ="btnModalCObrar" value = "cobrar2">-->
                        <button type="button" id ="btnCancelMvent" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
                        <button type="button" class="btn btn-outline-danger" id ="btnModalQuitar">Quitar</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>