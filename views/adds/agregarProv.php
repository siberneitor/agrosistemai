<?php
include '../sources.php';
include '../header.php';


?>
<!DOCTYPE html>
<html>
<head>
    <title>Proveedores</title>

    <!-- Latest compiled and minified JavaScript -->


    <script src="/js/proveedor.js"></script>

</head>

<body>
<nav class="navbar navbar-expand-lg navbar bg-light">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="btn btn-outline-secondary" href="/views/menus/tablaProd.php">listado productos</a>
            </li>

        </ul>
    </div>
</nav>
<br>
<div class = "container">

    <div class ="form-group">

        <form id="formProv"  method="get" accept-charset="utf-8" class="form-horizontal">

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
            <br>
            <div class="form-group row">
                <div class ="col-3">
                </div>

                <div class ="col-1">
                    <button id="btnAddProv" class="btn btn-success">agregar</button>
                </div>
            </div>
            <div class="form-group">
        </form>
    </div>
</div>
</body>

</html>