<?php
include '../../database/conexioni.php';
include '../funciones.php';

$idCliente = $_GET['idCliente'];

//var_dump('llega al procesar ajax y la variable CLIENTE conteie : '.$idCliente.'<-TERMINA');

        $queryGetIdCred = "select id_detalle_credito from detalle_credito where id_cliente = '$idCliente'";
$resultado = $mysqli->query($queryGetIdCred) or die($mysqli->error);


$data= $resultado -> fetch_all(MYSQLI_ASSOC);
$numRows = $resultado->num_rows;

echo $data;

//if($numRows){
//    print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
//
//}else {
//    echo  $data =0;
//}



?>