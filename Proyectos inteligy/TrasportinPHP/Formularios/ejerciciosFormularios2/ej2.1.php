<?php
if (isset($_POST["euros"]) && $_POST["tipo"] !== "Seleciona") {
    $euros = $_POST["euros"];
    $tipo = $_POST["tipo"];
    switch ($tipo) {
        case "yen":
            echo "<p>Tienes ".($euros*160)." yen</p>";

            break;
        case "dólar":
            echo "<p>Tienes ".($euros*1.10)." dólar</p>";
            break;
        case "libra":
            echo "<p>Tienes ".($euros*0.85)."libras</p>";

            break;
        case "esterlina":
            echo "<p>Tienes ".($euros*0.85)." esterlinas</p>";
            break;
        default:
            echo "<p>Error tipo no encontrado</p>";

            break;
    };


}
?>