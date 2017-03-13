<?php
require_once("funciones.php");
$pagina = 0;
if(isset($_GET["pregunta"])){
    $preg=$_GET["pregunta"];
}

?>
<?php require_once("head.php")?>
  <article>
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
   </article>
   <section>
<footer>
    <?php require_once("pie.php");?>
     </footer>
</section>
</body>
</html>