<?php
require_once("funciones.php");
?>
<html>
<head>
    <script>
    
    </script>
    <title>Yajú Respuestas Registro</title>
</head>
<body>
    <font face = "Century Gothic">
    <?php require_once("cabecera.php");?>
    <h2>Bienvenido a Yajú</h2>
    <form name="frm" method="post" action="auxregistro.php">
            <p>Nick: <input type="text" name="txtNick"/></p>
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
    </font>
    <?php require_once("pie.php");?>
</body>
</html>