<?php
include 'header.html';


?>
<!DOCTYPE html>
<html>
<head>
    <title>Proveedores</title>

    <!-- Latest compiled and minified JavaScript -->


    <script src="/js/productos.js"></script>

</head>

<body>
<div class = "container">
    <a href="tablaProd.php">lista productos</a>
    <div class ="form-group">

        <form id="formProv"  method="post" accept-charset="utf-8" class="form-horizontal">

            <div class ="form-group row">

                <label for="nombreProv" class="col-sm-2 col-form-label">nombre</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control input-sm" id ="nombreProv" name="nombreProv" placeholder="nombre" autofocus>
                </div>
            </div>
            <div class ="form-group row">
                <label for="adressProv" class="col-sm-2 col-form-label">domicilio</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control input-sm" id ="adressProv" name="adressProv" placeholder="domicilio">
                </div>
            </div>
            <div class="form-group row">
                <label for ="telefonoProv" class="col-sm-2 col-form-label">telefono</label>
                <div class ="col-sm-3">
                    <input type="text" id ="telefonoProv" class="form-control input-sm" name="telefonoProv" placeholder="telefono">
                </div>
            </div>
            <div class="form-group row">
                <label for ="emailProv" class="col-sm-2 col-form-label">email</label>
                <div class="col-sm-3">
                    <input type="text" id ="emailProv" class="form-control input-sm" name="emailProv" placeholder="email">
                </div>
            </div>
            <div class="form-group row">
                <label for="responsProv" class="col-sm-2 col-form-label">responsable</label>
                <div class ="col-sm-3">
                    <input type="text" id ="responsProv" class="form-control input-sm" name="responsProv" placeholder="responsable">
                </div>
            </div>
            <div class="form-group row">
                <div class ="col-sm-6">
                    <button id="btnAddProv" class="btn btn-success">agregar</button>
                </div>
            </div>
            <div class="form-group">
        </form>
    </div>
</div>
</body>

</html>