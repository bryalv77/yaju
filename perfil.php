<?php
session_start();
require_once("funciones.php");
$pagina = 0;
if(isset($_GET["pregunta"])){
    $preg=$_GET["pregunta"];
}

?>
<html>
<head>
    <title>Yaj&uacute; Respuestas</title>
      <link rel="SHORTCUT ICON" href="imagenes/icon.ico" />
    <link rel="stylesheet" type="text/css" href="css.css" media="screen" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php require_once("cabecera.php");?>
    
    <br />
    <div align = "center">
       <h2><?php if(isset($_SESSION["nombres"])){echo($_SESSION["nombres"]);}?></h2> 
    </div>
    <ul id="menu">
  <li><a href="mispreguntas.php">Mis Preguntas</a></li>
  <li><a href="misrespuestas.php">Mis Respuestas</a></li>
</ul>
<div align = "center">
       <h2>Modifica tus datos</h2> 
    </div>
<hr /> 
    <form name="frm" method="post" action="modificarregistro.php">
            <p>Nombre(s): <input type="text" name="txtName"/></p>
            <p>Apellido(s): <input type="text" name="txtLastName"/></p>
            <p>Fecha de Nacimiento (AAAA-MM-DD): <input type="text" name="txtBirthday"/></p>
            <p>G&eacute;nero: </p>
            <input type ="radio" name="rd" value="Masculino"/>Masculino<br />
            <input type ="radio" name="rd" value="Femenino"/>Femenino<br />
            <p>Correo: <input type="text" name="txtCorreo"/></p>
            <p>Password: <input type="password" name="txtPassword"/></p>
            <p>Confirmar Password: <input type="password" name="txtPasswordConfirm"/></p>
            <p>Foto: <input id="image-file" type="file" /></p>
            <p><input type="submit" name="btnSubmit" value="Registrate"/></p>
        </form>
    <?php require_once("pie.php");?>
</body>
</html>