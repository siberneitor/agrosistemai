<?php
include '../../database/conexioni.php';


$opcion = $_GET['opcion'];

//var_dump('entra a ajax GASTOOOOO');


$idNotaCompra=$_GET['idNotaCompra'];
$selectProvGasto=$_GET['selectProvGasto'];
$totalCompra=$_GET['totalCompra'];

	$fecha_alta = date("Y-m-d");

switch($opcion){
    case 1:

        echo $rrr=$mysqli->query("insert into gastos (id_nota_compra,id_proov,total,fecha_alta)
 values ('$idNotaCompra','$selectProvGasto','$totalCompra','$fecha_alta')") or die($mysqli->error) ;
     //   var_dump('MYSQLI->ERROR: '.$mysqli->error.'<-termina');
    break;
    case 2:
        $consulta =$mysqli->query(" select id_proov from proveedores where nombre = '$selectProvGasto' ") or die ($mysqli->error);
        $result = $consulta->fetch_assoc();
        $idProov=$result['id_proov'];
        //var_dump('$totalCompra: '.$totalCompra);

        $rrr=$mysqli->query("
                update gastos
        set
         id_proov='$idProov',
         total ='$totalCompra'
         where id_nota_compra= '$idNotaCompra'
         ")or die($mysqli->error);
      //  var_dump('$mysqli->error: '.$mysqli->error);
        break;

//        $rrr=$mysqli->query("
//               update gastos set total = '$totalCompra' where id_nota_compra ='$idNotaCompra';
//         ")or die($mysqli->error);

        break;
}
?>