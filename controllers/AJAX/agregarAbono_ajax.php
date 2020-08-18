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
$selectCliente=$_GET['selectCliente'];
$idCreditoAbono=$_GET['idCreditoAbono'];
//$selectCliente=$_GET['selectCliente'];
//$interes=$_GET['interes'];
//$fechaVenc=$_GET['fechaVenc'];
//$totalUnidades=$_GET['totalUnidades'];
////$tipoVenta=0;

//var_dump('entra a ajax ABONO: $opcion: '.$opcion. ' / '.'$cantidadAbonada: '.$cantidadAbonada.'/'.'$selectCliente: '.$selectCliente. '/'.'$idCreditoAbono: '.$idCreditoAbono.'/'.'$selectCliente: '.$selectCliente.'/'.'$interes: '.$interes.'/'.'$fechaVenc: '.$fechaVenc);

//$montoApagar = sumarPorcentaje($montoPrestamo,$interes);
//$cantidadXpagar=$montoApagar-$pagoInicial;

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

        if (!$mysqli->error){
            echo 1;
        }

//        $queryExisteCredito="select id_detalle_credito from historial_pago_creditos where id_detalle_credito= '$idCreditoAbono'";
//        $ejecQueryExisteCredito = $mysqli->query($queryExisteCredito) or die($mysqli->error);
//        $existeCredito = $ejecQueryExisteCredito->num_rows;
//
//        if(empty($existeCredito)){
//
//        }




//        $montoApagarAct = $montoAPagar - $cantidadAbonada;
//
//        $queryInsertHistCred = "insert into historial_credito (id_Abono,cantidad_por_pagar)
//        values ('$idAbono','$montoApagarAct')";
//        $ejecQueryHistCred = $mysqli->query($queryInsertHistCred) or die($mysqli->error);
//
//        $queryUpdateMontoApagar ="update credito set monto_a_pagar  ='$montoApagarAct' where id_credito ='$idCredito'";
//        $ejecQueryMontoApagar = $mysqli->query($queryUpdateMontoApagar) or die($mysqli->error);


        //var_dump('HACE NUEVOS QUERYS  y el error es:  ' .$mysqli->error . 'TERMINA EWRROR' );



//        //se asigna el id venta de acuerdo al ultimo registro ingresado en tabla ventas
//        $queryGetIdVenta = "select MAX(id_venta) as idVenta from ventas";
//        $ejecQueryGetIdVenta = $mysqli->query($queryGetIdVenta) or die($mysqli->error);
//        $arrayGetIdVenta = $ejecQueryGetIdVenta->fetch_assoc();
//        $getIdVenta = $arrayGetIdVenta['idVenta'];
//
//
//
//
//
//        echo $rrr=$mysqli->query("insert into detalle_credito (
//            fecha_inicio,
//            dias_plazo,
//            interes,
//            fecha_vencimiento,
//            monto_prestado,
//            monto_total,
//            cantidad_abonada,
//            cantidad_por_pagar,
//            id_cliente,
//            fecha_registro,
//            estatus_credito,
//            id_venta,
//            id_credito)
//             values (
//             '$fecha_alta',
//             (SELECT DATEDIFF('$fechaVenc', '$fecha_alta')),
//             '$interes',
//             '$fechaVenc',
//             '$montoPrestamo',
//             '$montoApagar',
//             '$pagoInicial',
//             '$cantidadXpagar',
//             '$selectCliente',
//             '$fecha_registro',
//             '$estatusCredito',
//             '$getIdVenta',
//             '$idCredito'
//             )")or die ($mysqli->error);

    break;
    case 2:
//
//        $consulta =$mysqli->query(" select id_proov from proveedores where nombre = '$selectProvGasto' ") or die ($mysqli->error);
//        $result = $consulta->fetch_assoc();
//        $idProov=$result['id_proov'];
//        //var_dump('$totalCompra: '.$totalCompra);
//
//        $rrr=$mysqli->query("
//                update gastos
//        set
//         id_proov='$idProov',
//         total ='$totalCompra'
//         where id_nota_compra= '$idNotaCompra'
//         ")or die($mysqli->error);
//        var_dump('$mysqli->error: '.$mysqli->error);
        break;

//        $rrr=$mysqli->query("
//               update gastos set total = '$totalCompra' where id_nota_compra ='$idNotaCompra';
//         ")or die($mysqli->error);


}
?>