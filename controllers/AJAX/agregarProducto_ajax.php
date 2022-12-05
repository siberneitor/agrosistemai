<?php
include '../../database/conexioni.php';
include '../funciones.php';
include '../variables.php';

$Cod = $_POST['Codigo'];
$Art = $_POST['Art'];
if (isset($_POST['marca'])) {
    $marca = $_POST['marca'];
    }

    $idMarca = $_POST['idMarca'];

$categProd = $_POST['categProd'];
if (isset($_POST['proovProd'])) {
    $Provee = $_POST['proovProd'];
}
$idProov = $_POST['idProov'];
if (isset($_POST['Costo'])) {
    $Costo = $_POST['Costo'];
}
if (isset($_POST['Precio'])) {
    $Precio = $_POST['Precio'];
}
if (isset($_POST['Fcad'])) {
    $Fcad = $_POST['Fcad'];
}
if (isset($_POST['Unidades'])) {
    $Unidades = $_POST['Unidades'];
    $UnidadNew = $_POST['UnidNew'];
}
//die($UnidadNew);

//$fechaActual = date('Y-m-d');
$fechaActual =  $dt->format("Y-m-d H:i:s");

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '';

switch ($opcion) {

    case 1:
        if (existenciaCodigoProducto($mysqli, $Cod)) {
            echo 'este codigo ya ha sido ingresado anteriormente';
        } else {
            echo $rrr = $mysqli->query("insert into producto (codigo,descripcion,id_marca,id_categoria,id_proov,status) values ('$Cod','$Art','$idMarca','$categProd','$idProov',1)") or die($mysqli->error);
              }
        //al insertar un producto, automaticamemte se inserta tambien en la tabla inventario
        //echo $rrr=$mysqli->query("insert into inventario (codigo,fecha_ingreso,estatus) values ('$Cod','$fechaActual',0)") or die($mysqli->error);
        break;
    case 2:

//        $consulta =$mysqli->query(" select id_proov from proveedores where nombre = '$Provee' ");
//        $result = $consulta->fetch_assoc();
//        $idProov=$result['id_proov'];

//        var_dump('EMTA A OPCION 2 Y LA VAR $Fcad ES: '.$Fcad. '<- TERMINA FECHA CADUCIDAD');

        $consulta = $mysqli->query(" select codigo from inventario where codigo = '$Cod' ");
        //$result = $consulta->fetch_assoc();
        //$idProov=$result['id_proov'];
        $existeCodigo = $consulta->num_rows;


        if (!$existeCodigo) {


            if ($UnidadNew != 0) {
                if (empty($Fcad)) {

                    $queryInsertInv = "insert into inventario (codigo,unidades,costo,precio,fecha_ingreso,estatus)
      values ('$Cod','$UnidadNew','$Costo','$Precio','$fechaActual',1)";
                    $ejecQueryInsertInv = $mysqli->query($queryInsertInv) or die ($mysqli->error);
                } else {
//                    $queryInsertInv = "insert into inventario (codigo,unidades,costo,precio,fecha_ingreso,fecha_caducidad,estatus,unidades,unidadesNew)
//      values ('$Cod','$Unidades','$Costo','$Precio','$fechaActual','$Fcad',1,$Unidades,$UnidadNew)";
//                    $ejecQueryInsertInv = $mysqli->query($queryInsertInv) or die ($mysqli->error);
                }
            }
        }

        $nuevasUnidAct = $Unidades + $UnidadNew;

        if (empty($Fcad)) {
            $up1 = "update producto
                                            JOIN inventario
                                            ON producto.codigo = inventario.codigo
                                            JOIN proveedores ON producto.id_proov = proveedores.id_proov
                                            set producto.descripcion = '$Art',
                                             producto.id_marca = '$idMarca',
                                             producto.id_proov = '$idProov',
                                            inventario.costo = '$Costo' ,
                                            inventario.precio = '$Precio',
                                            proveedores.nombre = '$Provee',
                                            inventario.fecha_caducidad = NULL,
                                            inventario.unidades = '$nuevasUnidAct',
                                            inventario.unidadesNew = $UnidadNew
                                            where producto.codigo =  $Cod";
//            die($up1);
            $mysqli->query($up1) or die($mysqli->error);
        } else {
//            $up2 = " update producto
//                                            JOIN inventario
//                                            ON producto.codigo = inventario.codigo
//                                            JOIN proveedores ON producto.id_proov = proveedores.id_proov
//                                            set producto.descripcion = '$Art',
//                                            producto.id_marca = '$idMarca',
//                                                                                             producto.id_proov = '$idProov',
//                                                inventario.costo = '$Costo' ,
//                                                inventario.precio = '$Precio',
//                                                proveedores.nombre = '$Provee',
//                                                inventario.fecha_caducidad = '$Fcad',
//                                                inventario.unidades = '$Unidades'
//                                            where producto.codigo =  '$Cod'";
//            $updateProd = $mysqli->query($up2) or die($mysqli->error);
        }

        break;
    case 3:
        die('llega a delete');
        $consulta ="UPDATE producto set status =0 where codigo=$Cod";

//        $consulta = "DELETE FROM producto WHERE codigo='$user_id' ";
        echo $result = $mysqli->query($consulta) or die($mysqli->error);
        break;

    // var_dump('ERROR: '. $mysqli->error. '<-termina error');

}


?>