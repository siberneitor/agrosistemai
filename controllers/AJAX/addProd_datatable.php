<?php
include '../../database/conexioni.php';

/*
$query= "select producto.codigo,
	 producto.descripcion,
	 producto.costo,
	 producto.precio,
     proveedores.nombre as proveedor,
	 producto.fecha_caducidad	 
 from producto
 join proveedores on producto.id_proov = proveedores.id_proov";
*/

$query="select producto.codigo,
producto.descripcion,
inventario.costo,
inventario.precio,
proveedores.nombre proveedor,
inventario.fecha_caducidad
from inventario
 join producto ON producto.codigo = inventario.codigo
 join proveedores ON producto.id_proov = proveedores.id_proov;
";

    $resultado= $mysqli->query($query);
    $data= $resultado -> fetch_all(MYSQLI_ASSOC);

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
?>



