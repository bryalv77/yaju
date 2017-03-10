<?php
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
  <li><a href="mispreguntas.php">Inicio</a></li>
  <li><a href="misrespuestas.php">Categorias</a></li>
</ul>
<p><a href="<?=$_SERVER["HTTP_REFERER"]?>">Atras</a></p>
<hr /> 
    <?php require_once("pie.php");?>
</body>
</html>