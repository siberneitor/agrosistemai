<?php
//include 'header.html';
include '../database/conexioni.php';

$query ="select * from proveedores";
$result = $mysqli->query($query);

//$mostrar=$result->fetch_assoc();
/*
while($fila = $result->fetch_assoc()){
    $idProv= $fila["id_proov"];
    $descProv= $fila["descripcion"];
   $RRR=  '<option value="'.$idProv.'">'.$descProv.'</option>';
}
*/

//$cosa ='perro';


?>
