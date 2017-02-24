<?php
session_start();
require_once("funciones.php");
$nick = $_SESSION["nick"];
$categoria = $_GET["categoria"];
$pregunta = $_POST["txtPregunta"];
$f=time();
$fecha = "CURRENT_DATE";
$hora = "CURRENT_TIME";
$puntos = $_SESSION["puntaje"];
$puntuacion = 0;

if($puntos>=5)
{
    $sql = "INSERT INTO preguntas(`id`, `categoria`, `preguntas`, `usuario`, `fecha`, `hora`) VALUES (NULL,'".$categoria."','".$pregunta."','".$nick."',".$fecha.",".$hora.")";
if (mysqli_query($conn,$sql)) {
      session_start();
}

$sqlans= "UPDATE `usuarios` SET puntaje = puntaje-5 WHERE nick='".$nick."';";
if (mysqli_query($conn,$sqlans)) {
    session_start();
    $puntos = $puntos - 5;
    $_SESSION["puntaje"]=$puntos;
    header("location:categorias.php?categoria=".$categoria);  
}
}
else
{
    echo("No tiene puntos suficientes");
}
mysqli_close($conn);
?>