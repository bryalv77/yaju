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
$puntosperdidos = 0;

if($puntos>=5)
{
    $sql = "INSERT INTO preguntas(`id`, `categoria`, `preguntas`, `nick`, `fecha`, `hora`) VALUES (NULL,'".$categoria."','".$pregunta."','".$nick."',".$fecha.",".$hora.")";
    if (mysqli_query($conn,$sql)) {
      $puntosperdidos=5;
    }
    if($puntos-$puntosperdidos>=0){
    $sqlans= "UPDATE `usuarios` SET puntaje = puntaje-".$puntosperdidos." WHERE nick='".$nick."';";
    if (mysqli_query($conn,$sqlans)) {
        $puntos = $puntos - $puntosperdidos;
        $_SESSION["puntaje"]=$puntos;
        header("location:categorias.php?categoria=".$categoria."&puntosperdidos=".$puntosperdidos);  
    }
    }
}
mysqli_close($conn);
?>