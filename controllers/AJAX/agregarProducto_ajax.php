<?php
//include 'conexion.php';
include '../../database/conexioni.php';


	$Cod=$_POST['Codigo'];
	$Art=$_POST['Art'];
	$Costo=$_POST['Costo'];
	$Precio=$_POST['Precio'];
	$Provee=$_POST['Provee'];
	$Fcad=$_POST['Fcad'];

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '';


switch ($opcion){
    case 1:
        echo $rrr=$mysqli->query("insert into producto values (NULL,'$Cod','$Art','$Costo','$Precio','$Fcad','$Provee')");

    break;
    case 2:
        $consulta =$mysqli->query(" select id_proov from proveedores where nombre = '$Provee' ");
        $result = $consulta->fetch_assoc();
        $idProov=$result['id_proov'];


        $rrr=$mysqli->query("
        update producto 
set 
 descripcion ='$Art',
 costo='$Costo',
 precio='$Precio',
 fecha_caducidad='$Fcad',
  id_proov = '$idProov'
 where codigo = '$Cod';
        ");
        break;
    case 3:
        $consulta = "DELETE FROM PRODUCTO WHERE user_id='$user_id' ";
        echo $result = $mysqli->query($consulta);
        break;

}

//$qmax=mysql_query("SELECT max(id_producto) as NUMAX from producto")or die(mysql_error());
$qmax="SELECT max(id_producto) as NUMAX from producto";


//$rmax=mysql_fetch_array($qmax,MYSQL_ASSOC);
$qmax2=$mysqli->query($qmax);

$rmax = $qmax2->fetch_array(MYSQLI_ASSOC); //O también $resultado->fetch_assoc()


$rm= $rmax["NUMAX"];
//echo $rm;
$rm++;


	//echo $rrr=mysql_query("insert into producto values ('$rm','$Prod','$Art','$Costo','$Precio','$Provee','$Fcad')")or die(mysql_error());
	//echo $rrr=$mysqli->query("insert into producto values ('$rm','$Prod','$Art','$Costo','$Precio','$Provee','$Fcad')");
	//echo $rrr=$mysqli->query("insert into producto values (NULL,5,'produucto4',12,14,NULL,'2020-12-12',2)");


	//$q2=mysql_query("select distinct *from producto")or die(mysql_error());
    $q2 = $mysqli->query("select distinct *from producto");
?>