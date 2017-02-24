<?php
session_start();
require_once("funciones.php");
$pagina = 0;
if(isset($_GET["pagina"]))
if(($_GET["pagina"])>0)
$pagina = $_GET["pagina"];
$inicio = $pagina * $maxReg;
$sqlCompleto = "SELECT MAX(id) FROM categorias";
$result = $conn->query($sqlCompleto);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $resultado = $row["MAX(id)"];
    }
}
$totalReg = ($resultado);
$totalPag = ceil($totalReg/$maxReg)-1;
$cursor = null;
$sql = "SELECT categoria FROM categorias order by id LIMIT ".$inicio.",".$maxReg;
$sqldos="SELECT preguntas, usuario from preguntas";
$result = $conn->query($sqldos);
$a=array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        array_push($a,$row["preguntas"]);
    }
}
$claves_aleatorias = array_rand($a, 10);
?>
<html>
<head>
    <title>Yajú Respuestas</title>
    
    <link rel="stylesheet" type="text/css" href="css.css" media="screen" />
</head>
<body>
    <?php require_once("cabecera.php");?>
    <div align = "right">
        
    </div>
    <br />
    
    <table width = 1200>
        <tr>
        <td><b>Categorías</b></td>
        <td><b>Preguntas</b></td>
        <td align=right><?php
        if(isset($_SESSION["loged"])){
        if($_SESSION["loged"] == true){
            ?>
            <p><? echo($_SESSION["nombres"]);?></p>
            <p>Puntaje:<? echo($_SESSION["puntaje"]);?></p>
            <p><img src="https://firebasestorage.googleapis.com/v0/b/yaju-201ac.appspot.com/o/usuarios%2F<?php echo($_SESSION["nick"]);?>.jpg?alt=media"  style="width:width;height:height;"></p>
            <a href=perfil.php>Mi Perfil</a>
            <a href=logout.php>Cerrar Sesi&oacute;n</a>
          <?php  
        }}
        else{
        ?>
        <form name="frm" method="post" action="login.php">
            <p>Usuario: <input type="text" name="txtUser"/></p>
            <p>Password: <input type="password" name="txtPassword"/></p>
            <p><input type="submit" name="btnSubmit" value="Login"/></p>
        </form>
        <br />
        <a href=registro.php>Regístrate</a>
        <?php
        }
        ?></td>
        </tr>
<?php
        $result = $conn->query($sql);
        $contador=0;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
?>
            <tr>
                <td><a href="categorias.php?categoria=<?php echo($row["categoria"]);?>"><?php echo($row["categoria"]); ?></a></td>
                <td><a href="preguntas.php?pregunta=<?php echo($a[$claves_aleatorias[$contador]]);?>"><?php echo( $a[$claves_aleatorias[$contador]]   ); ?></a></td>
            </tr>
<?php
            $contador = $contador + 1;
             }
        }
        $cursor = null;
?>

<tr>
    <td >
        <?php
            if($pagina>0)
            {
        ?>
                <a href="index.php?pagina=<?php echo($pagina-1); ?>">
                    Anteriores
                </a>
        <?php
            }
            else
                echo("&nbsp;");
        ?>
    </td>
    <td>
        <?php
            if($pagina<$totalPag)
            {
        ?>
            <a href="index.php?pagina=<?php echo($pagina+1); ?>">
                Siguientes
            </a>
        <?php
            }
            else
                echo("&nbsp;");
        ?>
    </td>
</tr>
    </table>
    <?php require_once("pie.php");?>
</body>
</html>