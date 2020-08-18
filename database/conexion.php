<?php
$server='bkjqya0pu8yo586xvsnj-mysql.services.clever-cloud.com';
$database='bkjqya0pu8yo586xvsnj';
$user='ud91kir94surbvdx';
$password='6c1GWzWXQEGYIBoeTEB3';
$conn=mysql_connect($server,$user,$password)or die('error al establacer la conexion');
mysql_select_db($database,$conn) or die ('no hubo conexion con la bd');
?>