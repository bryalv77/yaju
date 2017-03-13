<?php
session_start(); 
$_SESSION["loged"] = false;
$_SESSION["nombres"] = $nombre;
$_SESSION["nick"] = $usuario;
session_destroy();
if(isset($_GET["link"])){
        $pregunta=$_GET["link"];
        if(isset($_GET["parametros"])){
          $param=$_GET["parametros"];
          header("location:".$pregunta.$param); 
        }
        }
      else{
        header("location:index.php"); 
      }
?>