<?php
session_start();
require_once("funciones.php");
$pagina = 0;
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
if(isset($_SESSION["nick"])){
  $sqldos="SELECT preguntas, fecha, hora from preguntas where nick = '".$_SESSION["nick"]."';";
}
require_once("head.php")?>
    <article>
    <br />
    <div align = "center">
       <h2>Categorias</h2> 
    </div>
<table>
        <tr>
        <td><b>Mis Preguntas</b></td>
        <td><b>Fecha</b></td>
        <td><b>Hora</b></td>
        <td align=right><?php
        if(isset($_SESSION["loged"])){
        if($_SESSION["loged"] == true){
            ?>
            <p><? echo($_SESSION["nombres"]);?></p>
            <p>Puntaje:<? echo($_SESSION["puntaje"]);?></p>
            <p><img src="https://firebasestorage.googleapis.com/v0/b/yaju-201ac.appspot.com/o/usuarios%2F<?php echo($_SESSION["nick"]);?>.jpg?alt=media"  width="50" height="50"></p>
            <a href=perfil.php>Mi Perfil</a>
            <a href=logout.php>Cerrar Sesi&oacute;n</a>
          <?php  
        }}
        else{
        ?>
          <b>Inicia Sesi&oacute;n</b>
        <form name="frm" method="post" action="login.php">
            <p>Usuario: <input type="text" name="txtUser"required/></p>
            <p>Password: <input type="password" name="txtPassword"required/></p>
          <input type="hidden" name="link" value="<?php echo($url);?>">
          <input type="hidden" name="parametros" value="<?php echo($parametros);?>">
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
                <td><a href="preguntas.php?pregunta=<?php echo($row["preguntas"]);?>"><?php echo($row["preguntas"])?></a></td>
                <td><?php echo($row["fecha"])?></td>
                <td><?php echo($row["hora"])?></td>
            <!-- 
              
              <td><form name="frm" method="post" action="modificarpregunta.php">
            <p><input type="text" name="nueva"/></p>
            <p><input type="hidden" name="preguntas" value="<?php //echo($row["preguntas"]);?>" /></p>
            <p><input type="submit" name="btnSubmit" value="Modificar"/></p>
        </form></td>
            -->   
  
  </tr>
<?php
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
                <a href="mispreguntas.php?pagina=<?php echo($pagina-1); ?>">
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
            <a href="mispreguntas.php?pagina=<?php echo($pagina+1); ?>">
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
   </article>
   <section>
<footer>
    <?php require_once("pie.php");?>
     </footer>
</section>
</body>
</html>