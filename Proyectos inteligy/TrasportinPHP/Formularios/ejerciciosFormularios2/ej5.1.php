<?php
if (!empty($_POST["menu"])
    && $_POST["menu"] !== "Selectione plato"
    && !empty($_POST["sino"])) {
    $plato = $_POST["menu"];
    $sino = $_POST["sino"];
    echo "Te gusta la $plato: $sino";
} else {
    echo "Debe de rellenar todos los parametros";
}
?>