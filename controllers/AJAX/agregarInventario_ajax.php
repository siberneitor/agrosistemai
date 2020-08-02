<?php
//include 'conexion.php';
include '../../database/conexioni.php';
include '../funciones.php';

$correcto = true;

$addCodInv=$_POST['addCodInv'];
$unidades=$_POST['addUnidInv'];
$addCostoInv=$_POST['addCostoInv'];
$addPrecioInv=$_POST['addPrecioInv'];
$addFcad=$_POST['addFcad'];
$faddIdGasto=$_POST['faddIdGasto'];
$statusInv=$_POST['statusInv'];

$Fcodigo = $_POST['Fcodigo'];

$usaFcad = $_POST['usaFcad'];

$fechaActual = date("Y-m-d H:i:s");

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch ($opcion) {
    case 1:
        if(!existenciaCodigoProducto($mysqli,$addCodInv)){
            $correcto = false;
            $mensaje =  'el codigo '. $rcod . 'NO ha sido ingresado en el catalogo de productos, asi que NO se puede agregar al inventario';
            echo $correcto . '/' . $mensaje;

        }else {

            if (existenciaCodigoInventario($mysqli, $addCodInv)){
                $correcto = false;
                $mensaje = 'el codigo ' . $rcod . 'YA HABIA SIDO DADO DE ALTA en el inventario, puede MODIFICARLO desde el catalogo de inventario presionando el boton EDITAR.';
                echo $correcto . '/' . $mensaje;
                //                if($usaFcad){
                //                    echo $actualizar = $mysqli->query("update inventario set unidades= '$unidades',costo = '$addCostoInv',precio = '$addPrecioInv',fecha_ingreso = '$fechaActual',fecha_caducidad = '$usaFcad' where codigo = '$addCodInv'");
                //
                //                }else{
                //                    echo $actualizar = $mysqli->query("update inventario set unidades= '$unidades',costo = '$addCostoInv',precio = '$addPrecioInv',fecha_ingreso = '$fechaActual' where codigo = '$addCodInv'");
                //                 }

            }else{
                //crear procedimiento para dar de alta el codigo nuevo ewn el inventario
                if ($usaFcad) {
                     $agregar = $mysqli->query("insert into inventario (codigo,unidades,costo,precio,fecha_ingreso,fecha_caducidad,estatus) values ('$addCodInv','$unidades','$addCostoInv','$addPrecioInv','$fechaActual','$usaFcad',1)");

                } else {
                     $agregar = $mysqli->query("insert into inventario (codigo,unidades,costo,precio,fecha_ingreso,estatus) values ('$addCodInv','$unidades','$addCostoInv','$addPrecioInv','$fechaActual',1)");

                }

                $mensaje =  'el codigo '. $rcod . ' ha sido registrado CORRECTAMENTE';
                echo $correcto . '/' . $mensaje;
            }
        }
        break;
    //actualiza  tabla inventario
    case 2:
      //  var_dump('entraste al caso 2 y la var $addFcad contiene: '. $addFcad);

        if(empty($addFcad)){
           // var_dump('VACIA');
                  $sql = $mysqli->query("
           update inventario 
             set  unidades ='$unidades',
                  costo='$addCostoInv',
                  precio='$addPrecioInv',
                  fecha_ingreso = '$fechaActual',                  
                  id_gasto = NULL,
                  estatus = '$statusInv'          
                  where codigo = '$Fcodigo';
                  ");

            //inserta en la tabla historial inventario los valores cambiados
            $consulta = "insert into historial_inventario values(NULL,'$Fcodigo','$unidades','$addCostoInv','$addPrecioInv',null,'$fechaActual',NULL)";
            $resultadoConsulta = $mysqli->query($consulta);

        }else{
             //var_dump('LLENA');
                  $sql = $mysqli->query("
           update inventario 
             set  unidades ='$unidades',
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
        }
         if($sql) {
             $mensaje = 'el codigo ' . $Fcodigo . ' ha sido actualizado CORRECTAMENTE';
             echo $correcto . '/' . $mensaje;
         }else{
             $correcto = false;
             $mensaje = 'el codigo ' . $Fcodigo . ' NO pudo ser actualizado';
             echo $correcto . '/' . $mensaje;

         }
        break;
    case 3:
        // var_dump('entra a la opcion 3');
        $consulta = "DELETE FROM inventario WHERE codigo='$Fcodigo' ";
         $result = $mysqli->query($consulta);
         if($result){
             $mensaje = 'el codigo ' . $Fcodigo . ' ha sido eliminado CORRECTAMENTE';
             echo $correcto . '/' . $mensaje;
         }else{
             $correcto = false;
             $mensaje = 'el codigo ' . $Fcodigo . ' NO pudo ser eliminado';
             echo $correcto . '/' . $mensaje;
         }

        break;
}
?>