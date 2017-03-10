<?php
require_once("funciones.php");
$nueva = $_POST["nueva"];
$respuesta = $_POST["respuesta"];

$sql = "UPDATE respuestas SET respuesta='".$nueva."' WHERE respuesta = '".$respuesta."';";
$result = $conn->query($sql);
header("location:misrespuestas.php"); 

mysqli_close($conn);
?>