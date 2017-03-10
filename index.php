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
//$sql = "SELECT categoria FROM categorias order by id LIMIT ".$inicio.",".$maxReg;
$sql = "SELECT categoria FROM categorias";
$sqldos="SELECT preguntas, nick from preguntas";
$result = $conn->query($sqldos);
$a=array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $tmp=array($row["preguntas"],$row["nick"]);
        array_push($a,$tmp);
    }
}
$totalpreguntas = count($a);
$auxiliar = array();
for($i=0;$i<$totalpreguntas;$i++){
  array_push($auxiliar,$i);
}
shuffle($auxiliar);
//$claves_aleatorias = array_rand($auxiliar, $totalpreguntas-1);
?>
<html>
<head>
    <title>Yaj&uacute; Respuestas</title>
    <link rel="stylesheet" type="text/css" href="css.css" media="screen" />
    <link rel="SHORTCUT ICON" href="imagenes/icon.ico" />  
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <div>
    
  <header>
    <?php require_once("cabecera.php");?>
  </header>
   <article>
 <section style="float:left;">
<table class="special" style="float: left; "> 
      <tr>
        <td><b>Categor&iacute;as</b></td>
      </tr>
<?php
        $result = $conn->query($sql);
        $contador=0;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
?>
      <tr>
        <td><a href="categorias.php?categoria=<?php echo($row["categoria"]);?>"><?php echo($row["categoria"]); ?></a></td>
      </tr>
      <?php
            $contador = $contador + 1;
             }
        }
        $cursor = null;
?>
</table> 
<table class="special"style="float: middle; " >
        <tr>
        <td><b>Preguntas</b></td>
          <td></td>
        
        </tr>
 
<?php
          $contador=0;
//        $result = $conn->query($sql);

  //      if ($result->num_rows > 0) {
  
//            while($row = $result->fetch_assoc()) {
          while($contador<=$maxReg){
?>
            <tr>
                <td colspan="2"><a href="preguntas.php?pregunta=<?php echo($a[$auxiliar[$contador]][0]);?>&ni=<?php echo($a[$auxiliar[$contador]][1]);?>"><?php echo( $a[$auxiliar[$contador]][0]); ?></a></td>
              
            </tr>
<?php
            $contador = $contador + 1;
        }
  //      $cursor = null;
?>
<tr><td><br /></td></tr>
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
  </section>
<aside>
<table class="special" style="float: right;" > 
   <tr>
  <td align=right><?php
        if(isset($_SESSION["loged"])){
        if($_SESSION["loged"] == true){
            ?>
            <p><? echo($_SESSION["nombres"]);?></p>
            <p>Puntaje:<? echo($_SESSION["puntaje"]);?></p>
            <p><img src="https://firebasestorage.googleapis.com/v0/b/yaju-201ac.appspot.com/o/usuarios%2F<?php echo($_SESSION["nick"]);?>.jpg?alt=media"  height="50" width="50"></p>
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
  </table>
  </aside>
   </article>
   <section>
<footer>
    <?php require_once("pie.php");?>
  </footer>
  </section>
    
  </div>
</body>
</html>