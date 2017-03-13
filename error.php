<?php
session_start();
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="estilos.css" media="screen" />
    <title>Redireccionando</title>
      <link rel="SHORTCUT ICON" href="imagenes/icon.ico" />
    <meta http-equiv="refresh"content="4; url=index.php">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <?php
  if(isset($_GET["error"])){
    $error=$_GET["error"];
  ?>
  <h1>Error </h1>
        <p>Usuario ya está en uso</p>
        <p>Se est&aacute; redireccionando al registro</p>
  <?php
    header("location:registro.php?error=".$error);  
  }
  else{
  ?>
        <h1>Error </h1>
        <p>Usuario incorrecto</p>
        <p>Se est&aacute; redireccionando al inicio</p>
  <?php
  }
    ?>
</body>
</html>