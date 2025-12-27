<?php
function existe(...$elementos)
{
    $existe = true;
    foreach ($elementos as $a) {
        if ($a === "" || $a === null) {
            $existe = false;
        }
    }
    return $existe;
}

if (!empty($_POST["figura"]) && $_POST["figura"] !== "Selectione figura") {
    $figura = $_POST["figura"];
    switch ($figura) {
        case"Cuadrado":
            if (existe($_POST["lado"])) {
                $lado = $_POST["lado"];
                echo "El area de tu Cuadrado es " . ($lado * $lado);
            } else {
                echo "Datos no introducidos";
            }
            break;
        case"Rectangulo":

            if (existe($_POST["base"], $_POST["altura"])) {
                $base = $_POST["base"];
                $altura = $_POST["altura"];
                echo "El area de tu Rectangulo es " . ($base * $altura);
            } else {
                echo "Datos no introducidos";
            }

            break;
        case"Circulo":
            if (existe($_POST["radio"])) {
                $radio = $_POST["radio"];
                echo "El area de tu Circulo es " . (pi() * ($radio * $radio));
            } else {
                echo "Datos no introducidos";
            }
            break;
        default:
            echo "error";
            break;

    }

}
?>