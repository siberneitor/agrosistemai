<?php
//include 'conexion.php';
include '../../database/conexioni.php';

//var_dump('entra a ajax proveedor');

$opcion = $_GET['opcion'];


$nombreCliente=$_GET['nombreCliente'];
	$apPat=$_GET['ap_pat'];
    $apMat=$_GET['ap_mat'];
	$domicil_clien=$_GET['domicilio_Clien'];
	$localidad_clien=$_GET['localidad_Clie'];
	$telef_clien=$_GET['telefono_Clien'];
	$email_clien=$_GET['email_Clien'];

	$fecha_alta = date("Y-m-d");



$id_cliente=$_GET['id_cliente'];
$NombreCli=$_GET['NombreCli'];
$ap_pat_cli=$_GET['ap_pat_cli'];
$ap_mat_cli=$_GET['ap_mat_cli'];
$domicilio_cli=$_GET['domicilio_cli'];
$localid_cli=$_GET['localid_cli'];
$telef_cli=$_GET['telef_cli'];
$email_cli=$_GET['email_cli'];
$cred_act_cli=$_GET['cred_act_cli'];
$estatus_cred_cli=$_GET['estatus_cred_cli'];

$cliente_id=$_GET['cliente_id'];

switch($opcion){
    case 1:
        echo $rrr=$mysqli->query("insert into cliente values (NULL,'$nombreCliente','$apPat','$apMat','$domicil_clien','$localidad_clien','$telef_clien','$email_clien','$fecha_alta',NULL,NULL,NULL)");


        break;
    case 2:
        /*
        $consulta =$mysqli->query(" select id_proov from proveedores where nombre = '$Provee' ");
        $result = $consulta->fetch_assoc();
        $idProov=$result['id_proov'];
        */

        /*
        $rrr=$mysqli->query("
        update cliente 
set 
 nombre ='$NombreCli',
 apellido_paterno='$ap_pat_cli',
 apellido_materno='$ap_mat_cli',
 domicilio='$domicilio_cli',
  localidad = '$localid_cli',
  telefono = '$telef_cli',
  email = '$email_cli',
  credito_actual='$cred_act_cli',
  estatus_credito_actual = '$estatus_cred_cli'
 where id_cliente= '$id_client';
        ");
        */
        $rrr=$mysqli->query("
        update cliente 
set 
 nombre ='nombrealgo',
 apellido_paterno='$ap_pat_cli',
 apellido_materno='$ap_mat_cli',
 domicilio='$domicilio_cli',
  localidad = '$localid_cli',
  telefono = 3456456,
  email = '$email_cli',
  credito_actual=NULL,
  estatus_credito_actual = NULL
 where id_cliente= '$id_cliente'
 ");


        break;
    case 3:
        $consulta = "DELETE FROM cliente WHERE id_cliente='$cliente_id' ";
        echo $result = $mysqli->query($consulta);

        break;
}

	//echo $rrr=mysql_query("insert into producto values ('$rm','$Prod','$Art','$Costo','$Precio','$Provee','$Fcad')")or die(mysql_error());
	//echo $rrr=$mysqli->query("insert into producto values ('$rm','$Prod','$Art','$Costo','$Precio','$Provee','$Fcad')");
	//echo $rrr=$mysqli->query("insert into producto values (NULL,5,'produucto4',12,14,NULL,'2020-12-12',2)");
	//echo $rrr=$mysqli->query("insert into cliente values (NULL,'$nombreCliente','$apPat','$apMat','$domicil_clien','$localidad_clien','$telef_clien','$email_clien','$fecha_alta','','','','','','','','','','')");


?>