<?php
require_once("funciones.php");
$nueva = $_POST["nueva"];
$pregunta = $_POST["preguntas"];

$sql = "UPDATE preguntas SET preguntas='".$nueva."' WHERE preguntas = '".$pregunta."';";
$result = $conn->query($sql);
header("location:mispreguntas.php"); 

mysqli_close($conn);
?>