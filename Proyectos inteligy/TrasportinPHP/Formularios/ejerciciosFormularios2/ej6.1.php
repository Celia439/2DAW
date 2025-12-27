<?php
if (!empty($_POST["nombre"])
    && !empty($_POST["asunto"])
    && !empty($_POST["mensaje"])
    && !empty($_POST["email"])) {

    $datos = [$_POST["nombre"], $_POST["asunto"], $_POST["email"], $_POST["mensaje"]];
    echo "<table>";
    echo "<tr><th>Nombre</th><th>asunto</th><th>email</th><th>mensaje</th></tr>";
    echo "<tr>";
    foreach ($datos as $dato) {
        echo "<td>$dato</td>";
    }
    echo "</tr>";
} else {
    echo "Debe de rellenar todos los parametros";
}
?>