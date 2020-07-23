<?php //Ejemplo aprenderaprogramar.com, archivo escribir.php

	$varwisky=$_POST['perro'];

	echo $varwisky;

$file = fopen("wiki2.txt", "w");

fwrite($file, $varwisky . PHP_EOL);

fwrite($file, "Otra más" . PHP_EOL);

fclose($file);

?>