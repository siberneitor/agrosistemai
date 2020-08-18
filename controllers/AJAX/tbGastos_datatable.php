<?php
include '../../database/conexioni.php';

        //var_dump('entra a producto controller');

//$query= "select codigo, descripcion,costo,precio,proveedor,fecha_caducidad from producto";
$query= " select gastos.id_nota_compra,
			 proveedores.nombre,
            gastos.total,
            gastos.fecha_alta           
            from gastos
            JOIN proveedores ON gastos.id_proov = proveedores.id_proov;       
        ";
    $resultado= $mysqli->query($query);
    $data= $resultado -> fetch_all(MYSQLI_ASSOC);

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
?>



