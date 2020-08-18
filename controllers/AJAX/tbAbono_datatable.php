<?php
include '../../database/conexioni.php';

        //var_dump('entra a producto controller');
//$opcion = $_POST['opcion'];

//var_dump('valor opcion:'.$opcion.'<- termina valor opcion');

$consulta =" select abono.id_abono,
       abono.fechaAbono,
       abono.total,
       abono.id_detalle_credito,
        abono.id_cliente
from abono

";

//switch($opcion){
//    case 1:
//       // var_dump('entra a opcion 1');
//        $condicion = " HAVING cantidadQdebe >0";
//
//    break;
//
//    case 0:
//       // var_dump('entra a opcion 0');
//        $condicion = " HAVING cantidadQdebe =0";
//       break;
//
//
// }

$consulta = $consulta.$condicion;

    $resultado= $mysqli->query($consulta);


    $data= $resultado -> fetch_all(MYSQLI_ASSOC);

   // var_dump($data['cantidadQdebe']);

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
?>



