<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.6.10/firebase.js"></script>
      <script>
    function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // files is a FileList of File objects. List some properties.
    var output = [];
    for (var i = 0, f; f = files[i]; i++) {
      output.push('<li><strong>', escape(f.name), '</strong> (', f.type || 'n/a', ') - ',
                  f.size, ' bytes, last modified: ',
                  f.lastModifiedDate ? f.lastModifiedDate.toLocaleDateString() : 'n/a',
                  '</li>');
    }
    document.getElementById('list').innerHTML = '<ul>' + output.join('') + '</ul>';
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);
        
    var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            };

        function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var span = document.createElement('span');
          span.innerHTML = ['<img class="thumb" src="', e.target.result,
                            '" title="', escape(theFile.name), '"/>'].join('');
          document.getElementById('list').insertBefore(span, null);
        };
      })(f);

      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
    }
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);
        
       
function uploadFile(){
      var config = {
    apiKey: "AIzaSyDXTTLf6Gd3DdyMvNrtaxArmgqm-UrW6Aw",
    authDomain: "yaju-201ac.firebaseapp.com",
    databaseURL: "https://yaju-201ac.firebaseio.com",
    storageBucket: "yaju-201ac.appspot.com",
    messagingSenderId: "1052977603772"
  };
  firebase.initializeApp(config);
    console.log(config);
  
 
 
    
    
    
    
  var archivo = document.getElementById("output");  
  var storageRef = firebase.storage().ref();
  var referencia = storageRef.child('usuarios/test.jpg').put(file);
  }
    
}
</script>
  </head>
  <body>
    <form name="frm" action="">
<p>Foto: <input type="file" accept="image/*" onchange="loadFile(event)"></p>
            <p><img name="imagen" id="output" height="100" width="100"/></p>
       <p><input type="submit" name="btnSubmit" value="Registrate" onclick="uploadFile()"/></p>
</form>           
</body>
</html> 
