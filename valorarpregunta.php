<?php
require_once("funciones.php");
$respuesta = $_POST["respuesta"];
$nick = $_POST["nick"];
$sql ="UPDATE respuestas SET mejor= 1 WHERE respuesta = '".$respuesta."';";
$paso=0;
if (mysqli_query($conn, $sql)) {
 $paso=1;   
}
else
{
  $paso = 0;
  header("location:error.php");  
}
if($paso==1){
$sqlans= "UPDATE usuarios SET puntaje = puntaje+6 WHERE nick='".$nick."';";
if (mysqli_query($conn,$sqlans)) {
    $paso = 1;
}
  else{
    $paso = 0;
    header("location:error.php");
  }
mysqli_close($conn);
}
if($paso==1){
  header("location:preguntastodas.php");
}
?>