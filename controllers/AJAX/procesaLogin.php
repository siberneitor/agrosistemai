<?php
session_start();
include '../../database/conexioni.php';



$inputUser  = $_POST['user'];
$inputPassword  = $_POST['password'];

//$passEncript = base64_encode('holamundo');
//$sqli = "update usuario set password ='$passEncript' where usuario = '$inputUser'";
//$mysqli->query($sqli) or die ($mysqli->error);
//echo 'user = '.$inputUser.'/'.'password = '.$inputPassword;

$sql = "select usuario,password from  usuario where usuario = '$inputUser'";
$ejecQuery = $mysqli->query($sql) or die ($mysqli->error);
$result = $ejecQuery->fetch_assoc();
$userBD = $result['usuario'];
$passBD = $result['password'];
$passBdDecod = base64_decode($passBD);

if(isset($inputUser) && !empty($inputUser) && $inputUser===$userBD && isset($inputPassword) && !empty($inputPassword) && $inputPassword===$passBdDecod){

     $_SESSION['user'] = $inputUser;
//     var_dump('BIEN');
    echo 1;
}else {
//    var_dump('MAL');
    echo 0;
}

?>