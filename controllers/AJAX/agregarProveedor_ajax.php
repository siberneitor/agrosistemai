<?php
//include 'conexion.php';
include '../../database/conexioni.php';

//var_dump('entra a ajax proveedor');


	$nombreProv=$_GET['nombreProv'];
	$adressProv=$_GET['adressProv'];
	$telefonoProv=$_GET['telefonoProv'];
	$emailProv=$_GET['emailProv'];
	$responsProv=$_GET['responsProv'];



	//echo $rrr=mysql_query("insert into producto values ('$rm','$Prod','$Art','$Costo','$Precio','$Provee','$Fcad')")or die(mysql_error());
	//echo $rrr=$mysqli->query("insert into producto values ('$rm','$Prod','$Art','$Costo','$Precio','$Provee','$Fcad')");
	//echo $rrr=$mysqli->query("insert into producto values (NULL,5,'produucto4',12,14,NULL,'2020-12-12',2)");
	echo $rrr=$mysqli->query("insert into proveedores values (NULL,'$nombreProv','$adressProv','$telefonoProv','$emailProv','$responsProv')");


?>