<?php
	include 'conexion.php';
	$datocliente=$_POST['idclient'];
	//echo $datocliente;
	//if (!empty($datocliente))
	if (is_numeric($datocliente) && !empty($datocliente))
{
	
	$searchclient=mysql_query("SELECT (id_cliente) as CLIENTE FROM cliente where id_cliente=$datocliente")or die(mysql_error());

	$resultsearch=mysql_fetch_array($searchclient,MYSQL_ASSOC);


	 $rss= $resultsearch["CLIENTE"];

	 echo $rss;
	}
?>