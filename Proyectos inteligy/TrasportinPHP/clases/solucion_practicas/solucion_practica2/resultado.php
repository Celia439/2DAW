<?php
    require_once "model.php";

    $inventos = array();
    $resumenRentables = 0;
    $resumenNoRentables = 0;
    $mensajeError = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nombre = "";
        $proposito = "";
        $fechaPrototipo = "";
        $coste = 0;
        $tipo = "mecanico";
        $materialesSeleccionados = array();

        if (isset($_POST["nombre"])) {
            $nombre = $_POST["nombre"];
        }
        if (isset($_POST["proposito"])) {
            $proposito = $_POST["proposito"];
        }
        if (isset($_POST["fechaPrototipo"])) {
            $fechaPrototipo = $_POST["fechaPrototipo"];
        }
        if (isset($_POST["coste"])) {
            $coste = (float)$_POST["coste"];
        }
        if (isset($_POST["tipo"])) {
            $tipo = $_POST["tipo"];
        }
        if (isset($_POST["materiales"])) {
            $materialesSeleccionados = $_POST["materiales"];
        }

        if ($nombre === "" || $proposito === "" || $fechaPrototipo === "" || $coste <= 0) {
            $mensajeError = "Los datos del invento no son válidos.";
        } else {
            if ($tipo === "mecanico") {
                $invento = new InventoMecanico($nombre, $proposito, $fechaPrototipo, $coste, $materialesSeleccionados);
            } else {
                $invento = new InventoElectronico($nombre, $proposito, $fechaPrototipo, $coste, $materialesSeleccionados);
            }
            $inventos[] = $invento;
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Resultados - Práctica 2</title>
    </head>
    <body>
        <h1>Informe de Inventos - TechForge Labs</h1>

        <?php
            if ($mensajeError !== "") {
                echo "<p>" . htmlspecialchars($mensajeError) . "</p>";
            } else {
                if (count($inventos) === 0) {
                    echo "<p>No se ha recibido ningún invento.</p>";
                } else {
                    $indice = 0;
                    $total = count($inventos);
                    while ($indice < $total) {
                        $inv = $inventos[$indice];

                        $complejidad = $inv->calcularComplejidad();
                        $impacto = $inv->impactoAmbiental();
                        $desc = $inv->descripcionTecnica();
                        $rentable = $inv->esRentable();
                        if ($rentable) {
                            $resumenRentables = $resumenRentables + 1;
                        } else {
                            $resumenNoRentables = $resumenNoRentables + 1;
                        }

                        echo "<hr>";
                        echo "<h2>Informe del invento</h2>";

                        echo "<p><strong>Ficha descriptiva:</strong><br>";
                        echo htmlspecialchars($inv->__toString()) . "<br>";
                        $mats = $inv->getMateriales();
                        if (count($mats) > 0) {
                            echo "Materiales: " . htmlspecialchars(implode(", ", $mats));
                        } else {
                            echo "Materiales: Ninguno seleccionado";
                        }
                        echo "</p>";

                        echo "<p><strong>Análisis técnico:</strong><br>";
                        echo "Complejidad: " . $complejidad . "<br>";
                        echo "Impacto ambiental: " . $impacto . "<br>";
                        echo "Descripción técnica: " . htmlspecialchars($desc) . "<br>";
                        echo "</p>";

                        echo "<p><strong>Conclusión:</strong><br>";
                        if ($rentable) {
                            echo "El invento se considera <strong>rentable</strong>.";
                        } else {
                            echo "El invento se considera <strong>no rentable</strong>.";
                        }
                        echo "</p>";

                        $indice = $indice + 1;
                    }

                    echo "<hr>";
                    echo "<h2>Resumen global</h2>";
                    echo "<p>Total de inventos procesados: " . Invento::getTotalInventos() . "</p>";
                    echo "<p>Rentables: " . $resumenRentables . "</p>";
                    echo "<p>No rentables: " . $resumenNoRentables . "</p>";
                }
            }
        ?>
    </body>
</html>
