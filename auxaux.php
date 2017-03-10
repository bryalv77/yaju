<?php
session_start();
?>
<html>
<head>
    <title>Redireccionando</title>
      <link rel="SHORTCUT ICON" href="imagenes/icon.ico" />
    <link rel="stylesheet" type="text/css" href="css.css" media="screen" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php require_once("cabecera.php");?>
    <div align="center">
      <h2>Bienvenido <?php echo($_SESSION["nombre"]);?></h2>
  </div>
    <form name="frm" method="post" action="auxregistro.php">
            <p>Nick: <input id="nick" type="text" name="txtNick"/></p>
            <p>Nombre(s): <input type="text" name="txtName"/></p>
            <p>Apellido(s): <input type="text" name="txtLastName"/></p>
            <p>Fecha de Nacimiento (AAAA-MM-DD): <input type="text" name="txtBirthday"/></p>
            <p>G&eacute;nero: </p>
            <input type ="radio" name="rd" value="Masculino"/>Masculino<br />
            <input type ="radio" name="rd" value="Femenino"/>Femenino<br />
            <p>Correo: <input type="text" name="txtCorreo"/></p>
            <p>Password: <input type="password" name="txtPassword"/></p>
            <p>Confirmar Password: <input type="password" name="txtPasswordConfirm"/></p>
            <p><input onclick="uploadFile()" type="submit" name="btnSubmit" value="Registrate"/></p>
        </form>
    <?php require_once("pie.php");?>
</body>
</html>
<?php
?>