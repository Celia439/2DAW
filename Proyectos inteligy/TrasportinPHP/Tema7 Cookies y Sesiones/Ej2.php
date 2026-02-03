<?php
if (isset($_COOKIE['tema'])) {
    $tema = $_COOKIE['tema'] == "oscuro" ? "black" : "white";
    echo "<head>
<style>
body{
background-color: " . $tema . ";
}
</style>
</head>";
}
echo '<h3>Ejercicio 2: Crea un formulario con opciones "claro" y "oscuro". Al enviar, guarda la
selección en una cookie y aplica un estilo de fondo según la cookie (body { backgroundcolor: ... }). Si no hay cookie, mostrar "tema claro" por defecto.</h3>
';
echo "<form action='#' method='post' enctype='multipart/form-data' >
<p>Tema:</p>
<select name='tema'>
<option value='claro'>Claro</option>
<option value='oscuro'>Oscuro</option>
</select>
<input type='submit' name='enviar' value='enviar'>
</form>";
if (isset($_POST['enviar'])) {
    $tema = $_POST['tema'] == "claro" ? "claro" : "oscuro";
    setcookie("tema", $tema);
    header("Location: Ej2.php");
    exit();
}
