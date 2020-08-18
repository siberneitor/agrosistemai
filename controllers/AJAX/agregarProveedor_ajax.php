<?php
//include 'conexion.php';
include '../../database/conexioni.php';

//var_dump('entra a ajax proveedor');


	$nombreProv=$_GET['nombreProv'];
	$adressProv=$_GET['adressProv'];
	$telefonoProv=$_GET['telefonoProv'];
	$emailProv=$_GET['emailProv'];
	$responsProv=$_GET['responsProv'];

if (empty($telefonoProv)){$telefonoProv =0;}

	echo $rrr=$mysqli->query("insert into proveedores values (NULL,'$nombreProv','$adressProv','$telefonoProv','$emailProv','$responsProv')")or die ($mysqli->error);


?>