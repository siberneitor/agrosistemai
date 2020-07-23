<?php
include 'header.html';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Clientes</title>
    <script src="/js/clientes.js"></script>

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
                <a class="nav-link" href="agregarclienteS.php">Agregar Cliente</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="agregarProv.php"></a>
            </li>

        </ul>
    </div>
</nav>


<table id ="tbClientes">
    <thead class="text-center">
    <tr>
        <th>id_cliente</th>
        <th>nombre</th>
        <th>apellido_paterno</th>
        <th>apellido_materno</th>
        <th>domicilio</th>
        <th>localidad</th>
        <th>telefono</th>
        <th>email</th>
        <th>fecha_alta</th>
        <th>credito_actual</th>
        <th>estatus credito</th>
        <th>acciones</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>
</body>

</html>