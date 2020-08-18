<?php
include '../../database/conexioni.php';

        //var_dump('entra a producto controller');

//$query= "select codigo, descripcion,costo,precio,proveedor,fecha_caducidad from producto";
$query= "select ventas.id_venta,			
            (select  if( ventas.tipo_venta = 1, 'contado', 'credito')) as estatusConvertido,
            ventas.total_unidades,
            ventas.totalVenta,           
            ventas.cantidad_pagada,           
            ventas.cambio,           
            ventas.id_cliente,           
             (select concat_ws(' ',fecha_venta,hora_venta)) as fechaRegistro           
            from ventas";


    $resultado= $mysqli->query($query);
    $data= $resultado -> fetch_all(MYSQLI_ASSOC);

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
?>



