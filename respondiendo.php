<?php
session_start();
require_once("funciones.php");
$nick = $_SESSION["nick"];
$pregunta = $_GET["pregunta"];
$respuesta = $_POST["txtRespuesta"];
$puntos = $_SESSION["puntaje"];
$f=time();
$fecha = "CURRENT_DATE";
$hora = "CURRENT_TIME";
$puntuacion = 0;

$sql = "INSERT INTO respuestas (id, respuesta, pregunta, nick,  fecha, hora, mejor) VALUES (NULL,'".$respuesta."','".$pregunta."','".$nick."',".$fecha.",".$hora.",".$puntuacion.")";
echo($sql); 
if (mysqli_query($conn,$sql)) {
    $a = 1;
}
$sqlans= "UPDATE `usuarios` SET puntaje = puntaje+2 WHERE nick='".$nick."';";
if (mysqli_query($conn,$sqlans)) {
    if($a==1){
    session_start();
        $puntos = $puntos -2;
    $_SESSION["puntaje"]=$puntos;
    }
}
$sqlcheck="SELECT pregunta FROM respuestas GROUP BY pregunta HAVING count(*) = 1";
$result = $conn->query($sqlcheck);
        if ($result->num_rows >0) {
         $a=4;   
        }
if($a==4){
$sqlans= "UPDATE `usuarios` SET puntaje = puntaje+1 WHERE nick='".$nick."';";
if (mysqli_query($conn,$sqlans)) {
    session_start();
    $puntos = $puntos +1;
    $_SESSION["puntaje"]=$puntos;
}
}
header("location:preguntas.php?pregunta=".$pregunta);  
mysqli_close($conn);
?>