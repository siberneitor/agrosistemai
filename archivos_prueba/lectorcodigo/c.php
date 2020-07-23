<?php
include 'a.php';

$a=$_GET['txt1'];
/*
$b=$_POST['txt2'];
$c=$_POST['txt3'];
$d=$_POST['txt4'];
$e=$_POST['txt5'];
$f=$_POST['txt6'];
*/

$query=mysql_query("insert into p values('$a')")or die (mysql_error());

/*$query=mysql_query("insert into producto2 values('','$a','$b','$c','$d','$e','$f')")or die (mysql_error());
*/
?>