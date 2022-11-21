<?php
//include 'conexion.php';
include '../../database/conexioni.php';
//var_dump('entra a ajax proveedor');
	$nombreMarca=$_GET['nombreMarca'];
    $query ="insert into marca (nombre_marca) values ('$nombreMarca')";
//die($query);
	echo $rrr=$mysqli->query($query)or die ($mysqli->error);


?>