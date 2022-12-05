
<?php
include '../../database/conexioni.php';

        //var_dump('entra a producto controller');
$opcion = $_POST['opcion'];

//var_dump('valor opcion:'.$opcion.'<- termina valor opcion');

//$consulta =" select
//       distinct(cliente.id_cliente) as idCliente,
//         (select concat_ws(' ',apellido_paterno,apellido_materno,nombre)) as nombreCliente,
//       (select count(detalle_credito.estatus_credito) from detalle_credito where estatus_credito =1 and id_cliente = idCliente) as creditosActivos,
//  (select SUM(cantidad_por_pagar) from detalle_credito where id_cliente =idCliente) as cantidadPrestada,
// (SELECT SUM(total) from abono where id_cliente =idCliente) AS totalAbonosXcred,
//  (SELECT IFNULL(totalAbonosXcred,0)) AS CONVERTIRCERO,
//                        (SELECT Min(fecha_inicio) FROM detalle_credito where id_cliente = idCliente ) as primerFechaCredito,
//                   (SELECT TIMESTAMPDIFF(DAY, primerFechaCredito, now())) * 0.0712   AS InteresXdias,
//                                    (SELECT cantidadPrestada * InteresXdias /100) as interesEnDinero,
//                             (select cantidadPrestada + interesEnDinero -  CONVERTIRCERO) AS cantidadQdebe,
//       (select MIN(fecha_vencimiento) from detalle_credito where id_cliente = idCliente) as primerFechaVenc,
//        (select  MAX(fechaAbono) from abono where id_cliente =idCliente)  as ultimoAbono
//from cliente
// JOIN detalle_credito  ON  cliente.id_cliente = detalle_credito.id_cliente
// where cliente.id_cliente !=1
//";

//$consulta =" select
//       distinct(cliente.id_cliente) as idCliente,
//         (select concat_ws(' ',apellido_paterno,apellido_materno,nombre)) as nombreCliente,
//       (select count(detalle_credito.estatus_credito) from detalle_credito where estatus_credito =1 and id_cliente = idCliente) as creditosActivos,
//  (select SUM(cantidad_por_pagar) from detalle_credito where id_cliente =idCliente) as cantidadPrestada,
// (SELECT SUM(total) from abono join detalle_credito dc on abono.id_detalle_credito = dc.id_detalle_credito
// where abono.id_cliente =idCliente and dc.estatus_credito =1) AS totalAbonosXcred,
//  (SELECT IFNULL(totalAbonosXcred,0)) AS CONVERTIRCERO,
//                                                           (SELECT SUM((select  (select cantidad_por_pagar  * ((SELECT TIMESTAMPDIFF(DAY, fecha_inicio, now())) * 0.0712) /100 AS InteresEnPorcentaje) +  cantidad_por_pagar) ) from detalle_credito where id_cliente = idCliente) as cantidadSinAbonos,
//                                                   (select cantidadSinAbonos -  CONVERTIRCERO) AS cantidadQdebe,
//       (select MIN(fecha_vencimiento) from detalle_credito where id_cliente = idCliente) as primerFechaVenc,
//        (select  MAX(fechaAbono) from abono where id_cliente =idCliente)  as ultimoAbono
//from cliente
// JOIN detalle_credito  ON  cliente.id_cliente = detalle_credito.id_cliente
// where cliente.id_cliente !=1
//";
$dropTable= $mysqli->query("drop table temporalCreditos");


$consulta =" 
create table temporalCreditos as
    SELECT
       distinct(cliente.id_cliente) as idCliente,
                                (select concat_ws(' ',apellido_paterno,apellido_materno,nombre)) as nombreCliente,
       (select count(detalle_credito.estatus_credito) from detalle_credito where estatus_credito =1 and id_cliente = idCliente) as creditosActivos,
  (select SUM(cantidad_por_pagar) from detalle_credito where id_cliente =idCliente and estatus_credito =1) as cantidadPrestada,
                     id_detalle_credito idDetalleCredito,
                    cantidad_por_pagar,
                    (SELECT TIMESTAMPDIFF(DAY, fecha_inicio, now()) ) diasTranscurridos,
                    (SELECT TIMESTAMPDIFF(DAY, fecha_inicio, now()) * 0.0712 ) interesEnPorcentaje,
                    (select  truncate(cantidad_por_pagar * interesEnPorcentaje /100,2)) interessEndinero,
                    (select cantidad_por_pagar + interessEndinero) cantidadDebe,
(select IFNULL(sum(total),0) from abono join detalle_credito dc on abono.id_detalle_credito = dc.id_detalle_credito where  dc.id_detalle_credito = idDetalleCredito and dc.estatus_credito =1) abono,
                    (select cantidadDebe - abono) deudaPresente,
       (select MIN(fecha_vencimiento) from detalle_credito where id_cliente = idCliente) as primerFechaVenc,
                               (select  MAX(fechaAbono) from abono where id_cliente =idCliente)  as ultimoAbono,
                                               IF(garantia=1, 'SI', 'NO') garantia                          
from cliente
 JOIN detalle_credito  ON  cliente.id_cliente = detalle_credito.id_cliente where estatus_credito =1
";

switch($opcion){
    case 1:
       // var_dump('entra a opcion 1');
        $condicion = " HAVING deudaPresente >0";
    break;
    case 0:
       // var_dump('entra a opcion 0');
        $condicion = " HAVING deudaPresente =0";
       break;
 }

$consulta = $consulta.$condicion.' order by apellido_paterno';

    $resultado= $mysqli->query($consulta);

    if($resultado){
        $consulta2 = "
      select distinct idCliente aliasCliente,
                nombreCliente,
                creditosActivos,
(select sum(abono) from temporalCreditos where idCliente = aliasCliente) abono,
cantidadPrestada,
                primerFechaVenc,
                ultimoAbono,
                      if ((select sum(garantia) from sistemaventas2.detalle_credito where id_cliente = idCliente)>0,'si','no') garantia,
                      (select sum(deudaPresente) from temporalCreditos where idCliente = aliasCliente) deudaActual
from temporalCreditos
        ";
        $resultado2= $mysqli->query($consulta2);
        $data= $resultado2 -> fetch_all(MYSQLI_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
    }

?>



