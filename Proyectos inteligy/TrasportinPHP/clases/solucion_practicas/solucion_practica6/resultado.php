<?php
    require_once "model.php";

    $recorridos = array();
    $mensajeError = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $nombre = "";
        $distancia = 0;
        $tiempo = 0;
        $fecha = "";
        $tipo = "urbano";
        $superficies = array();
        $sensaciones = array();

        if (isset($_POST["nombre"])) {
            $nombre = $_POST["nombre"];
        }
        if (isset($_POST["distancia"])) {
            $distancia = (float)$_POST["distancia"];
        }
        if (isset($_POST["tiempo"])) {
            $tiempo = (int)$_POST["tiempo"];
        }
        if (isset($_POST["fecha"])) {
            $fecha = $_POST["fecha"];
        }
        if (isset($_POST["tipo"])) {
            $tipo = $_POST["tipo"];
        }
        if (isset($_POST["superficies"])) {
            $superficies = $_POST["superficies"];
        }
        if (isset($_POST["sensaciones"])) {
            $sensaciones = $_POST["sensaciones"];
        }

        if ($nombre === "" || $distancia <= 0 || $tiempo <= 0 || $fecha === "") {
            $mensajeError = "Los datos del recorrido no son válidos.";
        } else {
            if ($tipo === "urbano") {
                $recorrido = new RecorridoUrbano($nombre, $distancia, $tiempo, $fecha, $superficies, $sensaciones);
            } else {
                $recorrido = new RecorridoMixto($nombre, $distancia, $tiempo, $fecha, $superficies, $sensaciones);
            }
            $recorridos[] = $recorrido;
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Resultados - Práctica 6</title>
    </head>
    <body>
        <h1>Informe de Recorridos - UrbanRun Tracker</h1>

        <?php
            if ($mensajeError !== "") {
                echo "<p>" . htmlspecialchars($mensajeError) . "</p>";
            } else {

                if (count($recorridos) === 0) {
                    echo "<p>No se ha recibido ningún recorrido.</p>";
                } else {

                    $i = 0;
                    $total = count($recorridos);

                    while ($i < $total) {
                        $r = $recorridos[$i];

                        $ritmo = $r->ritmo();
                        $velocidad = $r->velocidadMedia();
                        $carga = $r->calcularCarga();
                        $indice = $r->indiceEsfuerzo();
                        $analisisSup = $r->analizarSuperficie();
                        $sensacionFinal = $r->sensacionFinal();

                        echo "<hr>";
                        echo "<h2>Informe del recorrido</h2>";

                        echo "<p><strong>Ficha descriptiva:</strong><br>";
                        echo htmlspecialchars($r->__toString()) . "<br>";

                        $sup = $r->getSuperficies();
                        if (count($sup) > 0) {
                            echo "Superficies: " . htmlspecialchars(implode(", ", $sup)) . "<br>";
                        } else {
                            echo "Superficies: Ninguna seleccionada<br>";
                        }

                        $sen = $r->getSensaciones();
                        if (count($sen) > 0) {
                            echo "Sensaciones: " . htmlspecialchars(implode(", ", $sen)) . "<br>";
                        } else {
                            echo "Sensaciones: Ninguna seleccionada<br>";
                        }

                        echo "</p>";

                        echo "<p><strong>Análisis deportivo:</strong><br>";
                        echo "Ritmo medio: " . number_format($ritmo, 2) . " min/km<br>";
                        echo "Velocidad media: " . number_format($velocidad, 2) . " km/h<br>";
                        echo "Carga total: " . number_format($carga, 2) . "<br>";
                        echo "Índice de esfuerzo: " . number_format($indice, 2) . "<br>";
                        echo "Análisis de superficie: " . htmlspecialchars($analisisSup) . "<br>";
                        echo "</p>";

                        echo "<p><strong>Conclusión:</strong><br>";
                        echo htmlspecialchars($sensacionFinal);
                        echo "</p>";

                        $i = $i + 1;
                    }

                    echo "<hr>";
                    echo "<h2>Resumen global</h2>";
                    echo "<p>Total de recorridos procesados: " . Recorrido::getTotalRecorridos() . "</p>";
                }
            }
        ?>
    </body>
</html>
