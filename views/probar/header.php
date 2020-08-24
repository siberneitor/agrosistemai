<?php
session_start();
if (!isset($_SESSION['user'])){
    header('Location: /views/login.php');

}else{
    //print $_SESSION['user'];
    //print 'RATON';
}


?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="icon"  type="image/png" href="/images/iconoventa.png">
</head>

     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ">
                <li class="nav-item">
                    <a class="nav-link" href="/views/menus/puntoVenta.php">Punto-Venta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/views/menus/tablaProd.php">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/views/menus/tablaInventario.php">inventario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/views/menus/tablaClientes.php">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/views/menus/creditos.php">Creditos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/views/menus/reportes.php">Reportes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/views/menus/administracion.php">Administracion</a>
                </li>


            </ul>
            <div class = "col-1">

            </div>
            <div class ="col-2">
                <label id ="lblUser" class="text-light lblUser" href="/views/login.php?cerrar=1">bienvenido <strong><?php echo ' '.$_SESSION['user']?></strong></label>
            </div>
            <div class ="col-1">
                <a class="btn btn-default btn-sm nav-link war" href="/views/login.php?cerrar=1"><span class="glyphicon glyphicon-log-out"></span>salir</a>
            </div>
        </div>
    </nav>
    <div class = "row">
        <div class = "col-12 labelPVtitulo">
            <label class ="lbTitulo" id ="titulos"></label>
        </div>
    </div>
</html>
