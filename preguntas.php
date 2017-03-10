<?php
session_start();
require_once("funciones.php");

if(isset($_GET["pregunta"])){
    $preg=$_GET["pregunta"];
}
if(isset($_GET["ni"])){
    $ni=$_GET["ni"];
}
$sqldos="SELECT respuesta, fecha, hora, nick, mejor from respuestas where pregunta = '".$preg."' order by mejor desc, fecha desc, hora desc";

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
       <h2><?php echo($preg)?></h2>
      <h6>
        <?php echo($ni)?>
      </h6>
    </div>
    <table>
        <tr>
        <td width = "600"><b>Respuestas</b></td>
        <td><b>Fecha</b></td>
        <td><b>Hora</b></td>
        <td><b>Usuario</b></td>
        <td><b>La Mejor?</b></td>
        <td><b>Foto</b></td>
        <td align=right><?php
       if(isset($_SESSION["loged"])){
        if($_SESSION["loged"] == true){
            ?>
            <p><? echo($_SESSION["nombres"]);?></p>
            <p>Puntaje:<? echo($_SESSION["puntaje"]);?></p>
            <p><img src="https://firebasestorage.googleapis.com/v0/b/yaju-201ac.appspot.com/o/usuarios%2F<?php echo($_SESSION["nick"]);?>.jpg?alt=media"  width = "50" height = "50"></p>
            <a href=perfil.php>Mi Perfil</a>
            <a href=logout.php>Cerrar Sesi&oacute;n</a>
          <?php  
        }}
        else{
        ?>
          <b>Inicia Sesi&oacute;n</b>
        <form name="frm" method="post" action="login.php">
            <p>Usuario: <input type="text" name="txtUser"/></p>
            <p>Password: <input type="password" name="txtPassword"/></p>
            <p><input type="submit" name="btnSubmit" value="Login"/></p>
        </form>
        <br />
<a href=registro.php>Reg&iacute;strate</a>
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
                <td><?php echo($row["respuesta"])?></td>
                <td>
                    <?php echo($row["fecha"])?>
                </td>
                <td>
                    <?php echo($row["hora"])?>
                </td>
                <td>
                    <?php echo($row["nick"])?>
                </td>
                <td>
                    <?php                 
                $sqlCompleto = "SELECT nick FROM preguntas where preguntas = '".$preg."';";
                $resultx = $conn->query($sqlCompleto);
                if ($resultx->num_rows > 0) {
                    while($rowx = $resultx->fetch_assoc()) {
                        $resultado = $rowx["nick"];
                    }
                }
                if(isset($_SESSION["nick"])){                                                  
                  if($_SESSION["nick"]==$resultado){
                ?>
                    <form name="frm" method="post" action="valorarpregunta.php">
                    <input type="hidden" name="respuesta" value="<?php echo($row["respuesta"]);?>" />    
                    <p><input type="submit" name="btnSubmit" value="Escoger"/></p>
                    </form>  
                <?php
                  }
                }
                else{
                    if($row["mejor"]==0){
                      echo("No");
                    }
                    else{
                      echo("Si");
                    }
                }   
                 
                  ?>
                </td>
                <td>
                    <p><img src="https://firebasestorage.googleapis.com/v0/b/yaju-201ac.appspot.com/o/usuarios%2F<?php echo($row["nick"]);?>.jpg?alt=media"  width="50" height="50"></p>
                </td>
            </tr>
<?php
             }
            
        }
        else{
                echo("No hay respuestas a&uacute;n");
            }
        $cursor = null;
?>

    </table>
        <br /><br /><br />
        <?php
        if(isset($_SESSION["loged"])){
        if($_SESSION["loged"] == true){
            ?>
            <form name="frm" method="post" action="respondiendo.php?pregunta=<?php echo($preg);?>">
            <p>Respuesta: <input type="text" style="WIDTH: 1000px;" name="txtRespuesta"/></p>
            <p><input type="submit" name="btnSubmit" value="Responder"/></p>
        </form>
          <?php  
        }}
        else{
        ?>
       <h2>Inicie sesi&oacute;n para responder</h2>
        <?php
        }
        ?>
    <?php require_once("pie.php");?>
</body>
</html>