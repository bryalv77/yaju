<?php
session_start();
require_once("funciones.php");
$nick = $_SESSION["nick"];
$pregunta = $_GET["pregunta"];
$ni = $_GET["ni"];
$respuesta = $_POST["txtRespuesta"];
$puntosactuales = $_SESSION["puntaje"];
$f=time();
$fecha = "CURRENT_DATE";
$hora = "CURRENT_TIME";
$puntuacion = 0;
$puntosnuevos=0;

$sqlprimera="select * from respuestas where pregunta='".$pregunta."';";
$result = $conn->query($sqlprimera);
if ($result->num_rows >0) {
}
else{
  $puntosnuevos = $puntosnuevos + 1;
}
$sql = "INSERT INTO respuestas (id, respuesta, pregunta, nick,  fecha, hora, mejor) VALUES (NULL,'".$respuesta."','".$pregunta."','".$nick."',".$fecha.",".$hora.",".$puntuacion.")";
if (mysqli_query($conn,$sql)) {
    $puntosnuevos = $puntosnuevos + 2;
}
$sqlans= "UPDATE `usuarios` SET puntaje = puntaje+ ".$puntosnuevos ." WHERE nick='".$nick."';";
if (mysqli_query($conn,$sqlans)) {
      $puntosactuales = $puntosactuales + $puntosnuevos;
      $_SESSION["puntaje"]=$puntosactuales;
    }
header("location:preguntas.php?pregunta=".$pregunta."&ni=".$ni."&puntosnuevos=".$puntosnuevos);  
mysqli_close($conn);
?>