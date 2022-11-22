<?php
include '../../database/conexioni.php';
include '../funciones.php';

$dtz = new DateTimeZone("America/Mexico_City");
$dt = new DateTime("now", $dtz);
//$fechaActual = date("Y-m-d");
//$fechaActual = $dt->format('Y-m-d');
//var_dump($dt->format('Y-m-d'));

//$fechaHoraActual = date("Y-m-d H:i:s");
//$fechaHoraActual = $dt->format("Y-m-d H:i:s");


$opcion = $_GET['opcion'];
$fecha_alta =  $dt->format('Y-m-d');
$fecha_registro =  $dt->format("Y-m-d H:i:s");

$pagoInicial =0;
//$fechaUltimoPago=NULL;

//se asigna valor de pago inicial si existe
if(isset($_GET['pagoInicial']) && !empty($_GET['pagoInicial'])){
    $pagoInicial=$_GET['pagoInicial'];
    $fechaUltimoPago=$fecha_alta;
}

$estatusCredito=$_GET['estatusCredito'];
$montoPrestamo=$_GET['montoPrestamo'];
//$montoApagar=$_GET['montoApagar'];

$tipoCredito=$_GET['radioTCredito'];
$garantia=$_GET['garantia'];
$selectCliente=$_GET['selectCliente'];
$interes =0;
if(!empty($_GET['interes'])){$interes=$_GET['interes'];}
//$interes=$_GET['interes'];
$fechaVenc=$_GET['fechaVenc'];
$totalUnidades=$_GET['totalUnidades'];
//$tipoVenta=0;

//var_dump('entra a ajax CREDITOOOO AJAX: $opcion: '.$opcion. ' / '.'$pagoInicial: '.$pagoInicial.'/'.'$estatusCredito: '.$estatusCredito. '/'.'$montoPrestamo: '.$montoPrestamo.'/'.'$selectCliente: '.$selectCliente.'/'.'$interes: '.$interes.'/'.'$fechaVenc: '.$fechaVenc);

$montoApagar = $montoPrestamo - $pagoInicial;
//$cantidadXpagar=sumarPorcentaje($montoApagar,$interes);
$cantidadXpagar=$montoApagar;

switch($opcion){
    case 1:


        

//        $queryInsertCredito = "insert into credito (fecha_registro,fecha_vencimiento,estatus_credito,id_cliente)
//        values ('$fecha_registro','$fechaVenc','$estatusCredito','$selectCliente')
// ";
//        $ejecQueryInsertCredito = $mysqli->query($queryInsertCredito) or die($mysqli->error);
//
//        //se asigna el id venta de acuerdo al ultimo registro ingresado en tabla ventas
//        $queryGetIdCred = "select id_credito from credito where id_cliente = '$selectCliente'";
//        $ejecQueryGetIdCred = $mysqli->query($queryGetIdCred) or die($mysqli->error);
//        $arrayGetIdCred = $ejecQueryGetIdCred->fetch_assoc();
//        $idCredito = $arrayGetIdCred['id_credito'];

        //se asigna el id venta de acuerdo al ultimo registro ingresado en tabla ventas
        $queryGetIdVenta = "select MAX(id_venta) as idVenta from ventas";
        $ejecQueryGetIdVenta = $mysqli->query($queryGetIdVenta) or die($mysqli->error);
        $arrayGetIdVenta = $ejecQueryGetIdVenta->fetch_assoc();
        $getIdVenta = $arrayGetIdVenta['idVenta'];





        echo $rrr=$mysqli->query("insert into detalle_credito (
            fecha_inicio,
            dias_plazo,
            interes,
            fecha_vencimiento,
            monto_prestado,
            monto_total,
            cantidad_abonada,
            cantidad_por_pagar,
            id_cliente,
            fecha_registro,
            estatus_credito,
            id_venta,
                             tipo_credito,
                             garantia
            )
             values (
             '$fecha_alta',
                 (SELECT DATEDIFF('$fechaVenc', '$fecha_alta')),
             '$interes',
             '$fechaVenc',
             '$montoPrestamo',
             '$montoApagar',
             '$pagoInicial',
             '$cantidadXpagar',
             '$selectCliente',
             '$fecha_registro',
             '$estatusCredito',
             '$getIdVenta',
                     $tipoCredito,
                     $garantia
             )")or die ($mysqli->error);

//        $queryGetIdVenta = "select MAX(id_detalle_credito) as idCredito from detalle_credito";
        $ejecQueryGetIdCredito = $mysqli->query('select MAX(id_detalle_credito) as idCredito from detalle_credito') or die($mysqli->error);
        $arrayGetIdCredito = $ejecQueryGetIdCredito->fetch_assoc();
        $getIdCredito = $arrayGetIdCredito['idCredito'];

        //se obtiene la cantidad actual que debe el cliente de cuerdo al ultimo movimiento
        $sql2= $mysqli->query("select deuda from movimientos where idMovimiento = (select max(idMovimiento) from movimientos where id_cliente = '$selectCliente')") or die($mysqli->error);
        $arrayGetDeuda = $sql2->fetch_assoc();
        if(isset($arrayGetDeuda['deuda'])){
            $getDeuda = $arrayGetDeuda['deuda'];
        }else{
            $getDeuda =0;
        }

        $deuda = $getDeuda + $montoPrestamo;


        $sql = $mysqli->query("insert into movimientos (id_cliente,fecha,tipoMovimiento,cantidad,id_detalle_credito,id_venta,deuda) values ('$selectCliente','$fecha_registro',1,'$montoPrestamo','$getIdCredito','$getIdVenta','$deuda')") or die($mysqli->error);

        if($pagoInicial){
            $cantidadAbonoInicial = $deuda - $pagoInicial;
            $sql = $mysqli->query("insert into movimientos (id_cliente,fecha,tipoMovimiento,cantidad,id_detalle_credito,id_venta,id_abono,deuda) values ('$selectCliente','$fecha_registro',2,'$pagoInicial','$getIdCredito','$getIdVenta',0,$cantidadAbonoInicial)") or die($mysqli->error);
       }



//        //se obtiene total de deuda
////        $queryTotalDeuda = "select SUM(cantidad_por_pagar) as totalDeuda from detalle_credito where id_credito = '$idCredito'";
////        $ejecQueryTotalDeuda = $mysqli->query($queryTotalDeuda) or die($mysqli->error);
////        $arrayGetTotalDeuda = $ejecQueryTotalDeuda->fetch_assoc();
////        $cantidadTotalXpagar = $arrayGetTotalDeuda['totalDeuda'];
////
////
////        //se obtiene tota lde abonos dados
////        $queryTotalAbonos = "select SUM(total) as totalAbonos from abono where id_credito = '$idCredito'";
////        $ejecQueryTotalAbonos = $mysqli->query($queryTotalAbonos) or die($mysqli->error);
////        $arrayGetTotalAbonos = $ejecQueryTotalAbonos->fetch_assoc();
////        $totalAbonos = $arrayGetTotalAbonos['totalAbonos'];
////
////
////
////
////        $deuda = $cantidadTotalXpagar - $totalAbonos;
////
////
////        $queryUpdateMTP = "update credito set montoTotalPrestado = (select SUM(cantidad_por_pagar) from detalle_credito where id_cliente ='$selectCliente')
////        where id_credito = 1";




        //$ejecQueryInsertCredito = $mysqli->query($queryInsertCredito) or die($mysqli->error);


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