<?php
include '../../database/conexioni.php';
	$resetearTemporal=$mysqli->query("delete from temporal2");
	$resetearInvTemp=$mysqli->query("delete from inventarioTempXprod");
?>
