<?php
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
$sqldos="SELECT categoria from categorias order by id LIMIT ".$inicio.",".$maxReg;
?>
<?php require_once("head.php")?>
    <article>
    <br />
    <div align = "center">
       <h2>Categor&iacute;as</h2> 
    </div>
<table>
        <tr>
        <td><b>Categor&iacute;as</b></td>
        <td align=right><?php
        session_start();
        if(isset($_SESSION["loged"])){
        if($_SESSION["loged"] == true){
            ?>
            <p><?php echo($_SESSION["nombres"]);?></p>
            <p>Puntaje:<?php echo($_SESSION["puntaje"]);?></p>
            <p><img src="https://firebasestorage.googleapis.com/v0/b/yaju-201ac.appspot.com/o/usuarios%2F<?php echo($_SESSION["nick"]);?>.jpg?alt=media"  height="50" width="50"></p>
            <p><?php echo($_SESSION["nick"]);?></p>
            <a href=perfil.php>Mi Perfil</a>
            <a href="logout.php?link=<?php echo($url);?>&parametros=<?php echo($parametros);?>">Cerrar Sesi&oacute;n</a>
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
                <td><a href="categorias.php?categoria=<?php echo($row["categoria"]);?>"><?php echo($row["categoria"])?></a></td>
            </tr>
<?php
             }
        }
        $cursor = null;
?>
<tr><td><br /></td>
      </tr>
<tr>
    <td >
        <?php
            if($pagina>0)
            {
        ?>
                <a href="categoriastodas.php?pagina=<?php echo($pagina-1); ?>">
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
            <a href="categoriastodas.php?pagina=<?php echo($pagina+1); ?>">
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