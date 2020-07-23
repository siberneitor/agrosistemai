<?php
//include 'conexion.php';
include '../../database/conexioni.php';

//var_dump('entra a ajax proveedor');


	$nombreCliente=$_GET['nombreCliente'];
	$apPat=$_GET['ap_pat'];
    $apMat=$_GET['ap_mat'];
	$domicil_clien=$_GET['domicilio_Clien'];
	$localidad_clien=$_GET['localidad_Clie'];
	$telef_clien=$_GET['telefono_Clien'];
	$email_clien=$_GET['email_Clien'];

	$fecha_alta = date("Y-m-d");



	//echo $rrr=mysql_query("insert into producto values ('$rm','$Prod','$Art','$Costo','$Precio','$Provee','$Fcad')")or die(mysql_error());
	//echo $rrr=$mysqli->query("insert into producto values ('$rm','$Prod','$Art','$Costo','$Precio','$Provee','$Fcad')");
	//echo $rrr=$mysqli->query("insert into producto values (NULL,5,'produucto4',12,14,NULL,'2020-12-12',2)");
	//echo $rrr=$mysqli->query("insert into cliente values (NULL,'$nombreCliente','$apPat','$apMat','$domicil_clien','$localidad_clien','$telef_clien','$email_clien','$fecha_alta','','','','','','','','','','')");
	echo $rrr=$mysqli->query("insert into cliente values (NULL,'$nombreCliente','$apPat','$apMat','$domicil_clien','$localidad_clien','$telef_clien','$email_clien','$fecha_alta',NULL,NULL,NULL)");


?>