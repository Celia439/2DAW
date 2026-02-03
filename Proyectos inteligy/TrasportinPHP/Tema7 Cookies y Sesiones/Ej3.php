<?php
session_start();
if (!isset($_SESSION["visitas"])) {
    $_SESSION['visitas'] = 0;
}
$_SESSION['visitas']++;
echo '<h3>Ejercicio 3: Realizar un contador de visitas, en el que cada vez que el usuario entra en la
página, incrementa un contador en $_SESSION["visitas"]. Para ello:
• Muestra: "Has visitado esta página N veces".
• Añade un botón para reiniciar el contador.
</h3>';


echo "<p>Has visitado esta página " . $_SESSION['visitas'] . " veces</p>";
echo "<form action='#' enctype='multipart/form-data' method='post'><input type='submit' name='btn' value='Reiniciar'> </form>";

if (isset($_POST['btn'])) {
    session_destroy();
    header("Location: Ej3.php");
    exit();
}