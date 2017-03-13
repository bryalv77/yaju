<?php
require_once("funciones.php");
if(isset($_POST["txtUser"])){
$usuario = $_POST["txtUser"];
}
if(isset($_POST["txtPassword"])){
$password = $_POST["txtPassword"];
}
if(isset($_POST["link"])){
  $pregunta=$_POST["link"];
}
if(isset($_POST["parametros"])){
  $param=$_POST["parametros"];
}
$sql = "select nick, password, nombres, puntaje from usuarios where nick = '".$usuario."' AND password = '".$password."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $nombre = $row["nombres"];
        session_start();
        $_SESSION["loged"] = true;
        $_SESSION["nombres"] = $row["nombres"];
        $_SESSION["nick"] = $usuario;
        $_SESSION["puntaje"]=$row["puntaje"];
        if(isset($_POST["link"])){
        $pregunta=$_POST["link"];
        if(isset($_POST["parametros"])){
          $param=$_POST["parametros"];
          header("location:".$pregunta.$param); 
        }
        }
      else{
        header("location:index.php"); 
      }
    }
}
else{
    header("location:error.php"); 
}
mysqli_close($conn);
?>