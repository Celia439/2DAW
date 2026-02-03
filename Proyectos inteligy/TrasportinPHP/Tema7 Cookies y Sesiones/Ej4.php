<?php
echo '<h3>Ejercicio 4: Crea un sistema de Login y logout sencillo, para ello crea un formulario de
login (usuario + contraseña). Luego, comprueba con un array de usuarios ficticios, por
ejemplo:
$usuarios = [
 "ana" => "1234",
 "juan" => "abcd"
];
• Si el login es correcto:
o Guardar en $_SESSION: user y auth = true
o Redirigir a home.php
• Si el login falla, mostrar mensaje de error.
• En home.php, verificar que $_SESSION["auth"] existe; si no, redirigir al login.
• Crear un logout.php que destruya la sesión y redirija al login.</h3>';

echo "<form action='#' enctype='multipart/form-data' method='post'>
 <h2>Login</h2>
 <input name='usuario' type='text' placeholder='Nombre usuario '>
 <input name='password' type='password' placeholder='Contraseña'>
 <input name='enviar' type='submit' value='enviar'>
</form>";

$usuarios = [
    "ana" => "1234",
    "juan" => "abcd"
];
if (isset($_POST['enviar']) && !empty($_POST['usuario']) && !empty($_POST['password'])) {
    $user = in_array( $_POST['usuario'],key($usuarios)) ? "repe" : "valido";
    echo $user;
} else {
    echo "<p>Rellene los campos</p>";
}
