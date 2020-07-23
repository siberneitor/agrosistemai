<?php
include 'header.html';
include 'modalAddProd.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Productos</title>
    <script src="/js/productos.js"></script>



</head>
<body>
<!--
<label>PRODUCTOS</label>
	<p>
	<form id="form1"  method="post" accept-charset="utf-8" class="form-horizontal">
		<div class="form-group">
		<label class="col-sm-2 control-label">codigo</label>
		<input type="text" class="text1" name="txt1" placeholder="codigo" autofocus>
		<p>
		<label class="col-sm-2 control-label">articulo</label>
		<input type="text" class="text2" name=txt2 placeholder="articulo">
		<p>
		<label class="col-sm-2 control-label">costo</label>
		<input type="text" class="text3" name="txt3" placeholder="costo">
		<p>
		<label class="col-sm-2 control-label">precio</label>
		<input type="text" class="text4" name="txt4" placeholder="precio">
		<p>
		<label class="col-sm-2 control-label">proveedor</label>
		<input type="text" class="text5" name="txt5" placeholder="proveedor">
<p></p>
		<label class="col-sm-2 control-label">fecha caducidad</label>
		<input type="text" class="text6" name="txt6" placeholder="fecha caducidad">
		</div>
	</form>
	<button class="btn btn-success">agregar</button>
	<p>
	<div class="divR"></div>
-->
<nav class="navbar navbar-expand-lg navbar bg-light">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="AgregarProducto.php">Agregar Producto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="agregarProv.php">Agregar Proveedor</a>
            </li>

        </ul>
    </div>
</nav>


<table id ="tbAddProd">
    <thead class="text-center">
    <tr>
        <th>codigo</th>
        <th>descripcion</th>
        <th>costo</th>
        <th>precio</th>
        <th>proveedor</th>
        <th>fecha_caducidad</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>
</body>

</html>