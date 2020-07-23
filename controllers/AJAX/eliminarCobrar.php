<?php
//include 'conexion.php';
include '../../database/conexioni.php';
//var_dump('claro que llega');
	//$rrr2=mysql_query("delete from temporal")or die(mysql_error());
	$rrr2=$mysqli->query("delete from temporal");


	 echo $rrr2;

?>
