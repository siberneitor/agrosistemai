<?php
include '../sources.php';
include '../header.php';
include '../../controllers/variables.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inventario</title>
    <!-- Latest compiled and minified JavaScript -->
    <script src="/agrosistemai/js/inventario.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="btn btn-outline-secondary" href="/agrosistemai/views/menus/tablaInventario.php">listado Inventario</a>
            </li>
        </ul>
    </div>
</nav>
<div class = "content">
    <!--    <a href="tablaInventario.php">lista inventario</a>-->
    <div class ="form-group">
        <form id="formAddInv"  method="post" accept-charset="utf-8" class="form-horizontal">
            <div class ="form-group row">
                <label for="addCodInv" class="col-sm-2 col-form-label">codigo</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control input-sm" id ="addCodInv" name="addCodInv" placeholder="codigo" autofocus>
                </div>
            </div>
            <div class ="form-group row">
                <label for="addUnidInv" class="col-sm-2 col-form-label">unidades</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control input-sm" id ="addUnidInv" name="addUnidInv" placeholder="unidades">
                </div>
            </div>
            <div class="form-group row">
                <label for ="addCostoInv" class="col-sm-2 col-form-label">costo</label>
                <div class ="col-sm-3">
                    <input type="text" id ="addCostoInv" class="form-control input-sm" name="addCostoInv" placeholder="costo">
                </div>
            </div>
            <div class="form-group row">
                <label for ="addPrecioInv" class="col-sm-2 col-form-label">precio</label>
                <div class="col-sm-3">
                    <input type="text" id ="addPrecioInv" class="form-control input-sm" name="addPrecioInv" placeholder="precio" >
                </div>
            </div>
            <div class="form-group row">
                <label for="addFcad" class="col-sm-2 col-form-label">fecha caducidad</label>
                <div class ="col-sm-3">
                    <!-- inicia checkbox -->
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="checkboxFcadInv">
                        <label class="form-check-label" for="addFcad">Activar</label>
                    </div>
                    <!-- termina checkbox -->
                    <!-- <input type="text" id ="addFcad" class="form-control input-sm" name="addFcad" placeholder="(yyyy/mm/dd)"> -->
                    <input type="date" id="addFcad" name="addFcad"
                           min="<?php echo $fechaActual ?>" max="2030-12-31">
                </div>
            </div>
            <div class="form-group row">
                <label for="addIdGasto" class="col-sm-2 col-form-label">No. nota compra</label>
                <div class ="col-sm-3">
                    <input type="text" id ="addIdGasto" class="form-control input-sm" name="addIdGasto" placeholder="No. nota compra">
                </div>
            </div>
            <div class="form-group row">
                <div class ="col-4"></div>
                <div class ="col-1">
                    <button id="btnAddInv" class="btn btn-success">agregar</button>
                </div>
            </div>
        </form>
        <div class="divR"></div>
    </div>
</div>
</body>
</html>
