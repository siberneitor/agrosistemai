<?php
//include 'conexion.php';
include '../../database/conexioni.php';



	$Cod=$_POST['Codigo'];
	$Art=$_POST['Art'];
	$Costo=$_POST['Costo'];
    $Precio=$_POST['Precio'];
	$Provee=$_POST['Provee'];
    $Fcad=$_POST['Fcad'];
    $Unidades=$_POST['Unidades'];

    $fechaActual = date('Y-m-d');

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '';


switch ($opcion){
    case 1:
        echo $rrr=$mysqli->query("insert into producto (codigo,descripcion,id_proov) values ('$Cod','$Art','$Provee')") or die($mysqli->error);

        //al insertar un producto, automaticamemte se inserta tambien en la tabla inventario
        //echo $rrr=$mysqli->query("insert into inventario (codigo,fecha_ingreso,estatus) values ('$Cod','$fechaActual',0)") or die($mysqli->error);

    break;
    case 2:
//        $consulta =$mysqli->query(" select id_proov from proveedores where nombre = '$Provee' ");
//        $result = $consulta->fetch_assoc();
//        $idProov=$result['id_proov'];

        var_dump('EMTA A OPCION 2 Y LA VAR $Fcad ES: '.$Fcad. '<- TERMINA FECHA CADUCIDAD');

        $consulta =$mysqli->query(" select codigo from inventario where codigo = '$Cod' ");
        //$result = $consulta->fetch_assoc();
        //$idProov=$result['id_proov'];
        $existeCodigo = $consulta->num_rows;


     if(!$existeCodigo){
         if(empty($Fcad)) {
             $queryInsertInv = "insert into inventario (codigo,unidades,costo,precio,fecha_ingreso,estatus)
      values ('$Cod','$Unidades','$Costo','$Precio','$fechaActual',1)";
             $ejecQueryInsertInv = $mysqli->query($queryInsertInv) or die ($mysqli->error);
         }else{
         $queryInsertInv = "insert into inventario (codigo,unidades,costo,precio,fecha_ingreso,fecha_caducidad,estatus)
      values ('$Cod','$Unidades','$Costo','$Precio','$fechaActual','$Fcad',1)";
         $ejecQueryInsertInv = $mysqli->query($queryInsertInv) or die ($mysqli->error);
         }

     }

        if(empty($Fcad)) {

            $updateProd = $mysqli->query("
        update producto
JOIN inventario
ON producto.codigo = inventario.codigo
JOIN proveedores ON producto.id_proov = proveedores.id_proov
set producto.descripcion = '$Art',
    inventario.costo = '$Costo' ,
    inventario.precio = '$Precio',
    proveedores.nombre = '$Provee',
    inventario.fecha_caducidad = NULL,
    inventario.unidades = '$Unidades'
where producto.codigo =  '$Cod'") or die($mysqli->error);

        }else{
            $updateProd = $mysqli->query("
        update producto
JOIN inventario
ON producto.codigo = inventario.codigo
JOIN proveedores ON producto.id_proov = proveedores.id_proov
set producto.descripcion = '$Art',
    inventario.costo = '$Costo' ,
    inventario.precio = '$Precio',
    proveedores.nombre = '$Provee',
    inventario.fecha_caducidad = '$Fcad',
    inventario.unidades = '$Unidades'
where producto.codigo =  '$Cod'") or die($mysqli->error);
        }

        break;
    case 3:

        $consulta = "DELETE FROM producto WHERE codigo='$user_id' ";
        echo $result = $mysqli->query($consulta) or die($mysqli->error);
        break;

       // var_dump('ERROR: '. $mysqli->error. '<-termina error');

}
//
////$qmax=mysql_query("SELECT max(id_producto) as NUMAX from producto")or die(mysql_error());
//$qmax="SELECT max(id_producto) as NUMAX from producto";
//
//
////$rmax=mysql_fetch_array($qmax,MYSQL_ASSOC);
//$qmax2=$mysqli->query($qmax);
//
//$rmax = $qmax2->fetch_array(MYSQLI_ASSOC); //O también $resultado->fetch_assoc()
//
//
//$rm= $rmax["NUMAX"];
////echo $rm;
//$rm++;

?>