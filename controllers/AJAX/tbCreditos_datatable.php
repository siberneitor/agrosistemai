<?php
include '../../database/conexioni.php';

        //var_dump('entra a producto controller');
$opcion = $_POST['opcion'];

//var_dump('valor opcion:'.$opcion.'<- termina valor opcion');

$consulta =" select
       distinct(cliente.id_cliente) as idCliente,
         (select concat_ws(' ',apellido_paterno,apellido_materno,nombre)) as nombreCliente,
       (select count(detalle_credito.estatus_credito) from detalle_credito where estatus_credito =1 and id_cliente = idCliente) as creditosActivos,
  (select SUM(cantidad_por_pagar) from detalle_credito where id_cliente =idCliente) as cantidadPrestada,
 (SELECT SUM(total) from abono where id_cliente =idCliente) AS totalAbonosXcred,
  (SELECT IFNULL(totalAbonosXcred,0)) AS CONVERTIRCERO,
      (select cantidadPrestada - CONVERTIRCERO ) AS cantidadQdebe,
       (select MIN(fecha_vencimiento) from detalle_credito where id_cliente = idCliente) as primerFechaVenc,
        (select  MAX(fechaAbono) from abono where id_cliente =idCliente)  as ultimoAbono
from cliente 
 JOIN detalle_credito  ON  cliente.id_cliente = detalle_credito.id_cliente
";

switch($opcion){
    case 1:
       // var_dump('entra a opcion 1');
        $condicion = " HAVING cantidadQdebe >0";

    break;

    case 0:
       // var_dump('entra a opcion 0');
        $condicion = " HAVING cantidadQdebe =0";
       break;


 }

$consulta = $consulta.$condicion;

    $resultado= $mysqli->query($consulta);


    $data= $resultado -> fetch_all(MYSQLI_ASSOC);

   // var_dump($data['cantidadQdebe']);

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
?>



