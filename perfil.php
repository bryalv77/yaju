<?php
session_start();
require_once("funciones.php");
$pagina = 0;
if(isset($_GET["pregunta"])){
    $preg=$_GET["pregunta"];
}require_once("head.php")?>
    <article>
    <br />
    <div align = "center">
       <h2><?php if(isset($_SESSION["nombres"])){echo($_SESSION["nombres"]);}?></h2> 
    </div>
    <ul id="menu">
  <li><a href="mispreguntas.php">Mis Preguntas</a></li>
  <li><a href="misrespuestas.php">Mis Respuestas</a></li>
</ul>
<div align = "center">
       <h2>Modifica tus datos</h2> 
    </div>
<hr /> 
     <?php   
      $a=$_SESSION["nombres"];
      $sql = "select * from usuarios where nombres = '$a'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
      echo "<form action='modificarregistro.php' method='post'>
      <input type='hidden' name='codigo' value='$row[nick]'>
      <p>Nombre(s):<input type='text' name='txtName' value='$row[nombres]'> </p>
      <p>Apellido(s):<input type='text' name='txtLastName' value='$row[apellidos]'>
      <p>Fecha de Nacimiento (AAAA-MM-DD): <input type='text' name='fecha' value='$row[fechanacimiento]'>
      <p>G&eacute;nero: <input type='text' name='rd' value='$row[sexo]'> </p>
      <p>Correo: <input type='text' name='txtCorreo' value='$row[correo]'/></p>
      <p>Password: <input type='password' name='txtPassword' value='$row[password]'/></p>
      <p>Confirmar Password: <input type='password' name='txtPasswordConfirm'/></p>
      <p>Foto: <input id='image-file' type='file' /></p>
      <input type='submit' name='Modificar' value='Modificar'>
      </form>";
          }
      }
      else{
          header("location:error.php"); 
          }
      ?> 
     
   <!-- <form name="frm" method="post" action="modificarregistro.php">
            <p>Nombre(s): <input type="text" name="txtName"/></p>
            <p>Apellido(s): <input type="text" name="txtLastName"/></p>
            <p>Fecha de Nacimiento (AAAA-MM-DD): <input type="text" name="txtBirthday"/></p>
            <p>G&eacute;nero: </p>
            <input type ="radio" name="rd" value="Masculino"/>Masculino<br />
            <input type ="radio" name="rd" value="Femenino"/>Femenino<br />
            <p>Correo: <input type="text" name="txtCorreo"/></p>
            <p>Password: <input type="password" name="txtPassword"/></p>
            <p>Confirmar Password: <input type="password" name="txtPasswordConfirm"/></p>
            <p>Foto: <input id="image-file" type="file" /></p>
            <p><input type="submit" name="btnSubmit" value="Registrate"/></p>
        </form>!-->
   </article>
   <section>
<footer>
    <?php require_once("pie.php");?>
     </footer>
</section>
</body>
</html>