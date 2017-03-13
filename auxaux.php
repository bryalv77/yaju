<?php
session_start();
?>
<html>
<head>
    <title>Redireccionando</title>
      <link rel="SHORTCUT ICON" href="imagenes/icon.ico" />
    <link rel="stylesheet" type="text/css" href="estilos.css" media="screen" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="refresh"content="4; url=index.php">
</head>
<body>
    <?php require_once("cabecera.php");?>
  <article>
    <div align="center">
      <h2>Bienvenido <?php echo($_SESSION["nombres"]);?></h2>
      <h5>
        Ahora podr&aacute;s participar del mejor sitio web de preguntas en internet.
      </h5>
      <h6>
        Se te redireccionar&aacute; al inicio.
      </h6>
  </div>
     </article>
   <section>
<footer>
    <?php require_once("pie.php");?>
     </footer>
</section>
</body>
</html>
<?php
?>