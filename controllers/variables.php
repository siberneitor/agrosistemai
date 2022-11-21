<?php
$dtz = new DateTimeZone("America/Mexico_City");
$dt = new DateTime("now", $dtz);
//$fechaActual = date("Y-m-d");
$fechaActual = $dt->format('Y-m-d');
//var_dump($dt->format('Y-m-d'));

//$fechaHoraActual = date("Y-m-d H:i:s");
$fechaHoraActual = $dt->format("Y-m-d H:i:s");
//var_dump($fechaHoraActual);


?>