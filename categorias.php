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
$sqldos="SELECT preguntas, nick, fecha, hora from preguntas where categoria = '".$cat."' order by fecha desc, hora desc";

?>
<?php require_once("head.php")?>
  <article>
    <br />
    <div align = "center">
       <h2><?php echo($cat)?></h2> 
    </div>
<table>
        <tr>
        <td><b>Preguntas</b></td>
          <td><b>Usuario</b></td>
        <td><b>Fecha</b></td>
        <td><b>Hora</b></td>
        <td align=right><?php
        session_start();
       if(isset($_SESSION["loged"])){
        if($_SESSION["loged"] == true){
            ?>
            <p><?php echo($_SESSION["nombres"]);?></p>
            <p>Puntaje: <?php echo($_SESSION["puntaje"]);?></p>
            <p><img src="https://firebasestorage.googleapis.com/v0/b/yaju-201ac.appspot.com/o/usuarios%2F<?php echo($_SESSION["nick"]);?>.jpg?alt=media"  height="50" width="50"></p>
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
                <td><a href="preguntas.php?pregunta=<?php echo($row["preguntas"]);?>&ni=<?php echo($row["nick"]);?>"><?php echo($row["preguntas"])?></a></td>
              <td><?php echo($row["nick"]);?></td>
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
        $cursor = null;/*
?>
<tr></tr>
<tr>
    <td >
        <?php
            if($pagina>0)
            {
        ?>
                <a href="categorias.php?&pagina=<?php echo($pagina-1); ?>">
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
            <a href="categorias.php?&pagina=<?php echo($pagina+1); ?>">
                Siguientes
            </a>
        <?php
            }
            else
               echo("");
        ?>
    </td>
</tr>
<?php
*/  
  ?>
    </table>
        <br /><br /><br />
        <?php
        if(isset($_SESSION["loged"])){
        if($_SESSION["loged"] == true){
          if(isset($_GET["puntosperdidos"])){
						$puntosperdidos=$_GET["puntosperdidos"];
						echo("<script language='javascript'>alert('Has usado ".$puntosperdidos." puntos por tu pregunta realizada');</script>");
					}
          if($_SESSION["puntaje"]>=5){
            ?>
            <form id = "formulario "name="frm" method="post" action="preguntando.php?categoria=<?php echo($cat);?>">
            <p>Nueva Pregunta: <input type="text" style="WIDTH: 1000px;" name="txtPregunta" required/> </p>
            <p><input type="submit" name="btnSubmit" value="Preguntar"/></p>
        </form>
          <?php //<textarea form="formulario" name="txtPregunta" rows="4" cols="150" required></textarea>
          }
          else{
            echo("<h2>No tiene suficientes puntos para preguntar</h2>");
          }
        }}
        else{
        ?>
       <h2>Inicie sesi&oacute;n para participar</h2>
        <?php
        }
        ?>
   </article>
   <section>
<footer>
    <?php require_once("pie.php");?>
     </footer>
</section>
</body>
</html>