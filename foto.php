           <p>Foto: <input type="file" accept="image/*" onchange="loadFile(event)"></p>
            <p><img name="imagen" id="output" height="100" width="100"/></p>
<script src="https://www.gstatic.com/firebasejs/3.6.10/firebase.js"></script>
      <script>
   var loadFile = function(event) {
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
              };
         var config = {
    apiKey: "AIzaSyDXTTLf6Gd3DdyMvNrtaxArmgqm-UrW6Aw",
    authDomain: "yaju-201ac.firebaseapp.com",
    databaseURL: "https://yaju-201ac.firebaseio.com",
    storageBucket: "yaju-201ac.appspot.com",
    messagingSenderId: "1052977603772"
  };
  firebase.initializeApp(config);
       
function uploadFile(){
  var inFile = document.getElementById("output").files[0];
  var storageRef = firebase.storage().ref();
  var referencia = storageRef.child('usuarios');
  var upload = referencia.put(inFile);
  
}
        
</script>
 