<?php
session_start(); 
$_SESSION["loged"] = false;
$_SESSION["nombres"] = $nombre;
$_SESSION["nick"] = $usuario;
session_destroy();
header("location:index.php"); 
?>