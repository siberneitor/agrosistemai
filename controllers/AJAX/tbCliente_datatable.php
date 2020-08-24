<?php
include '../../database/conexioni.php';

        //var_dump('entra a producto controller');

//$query= "select codigo, descripcion,costo,precio,proveedor,fecha_caducidad from producto";
$query= " select 
		id_cliente,
        nombre,
        apellido_paterno,
        apellido_materno,
        domicilio,
        localidad,
        telefono,
        email,
        fecha_alta,
        credito_actual,
        estatus_credito_actual
    from cliente where id_cliente !=1  
        ";
    $resultado= $mysqli->query($query);
    $data= $resultado -> fetch_all(MYSQLI_ASSOC);

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
?>



