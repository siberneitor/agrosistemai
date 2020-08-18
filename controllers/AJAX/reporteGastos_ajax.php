<?php
include '../../librerias/PHPExcel/Classes/PHPExcel.php';
include '../../database/conexioni.php';

$hora =date("H:i:s");

$idNotaCompraF = NULL;
$selectProvGasto = NULL;
$totalR = NULL;
$fIncialRG = NULL;
$fFinalRG = NULL;

//se inicializan lar variables si no vienen null
if(isset($_GET['idNotaCompraF']) && !empty($_GET['idNotaCompraF'])){$idNotaCompraF=$_GET['idNotaCompraF'];}
if(isset($_GET['selectProvGasto']) && !empty($_GET['selectProvGasto'])){$selectProvGasto=$_GET['selectProvGasto'];}
if(isset($_GET['totalR']) && !empty($_GET['totalR'])){$totalR=$_GET['totalR'];}
if(isset($_GET['fIncialRG']) && !empty($_GET['fIncialRG'])){$fIncialRG=$_GET['fIncialRG'];}
if(isset($_GET['fFinalRG']) && !empty($_GET['fFinalRG'])){$fFinalRG=$_GET['fFinalRG'];}

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
$consultaInicial = " select gastos.id_nota_compra,
		gastos.id_proov,
        gastos.total,
        gastos.fecha_alta,
        proveedores.nombre
   from gastos
 JOIN proveedores ON gastos.id_proov = proveedores.id_proov ";

//validacion fecha inicial y final
if($fIncialRG && $fFinalRG){
    //$existeFechas = " WHERE ventas.fecha_venta between '$fInicialR' AND '$fFinalR'";
    $existeFechas = " WHERE gastos.fecha_alta between '$fIncialRG' and '$fFinalRG'";
    $consultaInicial = $consultaInicial.$existeFechas;
}

//validacion si existe id_venta
if($idNotaCompraF){
    $existeIdCompra = " AND gastos.id_nota_compra = '$idNotaCompraF'";
    $consultaInicial = $consultaInicial.$existeIdCompra;
}

//validacion si existe id_cliente
if($selectProvGasto !=0){
    $existeProovGasto = " AND proveedores.id_proov = '$selectProvGasto'";
    $consultaInicial = $consultaInicial.$existeProovGasto;
}
//validacion hora inicial y final
if($totalR){
    $existeTotal = " AND gastos.total ='$totalR'";
    $consultaInicial = $consultaInicial.$existeTotal;
}

$ejecConsultaInicial = $mysqli->query($consultaInicial) or die($mysqli->error);

//cuenta las filas que contiene la primer consulta y empieza a pintar los datos a partir de la fila 2 en el excel
$iniciaRegistro=2;
$totaRegistros = $iniciaRegistro + $ejecConsultaInicial->num_rows;


$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A'.$iniciaRegistro, 'NO. NOTA COMPRA')
    ->setCellValue('B'.$iniciaRegistro, 'PROVEEDOR')
    ->setCellValue('C'.$iniciaRegistro, 'TOTAL')
    ->setCellValue('D'.$iniciaRegistro, 'FECHA DE COMPRA');
$iniciaRegistro++;


while ($filas = $ejecConsultaInicial->fetch_assoc() ){

    $noCompraBD =$filas['id_nota_compra'];
    $proveedorBD =$filas['nombre'];
    $totalBD =$filas['total'];
    $horaTicket =$filas['fecha_alta'];


    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A'.$iniciaRegistro, $noCompraBD)
        ->setCellValue('B'.$iniciaRegistro, $proveedorBD)
        ->setCellValue('C'.$iniciaRegistro, $totalBD)
        ->setCellValue('D'.$iniciaRegistro, $horaTicket);

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
