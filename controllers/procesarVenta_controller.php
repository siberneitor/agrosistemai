<?php
include '../database/conexioni.php';
include 'funciones.php';

date_default_timezone_set('UTC');
date_default_timezone_set("America/Mexico_City");

$TOTAL=$_POST['TOTAL'];
$totalUnidades=$_POST['totalUnidades'];
$cantPagada=$_POST['cobro'];
$cambio=$_POST['cambiot'];
$noCliente=$_POST['numcli'];
if(empty($noCliente)){
    $noCliente =1;
}
if(isset($_POST['pagoInicial'])){$pagoInicial = $_POST['pagoInicial'];}
if(isset($_POST['interesVenta'])){$interesVenta = $_POST['interesVenta'];}
if(isset($_POST['fVencVenta'])){$fVencVenta = $_POST['fVencVenta'];}


$FECHA = date("d-m-y");
$fechaBD = date("Y-m-d");
$HORA=date("H:i:s");
$horaTicket=date("H-i-s");

$noTicket=0;


$tipoVenta=$_POST['tipoVenta'];


//INICIA DESPUES --------------------------------------------------------------------------------------------------

//inserta la venta en tabla ventas
$consulta = "insert into ventas(
            total_unidades,
            totalVenta,
            cantidad_pagada,
            cambio,
            id_cliente,
            fecha_venta,
            hora_venta,
            tipo_venta)
             values(
             '$totalUnidades',
             '$TOTAL',
             '$cantPagada',
             '$cambio',
             '$noCliente',
             '$fechaBD',
             '$HORA',
             '$tipoVenta'             
             )";

$query = $mysqli->query($consulta)or die($mysqli->error);

//validacion para saber si se inserto la ultima venta y asignar el id_venta
if ($query){
    $QueryLastInsert = $mysqli->query("select MAX(id_venta) as id_venta from ventas");
    $rowTemporalesQueryLastInsert = $QueryLastInsert->fetch_assoc();
    $noTicket=$rowTemporalesQueryLastInsert['id_venta'];
}

($tipoVenta?$tipoVenta='contado':$tipoVenta='CREDITO');

//comienza a escribirse los datos de la tienda
require __DIR__ . '/autoload.php'; //Nota: si renombraste la carpeta a algo diferente de "ticket" cambia el nombre en esta línea
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
//$nombre_impresora = "POS58 Printer";
$nombre_impresora = "TERMICA";

$connector = new WindowsPrintConnector($nombre_impresora);
$printer = new Printer($connector);
$printer->setJustification(Printer::JUSTIFY_CENTER);

/*
Imprimimos un mensaje. Podemos usar
el salto de línea o llamar muchas
veces a $printer->text()
 */
$printer->setTextSize(1, 2);
$printer->text("agroinsumos llano grande");
$printer->setTextSize(1, 1);
$printer->feed();
$printer->text("20 de noviembre #414 col. centro");
$printer->text("\n");
$printer->text("Huitzuco Gro.   tel: 7271028618");
$printer->text("\n");
$printer->text("Venta #: ".$noTicket."  "."No. cliente:".$noCliente);
$printer->text("\n");
$printer->text("T. V.:".$tipoVenta."  ".$FECHA." ".$HORA);
$printer->text("\n\n");
$printer->setJustification(Printer::JUSTIFY_LEFT);
$printer->text("cant"."  "."articulo");
$printer->text("\n");
$printer->setJustification(Printer::JUSTIFY_RIGHT);
$printer->text("precio"."  "."total");
$printer->text("\n\n");


//se asigna el nombre del archivo .txt
$file = fopen("../files/".$noTicket.".txt", "w");

fwrite($file, "agroinsumos llano grande" . PHP_EOL);
fwrite($file, "20 de noviembre #23 colonia centro" . PHP_EOL);
fwrite($file, "Huitzuco Guerrero" . PHP_EOL);
fwrite($file, "tel: 7271028618" . PHP_EOL);
fwrite($file, "NO. ticket :" .$noTicket. PHP_EOL);
fwrite($file, "no. cliente:".$noCliente. PHP_EOL);
fwrite($file, "Tipo de venta:".$tipoVenta. PHP_EOL);
fwrite($file, $FECHA."   ".$HORA. PHP_EOL);
fwrite($file, "" . PHP_EOL);
//fwrite($file, "cantidad"."      "."codigo"."       "."articulo"."         "."precio"."    "."total".PHP_EOL);
fwrite($file, "cantidad"." "."codigo"." "."articulo"." "."precio"." "."total".PHP_EOL);
fwrite($file,"". PHP_EOL);
fclose($file);


//selecciona los registros de la tabla temporal
$sql="select 
		SUM(unidadesInput) as sumaUnidades,
		`codigo`,
		`nombre_producto`as nombreProducto,
		`precioBD` as precioXunidad,        
        (select  SUM(unidadesInput) * `precioBD`) as totalXprod 
from temporal2 
group by `codigo`,
		`nombreproducto`,
		`precioBD`";

$queryTbTemporal=$mysqli->query($sql)or die($mysqli->error);

//selecciona los datos de cada columna de la tabla temporal2 en cada vuelta
while($rowTemporal=$queryTbTemporal->fetch_assoc()){

    $unidXprod=$rowTemporal['sumaUnidades'];
    $codigoBD=$rowTemporal['codigo'];
    $nombreProd=$rowTemporal['nombreProducto'];
    $precioBD=$rowTemporal['precioXunidad'];
    $totalXprod=$rowTemporal['totalXprod'];

    //insertar en tabla detalle venta
    $queryInsertDetalleVenta = "insert into detalle_venta (id_venta,codigo,unidades_x_producto,total_x_productO)values('$noTicket','$codigoBD','$unidXprod','$totalXprod')";
    $execInsertDetalleVenta=$mysqli->query($queryInsertDetalleVenta)or die($mysqli->error);

    //se escriben los datos de la tabla temporal en el txt
    $file = fopen("../files/".$noTicket.".txt", "a");
//    fwrite($file,''.$unidXprod .'         '. $codigoBD.'      '.$nombreProd.'            '.number_format($precioBD,2).'        '.number_format($totalXprod,2). PHP_EOL);
    fwrite($file,''.$unidXprod .'/'. $codigoBD.'/'.$nombreProd.'/$'.number_format($precioBD,2).'/$'.number_format($totalXprod,2). PHP_EOL);
    $printer->setJustification(Printer::JUSTIFY_LEFT);
    $printer->text($unidXprod .'   '.$nombreProd);
    $printer->text("\n");
    $printer->setJustification(Printer::JUSTIFY_RIGHT);
    $printer->text('$ '.$precioBD.'   $ '.$totalXprod);
    $printer->text("\n");
    //actualiza productos existentes en inventario
    $queryUpdateUnidInv="
    UPDATE inventario         
    SET unidades = unidades- '$unidXprod'
    WHERE codigo = '$codigoBD'
    ";
    $ejecQueryUpdateUnidInv=$mysqli->query($queryUpdateUnidInv)or die($mysqli->error);
}

if($tipoVenta == 'contado'){
    //se escriben los datos del pago de la compra en el txt
    fwrite($file,"". PHP_EOL);
    fwrite($file,"                  TOTAL: "."        $".number_format($TOTAL,2). PHP_EOL);
    fwrite($file,"efectivo: $".number_format($cantPagada,2). PHP_EOL);
    fwrite($file,"Cambio: $".number_format($cambio,2). PHP_EOL);
//    fwrite($file,"Cantidad de productos: ".number_format($totalUnidades,2). PHP_EOL);
    $printer->setJustification(Printer::JUSTIFY_CENTER);

    $printer->text("\n");
    $printer->text( " TOTAL: "."         $".number_format($TOTAL,2));
    $printer->text("\n");
    $printer->text("Efectivo:            $".number_format($cantPagada,2));
    $printer->text("\n");
    $printer->text("Cambio:              $".number_format($cambio,2));
    $printer->text("\n");
//    $printer->text("Cantidad de productos:   ".number_format($totalUnidades,2));
//    $printer->text("\n\n");
}else{
    //actualziar tabla cresitosTemporal
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
                               (select  MAX(fechaAbono) from abono where id_cliente =idCliente)  as ultimoAbono
from cliente
 JOIN detalle_credito  ON  cliente.id_cliente = detalle_credito.id_cliente where estatus_credito =1 and cliente.id_cliente = $noCliente  HAVING deudaPresente >0
";
//    die($consulta);
    $resultado= $mysqli->query($consulta);


    //verificar si ese cliente tiene algun creidot iniciado
    $existeCredito=$mysqli->query("select *from detalle_credito where id_cliente = $noCliente")or die($mysqli->error);
//    $data = $existeCredito->fetch_all(MYSQLI_ASSOC);
    $numRows = $existeCredito->num_rows;

//if($numRows ==0){
    if ($numRows) {
//        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
       $deudaAnterior = $mysqli->query("select sum(deudaPresente) deudaPresente from temporalCreditos where idCliente = $noCliente")or die($mysqli->error);
$rowTemporal=$deudaAnterior->fetch_assoc();
//        $rowTemporal["deudaPresente"]
//die('UNO');
    } else {
        $deudaAnterior =0;
//        die('CERO');
//        echo $data = 0;
    }


//    $cantidadTotal=sumarPorcentaje($TOTAL,$interesVenta);
    //se escriben los datos del pago de la compra en el txt
    fwrite($file,"". PHP_EOL);
    fwrite($file,"Cantidad de productos: ".$totalUnidades. PHP_EOL);
    ($numRows?fwrite($file,"Deuda Anterior $".number_format( $rowTemporal["deudaPresente"],2). PHP_EOL):'');
        fwrite($file,"". PHP_EOL);
        fwrite($file," Cant Inicial " .($numRows?'Nuevo':''). " Credito: "."       $".number_format($TOTAL,2). PHP_EOL);
    fwrite($file,"Pago Inicial: $".number_format($pagoInicial,2). PHP_EOL);
    $cantidadTotal = $TOTAL-$pagoInicial;
        ($numRows?fwrite($file,"Nuevo Monto Agregado A credito: $".number_format($cantidadTotal,2). PHP_EOL):'');
    $deudaFinal = ($numRows? floatval($cantidadTotal) + floatval($rowTemporal["deudaPresente"]):$cantidadTotal);
    fwrite($file,"Por pagar: $".number_format($deudaFinal,2). PHP_EOL);
    $printer->text("\n");
    $printer->text( "Cantidad de productos:  ".$totalUnidades);
    $printer->text("\n\n");
    ($numRows?$printer->text( "Deuda Anterior:  $".number_format( $rowTemporal["deudaPresente"],2)):'');
    $printer->text("\n");
    $printer->text( " Cant Ini " .($numRows?'Nuevo':''). " Cred: $".number_format($TOTAL,2));
    $printer->text("\n");
    $printer->text( "Pago Inicial:  $".number_format($pagoInicial,2));
    $printer->text("\n");
    ($numRows?$printer->text( "Nue Cant Agreg A cred: $".number_format($cantidadTotal,2)):'');
    $printer->text("\n");
    $printer->text( "Por pagar:      $".number_format($deudaFinal,2));
    $printer->text("\n\n");

    $fechaActual = date('Y-m-d');
//        $datetime1 = date_create('2022-07-01');
//        $datetime2 = date_create($fechaActual);
//        $contador = date_diff($datetime1, $datetime2);
//        $differenceFormat = '%a';

//        $dias = $contador->format($differenceFormat);
//            $interes =  30 * 0.0712;
//            $interesEndinero = $deudaFinal * $interes /100;
//            $cantidadF1 = floatval($deudaFinal) + floatval($interesEndinero);
            $cantidadF1 = floatval($deudaFinal);

//    fwrite($file,"Pago al ".date("y-m-d",strtotime($fechaActual."+ 30 days"))." ". number_format($cantidadF1,2). PHP_EOL);
    fwrite($file,"Pago al ".date("d-m-y",strtotime($fechaActual."+ 30 days"))."   $". number_format(sumarPorcentaje($cantidadF1,2.2),2). PHP_EOL);
    fwrite($file,"Pago al ".date("d-m-y",strtotime($fechaActual."+ 60 days"))."   $". number_format(sumarPorcentaje($cantidadF1,4.4),2). PHP_EOL);
    fwrite($file,"Pago al ".date("d-m-y",strtotime($fechaActual."+ 90 days"))."   $". number_format(sumarPorcentaje($cantidadF1,6.6),2). PHP_EOL);
    fwrite($file,"Pago al ".date("d-m-y",strtotime($fechaActual."+ 120 days"))."   $". number_format(sumarPorcentaje($cantidadF1,8.8),2). PHP_EOL);
    fwrite($file,"Pago al ".date("d-m-y",strtotime($fechaActual."+ 150 days"))."   $". number_format(sumarPorcentaje($cantidadF1,11),2). PHP_EOL);
    fwrite($file,"Pago al ".date("d-m-y",strtotime($fechaActual."+ 180 days"))."   $". number_format(sumarPorcentaje($cantidadF1,12.2),2). PHP_EOL);




    $printer->text( "Pago al ".date("d-m-y",strtotime($fechaActual."+ 30 days"))."   $". number_format(sumarPorcentaje($cantidadF1,2.2),2));
    $printer->text("\n");
    $printer->text( "Pago al ".date("d-m-y",strtotime($fechaActual."+ 60 days"))."   $". number_format(sumarPorcentaje($cantidadF1,4.4),2));
    $printer->text("\n");
    $printer->text( "Pago al ".date("d-m-y",strtotime($fechaActual."+ 90 days"))."   $". number_format(sumarPorcentaje($cantidadF1,6.6),2));
    $printer->text("\n");
    $printer->text( "Pago al ".date("d-m-y",strtotime($fechaActual."+ 120 days"))."   $". number_format(sumarPorcentaje($cantidadF1,8.8),2));
    $printer->text("\n");
    $printer->text( "Pago al ".date("d-m-y",strtotime($fechaActual."+ 150 days"))."   $". number_format(sumarPorcentaje($cantidadF1,11),2));
    $printer->text("\n");
    $printer->text( "Pago al ".date("d-m-y",strtotime($fechaActual."+ 180 days"))."   $". number_format(sumarPorcentaje($cantidadF1,12.2),2));
    $printer->text("\n\n");
    $printer->text("¡ Gracias por su compra !");


}

fclose($file);

/*
Hacemos que el papel salga. Es como
dejar muchos saltos de línea sin escribir nada
 */
$printer->feed(3);

/*
Cortamos el papel. Si nuestra impresora
no tiene soporte para ello, no generará
ningún error
 */
$printer->cut();

/*
Por medio de la impresora mandamos un pulso.
Esto es útil cuando la tenemos conectada
por ejemplo a un cajón
 */
$printer->pulse();
$printer->close();
?>



