<?php

//datos de conexion local
$hostname = 'localhost';
$database = 'sistemaventas';
$username = 'ubuntu';
$password = 'Mexico1.';

//datos conexion internet
//$hostname = 'bkjqya0pu8yo586xvsnj-mysql.services.clever-cloud.com';
//$database = 'bkjqya0pu8yo586xvsnj';
//$username = 'ud91kir94surbvdx';
//$password = '6c1GWzWXQEGYIBoeTEB3';

//internet bd wwebhost
//$hostname = 'localhost';
//$database = 'id14191481_base1';
//$username = 'id14191481_user1';
//$password = 'Tb8UoG(jS6D)Z#QC';


//se realiza la conexion
$mysqli = new mysqli($hostname, $username,$password, $database);
if ($mysqli -> connect_errno) {
die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() 
. ") " . $mysqli -> mysqli_connect_error());
}
/*
else{
echo "Conexión exitosa!";
}
*/

/*

//insert
if ($mysqli->query("insert into tabla1 values ('valor4','valor5','valor6')") === TRUE) {
print_r('insertado');
}
*/

//select
/*
$query = "SELECT * from tabla1";
$resultado=$mysqli->query($query);

if ($resultado == true){
print("<table>");
while ($rows = $resultado->fetch_assoc()) {
print("<tr>");
print("<td>".$rows["campo1"]."</td>");
print("<td>".$rows["campo2"]."</td>");
print("<td>".$rows["campo3"]."</td>");
print("</tr>");
}
print("</table>");
$resultado->free();
}
else{
	echo "Error al ejecutar el comando:".$mysqli->error;
}
*/

?>
