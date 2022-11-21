<?php
///die('AGREGARABONO');
include '../../database/conexioni.php';
include '../funciones.php';

$opcion = $_GET['opcion'];
$dtz = new DateTimeZone("America/Mexico_City");
$dt = new DateTime("now", $dtz);
//$fechaActual = date("Y-m-d");
$fechaActual = $dt->format('Y-m-d');
//var_dump($dt->format('Y-m-d'));

//$fechaHoraActual = date("Y-m-d H:i:s");
$fechaHoraActual = $dt->format("Y-m-d H:i:s");
//$fecha_alta = date("Y-m-d");
$fecha_alta = $fechaActual;
//$fecha_registro = date("Y-m-d H:i:s");
$fecha_registro = $fechaHoraActual;

//$pagoInicial =0;
//$fechaUltimoPago=NULL;

$tipoAbono = $_GET['tipoAbono'];

$cantidadAbonada=$_GET['cantidadAbonada'];
$selectCliente=$_GET['selectClienteCred'];
$idCreditoAbono=$_GET['inputNocred'];

//var_dump($cantidadAbonada.'/'.$idCreditoAbono.'/'.$selectCliente);
try {


switch($opcion){
    case 1:
        //se agregan datos a tabla abono
        $queryInsertAbono = "insert into abono (fechaAbono,cantidad,total,id_detalle_credito,id_cliente)
        values ('$fecha_registro','$cantidadAbonada','$cantidadAbonada','$idCreditoAbono',$selectCliente)";
        $ejecQueryInsertAbono = $mysqli->query($queryInsertAbono) or die($mysqli->error);


        //se obtiene id del ultimo abono agregado
        $queryGetIdAbono = "select MAX(id_abono) as idAbono from abono";
        $ejecQueryGetIdAbono = $mysqli->query($queryGetIdAbono) or die($mysqli->error);
        $arrayGetIdAbono = $ejecQueryGetIdAbono->fetch_assoc();
        $getIdAbono = $arrayGetIdAbono['idAbono'];

        //se obtiene la cantidad actual que debe el cliente de cuerdo al ultimo movimiento
        $sql2= $mysqli->query("select deuda from movimientos where idMovimiento = (select max(idMovimiento) from movimientos where id_cliente = '$selectCliente')") or die($mysqli->error);
        $arrayGetDeuda = $sql2->fetch_assoc();
        $getDeuda = $arrayGetDeuda['deuda'];
        $deuda = $getDeuda - $cantidadAbonada;

        $sqlMovimento = $mysqli->query("insert into movimientos (id_cliente,fecha,tipoMovimiento,cantidad,id_detalle_credito,id_abono,deuda) values ('$selectCliente','$fecha_registro',2,'$cantidadAbonada','$idCreditoAbono','$getIdAbono','$deuda')") or die($mysqli->error);


        //se obitiene el monto a pagar para ese credito en especifico
        $queryGetMontoApagar = "select cantidad_por_pagar from detalle_credito where id_detalle_credito = '$idCreditoAbono'";
        $ejecQueryGetMontoApagar = $mysqli->query($queryGetMontoApagar) or die($mysqli->error);
        $arrayGetMontoApagar = $ejecQueryGetMontoApagar->fetch_assoc();
        $montoAPagar = $arrayGetMontoApagar['cantidad_por_pagar'];

        //se obitene la cantidad abonada para ese credito en especifico.
        $sqlTotalXCred ="select SUM(total)as totalXcredito from abono where id_detalle_credito = '$idCreditoAbono'";
        $ejecQueryTotalXCred = $mysqli->query($sqlTotalXCred) or die($mysqli->error);
        $arrayTotalXCred = $ejecQueryTotalXCred->fetch_assoc();
        $totalXcredito = $arrayTotalXCred['totalXcredito'];

        $montoDeudaActual= $montoAPagar -  $totalXcredito;

        //se agregan datos a tabla historial_pago_creditos
        $queryInsertHistPagos = "insert into historial_pago_creditos (id_abono,id_detalle_credito,monto_por_pagar)
        values ('$getIdAbono','$idCreditoAbono','$montoDeudaActual')";
        $ejecQueryInsertAbono = $mysqli->query($queryInsertHistPagos) or die($mysqli->error);

        if($montoDeudaActual == 0){
            $queryFinalizarCred = "update detalle_credito set estatus_credito = 0 
            where id_detalle_credito = '$idCreditoAbono'";
            $ejecQueryFinaliCred =$mysqli->query($queryFinalizarCred) or die ($mysqli->error);
        }
        if (!$mysqli->error){
            echo 1;
//            die('salio bien');
        }else{
//            die($mysqli->error);
        }
    break;
    case 2:
        break;
}
}catch(Exception $e){
die($e->getMessage());
}
?>