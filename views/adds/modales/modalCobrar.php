<?php include '../../controllers/AJAX/valoresSelect.php'; ?>

<div>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <form id="formModalCobrar">
                    <div class="modal-header">
                        <h4 class="modal-title">VENTANA COBRAR</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                        <!--                    <form id ="formRadioTpV">-->
                        <strong>
                            <div class="form-group form-inline ">

                                <div class="form-control">
                                    <label for="radioTipoVenta" class="form-check-label">credito</label><br>
                                    <input class="form-check-input" type="radio" id="radioTipoVenta"
                                           name="radioTipoVenta" value="0" tabindex="1" autofocus required>
                                </div>

                                <div class="form-control">
                                    <label for="radioTipoVenta2" class="form-check-label">contado</label><br>
                                    <input type="radio" class="form-check-input" id="radioTipoVenta2"
                                           name="radioTipoVenta" value="1" required>
                                </div>


                            </div>


                        </strong>
                        <!--                    </form>-->

                        <div id="inputsVentaContado">
                            <!--                    <form id ="formCobrarContado">-->
                            <p></p>
                            <strong>
                                <h6></h6>
                                <p></p>
                                <label>Cantidad Recibida:</label>
                                <!--                        <div class="col-md-6 form-group">-->
                                <div class="form-group">
                                    <input type="number" id="txtcambio" name="txtcambio" class="form-control-sm"
                                           autofocus/>
                                    <!--                        </div>-->
                                </div>
                                <h5></h5>

                            </strong>
                            <!--                    </form>-->
                        </div>

                        <!--inicia inputs credito -->
                        <div id="divInputsCredito" class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="radioTipoCredito" id="maiz" value="1">
                                <label class="form-check-label" for="maiz">maiz</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="radioTipoCredito" id="agroinsumos" value="2">
                                <label class="form-check-label" for="agroinsumos">Agroinsumos</label>
                            </div>
                            <div class="row form-inline">
                                <div class="col-6">
                                    <label for="selectClienteVentas" class="labelInputPV">Cliente:</label>
                                </div>
                                <div class="col-6">

                                    <select id="selectClienteVentas" name="selectClienteVentas">
                                        <option value="1" selected>- Sin Cliente -</option>
                                        <?php
                                        while ($filasCLientes = $resultGetClientes->fetch_assoc()) {
                                            $idCLiente = $filasCLientes["id_cliente"];
                                            $nombreCLiente = $filasCLientes["nombre"];
                                            $ap_pat = $filasCLientes["apellido_paterno"];
                                            $ap_mat = $filasCLientes["apellido_materno"];

                                            echo '<option value="' . $idCLiente . '">' . $ap_pat . " " . $ap_mat . " " . $nombreCLiente . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <!--                                <div class="form-check form-check-inline">-->
                                <!--                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">-->
                                <!--                                    <label class="form-check-label" for="defaultCheck1">-->
                                <!--                                        deja Garantia-->
                                <!--                                    </label>-->
                                <!--                                </div>-->
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="" id="garantia">

                                    <label class="form-check-label" for="defaultCheck1">
                                        deja Garantia
                                    </label>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="form-control"><h6></h6></div>


                            </div>
                            <div class="form-group row">
                                <label for="txtAbonoInicial" class="col-sm-2 col-form-label">Abono inicial</label>
                                <div class="col-sm-3">
                                    <input type="text" id="txtAbonoInicial" name="txtAbonoInicial" autofocus
                                           class="form-control-sm" value="0"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="interesVenta" class="col-sm-2 col-form-label">Interes</label>
                                <div class="col-sm-3">
                                    <input type="text" name="interesVenta" id="interesVenta" class="form-control-sm"
                                           value="0.0712">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fVencVenta" class="col-sm-2 col-form-label">Fecha Limite</label>
                                <div class="col-sm-3">
                                    <input type="date" name="fVencVenta" id="fVencVenta" class="form-control-sm"
                                           value="2023-01-30" required/>

                                </div>
                            </div>

                        </div>
                        <!-- termina inputs credito-->

                    </div>
                    <div class="modal-footer">
                        <!--                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="cobrar();">abonar</button>-->
                        <!--                    <button type="button" class="btn btn-primary" id ="btnModalCObrar">abonar</button>-->
                        <!--                    <input type="submit" class="btn btn-primary" id ="btnModalCObrar" value = "cobrar2">-->
                        <button type="button" class="btn btn-primary" id="btnModalCObrar">cobrar</button>
                        <button type="button" id="btnCancelMvent" class="btn btn-default" data-dismiss="modal">
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>