<?php
session_start();
require_once("funciones.php");
$nick = $_SESSION["nick"];
$nombre = $_POST["txtName"];
$apellido = $_POST["txtLastName"];
$fecha = $_POST["txtBirthday"];
$correo = $_POST["txtCorreo"];
$sexo = $_POST["rd"];
$password = $_POST["txtPassword"];
$foto = $_POST["image-file"];
$puntuacion = 10;


$sql = "UPDATE `usuarios` SET `password`='".$password."',`nombres`='".$nombre."',`apellidos`='".$apellido."',`correo`='".$correo."',`fechanacimiento`='".$fecha."',`sexo`='".$sexo."',`foto`='".$foto."',`puntaje`=".$puntuacion." WHERE nick ='". $nick."';";
if (mysqli_query($conn, $sql)) {
    session_start();
    $_SESSION["loged"] = true;
    $_SESSION["nombre"] = $nombre;
    $_SESSION["nick"] = $nick;
    header("location:auxaux.php");  
} 
mysqli_close($conn);
?>
<html>
<head>
<script src="https://www.gstatic.com/firebasejs/3.6.9/firebase.js">
  function subir(){
      window.alert("archivo"); 
  var config = {
    apiKey: "AIzaSyDXTTLf6Gd3DdyMvNrtaxArmgqm-UrW6Aw",
    authDomain: "yaju-201ac.firebaseapp.com",
    databaseURL: "https://yaju-201ac.firebaseio.com",
    storageBucket: "yaju-201ac.appspot.com",
    messagingSenderId: "1052977603772"
  };
  firebase.initializeApp(config);
var archivo  = '<?php echo $foto;?>';
var uploadTask = storageRef.child('images/' + <?php echo($nick."jpg")?>).put(archivo);
      window.alert("archivo");
  }
</script>
      <link rel="SHORTCUT ICON" href="imagenes/icon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
<body>
</body>    
</html>