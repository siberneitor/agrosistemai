<?php
require_once '../database/conexioni.php';
require_once 'funciones.php';



//validacion para saber si se accede al controlador desde la opcion "agregarProducto" o desde la opcion "quitar producto";
if(isset($_POST['codigo'])){
    $rcod=$_POST['codigo'];
    $unidadesInput = $_POST['Unidades'];
    $fechaAct = date("Y-m-d");


    $bool = true;
    $mensaje = NULL;

//si el codigo no se encuentra en la tabla producto
    if(!existenciaCodigoProducto($mysqli,$rcod)) {
        $bool = false;
        $mensaje =  'el codigo '. $rcod . ' no existe en el sistrema';
        echo $bool . '/' . $mensaje;
    }

    if(!existenciaCodigoInventario($mysqli,$rcod)){
        $bool = false;
        $mensaje =  'el codigo ' .$rcod. ' no ha sido ingresado en el inventario' ;
        echo $bool . '/' . $mensaje;
    }

    if(!estatusArticuloInventario($mysqli,$rcod)){
        $bool = false;
        $mensaje =  'el codigo ' .$rcod. ' esta inactivo en el inventario' ;
        echo $bool . '/' . $mensaje;
    }

    /*
    if(!fechaCadArticulo($mysqli,$rcod)){
        $bool = false;
        $mensaje =  'el articulo ' .$rcod. ' esta caducado' ;
        echo $bool . '/' . $mensaje;
    }
    */

    if ($bool){
        //busca las unidades que hay para ese producto en el inventario
        $seleccionarCodigo="select inventario.codigo as codigoDB,
                                producto.descripcion as nombreProducto,
                                inventario.unidades as unidadesinventario,
                                inventario.precio,
                                inventario.fecha_caducidad,
                                inventario.estatus
                            from inventario  
                            join producto ON producto.codigo = inventario.codigo
                            and inventario.codigo = '$rcod'
                            ";

        $qselect = $mysqli->query($seleccionarCodigo)or die($mysqli->error);;
        $respuestaConsulta = $qselect->fetch_assoc();

        $codigoBD = $respuestaConsulta['codigoDB'];
        $nombreProd = $respuestaConsulta['nombreProducto'];
        $precioBD = $respuestaConsulta['precio'];

        $unidadesActInventario = $respuestaConsulta['unidadesinventario'];
        $precioXunidades = $precioBD * $unidadesInput;

        $valores =  $bool . '/' .$mensaje. '/' . $rcod . '/' . $nombreProd . '/' . $precioBD . '/' . $unidadesInput. '/' . $precioXunidades. '/';

        //procedimiento que  se ejecuta si no existen registros en temporal
        if (!existenciaArticulosListados($mysqli)) {

            //comprueba si hay unidades suficientes en tabla inventario
            if(!suficientesUnidadesInv($mysqli,$rcod,$unidadesInput)){
                $bool = false;
                $mensaje =  'NO hay suficiente inventario del codigo '. $rcod ;
                echo $bool . '/' . $mensaje;
            }else{
                //hasta aqui vatodo bien
                $articuloSinListar= articuloSinListar($mysqli,$unidadesActInventario,$unidadesInput,$rcod,$valores,$bool);

                $bool = $articuloSinListar[0];
                $mensaje = $articuloSinListar[1];
                $arrayDatos = $articuloSinListar[2];

                if ($bool){
                    echo $arrayDatos;
                }else {
                    // $valores[0];
                    echo $bool . '/' . $mensaje;
                }
            }
        } //procedimiento que se ejecuta si ya existen registros en tabla temporal
        else {            //obtener las unidades de invetario temporales
            $existenciaCodListado = existenciaCodListado($mysqli,$rcod);

            if($existenciaCodListado){
                $unidadesNuevas = $existenciaCodListado['unidades_temp_inv'];
                $codigoExiste = true;
            }
            else{
                $unidadesNuevas =$unidadesActInventario;
                $codigoExiste = false;
            }

            $articuloYaListado =  articuloYaListado($mysqli,$unidadesNuevas,$unidadesInput,$rcod,$valores,$codigoExiste,$bool);

            $bool = $articuloYaListado[0];
            $mensaje = $articuloYaListado[1];
            $arrayDatos = $articuloYaListado[2];

            if ($bool){
                echo $arrayDatos;
            }else {
                echo $bool . '/' . $mensaje;
            }
        }
        if($bool){
            $rrr = $mysqli->query("insert into temporal2 values (NULL,'$rcod','$nombreProd','$precioBD','$unidadesInput')")or die($mysqli->error);;

//            if(isset($_POST['idProducto'])){
//                die('EXISTE');
//                $idProducto = $_POST['idProducto'];
//                $nuevasUnidadesActuales = $_POST['nuevasUnidadesActuales'];
//                $rrr = $mysqli->query("update temporal2 set unidadesInput = nuevasUnidadesActuales where codigo = $idProducto")or die($mysqli->error);;
//            }else{
//                die('NO EXISTE');
//            }
        }
    }
}else{
//    session_start();
//    if(!isset($_SESSION['quita'])){
//        var_dump('NO EXISTE SESION');
//        $_SESSION['quita'] = true;
        $idProducto = $_POST['idProducto'];
        $unidadesAquitar = intVal($_POST['unidadesAquitar']);
//    for($i=0;$i<$unidadesAquitar;$i++){
        $query = "delete from temporal2 where codigo = $idProducto limit $unidadesAquitar";
//        var_dump($query);
        $rrr = $mysqli->query("$query")or die($mysqli->error);;
//    }
//    $rrr = $mysqli->query("update temporal2 set unidadesInput = $nuevasUnidadesActuales where codigo = $idProducto")or die($mysqli->error);;

//    }else{
//    }
}


?>