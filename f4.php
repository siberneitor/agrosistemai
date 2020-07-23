<?php
include 'conexion.php';
include 'conexioni.php';

	$a=$_POST['txt1'];
	$b=$_POST['txt2'];
	$c=$_POST['txt3'];
	$unidades =$_POST['txtUnidades'];

	//print_r($a.'<p>'.$b.'<p>'.$c);
	//echo $a.'<p>'.$b.'<p>'.$c;
	//echo $rrr=mysql_query("insert into temporal values ('$a','$b','$c')")or die(mysql_error());
	echo $rrr=$mysqli->query("insert into temporal values (NULL,'$a','$b','$c','')");

	$q2=mysql_query("select distinct *from producto")or die(mysql_error());
?>