<?php
include '../../database/conexioni.php';
include '../funciones.php';

$opcion = $_GET['opcion'];
$fecha_alta = date("Y-m-d");
$fecha_registro = date("Y-m-d H:i:s");

//$pagoInicial =0;
//$fechaUltimoPago=NULL;

$tipoAbono = $_GET['tipoAbono'];



$cantidadAbonada=$_GET['cantidadAbonada'];
$selectCliente=$_GET['selectClienteCred'];
$idCreditoAbono=$_GET['inputNocred'];

//var_dump($cantidadAbonada.'/'.$idCreditoAbono.'/'.$selectCliente);


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
        }



    break;
    case 2:

        break;


}
?>