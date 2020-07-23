<?php
$server="localhost";
$user="root";
$password="root";
$bd="sistemaventas";

$conect=mysql_connect($server,$user,$password) or die (mysql_error());
mysql_select_db($bd,$conect) or die (mysql_error());