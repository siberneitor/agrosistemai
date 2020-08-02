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

$FECHA = date("d-m-Y");
$fechaBD = date("Y-m-d");
$HORA=date("H:i:s");
$horaTicket=date("H-i-s");

$noTicket=0;

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
             NULL             
             )";

$query = $mysqli->query($consulta)or die($mysqli->error);

//validacion para saber si se inserto la ultima venta y asignar el id_venta
if ($query){
    $QueryLastInsert = $mysqli->query("select MAX(id_venta) as id_venta from ventas");
    $rowTemporalesQueryLastInsert = $QueryLastInsert->fetch_assoc();
    $noTicket=$rowTemporalesQueryLastInsert['id_venta'];
}

//comienza a escribirse los datos de la tienda

//se asigna el nombre del archivo .txt
$file = fopen("../files/".$noTicket.".txt", "w");

fwrite($file, "agroinsumos llano grande" . PHP_EOL);
fwrite($file, "20 de noviembre #23 colonia centro" . PHP_EOL);
fwrite($file, "Huitzuco Guerrero" . PHP_EOL);
fwrite($file, "tel: 7271028618" . PHP_EOL);
fwrite($file, "NO. ticket :" .$noTicket. PHP_EOL);
fwrite($file, "no. cliente:".$noCliente. PHP_EOL);
fwrite($file, $FECHA."   ".$HORA. PHP_EOL);
fwrite($file, "" . PHP_EOL);
fwrite($file, "cantidad"."      "."codigo"."       "."articulo"."         "."precio"."    "."total".PHP_EOL);
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

    //se escriben los datos de la tabla temporal en el txt
    $file = fopen("../files/".$noTicket.".txt", "a");
    fwrite($file,''.$unidXprod .'         '. $codigoBD.'      '.$nombreProd.'            '.$precioBD.'        '.$totalXprod. PHP_EOL);
}

//se escriben los datos del pago de la compra en el txt
fwrite($file,"". PHP_EOL);
fwrite($file,"                  TOTAL :"."        ".$TOTAL. PHP_EOL);
fwrite($file,"efectivo :".$cantPagada. PHP_EOL);
fwrite($file,"Cambio :".$cambio. PHP_EOL);
fwrite($file,"Cantidad de productos :".$totalUnidades. PHP_EOL);
//fwrite($file,$first2. PHP_EOL);
fclose($file);

?>


