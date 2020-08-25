<?php
include '../../database/conexioni.php';

$fechaInicial = $_GET['fechaInicial'];
$fechaFinal = $_GET['fechaFinal'];

$fechaInicialCompleta = $fechaInicial.' '.'00:00:00';
$fechaFinalCompleta = $fechaFinal.' '.'23:59:59';
//echo $fechaInicial.'/'.$fechaFinal;

$queryTbBlance ="

select count(ventas.id_venta) as CantidadVentas,
       sum(ventas.totalVenta) as totalXVentas,
       (select sum(i.precio - i.costo)) as gananciaXventas,
       SUM(ventas.total_unidades) as total_unidades,
       (select sum(abono.total)
        from abono where fechaAbono between '$fechaInicialCompleta' and '$fechaFinalCompleta'
                 ) as totalAbonos,
       (select COUNT(monto_por_pagar) from historial_pago_creditos
  join abono on historial_pago_creditos.id_abono = abono.id_abono
 and monto_por_pagar = 0 AND fechaAbono between '$fechaInicialCompleta' and '$fechaFinalCompleta') as creditosFinalizados
from ventas
         join detalle_venta d on ventas.id_venta = d.id_venta
         join inventario i on d.codigo = i.codigo
where ventas.tipo_venta =1  and ventas.fecha_venta between '$fechaInicialCompleta' and '$fechaFinalCompleta'

";

$ejecQueryTbBalance = $mysqli->query($queryTbBlance)or die ($mysqli->error);
$arrayBalance = $ejecQueryTbBalance->fetch_assoc();

$totalVentas= $arrayBalance['CantidadVentas'] ;
$montoTotalXventas= $arrayBalance['totalXVentas'] ;
$totalGananciaXventas= $arrayBalance['gananciaXventas'] ;
$totalUnidadesVendidas= $arrayBalance['total_unidades'] ;
$totalXabonos= $arrayBalance['totalAbonos'] ;
$totalCredFinaliz= $arrayBalance['creditosFinalizados'] ;

if(empty($totalVentas)){
    $totalVentas =0;
}
if(empty($montoTotalXventas)){
    $montoTotalXventas =0;
}
if(empty($totalGananciaXventas)){
    $totalGananciaXventas =0;
}
if(empty($totalXabonos)){
    $totalXabonos =0;
}
if(empty($totalCredFinaliz)){
    $totalCredFinaliz =0;
}



if($mysqli->error) {
echo '<label>'.$mysqli->error.'</label>';
}else{
    echo  '<table class ="table-light">
<tr>
<td style = "width: 400px"><h4>ventas a contado realizadas:</h4></td>
<td><h2>'.$totalVentas.'</h2></td>
</tr>

<tr>
<td><h4>monto total de ventas:</h4></td>
<td><h2>'.$montoTotalXventas.'</h2></td>
</tr>

<tr>
<td><h4>ganancia por ventas:</h4></td>
<td><h2>'.$totalGananciaXventas.'</h2></td></td>
</tr>

<tr>
<td><h4>total Unidades Vendidas:</h4></td>
<td><h2>'.$totalUnidadesVendidas.'</h2></td>
</tr>

<tr>
<td><h4>monto total de abonos:</h4></td>
<td><h2>'.$totalXabonos.'</h2></td>
</tr>

<tr>
<td><h4>creditos finalizados:</h4></td>
<td><h2>'.$totalCredFinaliz.'</h2></td>
</tr>

</table></>';

}

//echo '<label>perrito</label>';
?>


