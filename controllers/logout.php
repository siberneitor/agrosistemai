<?php
session_start();
session_destroy();
/* Redirigir */
header('Location: ../views/login.php');

?>