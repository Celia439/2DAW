<?php
if (isset($_POST["nombre"] , $_POST["email"],$_POST["contrasena"]) ) {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    echo "Bienbenido $nombre su email es $email";
}
?>