<?php
require_once("funciones.php");
$pagina = 0;
if(isset($_GET["categoria"])){
    $cat=$_GET["categoria"];
}
if(isset($_GET["pagina"]))
if(($_GET["pagina"])>0)
$pagina = $_GET["pagina"];
$inicio = $pagina * $maxReg;
$sqlCompleto = "SELECT MAX(id) FROM preguntas";
$result = $conn->query($sqlCompleto);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $resultado = $row["MAX(id)"];
    }
}
$totalReg = ($resultado);
$totalPag = ceil($totalReg/$maxReg)-1;
$cursor = null;
$sqldos="SELECT preguntas, fecha, hora from preguntas where categoria = '".$cat."' order by fecha desc, hora desc";

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
       <h2><?php echo($cat)?></h2> 
    </div>
    <table width = 1200>
        <tr>
        <td><b><font face = "Century Gothic" color="darkblue">Preguntas</font></b></td>
        <td><b><font face = "Century Gothic" color="darkblue">Fecha</font></b></td>
        <td><b><font face = "Century Gothic" color="darkblue">Hora</font></b></td>
        <td align=right><?php
        session_start();
        if($_SESSION["loged"] == true){
            ?>
            <p><? echo($_SESSION["nombres"]);?></p>
            <p>Puntaje:<? echo($_SESSION["puntaje"]);?></p>
            <p><img src="https://firebasestorage.googleapis.com/v0/b/yaju-201ac.appspot.com/o/usuarios%2F<?php echo($_SESSION["nick"]);?>.jpg?alt=media"  style="width:width;height:height;"></p>
            <a href=perfil.php>Mi Perfil</a>
            <a href=logout.php>Cerrar Sesi&oacute;n</a>
          <?php  
        }
        else{
        ?>
        <form name="frm" method="post" action="login.php">
            <p>Usuario: <input type="text" name="txtUser"/></p>
            <p>Password: <input type="password" name="txtPassword"/></p>
            <p><input type="submit" name="btnSubmit" value="Login"/></p>
        </form>
        <br />
            <font face = "Century Gothic" color="darkblue">
        <a href=registro.php>Regístrate</a>
            </font>
        <?php
        }
        ?></td>
        </tr>
<?php
        $result = $conn->query($sqldos);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
?>
            <tr>
                <td><a href="preguntas.php?pregunta=<?php echo($row["preguntas"]);?>"><?php echo($row["preguntas"])?></a></td>
                <td>
                    <?php echo($row["fecha"])?>
                </td>
                <td>
                    <?php echo($row["hora"])?>
                </td>
            </tr>
<?php
             }
            
        }
        else{
                echo("No hay preguntas a&uacute;n");
            }   
        $cursor = null;
?>

<tr>
    <td >
        <?php
            if($pagina>0)
            {
        ?>
                <a href="categorias.php?pagina=<?php echo($pagina-1); ?>">
                    Anteriores
                </a>
        <?php
            }
            else
                echo("");
        ?>
    </td>
    <td>
        <?php
            if($pagina<$totalPag)
            {
        ?>
            <a href="categorias.php?pagina=<?php echo($pagina+1); ?>">
                Siguientes
            </a>
        <?php
            }
            else
               echo("");
        ?>
    </td>
</tr>
    </table>
        <br /><br /><br />
        <?php
        if($_SESSION["loged"] == true){
            ?>
            <form name="frm" method="post" action="preguntando.php?categoria=<?php echo($cat);?>">
            <p>Nueva Pregunta: <input type="text" style="WIDTH: 1000px;" name="txtPregunta"/></p>
            <p><input type="submit" name="btnSubmit" value="Preguntar"/></p>
        </form>
          <?php  
        }
        else{
        ?>
       <h2>Inicie sesi&oacute;n para responder</h2>
        <?php
        }
        ?>
     
        
    </font>
    <?php require_once("pie.php");?>
</body>
</html>