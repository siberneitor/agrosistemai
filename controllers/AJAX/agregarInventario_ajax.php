<?php
//include 'conexion.php';
include '../../database/conexioni.php';



$addCodInv=$_POST['addCodInv'];
$unidades=$_POST['addUnidInv'];
$addCostoInv=$_POST['addCostoInv'];
$addPrecioInv=$_POST['addPrecioInv'];
$addFcad=$_POST['addFcad'];
$faddIdGasto=$_POST['faddIdGasto'];
$statusInv=$_POST['statusInv'];

//var_dump('statusinc:'. $statusInv);

$Fcodigo = $_POST['Fcodigo'];

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
//$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '';

$fechaActual = date("Y-m-d");

switch ($opcion){
    case 1:


        //($faddIdGasto ==''? $faddIdGasto = NULL:'');
        //if (empty($faddIdGasto)){
        //unset($faddIdGasto);
        //echo is_null($faddIdGasto);
        //$faddIdGasto = NULL;
        //}

        echo $rrr=$mysqli->query("insert into inventario (codigo,unidades,costo,precio,fecha_ingreso,fecha_caducidad,estatus) values ('$addCodInv','$unidades','$addCostoInv','$addPrecioInv','$fechaActual','$addFcad',1)");

        break;
    //actualiza  tabla inventario
    case 2:

        // var_dump('entraste al caso 2 y la var $unidades contiene: '. $unidades);
        /*
        $consulta =$mysqli->query(" select id_proov from proveedores where nombre = '$Provee' ");
        $result = $consulta->fetch_assoc();
        $idProov=$result['id_proov'];
        */



                echo $rrr=$mysqli->query("
                update inventario 
        set 
         unidades ='$unidades',
         costo='$addCostoInv',
         precio='$addPrecioInv',
         fecha_ingreso = '$fechaActual',
         fecha_caducidad='$addFcad',
          id_gasto = NULL,
          estatus = '$statusInv'          
         where codigo = '$Fcodigo';
                ");

        //inserta en la tabla historial inventario los valores cambiados
        $consulta = "insert into historial_inventario values(NULL,'$Fcodigo','$unidades','$addCostoInv','$addPrecioInv','$addFcad','$fechaActual',NULL)";
        $resultadoConsulta = $mysqli->query($consulta);



        break;
    case 3:

        // var_dump('entra a la opcion 3sesito');
        //$consulta = "DELETE FROM inventario WHERE codigo='$Fcodigo' ";
        $consulta = "DELETE FROM inventario WHERE codigo='$Fcodigo' ";
        echo $result = $mysqli->query($consulta);
        break;

}




?>