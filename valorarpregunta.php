<?php
require_once("funciones.php");
$respuesta = $_POST["respuesta"];
$nick = $_SESSION["nick"];
$sql ="UPDATE respuestas SET mejor= 1 WHERE respuesta = '".$respuesta."';";
if (mysqli_query($conn, $sql)) {
    header("location:index.php");  
} 
$sqlans= "UPDATE `usuarios` SET puntaje = puntaje+1 WHERE nick='".$nick."';";
if (mysqli_query($conn,$sqlans)) {
    session_start();
    $puntos = $puntos + 6;
    $_SESSION["puntaje"]=$puntos;
}
mysqli_close($conn);
?>