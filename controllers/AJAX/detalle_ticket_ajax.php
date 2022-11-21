<?php
include '../../database/conexioni.php';

$idVenta = $_GET['idNotaCompra'];

$tabla = '<table class ="" border =1 width="100%">';

$fp = fopen('../../files/'.$idVenta.".txt", "r");
//while (!feof($fp)){
//    $linea = fgets($fp);
////    echo $linea;
//$tabla = $tabla.'
//<tr>
//<td>'.$linea.'</td>
//</tr>
//';
//
//}
//fclose($fp);
$array = file('../../files/'.$idVenta.".txt", FILE_IGNORE_NEW_LINES);
$tabla = $tabla.'<tr><td colspan="5">'.$array[0].'</td></tr>';
$tabla = $tabla.'<tr><td colspan="5">'.$array[1].'</td></tr>';
$tabla = $tabla.'<tr><td colspan="5">'.$array[2].'</td></tr>';
$tabla = $tabla.'<tr><td colspan="5">'.$array[3].'</td></tr>';
$tabla = $tabla.'<tr><td colspan="5">'.$array[4].'</td></tr>';
$tabla = $tabla.'<tr><td colspan="5">'.$array[5].'</td></tr>';
$tabla = $tabla.'<tr><td colspan="5">'.$array[6].'</td></tr>';
$tabla = $tabla.'<tr><td colspan="5">'.$array[7].'</td></tr>';
$tabla = $tabla.'<tr><td colspan="5"></td></tr>';
$columnas = explode(' ',$array[9]);
//var_dump($columnas);
$tabla = $tabla.'<tr><td>'.$columnas[0].'</td><td>'.$columnas[1].'</td><td>'.$columnas[2].'</td><td>'.$columnas[3].'</td><td>'.$columnas[4].'</td></tr>';
$tabla = $tabla.'<tr><td colspan="5"></td></tr>';
for($i=11;$i<count($array);$i++){
    $lista = explode('/',$array[$i]);
    //se verifica si ya termino el listado de productos
    if(isset($lista[1]) && isset($lista[2]) && isset($lista[3]) && isset($lista[4])){
        $tabla = $tabla.'<tr><td>'.$lista[0].'</td><td>'.$lista[1].'</td><td>'.$lista[2].'</td><td>'.$lista[3].'</td><td>'.$lista[4].'</td></tr>';
    }else{
        $tabla = $tabla.'<tr><td colspan="5">'.$array[$i].'</td></tr>';
    }


}
//var_dump($array);

$tabla = $tabla.'</table></>';


echo $tabla;

//echo '<label>perrito</label>';
?>


