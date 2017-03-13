<?php
require_once("funciones.php");
?>
<html>
<head>
  <title>Yaj&uacute; Respuestas</title>
  <link rel="SHORTCUT ICON" href="imagenes/icon.ico" />
  <link rel="stylesheet" type="text/css" href="estilos.css" media="screen" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://www.gstatic.com/firebasejs/3.6.10/firebase.js"></script>
<script>

  $( function() {
    $( "#datepicker" ).datepicker({
      minDate: "-100Y", 
      maxDate: " +0D" ,
      changeMonth: true,
      changeYear: true,
      showOn: "button",
      buttonImage: "imagenes/calendarioP.png",
      buttonImageOnly: true,
      buttonText: "Fecha de Nacimiento",
      dateFormat:"yy-mm-dd" 
  });
  });
    $(function() 
   {
        $('.formatoNick').bind('keyup input',function()
        {    
            if (this.value.match(/[^a-zA-Z0-9-._]/)) 
            {
                this.value = this.value.replace(/[^a-zA-Z0-9._-]/, '');
            }
        });
    });
 
  $(function(){
        $('.soloLetras').bind('keyup input',function()
        {       
           if (this.value.match(/[^a-zA-Z ]/g)) 
            {
                this.value = this.value.replace(/[^a-zA-Z ]/g, '');
            }
        });
    });
  
   $(function() 
   {
$('.email').focusout(function(){
        $('.email').filter(function(){
           var emil=$('.email').val();
      var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if( !emailReg.test( emil ) ) {
        alert('Por favor, ingrese un correo v\u00E1lido');
        } 
        })
    });
 });

  function Verificar(){
      var bandera = false;
    var salida ="";
  if(document.frm.txtNick.value == "" ){
  bandera = true;
    salida+="\n"
    salida+="Campo 'Nick' vacio.";
  }
  if(document.frm.txtName.value == "" ){
  bandera = true;
    salida+="\n"
    salida+="Campo 'Nombre(s)' vacio.";
  }
  if(document.frm.txtLastName.value == "" ){
  bandera = true;
    salida+="\n"
    salida+="Campo 'Apellido(s)' vacio.";
  }   
  if(document.frm.txtBirthday.value == "" ){
  bandera = true;
    salida+="\n"
    salida+="Campo 'Fecha de Nacimiento' vacio.";
  }  
    if(document.frm.txtCorreo.value == "" ){
  bandera = true;
    salida+="\n"
    salida+="Campo 'Correo' vacio.";
  }
   if(document.frm.txtPassword.value == "" ){
  bandera = true;
    salida+="\n"
    salida+="Campo 'Password' vacio.";
  } 
    if(document.frm.txtPasswordConfirm.value == "" ){
  bandera = true;
    salida+="\n"
    salida+="Campo 'Confirmar Password' vacio.";
  }
   if(document.frm.txtPasswordConfirm.value != document.frm.txtPassword.value ){
  bandera = true;
    salida+="\n"
    salida+="Password debe ser igual a Confirmar Password";
  }
    if(document.frm.txtNick.value[0] == "1" ){
  bandera = true;
    salida+="\n"
    salida+="Nick no puede empezar con un numero";
  }
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if( !emailReg.test( document.frm.txtCorreo.value ) ) {
       bandera = true;
    salida+="\n"
    salida+="Por favor, ingrese un correo v\u00E1lido";
      } 
    
    if(bandera){
      alert(salida);
     return false;
    }
  }
  
  var loadFile = (function(event) {
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
              });
         
       
function uploadFile(){
  var config = {
    apiKey: "AIzaSyDXTTLf6Gd3DdyMvNrtaxArmgqm-UrW6Aw",
    authDomain: "yaju-201ac.firebaseapp.com",
    databaseURL: "https://yaju-201ac.firebaseio.com",
    storageBucket: "yaju-201ac.appspot.com",
    messagingSenderId: "1052977603772"
  };

  firebase.initializeApp(config);
  var inFile = document.getElementById("output").files[0];
  var storageRef = firebase.storage().ref();
  var referencia = storageRef.child('usuarios');
  var upload = referencia.put(inFile);
  
}
</script>
</head>
<body>
    <?php require_once("cabecera.php");
 if(isset($_GET["error"])){
   $error=$_GET["error"];
   if($error=="usuario"){
     echo ('<script language="javascript">alert("El usuario escogido no se encuentra disponible");</script>'); 
   }
 }
  ?>
  <article>
    <div align="center">
      <h2>Bienvenido a Yaj&uacute;</h2>
  </div>
    <form name="frm" onsubmit="return Verificar()" method="post" action="auxregistro.php">
            <p>Nick: <input  id ="nick" name="txtNick" type="text" class="formatoNick"/></p>
            <p>Nombre(s): <input type="text" name="txtName" class="soloLetras"/></p>
            <p>Apellido(s): <input type="text" name="txtLastName" class="soloLetras"/></p>
            <p>Fecha de Nacimiento: (aaaa/mm/dd) <input type="text" id="datepicker" name="txtBirthday" readonly='true' /></p>
            <p>G&eacute;nero: </p>
            <input type ="radio" name="rd" value="Masculino" checked="checked"/>Masculino<br />
            <input type ="radio" name="rd" value="Femenino"/>Femenino<br />
            <p>Correo: <input id="mail" type="text" name="txtCorreo" class="email"/></p>
            <p>Password: <input type="password" name="txtPassword"/></p>
            <p>Confirmar Password: <input type="password" name="txtPasswordConfirm"/></p>
            <p>Foto: <input type="file" accept="image/*" onchange="loadFile(event)"></p>
            <p><img name="imagen" id="output" height="100" width="100"/></p>
            <p><input type="submit" name="btnSubmit" value="Registrate" onclick="uploadFile()"/></p>
        </form>
      </article>
   <section>
<footer>
    <?php require_once("pie.php");?>
     </footer>
</section>
</body>
</html>
