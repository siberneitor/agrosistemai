<?php
include '../../database/conexioni.php';
include '../funciones.php';

$opcion = $_GET['opcion'];
$fecha_alta = date("Y-m-d");
$fecha_registro = date("Y-m-d H:i:s");

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
$selectCliente=$_GET['selectCliente'];
$interes =0;
if(!empty($_GET['interes'])){$interes=$_GET['interes'];}
//$interes=$_GET['interes'];
$fechaVenc=$_GET['fechaVenc'];
$totalUnidades=$_GET['totalUnidades'];
//$tipoVenta=0;

//var_dump('entra a ajax CREDITOOOO AJAX: $opcion: '.$opcion. ' / '.'$pagoInicial: '.$pagoInicial.'/'.'$estatusCredito: '.$estatusCredito. '/'.'$montoPrestamo: '.$montoPrestamo.'/'.'$selectCliente: '.$selectCliente.'/'.'$interes: '.$interes.'/'.'$fechaVenc: '.$fechaVenc);

$montoApagar = sumarPorcentaje($montoPrestamo,$interes);
$cantidadXpagar=$montoApagar-$pagoInicial;

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
            id_venta
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
             '$getIdVenta'             
             )")or die ($mysqli->error);



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