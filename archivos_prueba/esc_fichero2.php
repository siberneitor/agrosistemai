<?php //Ejemplo aprenderaprogramar.com

$file = fopen("archivo.txt", "a");

fwrite($file, "Añadimos línea 1" . PHP_EOL);

fwrite($file, "Añadimos línea 2" . PHP_EOL);

fclose($file);

?>