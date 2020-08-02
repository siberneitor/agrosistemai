<?php

include '../database/conexioni.php';

function existenciaCodigoProducto($mysqli,$codigo){
    $consulta ="select codigo from producto where codigo ='$codigo'";
    $resultadoConsulta=$mysqli->query($consulta);
    //$asocc = $resultadoConsulta->fetch_assoc();
    return $resultadoConsulta->num_rows;
    //return $valor = $asocc['codigo'];
}

function existenciaCodigoInventario($mysqli,$codigo){
    $consulta ="select codigo from inventario where codigo ='$codigo'";
    $resultadoConsulta=$mysqli->query($consulta);
    //$asocc = $resultadoConsulta->fetch_assoc();
    return $resultadoConsulta->num_rows;

}

function existenciaArticulosListados($mysqli){
    $consulta ="select *from temporal2";
    $resultadoConsulta=$mysqli->query($consulta);
    return $resultadoConsulta->num_rows;

}

function suficientesUnidadesInv($mysqli,$codigo,$unidades){
    //$consulta ="select unidades from inventario where codigo ='$codigo'";
    $consulta ="select unidades - '$unidades' as unidades_restadas from inventario where codigo = '$codigo'";
    $resultadoConsulta=$mysqli->query($consulta);
    $asocc = $resultadoConsulta->fetch_assoc();
    //return $asocc = $resultadoConsulta->num_rows;
    $unidadesRestadas = $asocc['unidades_restadas'];
    if($unidadesRestadas >= 0){
        return true;
    }
}


function estatusArticuloInventario($mysqli,$codigo){
    $consulta = "select codigo,estatus
                   from inventario where codigo = '$codigo' and estatus = 1";
    $resultadoConsulta=$mysqli->query($consulta);
    return $resultadoConsulta->num_rows;
}

//pendiente validar fecha de caducidad
/*
function fechaCadArticulo($mysqli,$codigo){
    $fechaActual= date('Y-m-d H:i:s');
    $consulta = "select inventario.codigo as codigoDB,                       
                        inventario.fecha_caducidad as fecha_cad
                   from inventario where codigoDB = '$codigo' and fecha_cad > '$fechaActual'";
    $resultadoConsulta=$mysqli->query($consulta);
    return $resultadoConsulta->num_rows;
}
*/

function articuloSinListar($mysqli,$unidadesActInventario,$unidadesInput,$rcod,$valores,$bool){

    $mensaje=NULL;

    //resta las unidades de  variableunidadesinventario menos inputunidades
    $resultadoRestaUnidades = $unidadesActInventario - $unidadesInput;

    $insertaUnidTemp = $mysqli->query("insert into inventarioTempXprod  (codigo,unidades_temp_inv) values ('$rcod','$resultadoRestaUnidades')");

    //validacion si hubo un error en la consulta
    if(!$insertaUnidTemp){
        $bool = false;
        $mensaje = $mysqli->error;
        $concat=  $bool . '/' . $mensaje;
    }

    $concat = $valores . $resultadoRestaUnidades;
    $resultadoFuncion = [$bool,$mensaje,$concat];
    return $resultadoFuncion;

}


function existenciaCodListado($mysqli,$rcod){
    $peticion = "select * from inventarioTempXprod where codigo ='$rcod'";
    $procesar = $mysqli->query($peticion);
    return $respPeticion = $procesar->fetch_assoc();

}


function articuloYaListado($mysqli,$unidadesNuevas,$unidadesInput,$rcod,$valores,$codigoExiste,$bool){

    $mensaje=NULL;

    if ($unidadesInput <= $unidadesNuevas == false) {
        $bool = false;
        $mensaje = "ingresastre mas unidades en el input que las disponibles";
        echo $bool . '/' . $mensaje;
        $resultadoRestaUnidades = NULL;
        $resultadoFuncion = [$bool, $mensaje, $resultadoRestaUnidades];
        return $resultadoFuncion;
    }
    else {
        //resta las unidades de  variableunidadesinventario menos inputunidades
        $resultadoRestaUnidades = $unidadesNuevas - $unidadesInput;

        if ($codigoExiste) {

            $insertaUnidTemp = $mysqli->query("update inventarioTempXprod set unidades_temp_inv = '$resultadoRestaUnidades' where codigo = '$rcod';");

        } else {

            $insertaUnidTemp = $mysqli->query("insert into inventarioTempXprod (codigo, unidades_temp_inv) values ('$rcod','$resultadoRestaUnidades')");

        }

        if(!$insertaUnidTemp){
            $bool = false;
            $mensaje = $mysqli->error;
            $concat=  $bool . '/' . $mensaje;
        }

        $concat = $valores . $resultadoRestaUnidades;
        $resultadoFuncion = [$bool,$mensaje,$concat];
        return $resultadoFuncion;
    }

}

?>
