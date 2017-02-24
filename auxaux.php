<?php
session_start();
?>
<html>
<head>
    <title>Redireccionando</title>
    
    <meta http-equiv="refresh"
   content="5; url=index.php">
</head>
<body>
    <font face = "Century Gothic">
        <h1>Bienvenido <?php echo($_SESSION["nombre"]);?></h1>
        <p>Se te redireccionará al inicio</p>
    </font>
</body>
</html>