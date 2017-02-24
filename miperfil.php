<?php
require_once("funciones.php");
$pagina = 0;
if(isset($_GET["pregunta"])){
    $preg=$_GET["pregunta"];
}

?>
<html>
<head>
    <title>Yajú Respuestas</title>
</head>
<body>
    <font face = "Century Gothic">
    
    <?php require_once("cabecera.php");?>
    
    <br />
    <div align = "center">
       <h2><?php echo($_SESSION["nombres"])?></h2> 
    </div>
    <ul id="menu">
  <li><a href="mispreguntas.php">Inicio</a></li>
  <li><a href="misrespuestas.php">Categorias</a></li>
</ul>
<p><a href="<?=$_SERVER["HTTP_REFERER"]?>">Atras</a></p>
<hr /> 
    </font>
    <?php require_once("pie.php");?>
</body>
</html>