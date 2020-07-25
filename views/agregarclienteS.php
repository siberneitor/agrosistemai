<?php
include 'header.html';
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Agregar Cliente</title>
    <script src="/js/clientes.js"></script>
</head>

<body>
<div class = "content">
    <div class="form-group">
        <form id="formcliente"  method="GET" accept-charset="utf-8" class="form-horizontal">
            <div class ="form-group row">

                <input type="hidden" name="opcion" id="opcion" value="1">

                <label for ="nombreCliente" class="col-sm-2 col-form-label" >nombre(S)</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control input-sm" id ="nombreCliente" name="nombreCliente" placeholder="Nombre(S) Cliente">
                </div>
            </div>
            <div class ="form-group row">
                <label for="ap_pat" class = "col-sm-2 col-form-label">apellido paterno</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control input-sm" id ="ap_pat"# name="ap_pat" placeholder="apellido paterno">
                </div>
            </div>
            <div class ="form-group row">

                <label for ="ap_mat" class ="col-sm-2 col-form-label">apellido Materno</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control input-sm" id ="ap_mat" name="ap_mat" placeholder="apellido materno">
                </div>
            </div>
            <div class ="form-group row">
                <label for ="domicilio_Clien" class ="col-sm-2 col-form-label">Domicilio</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control input-sm" id ="domicilio_Clien" name="domicilio_Clien" placeholder="Domicilio">
                </div>
            </div>
            <div class ="form-group row">
                <label for ="localidad_Clie" class="col-sm-2 col-form-label">Localidad</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control input-sm" id="localidad_Clie" name="localidad_Clie" placeholder="Localidad">
                </div>
            </div>
            <div class ="form-group row">
                <label for ="telefono_Clien" class="col-sm-2 col-form-label">Telefono</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control input-sm" id ="telefono_Clien" name="telefono_Clien" placeholder="Telefono">
                </div>
            </div>
            <div class ="form-group row">
                <label for ="email_Clien" class="col-sm-2 col-form-label">Email Cliente</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control input-sm" id ="email_Clien" name="email_Clien" placeholder="Email">
                </div>
            </div>

        </form>
        <button class="btn btn-success" id="btnaddclient">crear cliente</button>

    </div>
</div>
</body>
<script>


</script>
</html>