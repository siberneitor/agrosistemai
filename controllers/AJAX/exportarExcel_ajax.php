<?php
include '../../librerias/PHPExcel/Classes/PHPExcel.php';
include '../../database/conexioni.php';

$hora =date("H:i:s");

$idVentaR = NULL;
$codigoR = NULL;
$nombreProdR = NULL;
$clienteR = NULL;
$tipoVenta = NULL;
$fInicialR = NULL;
$fFinalR= NULL;
$horaInicialR = NULL;
$horaFinalR = NULL;
$fCadIniR = NULL;
$fCadFinalR = NULL;



//se inicializan lar variables si no vienen null
if(isset($_GET['idVentaR']) && !empty($_GET['idVentaR'])){$idVentaR=$_GET['idVentaR'];}
if(isset($_GET['codigoR']) && !empty($_GET['codigoR'])){$codigoR=$_GET['codigoR'];}
if(isset($_GET['nombreProdR']) && !empty($_GET['nombreProdR'])){$nombreProdR=$_GET['nombreProdR'];}
if(isset($_GET['clienteR']) && !empty($_GET['clienteR'])){$clienteR=$_GET['clienteR'];}
if(isset($_GET['tipoVenta']) && !empty($_GET['tipoVenta'])){$tipoVenta=$_GET['tipoVenta'];}
if(isset($_GET['fInicialR']) && !empty($_GET['fInicialR'])){$fInicialR=$_GET['fInicialR'];}
if(isset($_GET['fFinalR']) && !empty($_GET['fFinalR'])){$fFinalR=$_GET['fFinalR'];}
if(isset($_GET['horaInicialR']) && !empty($_GET['horaInicialR'])){$horaInicialR=$_GET['horaInicialR'];}
if(isset($_GET['horaFinalR']) && !empty($_GET['horaFinalR'])){$horaFinalR=$_GET['horaFinalR'];}
if(isset($_GET['fCadIniR']) && !empty($_GET['fCadIniR'])){$fCadIniR=$_GET['fCadIniR'];}
if(isset($_GET['fCadFinalR']) && !empty($_GET['fCadFinalR'])){$fCadFinalR=$_GET['fCadFinalR'];}

//var_dump('NOMBRE PROD R =:'.$nombreProdR.'>-termina codigoprodR');

$objPHPExcel = new PHPExcel();

/*Info General Excel*/
$objPHPExcel->
getProperties()
    ->setCreator("TEDnologia.com")
    ->setLastModifiedBy("TEDnologia.com")
    ->setTitle("Exportar Excel con PHP")
    ->setSubject("Documento de prueba")
    ->setDescription("Documento generado con PHPExcel")
    ->setKeywords("usuarios phpexcel")
    ->setCategory("reportes");


//consulta inicial SELECCIONAMOS TODOS LOS REGISTROS DE LA TABLA VENTAS
$consultaInicial = "select *from ventas";

//validacion fecha inicial y final
if($fInicialR && $fFinalR){
    $existeFechas = " WHERE ventas.fecha_venta between '$fInicialR' AND '$fFinalR'";
    $consultaInicial = $consultaInicial.$existeFechas;
}
//validacion si existe id_venta
if($idVentaR){
    $existeIdVenta = " AND ventas.id_venta = '$idVentaR'";
    $consultaInicial = $consultaInicial.$existeIdVenta;
}
//validacion si existe id_cliente
if($clienteR){
    $existeIdCliente = " AND ventas.id_cliente = '$clienteR'";
    $consultaInicial = $consultaInicial.$existeIdCliente;
}

//validacion si existe tipo venta
if($tipoVenta !='x'){
    $existeTipoVenta = " AND ventas.tipo_venta = '$tipoVenta'";
    $consultaInicial = $consultaInicial.$existeTipoVenta;
}

//validacion hora inicial y final
if($horaInicialR && $horaFinalR){
    $existeHora = " AND ventas.hora_venta between '$horaInicialR' AND '$horaFinalR'";
    $consultaInicial = $consultaInicial.$existeHora;
}

$ejecConsultaInicial = $mysqli->query($consultaInicial) or die($mysqli->error);

//cuenta las filas que contiene la primer consulta y empieza a pintar los datos a partir de la fila 2 en el excel
$iniciaRegistro=2;
$totaRegistros = $iniciaRegistro + $ejecConsultaInicial->num_rows;


while ($filas = $ejecConsultaInicial->fetch_assoc() ){

    $NOticket =$filas['id_venta'];
    $NOcliente =$filas['id_cliente'];
    $tipoVenta =$filas['tipo_venta'];
    $fechaTicket =$filas['fecha_venta'];
    $horaTicket =$filas['hora_venta'];
    $totalVentaBD =$filas['totalVenta'];
    $cantidad_pagadaBD =$filas['cantidad_pagada'];
    $cambioBD =$filas['cambio'];
    $total_unidadesBD =$filas['total_unidades'];

    if($tipoVenta){ $tipoVenta='contado'; }else{ $tipoVenta='CREDITO'; }

    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A'.$iniciaRegistro, 'no. ticket:')
        ->setCellValue('B'.$iniciaRegistro, $NOticket);
    $iniciaRegistro++;

    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A'.$iniciaRegistro, 'no. Cliente:')
        ->setCellValue('B'.$iniciaRegistro, $NOcliente);
    $iniciaRegistro++;

    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A'.$iniciaRegistro, 'Tipo de Venta:')
        ->setCellValue('B'.$iniciaRegistro, $tipoVenta);
    $iniciaRegistro++;

    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A'.$iniciaRegistro, 'Fecha:')
        ->setCellValue('B'.$iniciaRegistro, $fechaTicket)
        ->setCellValue('D'.$iniciaRegistro, 'Hora:')
        ->setCellValue('E'.$iniciaRegistro, $horaTicket);
    $iniciaRegistro++;


    $consulta = "select ventas.id_venta as idVenta,
		ventas.id_cliente,
		ventas.fecha_venta as fechaVenta,
		ventas.hora_venta,
		ventas.totalVenta,
		ventas.cantidad_pagada,
		ventas.cambio,
		ventas.total_unidades,
		detalle_venta.codigo,
		detalle_venta.unidades_x_producto,
		detalle_venta.total_x_producto,
		producto.descripcion,
		inventario.precio
   from ventas
  JOIN detalle_venta ON ventas.id_venta = detalle_venta.id_venta
  JOIN producto ON detalle_venta.codigo = producto.codigo
  JOIN inventario ON producto.codigo = inventario.codigo
  where ventas.id_venta='$NOticket'
   ";
    //validacion si existe codigo
    if($codigoR){
        $existeCodigo = " AND producto.codigo = '$codigoR'";
        $consulta = $consulta.$existeCodigo;
    }
    //validacion si existe nombreProd
    if($nombreProdR){
        $existeNombreProd = " AND producto.descripcion = '$nombreProdR'";
        $consulta = $consulta.$existeNombreProd;
    }
    if($fCadIniR && $fFinalR){
        $existeFcad = " AND inventario.fecha_caducidad between '$fCadIniR' AND '$fCadFinalR'";
        $consulta = $consulta.$existeFcad;
    }


    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A'.$iniciaRegistro, 'CANTIDAD')
        ->setCellValue('B'.$iniciaRegistro, 'CODIGO')
        ->setCellValue('C'.$iniciaRegistro, 'ARTICULO')
        ->setCellValue('D'.$iniciaRegistro, 'PRECIO')
        ->setCellValue('E'.$iniciaRegistro, 'TOTAL');
    $iniciaRegistro++;

    $ejecConsulta = $mysqli->query($consulta) or die ($mysqli->error);

    while ($row = $ejecConsulta->fetch_assoc()) {
        $unidades_x_productobd=$row['unidades_x_producto'];
        $codigoBD=$row['codigo'];
        $descripcionBD=$row['descripcion'];
        $precioBD=$row['precio'];
        $total_x_productoBD=$row['total_x_producto'];



        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$iniciaRegistro, $unidades_x_productobd)
            ->setCellValue('B'.$iniciaRegistro, $codigoBD)
            ->setCellValue('C'.$iniciaRegistro, $descripcionBD)
            ->setCellValue('D'.$iniciaRegistro, $precioBD)
            ->setCellValue('E'.$iniciaRegistro, $total_x_productoBD);
        $iniciaRegistro++;
    }

    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A'.$iniciaRegistro, 'TOTAL: ')
        ->setCellValue('B'.$iniciaRegistro, $totalVentaBD);
    $iniciaRegistro++;

    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A'.$iniciaRegistro, 'efectivo')
        ->setCellValue('B'.$iniciaRegistro, $cantidad_pagadaBD);
    $iniciaRegistro++;

    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A'.$iniciaRegistro, 'cambio')
        ->setCellValue('B'.$iniciaRegistro, $cambioBD);
    $iniciaRegistro++;

    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A'.$iniciaRegistro, 'cantidad de productos')
        ->setCellValue('B'.$iniciaRegistro, $total_unidadesBD);
    $iniciaRegistro++;


    $iniciaRegistro++;
}

//INICIA FOOTER CREAR EXCEL

/*Nombre de la página*/
$objPHPExcel->getActiveSheet()->setTitle('Usuarios');
$objPHPExcel->setActiveSheetIndex(0);

/*Crear Filtro Hoja*/
$objPHPExcel->getActiveSheet()->setAutoFilter('A1:C2');

/* Columnas AutoAjuste */
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="excel_generado1.xls"'); //nombre del documento
header('Cache-Control: max-age=0');

$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
$objWriter->save('php://output');
exit;

?>
