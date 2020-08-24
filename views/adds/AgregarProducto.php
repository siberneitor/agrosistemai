<?php
include '../sources.php';
include '../header.php';

include '../../controllers/AJAX/valoresSelect.php';
include '../adds/modales/modalAddProvee.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Productos</title>

    <!-- Latest compiled and minified JavaScript -->


    <script src="/js/productos.js"></script>
    <script src="/js/proveedor.js"></script>

</head>

<body>
<div class = "content">
    <nav class="navbar navbar-expand-lg navbar bg-light">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="btn btn-outline-secondary" href="/views/menus/tablaProd.php">listado productos</a>
                </li>
                <li class="nav-item">
                    <a class= "btn btn-outline-success" href="/views/menus/tablaInventario.php">Agregar A inventario</a>
                </li>
                <!--            <li class="nav-item">-->
                <!--                <a class= "btn btn-info" href="agregarProv.php">generar reporte</a>-->
                <!--            </li>-->
            </ul>
        </div>
    </nav>
    <br>
    <div class ="form-group ">

        <form id="formAddProd"  method="post" accept-charset="utf-8" class="form-horizontal">

            <div class ="form-group row">

                <label for="addCod" class="col-sm-2 col-form-label">codigo</label>
                <div class="col-sm-3">
                <input type="text" class="form-control input-sm" id ="addCod" name="addCod" placeholder="codigo" autofocus>
            </div>
            </div>
            <div class ="form-group row">

                <label for="addArt" class="col-sm-2 col-form-label">articulo</label>
                <div class="col-sm-3">
                <input type="text" class="form-control input-sm" id ="addArt" name="addArt" placeholder="articulo">
            </div>
            </div>
            <!--
            <div class="form-group row">
                <label for ="addCosto" class="col-sm-2 col-form-label">costo</label>
            <div class ="col-sm-3">
                <input type="text" id ="addCosto" class="form-control input-sm" name="addCosto" placeholder="costo">
            </div>
        </div>

            <div class="form-group row">
                <label for ="addPrecio" class="col-sm-2 col-form-label">precio</label>
                 <div class="col-sm-3">
                    <input type="text" id ="addPrecio" class="form-control input-sm" name="addPrecio" placeholder="precio">
                </div>
            </div>
            -->
            <div class="form-group row">
                <label for ="selectProv" class="col-sm-2 col-form-label">proveedor</label>
                <div class="col-sm-2">
                <select class="form-control input-sm" id="selectProv" name="selectProv">
                    <?php
                    while ($fila = $result->fetch_assoc()){
                        $idProv= $fila["id_proov"];
                        $descProv= $fila["nombre"];

                        echo '<option value="'.$idProv.'">'.$descProv.'</option>';
                    }
                    ?>
                </select>

            </div>
<!--                <a href="agregarProv.php">agregar Proveedor</a>-->
                <a  data-toggle="modal" data-target="#modalAddProvee" href="">agregar Proveedor</a>
            </div>


            <div class="form-group row">
                <div class ="col-sm-4">
                </div>
                <div class ="col-sm-1">
            <button id="btnAddProd" class="btn btn-success">agregar</button>
            </div>
            </div>
                <div class="form-group">
        </form>



        <div class="divR"></div>

    </div>
</div>


</body>

</html>