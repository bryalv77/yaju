<?php
require_once("funciones.php");
$usuario = $_POST["txtUser"];
$password = $_POST["txtPassword"];

$sql = "select nick, password, nombres, puntaje from usuarios where nick = '".$usuario."' AND password = '".$password."'";
echo($sql); 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $nombre = $row["nombres"];
        session_start();
        $_SESSION["loged"] = true;
        $_SESSION["nombres"] = $row["nombres"];
        $_SESSION["nick"] = $usuario;
        $_SESSION["puntaje"]=$row["puntaje"];
        header("location:index.php"); 
    }
}
else{
    //header("location:error.php"); 
}
mysqli_close($conn);
?>