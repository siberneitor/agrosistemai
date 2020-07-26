<?php
include '../../database/conexioni.php';

        //var_dump('entra a producto controller');

//$query= "select codigo, descripcion,costo,precio,proveedor,fecha_caducidad from producto";
$query= "select producto.codigo,
	 producto.descripcion,
	 producto.costo,
	 producto.precio,
     proveedores.nombre as proveedor,
	 producto.fecha_caducidad	 
 from producto
 join proveedores on producto.id_proov = proveedores.id_proov";
    $resultado= $mysqli->query($query);
    $data= $resultado -> fetch_all(MYSQLI_ASSOC);

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
?>



