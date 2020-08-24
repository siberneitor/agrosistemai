<?php

include '../../database/conexioni.php';

//if (isset($_POST['idClienteCred'])){

   //$idClienteCred = $_POST['idClienteCred'];
   $idClienteCred = 3;

    $queryCredXclient ="
 select detalle_credito.id_detalle_credito as idCredDC,
       detalle_credito.id_cliente AS idCLienteDC,
       a.id_detalle_credito as idCredA,
      detalle_credito.cantidad_por_pagar as cantidadIncial,
      (SELECT IFNULL(sum(a.total),0)) AS CONVERTIRCERO,
         (SELECT IFNULL( (select cantidadIncial - sum(a.total)),cantidadIncial)) AS cantidadQdebe
from detalle_credito
left join abono a on detalle_credito.id_detalle_credito = a.id_detalle_credito where detalle_credito.id_cliente = '$idClienteCred' group by detalle_credito.id_detalle_credito, detalle_credito.id_cliente, a.id_detalle_credito

";
    $resultCredXcliente = $mysqli->query($queryCredXclient) or die ($mysqli->error);

//}


$query ="select id_proov,nombre from proveedores order by  nombre asc";
$result = $mysqli->query($query);

$queryprov ="select id_proov,nombre from proveedores order by  nombre asc";
$resultprov = $mysqli->query($queryprov);

$queryprov2 ="select id_proov,nombre from proveedores order by  nombre asc";
$resultprov2 = $mysqli->query($queryprov2);

$queryGetClientes ="select id_cliente,nombre,apellido_paterno,apellido_materno from cliente where id_cliente !=1 order by apellido_paterno asc";
$resultGetClientes = $mysqli->query($queryGetClientes);

$queryGetProds ="select codigo,descripcion from producto order by descripcion asc";
$resultGetProds = $mysqli->query($queryGetProds);


$queryClientCred ="
select  distinct (cliente.nombre),  
cliente.apellido_paterno,
cliente.apellido_materno,
 detalle_credito.estatus_credito,
 cliente.id_cliente
 from detalle_credito
 join cliente on cliente.id_cliente = detalle_credito.id_cliente 
 and estatus_credito != 0
  AND cliente.id_cliente !=1 order by cliente.apellido_paterno";
$resultClientCred = $mysqli->query($queryClientCred);


?>
