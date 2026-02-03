<?php
//Ejercicio 1:
//• Crea un formulario donde el usuario pueda escribir su nombre. Al enviar el
//formulario, guarda el nombre en una cookie que dure 7 días. En la misma página,
//si la cookie existe, muestra:
// "Hola, [nombre]!"
//• Segunda parte: añade un botón para eliminar la cookie.
echo "
<form  action='#' enctype='multipart/form-data' method='post'>
    <label>Nombre
        <input type='text' name='nombre' placeholder='Nombre'/>
    </label>
        <input type='submit' name='enviar' value='enviar'>
        <input type='submit' name='eliminar' value='eliminar'>

</form>";

if (isset($_POST['enviar'])) {
    $nombre = $_POST['nombre'];
    setcookie("nombre", $nombre);
    header("Location: Ej1.php");
    exit();

} else if (isset($_POST['eliminar'])) {
    unset($_COOKIE["nombre"]);
}

//todo comprobar valor
if (isset($_COOKIE["nombre"])) {
    echo "<p>Hola " . $_COOKIE["nombre"] . "</p>";
}
