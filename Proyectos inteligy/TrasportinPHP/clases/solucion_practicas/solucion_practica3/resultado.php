<?php
    require_once "model.php";

    $obras = array();
    $mensajeError = "";
    $totalLargas = 0;
    $totalCortas = 0;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        if (isset($_POST["obras"])) {
            $texto = trim($_POST["obras"]);

            if ($texto !== "") {
                $bloques = preg_split('/\n\s*\n/', $texto);

                $i = 0;
                $totalBloques = count($bloques);

                while ($i < $totalBloques) {
                    $bloque = trim($bloques[$i]);
                    $lineas = explode("\n", $bloque);

                    if (count($lineas) >= 5) {

                        $genero = strtoupper(trim($lineas[0]));
                        $titulo = trim($lineas[1]);
                        $fechaEstreno = trim($lineas[2]);
                        $duracion = (int)trim($lineas[3]);
                        $personajes = explode(",", trim($lineas[4]));

                        $obra = null;

                        if ($genero === "COMEDIA") {
                            $obra = new ObraComedia($titulo, "Comedia", $duracion, $fechaEstreno, $personajes);
                        } else {
                            if ($genero === "DRAMA") {
                                $obra = new ObraDrama($titulo, "Drama", $duracion, $fechaEstreno, $personajes);
                            }
                        }

                        if ($obra !== null) {
                            $obras[] = $obra;
                        }
                    }

                    $i = $i + 1;
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Resultados - Práctica 3</title>
    </head>
    <body>
        <h1>Informe de Obras - StageMaster Studio</h1>

        <?php
            if (count($obras) === 0) {
                echo "<p>No se ha podido procesar ninguna obra.</p>";
            } else {

                $i = 0;
                $total = count($obras);

                while ($i < $total) {
                    $obra = $obras[$i];

                    $nivel = $obra->nivelProduccion();
                    $resumen = $obra->resumenArgumento();
                    $publico = $obra->publicoObjetivo();
                    $dias = $obra->diasHastaEstreno();
                    $larga = $obra->esLarga();

                    if ($larga) {
                        $totalLargas = $totalLargas + 1;
                    } else {
                        $totalCortas = $totalCortas + 1;
                    }

                    echo "<hr>";
                    echo "<h2>Informe de la obra</h2>";

                    echo "<p><strong>Ficha descriptiva:</strong><br>";
                    echo htmlspecialchars($obra->__toString()) . "<br>";
                    echo "Duración: " . $obra->getDuracion() . " minutos<br>";
                    echo "Personajes: " . htmlspecialchars(implode(", ", $obra->getPersonajes()));
                    echo "</p>";

                    echo "<p><strong>Análisis artístico:</strong><br>";
                    echo "Nivel de producción: " . $nivel . "<br>";
                    echo "Resumen: " . htmlspecialchars($resumen) . "<br>";
                    echo "Público objetivo: " . htmlspecialchars($publico) . "<br>";
                    echo "Días hasta el estreno: " . $dias . "<br>";
                    echo "</p>";

                    echo "<p><strong>Conclusión:</strong><br>";
                    if ($larga) {
                        echo "La obra se considera <strong>larga</strong>.";
                    } else {
                        echo "La obra se considera <strong>no larga</strong>.";
                    }
                    echo "</p>";

                    $i = $i + 1;
                }

                echo "<hr>";
                echo "<h2>Resumen global</h2>";
                echo "<p>Total de obras procesadas: " . Obra::getTotalObras() . "</p>";
                echo "<p>Obras largas: " . $totalLargas . "</p>";
                echo "<p>Obras no largas: " . $totalCortas . "</p>";
            }
        ?>
    </body>
</html>
