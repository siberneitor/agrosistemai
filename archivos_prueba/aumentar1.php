<?php
include 'conexion.php';
include 'conexioni.php';

//se busca el valor maximo de la columna precio de la tabla producto y se le asigna el alias VALORMAXIMO
 $busqueda = mysql_query("SELECT MAX(id_cliente) as VALORMAXIMO FROM cliente")or die(mysql_error());
 $re=mysql_fetch_array($busqueda, MYSQL_ASSOC);

 $nummax= $re["VALORMAXIMO"];
if (empty($nummax)){
	
	$nummax++;
	echo $nummax;
}

/*

/*
 // Si el codigo actual esta vacio o es 0, se convierte en 1.
 // En caso contrario se le suma +1.
 $codigo = (empty($consulta['num']) ? 1 : $consulta['num']+=1);
 echo 'El codigo actual es: '.$codigo;

 $consulta = mysqli_query($mysql,'INSERT INTO num_ficha (num) VALUES ('.$codigo.')');
 if(!$consulta){die('Error');}
*/
 ?>