<?php
include '../../database/conexioni.php';

        //var_dump('entra a TBCREDXCLIENT');
$opcion = $_POST['opcion'];
$idClienteCred = $_POST['idClienteCred'];

//var_dump('valor opcion:'.$opcion.'<- termina valor opcion');

//$consulta =" select detalle_credito.id_detalle_credito as idCredDC,
//       detalle_credito.id_cliente AS idCLienteDC,
//       a.id_detalle_credito as idCredA,
//        detalle_credito.id_venta as idVenta,
//        detalle_credito.fecha_inicio as fechaInicio,
//        detalle_credito.fecha_vencimiento fVencimiento,
//        detalle_credito.monto_prestado as montoPrestado,
//            detalle_credito.interes as Interes,
//        detalle_credito.cantidad_abonada as pagoInicial,
//
//
//      detalle_credito.cantidad_por_pagar as cantidadInicial,
//      (SELECT IFNULL(sum(a.total),0)) AS CONVERTIRCERO,
//         (SELECT IFNULL( (select cantidadInicial - sum(a.total)),cantidadInicial)) AS cantidadQdebe
//from detalle_credito
//left join abono a on detalle_credito.id_detalle_credito = a.id_detalle_credito
//where detalle_credito.id_cliente = '$idClienteCred'
//group by detalle_credito.id_detalle_credito, detalle_credito.id_cliente, a.id_detalle_credito
//having cantidadQdebe > 0
//
//
//";

$consulta ="
select detalle_credito.id_detalle_credito as idCredDC,
       detalle_credito.id_cliente AS idCLienteDC,
       a.id_detalle_credito as idCredA,
        detalle_credito.id_venta as idVenta,
        detalle_credito.fecha_inicio as fechaInicio,
        detalle_credito.fecha_vencimiento fVencimiento,
        detalle_credito.monto_prestado as montoPrestado,
                                                     (SELECT TIMESTAMPDIFF(DAY, fecha_inicio, now())) * 0.0712   AS InteresXdias,
        detalle_credito.cantidad_abonada as pagoInicial,
      detalle_credito.cantidad_por_pagar as cantidadInicial,
                (SELECT montoPrestado - pagoInicial) AS montoMenosPI,
#       (SELECT IFNULL(sum(a.total),0)) AS CONVERTIRCERO,
      (SELECT IFNULL(sum(a.total),0)) AS totalAbonos,
         (SELECT IFNULL((select montoPrestado - sum(a.total)),montoPrestado) - pagoInicial) AS cantidadQdebe,
              (SELECT (SELECT IFNULL((select montoMenosPI - sum(a.total)),montoMenosPI)) * InteresXdias /100) as interesEnDinero,
        (SELECT TRUNCATE((select montoMenosPI  * InteresXdias /100) + IFNULL((select montoPrestado - sum(a.total)),montoPrestado) - pagoInicial,2))as cantidadMasInteres

                                               ,IF(tipo_credito=1,'Maiz', 'Agroins') tipo_credito

from detalle_credito
left join abono a on detalle_credito.id_detalle_credito = a.id_detalle_credito
where detalle_credito.id_cliente = '$idClienteCred'
group by detalle_credito.id_detalle_credito, detalle_credito.id_cliente, a.id_detalle_credito
having cantidadQdebe > 0
";

switch($opcion){
    case 1:
       // var_dump('entra a opcion 1');
       // $condicion = " HAVING cantidadQdebe >0";

    break;

    case 0:
       // var_dump('entra a opcion 0');
       // $condicion = " HAVING cantidadQdebe =0";
       break;


 }

//$consulta = $consulta.$condicion;

    $resultado= $mysqli->query($consulta) or die($mysqli->error);


    $data= $resultado -> fetch_all(MYSQLI_ASSOC);

   // var_dump($data['cantidadQdebe']);

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
?>



