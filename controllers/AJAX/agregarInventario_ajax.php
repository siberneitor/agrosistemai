<?php
//include 'conexion.php';
include '../../database/conexioni.php';
include '../funciones.php';
include '../variables.php';


$correcto = true;
$addCodInv =NULL;
$addFcad= NULL;
$faddIdGasto=NULL;
$usaFcad = NULL;

//si las variables traen datos , se inicializan.
if (isset($_POST['addCodInv']) && !empty($_POST['addCodInv']) ){$addCodInv=$_POST['addCodInv'];}
if (isset($_POST['addFcad']) && !empty($_POST['addFcad']) ){$addFcad=$_POST['addFcad'];}
if (isset($_POST['faddIdGasto']) && !empty($_POST['faddIdGasto']) ){$faddIdGasto=$_POST['faddIdGasto'];}
if (isset($_POST['usaFcad']) && !empty($_POST['usaFcad']) ){$usaFcad = $_POST['usaFcad'];}
if (isset($_POST['user_id']) && !empty($_POST['user_id']) ){$user_id = $_POST['user_id'];}

$unidades=$_POST['addUnidInv'];
$unidadesNew=$_POST['FunidadesNew'];
$addCostoInv=$_POST['addCostoInv'];
$addPrecioInv=$_POST['addPrecioInv'];

$statusInv=$_POST['statusInv'];

$Fcodigo = $_POST['Fcodigo'];
$fechaActual =  $dt->format("Y-m-d H:i:s");


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

$sumaUnid = $unidades + $unidadesNew;


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

            }else{
                //crear procedimiento para dar de alta el codigo nuevo ewn el inventario
                if ($usaFcad) {
//                     $agregar = $mysqli->query("insert into inventario (codigo,unidades,costo,precio,fecha_ingreso,fecha_caducidad,estatus) values ('$addCodInv','$unidades','$addCostoInv','$addPrecioInv','$fechaActual','$usaFcad',1)");

                } else {
                     $agregar = $mysqli->query("insert into inventario (codigo,unidades,costo,precio,fecha_ingreso,estatus) values ('$addCodInv','$sumaUnid','$addCostoInv','$addPrecioInv','$fechaActual',1)");

                }

                $mensaje =  'el codigo '. $rcod . ' ha sido registrado CORRECTAMENTE';
                echo $correcto . '/' . $mensaje;
            }
        }
        break;
    //actualiza  tabla inventario
    case 2:
        $sql=0;
      // var_dump('entraste al caso 2 y la var $addFcad contiene: '. $addFcad);

           //si el producto no tiene fecha de caducidad
        if(empty($addFcad)){

            if($unidadesNew !=0){


                  $updateInv = $mysqli->query("
           update inventario 
             set  unidades ='$sumaUnid',
                  costo='$addCostoInv',
                  precio='$addPrecioInv',
                                
                  id_gasto = NULL,
                  estatus = '$statusInv'          
                  where codigo = '$Fcodigo'
                  ");

                  //si se ha hecho algun cambio al momento de actualizar el registro
                  if ($updateInv){

                      $sql ="update inventario set ultimaFechaIngreso = '$fechaActual'  where codigo = '$Fcodigo'";
                      $actualizaUltimaFecha = $mysqli->query($sql);

                      //inserta en la tabla historial inventario los valores cambiados
                      $consulta = "insert into historial_inventario values(NULL,'$Fcodigo','$unidadesNew','$addCostoInv','$addPrecioInv',null,'$fechaActual',NULL)";
                      $resultadoConsulta = $mysqli->query($consulta);
                  }
            }
        }//si el producto incluye fecha de caducidad
         else{
//                  $sql = $mysqli->query("
//           update inventario
//             set  unidades ='$unidades',
//                  costo='$addCostoInv',
//                  precio='$addPrecioInv',
//
//                  fecha_caducidad='$addFcad',
//                  id_gasto = NULL,
//                  estatus = '$statusInv'
//                  where codigo = '$Fcodigo';
//                  ");
//
//                 //si se ha hecho algun cambio al momento de actualizar el registro
//               if($mysqli->affected_rows){
//                  $sql ="update inventario set fecha_ingreso = '$fechaActual'  where codigo = '$Fcodigo'";
//
//                  //inserta en tabla inventario
//                  $consulta = "insert into historial_inventario values(NULL,'$Fcodigo','$unidades','$addCostoInv','$addPrecioInv','$addFcad','$fechaActual',NULL)";
//                  $resultadoConsulta = $mysqli->query($consulta);
//               }
         }
         //si el codigo se actualizo con exito
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
        // borra registro
        var_dump('entra a opcion 333');

        $consulta = "DELETE FROM inventario WHERE codigo='$user_id' ";
         $result = $mysqli->query($consulta)  or die ($mysqli->error);
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