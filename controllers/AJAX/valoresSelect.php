<?php
//include 'header.html';
include '../database/conexioni.php';

$query ="select id_proov,nombre from proveedores order by  nombre asc";
$result = $mysqli->query($query);

$queryprov ="select id_proov,nombre from proveedores order by  nombre asc";
$resultprov = $mysqli->query($queryprov);


$queryGetClientes ="select id_cliente,nombre,apellido_paterno,apellido_materno from cliente order by nombre asc";
$resultGetClientes = $mysqli->query($queryGetClientes);

$queryGetProds ="select codigo,descripcion from producto order by descripcion asc";
$resultGetProds = $mysqli->query($queryGetProds);


?>
