<?php
include 'conexion.php';
include 'conexioni.php';
date_default_timezone_set('UTC');
date_default_timezone_set("America/Mexico_City");

$FECHA = date("Y-m-j");

$nomb=$_POST['txtnombre'];
$apell=$_POST['txtapellidos'];
$direc=$_POST['txtdireccion'];
$locali=$_POST['txtlocalidad'];
$telef=$_POST['txttelefono'];
$emai=$_POST['txtemail'];
$montcred=$_POST['txtmonto'];
$nodc=$_POST['txtndc'];
$escredact=$_POST['txteca'];

//echo $nomb; 
/*
$insercliente=mysql_query('select *from tabla1') or die(mysql_error());
while($columnas=mysql_fetch_array($insercliente)){

	echo $columnas[1];
}

*/
//se busca el valor maximo de la columna precio de la tabla producto y se le asigna el alias VALORMAXIMO
 $busqueda = mysql_query("SELECT MAX(id_cliente) as VALORMAXIMO FROM cliente")or die(mysql_error());
 $re=mysql_fetch_array($busqueda, MYSQL_ASSOC);

 $nummax= $re["VALORMAXIMO"];

//se le suma 1 al valor maximo	
$nummax++;

//inserta los valores en la tabla cliente
//$x=$insertcliente=mysql_query("INSERT INTO cliente values('$nummax','$nomb','$apell','$direc','$locali','$telef','$emai','$FECHA','$montcred','$nodc','$escredact','','','','','','','')")or die(mysql_error());
$x=$insertcliente=$mysqli->query("INSERT INTO cliente values('$nummax','$nomb','$apell','$direc','$locali','$telef','$emai','$FECHA','$montcred','$nodc','$escredact','','','','','','','')");

//se muestra el valor de "x" para que devuelva el valor a la funcion .js
echo $x;
?>