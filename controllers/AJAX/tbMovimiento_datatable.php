<?php
include '../../database/conexioni.php';

$cliente = $_POST['idCliente'];

$resultado= $mysqli->query("select idMovimiento,id_cliente,fecha,(SELECT IF(tipoMovimiento = 1, 'Venta a credito', 'Abono')) tipoMov,cantidad,id_detalle_credito,id_venta,(SELECT IFNULL(id_abono,'N/A')) abono ,deuda from movimientos where id_cliente = $cliente");
$data= $resultado -> fetch_all(MYSQLI_ASSOC);

   // var_dump($data['cantidadQdebe']);

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
?>



