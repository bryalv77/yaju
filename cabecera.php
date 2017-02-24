<style>
    ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #FF7F66;
}

li {
    float: left;
}

li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #555;
    color: white;
}
ul#menu li {
    display:inline;
}
</style>
<div align="center">
    <h1>
        <font face = "Century Gothic" color="darkblue"><b>Yaj&uacute; Respuestas</b></font>
    </h1>
    
    
</div>
<ul id="menu">
  <li><a href="index.php">Inicio</a></li>
  <li><a href="categoriastodas.php">Categorias</a></li>
  <li><a href="preguntastodas.php">Preguntas</a></li>
  <li><a href="about.php">Acerca De</a></li>
</ul>
<p><a href="<?=$_SERVER["HTTP_REFERER"]?>">Atras</a></p>
<hr />