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
$sqlfecha = "select fecha,nick from preguntas where preguntas = '$preg'";
$result = $conn->query($sqlfecha);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
	  $_SESSION["fecha"] = $row["fecha"];
	  $_SESSION["nic"] = $row["nick"];
}
}
else{
    header("location:error.php"); 
}
$fe=$_SESSION["fecha"];
$nic=$_SESSION["nic"];
$d=date("Y-m-d");
$dias=dias_transcurridos($d,$fe);
$yaescogio=0;
$sqlMejor = "SELECT  mejor FROM  respuestas WHERE  pregunta =  '".$preg."' AND  mejor =1";
$resulty = $conn->query($sqlMejor);
if ($resulty->num_rows > 0) {
while($rowy = $resulty->fetch_assoc()) {
		$resultado = $rowy["mejor"];
		$yaescogio=1;
}
}
if(isset($_SESSION["loged"])){
	if($_SESSION["loged"]==true){
		if($_SESSION["nick"]==$nic){
if($yaescogio==0){
if($dias>5)
	{
		if($dias >=10){
		}
		else{
			$drestantes=10-$dias;
			echo '<script language="javascript">alert("Tienes '.$drestantes.'dias para escoger la mejor respuesta. Si no lo haces en el tiempo indicado, perderas 3 puntos");</script>'; 
		}
	}
		}
}
	}
}
require_once("head.php")?>
    <article>
    <br />
    <div align = "center">
       <h2><?php echo($preg)?></h2>
      <h6>
        <?php echo($nic)?>
      </h6>
      <h5>
        <?php echo($fe)?>
      </h4>
    </div>

    <table>
        <tr>
          <?php $result = $conn->query($sqldos);
      
        if ($result->num_rows > 0) {
  ?>  
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
            <p><?php echo($_SESSION["nombres"]);?></p>
            <p>Puntaje:<?php echo($_SESSION["puntaje"]);?></p>
            <p><img src="https://firebasestorage.googleapis.com/v0/b/yaju-201ac.appspot.com/o/usuarios%2F<?php echo($_SESSION["nick"]);?>.jpg?alt=media"  width = "50" height = "50"></p>
            <p><?php echo($_SESSION["nick"]);?></p>
            <a href=perfil.php>Mi Perfil</a>
            <a href="logout.php?link=<?php echo($url);?>&parametros=<?php echo($parametros);?>">Cerrar Sesi&oacute;n</a>
          <?php  
        }}
        else{
        ?>
          <b>Inicia Sesi&oacute;n</b>
        <form name="frm" method="post" action="login.php?>">
            <p>Usuario: <input type="text" name="txtUser"/></p>
            <p>Password: <input type="password" name="txtPassword"/></p>
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
        
            while($row = $result->fetch_assoc()) {
							if($row["mejor"]==1){
								?>
								<tr>
                <td><b><?php echo($row["respuesta"])?></b></td>
                <td><b><?php echo($row["fecha"])?></b></td>
                <td><b><?php echo($row["hora"])?></b></td>
                <td><b><?php echo($row["nick"])?></b></td>
                <td><b>Si</b></td>
			 					<td><b>
                    <p><img src="https://firebasestorage.googleapis.com/v0/b/yaju-201ac.appspot.com/o/usuarios%2F<?php echo($row["nick"]);?>.jpg?alt=media"  width="50" height="50"></p>
									</b></td>
            </tr>
			
			<?php
							}
							else{
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
							
							if($yaescogio==1){
												if($row["mejor"]==0){
                      	echo("No");
                    		}
                    		else{
                      		echo("Si");
                    		}
                    	}
								else{
									if($dias<=5){
										echo("Pregunta abierta");
									}
									else if($dias > 5 && $dias <=10){
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
											<input type="hidden" name="nick" value="<?php echo($row["nick"]);?>" />  
                    <p><input type="submit" name="btnSubmit" value="Escoger"/></p>
                    </form>  
                <?php
									}	}
										else{
											echo("Pregunta abierta");
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
        }
        else{
                echo("No hay respuestas a&uacute;n");
          ?>
          <td align=right><?php
       if(isset($_SESSION["loged"])){
        if($_SESSION["loged"] == true){
            ?>
            <p><?php echo($_SESSION["nombres"]);?></p>
            <p>Puntaje:<?php echo($_SESSION["puntaje"]);?></p>
            <p><img src="https://firebasestorage.googleapis.com/v0/b/yaju-201ac.appspot.com/o/usuarios%2F<?php echo($_SESSION["nick"]);?>.jpg?alt=media"  width = "50" height = "50"></p>
             <p><?php echo($_SESSION["nick"]);?></p>
            <a href=perfil.php>Mi Perfil</a>
            <a href="logout.php?link=<?php echo($url);?>&parametros=<?php echo($parametros);?>">Cerrar Sesi&oacute;n</a>
          <?php  
        }}
        else{
        ?>
          <b>Inicia Sesi&oacute;n</b>
        <form name="frm" method="post" action="login.php?>">
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
            }
        $cursor = null;
?>

    </table>
        <br /><br /><br />
        <?php
        if(isset($_SESSION["loged"])){
        if($_SESSION["loged"] == true){
					if($_SESSION["nick"]==$nic){
						?>
       <h2>No puedes responder tu propia pregunta</h2>
        <?php
					}else{
					if(isset($_GET["puntosnuevos"])){
						$puntosnuevos=$_GET["puntosnuevos"];
						echo("<script language='javascript'>alert('Felicidades has ganado ".$puntosnuevos." puntos por tu respuesta');</script>");
					}
					
          if($dias<5){
            ?>
            <form name="frm" method="post" action="respondiendo.php?pregunta=<?php echo($preg);?>&ni=<?php echo($ni);?>">
            <p>Respuesta: <input type="text" style="WIDTH: 1000px;" name="txtRespuesta" required/></p>
            <p><input type="submit" name="btnSubmit" value="Responder"/></p>
        </form>
          <?php  
        	
				}
				}
						 
					}
				}
        else{
        ?>
       <h2>Inicie sesi&oacute;n para responder</h2>
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