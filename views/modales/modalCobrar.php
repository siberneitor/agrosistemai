<div>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <form id ="formModalCobrar">
                    <div class="modal-header">
                        <h4 class="modal-title">VENTANA COBRAR</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                        <!--                    <form id ="formRadioTpV">-->
                        <strong>
                            <div class = "form-inline ">

                                <div class ="form-control">
                                    <label for="radioTipoVenta"  class="form-check-label">credito</label><br>
                                    <input class="form-check-input" type="radio" id="radioTipoVenta" name="radioTipoVenta" value="0" required>
                                </div>

                                <div class ="form-control">
                                    <label for="radioTipoVenta2" class="form-check-label" >contado</label><br>
                                    <input type="radio"  class="form-check-input"  id="radioTipoVenta2" name="radioTipoVenta" value="1" required>
                                </div>


                            </div>


                        </strong>
                        <!--                    </form>-->

                        <div id ="inputsVentaContado">
                            <!--                    <form id ="formCobrarContado">-->
                            <p></p>
                            <strong>
                                <h6></h6>
                                <p></p>
                                <label>Cantidad Recibida:</label>
                                <!--                        <div class="col-md-6 form-group">-->
                                <div class="form-group">
                                    <input type="number" id="txtcambio"  name="txtcambio"  class ="form-control-sm"  autofocus/>
                                    <!--                        </div>-->
                                </div>
                                <h5></h5>

                            </strong>
                            <!--                    </form>-->
                        </div>

                        <!--inicia inputs credito -->
                        <div id ="divInputsCredito" class = "form-group">
                            <h6></h6>
                            <div class="form-group row">
                                <label for="txtAbonoInicial" class="col-sm-2 col-form-label">Abono inicial</label>
                                <div class="col-sm-3">
                                <input type="text" id="txtAbonoInicial" name ="txtAbonoInicial" autofocus class ="form-control-sm"/>
                                </div>
                                </div>
                            <div class="form-group row">
                                <label for="interesVenta" class="col-sm-2 col-form-label">Interes</label>
                                <div class="col-sm-3">
                                <input type="text" name="interesVenta" id="interesVenta" class ="form-control-sm">
                                </div>
                                </div>
                            <div class="form-group row">
                                <label for="fVencVenta" class="col-sm-2 col-form-label">Fecha Limite</label>
                                <div class="col-sm-3">
                                <input type="date" name ="fVencVenta" id="fVencVenta"  class ="form-control-sm" required/>

                                </div>
                                </div>

                        </div>
                        <!-- termina inputs credito-->

                    </div>
                    <div class="modal-footer">
                        <!--                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="cobrar();">abonar</button>-->
                        <!--                    <button type="button" class="btn btn-primary" id ="btnModalCObrar">abonar</button>-->
                        <!--                    <input type="submit" class="btn btn-primary" id ="btnModalCObrar" value = "cobrar2">-->
                        <button type="button" class="btn btn-primary" id ="btnModalCObrar">cobrar</button>
                        <button type="button" id ="btnCancelMvent" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>