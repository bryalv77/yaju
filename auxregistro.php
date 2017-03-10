<?php
require_once("funciones.php");
if(isset($_POST['txtNick']) && isset($_POST['txtName']) && isset($_POST['txtLastName']) && isset($_POST['txtBirthday']) && isset($_POST['txtCorreo']) && isset($_POST['rd']) && isset($_POST['txtPassword'])) {

$nick = $_POST["txtNick"];
$nombre = $_POST["txtName"];
$apellido = $_POST["txtLastName"];
$fecha = $_POST["txtBirthday"];
$correo = $_POST["txtCorreo"];
$sexo = $_POST["rd"];
$password = $_POST["txtPassword"];
$puntuacion = 10;


$sql = "INSERT INTO usuarios (nick, password, nombres, apellidos, correo, fechanacimiento, sexo, foto, puntaje) VALUES ('".$nick."','".$password."','".$nombre."','".$apellido."','".$correo."','".$fecha."','".$sexo."','".$nick.".jpg',".$puntuacion.")";
if (mysqli_query($conn, $sql)) {
    session_start();
    $_SESSION["loged"] = true;
    $_SESSION["nombre"] = $nombre;
    $_SESSION["nick"] = $nick;
    $_SESSION["puntaje"] = $puntuacion;
    header("location:auxaux.php");  
} 
mysqli_close($conn);
}
?>
